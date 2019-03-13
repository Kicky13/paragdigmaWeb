<?php
class mprocurement extends CI_Model {
 
    public function __construct() {
        parent::__construct();
        $this->db = $this->load->database('sggbi', TRUE);
    }

    public function get_total_pr($seldate, $comp){
        $plant = substr($comp,0, 1);
        $sql = "SELECT Count(*) As total_pr, SUM(PREIS) AS total_value FROM TB_EBAN_TRACKING WHERE WERKS LIKE '$plant%' AND BADAT LIKE '$seldate%'";
        $result = $this->db->query($sql);
        return $result->row();
    }
    public function get_total_pr_detail($seldate, $pobah, $pobar, $pojas){
        $sql = "SELECT
                    A.total_pr_bahan,
                    A.total_value_bahan,
                    B.total_pr_barang,
                    B.total_value_barang,
                    C.total_pr_jasa,
                    C.total_value_jasa
                FROM(
                    SELECT 'a' as BD, total_pr_bahan, total_value_bahan FROM (
                        SELECT
                                Count( * ) AS total_pr_bahan,
                                SUM(PREIS) AS total_value_bahan 
                        FROM 
                                TB_EBAN_TRACKING
                        WHERE
                                BADAT LIKE '$seldate%' 
                                AND BSART IN ($pobah)
                    )
                ) A
                INNER JOIN (
                        SELECT 'a' as BD, total_pr_barang, total_value_barang FROM (
                            SELECT
                                    Count( * ) AS total_pr_barang,
                                    SUM(PREIS) AS total_value_barang 
                            FROM 
                                    TB_EBAN_TRACKING
                            WHERE
                                    BADAT LIKE '$seldate%' 
                                    AND BSART IN ($pobar)
                        )
                ) B ON B.BD=A.BD
                INNER JOIN (
                        SELECT 'a' as BD, total_pr_jasa, total_value_jasa FROM (
                            SELECT
                                    Count( * ) AS total_pr_jasa,
                                    SUM(PREIS) AS total_value_jasa 
                            FROM 
                                    TB_EBAN_TRACKING
                            WHERE
                                    BADAT LIKE '$seldate%' 
                                    AND BSART IN ($pojas)
                        )
                ) C ON C.BD=B.BD";
        $result = $this->db->query($sql);
        return $result->row();
    }

    public function get_trend_pr($year, $type){
        $sql = "SELECT
                    SUBSTR(BADAT, 0, 6 ) AS month,
                    Count( * ) AS total,
                    SUM(PREIS) AS val 
                FROM 
                    TB_EBAN_TRACKING
                WHERE
                    BADAT LIKE '$year%' 
                    AND BSART IN ($type)
                GROUP BY
                    SUBSTR(BADAT, 0, 6 )
                ORDER BY
                    month";
        $result = $this->db->query($sql);
        return $result->result();
    }

    public function get_total_pr_rel($seldate, $comp){
        $plant = substr($comp, 0, 1);
        $sql = "SELECT COUNT(*) AS total_pr_rel, SUM(PREIS) AS total_value FROM TB_EBAN_TRACKING A INNER JOIN TB_PR_APPROVE B ON A.BANFN=B.BANFN WHERE WERKS LIKE '$plant%' AND BADAT LIKE '$seldate%'";
        $result = $this->db->query($sql);
        return $result->row();
    }

    public function get_total_pr_rel_detail($seldate, $pobah, $pobar, $pojas){
        $sql = "SELECT
                    A.total_pr_bahan,
                    A.total_value_bahan,
                    B.total_pr_barang,
                    B.total_value_barang,
                    C.total_pr_jasa,
                    C.total_value_jasa
                FROM(
                    SELECT 'a' as BD, total_pr_bahan, total_value_bahan FROM (
                        SELECT
                                Count( * ) AS total_pr_bahan,
                                SUM(PREIS) AS total_value_bahan 
                        FROM 
                                TB_EBAN_TRACKING D INNER JOIN TB_PR_APPROVE E ON D.BANFN=E.BANFN
                        WHERE
                                BADAT LIKE '$seldate%' 
                                AND BSART IN ($pobah)
                    )
                ) A
                INNER JOIN (
                        SELECT 'a' as BD, total_pr_barang, total_value_barang FROM (
                            SELECT
                                Count( * ) AS total_pr_barang,
                                SUM(PREIS) AS total_value_barang 
                            FROM 
                                TB_EBAN_TRACKING D INNER JOIN TB_PR_APPROVE E ON D.BANFN=E.BANFN
                            WHERE
                                BADAT LIKE '$seldate%' 
                                AND BSART IN ($pobar)
                        )
                ) B ON B.BD=A.BD
                INNER JOIN (
                        SELECT 'a' as BD, total_pr_jasa, total_value_jasa FROM (
                            SELECT
                                Count( * ) AS total_pr_jasa,
                                SUM(PREIS) AS total_value_jasa 
                            FROM 
                                TB_EBAN_TRACKING D INNER JOIN TB_PR_APPROVE E ON D.BANFN=E.BANFN
                            WHERE
                                BADAT LIKE '$seldate%' 
                                AND BSART IN ($pojas)
                        )
                ) C ON C.BD=B.BD";
        $result = $this->db->query($sql);
        return $result->row();
    }

