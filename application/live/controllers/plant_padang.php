<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class plant_padang extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->auth->GetSesionLogin();
        $this->load->library('Template');
        $this->load->library('plant_link');
        $this->load->model('Mplant_padang');
    }

    function production() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Plant System";
//        $tahun = $this->input->get('tahun');
        $tahunsementara = $this->input->get('input');
        if (empty($tahunsementara['tahun'])) {
            $tahunsementara['tahun'] = date('Y');
        }
        $tahun = $tahunsementara['tahun'];
        
        $tahunx = !empty($tahun) ? $tahun : date('Y');
        $load['thn'] = $tahunx;
        $thn = $tahunx;
        
        $load['li_active'] = "$('#li_group').addClass('active');";
        $load['li_active'] = $this->plant_link->plant_production('system', 'klin_semen?tahun=2016');
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
        //     $this->template->load('plant_information/administrator_index', 'plant_information/utama/dashboard_semen', $load);
        // }elseif($level == 2){
        //     $this->template->load('plant_information/operator_index', 'plant_information/utama/dashboard_semen', $load);
        // }elseif($level == 3){
        //     $this->template->load('plant_information/home_index', 'plant_information/utama/dashboard_semen', $load);
        // }
            
    }

    function prod_semen() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Production Plant Padang";
//        $tahun = $this->input->get('tahun');
        $tahunsementara = $this->input->get('input');
        if (empty($tahunsementara['tahun'])) {
            $tahunsementara['tahun'] = date('Y');
        }
        $tahun = $tahunsementara['tahun'];
        
        $tahunx = !empty($tahun) ? $tahun : date('Y');
        $load['thn'] = $tahunx;
        $thn = $tahunx;
        
        $load['li_active'] = $this->plant_link->plant_production('padang', 'prod_semen');
        $load['DProduction'] = $this->Mplant_padang->GetProduction($thn);
        $load['myData'] = $this->Mplant_padang->getProdFinishMill($thn);
        $load['rkap_cement'] = $this->Mplant_padang->getRKAPCementPlant($thn);
        $this->template->load('plant_information/administrator_index', 'plant_information/padang/prod_semen', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/padang/prod_semen', $load);
        // }elseif($level == 2){
        //     $this->template->load('plant_information/operator_index', 'plant_information/padang/prod_semen', $load);
        // }elseif($level == 3){
        //     $this->template->load('plant_information/home_index', 'plant_information/padang/prod_semen', $load);
        // }
            
    }

    function klin_semen() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Clinker Plant Padang";
//        $tahun = $this->input->get('tahun');
        $tahunsementara = $this->input->get('input');
        if (empty($tahunsementara['tahun'])) {
            $tahunsementara['tahun'] = date('Y');
        }
        $tahun = $tahunsementara['tahun'];
        
        $tahunx = !empty($tahun) ? $tahun : date('Y');
        $load['thn'] = $tahunx;
        $thn = $tahunx;
        
        $load['li_active'] = $this->plant_link->plant_production('padang', 'prod_semen');
        $load['DProduction'] = $this->Mplant_padang->GetProduction($thn);
        $load['klinData'] = $this->Mplant_padang->getProdKlinker($thn);
        $load['rkap_klin'] = $this->Mplant_padang->getRKAPClinkerPlant($thn);
        $this->template->load('plant_information/administrator_index', 'plant_information/padang/prod_klinker', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/padang/prod_klinker', $load);
        // }elseif($level == 2){
        //     $this->template->load('plant_information/operator_index', 'plant_information/padang/prod_klinker', $load);
        // }elseif($level == 3){
        //     $this->template->load('plant_information/home_index', 'plant_information/padang/prod_klinker', $load);
        // }
            
    }
    
    function prod_semenChart() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Production Plant Padang";
        $load['li_active'] = $this->plant_link->plant_production('padang', 'prod_semen');
        $load['DProduction'] = $this->Mplant_padang->GetProduction($thn);
            $this->template->load('plant_information/administrator_index', 'plant_information/padang/prod_semenChart', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/padang/prod_semenChart', $load);
        // }elseif($level == 2){
        //     $this->template->load('plant_information/operator_index', 'plant_information/padang/prod_semenChart', $load);
        // }elseif($level == 3){
        //     $this->template->load('plant_information/home_index', 'plant_information/padang/prod_semenChart', $load);
        // }
    }

    function prod_lime() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Produksi Semen Padang";
        $load['li_active'] = $this->plant_link->plant_production('padang', 'prod_semen');
        $load['DProduction'] = $this->Mplant_padang->GetProduction($thn);
            $this->template->load('plant_information/administrator_index', 'plant_information/padang/prod_lime', $load);
