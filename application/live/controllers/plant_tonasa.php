<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class plant_tonasa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->auth->GetSesionLogin();
        $this->load->library('Template');
        $this->load->library('plant_link');
        $this->load->model('Mplant_tonasa');
    }

    function prod_semen() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Production Plant Tonasa";
//        $tahun = $this->input->get('tahun');
        $tahunsementara = $this->input->get('input');
        if (empty($tahunsementara['tahun'])) {
            $tahunsementara['tahun'] = date('Y');
        }
        $tahun = $tahunsementara['tahun'];
        
        $tahunx = !empty($tahun) ? $tahun : date('Y');
        $load['thn'] = $tahunx;
        $thn = $tahunx;
        $load['li_active'] = $this->plant_link->plant_production('tonasa', 'prod_semen?tahun=2016');
        $load['DProduction'] = $this->Mplant_tonasa->GetProduction($thn);
        $load['myData'] = $this->Mplant_tonasa->getProdFinisihMill($thn);
        $load['rkap_cement'] = $this->Mplant_tonasa->getRKAPCementPlant($thn);
            $this->template->load('plant_information/administrator_index', 'plant_information/tonasa/prod_semen', $load);
        // if ($level == 1) {
            // $this->template->load('plant_information/administrator_index', 'plant_information/tonasa/prod_semen', $load);
        // }elseif($level == 2){
            // $this->template->load('plant_information/operator_index', 'plant_information/tonasa/prod_semen', $load);
        // }elseif($level == 3){
            // $this->template->load('plant_information/home_index', 'plant_information/tonasa/prod_semen', $load);
        // }
            
    }

    function klin_semen() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Clinker Plant Tonasa";
//        $tahun = $this->input->get('tahun');
        $tahunsementara = $this->input->get('input');
        if (empty($tahunsementara['tahun'])) {
            $tahunsementara['tahun'] = date('Y');
        }
        $tahun = $tahunsementara['tahun'];
        
        $tahunx = !empty($tahun) ? $tahun : date('Y');
        $load['thn'] = $tahunx;
        $thn = $tahunx;
        $load['li_active'] = $this->plant_link->plant_production('tonasa', 'klin_semen?tahun=2016');
        $load['DProduction'] = $this->Mplant_tonasa->GetProduction($thn);
        $load['klinData'] = $this->Mplant_tonasa->getProdKlinker($thn);
        $load['rkap_klin'] = $this->Mplant_tonasa->getRKAPClinkerPlant($thn);
            $this->template->load('plant_information/administrator_index', 'plant_information/tonasa/prod_klinker', $load);
        // if ($level == 1) {
            // $this->template->load('plant_information/administrator_index', 'plant_information/tonasa/prod_klinker', $load);
        // }elseif($level == 2){
            // $this->template->load('plant_information/operator_index', 'plant_information/tonasa/prod_klinker', $load);
        // }elseif($level == 3){
            // $this->template->load('plant_information/home_index', 'plant_information/tonasa/prod_klinker', $load);
        // }
//            $this->template->load('plant_information/home_index', 'plant_information/tonasa/prod_klinker', $load);
    }

    function overview() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Overview Plant Tonasa";
        $load['li_active'] = $this->plant_link->plant_overview('tonasa', 'overview');
            $this->template->load('plant_information/administrator_index', 'plant_information/tonasa/overview_plant', $load);
        // if ($level == 1) {
            // $this->template->load('plant_information/administrator_index', 'plant_information/tonasa/overview_plant', $load);
        // }elseif($level ==2){
            // $this->template->load('plant_information/operator_index', 'plant_information/tonasa/overview_plant', $load);
//            $this->template->load('plant_information/administrator_index', 'plant_information/tonasa/prod_klinker', $load);
        // }elseif($level == 3){
            // $this->template->load('plant_information/home_index', 'plant_information/tonasa/overview_plant', $load);
//            $this->template->load('plant_information/administrator_index', 'plant_information/tonasa/prod_klinker', $load);
        // }
            
    }

    function stock() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Stock Plant Tonasa";
        $load['li_active'] = $this->plant_link->plant_stock('tonasa', 'stock');
            $this->template->load('plant_information/administrator_index', 'plant_information/tonasa/stock_plant', $load);
        // if ($level == 1) {
            // $this->template->load('plant_information/administrator_index', 'plant_information/tonasa/stock_plant', $load);
        // }elseif($level == 2){
            // $this->template->load('plant_information/operator_index', 'plant_information/tonasa/stock_plant', $load);
//            $this->template->load('plant_information/administrator_index', 'plant_information/tonasa/prod_klinker', $load);
        // }elseif($level == 3){
            // $this->template->load('plant_information/home_index', 'plant_information/tonasa/stock_plant', $load);
