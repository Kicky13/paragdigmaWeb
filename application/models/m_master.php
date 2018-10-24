<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_master extends CI_Model {

    // <editor-fold defaultstate="collapsed" desc="MASTER EXCEL EXPORT">
    public function excel_insert_prognose($data) {
        $oracle = $this->load->database('oramso', TRUE);
        $oracle->insert('PIS_PROGNOSA_PLANT', $data);
    }

    public function excel_insert_capacity($data) {
        $oracle = $this->load->database('oramso', TRUE);
        $oracle->insert('PIS_CAPACITY_PLANT', $data);
    }

    public function excel_insert_rkapplant($data) {
        $oracle = $this->load->database('oramso', TRUE);
        $oracle->insert('PIS_RKAP_PLANT', $data);
    }

    public function get_production_tlcc($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (TO_CHAR(DATE_PROD, 'DD')) AS ID,
                                        TO_CHAR (DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (RM1_PROD, 2) AS RM1_PROD,
                                        ROUND (RM1_JOP, 2) AS RM1_JOP,
                                        ROUND (KL1_PROD, 2) AS KL1_PROD,
                                        ROUND (KL1_JOP, 2) AS KL1_JOP,
                                        ROUND (FMMP_PROD, 2) AS FMMP_PROD,
                                        ROUND (FMMP_JOP, 2) AS FMMP_JOP,
                                        ROUND (FMHCM_PROD, 2) AS FMHCM_PROD,
                                        ROUND (FMHCM_JOP, 2) AS FMHCM_JOP
                                FROM
                                        PIS_TLCC_PRODDAILY
                                WHERE
                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                UNION
                                        SELECT
                                                MAX(TO_NUMBER (TO_CHAR(DATE_PROD, 'DD')) + 2) AS ID,
                                                'TOTAL' AS DATE_PROD,
                                                ROUND (SUM (RM1_PROD), 2) AS RM1_PROD,
                                                ROUND (SUM (RM1_JOP), 2) AS RM1_JOP,
                                                ROUND (SUM (KL1_PROD), 2) AS KL1_PROD,
                                                ROUND (SUM (KL1_JOP), 2) AS KL1_JOP,
                                                ROUND (SUM (FMMP_PROD), 2) AS FMMP_PROD,
                                                ROUND (SUM (FMMP_JOP), 2) AS FMMP_JOP,
                                                ROUND (SUM (FMHCM_PROD), 2) AS FMHCM_PROD,
                                                ROUND (SUM (FMHCM_JOP), 2) AS FMHCM_JOP
                                        FROM
                                                PIS_TLCC_PRODDAILY
                                        WHERE
                                                TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ORDER BY
                                                DATE_PROD ASC");
        $Q = $Query->result_array();
        echo '{"mydata":' . json_encode($Q) . '}';
    }

    public function get_production_gresik($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (TO_CHAR(DATE_PROD, 'DD')) AS ID,
                                        TO_CHAR (DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (RM1_PROD, 2) AS RM1_PROD,
                                        ROUND (RM1_JOP, 2) AS RM1_JOP,
                                        ROUND (RM2_PROD, 2) AS RM2_PROD,
                                        ROUND (RM2_JOP, 2) AS RM2_JOP,
                                        ROUND (RM3_PROD, 2) AS RM3_PROD,
                                        ROUND (RM3_JOP, 2) AS RM3_JOP,
                                        ROUND (RM4_PROD, 2) AS RM4_PROD,
                                        ROUND (RM4_JOP, 2) AS RM4_JOP,
                                        ROUND (KL1_PROD, 2) AS KL1_PROD,
                                        ROUND (KL1_JOP, 2) AS KL1_JOP,
                                        ROUND (KL2_PROD, 2) AS KL2_PROD,
                                        ROUND (KL2_JOP, 2) AS KL2_JOP,
                                        ROUND (KL3_PROD, 2) AS KL3_PROD,
                                        ROUND (KL3_JOP, 2) AS KL3_JOP,
                                        ROUND (KL4_PROD, 2) AS KL4_PROD,
                                        ROUND (KL4_JOP, 2) AS KL4_JOP,
                                        ROUND (FM1_PROD, 2) AS FM1_PROD,
                                        ROUND (FM1_JOP, 2) AS FM1_JOP,
                                        ROUND (FM2_PROD, 2) AS FM2_PROD,
                                        ROUND (FM2_JOP, 2) AS FM2_JOP,
                                        ROUND (FM3_PROD, 2) AS FM3_PROD,
                                        ROUND (FM3_JOP, 2) AS FM3_JOP,
                                        ROUND (FM4_PROD, 2) AS FM4_PROD,
                                        ROUND (FM4_JOP, 2) AS FM4_JOP,
                                        ROUND (FM5_PROD, 2) AS FM5_PROD,
                                        ROUND (FM5_JOP, 2) AS FM5_JOP,
                                        ROUND (FM6_PROD, 2) AS FM6_PROD,
                                        ROUND (FM6_JOP, 2) AS FM6_JOP,
                                        ROUND (FM7_PROD, 2) AS FM7_PROD,
                                        ROUND (FM7_JOP, 2) AS FM7_JOP,
                                        ROUND (FM8_PROD, 2) AS FM8_PROD,
                                        ROUND (FM8_JOP, 2) AS FM8_JOP,
                                        ROUND (FM9_PROD, 2) AS FM9_PROD,
                                        ROUND (FM9_JOP, 2) AS FM9_JOP,
                                        ROUND (FMA_PROD, 2) AS FMA_PROD,
                                        ROUND (FMA_JOP, 2) AS FMA_JOP,
                                        ROUND (FMB_PROD, 2) AS FMB_PROD,
                                        ROUND (FMB_JOP, 2) AS FMB_JOP,
                                        ROUND (FMC_PROD, 2) AS FMC_PROD,
                                        ROUND (FMC_JOP, 2) AS FMC_JOP,
                                        ROUND (FMCGD_PROD, 2) AS FMCGD_PROD,
                                        ROUND (FMCGD_JOP, 2) AS FMCGD_JOP
                                FROM
                                        PIS_SG_PRODDAILY
                                WHERE
                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                UNION
                                        SELECT
                                                MAX (
                                                        TO_NUMBER (TO_CHAR(DATE_PROD, 'DD')) + 2
                                                ) AS ID,
                                                'TOTAL' AS DATE_PROD,
                                                ROUND (SUM(RM1_PROD), 2) AS RM1_PROD,
                                                ROUND (SUM(RM1_JOP), 2) AS RM1_JOP,
                                                ROUND (SUM(RM2_PROD), 2) AS RM2_PROD,
                                                ROUND (SUM(RM2_JOP), 2) AS RM2_JOP,
                                                ROUND (SUM(RM3_PROD), 2) AS RM3_PROD,
                                                ROUND (SUM(RM3_JOP), 2) AS RM3_JOP,
                                                ROUND (SUM(RM4_PROD), 2) AS RM4_PROD,
                                                ROUND (SUM(RM4_JOP), 2) AS RM4_JOP,
                                                ROUND (SUM(KL1_PROD), 2) AS KL1_PROD,
                                                ROUND (SUM(KL1_JOP), 2) AS KL1_JOP,
                                                ROUND (SUM(KL2_PROD), 2) AS KL2_PROD,
                                                ROUND (SUM(KL2_JOP), 2) AS KL2_JOP,
                                                ROUND (SUM(KL3_PROD), 2) AS KL3_PROD,
                                                ROUND (SUM(KL3_JOP), 2) AS KL3_JOP,
                                                ROUND (SUM(KL4_PROD), 2) AS KL4_PROD,
                                                ROUND (SUM(KL4_JOP), 2) AS KL4_JOP,
                                                ROUND (SUM(FM1_PROD), 2) AS FM1_PROD,
                                                ROUND (SUM(FM1_JOP), 2) AS FM1_JOP,
                                                ROUND (SUM(FM2_PROD), 2) AS FM2_PROD,
                                                ROUND (SUM(FM2_JOP), 2) AS FM2_JOP,
                                                ROUND (SUM(FM3_PROD), 2) AS FM3_PROD,
                                                ROUND (SUM(FM3_JOP), 2) AS FM3_JOP,
                                                ROUND (SUM(FM4_PROD), 2) AS FM4_PROD,
                                                ROUND (SUM(FM4_JOP), 2) AS FM4_JOP,
                                                ROUND (SUM(FM5_PROD), 2) AS FM5_PROD,
                                                ROUND (SUM(FM5_JOP), 2) AS FM5_JOP,
                                                ROUND (SUM(FM6_PROD), 2) AS FM6_PROD,
                                                ROUND (SUM(FM6_JOP), 2) AS FM6_JOP,
                                                ROUND (SUM(FM7_PROD), 2) AS FM7_PROD,
                                                ROUND (SUM(FM7_JOP), 2) AS FM7_JOP,
                                                ROUND (SUM(FM8_PROD), 2) AS FM8_PROD,
                                                ROUND (SUM(FM8_JOP), 2) AS FM8_JOP,
                                                ROUND (SUM(FM9_PROD), 2) AS FM9_PROD,
                                                ROUND (SUM(FM9_JOP), 2) AS FM9_JOP,
                                                ROUND (SUM(FMA_PROD), 2) AS FMA_PROD,
                                                ROUND (SUM(FMA_JOP), 2) AS FMA_JOP,
                                                ROUND (SUM(FMB_PROD), 2) AS FMB_PROD,
                                                ROUND (SUM(FMB_JOP), 2) AS FMB_JOP,
                                                ROUND (SUM(FMC_PROD), 2) AS FMC_PROD,
                                                ROUND (SUM(FMC_JOP), 2) AS FMC_JOP,
                                                ROUND (SUM(FMCGD_PROD), 2) AS FMCGD_PROD,
                                                ROUND (SUM(FMCGD_JOP), 2) AS FMCGD_JOP
                                        FROM
                                                PIS_SG_PRODDAILY
                                        WHERE
                                                TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ORDER BY
                                                DATE_PROD ASC");
        $Q = $Query->result_array();
        echo '{"mydata":' . json_encode($Q) . '}';
    }

    public function get_production_rembang($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (TO_CHAR(DATE_PROD, 'DD')) AS ID,
                                        TO_CHAR (DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (RM1_PROD, 2) AS RM1_PROD,
                                        ROUND (RM1_JOP, 2) AS RM1_JOP,
                                        ROUND (KL1_PROD, 2) AS KL1_PROD,
                                        ROUND (KL1_JOP, 2) AS KL1_JOP,
                                        ROUND (FM1_PROD, 2) AS FM1_PROD,
                                        ROUND (FM1_JOP, 2) AS FM1_JOP,
                                        ROUND (FM2_PROD, 2) AS FM2_PROD,
                                        ROUND (FM2_JOP, 2) AS FM2_JOP
                                FROM
                                        PIS_SGR_PRODDAILY
                                WHERE
                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                UNION
                                        SELECT
                                                MAX (
                                                        TO_NUMBER (TO_CHAR(DATE_PROD, 'DD')) + 2
                                                ) AS ID,
                                                'TOTAL' AS DATE_PROD,
                                                ROUND (SUM(RM1_PROD), 2) AS RM1_PROD,
                                                ROUND (SUM(RM1_JOP), 2) AS RM1_JOP,
                                                ROUND (SUM(KL1_PROD), 2) AS KL1_PROD,
                                                ROUND (SUM(KL1_JOP), 2) AS KL1_JOP,
                                                ROUND (SUM(FM1_PROD), 2) AS FM1_PROD,
                                                ROUND (SUM(FM1_JOP), 2) AS FM1_JOP,
                                                ROUND (SUM(FM2_PROD), 2) AS FM2_PROD,
                                                ROUND (SUM(FM2_JOP), 2) AS FM2_JOP
                                        FROM
                                                PIS_SGR_PRODDAILY
                                        WHERE
                                                TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ORDER BY
                                                DATE_PROD ASC");
        $Q = $Query->result_array();
        echo '{"mydata":' . json_encode($Q) . '}';
    }

    public function get_production_tonasa($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (TO_CHAR(DATE_PROD, 'DD')) AS ID,
                                        TO_CHAR (DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (RM2_PROD, 2) AS RM2_PROD,
                                        ROUND (RM2_JOP, 2) AS RM2_JOP,
                                        ROUND (RM3_PROD, 2) AS RM3_PROD,
                                        ROUND (RM3_JOP, 2) AS RM3_JOP,
                                        ROUND (RM41_PROD, 2) AS RM41_PROD,
                                        ROUND (RM41_JOP, 2) AS RM41_JOP,
                                        ROUND (RM42_PROD, 2) AS RM42_PROD,
                                        ROUND (RM42_JOP, 2) AS RM42_JOP,
                                        ROUND (RM5_PROD, 2) AS RM5_PROD,
                                        ROUND (RM5_JOP, 2) AS RM5_JOP,
                                        ROUND (KL2_PROD, 2) AS KL2_PROD,
                                        ROUND (KL2_JOP, 2) AS KL2_JOP,
                                        ROUND (KL3_PROD, 2) AS KL3_PROD,
                                        ROUND (KL3_JOP, 2) AS KL3_JOP,
                                        ROUND (KL4_PROD, 2) AS KL4_PROD,
                                        ROUND (KL4_JOP, 2) AS KL4_JOP,
                                        ROUND (KL5_PROD, 2) AS KL5_PROD,
                                        ROUND (KL5_JOP, 2) AS KL5_JOP,
                                        ROUND (FM2_PROD, 2) AS FM2_PROD,
                                        ROUND (FM2_JOP, 2) AS FM2_JOP,
                                        ROUND (FM3_PROD, 2) AS FM3_PROD,
                                        ROUND (FM3_JOP, 2) AS FM3_JOP,
                                        ROUND (FM41_PROD, 2) AS FM41_PROD,
                                        ROUND (FM41_JOP, 2) AS FM41_JOP,
                                        ROUND (FM42_PROD, 2) AS FM42_PROD,
                                        ROUND (FM42_JOP, 2) AS FM42_JOP,
                                        ROUND (FM51_PROD, 2) AS FM51_PROD,
                                        ROUND (FM51_JOP, 2) AS FM51_JOP,
                                        ROUND (FM52_PROD, 2) AS FM52_PROD,
                                        ROUND (FM52_JOP, 2) AS FM52_JOP
                                FROM
                                        PIS_ST_PRODDAILY
                                WHERE
                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                UNION
                                        SELECT
                                                MAX (
                                                        TO_NUMBER (TO_CHAR(DATE_PROD, 'DD')) + 2
                                                ) AS ID,
                                                'TOTAL' AS DATE_PROD,
                                                ROUND (SUM(RM2_PROD), 2) AS RM2_PROD,
                                                ROUND (SUM(RM2_JOP), 2) AS RM2_JOP,
                                                ROUND (SUM(RM3_PROD), 2) AS RM3_PROD,
                                                ROUND (SUM(RM3_JOP), 2) AS RM3_JOP,
                                                ROUND (SUM(RM41_PROD), 2) AS RM41_PROD,
                                                ROUND (SUM(RM41_JOP), 2) AS RM41_JOP,
                                                ROUND (SUM(RM42_PROD), 2) AS RM42_PROD,
                                                ROUND (SUM(RM42_JOP), 2) AS RM42_JOP,
                                                ROUND (SUM(RM5_PROD), 2) AS RM5_PROD,
                                                ROUND (SUM(RM5_JOP), 2) AS RM5_JOP,
                                                ROUND (SUM(KL2_PROD), 2) AS KL2_PROD,
                                                ROUND (SUM(KL2_JOP), 2) AS KL2_JOP,
                                                ROUND (SUM(KL3_PROD), 2) AS KL3_PROD,
                                                ROUND (SUM(KL3_JOP), 2) AS KL3_JOP,
                                                ROUND (SUM(KL4_PROD), 2) AS KL4_PROD,
                                                ROUND (SUM(KL4_JOP), 2) AS KL4_JOP,
                                                ROUND (SUM(KL5_PROD), 2) AS KL5_PROD,
                                                ROUND (SUM(KL5_JOP), 2) AS KL5_JOP,
                                                ROUND (SUM(FM2_PROD), 2) AS FM2_PROD,
                                                ROUND (SUM(FM2_JOP), 2) AS FM2_JOP,
                                                ROUND (SUM(FM3_PROD), 2) AS FM3_PROD,
                                                ROUND (SUM(FM3_JOP), 2) AS FM3_JOP,
                                                ROUND (SUM(FM41_PROD), 2) AS FM41_PROD,
                                                ROUND (SUM(FM41_JOP), 2) AS FM41_JOP,
                                                ROUND (SUM(FM42_PROD), 2) AS FM42_PROD,
                                                ROUND (SUM(FM42_JOP), 2) AS FM42_JOP,
                                                ROUND (SUM(FM51_PROD), 2) AS FM51_PROD,
                                                ROUND (SUM(FM51_JOP), 2) AS FM51_JOP,
                                                ROUND (SUM(FM52_PROD), 2) AS FM52_PROD,
                                                ROUND (SUM(FM52_JOP), 2) AS FM52_JOP
                                        FROM
                                                PIS_ST_PRODDAILY
                                        WHERE
                                                TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ORDER BY
                                                DATE_PROD ASC");
        $Q = $Query->result_array();
        echo '{"mydata":' . json_encode($Q) . '}';
    }

    public function get_production_padang($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (TO_CHAR(DATE_PROD, 'DD')) AS ID,
                                        TO_CHAR (DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (RM2_PROD, 2) AS RM2_PROD,
                                        ROUND (RM2_JOP, 2) AS RM2_JOP,
                                        ROUND (RM3_PROD, 2) AS RM3_PROD,
                                        ROUND (RM3_JOP, 2) AS RM3_JOP,
                                        ROUND (RM41_PROD, 2) AS RM41_PROD,
                                        ROUND (RM41_JOP, 2) AS RM41_JOP,
                                        ROUND (RM42_PROD, 2) AS RM42_PROD,
                                        ROUND (RM42_JOP, 2) AS RM42_JOP,
                                        ROUND (RM51_PROD, 2) AS RM51_PROD,
                                        ROUND (RM51_JOP, 2) AS RM51_JOP,
                                        ROUND (RM52_PROD, 2) AS RM52_PROD,
                                        ROUND (RM52_JOP, 2) AS RM52_JOP,
                                        ROUND (RM6_PROD, 2) AS RM6_PROD,
                                        ROUND (RM6_JOP, 2) AS RM6_JOP,
                                        ROUND (KL2_PROD, 2) AS KL2_PROD,
                                        ROUND (KL2_JOP, 2) AS KL2_JOP,
                                        ROUND (KL3_PROD, 2) AS KL3_PROD,
                                        ROUND (KL3_JOP, 2) AS KL3_JOP,
                                        ROUND (KL4_PROD, 2) AS KL4_PROD,
                                        ROUND (KL4_JOP, 2) AS KL4_JOP,
                                        ROUND (KL5_PROD, 2) AS KL5_PROD,
                                        ROUND (KL5_JOP, 2) AS KL5_JOP,
                                        ROUND (KL6_PROD, 2) AS KL6_PROD,
                                        ROUND (KL6_JOP, 2) AS KL6_JOP,
                                        ROUND (FM2_PROD, 2) AS FM2_PROD,
                                        ROUND (FM2_JOP, 2) AS FM2_JOP,
                                        ROUND (FM3_PROD, 2) AS FM3_PROD,
                                        ROUND (FM3_JOP, 2) AS FM3_JOP,
                                        ROUND (FM41_PROD, 2) AS FM41_PROD,
                                        ROUND (FM41_JOP, 2) AS FM41_JOP,
                                        ROUND (FM42_PROD, 2) AS FM42_PROD,
                                        ROUND (FM42_JOP, 2) AS FM42_JOP,
                                        ROUND (FM51_PROD, 2) AS FM51_PROD,
                                        ROUND (FM51_JOP, 2) AS FM51_JOP,
                                        ROUND (FM52_PROD, 2) AS FM52_PROD,
                                        ROUND (FM52_JOP, 2) AS FM52_JOP,
                                        ROUND (FMDM_PROD, 2) AS FMDM_PROD,
                                        ROUND (FMDM_JOP, 2) AS FMDM_JOP,
                                        ROUND (FM61_PROD, 2) AS FM61_PROD,
                                        ROUND (FM61_JOP, 2) AS FM61_JOP
                                FROM
                                        PIS_SP_PRODDAILY
                                WHERE
                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                UNION
                                        SELECT
                                                MAX (
                                                        TO_NUMBER (TO_CHAR(DATE_PROD, 'DD')) + 2
                                                ) AS ID,
                                                'TOTAL' AS DATE_PROD,
                                                ROUND (SUM(RM2_PROD), 2) AS RM2_PROD,
                                                ROUND (SUM(RM2_JOP), 2) AS RM2_JOP,
                                                ROUND (SUM(RM3_PROD), 2) AS RM3_PROD,
                                                ROUND (SUM(RM3_JOP), 2) AS RM3_JOP,
                                                ROUND (SUM(RM41_PROD), 2) AS RM41_PROD,
                                                ROUND (SUM(RM41_JOP), 2) AS RM41_JOP,
                                                ROUND (SUM(RM42_PROD), 2) AS RM42_PROD,
                                                ROUND (SUM(RM42_JOP), 2) AS RM42_JOP,
                                                ROUND (SUM(RM51_PROD), 2) AS RM51_PROD,
                                                ROUND (SUM(RM51_JOP), 2) AS RM51_JOP,
                                                ROUND (SUM(RM52_PROD), 2) AS RM52_PROD,
                                                ROUND (SUM(RM52_JOP), 2) AS RM52_JOP,
                                                ROUND (SUM(RM6_PROD), 2) AS RM6_PROD,
                                                ROUND (SUM(RM6_JOP), 2) AS RM6_JOP,
                                                ROUND (SUM(KL2_PROD), 2) AS KL2_PROD,
                                                ROUND (SUM(KL2_JOP), 2) AS KL2_JOP,
                                                ROUND (SUM(KL3_PROD), 2) AS KL3_PROD,
                                                ROUND (SUM(KL3_JOP), 2) AS KL3_JOP,
                                                ROUND (SUM(KL4_PROD), 2) AS KL4_PROD,
                                                ROUND (SUM(KL4_JOP), 2) AS KL4_JOP,
                                                ROUND (SUM(KL5_PROD), 2) AS KL5_PROD,
                                                ROUND (SUM(KL5_JOP), 2) AS KL5_JOP,
                                                ROUND (SUM(KL6_PROD), 2) AS KL6_PROD,
                                                ROUND (SUM(KL6_JOP), 2) AS KL6_JOP,
                                                ROUND (SUM(FM2_PROD), 2) AS FM2_PROD,
                                                ROUND (SUM(FM2_JOP), 2) AS FM2_JOP,
                                                ROUND (SUM(FM3_PROD), 2) AS FM3_PROD,
                                                ROUND (SUM(FM3_JOP), 2) AS FM3_JOP,
                                                ROUND (SUM(FM41_PROD), 2) AS FM41_PROD,
                                                ROUND (SUM(FM41_JOP), 2) AS FM41_JOP,
                                                ROUND (SUM(FM42_PROD), 2) AS FM42_PROD,
                                                ROUND (SUM(FM42_JOP), 2) AS FM42_JOP,
                                                ROUND (SUM(FM51_PROD), 2) AS FM51_PROD,
                                                ROUND (SUM(FM51_JOP), 2) AS FM51_JOP,
                                                ROUND (SUM(FM52_PROD), 2) AS FM52_PROD,
                                                ROUND (SUM(FM52_JOP), 2) AS FM52_JOP,
                                                ROUND (SUM(FMDM_PROD), 2) AS FMDM_PROD,
                                                ROUND (SUM(FMDM_JOP), 2) AS FMDM_JOP,
                                                ROUND (SUM(FM61_PROD), 2) AS FM61_PROD,
                                                ROUND (SUM(FM61_JOP), 2) AS FM61_JOP
                                        FROM
                                                PIS_SP_PRODDAILY
                                        WHERE
                                                TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ORDER BY
                                                DATE_PROD ASC");
        $Q = $Query->result_array();
        echo '{"mydata":' . json_encode($Q) . '}';
    }

    // </editor-fold>
    // <editor-fold defaultstate="collapsed" desc="MASTER Capacity Per Opco">
    public function get_capacity($company, $plant2, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT BULAN AS ID,
                                        BULAN,
                                        CEMENT,
                                        CLINKER,
                                        RKAP_CEMENT,
                                        RKAP_CLINKER
                                FROM PIS_CAPACITY_PLANT
                                WHERE COMPANY = $company
                                AND PLANT = '$plant2'
                                AND TAHUN = $tahun");
        $Q = $Query->result_array();
        echo '{"mydata":' . json_encode($Q) . '}';
    }

    public function save_capacity($plant, $company) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $id = $this->input->post('id');
        $year = $this->input->post('year');

        if ($data) {
            $oracle->query("DELETE FROM PIS_CAPACITY_PLANT WHERE PLANT = '" . $plant . "' AND COMPANY = '" . $company . "' AND TAHUN = $year");
            for ($i = 2; $i < (count($data) - 1); $i++) {
                $str_rep = array(",", ".", " ", "-");

                $newcol = array(
                    'BULAN' => $data[$i][0],
                    'CEMENT' => str_replace($str_rep, "", $data[$i][1]),
                    'CLINKER' => str_replace($str_rep, "", $data[$i][2]),
                    'RKAP_CEMENT' => str_replace($str_rep, "", $data[$i][3]),
                    'RKAP_CLINKER' => str_replace($str_rep, "", $data[$i][4]),
                    'COMPANY' => $company,
                    'PLANT' => $plant,
                    'TAHUN' => $year
                );
                $oracle->insert('PIS_CAPACITY_PLANT', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'BULAN',
                1 => 'CEMENT',
                2 => 'CLINKER',
                3 => 'RKAP_CEMENT',
                4 => 'RKAP_CLINKER'
            );
            foreach ($changes as $row) {
                $str_rep = array(",", ".", " ", "-");

                $oracle->set($col[$row[1]], str_replace($str_rep, "", $row[3]));
                $oracle->where('COMPANY', $company);
                $oracle->where('BULAN', $id);
                $oracle->where('PLANT', $plant);
                $oracle->where('TAHUN', $year);
                $oracle->update('PIS_CAPACITY_PLANT');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    // </editor-fold>
    // <editor-fold defaultstate="collapsed" desc="MASTER Prognose Per Opco (OLD Version)">
    public function get_prognose($company, $plant2, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT BULAN AS ID,
                                        TAHUN,
                                        COMPANY,
                                        PLANT_DESC,
                                        BULAN,
                                        CEMENT,
                                        CLINKER
                                FROM PIS_PROGNOSA_PLANT
                                WHERE COMPANY = $company
                                AND PLANT = '$plant2'
                                AND TAHUN = $tahun");
        $Q = $Query->result_array();
        echo '{"mydata":' . json_encode($Q) . '}';
    }

    public function save_prognose($plant, $company) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $id = $this->input->post('id');
        $year = $this->input->post('year');


        if ($data) {
            $oracle->query("DELETE FROM PIS_PROGNOSA_PLANT WHERE PLANT = '" . $plant . "' AND COMPANY = '" . $company . "'  AND TAHUN = $year");
            for ($i = 2; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => $data[$i][0],
                    'PLANT_DESC' => $data[$i][1],
                    'BULAN' => $data[$i][3],
                    'CEMENT' => $data[$i][4],
                    'CLINKER' => $data[$i][5],
                    'PLANT' => $plant,
                    'TAHUN' => $year
                );
                $oracle->insert('PIS_PROGNOSA_PLANT', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'COMPANY',
                1 => 'PLANT_DESC',
                2 => 'TAHUN',
                3 => 'BULAN',
                4 => 'CEMENT',
                5 => 'CLINKER'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', $company);
                $oracle->where('BULAN', $id);
                $oracle->where('PLANT', $plant);
                $oracle->where('TAHUN', $year);
                $oracle->update('PIS_PROGNOSA_PLANT');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    // </editor-fold>
    // <editor-fold defaultstate="collapsed" desc="MASTER RKAP Per Plant">
    public function get_rkap_plant($company, $plant2, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT BULAN AS ID,
                                        BULAN,
                                        CEMENT,
                                        CLINKER,
                                        FINECOAL,
                                        LIMESTONE,
                                        RAWMIX,
                                        SILICA
                                FROM PIS_RKAP_PLANT
                                WHERE COMPANY = $company
                                AND PLANT = '$plant2'
                                AND TAHUN = $tahun");
        $Q = $Query->result_array();
        echo '{"mydata":' . json_encode($Q) . '}';
    }

    public function save_rkap_plant($company, $plant) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $id = $this->input->post('id');
        $year = $this->input->post('year');

        if ($data) {
            $oracle->query("DELETE FROM PIS_RKAP_PLANT WHERE PLANT = '" . $plant . "' AND COMPANY = '" . $company . "' AND TAHUN = $year");
            for ($i = 2; $i < (count($data) - 1); $i++) {
                $str_rep = array(",", ".", " ", "-");

                $newcol = array(
                    'BULAN' => $data[$i][0],
                    'CEMENT' => str_replace($str_rep, "", $data[$i][1]),
                    'CLINKER' => str_replace($str_rep, "", $data[$i][2]),
                    'FINECOAL' => str_replace($str_rep, "", $data[$i][3]),
                    'LIMESTONE' => str_replace($str_rep, "", $data[$i][4]),
                    'RAWMIX' => str_replace($str_rep, "", $data[$i][5]),
                    'SILICA' => str_replace($str_rep, "", $data[$i][6]),
                    'PLANT' => $plant,
                    'COMPANY' => $company,
                    'TAHUN' => $year
                );
                $oracle->insert('PIS_RKAP_PLANT', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'BULAN',
                1 => 'CEMENT',
                2 => 'CLINKER',
                3 => 'FINECOAL',
                4 => 'LIMESTONE',
                5 => 'RAWMIX',
                6 => 'SILICA'
            );
            foreach ($changes as $row) {
                $str_rep = array(",", ".", " ", "-");

                $oracle->set($col[$row[1]], str_replace($str_rep, "", $row[3]));
                $oracle->where('COMPANY', $company);
                $oracle->where('BULAN', $id);
                $oracle->where('PLANT', $plant);
                $oracle->where('TAHUN', $year);
                $oracle->update('PIS_RKAP_PLANT');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    // </editor-fold>
    // <editor-fold defaultstate="collapsed" desc="MASTER RKAP Per Opco">
    public function get_rkap_total($company, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        BULAN AS ID,
                                        BULAN,
                                        CEMENT,
                                        CLINKER,
                                        FINECOAL,
                                        LIMESTONE,
                                        RAWMIX,
                                        SILICA
                                FROM PIS_RKAP_TOTAL
                                WHERE COMPANY = $company AND TAHUN = $tahun");
        $Q = $Query->result_array();
        echo '{"mydata":' . json_encode($Q) . '}';
    }

    public function save_rkap_total($company) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $id = $this->input->post('id');
        $year = $this->input->post('year');

        if ($data) {
            $oracle->query("DELETE FROM PIS_RKAP_TOTAL WHERE COMPANY = '" . $company . "' AND TAHUN = $year");
            for ($i = 2; $i < (count($data) - 1); $i++) {
                $str_rep = array(",", ".", " ", "-");

                $newcol = array(
                    'BULAN' => $data[$i][0],
                    'CEMENT' => str_replace($str_rep, "", $data[$i][1]),
                    'CLINKER' => str_replace($str_rep, "", $data[$i][2]),
                    'FINECOAL' => str_replace($str_rep, "", $data[$i][3]),
                    'LIMESTONE' => str_replace($str_rep, "", $data[$i][4]),
                    'RAWMIX' => str_replace($str_rep, "", $data[$i][5]),
                    'SILICA' => str_replace($str_rep, "", $data[$i][6]),
                    'COMPANY' => $company,
                    'TAHUN' => $year
                );
                $oracle->insert('PIS_RKAP_TOTAL', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'BULAN',
                1 => 'CEMENT',
                2 => 'CLINKER',
                3 => 'FINECOAL',
                4 => 'LIMESTONE',
                5 => 'RAWMIX',
                6 => 'SILICA'
            );

            foreach ($changes as $row) {
                $str_rep = array(",", ".", " ", "-");

                $oracle->set($col[$row[1]], str_replace($str_rep, "", $row[3]));
                $oracle->where('COMPANY', $company);
                $oracle->where('BULAN', $id);
                $oracle->where('TAHUN', $year);
                $oracle->update('PIS_RKAP_TOTAL');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    // </editor-fold>
    // <editor-fold defaultstate="collapsed" desc="Export Excel">
    public function excel_SG($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        RM1_PROD,
                                        RM1_JOP,
                                        RM2_PROD,
                                        RM2_JOP,
                                        RM3_PROD,
                                        RM3_JOP,
                                        RM4_PROD,
                                        RM4_JOP,
                                        FM1_PROD,
                                        FM1_JOP,
                                        FM2_PROD,
                                        FM2_JOP,
                                        FM3_PROD,
                                        FM3_JOP,
                                        FM4_PROD,
                                        FM4_JOP,
                                        FM5_PROD,
                                        FM5_JOP,
                                        FM6_PROD,
                                        FM6_JOP,
                                        FM7_PROD,
                                        FM7_JOP,
                                        FM8_PROD,
                                        FM8_JOP,
                                        FM9_PROD,
                                        FM9_JOP,
                                        FMA_PROD,
                                        FMA_JOP,
                                        FMB_PROD,
                                        FMB_JOP,
                                        FMC_PROD,
                                        FMC_JOP
                                FROM
                                        PIS_SG_PRODDAILY
                                WHERE
                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ORDER BY DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function excel_SP($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        RM2_PROD,
                                        RM2_JOP,
                                        RM3_PROD,
                                        RM3_JOP,
                                        RM41_PROD,
                                        RM41_JOP,
                                        RM42_PROD,
                                        RM42_JOP,
                                        RM51_PROD,
                                        RM51_JOP,
                                        RM52_PROD,
                                        RM52_JOP,
                                        FM2_PROD,
                                        FM2_JOP,
                                        FM3_PROD,
                                        FM3_JOP,
                                        FM41_PROD,
                                        FM41_JOP,
                                        FM42_PROD,
                                        FM42_JOP,
                                        FM51_PROD,
                                        FM51_JOP,
                                        FM52_PROD,
                                        FM52_JOP,
                                        FMDM_PROD,
                                        FMDM_JOP
                                FROM
                                        PIS_SP_PRODDAILY
                                WHERE
                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ORDER BY DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function excel_ST($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        RM2_PROD,
                                        RM2_JOP,
                                        RM3_PROD,
                                        RM3_JOP,
                                        RM41_PROD,
                                        RM41_JOP,
                                        RM42_PROD,
                                        RM42_JOP,
                                        RM5_PROD,
                                        RM5_JOP,
                                        FM2_PROD,
                                        FM2_JOP,
                                        FM3_PROD,
                                        FM3_JOP,
                                        FM41_PROD,
                                        FM41_JOP,
                                        FM42_PROD,
                                        FM42_JOP,
                                        FM51_PROD,
                                        FM51_JOP,
                                        FM52_PROD,
                                        FM52_JOP
                                FROM
                                        PIS_ST_PRODDAILY
                                WHERE
                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ORDER BY DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function excel_TLCC($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        RM1_PROD,
                                        RM1_JOP,
                                        FMMP_PROD,
                                        FMMP_JOP,
                                        FMHCM_PROD,
                                        FMHCM_JOP
                                FROM
                                        PIS_TLCC_PRODDAILY
                                WHERE
                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ORDER BY DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    // </editor-fold>
    // <editor-fold defaultstate="collapsed" desc="Report KILN Ops for Production Report">

    public function ops_kiln_6000_mp($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        PRD.KL1_PROD,
                                        PRD.KL1_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        KL1_PROD,
                                                        KL1_JOP
                                                FROM
                                                        PIS_TLCC_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_KILN_OPS
                                        WHERE
                                                COMPANY = 6000
                                        AND PLANT = 'mp'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function ops_kiln_7000_tb1($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        PRD.KL1_PROD,
                                        PRD.KL1_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        KL1_PROD,
                                                        KL1_JOP
                                                FROM
                                                        PIS_SG_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_KILN_OPS
                                        WHERE
                                                COMPANY = 7000
                                        AND PLANT = 'tbn1'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function ops_kiln_7000_tb2($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        PRD.KL2_PROD,
                                        PRD.KL2_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        KL2_PROD,
                                                        KL2_JOP
                                                FROM
                                                        PIS_SG_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_KILN_OPS
                                        WHERE
                                                COMPANY = 7000
                                        AND PLANT = 'tbn2'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function ops_kiln_7000_tb3($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        PRD.KL3_PROD,
                                        PRD.KL3_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        KL3_PROD,
                                                        KL3_JOP
                                                FROM
                                                        PIS_SG_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_KILN_OPS
                                        WHERE
                                                COMPANY = 7000
                                        AND PLANT = 'tbn3'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function ops_kiln_7000_tb4($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        PRD.KL4_PROD,
                                        PRD.KL4_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        KL4_PROD,
                                                        KL4_JOP
                                                FROM
                                                        PIS_SG_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_KILN_OPS
                                        WHERE
                                                COMPANY = 7000
                                        AND PLANT = 'tbn4'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function ops_kiln_3000_ind2($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        PRD.KL2_PROD,
                                        PRD.KL2_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        KL2_PROD,
                                                        KL2_JOP
                                                FROM
                                                        PIS_SP_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_KILN_OPS
                                        WHERE
                                                COMPANY = 3000
                                        AND PLANT = 'ind2'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function ops_kiln_3000_ind3($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        PRD.KL3_PROD,
                                        PRD.KL3_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        KL3_PROD,
                                                        KL3_JOP
                                                FROM
                                                        PIS_SP_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_KILN_OPS
                                        WHERE
                                                COMPANY = 3000
                                        AND PLANT = 'ind3'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function ops_kiln_3000_ind4($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        PRD.KL4_PROD,
                                        PRD.KL4_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        KL4_PROD,
                                                        KL4_JOP
                                                FROM
                                                        PIS_SP_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_KILN_OPS
                                        WHERE
                                                COMPANY = 3000
                                        AND PLANT = 'ind4'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function ops_kiln_3000_ind5($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        PRD.KL5_PROD,
                                        PRD.KL5_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        KL5_PROD,
                                                        KL5_JOP
                                                FROM
                                                        PIS_SP_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_KILN_OPS
                                        WHERE
                                                COMPANY = 3000
                                        AND PLANT = 'ind5'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function ops_kiln_4000_tns2($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        PRD.KL2_PROD,
                                        PRD.KL2_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        KL2_PROD,
                                                        KL2_JOP
                                                FROM
                                                        PIS_ST_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_KILN_OPS
                                        WHERE
                                                COMPANY = 4000
                                        AND PLANT = 'tns2'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function ops_kiln_4000_tns3($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        PRD.KL3_PROD,
                                        PRD.KL3_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        KL3_PROD,
                                                        KL3_JOP
                                                FROM
                                                        PIS_ST_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_KILN_OPS
                                        WHERE
                                                COMPANY = 4000
                                        AND PLANT = 'tns3'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function ops_kiln_4000_tns4($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        PRD.KL4_PROD,
                                        PRD.KL4_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        KL4_PROD,
                                                        KL4_JOP
                                                FROM
                                                        PIS_ST_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_KILN_OPS
                                        WHERE
                                                COMPANY = 4000
                                        AND PLANT = 'tns4'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function ops_kiln_4000_tns5($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        PRD.KL5_PROD,
                                        PRD.KL5_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        KL5_PROD,
                                                        KL5_JOP
                                                FROM
                                                        PIS_ST_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_KILN_OPS
                                        WHERE
                                                COMPANY = 4000
                                        AND PLANT = 'tns5'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    // </editor-fold>
    // <editor-fold defaultstate="collapsed" desc="KILN OPERATIONS">

    public function add_ops_kiln_6000_mp($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.KL1_PROD, 2) AS KL_PROD,
                                        PRD.KL1_JOP AS KL_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        KL1_PROD,
                                                        KL1_JOP
                                                FROM
                                                        PIS_TLCC_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_KILN_OPS
                                        WHERE
                                                COMPANY = 6000
                                        AND PLANT = 'mp'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_ops_kiln_6000_mp($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

        if ($data) {// && $count == 0
            $oracle->query("DELETE FROM PIS_KILN_OPS WHERE TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 6000,
                    'PLANT' => 'mp',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_KILN_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 6000);
                $oracle->where('PLANT', 'mp');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_KILN_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_ops_kiln_7000_tb1($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.KL1_PROD, 2) AS KL_PROD,
                                        PRD.KL1_JOP AS KL_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        KL1_PROD,
                                                        KL1_JOP
                                                FROM
                                                        PIS_SG_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_KILN_OPS
                                        WHERE
                                                COMPANY = 7000
                                        AND PLANT = 'tbn1'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_ops_kiln_7000_tb1($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_KILN_OPS WHERE COMPANY = 7000 AND PLANT = 'tbn1' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 7000,
                    'PLANT' => 'tbn1',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_KILN_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 7000);
                $oracle->where('PLANT', 'tbn1');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_KILN_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_ops_kiln_7000_tb2($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.KL2_PROD, 2) AS KL_PROD,
                                        PRD.KL2_JOP AS KL_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        KL2_PROD,
                                                        KL2_JOP
                                                FROM
                                                        PIS_SG_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_KILN_OPS
                                        WHERE
                                                COMPANY = 7000
                                        AND PLANT = 'tbn2'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_ops_kiln_7000_tb2($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_KILN_OPS WHERE COMPANY = 7000 AND PLANT = 'tbn2' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 7000,
                    'PLANT' => 'tbn2',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_KILN_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 7000);
                $oracle->where('PLANT', 'tbn2');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_KILN_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_ops_kiln_7000_tb3($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.KL3_PROD, 2) AS KL_PROD,
                                        PRD.KL3_JOP AS KL_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        KL3_PROD,
                                                        KL3_JOP
                                                FROM
                                                        PIS_SG_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_KILN_OPS
                                        WHERE
                                                COMPANY = 7000
                                        AND PLANT = 'tbn3'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_ops_kiln_7000_tb3($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_KILN_OPS WHERE COMPANY = 7000 AND PLANT = 'tbn3' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 7000,
                    'PLANT' => 'tbn3',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_KILN_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 7000);
                $oracle->where('PLANT', 'tbn3');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_KILN_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_ops_kiln_7000_tb4($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.KL4_PROD, 2) AS KL_PROD,
                                        PRD.KL4_JOP AS KL_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        KL4_PROD,
                                                        KL4_JOP
                                                FROM
                                                        PIS_SG_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_KILN_OPS
                                        WHERE
                                                COMPANY = 7000
                                        AND PLANT = 'tbn4'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_ops_kiln_7000_tb4($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_KILN_OPS WHERE COMPANY = 7000 AND PLANT = 'tbn4' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 7000,
                    'PLANT' => 'tbn4',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_KILN_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 7000);
                $oracle->where('PLANT', 'tbn4');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_KILN_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_ops_kiln_3000_ind2($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.KL2_PROD, 2) AS KL_PROD,
                                        PRD.KL2_JOP AS KL_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        KL2_PROD,
                                                        KL2_JOP
                                                FROM
                                                        PIS_SP_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_KILN_OPS
                                        WHERE
                                                COMPANY = 3000
                                        AND PLANT = 'ind2'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_ops_kiln_3000_ind2($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_KILN_OPS WHERE COMPANY = 3000 AND PLANT = 'ind2' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 3000,
                    'PLANT' => 'ind2',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_KILN_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 3000);
                $oracle->where('PLANT', 'ind2');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_KILN_OPS');
            }
        }
//        echo $oracle->last_query();
        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_ops_kiln_3000_ind3($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.KL3_PROD, 2) AS KL_PROD,
                                        PRD.KL3_JOP AS KL_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        KL3_PROD,
                                                        KL3_JOP
                                                FROM
                                                        PIS_SP_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_KILN_OPS
                                        WHERE
                                                COMPANY = 3000
                                        AND PLANT = 'ind3'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_ops_kiln_3000_ind3($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_KILN_OPS WHERE COMPANY = 3000 AND PLANT = 'ind3' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 3000,
                    'PLANT' => 'ind3',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_KILN_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 3000);
                $oracle->where('PLANT', 'ind3');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_KILN_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_ops_kiln_3000_ind4($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.KL4_PROD, 2) AS KL_PROD,
                                        PRD.KL4_JOP AS KL_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        KL4_PROD,
                                                        KL4_JOP
                                                FROM
                                                        PIS_SP_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_KILN_OPS
                                        WHERE
                                                COMPANY = 3000
                                        AND PLANT = 'ind4'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_ops_kiln_3000_ind4($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_KILN_OPS WHERE COMPANY = 3000 AND PLANT = 'ind4' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 3000,
                    'PLANT' => 'ind4',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_KILN_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 3000);
                $oracle->where('PLANT', 'ind4');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_KILN_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_ops_kiln_3000_ind5($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.KL5_PROD, 2) AS KL_PROD,
                                        PRD.KL5_JOP AS KL_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        KL5_PROD,
                                                        KL5_JOP
                                                FROM
                                                        PIS_SP_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_KILN_OPS
                                        WHERE
                                                COMPANY = 3000
                                        AND PLANT = 'ind5'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_ops_kiln_3000_ind5($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_KILN_OPS WHERE COMPANY = 3000 AND PLANT = 'ind5' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 3000,
                    'PLANT' => 'ind5',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_KILN_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 3000);
                $oracle->where('PLANT', 'ind5');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_KILN_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_ops_kiln_4000_tns2($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.KL2_PROD, 2) AS KL_PROD,
                                        PRD.KL2_JOP AS KL_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        KL2_PROD,
                                                        KL2_JOP
                                                FROM
                                                        PIS_ST_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_KILN_OPS
                                        WHERE
                                                COMPANY = 4000
                                        AND PLANT = 'tns2'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_ops_kiln_4000_tns2($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_KILN_OPS WHERE COMPANY = 4000 AND PLANT = 'tns2' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 4000,
                    'PLANT' => 'tns2',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_KILN_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 4000);
                $oracle->where('PLANT', 'tns2');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_KILN_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_ops_kiln_4000_tns3($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.KL3_PROD, 2) AS KL_PROD,
                                        PRD.KL3_JOP AS KL_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        KL3_PROD,
                                                        KL3_JOP
                                                FROM
                                                        PIS_ST_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_KILN_OPS
                                        WHERE
                                                COMPANY = 4000
                                        AND PLANT = 'tns3'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_ops_kiln_4000_tns3($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_KILN_OPS WHERE COMPANY = 4000 AND PLANT = 'tns3' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 4000,
                    'PLANT' => 'tns3',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_KILN_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 4000);
                $oracle->where('PLANT', 'tns3');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_KILN_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_ops_kiln_4000_tns4($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.KL4_PROD, 2) AS KL_PROD,
                                        PRD.KL4_JOP AS KL_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        KL4_PROD,
                                                        KL4_JOP
                                                FROM
                                                        PIS_ST_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_KILN_OPS
                                        WHERE
                                                COMPANY = 4000
                                        AND PLANT = 'tns4'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_ops_kiln_4000_tns4($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_KILN_OPS WHERE COMPANY = 4000 AND PLANT = 'tns4' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 4000,
                    'PLANT' => 'tns4',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_KILN_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 4000);
                $oracle->where('PLANT', 'tns4');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_KILN_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_ops_kiln_4000_tns5($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.KL5_PROD, 2) AS KL_PROD,
                                        PRD.KL5_JOP AS KL_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        KL5_PROD,
                                                        KL5_JOP
                                                FROM
                                                        PIS_ST_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_KILN_OPS
                                        WHERE
                                                COMPANY = 4000
                                        AND PLANT = 'tns5'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_ops_kiln_4000_tns5($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_KILN_OPS WHERE COMPANY = 4000 AND PLANT = 'tns5' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 4000,
                    'PLANT' => 'tns5',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_KILN_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 4000);
                $oracle->where('PLANT', 'tns5');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_KILN_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    // </editor-fold>
    // <editor-fold defaultstate="collapsed" desc="FINISH MILL OPERATIONS">
    //TLCC
    public function add_fm_ops_6000_mp($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.FMMP_PROD, 2) AS FM_PROD,
                                        PRD.FMMP_JOP AS FM_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        FMMP_PROD,
                                                        FMMP_JOP
                                                FROM
                                                        PIS_TLCC_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_FM_OPS
                                        WHERE
                                                COMPANY = 6000
                                        AND PLANT = 'mp'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_fm_ops_6000_mp($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_FM_OPS WHERE COMPANY = 6000 AND PLANT = 'mp' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 6000,
                    'PLANT' => 'mp',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_FM_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 6000);
                $oracle->where('PLANT', 'mp');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_FM_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_fm_ops_6000_hcm($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.FMHCM_PROD, 2) AS FM_PROD,
                                        PRD.FMHCM_JOP AS FM_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        FMHCM_PROD,
                                                        FMHCM_JOP
                                                FROM
                                                        PIS_TLCC_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_FM_OPS
                                        WHERE
                                                COMPANY = 6000
                                        AND PLANT = 'hcm'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_fm_ops_6000_hcm($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_FM_OPS WHERE COMPANY = 6000 AND PLANT = 'hcm' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 6000,
                    'PLANT' => 'hcm',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_FM_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 6000);
                $oracle->where('PLANT', 'hcm');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_FM_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    //Semen Padang
    public function add_fm_ops_3000_ind2($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.FM2_PROD, 2) AS FM_PROD,
                                        PRD.FM2_JOP AS FM_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        FM2_PROD,
                                                        FM2_JOP
                                                FROM
                                                        PIS_SP_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_FM_OPS
                                        WHERE
                                                COMPANY = 3000
                                        AND PLANT = 'ind2'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_fm_ops_3000_ind2($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_FM_OPS WHERE COMPANY = 3000 AND PLANT = 'ind2' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 3000,
                    'PLANT' => 'ind2',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_FM_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 3000);
                $oracle->where('PLANT', 'ind2');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_FM_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_fm_ops_3000_ind3($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.FM3_PROD, 2) AS FM_PROD,
                                        PRD.FM3_JOP AS FM_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        FM3_PROD,
                                                        FM3_JOP
                                                FROM
                                                        PIS_SP_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_FM_OPS
                                        WHERE
                                                COMPANY = 3000
                                        AND PLANT = 'ind3'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_fm_ops_3000_ind3($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_FM_OPS WHERE COMPANY = 3000 AND PLANT = 'ind3' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 3000,
                    'PLANT' => 'ind3',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_FM_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 3000);
                $oracle->where('PLANT', 'ind3');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_FM_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_fm_ops_3000_ind41($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.FM41_PROD, 2) AS FM_PROD,
                                        PRD.FM41_JOP AS FM_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        FM41_PROD,
                                                        FM41_JOP
                                                FROM
                                                        PIS_SP_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_FM_OPS
                                        WHERE
                                                COMPANY = 3000
                                        AND PLANT = 'ind41'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_fm_ops_3000_ind41($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_FM_OPS WHERE COMPANY = 3000 AND PLANT = 'ind41' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 3000,
                    'PLANT' => 'ind41',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_FM_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 3000);
                $oracle->where('PLANT', 'ind41');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_FM_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_fm_ops_3000_ind42($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.FM42_PROD, 2) AS FM_PROD,
                                        PRD.FM42_JOP AS FM_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        FM42_PROD,
                                                        FM42_JOP
                                                FROM
                                                        PIS_SP_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_FM_OPS
                                        WHERE
                                                COMPANY = 3000
                                        AND PLANT = 'ind42'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_fm_ops_3000_ind42($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_FM_OPS WHERE COMPANY = 3000 AND PLANT = 'ind42' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 3000,
                    'PLANT' => 'ind42',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_FM_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 3000);
                $oracle->where('PLANT', 'ind42');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_FM_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_fm_ops_3000_ind51($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.FM51_PROD, 2) AS FM_PROD,
                                        PRD.FM51_JOP AS FM_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        FM51_PROD,
                                                        FM51_JOP
                                                FROM
                                                        PIS_SP_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_FM_OPS
                                        WHERE
                                                COMPANY = 3000
                                        AND PLANT = 'ind51'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_fm_ops_3000_ind51($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_FM_OPS WHERE COMPANY = 3000 AND PLANT = 'ind51' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 3000,
                    'PLANT' => 'ind51',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_FM_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 3000);
                $oracle->where('PLANT', 'ind51');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_FM_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_fm_ops_3000_ind52($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.FM52_PROD, 2) AS FM_PROD,
                                        PRD.FM52_JOP AS FM_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        FM52_PROD,
                                                        FM52_JOP
                                                FROM
                                                        PIS_SP_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_FM_OPS
                                        WHERE
                                                COMPANY = 3000
                                        AND PLANT = 'ind52'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_fm_ops_3000_ind52($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_FM_OPS WHERE COMPANY = 3000 AND PLANT = 'ind52' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 3000,
                    'PLANT' => 'ind52',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_FM_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 3000);
                $oracle->where('PLANT', 'ind52');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_FM_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_fm_ops_3000_dmi($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.FMDM_PROD, 2) AS FM_PROD,
                                        PRD.FMDM_JOP AS FM_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        FMDM_PROD,
                                                        FMDM_JOP
                                                FROM
                                                        PIS_SP_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_FM_OPS
                                        WHERE
                                                COMPANY = 3000
                                        AND PLANT = 'dmi'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_fm_ops_3000_dmi($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_FM_OPS WHERE COMPANY = 3000 AND PLANT = 'dmi' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 3000,
                    'PLANT' => 'dmi',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_FM_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 3000);
                $oracle->where('PLANT', 'dmi');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_FM_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    //Semen Tonasa
    public function add_fm_ops_4000_tns2($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.FM2_PROD, 2) AS FM_PROD,
                                        PRD.FM2_JOP AS FM_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        FM2_PROD,
                                                        FM2_JOP
                                                FROM
                                                        PIS_ST_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_FM_OPS
                                        WHERE
                                                COMPANY = 4000
                                        AND PLANT = 'tns2'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_fm_ops_4000_tns2($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_FM_OPS WHERE COMPANY = 4000 AND PLANT = 'tns2' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 4000,
                    'PLANT' => 'tns2',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_FM_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 4000);
                $oracle->where('PLANT', 'tns2');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_FM_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_fm_ops_4000_tns3($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.FM3_PROD, 2) AS FM_PROD,
                                        PRD.FM3_JOP AS FM_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        FM3_PROD,
                                                        FM3_JOP
                                                FROM
                                                        PIS_ST_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_FM_OPS
                                        WHERE
                                                COMPANY = 4000
                                        AND PLANT = 'tns3'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_fm_ops_4000_tns3($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_FM_OPS WHERE COMPANY = 4000 AND PLANT = 'tns3' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 4000,
                    'PLANT' => 'tns3',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_FM_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 4000);
                $oracle->where('PLANT', 'tns3');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_FM_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_fm_ops_4000_tns41($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.FM41_PROD, 2) AS FM_PROD,
                                        PRD.FM41_JOP AS FM_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        FM41_PROD,
                                                        FM41_JOP
                                                FROM
                                                        PIS_ST_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_FM_OPS
                                        WHERE
                                                COMPANY = 4000
                                        AND PLANT = 'tns41'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_fm_ops_4000_tns41($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_FM_OPS WHERE COMPANY = 4000 AND PLANT = 'tns41' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 4000,
                    'PLANT' => 'tns41',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_FM_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 4000);
                $oracle->where('PLANT', 'tns41');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_FM_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_fm_ops_4000_tns42($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.FM42_PROD, 2) AS FM_PROD,
                                        PRD.FM42_JOP AS FM_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        FM42_PROD,
                                                        FM42_JOP
                                                FROM
                                                        PIS_ST_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_FM_OPS
                                        WHERE
                                                COMPANY = 4000
                                        AND PLANT = 'tns42'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_fm_ops_4000_tns42($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_FM_OPS WHERE COMPANY = 4000 AND PLANT = 'tns42' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 4000,
                    'PLANT' => 'tns42',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_FM_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 4000);
                $oracle->where('PLANT', 'tns42');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_FM_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_fm_ops_4000_tns51($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.FM51_PROD, 2) AS FM_PROD,
                                        PRD.FM51_JOP AS FM_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        FM51_PROD,
                                                        FM51_JOP
                                                FROM
                                                        PIS_ST_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_FM_OPS
                                        WHERE
                                                COMPANY = 4000
                                        AND PLANT = 'tns51'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_fm_ops_4000_tns51($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_FM_OPS WHERE COMPANY = 4000 AND PLANT = 'tns51' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 4000,
                    'PLANT' => 'tns51',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_FM_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 4000);
                $oracle->where('PLANT', 'tns51');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_FM_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_fm_ops_4000_tns52($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.FM52_PROD, 2) AS FM_PROD,
                                        PRD.FM52_JOP AS FM_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        FM52_PROD,
                                                        FM52_JOP
                                                FROM
                                                        PIS_ST_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_FM_OPS
                                        WHERE
                                                COMPANY = 4000
                                        AND PLANT = 'tns52'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_fm_ops_4000_tns52($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_FM_OPS WHERE COMPANY = 4000 AND PLANT = 'tns52' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 4000,
                    'PLANT' => 'tns52',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_FM_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 4000);
                $oracle->where('PLANT', 'tns52');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_FM_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    //Semen Gresik
    public function add_fm_ops_7000_tbn1($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.FM1_PROD, 2) AS FM_PROD,
                                        PRD.FM1_JOP AS FM_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        FM1_PROD,
                                                        FM1_JOP
                                                FROM
                                                        PIS_SG_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_FM_OPS
                                        WHERE
                                                COMPANY = 7000
                                        AND PLANT = 'tbn1'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_fm_ops_7000_tbn1($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_FM_OPS WHERE COMPANY = 7000 AND PLANT = 'tbn1' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 7000,
                    'PLANT' => 'tbn1',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_FM_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 7000);
                $oracle->where('PLANT', 'tbn1');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_FM_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_fm_ops_7000_tbn2($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.FM2_PROD, 2) AS FM_PROD,
                                        PRD.FM2_JOP AS FM_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        FM2_PROD,
                                                        FM2_JOP
                                                FROM
                                                        PIS_SG_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_FM_OPS
                                        WHERE
                                                COMPANY = 7000
                                        AND PLANT = 'tbn2'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_fm_ops_7000_tbn2($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_FM_OPS WHERE COMPANY = 7000 AND PLANT = 'tbn2' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 7000,
                    'PLANT' => 'tbn2',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_FM_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 7000);
                $oracle->where('PLANT', 'tbn2');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_FM_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_fm_ops_7000_tbn3($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.FM3_PROD, 2) AS FM_PROD,
                                        PRD.FM3_JOP AS FM_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        FM3_PROD,
                                                        FM3_JOP
                                                FROM
                                                        PIS_SG_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_FM_OPS
                                        WHERE
                                                COMPANY = 7000
                                        AND PLANT = 'tbn3'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_fm_ops_7000_tbn3($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_FM_OPS WHERE COMPANY = 7000 AND PLANT = 'tbn3' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 7000,
                    'PLANT' => 'tbn3',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_FM_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 7000);
                $oracle->where('PLANT', 'tbn3');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_FM_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_fm_ops_7000_tbn4($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.FM4_PROD, 2) AS FM_PROD,
                                        PRD.FM4_JOP AS FM_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        FM4_PROD,
                                                        FM4_JOP
                                                FROM
                                                        PIS_SG_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_FM_OPS
                                        WHERE
                                                COMPANY = 7000
                                        AND PLANT = 'tbn4'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_fm_ops_7000_tbn4($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_FM_OPS WHERE COMPANY = 7000 AND PLANT = 'tbn4' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 7000,
                    'PLANT' => 'tbn4',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_FM_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 7000);
                $oracle->where('PLANT', 'tbn4');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_FM_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_fm_ops_7000_tbn5($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.FM5_PROD, 2) AS FM_PROD,
                                        PRD.FM5_JOP AS FM_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        FM5_PROD,
                                                        FM5_JOP
                                                FROM
                                                        PIS_SG_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_FM_OPS
                                        WHERE
                                                COMPANY = 7000
                                        AND PLANT = 'tbn5'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_fm_ops_7000_tbn5($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_FM_OPS WHERE COMPANY = 7000 AND PLANT = 'tbn5' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 7000,
                    'PLANT' => 'tbn5',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_FM_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 7000);
                $oracle->where('PLANT', 'tbn5');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_FM_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_fm_ops_7000_tbn6($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.FM6_PROD, 2) AS FM_PROD,
                                        PRD.FM6_JOP AS FM_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        FM6_PROD,
                                                        FM6_JOP
                                                FROM
                                                        PIS_SG_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_FM_OPS
                                        WHERE
                                                COMPANY = 7000
                                        AND PLANT = 'tbn6'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_fm_ops_7000_tbn6($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_FM_OPS WHERE COMPANY = 7000 AND PLANT = 'tbn6' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 7000,
                    'PLANT' => 'tbn6',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_FM_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 7000);
                $oracle->where('PLANT', 'tbn6');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_FM_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_fm_ops_7000_tbn7($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.FM7_PROD, 2) AS FM_PROD,
                                        PRD.FM7_JOP AS FM_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        FM7_PROD,
                                                        FM7_JOP
                                                FROM
                                                        PIS_SG_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_FM_OPS
                                        WHERE
                                                COMPANY = 7000
                                        AND PLANT = 'tbn7'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_fm_ops_7000_tbn7($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_FM_OPS WHERE COMPANY = 7000 AND PLANT = 'tbn7' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 7000,
                    'PLANT' => 'tbn7',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_FM_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 7000);
                $oracle->where('PLANT', 'tbn7');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_FM_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_fm_ops_7000_tbn8($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.FM8_PROD, 2) AS FM_PROD,
                                        PRD.FM8_JOP AS FM_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        FM8_PROD,
                                                        FM8_JOP
                                                FROM
                                                        PIS_SG_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_FM_OPS
                                        WHERE
                                                COMPANY = 7000
                                        AND PLANT = 'tbn8'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_fm_ops_7000_tbn8($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_FM_OPS WHERE COMPANY = 7000 AND PLANT = 'tbn8' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 7000,
                    'PLANT' => 'tbn8',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_FM_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 7000);
                $oracle->where('PLANT', 'tbn8');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_FM_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_fm_ops_7000_tbn9($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.FM9_PROD, 2) AS FM_PROD,
                                        PRD.FM9_JOP AS FM_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        FM9_PROD,
                                                        FM9_JOP
                                                FROM
                                                        PIS_SG_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_FM_OPS
                                        WHERE
                                                COMPANY = 7000
                                        AND PLANT = 'tbn9'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_fm_ops_7000_tbn9($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_FM_OPS WHERE COMPANY = 7000 AND PLANT = 'tbn9' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 7000,
                    'PLANT' => 'tbn9',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_FM_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 7000);
                $oracle->where('PLANT', 'tbn9');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_FM_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_fm_ops_7000_tbna($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.FMA_PROD, 2) AS FM_PROD,
                                        PRD.FMA_JOP AS FM_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        FMA_PROD,
                                                        FMA_JOP
                                                FROM
                                                        PIS_SG_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_FM_OPS
                                        WHERE
                                                COMPANY = 7000
                                        AND PLANT = 'tbna'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_fm_ops_7000_tbna($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_FM_OPS WHERE COMPANY = 7000 AND PLANT = 'tbna' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 7000,
                    'PLANT' => 'tbna',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_FM_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 7000);
                $oracle->where('PLANT', 'tbna');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_FM_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_fm_ops_7000_tbnb($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.FMB_PROD, 2) AS FM_PROD,
                                        PRD.FMB_JOP AS FM_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        FMB_PROD,
                                                        FMB_JOP
                                                FROM
                                                        PIS_SG_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_FM_OPS
                                        WHERE
                                                COMPANY = 7000
                                        AND PLANT = 'tbnb'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_fm_ops_7000_tbnb($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_FM_OPS WHERE COMPANY = 7000 AND PLANT = 'tbnb' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 7000,
                    'PLANT' => 'tbnb',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_FM_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 7000);
                $oracle->where('PLANT', 'tbnb');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_FM_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function add_fm_ops_7000_tbnc($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PRD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR(PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        ROUND (PRD.FMC_PROD, 2) AS FM_PROD,
                                        PRD.FMC_JOP AS FM_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        FMC_PROD,
                                                        FMC_JOP
                                                FROM
                                                        PIS_SG_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                LEFT JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_FM_OPS
                                        WHERE
                                                COMPANY = 7000
                                        AND PLANT = 'tbnc'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                WHERE
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') <= TO_CHAR (CURRENT_DATE, 'YYYY-MM-DD')
                                ORDER BY
                                        PRD.DATE_PROD");
        $Q = $Query->result_array();
        return $Q;
    }

    public function save_fm_ops_7000_tbnc($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

//        $cnt = $oracle->query("SELECT COUNT(*) AS HITUNG FROM PIS_FM_OPS WHERE COMPANY = 7000 AND PLANT = 'tbnc' AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
//        $count_x = $cnt->result_array();
//        $count = $count_x[0]['HITUNG'];

        if ($data) {// && $count == 0
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'COMPANY' => 7000,
                    'PLANT' => 'tbnc',
                    'STOP_COUNT' => $data[$i][3],
                    'STOP_DESC' => $data[$i][4]
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_FM_OPS', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'COMPANY',
                2 => 'PLANT',
                3 => 'STOP_COUNT',
                4 => 'STOP_DESC'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('COMPANY', 7000);
                $oracle->where('PLANT', 'tbnc');
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_FM_OPS');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    // </editor-fold>
    // <editor-fold defaultstate="collapsed" desc="Prognose Per Day Per Opco">

    public function get_prognose_sg($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (TO_CHAR(DATE_PROD, 'DD')) AS ID,
                                        TO_CHAR(DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        KL1_PROD,
                                        KL2_PROD,
                                        KL3_PROD,
                                        KL4_PROD,
                                        FM1_PROD,
                                        FM2_PROD,
                                        FM3_PROD,
                                        FM4_PROD,
                                        FM5_PROD,
                                        FM6_PROD,
                                        FM7_PROD,
                                        FM8_PROD,
                                        FM9_PROD,
                                        FMA_PROD,
                                        FMB_PROD,
                                        FMC_PROD,
                                        FMCGD_PROD
                                FROM
                                        PIS_SG_PROGNOSE
                                WHERE
                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
        $Q = $Query->result_array();
        echo '{"mydata":' . json_encode($Q) . '}';
    }

    public function save_prognose_sg($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

        if ($data) {
            $oracle->query("DELETE FROM PIS_SG_PROGNOSE WHERE TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $str_rep = array(",", ".", " ", "-");

                $newcol = array(
                    'KL1_PROD' => str_replace($str_rep, "", $data[$i][1]),
                    'KL2_PROD' => str_replace($str_rep, "", $data[$i][2]),
                    'KL3_PROD' => str_replace($str_rep, "", $data[$i][3]),
                    'KL4_PROD' => str_replace($str_rep, "", $data[$i][4]),
                    'FM1_PROD' => str_replace($str_rep, "", $data[$i][5]),
                    'FM2_PROD' => str_replace($str_rep, "", $data[$i][6]),
                    'FM3_PROD' => str_replace($str_rep, "", $data[$i][7]),
                    'FM4_PROD' => str_replace($str_rep, "", $data[$i][8]),
                    'FM5_PROD' => str_replace($str_rep, "", $data[$i][9]),
                    'FM6_PROD' => str_replace($str_rep, "", $data[$i][10]),
                    'FM7_PROD' => str_replace($str_rep, "", $data[$i][11]),
                    'FM8_PROD' => str_replace($str_rep, "", $data[$i][12]),
                    'FM9_PROD' => str_replace($str_rep, "", $data[$i][13]),
                    'FMA_PROD' => str_replace($str_rep, "", $data[$i][14]),
                    'FMB_PROD' => str_replace($str_rep, "", $data[$i][15]),
                    'FMC_PROD' => str_replace($str_rep, "", $data[$i][16]),
                    'FMCGD_PROD' => str_replace($str_rep, "", $data[$i][17])
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_SG_PROGNOSE', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'KL1_PROD',
                2 => 'KL2_PROD',
                3 => 'KL3_PROD',
                4 => 'KL4_PROD',
                5 => 'FM1_PROD',
                6 => 'FM2_PROD',
                7 => 'FM3_PROD',
                8 => 'FM4_PROD',
                9 => 'FM5_PROD',
                10 => 'FM6_PROD',
                11 => 'FM7_PROD',
                12 => 'FM8_PROD',
                13 => 'FM9_PROD',
                14 => 'FMA_PROD',
                15 => 'FMB_PROD',
                16 => 'FMC_PROD',
                17 => 'FMCGD_PROD'
            );
            foreach ($changes as $row) {
                $str_rep = array(",", ".", " ", "-");

                $oracle->set($col[$row[1]], str_replace($str_rep, "", $row[3]));
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_SG_PROGNOSE');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function get_prognose_sp($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (TO_CHAR(DATE_PROD, 'DD')) AS ID,
                                        TO_CHAR (DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        KL2_PROD,
                                        KL3_PROD,
                                        KL4_PROD,
                                        KL5_PROD,
                                        FM2_PROD,
                                        FM3_PROD,
                                        FM41_PROD,
                                        FM42_PROD,
                                        FM51_PROD,
                                        FM52_PROD,
                                        FM61_PROD,
                                        FMDM_PROD
                                FROM
                                        PIS_SP_PROGNOSE
                                WHERE
                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
        $Q = $Query->result_array();
        echo '{"mydata":' . json_encode($Q) . '}';
    }

    public function save_prognose_sp($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

        if ($data) {
            $oracle->query("DELETE FROM PIS_SP_PROGNOSE WHERE TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $str_rep = array(",", ".", " ", "-");

                $newcol = array(
                    'KL2_PROD' => str_replace($str_rep, "", $data[$i][1]),
                    'KL3_PROD' => str_replace($str_rep, "", $data[$i][2]),
                    'KL4_PROD' => str_replace($str_rep, "", $data[$i][3]),
                    'KL5_PROD' => str_replace($str_rep, "", $data[$i][4]),
                    'FM2_PROD' => str_replace($str_rep, "", $data[$i][5]),
                    'FM3_PROD' => str_replace($str_rep, "", $data[$i][6]),
                    'FM41_PROD' => str_replace($str_rep, "", $data[$i][7]),
                    'FM42_PROD' => str_replace($str_rep, "", $data[$i][8]),
                    'FM51_PROD' => str_replace($str_rep, "", $data[$i][9]),
                    'FM52_PROD' => str_replace($str_rep, "", $data[$i][10]),
                    'FMDM_PROD' => str_replace($str_rep, "", $data[$i][11]),
                    'KL6_PROD' => str_replace($str_rep, "", $data[$i][12]),
                    'FM61_PROD' => str_replace($str_rep, "", $data[$i][13])
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_SP_PROGNOSE', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'KL2_PROD',
                2 => 'KL3_PROD',
                3 => 'KL4_PROD',
                4 => 'KL5_PROD',
                5 => 'FM2_PROD',
                6 => 'FM3_PROD',
                7 => 'FM41_PROD',
                8 => 'FM42_PROD',
                9 => 'FM51_PROD',
                10 => 'FM52_PROD',
                11 => 'FMDM_PROD',
                12 => 'KL6_PROD',
                13 => 'FM61_PROD'
            );
            foreach ($changes as $row) {
                $str_rep = array(",", ".", " ", "-");

                $oracle->set($col[$row[1]], str_replace($str_rep, "", $row[3]));
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_SP_PROGNOSE');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function get_prognose_st($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (TO_CHAR(DATE_PROD, 'DD')) AS ID,
                                        TO_CHAR (DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        KL2_PROD,
                                        KL3_PROD,
                                        KL4_PROD,
                                        KL5_PROD,
                                        FM2_PROD,
                                        FM3_PROD,
                                        FM41_PROD,
                                        FM42_PROD,
                                        FM51_PROD,
                                        FM52_PROD
                                FROM
                                        PIS_ST_PROGNOSE PROGNOSE
                                WHERE
                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
        $Q = $Query->result_array();
        echo '{"mydata":' . json_encode($Q) . '}';
    }

    public function save_prognose_st($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

        if ($data) {
            $oracle->query("DELETE FROM PIS_ST_PROGNOSE WHERE TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $str_rep = array(",", ".", " ", "-");

                $newcol = array(
                    'KL2_PROD' => str_replace($str_rep, "", $data[$i][1]),
                    'KL3_PROD' => str_replace($str_rep, "", $data[$i][2]),
                    'KL4_PROD' => str_replace($str_rep, "", $data[$i][3]),
                    'KL5_PROD' => str_replace($str_rep, "", $data[$i][4]),
                    'FM2_PROD' => str_replace($str_rep, "", $data[$i][5]),
                    'FM3_PROD' => str_replace($str_rep, "", $data[$i][6]),
                    'FM41_PROD' => str_replace($str_rep, "", $data[$i][7]),
                    'FM42_PROD' => str_replace($str_rep, "", $data[$i][8]),
                    'FM51_PROD' => str_replace($str_rep, "", $data[$i][9]),
                    'FM52_PROD' => str_replace($str_rep, "", $data[$i][10])
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_ST_PROGNOSE', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'KL2_PROD',
                2 => 'KL3_PROD',
                3 => 'KL4_PROD',
                4 => 'KL5_PROD',
                5 => 'FM2_PROD',
                6 => 'FM3_PROD',
                7 => 'FM41_PROD',
                8 => 'FM42_PROD',
                9 => 'FM51_PROD',
                10 => 'FM52_PROD'
            );
            foreach ($changes as $row) {
                $str_rep = array(",", ".", " ", "-");

                $oracle->set($col[$row[1]], str_replace($str_rep, "", $row[3]));
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_ST_PROGNOSE');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function get_prognose_tlcc($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (TO_CHAR(DATE_PROD, 'DD')) AS ID,
                                        TO_CHAR(DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        KL1_PROD,
                                        FMMP_PROD,
                                        FMHCM_PROD
                                FROM
                                        PIS_TLCC_PROGNOSE
                                WHERE
                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
        $Q = $Query->result_array();
        echo '{"mydata":' . json_encode($Q) . '}';
    }

    public function save_prognose_tlcc($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');
        $tgl = $this->input->post('tgl');

        if ($data) {
            $oracle->query("DELETE FROM PIS_TLCC_PROGNOSE WHERE TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $str_rep = array(",", ".", " ", "-");

                $newcol = array(
                    'KL1_PROD' => str_replace($str_rep, "", $data[$i][1]),
                    'FMMP_PROD' => str_replace($str_rep, "", $data[$i][2]),
                    'FMHCM_PROD' => str_replace($str_rep, "", $data[$i][3])
                );
                $my_res_tgl = $data[$i][0];
                $oracle->set("DATE_PROD", "TO_DATE('$my_res_tgl', 'YYYY-MM-DD')", false);
                $oracle->insert('PIS_TLCC_PROGNOSE', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'DATE_PROD',
                1 => 'KL1_PROD',
                2 => 'FMMP_PROD',
                3 => 'FMHCM_PROD'
            );
            foreach ($changes as $row) {
                $str_rep = array(",", ".", " ", "-");

                $oracle->set($col[$row[1]], str_replace($str_rep, "", $row[3]));
                $oracle->where('TO_CHAR(DATE_PROD,\'YYYY-MM-DD\')', $tgl);
                $oracle->update('PIS_TLCC_PROGNOSE');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function getlast_kiln($company, $plant, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        *
                                FROM
                                        (
                                                SELECT
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM-DD') AS BULAN
                                                FROM
                                                        PIS_KILN_OPS
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY') = '$tahun'
                                                AND COMPANY = $company
                                                AND PLANT = '$plant'
                                                ORDER BY
                                                        DATE_PROD DESC
                                        )
                                WHERE
                                        ROWNUM = 1");
        $Q = $Query->result_array();
        return $Q;
    }

    // </editor-fold>
    // <editor-fold defaultstate="collapsed" desc="Master Stock">
    function get_stock_update($comp) {
        $oracle = $this->load->database('oramso', TRUE);
        $query = $oracle->query("SELECT
                                        MAX (TO_CHAR(DATE_PROD, 'MM')) AS BULAN
                                FROM
                                        PIS_" . $comp . "_STOCKDAILY");
        foreach ($query->result_array() as $value) {
            $bulan = $value['BULAN'];
        }
        return $bulan;
    }

    function get_stock_SG($tahun, $bulan) {
        $oracle = $this->load->database('oramso', TRUE);
        $query = $oracle->query("SELECT
                                        TO_NUMBER (TO_CHAR(DATE_PROD, 'DD')) AS ID,
                                        DATE_PROD,
                                        ROUND (
                                                (
                                                        SG_CM_TBN1_SILO1 + SG_CM_TBN1_SILO2 + SG_CM_TBN1_SILO3 + SG_CM_TBN1_SILO4 + SG_CM_TBN2_SILO5 + SG_CM_TBN2_SILO6 + SG_CM_TBN2_SILO7 + SG_CM_TBN2_SILO8 + SG_CM_TBN3_SILO9 + SG_CM_TBN3_SILO10 + SG_CM_TBN3_SILO11 + SG_CM_TBN3_SILO12 + SG_CM_TBN4_SILO13 + SG_CM_TBN4_SILO14 + SG_CM_TBN4_SILO15 + SG_CM_TBN4_SILO16 + SG_CM_PORT_SILO1 + SG_CM_PORT_SILO2 + SG_CM_GRSS_SILO1 + SG_CM_GRSS_SILO2 + SG_CM_GRSS_SILO3 + SG_CM_GRSS_SILO4 + SG_CM_GRSS_SILO5 + SG_CM_GRSS_SILO6 + SG_CM_GRST_SILO1 + SG_CM_GRST_SILO2 + SG_CM_GRST_SILO3 + SG_CM_GRST_SILO4 + SG_CM_GRST_SILO5 + SG_CM_GRST_SILO6 + SG_CM_GRSU_SILO1 + SG_CM_GRSU_SILO2 + SG_CM_GRSU_SILO3 + SG_CM_GRSU_SILO4 + SG_CM_GRSU_SILO5 + SG_CM_GRSU_SILO6
                                                ),
                                                2
                                        ) AS CEMENT,
                                        ROUND (
                                                (
                                                        SG_CL_TBN1 + SG_CL_TBN2 + SG_CL_TBN3 + SG_CL_TBN4 + SG_CL_YARD + SG_CL_GRS_SILOA + SG_CL_GRS_SILOB + SG_CL_GRS_SILOC + SG_CL_GRS_YARD
                                                ),
                                                2
                                        ) AS CLINKER
                                FROM
                                        PIS_SG_STOCKDAILY
                                WHERE
                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ORDER BY
                                        DATE_PROD ASC");
        return $query->result_array();
    }

    function get_stock_SP($tahun, $bulan) {
        $oracle = $this->load->database('oramso', TRUE);
        $query = $oracle->query("SELECT
                                        TO_NUMBER (TO_CHAR(DATE_PROD, 'DD')) AS ID,
                                        DATE_PROD,
                                        ROUND (
                                                (
                                                        SP_CM_IND1_SILOA + SP_CM_IND1_SILOB + SP_CM_IND234_SILO1 + SP_CM_IND234_SILO2 + SP_CM_IND234_SILO3 + SP_CM_IND234_SILO4 + SP_CM_IND234_SILO5 + SP_CM_IND234_SILO6 + SP_CM_IND234_SILO7 + SP_CM_IND234_SILO8 + SP_CM_IND5_SILO9 + SP_CM_IND5_SILO10 + SP_CM_IND5_SILO11 + SP_CM_IND5_SILO12 + SP_CM_TLB_SILO1 + SP_CM_TLB_SILO2 + SP_CM_TLB_SILO3 + SP_CM_TLB_SILO4 + SP_CM_TLB_SILO5 + SP_CM_TLB_SILO6 + SP_CM_TLB_SILO7 + SP_CM_TLB_SILO8 + SP_CM_TLB_SILO9 + CAST (SP_CM_IND6_SILO13 AS NUMERIC) + CAST (SP_CM_IND6_SILO14 AS NUMERIC)
                                                ),
                                                2
                                        ) AS CEMENT,
                                        ROUND (
                                                (
                                                        SP_CL_COLDSTORAGE + SP_CL_IND123 + SP_CL_IND4 + SP_CL_IND5 + SP_CL_DUMAI + CAST (SP_CL_IND6 AS NUMERIC)
                                                ),
                                                2
                                        ) AS CLINKER
                                FROM
                                        PIS_SP_STOCKDAILY
                                WHERE
                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ORDER BY
                                        DATE_PROD ASC");

        return $query->result_array();
    }

    function get_stock_ST($tahun, $bulan) {
        $oracle = $this->load->database('oramso', TRUE);
        $query = $oracle->query("SELECT
                                        TO_NUMBER (TO_CHAR(DATE_PROD, 'DD')) AS ID,
                                        DATE_PROD,
                                        ROUND (
                                                (
                                                        ST_CM_TNS23_SILO1 + ST_CM_TNS23_SILO2 + ST_CM_TNS23_SILO3 + ST_CM_TNS23_SILO4 + ST_CM_TNS4_SILO1 + ST_CM_TNS4_SILO2 + ST_CM_TNS4_SILO3 + ST_CM_TNS5_SILO1 + ST_CM_TNS5_SILO2 + ST_CM_TNS5_SILO3 + ST_CM_BKS_SILO1 + ST_CM_BKS_SILO2 + ST_CM_BKS_SILO3 + ST_CM_BKS_SILO4 + ST_CM_BKS_SILO5 + ST_CM_BKS_SILO6 + ST_CM_BKS_SILO7 + ST_CM_BKS_SILO8 + ST_CM_BKS_SILO9 + ST_CM_BKS_SILO10
                                                ),
                                                2
                                        ) AS CEMENT,
                                        ROUND (
                                                (
                                                        ST_CL_OPYARD + ST_CL_TNS2 + ST_CL_TNS3 + ST_CL_DOME4 + ST_CL_TNS5
                                                ),
                                                2
                                        ) AS CLINKER
                                FROM
                                        PIS_ST_STOCKDAILY
                                WHERE
                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ORDER BY
                                        DATE_PROD ASC");

        return $query->result_array();
    }

    function get_stock_TLCC($tahun, $bulan) {
        $oracle = $this->load->database('oramso', TRUE);
        $query = $oracle->query("SELECT
                                        TO_NUMBER (TO_CHAR(DATE_PROD, 'DD')) AS ID,
                                        DATE_PROD,
                                        ROUND (
                                                (
                                                        TLCC_CM_MP_SILO1 + TLCC_CM_MP_SILO2 + TLCC_CM_GP_SILO1 + TLCC_CM_GP_SILO2
                                                ),
                                                2
                                        ) AS CEMENT,
                                        ROUND (
                                                (
                                                        TLCC_CL_MP_DOME + TLCC_CL_MP_YARD + TLCC_CL_GP_SILO
                                                ),
                                                2
                                        ) AS CLINKER
                                FROM
                                        PIS_TLCC_STOCKDAILY
                                WHERE
                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ORDER BY
                                        DATE_PROD ASC");

        return $query->result_array();
    }
    
    function get_stock_SGR($tahun, $bulan) {
        $oracle = $this->load->database('oramso', TRUE);
        $query = $oracle->query("SELECT
                                        TO_NUMBER (TO_CHAR(DATE_PROD, 'DD')) AS ID,
                                        DATE_PROD,
                                        ROUND (
                                                (
                                                        SGR_CM_RMB_SILO1 + SGR_CM_RMB_SILO2 + SGR_CM_RMB_SILO3
                                                ),
                                                2
                                        ) AS CEMENT,
                                        ROUND (
                                                (
                                                        SGR_CL_RMB_DOME + SGR_CL_RMB_YARD
                                                ),
                                                2
                                        ) AS CLINKER
                                FROM
                                        PIS_SGR_STOCKDAILY
                                WHERE
                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ORDER BY
                                        DATE_PROD ASC");

        return $query->result_array();
    }

    // </editor-fold>

    public function check_insert_rkapplant() {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        COMPANY || PLANT || TAHUN || BULAN AS MERGER
                                FROM
                                        PIS_RKAP_PLANT");
        $Q = $Query->result_array();
        return $Q;
    }

    public function get_kiln_sg($bulan, $tahun, $plant2) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (TO_CHAR(PRD.DATE_PROD, 'DD')) AS ID,
                                        TO_CHAR (PRD.DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        PRD.KL1_PROD,
                                        PRD.KL1_JOP,
                                        OPS.STOP_COUNT,
                                        OPS.STOP_DESC
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        KL1_PROD,
                                                        KL1_JOP
                                                FROM
                                                        PIS_SG_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) PRD
                                JOIN (
                                        SELECT
                                                *
                                        FROM
                                                PIS_KILN_OPS
                                        WHERE
                                                COMPANY = 7000
                                        AND PLANT = '$plant2'
                                        AND TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) OPS ON PRD.DATE_PROD = OPS.DATE_PROD
                                ORDER BY PRD.DATE_PROD");
        $Q = $Query->result_array();
        echo '{"mydata":' . json_encode($Q) . '}';
    }

    public function update_rkaptotal_from_rkapplant() {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("UPDATE PIS_RKAP_TOTAL T1
                                SET CEMENT = (
                                        SELECT
                                                CEMENT
                                        FROM
                                                V_PIS_RKAP_PL2OP V1
                                        WHERE
                                                T1.COMPANY = V1.COMPANY
                                        AND T1.TAHUN = V1.TAHUN
                                        AND T1.BULAN = V1.BULAN
                                ),
                                 CLINKER = (
                                        SELECT
                                                CLINKER
                                        FROM
                                                V_PIS_RKAP_PL2OP V1
                                        WHERE
                                                T1.COMPANY = V1.COMPANY
                                        AND T1.TAHUN = V1.TAHUN
                                        AND T1.BULAN = V1.BULAN
                                ),
                                 LIMESTONE = (
                                        SELECT
                                                LIMESTONE
                                        FROM
                                                V_PIS_RKAP_PL2OP V1
                                        WHERE
                                                T1.COMPANY = V1.COMPANY
                                        AND T1.TAHUN = V1.TAHUN
                                        AND T1.BULAN = V1.BULAN
                                ),
                                 FINECOAL = (
                                        SELECT
                                                FINECOAL
                                        FROM
                                                V_PIS_RKAP_PL2OP V1
                                        WHERE
                                                T1.COMPANY = V1.COMPANY
                                        AND T1.TAHUN = V1.TAHUN
                                        AND T1.BULAN = V1.BULAN
                                ),
                                 RAWMIX = (
                                        SELECT
                                                RAWMIX
                                        FROM
                                                V_PIS_RKAP_PL2OP V1
                                        WHERE
                                                T1.COMPANY = V1.COMPANY
                                        AND T1.TAHUN = V1.TAHUN
                                        AND T1.BULAN = V1.BULAN
                                ),
                                 SILICA = (
                                        SELECT
                                                SILICA
                                        FROM
                                                V_PIS_RKAP_PL2OP V1
                                        WHERE
                                                T1.COMPANY = V1.COMPANY
                                        AND T1.TAHUN = V1.TAHUN
                                        AND T1.BULAN = V1.BULAN
                                )
                                WHERE
                                        T1.COMPANY = (
                                                SELECT
                                                        COMPANY
                                                FROM
                                                        V_PIS_RKAP_PL2OP V1
                                                WHERE
                                                        T1.COMPANY = V1.COMPANY
                                                AND T1.TAHUN = V1.TAHUN
                                                AND T1.BULAN = V1.BULAN
                                        )
                                AND T1.TAHUN = (
                                        SELECT
                                                TAHUN
                                        FROM
                                                V_PIS_RKAP_PL2OP V1
                                        WHERE
                                                T1.COMPANY = V1.COMPANY
                                        AND T1.TAHUN = V1.TAHUN
                                        AND T1.BULAN = V1.BULAN
                                )
                                AND T1.BULAN = (
                                        SELECT
                                                BULAN
                                        FROM
                                                V_PIS_RKAP_PL2OP V1
                                        WHERE
                                                T1.COMPANY = V1.COMPANY
                                        AND T1.TAHUN = V1.TAHUN
                                        AND T1.BULAN = V1.BULAN
                                )");
        $Q = $Query->result_array();
        return $Q;
    }

}
