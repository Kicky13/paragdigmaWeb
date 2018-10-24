<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class eksekutif_report extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->auth->GetSesionLogin();
        $this->load->library('Template');
        $this->load->library('plant_link');
        $this->load->model('eksekutif_model', 'eksekutif');
    }

    function index() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');

        $jenis_mesin = null;
        $comp = 'SG';
        $my_month = null;
        /////========dibutuhkan untuk data last month===JANGAN DIHAPUS============
        $tahunbenar = $this->input->get('input');
        $bantu = $tahunbenar['tahun'];

        $bulan = $this->input->get('input');
        $this_bln = $bulan['periode'];
        if (strlen($this_bln) < 2) {
            $this_month = '0' . $this_bln;
        } else {
            $this_month = $this_bln;
        }
        $tahun = $this->input->get('input');

        $my_year = !empty($bantu) ? $bantu : date('Y');
        $my_bln = !empty($this_month) ? $this_month : date('m');

        $this->load->model('mplant_eksekutif');
        $load['Title'] = "CLINKER Production PT. Semen Indonesia";
        $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CLINKER', 7000, 'si', $tahun);
        $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CLINKER', 7000, 'si', $tahun);
        $load['des_cl'] = $this->mplant_eksekutif->get_ton_design_clinker_SI($tahun, $bulan);
        $load['prog_cl'] = $this->mplant_eksekutif->get_ton_prognose_clinker_SI($tahun, $bulan);
        $load['bud_cl'] = $this->mplant_eksekutif->get_ton_budget_clinker_SI($tahun, $bulan);
        $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);
        $load['ton_real'] = $this->mplant_eksekutif->get_ton_real_clinker_SI($tahun, $bulan);
        $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_SI($my_year, $my_bln);
        $load['last'] = $this->mplant_eksekutif->get_last_day_cl_SI();
        $load['Title'] = "CLINKER Production PT. Semen Indonesia";
        $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update('SP', $bantu);
        if ($level == 1) {
            $this->template->load('plant_information/administrator_index', 'plant_information/eksekutif/vMainReport_terak', $load);
        } elseif ($level == 2) {
            $this->template->load('plant_information/operator_index', 'plant_information/eksekutif/vMainReport_terak', $load);
        } elseif ($level == 3) {
            $this->template->load('plant_information/home_index', 'plant_information/eksekutif/vMainReport_terak', $load);
        }
    }

    function eksekutif_report_terak($data) {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $bulan = $this->input->get('input');
        $this_bln = $bulan['periode'];
        if (strlen($this_bln) < 2) {
            $this_month = '0' . $this_bln;
        } else {
            $this_month = $this_bln;
        }

        /////dibutuhkan untuk data last month===JANGAN DIHAPUS
        $tahunbenar = $this->input->get('input');
        $bantu = $tahunbenar['tahun'];

        $my_year = !empty($bantu) ? $bantu : date('Y');
        $my_bln = !empty($this_month) ? $this_month : date('m');

        $tahun = $this->input->get('input');
        $plant = $this->input->get('plant');
        $this->load->model('mplant_eksekutif');
        $tanggal_mesin = $this->input->get('period');

        if (strlen($tanggal_mesin) < 2) {
            $my_month = '0' . $tanggal_mesin;
        } else {
            $my_month = $tanggal_mesin;
        }
        $jenis_mesin = $this->input->get('jenis');
        ////padang
        if ($data == 2) {
            $comp = 'SP';
            if ($jenis_mesin == 1) {
                $jenis_mesin = 'KL2_PROD';
                $plant = 'ind2';
                $company = 3000;
                $equip = 'KL2';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sp($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cl($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CLINKER', 3000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CLINKER', 3000, $plant, $tahun);
                $load['bud_cl'] = $this->mplant_eksekutif->get_ton_budget_klinker_plant_dan_opco($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cl'] = $this->mplant_eksekutif->get_ton_design_klinker($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cl'] = $this->mplant_eksekutif->get_ton_prognose_klinker(3000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);
                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            } elseif ($jenis_mesin == 2) {
                $jenis_mesin = 'KL3_PROD';
                $plant = 'ind3';
                $company = 3000;
                $equip = 'KL3';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sp($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cl($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CLINKER', 3000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CLINKER', 3000, $plant, $tahun);
                $load['bud_cl'] = $this->mplant_eksekutif->get_ton_budget_klinker_plant_dan_opco($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cl'] = $this->mplant_eksekutif->get_ton_design_klinker($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cl'] = $this->mplant_eksekutif->get_ton_prognose_klinker(3000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);
                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            } elseif ($jenis_mesin == 3) {
                $jenis_mesin = 'KL4_PROD';
                $plant = 'ind41';
                $plant2 = 'ind4';
                $company = 3000;
                $equip = 'KL4';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sp($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cl($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CLINKER', 3000, $plant2, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CLINKER', 3000, $plant2, $tahun);
                $load['bud_cl'] = $this->mplant_eksekutif->get_ton_budget_klinker_plant_dan_opco($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cl'] = $this->mplant_eksekutif->get_ton_design_klinker($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cl'] = $this->mplant_eksekutif->get_ton_prognose_klinker(3000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);
                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            } elseif ($jenis_mesin == 4) {
                $jenis_mesin = 'KL5_PROD';
                $plant = 'ind51';
                $plant2 = 'ind5';
                $company = 3000;
                $equip = 'KL5';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sp($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cl($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CLINKER', 3000, $plant2, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CLINKER', 3000, $plant2, $tahun);
                $load['bud_cl'] = $this->mplant_eksekutif->get_ton_budget_klinker_plant_dan_opco($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cl'] = $this->mplant_eksekutif->get_ton_design_klinker($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cl'] = $this->mplant_eksekutif->get_ton_prognose_klinker(3000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);
                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            } elseif ($jenis_mesin == 5) {
                $jenis_mesin = 'KL6_PROD';
                $plant = 'ind6';
                $plant2 = 'ind6';
                $company = 3000;
                $equip = 'KL6';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sp($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cl($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CLINKER', 3000, $plant2, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CLINKER', 3000, $plant2, $tahun);
                $load['bud_cl'] = $this->mplant_eksekutif->get_ton_budget_klinker_plant_dan_opco($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cl'] = $this->mplant_eksekutif->get_ton_design_klinker($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cl'] = $this->mplant_eksekutif->get_ton_prognose_klinker(3000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);
                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            } else {
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CLINKER', 3000, 'sp', $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CLINKER', 3000, 'sp', $tahun);
                $company = 3000;
                $equip = 'KL2';
                $my_equip = '(KL2_PROD + KL3_PROD + KL4_PROD + KL5_PROD)';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sp($my_year, $my_bln, $my_equip);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cl_opco($company);
                $load['des_cl'] = $this->mplant_eksekutif->get_ton_design_klinker_opco($company, $tahun, $bulan);
                $load['prog_cl'] = $this->mplant_eksekutif->get_ton_prognose_klinker_opco(3000, $plant, $tahun, $bulan);
                $load['bud_cl'] = $this->mplant_eksekutif->get_ton_budget_klinker_plant_dan_opco($plant, $tahun, $bulan, $my_month, $company);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);
                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            }
        }
        ///greesik
        elseif ($data == 3) {
            $comp = 'SG';
            if ($jenis_mesin == 1) {
                $jenis_mesin = 'KL1_PROD';
                $plant = 'tbn1';
                $company = 7000;
                $equip = 'KL1';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sg($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cl($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CLINKER', 7000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CLINKER', 7000, $plant, $tahun);
                $load['bud_cl'] = $this->mplant_eksekutif->get_ton_budget_klinker_plant_dan_opco($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cl'] = $this->mplant_eksekutif->get_ton_design_klinker($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cl'] = $this->mplant_eksekutif->get_ton_prognose_klinker(7000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);
                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            } elseif ($jenis_mesin == 2) {
                $jenis_mesin = 'KL2_PROD';
                $plant = 'tbn2';
                $company = 7000;
                $equip = 'KL2';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sg($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cl($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CLINKER', 7000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CLINKER', 7000, $plant, $tahun);
                $load['bud_cl'] = $this->mplant_eksekutif->get_ton_budget_klinker_plant_dan_opco($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cl'] = $this->mplant_eksekutif->get_ton_design_klinker($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cl'] = $this->mplant_eksekutif->get_ton_prognose_klinker(7000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);
                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            } elseif ($jenis_mesin == 3) {
                $jenis_mesin = 'KL3_PROD';
                $plant = 'tbn3';
                $company = 7000;
                $equip = 'KL3';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sg($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cl($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CLINKER', 7000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CLINKER', 7000, $plant, $tahun);
                $load['bud_cl'] = $this->mplant_eksekutif->get_ton_budget_klinker_plant_dan_opco($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cl'] = $this->mplant_eksekutif->get_ton_design_klinker($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cl'] = $this->mplant_eksekutif->get_ton_prognose_klinker(7000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);
                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            } elseif ($jenis_mesin == 4) {
                $jenis_mesin = 'KL4_PROD';
                $plant = 'tbn4';
                $company = 7000;
                $equip = 'KL4';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sg($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cl($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CLINKER', 7000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CLINKER', 7000, $plant, $tahun);
                $load['bud_cl'] = $this->mplant_eksekutif->get_ton_budget_klinker_plant_dan_opco($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cl'] = $this->mplant_eksekutif->get_ton_design_klinker($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cl'] = $this->mplant_eksekutif->get_ton_prognose_klinker(7000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);
                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            } else {
                $company = 7000;
                $equip = 'KL2';
                $my_equip = '(KL1_PROD + KL2_PROD + KL3_PROD + KL4_PROD)';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sg($my_year, $my_bln, $my_equip);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cl_opco($company);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CLINKER', 7000, 'sg', $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CLINKER', 7000, 'sg', $tahun);
                $load['des_cl'] = $this->mplant_eksekutif->get_ton_design_klinker_opco($company, $tahun, $bulan);
                $load['prog_cl'] = $this->mplant_eksekutif->get_ton_prognose_klinker_opco(7000, $plant, $tahun, $bulan);
                $load['bud_cl'] = $this->mplant_eksekutif->get_ton_budget_klinker_plant_dan_opco($plant, $tahun, $bulan, $my_month, $company);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);
                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            }
        }
        /////tonasa
        elseif ($data == 4) {
            $comp = "ST";
            if ($jenis_mesin == 1) {
                $jenis_mesin = 'KL2_PROD';
                $plant = 'tns2';
                $equip = 'KL2';
                $company = 4000;
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_st($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cl($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CLINKER', 4000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CLINKER', 4000, $plant, $tahun);
                $load['bud_cl'] = $this->mplant_eksekutif->get_ton_budget_klinker_plant_dan_opco($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cl'] = $this->mplant_eksekutif->get_ton_design_klinker($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cl'] = $this->mplant_eksekutif->get_ton_prognose_klinker(4000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);
                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            } elseif ($jenis_mesin == 2) {
                $jenis_mesin = 'KL3_PROD';
                $plant = 'tns3';
                $equip = 'KL3';
                $company = 4000;
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_st($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cl($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CLINKER', 4000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CLINKER', 4000, $plant, $tahun);
                $load['bud_cl'] = $this->mplant_eksekutif->get_ton_budget_klinker_plant_dan_opco($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cl'] = $this->mplant_eksekutif->get_ton_design_klinker($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cl'] = $this->mplant_eksekutif->get_ton_prognose_klinker(4000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);
                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            } elseif ($jenis_mesin == 3) {
                $jenis_mesin = 'KL4_PROD';
                $plant = 'tns41';
                $plant2 = 'tns4';
                $equip = 'KL4';
                $company = 4000;
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_st($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cl($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CLINKER', 4000, $plant2, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CLINKER', 4000, $plant2, $tahun);
                $load['bud_cl'] = $this->mplant_eksekutif->get_ton_budget_klinker_plant_dan_opco($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cl'] = $this->mplant_eksekutif->get_ton_design_klinker($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cl'] = $this->mplant_eksekutif->get_ton_prognose_klinker(4000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);
                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            } elseif ($jenis_mesin == 4) {
                $jenis_mesin = 'KL5_PROD';
                $plant = 'tns51';
                $plant2 = 'tns5';
                $equip = 'KL5';
                $company = 4000;
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_st($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cl($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CLINKER', 4000, $plant2, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CLINKER', 4000, $plant2, $tahun);
                $load['bud_cl'] = $this->mplant_eksekutif->get_ton_budget_klinker_plant_dan_opco($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cl'] = $this->mplant_eksekutif->get_ton_design_klinker($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cl'] = $this->mplant_eksekutif->get_ton_prognose_klinker(4000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);
                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            } else {
                $company = 4000;
                $equip = 'KL2';
                $my_equip = '(KL2_PROD + KL3_PROD + KL4_PROD + KL5_PROD)';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_st($my_year, $my_bln, $my_equip);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cl_opco($company);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CLINKER', 4000, 'st', $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CLINKER', 4000, 'st', $tahun);
                $load['des_cl'] = $this->mplant_eksekutif->get_ton_design_klinker_opco($company, $tahun, $bulan);
                $load['prog_cl'] = $this->mplant_eksekutif->get_ton_prognose_klinker_opco(4000, $plant, $tahun, $bulan);
                $load['bud_cl'] = $this->mplant_eksekutif->get_ton_budget_klinker_plant_dan_opco($plant, $tahun, $bulan, $my_month, $company);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);
                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            }
            $load['ton_real'] = $this->mplant_eksekutif->get_ton_real_opco_dan_plant($bulan, $tahun, $data, $jenis_mesin, $my_month);
        }
        
        $load['ton_real'] = $this->mplant_eksekutif->get_ton_real_opco_dan_plant($bulan, $tahun, $data, $jenis_mesin, $my_month);
        
        if ($data == 2) {
            $load['Title'] = "CLINKER Production PT. Semen Padang";
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/eksekutif/padang_terak', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/eksekutif/padang_terak', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/eksekutif/padang_terak', $load);
            }
        } elseif ($data == 3) {
            $load['Title'] = "CLINKER Production PT. KSO SG - SI";
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/eksekutif/gresik_terak', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/eksekutif/gresik_terak', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/eksekutif/gresik_terak', $load);
            }
        } elseif ($data == 4) {
            $load['Title'] = "CLINKER Production PT. Semen Tonasa";
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/eksekutif/tonasa_terak', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/eksekutif/tonasa_terak', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/eksekutif/gresik_terak', $load);
            }
        } elseif ($data == 5) {
            $comp = 'TLCC';
            $company = 6000;
            $equip = 'KL1';
            $my_equip = 'KL1_PROD';
            $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CLINKER', 6000, 'tlcc', $tahun);
            $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CLINKER', 6000, 'tlcc', $tahun);
            $load['des_cl'] = $this->mplant_eksekutif->get_ton_design_klinker_opco($company, $tahun, $bulan);
            $load['prog_cl'] = $this->mplant_eksekutif->get_ton_prognose_klinker_opco(6000, $plant, $tahun, $bulan);
            $load['bud_cl'] = $this->mplant_eksekutif->get_ton_budget_klinker_plant_dan_opco($plant, $tahun, $bulan, $my_month, $company);
            $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);
            $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_tlcc($my_year, $my_bln, $my_equip);
            $load['last'] = $this->mplant_eksekutif->get_last_day_cl($company, $equip);
            $load['Title'] = "CLINKER Production Thang Long Cement Company";
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/eksekutif/thanglong_terak', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/eksekutif/thanglong_terak', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/eksekutif/thanglong_terak', $load);
            }
        } elseif ($data == 6) {
            $comp = 'SGR';
            $company = 5000;
            $equip = 'KL1';
            $my_equip = 'KL1_PROD';
            $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CLINKER', 5000, 'rmb1', $tahun);
            $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CLINKER', 5000, 'rmb1', $tahun);
            $load['des_cl'] = $this->mplant_eksekutif->get_ton_design_klinker_opco($company, $tahun, $bulan);
            $load['prog_cl'] = $this->mplant_eksekutif->get_ton_prognose_klinker_opco(5000, $plant, $tahun, $bulan);
            $load['bud_cl'] = $this->mplant_eksekutif->get_ton_budget_klinker_plant_dan_opco($plant, $tahun, $bulan, $my_month, $company);
            $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);
            $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_rembang($my_year, $my_bln, $my_equip);
            $load['last'] = $this->mplant_eksekutif->get_last_day_cl($company, $equip);
            $load['ton_real'] = $this->mplant_eksekutif->get_ton_real_opco_dan_plant($bulan, $tahun, $data, $jenis_mesin, $my_month);
            $load['Title'] = "CLINKER Production Semen Gresik";
            
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/eksekutif/rembang_terak', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/eksekutif/rembang_terak', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/eksekutif/rembang_terak', $load);
            }
        }
    }

    function Cement_1() {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $jenis_mesin = null;
        $comp = 'SG';
        $my_month = null;
        /////========dibutuhkan untuk data last month===JANGAN DIHAPUS============
        $tahunbenar = $this->input->get('input');
        $bantu = $tahunbenar['tahun'];
        $bulan = $this->input->get('input');
        $this_bln = $bulan['periode'];
        if (strlen($this_bln) < 2) {
            $this_month = '0' . $this_bln;
        } else {
            $this_month = $this_bln;
        }
        $tahun = $this->input->get('input');
        $plant = 'si';
        $my_year = !empty($bantu) ? $bantu : date('Y');
        $my_bln = !empty($this_month) ? $this_month : date('m');
        $this->load->model('mplant_eksekutif');
        $load['Title'] = "CEMENT Production PT. Semen Indonesia";
        $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 7000, $plant, $tahun);
        $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 7000, $plant, $tahun);
        $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement_SI($tahun, $bulan);
        $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement_SI($tahun, $bulan);
        $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement_SI($tahun, $bulan);
        $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);
        $load['ton_real'] = $this->mplant_eksekutif->get_ton_real_cement_SI($tahun, $bulan);
        $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_SI($my_year, $my_bln);
        
        $load['last'] = $this->mplant_eksekutif->get_last_day_cm_SI();

        $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update('SP', $bantu);
        if ($level == 1) {
            $this->template->load('plant_information/administrator_index', 'plant_information/eksekutif/vMainReport_semen', $load);
        } elseif ($level == 2) {
            $this->template->load('plant_information/operator_index', 'plant_information/eksekutif/vMainReport_semen', $load);
        } elseif ($level == 3) {
            $this->template->load('plant_information/home_index', 'plant_information/eksekutif/vMainReport_semen', $load);
        }
    }

    function eksekutif_report_cement($data) {
        /////////////session untuk pemisah menu user dan admin//////////////
        $level = $this->session->userdata('level');
        /////////////////////////////////////////////////
        $bulan = $this->input->get('input'); ////mewakili 2 nilai (bulan dan tahun)
        $this_bln = $bulan['periode'];
        if (strlen($this_bln) < 2) {
            $this_month = '0' . $this_bln;
        } else {
            $this_month = $this_bln;
        }
        /////dibutuhkan untuk data last month===JANGAN DIHAPUS
        $tahunbenar = $this->input->get('input');
        $bantu = $tahunbenar['tahun'];
        $tahun = $this->input->get('input');
        $plant = $this->input->get('input'); ///area

        $my_year = !empty($bantu) ? $bantu : date('Y');
        $my_bln = !empty($this_month) ? $this_month : date('m');

        $this->load->model('M_test');
        $this->load->model('mplant_eksekutif');

        $tanggal_mesin = $this->input->get('period'); ///mewakili nilai bulan yang ada di mesin
        if (strlen($tanggal_mesin) < 2) {
            $my_month = '0' . $tanggal_mesin;
        } else {
            $my_month = $tanggal_mesin;
        }
        $jenis_mesin = $this->input->get('jenis');
        if ($data == 2) {/////SEMEN PADANG
            $comp = 'SP';
            if ($jenis_mesin == 1) {
                $jenis_mesin = 'FM2_PROD';
                $plant = 'ind2';
                $company = 3000;
                $equip = 'FM2';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sp($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 3000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 3000, $plant, $tahun);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement(3000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);

                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            } elseif ($jenis_mesin == 2) {
                $jenis_mesin = 'FM3_PROD';
                $plant = 'ind3';
                $company = 3000;
                $equip = 'FM3';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sp($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 3000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 3000, $plant, $tahun);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement(3000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);

                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            } elseif ($jenis_mesin == 3) {
                $jenis_mesin = 'FM41_PROD';
                $plant = 'ind41';
                $company = 3000;
                $equip = 'FM41';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sp($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 3000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 3000, $plant, $tahun);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement(3000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);

                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            } elseif ($jenis_mesin == 4) {
                $jenis_mesin = 'FM42_PROD';
                $plant = 'ind42';
                $company = 3000;
                $equip = 'FM42';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sp($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 3000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 3000, $plant, $tahun);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement(3000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);

                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            } elseif ($jenis_mesin == 5) {
                $jenis_mesin = 'FM51_PROD';
                $plant = 'ind51';
                $company = 3000;
                $equip = 'FM51';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sp($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 3000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 3000, $plant, $tahun);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement(3000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);

                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            } elseif ($jenis_mesin == 6) {
                $jenis_mesin = 'FM52_PROD';
                $plant = 'ind52';
                $company = 3000;
                $equip = 'FM52';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sp($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 3000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 3000, $plant, $tahun);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement(3000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);

                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            } elseif ($jenis_mesin == 7) {
                $jenis_mesin = 'FMDM_PROD';
                $plant = 'dmi';
                $company = 3000;
                $equip = 'FMDM';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sp($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 3000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 3000, $plant, $tahun);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement('dmi', $tahun, $bulan, $tanggal_mesin);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement(3000, 'dmi', $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);

                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            } elseif ($jenis_mesin == 8) {
                $jenis_mesin = 'FM61_PROD';
                $plant = 'ind6';
                $company = 3000;
                $equip = 'FM61';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sp($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 3000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 3000, $plant, $tahun);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement('dmi', $tahun, $bulan, $tanggal_mesin);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement(3000, 'dmi', $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);

                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            } else {
                $my_equip = '(FM2_PROD + FM3_PROD + FM41_PROD + FM42_PROD + FM51_PROD + FM52_PROD + FMDM_PROD + FM61_PROD)';
                $company = 3000;
                $equip = 'FM2';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sp($my_year, $my_bln, $my_equip);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm_opco($company);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 3000, 'sp', $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 3000, 'sp', $tahun);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement_opco($company, $tahun, $bulan);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement_opco(3000, $plant, $tahun, $bulan);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, $company);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);

                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            }
        } elseif ($data == 3) {/////SEMEN GRESIK
            $comp = 'SG';
            if ($jenis_mesin == 1) {
                $jenis_mesin = 'FM1_PROD';
                $plant = 'tbn1';
                $company = 7000;
                $equip = 'FM1';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sg($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 7000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 7000, $plant, $tahun);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement(7000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);

                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            }
            //////////PLANT FM@_PROD
            elseif ($jenis_mesin == 2) {
                $jenis_mesin = 'FM2_PROD';
                $plant = 'tbn2';
                $company = 7000;
                $equip = 'FM2';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sg($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 7000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 7000, $plant, $tahun);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement(7000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);

                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            }
            //////////PLANT FM3_PROD
            elseif ($jenis_mesin == 3) {
                $jenis_mesin = 'FM3_PROD';
                $plant = 'tbn3';
                $company = 7000;
                $equip = 'FM3';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sg($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 7000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 7000, $plant, $tahun);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement(7000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);

                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            }
            //////////PLANT FM4_PROD
            elseif ($jenis_mesin == 4) {
                $jenis_mesin = 'FM4_PROD';
                $plant = 'tbn4';
                $company = 7000;
                $equip = 'FM4';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sg($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 7000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 7000, $plant, $tahun);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement(7000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);

                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            }
            //////////PLANT FM5_PROD
            elseif ($jenis_mesin == 5) {
                $jenis_mesin = 'FM5_PROD';
                $plant = 'tbn5';
                $company = 7000;
                $equip = 'FM5';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sg($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 7000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 7000, $plant, $tahun);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement(7000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);

                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            }
            //////////PLANT FM6_PROD
            elseif ($jenis_mesin == 6) {
                $jenis_mesin = 'FM6_PROD';
                $plant = 'tbn6';
                $company = 7000;
                $equip = 'FM6';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sg($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 7000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 7000, $plant, $tahun);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement(7000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);

                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            }
            //////////PLANT FM7_PROD
            elseif ($jenis_mesin == 7) {
                $jenis_mesin = 'FM7_PROD';
                $plant = 'tbn7';
                $company = 7000;
                $equip = 'FM7';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sg($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 7000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 7000, $plant, $tahun);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement(7000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);

                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            }
            //////////PLANT FM8_PROD
            elseif ($jenis_mesin == 8) {
                $jenis_mesin = 'FM8_PROD';
                $plant = 'tbn8';
                $company = 7000;
                $equip = 'FM8';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sg($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 7000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 7000, $plant, $tahun);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement(7000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);

                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            }
            //////////PLANT FM9_PROD
            elseif ($jenis_mesin == 9) {
                $jenis_mesin = 'FM9_PROD';
                $plant = 'tbn9';
                $company = 7000;
                $equip = 'FM9';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sg($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 7000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 7000, $plant, $tahun);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement(7000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);

                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            }
            //////////PLANT FM10_PROD
            elseif ($jenis_mesin == 10) {
                $jenis_mesin = 'FMA_PROD';
                $plant = 'tbna';
                $company = 7000;
                $equip = 'FMA';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sg($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 7000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 7000, $plant, $tahun);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement(7000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);

                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            }
            //////////PLANT FM11_PROD
            elseif ($jenis_mesin == 11) {
                $jenis_mesin = 'FMB_PROD';
                $plant = 'tbnb';
                $company = 7000;
                $equip = 'FMB';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sg($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 7000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 7000, $plant, $tahun);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement(7000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);

                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            }
            //////////PLANT FM12_PROD
            elseif ($jenis_mesin == 12) {
                $jenis_mesin = 'FMC_PROD';
                $plant = 'tbnc';
                $company = 7000;
                $equip = 'FMC';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sg($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 7000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 7000, $plant, $tahun);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement(7000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);

                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            }
            //////////PLANT FM12_PROD
            elseif ($jenis_mesin == 13) {
                $jenis_mesin = 'FMCGD_PROD';
                $plant = 'cgd';
                $company = 7000;
                $equip = 'FMCGD';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sg($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 7000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 7000, $plant, $tahun);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement(7000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);

                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            }
            //////////OPCO SEMEN GRESIK
            else {
                $my_equip = '(FM1_PROD + FM2_PROD + FM3_PROD + FM4_PROD + FM5_PROD + FM6_PROD + FM7_PROD + FM8_PROD + FM9_PROD + FMA_PROD + FMB_PROD + FMC_PROD + FMCGD_PROD)';
                $company = 7000;
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_sg($my_year, $my_bln, $my_equip);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm_opco($company);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 7000, 'sg', $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 7000, 'sg', $tahun);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement_opco($company, $tahun, $bulan);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement_opco(7000, $plant, $tahun, $bulan);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, $company);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);
                $load['Interval'][0] = '0, 100000, 200000, 400000,600000,800000,1000000,1200000,1400000';
                $load['Interval'][1] = ' 0, 5259, 10517, 15775, 21033, 26291, 31549, 36807, 42065, 47323';
                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            }
        } elseif ($data == 4) {/////SEMEN TONASA
            $comp = "ST";
            if ($jenis_mesin == 1) {
                $jenis_mesin = 'FM2_PROD';
                $plant = 'tns2';
                $company = 4000;
                $equip = 'FM2';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_st($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 4000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 4000, $plant, $tahun);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement(4000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);

                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            } elseif ($jenis_mesin == 2) {
                $jenis_mesin = 'FM3_PROD';
                $plant = 'tns3'; 
                $company = 4000;
                $equip = 'FM3';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_st($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 4000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 4000, $plant, $tahun);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement(4000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);

                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            } elseif ($jenis_mesin == 3) {
                $jenis_mesin = 'FM41_PROD';
                $plant = 'tns41';
                $company = 4000;
                $equip = 'FM41';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_st($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 4000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 4000, $plant, $tahun);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement(4000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);

                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            } elseif ($jenis_mesin == 4) {
                $jenis_mesin = 'FM42_PROD';
                $plant = 'tns42';
                $company = 4000;
                $equip = 'FM42';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_st($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 4000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 4000, $plant, $tahun);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement(4000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);

                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            } elseif ($jenis_mesin == 5) {
                $jenis_mesin = 'FM51_PROD';
                $plant = 'tns51';
                $company = 4000;
                $equip = 'FM51';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_st($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 4000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 4000, $plant, $tahun);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement(4000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);

                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            } elseif ($jenis_mesin == 6) {
                $jenis_mesin = 'FM52_PROD';
                $plant = 'tns52';
                $company = 4000;
                $equip = 'FM52';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_st($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 4000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 4000, $plant, $tahun);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement(4000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);

                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            } else {
                $my_equip = '(FM2_PROD + FM3_PROD + FM41_PROD + FM42_PROD + FM51_PROD + FM52_PROD)';
                $company = 4000;
                $equip = 'FM2';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_st($my_year, $my_bln, $my_equip);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm_opco($company);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 4000, 'st', $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 4000, 'st', $tahun);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, $company);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement_opco($company, $tahun, $bulan);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement_opco(4000, $plant, $tahun, $bulan);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);

                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            }
        } elseif ($data == 5) {/////SEMEN THANGLONG
            $comp = 'TLCC';
            if ($jenis_mesin == 1) {
                $jenis_mesin = 'FMMP_PROD';
                $plant = 'mp';
                $company = 6000;
                $equip = 'FMMP';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_tlcc($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 6000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 6000, $plant, $tahun);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement(6000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_tlcc($my_year, $my_bln, $jenis_mesin);

                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            } elseif ($jenis_mesin == 2) {
                $jenis_mesin = 'FMHCM_PROD';
                $plant = 'hcm';
                $company = 6000;
                $equip = 'FMHCM';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_tlcc($my_year, $my_bln, $jenis_mesin);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 6000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 6000, $plant, $tahun);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement(6000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_tlcc($my_year, $my_bln, $jenis_mesin);
                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            } else {
                $my_equip = '(FMMP_PROD + FMHCM_PROD)';
                $company = 6000;
                $equip = 'FMMP';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_tlcc($my_year, $my_bln, $my_equip);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm_opco($company);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 6000, 'tlcc', $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 6000, 'tlcc', $tahun);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement_opco($company, $tahun, $bulan);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement_opco(6000, $plant, $tahun, $bulan);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, $company);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);
                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
                $load['Interval'][0] = '0, 50000, 100000, 150000, 200000, 250000';
                $load['Interval'][1] = ' 0, 1156, 2310, 3464, 4618, 5772, 6926, 8080, 9234, 10388';
            }
        } elseif ($data == 6) {/////SEMEN GRESIK REMBANG
            $comp = 'SGR';
            if ($jenis_mesin == 1) {
                $jenis_mesin = 'FM1_PROD';
                $plant = 'rmb1';
                $company = 5000;
                $equip = 'FM1';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_rembang($my_year, $my_bln, $jenis_mesin);
                $load['ton_riil'] = $this->mplant_eksekutif->get_ton_real_cement_SGR($my_year, $my_bln);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 5000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 5000, $plant, $tahun);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement(5000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_rembang($my_year, $my_bln, $jenis_mesin);

                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            } elseif ($jenis_mesin == 2) {
                $jenis_mesin = 'FM2_PROD';
                $plant = 'rmb2';
                $company = 5000;
                $equip = 'FM2';
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_rembang($my_year, $my_bln, $jenis_mesin);
                $load['ton_riil'] = $this->mplant_eksekutif->get_ton_real_cement_SGR($my_year, $my_bln);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm($company, $equip);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 5000, $plant, $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 5000, $plant, $tahun);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, 0);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement($plant, $tahun, $bulan, $tanggal_mesin);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement(5000, $plant, $tahun, $bulan, $tanggal_mesin);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_rembang($my_year, $my_bln, $jenis_mesin);
                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
            } else {
                $my_equip = '(FM1_PROD + FM2_PROD)';
                $company = 5000;
                $equip = 'FM1';
                $load['ton_riil'] = $this->mplant_eksekutif->get_ton_real_cement_SGR($my_year, $my_bln);
                $load['prognose'] = $this->mplant_eksekutif->get_prognose_daily_rembang($my_year, $my_bln, $my_equip);
                $load['last'] = $this->mplant_eksekutif->get_last_day_cm_opco($company);
                $load['Interval_r'] = $this->mplant_eksekutif->get_chart_interval_r('CEMENT', 5000, 'rmb1', $tahun);
                $load['Interval_l'] = $this->mplant_eksekutif->get_chart_interval_l('CEMENT', 5000, 'rmb1', $tahun);
                $load['des_cm'] = $this->mplant_eksekutif->get_ton_design_cement_opco($company, $tahun, $bulan);
                $load['prog_cm'] = $this->mplant_eksekutif->get_ton_prognose_cement_opco(5000, $plant, $tahun, $bulan);
                $load['bud_cm'] = $this->mplant_eksekutif->get_ton_budget_cement($plant, $tahun, $bulan, $my_month, $company);
                $load['data_tgl'] = $this->mplant_eksekutif->get_last_update($comp, $tahun, $bulan, $my_month);
                $load['data_bulan'] = $this->mplant_eksekutif->get_last_month_update($comp, $bantu);
                $load['Interval'][0] = '0, 50000, 100000, 150000, 200000, 250000';
                $load['Interval'][1] = ' 0, 1156, 2310, 3464, 4618, 5772, 6926, 8080, 9234, 10388';
            }
        }

        $load['ton_real'] = $this->mplant_eksekutif->get_ton_real_cement($bulan, $tahun, $data, $jenis_mesin, $my_month);

        if ($data == 2) {
            $load['Title'] = "CEMENT Production PT. Semen Padang";
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/eksekutif/padang_cement', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/eksekutif/padang_cement', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/eksekutif/padang_cement', $load);
            }
        } elseif ($data == 3) {
            $load['Title'] = "CEMENT Production PT. KSO SG - SI";
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/eksekutif/gresik_cement', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/eksekutif/gresik_cement', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/eksekutif/gresik_cement', $load);
            }
        } elseif ($data == 4) {
            $load['Title'] = "CEMENT Production PT. Semen Tonasa";
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/eksekutif/tonasa_cement', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/eksekutif/tonasa_cement', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/eksekutif/tonasa_cement', $load);
            }
        } elseif ($data == 5) {
            $load['Title'] = "CEMENT Production Thang Long Cement Company";
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/eksekutif/thanglong_cement', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/eksekutif/thanglong_cement', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/eksekutif/thanglong_cement', $load);
            }
        } elseif ($data == 6) {
            $load['Title'] = "CEMENT Production PT. Semen Gresik";
            if ($level == 1) {
                $this->template->load('plant_information/administrator_index', 'plant_information/eksekutif/rembang_cement', $load);
            } elseif ($level == 2) {
                $this->template->load('plant_information/operator_index', 'plant_information/eksekutif/rembang_cement', $load);
            } elseif ($level == 3) {
                $this->template->load('plant_information/home_index', 'plant_information/eksekutif/rembang_cement', $load);
            }
        }
    }

    function DetailKlinker() {
        $input = $this->input->get('input');
        $plant = $this->input->get('plant');
        $company = $this->input->get('company');
        $nama = $this->input->get('nama');
        $load['Title'] = "Produksi Terak " . $nama;
        $this->load->model('mplant_eksekutif');

        $load['DataTerak'] = $this->mplant_eksekutif->getTerakSemenIndonesia("'" . $company . "'", "'" . $plant . "'", $input);
        if ($company == 3000) {
            $load['li_active'] = $this->plant_link->plant_eksekutif('padang', 'eksekutif', $input);
            $load['MasterPlant'] = $this->mplant_eksekutif->getPlantMaster('3000', "'IN2','IN3','IN4','IN5'");
        } elseif ($company == 7000) {
            $load['li_active'] = $this->plant_link->plant_eksekutif('gresik', 'eksekutif', $input);
            $load['MasterPlant'] = $this->mplant_eksekutif->getPlantMaster('7000', "'TB1','TB2','TB3','TB4'");
        } elseif ($company == 4000) {
            $load['li_active'] = $this->plant_link->plant_eksekutif('tonasa', 'eksekutif', $input);
            $load['MasterPlant'] = $this->mplant_eksekutif->getPlantMaster('4000', "'TN2','TN3','TN4','TN5'");
        }
        $load['Interval'] = $this->mplant_eksekutif->getIntervalMaster($plant, $input);
        $this->template->load('plant_information/home_index', 'plant_information/eksekutif/vDetailTerak', $load);
    }

    function get_kiln_operation() {
        $this->load->model('mplant_eksekutif');
        $this->mplant_eksekutif->get_klin_oprt();
    }

    function get_fm_operation() {
        $this->load->model('mplant_eksekutif');
        $this->mplant_eksekutif->get_fm_oprt();
    }

    function get_first() {
        $this->load->model('mplant_eksekutif');
        $this->mplant_eksekutif->get_first();
    }

    function get_last() {
        $this->load->model('mplant_eksekutif');
        echo json_encode($this->mplant_eksekutif->get_last_month_update('SP', 2017));
    }

    function get_chart_interval() {
        $chart = 'CEMENT';
        $company = 7000;
        $plant = 'si';
        $tahun = 2016;
        $this->load->model('mplant_eksekutif');
        $this->mplant_eksekutif->get_chart_interval($chart, $company, $plant, $tahun);
    }

}
