<?php


defined('BASEPATH') OR exit('No direct script access allowed');


class Finance extends CI_Controller
{	
	public function __construct() {
        parent::__construct();
        // $this->auth->GetSesionLogin();
        //$this->load->library('Template');
        //$this->load->library('plant_link');
        //$this->load->model('Mplant_gresik');
        $this->load->model('finance_data');
        $this->load->model('coba','M_RVD');
    }
	
    
    function index() {
        $load['Title'] = "Plant System";
        $this->load->model('mdashboard_all');
        //echo 222;
        //$this->load->model('Sales_revenue_model');
        $data_revenue   = $this->get_data_revenue_harian();
        //print_r($data);
        
        //$this->template->load('plant_information/administrator_index', 'plant_information/utama/production_dashboard', $load);
    }
    
    public function global_wilayah($time=null){
        $org = $this->input->get('org');
        //$org=7000;
        if ($time==null)
        {
            $time = date("Y.m");
        }
        // $time = date("Y.m"); 
        $b = substr($time, -2);
        $thn = substr($time, 0, 4);
        $bln = $thn . '/' . $b;
        $tim = str_replace(".", "", $time);
        $id = null;
        $i = 0;
        $data = $this->data2tipe($b, $thn, $org);
        $data = json_encode($data);
        echo $data;
    }
    
    public function get_data_bank_smig(){
        $datenow = date('Ymd');
        $databank = $this->finance_data->get_data_bank_smig($datenow);
        echo json_encode(array('company'=>'SMIG','data_bank_idr'=>$databank));
    }
    
    public function get_data_bank_opco(){
        $org = $this->input->get('org');
        //$org = 7000;
        $datenow = date('Ymd');
        $databank = $this->finance_data->get_data_bank_opco($datenow,$org);
        echo json_encode(array('company'=>'opco'.$org,'data_bank_idr'=>$databank));
    }
    
    public function get_data_Coh_Ap_Ar(){
        $tgl_now = date('d/m/Y');
        $bln_now = date('m');
        $thn_now = date('Y');
        $tgl_now2 = date('Ymd');
        $tgl_now3 = date('Ym01');
        $tgl_start   = date("Ymd",strtotime("$tgl_now3 -30 day"));
        $tgl_end = date("Ymd",strtotime("$tgl_now2 -30 day"));
        $bln_now2 = date("m",strtotime("$tgl_now2 -30 day"));
        $thn_now2 = date("Y",strtotime("$tgl_now2 -30 day"));
        
        
        $data_opco = $this->finance_data->get_data_Opco();
        $data_cash = $this->finance_data->get_CashOnHand_per_Opco($tgl_now,$bln_now,$thn_now);
        $data_AR = $this->finance_data->get_data_AR_Per_Opco($tgl_now2,$bln_now,$thn_now);
        $data_AP = $this->finance_data->get_data_Ap_Per_Opco($tgl_start,$tgl_end,$bln_now2,$thn_now2);
       // print_r($data_cash);
        
        $data_COH_smig_day = array();
        $data_COH_smig_month = array();
        $data_COH_smig_year = array();
        $data_COH_opco_day = array();
        $data_COH_opco_month = array();
        $data_COH_opco_year = array();
        $data_AP_smig_day = array();
        $data_AP_smig_month = array();
        $data_AP_smig_year = array();
        $data_AR_smig_day = array();
        $data_AR_smig_month = array();
        $data_AR_smig_year = array();
        $data_AR_opco_day = array();
        $data_AR_opco_month = array();
        $data_AR_opco_year = array();
        $data_AP_opco_day = array();
        $data_AP_opco_month = array();
        $data_AP_opco_year = array();
        $data_isi   = array();
        $arrayhasil = array();
        
        $cash_opco_day=$cash_opco_month=$cash_opco_year=$cash_smig_day=$cash_smig_month=$cash_smig_year=0;
        $ap_opco_day=$ap_opco_month=$ap_opco_year=$ap_smig_day=$ap_smig_month=$ap_smig_year=0;
        $ar_opco_day=$ar_opco_month=$ar_opco_year=$ar_smig_day=$ar_smig_month=$ar_smig_year=0;
        
        foreach($data_opco as $i){
            $data_isi=array();
            $opco = $i['COMPANY'];
            $nmopco =  $i['DESCRIPTION'];
            //data COH
            foreach($data_cash as $a){
                if((int)$opco != (int)$a['RBUKRS'])
                continue;
                if((int)$a['FLAG']==1){
                    $cash_opco_day = $a['TOTAL'];
                }
                else if((int)$a['FLAG']==2){
                    $cash_opco_month = $a['TOTAL'];
                }
                else if((int)$a['FLAG']==3){
                    $cash_opco_year = $a['TOTAL'];
                }
            } 
            //data AP
            foreach($data_AP as $b){
                if((int)$opco != $b['BUKRS'])
                continue;
                if((int)$a['FLAG']==1){
                    $ap_opco_day = $b['TOTAL'];
                }
                else if((int)$a['FLAG']==2){
                    $ap_opco_month = $b['TOTAL'];
                }
                else if((int)$a['FLAG']==3){
                    $ap_opco_year = $b['TOTAL'];
                }
            }
            //data AR
            foreach($data_AR as $c){
                if((int)$opco != $c['COMPANY'])
                continue;
                if((int)$a['FLAG']==1){
                    $ar_opco_day = $c['TOTAL'];
                }
                else if((int)$a['FLAG']==2){
                    $ar_opco_month = $c['TOTAL'];
                }
                else if((int)$a['FLAG']==3){
                    $ar_opco_year = $c['TOTAL'];
                }
            }
            
            $cash_smig_day += $cash_opco_day;
            $cash_smig_month += $cash_opco_month;
            $cash_smig_year += $cash_opco_year;
            $ap_smig_day += $ap_opco_day;
            $ap_smig_month += $ap_opco_month;
            $ap_smig_year += $ap_opco_year;
            $ar_smig_day += $ar_opco_day;
            $ar_smig_month += $ar_smig_month;
            $ar_smig_year += $ar_opco_year;
            
            $data_isi['OPCO'] = $opco;
            $data_isi['DESCRIPTION'] = $nmopco;
            $data_isi['COH_DAY'] = $cash_opco_day;
            $data_isi['COH_MONTH'] = $cash_opco_month;
            $data_isi['COH_YEAR'] = $cash_opco_year;
            $data_isi['AP_DAY'] = $ap_opco_day;
            $data_isi['AP_MONTH'] = $ap_opco_month;
            $data_isi['AP_YEAR'] = $ap_opco_year;
            $data_isi['AR_DAY'] = $ar_opco_day;
            $data_isi['AR_MONTH'] = $ar_opco_month;
            $data_isi['AR_YEAR'] = $ar_opco_year;
            
            array_push($arrayhasil,$data_isi);
        }
        $data_isi = array();
        
        $data_isi['OPCO'] = 'SMIG';
        $data_isi['DESCRIPTION'] = 'SEMEN INDONESIA GROUP';
        $data_isi['COH_DAY'] = $cash_smig_day;
        $data_isi['COH_MONTH'] = $cash_smig_month;
        $data_isi['COH_YEAR'] = $cash_smig_year;
        $data_isi['AP_DAY'] = $ap_smig_day;
        $data_isi['AP_MONTH'] = $ap_smig_month;
        $data_isi['AP_YEAR'] = $ap_smig_year;
        $data_isi['AR_DAY'] = $ar_smig_day;
        $data_isi['AR_MONTH'] = $ar_smig_month;
        $data_isi['AR_YEAR'] = $ar_smig_year;
        
        array_push($arrayhasil,$data_isi);
        
        echo json_encode(array('data_smig_dan_opco'=>$arrayhasil));
    }
    
    
    
