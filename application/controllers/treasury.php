<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class treasury extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->auth->GetSesionLogin();
        $this->load->library('Template');
    }
	
    function cashposition() {
        $opco = $this->uri->segment(3);
        $level = $this->session->userdata('level');
        $load['opco'] = $opco;
		$this->template->load('plant_information/administrator_index', 'plant_information/treasury/cashposition', $load); 
    }
    function exchangerate() {
        $opco = $this->uri->segment(3);
        $level = $this->session->userdata('level');
        $load['opco'] = $opco;
        $this->template->load('plant_information/administrator_index', 'plant_information/treasury/exchangerate', $load); 
    }
    function accountreceive() {
        $opco = $this->uri->segment(3);
        $level = $this->session->userdata('level');
        $load['opco'] = $opco;
        $this->template->load('maps', 'maps', $load); 
    }
    
}