    public function get_trend_pr_rel($year, $type){
        $sql = "SELECT
                    SUBSTR(BADAT, 0, 6 ) AS month,
                    Count( * ) AS total,
                    SUM(PREIS) AS val 
                FROM 
                    TB_EBAN_TRACKING A INNER JOIN TB_PR_APPROVE B ON A.BANFN=B.BANFN
                WHERE
                    BADAT LIKE '$year%' 
                    AND BSART IN ($type)
                GROUP BY
                    SUBSTR(BADAT, 0, 6 )
                ORDER BY
                    month";
        $result = $this->db->query($sql);
        return $result->result();
    }

    public function get_total_rfq($seldate, $comp){
        $sql = "SELECT Count(*) As total_rfq FROM TB_STR_RFQ WHERE BEDAT LIKE '$seldate%' AND BUKRS IN ('$comp')";
        $result = $this->db->query($sql);
        return $result->row();     
    }
    public function get_total_rfq_detail($seldate, $pobah, $pobar, $pojas){
        $sql = "SELECT
		A.total_rfq_bahan,
		B.total_rfq_barang,
		C.total_rfq_jasa
        FROM(
            SELECT 'a' as BD, total_rfq_bahan FROM (
                SELECT
                    Count( * ) AS total_rfq_bahan
                FROM 
                    TB_STR_RFQ
                WHERE
                    BEDAT LIKE '$seldate%' 
                    AND BSART IN ($pobah)
            )
        ) A
        INNER JOIN (
            SELECT 'a' as BD, total_rfq_barang FROM (
                SELECT
                    Count( * ) AS total_rfq_barang
                FROM 
                    TB_STR_RFQ
                WHERE
                    BEDAT LIKE '$seldate%' 
                    AND BSART IN ($pobar)
            )
        ) B ON B.BD=A.BD
        INNER JOIN (
            SELECT 'a' as BD, total_rfq_jasa FROM (
                SELECT
                    Count( * ) AS total_rfq_jasa
                FROM 
                    TB_STR_RFQ
                WHERE
                    BEDAT LIKE '$seldate%' 
                AND BSART IN ($pojas)
            )
        ) C ON C.BD=B.BD";
        $result = $this->db->query($sql);
        return $result->row();
    }

    public function get_trend_rfq($year, $type){
        $sql = "SELECT
                    SUBSTR(BEDAT, 0, 6 ) AS month,
                    Count( * ) AS total
                FROM 
                    TB_STR_RFQ
                WHERE
                    BEDAT LIKE '$year%' 
                    AND BSART IN ($type)
                GROUP BY
                    SUBSTR(BEDAT, 0, 6 )
                ORDER BY
                    month";
        $result = $this->db->query($sql);
        return $result->result();
    }

    public function get_total_po($seldate, $comp){
        $sql = "SELECT Count(*) As total_po, SUM(NETWR) AS total_value FROM TB_STR_PO WHERE BEDAT LIKE '$seldate%' AND BUKRS IN ('$comp')";
        $result = $this->db->query($sql);
        return $result->row();
    }
    public function get_total_po_detail($seldate, $pobah, $pobar, $pojas){
        $sql = "SELECT
                    A.total_po_bahan,
                    A.total_value_bahan,
                    B.total_po_barang,
                    B.total_value_barang,
                    C.total_po_jasa,
                    C.total_value_jasa
                FROM(
                    SELECT 'a' as BD, total_po_bahan, total_value_bahan FROM (
                        SELECT
                            Count( * ) AS total_po_bahan,
                            SUM(NETWR) AS total_value_bahan 
                        FROM 
                            TB_STR_PO
                        WHERE
                            BEDAT LIKE '$seldate%' 
                            AND BSART IN ($pobah)
                    )
                ) A
                INNER JOIN (
                    SELECT 'a' as BD, total_po_barang, total_value_barang FROM (
                        SELECT
                            Count( * ) AS total_po_barang,
                            SUM(NETWR) AS total_value_barang 
                        FROM 
                            TB_STR_PO
                        WHERE
                            BEDAT LIKE '$seldate%' 
                            AND BSART IN ($pobar)
                    )
                ) B ON B.BD=A.BD
                INNER JOIN (
                    SELECT 'a' as BD, total_po_jasa, total_value_jasa FROM (
                        SELECT
                            Count( * ) AS total_po_jasa,
                            SUM(NETWR) AS total_value_jasa 
                        FROM 
                            TB_STR_PO
                        WHERE
                            BEDAT LIKE '$seldate%' 
                            AND BSART IN ($pojas)
                    )
                ) C ON C.BD=B.BD";
        $result = $this->db->query($sql);
        return $result->row();
    }