    public function data2tipe($bln, $thn, $org) {
        if($org == 7000){
            $data = array("company"=>"Semen Indonesia","data_wilayah"=>
                                                    array(//"Clinker"=>$this->get_bbc_total($bln, $thn, 'Clinker'),
                                                          //"BULK"=>$this->get_bbc_total($bln, $thn, 'Curah', $org),
                                                          "BAG"=>$this->get_bbc_wilayah_total_kso($bln, $thn, 'ZAK', $org)),
                                                   "data_Curah"=>
                                                    array(//"Clinker"=>$this->get_bbc_total($bln, $thn-1, 'Clinker'),
                                                          "BULK"=>$this->get_bbc_total_curah($bln, $thn, 'Curah', $org))
                                                          //"BAG"=>$this->get_bbc_total($bln, $thn-1, 'ZAK'))
                        );
            
        }
        else{
            $data = array("company"=>"Semen Indonesia","data_wilayah"=>
                                                    array(//"Clinker"=>$this->get_bbc_total($bln, $thn, 'Clinker'),
                                                          //"BULK"=>$this->get_bbc_total($bln, $thn, 'Curah', $org),
                                                          "BAG"=>$this->get_bbc_wilayah_total_nonkso($bln, $thn, $org))
                                                          //"BAG"=>$this->get_bbc_wilayah_total_kso($bln, $thn, 'ZAK', $org))
                                                          //"BAG"=>$this->get_bbc_total($bln, $thn-1, 'ZAK'))
                        );
        }

        
     //    $data = '[
					// {"idd":"ZAK","company":"<b><span class=\"change_lang_eng\">BAG</span><span class=\"change_lang_ina hidden\">ZAK</span></b>",' . $this->get_bbc_total($bln, $thn, 'ZAK') . '"state":"closed"},
					// {"idd":"Curah","company":"<b><span class=\"change_lang_eng\">BULK</span><span class=\"change_lang_ina hidden\">CURAH</span></b>",' . $this->get_bbc_total($bln, $thn, 'Curah') . '"state":"closed"},
					// {"idd":"Clinker","company":"<b><span class=\"change_lang_eng\">CLINKER</span><span class=\"change_lang_ina hidden\">TERAK</span></b>",' . $this->get_bbc_total($bln, $thn, 'Clinker') . '"state":"closed"}
					// ]';
        return $data;
    }
    
    //ambil data KSO
    public function get_bbc_wilayah_total_kso($bln, $thn, $tipe, $org) {
        $tgl_now = date('Y/m/d');
        $bln_now = date('m');
        $thn_now = date('Y');
        $tgl_last = date("t", strtotime($thn . '/' . $bln . '/23'));
        if ($bln == $bln_now && $thn == $thn_now) {
            $tgl_rel = date('d');
        } else {
            $tgl_rel = $tgl_last;
        }
        $data_sales = $this->sales_revenue_data->get_data_bbc_total_wilayah($tgl_now, $tgl_rel, $bln, $thn, $tgl_last, $tipe, $org);
        $data_rkap = $this->sales_revenue_data->get_rkap_bulanan_bbc_wilayah($tipe, $thn, $bln, $org);
        $data_wilayah = $this->sales_revenue_data->get_data_wilayah();
        $arrayhasil=array();
        $iter=0;
        $vol=$price=$totsales=$oa=$rev=$rkap_ton=$rkap_rev=$varianVolume=$varianRevenue=$rkap_rev_harian=$rkap_ton_harian=0;
        
        foreach($data_sales as $i){
            $vol = number_format($i['VOL'], 0);
            $price = number_format($i['PRICE'], 0);
            $totsales = number_format($i['TOTALSALES'], 0);
            $oa = number_format($i['OA'], 0);
            $rev = number_format($i['REV'], 0);
            $region = $i['ID_REGION'];
            $nmregion = $i['NM_REGION'];
            $jenis_data = $i['FLAG'];
            
            foreach($data_rkap as $r){
                
                /*foreach($data_rkap as $s){
                    //echo $s['FLAG'];
                    if($s['FLAG']!= 2)
                    continue;
                    if(((int)$s['ID_REGION'] != (int)$i['ID_REGION']) || ((int)$i['FLAG'] != (int)$s['FLAG']))
                    continue;
                    $maxDays=(int)date('t');
                    
                    $rkap_ton_harian = $s['RKAP_TON'];// number_format($s['RKAP_TON']/$maxDays, 0);
                    $rkap_rev_harian = $s['RKAP_REV'] ;//number_format($s['RKAP_REV']/$maxDays, 0);
                    
                }
                */
                if((int)$i['FLAG']==1){
                    
                    $varianVolume  = abs(floatval(str_replace(",", "", "0"))-floatval(str_replace(",", "", $vol)));
                    $varianRevenue   = abs(floatval(str_replace(",", "", "0"))-floatval(str_replace(",", "", $rev)));
                    $varianRevenue  = $varianVolume;//number_format($varianRevenue,0);
                    $varianVolume   = $varianVolume;//number_format($varianVolume,0);
                    $flag=1;
                    //break;
                    
                    $data["ID_REGION"]       = $region;
                    $data["NM_REGION"]       = $nmregion;
                    $data["TOTAL_SALES"]     = $totsales;
                    $data["VOLUME"]          = $vol;
                    $data["PRICE"]           = $price;
                    $data["REVENUE"]         = $rev;
                    $data["OA"]              = $oa;
                    $data["TARGET_REVENUE"]  = $rkap_rev;
                    $data["TARGET_VOLUME"]   = $rkap_ton;
                    $data["FLAG"]            = $jenis_data;
                    $data["JENIS"]           = $i["JENIS"];
                    $data["VARIAN_REVENUE"]  = $varianRevenue;
                    $data["VARIAN_VOLUME"]   = $varianVolume;
                    //$iter+=1;
                    array_push($arrayhasil, $data);
                    $iter+=1;
                    break;
                }
                else{
                    
                    if((int)$i['ID_REGION'] != (int)$r['ID_REGION'] || (int)$i['FLAG'] != (int)$r['FLAG'])
                    continue;
                    //echo $i['ID_REGION'].'idreg'.$r['ID_REGION'].'+'.$i['FLAG'].'-'.$r['FLAG'].'ton'.$rkap_ton.'vol'.$vol;
//                    echo '</br>';
                    $rkap_ton = number_format($r['RKAP_TON'], 0);
                    $rkap_rev = number_format($r['RKAP_REV'], 0);
                    //echo $rkap_ton.'-'.$vol;
                    $varianVolume  = abs(floatval(str_replace(",", "", $rkap_ton))-floatval(str_replace(",", "", $vol)));
                    $varianRevenue   = abs(floatval(str_replace(",", "", $rkap_rev))-floatval(str_replace(",", "", $rev)));
                    $varianRevenue  = $varianRevenue;//number_format($varianRevenue);
                    $varianVolume   = $varianVolume;//number_format($varianVolume);
                    //$varianVolume = (int)$rkap_ton-(int)$vol;
                    //echo 'wr'.$varianVolume.'qw'.'</br>';
                    
                    $data["ID_REGION"]       = $region;
                    $data["NM_REGION"]       = $nmregion;
                    $data["TOTAL_SALES"]     = $totsales;
                    $data["VOLUME"]          = $vol;
                    $data["PRICE"]           = $price;
                    $data["REVENUE"]         = $rev;
                    $data["OA"]              = $oa;
                    $data["TARGET_REVENUE"]  = $rkap_rev;
                    $data["TARGET_VOLUME"]   = $rkap_ton;
                    $data["FLAG"]            = $jenis_data;
                    $data["JENIS"]           = $i["JENIS"];
                    $data["VARIAN_REVENUE"]  = $varianRevenue;
                    $data["VARIAN_VOLUME"]   = $varianVolume;
                    $iter+=1;
                    array_push($arrayhasil, $data);
                    
                    break;
                }
            }
            
        
        }
        
        $arrayhasilbaru = array();
        $region_cek=$nmregion_cek='';
        $iter2 = 0;
        $totsales_day=$totsales_month=$totsales_year=$vol_day=$vol_monnth=$vol_year=0;
        $price_day=$price_month=$price_year=$rev_day=$rev_month=$rev_year=$oa_day=$oa_month=$oa_year =0;
        $rkap_rev_day = $rkap_rev_month = $rkap_rev_year = $rkap_ton_day = $rkap_ton_month = $rkap_ton_year= 0;
        $varianRevenue_day = $varianRevenue_month = $varianRevenue_year = $varianVolume_day = $varianVolume_month = $varianVolume_year = 0;
        foreach($data_wilayah as $w){
            $databaru = array();
            foreach($arrayhasil as $ah){
                if((int)$ah['ID_REGION'] != (int)$w['ID_REGION'])
                continue;
                if($ah['FLAG']==1){
                    $region_cek = $ah['ID_REGION'];
                    $nmregion_cek = $ah['NM_REGION'];
                    $totsales_day = $ah['TOTAL_SALES'];
                    $vol_day = $ah['VOLUME'];
                    $price_day = $ah['PRICE'];
                    $rev_day = $ah['REVENUE'];
                    $oa_day = $ah['OA'];
                    $rkap_rev_day = $ah['TARGET_REVENUE'];
                    $rkap_ton_day = $ah['TARGET_VOLUME'];
                    $varianRevenue_day = $ah['VARIAN_REVENUE'];
                    $varianVolume_day = $ah['VARIAN_VOLUME'];
                }
                else if($ah['FLAG']==2){
                    $region_cek = $ah['ID_REGION'];
                    $nmregion_cek = $ah['NM_REGION'];
                    $totsales_month = $ah['TOTAL_SALES'];
                    $vol_monnth = $ah['VOLUME'];
                    $price_month = $ah['PRICE'];
                    $rev_month = $ah['REVENUE'];
                    $oa_month = $ah['OA'];
                    $rkap_rev_month = $ah['TARGET_REVENUE'];
                    $rkap_ton_month = $ah['TARGET_VOLUME'];
                    $varianRevenue_month = $ah['VARIAN_REVENUE'];
                    $varianVolume_month = $ah['VARIAN_VOLUME'];
                }
                else if($ah['FLAG']==3){
                    $region_cek = $ah['ID_REGION'];
                    $nmregion_cek = $ah['NM_REGION'];
                    $totsales_year = $ah['TOTAL_SALES'];
                    $vol_year = $ah['VOLUME'];
                    $price_year = $ah['PRICE'];
                    $rev_year = $ah['REVENUE'];
                    $oa_year = $ah['OA'];
                    $rkap_rev_year = $ah['TARGET_REVENUE'];
                    $rkap_ton_year = $ah['TARGET_VOLUME'];
                    $varianRevenue_year = $ah['VARIAN_REVENUE'];
                    $varianVolume_year = $ah['VARIAN_VOLUME'];
                }
                
            }
                $databaru["ID_REGION"]       = $region_cek;
                $databaru["NM_REGION"]       = $nmregion_cek;
                $databaru["TOTAL_SALES_DAY"]     = $totsales_day;
                $databaru["VOLUME_DAY"]          = $vol_day;
                $databaru["PRICE_DAY"]           = $price_day;
                $databaru["REVENUE_DAY"]         = $rev_day;
                $databaru["OA_DAY"]              = $oa_day;
                $databaru["TARGET_REVENUE_DAY"]  = $rkap_rev_day;
                $databaru["TARGET_VOLUME_DAY"]   = $rkap_ton_day;
                $databaru["VARIAN_REVENUE_DAY"]  = $varianRevenue_day;
                $databaru["VARIAN_VOLUME_DAY"]   = $varianVolume_day;
                $databaru["TOTAL_SALES_MONTH"]     = $totsales_month;
                $databaru["VOLUME_MONTH"]          = $vol_monnth;
                $databaru["PRICE_MONTH"]           = $price_month;
                $databaru["REVENUE_MONTH"]         = $rev_month;
                $databaru["OA_MONTH"]              = $oa_month;
                $databaru["TARGET_REVENUE_MONTH"]  =$rkap_rev_month;
                $databaru["TARGET_VOLUME_MONTH"]   = $rkap_ton_month;
                $databaru["VARIAN_REVENUE_MONTH"]  = $varianRevenue_month;
                $databaru["VARIAN_VOLUME_MONTH"]   = $varianVolume_month;
                $databaru["TOTAL_SALES_YEAR"]     = $totsales_year;
                $databaru["VOLUME_YEAR"]          = $vol_year;
                $databaru["PRICE_YEAR"]           = $price_year;
                $databaru["REVENUE_YEAR"]         = $rev_year;
                $databaru["OA_YEAR"]              = $oa_year;
                $databaru["TARGET_REVENUE_YEAR"]  = $rkap_rev_year;
                $databaru["TARGET_VOLUME_YEAR"]   = $rkap_ton_year;
                $databaru["VARIAN_REVENUE_YEAR"]  = $varianRevenue_year;
                $databaru["VARIAN_VOLUME_YEAR"]   = $varianVolume_year;
                $iter2+=1;
                array_push($arrayhasilbaru, $databaru);
        }
        
        return $arrayhasilbaru;
        //return $arrayhasil;
        //echo count($arrayhasil);
        //print_r($arrayhasil);
       
    }
    
