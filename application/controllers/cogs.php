<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class cogs extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->auth->GetSesionLogin();
        $this->db = $this->load->database('paradigma', TRUE);
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

    function loadAllTrend()
    {
        $data = $this->m_cogs->getAllTrend($this->input->post('opco'), $this->input->post('month'), $this->input->post('year'));
        echo json_encode($data);
    }

    function loadActualByMonthYear()
    {
        $data = $this->m_cogs->getActualByMonthYear($this->input->post('opco'), $this->input->post('month'), $this->input->post('year'));
        echo json_encode(array('data' => $data));
    }

    function getHeaderData()
    {
        $opco = $this->input->post('opco');
        $month = $this->input->post('month');
        $year = $this->input->post('year');
        $item = $this->getAllItem($opco, $year);
        $data = array(
            'item' => $item,
            'MoM' => $this->getAllMoM($opco, $month, $year),
            'YoY' => $this->getAllYoY($opco, $year),
            'actualRKAP' => $this->getAllActualRKAP($opco, $month, $year)
        );
        echo json_encode($data);
    }

    function getAllMoM($opco, $month, $year)
    {
        $data = $this->m_cogs->getAllMoM($opco, $month, $year);
        return $data;
    }

    function getAllYoY($opco, $year)
    {
        $data = $this->m_cogs->getAllYoY($opco, $year);
        return $data;
    }

    function getAllActualRKAP($opco, $month, $year)
    {
        $data = $this->m_cogs->getAllActualRKAP($opco, $month, $year);
        return $data;
    }

    function getAllItem($opco, $year)
    {
        $data = $this->m_cogs->getAllItem($opco, $year);
        return $data;
    }

    function testAPI()
    {
        $a = $this->input->post('opco');
        $b = $this->input->post('item');
        $c = $this->input->post('year');
        echo json_encode($this->m_cogs->getActualByYearItem($a, $b, $c));
    }

    function test()
    {
        echo json_encode($this->m_cogs->getTrendYearsBefore());
    }
}