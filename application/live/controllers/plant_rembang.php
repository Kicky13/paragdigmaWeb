<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class plant_rembang extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->auth->GetSesionLogin();
        $this->load->library('Template');
        $this->load->library('plant_link');
        $this->load->model('Mplant_rembang');
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
        $load['Title'] = "Production Plant Rembang";
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
        $load['DProduction'] = $this->Mplant_rembang->GetProduction($thn);
        $load['myData'] = $this->Mplant_rembang->getProdFinishMill($thn);
        $load['rkap_cement'] = $this->Mplant_rembang->getRKAPCementPlant($thn);
        $this->template->load('plant_information/administrator_index', 'plant_information/rembang/prod_semen', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/rembang/prod_semen', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/rembang/prod_semen', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/rembang/prod_semen', $load);
        // }
    }

    function klin_semen() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Clinker Plant Rembang";
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
        $load['DProduction'] = $this->Mplant_rembang->GetProduction($thn);
        $load['klinData'] = $this->Mplant_rembang->getProdKlinker($thn);
        $load['rkap_klin'] = $this->Mplant_rembang->getRKAPClinkerPlant($thn);
        $this->template->load('plant_information/administrator_index', 'plant_information/rembang/prod_klinker', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/rembang/prod_klinker', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/rembang/prod_klinker', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/rembang/prod_klinker', $load);
        // }
    }

    function overview() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Overview Plant Rembang";
        $load['li_active'] = $this->plant_link->plant_overview('gresik', 'overview');
            $this->template->load('plant_information/administrator_index', 'plant_information/rembang/overview_plant', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/rembang/overview_plant', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/rembang/overview_plant', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/rembang/overview_plant', $load);
        // }
    }

    function stock() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Stock Plant Rembang";
        $load['li_active'] = $this->plant_link->plant_stock('gresik', 'stock');
            $this->template->load('plant_information/administrator_index', 'plant_information/rembang/stock_plant', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/rembang/stock_plant', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/rembang/stock_plant', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/rembang/stock_plant', $load);
        // }
    }

    function emission() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Emission Plant Rembang";
        $load['li_active'] = $this->plant_link->plant_emission('gresik', 'emission');

            $this->template->load('plant_information/administrator_index', 'plant_information/rembang/emission', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/rembang/emission', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/rembang/emission', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/rembang/emission', $load);
        // }
    }

    function maintenance() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Maintenance Page Plant Rembang";
        $load['li_active'] = $this->plant_link->plant_stock('gresik', 'maintenance');

            $this->template->load('plant_information/administrator_index', 'plant_information/rembang/maintenance', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/rembang/maintenance', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/rembang/maintenance', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/rembang/maintenance', $load);
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
            $this->template->load('plant_information/administrator_index', 'plant_information/rembang/dash_prod_semen', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/rembang/dash_prod_semen', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/rembang/dash_prod_semen', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/rembang/dash_prod_semen', $load);
        // }
    }

    function analysis() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Analysis Plant Rembang";
        $load['li_active'] = $this->plant_link->plant_stock('gresik', '');
            $this->template->load('plant_information/administrator_index', 'plant_information/rembang/analysis', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/rembang/analysis', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/rembang/analysis', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/rembang/analysis', $load);
        // }
    }

    function packer_plant() {
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Packer Plant Rembang";
        $load['li_active'] = $this->plant_link->plant_overview('gresik', 'overview');
            $this->template->load('plant_information/administrator_index', 'plant_information/rembang/packer', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/rembang/packer', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/rembang/packer', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/rembang/packer', $load);
        // }
    }

    function data_mass_rembang() {
        include_once ( APPPATH . "libraries/Excel_Reader.php");
        $this->load->library('Excel');
        $this->load->library('ExportExcel');
        
        $datax = array();
        $data = array();

        if (isset($_POST['Upload'])) {
            $allowedExts = "xls";
            $extension = end(explode(".", $_FILES["file"]["name"]));
            if ($extension == $allowedExts) {
                $pecah = $_FILES["file"]["name"];
                $pecahTanda = explode("_", $pecah);

                $cell = new Spreadsheet_Excel_Reader($_FILES['file']['tmp_name']);
                
                $obj = PHPExcel_IOFactory::createReader('Excel2007');
                $objPHPExcel = $obj->load($_FILES['file']['tmp_name']);
//                $highestColumm = $objPHPExcel->setActiveSheetIndex(0)->getHighestColumn();
                $highestRow = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
                
                $jumlah_row = $cell->rowcount($sheet_index = 0);
                $row_count = $cell->rowcount($sheet_index = 0);

                $data['tahun'] = $cell->val(4, 3);
                $data['bulan'] = $cell->val(5, 3);
                $month_prod = $data['tahun'] . '-' . $data['bulan'];

                // Notes 
                $arr_notes = array();
                for ($col = 11; $col <= 14; $col++) {
                    for ($row = 11; $row <= $jumlah_row; $row++) {
                        array_push($arr_notes, array(
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

                // Good
                $arr_good = array();
                for ($row = 11; $row <= 16; $row++) {
                    array_push($arr_good, array(
                        "MONTH_PROD" => $month_prod,
                        "OPCO" => 5000,
                        "PLANT" => 'rmb1',
                        "CONDITION" => 'GOOD',
                        "MACHINE" => $cell->val($row, 3),
                        "COUNT" => $cell->val($row, 4)
                    ));
                }
                
                // Low Risk
                $arr_lowrisk = array();
                for ($row = 11; $row <= 16; $row++) {
                    array_push($arr_lowrisk, array(
                        "MONTH_PROD" => $month_prod,
                        "OPCO" => 5000,
                        "PLANT" => 'rmb1',
                        "CONDITION" => 'LOW_RISK',
                        "MACHINE" => $cell->val($row, 3),
                        "COUNT" => $cell->val($row, 5)
                    ));
                }
                
                // Med Risk
                $arr_medrisk = array();
                for ($row = 11; $row <= 16; $row++) {
                    array_push($arr_medrisk, array(
                        "MONTH_PROD" => $month_prod,
                        "OPCO" => 5000,
                        "PLANT" => 'rmb1',
                        "CONDITION" => 'MED_RISK',
                        "MACHINE" => $cell->val($row, 3),
                        "COUNT" => $cell->val($row, 6)
                    ));
                }
                
                // High Risk
                $arr_highrisk = array();
                for ($row = 11; $row <= 16; $row++) {
                    array_push($arr_highrisk, array(
                        "MONTH_PROD" => $month_prod,
                        "OPCO" => 5000,
                        "PLANT" => 'rmb1',
                        "CONDITION" => 'MED_RISK',
                        "MACHINE" => $cell->val($row, 3),
                        "COUNT" => $cell->val($row, 7)
                    ));
                }

                echo '<pre>';
                print_r($highestRow);
//                foreach ($arr_notes as $value) {
//                    $this->Mplant_administrator->x_tlcc_kiln_count($value);
//                }
            }
        }
    }

    function maintenance_insp() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $load['Title'] = "Inspection Plant Rembang";
        $load['li_active'] = $this->plant_link->plant_stock('gresik', 'maintenance');

            $this->template->load('plant_information/administrator_index', 'plant_information/rembang/maintenance_insp', $load);
        // if ($level == 1) {
        //     $this->template->load('plant_information/administrator_index', 'plant_information/rembang/maintenance_insp', $load);
        // } elseif ($level == 2) {
        //     $this->template->load('plant_information/operator_index', 'plant_information/rembang/maintenance_insp', $load);
        // } elseif ($level == 3) {
        //     $this->template->load('plant_information/home_index', 'plant_information/rembang/maintenance_insp', $load);
        // }
    }

}