    //AMBIL DATA CURAH KSO
    public function get_bbc_total_curah($bln, $thn, $tipe, $org) {
        $tgl_now = date('Y/m/d');
        $bln_now = date('m');
        $thn_now = date('Y');
        $tgl_last = date("t", strtotime($thn . '/' . $bln . '/23'));
        if ($bln == $bln_now && $thn == $thn_now) {
            $tgl_rel = date('d');
        } else {
            $tgl_rel = $tgl_last;
        }
        $data = $this->sales_revenue_data->get_data_opco_bbc_total($tgl_now, $tgl_rel, $bln, $thn, $tgl_last, $tipe, $org);
        
        //echopre($data);exit;
        $vol = array();
        $price = array();
        $totsales = array();
        $oa = array();
        $rev = array();
        $r = 0;
        foreach ($data as $d) {
            $vol[$r] = number_format($d['VOL'], 0);
            $price[$r] = number_format($d['PRICE'], 0);
            $totsales[$r] = number_format($d['TOTALSALES'], 0);
            $oa[$r] = number_format($d['OA'], 0);
            $rev[$r] = number_format($d['REV'], 0);
            $r++;
        }
        $data_rkap = $this->sales_revenue_data->get_rkap_opco_bulanan_bbc($tipe, $thn, $bln, $org);
        $rkap_ton = array();
        $rkap_rev = array();
        $u = 1;
        foreach ($data_rkap as $dr) {
            $rkap_ton[$u] = number_format($dr['RKAP_TON'], 0);
            $rkap_rev[$u] = number_format($dr['RKAP_REV'], 0);
            $u++;
        }

        $varianVolumeto_day =abs(floatval(str_replace(",", "", "0"))-floatval(str_replace(",", "", $vol[0])))  ;
        $varianVolumeto_day = number_format($varianVolumeto_day,0);
        $varianVolumemonth_to_day = abs(floatval(str_replace(",", "", $rkap_ton[1]))-floatval(str_replace(",", "", $vol[1])));
        $varianVolumemonth_to_day = number_format($varianVolumemonth_to_day,0);
        $varianVolumeyear_to_day = abs(floatval(str_replace(",", "", $rkap_ton[2]))-floatval(str_replace(",", "", $vol[2])));
        $varianVolumeyear_to_day = number_format($varianVolumeyear_to_day,0);

        $varianRevenueto_day =abs(floatval(str_replace(",", "", "0"))-floatval(str_replace(",", "", $rev[0])));
        $varianRevenueto_day = number_format($varianRevenueto_day,0);
        $varianRevenuemonth_to_day = abs(floatval(str_replace(",", "", $rkap_rev[1]))-floatval(str_replace(",", "", $rev[1])));
        $varianRevenuemonth_to_day = number_format($varianRevenuemonth_to_day,0);
        $varianRevenueyear_to_day = abs(floatval(str_replace(",", "", $rkap_rev[2]))-floatval(str_replace(",", "", $rev[2])));
        $varianRevenueyear_to_day = number_format($varianRevenueyear_to_day,0);
        
        $data_r[] = array("to_day"=>array("DATAVOLUME"=>array(
            array("VOLUME"=>$vol[0],"TARGETVOLUME"=>"0","VARIANVOLUME"=>$varianVolumeto_day)
            ),
            "DATAREVENUE"=>array(
            array("PRICE"=>$price[0],"TOTALSALES"=>$totsales[0],"OA"=>$oa[0],"REVENUE"=>$rev[0],"TARGETREVENUE"=>"0","VARIANREVENUE"=>$varianRevenueto_day)
            )
          )
        );
        $data_r[] = array("month_to_day"=>array("DATAVOLUME"=>
            array("VOLUME"=>$vol[1],"TARGETVOLUME"=>$rkap_ton[1],"VARIANVOLUME"=>$varianVolumemonth_to_day)
            ,
            "DATAREVENUE"=>array("PRICE"=>$price[1],"TOTALSALES"=>$totsales[1],"OA"=>$oa[1],"REVENUE"=>$rev[1],"TARGETREVENUE"=>$rkap_rev[1],"VARIANREVENUE"=>$varianRevenuemonth_to_day)
            ));

        $data_r[] = array("year_to_day"=>
                            array("DATAVOLUME"=>array("VOLUME"=>$vol[2],"TARGETVOLUME"=>$rkap_ton[2],"VARIANVOLUME"=>$varianVolumemonth_to_day
                                                     ),
                                 "DATAREVENUE"=>array("PRICE"=>$price[2],"TOTALSALES"=>$totsales[2],"OA"=>$oa[2],"REVENUE"=>$rev[2],"TARGETREVENUE"=>$rkap_rev[2],"VARIANREVENUE"=>$varianRevenuemonth_to_day
                                                    )
                                 )
                        );

        // $data_r = '"VOLUME1":"' . $vol[0] . '","PRICE1":"' . $price[0] . '","TOTALSALES1":"' . $totsales[0] . '","OA1":"' . $oa[0] . '","REVENUE1":"' . $rev[0] . '","RKAP1":"0","RKAPREV1":"0","VOLUME2":"' . $vol[1] . '","PRICE2":"' . $price[1] . '","TOTALSALES2":"' . $totsales[1] . '","OA2":"' . $oa[1] . '","REVENUE2":"' . $rev[1] . '","RKAP2":"' . $rkap_ton[1] . '","RKAPREV2":"' . $rkap_rev[1] . '","VOLUME3":"' . $vol[2] . '","PRICE3":"' . $price[2] . '","TOTALSALES3":"' . $totsales[2] . '","OA3":"' . $oa[2] . '","REVENUE3":"' . $rev[2] . '","RKAP3":"' . $rkap_ton[2] . '","RKAPREV3":"' . $rkap_rev[2] . '",';
       return $data_r;
    }
    
