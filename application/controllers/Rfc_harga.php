<?php


defined('BASEPATH') OR exit('No direct script access allowed');


class Rfc_harga extends CI_Controller
{	
	public function __construct() {
        parent::__construct();
        
    }

    public function GetDataRfc($opco,$sequence)
    {
        // $this->load->library('SAP');
        require_once APPPATH.'third_party/sapclasses/sap.php';
        $sap = new SAPConnection();
        $sap->Connect(APPPATH."third_party/sapclasses/logon_dataProdReal.conf");
        if ($sap->GetStatus() == SAPRFC_OK ) $sap->Open ();
        if ($sap->GetStatus() != SAPRFC_OK ) {
            echo $sap->PrintStatus();
            exit;
        }

        $fce = &$sap->NewFunction ("Z_ZAPPSD_HARGA_TEBUS ");

        if ($fce == false) {
            $sap->PrintStatus();
            exit;
        }
        $comp;
        $fce->I_VKORG = $opco;
        $fce->I_SEQUENCE = $sequence;
        $fce->LR_VALID_DATE->row['SIGN'] = "I";
        $fce->LR_VALID_DATE->row['OPTION'] = "EQ";
        $fce->LR_VALID_DATE->row['LOW'] = "20171129";
        $fce->LR_VALID_DATE->row['HIGH'] = "99991231";
        $fce->LR_VALID_DATE->Append($fce->LR_VALID_DATE->row);
        $fce->call();
        if ($fce->GetStatus() == SAPRFC_OK) {
            $fce->T_OUT->Reset();
            $data=array();
            $i=0;
            while ($fce->T_OUT->Next()) {
                $data[] = $fce->T_OUT->row;
            }
            $fce->Close();
            $sap->Close();
            return $data;
            /*$data = array("data"=>$tampildata);
            echo json_encode($data);*/
        }
    }

    function main()
    {
    	
        // $opco = array('3000','4000','5000','7000');
        $opco = array('6000');
    	
    	$this->db = $this->load->database('bpc', TRUE);  	
    	// echo "<pre>";
    	foreach ($opco as $key => $opco_value) {
    		$data = array();
    		for ($i=1 ; $i <=5 ; $i++) { 
    			$temp = $this->GetDataRfc($opco_value,$i);
    			foreach ($temp as $key => $value) {
    				$data2 = array(
			    				"CONDITION_TYPE" =>   		$value["KSCHL"],
								"COMPANY" =>     $value["VKORG"],
								"DISTRIBUTION_CHANNEL"=>    $value["VTWEG"],
								"PRICE_LIST_TYPE"=>  		 $value["PLTYP"],
								"SOLD_TO "=>    $value["KUNAG"],
								"SHIP_TO"=>     $value["KUNWE"],
								"PLANT"=> $value["WERKS"],
								"NAME"=>  $value["WERKS_TXT"],
								"SALES_DISTRICT"=>    $value["BZIRK"],
								"DISTRICT_NAME"=>     addslashes($value["BZIRK_TXT"]),
								"TERMS_OF_PAYMENT_KEY"=>    $value["ZTERM"],
								"INCOTERMS"=>   $value["INCO1"],
								"MATERIAL_NUMBER"=>   $value["MATNR"],
								"MATERIAL_DESCRIPTION"=>    $value["MATNR_TXT"],
								"RELEASE_STATUS"=>    $value["KFRST"],
								"VALIDITY_END_DATE"=> $value["DATBI"],
								"VALIDITY_START_DATE"=>     $value["DATAB"],
								"PROCESSING_STATUS"=> $value["KBSTAT"],
								"CONDITION_RECORD_NUMBER"=> $value["KNUMH"],
								"HARGA"=> $value["KBETR"],
								"RATE_UNIT"=>   $value["KONWA"],
								"CONDITION_PRICING_UNIT"=>  $value["KPEIN"],
								"CONDITION_UNIT"=>    $value["KMEIN"],
								"RATE"=>  $value["PRICE_PER_UNIT"],
								"SEQUENCE"=>  $i,
    						);
                    $data[]  = $data2;
                    $this->db->insert("Z_SAP_HARGA_TEBUS ",$data2);
    			}
                echo $opco_value." ".$i." is process<br>";
    		}
    		// $this->db->insert_batch("Z_SAP_HARGA_TEBUS ",$data);
            echo $opco_value." is complete<br>";
    	}
    }
    
}