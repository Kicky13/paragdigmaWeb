<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class plant_tlcc extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('Template');
        $this->load->library('plant_link');
        $this->load->model('Mplant_tlcc');
    }

    function production() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Plant System";

        $tahun = $this->input->get('tahun');
        $tahunx = !empty($tahun) ? $tahun : date('Y');
        $load['thn'] = $tahunx;
        $thn = $tahunx;

        $load['li_active'] = "$('#li_group').addClass('active');";
        $load['li_active'] = $this->plant_link->plant_production('system', 'klin_semen');
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
        // } elseif ($level == 2) {
            // $this->template->load('plant_information/operator_index', 'plant_information/utama/dashboard_semen', $load);
//            $this->template->load('plant_information/administrator_index', 'plant_information/tlcc/prod_semen', $load);
        // } elseif ($level == 3) {
            // $this->template->load('plant_information/home_index', 'plant_information/utama/dashboard_semen', $load);
//            $this->template->load('plant_information/administrator_index', 'plant_information/tlcc/prod_semen', $load);
        // }
//            $this->template->load('plant_information/home_index', 'plant_information/utama/dashboard_semen', $load);
    }

    function prod_semen() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Production Plant TLCC";
//        $tahun = $this->input->get('tahun');
        $tahunsementara = $this->input->get('input');
        if (empty($tahunsementara['tahun'])) {
            $tahunsementara['tahun'] = date('Y');
        }
        $tahun = $tahunsementara['tahun'];
        
        $tahunx = !empty($tahun) ? $tahun : date('Y');
        $load['thn'] = $tahunx;
        $thn = $tahunx;

        $load['li_active'] = $this->plant_link->plant_production('tlcc', 'prod_semen');
        $load['DProduction'] = $this->Mplant_tlcc->GetProduction($thn);
        $load['myData'] = $this->Mplant_tlcc->getProdFinishMill($thn);
        $load['rkap_cement'] = $this->Mplant_tlcc->getRKAPCementPlant($thn);
            $this->template->load('plant_information/administrator_index', 'plant_information/tlcc/prod_semen', $load);
        // if ($level == 1) {
            // $this->template->load('plant_information/administrator_index', 'plant_information/tlcc/prod_semen', $load);
        // } elseif ($level == 2) {
            // $this->template->load('plant_information/operator_index', 'plant_information/tlcc/prod_semen', $load);
        // } elseif ($level == 3) {
            // $this->template->load('plant_information/home_index', 'plant_information/tlcc/prod_semen', $load);
        // }
    }

    function klin_semen() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Clinker Plant TLCC";
//        $tahun = $this->input->get('tahun');
        $tahunsementara = $this->input->get('input');
        if (empty($tahunsementara['tahun'])) {
            $tahunsementara['tahun'] = date('Y');
        }
        $tahun = $tahunsementara['tahun'];
        
        $tahunx = !empty($tahun) ? $tahun : date('Y');
        $load['thn'] = $tahunx;
        $thn = $tahunx;

        $load['li_active'] = $this->plant_link->plant_production('tlcc', 'klin_semen');
        $load['DProduction'] = $this->Mplant_tlcc->GetProduction($thn);
        $load['klinData'] = $this->Mplant_tlcc->getProdKlinker($thn);
		$this->template->load('plant_information/administrator_index', 'plant_information/tlcc/prod_klinker', $load);
        // if ($level == 1) {
            // $this->template->load('plant_information/administrator_index', 'plant_information/tlcc/prod_klinker', $load);
        // } elseif ($level == 2) {
            // $this->template->load('plant_information/operator_index', 'plant_information/tlcc/prod_klinker', $load);
//            $this->template->load('plant_information/administrator_index', 'plant_information/tlcc/emission', $load);
        // } elseif ($level == 3) {
            // $this->template->load('plant_information/home_index', 'plant_information/tlcc/prod_klinker', $load);
//            $this->template->load('plant_information/administrator_index', 'plant_information/tlcc/emission', $load);
        // }
    }

    function overview() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Overview Plant TLCC";
        $load['li_active'] = $this->plant_link->plant_overview('tlcc', 'overview');
            $this->template->load('plant_information/administrator_index', 'plant_information/tlcc/overview_plant', $load);
//         if ($level == 1) {
//             $this->template->load('plant_information/administrator_index', 'plant_information/tlcc/overview_plant', $load);
//         } elseif ($level == 2) {
//             $this->template->load('plant_information/operator_index', 'plant_information/tlcc/overview_plant', $load);
// //            $this->template->load('plant_information/administrator_index', 'plant_information/tlcc/emission', $load);
//         } elseif ($level == 3) {
//             $this->template->load('plant_information/home_index', 'plant_information/tlcc/overview_plant', $load);
// //            $this->template->load('plant_information/administrator_index', 'plant_information/tlcc/emission', $load);
//         }
    }

    function emission() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Emission Plant TLCC";
        $load['li_active'] = $this->plant_link->plant_emission('tlcc', 'emission');
            $this->template->load('plant_information/administrator_index', 'plant_information/tlcc/emission', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/tlcc/emission', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/tlcc/emission', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/tlcc/emission', $load);
        // }
    }

    function stock() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Stock Plant TLCC";
        $load['li_active'] = $this->plant_link->plant_stock('tlcc', 'stock');
            $this->template->load('plant_information/administrator_index', 'plant_information/tlcc/stock_plant', $load);
//         if ($level == 1) {
//             $this->template->load('plant_information/administrator_index', 'plant_information/tlcc/stock_plant', $load);
//         } elseif ($level == 2) {
//             $this->template->load('plant_information/operator_index', 'plant_information/tlcc/stock_plant', $load);
// //            $this->template->load('plant_information/administrator_index', 'plant_information/tlcc/analysis', $load);
//         } elseif ($level == 3) {
//             $this->template->load('plant_information/home_index', 'plant_information/tlcc/stock_plant', $load);
// //            $this->template->load('plant_information/administrator_index', 'plant_information/tlcc/analysis', $load);
//         }
    }

    function maintenance() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Maintenance Page Plant TLCC";
        $load['li_active'] = $this->plant_link->plant_stock('tlcc', 'maintenance');
            $this->template->load('plant_information/administrator_index', 'plant_information/tlcc/maintenance', $load);
//         if ($level == 1) {
//             $this->template->load('plant_information/administrator_index', 'plant_information/tlcc/maintenance', $load);
//         } elseif ($level == 2) {
//             $this->template->load('plant_information/operator_index', 'plant_information/tlcc/maintenance', $load);
// //            $this->template->load('plant_information/administrator_index', 'plant_information/tonasa/maintenance', $load);
//         } elseif ($level == 3) {
//             $this->template->load('plant_information/home_index', 'plant_information/tlcc/maintenance', $load);
// //            $this->template->load('plant_information/administrator_index', 'plant_information/tonasa/maintenance', $load);
//         }
// //            $this->template->load('plant_information/home_index', 'plant_information/tlcc/maintenance', $load);
    }

    function analysis() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Analysis Plant TLCC";
        $load['li_active'] = $this->plant_link->plant_stock('tlcc', '');
            $this->template->load('plant_information/administrator_index', 'plant_information/tlcc/analysis', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/tlcc/analysis', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/tlcc/analysis', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/tlcc/analysis', $load);
        // }
    }

}
