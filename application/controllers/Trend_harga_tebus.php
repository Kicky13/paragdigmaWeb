<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Trend_harga_tebus extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->load->model('Sales_revenue_model');
        $this->load->model('mtrend_harga_tebus','trb');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function get_trend_7000(){
    	$kdpropinsi = $this->input->get('kdpropinsi');
    	$kdkota = $this->input->get('kdkota');
    	$tahun = $this->input->get('tahun');
    	$kode_produk = $this->input->get('kode_produk');
    	$incoterm = strtoupper($this->input->get('incoterm'));
    	if (!isset($tahun)){
    		$tahun = date('Y');
    	}
    	$data[$incoterm][$tahun] = $this->trb->get_trend_7000($kdpropinsi,$kdkota,$kode_produk,$tahun,$incoterm);
    	$data[$incoterm][($tahun-1)] = $this->trb->get_trend_7000($kdpropinsi,$kdkota,$kode_produk,($tahun-1),$incoterm);
    	
    	echo json_encode($data);
    }

    function get_trend_4000()
    {
    	$kdpropinsi = $this->input->get('kdpropinsi');
    	$kdkota = $this->input->get('kdkota');
    	$tahun = $this->input->get('tahun');
    	$kode_produk = $this->input->get('kode_produk');
    	$incoterm = strtoupper($this->input->get('incoterm'));
    	if (!isset($tahun)){
    		$tahun = date('Y');
    	}
    	$data[$incoterm][$tahun] = $this->trb->get_trend_4000($kdpropinsi,$kdkota,$kode_produk,$tahun,$incoterm);
    	$data[$incoterm][($tahun-1)] = $this->trb->get_trend_4000($kdpropinsi,$kdkota,$kode_produk,($tahun-1),$incoterm);
    	
    	echo json_encode($data);
    }

    function get_trend_6000()
    {
    	$kdpropinsi = $this->input->get('kdpropinsi');
    	$kdkota = $this->input->get('kdkota');
    	$tahun = $this->input->get('tahun');
    	$kode_produk = $this->input->get('kode_produk');
    	$incoterm = strtoupper($this->input->get('incoterm'));
    	if (!isset($tahun)){
    		$tahun = date('Y');
    	}
    	$data[$incoterm][$tahun] = $this->trb->get_trend_6000($kdpropinsi,$kdkota,$kode_produk,$tahun,$incoterm);
    	$data[$incoterm][($tahun-1)] = $this->trb->get_trend_6000($kdpropinsi,$kdkota,$kode_produk,($tahun-1),$incoterm);
    	
    	echo json_encode($data);
    }


    function get_trend_3000()
    {
    	$kdpropinsi = $this->input->get('kdpropinsi');
    	$kdkota = $this->input->get('kdkota');
    	$tahun = $this->input->get('tahun');
    	$kode_produk = $this->input->get('kode_produk');
    	$incoterm = strtoupper($this->input->get('incoterm'));
    	if (!isset($tahun)){
    		$tahun = date('Y');
    	}
    	$data[$incoterm][$tahun] = $this->trb->get_trend_3000($kdpropinsi,$kdkota,$kode_produk,$tahun,$incoterm);
    	$data[$incoterm][($tahun-1)] = $this->trb->get_trend_3000($kdpropinsi,$kdkota,$kode_produk,($tahun-1),$incoterm);
    	
    	echo json_encode($data);
    }

    function get_data_prop(){
    	$comp = $this->input->get('comp');
    	if (!isset($tahun)){
    		$tahun = date('Y');
    	}
    		echo json_encode($this->trb->get_data_prop($comp));
    }

    function get_data_kota(){
    	$kodeprop = $this->input->get('kodeprop');
    	$comp = $this->input->get('comp');
    	if (!isset($tahun)){
    		$tahun = date('Y');
    	}
    	echo json_encode($this->trb->get_data_kota($kodeprop,$comp));
    }

    function get_data_produk()
    {
    	$comp = $this->input->get('comp'); 
    	$kodeprop = $this->input->get('kodeprop');
    	$kdkota = $this->input->get('kdkota');
    	if ($comp=="7000")
    	{
    		echo json_encode($this->trb->get_data_produk_7000($kodeprop,$kdkota));
    	}elseif($comp=="4000")
    	{
    		echo json_encode($this->trb->get_data_produk_4000($kodeprop,$kdkota));
    	}elseif($comp=="6000"){
    		echo json_encode($this->trb->get_data_produk_6000($kodeprop,$kdkota));
    	}elseif($comp=="3000"){
    		echo json_encode($this->trb->get_data_produk_3000($kodeprop,$kdkota));
    	}
    }

    function getallprovtlcc()
    {
        $data = $this->trb->getallprovtlcc();
        echo json_encode($data);
    }
}