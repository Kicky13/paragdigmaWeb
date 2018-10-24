<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_cal extends CI_Model {

    public function __construct() {
        parent::__construct();

        $this->db = $this->load->database('bpc', true);
    }
    
    public function last_update(){
        return $this->db->query("
                    SELECT TO_CHAR(MAX(LAST_UPDATE), 'DD-MON-YYYY HH24:MI:SS') AS LAST_UPDATE FROM FDSR
                ")->result_array();
    }
    
    public function company() {
        $select_all = ""; $filter_comp = "";
        // if ($_SESSION['status'] != 'ADMIN') {
        //     $comp_awal  = $_SESSION['company_hris'];
        //     $comp_add   = $_SESSION['company_bpc'];
        //     $akses_all  = explode(",", $comp_add);
        //     if($akses_all[0] == "1000"){
               $select_all = "SELECT 'ALL' AS COMPANY, 'ALL' AS DESCRIPTION FROM DUAL UNION ALL ";
        //     }
        //     $comp = "$comp_awal,$comp_add";
        //     if ($comp_add == "") {
        //         $comp = $comp_awal;
        //     }
        //     $comp = str_replace(",", "','", $comp);
        //     $filter_comp = "AND COMPANY IN ('$comp')";
        // }
        return $this->db->query("
                    SELECT * FROM (
                        $select_all
                        SELECT COMPANY, DESCRIPTION FROM M_COMPANY
                        WHERE PARENTH2 = 'GCEMENT'
                        AND COMPANY != '1000'
                        $filter_comp
                    )
                ")->result();
    }
    
    public function get_exchange_rate($tgl){
        $filter = "";
        foreach ($tgl as $value) {
            $filter = $filter."'".$value."', ";
        }
        $filter = rtrim($filter,", ");
        return $this->db->query("
                    SELECT * FROM M_EXCHANGE_RATE
                    WHERE TCURR = 'IDR'
                    AND GDATU IN ($filter)
                ")->result_array();
    }
    
    public function getlistcurrency()
    {
        $sql = "SELECT UKURS NILAI,FCURR MATA_UANG,GDATU,TO_CHAR(POSTING_DATE,'YYYY-MM-DD HH24:MI:SS') POSTING_DATE,
                TO_CHAR(LAST_UPDATE ,'YYYY-MM-DD HH24:MI:SS') LAST_UPDATE
                FROM M_EXCHANGE_RATE
                WHERE TCURR = 'IDR'
                AND FCURR in ('EUR','SEK','JPY','GBP','SGD','CHF','DKK','VND','USD','AUD')
                and GDATU = (select max(GDATU) from M_EXCHANGE_RATE)
                ORDER BY GDATU,FCURR DESC";
        return $this->db->query($sql)->result_array();
    }

    
    public function get_last_exchange($tgl, $currency){
        return $this->db->query("
                    SELECT UKURS FROM M_EXCHANGE_RATE
                    WHERE TCURR = 'IDR'
                    AND GDATU <= '$tgl'
                    AND FCURR = '$currency'
                    AND ROWNUM <= 1
                    ORDER BY GDATU DESC
                ")->result_array();
    }
    

    function get_AP_SMIG_today($tgl)
    {
        $sql = "SELECT
                    BUKRS AS OPCO,
                    WAERS AS CURRENCY,
                    SUM(DMBTR) AS NILAI
                FROM
                    ZCFI3015
                WHERE 
                DATECOL = '".$TGL."'
                GROUP BY 
                    BUKRS,
                    WAERS
                ORDER BY OPCO ASC";
        return $this->db->query($sql)->result_array();
    }

    public function get_data_all($tgl) {
        $query = ""; $kolom = "";
        $comp = $this->company();
        for ($i = 0; $i < count($tgl); $i++) {
           for($j = 1; $j < count($comp); $j++){
               $company = $comp[$j]->COMPANY;
               $desc    = str_replace('.', '', $comp[$j]->DESCRIPTION);
               $query = $query."SELECT $company AS ID, '$desc' AS JENIS, '$tgl[$i]' AS TANGGAL, DISPW, WRSHB AS JUMLAH FROM FDSB
                        WHERE BUKRS = '$company'
                        AND DATUM <= '$tgl[$i]'
                        UNION ALL
                        SELECT $company AS ID, '$desc' AS JENIS, '$tgl[$i]' AS TANGGAL, DISPW, WRSHB AS JUMLAH FROM FDSR
                        WHERE BUKRS = '$company'
                        AND DATUM <= '$tgl[$i]'
                        UNION ALL ";
            }
            $kolom = $kolom."$tgl[$i], ";
        }
        $query = rtrim($query,"UNION ALL ");
        $kolom = rtrim($kolom,", ");
        
        return $this->db->query("
		SELECT * FROM (
                    SELECT 'ALL.'|| KA.ID AS ID, KA.JENIS, KA.TANGGAL, 
                        CASE WHEN KA.DISPW = 'IDR' OR KA.DISPW = 'JPY' OR KA.DISPW = 'VND'
                        THEN ROUND(SUM((KA.JUMLAH/10)*NVL(MER.UKURS,1))) 
                        ELSE ROUND(SUM((KA.JUMLAH/1000)*NVL(MER.UKURS,1))) 
                        END AS JUMLAH FROM (
                        SELECT ID, JENIS, TANGGAL, DISPW, SUM(JUMLAH) AS JUMLAH FROM (
                            $query
                        )
                        WHERE JUMLAH != 0
                        GROUP BY JENIS, TANGGAL, DISPW, ID
                        ) KA
                        LEFT JOIN M_EXCHANGE_RATE MER
                        ON KA.DISPW = MER.FCURR AND KA.TANGGAL = MER.GDATU
                        GROUP BY KA.ID, KA.JENIS, KA.TANGGAL, KA.DISPW
                    )
                PIVOT (
                        SUM(JUMLAH) FOR (TANGGAL) IN (
                            $kolom
                        )
                )
                ORDER BY ID
		")
                        ->result_array();
    }

    public function get_data($comp, $tgl) {
        $query = ""; $kolom = "";
        for ($i = 0; $i < count($tgl); $i++) {
            $query = $query."SELECT DISPW AS JENIS, '$tgl[$i]' AS TANGGAL, WRSHB AS JUMLAH FROM FDSB
                        WHERE BUKRS = '$comp'
                        AND DATUM <= '$tgl[$i]'
                        UNION ALL
                        SELECT DISPW AS JENIS, '$tgl[$i]' AS TANGGAL, WRSHB AS JUMLAH FROM FDSR
                        WHERE BUKRS = '$comp'
                        AND DATUM <= '$tgl[$i]'
                        UNION ALL ";
            
            $kolom = $kolom."$tgl[$i], ";
        }
        $query = rtrim($query,"UNION ALL ");
        $kolom = rtrim($kolom,", ");
        
        return $this->db->query("
		SELECT * FROM (
                    SELECT '2.' || '$comp.' || JENIS AS ID, JENIS, TANGGAL, CASE WHEN JENIS = 'IDR' OR JENIS = 'JPY' OR JENIS = 'VND' THEN ROUND(SUM(JUMLAH)/10) ELSE ROUND(SUM(JUMLAH)/1000) END AS JUMLAH FROM (
                        $query
                    )
                    WHERE JUMLAH != 0
                    GROUP BY JENIS, TANGGAL
                    )
                    PIVOT (
                            SUM(JUMLAH) FOR (TANGGAL) IN (
                                $kolom
                            )
                    )
                    ORDER BY JENIS
		")
                        ->result_array();
    }
    
    public function get_data2($comp, $tgl, $currency) {
        $pembagi = 10;
        if($currency <> "IDR" && $currency <> "JPY" && $currency <> "VND"){
            $pembagi = 1000;
        }
        $query = ""; $kolom = "";
        for ($i = 0; $i < count($tgl); $i++) {
            $query = $query."SELECT 'BANK' AS JENIS, '$tgl[$i]' AS TANGGAL, WRSHB AS JUMLAH FROM FDSB
                        WHERE BUKRS = '$comp'
                        AND DATUM <= '$tgl[$i]'
                        AND DISPW = '$currency'
                        UNION ALL
                        SELECT 'CASHFLOW' AS JENIS, '$tgl[$i]' AS TANGGAL, WRSHB AS JUMLAH FROM FDSR
                        WHERE BUKRS = '$comp'
                        AND DATUM <= '$tgl[$i]'
                        AND DISPW = '$currency'
                        UNION ALL ";
            
            $kolom = $kolom."$tgl[$i], ";
        }
        $query = rtrim($query,"UNION ALL ");
        $kolom = rtrim($kolom,", ");
        
        return $this->db->query("
		SELECT * FROM (
                    SELECT '3.'|| '$comp.' || '$currency.' || JENIS AS ID, JENIS, TANGGAL, ROUND(SUM(JUMLAH)/$pembagi) AS JUMLAH FROM (
                        $query
                    )
                    WHERE JUMLAH != 0
                    GROUP BY JENIS, TANGGAL
                    )
                    PIVOT (
                            SUM(JUMLAH) FOR (TANGGAL) IN (
                                $kolom
                            )
                    )
                    ORDER BY JENIS
		")
                        ->result_array();
    }
    
    public function get_data3($comp, $tgl, $currency, $type) {
        $tabel = 'FDSR';
        if($type == "BANK"){
            $tabel = 'FDSB';
        }
        $pembagi = 10;
        if($currency <> "IDR" && $currency <> "JPY" && $currency <> "VND"){
            $pembagi = 1000;
        }
        $query = ""; $kolom = "";
        for ($i = 0; $i < count($tgl); $i++) {
            $query = $query."SELECT '4.'|| '$comp.' || '$currency.' || '$type.' || AA.EBENE AS ID, BB.LTEXT AS JENIS, '$tgl[$i]' AS TANGGAL, WRSHB AS JUMLAH FROM $tabel AA
                        JOIN M_PLEVEL BB ON AA.EBENE = BB.EBENE
                        WHERE BUKRS = '$comp'
                        AND DATUM <= '$tgl[$i]'
                        AND DISPW = '$currency'
                        UNION ALL ";
            
            $kolom = $kolom."$tgl[$i], ";
        }
        $query = rtrim($query,"UNION ALL ");
        $kolom = rtrim($kolom,", ");
        
        return $this->db->query("
		SELECT * FROM (
                    SELECT ID, JENIS, TANGGAL, ROUND(SUM(JUMLAH)/$pembagi) AS JUMLAH FROM (
                        $query
                    )
                    WHERE JUMLAH != 0
                    GROUP BY JENIS, TANGGAL, ID
                    )
                    PIVOT (
                            SUM(JUMLAH) FOR (TANGGAL) IN (
                                $kolom
                            )
                    )
                    ORDER BY JENIS
		")
                        ->result_array();
    }
    
    public function get_data4($comp, $tgl, $currency, $type, $ebene) {
        $pembagi = 10;
        if($currency <> "IDR" && $currency <> "JPY" && $currency <> "VND"){
            $pembagi = 1000;
        }
        $query = ""; $kolom = ""; $tabel = ""; $jenis = "";
        if($type == "BANK"){
            $tabel = 'FDSB';
            $jenis = 'BNKKO';
            for ($i = 0; $i < count($tgl); $i++) {
                $query = $query."SELECT '4.'|| '$comp.' || '$currency.' || '$type.' || AA.$jenis AS ID, AA.$jenis || ' - ' || BB.DESCRIPTION AS JENIS, '$tgl[$i]' AS TANGGAL, AA.WRSHB AS JUMLAH FROM $tabel AA
                            LEFT JOIN M_GL_ACCOUNT BB ON SUBSTR(AA.$jenis, -8, 8) = BB.GL_ACCOUNT
                            WHERE AA.BUKRS = '$comp'
                            AND AA.DATUM <= '$tgl[$i]'
                            AND AA.DISPW = '$currency'
                            AND AA.EBENE = '$ebene'
                            UNION ALL ";

                $kolom = $kolom."$tgl[$i], ";
            }
        }ELSE{
            $tabel = 'FDSR';
            $jenis = 'GRUPP';
            for ($i = 0; $i < count($tgl); $i++) {
                $query = $query."SELECT '4.'|| '$comp.' || '$currency.' || '$type.' || AA.$jenis AS ID, BB.TEXTL AS JENIS, '$tgl[$i]' AS TANGGAL, AA.WRSHB AS JUMLAH FROM $tabel AA
                            LEFT JOIN M_PGROUP BB ON AA.$jenis = BB.GRUPP
                            WHERE AA.BUKRS = '$comp'
                            AND AA.DATUM <= '$tgl[$i]'
                            AND AA.DISPW = '$currency'
                            AND AA.EBENE = '$ebene'
                            UNION ALL ";

                $kolom = $kolom."$tgl[$i], ";
            }
        }
        $query = rtrim($query,"UNION ALL ");
        $kolom = rtrim($kolom,", ");
        
        return $this->db->query("
		SELECT * FROM (
                    SELECT ID, JENIS, TANGGAL, ROUND(SUM(JUMLAH)/$pembagi) AS JUMLAH FROM (
                        $query
                    )
                    WHERE JUMLAH != 0
                    GROUP BY JENIS, TANGGAL, ID
                    )
                    PIVOT (
                            SUM(JUMLAH) FOR (TANGGAL) IN (
                                $kolom
                            )
                    )
                    ORDER BY JENIS
		")
                        ->result_array();
    }

}

?>