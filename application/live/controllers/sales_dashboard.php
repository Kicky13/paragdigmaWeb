<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class sales_dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('Template');
    }
	
    function volume() {
        $level = $this->session->userdata('level');
        $load['Title'] = "Production Plant Tonasa";
		$this->template->load('plant_information/administrator_index', 'plant_information/sales/sales_volume_all', $load); 
    }
	
    function volume_detail() {
		$opco = $this->uri->segment(3);
        $level = $this->session->userdata('level');
        $load['opco'] = $opco;
		$this->template->load('plant_information/administrator_index', 'plant_information/sales/sales_volume_detail', $load); 
    }

    function revenue() {
        $level = $this->session->userdata('level');
        $load['Title'] = "Production Plant Tonasa";
		$this->template->load('plant_information/administrator_index', 'plant_information/sales/sales_revenue_all', $load); 
    }
	
    function revenue_detail() {
		$opco = $this->uri->segment(3);
        $level = $this->session->userdata('level');
        $load['opco'] = $opco;
		$this->template->load('plant_information/administrator_index', 'plant_information/sales/sales_revenue_detail', $load); 
    }
	
    function trend() {
        $jenis = $this->uri->segment(3);
        $opco = $this->uri->segment(4);
        $level = $this->session->userdata('level');
        $load['Title'] = "Production Plant Tonasa";
        $load['opco'] = $opco;
        $load['jenis'] = $jenis;
		$this->template->load('plant_information/administrator_index', 'plant_information/sales/sales_trend', $load); 
    }
	
    function trend_volume_detail() {
		$opco = $this->uri->segment(3);
        $level = $this->session->userdata('level');
        $load['opco'] = $opco;
		$this->template->load('plant_information/administrator_index', 'plant_information/sales/sales_trend_volume_detail', $load); 
    }

    function trend_revenue() {
        $level = $this->session->userdata('level');
        $load['Title'] = "Production Plant Tonasa";
		$this->template->load('plant_information/administrator_index', 'plant_information/sales/sales_trend_revenue_all', $load); 
    }
	
    function trend_revenue_detail() {
		$opco = $this->uri->segment(3);
        $level = $this->session->userdata('level');
        $load['opco'] = $opco;
		$this->template->load('plant_information/administrator_index', 'plant_information/sales/sales_trend_revenue_detail', $load); 
    }
	
}