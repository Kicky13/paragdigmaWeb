<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class m_cogs extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('paradigma', TRUE);
    }

    function getActualByMonthYear($opco, $month, $year)
    {
        $date = $year . '-' . $month;
        $sql = "SELECT * FROM COGS_UPLOAD WHERE OPCO = '". $opco ."' AND PERIOD = TO_DATE('". $date ."', 'yyyy-mm') ORDER BY ID";
//        $this->db->from("COGS_UPLOAD");
//        $this->db->where("OPCO", $opco);
//        $this->db->where("PERIOD = TO_DATE('".$date."', 'yyyy-mm')");
//        $this->db->order_by("ID");
        $query = $this->db->query($sql);
        return (array)$query->result_array();
    }

    function test()
    {
        return 'test';
    }
}