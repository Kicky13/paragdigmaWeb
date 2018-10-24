<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class plant_dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->auth->GetSesionLogin();
        $this->load->library('Template');
        $this->load->library('plant_link');
        $this->load->model('Mplant_dashboard');
        $this->load->model('Mplant_eksekutif');
    }

    // <editor-fold defaultstate="collapsed" desc="Yield Report Per Day Per Opco">
    public function gresik() {
        $level = $this->session->userdata('level');
        $load['Title'] = "KSO SI-SG Yield Report";
        $year = $this->input->get('tahun');
        $this->load->model('mplant_eksekutif');
        $load['last_update'] = $this->mplant_eksekutif->get_last_month_update('SG', $year);

        if ($level == 1) {
            $this->template->load('plant_information/administrator_index', 'plant_information/dashboard/ops_perday_gresik', $load);
        } elseif ($level == 2) {
            $this->template->load('plant_information/operator_index', 'plant_information/dashboard/ops_perday_gresik', $load);
        } elseif ($level == 3) {
            $this->template->load('plant_information/home_index', 'plant_information/dashboard/ops_perday_gresik', $load);
        }
    }

    public function padang() {
        $level = $this->session->userdata('level');
        $load['Title'] = "SP Yield Report";
        $year = $this->input->get('tahun');
        $this->load->model('mplant_eksekutif');
        $load['last_update'] = $this->mplant_eksekutif->get_last_month_update('SP', $year);

        if ($level == 1) {
            $this->template->load('plant_information/administrator_index', 'plant_information/dashboard/ops_perday_padang', $load);
        } elseif ($level == 2) {
            $this->template->load('plant_information/operator_index', 'plant_information/dashboard/ops_perday_padang', $load);
        } elseif ($level == 3) {
            $this->template->load('plant_information/home_index', 'plant_information/dashboard/ops_perday_padang', $load);
        }
    }

    public function tonasa() {
        $level = $this->session->userdata('level');
        $load['Title'] = "ST Yield Report";
        $year = $this->input->get('tahun');
        $this->load->model('mplant_eksekutif');
        $load['last_update'] = $this->mplant_eksekutif->get_last_month_update('ST', $year);

        if ($level == 1) {
            $this->template->load('plant_information/administrator_index', 'plant_information/dashboard/ops_perday_tonasa', $load);
        } elseif ($level == 2) {
            $this->template->load('plant_information/operator_index', 'plant_information/dashboard/ops_perday_tonasa', $load);
        } elseif ($level == 3) {
            $this->template->load('plant_information/home_index', 'plant_information/dashboard/ops_perday_tonasa', $load);
        }
    }

    public function tlcc() {
        $level = $this->session->userdata('level');
        $load['Title'] = "TLCC Yield Report";
        $year = $this->input->get('tahun');
        $this->load->model('mplant_eksekutif');
        $load['last_update'] = $this->mplant_eksekutif->get_last_month_update('TLCC', $year);

        if ($level == 1) {
            $this->template->load('plant_information/administrator_index', 'plant_information/dashboard/ops_perday_tlcc', $load);
        } elseif ($level == 2) {
            $this->template->load('plant_information/operator_index', 'plant_information/dashboard/ops_perday_tlcc', $load);
        } elseif ($level == 3) {
            $this->template->load('plant_information/home_index', 'plant_information/dashboard/ops_perday_tlcc', $load);
        }
    }
    
    public function rembang() {
        $level = $this->session->userdata('level');
        $load['Title'] = "SG Yield Report";
        $year = $this->input->get('tahun');
        $this->load->model('mplant_eksekutif');
        $load['last_update'] = $this->mplant_eksekutif->get_last_month_update('SGR', $year);

        if ($level == 1) {
            $this->template->load('plant_information/administrator_index', 'plant_information/dashboard/ops_perday_rembang', $load);
        } elseif ($level == 2) {
            $this->template->load('plant_information/operator_index', 'plant_information/dashboard/ops_perday_rembang', $load);
        } elseif ($level == 3) {
            $this->template->load('plant_information/home_index', 'plant_information/dashboard/ops_perday_rembang', $load);
        }
    }

    public function ops_day_SG($thn, $bln) {
        $company = 7000;
        $tahun = $thn;
        $bulan = $bln;

        return $this->Mplant_dashboard->ops_day_SG($company, $tahun, $bulan);
    }

    public function ops_day_SP($thn, $bln) {
        $company = 3000;
        $tahun = $thn;
        $bulan = $bln;

        return $this->Mplant_dashboard->ops_day_SP($company, $tahun, $bulan);
    }

    public function ops_day_ST($thn, $bln) {
        $company = 4000;
        $tahun = $thn;
        $bulan = $bln;

        return $this->Mplant_dashboard->ops_day_ST($company, $tahun, $bulan);
    }

    public function ops_day_TLCC($thn, $bln) {
        $company = 6000;
        $tahun = $thn;
        $bulan = $bln;

        return $this->Mplant_dashboard->ops_day_TLCC($company, $tahun, $bulan);
    }
    
    public function ops_day_SGR($thn, $bln) {
        $company = 7000;
        $tahun = $thn;
        $bulan = $bln;

        return $this->Mplant_dashboard->ops_day_SGR($company, $tahun, $bulan);
    }

    // </editor-fold>

    // <editor-fold defaultstate="collapsed" desc="Inventory Report Per Opco">
    public function dashboard_sg() {
        $year_now = date('Y');
        $month_now = date('m');
        $first_day = '01';
        $last_day = date('t');

        $str_start = $year_now . "-" . $month_now . "-" . $first_day;
        $str_end = $year_now . "-" . $month_now . "-" . $last_day;

        $level = $this->session->userdata('level');
        $load['Title'] = "Dashboard Inventory";

        $s_start = $this->input->post('sdate');
        $s_end = $this->input->post('edate');

        $date_start = !empty($s_start) ? $s_start : $str_start;
        $date_end = !empty($s_end) ? $s_end : $str_end;

        $load['daily'] = $this->Mplant_dashboard->get_dash_D_SG($date_start, $date_end);
        $load['last_cl'] = $this->Mplant_eksekutif->get_last_day_cl_opco(7000);
        $load['last_cm'] = $this->Mplant_eksekutif->get_last_day_cm_opco(7000);

        if ($level == 1) {
            $this->template->load('plant_information/administrator_index', 'plant_information/dashboard/dashinv_sg', $load);
        } elseif ($level == 2) {
            $this->template->load('plant_information/operator_index', 'plant_information/dashboard/dashinv_sg', $load);
        } elseif ($level == 3) {
            $this->template->load('plant_information/home_index', 'plant_information/dashboard/dashinv_sg', $load);
        }
    }
    
    public function dashboard_sp() {
        $year_now = date('Y');
        $month_now = date('m');
        $first_day = '01';
        $last_day = date('t');

        $str_start = $year_now . "-" . $month_now . "-" . $first_day;
        $str_end = $year_now . "-" . $month_now . "-" . $last_day;

        $level = $this->session->userdata('level');
        $load['Title'] = "Dashboard Inventory";

        $s_start = $this->input->post('sdate');
        $s_end = $this->input->post('edate');

        $date_start = !empty($s_start) ? $s_start : $str_start;
        $date_end = !empty($s_end) ? $s_end : $str_end;

        $load['daily'] = $this->Mplant_dashboard->get_dash_D_SP($date_start, $date_end);
        $load['last_cl'] = $this->Mplant_eksekutif->get_last_day_cl_opco(3000);
        $load['last_cm'] = $this->Mplant_eksekutif->get_last_day_cm_opco(3000);

        if ($level == 1) {
            $this->template->load('plant_information/administrator_index', 'plant_information/dashboard/dashinv_sp', $load);
        } elseif ($level == 2) {
            $this->template->load('plant_information/operator_index', 'plant_information/dashboard/dashinv_sp', $load);
        } elseif ($level == 3) {
            $this->template->load('plant_information/home_index', 'plant_information/dashboard/dashinv_sp', $load);
        }
    }
    
    public function dashboard_st() {
        $year_now = date('Y');
        $month_now = date('m');
        $first_day = '01';
        $last_day = date('t');

        $str_start = $year_now . "-" . $month_now . "-" . $first_day;
        $str_end = $year_now . "-" . $month_now . "-" . $last_day;

        $level = $this->session->userdata('level');
        $load['Title'] = "Dashboard Inventory";

        $s_start = $this->input->post('sdate');
        $s_end = $this->input->post('edate');

        $date_start = !empty($s_start) ? $s_start : $str_start;
        $date_end = !empty($s_end) ? $s_end : $str_end;

        $load['daily'] = $this->Mplant_dashboard->get_dash_D_ST($date_start, $date_end);
        $load['last_cl'] = $this->Mplant_eksekutif->get_last_day_cl_opco(4000);
        $load['last_cm'] = $this->Mplant_eksekutif->get_last_day_cm_opco(4000);

        if ($level == 1) {
            $this->template->load('plant_information/administrator_index', 'plant_information/dashboard/dashinv_st', $load);
        } elseif ($level == 2) {
            $this->template->load('plant_information/operator_index', 'plant_information/dashboard/dashinv_st', $load);
        } elseif ($level == 3) {
            $this->template->load('plant_information/home_index', 'plant_information/dashboard/dashinv_st', $load);
        }
    }
    
    public function dashboard_tlcc() {
        $year_now = date('Y');
        $month_now = date('m');
        $first_day = '01';
        $last_day = date('t');

        $str_start = $year_now . "-" . $month_now . "-" . $first_day;
        $str_end = $year_now . "-" . $month_now . "-" . $last_day;

        $level = $this->session->userdata('level');
        $load['Title'] = "Dashboard Inventory";

        $s_start = $this->input->post('sdate');
        $s_end = $this->input->post('edate');

        $date_start = !empty($s_start) ? $s_start : $str_start;
        $date_end = !empty($s_end) ? $s_end : $str_end;

        $load['daily'] = $this->Mplant_dashboard->get_dash_D_TLCC($date_start, $date_end);
        $load['last_cl'] = $this->Mplant_eksekutif->get_last_day_cl_opco(6000);
        $load['last_cm'] = $this->Mplant_eksekutif->get_last_day_cm_opco(6000);

        if ($level == 1) {
            $this->template->load('plant_information/administrator_index', 'plant_information/dashboard/dashinv_tlcc', $load);
        } elseif ($level == 2) {
            $this->template->load('plant_information/operator_index', 'plant_information/dashboard/dashinv_tlcc', $load);
        } elseif ($level == 3) {
            $this->template->load('plant_information/home_index', 'plant_information/dashboard/dashinv_tlcc', $load);
        }
    }
    // </editor-fold>

}
