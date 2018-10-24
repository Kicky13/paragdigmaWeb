<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class plant_chart extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('Template');
        $this->load->library('plant_link');
    }
    
    function chart_semen_group(){
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
        
        $this->load->view('plant_information/utama/chart_semen_group',$load, false);
    }
    
    function chart_semen_padang() {
        $tahunsementara = $this->input->get('input');
        if (empty($tahunsementara['tahun'])) {
            $tahunsementara['tahun'] = date('Y');
        }
        $tahun = $tahunsementara['tahun'];
        
        $tahunx = !empty($tahun) ? $tahun : date('Y');
        $load['thn'] = $tahunx;
        $thn = $tahunx;
        
        $this->load->model('Mplant_padang');
        $load['DProductionPD'] = $this->Mplant_padang->GetProduction($thn);
        $load['myDataPD'] = $this->Mplant_padang->getProdFinishMill($thn);
        $load['rkap_cementPD'] = $this->Mplant_padang->getRKAPCementPlant($thn);
        $load['klinDataPD'] = $this->Mplant_padang->getProdKlinker($thn);
        $load['rkap_klinPD'] = $this->Mplant_padang->getRKAPClinkerPlant($thn);

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
        
        $this->load->view('plant_information/utama/chart_semen_padang',$load, false);
    }
    
    function chart_semen_gresik() {
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
        
        $this->load->view('plant_information/utama/chart_semen_gresik',$load, false);
    }
    
    function chart_semen_rembang() {
        $tahunsementara = $this->input->get('input');
        if (empty($tahunsementara['tahun'])) {
            $tahunsementara['tahun'] = date('Y');
        }
        $tahun = $tahunsementara['tahun'];
        
        $tahunx = !empty($tahun) ? $tahun : date('Y');
        $load['thn'] = $tahunx;
        $thn = $tahunx;
        
        $this->load->model('Mplant_rembang');
        $load['DProduction'] = $this->Mplant_rembang->GetProduction($thn);
        $load['myData'] = $this->Mplant_rembang->getProdFinishMill($thn);
        $load['rkap_cement'] = $this->Mplant_rembang->getRKAPCementPlant($thn);
        $load['klinData'] = $this->Mplant_rembang->getProdKlinker($thn);
        $load['rkap_klin'] = $this->Mplant_rembang->getRKAPClinkerPlant($thn);
        
        $this->load->view('plant_information/utama/chart_semen_rembang',$load, false);
    }
    
    function chart_semen_tonasa() {
        $tahunsementara = $this->input->get('input');
        if (empty($tahunsementara['tahun'])) {
            $tahunsementara['tahun'] = date('Y');
        }
        $tahun = $tahunsementara['tahun'];
        
        $tahunx = !empty($tahun) ? $tahun : date('Y');
        $load['thn'] = $tahunx;
        $thn = $tahunx;
        
        $this->load->model('Mplant_tonasa');
        $load['DProductionTN'] = $this->Mplant_tonasa->GetProduction($thn);
        $load['myDataTN'] = $this->Mplant_tonasa->getProdFinisihMill($thn);
        $load['rkap_cementTN'] = $this->Mplant_tonasa->getRKAPCementPlant($thn);
        $load['klinDataTN'] = $this->Mplant_tonasa->getProdKlinker($thn);
        $load['rkap_klinTN'] = $this->Mplant_tonasa->getRKAPClinkerPlant($thn);
        
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
        
        $this->load->view('plant_information/utama/chart_semen_tonasa',$load, false);
    }
    
    function chart_semen_tlcc() {
        $tahunsementara = $this->input->get('input');
        if (empty($tahunsementara['tahun'])) {
            $tahunsementara['tahun'] = date('Y');
        }
        $tahun = $tahunsementara['tahun'];
        
        $tahunx = !empty($tahun) ? $tahun : date('Y');
        $load['thn'] = $tahunx;
        $thn = $tahunx;
        
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
        
        $this->load->view('plant_information/utama/chart_semen_tlcc',$load, false);
    }
    
    function chart_klinker_group(){
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
        
        $this->load->view('plant_information/utama/chart_klinker_group',$load, false);
    }
    
    function chart_klinker_padang() {
        $tahunsementara = $this->input->get('input');
        if (empty($tahunsementara['tahun'])) {
            $tahunsementara['tahun'] = date('Y');
        }
        $tahun = $tahunsementara['tahun'];
        
        $tahunx = !empty($tahun) ? $tahun : date('Y');
        $load['thn'] = $tahunx;
        $thn = $tahunx;
        
        $this->load->model('Mplant_padang');
        $load['DProductionPD'] = $this->Mplant_padang->GetProduction($thn);
        $load['myDataPD'] = $this->Mplant_padang->getProdFinishMill($thn);
        $load['rkap_cementPD'] = $this->Mplant_padang->getRKAPCementPlant($thn);
        $load['klinDataPD'] = $this->Mplant_padang->getProdKlinker($thn);
        $load['rkap_klinPD'] = $this->Mplant_padang->getRKAPClinkerPlant($thn);

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
        
        $this->load->view('plant_information/utama/chart_klinker_padang',$load, false);
    }
    
    function chart_klinker_gresik() {
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
        
        $this->load->view('plant_information/utama/chart_klinker_gresik',$load, false);
    }
    
    function chart_klinker_rembang() {
        $tahunsementara = $this->input->get('input');
        if (empty($tahunsementara['tahun'])) {
            $tahunsementara['tahun'] = date('Y');
        }
        $tahun = $tahunsementara['tahun'];
        
        $tahunx = !empty($tahun) ? $tahun : date('Y');
        $load['thn'] = $tahunx;
        $thn = $tahunx;
        
        $this->load->model('Mplant_rembang');
        $load['DProduction'] = $this->Mplant_rembang->GetProduction($thn);
        $load['myData'] = $this->Mplant_rembang->getProdFinishMill($thn);
        $load['rkap_cement'] = $this->Mplant_rembang->getRKAPCementPlant($thn);
        $load['klinData'] = $this->Mplant_rembang->getProdKlinker($thn);
        $load['rkap_klin'] = $this->Mplant_rembang->getRKAPClinkerPlant($thn);
        
        $this->load->view('plant_information/utama/chart_klinker_rembang',$load, false);
    }
    
    function chart_klinker_tonasa() {
        $tahunsementara = $this->input->get('input');
        if (empty($tahunsementara['tahun'])) {
            $tahunsementara['tahun'] = date('Y');
        }
        $tahun = $tahunsementara['tahun'];
        
        $tahunx = !empty($tahun) ? $tahun : date('Y');
        $load['thn'] = $tahunx;
        $thn = $tahunx;
        
        $this->load->model('Mplant_tonasa');
        $load['DProductionTN'] = $this->Mplant_tonasa->GetProduction($thn);
        $load['myDataTN'] = $this->Mplant_tonasa->getProdFinisihMill($thn);
        $load['rkap_cementTN'] = $this->Mplant_tonasa->getRKAPCementPlant($thn);
        $load['klinDataTN'] = $this->Mplant_tonasa->getProdKlinker($thn);
        $load['rkap_klinTN'] = $this->Mplant_tonasa->getRKAPClinkerPlant($thn);
        
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
        
        $this->load->view('plant_information/utama/chart_klinker_tonasa',$load, false);
    }
    
    function chart_klinker_tlcc() {
        $tahunsementara = $this->input->get('input');
        if (empty($tahunsementara['tahun'])) {
            $tahunsementara['tahun'] = date('Y');
        }
        $tahun = $tahunsementara['tahun'];
        
        $tahunx = !empty($tahun) ? $tahun : date('Y');
        $load['thn'] = $tahunx;
        $thn = $tahunx;
        
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
        
        $this->load->view('plant_information/utama/chart_klinker_tlcc',$load, false);
    }
}
