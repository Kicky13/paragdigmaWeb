<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ldap_access extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    function index() {
        $load['status'] =  0;
        $level = $this->session->userdata('level');
        if (!empty($level)) {
            header('Location:'.  base_url() .'');
        } else {
            $this->load->view('home', $load);
        }
    }

    function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if ($username == "" and $password == "") {
            $this->load->view('ldap/loginTemplate');
        } else {
            $set = $this->auth->GetLdapAccess($username, $password);
            $ldap_id = $this->session->userdata('ldap_id');
            $access = $this->session->userdata('access');
            $level = $this->session->userdata('level');
            if ($set == true) {
                header('Location: ' . base_url() . 'finance_dashboard/income');
            } else {
                // $load['error'] = '<div class="alert alert-danger" role="alert">Kesalahan Dalam Username dan Password / Tidak Memiliki Akses untuk Masuk kedalam applikasi</div>';
                // $this->load->view('ldap/loginTemplate', $load);
            }
        }
    }

    function access() {
        $this->load->library('Auth');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->auth->GetLdapAccess($username, $password);
    }

    function logout() {
        $this->auth->do_logout();
    }

    function plg_sg() {
        $this->load->view('ldap/plg_sg');
    }
    
    function plg_sgr() {
        $this->load->view('ldap/plg_sgr');
    }

    function plg_sp() {
        $this->load->view('ldap/plg_sp');
    }

    function plg_st() {
        $this->load->view('ldap/plg_st');
    }

    function plg_tlcc() {
        $this->load->view('ldap/plg_tlcc');
    }
    
    function plg_all() {
        $this->load->view('ldap/landing_page');
    }

    function get_update_status() {
        $this->load->model('Mplant_administrator');
        return $this->Mplant_administrator->get_update_status();
    }
    
    function landing_cam() {
        $this->load->view('ldap/landing_cam');
    }
    
    function landing_emission() {
        $this->load->view('ldap/landing_emission');
    }

}
