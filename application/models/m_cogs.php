<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class m_cogs extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('paradigma', TRUE);
    }

    function dataCOGS($opco, $year)
    {
        $sql = "SELECT ITEM FROM COGS_UPLOAD
                WHERE OPCO = '2000'
                AND (PERIOD >= TO_DATE('1.1.' || 2014, 'DD.MM.YYYY') AND PERIOD < TO_DATE('1.1.' || (2014 + 1), 'DD.MM.YYYY'))";
        $this->db->query($sql);

    }
}