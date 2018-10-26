<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class cogs extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->auth->GetSesionLogin();
        $this->load->library('Template');
        $this->load->model('m_cogs');
    }
	
    function trend()
    {
        $opco = $this->uri->segment(3);
        $level = $this->session->userdata('level');
        $load['opco'] = $opco;
		$this->template->load('plant_information/administrator_index', 'plant_information/cogs/trend', $load); 
    }
}