//         if ($level == 1) {
//             $this->template->load('plant_information/administrator_index', 'plant_information/padang/prod_lime', $load);
//         }elseif($level == 2){
//             $this->template->load('plant_information/operator_index', 'plant_information/padang/prod_lime', $load);
// //            $this->template->load('plant_information/administrator_index', 'plant_information/padang/prod_semenChart', $load);
//         }elseif($level == 3){
//             $this->template->load('plant_information/home_index', 'plant_information/padang/prod_lime', $load);
// //            $this->template->load('plant_information/administrator_index', 'plant_information/padang/prod_semenChart', $load);
//         }
            
    }

    function prod_limeChart() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Produksi Semen Padang";
        $load['li_active'] = $this->plant_link->plant_production('padang', 'prod_semen');
        $load['DProduction'] = $this->Mplant_padang->GetProduction($thn);
            $this->template->load('plant_information/administrator_index', 'plant_information/padang/prod_limeChart', $load);
//         if ($level == 1) {
//             $this->template->load('plant_information/administrator_index', 'plant_information/padang/prod_limeChart', $load);
//         }elseif($level == 2){
// //            $this->template->load('plant_information/administrator_index', 'plant_information/padang/prod_lime', $load);
//           $this->template->load('plant_information/operator_index', 'plant_information/padang/prod_limeChart', $load);
//         }elseif($level == 3){
// //            $this->template->load('plant_information/administrator_index', 'plant_information/padang/prod_lime', $load);
//           $this->template->load('plant_information/home_index', 'plant_information/padang/prod_limeChart', $load);
//         }
            
    }

    function prod_rawmix() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Produksi Semen Padang";
        $load['li_active'] = $this->plant_link->plant_production('padang', 'prod_semen');
        $load['DProduction'] = $this->Mplant_padang->GetProduction($thn);
            $this->template->load('plant_information/administrator_index', 'plant_information/padang/prod_rawmix', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/padang/prod_rawmix', $load);
        // }elseif($level == 2){
        //     $this->template->load('plant_information/operator_index', 'plant_information/padang/prod_rawmix', $load);
        // }elseif($level == 3){
        //     $this->template->load('plant_information/home_index', 'plant_information/padang/prod_rawmix', $load);
        // }
            
    }

    function prod_silica() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Produksi Semen Padang";
        $load['li_active'] = $this->plant_link->plant_production('padang', 'prod_semen');
        $load['DProduction'] = $this->Mplant_padang->GetProduction($thn);
            $this->template->load('plant_information/administrator_index', 'plant_information/padang/prod_silica', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/padang/prod_silica', $load);
        // }elseif($level == 2){
        //     $this->template->load('plant_information/operator_index', 'plant_information/padang/prod_silica', $load);
        // }elseif($level == 3){
        //     $this->template->load('plant_information/home_index', 'plant_information/padang/prod_silica', $load);
        // }
            
    }

    function prod_fineCoal() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Produksi Semen Padang";
        $load['li_active'] = $this->plant_link->plant_production('padang', 'prod_semen');
        $load['DProduction'] = $this->Mplant_padang->GetProduction($thn);
            $this->template->load('plant_information/administrator_index', 'plant_information/padang/prod_fineCoal', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/padang/prod_fineCoal', $load);
        // }elseif($level == 2){
        //     $this->template->load('plant_information/operator_index', 'plant_information/padang/prod_fineCoal', $load);
        // }elseif($level == 3){
        //     $this->template->load('plant_information/home_index', 'plant_information/padang/prod_fineCoal', $load);
        // }
    }

    function prod_silicaChart() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Produksi Semen Padang";
        $load['li_active'] = $this->plant_link->plant_production('padang', 'prod_semen');
        $load['DProduction'] = $this->Mplant_padang->GetProduction($thn);
            $this->template->load('plant_information/administrator_index', 'plant_information/padang/prod_silicaChart', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/padang/prod_silicaChart', $load);
        // }elseif($level == 2){
        //     $this->template->load('plant_information/operator_index', 'plant_information/padang/prod_silicaChart', $load);
        // }elseif($level == 3){
        //     $this->template->load('plant_information/home_index', 'plant_information/padang/prod_silicaChart', $load);
        // }
            
    }

    function overview() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Overview Plant Padang";
        $load['li_active'] = $this->plant_link->plant_overview('padang', 'overview');
            $this->template->load('plant_information/administrator_index', 'plant_information/padang/overview_plant_rev', $load);
        // if ($level ==1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/padang/overview_plant_rev', $load);
        // }elseif($level == 2){
        //     $this->template->load('plant_information/operator_index', 'plant_information/padang/overview_plant_rev', $load);
        // }elseif($level == 3){
        //     $this->template->load('plant_information/home_index', 'plant_information/padang/overview_plant_rev', $load);
        // }
            
    }

    function overview_rev() {
        $load['OnOff'] = $this->Mplant_padang->data_onOff();
        $load['Analog'] = $this->Mplant_padang->data_Analog();
        $this->load->view('plant_information/padang/overview_plant_rev', $load);
    }

    function stock() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Stock Plant Padang";
        $load['li_active'] = $this->plant_link->plant_stock('padang', 'stock');
        
        $this->template->load('plant_information/administrator_index', 'plant_information/padang/stock_plant', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/padang/stock_plant', $load);
        // }elseif($level == 2){
        //     $this->template->load('plant_information/operator_index', 'plant_information/padang/stock_plant', $load);
        // }elseif($level == 3){
        //     $this->template->load('plant_information/home_index', 'plant_information/padang/stock_plant', $load);
        // }
    }

    function query() {
        $this->Mplant_padang->data_onOff();
    }

    function emission() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Emission Plant Padang";
        $load['li_active'] = $this->plant_link->plant_emission('padang', 'emission');
            $this->template->load('plant_information/administrator_index', 'plant_information/padang/emission_rev', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/padang/emission_rev', $load);
        // }elseif($level == 2){
        //     $this->template->load('plant_information/operator_index', 'plant_information/padang/emission_rev', $load);
        // }elseif($level == 3){
        //     $this->template->load('plant_information/home_index', 'plant_information/padang/emission_rev', $load);
        // }
    }

    function emission_rev() {
        $load['Analog'] = $this->Mplant_padang->data_Analog();
        $this->load->view('plant_information/padang/emission_rev', $load);
    }

    function maintenance() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Maintenance Page Plant Padang";
        $load['li_active'] = $this->plant_link->plant_stock('padang', 'maintenance');
            $this->template->load('plant_information/administrator_index', 'plant_information/padang/maintenance', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/padang/maintenance', $load);
        // }elseif($level == 2){
        //     $this->template->load('plant_information/operator_index', 'plant_information/padang/maintenance', $load);
        // }elseif($level == 3){
        //     $this->template->load('plant_information/home_index', 'plant_information/padang/maintenance', $load);
        // }
    }
    
    function analysis(){
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Analysis Plant Padang";
        $load['li_active'] = $this->plant_link->plant_stock('padang', '');
        
            $this->template->load('plant_information/administrator_index', 'plant_information/padang/analysis', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/padang/analysis', $load);
        // }elseif($level == 2){
        //     $this->template->load('plant_information/operator_index', 'plant_information/padang/analysis', $load);
        // }elseif($level == 3){
        //     $this->template->load('plant_information/home_index', 'plant_information/padang/analysis', $load);
        // }
    }
}