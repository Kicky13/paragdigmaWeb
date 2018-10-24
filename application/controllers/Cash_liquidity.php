<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cash_liquidity extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('m_cal','M_cal','finance_data'));
    }

    public function getlistcurrency()
    {
        $data = $this->M_cal->getlistcurrency();
        echo json_encode($data);
    }

    /**
     * FAILED
     * @param  [type] $inputtgl [description]
     * @return [type]           [description]
     */
    public function getAP($inputtgl=null)
    {
        if ($inputtgl==null)
        {
            $inputtgl = date('Ymd');
        }
        
        $tgl = date('Ymd', strtotime('-30 days', strtotime($inputtgl))); 
        $data_to_day["PERIODE"] = $tgl;
        $dum_data_to_day = $this->M_cal->get_AP_SMIG_today($tgl);
        $to_day_opco = "";
        // foreach ($dum_data_to_day as $key => $value) {
        //     if ($value['OPCO']!=)
        // }
        echo "<pre>";
        print_r($dum_data_to_day);
    }


    public function getCurrToday_peropco()
    {
        $opco = $this->input->get('opco');
        $stgl = $this->input->get('tgl');
        // $stgl = date('Ymd', strtotime('-30 days', strtotime($stgl))); 
        if($stgl=="")
        {
            $stgl = date('Ymd');
        }
        $tgl[] = $stgl;
        // $tgl[] = '20171117';
        $id = 'ALL.'.$opco;
        $comp = "ALL";
        $dim = "currency";
        $data = $this->get_data_modif($comp,$id,$tgl,$dim);
        echo json_encode($data);
    }

    public function get_trend_AP_opco()
    {
        $opco = $this->input->get('opco');
        $tgl_now = date('d/m/Y');
        $bln_now = date('m');
        $thn_now = date('Y');
        $tgl_now2 = date('Ymd');
        $tgl_now3 = date('Ym01');
        $tgl_start   = date("Ymd",strtotime("$tgl_now3 -30 day"));
        $tgl_end = date("Ymd",strtotime("$tgl_now2 -30 day"));
        $bln_now2 = date("m",strtotime("$tgl_now2 -30 day"));
        $thn_now2 = date("Y",strtotime("$tgl_now2 -30 day"));
        
        // GORONG MARI
        $data_cash = $this->finance_data->get_trend_CashOnHand_per_Opco($tgl_now,$bln_now,$thn_now,$opco);
        $data_AR = $this->finance_data->get_data_AR_trend_opco($tgl_now2,$bln_now,$thn_now,$opco);
        $data_AP = $this->finance_data->get_trend_AP_param_opco($tgl_start,$tgl_end,$bln_now2,$thn_now2,$opco);
        $data = array("DATA_CASH_ON_HAND"=>$data_cash,"DATA_AR"=>$data_AR,"DATA_AP"=>$data_AP);
        echo json_encode($data);
    }

    public function get_trend_AP_smig()
    {
        $tgl_now = date('d/m/Y');
        $bln_now = date('m');
        $thn_now = date('Y');
        $tgl_now2 = date('Ymd');
        $tgl_now3 = date('Ym01');
        $tgl_start   = date("Ymd",strtotime("$tgl_now3 -30 day"));
        $tgl_end = date("Ymd",strtotime("$tgl_now2 -30 day"));
        $bln_now2 = date("m",strtotime("$tgl_now2 -30 day"));
        $thn_now2 = date("Y",strtotime("$tgl_now2 -30 day"));

        $data_cash = $this->finance_data->get_trend_CashOnHand_smig($tgl_now,$bln_now,$thn_now);
        $data_AR = $this->finance_data->get_data_AR_trend_smig($tgl_now2,$bln_now,$thn_now);
        $data_AP = $this->finance_data->get_trend_AP_smig($tgl_start,$tgl_end,$bln_now2,$thn_now2);
        $data = array("DATA_CASH_ON_HAND"=>$data_cash,"DATA_AR"=>$data_AR,"DATA_AP"=>$data_AP);
        echo json_encode($data);
    }

    public function getCurrToday_Allopco()
    {
        // $opco = $this->input->get('opco');
        $stgl = $this->input->get('tgl');
        // $stgl = date('Ymd', strtotime('-30 days', strtotime($stgl))); 
        if($stgl=="")
        {
            $stgl = date('Ymd');
        }
        $tgl[] = $stgl;
        $opco = array('2000','3000','4000','5000','6000','7000','8000','9000');
        $comp = "ALL";
        $dim = "currency";
        $data = array();
        foreach ($opco as $key => $vopco) {
            $id = 'ALL.'.$vopco;
            $data[] = $this->get_data_modif($comp,$id,$tgl,$dim);
        }
           // echo "<pre>";
           // $data_merge = array_merge($data);
           $alldata = array();
            foreach ($data as $key => $value) {
                foreach ($value as $key => $value_dua) {
                    $alldata[] = $value_dua;
                    $dataCurr[] = $value_dua["JENIS"];
                }
            }

            $dataCurr = array_unique($dataCurr);
            $arrSumCur = array();
            foreach ($alldata as $key => $value) {
                foreach ($dataCurr as $key => $curr) {
                    if ($value['JENIS']==$curr)
                    {
                            $nilai = str_replace(",", "", $value["value"]); 
                        if (strpos($value["value"], "(")!==false)
                        {
                            $nilai = str_replace("(", "", $nilai); 
                            $nilai = str_replace(")", "", $nilai); 
                            $nilai = $nilai*-1;
                        }
                        $arrSumCur[$curr][] = $nilai;
                    }   
                }
            }

            $fixdata = array();
            foreach ($arrSumCur as $key => $value) {
                $fixdata[$key] = array_sum($value);
            }
            // print_r($arrSumCur);
            // print_r($fixdata);
        echo json_encode($fixdata);
    }
    
    public function get_data_modif($comp,$id,$tgl,$dim) {
        $comp   = isset($comp) ? intval($comp) : '7000';
        $dim    = isset($dim) ? $dim : 'currency';
        $id     = isset($id) ? $id : 'AWAL';
        $id     = explode(".", $id);
        //$tgl = array('20171020', '20171021', '20171022');
        $stts = 'closed';
        $return = array();
        
        if($comp == "ALL" && $id[0] == 'AWAL'){
            $data = $this->M_cal->get_data_all($tgl);
        } else if ($id[0] == 'AWAL' && $dim == 'currency' || $id[0] == 'ALL' && $dim == 'currency') {
            if($comp == "ALL"){
                $comp = $id[1];
            }
            $data = $this->M_cal->get_data($comp, $tgl);
        } else if ($id[0] == 'AWAL' && $dim == 'bank' || $id[0] == 'ALL' && $dim == 'bank') {
            if($comp == "ALL"){
                $comp = $id[1];
            }
            $data = $this->M_cal->get_data_b($comp, $tgl);
        }else if ($id[0] == '2' && $dim == 'currency') {
            $data = $this->M_cal->get_data2($id[1], $tgl, $id[2]);
        }else if ($id[0] == '2' && $dim == 'bank') {
            $data = $this->M_cal->get_data2_b($id[1], $tgl, $id[2]);
        } else if ($id[0] == '3' && $dim == 'currency') {
            $data = $this->M_cal->get_data3($id[1], $tgl, $id[2], $id[3]);
        } else if ($id[0] == '3' && $dim == 'bank') {
            //MENUKAR ID CURRENCY DAN TYPE SUPAYA SESUAI
            $temp = $id[2];
            $id[2] = $id[3];
            $id[3] = $temp;
            $data = $this->M_cal->get_data3($id[1], $tgl, $id[2], $id[3]);
        } else if ($id[0] == '4') {
            $data = $this->M_cal->get_data4($id[1], $tgl, $id[2], $id[3], $id[4]);
            $stts = 'open';
        }
        
        $data_exchange = $this->M_cal->get_exchange_rate($tgl);
        foreach ($data_exchange as $key => $value) {
            $exchange[$value['FCURR']][$value['GDATU']] = $value['UKURS'];
        }
        foreach ($data as $key => $value) {
            foreach ($tgl as $key2 => $value2) {
                $nilai_tukar = '';
                //DIKALIKAN DENGAN NILAI EXCHANGE RATE =============================================================
                if($comp == "ALL" && $id[0] == 'AWAL'){
                    $val_exc = '';
                    $value[$value2."IDR"] = $value[$value2];
                }else if ($id[0] == 'AWAL' && $dim == 'currency' || $id[0] == 'ALL' && $dim == 'currency' || $id[0] == '2' && $dim == 'bank'){
                    IF($value['JENIS'] == "IDR"){
                        $nilai_tukar = 1;
                    }ELSE{
                        if (isset($exchange[$value['JENIS']][$value2]))
                        {
                            $nilai_tukar = $exchange[$value['JENIS']][$value2];
                        }else{
                            $a = $this->M_cal->get_last_exchange($value2, $value['JENIS']);
                            $nilai_tukar = $a[0]['UKURS'];
                        }
                        // $nilai_tukar = isset($exchange[$value['JENIS']][$value2]) ? $exchange[$value['JENIS']][$value2] : $this->M_cal->get_last_exchange($value2, $value['JENIS'])[0]['UKURS'];
                    }
                    $value[$value2."IDR"] = (float)$value[$value2] * $nilai_tukar;
                    $val_exc = number_format(round((float)$nilai_tukar), 0, '.', ',');
                }else if ($id[0] == 'AWAL' && $dim == 'bank' || $id[0] == 'ALL' && $dim == 'bank'){
                    $val_exc = '';
                    $value[$value2."IDR"] = $value[$value2];
                }else{
                    IF($id[2] == "IDR"){
                        $nilai_tukar = 1;
                    }ELSE{
                        if (isset($exchange[$id[2]][$value2]))
                        {
                            $nilai_tukar = $exchange[$id[2]][$value2];
                        }else{
                            $a = $this->M_cal->get_last_exchange($value2, $id[2]);
                            $nilai_tukar = $a[0]['UKURS'];
                        }
                        // $nilai_tukar = isset($exchange[$id[2]][$value2]) ? $exchange[$id[2]][$value2] : $this->M_cal->get_last_exchange($value2, $id[2])[0]['UKURS'];
                    }
                    $value[$value2."IDR"] = (float)$value[$value2] * $nilai_tukar;
                    $val_exc = number_format(round((float)$nilai_tukar), 0, '.', ',');
                }
                
                $val = number_format(round((float)$value[$value2]), 0, '.', ',');
                $val_idr = number_format(round((float)$value[$value2."IDR"]), 0, '.', ',');
                //merubah minus menjadi kurung ====================================================
                if($nilai_tukar < 0 && $nilai_tukar <> ''){
                    $val_exc = str_replace('-','(',$val_exc).')';
                }
                //merubah minus menjadi kurung ====================================================
                if($value[$value2] < 0){
                    $val = str_replace('-','(',$val).')';
                }
                //merubah minus menjadi kurung ====================================================
                if($value[$value2."IDR"] < 0){
                    $val_idr = str_replace('-','(',$val_idr).')';
                }
                $return[$key]["value"."EXC"] = $val_exc;
                $return[$key]["value"] = $val;
                $return[$key]["value"."IDR"] = $val_idr;
            }
            
            $return[$key]["ID"] = $value['ID'];
            $return[$key]["JENIS"] = $value['JENIS'];
            $return[$key]["state"] = $stts;
            }

        return $return;
    }


     public function get_data() {
        $comp = isset($_POST['comp']) ? intval($_POST['comp']) : '7000';
        // $tgl = $_POST['ecolumn'];
        $id = isset($_POST['id']) ? $_POST['id'] : 'AWAL';
        $id = explode(".", $id);
        //$tgl = array('20171020', '20171021', '20171022');
        $stts = 'closed';
        $return = array();

        $comp  = "2000";
        $tgl[] = "20171112";
        $tgl[] = "20171113";
        $tgl[] = "20171114";        
        
        if($comp == "ALL" && $id[0] == 'AWAL'){
            $data = $this->M_cal->get_data_all($tgl);
        } else if ($id[0] == 'AWAL' || $id[0] == 'ALL') {
            if($comp == "ALL"){
                $comp = $id[1];
            }
            $data = $this->M_cal->get_data($comp, $tgl);
        } else if ($id[0] == '2') {
            $data = $this->M_cal->get_data2($id[1], $tgl, $id[2]);
        } else if ($id[0] == '3') {
            $data = $this->M_cal->get_data3($id[1], $tgl, $id[2], $id[3]);
        } else if ($id[0] == '4') {
            $data = $this->M_cal->get_data4($id[1], $tgl, $id[2], $id[3], $id[4]);
            $stts = 'open';
        }
        
        $data_exchange = $this->M_cal->get_exchange_rate($tgl);
        foreach ($data_exchange as $key => $value) {
            $exchange[$value['FCURR']][$value['GDATU']] = $value['UKURS'];
        }
        foreach ($data as $key => $value) {
            foreach ($tgl as $key2 => $value2) {
                //DIKALIKAN DENGAN NILAI EXCHANGE RATE =============================================================
                if($comp == "ALL" && $id[0] == 'AWAL'){
                    $val_exc = '';
                    $value[$value2."IDR"] = $value[$value2];
                }else if ($id[0] == 'AWAL' || $id[0] == 'ALL'){
                    $val_exc = '';
                    $value[$value2."IDR"] = $value[$value2];
                }else{
                    IF($id[2] == "IDR"){
                        $nilai_tukar = 1;
                    }ELSE{
                        if (isset($exchange[$id[2]][$value2]))
                        {
                           $nilai_tukar = $exchange[$id[2]][$value2];
                        }else{
                           $data_tukar = $this->M_cal->get_last_exchange($value2, $id[2]);
                           $nilai_tukar = $data_tukar[0]['UKURS'];
                        }
                    }
                    $value[$value2."IDR"] = (float)$value[$value2] * $nilai_tukar;
                    $val_exc = number_format(round((float)$nilai_tukar), 0, '.', ',');
                    
                    //merubah minus menjadi kurung ====================================================
                    if($nilai_tukar < 0){
                        $val_exc = str_replace('-','(',$val_exc).')';
                    }
                }
                
                $val = number_format(round((float)$value[$value2]), 0, '.', ',');
                $val_idr = number_format(round((float)$value[$value2."IDR"]), 0, '.', ',');
                //merubah minus menjadi kurung ====================================================
                if($value[$value2] < 0){
                    $val = str_replace('-','(',$val).')';
                }
                //merubah minus menjadi kurung ====================================================
                if($value[$value2."IDR"] < 0){
                    $val_idr = str_replace('-','(',$val_idr).')';
                }
                $return[$key][$value2."EXC"] = $val_exc;
                $return[$key][$value2] = $val;
                $return[$key][$value2."IDR"] = $val_idr;
            }
            
            $return[$key]["ID"] = $value['ID'];
            $return[$key]["JENIS"] = $value['JENIS'];
            $return[$key]["state"] = $stts;
            }

        echo json_encode($return);
    }


}

?>