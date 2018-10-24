<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Harga_tebus_toko extends CI_Controller
{
	public function __construct() {
        parent::__construct();
        $this->load->model('harga_tebus_data');
    }

    function getDataHargaBeliPerKemasan(){
    	$kemasan = $this->input->get("kemasan");
    	$provinsi = $this->input->get("provinsi");
    	$provinsi = isset($provinsi) && !empty($provinsi)?$provinsi:"00";
    	$kota = $this->input->get("kota");
    	$kota = isset($kota) && !empty($kota) ?$kota:"00";
    	$bulan_akhir = $this->input->get("bulan");
    	$tahun = $this->input->get("tahun");
    	$time = strtotime($bulan_akhir."".$tahun);
		$bulan_tahun_awal = date("Y.m", strtotime("-2 month", $time));
		$Arrbulan_tahun_awal = explode(".", $bulan_tahun_awal);
		$bulan_awal = $Arrbulan_tahun_awal[1];
		$tahun_awal = $Arrbulan_tahun_awal[0];
		
    	$headers = array(
		'Content-Type: application/json',
		'Token:eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjoiMTA0ODk1NiIsIm5hbWUiOiJhaG1hZC5tdXNob25uaWYiLCJhZF9vcmdfaWQiOiIxMDAwMTM4IiwiYWRfcm9sZV9pZCI6IjEwMDA1MzEiLCJyb2xlX25hbWUiOiJDUk0gQWRtaW4iLCJsb2NhdGlvbiI6IjEwNTIyNTQifQ.HK-T9RDUPACcpnczhjFJJEoqIadiPexNzaQ0uzjO22E'
		);
		$url = "http://10.15.2.121/prod/CRM/crm-api/G_grafikhargajual/harga/harga-beli/".$kemasan."/".$provinsi."/".$kota."/".$bulan_awal."/".$bulan_akhir."/".$tahun_awal."/".$tahun;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);  
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_VERBOSE, 0); 
		$result = curl_exec($ch);           
		if ($result === FALSE) {
			die('Curl failed: ' . curl_error($ch));
		}
		curl_close($ch);
		echo $result;
    }


    function getDataHargaJualPerKemasan(){
    	$kemasan = $this->input->get("kemasan");
    	$provinsi = $this->input->get("provinsi");
    	$provinsi = isset($provinsi) && !empty($provinsi)?$provinsi:"00";
    	$kota = $this->input->get("kota");
    	$kota = isset($kota) && !empty($kota) ?$kota:"00";
    	$bulan_akhir = $this->input->get("bulan");
    	$tahun = $this->input->get("tahun");
    	$time = strtotime($bulan_akhir."".$tahun);
		$bulan_tahun_awal = date("Y.m", strtotime("-2 month", $time));
		$Arrbulan_tahun_awal = explode(".", $bulan_tahun_awal);
		$bulan_awal = $Arrbulan_tahun_awal[1];
		$tahun_awal = $Arrbulan_tahun_awal[0];

    	$headers = array(
		'Content-Type: application/json',
		'Token:eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjoiMTA0ODk1NiIsIm5hbWUiOiJhaG1hZC5tdXNob25uaWYiLCJhZF9vcmdfaWQiOiIxMDAwMTM4IiwiYWRfcm9sZV9pZCI6IjEwMDA1MzEiLCJyb2xlX25hbWUiOiJDUk0gQWRtaW4iLCJsb2NhdGlvbiI6IjEwNTIyNTQifQ.HK-T9RDUPACcpnczhjFJJEoqIadiPexNzaQ0uzjO22E'
		);
		$url = "http://10.15.2.121/prod/CRM/crm-api/G_grafikhargajual/harga/harga-jual/".$kemasan."/".$provinsi."/".$kota."/".$bulan_awal."/".$bulan_akhir."/".$tahun_awal."/".$tahun;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);  
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_VERBOSE, 0); 
		$result = curl_exec($ch);           
		if ($result === FALSE) {
			die('Curl failed: ' . curl_error($ch));
		}
		curl_close($ch);
		echo $result;
    }
    
    function getDataDisparitas()
    {
    	$kemasan = $this->input->get("kemasan");
    	$provinsi = $this->input->get("provinsi");
    	$provinsi = isset($provinsi) && !empty($provinsi)?$provinsi:"00";
    	$kota = $this->input->get("kota");
    	$kota = isset($kota) && !empty($kota) ?$kota:"00";
    	$bulan_akhir = $this->input->get("bulan");
    	$tahun = $this->input->get("tahun");
    	$time = strtotime($bulan_akhir."".$tahun);
		$bulan_tahun_awal = date("Y.m", strtotime("-2 month", $time));
		$Arrbulan_tahun_awal = explode(".", $bulan_tahun_awal);
		$bulan_awal = $Arrbulan_tahun_awal[1];
		$tahun_awal = $Arrbulan_tahun_awal[0];

    	$headers = array(
		'Content-Type: application/json',
		'Token:eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjoiMTA0ODk1NiIsIm5hbWUiOiJhaG1hZC5tdXNob25uaWYiLCJhZF9vcmdfaWQiOiIxMDAwMTM4IiwiYWRfcm9sZV9pZCI6IjEwMDA1MzEiLCJyb2xlX25hbWUiOiJDUk0gQWRtaW4iLCJsb2NhdGlvbiI6IjEwNTIyNTQifQ.HK-T9RDUPACcpnczhjFJJEoqIadiPexNzaQ0uzjO22E'
		);
		$url ="http://10.15.2.121/prod/CRM/crm-api/G_grafikhargajual/disparitas/".$kemasan."/".$provinsi."/".$kota."/".$bulan_awal."/".$bulan_akhir."/".$tahun_awal."/".$tahun;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);  
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_VERBOSE, 0); 
		$result = curl_exec($ch);           
		if ($result === FALSE) {
			die('Curl failed: ' . curl_error($ch));
		}
		curl_close($ch);
		echo $result;
    }
    
    function getDataMargin()
    {
        $kemasan = $this->input->get("kemasan");
    	$provinsi = $this->input->get("provinsi");
    	$provinsi = isset($provinsi) && !empty($provinsi)?$provinsi:"00";
    	$kota = $this->input->get("kota");
    	$kota = isset($kota) && !empty($kota) ?$kota:"00";
    	$bulan_akhir = $this->input->get("bulan");
    	$tahun = $this->input->get("tahun");
    	$time = strtotime($bulan_akhir."".$tahun);
		$bulan_tahun_awal = date("Y.m", strtotime("-2 month", $time));
		$Arrbulan_tahun_awal = explode(".", $bulan_tahun_awal);
		$bulan_awal = $Arrbulan_tahun_awal[1];
		$tahun_awal = $Arrbulan_tahun_awal[0];

        $headers = array(
		'Content-Type: application/json',
		'Token:eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjoiMTA0ODk1NiIsIm5hbWUiOiJhaG1hZC5tdXNob25uaWYiLCJhZF9vcmdfaWQiOiIxMDAwMTM4IiwiYWRfcm9sZV9pZCI6IjEwMDA1MzEiLCJyb2xlX25hbWUiOiJDUk0gQWRtaW4iLCJsb2NhdGlvbiI6IjEwNTIyNTQifQ.HK-T9RDUPACcpnczhjFJJEoqIadiPexNzaQ0uzjO22E'
		);
		$url ="http://10.15.2.121/prod/CRM/crm-api/G_grafikhargajual/margin/".$kemasan."/".$provinsi."/".$kota."/".$bulan_awal."/".$bulan_akhir."/".$tahun_awal."/".$tahun;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);  
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_VERBOSE, 0); 
		$result = curl_exec($ch);           
		if ($result === FALSE) {
			die('Curl failed: ' . curl_error($ch));
		}
		curl_close($ch);
		echo $result;
    }

    function getProvinsi()
    {
        $headers = array(
		'Content-Type: application/json',
		'Token:eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjoiMTA0ODk1NiIsIm5hbWUiOiJhaG1hZC5tdXNob25uaWYiLCJhZF9vcmdfaWQiOiIxMDAwMTM4IiwiYWRfcm9sZV9pZCI6IjEwMDA1MzEiLCJyb2xlX25hbWUiOiJDUk0gQWRtaW4iLCJsb2NhdGlvbiI6IjEwNTIyNTQifQ.HK-T9RDUPACcpnczhjFJJEoqIadiPexNzaQ0uzjO22E'
		);
		$url ="http://10.15.2.121/prod/CRM/crm-api/F_region/00";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);  
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_VERBOSE, 0); 
		$result = curl_exec($ch);           
		if ($result === FALSE) {
			die('Curl failed: ' . curl_error($ch));
		}
		curl_close($ch);
		echo $result;
    }

    function getKota()
    {
        $kodeprovinsi = $this->input->get("provinsi");
        $kodeprovinsi = (isset($kodeprovinsi) && !empty($kodeprovinsi))? $kodeprovinsi :"00" ;
        $headers = array(
		'Content-Type: application/json',
		'Token:eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjoiMTA0ODk1NiIsIm5hbWUiOiJhaG1hZC5tdXNob25uaWYiLCJhZF9vcmdfaWQiOiIxMDAwMTM4IiwiYWRfcm9sZV9pZCI6IjEwMDA1MzEiLCJyb2xlX25hbWUiOiJDUk0gQWRtaW4iLCJsb2NhdGlvbiI6IjEwNTIyNTQifQ.HK-T9RDUPACcpnczhjFJJEoqIadiPexNzaQ0uzjO22E'
		);
		$url ="http://10.15.2.121/prod/CRM/crm-api/F_city/".$kodeprovinsi;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);  
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_VERBOSE, 0); 
		$result = curl_exec($ch);           
		if ($result === FALSE) {
			die('Curl failed: ' . curl_error($ch));
		}
		curl_close($ch);
		echo $result;
    }

}