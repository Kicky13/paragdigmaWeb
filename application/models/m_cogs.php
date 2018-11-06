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
            $temp = $this->getTrendPerItem($opco, $year, $item);
            array_push($data, $temp);
        }
        return $data;
    }

    function getTrendPerItem($opco, $year, $item)
    {
        $query = "SELECT * FROM COGS_UPLOAD WHERE OPCO = '" . $opco . "' AND ITEM = '" . $item . "' AND (PERIOD >= TO_DATE('" . $year . "-01-01', 'yyyy-mm-dd') AND PERIOD < TO_DATE('" . $year . "-12-30', 'yyyy-mm-dd'))";
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

    function getTrendMonth($month)
    {

    }

    function getTrendYearsBefore()
    {
        $date = date_create("2014-05-05");
        for ($i = 1; $i <= 12; $i++) {
            $months[] = date_sub($date, date_interval_create_from_date_string("12 months"));
        }
        return json_encode($months);
    }

    function getMonthName($month)
    {

    }
}