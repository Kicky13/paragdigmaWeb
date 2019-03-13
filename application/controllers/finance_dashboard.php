<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class finance_dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->auth->GetSesionLogin();
        $this->load->library('Template');
    }
	
    function finance() {
        $level = $this->session->userdata('level');
        $load['Title'] = "Production Plant Tonasa";
		$this->template->load('plant_information/administrator_index', 'plant_information/finance/finance', $load); 
    }
	
    function finance_detail() {
        $opco = $this->uri->segment(3);
        $level = $this->session->userdata('level');
        $load['opco'] = $opco;
        $this->template->load('plant_information/administrator_index', 'plant_information/finance/finance_detail', $load); 
    }

    function income() {
        $opco = $this->uri->segment(3);
        $level = $this->session->userdata('level');
        $load['opco'] = $opco;
        $this->template->load('plant_information/administrator_index', 'plant_information/finance/income', $load); 
    }

    function income_statement() {
        $opco = $this->uri->segment(3);
        $level = $this->session->userdata('level');
        $load['opco'] = $opco;
        $this->template->load('plant_information/administrator_index', 'plant_information/finance/income_statement', $load); 
    }

    function operation_expense() {
        $opco = $this->uri->segment(3);
        $level = $this->session->userdata('level');
        $load['opco'] = $opco;
        $this->template->load('plant_information/administrator_index', 'plant_information/finance/operation_expense', $load); 
    }
    function finance_home() {
        $opco = $this->uri->segment(3);
        $level = $this->session->userdata('level');
        $load['opco'] = $opco;
        $this->template->load('plant_information/administrator_index', 'plant_information/finance/finance_home', $load); 
    }
    function cost_sheet() {
        $opco = $this->uri->segment(3);
        $level = $this->session->userdata('level');
        $load['opco'] = $opco;
        $this->template->load('plant_information/administrator_index', 'plant_information/finance/cost_sheet', $load); 
    }
    function procurement() {
        $opco = $this->uri->segment(3);
        $level = $this->session->userdata('level');
        $load['opco'] = $opco;
        $this->template->load('plant_information/administrator_index', 'plant_information/finance/procurement', $load); 
    }
    function margin_report() {
        $opco = $this->uri->segment(3);
        $level = $this->session->userdata('level');
        $load['opco'] = $opco;
        $this->template->load('plant_information/administrator_index', 'plant_information/finance/margin_report', $load); 
    }
    
}