//            $this->template->load('plant_information/administrator_index', 'plant_information/tonasa/prod_klinker', $load);
        // }
            
    }

    function production() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Plant System";
        $load['li_active'] = "$('#li_group').addClass('active');";
        $load['li_active'] = $this->plant_link->plant_production('system', 'prod_semen?tahun=2016');
        $tahun = $this->input->get('tahun');
        $tahunx = !empty($tahun) ? $tahun : date('Y');
        $load['thn'] = $tahunx;
        $thn = $tahunx;
        $this->load->model('mdashboard_all');
        $load['data'] = $this->mdashboard_all->getProdUpToGresik($thn);
        $load['data_sp'] = $this->mdashboard_all->getProdUpToPadang($thn);
        $load['data_st'] = $this->mdashboard_all->getProdUpToTonasa($thn);
        $load['data_tl'] = $this->mdashboard_all->getProdUpToTLCC($thn);
        $load['rkap'] = $this->mdashboard_all->getProdRKAPGresik($thn);
        $load['rkap_sp'] = $this->mdashboard_all->getProdRKAPPadang($thn);
        $load['rkap_st'] = $this->mdashboard_all->getProdRKAPTonasa($thn);
        $load['rkap_tl'] = $this->mdashboard_all->getProdRKAPTLCC($thn);

        $load['rkap_cm'] = $this->mdashboard_all->getRKAPAll($thn);
        $load['datacm_sg'] = $this->mdashboard_all->getDBAllCementSG($thn);
        $load['datacm_sp'] = $this->mdashboard_all->getDBAllCementSP($thn);
        $load['datacm_st'] = $this->mdashboard_all->getDBAllCementST($thn);
        $load['datacm_tlcc'] = $this->mdashboard_all->getDBAllCementTLCC($thn);
            $this->template->load('plant_information/administrator_index', 'plant_information/utama/dashboard_semen', $load);
        // if ($level == 1) {
            // $this->template->load('plant_information/administrator_index', 'plant_information/utama/dashboard_semen', $load);
        // }elseif($level == 2){
            // $this->template->load('plant_information/operator_index', 'plant_information/utama/dashboard_semen', $load);
        // }elseif($level == 3){
            // $this->template->load('plant_information/home_index', 'plant_information/utama/dashboard_semen', $load);
        // }
            
    }

    function emission() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Emission Plant Tonasa";
        $load['li_active'] = $this->plant_link->plant_emission('tonasa', 'emission');
            $this->template->load('plant_information/administrator_index', 'plant_information/tonasa/emission', $load);
        // if ($level == 1) {
            // $this->template->load('plant_information/administrator_index', 'plant_information/tonasa/emission', $load);
        // }elseif($level == 2){
            // $this->template->load('plant_information/operator_index', 'plant_information/tonasa/emission', $load);
        // }elseif($level == 3){
            // $this->template->load('plant_information/home_index', 'plant_information/tonasa/emission', $load);
        // }
            
    }

    function maintenance() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Maintenance Page Plant Tonasa";
        $load['li_active'] = $this->plant_link->plant_emission('tonasa', 'maintenance');
            $this->template->load('plant_information/administrator_index', 'plant_information/tonasa/maintenance', $load);
        // if ($level == 1) {
            // $this->template->load('plant_information/administrator_index', 'plant_information/tonasa/maintenance', $load);
        // }elseif($level == 2){
            // $this->template->load('plant_information/operator_index', 'plant_information/tonasa/maintenance', $load);
        // }elseif($level == 3){
            // $this->template->load('plant_information/home_index', 'plant_information/tonasa/maintenance', $load);
        // }
            
    }
    
    function analysis() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Analysis Plant Tonasa";
        $load['li_active'] = $this->plant_link->plant_emission('tonasa', '');
            $this->template->load('plant_information/administrator_index', 'plant_information/tonasa/analysis', $load);
        // if ($level == 1) {
            // $this->template->load('plant_information/administrator_index', 'plant_information/tonasa/analysis', $load);
        // }elseif($level ==2){
            // $this->template->load('plant_information/operator_index', 'plant_information/tonasa/analysis', $load);
        // }elseif($level == 3){
            // $this->template->load('plant_information/home_index', 'plant_information/tonasa/analysis', $load);
        // }
            
    }
    
    function power_btg() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Overview Plant Tonasa";
        $load['li_active'] = $this->plant_link->plant_overview('tonasa', 'overview');
            $this->template->load('plant_information/administrator_index', 'plant_information/tonasa/power_btg', $load);
        // if ($level == 1) {
            // $this->template->load('plant_information/administrator_index', 'plant_information/tonasa/power_btg', $load);
        // }elseif($level ==2){
            // $this->template->load('plant_information/operator_index', 'plant_information/tonasa/power_btg', $load);
        // }elseif($level == 3){
            // $this->template->load('plant_information/home_index', 'plant_information/tonasa/power_btg', $load);
        // }
    }
    
    function load_shed() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Overview Plant Tonasa";
        $load['li_active'] = $this->plant_link->plant_overview('tonasa', 'overview');
            $this->template->load('plant_information/administrator_index', 'plant_information/tonasa/load_shed', $load);
        // if ($level == 1) {
            // $this->template->load('plant_information/administrator_index', 'plant_information/tonasa/load_shed', $load);
        // }elseif($level ==2){
            // $this->template->load('plant_information/operator_index', 'plant_information/tonasa/load_shed', $load);
        // }elseif($level == 3){
            // $this->template->load('plant_information/home_index', 'plant_information/tonasa/load_shed', $load);
        // }
    }
    
    function pltu_mon() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Overview Plant Tonasa";
        $load['li_active'] = $this->plant_link->plant_overview('tonasa', 'overview');
            $this->template->load('plant_information/administrator_index', 'plant_information/tonasa/dash_pltu', $load);
        // if ($level == 1) {
            // $this->template->load('plant_information/administrator_index', 'plant_information/tonasa/dash_pltu', $load);
        // }elseif($level ==2){
            // $this->template->load('plant_information/operator_index', 'plant_information/tonasa/dash_pltu', $load);
        // }elseif($level == 3){
            // $this->template->load('plant_information/home_index', 'plant_information/tonasa/dash_pltu', $load);
        // }
    }
}