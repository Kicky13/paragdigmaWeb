<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class crm extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('Template');
    }
	
    function index() {
        $level = $this->session->userdata('level');
		$kemasan = $this->uri->segment(3);
		if(empty($kemasan)){
			redirect('crm/index/40');
			exit;
		}
        $load['kemasan'] = $kemasan;
        $load['Title'] = "CRM";
		$this->template->load('plant_information/administrator_index', 'plant_information/crm/crm', $load); 
    }
}