<?php

if (!defined('BASEPATH'))
    exit('Anda tidak masuk dengan benar');

class mfinance_report extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->db = $this->load->database('devsi', TRUE);
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


    public function get_data($time, $comp) {
        if ($comp == '1000') {
            $cm = "AND COMPANY  IN ('7000', '2000', '3000', '4000', '5000', '6000', '8000', '9000', '2100', '2200', '2300', '2710', '2720', '2730', '2740', '3100', '3200', '3710', '3720', 'G100', 'G200', 'G300', 'G400', 'G500')";
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
        if($bln_lalu<=9){
            $bln_lalu = '0'.$bln_lalu;
        }
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
                (SELECT SUM(VAL) FROM MV_LABA_RUGI_ELIM WHERE TITLE = C.GL_ACCOUNT AND CATEGORY = 'ACT' AND FISCAL_YEAR_PERIOD = '$year.$bln_lalu') AS ELIM_BLALU,
                (SELECT SUM(VAL) FROM MV_LABA_RUGI_ELIM WHERE TITLE = C.GL_ACCOUNT AND CATEGORY = 'ACT' AND FISCAL_YEAR_PERIOD = '$year_lalu.$bln') AS ELIM_LALU,
                (SELECT SUM(VAL) FROM MV_LABA_RUGI_ELIM WHERE TITLE = C.GL_ACCOUNT AND CATEGORY = 'ACT' AND FISCAL_YEAR_PERIOD IN ($time_between)) AS ELIM1,
                (SELECT SUM(VAL) FROM MV_LABA_RUGI_ELIM WHERE TITLE = C.GL_ACCOUNT AND CATEGORY = 'ACT' AND  FISCAL_YEAR_PERIOD IN ($time_between_lalu)) AS ELIM_LALU1,";

            $elim_sales = "(SELECT SUM(VAL) FROM MV_LABA_RUGI_ELIM WHERE TITLE = 'PL_HPB_SALES' AND CATEGORY = 'ACT' AND FISCAL_YEAR_PERIOD = '$year.$bln') AS ELIM,
                (SELECT SUM(VAL) FROM MV_LABA_RUGI_ELIM WHERE TITLE = 'PL_HPB_SALES' AND CATEGORY = 'ACT' AND FISCAL_YEAR_PERIOD = '$year.$bln_lalu') AS ELIM_BLN_LALU,
                (SELECT SUM(VAL) FROM MV_LABA_RUGI_ELIM WHERE TITLE = 'PL_HPB_SALES' AND CATEGORY = 'ACT' AND FISCAL_YEAR_PERIOD = '$year_lalu.$bln') AS ELIM_OLD,
                (SELECT SUM(VAL) FROM MV_LABA_RUGI_ELIM WHERE TITLE = 'PL_HPB_SALES' AND CATEGORY = 'ACT' AND FISCAL_YEAR_PERIOD = '$year_lalu.$bln_lalu') AS ELIM_BLN_LALU_OLD";
        } else {
            $elim = "0 AS ELIM, 0 AS ELIM_BLALU, 0 AS ELIM_LALU, 0 AS ELIM1, 0 AS ELIM_LALU1,";
            $elim_sales = "0 AS ELIM, 0 AS ELIM_BLN_LALU, 0 AS ELIM_OLD, 0 AS ELIM_BLN_LALU_OLD";
        }
        $q = $this->db->query("SELECT C.GL_ACCOUNT,
            $elim
            (SELECT SUM(AMOUNT) FROM CONSOLIDATION WHERE CATEGORY = 'BUD' $where FISCAL_YEAR_PERIOD = '$year.$bln') AS BUD,
            (SELECT SUM(AMOUNT) FROM CONSOLIDATION WHERE CATEGORY = 'ACT' $where FISCAL_YEAR_PERIOD = '$year.$bln') AS ACT,
            (SELECT SUM(AMOUNT) FROM CONSOLIDATION WHERE CATEGORY = 'ACT' $where FISCAL_YEAR_PERIOD = '$year.$bln_lalu') AS ACT_BLALU,
            (SELECT SUM(AMOUNT) FROM CONSOLIDATION WHERE CATEGORY = 'ACT' $where FISCAL_YEAR_PERIOD = '$year_lalu.$bln') AS ACT_LALU,
            (SELECT SUM(AMOUNT) FROM CONSOLIDATION WHERE CATEGORY = 'BUD' $where FISCAL_YEAR_PERIOD IN ($time_between)) AS BUD1,
            (SELECT SUM(AMOUNT) FROM CONSOLIDATION WHERE CATEGORY = 'ACT' $where FISCAL_YEAR_PERIOD IN ($time_between)) AS ACT1,
            (SELECT SUM(AMOUNT) FROM CONSOLIDATION WHERE CATEGORY = 'ACT' $where FISCAL_YEAR_PERIOD IN ($time_between_lalu)) AS ACT_LALU1
            FROM CONSOLIDATION C
            WHERE GL_ACCOUNT IN ('PL_VLP', 'PL_HPB', 'PL_OA', 'PL_BPP', 'PL_BUA', 'PL_BPE', 'PL_E', 'PL_E1', 'PL_BP', 'PL_LRSK', 'PL_PLL', 'PL_BPP1', 'PL_LRSK1', 'PL_PLL1', 'PL_TPP', 'PL_BA', 'PL_PB', 'PL_BPD', 'PL_BLL' ) 
            GROUP BY GL_ACCOUNT");

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

            $elimbl = $sh->ELIM_BLALU;
            $actbl = $sh->ACT_BLALU;
            $dt['ACT_BLALU'][$gl_account] = $actbl + $elimbl;
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

            $elimbl = $sh->ELIM_BLN_LALU;
            $dt['ACT_BLALU'][$gl_account] = $dt['ACT_BLALU']["PL_HPB"] + $elimbl;

        }
        return $dt;
        //BELUM YG HPB sales
    }

    public function get_data_monthly($time, $comp, $cat) {
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
        if($bln_lalu<=9){
            $bln_lalu = '0'.$bln_lalu;
        }
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
                    AND SCOPE = 'NON_GROUP'";
        //elim
        if ($comp == 'SI') {
            $elim = "(SELECT SUM(VAL) FROM MV_LABA_RUGI_ELIM WHERE TITLE = C.GL_ACCOUNT AND CATEGORY = 'ACT' AND FISCAL_YEAR_PERIOD LIKE ('%$year%')) AS ELIM";
            $elim_sales = "(SELECT SUM(VAL) FROM MV_LABA_RUGI_ELIM WHERE TITLE = 'PL_HPB_SALES' AND CATEGORY = 'ACT' AND FISCAL_YEAR_PERIOD LIKE ('%$year%')) AS ELIM";
        } else {
            $elim = "0 AS ELIM";
            $elim_sales = "0 AS ELIM";
        }

        $q = $this->db->query("SELECT C.GL_ACCOUNT,
    		$elim,
            (SELECT SUM(AMOUNT) FROM CONSOLIDATION WHERE CATEGORY = 'BUD' $where AND FISCAL_YEAR_PERIOD = '$year.$bln') AS BUD,
            (SELECT SUM(AMOUNT) FROM CONSOLIDATION WHERE CATEGORY = 'ACT' $where AND FISCAL_YEAR_PERIOD = '$year.$bln') AS ACT
            FROM CONSOLIDATION C
            WHERE GL_ACCOUNT IN $cat
		 	GROUP BY GL_ACCOUNT");

//        echo $this->db->last_query();exit;
        $dt['temp'][0] = 0;
        $qyr = $q->result();
        foreach ($qyr as $sh) {
            $gl_account = $sh->GL_ACCOUNT;
            $dt['BUD'][$gl_account] = $sh->BUD;

            $act = $sh->ACT;
            $dt['ACT'][$gl_account] = $act;
        }
        if($cat=="('PL_HPB', 'PL_OA')"){
	        $q_sales_elim = $this->db->query("SELECT
	                        $elim_sales
	                        FROM MV_LABA_RUGI_ELIM ME
	                        WHERE TITLE = 'PL_HPB_SALES' GROUP BY TITLE");
	        $qyr = $q_sales_elim->result();
	        foreach ($qyr as $sh) {
	            $dt['ACT']["PL_HPB"] = $dt['ACT']["PL_HPB"];

	        }
        }
        return $dt;
        //BELUM YG HPB sales
    }

    public function get_actual_upload($comp, $date) {
        $dbpar4digma = $this->load->database('paradigma', TRUE);
        $result = $dbpar4digma->query("SELECT NET_REVENUE,COGS,TOTAl_EXPENSE,EBITDA,PROFIT_BEFORE_TAX FROM PROFIT_LOST_ACTUAL WHERE COMPANY=$comp AND DATA_DATE LIKE '%$date%' ORDER BY DATA_DATE ASC");
        return $result->result_array();
    }
    public function get_rkap_upload($comp, $date) {
        $dbpar4digma = $this->load->database('paradigma', TRUE);
        $result = $dbpar4digma->query("SELECT NET_REVENUE,COGS,TOTAl_EXPENSE,EBITDA,PROFIT_BEFORE_TAX FROM PROFIT_LOST_RKAP WHERE COMPANY=$comp AND DATA_DATE LIKE '%$date%' ORDER BY DATA_DATE ASC");
        return $result->result_array();
    }
}

?>