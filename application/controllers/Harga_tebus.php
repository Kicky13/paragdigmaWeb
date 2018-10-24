<?php


defined('BASEPATH') OR exit('No direct script access allowed');


class Harga_tebus extends CI_Controller
{	
	public function __construct() {
        parent::__construct();
        $this->load->model('harga_tebus_data');
    }
    
    public function get_data_harga_tebus_SP(){
        $material = $this->input->get('kode_produk');
        $org = $this->input->get('comp');
        $tahun = (int) $this->input->get('tahun');
		if(!isset($tahun) || empty($tahun)){
			$tahun = (int) date('Y');
		}
        $tahun_now = $tahun;
        $tahun_yes = $tahun - 1;
        $propinsi = $this->input->get('kodeprop');
        $kota = $this->input->get('kdkota');
        $incoterm = $this->input->get('incoterm');
        $incoterm='FRC';
        //echo $material.$org.$tahun.$propinsi.$kota;
        $data_harga_tebus_SP_yearnow = $this->harga_tebus_data->get_data_harga_tebus_SP($tahun_now,$kota,$material,$propinsi,$org,$incoterm);
        $data_harga_tebus_SP_yearyes = $this->harga_tebus_data->get_data_harga_tebus_SP($tahun_yes,$kota,$material,$propinsi,$org,$incoterm);
        echo json_encode(array($incoterm =>array($tahun_now=>$data_harga_tebus_SP_yearnow, $tahun_yes=>$data_harga_tebus_SP_yearyes)));
    }
    
    
    public function get_data_MIN_MAX_MEDIAN_harga_tebus_SP(){
        $material = $this->input->get('kode_produk');
        $org = $this->input->get('comp');
        $tahun = (int) $this->input->get('tahun');
		if(!isset($tahun) || empty($tahun)){
			$tahun = (int) date('Y');
		}
        $tahun_now = $tahun;
        $tahun_yes = $tahun - 1;
        $propinsi = $this->input->get('kodeprop');
        $kota = $this->input->get('kdkota');
        $incoterm = $this->input->get('incoterm');
        $incoterm='FRC';
        //echo $material.$org.$tahun.$propinsi.$kota;
        $data[$incoterm][$tahun_now]['MIN'] = $this->harga_tebus_data->get_MIN_data_harga_tebus_SP($tahun_now,$kota,$material,$propinsi,$org,$incoterm);
        $data[$incoterm][$tahun_now]['MAX'] = $this->harga_tebus_data->get_MAX_data_harga_tebus_SP($tahun_now,$kota,$material,$propinsi,$org,$incoterm);
        $data[$incoterm][$tahun_now]['MEDIAN'] = $this->harga_tebus_data->get_MEDIAN_data_harga_tebus_SP($tahun_now,$kota,$material,$propinsi,$org,$incoterm);
        $data[$incoterm][$tahun_yes]['MIN'] = $this->harga_tebus_data->get_MIN_data_harga_tebus_SP($tahun_now,$kota,$material,$propinsi,$org,$incoterm);
        $data[$incoterm][$tahun_yes]['MAX'] = $this->harga_tebus_data->get_MAX_data_harga_tebus_SP($tahun_now,$kota,$material,$propinsi,$org,$incoterm);
        $data[$incoterm][$tahun_yes]['MEDIAN'] = $this->harga_tebus_data->get_MEDIAN_data_harga_tebus_SP($tahun_now,$kota,$material,$propinsi,$org,$incoterm);
        
        echo json_encode(array('data'=>$data));
    }
    
    public function get_data_material_SP(){
        $org = $this->input->get('comp');
        $tahun = $this->input->get('tahun');
        $propinsi = $this->input->get('kodeprop');
        $org='3000';
        $data_material_SP = $this->harga_tebus_data->get_material_SP($tahun,$org,$propinsi);
        echo json_encode($data_material_SP);
    }
    
    public function get_data_kota_SP(){
        $org = $this->input->get('comp');
        $tahun = $this->input->get('tahun');
        $propinsi = $this->input->get('kodeprop');
        $org='3000';
        $data_kota_SP = $this->harga_tebus_data->get_kota_SP($tahun,$org,$propinsi);
        echo json_encode($data_kota_SP);
    }
    
    public function get_data_province_SP(){
        $org = $this->input->get('comp');
        $tahun = $this->input->get('tahun');
        $tahun = 2017;
        $org='3000';
        $data_kota_SP = $this->harga_tebus_data->get_province_SP($tahun,$org);
        echo json_encode($data_kota_SP);
    }
    
}
 
 
?>