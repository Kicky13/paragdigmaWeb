<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class pos_dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('Template');
    }
	
    function index() {
        $level = $this->session->userdata('level');
        $load['Title'] = "Point Of Sales Plant Tonasa";
		$this->template->load('plant_information/administrator_index', 'plant_information/pos/pos', $load); 
    }
	
    function detail() {
        $opco = $this->uri->segment(3);
        $level = $this->session->userdata('level');
        $load['opco'] = $opco;
        $this->template->load('plant_information/administrator_index', 'plant_information/pos/pos_detail', $load); 
    }
}