<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sales_revenue_bpc extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->load->model('Sales_revenue_model');
        $this->load->model('coba','M_RVD');
    }

    public function index() {
        $data = $this->M_RVD->get_last_date();
        $data_r = '';
        foreach ($data as $d) {
            $data_r['last'] = $d['LAST_UPDATE'];
        }
        // print_r($data_r);
        // $this->load->view('admin/financial/V_RVD', $data_r);
    }

    public function isidata() {
        $temp = '';
        for ($i = 1; $i <= 3; $i++) {
            $temp = $temp . '"VOLUME' . $i . '":"penjualan","PRICE' . $i . '":"oa","TOTALSALES' . $i . '":"revenue","OA' . $i . '":"OA","REVENUE' . $i . '":"REVENUE","RKAP' . $i . '":"RKAP",';
        }
        return $temp;
    }

    
    /**
     * [This function to get Volume and Revenue in SMIGgroup]
     * @param  [type] $time [format must be Y.m]
     * @return [type]       [format return json]
     */
    function globalVolumeRevenue_SMIG($time=null)
    {
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
        $data = $this->data1($b, $thn);
        $data = json_encode($data);
        echo $data;
        
    }

    function globalVolumeRevenue_SMIG_imam($time=null)
    {
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
        // $data = $this->data1($b, $thn);
        // $data = json_encode($data);

        $a = $this->VolumeRevenue_PER_OPCO_new('3000');
        $b = $this->VolumeRevenue_PER_OPCO_new('4000');
        $c = $this->VolumeRevenue_PER_OPCO_new('5000');
        $d = $this->VolumeRevenue_PER_OPCO_new('6000');
        $e = $this->VolumeRevenue_PER_OPCO_new('7000');
        $data1 = $a;
        $total = "";
        foreach ($data1 as $key => $value) {
            # code...
        }
        echo "<pre>";
        print_r($data1);

        // echo $data;
        
    }

    /**
     * [globalVolumeRevenue_BAG_BULK_KLINKER description]
     * @param  [type] $time [format must be Y.m]
     * @return [type]       [description]
     */
    function globalVolumeRevenue_BAG_BULK_KLINKER($time=null)
    {
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
        $data = $this->data2tipe($b, $thn);
        $data = json_encode($data);
        echo $data;
    }

    
    function globalVolumeRevenue_ALL_PROV($time=null)
    {
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
        $data = $this->data2prov($b, $thn);
        $data = json_encode($data);
        echo $data;
    }

    /**
     * [globalVolumeRevenue_PER_OPCO description]
     * @param  [type] $opco [Kode Opco 5000,7000,6000]
     * @param  [type] $time [description]
     * @return [type]       [description]
     */
    function VolumeRevenue_PER_OPCO($opco,$time=null)
    {
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
        // $data = $this->get_data_company($opco, $b, $thn);
        $listopco = "";
        if ($opco=="7000")
        {
            $opco = "5000,7000";
            $listopco = "7000";
            $data = $this->get_data_company($opco, $b, $thn);
        }else{
            $listopco = $opco;
            $data = $this->get_data_company($opco, $b, $thn);
        }

        $return = array("COMPANY"=>$listopco,"DATA"=>$data);
        echo json_encode($return);
    }

    function VolumeRevenue_PER_OPCO_new($opco,$time=null)
    {
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
        $data = $this->get_data_company($opco, $b, $thn);
        $return = array("COMPANY"=>$opco,"DATA"=>$data);
        return $return;
    }

    function VolumeRevenue_PROV_PER_OPCO($opco,$time=null)
    {
        if ($time==null)
        {
            $time = date("Y.m");
        }
        $b = substr($time, -2);
        $thn = substr($time, 0, 4);
        $bln = $thn . '/' . $b;
        $tim = str_replace(".", "", $time);
        $id = null;
        $i = 0;
        $data = $this->get_prov_all_opco($opco, $b, $thn);
        echo json_encode($data);
        //echo json_encode($data);
        // if (substr($opco, 0, 2) == '10' or substr($opco, 0, 2) == '60') {
        //     $this->companyprov($opco, $b, $thn);
        // } else {
        //     $this->bbcprov($opco, $b, $thn);
        // }
    }

    function VolumeRevenue_BBC_PER_OPCO($opco,$time=null)
    {
        if ($time==null)
        {
            $time = date("Y.m");
        }
        $b = substr($time, -2);
        $thn = substr($time, 0, 4);
        $bln = $thn . '/' . $b;
        $tim = str_replace(".", "", $time);
        $id = null;
        $i = 0;
        $data['BAG'] = $this->get_bbc_opco('ZAK', $b, $thn,$opco);
        $data['BULK'] = $this->get_bbc_opco('Curah', $b, $thn,$opco);
        $data['CLINKER'] = $this->get_bbc_opco('Clinker', $b, $thn,$opco);
        echo json_encode($data);
        //echo json_encode($data);
        // if (substr($opco, 0, 2) == '10' or substr($opco, 0, 2) == '60') {
        //     $this->companyprov($opco, $b, $thn);
        // } else {
        //     $this->bbcprov($opco, $b, $thn);
        // }
    }

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
        // $data_rkap = array();
        $data_actual = $this->M_RVD->get_actual_rkap_bulanan_smig($thn);
        $trend = array("OPCO"=>"SMIG","TAHUN"=>$thn,"DATA_RKAP"=>$data_rkap,"DATA_ACTUAL"=>$data_actual);
        echo json_encode($trend);
    }

    public function get_prov_all_opco($opco,$bln, $thn) {
        $data = $this->M_RVD->get_prov_by_opco($opco,$bln,$thn);
        // echo "[";
        $count = count($data);
        $u = 1;
        $datareturn = array();
        foreach ($data as $d) {
            $opcoperprov = $this->get_data_prov($d["VKORG"], $d["VKBUR_TXT"], $bln, $thn, $d["VKBUR"]);
            $datareturn[] = array("COMPANY"=>$opco,"IDPROV"=>$d["VKBUR"],"PROV"=>$d["VKBUR_TXT"],"data"=>$opcoperprov);
            // if ($u == $count) {
            //     echo '{"idd":"3000__4000__5000__7000pisah' . $d["VKBUR_TXT"] . 'pisah' . $d["VKBUR"] . '","company":" <b>' . $d["VKBUR_TXT"] . '</b>",' . $this->get_data_prov($d["VKORG"], $d["VKBUR_TXT"], $bln, $thn, $d["VKBUR"]) . '"state":"closed"}';
            // } else {
            //     echo '{"idd":"3000__4000__5000__7000pisah' . $d["VKBUR_TXT"] . 'pisah' . $d["VKBUR"] . '","company":" <b>' . $d["VKBUR_TXT"] . '</b>",' . $this->get_data_prov($d["VKORG"], $d["VKBUR_TXT"], $bln, $thn, $d["VKBUR"]) . '"state":"closed"},';
            // }
            $u++;
        }
        // echo "]";
        // print_r($datareturn);
        return $datareturn;        
    }

    public function show($time,$tipe) {
        // $time = $_POST['etime'];
        // $tipe = $_POST['etipe'];
        $b = substr($time, -2);
        $thn = substr($time, 0, 4);
        $bln = $thn . '/' . $b;
        $tim = str_replace(".", "", $time);
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $i = 0;
        if ($tipe == 'company') {
            if ($id == null) {
                $this->data1($b, $thn);
            } else if ($id == 'smig') {
                $this->data2($b, $thn);
            } else if ($id == '2000' or $id == '3000' or $id == '4000' or $id == '5000' or $id == '6000' or $id == '7000') {
                $this->company($id, $b, $thn);
            } else {
                $this->bbc($id, $b, $thn);
            }
        } else if ($tipe == 'tipe') {
            if ($id == null) {
                $this->data1($b, $thn);
            } else if ($id == 'smig') {
                $this->data2tipe($b, $thn);
            } else if ($id == 'ZAK' or $id == 'Curah' or $id == 'Clinker') {
                $this->companytipe($id, $b, $thn);
            } else {
                $this->provtipe($id, $b, $thn);
            }
        } else if ($tipe == 'provinsi') {
            if ($id == null) {
                $this->data1($b, $thn);
            } else if ($id == 'smig') {
                $this->data2prov($b, $thn);
            } else {
                if (substr($id, 0, 2) == '10' or substr($id, 0, 2) == '60') {
                    $this->companyprov($id, $b, $thn);
                } else {
                    $this->bbcprov($id, $b, $thn);
                }
            }
        }
    }

    public function data1($bln, $thn) {
    //     $data = '{"total":50,"rows":[
				// 	{"idd":"smig","company":"<b>Semen Indonesia</b>",' . $this->total($bln, $thn) . '"state":"closed"}
				// ],"footer":[
				// 	{"company":"TOTAL",' . $this->total($bln, $thn) . '"state":""}
				// ]}';
        $data = array("company"=>"Semen Indonesia","data"=>$this->total($bln, $thn));
        return $data;
    }

    public function data2($bln, $thn) {
        /* $data = '[
          {"idd":"2000","company":" <b>2000 - Semen Indonesia</b>",'.$this->get_data_company("'2000'",$bln,$thn).'"state":"closed"},
          {"idd":"3000","company":" <b>3000 - Semen Padang</b>",'.$this->get_data_company("'3000'",$bln,$thn).'"state":"closed"},
          {"idd":"4000","company":" <b>4000 - Semen Tonasa</b>",'.$this->get_data_company("'4000'",$bln,$thn).'"state":"closed"},
          {"idd":"5000","company":" <b>5000 - Semen Gresik</b>",'.$this->get_data_company("'5000'",$bln,$thn).'"state":"closed"},
          {"idd":"6000","company":" <b>6000 - TLCC</b>",'.$this->get_data_company("'6000'",$bln,$thn).'"state":"closed"},
          {"idd":"7000","company":" <b>7000 - KSO</b>",'.$this->get_data_company("'7000'",$bln,$thn).'"state":"closed"}
          ]'; */
        $comp = $this->M_RVD->get_company_company($thn);
        echo "[";
        $count = count($comp);
        $i = 1;
        foreach ($comp as $k => $v) {
            if ($i == $count) {
                echo'{"idd":"' . substr($v['VKORG'], 0, 4) . '","company":"<b>' . $v['VKORG'] . '</b>",' . $this->get_data_company(substr($v['VKORG'], 0, 4), $bln, $thn) . '"state":"closed"}';
            } else {
                echo'{"idd":"' . substr($v['VKORG'], 0, 4) . '","company":"<b>' . $v['VKORG'] . '</b>",' . $this->get_data_company(substr($v['VKORG'], 0, 4), $bln, $thn) . '"state":"closed"},';
            }
            $i++;
        }
        echo ']';
    }


    public function data2tipe($bln, $thn) {
        $data = array("company"=>"Semen Indonesia","data_thisyear"=>
                                                    array("Clinker"=>$this->get_bbc_total($bln, $thn, 'Clinker'),
                                                          "BULK"=>$this->get_bbc_total($bln, $thn, 'Curah'),
                                                          "BAG"=>$this->get_bbc_total($bln, $thn, 'ZAK'),
                                                          "YEAR"=>$thn,
                                                          "MONTH"=>date('M', mktime(0, 0, 0, $bln, 10))),
                                                    "data_prevyear"=>
                                                    array("Clinker"=>$this->get_bbc_total($bln, $thn-1, 'Clinker'),
                                                          "BULK"=>$this->get_bbc_total($bln, $thn-1, 'Curah'),
                                                          "BAG"=>$this->get_bbc_total($bln, $thn-1, 'ZAK'),
                                                        "YEAR"=>$thn-1,
                                                        "MONTH"=>date('M', mktime(0, 0, 0, $bln, 10))),
                        );
     //    $data = '[
					// {"idd":"ZAK","company":"<b><span class=\"change_lang_eng\">BAG</span><span class=\"change_lang_ina hidden\">ZAK</span></b>",' . $this->get_bbc_total($bln, $thn, 'ZAK') . '"state":"closed"},
					// {"idd":"Curah","company":"<b><span class=\"change_lang_eng\">BULK</span><span class=\"change_lang_ina hidden\">CURAH</span></b>",' . $this->get_bbc_total($bln, $thn, 'Curah') . '"state":"closed"},
					// {"idd":"Clinker","company":"<b><span class=\"change_lang_eng\">CLINKER</span><span class=\"change_lang_ina hidden\">TERAK</span></b>",' . $this->get_bbc_total($bln, $thn, 'Clinker') . '"state":"closed"}
					// ]';
        return $data;
    }

    public function bbcprov($id, $bln, $thn) {
        $data = '[
					{"idd":"' . $id . 'ZAK","company":"<b><span class=\"change_lang_eng\">BAG</span><span class=\"change_lang_ina hidden\">ZAK</span></b>",' . $this->get_bbc_prov($id, $bln, $thn, 'ZAK') . '"state":"opened"},
					{"idd":"' . $id . 'Curah","company":"<b><span class=\"change_lang_eng\">BULK</span><span class=\"change_lang_ina hidden\">CURAH</span></b>",' . $this->get_bbc_prov($id, $bln, $thn, 'Curah') . '"state":"opened"},
					{"idd":"' . $id . 'Clinker","company":"<b><span class=\"change_lang_eng\">CLINKER</span><span class=\"change_lang_ina hidden\">TERAK</span></b>",' . $this->get_bbc_prov($id, $bln, $thn, 'Clinker') . '"state":"opened"}
					]';
        echo $data;
    }

    public function data2prov($bln, $thn) {
        $prov = $this->M_RVD->get_prov_prov();
        $arrReturn = array();
        // echo "[";
        $count = count($prov);
        $i = 1;
        foreach ($prov as $k => $v) {
            $arrReturn[] = array("idd"=>$v["VKBUR"],"provinsi"=>$v["VKBUR"] . ' - ' . $v["VKBUR_TXT"] ,"data"=>$this->get_data_prov_prov($v['VKBUR'], $bln, $thn));
            // if ($i == $count) {
            //     echo '{"idd":"' . $v["VKBUR"] . '","company":"<b>' . $v["VKBUR"] . ' - ' . $v["VKBUR_TXT"] . '</b>",Data:' . $this->get_data_prov_prov($v['VKBUR'], $bln, $thn) . ',"state":"closed"}';
            // } else {
            //     echo '{"idd":"' . $v["VKBUR"] . '","company":"<b>' . $v["VKBUR"] . ' - ' . $v["VKBUR_TXT"] . '</b>",Data:' . $this->get_data_prov_prov($v['VKBUR'], $bln, $thn) . ',"state":"closed"},';
            // }
            $i++;
        }
        // echo "]";
        return $arrReturn;
    }

    public function company($company, $bln, $thn) {
        $data = $this->M_RVD->get_company($company);
        echo "[";
        $count = count($data);
        $u = 1;
        foreach ($data as $d) {
            if ($u == $count) {
                echo '{"idd":"' . $company . 'pisah' . $d["VKBUR_TXT"] . 'pisah' . $d["VKBUR"] . '","company":" <b>' . $d["VKBUR"] . ' - ' . $d["VKBUR_TXT"] . '</b>",' . $this->get_data_prov($company, $d["VKBUR_TXT"], $bln, $thn, $d["VKBUR"]) . '"state":"closed"}';
            } else {
                echo '{"idd":"' . $company . 'pisah' . $d["VKBUR_TXT"] . 'pisah' . $d["VKBUR"] . '","company":" <b>' . $d["VKBUR"] . ' - ' . $d["VKBUR_TXT"] . '</b>",' . $this->get_data_prov($company, $d["VKBUR_TXT"], $bln, $thn, $d["VKBUR"]) . '"state":"closed"},';
            }
            $u++;
        }
        echo "]";
    }

    public function get_bbc_opco($tipe, $bln, $thn,$opco) {
        $kembali = array("OPCO"=>$opco,"TIPE"=>$tipe,"DATA"=>array(
                                "THISYEAR"=>array(
                                    "YEAR"=>$thn,
                                    "MONTH"=>date('M', mktime(0, 0, 0, $bln, 10)),
                                "DATA"=>$this->get_company_tipe($tipe, $opco, $bln, $thn)
                                ),
                                "PREVYEAR"=>array("YEAR"=>$thn-1,
                                    "MONTH"=>date('M', mktime(0, 0, 0, $bln, 10)),
                                    "DATA"=>$this->get_company_tipe($tipe, $opco, $bln, $thn-1)
                                )
                            )
                        );
        return $kembali;
    }

    public function companytipe($tipe, $bln, $thn) {
        /* echo'[
          {"idd":"f","company":"2000","state":"closed"},
          {"idd":"f","company":"3000","state":"closed"}
          ]'; */
        $data = $this->M_RVD->get_company_tipe($tipe, $thn);
        echo "[";
        $count = count($data);
        $i = 1;
        foreach ($data as $k => $v) {
            if ($i == $count) {
                echo '{"idd":"' . $tipe . 'tipe' . $v["VKORG"] . '","company":"<b>' . $v["VKORG"] . '</b>",' . $this->get_company_tipe($tipe, substr($v['VKORG'], 0, 4), $bln, $thn) . '"state":"closed"}';
            } else {
                echo '{"idd":"' . $tipe . 'tipe' . $v["VKORG"] . '","company":"<b>' . $v["VKORG"] . '</b>",' . $this->get_company_tipe($tipe, substr($v['VKORG'], 0, 4), $bln, $thn) . '"state":"closed"},';
            }
            $i++;
        }
        echo"]";
    }

    public function companyprov($prov, $bln, $thn) {
        $data = $this->M_RVD->get_comp_prov($prov);
        //echopre($data);
        echo "[";
        $count = count($data);
        $i = 1;
        foreach ($data as $k => $v) {
            if ($i == $count) {
                echo '{"idd":"prov' . $prov . 'prov' . substr($v["VKORG"], 0, 4) . '","company":"<b>' . $v["VKORG"] . '</b>",' . $this->get_data_company_prov($bln, $thn, $prov, substr($v['VKORG'], 0, 4)) . '"state":"closed"}';
            } else {
                echo '{"idd":"prov' . $prov . 'prov' . substr($v["VKORG"], 0, 4) . '","company":"<b>' . $v["VKORG"] . '</b>",' . $this->get_data_company_prov($bln, $thn, $prov, substr($v['VKORG'], 0, 4)) . '"state":"closed"},';
            }
            $i++;
        }
        echo"]";
    }

    public function provtipe($id, $bln, $thn) {
        $idd = explode('tipe', $id);
        $comp = substr($idd[1], 0, 4);
        $data = $this->M_RVD->get_prov_tipe($idd[0], $comp);
        //echopre($data);
        echo "[";
        $count = count($data);
        $i = 1;
        foreach ($data as $k => $v) {
            if ($i == $count) {
                echo '{"idd":"' . $idd[0] . 'tipe' . $v["VKBUR"] . 'tipe' . $comp . '","company":"<b>' . $v["VKBUR"] . ' - ' . $v["VKBUR_TXT"] . '</b>",' . $this->get_data_tipe_prov($idd[0], $comp, $bln, $v['VKBUR'], $thn) . '"state":"open"}';
            } else {
                echo '{"idd":"' . $idd[0] . 'tipe' . $v["VKBUR"] . 'tipe' . $comp . '","company":"<b>' . $v["VKBUR"] . ' - ' . $v["VKBUR_TXT"] . '</b>",' . $this->get_data_tipe_prov($idd[0], $comp, $bln, $v['VKBUR'], $thn) . '"state":"open"},';
            }
            $i++;
        }
        echo"]";
    }

    public function semen_indonesia($bln, $thn) {
        $data = $this->M_RVD->get_company_all();
        echo "[";
        $count = count($data);
        $u = 1;
        foreach ($data as $d) {
            if ($u == $count) {
                echo '{"idd":"3000__4000__5000__7000pisah' . $d["VKBUR_TXT"] . 'pisah' . $d["VKBUR"] . '","company":" <b>' . $d["VKBUR_TXT"] . '</b>",' . $this->get_data_prov($d["VKORG"], $d["VKBUR_TXT"], $bln, $thn, $d["VKBUR"]) . '"state":"closed"}';
            } else {
                echo '{"idd":"3000__4000__5000__7000pisah' . $d["VKBUR_TXT"] . 'pisah' . $d["VKBUR"] . '","company":" <b>' . $d["VKBUR_TXT"] . '</b>",' . $this->get_data_prov($d["VKORG"], $d["VKBUR_TXT"], $bln, $thn, $d["VKBUR"]) . '"state":"closed"},';
            }
            $u++;
        }
        echo "]";
    }

    public function bbc($prov, $bln, $thn) {
        echo'[{"idd":"bag' . $prov . '","company":"<b>BAG</b>",' . $this->get_bbc($prov, 'ZAK', $bln, $thn) . '"state":"opened"},
			 {"idd":"bulk' . $prov . '","company":"<b>BULK</b>",' . $this->get_bbc($prov, 'Curah', $bln, $thn) . '"state":"opened"},
			 {"idd":"clinker' . $prov . '","company":"<b>CLINKER</b>",' . $this->get_bbc($prov, 'Clinker', $bln, $thn) . '"state":"opened"}]';
    }

    public function get_bbc($id, $tipe, $bln, $thn) {
        $tgl_now = date('Y/m/d');
        $bln_now = date('m');
        $thn_now = date('Y');
        $get_id = explode("pisah", $id);
        $comp = $get_id[0];
        $prov = $get_id[1];
        $no_prov = $get_id[2];
        $tgl_last = date("t", strtotime($thn . '/' . $bln . '/23'));
        $comp = str_replace('__', ',', $comp);
        if ($bln == $bln_now && $thn == $thn_now) {
            $tgl_rel = date('d');
        } else {
            $tgl_rel = $tgl_last;
        }
        $data = $this->M_RVD->bbc($comp, $prov, $tipe, $tgl_now, $tgl_rel, $bln, $thn, $tgl_last);
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
        $data_rkap = $this->M_RVD->get_rkap_bulanan($comp, $no_prov, $tipe, $thn, $bln);
        $rkap_ton = array();
        $rkap_rev = array();
        $u = 1;
        foreach ($data_rkap as $dr) {
            $rkap_ton[$u] = number_format($dr['RKAP_TON'], 0);
            $rkap_rev[$u] = number_format($dr['RKAP_REV'], 0);
            $u++;
        }
        //echopre($data_rkap);
        $data_r = '"VOLUME1":"' . $vol[0] . '","PRICE1":"' . $price[0] . '","TOTALSALES1":"' . $totsales[0] . '","OA1":"' . $oa[0] . '","REVENUE1":"' . $rev[0] . '","RKAP1":"0","RKAPREV1":"0","VOLUME2":"' . $vol[1] . '","PRICE2":"' . $price[1] . '","TOTALSALES2":"' . $totsales[1] . '","OA2":"' . $oa[1] . '","REVENUE2":"' . $rev[1] . '","RKAP2":"' . $rkap_ton[1] . '","RKAPREV2":"' . $rkap_rev[1] . '","VOLUME3":"' . $vol[2] . '","PRICE3":"' . $price[2] . '","TOTALSALES3":"' . $totsales[2] . '","OA3":"' . $oa[2] . '","REVENUE3":"' . $rev[2] . '","RKAP3":"' . $rkap_ton[2] . '","RKAPREV3":"' . $rkap_rev[2] . '",';
        return $data_r;
    }

    public function get_data_prov($comp, $prov, $bln, $thn, $no_prov) {
        $tgl_now = date('Y/m/d');
        $bln_now = date('m');
        $thn_now = date('Y');
        $tgl_last = date("t", strtotime($thn . '/' . $bln . '/23'));
        if ($bln == $bln_now && $thn == $thn_now) {
            $tgl_rel = date('d');
        } else {
            $tgl_rel = $tgl_last;
        }
        $data = $this->M_RVD->data_prov($comp, $prov, $tgl_now, $tgl_rel, $bln, $thn, $tgl_last);
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
        $data_rkap = $this->M_RVD->get_rkap_bulanan_prov($comp, $no_prov, $thn, $bln);
        $rkap_ton = array();
        $rkap_rev = array();
        $u = 1;
        foreach ($data_rkap as $dr) {
            $rkap_ton[$u] = number_format($dr['RKAP_TON'], 0);
            $rkap_rev[$u] = number_format($dr['RKAP_REV'], 0);
            $u++;
        }

        $RKAP_VOLDAY = floatval(str_replace(",", "", $rkap_ton[1]))/date('t');
        $RKAP_REVDAY = floatval(str_replace(",", "", $rkap_rev[1]))/date('t');
        $varianVolumeto_day =abs(floatval(str_replace(",", "", $RKAP_VOLDAY))-floatval(str_replace(",", "", $vol[0])))  ;
        $varianVolumeto_day = number_format($varianVolumeto_day,0);
        $varianVolumemonth_to_day = abs(floatval(str_replace(",", "", $rkap_ton[1]))-floatval(str_replace(",", "", $vol[1])));
        $varianVolumemonth_to_day = number_format($varianVolumemonth_to_day,0);
        $varianVolumeyear_to_day = abs(floatval(str_replace(",", "", $rkap_ton[2]))-floatval(str_replace(",", "", $vol[2])));
        $varianVolumeyear_to_day = number_format($varianVolumeyear_to_day,0);
        
        $varianRevenueto_day =abs(floatval(str_replace(",", "", $RKAP_REVDAY))-floatval(str_replace(",", "", $rev[0])));
        $varianRevenueto_day = number_format($varianRevenueto_day,0);
        $varianRevenuemonth_to_day = abs(floatval(str_replace(",", "", $rkap_rev[1]))-floatval(str_replace(",", "", $rev[1])));
        $varianRevenuemonth_to_day = number_format($varianRevenuemonth_to_day,0);
        $varianRevenueyear_to_day = abs(floatval(str_replace(",", "", $rkap_rev[2]))-floatval(str_replace(",", "", $rev[2])));
        $varianRevenueyear_to_day = number_format($varianRevenueyear_to_day,0);

        $persenVolume_to_day = (str_replace(",", "", $RKAP_VOLDAY)==0?0:(str_replace(",", "", $vol[0])/str_replace(",", "", $RKAP_VOLDAY))*100);
        $persenRevenue_to_day = (str_replace(",", "", $RKAP_REVDAY)==0?0:(str_replace(",", "", $rev[0])/str_replace(",", "", $RKAP_REVDAY))*100);
        $persenVolumemonth_to_day = (str_replace(",", "", $rkap_ton[1])==0?0:(str_replace(",", "", $vol[1])/str_replace(",", "", $rkap_ton[1]))*100);
        $persenRevenuemonth_to_day = (str_replace(",", "", $rkap_rev[1])==0?0:(str_replace(",", "", $rev[1])/str_replace(",", "", $rkap_rev[1]))*100);
        $persenVolumeyear_to_day = (str_replace(",", "", $rkap_ton[2])==0?0:(str_replace(",", "", $vol[2])/str_replace(",", "", $rkap_ton[2]))*100);
        $persenRevenueyear_to_day = (str_replace(",", "", $rkap_rev[2])==0?0:(str_replace(",", "", $rev[2])/str_replace(",", "", $rkap_rev[2]))*100);
        $data_r[] = array("to_day"=>array("DATAVOLUME"=>array(
            array("VOLUME"=>$vol[0],"TARGETVOLUME"=>$RKAP_VOLDAY,"VARIANVOLUME"=>$varianVolumeto_day,"PERSENVOLUME"=>$persenVolume_to_day)
            ),
            "DATAREVENUE"=>array(
            array("PRICE"=>$this->convertmoneytomio($price[0]),"TOTALSALES"=>$this->convertmoneytomio($totsales[0]),"OA"=>$this->convertmoneytomio($oa[0]),"REVENUE"=>$this->convertmoneytomio($rev[0]),"TARGETREVENUE"=>$RKAP_REVDAY,"VARIANREVENUE"=>$this->convertmoneytomio($varianRevenueto_day),"PERSENREVENUE"=>$persenRevenue_to_day)
            )
          )
        );

        $data_r[] = array("month_to_day"=>array("DATAVOLUME"=>
            array("VOLUME"=>$vol[1],"TARGETVOLUME"=>$rkap_ton[1],"VARIANVOLUME"=>$varianVolumemonth_to_day,"PERSENVOLUME"=>$persenVolumemonth_to_day)
            ,
            "DATAREVENUE"=>array("PRICE"=>$this->convertmoneytomio($price[1]),"TOTALSALES"=>$this->convertmoneytomio($totsales[1]),"OA"=>$this->convertmoneytomio($oa[1]),"REVENUE"=>$this->convertmoneytomio($rev[1]),"TARGETREVENUE"=>$this->convertmoneytomio($rkap_rev[1]),"VARIANREVENUE"=>$this->convertmoneytomio($varianRevenuemonth_to_day),"PERSENREVENUE"=>$persenRevenuemonth_to_day)
            ));

        $data_r[] = array("year_to_day"=>
                            array("DATAVOLUME"=>array("VOLUME"=>$vol[2],"TARGETVOLUME"=>$rkap_ton[2],"VARIANVOLUME"=>$varianVolumemonth_to_day,"PERSENVOLUME"=>$persenVolumeyear_to_day
                                                     ),
                                 "DATAREVENUE"=>array("PRICE"=>$this->convertmoneytomio($price[2]),"TOTALSALES"=>$this->convertmoneytomio($totsales[2]),"OA"=>$this->convertmoneytomio($oa[2]),"REVENUE"=>$this->convertmoneytomio($rev[2]),"TARGETREVENUE"=>$this->convertmoneytomio($rkap_rev[2]),"VARIANREVENUE"=>$this->convertmoneytomio($varianRevenuemonth_to_day),"PERSENREVENUE"=>$persenRevenueyear_to_day
                                                    )
                                 )
                        );
        
        // $data_r = '"VOLUME1":"' . $vol[0] . '","PRICE1":"' . $price[0] . '","TOTALSALES1":"' . $totsales[0] . '","OA1":"' . $oa[0] . '","REVENUE1":"' . $rev[0] . '","RKAP1":"0","RKAPREV1":"0","VOLUME2":"' . $vol[1] . '","PRICE2":"' . $price[1] . '","TOTALSALES2":"' . $totsales[1] . '","OA2":"' . $oa[1] . '","REVENUE2":"' . $rev[1] . '","RKAP2":"' . $rkap_ton[1] . '","RKAPREV2":"' . $rkap_rev[1] . '","VOLUME3":"' . $vol[2] . '","PRICE3":"' . $price[2] . '","TOTALSALES3":"' . $totsales[2] . '","OA3":"' . $oa[2] . '","REVENUE3":"' . $rev[2] . '","RKAP3":"' . $rkap_ton[2] . '","RKAPREV3":"' . $rkap_rev[2] . '",';
        return $data_r;
    }

    public function get_data_company($comp, $bln, $thn) {
        $tgl_now = date('Y/m/d');
        $bln_now = date('m');
        $thn_now = date('Y');
        $tgl_last = date("t", strtotime($thn . '/' . $bln . '/23'));
        if ($bln == $bln_now && $thn == $thn_now) {
            $tgl_rel = date('d');
        } else {
            $tgl_rel = $tgl_last;
        }
        $data = $this->M_RVD->get_data_comp($comp, $tgl_now, $tgl_rel, $bln, $thn, $tgl_last);
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
        if ($comp!="6000")
        {
            
            $data_rkap = $this->M_RVD->get_rkap_bulanan_company($comp, $thn, $bln);
            $rkap_ton = array();
            $rkap_rev = array();
            $u = 1;
            foreach ($data_rkap as $dr) {
                $rkap_ton[$u] = number_format($dr['RKAP_TON'], 0);
                $u++;
            }

        }else{
            $tgl_last_tlcc = date("t");
            $data_rkap = $this->M_RVD->rkap_volume_thanglong($comp, $thn, $bln,$tgl_last_tlcc);
            $rkap_ton = array();
            $rkap_rev = array();
            $u = 1;
            foreach ($data_rkap as $dr) {
                $rkap_ton[$u] = number_format($dr['RKAP_TON'], 0);
                $u++;
            }

            $data_rkap = $this->M_RVD->get_rkap_bulanan_company($comp, $thn, $bln);
            $rkap_rev = array();
            $u = 1;
            foreach ($data_rkap as $dr) {
                $rkap_rev[$u] = number_format($dr['RKAP_REV'], 0);
                $u++;
            }
        }
        
        $tgl = date('d');
        $data_rkap_h = $this->M_RVD->get_rkap_harian_comp($comp, $thn, $bln, $tgl);
        $rkap_vol = array();
        $rkap_reve = array();
        $o = 0;
        // print_r($data_rkap_h);
        // exit;
        foreach ($data_rkap_h as $drr) {
            $rkap_vol[$o] = number_format($drr['RKAP_VOL'], 0);
            $rkap_reve[$o] = number_format($drr['RKAP_REV'], 0);
            $o++;
        }

        if ($comp=="6000")
        {
            $rkap_vol[0] = $rkap_ton[1];
        }
        //24-11-2017
        // $RKAP_VOLDAY = floatval(str_replace(",", "", $rkap_ton[1]))/date('t');
        // $varianVolumeto_day =abs(floatval(str_replace(",", "", $RKAP_VOLDAY))-floatval(str_replace(",", "", $vol[0])))  ;
        // $RKAP_REVDAY = floatval(str_replace(",", "", $rkap_rev[1]))/date('t');
        
        $RKAP_REVDAY = $rkap_reve[0];
        $varianVolumeto_day =abs(floatval(str_replace(",", "", $rkap_vol[0]))-floatval(str_replace(",", "", $vol[0])))  ;
        $varianVolumeto_day = number_format($varianVolumeto_day,0);
        $varianVolumemonth_to_day = abs(floatval(str_replace(",", "", $rkap_ton[1]))-floatval(str_replace(",", "", $vol[1])));
        $varianVolumemonth_to_day = number_format($varianVolumemonth_to_day,0);
        $varianVolumeyear_to_day = abs(floatval(str_replace(",", "", $rkap_ton[2]))-floatval(str_replace(",", "", $vol[2])));
        $varianVolumeyear_to_day = number_format($varianVolumeyear_to_day,0);
        
        $varianRevenueto_day =abs(floatval(str_replace(",", "", $RKAP_REVDAY))-floatval(str_replace(",", "", $rev[0])));
        $varianRevenueto_day = number_format($varianRevenueto_day,0);
        $varianRevenuemonth_to_day = abs(floatval(str_replace(",", "", $rkap_rev[1]))-floatval(str_replace(",", "", $rev[1])));
        $varianRevenuemonth_to_day = number_format($varianRevenuemonth_to_day,0);
        $varianRevenueyear_to_day = abs(floatval(str_replace(",", "", $rkap_rev[2]))-floatval(str_replace(",", "", $rev[2])));
        $varianRevenueyear_to_day = number_format($varianRevenueyear_to_day,0);
        
        //24-11-2017
        // $persenVolume_to_day = (str_replace(",", "", $RKAP_VOLDAY)==0?0:(str_replace(",", "", $vol[0])/str_replace(",", "", $RKAP_VOLDAY))*100);
        
        $persenVolume_to_day = (str_replace(",", "", $rkap_vol[0])==0?0:(str_replace(",", "", $vol[0])/str_replace(",", "", $rkap_vol[0]))*100);
        $persenRevenue_to_day = (str_replace(",", "", $RKAP_REVDAY)==0?0:(str_replace(",", "", $rev[0])/str_replace(",", "", $RKAP_REVDAY))*100);
        $persenVolumemonth_to_day = (str_replace(",", "", $rkap_ton[1])==0?0:(str_replace(",", "", $vol[1])/str_replace(",", "", $rkap_ton[1]))*100);
        $persenRevenuemonth_to_day = (str_replace(",", "", $rkap_rev[1])==0?0:(str_replace(",", "", $rev[1])/str_replace(",", "", $rkap_rev[1]))*100);
        $persenVolumeyear_to_day = (str_replace(",", "", $rkap_ton[2])==0?0:(str_replace(",", "", $vol[2])/str_replace(",", "", $rkap_ton[2]))*100);
        $persenRevenueyear_to_day = (str_replace(",", "", $rkap_rev[2])==0?0:(str_replace(",", "", $rev[2])/str_replace(",", "", $rkap_rev[2]))*100);
        
        //24-11-2017
        // $data_r[] = array("to_day"=>array(
        //                                     "DATAVOLUME"=>array(
        //                                                         array("VOLUME"=>$vol[0],"TARGETVOLUME"=>$RKAP_VOLDAY,"VARIANVOLUME"=>$varianVolumeto_day,"PERSENVOLUME"=>$persenVolume_to_day)
        //                                                         ),
        //                                     "DATAREVENUE"=>array(
        //                                                         array("PRICE"=>$this->convertmoneytomio($price[0]),"TOTALSALES"=>$this->convertmoneytomio($totsales[0]),"OA"=>$this->convertmoneytomio($oa[0]),
        //                                                             "REVENUE"=>$this->convertmoneytomio($rev[0]),"TARGETREVENUE"=>$this->convertmoneytomio($RKAP_REVDAY),"VARIANREVENUE"=>$this->convertmoneytomio($varianRevenueto_day),
        //                                                                 "PERSENREVENUE"=>$persenRevenue_to_day
        //                                                                         )
        //                                                         )
        //                                     )
        // );
        $data_r[] = array("to_day"=>array(
                                            "DATAVOLUME"=>array(
                                                                array("VOLUME"=>$vol[0],"TARGETVOLUME"=>$rkap_vol[0],"VARIANVOLUME"=>$varianVolumeto_day,"PERSENVOLUME"=>$persenVolume_to_day)
                                                                ),
                                            "DATAREVENUE"=>array(
                                                                array("PRICE"=>$this->convertmoneytomio($price[0]),"TOTALSALES"=>$this->convertmoneytomio($totsales[0]),"OA"=>$this->convertmoneytomio($oa[0]),
                                                                    "REVENUE"=>$this->convertmoneytomio($rev[0]),"TARGETREVENUE"=>$this->convertmoneytomio($RKAP_REVDAY),"VARIANREVENUE"=>$this->convertmoneytomio($varianRevenueto_day),
                                                                        "PERSENREVENUE"=>$persenRevenue_to_day
                                                                                )
                                                                )
                                            )
        );

        $data_r[] = array("month_to_day"=>array("DATAVOLUME"=>
            array("VOLUME"=>$vol[1],"TARGETVOLUME"=>$rkap_ton[1],"VARIANVOLUME"=>$varianVolumemonth_to_day,"PERSENVOLUME"=>$persenVolumemonth_to_day)
            ,
            "DATAREVENUE"=>array("PRICE"=>$this->convertmoneytomio($price[1]),"TOTALSALES"=>$this->convertmoneytomio($totsales[1]),"OA"=>$this->convertmoneytomio($oa[1]),"REVENUE"=>$this->convertmoneytomio($rev[1]),"TARGETREVENUE"=>$this->convertmoneytomio($rkap_rev[1]),"VARIANREVENUE"=>$this->convertmoneytomio($varianRevenuemonth_to_day),"PERSENREVENUE"=>$persenRevenuemonth_to_day)
            ));

        $data_r[] = array("year_to_day"=>
                            array("DATAVOLUME"=>array("VOLUME"=>$vol[2],"TARGETVOLUME"=>$rkap_ton[2],"VARIANVOLUME"=>$varianVolumemonth_to_day,"PERSENVOLUME"=>$persenVolumeyear_to_day
                                                     ),
                                 "DATAREVENUE"=>array("PRICE"=>$this->convertmoneytomio($price[2]),"TOTALSALES"=>$this->convertmoneytomio($totsales[2]),"OA"=>$this->convertmoneytomio($oa[2]),"REVENUE"=>$this->convertmoneytomio($rev[2]),"TARGETREVENUE"=>$this->convertmoneytomio($rkap_rev[2]),"VARIANREVENUE"=>$this->convertmoneytomio($varianRevenuemonth_to_day),"PERSENREVENUE"=>$persenRevenueyear_to_day
                                                    )
                                 )
                        );

        // $data_r = '"VOLUME1":"' . $vol[0] . '","PRICE1":"' . $price[0] . '","TOTALSALES1":"' . $totsales[0] . '","OA1":"' . $oa[0] . '","REVENUE1":"' . $rev[0] . '","RKAP1":"' . $rkap_vol[0] . '","RKAPREV1":"' . $rkap_reve[0] . '","VOLUME2":"' . $vol[1] . '","PRICE2":"' . $price[1] . '","TOTALSALES2":"' . $totsales[1] . '","OA2":"' . $oa[1] . '","REVENUE2":"' . $rev[1] . '","RKAP2":"' . $rkap_ton[1] . '","RKAPREV2":"' . $rkap_rev[1] . '","VOLUME3":"' . $vol[2] . '","PRICE3":"' . $price[2] . '","TOTALSALES3":"' . $totsales[2] . '","OA3":"' . $oa[2] . '","REVENUE3":"' . $rev[2] . '","RKAP3":"' . $rkap_ton[2] . '","RKAPREV3":"' . $rkap_rev[2] . '",';
        return $data_r;
    }

    public function get_bbc_total($bln, $thn, $tipe) {
        $tgl_now = date('Y/m/d');
        $bln_now = date('m');
        $thn_now = date('Y');
        $tgl_last = date("t", strtotime($thn . '/' . $bln . '/23'));
        if ($bln == $bln_now && $thn == $thn_now) {
            $tgl_rel = date('d');
        } else {
            $tgl_rel = $tgl_last;
        }
        $data = $this->M_RVD->get_data_bbc_total($tgl_now, $tgl_rel, $bln, $thn, $tgl_last, $tipe);
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
        $data_rkap = $this->M_RVD->get_rkap_bulanan_bbc($tipe, $thn, $bln);
        $rkap_ton = array();
        $rkap_rev = array();
        $u = 1;
        foreach ($data_rkap as $dr) {
            $rkap_ton[$u] = number_format($dr['RKAP_TON'], 0);
            $rkap_rev[$u] = number_format($dr['RKAP_REV'], 0);
            $u++;
        }

        $RKAP_VOLDAY = floatval(str_replace(",", "", $rkap_ton[1]))/date('t');
        $RKAP_REVDAY = floatval(str_replace(",", "", $rkap_rev[1]))/date('t');
        $varianVolumeto_day =abs(floatval(str_replace(",", "", $RKAP_VOLDAY))-floatval(str_replace(",", "", $vol[0])));
        $varianVolumeto_day = number_format($varianVolumeto_day,0);
        $varianVolumemonth_to_day = abs(floatval(str_replace(",", "", $rkap_ton[1]))-floatval(str_replace(",", "", $vol[1])));
        $varianVolumemonth_to_day = number_format($varianVolumemonth_to_day,0);
        $varianVolumeyear_to_day = abs(floatval(str_replace(",", "", $rkap_ton[2]))-floatval(str_replace(",", "", $vol[2])));
        $varianVolumeyear_to_day = number_format($varianVolumeyear_to_day,0);

        $varianRevenueto_day =abs(floatval(str_replace(",", "", $RKAP_REVDAY))-floatval(str_replace(",", "", $rev[0])));
        $varianRevenueto_day = number_format($varianRevenueto_day,0);
        $varianRevenuemonth_to_day = abs(floatval(str_replace(",", "", $rkap_rev[1]))-floatval(str_replace(",", "", $rev[1])));
        $varianRevenuemonth_to_day = number_format($varianRevenuemonth_to_day,0);
        $varianRevenueyear_to_day = abs(floatval(str_replace(",", "", $rkap_rev[2]))-floatval(str_replace(",", "", $rev[2])));
        $varianRevenueyear_to_day = number_format($varianRevenueyear_to_day,0);
        $RKAP_VOLDAY = number_format($RKAP_VOLDAY,0);
        $RKAP_REVDAY = number_format($RKAP_REVDAY,0);
        $data_r[] = array("to_day"=>array("DATAVOLUME"=>array(
            array("VOLUME"=>$vol[0],"TARGETVOLUME"=>$RKAP_VOLDAY,"VARIANVOLUME"=>$varianVolumeto_day)
            ),
            "DATAREVENUE"=>array(
            array("PRICE"=>$this->convertmoneytomio($price[0]),"TOTALSALES"=>$this->convertmoneytomio($totsales[0]),"OA"=>$this->convertmoneytomio($oa[0]),"REVENUE"=>$this->convertmoneytomio($rev[0]),"TARGETREVENUE"=>$RKAP_REVDAY,"VARIANREVENUE"=>$this->convertmoneytomio($varianRevenueto_day))
            )
          )
        );
        $data_r[] = array("month_to_day"=>array("DATAVOLUME"=>
            array("VOLUME"=>$vol[1],"TARGETVOLUME"=>$rkap_ton[1],"VARIANVOLUME"=>$varianVolumemonth_to_day)
            ,
            "DATAREVENUE"=>array("PRICE"=>$this->convertmoneytomio($price[1]),"TOTALSALES"=>$this->convertmoneytomio($totsales[1]),"OA"=>$this->convertmoneytomio($oa[1]),"REVENUE"=>$this->convertmoneytomio($rev[1]),"TARGETREVENUE"=>$this->convertmoneytomio($rkap_rev[1]),"VARIANREVENUE"=>$this->convertmoneytomio($varianRevenuemonth_to_day))
            ));

        $data_r[] = array("year_to_day"=>
                            array("DATAVOLUME"=>array("VOLUME"=>$vol[2],"TARGETVOLUME"=>$rkap_ton[2],"VARIANVOLUME"=>$varianVolumemonth_to_day
                                                     ),
                                 "DATAREVENUE"=>array("PRICE"=>$this->convertmoneytomio($price[2]),"TOTALSALES"=>$this->convertmoneytomio($totsales[2]),"OA"=>$this->convertmoneytomio($oa[2]),"REVENUE"=>$this->convertmoneytomio($rev[2]),"TARGETREVENUE"=>$this->convertmoneytomio($rkap_rev[2]),"VARIANREVENUE"=>$this->convertmoneytomio($varianRevenuemonth_to_day)
                                                    )
                                 )
                        );

        // $data_r = '"VOLUME1":"' . $vol[0] . '","PRICE1":"' . $price[0] . '","TOTALSALES1":"' . $totsales[0] . '","OA1":"' . $oa[0] . '","REVENUE1":"' . $rev[0] . '","RKAP1":"0","RKAPREV1":"0","VOLUME2":"' . $vol[1] . '","PRICE2":"' . $price[1] . '","TOTALSALES2":"' . $totsales[1] . '","OA2":"' . $oa[1] . '","REVENUE2":"' . $rev[1] . '","RKAP2":"' . $rkap_ton[1] . '","RKAPREV2":"' . $rkap_rev[1] . '","VOLUME3":"' . $vol[2] . '","PRICE3":"' . $price[2] . '","TOTALSALES3":"' . $totsales[2] . '","OA3":"' . $oa[2] . '","REVENUE3":"' . $rev[2] . '","RKAP3":"' . $rkap_ton[2] . '","RKAPREV3":"' . $rkap_rev[2] . '",';
        return $data_r;
    }

    public function total($bln, $thn) {
        $tgl_now = date('Y/m/d');
        $bln_now = date('m');
        $thn_now = date('Y');
        $tgl_last = date("t", strtotime($thn . '/' . $bln . '/23'));
        //echo $tgl_last;exit;
        if ($bln == $bln_now && $thn == $thn_now) {
            $tgl_rel = date('d');
        } else {
            $tgl_rel = $tgl_last;
        }
        $data = $this->M_RVD->total($tgl_now, $tgl_rel, $bln, $thn, $tgl_last);
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
        $data_rkap = $this->M_RVD->get_rkap_bulanan_total($thn, $bln);
        $rkap_ton = array();
        $rkap_rev = array();
        $u = 1;
        foreach ($data_rkap as $dr) {
            $rkap_ton[$u] = number_format($dr['RKAP_TON'], 0);
            $rkap_rev[$u] = number_format($dr['RKAP_REV'], 0);
            $u++;
        }
        $tgl = date('d'); 
        $data_rkap_h = $this->M_RVD->get_rkap_harian_total($thn, $bln, $tgl);
        $rkap_vol = array();
        $rkap_reve = array();
        $o = 0;
        foreach ($data_rkap_h as $drr) {
            $rkap_vol[$o] = number_format($drr['RKAP_VOL'], 0);
            $rkap_reve[$o] = number_format($drr['RKAP_REV'], 0);
            $o++;
        }

        $varianVolumeto_day =abs(floatval(str_replace(",", "", $rkap_vol[0]))-floatval(str_replace(",", "", $vol[0])))  ;
        $varianVolumeto_day = number_format($varianVolumeto_day,0);
        $varianVolumemonth_to_day = abs(floatval(str_replace(",", "", $rkap_ton[1]))-floatval(str_replace(",", "", $vol[1])));
        $varianVolumemonth_to_day = number_format($varianVolumemonth_to_day,0);
        $varianVolumeyear_to_day = abs(floatval(str_replace(",", "", $rkap_ton[2]))-floatval(str_replace(",", "", $vol[2])));
        $varianVolumeyear_to_day = number_format($varianVolumeyear_to_day,0);

        $varianRevenueto_day =abs(floatval(str_replace(",", "", $rkap_reve[0]))-floatval(str_replace(",", "", $rev[0])));
        $varianRevenueto_day = number_format($varianRevenueto_day,0);
        $varianRevenuemonth_to_day = abs(floatval(str_replace(",", "", $rkap_rev[1]))-floatval(str_replace(",", "", $rev[1])));
        $varianRevenuemonth_to_day = number_format($varianRevenuemonth_to_day,0);
        $varianRevenueyear_to_day = abs(floatval(str_replace(",", "", $rkap_rev[2]))-floatval(str_replace(",", "", $rev[2])));
        $varianRevenueyear_to_day = number_format($varianRevenueyear_to_day,0);

        $data_r[] = array("to_day"=>array("DATAVOLUME"=>array(
            array("VOLUME"=>$vol[0],"TARGETVOLUME"=>$rkap_vol[0],"VARIANVOLUME"=>$varianVolumeto_day)
            ),
            "DATAREVENUE"=>array(
            array("PRICE"=>$this->convertmoneytomio($price[0]),"TOTALSALES"=>$this->convertmoneytomio($totsales[0]),"OA"=>$this->convertmoneytomio($oa[0]),"REVENUE"=>$this->convertmoneytomio($rev[0]),"TARGETREVENUE"=>$this->convertmoneytomio($rkap_reve[0]),"VARIANREVENUE"=>$this->convertmoneytomio($varianRevenueto_day))
            )
          )
        );
        $data_r[] = array("month_to_day"=>array("DATAVOLUME"=>
            array("VOLUME"=>$vol[1],"TARGETVOLUME"=>$rkap_ton[1],"VARIANVOLUME"=>$varianVolumemonth_to_day)
            ,
            "DATAREVENUE"=>array("PRICE"=>$this->convertmoneytomio($price[1]),"TOTALSALES"=>$this->convertmoneytomio($totsales[1]),"OA"=>$this->convertmoneytomio($oa[1]),"REVENUE"=>$this->convertmoneytomio($rev[1]),"TARGETREVENUE"=>$this->convertmoneytomio($rkap_rev[1]),"VARIANREVENUE"=>$this->convertmoneytomio($varianRevenuemonth_to_day))
            ));

        $data_r[] = array("year_to_day"=>
                            array("DATAVOLUME"=>array("VOLUME"=>$vol[2],"TARGETVOLUME"=>$rkap_ton[2],"VARIANVOLUME"=>$varianVolumemonth_to_day
                                                     ),
                                 "DATAREVENUE"=>array("PRICE"=>$this->convertmoneytomio($price[2]),"TOTALSALES"=>$this->convertmoneytomio($totsales[2]),"OA"=>$this->convertmoneytomio($oa[2]),"REVENUE"=>$this->convertmoneytomio($rev[2]),"TARGETREVENUE"=>$this->convertmoneytomio($rkap_rev[2]),"VARIANREVENUE"=>$this->convertmoneytomio($varianRevenuemonth_to_day)
                                                    )
                                 )
                        );
        // $data_r = '{to_day:{"VOLUME1":"' . $vol[0] . '","PRICE1":"' . $price[0] . '","TOTALSALES1":"' . $totsales[0] . '","OA1":"' . $oa[0] . '","REVENUE1":"' . $rev[0] . '","RKAP1":"' . $rkap_vol[0] . '","RKAPREV1":"' . $rkap_reve[0] . '"}';
        // $data_r .= "},";
        // $data_r .= '{month_to_day:{"VOLUME2":"' . $vol[1] . '","PRICE2":"' . $price[1] . '","TOTALSALES2":"' . $totsales[1] . '","OA2":"' . $oa[1] . '","REVENUE2":"' . $rev[1] . '","RKAP2":"' . $rkap_ton[1] . '","RKAPREV2":"' . $rkap_rev[1] . '"}';
        // $data_r .= "},";
        // $data_r .= '{year_to_day:{"VOLUME3":"' . $vol[2] . '","PRICE3":"' . $price[2] . '","TOTALSALES3":"' . $totsales[2] . '","OA3":"' . $oa[2] . '","REVENUE3":"' . $rev[2] . '","RKAP3":"' . $rkap_ton[2] . '","RKAPREV3":"' . $rkap_rev[2] . '"}';
        // $data_r .= '}';
        // $data_r = '{"VOLUME1":"' . $vol[0] . '","PRICE1":"' . $price[0] . '","TOTALSALES1":"' . $totsales[0] . '","OA1":"' . $oa[0] . '","REVENUE1":"' . $rev[0] . '","RKAP1":"' . $rkap_vol[0] . '","RKAPREV1":"' . $rkap_reve[0] . '","VOLUME2":"' . $vol[1] . '","PRICE2":"' . $price[1] . '","TOTALSALES2":"' . $totsales[1] . '","OA2":"' . $oa[1] . '","REVENUE2":"' . $rev[1] . '","RKAP2":"' . $rkap_ton[1] . '","RKAPREV2":"' . $rkap_rev[1] . '","VOLUME3":"' . $vol[2] . '","PRICE3":"' . $price[2] . '","TOTALSALES3":"' . $totsales[2] . '","OA3":"' . $oa[2] . '","REVENUE3":"' . $rev[2] . '","RKAP3":"' . $rkap_ton[2] . '","RKAPREV3":"' . $rkap_rev[2] . '"}';
        return $data_r;
    }

    function convertmoneytomio($input)
    {
        $data = str_replace(",", "", $input);
        $kembali = $data/1000000000;
        return $kembali;
    }

    public function get_bbc_prov($id, $bln, $thn, $tipe) {
        $idd = explode('prov', $id);
        $prov = $idd[1];
        $comp = $idd[2];
        $tgl_now = date('Y/m/d');
        $bln_now = date('m');
        $thn_now = date('Y');
        $tgl_last = date("t", strtotime($thn . '/' . $bln . '/23'));
        if ($bln == $bln_now && $thn == $thn_now) {
            $tgl_rel = date('d');
        } else {
            $tgl_rel = $tgl_last;
        }
        //echo 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkks'.$tgl_now. $tgl_rel. $bln. $thn. $tgl_last. $comp. $prov. $tipe;
        $data = $this->M_RVD->get_data_prov_bbc($tgl_now, $tgl_rel, $bln, $thn, $tgl_last, $comp, $prov, $tipe);
        //$data_r = '"VOLUME1":"1", "PRICE1":"1", "TOTALSALES1":"1", "OA1":"1", "REVENUE1":"1", "RKAP1":"1", "RKAPREV1":"1", "VOLUME2":"2", "PRICE2":"2", "TOTALSALES2":"2", "OA2":"2", "REVENUE2":"2", "RKAP2":"2", "RKAPREV2":"2", "VOLUME3":"2", "PRICE3":"2", "TOTALSALES3":"2", "OA3":"3", "REVENUE3":"3", "RKAP3":"3", "RKAPREV3":"3",';
        $vol = array();
        $price = array();
        $totsales = array();
        $oa = array();
        $rev = array();
        $r = 0;
        foreach ($data as $k => $v) {
            $vol[$r] = number_format($v['VOL'], 0);
            $price[$r] = number_format($v['PRICE'], 0);
            $totsales[$r] = number_format($v['TOTALSALES'], 0);
            $oa[$r] = number_format($v['OA'], 0);
            $rev[$r] = number_format($v['REV'], 0);
            $r++;
        }
        $data_rkap = $this->M_RVD->get_data_prov_rkap_bln_bbc($comp, $prov, $tipe, $thn, $bln);
        $rkap_ton = array();
        $rkap_rev = array();
        $u = 1;
        foreach ($data_rkap as $k => $v) {
            $rkap_ton[$u] = number_format($v['RKAP_TON'], 0);
            $rkap_rev[$u] = number_format($v['RKAP_REV'], 0);
            $u++;
        }
        $data_r = '"VOLUME1":"' . $vol[0] . '", "PRICE1":"' . $price[0] . '", "TOTALSALES1":"' . $totsales[0] . '", "OA1":"' . $oa[0] . '", "REVENUE1":"' . $rev[0] . '", "RKAP1":"0", "RKAPREV1":"0", "VOLUME2":"' . $vol[1] . '", "PRICE2":"' . $price[1] . '", "TOTALSALES2":"' . $totsales[1] . '", "OA2":"' . $oa[1] . '", "REVENUE2":"' . $rev[1] . '", "RKAP2":"' . $rkap_ton[1] . '", "RKAPREV2":"' . $rkap_rev[1] . '", "VOLUME3":"' . $vol[2] . '", "PRICE3":"' . $price[2] . '", "TOTALSALES3":"' . $totsales[2] . '", "OA3":"' . $oa[2] . '", "REVENUE3":"' . $rev[2] . '", "RKAP3":"' . $rkap_ton[2] . '", "RKAPREV3":"' . $rkap_rev[2] . '",';
        return $data_r;
    }

    //////--------------------get_data_tipe---------------------//////
    public function get_data_tipe_prov($tipe, $comp, $bln, $prov, $thn) {
        $tgl_now = date('Y/m/d');
        $bln_now = date('m');
        $thn_now = date('Y');
        $tgl_last = date("t", strtotime($thn . '/' . $bln . '/23'));
        if ($bln == $bln_now && $thn == $thn_now) {
            $tgl_rel = date('d');
        } else {
            $tgl_rel = $tgl_last;
        }
        //echo 'tgl_now = '.$tgl_now.' tgl_rel = '.$tgl_rel.' bln = '.$bln.' thn = '.$thn.' tgl_last = '.$tgl_last.' comp = '.$comp.' prov = '.$prov.' tipe = '. $tipe;exit;
        $data = $this->M_RVD->get_data_type_prov($tgl_now, $tgl_rel, $bln, $thn, $tgl_last, $comp, $prov, $tipe);
        //$data_r = '"VOLUME1":"1", "PRICE1":"1", "TOTALSALES1":"1", "OA1":"1", "REVENUE1":"1", "RKAP1":"1", "RKAPREV1":"1", "VOLUME2":"2", "PRICE2":"2", "TOTALSALES2":"2", "OA2":"2", "REVENUE2":"2", "RKAP2":"2", "RKAPREV2":"2", "VOLUME3":"2", "PRICE3":"2", "TOTALSALES3":"2", "OA3":"3", "REVENUE3":"3", "RKAP3":"3", "RKAPREV3":"3",';
        $vol = array();
        $price = array();
        $totsales = array();
        $oa = array();
        $rev = array();
        $r = 0;
        foreach ($data as $k => $v) {
            $vol[$r] = number_format($v['VOL'], 0);
            $price[$r] = number_format($v['PRICE'], 0);
            $totsales[$r] = number_format($v['TOTALSALES'], 0);
            $oa[$r] = number_format($v['OA'], 0);
            $rev[$r] = number_format($v['REV'], 0);
            $r++;
        }
        $data_rkap = $this->M_RVD->get_data_type_rkap_bln_prov($comp, $prov, $tipe, $thn, $bln);
        $rkap_ton = array();
        $rkap_rev = array();
        $u = 1;
        foreach ($data_rkap as $k => $v) {
            $rkap_ton[$u] = number_format($v['RKAP_TON'], 0);
            $rkap_rev[$u] = number_format($v['RKAP_REV'], 0);
            $u++;
        }
        $data_r = '"VOLUME1":"' . $vol[0] . '", "PRICE1":"' . $price[0] . '", "TOTALSALES1":"' . $totsales[0] . '", "OA1":"' . $oa[0] . '", "REVENUE1":"' . $rev[0] . '", "RKAP1":"0", "RKAPREV1":"0", "VOLUME2":"' . $vol[1] . '", "PRICE2":"' . $price[1] . '", "TOTALSALES2":"' . $totsales[1] . '", "OA2":"' . $oa[1] . '", "REVENUE2":"' . $rev[1] . '", "RKAP2":"' . $rkap_ton[1] . '", "RKAPREV2":"' . $rkap_rev[1] . '", "VOLUME3":"' . $vol[2] . '", "PRICE3":"' . $price[2] . '", "TOTALSALES3":"' . $totsales[2] . '", "OA3":"' . $oa[2] . '", "REVENUE3":"' . $rev[2] . '", "RKAP3":"' . $rkap_ton[2] . '", "RKAPREV3":"' . $rkap_rev[2] . '",';
        return $data_r;
    }

    public function get_company_tipe($tipe, $comp, $bln, $thn) {
        $tgl_now = date('Y/m/d');
        $bln_now = date('m');
        $thn_now = date('Y');
        $tgl_last = date("t", strtotime($thn . '/' . $bln . '/23'));
        if ($bln == $bln_now && $thn == $thn_now) {
            $tgl_rel = date('d');
        } else {
            $tgl_rel = $tgl_last;
        }
        $data = $this->M_RVD->get_data_type_comp($tgl_now, $tgl_rel, $bln, $thn, $tgl_last, $comp, $tipe);
        $vol = array();
        $price = array();
        $totsales = array();
        $oa = array();
        $rev = array();
        $r = 0;
        foreach ($data as $k => $v) {
            $vol[$r] = number_format($v['VOL'], 0);
            $price[$r] = number_format($v['PRICE'], 0);
            $totsales[$r] = number_format($v['TOTALSALES'], 0);
            $oa[$r] = number_format($v['OA'], 0);
            $rev[$r] = number_format($v['REV'], 0);
            $r++;
        }
        $data_rkap = $this->M_RVD->get_data_type_rkap_bln_comp($comp, $tipe, $thn, $bln);
        $rkap_ton = array();
        $rkap_rev = array();
        $u = 1;
        foreach ($data_rkap as $k => $v) {
            $rkap_ton[$u] = number_format($v['RKAP_TON'], 0);
            $rkap_rev[$u] = number_format($v['RKAP_REV'], 0);
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

        $persenVolume_to_day = 0*100;
        $persenRevenue_to_day = 0*100;
        $persenVolumemonth_to_day = (str_replace(",", "", $rkap_ton[1])==0?0:(str_replace(",", "", $vol[1])/str_replace(",", "", $rkap_ton[1]))*100);
        $persenRevenuemonth_to_day = (str_replace(",", "", $rkap_rev[1])==0?0:(str_replace(",", "", $rev[1])/str_replace(",", "", $rkap_rev[1]))*100);
        $persenVolumeyear_to_day = (str_replace(",", "", $rkap_ton[2])==0?0:(str_replace(",", "", $vol[2])/str_replace(",", "", $rkap_ton[2]))*100);
        $persenRevenueyear_to_day = (str_replace(",", "", $rkap_rev[2])==0?0:(str_replace(",", "", $rev[2])/str_replace(",", "", $rkap_rev[2]))*100);
        $data_r[] = array("to_day"=>array("DATAVOLUME"=>array(
            array("VOLUME"=>$vol[0],"TARGETVOLUME"=>"0","VARIANVOLUME"=>$varianVolumeto_day,"PERSENVOLUME"=>$persenVolume_to_day)
            ),
            "DATAREVENUE"=>array(
            array("PRICE"=>$this->convertmoneytomio($price[0]),"TOTALSALES"=>$this->convertmoneytomio($totsales[0]),"OA"=>$this->convertmoneytomio($oa[0]),"REVENUE"=>$this->convertmoneytomio($rev[0]),"TARGETREVENUE"=>"0","VARIANREVENUE"=>$this->convertmoneytomio($varianRevenueto_day),"PERSENREVENUE"=>$persenRevenue_to_day)
            )
          )
        );

        $data_r[] = array("month_to_day"=>array("DATAVOLUME"=>
            array("VOLUME"=>$vol[1],"TARGETVOLUME"=>$rkap_ton[1],"VARIANVOLUME"=>$varianVolumemonth_to_day,"PERSENVOLUME"=>$persenVolumemonth_to_day)
            ,
            "DATAREVENUE"=>array("PRICE"=>$this->convertmoneytomio($price[1]),"TOTALSALES"=>$this->convertmoneytomio($totsales[1]),"OA"=>$this->convertmoneytomio($oa[1]),"REVENUE"=>$this->convertmoneytomio($rev[1]),"TARGETREVENUE"=>$this->convertmoneytomio($rkap_rev[1]),"VARIANREVENUE"=>$this->convertmoneytomio($varianRevenuemonth_to_day),"PERSENREVENUE"=>$persenRevenuemonth_to_day)
            ));

        $data_r[] = array("year_to_day"=>
                            array("DATAVOLUME"=>array("VOLUME"=>$vol[2],"TARGETVOLUME"=>$rkap_ton[2],"VARIANVOLUME"=>$varianVolumemonth_to_day,"PERSENVOLUME"=>$persenVolumeyear_to_day
                                                     ),
                                 "DATAREVENUE"=>array("PRICE"=>$this->convertmoneytomio($price[2]),"TOTALSALES"=>$this->convertmoneytomio($totsales[2]),"OA"=>$this->convertmoneytomio($oa[2]),"REVENUE"=>$this->convertmoneytomio($rev[2]),"TARGETREVENUE"=>$this->convertmoneytomio($rkap_rev[2]),"VARIANREVENUE"=>$this->convertmoneytomio($varianRevenuemonth_to_day),"PERSENREVENUE"=>$persenRevenueyear_to_day
                                                    )
                                 )
                        );

        // $data_r = '"VOLUME1":"' . $vol[0] . '", "PRICE1":"' . $price[0] . '", "TOTALSALES1":"' . $totsales[0] . '", "OA1":"' . $oa[0] . '", "REVENUE1":"' . $rev[0] . '", "RKAP1":"0", "RKAPREV1":"0", "VOLUME2":"' . $vol[1] . '", "PRICE2":"' . $price[1] . '", "TOTALSALES2":"' . $totsales[1] . '", "OA2":"' . $oa[1] . '", "REVENUE2":"' . $rev[1] . '", "RKAP2":"' . $rkap_ton[1] . '", "RKAPREV2":"' . $rkap_rev[1] . '", "VOLUME3":"' . $vol[2] . '", "PRICE3":"' . $price[2] . '", "TOTALSALES3":"' . $totsales[2] . '", "OA3":"' . $oa[2] . '", "REVENUE3":"' . $rev[2] . '", "RKAP3":"' . $rkap_ton[2] . '", "RKAPREV3":"' . $rkap_rev[2] . '",';
        return $data_r;
    }

    //-------GET_DATA_PROV-------//
    public function get_data_company_prov($bln, $thn, $prov, $comp) {
        //echo $bln.' vs '.$thn.' vs '.$prov.' vs '.$comp;
        $tgl_now = date('Y/m/d');
        $bln_now = date('m');
        $thn_now = date('Y');
        $tgl_last = date("t", strtotime($thn . '/' . $bln . '/23'));
        if ($bln == $bln_now && $thn == $thn_now) {
            $tgl_rel = date('d');
        } else {
            $tgl_rel = $tgl_last;
        }
        $data = $this->M_RVD->get_data_prov_comp($tgl_now, $tgl_rel, $bln, $thn, $tgl_last, $comp, $prov);
        $vol = array();
        $price = array();
        $totsales = array();
        $oa = array();
        $rev = array();
        $r = 0;
        foreach ($data as $k => $v) {
            $vol[$r] = number_format($v['VOL'], 0);
            $price[$r] = number_format($v['PRICE'], 0);
            $totsales[$r] = number_format($v['TOTALSALES'], 0);
            $oa[$r] = number_format($v['OA'], 0);
            $rev[$r] = number_format($v['REV'], 0);
            $r++;
        }
        $data_rkap = $this->M_RVD->get_data_prov_rkap_bln_comp($comp, $prov, $thn, $bln);
        $rkap_ton = array();
        $rkap_rev = array();
        $u = 1;
        foreach ($data_rkap as $k => $v) {
            $rkap_ton[$u] = number_format($v['RKAP_TON'], 0);
            $rkap_rev[$u] = number_format($v['RKAP_REV'], 0);
            $u++;
        }
        $data_r = '"VOLUME1":"' . $vol[0] . '", "PRICE1":"' . $price[0] . '", "TOTALSALES1":"' . $totsales[0] . '", "OA1":"' . $oa[0] . '", "REVENUE1":"' . $rev[0] . '", "RKAP1":"0", "RKAPREV1":"0", "VOLUME2":"' . $vol[1] . '", "PRICE2":"' . $price[1] . '", "TOTALSALES2":"' . $totsales[1] . '", "OA2":"' . $oa[1] . '", "REVENUE2":"' . $rev[1] . '", "RKAP2":"' . $rkap_ton[1] . '", "RKAPREV2":"' . $rkap_rev[1] . '", "VOLUME3":"' . $vol[2] . '", "PRICE3":"' . $price[2] . '", "TOTALSALES3":"' . $totsales[2] . '", "OA3":"' . $oa[2] . '", "REVENUE3":"' . $rev[2] . '", "RKAP3":"' . $rkap_ton[2] . '", "RKAPREV3":"' . $rkap_rev[2] . '",';
        return $data_r;
    }

    public function get_data_prov_prov($prov, $bln, $thn) {
        $tgl_now = date('Y/m/d');
        $bln_now = date('m');
        $thn_now = date('Y');
        $tgl_last = date("t", strtotime($thn . '/' . $bln . '/23'));
        if ($bln == $bln_now && $thn == $thn_now) {
            $tgl_rel = date('d');
        } else {
            $tgl_rel = $tgl_last;
        }
        $data = $this->M_RVD->get_data_prov_prov($tgl_now, $tgl_rel, $bln, $thn, $tgl_last, $prov);
        $vol = array();
        $price = array();
        $totsales = array();
        $oa = array();
        $rev = array();
        $r = 0;
        foreach ($data as $k => $v) {
            $vol[$r] = number_format($v['VOL'], 0);
            $price[$r] = number_format($v['PRICE'], 0);
            $totsales[$r] = number_format($v['TOTALSALES'], 0);
            $oa[$r] = number_format($v['OA'], 0);
            $rev[$r] = number_format($v['REV'], 0);
            $r++;
        }
        $data_rkap = $this->M_RVD->get_data_prov_rkap_bln_prov($prov, $thn, $bln);
        $rkap_ton = array();
        $rkap_rev = array();
        $u = 1;
        foreach ($data_rkap as $k => $v) {
            $rkap_ton[$u] = number_format($v['RKAP_TON'], 0);
            $rkap_rev[$u] = number_format($v['RKAP_REV'], 0);
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

        $persenVolume_to_day = 0*100;
        $persenRevenue_to_day = 0*100;
        $persenVolumemonth_to_day = (str_replace(",", "", $rkap_ton[1])==0?0:(str_replace(",", "", $vol[1])/str_replace(",", "", $rkap_ton[1]))*100);
        $persenRevenuemonth_to_day = (str_replace(",", "", $rkap_rev[1])==0?0:(str_replace(",", "", $rev[1])/str_replace(",", "", $rkap_rev[1]))*100);
        $persenVolumeyear_to_day = (str_replace(",", "", $rkap_ton[2])==0?0:(str_replace(",", "", $vol[2])/str_replace(",", "", $rkap_ton[2]))*100);
        $persenRevenueyear_to_day = (str_replace(",", "", $rkap_rev[2])==0?0:(str_replace(",", "", $rev[2])/str_replace(",", "", $rkap_rev[2]))*100);

        $data_r[] = array("to_day"=>array("DATAVOLUME"=>array(
            array("VOLUME"=>$vol[0],"TARGETVOLUME"=>"0","VARIANVOLUME"=>$varianVolumeto_day,"PERSENVOLUME"=>$persenVolume_to_day)
            ),
            "DATAREVENUE"=>array(
            array("PRICE"=>$this->convertmoneytomio($price[0]),"TOTALSALES"=>$this->convertmoneytomio($totsales[0]),"OA"=>$this->convertmoneytomio($oa[0]),"REVENUE"=>$this->convertmoneytomio($rev[0]),"TARGETREVENUE"=>"0","VARIANREVENUE"=>$this->convertmoneytomio($varianRevenueto_day),"PERSENVOLUME"=>$this->convertmoneytomio($persenRevenue_to_day))
            )
          )
        );

        $data_r[] = array("month_to_day"=>array("DATAVOLUME"=>
            array("VOLUME"=>$vol[1],"TARGETVOLUME"=>$rkap_ton[1],"VARIANVOLUME"=>$varianVolumemonth_to_day,"PERSENVOLUME"=>$persenVolumemonth_to_day)
            ,
            "DATAREVENUE"=>array("PRICE"=>$this->convertmoneytomio($price[1]),"TOTALSALES"=>$this->convertmoneytomio($totsales[1]),"OA"=>$this->convertmoneytomio($oa[1]),"REVENUE"=>$this->convertmoneytomio($rev[1]),"TARGETREVENUE"=>$this->convertmoneytomio($rkap_rev[1]),"VARIANREVENUE"=>$this->convertmoneytomio($varianRevenuemonth_to_day),"PERSENREVENUE"=>$persenRevenuemonth_to_day)
            ));

        $data_r[] = array("year_to_day"=>
                            array("DATAVOLUME"=>array("VOLUME"=>$vol[2],"TARGETVOLUME"=>$rkap_ton[2],"VARIANVOLUME"=>$varianVolumemonth_to_day,"PERSENVOLUME"=>$persenVolumeyear_to_day
                                                     ),
                                 "DATAREVENUE"=>array("PRICE"=>$this->convertmoneytomio($price[2]),"TOTALSALES"=>$this->convertmoneytomio($totsales[2]),"OA"=>$this->convertmoneytomio($oa[2]),"REVENUE"=>$this->convertmoneytomio($rev[2]),"TARGETREVENUE"=>$this->convertmoneytomio($rkap_rev[2]),"VARIANREVENUE"=>$this->convertmoneytomio($varianRevenuemonth_to_day),"PERSENREVENUE"=>$persenRevenueyear_to_day
                                                    )
                                 )
                        );

        // $data_r = '"VOLUME1":"' . $vol[0] . '", "PRICE1":"' . $price[0] . '", "TOTALSALES1":"' . $totsales[0] . '", "OA1":"' . $oa[0] . '", "REVENUE1":"' . $rev[0] . '", "RKAP1":"0", "RKAPREV1":"0", "VOLUME2":"' . $vol[1] . '", "PRICE2":"' . $price[1] . '", "TOTALSALES2":"' . $totsales[1] . '", "OA2":"' . $oa[1] . '", "REVENUE2":"' . $rev[1] . '", "RKAP2":"' . $rkap_ton[1] . '", "RKAPREV2":"' . $rkap_rev[1] . '", "VOLUME3":"' . $vol[2] . '", "PRICE3":"' . $price[2] . '", "TOTALSALES3":"' . $totsales[2] . '", "OA3":"' . $oa[2] . '", "REVENUE3":"' . $rev[2] . '", "RKAP3":"' . $rkap_ton[2] . '", "RKAPREV3":"' . $rkap_rev[2] . '",';
        return $data_r;
    }

}
