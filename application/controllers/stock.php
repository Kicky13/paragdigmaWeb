<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class stock extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('Template');
    }
	
    function index() {
		$opco = $this->uri->segment(3);
		$kodemat = $this->uri->segment(4);
		if(!isset($opco) || empty($opco) && !isset($kodemat) || empty($kodemat)){
			redirect(base_url('stock/index/7000/1700'));
			exit;
		}
        $level = $this->session->userdata('level');
        $load['opco'] = $opco;
        $load['kodemat'] = $kodemat;
        $load['Title'] = "Material Stock";
		// print_r($load);
		$this->template->load('plant_information/administrator_index', 'plant_information/stock/material_stock', $load); 
    }
}