    //AMBIL DATA NON KSO
    
    public function get_bbc_wilayah_total_nonkso($bln, $thn, $org) {
        $tgl_now = date('Y/m/d');
        $bln_now = date('m');
        $thn_now = date('Y');
        $tgl_last = date("t", strtotime($thn . '/' . $bln . '/23'));
        if ($bln == $bln_now && $thn == $thn_now) {
            $tgl_rel = date('d');
        } else {
            $tgl_rel = $tgl_last;
        }
        $data_sales = $this->sales_revenue_data->get_data_bbc_total_wilayah_noType($tgl_now, $tgl_rel, $bln, $thn, $tgl_last, $org);
        $data_rkap = $this->sales_revenue_data->get_rkap_bulanan_bbc_wilayah_noType( $thn, $bln, $org);
        $data_wilayah = $this->sales_revenue_data->get_data_wilayah();
        $arrayhasil=array();
        $iter=0;
        $vol=$price=$totsales=$oa=$rev=$rkap_ton=$rkap_rev=$varianVolume=$varianRevenue=$rkap_rev_harian=$rkap_ton_harian=0;
        
        foreach($data_sales as $i){
            $vol = number_format($i['VOL'], 0);
            $price = number_format($i['PRICE'], 0);
            $totsales = number_format($i['TOTALSALES'], 0);
            $oa = number_format($i['OA'], 0);
            $rev = number_format($i['REV'], 0);
            $region = $i['ID_REGION'];
            $nmregion = $i['NM_REGION'];
            $jenis_data = $i['FLAG'];
            
            foreach($data_rkap as $r){
                
                /*foreach($data_rkap as $s){
                    //echo $s['FLAG'];
                    if($s['FLAG']!= 2)
                    continue;
                    if(((int)$s['ID_REGION'] != (int)$i['ID_REGION']) || ((int)$i['FLAG'] != (int)$s['FLAG']))
                    continue;
                    $maxDays=(int)date('t');
                    
                    $rkap_ton_harian = $s['RKAP_TON'];// number_format($s['RKAP_TON']/$maxDays, 0);
                    $rkap_rev_harian = $s['RKAP_REV'] ;//number_format($s['RKAP_REV']/$maxDays, 0);
                    
                }
                */
                if((int)$i['FLAG']==1){
                    
                    $varianVolume  = abs(floatval(str_replace(",", "", "0"))-floatval(str_replace(",", "", $vol)));
                    $varianRevenue   = abs(floatval(str_replace(",", "", "0"))-floatval(str_replace(",", "", $rev)));
                    $varianRevenue  = $varianVolume;//number_format($varianRevenue,0);
                    $varianVolume   = $varianVolume;//number_format($varianVolume,0);
                    $flag=1;
                    //break;
                    
                    $data["ID_REGION"]       = $region;
                    $data["NM_REGION"]       = $nmregion;
                    $data["TOTAL_SALES"]     = $totsales;
                    $data["VOLUME"]          = $vol;
                    $data["PRICE"]           = $price;
                    $data["REVENUE"]         = $rev;
                    $data["OA"]              = $oa;
                    $data["TARGET_REVENUE"]  = $rkap_rev;
                    $data["TARGET_VOLUME"]   = $rkap_ton;
                    $data["FLAG"]            = $jenis_data;
                    $data["JENIS"]           = $i["JENIS"];
                    $data["VARIAN_REVENUE"]  = $varianRevenue;
                    $data["VARIAN_VOLUME"]   = $varianVolume;
                    //$iter+=1;
                    array_push($arrayhasil, $data);
                    $iter+=1;
                    break;
                }
                else{
                    
                    if((int)$i['ID_REGION'] != (int)$r['ID_REGION'] || (int)$i['FLAG'] != (int)$r['FLAG'])
                    continue;
                    //echo $i['ID_REGION'].'idreg'.$r['ID_REGION'].'+'.$i['FLAG'].'-'.$r['FLAG'].'ton'.$rkap_ton.'vol'.$vol;
//                    echo '</br>';
                    $rkap_ton = number_format($r['RKAP_TON'], 0);
                    $rkap_rev = number_format($r['RKAP_REV'], 0);
                    //echo $rkap_ton.'-'.$vol;
                    $varianVolume  = abs(floatval(str_replace(",", "", $rkap_ton))-floatval(str_replace(",", "", $vol)));
                    $varianRevenue   = abs(floatval(str_replace(",", "", $rkap_rev))-floatval(str_replace(",", "", $rev)));
                    $varianRevenue  = $varianRevenue;//number_format($varianRevenue);
                    $varianVolume   = $varianVolume;//number_format($varianVolume);
                    //$varianVolume = (int)$rkap_ton-(int)$vol;
                    //echo 'wr'.$varianVolume.'qw'.'</br>';
                    
                    $data["ID_REGION"]       = $region;
                    $data["NM_REGION"]       = $nmregion;
                    $data["TOTAL_SALES"]     = $totsales;
                    $data["VOLUME"]          = $vol;
                    $data["PRICE"]           = $price;
                    $data["REVENUE"]         = $rev;
                    $data["OA"]              = $oa;
                    $data["TARGET_REVENUE"]  = $rkap_rev;
                    $data["TARGET_VOLUME"]   = $rkap_ton;
                    $data["FLAG"]            = $jenis_data;
                    $data["JENIS"]           = $i["JENIS"];
                    $data["VARIAN_REVENUE"]  = $varianRevenue;
                    $data["VARIAN_VOLUME"]   = $varianVolume;
                    $iter+=1;
                    array_push($arrayhasil, $data);
                    
                    break;
                }
            }
            
        
        }
        
        $arrayhasilbaru = array();
        $region_cek=$nmregion_cek='';
        $iter2 = 0;
        $totsales_day=$totsales_month=$totsales_year=$vol_day=$vol_monnth=$vol_year=0;
        $price_day=$price_month=$price_year=$rev_day=$rev_month=$rev_year=$oa_day=$oa_month=$oa_year =0;
        $rkap_rev_day = $rkap_rev_month = $rkap_rev_year = $rkap_ton_day = $rkap_ton_month = $rkap_ton_year= 0;
        $varianRevenue_day = $varianRevenue_month = $varianRevenue_year = $varianVolume_day = $varianVolume_month = $varianVolume_year = 0;
        foreach($data_wilayah as $w){
            $databaru = array();
            $databaru = null;
            foreach($arrayhasil as $ah){
                if((int)$ah['ID_REGION'] != (int)$w['ID_REGION'])
                continue;
                if($ah['FLAG']==1){
                    $region_cek = $ah['ID_REGION'];
                    $nmregion_cek = $ah['NM_REGION'];
                    $totsales_day = $ah['TOTAL_SALES'];
                    $vol_day = $ah['VOLUME'];
                    $price_day = $ah['PRICE'];
                    $rev_day = $ah['REVENUE'];
                    $oa_day = $ah['OA'];
                    $rkap_rev_day = $ah['TARGET_REVENUE'];
                    $rkap_ton_day = $ah['TARGET_VOLUME'];
                    $varianRevenue_day = $ah['VARIAN_REVENUE'];
                    $varianVolume_day = $ah['VARIAN_VOLUME'];
                }
                else if($ah['FLAG']==2){
                    $region_cek = $ah['ID_REGION'];
                    $nmregion_cek = $ah['NM_REGION'];
                    $totsales_month = $ah['TOTAL_SALES'];
                    $vol_monnth = $ah['VOLUME'];
                    $price_month = $ah['PRICE'];
                    $rev_month = $ah['REVENUE'];
                    $oa_month = $ah['OA'];
                    $rkap_rev_month = $ah['TARGET_REVENUE'];
                    $rkap_ton_month = $ah['TARGET_VOLUME'];
                    $varianRevenue_month = $ah['VARIAN_REVENUE'];
                    $varianVolume_month = $ah['VARIAN_VOLUME'];
                }
                else if($ah['FLAG']==3){
                    $region_cek = $ah['ID_REGION'];
                    $nmregion_cek = $ah['NM_REGION'];
                    $totsales_year = $ah['TOTAL_SALES'];
                    $vol_year = $ah['VOLUME'];
                    $price_year = $ah['PRICE'];
                    $rev_year = $ah['REVENUE'];
                    $oa_year = $ah['OA'];
                    $rkap_rev_year = $ah['TARGET_REVENUE'];
                    $rkap_ton_year = $ah['TARGET_VOLUME'];
                    $varianRevenue_year = $ah['VARIAN_REVENUE'];
                    $varianVolume_year = $ah['VARIAN_VOLUME'];
                }
                
            }
                $databaru["ID_REGION"]       = $region_cek;
                $databaru["NM_REGION"]       = $nmregion_cek;
                $databaru["TOTAL_SALES_DAY"]     = $totsales_day;
                $databaru["VOLUME_DAY"]          = $vol_day;
                $databaru["PRICE_DAY"]           = $price_day;
                $databaru["REVENUE_DAY"]         = $rev_day;
                $databaru["OA_DAY"]              = $oa_day;
                $databaru["TARGET_REVENUE_DAY"]  = $rkap_rev_day;
                $databaru["TARGET_VOLUME_DAY"]   = $rkap_ton_day;
                $databaru["VARIAN_REVENUE_DAY"]  = $varianRevenue_day;
                $databaru["VARIAN_VOLUME_DAY"]   = $varianVolume_day;
                $databaru["TOTAL_SALES_MONTH"]     = $totsales_month;
                $databaru["VOLUME_MONTH"]          = $vol_monnth;
                $databaru["PRICE_MONTH"]           = $price_month;
                $databaru["REVENUE_MONTH"]         = $rev_month;
                $databaru["OA_MONTH"]              = $oa_month;
                $databaru["TARGET_REVENUE_MONTH"]  =$rkap_rev_month;
                $databaru["TARGET_VOLUME_MONTH"]   = $rkap_ton_month;
                $databaru["VARIAN_REVENUE_MONTH"]  = $varianRevenue_month;
                $databaru["VARIAN_VOLUME_MONTH"]   = $varianVolume_month;
                $databaru["TOTAL_SALES_YEAR"]     = $totsales_year;
                $databaru["VOLUME_YEAR"]          = $vol_year;
                $databaru["PRICE_YEAR"]           = $price_year;
                $databaru["REVENUE_YEAR"]         = $rev_year;
                $databaru["OA_YEAR"]              = $oa_year;
                $databaru["TARGET_REVENUE_YEAR"]  = $rkap_rev_year;
                $databaru["TARGET_VOLUME_YEAR"]   = $rkap_ton_year;
                $databaru["VARIAN_REVENUE_YEAR"]  = $varianRevenue_year;
                $databaru["VARIAN_VOLUME_YEAR"]   = $varianVolume_year;
                //$iter2+=1;
                array_push($arrayhasilbaru, $databaru);
        }
        
        $datafiks=array();
        $datafiks = array_unique($arrayhasilbaru);
        $datafiks = array_values($datafiks);
        
        return $datafiks;
        
    }
    
