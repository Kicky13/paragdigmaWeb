<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sync extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->auth->generate_login();	
        $this->load->model('M_sync');
    }

    function index() {
        $this->load->view('Syncrone/syncrone');
    }

    function user_employee() {
        $this->M_sync->M_user_employee();
    }

    function unit_kerja() {
        $this->M_sync->M_unit_kerja();
    }

    function atasan() {
        $this->M_sync->M_atasan();
    }

    function jabatan() {
        $this->M_sync->M_jabatan();
    }

}
