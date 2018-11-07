<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class m_cogs extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('paradigma', TRUE);
    }

    function getAllTrend($opco, $month, $year)
    {
        $data = array();
        $items = $this->getAllItem($opco, $year);
        foreach ($items as $item) {
            $temp = $this->getTrendPerItem($opco, $year, $month, $item);
            array_push($data, $temp);
        }
        $compile = array(
            'months' => $this->getTrendYearsBefore($month),
            'data' => $data
        );
        return $compile;
    }

    function getTrendPerItem($opco, $year, $month, $item)
    {
        $date = $this->getTrendStartDate($month, $year);
        $query = "SELECT * FROM COGS_UPLOAD WHERE OPCO = '" . $opco . "' AND ITEM = '" . $item . "' AND (PERIOD >= TO_DATE('" . $date . "', 'yyyy-mm-dd') AND PERIOD < TO_DATE('" . $year . "-" . $month . "-28', 'yyyy-mm-dd'))";
        $data = $this->db->query($query);
        return $data->result_array();
    }

    function getActualByMonthYear($opco, $month, $year)
    {
        $date = $year . '-' . $month;
        $sql = "SELECT * FROM COGS_UPLOAD WHERE OPCO = '" . $opco . "' AND PERIOD = TO_DATE('" . $date . "', 'yyyy-mm') ORDER BY ID";
        $query = $this->db->query($sql);
        return (array)$query->result_array();
    }

    function test()
    {
        return 'test';
    }

    function getAllActualRKAP($opco, $month, $year)
    {
        $data = array();
        $items = $this->getAllItem($opco, $year);
        foreach ($items as $item) {
            $getItem = $this->getActualRKAPItem($opco, $month, $year, $item);
            $temp = array(
                'Actual' => $getItem['REALISASI'],
                'RKAP' => $getItem['RKAP']
            );
            array_push($data, $temp);
        }
        return $data;
    }

    function getActualRKAPItem($opco, $month, $year, $item)
    {
        $date = $year . "-" . $month;
        $query = "SELECT * FROM COGS_UPLOAD WHERE OPCO = '" . $opco . "' AND PERIOD = TO_DATE('" . $date . "', 'yyyy-mm') AND ITEM = '" . $item . "' ORDER BY ID";
        $data = $this->db->query($query);
        return $data->row_array();
    }

    function getAllYoY($opco, $year)
    {
        $data = array();
        $items = $this->getAllItem($opco, $year);
        foreach ($items as $item) {
            $thisYear = $this->getActualByYearItem($opco, $item, $year);
            $lastYear = $this->getActualByYearItem($opco, $item, $year - 1);
            if ($thisYear == 0 || $lastYear == 0) {
                $YoY = 0;
            } else {
                $YoY = ceil(($thisYear / $lastYear) * 100);
            }
            array_push($data, $YoY);
        }
        return $data;
    }

    function getAllMoM($opco, $month, $year)
    {
        $data = array();
        $items = $this->getAllItem($opco, $year);
        foreach ($items as $item) {
            $thisMonth = $this->getMonthActual($opco, $month, $year, $item);
            $lastMonth = $this->getMonthActual($opco, ($month - 1), $year, $item);
            if ($thisMonth['REALISASI'] == '0' || $lastMonth['REALISASI'] == '0') {
                $actual = 0;
            } else {
                $actual = ceil(($thisMonth['REALISASI'] / $lastMonth['REALISASI']) * 100);
            }
            array_push($data, $actual);
        }
        return $data;
    }

    function getMonthActual($opco, $month, $year, $item)
    {
        if ($month == 0) {
            $month = 12;
        }
        $date = $year . '-' . $month;
        $query = "SELECT * FROM COGS_UPLOAD WHERE OPCO = '" . $opco . "' AND PERIOD = TO_DATE('" . $date . "', 'yyyy-mm') AND ITEM = '" . $item . "' ORDER BY ID";
        $data = $this->db->query($query);
        return $data->row_array();
    }

    function getAllItem($opco, $year)
    {
        $data = array();
        $query = "SELECT ITEM FROM COGS_UPLOAD WHERE PERIOD = TO_DATE('" . $year . "-01-01', 'yyyy-mm-dd') AND OPCO = '" . $opco . "' ORDER BY ID";
        $run = $this->db->query($query);
        $temps = $run->result_array();
        foreach ($temps as $temp) {
            array_push($data, $temp['ITEM']);
        }
        return $data;
    }

    function getActualByYearItem($opco, $item, $year)
    {
        $YoY = 0;
        $query = "SELECT * FROM COGS_UPLOAD WHERE OPCO = '" . $opco . "' AND ITEM = '" . $item . "' AND (PERIOD >= TO_DATE('" . $year . "-01-01', 'yyyy-mm-dd') AND PERIOD < TO_DATE('" . $year . "-12-30', 'yyyy-mm-dd'))";
        $data = $this->db->query($query);
        foreach ($data->result_array() as $dd) {
            $YoY += floatval($dd['REALISASI']);
        }
        return $YoY;
    }

    function getTrendStartDate($month, $year)
    {
        if ($month == 12){
            $date = $year . '-01-01';
        } else {
            for ($i = 1; $i < 12; $i++) {
                if ($i >= $month) {
                    $m = 12 - ($i - $month);
                } else {
                    $m = $month - $i;
                }
            }
            $date = ($year - 1) . '-' . $m . '-01';
        }
        return $date;
    }

    function getTrendYearsBefore($month)
    {
        $months = array();
        for ($i = 0; $i < 12; $i++) {
            if ($i > $month) {
                $m = 12 - ($i - $month);
            } else {
                $m = $month - $i;
            }
            array_push($months, $this->getMonthName($m));
        }
        return array_reverse($months);
    }

    function getMonthName($month)
    {
        switch ($month) {
            case 1:
                $name = 'Jan';
                break;
            case 2:
                $name = 'Feb';
                break;
            case 3:
                $name = 'Mar';
                break;
            case 4:
                $name = 'Apr';
                break;
            case 5:
                $name = 'May';
                break;
            case 6:
                $name = 'Jun';
                break;
            case 7:
                $name = 'Jul';
                break;
            case 8:
                $name = 'Aug';
                break;
            case 9:
                $name = 'Sep';
                break;
            case 10:
                $name = 'Oct';
                break;
            case 11:
                $name = 'Nov';
                break;
            default:
                $name = 'Des';
                break;
        }
        return $name;
    }
}