    private function get_data_revenue_harian(){
        $data = $this->sales_revenue_data->get_data();
        echo json_encode(array('notify'=>1, 'revenue'=>$data));
    }
    
    //=============================data tren===========================================
    
    
    function VolumeRevenue_TREND_PER_OPCO($opco,$time=null)
    {
        if ($time==null)
        {
            $time = date("Y.m");
        }
        $bln = substr($time, -2);
        $thn = substr($time, 0, 4);
        
        $tgl_now = date('Y/m/d');
        $bln_now = date('m');
        $thn_now = date('Y');
        $tgl_last = date("t", strtotime($thn . '/' . $bln . '/23'));
        
        if ($bln == $bln_now && $thn == $thn_now) {
            $tgl_rel = date('d');
        } else {
            $tgl_rel = $tgl_last;
        }

        $data_rkap = $this->M_RVD->get_detail_rkap_harian_opco($bln, $thn,$tgl_last,$opco);
        $data_actual = $this->M_RVD->get_actual_rkap_harian_opco($tgl_rel, $bln, $thn, $opco);
        $trend = array("OPCO"=>$opco,"TAHUN"=>$thn,"DATA_RKAP"=>$data_rkap,"DATA_ACTUAL"=>$data_actual);
        echo json_encode($trend);
    }

    function VolumeRevenue_TRENDBULAN_PER_OPCO($opco,$time=null)
    {
        if ($time==null)
        {
            $time = date("Y");
        }
        $bln = substr($time, -2);
        $thn = substr($time, 0, 4);
        
        $tgl_now = date('Y/m/d');
        $bln_now = date('m');
        $thn_now = date('Y');
        $tgl_last = date("t", strtotime($thn . '/' . $bln . '/23'));
        
        if ($bln == $bln_now && $thn == $thn_now) {
            $tgl_rel = date('d');
        } else {
            $tgl_rel = $tgl_last;
        }

        $data_rkap = $this->M_RVD->get_detail_rkap_bulanan_opco($thn,$opco);
        $data_actual = $this->M_RVD->get_actual_rkap_bulanan_opco($thn, $opco);
        $trend = array("OPCO"=>$opco,"TAHUN"=>$thn,"DATA_RKAP"=>$data_rkap,"DATA_ACTUAL"=>$data_actual);
        echo json_encode($trend);
    }

    function VolumeRevenue_TREND_SMIG($time=null)
    {
        if ($time==null)
        {
            $time = date("Y.m");
        }
        $bln = substr($time, -2);
        $thn = substr($time, 0, 4);
        
        $tgl_now = date('Y/m/d');
        $bln_now = date('m');
        $thn_now = date('Y');
        $tgl_last = date("t", strtotime($thn . '/' . $bln . '/23'));
        
        if ($bln == $bln_now && $thn == $thn_now) {
            $tgl_rel = date('d');
        } else {
            $tgl_rel = $tgl_last;
        }

        $data_rkap = $this->M_RVD->get_detail_rkap_harian_smig($bln, $thn,$tgl_last);
        $data_actual = $this->M_RVD->get_actual_rkap_harian_smig($tgl_rel, $bln, $thn);
        $trend = array("TAHUN"=>$thn,"BULAN"=>$bln,"DATA_RKAP"=>$data_rkap,"DATA_ACTUAL"=>$data_actual);
        echo json_encode($trend);
    }

