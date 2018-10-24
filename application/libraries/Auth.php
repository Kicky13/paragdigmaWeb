<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth {

    var $CI = NULL;

    function __construct() {
        $this->CI = & get_instance();
    }

    function GetLdapAccess($username, $password) {
        $ldap_server = "10.15.3.120"; //$ldap_server = "ldap://smig.corp";
        $auth_user = $username;
        $domain = "@smig.corp";
        $auth_pass = $password;

        $oracle = $this->CI->load->database('paradigma', TRUE);
        $Query = $oracle->query("SELECT * FROM PAR4_USERLIST WHERE EMAIL='" . $username . "@semenindonesia.com'");
        $result = $Query->row();
        if ($result->LDAP_FLAG == '1') {
            if ($auth_pass == $result->PASSWD) {
                $nopeg = $result->EMAIL;
                $name_user = $result->NAME;
                $ldap_id = array('ldap_id' => $username);
                $name = array('name' => $name_user);
                $this->CI->session->set_userdata($ldap_id);
                $this->CI->session->set_userdata($name);
				$oracle->query("UPDATE PAR4_USERLIST SET ACTIVE_BOD='1', VISIT_BOD=VISIT_BOD+1 WHERE EMAIL='" . $username . "@semenindonesia.com'");
                return true;
            } else {
                die('<b style="font-size: 32px; text-align="center"> Cek Kembali Username atau Password Anda!</b>');
            }
        } else if ($result->LDAP_FLAG != '1') {
            $connect = @ldap_connect($ldap_server);
            if (!($bind = @ldap_bind($connect, $auth_user . $domain, $auth_pass))) {
                die('<b style="font-size: 32px; text-align="center"> Cek Kembali Username atau Password Anda!</b><div><a style="font-size: 22px;" href="'.  base_url().'ldap_access/login">Kembali Login</a></div>');
                echo '<div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-triangle"></i></div>';
            }
            $nopeg = $result->EMAIL;
            $name_user = $result->NAME;
            if (!empty($result->EMAIL)) {
                $ldap_id = array('ldap_id' => $username);
                $name = array('name' => $name_user);
                $this->CI->session->set_userdata($ldap_id);
                $this->CI->session->set_userdata($name);
				$oracle->query("UPDATE PAR4_USERLIST SET ACTIVE_BOD='1', VISIT_BOD=VISIT_BOD+1 WHERE EMAIL='" . $username . "@semenindonesia.com'");
                return true;
            } else {
                show_error('<p style="color:red;">Properties LDAP untuk user : ' . $username . '@semenindonesia.com </p> <p><b>Username anda belum terecord di database Aplikasi EIS. <br> Hub Administrator <br> Untuk Menambahkan Username Anda</b></p> <p><a href="' . base_url() .'ldap_access/login">Back To Login<a></p>', 404, $heading = 'LDAP ERROR');
            }
        }
    }

    function GetSesionLogin() {
        $ldap_id = $this->CI->session->userdata('ldap_id');
        if (empty($ldap_id)) {
            header('Location: ' . base_url() . 'ldap_access/login');
        } else {
            return true;
        }
    }

    function AdministratorCheck() {
        $id = $this->CI->session->userdata('nopeg');
        $username = $this->CI->session->userdata('ldap_id');
        $Qhris = $this->CI->db->query("select count(MK_NOPEG_BIRO) as MK_NOPEG from PDG_USER_EMPLOYEE where MK_NOPEG_BIRO = '" . $id . "'");
        $row = $Qhris->row();
        $result = $row->MK_NOPEG;
        $this->CI->db->close();
        if ($result >= 1) {
            return true;
        } else {
            show_error('<p style="color:red;">User Name  : ' . $username . '@semenindonesia.com </p> <p><b> Tidak Memiliki Otorisasi Untuk Masuk Kedalam Menu ini. <br> Mohon Hubungi Administrator <br> Untuk Menambahkan Otorisasi Username Anda</b></p> <p><a href="' . base_url() . '/Home/">Back To Home<a></p>', 404, $heading = '&#9762; HAK AKSES?! ');
        }
    }

    function do_logout() { //Logout System
        $id = $this->CI->session->userdata('ldap_id');
        $oracle = $this->CI->load->database('paradigma', TRUE);
        $oracle->query("UPDATE PAR4_USERLIST SET ACTIVE_BOD='0' WHERE EMAIL='" . $id . "@semenindonesia.com'");
        $this->CI->session->sess_destroy();
        header('Location: ' . base_url());
    }

}
