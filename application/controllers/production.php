<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class production extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->auth->GetSesionLogin();
        $this->load->library('Template');
    }
	
    function prod_overview() {
        $level = $this->session->userdata('level');
        $load['Title'] = "Production Overview";
		$this->template->load('plant_information/administrator_index', 'plant_information/production/prod_overview', $load); 
    }
    
}