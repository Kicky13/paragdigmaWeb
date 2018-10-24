<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class plant_gresik extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->auth->GetSesionLogin();
        $this->load->library('Template');
        $this->load->library('plant_link');
        $this->load->model('Mplant_gresik');
    }

    function production() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Production Chart : Cement";
        $load['li_active'] = $this->plant_link->plant_production('system', '');
//        $tahun = $this->input->get('tahun');
        $tahunsementara = $this->input->get('input');
        if (empty($tahunsementara['tahun'])) {
            $tahunsementara['tahun'] = date('Y');
        }
        $tahun = $tahunsementara['tahun'];

        $tahunx = !empty($tahun) ? $tahun : date('Y');
        $load['thn'] = $tahunx;
        $thn = $tahunx;

        $this->load->model('Mplant_gresik');
        $load['DProduction'] = $this->Mplant_gresik->GetProduction($thn);
        $load['myData'] = $this->Mplant_gresik->getProdFinishMill($thn);
        $load['rkap_cement'] = $this->Mplant_gresik->getRKAPCementPlant($thn);
        $load['klinData'] = $this->Mplant_gresik->getProdKlinker($thn);
        $load['rkap_klin'] = $this->Mplant_gresik->getRKAPClinkerPlant($thn);

        $this->load->model('Mplant_padang');
        $load['DProductionPD'] = $this->Mplant_padang->GetProduction($thn);
        $load['myDataPD'] = $this->Mplant_padang->getProdFinishMill($thn);
        $load['rkap_cementPD'] = $this->Mplant_padang->getRKAPCementPlant($thn);
        $load['klinDataPD'] = $this->Mplant_padang->getProdKlinker($thn);
        $load['rkap_klinPD'] = $this->Mplant_padang->getRKAPClinkerPlant($thn);

        $this->load->model('Mplant_tonasa');
        $load['DProductionTN'] = $this->Mplant_tonasa->GetProduction($thn);
        $load['myDataTN'] = $this->Mplant_tonasa->getProdFinisihMill($thn);
        $load['rkap_cementTN'] = $this->Mplant_tonasa->getRKAPCementPlant($thn);
        $load['klinDataTN'] = $this->Mplant_tonasa->getProdKlinker($thn);
        $load['rkap_klinTN'] = $this->Mplant_tonasa->getRKAPClinkerPlant($thn);

        $this->load->model('Mplant_tlcc');
        $load['DProductionTL'] = $this->Mplant_tlcc->GetProduction($thn);
        $load['myDataTL'] = $this->Mplant_tlcc->getProdFinishMill($thn);
        $load['rkap_cementTL'] = $this->Mplant_tlcc->getRKAPCementPlant($thn);
        $load['klinDataTL'] = $this->Mplant_tlcc->getProdKlinker($thn);

        $this->load->model('mdashboard_all');
        $load['data'] = $this->mdashboard_all->getProdUpToGresik($thn);
        $load['data_sp'] = $this->mdashboard_all->getProdUpToPadang($thn);
        $load['data_st'] = $this->mdashboard_all->getProdUpToTonasa($thn);
        $load['data_tl'] = $this->mdashboard_all->getProdUpToTLCC($thn);
        $load['rkap_sg_detail'] = $this->mdashboard_all->getProdRKAPGresikDetail($thn);
        $load['rkap_sp_detail'] = $this->mdashboard_all->getProdRKAPPadangDetail($thn);
        $load['rkap_st_detail'] = $this->mdashboard_all->getProdRKAPTonasaDetail($thn);
        $load['rkap_tlcc_detail'] = $this->mdashboard_all->getProdRKAPTLCCDetail($thn);

        $load['rkap_cm'] = $this->mdashboard_all->getRKAPAll($thn);
        $load['datacm_sg'] = $this->mdashboard_all->getDBAllCementSG($thn);
        $load['datacm_sp'] = $this->mdashboard_all->getDBAllCementSP($thn);
        $load['datacm_st'] = $this->mdashboard_all->getDBAllCementST($thn);
        $load['datacm_tlcc'] = $this->mdashboard_all->getDBAllCementTLCC($thn);

        $load['rkap'] = $this->mdashboard_all->getProdRKAPGresik($thn);
        $load['rkap_sp'] = $this->mdashboard_all->getProdRKAPPadang($thn);
        $load['rkap_st'] = $this->mdashboard_all->getProdRKAPTonasa($thn);
        $load['rkap_tl'] = $this->mdashboard_all->getProdRKAPTLCC($thn);
        $load['rkap_cl'] = $this->mdashboard_all->getRKAPAll($thn);

        $load['datacl_sg'] = $this->mdashboard_all->getDBAllClinkerSG($thn);
        $load['datacl_sp'] = $this->mdashboard_all->getDBAllClinkerSP($thn);
        $load['datacl_st'] = $this->mdashboard_all->getDBAllClinkerST($thn);
        $load['datacl_tlcc'] = $this->mdashboard_all->getDBAllClinkerTLCC($thn);
            $this->template->load('plant_information/administrator_index', 'plant_information/utama/dashboard_semen_chart', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/utama/dashboard_semen_chart', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/utama/dashboard_semen_chart', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/utama/dashboard_semen_chart', $load);
        // }
    }

    function prod_semen() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Production Plant Gresik";