    /**
     * [VolumeRevenue_TRENDBULAN_SMIG description]
     * @param [type] $time [description]
     */
    function VolumeRevenue_TRENDBULAN_SMIG($time=null)
    {
        if ($time==null)
        {
            $time = date("Y");
        }
        $bln = substr($time, -2);
        $thn = substr($time, 0, 4);
        
        $tgl_now = date('Y/m/d');
        $bln_now = date('m');
        $thn_now = date('Y');
        $tgl_last = date("t", strtotime($thn . '/' . $bln . '/23'));
        
        if ($bln == $bln_now && $thn == $thn_now) {
            $tgl_rel = date('d');
        } else {
            $tgl_rel = $tgl_last;
        }

        $data_rkap = $this->M_RVD->get_detail_rkap_bulanan_smig($thn);
        $data_actual = $this->M_RVD->get_actual_rkap_bulanan_smig($thn);
        $trend = array("OPCO"=>"SMIG","TAHUN"=>$thn,"DATA_RKAP"=>$data_rkap,"DATA_ACTUAL"=>$data_actual);
        echo json_encode($trend);
    }
    
    function Prognus_bulanan_smig()
    {
        $time=null;
        $total_hari = date('t');
        if ($time==null)
        {
            $time = date("Y");
        }
        
        //get sisa hari
        $tgl_start = strtotime((date('Y/m/d')));
        $tgl_end  = strtotime(date('Y/m/t'));
        $timeDiff = abs($tgl_end - $tgl_start);
        $numberDays = intval($timeDiff/86400);
        
        $bln = substr($time, -2);
        $thn = substr($time, 0, 4);
        $tgl_now = date('Y/m/d');
        $bln_now = date('m');
        $thn_now = date('Y');
        $tgl_last = date("t", strtotime($thn . '/' . $bln . '/23'));
        
        if ($bln == $bln_now && $thn == $thn_now) {
            $tgl_rel = date('d');
        } else {
            $tgl_rel = $tgl_last;
        }
        
        $tanggal='';
        $rata_rkap_volume=$rata_sisa_target_volume=$capaian_volume=$akumulasi_rkap_volume=$rkap_volume=$akumulasi_volume_approc = 0;
        $rata_rkap_revenue=$rata_sisa_target_revenue=$capaian_revenue=$akumulasi_rkap_revenue=$rkap_revenue=$akumulasi_revenue_approc =0;
        $price = $total_sales= $oa= 0;
        $rata_volume_capaian=$rata_revenue_capaian=0;
        
        
        //$data_rkap          = $this->sales_revenue_data->get_detail_rkap_bulanan_smig_where_bulan($thn,$bln_now);
        //$data_rkap          = $this->sales_revenue_data->get_all_produk_rkap_bulanan($thn, $bln_now);
        $data_rkap          = $this->sales_revenue_data->get_all_produk_rkap_bulanan($thn, $bln_now);
        $datatotal_actual   = $this->sales_revenue_data->get_Sum_actual_rkap_bulanan_smig_where_bulan($thn,$bln_now);
        $datadetail_actual  = $this->sales_revenue_data->get_actual_rkap_bulanan_smig_where_bulan($thn,$bln_now);
        //print_r($data_rkap);
        if($data_rkap != null){
            foreach($data_rkap as $a){
                if((int)$a['BULAN'] != (int)$bln_now)
                    continue;
                $rkap_volume = $a['RKAP_VOLUME'];
                $rkap_revenue = $a['RKAP_REVENUE'];
            }
        }
        
        //get data rata rkap revenue dan volume
        if($rkap_revenue != null || $rkap_revenue > 0){
            $rata_rkap_revenue = $rkap_revenue / $total_hari;
        }
        else{
            $rata_rkap_revenue = 0;
        }
        if($rkap_volume != null || $rkap_volume > 0){
            $rata_rkap_volume = $rkap_volume / $total_hari;
        }
        else{
            $rata_rkap_volume = 0;
        }
        
        //get data total capaian
        if($datatotal_actual != null){
            foreach($datatotal_actual as $i){
                if((int)$i['BULAN'] != (int)$bln_now)
                    continue;
                $capaian_volume = $i['VOL'];
                $capaian_revenue = $i['REV'];
                $total_sales = $i['TOTALSALES'];
                $price  = $i['PRICE'];
            }
        }
        
        $rata_revenue_capaian   = ($rkap_revenue - $capaian_revenue) / $numberDays;
        $rata_volume_capaian    = ($rkap_volume - $capaian_volume) / $numberDays;
        
        $data_prognus_revenue_rkap  = array();
        $data_prognus_volume_rkap   = array();
        $data_rata_capaian_volume   = array();
        $data_rata_capaian_revenue  = array();
        $data_rata_rkap_revenue     = array();
        $data_rata_rkap_volume      = array();
        $data_prognus_revenue       = array();
        $data_prognus_volume        = array();
//        echo '<pre>';
//        print_r($datadetail_actual);
//        echo '</pre>';
//        
        for($a=1;$a<=$total_hari;$a++){
            if(strlen($a)==1)
                $a = '0'.$a;
            $tanggal = date($a.'-M-y');
            
            $rata_sisa_target_revenue= $rata_revenue_capaian;
            $rata_sisa_target_volume = $rata_volume_capaian;
            
            foreach($datadetail_actual as $i){
                if(strtotime($i['TANGGAL']) != strtotime($tanggal))
                    continue;
                    $rata_sisa_target_revenue = $i['REV'];
                    $rata_sisa_target_volume = $i['VOL'];
                    break;
            }
            
            $akumulasi_volume_approc +=$rata_sisa_target_volume;
            $akumulasi_revenue_approc +=$rata_sisa_target_revenue;
            $akumulasi_rkap_revenue +=$rata_rkap_revenue;
            $akumulasi_rkap_volume +=$rata_rkap_volume;
            
            array_push($data_prognus_revenue_rkap, array('tanggal'=> $tanggal, 'nilai'=>$akumulasi_rkap_revenue));
            array_push($data_prognus_volume_rkap, array('tanggal'=> $tanggal, 'nilai'=>$akumulasi_rkap_volume));
            array_push($data_rata_capaian_volume, array('tanggal'=> $tanggal, 'nilai'=>$rata_sisa_target_volume));
            array_push($data_rata_capaian_revenue, array('tanggal'=> $tanggal, 'nilai'=>$rata_sisa_target_revenue));
            array_push($data_rata_rkap_volume, array('tanggal'=> $tanggal, 'nilai'=>$rata_rkap_volume));
            array_push($data_rata_rkap_revenue, array('tanggal'=> $tanggal, 'nilai'=>$rata_rkap_revenue));
            array_push($data_prognus_revenue, array('tanggal'=> $tanggal, 'nilai'=>$akumulasi_revenue_approc));
            array_push($data_prognus_volume, array('tanggal'=> $tanggal, 'nilai'=>$akumulasi_volume_approc));
            
            
        }
        
    //    echo json_encode(array('nama'=>'data_prognus_harian','rkap_lama'=>$data_rkap,'rkap_baru'=>$data_rkap2));
        echo json_encode(array('nama'=>'data_prognus_harian_smig','prognus_rkap_volume'=>$data_prognus_volume_rkap,'prognus_rkap_revenue'=>$data_prognus_revenue_rkap,
			'rata_rkap_revenue'=>$data_rata_rkap_revenue,'rata_rkap_volume'=>$data_rata_rkap_volume,'rata_capaian_volume'=>$data_rata_capaian_volume,
            'rata_capaian_revenue'=>$data_rata_capaian_revenue,'prognus_capaian_volume'=>$data_prognus_volume,'prognus_capaian_revenue'=>$data_prognus_revenue));
//
    }
    
    
    
    
    function Prognus_bulanan_opco()
    {
        $org = $this->input->get('org');
        //$org =7000;
        $time=null;
        $total_hari = date('t');
        if ($time==null)
        {
            $time = date("Y");
        }
        
        //get sisa hari
        $tgl_start = strtotime((date('Y/m/d')));
        $tgl_end  = strtotime(date('Y/m/t'));
        $timeDiff = abs($tgl_end - $tgl_start);
        $numberDays = intval($timeDiff/86400);
        
        $bln = substr($time, -2);
        $thn = substr($time, 0, 4);
        $tgl_now = date('Y/m/d');
        $bln_now = date('m');
        $thn_now = date('Y');
        $tgl_last = date("t", strtotime($thn . '/' . $bln . '/23'));
        
        if ($bln == $bln_now && $thn == $thn_now) {
            $tgl_rel = date('d');
        } else {
            $tgl_rel = $tgl_last;
        }
        
        $tanggal='';
        $rata_rkap_volume=$rata_sisa_target_volume=$capaian_volume=$akumulasi_rkap_volume=$rkap_volume=$akumulasi_volume_approc = 0;
        $rata_rkap_revenue=$rata_sisa_target_revenue=$capaian_revenue=$akumulasi_rkap_revenue=$rkap_revenue=$akumulasi_revenue_approc =0;
        $price = $total_sales= $oa= 0;
        $rata_volume_capaian=$rata_revenue_capaian=0;
        
        
        //$data_rkap          = $this->sales_revenue_data->get_detail_rkap_bulanan_smig_where_bulan($thn,$bln_now);
        //$data_rkap          = $this->sales_revenue_data->get_all_produk_rkap_bulanan($thn, $bln_now);
        $data_rkap          = $this->sales_revenue_data->get_all_produk_rkap_bulanan_by_opco($thn, $bln_now, $org);
        $datatotal_actual   = $this->sales_revenue_data->get_Sum_actual_rkap_bulanan_by_opco_where_bulan($thn,$bln_now,$org);
        $datadetail_actual  = $this->sales_revenue_data->get_actual_rkap_bulanan_by_opco_where_bulan($thn,$bln_now,$org);
        //print_r($data_rkap);
        if($data_rkap != null){
            foreach($data_rkap as $a){
                if((int)$a['BULAN'] != (int)$bln_now)
                    continue;
                $rkap_volume = $a['RKAP_VOLUME'];
                $rkap_revenue = $a['RKAP_REVENUE'];
            }
        }
        
        //get data rata rkap revenue dan volume
        if($rkap_revenue != null || $rkap_revenue > 0){
            $rata_rkap_revenue = $rkap_revenue / $total_hari;
        }
        else{
            $rata_rkap_revenue = 0;
        }
        if($rkap_volume != null || $rkap_volume > 0){
            $rata_rkap_volume = $rkap_volume / $total_hari;
        }
        else{
            $rata_rkap_volume = 0;
        }
        
        //get data total capaian
        if($datatotal_actual != null){
            foreach($datatotal_actual as $i){
                if((int)$i['BULAN'] != (int)$bln_now)
                    continue;
                $capaian_volume = $i['VOL'];
                $capaian_revenue = $i['REV'];
                $total_sales = $i['TOTALSALES'];
                $price  = $i['PRICE'];
            }
        }
        
        $rata_revenue_capaian   = ($rkap_revenue - $capaian_revenue) / $numberDays;
        $rata_volume_capaian    = ($rkap_volume - $capaian_volume) / $numberDays;
        
        $data_prognus_revenue_rkap  = array();
        $data_prognus_volume_rkap   = array();
        $data_rata_capaian_volume   = array();
        $data_rata_capaian_revenue  = array();
        $data_rata_rkap_revenue     = array();
        $data_rata_rkap_volume      = array();
        $data_prognus_revenue       = array();
        $data_prognus_volume        = array();
//        echo '<pre>';
//        print_r($datadetail_actual);
//        echo '</pre>';
//        
        for($a=1;$a<=$total_hari;$a++){
            if(strlen($a)==1)
                $a = '0'.$a;
            $tanggal = date($a.'-M-y');
            
            $rata_sisa_target_revenue= $rata_revenue_capaian;
            $rata_sisa_target_volume = $rata_volume_capaian;
            
            foreach($datadetail_actual as $i){
                if(strtotime($i['TANGGAL']) != strtotime($tanggal))
                    continue;
                    $rata_sisa_target_revenue = $i['REV'];
                    $rata_sisa_target_volume = $i['VOL'];
                    break;
            }
            
            $akumulasi_volume_approc +=$rata_sisa_target_volume;
            $akumulasi_revenue_approc +=$rata_sisa_target_revenue;
            $akumulasi_rkap_revenue +=$rata_rkap_revenue;
            $akumulasi_rkap_volume +=$rata_rkap_volume;
            
            array_push($data_prognus_revenue_rkap, array('tanggal'=> $tanggal, 'nilai'=>$akumulasi_rkap_revenue));
            array_push($data_prognus_volume_rkap, array('tanggal'=> $tanggal, 'nilai'=>$akumulasi_rkap_volume));
            array_push($data_rata_capaian_volume, array('tanggal'=> $tanggal, 'nilai'=>$rata_sisa_target_volume));
            array_push($data_rata_capaian_revenue, array('tanggal'=> $tanggal, 'nilai'=>$rata_sisa_target_revenue));
            array_push($data_rata_rkap_volume, array('tanggal'=> $tanggal, 'nilai'=>$rata_rkap_volume));
            array_push($data_rata_rkap_revenue, array('tanggal'=> $tanggal, 'nilai'=>$rata_rkap_revenue));
            array_push($data_prognus_revenue, array('tanggal'=> $tanggal, 'nilai'=>$akumulasi_revenue_approc));
            array_push($data_prognus_volume, array('tanggal'=> $tanggal, 'nilai'=>$akumulasi_volume_approc));
            
            
        }
        
    //    echo json_encode(array('nama'=>'data_prognus_harian','rkap_lama'=>$data_rkap,'rkap_baru'=>$data_rkap2));
        echo json_encode(array('nama'=>'data_prognus_harian_opco'.$org,'prognus_rkap_volume'=>$data_prognus_volume_rkap,'prognus_rkap_revenue'=>$data_prognus_revenue_rkap,
			'rata_rkap_revenue'=>$data_rata_rkap_revenue,'rata_rkap_volume'=>$data_rata_rkap_volume,'rata_capaian_volume'=>$data_rata_capaian_volume,
            'rata_capaian_revenue'=>$data_rata_capaian_revenue,'prognus_capaian_volume'=>$data_prognus_volume,'prognus_capaian_revenue'=>$data_prognus_revenue));
//
    }
    
    
    function Prognus_tahunan_smig()
    {
        $time=null;
        $total_hari = date('t');
        if ($time==null)
        {
            $time = date("Y");
        }
        
        //get sisa hari
        $tgl_start = strtotime((date('Y/m/d')));
        $tgl_end  = strtotime(date('Y/m/t'));
        $timeDiff = abs($tgl_end - $tgl_start);
        $numberDays = intval($timeDiff/86400);
        
        $bln = substr($time, -2);
        $thn = substr($time, 0, 4);
        $tgl_now = date('Y/m/d');
        $bln_now = date('m');
        $thn_now = date('Y');
        $tgl_last = date("t", strtotime($thn . '/' . $bln . '/23'));
        
        if ($bln == $bln_now && $thn == $thn_now) {
            $tgl_rel = date('d');
        } else {
            $tgl_rel = $tgl_last;
        }
        
        $tanggal='';
        $rata_rkap_volume=$rata_sisa_target_volume=$capaian_volume=$akumulasi_rkap_volume=$rkap_volume=$akumulasi_volume_approc = 0;
        $rata_rkap_revenue=$rata_sisa_target_revenue=$capaian_revenue=$akumulasi_rkap_revenue=$rkap_revenue=$akumulasi_revenue_approc =0;
        $price = $total_sales= $oa= 0;
        $rata_volume_capaian=$rata_revenue_capaian=0;
        
        
        //$data_rkap          = $this->sales_revenue_data->get_detail_rkap_bulanan_smig_where_bulan($thn,$bln_now);
        //$data_rkap          = $this->sales_revenue_data->get_all_produk_rkap_bulanan($thn, $bln_now);
        $data_rkap          = $this->sales_revenue_data->get_all_produk_rkap_per_bulanan($thn);
        $datatotal_actual   = $this->sales_revenue_data->get_total_actual_rkap_tahunan_smig_where_tahun($thn);
        $datadetail_actual  = $this->sales_revenue_data->get_detail_actual_rkap_tahuan_smig_where_tahun($thn);
        //print_r($data_rkap);
        
        
        
        $data_prognus_revenue_rkap  = array();
        $data_prognus_volume_rkap   = array();
        $data_rata_capaian_volume   = array();
        $data_rata_capaian_revenue  = array();
        $data_rata_rkap_revenue     = array();
        $data_rata_rkap_volume      = array();
        $data_prognus_revenue       = array();
        $data_prognus_volume        = array();
        
        for($a=1;$a<=12;$a++){
            if(strlen($a)==1)
                $a = '0'.$a;
            $bulan = date($a.'-y');
            
            foreach($datadetail_actual as $i){
                if((int)$i['BULAN'] != (int)$a)
                    continue;
                    $rata_sisa_target_revenue = $i['REV'];
                    $rata_sisa_target_volume = $i['VOL'];
                    break;
            }
            
            foreach($data_rkap as $i){
                if((int)$i['BULAN'] != (int)$a)
                    continue;
                    $rata_rkap_revenue = $i['RKAP_REVENUE'];
                    $rata_rkap_volume = $i['RKAP_VOLUME'];
                    break;
            }
            
            $akumulasi_volume_approc +=$rata_sisa_target_volume;
            $akumulasi_revenue_approc +=$rata_sisa_target_revenue;
            $akumulasi_rkap_revenue +=$rata_rkap_revenue;
            $akumulasi_rkap_volume +=$rata_rkap_volume;
           
            array_push($data_prognus_revenue_rkap, array('bulan'=> $bulan, 'nilai'=>$akumulasi_rkap_revenue));
            array_push($data_prognus_volume_rkap, array('bulan'=> $bulan, 'nilai'=>$akumulasi_rkap_volume));
            array_push($data_rata_capaian_volume, array('bulan'=> $bulan, 'nilai'=>$rata_sisa_target_volume));
            array_push($data_rata_capaian_revenue, array('bulan'=> $bulan, 'nilai'=>$rata_sisa_target_revenue));
            array_push($data_rata_rkap_volume, array('bulan'=> $bulan, 'nilai'=>$rata_rkap_volume));
            array_push($data_rata_rkap_revenue, array('bulan'=> $bulan, 'nilai'=>$rata_rkap_revenue));
            array_push($data_prognus_revenue, array('bulan'=> $bulan, 'nilai'=>$akumulasi_revenue_approc));
            array_push($data_prognus_volume, array('bulan'=> $bulan, 'nilai'=>$akumulasi_volume_approc));
            
            
        }
        
        //echo json_encode(array('nama'=>'data_prognus_tahuan_smig','rkap'=>$data_rkap,'capain_total'=>$datatotal_actual,
//        'capaian_detail'=>$datadetail_actual));
        echo json_encode(array('nama'=>'data_prognus_tahuan_smig','prognus_rkap_volume'=>$data_prognus_volume_rkap,'prognus_rkap_revenue'=>$data_prognus_revenue_rkap,
			'rata_rkap_revenue'=>$data_rata_rkap_revenue,'rata_rkap_volume'=>$data_rata_rkap_volume,'rata_capaian_volume'=>$data_rata_capaian_volume,
            'rata_capaian_revenue'=>$data_rata_capaian_revenue,'prognus_capaian_volume'=>$data_prognus_volume,'prognus_capaian_revenue'=>$data_prognus_revenue));

    }
    