    public function get_trend_po($year, $type){
        $sql = "SELECT
                    SUBSTR(BEDAT, 0, 6 ) AS month,
                    Count( * ) AS total,
                    SUM(NETWR) AS val 
                FROM 
                    TB_STR_PO
                WHERE
                    BEDAT LIKE '$year%' 
                    AND BSART IN ($type)
                GROUP BY
                    SUBSTR(BEDAT, 0, 6 )
                ORDER BY
                    month";
        $result = $this->db->query($sql);
        return $result->result();
    }

    public function get_total_gr($seldate, $comp){
        $plant = substr($comp, 0, 1);
        $sql = "SELECT Count(*) As total_gr, SUM(DMBTR) AS total_value FROM TB_MKPF_MSEG WHERE WERKS LIKE '$plant%' AND BUDAT LIKE '$seldate%'";
        $result = $this->db->query($sql);
        return $result->row(); 
    }
    public function get_total_gr_detail($seldate, $pobah, $pobar, $pojas){
        $sql = "SELECT
                    A.total_gr_bahan,
                    A.total_value_bahan,
                    B.total_gr_barang,
                    B.total_value_barang,
                    C.total_gr_jasa,
                    C.total_value_jasa
                FROM(
                    SELECT 'a' as BD, total_gr_bahan, total_value_bahan FROM (
                        SELECT
                            Count( * ) AS total_gr_bahan,
                            SUM(DMBTR) AS total_value_bahan 
                        FROM 
                            TB_MKPF_MSEG INNER JOIN TB_STR_PO ON TB_STR_PO.MATNR=TB_MKPF_MSEG.MATNR
                        WHERE
                            TB_MKPF_MSEG.BUDAT LIKE '$seldate%' 
                            AND TB_STR_PO.BSART IN ($pobah)
                    )
                ) A
                INNER JOIN (
                    SELECT 'a' as BD, total_gr_barang, total_value_barang FROM (
                        SELECT
                            Count( * ) AS total_gr_barang,
                            SUM(DMBTR) AS total_value_barang 
                        FROM 
                            TB_MKPF_MSEG INNER JOIN TB_STR_PO ON TB_STR_PO.MATNR=TB_MKPF_MSEG.MATNR
                        WHERE
                            TB_MKPF_MSEG.BUDAT LIKE '$seldate%' 
                            AND TB_STR_PO.BSART IN ($pobar)
                    )
                ) B ON B.BD=A.BD
                INNER JOIN (
                    SELECT 'a' as BD, total_gr_jasa, total_value_jasa FROM (
                        SELECT  
                            Count( * ) AS total_gr_jasa,
                            SUM(DMBTR) AS total_value_jasa 
                        FROM 
                            TB_MKPF_MSEG INNER JOIN TB_STR_PO ON TB_STR_PO.MATNR=TB_MKPF_MSEG.MATNR
                        WHERE
                            TB_MKPF_MSEG.BUDAT LIKE '$seldate%' 
                            AND TB_STR_PO.BSART IN ($pojas)
                    )
                ) C ON C.BD=B.BD";
        $result = $this->db->query($sql);
        return $result->row();
    } 
    
