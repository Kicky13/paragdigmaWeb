<?php
header('Access-Control-Allow-Origin:*');
defined('BASEPATH') OR exit('No direct script access allowed');

class cogs_upload extends CI_Controller
{

    protected $path_upload = "";

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('PHPExcel', 'PHPExcel/IOFactory'));
        $this->db = $this->load->database('paradigma', TRUE);
    }

    public function index()
    {
        // print_r(1);exit;
        $this->load->view('plant_information/upload/cogs_upload');
    }

    public function uploading()
    {
        define('SITE_ROOT', realpath(dirname(__FILE__)));
        $this->path_upload = SITE_ROOT . '/upload/' . basename($_FILES['file']['name']);
        // print_r($_SERVER['DOCUMENT_ROOT']);exit;
        error_reporting(E_ALL ^ E_NOTICE);
        $file = $_FILES['file']['tmp_name'];
        if (move_uploaded_file($file, $this->path_upload)) {
            $inputFileName = $this->path_upload;
            try {
                $cacheMethod = PHPExcel_CachedObjectStorageFactory:: cache_to_phpTemp;
                $cacheSettings = array(' memoryCacheSize ' => '8MB');
                PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);

                $inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);

            } catch (Exception $e) {
                die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
            }
            $inserted = array();
            $wrk = array();
            foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
                $x = 0;
                $z = 4;
                $sheet = $objPHPExcel->getSheet(0);
                $opco = $this->convertOPCO($worksheet->getTitle());
                $highestRow = $sheet->getHighestRow();
                $highestColumn = $sheet->getHighestColumn();
                $period = $this->compilePeriod($worksheet->rangeToArray('C2:' . $highestColumn . '2'));
                $jenis = $this->compileCogs($worksheet->rangeToArray('B4:B' . $highestRow));
                array_push($wrk, $objPHPExcel->getIndex($worksheet));
                for ($i = 0; $i < count($jenis); $i++) {
                    $indexRKAP = 0;
                    $indexReal = 1;
                    $indexTL = 2;
                    $angka = $worksheet->rangeToArray('C' . $z . ':' . $highestColumn . '' . $z);
                    for ($j = 0; $j < count($period); $j++) {
                        $temp = array(
                            'OPCO' => $opco,
                            'ITEM' => $jenis[$i],
                            'PERIOD' => $this->dateConvert($period[$j]),
                            'RKAP' => str_replace(' ', '', $angka[0][$indexRKAP]),
                            'REALISASI' => str_replace(' ', '', $angka[0][$indexReal]),
                            'REALISASI_TAHUN_LALU' => str_replace(' ', '', angka[0][$indexTL])
                        );
                        array_push($inserted, $temp);
                        $indexRKAP = $indexRKAP + 3;
                        $indexReal = $indexReal + 3;
                        $indexTL = $indexTL + 3;
                        $x++;
                    }
                    $z++;
                }
            }
            if ($this->insertCOGS($inserted)) {
                echo json_encode(array('status' => true, 'msg' => 'Insert Data Success', 'data' => $inserted));
            } else {
                echo json_encode(array('status' => true, 'msg' => 'Upload Success, but insert Data Failed', 'data' => $inserted));
            }
        } else {
            echo json_encode(array('status' => false, 'msg' => 'Upload Failed'));
        }
    }

    function compilePeriod($arrayData)
    {
        $data = array();
        $periode = $arrayData[0];
        foreach ($periode as $datum) {
            if (preg_match('/[0-9]/', $datum)) {
                array_push($data, $datum);
            }
        }
        return $data;
    }

    function dateConvert($dateString)
    {
        $m = strtolower(substr($dateString, 0, 3));
        switch ($m) {
            case 'jan':
                $month = '01';
                break;
            case 'feb':
                $month = '02';
                break;
            case 'mar':
                $month = '03';
                break;
            case 'apr':
                $month = '04';
                break;
            case 'may':
                $month = '05';
                break;
            case 'jun':
                $month = '06';
                break;
            case 'jul':
                $month = '07';
                break;
            case 'aug':
                $month = '08';
                break;
            case 'sep':
                $month = '09';
                break;
            case 'oct':
                $month = '10';
                break;
            case 'nov':
                $month = '11';
                break;
            case 'dec':
                $month = '12';
                break;
            default:
                $month = 'undefined';
                break;
        }
        $year = '20' . substr($dateString, -2);
        $date = $year . '-' . $month . '-01';
        return $date;
    }

    function convertOPCO($opcoString)
    {
        switch ($opcoString) {
            case 'SI':
                $opco = '2000';
                break;
            case 'SG':
                $opco = '5000';
                break;
            case 'SP':
                $opco = '3000';
                break;
            case 'ST':
                $opco = '4000';
                break;
            default:
                $opco = 'undefined';
                break;
        }
        return $opco;
    }

    function compileCogs($arrayData)
    {
        $data = array();
        foreach ($arrayData as $datum) {
            if (preg_match('/[A-Za-z]/', $datum[0]) || preg_match('/[0-9]/', $datum[0])) {
                array_push($data, $datum[0]);
            }
        }
        return $data;
    }

    function insertCOGS($data)
    {
        $this->db->trans_start();
        for ($i = 0; $i < count($data); $i++) {
            $rowData = $this->checkCOGS($data[$i]['OPCO'], $data[$i]['ITEM'], $data[$i]['PERIOD']);
            if (count($rowData) > 0) {
                $sql = "UPDATE COGS_UPLOAD SET RKAP = '" . $data[$i]['RKAP'] . "', REALISASI = '" . $data[$i]['REALISASI'] . "', REALISASI_TAHUN_LALU = '" . $data[$i]['REALISASI_TAHUN_LALU'] . "' WHERE OPCO = '" . $data[$i]['OPCO'] . "' AND ITEM = '" . $data[$i]['ITEM'] . "' AND PERIOD = TO_DATE('" . $data[$i]['PERIOD'] . "', 'yyyy-mm-dd')";
//                $this->db->where('OPCO', $data[$i]['OPCO']);
//                $this->db->where('ITEM', $data[$i]['ITEM']);
//                $this->db->where('PERIOD', $data[$i]['PERIOD']);
//                $this->db->update('COGS_UPLOAD', $data[$i]);
            } else {
                $sql = "INSERT INTO COGS_UPLOAD VALUES ('" . $data[$i]['OPCO'] . "', '" . $data[$i]['ITEM'] . "', TO_DATE('" . $data[$i]['PERIOD'] . "', 'yyyy-mm-dd'), '" . $data[$i]['RKAP'] . "', '" . $data[$i]['REALISASI'] . "', '" . $data[$i]['REALISASI_TAHUN_LALU'] . "')";
//                $this->db->insert('COGS_UPLOAD', $data[$i]);
            }
            $this->db->query($sql);
        }
        $this->db->trans_complete();
        return true;
    }

    function checkCOGS($opco, $item, $period)
    {
//        $sql = "SELECT * FROM COGS_UPLOAD WHERE OPCO = '". $opco ."' AND ITEM = '". $item ."' AND PERIOD = TO_DATE('". $period ."','yyyy-mm-dd')";
        $this->db->from('COGS_UPLOAD');
        $this->db->where("OPCO", $opco);
        $this->db->where("ITEM", $item);
        $this->db->where("PERIOD = TO_DATE('" . $period . "','yyyy-mm-dd')");
//        $this->db->query($sql);
        $query = $this->db->get();
        $rowData = $query->result_array();
        return $rowData;
    }
}