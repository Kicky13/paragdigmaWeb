<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class plant_historian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->auth->GetSesionLogin();
        $this->load->library('Template');
        $this->load->library('plant_link');
        $this->load->model('Mplant_historian');
    }

    public function index() {
        $level = $this->session->userdata('level');
        $load['Title'] = "Data Historian";
            $this->template->load('plant_information/administrator_index', 'plant_information/historian/influx', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/historian/influx', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/historian/influx', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/historian/influx', $load);
        // }
    }
    
    public function mimic() {
        $level = $this->session->userdata('level');
        $load['Title'] = "Display Mimic";
        
            $this->template->load('plant_information/administrator_index', 'plant_information/mimic/mimic_index', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/mimic/mimic_index', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/mimic/mimic_index', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/mimic/mimic_index', $load);
        // }
    }
}