    function Prognus_tahunan_opco()
    {
        $org = $this->input->get('org');
        //$org = 7000;
        $time=null;
        $total_hari = date('t');
        if ($time==null)
        {
            $time = date("Y");
        }
        
        //get sisa hari
        $tgl_start = strtotime((date('Y/m/d')));
        $tgl_end  = strtotime(date('Y/m/t'));
        $timeDiff = abs($tgl_end - $tgl_start);
        $numberDays = intval($timeDiff/86400);
        
        $bln = substr($time, -2);
        $thn = substr($time, 0, 4);
        $tgl_now = date('Y/m/d');
        $bln_now = date('m');
        $thn_now = date('Y');
        $tgl_last = date("t", strtotime($thn . '/' . $bln . '/23'));
        
        if ($bln == $bln_now && $thn == $thn_now) {
            $tgl_rel = date('d');
        } else {
            $tgl_rel = $tgl_last;
        }
        
        $tanggal='';
        $rata_rkap_volume=$rata_sisa_target_volume=$capaian_volume=$akumulasi_rkap_volume=$rkap_volume=$akumulasi_volume_approc = 0;
        $rata_rkap_revenue=$rata_sisa_target_revenue=$capaian_revenue=$akumulasi_rkap_revenue=$rkap_revenue=$akumulasi_revenue_approc =0;
        $price = $total_sales= $oa= 0;
        $rata_volume_capaian=$rata_revenue_capaian=0;
        
        
        //$data_rkap          = $this->sales_revenue_data->get_detail_rkap_bulanan_smig_where_bulan($thn,$bln_now);
        //$data_rkap          = $this->sales_revenue_data->get_all_produk_rkap_bulanan($thn, $bln_now);
        $data_rkap          = $this->sales_revenue_data->get_all_produk_rkap_per_bulanan_by_opco($thn,$org);
        $datatotal_actual   = $this->sales_revenue_data->get_total_actual_rkap_tahunan_opco_where_tahun($thn,$org);
        $datadetail_actual  = $this->sales_revenue_data->get_detail_actual_rkap_tahuan_opco_where_tahun($thn,$org);
        //print_r($data_rkap);
        
        
        
        $data_prognus_revenue_rkap  = array();
        $data_prognus_volume_rkap   = array();
        $data_rata_capaian_volume   = array();
        $data_rata_capaian_revenue  = array();
        $data_rata_rkap_revenue     = array();
        $data_rata_rkap_volume      = array();
        $data_prognus_revenue       = array();
        $data_prognus_volume        = array();
        
        for($a=1;$a<=12;$a++){
            if(strlen($a)==1)
                $a = '0'.$a;
            $bulan = date($a.'-y');
            
            foreach($datadetail_actual as $i){
                if((int)$i['BULAN'] != (int)$a)
                    continue;
                    $rata_sisa_target_revenue = $i['REV'];
                    $rata_sisa_target_volume = $i['VOL'];
                    break;
            }
            
            foreach($data_rkap as $i){
                if((int)$i['BULAN'] != (int)$a)
                    continue;
                    $rata_rkap_revenue = $i['RKAP_REVENUE'];
                    $rata_rkap_volume = $i['RKAP_VOLUME'];
                    break;
            }
            //
            $akumulasi_volume_approc +=$rata_sisa_target_volume;
            $akumulasi_revenue_approc +=$rata_sisa_target_revenue;
            $akumulasi_rkap_revenue +=$rata_rkap_revenue;
            $akumulasi_rkap_volume +=$rata_rkap_volume;
           
            array_push($data_prognus_revenue_rkap, array('bulan'=> $bulan, 'nilai'=>$akumulasi_rkap_revenue));
            array_push($data_prognus_volume_rkap, array('bulan'=> $bulan, 'nilai'=>$akumulasi_rkap_volume));
            array_push($data_rata_capaian_volume, array('bulan'=> $bulan, 'nilai'=>$rata_sisa_target_volume));
            array_push($data_rata_capaian_revenue, array('bulan'=> $bulan, 'nilai'=>$rata_sisa_target_revenue));
            array_push($data_rata_rkap_volume, array('bulan'=> $bulan, 'nilai'=>$rata_rkap_volume));
            array_push($data_rata_rkap_revenue, array('bulan'=> $bulan, 'nilai'=>$rata_rkap_revenue));
            array_push($data_prognus_revenue, array('bulan'=> $bulan, 'nilai'=>$akumulasi_revenue_approc));
            array_push($data_prognus_volume, array('bulan'=> $bulan, 'nilai'=>$akumulasi_volume_approc));
            
            
        }
        
        //echo json_encode(array('nama'=>'data_prognus_tahuan_smig','rkap'=>$data_rkap,'capain_total'=>$datatotal_actual,
//        'capaian_detail'=>$datadetail_actual));
        echo json_encode(array('nama'=>'data_prognus_tahuan_opco'.$org,'prognus_rkap_volume'=>$data_prognus_volume_rkap,'prognus_rkap_revenue'=>$data_prognus_revenue_rkap,
			'rata_rkap_revenue'=>$data_rata_rkap_revenue,'rata_rkap_volume'=>$data_rata_rkap_volume,'rata_capaian_volume'=>$data_rata_capaian_volume,
            'rata_capaian_revenue'=>$data_rata_capaian_revenue,'prognus_capaian_volume'=>$data_prognus_volume,'prognus_capaian_revenue'=>$data_prognus_revenue));

    }


}
?>