<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    header('Access-Control-Allow-Origin: *');

class procurement extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->model('mprocurement');
    }

    public function get_data()
    {
        $comp = isset($_GET['comp']) ? $_GET['comp'] : '7000';
        $year = (empty($_GET['year']) ? date('Y') : $_GET['year']);
        $month = (empty($_GET['month']) ? date('m') : $_GET['month']);
        $date = $year.$month;
        
        if($comp=='7000'){
            $prbar = "'ZEX1', 'ZST1', 'ZST4', 'ZSK1', 'ZSK2', 'ZIV1', 'ZIVK'";
            $prjas = "'ZPM1', 'ZPMK', 'ZSV1'";
            $pobar = "'ZG01', 'ZG02', 'ZG03', 'ZG04', 'ZG05', 'ZG10', 'ZK01', 'ZK02', 'ZK03', 'ZK04', 'ZK05', 'ZK10'";
            $pobah = "'ZK06', 'ZG08', 'ZG09', 'ZG14', 'ZK06', 'ZK08', 'ZK09', 'ZK14'";
            $pojas = "'ZG07', 'ZK07'";
            $doctypepr = "'ZIV1', 'ZIVK'";
            $doctypepo = "'ZG05'";
        }else if($comp=='3000'){
            $prbar = "'ZEX2', 'ZKOP', 'ZST2', 'ZPM2', 'ZIV2'";
            $prjas = "'ZSV2'";
            $pobar = "'ZP01', 'ZP02', 'ZP03', 'ZP04', 'ZP05', 'ZP10', 'ZP11', 'ZP12'";
            $pobah = "'ZP06', 'ZP08', 'ZP09'";
            $pojas = "'ZP07'";
            $doctypepr = "'ZIV2'";
            $doctypepo = "'ZP05'";
        }else if($comp=='4000'){
            $prbar = "'ZST3', 'ZIV3";
            $prjas = "'ZSV3', 'ZPM3', 'ZIV4'";
            $pobar = "'ZT01', 'ZT02', 'ZT03', 'ZT04', 'ZT05', 'ZT10', 'ZT12'";
            $pobah = "'ZT06', 'ZT08', 'ZT09', 'ZT13'";
            $pojas = "'ZT07'";
            $doctypepr = "'ZIV3', 'ZIV4'";
            $doctypepo = "'ZG05'";
        }else if($comp=='5000'){
            $prbar = "'ZSO1', 'ZSO2', 'ZIVO'";
            $prjas = "'ZPMO'";
            $pobar = "'ZO01', 'ZO02', 'ZO03', 'ZO04', 'ZO05'";
            $pobah = "'ZO06', 'ZO08', 'ZO09', 'ZO14'";
            $pojas = "'ZO07'";
            $doctypepr = "'ZIVO'";
            $doctypepo = "'ZO05'";
        }else if($comp=='6000'){
            $prbar = "";
            $prjas = "";
            $pobar = "'ZV01', 'ZV02', 'ZV03', 'ZV05'";
            $pobah = "'ZV08', 'ZV09'";
            $pojas = "'ZV07'";
            $doctypepr = "'ZIV9'";
            $doctypepo = "'ZV05'";
        }

        $result['total_pr'] = $this->mprocurement->get_total_pr($date, $comp);
        $result['total_pr_rel'] = $this->mprocurement->get_total_pr($date, $comp);
        $result['total_rfq'] = $this->mprocurement->get_total_rfq($date, $comp);
        $result['total_po'] = $this->mprocurement->get_total_po($date, $comp);
        $result['total_gr'] = $this->mprocurement->get_total_gr($date, $comp);


        $result['total_pr_detail'] = $this->mprocurement->get_total_pr_detail($date, $pobah, $prbar, $prjas); 
        $result['total_pr_rel_detail'] = $this->mprocurement->get_total_pr_rel_detail($date, $pobah, $prbar, $prjas); 
        $result['total_rfq_detail'] = $this->mprocurement->get_total_rfq_detail($date, $pobah, $pobar, $pojas); 
        $result['total_po_detail'] = $this->mprocurement->get_total_po_detail($date, $pobah, $pobar, $pojas); 
        $result['total_gr_detail'] = $this->mprocurement->get_total_gr_detail($date, $pobah, $pobar, $pojas); 

        $trend_pr_barang = $this->mprocurement->get_trend_pr($year, $prbar);
        $trend_pr_jasa = $this->mprocurement->get_trend_pr($year, $prjas);

        $result['trend_pr']['barang'] = $this->settrend($trend_pr_barang, $year);
        $result['trend_pr']['jasa'] = $this->settrend($trend_pr_jasa, $year);

        $trend_pr_rel_barang = $this->mprocurement->get_trend_pr_rel($year, $prbar);
        $trend_pr_rel_jasa = $this->mprocurement->get_trend_pr_rel($year, $prjas);

        $result['trend_pr_rel']['barang'] = $this->settrend($trend_pr_rel_barang, $year);
        $result['trend_pr_rel']['jasa'] = $this->settrend($trend_pr_rel_jasa, $year);

        $trend_rfq_bahan = $this->mprocurement->get_trend_rfq($year, $pobah);
        $trend_rfq_barang = $this->mprocurement->get_trend_rfq($year, $pobar);
        $trend_rfq_jasa = $this->mprocurement->get_trend_rfq($year, $pojas);

        $result['trend_rfq']['bahan'] = $this->settrend($trend_rfq_bahan, $year);
        $result['trend_rfq']['barang'] = $this->settrend($trend_rfq_barang, $year);
        $result['trend_rfq']['jasa'] = $this->settrend($trend_rfq_jasa, $year);

        $trend_po_bahan = $this->mprocurement->get_trend_po($year, $pobah);
        $trend_po_barang = $this->mprocurement->get_trend_po($year, $pobar);
        $trend_po_jasa = $this->mprocurement->get_trend_po($year, $pojas);

        $result['trend_po']['bahan'] = $this->settrend($trend_po_bahan, $year);
        $result['trend_po']['barang'] = $this->settrend($trend_po_barang, $year);
        $result['trend_po']['jasa'] = $this->settrend($trend_po_jasa, $year);

        $trend_gr_bahan = $this->mprocurement->get_trend_gr($year, $pobah);
        $trend_gr_barang = $this->mprocurement->get_trend_gr($year, $pobar);
        $trend_gr_jasa = $this->mprocurement->get_trend_gr($year, $pojas);

        $result['trend_gr']['bahan'] = $this->settrend($trend_gr_bahan, $year);
        $result['trend_gr']['barang'] = $this->settrend($trend_gr_barang, $year);
        $result['trend_gr']['jasa'] = $this->settrend($trend_gr_jasa, $year);

        echo json_encode($result);
    }

    public function get_data_monthly()
    {
        $comp = isset($_GET['comp']) ? $_GET['comp'] : '7000';
        $year = (empty($_GET['year']) ? date('Y') : $_GET['year']);
        $month = (empty($_GET['month']) ? date('m') : $_GET['month']);
        $date = $year.$month;
        
        if($comp=='7000'){
            $pobar = "'ZG01', 'ZG02', 'ZG03', 'ZG04', 'ZG05', 'ZG10', 'ZK01', 'ZK02', 'ZK03', 'ZK04', 'ZK05', 'ZK10'";
            $pobah = "'ZK06', 'ZG08', 'ZG09', 'ZG14', 'ZK06', 'ZK08', 'ZK09', 'ZK14'";
            $pojas = "'ZG07', 'ZK07'";
            $doctypepr = "'ZIV1', 'ZIVK'";
            $doctypepo = "'ZG05'";
        }else if($comp=='3000'){
            $pobar = "'ZP01', 'ZP02', 'ZP03', 'ZP04', 'ZP05', 'ZP10', 'ZP11', 'ZP12'";
            $pobah = "'ZP06', 'ZP08', 'ZP09'";
            $pojas = "'ZP07'";
            $doctypepr = "'ZIV2'";
            $doctypepo = "'ZP05'";
        }else if($comp=='4000'){
            $pobar = "'ZT01', 'ZT02', 'ZT03', 'ZT04', 'ZT05', 'ZT10', 'ZT12'";
            $pobah = "'ZT06', 'ZT08', 'ZT09', 'ZT13'";
            $pojas = "'ZT07'";
            $doctypepr = "'ZIV3', 'ZIV4'";
            $doctypepo = "'ZG05'";
        }else if($comp=='5000'){
            $pobar = "'ZO01', 'ZO02', 'ZO03', 'ZO04', 'ZO05'";
            $pobah = "'ZO06', 'ZO08', 'ZO09', 'ZO14'";
            $pojas = "'ZO07'";
            $doctypepr = "'ZIVO'";
            $doctypepo = "'ZO05'";
        }else if($comp=='6000'){
            $pobar = "'ZV01', 'ZV02', 'ZV03', 'ZV05'";
            $pobah = "'ZV08', 'ZV09'";
            $pojas = "'ZV07'";
            $doctypepr = "'ZIV9'";
            $doctypepo = "'ZV05'";
        }

        $result['total_po'] = $this->mprocurement->get_total_po_monthly($date, $comp);
        $result['total_pr'] = $this->mprocurement->get_total_pr_monthly($date, $comp);
        $result['total_po_value'] = $this->mprocurement->get_total_poval_monthly($date, $comp);
        $result['total_po_barang'] = $this->mprocurement->get_total_pobar_monthly($date, $pobar);
        $result['total_po_bahan'] = $this->mprocurement->get_total_pobah_monthly($date, $pobah);
        $result['total_po_jasa'] = $this->mprocurement->get_total_pojas_monthly($date, $pojas);
        $result['total_invest_pr'] = $this->mprocurement->get_invest_pr_monthly($date, $doctypepr);
        $result['total_invest_po'] = $this->mprocurement->get_invest_po_monthly($date, $doctypepo);
        $trendpo = $this->mprocurement->get_trend_po_monthly($year, $comp);
        $trendpo_prev = $this->mprocurement->get_trend_po_monthly($year-1, $comp);
        $result['trend_po'] = $this->settrend($trendpo, $year);
        $result['trend_po_prev'] = $this->settrend($trendpo_prev, $year-1);
        $trendinvest = $this->mprocurement->get_trend_invest_monthly($year, $doctypepr, $doctypepo);
        $trendinvest_prev = $this->mprocurement->get_trend_invest_monthly($year-1, $doctypepr, $doctypepo);
        $result['trend_invest'] = $this->settrend($trendinvest, $year);
        $result['trend_invest_prev'] = $this->settrend($trendinvest_prev, $year);

        echo json_encode($result); 
    }

    function settrend($data, $year) {
        $bln = 1;
        $newtrend = array();
        foreach($data as $value => $k){
               $mnt = (int)subStr($k->MONTH, 4,2);
            if($bln!=$mnt){
                for($i=0;$i<($mnt-$bln);$i++){
                    $ddata = new stdClass();
                    $ddata->MONTH = $year.$i;
                    $ddata->TOTAL = "0";
                    $ddata->VAL = "0";
                    $newtrend[] = $ddata;                               
                } 
            }else{
                $newtrend[] = $k;
            }
            $bln++;
        }
        for($i=$bln ;$i<=12;$i++){
            $ddata = new stdClass();
            $ddata->MONTH = $year.$i;
            $ddata->TOTAL = "0";
            $ddata->VAL = "0";
            $newtrend[] = $ddata;                               
        } 
        return $newtrend;
    }
}

?>