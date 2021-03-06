<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class material_management extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->auth->GetSesionLogin();
        $this->load->library('Template');
    }
	
    function procurement() {
        $opco = $this->uri->segment(3);
        $level = $this->session->userdata('level');
        $load['opco'] = $opco;
		$this->template->load('plant_information/administrator_index', 'plant_information/material_management/procurement', $load); 
    }
	
    function report() {
        $opco = $this->uri->segment(3);
        $level = $this->session->userdata('level');
        $load['opco'] = $opco;
        $this->template->load('plant_information/administrator_index', 'plant_information/material_management/report', $load); 
    }
    
}