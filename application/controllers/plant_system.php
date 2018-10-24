<?php

defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class plant_system extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->auth->GetSesionLogin();
        $this->load->library('Template');
        $this->load->library('plant_link');
    }

    function index() {
        $load['Title'] = "Plant System";
        $this->load->model('mdashboard_all');
        $tahun = $this->input->get('tahun');
        $tahunx = !empty($tahun) ? $tahun : date('Y');
        $load['thn'] = $tahunx;
        $thn = $tahunx;

        $level = $this->session->userdata('level');

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

        $load['rkap'] = $this->mdashboard_all->getProdRKAPGresik($thn);
        $load['rkap_sp'] = $this->mdashboard_all->getProdRKAPPadang($thn);
        $load['rkap_st'] = $this->mdashboard_all->getProdRKAPTonasa($thn);
        $load['rkap_tl'] = $this->mdashboard_all->getProdRKAPTLCC($thn);
        $load['rkap_cl'] = $this->mdashboard_all->getRKAPAll($thn);
        $load['datacl_sg'] = $this->mdashboard_all->getDBAllClinkerSG($thn);
        $load['datacl_sp'] = $this->mdashboard_all->getDBAllClinkerSP($thn);
        $load['datacl_st'] = $this->mdashboard_all->getDBAllClinkerST($thn);
        $load['datacl_tlcc'] = $this->mdashboard_all->getDBAllClinkerTLCC($thn);
        
        $load['rkap_rb'] = $this->mdashboard_all->getProdRKAPRembang($thn);
        $load['data_rb'] = $this->mdashboard_all->getProdUpToRembang($thn);
        $load['rkap_rb_detail'] = $this->mdashboard_all->getProdRKAPRembangDetail($thn);
        $load['rkap_cm_rb'] = $this->mdashboard_all->getDBAllCementRembang($thn);
        $load['rkap_cl_rb'] = $this->mdashboard_all->getDBAllClinkerRembang($thn);
            $this->template->load('plant_information/administrator_index', 'plant_information/utama/production_dashboard', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/utama/production_dashboard', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/utama/production_dashboard', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/utama/production_dashboard', $load);
        // }
    }

    function admin() {
        $load['Title'] = "Plant System";
        $this->load->model('mdashboard_all');
        $tahun = $this->input->get('tahun');
        $tahunx = !empty($tahun) ? $tahun : date('Y');
        $load['thn'] = $tahunx;
        $thn = $tahunx;

        $level = $this->session->userdata('level');
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

        $load['rkap'] = $this->mdashboard_all->getProdRKAPGresik($thn);
        $load['rkap_sp'] = $this->mdashboard_all->getProdRKAPPadang($thn);
        $load['rkap_st'] = $this->mdashboard_all->getProdRKAPTonasa($thn);
        $load['rkap_tl'] = $this->mdashboard_all->getProdRKAPTLCC($thn);
        $load['rkap_cl'] = $this->mdashboard_all->getRKAPAll($thn);
        $load['datacl_sg'] = $this->mdashboard_all->getDBAllClinkerSG($thn);
        $load['datacl_sp'] = $this->mdashboard_all->getDBAllClinkerSP($thn);
        $load['datacl_st'] = $this->mdashboard_all->getDBAllClinkerST($thn);
        $load['datacl_tlcc'] = $this->mdashboard_all->getDBAllClinkerTLCC($thn);
        
        $load['rkap_rb'] = $this->mdashboard_all->getProdRKAPRembang($thn);
        $load['data_rb'] = $this->mdashboard_all->getProdUpToRembang($thn);
        $load['rkap_rb_detail'] = $this->mdashboard_all->getProdRKAPRembangDetail($thn);
        $load['rkap_cm_rb'] = $this->mdashboard_all->getDBAllCementRembang($thn);
        $load['rkap_cl_rb'] = $this->mdashboard_all->getDBAllClinkerRembang($thn);
        $this->template->load('plant_information/administrator_index', 'plant_information/utama/production_dashboard', $load);

        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/utama/production_dashboard', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/utama/production_dashboard', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/utama/production_dashboard', $load);
        // }
    }

    function operator() {
        $load['Title'] = "Plant System";
        $this->load->model('mdashboard_all');
        if (!empty($thn)) {
            $thn = $this->input->get('tahun');
        } else {
            $thn = date('Y');
        }
        $load['thn'] = $thn;
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

        $load['rkap'] = $this->mdashboard_all->getProdRKAPGresik($thn);
        $load['rkap_sp'] = $this->mdashboard_all->getProdRKAPPadang($thn);
        $load['rkap_st'] = $this->mdashboard_all->getProdRKAPTonasa($thn);
        $load['rkap_tl'] = $this->mdashboard_all->getProdRKAPTLCC($thn);
        $load['rkap_cl'] = $this->mdashboard_all->getRKAPAll($thn);
        $load['datacl_sg'] = $this->mdashboard_all->getDBAllClinkerSG($thn);
        $load['datacl_sp'] = $this->mdashboard_all->getDBAllClinkerSP($thn);
        $load['datacl_st'] = $this->mdashboard_all->getDBAllClinkerST($thn);
        $load['datacl_tlcc'] = $this->mdashboard_all->getDBAllClinkerTLCC($thn);
        
        $load['rkap_rb'] = $this->mdashboard_all->getProdRKAPRembang($thn);
        $load['data_rb'] = $this->mdashboard_all->getProdUpToRembang($thn);
        $load['rkap_rb_detail'] = $this->mdashboard_all->getProdRKAPRembangDetail($thn);
        $load['rkap_cm_rb'] = $this->mdashboard_all->getDBAllCementRembang($thn);
        $load['rkap_cl_rb'] = $this->mdashboard_all->getDBAllClinkerRembang($thn);
        
        $this->template->load('plant_information/operator_index', 'plant_information/utama/production_dashboard', $load);
    }

    function overview() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Plant System Overview";
        $load['li_active'] = $this->plant_link->plant_overview('gresik', 'overview');
        $this->load->model('Mplant_gresik');
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

    function stock() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Stock Plant Gresik";
        $this->load->model('Mplant_gresik');
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
        $load['Title'] = "Plant System Emission";
        $load['li_active'] = $this->plant_link->plant_emission('system', 'emission');
        $this->load->model('Mplant_gresik');
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

    function dashboard_semen() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Dashboard Group SMIG";
        $tahunsementara = $this->input->get('input');
        if (empty($tahunsementara['tahun'])) {
            $tahunsementara['tahun'] = date('Y');
        }
        $thn = $tahunsementara['tahun'];
        $load['thn'] = $thn;

        $this->load->model('mdashboard_all');
        $load['li_active'] = $this->plant_link->plant_production('system', 'dashboard_semen');
        $load['rkap'] = $this->mdashboard_all->getProdRKAPGresik($thn);
        $load['rkap_sp'] = $this->mdashboard_all->getProdRKAPPadang($thn);
        $load['rkap_st'] = $this->mdashboard_all->getProdRKAPTonasa($thn);
        $load['rkap_tl'] = $this->mdashboard_all->getProdRKAPTLCC($thn);
        $load['rkap_rb'] = $this->mdashboard_all->getProdRKAPRembang($thn);
        $load['rkap_cm'] = $this->mdashboard_all->getRKAPAll($thn);
        $load['datacm_sg'] = $this->mdashboard_all->getDBAllCementSG($thn);
        $load['datacm_rb'] = $this->mdashboard_all->getDBAllCementRembang($thn);
        $load['datacm_sp'] = $this->mdashboard_all->getDBAllCementSP($thn);
        $load['datacm_st'] = $this->mdashboard_all->getDBAllCementST($thn);
        $load['datacm_tlcc'] = $this->mdashboard_all->getDBAllCementTLCC($thn);
        $this->template->load('plant_information/administrator_index', 'plant_information/utama/dashboard_semen', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/utama/dashboard_semen', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/utama/dashboard_semen', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/utama/dashboard_semen', $load);
        // }
    }

    function dashboard_klin() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Dashboard Group SMIG";
        $tahunsementara = $this->input->get('input');
        if (empty($tahunsementara['tahun'])) {
            $tahunsementara['tahun'] = date('Y');
        }
        $thn = $tahunsementara['tahun'];
        $load['thn'] = $thn;

        $this->load->model('mdashboard_all');
        $load['li_active'] = $this->plant_link->plant_production('system', 'dashboard_klin');
        $load['rkap'] = $this->mdashboard_all->getProdRKAPGresik($thn);
        $load['rkap_sp'] = $this->mdashboard_all->getProdRKAPPadang($thn);
        $load['rkap_st'] = $this->mdashboard_all->getProdRKAPTonasa($thn);
        $load['rkap_tl'] = $this->mdashboard_all->getProdRKAPTLCC($thn);
        $load['rkap_cl'] = $this->mdashboard_all->getRKAPAll($thn);
        $load['datacl_sg'] = $this->mdashboard_all->getDBAllClinkerSG($thn);
        $load['datacl_sp'] = $this->mdashboard_all->getDBAllClinkerSP($thn);
        $load['datacl_st'] = $this->mdashboard_all->getDBAllClinkerST($thn);
        $load['datacl_tlcc'] = $this->mdashboard_all->getDBAllClinkerTLCC($thn);
        $this->template->load('plant_information/administrator_index', 'plant_information/utama/dashboard_klin', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/utama/dashboard_klin', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/utama/dashboard_klin', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/utama/dashboard_klin', $load);
        // }
    }

    function dashboard_all() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Dashboard Group SMIG";
        $tahun = $this->input->get('tahun');
        $tahunx = !empty($tahun) ? $tahun : date('Y');
        $load['thn'] = $tahunx;
        $thn = $tahunx;
        $this->load->model('mdashboard_all');
        $load['li_active'] = $this->plant_link->plant_dashboard('system', 'dashboard_all');

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

        $load['rkap'] = $this->mdashboard_all->getProdRKAPGresik($thn);
        $load['rkap_sp'] = $this->mdashboard_all->getProdRKAPPadang($thn);
        $load['rkap_st'] = $this->mdashboard_all->getProdRKAPTonasa($thn);
        $load['rkap_tl'] = $this->mdashboard_all->getProdRKAPTLCC($thn);
        $load['rkap_cl'] = $this->mdashboard_all->getRKAPAll($thn);
        $load['datacl_sg'] = $this->mdashboard_all->getDBAllClinkerSG($thn);
        $load['datacl_sp'] = $this->mdashboard_all->getDBAllClinkerSP($thn);
        $load['datacl_st'] = $this->mdashboard_all->getDBAllClinkerST($thn);
        $load['datacl_tlcc'] = $this->mdashboard_all->getDBAllClinkerTLCC($thn);
        
        $load['rkap_rb'] = $this->mdashboard_all->getProdRKAPRembang($thn);
        $load['data_rb'] = $this->mdashboard_all->getProdUpToRembang($thn);
        $load['rkap_rb_detail'] = $this->mdashboard_all->getProdRKAPRembangDetail($thn);
        $load['rkap_cm_rb'] = $this->mdashboard_all->getDBAllCementRembang($thn);
        $load['rkap_cl_rb'] = $this->mdashboard_all->getDBAllClinkerRembang($thn);
        $this->template->load('plant_information/administrator_index', 'plant_information/utama/production_dashboard', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/utama/production_dashboard', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/utama/production_dashboard', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/utama/production_dashboard', $load);
        // }
    }

    function portal_maintenance() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Maintenance Page Plant System";
        $load['li_active'] = $this->plant_link->plant_stock('gresik', 'maintenance');
        $this->template->load('plant_information/administrator_index', 'plant_information/utama/portal_maintenance', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/utama/portal_maintenance', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/utama/portal_maintenance', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/utama/portal_maintenance', $load);
        // }
    }

    function portal_plant() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Portal : Plant Overview";
        $load['li_active'] = $this->plant_link->plant_overview('gresik', '');
            $this->template->load('plant_information/administrator_index', 'plant_information/utama/portal_plant', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/utama/portal_plant', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/utama/portal_plant', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/utama/portal_plant', $load);
        // }
    }

    function portal_production() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Portal : Production Report";
        $load['li_active'] = $this->plant_link->plant_production('gresik', '');
            $this->template->load('plant_information/administrator_index', 'plant_information/utama/portal_production', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/utama/portal_production', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/utama/portal_production', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/utama/portal_production', $load);
        // }
    }

    function production() {
        /////////////session untuk pemisah menu user dan admin//////////////
		$opco = $this->uri->segment(3);
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Production Chart : Cement";
        $load['li_active'] = $this->plant_link->plant_production('system', '');

        $tahunsementara = $this->input->get('input');
        if (empty($tahunsementara['tahun'])) {
            $tahunsementara['tahun'] = date('Y');
        }
        $thn = $tahunsementara['tahun'];
        $load['thn'] = $thn;
        $this->load->model('Mplant_gresik');
        $load['DProduction'] = $this->Mplant_gresik->GetProduction($thn);
        $load['myData'] = $this->Mplant_gresik->getProdFinishMill($thn);
        $load['rkap_cement'] = $this->Mplant_gresik->getRKAPCementPlant($thn);
        $load['klinData'] = $this->Mplant_gresik->getProdKlinker($thn);
        $load['rkap_klin'] = $this->Mplant_gresik->getRKAPClinkerPlant($thn);

        $this->load->model('Mplant_rembang');
        $load['DProductionRB'] = $this->Mplant_rembang->GetProduction($thn);
        $load['myDataRB'] = $this->Mplant_rembang->getProdFinishMill($thn);
        $load['rkap_cementRB'] = $this->Mplant_rembang->getRKAPCementPlant($thn);
        $load['klinDataRB'] = $this->Mplant_rembang->getProdKlinker($thn);
        $load['rkap_klinRB'] = $this->Mplant_rembang->getRKAPClinkerPlant($thn);

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
        
        $load['rkap_rb'] = $this->mdashboard_all->getProdRKAPRembang($thn);
        $load['data_rb'] = $this->mdashboard_all->getProdUpToRembang($thn);
        $load['rkap_rb_detail'] = $this->mdashboard_all->getProdRKAPRembangDetail($thn);
        $load['rkap_cm_rb'] = $this->mdashboard_all->getDBAllCementRembang($thn);
        $load['rkap_cl_rb'] = $this->mdashboard_all->getDBAllClinkerRembang($thn);
		
        $load['opco'] = $opco;

            $this->template->load('plant_information/administrator_index', 'plant_information/utama/dashboard_semen_chart', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/utama/dashboard_semen_chart', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/utama/dashboard_semen_chart', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/utama/dashboard_semen_chart', $load);
        // }
    }

    function production_clinker() {
        /////////////session untuk pemisah menu user dan admin//////////////
		$opco = $this->uri->segment(3);
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Production Chart : Cement";
        $load['li_active'] = $this->plant_link->plant_production('system', '');

        $tahunsementara = $this->input->get('input');
        if (empty($tahunsementara['tahun'])) {
            $tahunsementara['tahun'] = date('Y');
        }
        $thn = $tahunsementara['tahun'];
        $load['thn'] = $thn;
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
        
        $this->load->model('Mplant_rembang');
        $load['DProductionRB'] = $this->Mplant_rembang->GetProduction($thn);
        $load['myDataRB'] = $this->Mplant_rembang->getProdFinishMill($thn);
        $load['rkap_cementRB'] = $this->Mplant_rembang->getRKAPCementPlant($thn);
        $load['klinDataRB'] = $this->Mplant_rembang->getProdKlinker($thn);
        $load['rkap_klinRB'] = $this->Mplant_rembang->getRKAPClinkerPlant($thn);

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
        $load['rkap_klinTL'] = $this->Mplant_tlcc->getRKAPClinkerPlant($thn);

        $this->load->model('mdashboard_all');
        $load['data'] = $this->mdashboard_all->getProdUpToGresik($thn);
        $load['data_sp'] = $this->mdashboard_all->getProdUpToPadang($thn);
        $load['data_st'] = $this->mdashboard_all->getProdUpToTonasa($thn);
        $load['data_tl'] = $this->mdashboard_all->getProdUpToTLCC($thn);
        $load['data_rb'] = $this->mdashboard_all->getProdUpToRembang($thn);
        $load['rkap_sg_detail'] = $this->mdashboard_all->getProdRKAPGresikDetail($thn);
        $load['rkap_sp_detail'] = $this->mdashboard_all->getProdRKAPPadangDetail($thn);
        $load['rkap_st_detail'] = $this->mdashboard_all->getProdRKAPTonasaDetail($thn);
        $load['rkap_tlcc_detail'] = $this->mdashboard_all->getProdRKAPTLCCDetail($thn);
        $load['rkap_rb_detail'] = $this->mdashboard_all->getProdRKAPRembangDetail($thn);

        $load['rkap_cm'] = $this->mdashboard_all->getRKAPAll($thn);
        $load['datacm_sg'] = $this->mdashboard_all->getDBAllCementSG($thn);
        $load['datacm_sp'] = $this->mdashboard_all->getDBAllCementSP($thn);
        $load['datacm_st'] = $this->mdashboard_all->getDBAllCementST($thn);
        $load['datacm_tlcc'] = $this->mdashboard_all->getDBAllCementTLCC($thn);
        $load['rkap_cm_rb'] = $this->mdashboard_all->getDBAllCementRembang($thn);

        $load['rkap'] = $this->mdashboard_all->getProdRKAPGresik($thn);
        $load['rkap_sp'] = $this->mdashboard_all->getProdRKAPPadang($thn);
        $load['rkap_st'] = $this->mdashboard_all->getProdRKAPTonasa($thn);
        $load['rkap_tl'] = $this->mdashboard_all->getProdRKAPTLCC($thn);
        $load['rkap_rb'] = $this->mdashboard_all->getProdRKAPRembang($thn);
        $load['rkap_cl'] = $this->mdashboard_all->getRKAPAll($thn);

        $load['datacl_sg'] = $this->mdashboard_all->getDBAllClinkerSG($thn);
        $load['datacl_sp'] = $this->mdashboard_all->getDBAllClinkerSP($thn);
        $load['datacl_st'] = $this->mdashboard_all->getDBAllClinkerST($thn);
        $load['datacl_tlcc'] = $this->mdashboard_all->getDBAllClinkerTLCC($thn);
        $load['rkap_cl_rb'] = $this->mdashboard_all->getDBAllClinkerRembang($thn);
		
        $load['opco'] = $opco;
        
            $this->template->load('plant_information/administrator_index', 'plant_information/utama/dashboard_klinker_chart', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/utama/dashboard_klinker_chart', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/utama/dashboard_klinker_chart', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/utama/dashboard_klinker_chart', $load);
        // }
    }

    public function inventory_data() {
        $level = $this->session->userdata('level');
        $load['Title'] = "Inventory Data";
    }
    
    // Run job get data from SAP in 1 month
    public function run_job() {
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/all_sap_table_truncate.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/pis_sap_cl_3000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/pis_sap_cl_4000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/pis_sap_cl_6000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/pis_sap_cl_7000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/pis_sap_cm_3000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/pis_sap_cm_4000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/pis_sap_cm_6000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/pis_sap_cm_7000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/pis_sap_rm_3000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/pis_sap_rm_4000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/pis_sap_rm_6000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/pis_sap_rm_7000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/all_job.php').'<br>';
    }
    
    public function run_job_sp(){
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/all_sap_table_truncate.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/pis_sap_cl_3000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/pis_sap_cm_3000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/pis_sap_rm_3000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/all_job.php').'<br>';
    }
    
    public function run_job_sg() {
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/all_sap_table_truncate.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/pis_sap_cl_7000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/pis_sap_cm_7000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/pis_sap_rm_7000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/all_job.php').'<br>';
    }
    
    public function run_job_st(){
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/all_sap_table_truncate.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/pis_sap_cl_4000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/pis_sap_cm_4000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/pis_sap_rm_4000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/all_job.php').'<br>';
    }
    
    public function run_job_tlcc() {
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/all_sap_table_truncate.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/pis_sap_cl_6000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/pis_sap_cm_6000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/pis_sap_rm_6000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_monthly/all_job.php').'<br>';
    }
    
    public function data_sap_all() {
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/all_sap_table_truncate.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/pis_sap_cl_3000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/pis_sap_cl_4000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/pis_sap_cl_5000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/pis_sap_cl_6000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/pis_sap_cl_7000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/pis_sap_cm_3000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/pis_sap_cm_4000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/pis_sap_cm_5000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/pis_sap_cm_6000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/pis_sap_cm_7000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/pis_sap_rm_3000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/pis_sap_rm_4000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/pis_sap_rm_5000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/pis_sap_rm_6000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/pis_sap_rm_7000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/all_job.php').'<br>';
    }
    
    public function data_sap_sp(){
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/all_sap_table_truncate.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/pis_sap_cl_3000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/pis_sap_cm_3000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/pis_sap_rm_3000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/all_sp_job.php').'<br>';
    }
    
    public function data_sap_sg() {
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/all_sap_table_truncate.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/pis_sap_cl_7000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/pis_sap_cm_7000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/pis_sap_rm_7000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/all_sg_job.php').'<br>';
    }
    
    public function data_sap_st(){
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/all_sap_table_truncate.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/pis_sap_cl_4000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/pis_sap_cm_4000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/pis_sap_rm_4000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/all_st_job.php').'<br>';
    }
    
    public function data_sap_tlcc() {
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/all_sap_table_truncate.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/pis_sap_cl_6000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/pis_sap_cm_6000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/pis_sap_rm_6000.php').'<br>';
        print file_get_contents('http://10.15.5.43/all_rfc/pis_prod_schedule/all_tlcc_job.php').'<br>';
    }

}