//        $tahun = $this->input->get('tahun');
        $tahunsementara = $this->input->get('input');
        if (empty($tahunsementara['tahun'])) {
            $tahunsementara['tahun'] = date('Y');
        }
        $tahun = $tahunsementara['tahun'];

        $tahunx = !empty($tahun) ? $tahun : date('Y');
        $load['thn'] = $tahunx;
        $thn = $tahunx;

        $load['li_active'] = $this->plant_link->plant_production('gresik', 'prod_semen');
        $load['DProduction'] = $this->Mplant_gresik->GetProduction($thn);
        $load['myData'] = $this->Mplant_gresik->getProdFinishMill($thn);
        $load['rkap_cement'] = $this->Mplant_gresik->getRKAPCementPlant($thn);
        $this->template->load('plant_information/administrator_index', 'plant_information/gresik/prod_semen', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/gresik/prod_semen', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/gresik/prod_semen', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/gresik/prod_semen', $load);
        // }
    }

    function klin_semen() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Clinker Plant Gresik";
//        $tahun = $this->input->get('tahun');
        $tahunsementara = $this->input->get('input');
        if (empty($tahunsementara['tahun'])) {
            $tahunsementara['tahun'] = date('Y');
        }
        $tahun = $tahunsementara['tahun'];

        $tahunx = !empty($tahun) ? $tahun : date('Y');
        $load['thn'] = $tahunx;
        $thn = $tahunx;

        $load['li_active'] = $this->plant_link->plant_production('gresik', 'prod_semen');
        $load['DProduction'] = $this->Mplant_gresik->GetProduction($thn);
        $load['klinData'] = $this->Mplant_gresik->getProdKlinker($thn);
        $load['rkap_klin'] = $this->Mplant_gresik->getRKAPClinkerPlant($thn);
        $this->template->load('plant_information/administrator_index', 'plant_information/gresik/prod_klinker', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/gresik/prod_klinker', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/gresik/prod_klinker', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/gresik/prod_klinker', $load);
        // }
    }

    function overview() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Overview Plant Gresik";
        $load['li_active'] = $this->plant_link->plant_overview('gresik', 'overview');
        $load['OnOff'] = $this->Mplant_gresik->data_Plg();
            $this->template->load('plant_information/administrator_index', 'plant_information/gresik/overview_plant', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/gresik/overview_plant', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/gresik/overview_plant', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/gresik/overview_plant', $load);
        // }
    }

    function overview_rev() {
        $load['OnOff'] = $this->Mplant_gresik->data_Plg();
        $this->load->view('plant_information/gresik/overview_plant_rev', $load);
    }

    function stock() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Stock Plant Gresik";
        $load['li_active'] = $this->plant_link->plant_stock('gresik', 'stock');
        $load['OnOff'] = $this->Mplant_gresik->data_Plg();
            $this->template->load('plant_information/administrator_index', 'plant_information/gresik/stock_plant', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/gresik/stock_plant', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/gresik/stock_plant', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/gresik/stock_plant', $load);
        // }
    }

    function emission() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Emission Plant Gresik";
        $load['li_active'] = $this->plant_link->plant_emission('gresik', 'emission');
        $load['OnOff'] = $this->Mplant_gresik->data_Plg();
            $this->template->load('plant_information/administrator_index', 'plant_information/gresik/emission', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/gresik/emission', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/gresik/emission', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/gresik/emission', $load);
        // }
    }

    function portal_plant() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Test";
        $load['li_active'] = $this->plant_link->plant_overview('gresik', '');
        $this->load->model('mdashboard_all');
        $load['data_feednrun'] = $this->mdashboard_all->getRunAndProd();
            $this->template->load('plant_information/administrator_index', 'plant_information/gresik/dash-plant', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/gresik/dash-plant', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/gresik/dash-plant', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/gresik/dash-plant', $load);
        // }
    }

    function dash_semen() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Test";
        $load['li_active'] = $this->plant_link->plant_production('gresik', '');

        $tahun = $this->input->get('tahun');
        $tahunx = !empty($tahun) ? $tahun : date('Y');
        $load['thn'] = $tahunx;
        $thn = $tahunx;

        $load['DProduction'] = $this->Mplant_gresik->GetProduction($thn);
        $load['myData'] = $this->Mplant_gresik->getProdFinishMill($thn);
        $load['rkap_cement'] = $this->Mplant_gresik->getRKAPCementPlant($thn);

        $this->load->model('Mplant_padang');
        $load['DProductionPD'] = $this->Mplant_padang->GetProduction($thn);
        $load['myDataPD'] = $this->Mplant_padang->getProdFinishMill($thn);
        $load['rkap_cementPD'] = $this->Mplant_padang->getRKAPCementPlant($thn);

        $this->load->model('Mplant_tonasa');
        $load['DProductionTN'] = $this->Mplant_tonasa->GetProduction($thn);
        $load['myDataTN'] = $this->Mplant_tonasa->getProdFinisihMill($thn);
        $load['rkap_cementTN'] = $this->Mplant_tonasa->getRKAPCementPlant($thn);

        $this->load->model('Mplant_tlcc');
        $load['DProductionTL'] = $this->Mplant_tlcc->GetProduction($thn);
        $load['myDataTL'] = $this->Mplant_tlcc->getProdFinishMill($thn);
        $load['rkap_cementTL'] = $this->Mplant_tlcc->getRKAPCementPlant($thn);

        $this->load->model('mdashboard_all');
        $load['data'] = $this->mdashboard_all->getProdUpToGresik($thn);
        $load['data_sp'] = $this->mdashboard_all->getProdUpToPadang($thn);
        $load['data_st'] = $this->mdashboard_all->getProdUpToTonasa($thn);
        $load['data_tl'] = $this->mdashboard_all->getProdUpToTLCC($thn);
        $load['rkap_sg_detail'] = $this->mdashboard_all->getProdRKAPGresikDetail($thn);
        $load['rkap_sp_detail'] = $this->mdashboard_all->getProdRKAPPadangDetail($thn);
        $load['rkap_st_detail'] = $this->mdashboard_all->getProdRKAPTonasaDetail($thn);
        $load['rkap_tlcc_detail'] = $this->mdashboard_all->getProdRKAPTLCCDetail($thn);

        $load['rkap_cm'] = $this->mdashboard_all->getRKAPAll($thn);
        $load['datacm_sg'] = $this->mdashboard_all->getDBAllCementSG($thn);
        $load['datacm_sp'] = $this->mdashboard_all->getDBAllCementSP($thn);
        $load['datacm_st'] = $this->mdashboard_all->getDBAllCementST($thn);
        $load['datacm_tlcc'] = $this->mdashboard_all->getDBAllCementTLCC($thn);

        $load['rkap'] = $this->mdashboard_all->getProdRKAPGresik($thn);
        $load['rkap_sp'] = $this->mdashboard_all->getProdRKAPPadang($thn);
        $load['rkap_st'] = $this->mdashboard_all->getProdRKAPTonasa($thn);
        $load['rkap_tl'] = $this->mdashboard_all->getProdRKAPTLCC($thn);
        $load['rkap_cl'] = $this->mdashboard_all->getRKAPAll($thn);
        $load['datacl_sg'] = $this->mdashboard_all->getDBAllClinkerSG($thn);
        $load['datacl_sp'] = $this->mdashboard_all->getDBAllClinkerSP($thn);
        $load['datacl_st'] = $this->mdashboard_all->getDBAllClinkerST($thn);
        $load['datacl_tlcc'] = $this->mdashboard_all->getDBAllClinkerTLCC($thn);
            $this->template->load('plant_information/administrator_index', 'plant_information/gresik/dash_prod_semen', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/gresik/dash_prod_semen', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/gresik/dash_prod_semen', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/gresik/dash_prod_semen', $load);
        // }
    }

    function analysis() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Analysis Plant Gresik";
        $load['li_active'] = $this->plant_link->plant_stock('gresik', '');
            $this->template->load('plant_information/administrator_index', 'plant_information/gresik/analysis', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/gresik/analysis', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/gresik/analysis', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/gresik/analysis', $load);
        // }
    }

    function maintenance_insp() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Inspection Plant Gresik";
        $load['li_active'] = $this->plant_link->plant_stock('gresik', 'maintenance');

            $this->template->load('plant_information/administrator_index', 'plant_information/gresik/maintenance_insp', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/gresik/maintenance_insp', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/gresik/maintenance_insp', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/gresik/maintenance_insp', $load);
        // }
    }

    function maintenance_perf() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Performance Plant Gresik";
        $load['li_active'] = $this->plant_link->plant_stock('gresik', 'maintenance');

            $this->template->load('plant_information/administrator_index', 'plant_information/gresik/maintenance_perf', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/gresik/maintenance_perf', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/gresik/maintenance_perf', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/gresik/maintenance_perf', $load);
        // }
    }
    
    function maintenance_perf_tbl() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Performance Plant Gresik";
        $load['li_active'] = $this->plant_link->plant_stock('gresik', 'maintenance');

            $this->template->load('plant_information/administrator_index', 'plant_information/gresik/maintenance_perf_tbl', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/gresik/maintenance_perf_tbl', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/gresik/maintenance_perf_tbl', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/gresik/maintenance_perf_tbl', $load);
        // }
    }

    function maintenance_data() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Performance Data Plant Gresik";
        $load['li_active'] = $this->plant_link->plant_stock('gresik', 'maintenance');

            $this->template->load('plant_information/administrator_index', 'plant_information/gresik/maintenance_data', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/gresik/maintenance_data', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/gresik/maintenance_data', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/gresik/maintenance_data', $load);
        // }
    }

    function maintenance_insp_input() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Inspection Data Plant Gresik";
        $load['li_active'] = $this->plant_link->plant_stock('gresik', 'maintenance');

            $this->template->load('plant_information/administrator_index', 'plant_information/gresik/maintenance_insp_input', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/gresik/maintenance_insp_input', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/gresik/maintenance_insp_input', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/gresik/maintenance_insp_input', $load);
        // }
    }

    function backlog() {
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Backlog Data Plant Gresik";
        $load['li_active'] = $this->plant_link->plant_stock('gresik', 'maintenance');

            $this->template->load('plant_information/administrator_index', 'plant_information/gresik/backlog', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/gresik/backlog', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/gresik/backlog', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/gresik/backlog', $load);
        // }
    }

    function fmea() {
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Report Realisasi FMEA";
        $load['li_active'] = $this->plant_link->plant_stock('gresik', 'maintenance');

            $this->template->load('plant_information/administrator_index', 'plant_information/gresik/fmea', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/gresik/fmea', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/gresik/fmea', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/gresik/fmea', $load);
        // }
    }

    function maintenance_cost() {
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Maintenance Cost Plant Gresik";
        $load['li_active'] = $this->plant_link->plant_stock('gresik', 'maintenance');
            $this->template->load('plant_information/administrator_index', 'plant_information/gresik/maintenance_cost', $load);

        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/gresik/maintenance_cost', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/gresik/maintenance_cost', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/gresik/maintenance_cost', $load);
        // }
    }

    function maintenance_cost_input() {
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Maintenance Cost Input";
        $load['li_active'] = $this->plant_link->plant_stock('gresik', 'maintenance');

            $this->template->load('plant_information/administrator_index', 'plant_information/gresik/maintenance_cost_input', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/gresik/maintenance_cost_input', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/gresik/maintenance_cost_input', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/gresik/maintenance_cost_input', $load);
        // }
    }

    function data_mass_gresik() {
        include_once ( APPPATH . "libraries/Excel_Reader.php");
        $datax = array();
        $data = array();

        if (isset($_POST['Upload'])) {
            $allowedExts = "xls";
            $extension = end(explode(".", $_FILES["file"]["name"]));
            if ($extension == $allowedExts) {
                $pecah = $_FILES["file"]["name"];
                $pecahTanda = explode("_", $pecah);

                $cell = new Spreadsheet_Excel_Reader($_FILES['file']['tmp_name']);
                $jumlah_row = $cell->rowcount($sheet_index = 0);
                $row_count = $cell->rowcount($sheet_index = 0);

                $data['tahun'] = $cell->val(4, 3);
                $data['bulan'] = $cell->val(5, 3);
                $month_prod = $data['tahun'] . '-' . $data['bulan'];

                // Notes Tuban 1
                $arr_notes_tb1 = array();
                for ($col = 11; $col <= 14; $col++) {
                    for ($row = 11; $row <= $jumlah_row; $row++) {
                        array_push($arr_notes_tb1, array(
                            "MONTH_PROD" => $month_prod,
                            "OPCO" => 5000,
                            "PLANT" => 'rmb1',
                            "PROBLEM_ID" => $cell->val($row, 11),
                            "EQUIPMENT" => $cell->val($row, 12),
                            "PROBLEM_DESC" => $cell->val($row, 13),
                            "PROBLEM_SLTN" => $cell->val($row, 14)
                        ));
                    }
                }

                // Notes Tuban 2
                $arr_notes_tb2 = array();
                for ($col = 16; $col <= 19; $col++) {
                    for ($row = 11; $row <= $jumlah_row; $row++) {
                        array_push($arr_notes_tb2, array(
                            "MONTH_PROD" => $month_prod,
                            "OPCO" => 5000,
                            "PLANT" => 'rmb1',
                            "PROBLEM_ID" => $cell->val($row, 16),
                            "EQUIPMENT" => $cell->val($row, 17),
                            "PROBLEM_DESC" => $cell->val($row, 18),
                            "PROBLEM_SLTN" => $cell->val($row, 19)
                        ));
                    }
                }

                // Notes Tuban 3
                $arr_notes_tb3 = array();
                for ($col = 21; $col <= 24; $col++) {
                    for ($row = 11; $row <= $jumlah_row; $row++) {
                        array_push($arr_notes_tb3, array(
                            "MONTH_PROD" => $month_prod,
                            "OPCO" => 5000,
                            "PLANT" => 'rmb1',
                            "PROBLEM_ID" => $cell->val($row, 21),
                            "EQUIPMENT" => $cell->val($row, 22),
                            "PROBLEM_DESC" => $cell->val($row, 23),
                            "PROBLEM_SLTN" => $cell->val($row, 24)
                        ));
                    }
                }

                // Notes Tuban 4
                $arr_notes_tb4 = array();
                for ($col = 26; $col <= 29; $col++) {
                    for ($row = 11; $row <= $jumlah_row; $row++) {
                        array_push($arr_notes_tb4, array(
                            "MONTH_PROD" => $month_prod,
                            "OPCO" => 5000,
                            "PLANT" => 'rmb1',
                            "PROBLEM_ID" => $cell->val($row, 26),
                            "EQUIPMENT" => $cell->val($row, 27),
                            "PROBLEM_DESC" => $cell->val($row, 28),
                            "PROBLEM_SLTN" => $cell->val($row, 29)
                        ));
                    }
                }

                //============== TUBAN #1 ==============//
                // Good
                $arr_good_tb1 = array();
                for ($row = 11; $row <= 16; $row++) {
                    array_push($arr_good_tb1, array(
                        "MONTH_PROD" => $month_prod,
                        "OPCO" => 5000,
                        "PLANT" => 'rmb1',
                        "CONDITION" => 'GOOD',
                        "MACHINE" => $cell->val($row, 3),
                        "COUNT" => $cell->val($row, 4)
                    ));
                }

                // Low Risk
                $arr_lowrisk_tb1 = array();
                for ($row = 11; $row <= 16; $row++) {
                    array_push($arr_lowrisk_tb1, array(
                        "MONTH_PROD" => $month_prod,
                        "OPCO" => 5000,
                        "PLANT" => 'rmb1',
                        "CONDITION" => 'LOW_RISK',
                        "MACHINE" => $cell->val($row, 3),
                        "COUNT" => $cell->val($row, 5)
                    ));
                }

                // Med Risk
                $arr_medrisk_tb1 = array();
                for ($row = 11; $row <= 16; $row++) {
                    array_push($arr_medrisk_tb1, array(
                        "MONTH_PROD" => $month_prod,
                        "OPCO" => 5000,
                        "PLANT" => 'rmb1',
                        "CONDITION" => 'MED_RISK',
                        "MACHINE" => $cell->val($row, 3),
                        "COUNT" => $cell->val($row, 6)
                    ));
                }

                // High Risk
                $arr_highrisk_tb1 = array();
                for ($row = 11; $row <= 16; $row++) {
                    array_push($arr_highrisk_tb1, array(
                        "MONTH_PROD" => $month_prod,
                        "OPCO" => 5000,
                        "PLANT" => 'rmb1',
                        "CONDITION" => 'MED_RISK',
                        "MACHINE" => $cell->val($row, 3),
                        "COUNT" => $cell->val($row, 7)
                    ));
                }

                //============== TUBAN #2 ==============//
                // Good
                $arr_good_tb2 = array();
                for ($row = 23; $row <= 28; $row++) {
                    array_push($arr_good_tb2, array(
                        "MONTH_PROD" => $month_prod,
                        "OPCO" => 5000,
                        "PLANT" => 'rmb1',
                        "CONDITION" => 'GOOD',
                        "MACHINE" => $cell->val($row, 3),
                        "COUNT" => $cell->val($row, 4)
                    ));
                }

                // Low Risk
                $arr_lowrisk_tb2 = array();
                for ($row = 23; $row <= 28; $row++) {
                    array_push($arr_lowrisk_tb2, array(
                        "MONTH_PROD" => $month_prod,
                        "OPCO" => 5000,
                        "PLANT" => 'rmb1',
                        "CONDITION" => 'LOW_RISK',
                        "MACHINE" => $cell->val($row, 3),
                        "COUNT" => $cell->val($row, 5)
                    ));
                }

                // Med Risk
                $arr_medrisk_tb2 = array();
                for ($row = 23; $row <= 28; $row++) {
                    array_push($arr_medrisk_tb2, array(
                        "MONTH_PROD" => $month_prod,
                        "OPCO" => 5000,
                        "PLANT" => 'rmb1',
                        "CONDITION" => 'MED_RISK',
                        "MACHINE" => $cell->val($row, 3),
                        "COUNT" => $cell->val($row, 6)
                    ));
                }

                // High Risk
                $arr_highrisk_tb2 = array();
                for ($row = 23; $row <= 28; $row++) {
                    array_push($arr_highrisk_tb2, array(
                        "MONTH_PROD" => $month_prod,
                        "OPCO" => 5000,
                        "PLANT" => 'rmb1',
                        "CONDITION" => 'MED_RISK',
                        "MACHINE" => $cell->val($row, 3),
                        "COUNT" => $cell->val($row, 7)
                    ));
                }

                //============== TUBAN #3 ==============//
                // Good
                $arr_good_tb3 = array();
                for ($row = 36; $row <= 40; $row++) {
                    array_push($arr_good_tb3, array(
                        "MONTH_PROD" => $month_prod,
                        "OPCO" => 5000,
                        "PLANT" => 'rmb1',
                        "CONDITION" => 'GOOD',
                        "MACHINE" => $cell->val($row, 3),
                        "COUNT" => $cell->val($row, 4)
                    ));
                }

                // Low Risk
                $arr_lowrisk_tb3 = array();
                for ($row = 36; $row <= 40; $row++) {
                    array_push($arr_lowrisk_tb3, array(
                        "MONTH_PROD" => $month_prod,
                        "OPCO" => 5000,
                        "PLANT" => 'rmb1',
                        "CONDITION" => 'LOW_RISK',
                        "MACHINE" => $cell->val($row, 3),
                        "COUNT" => $cell->val($row, 5)
                    ));
                }

                // Med Risk
                $arr_medrisk_tb3 = array();
                for ($row = 36; $row <= 40; $row++) {
                    array_push($arr_medrisk_tb3, array(
                        "MONTH_PROD" => $month_prod,
                        "OPCO" => 5000,
                        "PLANT" => 'rmb1',
                        "CONDITION" => 'MED_RISK',
                        "MACHINE" => $cell->val($row, 3),
                        "COUNT" => $cell->val($row, 6)
                    ));
                }

                // High Risk
                $arr_highrisk_tb3 = array();
                for ($row = 36; $row <= 40; $row++) {
                    array_push($arr_highrisk_tb3, array(
                        "MONTH_PROD" => $month_prod,
                        "OPCO" => 5000,
                        "PLANT" => 'rmb1',
                        "CONDITION" => 'MED_RISK',
                        "MACHINE" => $cell->val($row, 3),
                        "COUNT" => $cell->val($row, 7)
                    ));
                }

                //============== TUBAN #4 ==============//
                // Good
                $arr_good_tb24 = array();
                for ($row = 48; $row <= 52; $row++) {
                    array_push($arr_good_tb4, array(
                        "MONTH_PROD" => $month_prod,
                        "OPCO" => 5000,
                        "PLANT" => 'rmb1',
                        "CONDITION" => 'GOOD',
                        "MACHINE" => $cell->val($row, 3),
                        "COUNT" => $cell->val($row, 4)
                    ));
                }

                // Low Risk
                $arr_lowrisk_tb4 = array();
                for ($row = 48; $row <= 52; $row++) {
                    array_push($arr_lowrisk_tb4, array(
                        "MONTH_PROD" => $month_prod,
                        "OPCO" => 5000,
                        "PLANT" => 'rmb1',
                        "CONDITION" => 'LOW_RISK',
                        "MACHINE" => $cell->val($row, 3),
                        "COUNT" => $cell->val($row, 5)
                    ));
                }

                // Med Risk
                $arr_medrisk_tb4 = array();
                for ($row = 48; $row <= 52; $row++) {
                    array_push($arr_medrisk_tb4, array(
                        "MONTH_PROD" => $month_prod,
                        "OPCO" => 5000,
                        "PLANT" => 'rmb1',
                        "CONDITION" => 'MED_RISK',
                        "MACHINE" => $cell->val($row, 3),
                        "COUNT" => $cell->val($row, 6)
                    ));
                }

                // High Risk
                $arr_highrisk_tb4 = array();
                for ($row = 48; $row <= 52; $row++) {
                    array_push($arr_highrisk_tb4, array(
                        "MONTH_PROD" => $month_prod,
                        "OPCO" => 5000,
                        "PLANT" => 'rmb1',
                        "CONDITION" => 'MED_RISK',
                        "MACHINE" => $cell->val($row, 3),
                        "COUNT" => $cell->val($row, 7)
                    ));
                }
                echo '<pre>';
                print_r($row_count);
//                foreach ($arr_notes as $value) {
//                    $this->Mplant_administrator->x_tlcc_kiln_count($value);
//                }
            }
        }
    }

    function maintenance_cost_upload() {
        include_once ( APPPATH . "libraries/Excel_Reader.php");
        if (isset($_POST['Upload'])) {
            $allowedExts = "xls";
            $extension = end(explode(".", $_FILES["file"]["name"]));
            if ($extension == $allowedExts) {
                $pecah = $_FILES["file"]["name"];
                $pecahTanda = explode("_", $pecah);

                $cell = new Spreadsheet_Excel_Reader($_FILES['file']['tmp_name']);
                $jumlah_row = $cell->rowcount($sheet_index = 0);
                $jumlah_col = $cell->colcount($sheet_index = 0);

                $arr_maint_cost = array();
                for ($row = 2; $row <= $jumlah_row; $row++) {
                    array_push($arr_maint_cost, array(
                        "POSTG_DATE" => $cell->val($row, 1),
                        "COST_CNTR" => strval($cell->val($row, 2)),
                        "COST_ELMNT" => strval($cell->val($row, 3)),
                        "COPART_OBJNAME" => $cell->val($row, 4),
                        "NAME" => $cell->val($row, 5),
                        "OBJ_CURR" => strval($cell->val($row, 6)),
                        "PART_ORDNO" => strval($cell->val($row, 7)),
                        "CE_DESC" => $cell->val($row, 8),
                        "CE_NAME" => $cell->val($row, 9),
                        "KELP_CE" => $cell->val($row, 10),
                        "DESC_CE" => $cell->val($row, 11),
                        "TAHUN" => strval($cell->val($row, 12)),
                        "MONTH" => strval($cell->val($row, 13)),
                        "JENIS_KEG" => $cell->val($row, 14),
                        "KEGIATAN" => $cell->val($row, 15),
                        "BU_5" => strval($cell->val($row, 16)),
                        "PLANT" => $cell->val($row, 17),
                        "AREA_PROC" => $cell->val($row, 18),
                        "BIAYA" => $cell->val($row, 19),
                        "KELP_NILAI" => $cell->val($row, 20),
                        "DEPART" => $cell->val($row, 21),
                        "UNIT_KERJA" => $cell->val($row, 22)
                    ));
                }
                foreach ($arr_maint_cost as $value) {
                    $this->Mplant_gresik->maintenance_cost_upload($value);
                }
            }
        }
    }
    
    function maintenance_cost_chart(){
        return  $this->Mplant_gresik->maintenance_cost_chart();
    }
    
    function maintenance_perf_data(){
        return  $this->Mplant_gresik->maintenance_perf_data();
    }
    
    function backlog_data(){
        return  $this->Mplant_gresik->backlog_data();
    }

}
