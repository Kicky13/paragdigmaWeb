<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pos_api extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('mpos'));
    }

    public function getdata_penjualantokoarea()
    {
    	$bln = ($this->input->get('bln')?$this->input->get('bln'):date('m'));
    	$thn = ($this->input->get('thn')?$this->input->get('thn'):date('Y'));
		$data = $this->mpos->getdata_penjualantokoarea($bln,$thn);		
		$area="";
		$arrFinal = array();
		$arrTemp = array();
		$i=0;
		$nama_produk = "";
		$arrNamaProduk=array();
		foreach ($data as $key => $value) {
			$a = array_search($value['nama_produk'], $arrNamaProduk);
			if ($a<=-1)
			{
				$arrNamaProduk[] = $value['nama_produk'];				
			}

			if ($area=="")
			{
				$arrTemp[] = array("NAMA_PRODUK"=>$value['nama_produk'],"TOTAL_PENJUALAN"=>(int)$value['total_penjualan'],"AREA"=>$value['area']);	
			}else{
				if ($area!=$value['area'])
				{
					$arrFinal[] = array("AREA"=>$area,"DATA_PER_AREA"=>$arrTemp);	
					$arrTemp = array();
					$arrTemp[] = array("NAMA_PRODUK"=>$value['nama_produk'],"TOTAL_PENJUALAN"=>(int)$value['total_penjualan'],"AREA"=>$value['area']);	
				}else{
					$arrTemp[] = array("NAMA_PRODUK"=>$value['nama_produk'],"TOTAL_PENJUALAN"=>(int)$value['total_penjualan'],"AREA"=>$value['area']);	
				}	
			}
			$area = $value['area'];
			$i++;
			if ($i==count($data))
			{
				$arrFinal[] = array("AREA"=>$area,"DATA_PER_AREA"=>$arrTemp);
			}
		}

            $produk_baru = array();
            $nm_produk = '';
            $kd_produk='';
            $data_produk = $this->mpos->getProduct();
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

		$arrKembali = array("NAMA_PRODUK_LAMA"=>$arrNamaProduk,"NAMA_PRODUK"=>$produk_baru,"DATA"=>$arrFinal);
		echo json_encode($arrKembali);
    }

    public function get_toppenjualantokoperarea()
    {
    	$bln = ($this->input->get('bln')?$this->input->get('bln'):date('m'));
    	$thn = ($this->input->get('thn')?$this->input->get('thn'):date('Y'));
    	$area = $this->input->get('area');
    	$data = $this->mpos->get_toppenjualantokoperarea($bln,$thn,null,$area);
    	echo json_encode($data);		
    }
 	
 	public function get_trend_harga()
    {
    	$tipe = $this->input->get('tipe');
    	// $zaktipe = $this->input->get('zaktipe');
        $kode_produk = $this->input->get('kodeproduk');
    	$area = $this->input->get('area');
    	if ($tipe=="harian")
    	{
    		$bln = ($this->input->get('bln')?$this->input->get('bln'):date('m'));
    		$thn = ($this->input->get('thn')?$this->input->get('thn'):date('Y'));
    		$tgl = $thn.".".$bln;
    	}elseif ($tipe=="bulanan") {
    		$tgl = ($this->input->get('thn')?$this->input->get('thn'):date('Y'));
    	}
        // $data = $this->mpos->get_trend_harga($tgl,$tipe,$zaktipe,$kode_produk,$area);
    	$data = $this->mpos->get_trend_harga($tgl,$tipe,$kode_produk,$area);
    	$arrTgl = array();
    	foreach ($data as $key => $value) {
    		$cek = array_search(substr($value['tanggal'], 0,2) ,$arrTgl);
    		if ($cek<=-1)
    		{
    			$arrTgl[] = substr($value['tanggal'], 0,2);
    		}
    	}
    	$dataproduct = $this->mpos->getProduct();
    	$arrKembali = array("Product"=>$dataproduct,"LIST_TANGGAL"=>$arrTgl,"DATA"=>$data);
    	echo json_encode($arrKembali);		
    }
} 