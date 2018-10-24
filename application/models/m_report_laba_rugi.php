<?php

if (!defined('BASEPATH'))
    exit('Anda tidak masuk dengan benar');

class m_report_laba_rugi extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->db = $this->load->database('bpc', TRUE);
    }
    
    public function cek_subsidiary($company){
        if($company == "2000,7000" || $company == "5000,7000"){
            return "";
        }else{
            $query = $this->db->query("SELECT 'i' || PARENTH2 AS PARENTH2
                                    FROM M_COMPANY
                                    WHERE COMPANY = '$company'
                                    ORDER BY PARENTH2, COMPANY");
            return $query->row()->PARENTH2;
        }
    }

    public function get_company() {
        $where = null;
        if ($_SESSION['status'] != 'ADMIN') {
            $where_s1 = null;
            $where_s2 = null;
            $comp = array_filter(explode(",", $_SESSION['company_hris'] . "," . $_SESSION['company_bpc']));
            $tmp = null;
            foreach ($comp as $k => $v) {
                $cmp = $tmp . "'$v',";
                $tmp = $cmp;
                if ($v == "7000") {
                    $where_s1 = "'2000,7000',";
                    $where_s2 = "'5000,7000',";
                } elseif ($v == "2000") {
                    $where_s1 = "'2000,7000',";
                } elseif ($v == "5000") {
                    $where_s2 = "'5000,7000',";
                }
            }
            $comp_all = substr($cmp . $where_s1 . $where_s2, 0, -1);
            $where = "WHERE COMPANY IN ($comp_all)";
        }
        return $this->db->query("SELECT COMPANY, DESCRIPTION FROM (
                                        SELECT '2000,7000' AS COMPANY, '2000 & 7000' AS DESCRIPTION, 'GCEMENT2' AS PARENTH2 FROM dual
                                    UNION
                                        SELECT '5000,7000' AS COMPANY, '5000 & 7000' AS DESCRIPTION, 'GCEMENT2' AS PARENTH2 FROM dual
                                    UNION
                                        SELECT COMPANY, DESCRIPTION, PARENTH2
                                        FROM M_COMPANY
                                        WHERE INTERCO IS NOT NULL
                                            AND COMPANY <> 'GCEMENT'
                                            AND COMPANY <> 'NO_ENTITY'
                                    )
                                    $where
                                    ORDER BY PARENTH2, COMPANY")->result();
    }
    
    public function get_data($time, $comp) {
        if ($comp == 'SI') {
            $cm = "";
        } else {
            if ($comp == "2000,7000") {
                $cm = "AND COMPANY  IN ('7000', '2000')";
            } elseif ($comp == "5000,7000") {
                $cm = "AND COMPANY  IN ('7000', '5000')";
            } else {
                $cm = "AND COMPANY  = '$comp'";
            }
        }
        $temp = "";
        $bln = substr($time, -2);
        $bln_lalu = $bln - 1;
        $year = substr($time, 0, 4);
        $year_lalu = $year - 1;
        for ($i = 1; $i <= $bln; $i++) {
            $month = "0$i";
            $month = substr($month, -2);
            if ($i != $bln) {
                $tmbhn = ",";
            } else {
                $tmbhn = "";
            }
            $time_between = "$temp '$year.$month' $tmbhn";
            $temp = $time_between;
        }
        //jadikan tahun menjadi tahan lalu
        $time_between_lalu = str_replace($year, $year_lalu, $time_between);

        $where = "AND AUDITTRAIL = 'PL_CONS'  
                    AND COSTCENTER_COMPONENT = 'NO_CC' 
                    AND DOCUMENT_TYPE = 'NO_DOC' 
                    AND FLOW = 'CLOSING' 
                    AND GL_ACCOUNT = C.GL_ACCOUNT
                    $cm
                    AND CURRENCY = 'LC' 
                    AND SCOPE = 'NON_GROUP' 
                    AND";
        //elim
        if ($comp == 'SI') {
            $elim = "(SELECT SUM(VAL) FROM MV_LABA_RUGI_ELIM WHERE TITLE = C.GL_ACCOUNT AND CATEGORY = 'ACT' AND FISCAL_YEAR_PERIOD = '$year.$bln') AS ELIM,
                (SELECT SUM(VAL) FROM MV_LABA_RUGI_ELIM WHERE TITLE = C.GL_ACCOUNT AND CATEGORY = 'ACT' AND FISCAL_YEAR_PERIOD = '$year_lalu.$bln') AS ELIM_LALU,
                (SELECT SUM(VAL) FROM MV_LABA_RUGI_ELIM WHERE TITLE = C.GL_ACCOUNT AND CATEGORY = 'ACT' AND FISCAL_YEAR_PERIOD IN ($time_between)) AS ELIM1,
                (SELECT SUM(VAL) FROM MV_LABA_RUGI_ELIM WHERE TITLE = C.GL_ACCOUNT AND CATEGORY = 'ACT' AND  FISCAL_YEAR_PERIOD IN ($time_between_lalu)) AS ELIM_LALU1,";

            $elim_sales = "(SELECT SUM(VAL) FROM MV_LABA_RUGI_ELIM WHERE TITLE = 'PL_HPB_SALES' AND CATEGORY = 'ACT' AND FISCAL_YEAR_PERIOD = '$year.$bln') AS ELIM,
                (SELECT SUM(VAL) FROM MV_LABA_RUGI_ELIM WHERE TITLE = 'PL_HPB_SALES' AND CATEGORY = 'ACT' AND FISCAL_YEAR_PERIOD = '$year.$bln_lalu') AS ELIM_BLN_LALU,
                (SELECT SUM(VAL) FROM MV_LABA_RUGI_ELIM WHERE TITLE = 'PL_HPB_SALES' AND CATEGORY = 'ACT' AND FISCAL_YEAR_PERIOD = '$year_lalu.$bln') AS ELIM_OLD,
                (SELECT SUM(VAL) FROM MV_LABA_RUGI_ELIM WHERE TITLE = 'PL_HPB_SALES' AND CATEGORY = 'ACT' AND FISCAL_YEAR_PERIOD = '$year_lalu.$bln_lalu') AS ELIM_BLN_LALU_OLD";
        } else {
            $elim = "0 AS ELIM, 0 AS ELIM_LALU, 0 AS ELIM1, 0 AS ELIM_LALU1,";
            $elim_sales = "0 AS ELIM, 0 AS ELIM_BLN_LALU, 0 AS ELIM_OLD, 0 AS ELIM_BLN_LALU_OLD";
        }
        $q = $this->db->query("SELECT C.GL_ACCOUNT,
            $elim
            (SELECT SUM(AMOUNT) FROM CONSOLIDATION WHERE CATEGORY = 'BUD' $where FISCAL_YEAR_PERIOD = '$year.$bln') AS BUD,
            (SELECT SUM(AMOUNT) FROM CONSOLIDATION WHERE CATEGORY = 'ACT' $where FISCAL_YEAR_PERIOD = '$year.$bln') AS ACT,
            (SELECT SUM(AMOUNT) FROM CONSOLIDATION WHERE CATEGORY = 'ACT' $where FISCAL_YEAR_PERIOD = '$year_lalu.$bln') AS ACT_LALU,
            (SELECT SUM(AMOUNT) FROM CONSOLIDATION WHERE CATEGORY = 'BUD' $where FISCAL_YEAR_PERIOD IN ($time_between)) AS BUD1,
            (SELECT SUM(AMOUNT) FROM CONSOLIDATION WHERE CATEGORY = 'ACT' $where FISCAL_YEAR_PERIOD IN ($time_between)) AS ACT1,
            (SELECT SUM(AMOUNT) FROM CONSOLIDATION WHERE CATEGORY = 'ACT' $where FISCAL_YEAR_PERIOD IN ($time_between_lalu)) AS ACT_LALU1
            FROM CONSOLIDATION C
            WHERE GL_ACCOUNT IN ('PL_VLP', 'PL_HPB', 'PL_OA', 'PL_BPP', 'PL_BUA', 'PL_BPE', 'PL_E', 'PL_E1', 'PL_BP', 'PL_LRSK',
            'PL_PLL', 'PL_BPP1', 'PL_LRSK1', 'PL_PLL1', 'PL_TPP', 'PL_BA', 'PL_PB', 'PL_BPD', 'PL_BLL')
            GROUP BY GL_ACCOUNT");
       // echo $this->db->last_query();exit;
        $dt['temp'][0] = 0;
        $qyr = $q->result();
        foreach ($qyr as $sh) {
            $gl_account = $sh->GL_ACCOUNT;
            $dt['BUD'][$gl_account] = $sh->BUD;
            $dt['BUD1'][$gl_account] = $sh->BUD1;

            $elim = $sh->ELIM;
            $act = $sh->ACT;
            $dt['ACT'][$gl_account] = $act + $elim;

            $elim1 = $sh->ELIM1;
            $act1 = $sh->ACT1;
            $dt['ACT1'][$gl_account] = $act1 + $elim1;

            $elim_lalu = $sh->ELIM_LALU;
            $act_lalu = $sh->ACT_LALU;
            $dt['ACT_LALU'][$gl_account] = $act_lalu + $elim_lalu;

            $elim_lalu1 = $sh->ELIM_LALU1;
            $act_lalu1 = $sh->ACT_LALU1;
            $dt['ACT_LALU1'][$gl_account] = $act_lalu1 + $elim_lalu1;
        }
        $q_sales_elim = $this->db->query("SELECT
                        $elim_sales
                        FROM MV_LABA_RUGI_ELIM ME
                        WHERE TITLE = 'PL_HPB_SALES' GROUP BY TITLE");
        $qyr = $q_sales_elim->result();
        foreach ($qyr as $sh) {
            $elim = $sh->ELIM;
            $elim_bln_lalu = $sh->ELIM_BLN_LALU;
            $elim_old = $sh->ELIM_OLD;
            $elim_bln_lalu_old = $sh->ELIM_BLN_LALU_OLD;

            $elim_now = $elim - $elim_bln_lalu;
            $elim_now_old = $elim_old - $elim_bln_lalu_old;

            $dt['ACT']["PL_HPB"] = $dt['ACT']["PL_HPB"] - $elim_now;
            $dt['ACT1']["PL_HPB"] = $dt['ACT1']["PL_HPB"] - $elim;
            $dt['ACT_LALU']["PL_HPB"] = $dt['ACT_LALU']["PL_HPB"] - $elim_now_old;
            $dt['ACT_LALU1']["PL_HPB"] = $dt['ACT_LALU1']["PL_HPB"] - $elim_old;
        }
        return $dt;
        //BELUM YG HPB sales
    }
	public function get_logo ($select, $comp){
            if($comp == "20007000" || $comp = "50007000"){
                $comp = "2000";
            }
            $query = $this->db->query("SELECT $select FROM M_COMPANY WHERE COMPANY = '$comp'");
            return $query->result_array();
	}

}

?>