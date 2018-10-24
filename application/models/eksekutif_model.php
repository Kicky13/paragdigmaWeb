<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Eksekutif_model extends CI_Model {

    var $table = 'PIS_KILN_OPS';
    var $column_order = array('DATE_PROD', 'STOP_COUNT', 'STOP_DESC');
    var $column_search = array('DATE_PROD', 'STOP_COUNT', 'STOP_DESC');
    var $order = array('DATE_PROD' => 'asc'); // default order 

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query() {
        $this->db->from($this->table);
        $i = 0;

        foreach ($this->column_search as $item) { // loop column 
            if ($_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

//    function get_datatables() {
//        $this->_get_datatables_query();
//        if ($_POST['length'] != -1)
//            $this->db->limit($_POST['length'], $_POST['start']);
//        $query = $this->db->get();
//        return $query->result();
//    }
    
    public function get_datatables(){
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT DATE_PROD,STOP_COUNT,STOP_DESC
                                FROM PIS_KILN_OPS WHERE COMPANY = 6000 and
                                TO_CHAR(DATE_PROD,'YYYY-MM') = '2016-01'");
        
        $Q = $Query->result_array();
//        if (!empty($Q)) {
//            foreach ($Query->result_array() as $value) {
//                $data["COMPANY"] = array(
//                    'CLINKER' => $value["CLINKER"]
//                );
//            }
//        } else {
//            $data = "";
//        }
        return $Q;
    }

    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

}
