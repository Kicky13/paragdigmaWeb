<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class plant_administrator extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->auth->GetSesionLogin();
        $this->load->library('Template');
        $this->load->library('plant_link');
        $this->load->model('Mplant_administrator');
    }

    // <editor-fold defaultstate="collapsed" desc="Administrator">

    function index() {
        $load['Title'] = "User Administrator";
        $this->template->load('plant_information/administrator_index', 'plant_information/administrator/FrmUserControl', $load);
    }

    function UserControl() {
        $this->load->view('plant_information/administrator/control_user');
    }

    function GetKaryawan() {
        $this->load->model('Mplant_administrator');
        $input = $this->input->post('input');
        $this->Mplant_administrator->ListKaryawan($input);
    }

    function GetKaryawanTerdaftar() {
        $this->load->model('Mplant_administrator');
        $this->Mplant_administrator->ListKaryawanTerdaftar();
    }

    function HapusUser() {
        $input = $this->input->post('ldapname');
        $this->load->model('Mplant_administrator');
        $this->Mplant_administrator->HapusKaryawanTerdaftar($input);
    }

    function SimpanUser() {
        $this->load->model('Mplant_administrator');
        $input['nopeg'] = $this->input->post('nopeg');
        $input['nama'] = $this->input->post('nama');
        $input['email'] = $this->input->post('email');
        $input['opco'] = $this->input->post('opco');
        $input['role'] = $this->input->post('role');
        $this->Mplant_administrator->SetKaryawabDaftar($input);
    }

    function UserMenuCreated() {
        $this->load->view('plant_information/administrator/control_menu');
    }

    // </editor-fold>
    //<editor-fold defaultstate="collapsed" desc="Chart Y-Axis">
    function editChartSeq() {
        $level = $this->session->userdata('level');
        $load['Title'] = "Edit Chart Axis";
        if ($level == 1) {
            $this->template->load('plant_information/administrator_index', 'plant_information/administrator/edit_chart_seq', $load);
        } elseif ($level == 2) {
            $this->template->load('plant_information/administrator_index', 'plant_information/administrator/edit_chart_seq', $load);
        } elseif ($level == 3) {
            $this->template->load('plant_information/administrator_index', 'plant_information/administrator/edit_chart_seq', $load);
        }
    }

    function editChartSeqCl() {
        $level = $this->session->userdata('level');
        $load['Title'] = "Edit Chart Axis";
        if ($level == 1) {
            $this->template->load('plant_information/administrator_index', 'plant_information/administrator/edit_chart_seq_cl', $load);
        } elseif ($level == 2) {
            $this->template->load('plant_information/administrator_index', 'plant_information/administrator/edit_chart_seq_cl', $load);
        } elseif ($level == 3) {
            $this->template->load('plant_information/administrator_index', 'plant_information/administrator/edit_chart_seq_cl', $load);
        }
    }

    function load_chart_cement() {
        $this->load->model('Mplant_administrator');
        $thn = $this->input->get('tahun');
        $tahun = !empty($thn) ? $thn : date('Y');

        return $this->Mplant_administrator->get_interval_cement($tahun);
    }

    function load_chart_clinker() {
        $this->load->model('Mplant_administrator');
        $thn = $this->input->get('tahun');
        $tahun = !empty($thn) ? $thn : date('Y');

        return $this->Mplant_administrator->get_interval_clinker($tahun);
    }

    function save_chart_cement($tahun) {
        $this->load->model('Mplant_administrator');
        $opco = $this->input->post('opco');
        $plant = $this->input->post('plant');
        $id_plant = $this->input->post('idplant');

        return $this->Mplant_administrator->save_interval_cement($tahun, $plant, $opco, $id_plant);
    }

    function save_chart_clinker($tahun) {
        $this->load->model('Mplant_administrator');
        $opco = $this->input->post('opco');
        $plant = $this->input->post('plant');
        $id_plant = $this->input->post('idplant');

        return $this->Mplant_administrator->save_interval_clinker($tahun, $plant, $opco, $id_plant);
    }

    function edit_seq_cement() {
        $level = $this->session->userdata('level');
        $load['a'] = "Manage Chart's X-Y";
        if ($level == 1) {
            $this->template->load('plant_information/administrator_index', 'plant_information/administrator/edit_chart_cement', $load);
        } elseif ($level == 2) {
            $this->template->load('plant_information/operator_index', 'plant_information/administrator/edit_chart_cement', $load);
        } elseif ($level == 3) {
            $this->template->load('plant_information/home_index', 'plant_information/administrator/edit_chart_cement', $load);
        }
    }

    function edit_seq_clinker() {
        $level = $this->session->userdata('level');
        $load['a'] = "Manage Chart's X-Y";
        if ($level == 1) {
            $this->template->load('plant_information/administrator_index', 'plant_information/administrator/edit_chart_cement', $load);
        } elseif ($level == 2) {
            $this->template->load('plant_information/operator_index', 'plant_information/administrator/edit_chart_cement', $load);
        } elseif ($level == 3) {
            $this->template->load('plant_information/home_index', 'plant_information/administrator/edit_chart_cement', $load);
        }
    }

    //</editor-fold>
    //<editor-fold defaultstate="collapsed" desc=Mass Upload Excel">
    function mass_upload_excel() {
        $level = $this->session->userdata('level');
        $load['a'] = "Mass Upload Excel";
        $load['Title'] = "Mass Upload Excel";
        if ($level == 1) {
            $this->template->load('plant_information/administrator_index', 'plant_information/administrator/mass_upload_excel', $load);
        } elseif ($level == 2) {
            $this->template->load('plant_information/operator_index', 'plant_information/administrator/mass_upload_excel', $load);
        } elseif ($level == 3) {
            $this->template->load('plant_information/home_index', 'plant_information/administrator/mass_upload_excel', $load);
        }
    }

    function mass_upload_padang() {
        $level = $this->session->userdata('level');
        $load['a'] = "Mass Upload Padang";
        $load['Title'] = "Mass Upload Padang";
        if ($level == 1) {
            $this->template->load('plant_information/administrator_index', 'plant_information/administrator/mass_upload_padang', $load);
        } elseif ($level == 2) {
            $this->template->load('plant_information/operator_index', 'plant_information/administrator/mass_upload_padang', $load);
        } elseif ($level == 3) {
            $this->template->load('plant_information/home_index', 'plant_information/administrator/mass_upload_padang', $load);
        }
    }

    function mass_upload_gresik() {
        $level = $this->session->userdata('level');
        $load['a'] = "Mass Upload Gresik";
        $load['Title'] = "Mass Upload Gresik";
        if ($level == 1) {
            $this->template->load('plant_information/administrator_index', 'plant_information/administrator/mass_upload_gresik', $load);
        } elseif ($level == 2) {
            $this->template->load('plant_information/operator_index', 'plant_information/administrator/mass_upload_gresik', $load);
        } elseif ($level == 3) {
            $this->template->load('plant_information/home_index', 'plant_information/administrator/mass_upload_gresik', $load);
        }
    }

    function mass_upload_tonasa() {
        $level = $this->session->userdata('level');
        $load['a'] = "Mass Upload Tonasa";
        $load['Title'] = "Mass Upload Tonasa";
        if ($level == 1) {
            $this->template->load('plant_information/administrator_index', 'plant_information/administrator/mass_upload_tonasa', $load);
        } elseif ($level == 2) {
            $this->template->load('plant_information/operator_index', 'plant_information/administrator/mass_upload_tonasa', $load);
        } elseif ($level == 3) {
            $this->template->load('plant_information/home_index', 'plant_information/administrator/mass_upload_tonasa', $load);
        }
    }

    function mass_upload_tlcc() {
        $level = $this->session->userdata('level');
        $load['a'] = "Mass Upload TLCC";
        $load['Title'] = "Mass Upload TLCC";
        if ($level == 1) {
            $this->template->load('plant_information/administrator_index', 'plant_information/administrator/mass_upload_tlcc', $load);
        } elseif ($level == 2) {
            $this->template->load('plant_information/operator_index', 'plant_information/administrator/mass_upload_tlcc', $load);
        } elseif ($level == 3) {
            $this->template->load('plant_information/home_index', 'plant_information/administrator/mass_upload_tlcc', $load);
        }
    }

    function mass_upload_rembang() {
        $level = $this->session->userdata('level');
        $load['a'] = "Mass Upload Rembang";
        $load['Title'] = "Mass Upload Rembang";
        if ($level == 1) {
            $this->template->load('plant_information/administrator_index', 'plant_information/administrator/mass_upload_rembang', $load);
        } elseif ($level == 2) {
            $this->template->load('plant_information/operator_index', 'plant_information/administrator/mass_upload_rembang', $load);
        } elseif ($level == 3) {
            $this->template->load('plant_information/home_index', 'plant_information/administrator/mass_upload_rembang', $load);
        }
    }

    function data_mass_padang() {
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
                $jumlah_col = $cell->colcount($sheet_index = 0);

                // KILN Stop Count
                $arr_kl_ops_count = array();
                for ($col = 2; $col <= 6; $col++) {
                    for ($row = 11; $row <= $jumlah_row; $row++) {
                        array_push($arr_kl_ops_count, array(
                            "DATE" => $cell->val($row, 1),
                            "PLANT" => $cell->val(10, $col),
                            "VALUE" => $cell->val($row, $col)
                        ));
                    }
                }

                foreach ($arr_kl_ops_count as $value) {
                    $this->Mplant_administrator->x_padang_kiln_count($value);
                }

                // KILN Stop Description
                $arr_kl_ops_desc = array();
                for ($col = 15; $col <= 19; $col++) {
                    for ($row = 11; $row <= $jumlah_row; $row++) {
                        array_push($arr_kl_ops_desc, array(
                            "DATE" => $cell->val($row, 1),
                            "PLANT" => $cell->val(10, $col),
                            "VALUE" => $cell->val($row, $col)
                        ));
                    }
                }

                foreach ($arr_kl_ops_desc as $value) {
                    $this->Mplant_administrator->x_padang_kiln_desc($value);
                }

                // FM Stop Count
                $arr_fm_ops_count = array();
                for ($col = 7; $col <= 14; $col++) {
                    for ($row = 11; $row <= $jumlah_row; $row++) {
                        array_push($arr_fm_ops_count, array(
                            "DATE" => $cell->val($row, 1),
                            "PLANT" => $cell->val(10, $col),
                            "VALUE" => $cell->val($row, $col)
                        ));
                    }
                }

                foreach ($arr_fm_ops_count as $value) {
                    $this->Mplant_administrator->x_padang_fm_count($value);
                }

                // FM Stop Description
                $arr_fm_ops_desc = array();
                for ($col = 20; $col <= 27; $col++) {
                    for ($row = 11; $row <= $jumlah_row; $row++) {
                        array_push($arr_fm_ops_desc, array(
                            "DATE" => $cell->val($row, 1),
                            "PLANT" => $cell->val(10, $col),
                            "VALUE" => $cell->val($row, $col)
                        ));
                    }
                }

                foreach ($arr_fm_ops_desc as $value) {
                    $this->Mplant_administrator->x_padang_fm_desc($value);
                }
                // Daily Prognose
                $arr_prognose = array();
                for ($row = 11; $row <= $jumlah_row; $row++) {
                    array_push($arr_prognose, array(
                        "DATE_PROD" => $cell->val($row, 1),
                        "KL2_PROD" => strval($cell->val($row, 28)),
                        "KL3_PROD" => strval($cell->val($row, 29)),
                        "KL4_PROD" => strval($cell->val($row, 30)),
                        "KL5_PROD" => strval($cell->val($row, 31)),
                        "KL6_PROD" => strval($cell->val($row, 32)),
                        "FM2_PROD" => strval($cell->val($row, 33)),
                        "FM3_PROD" => strval($cell->val($row, 34)),
                        "FM41_PROD" => strval($cell->val($row, 35)),
                        "FM42_PROD" => strval($cell->val($row, 36)),
                        "FM51_PROD" => strval($cell->val($row, 37)),
                        "FM52_PROD" => strval($cell->val($row, 38)),
                        "FMDM_PROD" => strval($cell->val($row, 39)),
                        "FM61_PROD" => strval($cell->val($row, 40))
                    ));
                }

                foreach ($arr_prognose as $value) {
//                    echo $value[''];
//                    $this->Mplant_administrator->x_padang_prognose($value);
                }

                $arr_stockdaily = array();
                for ($row = 11; $row <= $jumlah_row; $row++) {
                    array_push($arr_stockdaily, array(
                        "DATE_PROD" => strval($cell->val($row, 29)),
                        "SP_CM_IND1_SILOA" => strval($cell->val($row, 29)),
                        "SP_CM_IND1_SILOB" => strval($cell->val($row, 29)),
                        "SP_CM_IND234_SILO1" => strval($cell->val($row, 29)),
                        "SP_CM_IND234_SILO2" => strval($cell->val($row, 29)),
                        "SP_CM_IND234_SILO3" => strval($cell->val($row, 29)),
                        "SP_CM_IND234_SILO4" => strval($cell->val($row, 29)),
                        "SP_CM_IND234_SILO5" => strval($cell->val($row, 29)),
                        "SP_CM_IND234_SILO6" => strval($cell->val($row, 29)),
                        "SP_CM_IND234_SILO7" => strval($cell->val($row, 29)),
                        "SP_CM_IND234_SILO8" => strval($cell->val($row, 29)),
                        "SP_CM_IND5_SILO9" => strval($cell->val($row, 29)),
                        "SP_CM_IND5_SILO10" => strval($cell->val($row, 29)),
                        "SP_CM_IND5_SILO11" => strval($cell->val($row, 29)),
                        "SP_CM_IND5_SILO12" => strval($cell->val($row, 29)),
                        "SP_CM_TLB_SILO1" => strval($cell->val($row, 29)),
                        "SP_CM_TLB_SILO2" => strval($cell->val($row, 29)),
                        "SP_CM_TLB_SILO3" => strval($cell->val($row, 29)),
                        "SP_CM_TLB_SILO4" => strval($cell->val($row, 29)),
                        "SP_CM_TLB_SILO5" => strval($cell->val($row, 29)),
                        "SP_CM_TLB_SILO6" => strval($cell->val($row, 29)),
                        "SP_CM_TLB_SILO7" => strval($cell->val($row, 29)),
                        "SP_CM_TLB_SILO8" => strval($cell->val($row, 29)),
                        "SP_CM_TLB_SILO9" => strval($cell->val($row, 29)),
                        "SP_CL_COLDSTORAGE" => strval($cell->val($row, 29)),
                        "SP_CL_IND123" => strval($cell->val($row, 29)),
                        "SP_CL_IND4" => strval($cell->val($row, 29)),
                        "SP_CL_IND5" => strval($cell->val($row, 29)),
                        "SP_CL_DUMAI" => strval($cell->val($row, 29)),
                        "SP_CM_IND6_SILO13" => strval($cell->val($row, 29)),
                        "SP_CM_IND6_SILO14" => strval($cell->val($row, 29)),
                        "SP_CL_IND6" => strval($cell->val($row, 29))
                    ));
                }

                foreach ($arr_stockdaily as $value) {
//                    echo $value[''];
//                    $this->Mplant_administrator->x_padang_prognose($value);
                }
            } else {
                echo "<script>alert('Invalid file, Must be Excel 2003!!');</script>";
            }
        }
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
                $jumlah_col = $cell->colcount($sheet_index = 0);

                // KILN Stop Count
                $arr_kl_ops_count = array();
                for ($col = 2; $col <= 6; $col++) {
                    for ($row = 11; $row <= $jumlah_row; $row++) {
                        array_push($arr_kl_ops_count, array(
                            "DATE" => $cell->val($row, 1),
                            "PLANT" => $cell->val(10, $col),
                            "VALUE" => $cell->val($row, $col)
                        ));
                    }
                }

                foreach ($arr_kl_ops_count as $value) {
                    $this->Mplant_administrator->x_gresik_kiln_count($value);
                }

                // KILN Stop Description
                $arr_kl_ops_desc = array();
                for ($col = 15; $col <= 19; $col++) {
                    for ($row = 11; $row <= $jumlah_row; $row++) {
                        array_push($arr_kl_ops_desc, array(
                            "DATE" => $cell->val($row, 1),
                            "PLANT" => $cell->val(10, $col),
                            "VALUE" => $cell->val($row, $col)
                        ));
                    }
                }

                foreach ($arr_kl_ops_desc as $value) {
                    $this->Mplant_administrator->x_gresik_kiln_desc($value);
                }

                // FM Stop Count
                $arr_fm_ops_count = array();
                for ($col = 7; $col <= 14; $col++) {
                    for ($row = 11; $row <= $jumlah_row; $row++) {
                        array_push($arr_fm_ops_count, array(
                            "DATE" => $cell->val($row, 1),
                            "PLANT" => $cell->val(10, $col),
                            "VALUE" => $cell->val($row, $col)
                        ));
                    }
                }

                foreach ($arr_fm_ops_count as $value) {
                    $this->Mplant_administrator->x_gresik_fm_count($value);
                }

                // FM Stop Description
                $arr_fm_ops_desc = array();
                for ($col = 20; $col <= 27; $col++) {
                    for ($row = 11; $row <= $jumlah_row; $row++) {
                        array_push($arr_fm_ops_desc, array(
                            "DATE" => $cell->val($row, 1),
                            "PLANT" => $cell->val(10, $col),
                            "VALUE" => $cell->val($row, $col)
                        ));
                    }
                }

                foreach ($arr_fm_ops_desc as $value) {
                    $this->Mplant_administrator->x_gresik_fm_desc($value);
                }

                $arr_prognose = array();
                for ($row = 11; $row <= $jumlah_row; $row++) {
                    array_push($arr_prognose, array(
                        "DATE_PROD" => $cell->val($row, 1),
                        "KL1_PROD" => strval($cell->val($row, 28)),
                        "KL2_PROD" => strval($cell->val($row, 29)),
                        "KL3_PROD" => strval($cell->val($row, 30)),
                        "KL4_PROD" => strval($cell->val($row, 31)),
                        "FM1_PROD" => strval($cell->val($row, 33)),
                        "FM2_PROD" => strval($cell->val($row, 34)),
                        "FM3_PROD" => strval($cell->val($row, 35)),
                        "FM4_PROD" => strval($cell->val($row, 36)),
                        "FM5_PROD" => strval($cell->val($row, 37)),
                        "FM6_PROD" => strval($cell->val($row, 38)),
                        "FM7_PROD" => strval($cell->val($row, 39)),
                        "FM8_PROD" => strval($cell->val($row, 40)),
                        "FM9_PROD" => strval($cell->val($row, 40)),
                        "FMA_PROD" => strval($cell->val($row, 40)),
                        "FMB_PROD" => strval($cell->val($row, 40)),
                        "FMC_PROD" => strval($cell->val($row, 40)),
                        "FMCGD_PROD" => strval($cell->val($row, 40))
                    ));
                }

                foreach ($arr_prognose as $value) {
//                    echo $value[''];
//                    $this->Mplant_administrator->x_padang_prognose($value);
                }

                $arr_stockdaily = array();
                for ($row = 11; $row <= $jumlah_row; $row++) {
                    array_push($arr_stockdaily, array(
                        "DATE_PROD" => strval($cell->val($row, 29)),
                        "SG_CM_TBN1_SILO1" => strval($cell->val($row, 29)),
                        "SG_CM_TBN1_SILO2" => strval($cell->val($row, 29)),
                        "SG_CM_TBN1_SILO3" => strval($cell->val($row, 29)),
                        "SG_CM_TBN1_SILO4" => strval($cell->val($row, 29)),
                        "SG_CM_TBN2_SILO5" => strval($cell->val($row, 29)),
                        "SG_CM_TBN2_SILO6" => strval($cell->val($row, 29)),
                        "SG_CM_TBN2_SILO7" => strval($cell->val($row, 29)),
                        "SG_CM_TBN2_SILO8" => strval($cell->val($row, 29)),
                        "SG_CM_TBN3_SILO9" => strval($cell->val($row, 29)),
                        "SG_CM_TBN3_SILO10" => strval($cell->val($row, 29)),
                        "SG_CM_TBN3_SILO11" => strval($cell->val($row, 29)),
                        "SG_CM_TBN3_SILO12" => strval($cell->val($row, 29)),
                        "SG_CM_TBN4_SILO13" => strval($cell->val($row, 29)),
                        "SG_CM_TBN4_SILO14" => strval($cell->val($row, 29)),
                        "SG_CM_TBN4_SILO15" => strval($cell->val($row, 29)),
                        "SG_CM_TBN4_SILO16" => strval($cell->val($row, 29)),
                        "SG_CM_PORT_SILO1" => strval($cell->val($row, 29)),
                        "SG_CM_PORT_SILO2" => strval($cell->val($row, 29)),
                        "SG_CM_GRSS_SILO1" => strval($cell->val($row, 29)),
                        "SG_CM_GRSS_SILO2" => strval($cell->val($row, 29)),
                        "SG_CM_GRSS_SILO3" => strval($cell->val($row, 29)),
                        "SG_CM_GRSS_SILO4" => strval($cell->val($row, 29)),
                        "SG_CM_GRSS_SILO5" => strval($cell->val($row, 29)),
                        "SG_CM_GRSS_SILO6" => strval($cell->val($row, 29)),
                        "SG_CM_GRST_SILO1" => strval($cell->val($row, 29)),
                        "SG_CM_GRST_SILO2" => strval($cell->val($row, 29)),
                        "SG_CM_GRST_SILO3" => strval($cell->val($row, 29)),
                        "SG_CM_GRST_SILO4" => strval($cell->val($row, 29)),
                        "SG_CM_GRST_SILO5" => strval($cell->val($row, 29)),
                        "SG_CM_GRST_SILO6" => strval($cell->val($row, 29)),
                        "SG_CM_GRSU_SILO1" => strval($cell->val($row, 29)),
                        "SG_CM_GRSU_SILO2" => strval($cell->val($row, 29)),
                        "SG_CM_GRSU_SILO3" => strval($cell->val($row, 29)),
                        "SG_CM_GRSU_SILO4" => strval($cell->val($row, 29)),
                        "SG_CM_GRSU_SILO5" => strval($cell->val($row, 29)),
                        "SG_CM_GRSU_SILO6" => strval($cell->val($row, 29)),
                        "SG_CL_TBN1" => strval($cell->val($row, 29)),
                        "SG_CL_TBN2" => strval($cell->val($row, 29)),
                        "SG_CL_TBN3" => strval($cell->val($row, 29)),
                        "SG_CL_TBN4" => strval($cell->val($row, 29)),
                        "SG_CL_YARD" => strval($cell->val($row, 29)),
                        "SG_CL_GRS_SILOA" => strval($cell->val($row, 29)),
                        "SG_CL_GRS_SILOB" => strval($cell->val($row, 29)),
                        "SG_CL_GRS_SILOC" => strval($cell->val($row, 29)),
                        "SG_CL_GRS_YARD" => strval($cell->val($row, 29)),
                        "SG_CM_GGD_SILO" => strval($cell->val($row, 29))
                    ));
                }

                foreach ($arr_stockdaily as $value) {
//                    echo $value[''];
//                    $this->Mplant_administrator->x_padang_prognose($value);
                }
            }
        }
    }

    function data_mass_tonasa() {
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
                $jumlah_col = $cell->colcount($sheet_index = 0);

                // KILN Stop Count
                $arr_kl_ops_count = array();
                for ($col = 2; $col <= 6; $col++) {
                    for ($row = 11; $row <= $jumlah_row; $row++) {
                        array_push($arr_kl_ops_count, array(
                            "DATE" => $cell->val($row, 1),
                            "PLANT" => $cell->val(10, $col),
                            "VALUE" => $cell->val($row, $col)
                        ));
                    }
                }

                foreach ($arr_kl_ops_count as $value) {
                    $this->Mplant_administrator->x_tonasa_kiln_count($value);
                }

                // KILN Stop Description
                $arr_kl_ops_desc = array();
                for ($col = 15; $col <= 19; $col++) {
                    for ($row = 11; $row <= $jumlah_row; $row++) {
                        array_push($arr_kl_ops_desc, array(
                            "DATE" => $cell->val($row, 1),
                            "PLANT" => $cell->val(10, $col),
                            "VALUE" => $cell->val($row, $col)
                        ));
                    }
                }

                foreach ($arr_kl_ops_desc as $value) {
                    $this->Mplant_administrator->x_tonasa_kiln_desc($value);
                }

                // FM Stop Count
                $arr_fm_ops_count = array();
                for ($col = 7; $col <= 14; $col++) {
                    for ($row = 11; $row <= $jumlah_row; $row++) {
                        array_push($arr_fm_ops_count, array(
                            "DATE" => $cell->val($row, 1),
                            "PLANT" => $cell->val(10, $col),
                            "VALUE" => $cell->val($row, $col)
                        ));
                    }
                }

                foreach ($arr_fm_ops_count as $value) {
                    $this->Mplant_administrator->x_tonasa_fm_count($value);
                }

                // FM Stop Description
                $arr_fm_ops_desc = array();
                for ($col = 20; $col <= 27; $col++) {
                    for ($row = 11; $row <= $jumlah_row; $row++) {
                        array_push($arr_fm_ops_desc, array(
                            "DATE" => $cell->val($row, 1),
                            "PLANT" => $cell->val(10, $col),
                            "VALUE" => $cell->val($row, $col)
                        ));
                    }
                }

                foreach ($arr_fm_ops_desc as $value) {
                    $this->Mplant_administrator->x_tonasa_fm_desc($value);
                }

                $arr_prognose = array();
                for ($row = 11; $row <= $jumlah_row; $row++) {
                    array_push($arr_prognose, array(
                        "DATE_PROD" => $cell->val($row, 1),
                        "KL2_PROD" => strval($cell->val($row, 29)),
                        "KL3_PROD" => strval($cell->val($row, 30)),
                        "KL4_PROD" => strval($cell->val($row, 31)),
                        "KL5_PROD" => strval($cell->val($row, 31)),
                        "FM2_PROD" => strval($cell->val($row, 34)),
                        "FM3_PROD" => strval($cell->val($row, 35)),
                        "FM41_PROD" => strval($cell->val($row, 36)),
                        "FM42_PROD" => strval($cell->val($row, 36)),
                        "FM51_PROD" => strval($cell->val($row, 37)),
                        "FM52_PROD" => strval($cell->val($row, 37))
                    ));
                }

                foreach ($arr_prognose as $value) {
//                    echo $value[''];
//                    $this->Mplant_administrator->x_padang_prognose($value);
                }

                $arr_stockdaily = array();
                for ($row = 11; $row <= $jumlah_row; $row++) {
                    array_push($arr_stockdaily, array(
                        "DATE_PROD" => strval($cell->val($row, 29)),
                        "ST_CM_TNS23_SILO1" => strval($cell->val($row, 29)),
                        "ST_CM_TNS23_SILO2" => strval($cell->val($row, 29)),
                        "ST_CM_TNS23_SILO3" => strval($cell->val($row, 29)),
                        "ST_CM_TNS23_SILO4" => strval($cell->val($row, 29)),
                        "ST_CM_TNS4_SILO1" => strval($cell->val($row, 29)),
                        "ST_CM_TNS4_SILO2" => strval($cell->val($row, 29)),
                        "ST_CM_TNS4_SILO3" => strval($cell->val($row, 29)),
                        "ST_CM_TNS5_SILO1" => strval($cell->val($row, 29)),
                        "ST_CM_TNS5_SILO2" => strval($cell->val($row, 29)),
                        "ST_CM_TNS5_SILO3" => strval($cell->val($row, 29)),
                        "ST_CM_BKS_SILO1" => strval($cell->val($row, 29)),
                        "ST_CM_BKS_SILO2" => strval($cell->val($row, 29)),
                        "ST_CM_BKS_SILO3" => strval($cell->val($row, 29)),
                        "ST_CM_BKS_SILO4" => strval($cell->val($row, 29)),
                        "ST_CM_BKS_SILO5" => strval($cell->val($row, 29)),
                        "ST_CM_BKS_SILO6" => strval($cell->val($row, 29)),
                        "ST_CM_BKS_SILO7" => strval($cell->val($row, 29)),
                        "ST_CM_BKS_SILO8" => strval($cell->val($row, 29)),
                        "ST_CM_BKS_SILO9" => strval($cell->val($row, 29)),
                        "ST_CM_BKS_SILO10" => strval($cell->val($row, 29)),
                        "ST_CL_OPYARD" => strval($cell->val($row, 29)),
                        "ST_CL_TNS2" => strval($cell->val($row, 29)),
                        "ST_CL_TNS3" => strval($cell->val($row, 29)),
                        "ST_CL_DOME4" => strval($cell->val($row, 29)),
                        "ST_CL_TNS5" => strval($cell->val($row, 29))
                    ));
                }

                foreach ($arr_stockdaily as $value) {
//                    echo $value[''];
//                    $this->Mplant_administrator->x_padang_prognose($value);
                }
            }
        }
    }

    function data_mass_tlcc() {
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
                $jumlah_col = $cell->colcount($sheet_index = 0);

                // KILN Stop Count
                $arr_kl_ops_count = array();
                for ($col = 2; $col <= 6; $col++) {
                    for ($row = 11; $row <= $jumlah_row; $row++) {
                        array_push($arr_kl_ops_count, array(
                            "DATE" => $cell->val($row, 1),
                            "PLANT" => $cell->val(10, $col),
                            "VALUE" => $cell->val($row, $col)
                        ));
                    }
                }

                foreach ($arr_kl_ops_count as $value) {
                    $this->Mplant_administrator->x_tlcc_kiln_count($value);
                }

                // KILN Stop Description
                $arr_kl_ops_desc = array();
                for ($col = 15; $col <= 19; $col++) {
                    for ($row = 11; $row <= $jumlah_row; $row++) {
                        array_push($arr_kl_ops_desc, array(
                            "DATE" => $cell->val($row, 1),
                            "PLANT" => $cell->val(10, $col),
                            "VALUE" => $cell->val($row, $col)
                        ));
                    }
                }

                foreach ($arr_kl_ops_desc as $value) {
                    $this->Mplant_administrator->x_tlcc_kiln_desc($value);
                }

                // FM Stop Count
                $arr_fm_ops_count = array();
                for ($col = 7; $col <= 14; $col++) {
                    for ($row = 11; $row <= $jumlah_row; $row++) {
                        array_push($arr_fm_ops_count, array(
                            "DATE" => $cell->val($row, 1),
                            "PLANT" => $cell->val(10, $col),
                            "VALUE" => $cell->val($row, $col)
                        ));
                    }
                }

                foreach ($arr_fm_ops_count as $value) {
                    $this->Mplant_administrator->x_tlcc_fm_count($value);
                }

                // FM Stop Description
                $arr_fm_ops_desc = array();
                for ($col = 20; $col <= 27; $col++) {
                    for ($row = 11; $row <= $jumlah_row; $row++) {
                        array_push($arr_fm_ops_desc, array(
                            "DATE" => $cell->val($row, 1),
                            "PLANT" => $cell->val(10, $col),
                            "VALUE" => $cell->val($row, $col)
                        ));
                    }
                }

                foreach ($arr_fm_ops_desc as $value) {
                    $this->Mplant_administrator->x_tlcc_fm_desc($value);
                }

                $arr_prognose = array();
                for ($row = 11; $row <= $jumlah_row; $row++) {
                    array_push($arr_prognose, array(
                        "DATE_PROD" => $cell->val($row, 1),
                        "KL1_PROD" => strval($cell->val($row, 29)),
                        "FMMP_PROD" => strval($cell->val($row, 34)),
                        "FMHCM_PROD" => strval($cell->val($row, 35))
                    ));
                }

                foreach ($arr_prognose as $value) {
//                    echo $value[''];
//                    $this->Mplant_administrator->x_padang_prognose($value);
                }

                $arr_stockdaily = array();
                for ($row = 11; $row <= $jumlah_row; $row++) {
                    array_push($arr_stockdaily, array(
                        "DATE_PROD" => strval($cell->val($row, 29)),
                        "TLCC_CM_MP_SILO1" => strval($cell->val($row, 29)),
                        "TLCC_CM_MP_SILO2" => strval($cell->val($row, 29)),
                        "TLCC_CM_GP_SILO1" => strval($cell->val($row, 29)),
                        "TLCC_CM_GP_SILO2" => strval($cell->val($row, 29)),
                        "TLCC_CL_MP_DOME" => strval($cell->val($row, 29)),
                        "TLCC_CL_MP_YARD" => strval($cell->val($row, 29)),
                        "TLCC_CL_GP_SILO" => strval($cell->val($row, 29))
                    ));
                }

                foreach ($arr_stockdaily as $value) {
//                    echo $value[''];
//                    $this->Mplant_administrator->x_padang_prognose($value);
                }
            }
        }
    }

    function data_mass_rembang() {
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
                $jumlah_col = $cell->colcount($sheet_index = 0);

                // KILN Stop Count
                $arr_kl_ops_count = array();
                for ($col = 2; $col <= 6; $col++) {
                    for ($row = 11; $row <= $jumlah_row; $row++) {
                        array_push($arr_kl_ops_count, array(
                            "DATE" => $cell->val($row, 1),
                            "PLANT" => $cell->val(10, $col),
                            "VALUE" => $cell->val($row, $col)
                        ));
                    }
                }

                foreach ($arr_kl_ops_count as $value) {
                    $this->Mplant_administrator->x_tlcc_kiln_count($value);
                }

                // KILN Stop Description
                $arr_kl_ops_desc = array();
                for ($col = 15; $col <= 19; $col++) {
                    for ($row = 11; $row <= $jumlah_row; $row++) {
                        array_push($arr_kl_ops_desc, array(
                            "DATE" => $cell->val($row, 1),
                            "PLANT" => $cell->val(10, $col),
                            "VALUE" => $cell->val($row, $col)
                        ));
                    }
                }

                foreach ($arr_kl_ops_desc as $value) {
                    $this->Mplant_administrator->x_tlcc_kiln_desc($value);
                }

                // FM Stop Count
                $arr_fm_ops_count = array();
                for ($col = 7; $col <= 14; $col++) {
                    for ($row = 11; $row <= $jumlah_row; $row++) {
                        array_push($arr_fm_ops_count, array(
                            "DATE" => $cell->val($row, 1),
                            "PLANT" => $cell->val(10, $col),
                            "VALUE" => $cell->val($row, $col)
                        ));
                    }
                }

                foreach ($arr_fm_ops_count as $value) {
                    $this->Mplant_administrator->x_tlcc_fm_count($value);
                }

                // FM Stop Description
                $arr_fm_ops_desc = array();
                for ($col = 20; $col <= 27; $col++) {
                    for ($row = 11; $row <= $jumlah_row; $row++) {
                        array_push($arr_fm_ops_desc, array(
                            "DATE" => $cell->val($row, 1),
                            "PLANT" => $cell->val(10, $col),
                            "VALUE" => $cell->val($row, $col)
                        ));
                    }
                }

                foreach ($arr_fm_ops_desc as $value) {
                    $this->Mplant_administrator->x_tlcc_fm_desc($value);
                }

                $arr_prognose = array();
                for ($row = 11; $row <= $jumlah_row; $row++) {
                    array_push($arr_prognose, array(
                        "DATE_PROD" => $cell->val($row, 1),
                        "KL1_PROD" => strval($cell->val($row, 29)),
                        "FM1_PROD" => strval($cell->val($row, 34)),
                        "FM2_PROD" => strval($cell->val($row, 35))
                    ));
                }

                foreach ($arr_prognose as $value) {
//                    echo $value[''];
//                    $this->Mplant_administrator->x_padang_prognose($value);
                }

                $arr_stockdaily = array();
                for ($row = 11; $row <= $jumlah_row; $row++) {
                    array_push($arr_stockdaily, array(
                        "DATE_PROD" => strval($cell->val($row, 29)),
                        "SGR_CM_RMB_SILO1" => strval($cell->val($row, 29)),
                        "SGR_CM_RMB_SILO2" => strval($cell->val($row, 29)),
                        "SGR_CM_RMB_SILO3" => strval($cell->val($row, 29)),
                        "SGR_CL_RMB_DOME" => strval($cell->val($row, 29)),
                        "SGR_CL_RMB_YARD" => strval($cell->val($row, 29))
                    ));
                }

                foreach ($arr_stockdaily as $value) {
//                    echo $value[''];
//                    $this->Mplant_administrator->x_padang_prognose($value);
                }
            }
        }
    }

    //</editor-fold>
}
