<?php
header('Access-Control-Allow-Origin:*');
defined('BASEPATH') OR exit('No direct script access allowed');

class profit_lost extends CI_Controller {

	protected $path_upload = "";

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
        $this->db = $this->load->database('paradigma', TRUE);
	}

	public function upload()
	{
        // print_r(1);exit;
		$this->load->view('plant_information/upload/profit_lost');
	}

	public function uploading_process()
	{
		$insert = 0;
        $update = 0;
        
		define ('SITE_ROOT', realpath(dirname(__FILE__)));
        $this->path_upload = SITE_ROOT.'/upload/'.basename($_FILES['file']['name']);
        // print_r($_SERVER['DOCUMENT_ROOT']);exit;
        error_reporting(E_ALL ^ E_NOTICE);
        $file = $_FILES['file']['tmp_name'];
        if (move_uploaded_file($file, $this->path_upload))
        {
        	$inputFileName = $this->path_upload;
            try {
                $cacheMethod = PHPExcel_CachedObjectStorageFactory:: cache_to_phpTemp;
                $cacheSettings = array( ' memoryCacheSize ' => '8MB');
                PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);

                $inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
        
            } catch(Exception $e) {
                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }

            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
            $allData = array();
            for ($row = 0; $row <= $highestRow; $row++){
                $rowData = $sheet->rangeToArray('B' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
                array_push($allData, $rowData);
            }

            $opco = $allData[2][0][0];
            if($opco=='PT Semen Indonesia (Persero) Tbk.'){
                $comp=2000;
            }elseif($opco=='PT Semen Padang'){
                $comp=3000;
            }elseif($opco=='PT Semen Tonasa'){
                $comp=4000;
            }elseif($opco=='PT Semen Gresik'){
                $comp=5000;
            }elseif($opco=='Thang Long Cement Company'){
                $comp=6000;
            }elseif($opco=='PT Semen Indonesia'){
                $comp=7000;
            }

            $tanggal = date('Y-m-d',($allData[4][0][6] - 25569) * 86400);
            $tanggal = date('Y-m-d',strtotime($tanggal));

            $insert_rkap = array(	'SALES_VOLUME' 				    =>	$allData[9][0][2],
                                    'GROSS_REVENUE' 	            =>	$allData[11][0][2],
                                    'FREIGHT_COST' 	                =>	$allData[12][0][2],
                                    'NET_REVENUE' 		            =>	$allData[13][0][2],
                                    'COGS' 		                    =>	$allData[14][0][2],
                                    'GROSS_PROFIT' 		            =>	$allData[15][0][2],
                                    'GROSS_PROFIT_MARGIN' 		    =>	$allData[16][0][2],
                                    'GA_EXPENSE' 		            =>	$allData[17][0][2],
                                    'SALES_EXPENSE' 		        =>	$allData[18][0][2],
                                    'TOTAL_EXPENSE' 		        =>	$allData[19][0][2],
                                    'OPERATING_PROFIT' 		        =>	$allData[20][0][2],
                                    'OPERATING_PROFIT_MARGIN' 		=>	$allData[21][0][2],
                                    'EBITDA' 		                =>	$allData[22][0][2],
                                    'EBITDA_MARGIN' 		        =>	$allData[23][0][2],
                                    'INTEREST_EXPENSE' 		        =>	$allData[24][0][2],
                                    'EXCHANGE_RATE' 		        =>	$allData[25][0][2],
                                    'OTHER_INCOME' 		            =>	$allData[26][0][2],
                                    'PROFIT_BEFORE_TAX' 		    =>	$allData[27][0][2],
                                    'PROFIT_BEFORE_TAX_MARGIN' 		=>	$allData[28][0][2],
                                    'GROSS_SALES_PERTON' 		    =>	$allData[30][0][2],
                                    'FREIGHT_COST_PERTON' 		    =>	$allData[31][0][2],
                                    'SALES_RESULT_PERTON' 		    =>	$allData[32][0][2],
                                    'COGS_PERTON' 		            =>	$allData[33][0][2],
                                    'GROSS_PROFIT_MARGIN_PERTON' 	=>	$allData[34][0][2],
                                    'GA_EXPENSE_PERTON' 		    =>	$allData[35][0][2],
                                    'SALES_EXPENSE_PERTON' 		    =>	$allData[36][0][2],
                                    'TOTAL_EXPENSE_PERTON' 		    =>	$allData[37][0][2],
                                    'OPERATING_PROFIT_PERTON' 		=>	$allData[38][0][2],
                                    'EBITDA_PERTON' 		        =>	$allData[39][0][2],
                                    'LOAN_INTEREST_PERTON' 		    =>	$allData[40][0][2],
                                    'EXCHANGE_RATE_GAP_PERTON' 		=>	$allData[41][0][2],
                                    'OTHER_INCOME_PERTON' 		    =>	$allData[42][0][2],
                                    'PROFIT_BEFORE_TAX_PERTON' 		=>	$allData[43][0][2],
                                    'DATA_DATE' 		            =>	$tanggal,
                                    'COMPANY' 		                =>	$comp
                            );

            $insert_actual = array(	'SALES_VOLUME' 				    =>	$allData[9][0][3],
                                    'GROSS_REVENUE' 	            =>	$allData[11][0][3],
                                    'FREIGHT_COST' 	                =>	$allData[12][0][3],
                                    'NET_REVENUE' 		            =>	$allData[13][0][3],
                                    'COGS' 		                    =>	$allData[14][0][3],
                                    'GROSS_PROFIT' 		            =>	$allData[15][0][3],
                                    'GROSS_PROFIT_MARGIN' 		    =>	$allData[16][0][3],
                                    'GA_EXPENSE' 		            =>	$allData[17][0][3],
                                    'SALES_EXPENSE' 		        =>	$allData[18][0][3],
                                    'TOTAL_EXPENSE' 		        =>	$allData[19][0][3],
                                    'OPERATING_PROFIT' 		        =>	$allData[20][0][3],
                                    'OPERATING_PROFIT_MARGIN' 		=>	$allData[21][0][3],
                                    'EBITDA' 		                =>	$allData[22][0][3],
                                    'EBITDA_MARGIN' 		        =>	$allData[23][0][3],
                                    'INTEREST_EXPENSE' 		        =>	$allData[24][0][3],
                                    'EXCHANGE_RATE' 		        =>	$allData[25][0][3],
                                    'OTHER_INCOME' 		            =>	$allData[26][0][3],
                                    'PROFIT_BEFORE_TAX' 		    =>	$allData[27][0][3],
                                    'PROFIT_BEFORE_TAX_MARGIN' 		=>	$allData[28][0][3],
                                    'GROSS_SALES_PERTON' 		    =>	$allData[30][0][3],
                                    'FREIGHT_COST_PERTON' 		    =>	$allData[31][0][3],
                                    'SALES_RESULT_PERTON' 		    =>	$allData[32][0][3],
                                    'COGS_PERTON' 		            =>	$allData[33][0][3],
                                    'GROSS_PROFIT_MARGIN_PERTON' 	=>	$allData[34][0][3],
                                    'GA_EXPENSE_PERTON' 		    =>	$allData[35][0][3],
                                    'SALES_EXPENSE_PERTON' 		    =>	$allData[36][0][3],
                                    'TOTAL_EXPENSE_PERTON' 		    =>	$allData[37][0][3],
                                    'OPERATING_PROFIT_PERTON' 		=>	$allData[38][0][3],
                                    'EBITDA_PERTON' 		        =>	$allData[39][0][3],
                                    'LOAN_INTEREST_PERTON' 		    =>	$allData[40][0][3],
                                    'EXCHANGE_RATE_GAP_PERTON' 		=>	$allData[41][0][3],
                                    'OTHER_INCOME_PERTON' 		    =>	$allData[42][0][3],
                                    'PROFIT_BEFORE_TAX_PERTON' 		=>	$allData[43][0][3],
                                    'DATA_DATE' 		            =>	$tanggal,
                                    'COMPANY' 		                =>	$comp
                            );
                            
            $this->db->select('DATA_DATE');
            $this->db->from('PROFIT_LOST_ACTUAL');
            $this->db->where('DATA_DATE', $tanggal);
            $query = $this->db->get();

            if($query->num_rows()>0){
                $this->db->where('DATA_DATE', $tanggal);
                $this->db->insert('PROFIT_LOST_RKAP', $insert_rkap);
                $this->db->insert('PROFIT_LOST_ACTUAL', $insert_actual);
            }else{
                $this->db->insert('PROFIT_LOST_RKAP', $insert_rkap);
                $this->db->insert('PROFIT_LOST_ACTUAL', $insert_actual);
            }
            echo  json_encode(array('status'=>true,'msg'=>'Upload Success'));
		}else{
			echo  json_encode(array('status'=>false,'msg'=>'Upload Failed'));
		}
    }
}