    public function get_trend_gr($year, $type){
        $sql = "SELECT
                    SUBSTR(TB_MKPF_MSEG.BUDAT, 0, 6 ) AS month,
                    Count(*) AS total,
                    SUM(DMBTR) AS val 
                FROM
                    TB_MKPF_MSEG INNER JOIN TB_STR_PO ON TB_STR_PO.MATNR=TB_MKPF_MSEG.MATNR
                WHERE
                    TB_MKPF_MSEG.BUDAT LIKE '$year%'
                    AND TB_STR_PO.BSART IN ($type)
                GROUP BY
                    SUBSTR(TB_MKPF_MSEG.BUDAT, 0, 6 )
                ORDER BY
                    month";
        $result = $this->db->query($sql);
        return $result->result();
    }

    
    public function get_total_po_monthly($seldate, $comp){
        $sql = "SELECT Count(*) As total_po FROM TB_STR_PO WHERE BEDAT LIKE '$seldate%' AND BUKRS IN ('$comp')";
        $result = $this->db->query($sql);
        return $result->row();
    }
    public function get_total_pr_monthly($seldate, $plant){
        $comp = substr($plant, 0, 1);
        $sql = "SELECT Count(*) As total_pr FROM TB_EBAN_TRACKING WHERE WERKS LIKE '$comp%' AND BADAT LIKE '$seldate%'";
        $result = $this->db->query($sql);
        return $result->row();
    }
    public function get_total_poval_monthly($seldate, $comp){
        $sql = "SELECT SUM(BRTWR) As total_poval FROM TB_STR_PO WHERE BEDAT LIKE '$seldate%' AND BUKRS IN ('$comp')";
        $result = $this->db->query($sql);
        return $result->row();
    }
    public function get_total_pobar_monthly($seldate, $pobar){
        $sql = "SELECT SUM(BRTWR) As total_pobar FROM TB_STR_PO WHERE BEDAT LIKE '$seldate%' AND BSART IN ($pobar)";
        $result = $this->db->query($sql);
        return $result->row();
    }
    public function get_total_pojas_monthly($seldate, $pobah){
        $sql = "SELECT SUM(BRTWR) As total_pojas FROM TB_STR_PO WHERE BEDAT LIKE '$seldate%' AND BSART IN ($pobah)";
        $result = $this->db->query($sql);
        return $result->row();
    }
    public function get_total_pobah_monthly($seldate, $pojas){
        $sql = "SELECT SUM(BRTWR) As total_pobah FROM TB_STR_PO WHERE BEDAT LIKE '$seldate%' AND BSART IN ($pojas)";
        $result = $this->db->query($sql);
        return $result->row();
    }
    public function get_invest_pr_monthly($seldate, $doctype){
        $sql = "SELECT COUNT(*) AS TOTAL_INVEST_PR FROM TB_EBAN_TRACKING INNER JOIN TB_PR_APPROVE ON TB_EBAN_TRACKING.BANFN=TB_PR_APPROVE.BANFN WHERE BSART IN ($doctype) AND BADAT LIKE '$seldate%'";
        $result = $this->db->query($sql);
        return $result->row();
    }
    public function get_invest_po_monthly($seldate, $doctype){
        $sql = "SELECT COUNT(*) AS TOTAL_INVEST_PO FROM TB_STR_PO INNER JOIN TB_PO_APPROVE ON TB_STR_PO.EBELN=TB_PO_APPROVE.EBELN WHERE BSART IN ($doctype) AND BEDAT LIKE '$seldate%'";
        $result = $this->db->query($sql);
        return $result->row();
    }
    public function get_trend_po_monthly($year, $comp){
        $sql = "SELECT
                    SUBSTR(BEDAT, 0, 6 ) AS MONTH,
                    COUNT(*) AS TOTAL_PO,
                    SUM(MENGE) AS TOTAL_ITEM
                FROM
                    TB_STR_PO C
                    INNER JOIN TB_PO_APPROVE D ON C.EBELN = D.EBELN
                WHERE
                    BEDAT LIKE '$year%' 
                    AND BUKRS IN ('$comp')
                GROUP BY
                    SUBSTR( BEDAT, 0, 6 )
                ORDER BY
                    MONTH";
        $result = $this->db->query($sql);
        return $result->result();
    }

    public function get_trend_invest_monthly($year, $doctypepr, $doctypepo){
        $sql = "SELECT 
                    F.MONTH,
                    F.TOTAL_PR,
                    B.TOTAL_PO
                FROM   
                (
                    SELECT
                        SUBSTR( A.BADAT, 0, 6 ) AS MONTH,
                        COUNT(*) AS TOTAL_PR
                    FROM
                        TB_EBAN_TRACKING A
                        INNER JOIN TB_PR_APPROVE E ON A.BANFN = E.BANFN
                    WHERE
                        A.BADAT LIKE '$year%' 
                        AND A.BSART IN ($doctypepr)
                    GROUP BY
                        SUBSTR( A.BADAT, 0, 6 )
                    ORDER BY
                        MONTH
                ) F 
                LEFT JOIN (
                    SELECT
                        SUBSTR( C.BEDAT, 0, 6 ) AS MONTH,
                        COUNT(*) AS TOTAL_PO
                    FROM
                        TB_STR_PO C
                        INNER JOIN TB_PO_APPROVE D ON C.EBELN = D.EBELN
                    WHERE
                        C.BEDAT LIKE '$year%' 
                        AND C.BSART IN ($doctypepo)
                    GROUP BY
                        SUBSTR( C.BEDAT, 0, 6 )
                    ORDER BY
                        MONTH
                ) B ON (F.MONTH=B.MONTH)";
        $result = $this->db->query($sql);
        return $result->result();
    }
}
