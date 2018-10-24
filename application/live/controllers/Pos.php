<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('pos_data'));
    }
    
    public function get_data(){
        $data = $this->pos_data->get_data();
        //print_r($data);
    }
    
    public function get_data_penjualan_LT_Distributor(){
        $thn = $this->input->get('tahun');
        $bln = $this->input->get('bulan');
        if($thn == null && $bln == null){
            $thn = date('Y');
            $bln = date('m');
        }
        
        //$data = $this->pos_data->get_data_penjualan_lt();
        $data = $this->pos_data->get_data_penjualan_lt_where_tgl($thn,$bln);
        $data_produk = $this->pos_data->getProduct();
        
        $produk = array();
        $produk_baru=array();
        $arrFinal= array();
        $nm_produk = '';
        $kd_produk='';
        
        foreach ($data as $key => $value) {
            $a = array_search($value['nama_produk'] , $produk);
            if($a <= -1){
                $produk[]=$value['nama_produk']; 
            }
            
			$arrFinal["DISTRIBUTOR ".$value['distributor']][] = array("NAMA_PRODUK"=>$value['nama_produk'],"KODE_PRODUK"=>$value['kode_produk'],"JUMLAH_JUAL"=>(int)$value['jumlah_jual']) ;
		}
        
        foreach($data_produk as $a){
            foreach($data as $i){
                if($a['KODE'] != $i['kode_produk'])
                    continue;
                
                $kd_produk = $a['KODE'];
                $nm_produk = $a['NAMA'];
                
                break;
            }
            $cek = array_search($nm_produk , $produk_baru);
            if($cek <= -1){
                array_push($produk_baru,$nm_produk);   
            }
        }
        
        echo json_encode(array('distributor'=>$arrFinal,'material_lama'=>$produk,'material'=>$produk_baru));
    }
    
    public function get_data_pembelian_tok(){
        $data = $this->pos_data->get_data_pembelian_toko();
        //print_r($data);
    }
    
    public function get_stok_LT(){
        $material = $this->input->get('material');
        $area = $this->input->get('area');
        if($area == null || $area == '')
            $area = '';
        if($material == null || $material == '')
            $material = '';
        //$area = 1;
        //$data = $this->pos_data->get_stok_lt();
        $master_material = $this->pos_data->getProduct();
        $data = $this->pos_data->get_stok_lt_where_area_produk($material,$area);
        //echo json_encode(array('data'=>$data));
        $arrFinal = array();
        $produk = array();
        
        foreach ($data as $key => $value) {
            /*$a = array_search($value['kode_produk'] , $produk);
            echo $a.'<br>';
            if($a <= -1){
                $produk[]=array('KODE'=>$value['kode_produk'],'NAMA'=>$value['nama_produk']); 
            }*/
            
			$arrFinal[] = array("KODE_LT"=>$value['code'],"NAMA_LT"=>$value['name'],
            "ALAMAT"=>$value['address'],"KODE_PRODUK"=>$value['kode_produk'],"NAMA_PRODUK"=>$value['nama_produk'],
            "QTY"=>(int)$value['quantity']) ;
            //print_r($produk);
		}
        
        echo json_encode(array('data'=>$arrFinal,'material'=>$master_material));
    }


/**
 * @author gencyolcu
 * @copyright 2017
 */
    
    
}

?>