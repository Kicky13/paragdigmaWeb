<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class sales extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('Template');
    }
	
    function index() {
		redirect('sales_dashboard/volume'); 
		exit;
    }
}