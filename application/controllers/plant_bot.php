<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class plant_bot extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->auth->GetSesionLogin();
        $this->load->library('Template');
        $this->load->library('plant_link');
    }
    
    public function index() {
        $this->load->view('plant_information/bot_info/bot_equipstat');
    }
}