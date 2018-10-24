<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mplant_dashboard extends CI_Model {

    // <editor-fold defaultstate="collapsed" desc="Yield Report Per Day Per Opco">
    public function ops_day_SG($company, $tahun, $bulan) {
        $oracle = $this->load->database('oramso', TRUE);
        $query_cap = $oracle->query("SELECT
                                            KL1.CLINKER AS SG_KL1,
                                            KL2.CLINKER AS SG_KL2,
                                            KL3.CLINKER AS SG_KL3,
                                            KL4.CLINKER AS SG_KL4,
                                            FM1.CEMENT AS SG_FM1,
                                            FM2.CEMENT AS SG_FM2,
                                            FM3.CEMENT AS SG_FM3,
                                            FM4.CEMENT AS SG_FM4,
                                            FM5.CEMENT AS SG_FM5,
                                            FM6.CEMENT AS SG_FM6,
                                            FM7.CEMENT AS SG_FM7,
                                            FM8.CEMENT AS SG_FM8,
                                            FM9.CEMENT AS SG_FM9,
                                            FMA.CEMENT AS SG_FMA,
                                            FMB.CEMENT AS SG_FMB,
                                            FMC.CEMENT AS SG_FMC
                                    FROM
                                            (
                                                    (
                                                            SELECT
                                                                    COMPANY,
                                                                    CLINKER
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'tbn1'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) kl1
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CLINKER
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'tbn2'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) kl2 ON kl1.COMPANY = kl2.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CLINKER
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'tbn3'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) kl3 ON kl2.COMPANY = kl3.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CLINKER
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'tbn4'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) kl4 ON kl3.COMPANY = kl4.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CEMENT
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'tbn1'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) fm1 ON kl4.COMPANY = fm1.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CEMENT
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'tbn2'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) fm2 ON fm1.COMPANY = fm2.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CEMENT
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'tbn3'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) fm3 ON fm2.COMPANY = fm3.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CEMENT
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'tbn4'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) fm4 ON fm3.COMPANY = fm4.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CEMENT
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'tbn5'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) fm5 ON fm4.COMPANY = fm5.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CEMENT
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'tbn6'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) fm6 ON fm5.COMPANY = fm6.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CEMENT
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'tbn7'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) fm7 ON fm6.COMPANY = fm7.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CEMENT
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'tbn8'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) fm8 ON fm7.COMPANY = fm8.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CEMENT
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'tbn9'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) fm9 ON fm8.COMPANY = fm9.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CEMENT
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'tbna'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) fma ON fm9.COMPANY = fma.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CEMENT
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'tbnb'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) fmb ON fma.COMPANY = fmb.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CEMENT
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'tbnc'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) fmc ON fmb.COMPANY = fmc.COMPANY
                                            )");

        foreach ($query_cap->result() as $rows) {
            $cap_kl1_prod = $rows->SG_KL1;
            $cap_kl2_prod = $rows->SG_KL2;
            $cap_kl3_prod = $rows->SG_KL3;
            $cap_kl4_prod = $rows->SG_KL4;
            $cap_fm1_prod = $rows->SG_FM1;
            $cap_fm2_prod = $rows->SG_FM2;
            $cap_fm3_prod = $rows->SG_FM3;
            $cap_fm4_prod = $rows->SG_FM4;
            $cap_fm5_prod = $rows->SG_FM5;
            $cap_fm6_prod = $rows->SG_FM6;
            $cap_fm7_prod = $rows->SG_FM7;
            $cap_fm8_prod = $rows->SG_FM8;
            $cap_fm9_prod = $rows->SG_FM9;
            $cap_fma_prod = $rows->SG_FMA;
            $cap_fmb_prod = $rows->SG_FMB;
            $cap_fmc_prod = $rows->SG_FMC;
        }

        $query_prod = $oracle->query("SELECT
                                            TO_NUMBER (TO_CHAR(DATE_PROD, 'DD')) AS ID,
                                            DATE_PROD,
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
                                            FMC_PROD
                                    FROM
                                            PIS_SG_PRODDAILY
                                    WHERE
                                            TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");

        foreach ($query_prod->result() as $rows) {
            $date = $rows->DATE_PROD;
            $id = $rows->ID;
            $sg_kl1_prod = $rows->KL1_PROD;
            $sg_kl2_prod = $rows->KL2_PROD;
            $sg_kl3_prod = $rows->KL3_PROD;
            $sg_kl4_prod = $rows->KL4_PROD;
            $sg_fm1_prod = $rows->FM1_PROD;
            $sg_fm2_prod = $rows->FM2_PROD;
            $sg_fm3_prod = $rows->FM3_PROD;
            $sg_fm4_prod = $rows->FM4_PROD;
            $sg_fm5_prod = $rows->FM5_PROD;
            $sg_fm6_prod = $rows->FM6_PROD;
            $sg_fm7_prod = $rows->FM7_PROD;
            $sg_fm8_prod = $rows->FM8_PROD;
            $sg_fm9_prod = $rows->FM9_PROD;
            $sg_fma_prod = $rows->FMA_PROD;
            $sg_fmb_prod = $rows->FMB_PROD;
            $sg_fmc_prod = $rows->FMC_PROD;

            $data[] = array(
                'ID' => $id,
                'DATE_PROD' => $date,
                'KL1_PROD' => @number_format(($sg_kl1_prod / $cap_kl1_prod) * 100, 2, ".", ","),
                'KL2_PROD' => @number_format(($sg_kl2_prod / $cap_kl2_prod) * 100, 2, ".", ","),
                'KL3_PROD' => @number_format(($sg_kl3_prod / $cap_kl3_prod) * 100, 2, ".", ","),
                'KL4_PROD' => @number_format(($sg_kl4_prod / $cap_kl4_prod) * 100, 2, ".", ","),
                'FM1_PROD' => @number_format(($sg_fm1_prod / $cap_fm1_prod) * 100, 2, ".", ","),
                'FM2_PROD' => @number_format(($sg_fm2_prod / $cap_fm2_prod) * 100, 2, ".", ","),
                'FM3_PROD' => @number_format(($sg_fm3_prod / $cap_fm3_prod) * 100, 2, ".", ","),
                'FM4_PROD' => @number_format(($sg_fm4_prod / $cap_fm4_prod) * 100, 2, ".", ","),
                'FM5_PROD' => @number_format(($sg_fm5_prod / $cap_fm5_prod) * 100, 2, ".", ","),
                'FM6_PROD' => @number_format(($sg_fm6_prod / $cap_fm6_prod) * 100, 2, ".", ","),
                'FM7_PROD' => @number_format(($sg_fm7_prod / $cap_fm7_prod) * 100, 2, ".", ","),
                'FM8_PROD' => @number_format(($sg_fm8_prod / $cap_fm8_prod) * 100, 2, ".", ","),
                'FM9_PROD' => @number_format(($sg_fm9_prod / $cap_fm9_prod) * 100, 2, ".", ","),
                'FMA_PROD' => @number_format(($sg_fma_prod / $cap_fma_prod) * 100, 2, ".", ","),
                'FMB_PROD' => @number_format(($sg_fmb_prod / $cap_fmb_prod) * 100, 2, ".", ","),
                'FMC_PROD' => @number_format(($sg_fmc_prod / $cap_fmc_prod) * 100, 2, ".", ",")
            );
        }

        echo '{"mydata":' . json_encode($data) . '}';
    }
    
    public function ops_day_SGR($company, $tahun, $bulan) {
        $oracle = $this->load->database('oramso', TRUE);
        $query_cap = $oracle->query("SELECT
                                            KL1.CLINKER AS SG_KL1,
                                            FM1.CEMENT AS SG_FM1,
                                            FM2.CEMENT AS SG_FM2
                                    FROM
                                            (
                                                    (
                                                            SELECT
                                                                    COMPANY,
                                                                    CLINKER
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'rmb1'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) kl1
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CEMENT
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'rmb1'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) fm1 ON kl1.COMPANY = fm1.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CEMENT
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'rmb2'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) fm2 ON fm1.COMPANY = fm2.COMPANY
                                            )");

        foreach ($query_cap->result() as $rows) {
            $cap_kl1_prod = $rows->SG_KL1;
            $cap_fm1_prod = $rows->SG_FM1;
            $cap_fm2_prod = $rows->SG_FM2;
        }

        $query_prod = $oracle->query("SELECT
                                            TO_NUMBER (TO_CHAR(DATE_PROD, 'DD')) AS ID,
                                            DATE_PROD,
                                            KL1_PROD,
                                            FM1_PROD,
                                            FM2_PROD
                                    FROM
                                            PIS_SGR_PRODDAILY
                                    WHERE
                                            TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");

        foreach ($query_prod->result() as $rows) {
            $date = $rows->DATE_PROD;
            $id = $rows->ID;
            $sg_kl1_prod = $rows->KL1_PROD;
            $sg_fm1_prod = $rows->FM1_PROD;
            $sg_fm2_prod = $rows->FM2_PROD;

            $data[] = array(
                'ID' => $id,
                'DATE_PROD' => $date,
                'KL1_PROD' => @number_format(($sg_kl1_prod / $cap_kl1_prod) * 100, 2, ".", ","),
                'FM1_PROD' => @number_format(($sg_fm1_prod / $cap_fm1_prod) * 100, 2, ".", ","),
                'FM2_PROD' => @number_format(($sg_fm2_prod / $cap_fm2_prod) * 100, 2, ".", ",")
            );
        }

        echo '{"mydata":' . json_encode($data) . '}';
    }

    public function ops_day_SP($company, $tahun, $bulan) {
        $oracle = $this->load->database('oramso', TRUE);
        $query_cap = $oracle->query("SELECT
                                            KL2.CLINKER AS SP_KL2,
                                            Kl3.CLINKER AS SP_KL3,
                                            Kl4.CLINKER AS SP_KL4,
                                            KL5.CLINKER AS SP_KL5,
                                            FM2.CEMENT AS SP_FM2,
                                            FM3.CEMENT AS SP_FM3,
                                            FM41.CEMENT AS SP_FM41,
                                            FM42.CEMENT AS SP_FM42,
                                            FM51.CEMENT AS SP_FM51,
                                            FM52.CEMENT AS SP_FM52,
                                            FMDM.CEMENT AS SP_FMDM
                                    FROM
                                            (
                                                    (
                                                            SELECT
                                                                    COMPANY,
                                                                    CLINKER
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'ind2'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) kl2
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CLINKER
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'ind3'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) kl3 ON kl2.COMPANY = kl3.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CLINKER
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'ind41'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) kl4 ON kl3.COMPANY = kl4.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CLINKER
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'ind51'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) kl5 ON kl4.COMPANY = kl5.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CEMENT
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'ind2'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) fm2 ON kl5.COMPANY = fm2.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CEMENT
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'ind3'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) fm3 ON fm2.COMPANY = fm3.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CEMENT
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'ind41'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) fm41 ON fm3.COMPANY = fm41.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CEMENT
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'ind42'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) fm42 ON fm41.COMPANY = fm42.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CEMENT
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'ind51'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) fm51 ON fm42.COMPANY = fm51.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CEMENT
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'ind52'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) fm52 ON fm51.COMPANY = fm52.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CEMENT
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'dmi'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) fmdm ON fm52.COMPANY = fmdm.COMPANY
                                            )");

        foreach ($query_cap->result() as $rows) {
            $cap_kl2 = $rows->SP_KL2;
            $cap_kl3 = $rows->SP_KL3;
            $cap_kl4 = $rows->SP_KL4;
            $cap_kl5 = $rows->SP_KL5;
            $cap_fm2 = $rows->SP_FM2;
            $cap_fm3 = $rows->SP_FM3;
            $cap_fm41 = $rows->SP_FM41;
            $cap_fm42 = $rows->SP_FM42;
            $cap_fm51 = $rows->SP_FM51;
            $cap_fm52 = $rows->SP_FM52;
            $cap_fmdm = $rows->SP_FMDM;
        }

        $query_prod = $oracle->query("SELECT
                                            TO_NUMBER (TO_CHAR(DATE_PROD, 'DD')) AS ID,
                                            DATE_PROD,
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
                                            FMDM_PROD
                                    FROM
                                            PIS_SP_PRODDAILY
                                    WHERE
                                            TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'");

        foreach ($query_prod->result() as $rows) {
            $date = $rows->DATE_PROD;
            $id = $rows->ID;
            $sp_kl2 = $rows->KL2_PROD;
            $sp_kl3 = $rows->KL3_PROD;
            $sp_kl4 = $rows->KL4_PROD;
            $sp_kl5 = $rows->KL5_PROD;
            $sp_fm2 = $rows->FM2_PROD;
            $sp_fm3 = $rows->FM3_PROD;
            $sp_fm41 = $rows->FM41_PROD;
            $sp_fm42 = $rows->FM42_PROD;
            $sp_fm51 = $rows->FM51_PROD;
            $sp_fm52 = $rows->FM52_PROD;
            $sp_fmdm = $rows->FMDM_PROD;

            $data[] = array(
                'DATE_PROD' => $date,
                'ID' => $id,
                'KL2_PROD' => @number_format(($sp_kl2 / $cap_kl2) * 100, 2, ".", ","),
                'KL3_PROD' => @number_format(($sp_kl3 / $cap_kl3) * 100, 2, ".", ","),
                'KL4_PROD' => @number_format(($sp_kl4 / $cap_kl4) * 100, 2, ".", ","),
                'KL5_PROD' => @number_format(($sp_kl5 / $cap_kl5) * 100, 2, ".", ","),
                'FM2_PROD' => @number_format(($sp_fm2 / $cap_fm2) * 100, 2, ".", ","),
                'FM3_PROD' => @number_format(($sp_fm3 / $cap_fm3) * 100, 2, ".", ","),
                'FM41_PROD' => @number_format(($sp_fm41 / $cap_fm41) * 100, 2, ".", ","),
                'FM42_PROD' => @number_format(($sp_fm42 / $cap_fm42) * 100, 2, ".", ","),
                'FM51_PROD' => @number_format(($sp_fm51 / $cap_fm51) * 100, 2, ".", ","),
                'FM52_PROD' => @number_format(($sp_fm52 / $cap_fm52) * 100, 2, ".", ","),
                'FMDM_PROD' => @number_format(($sp_fmdm / $cap_fmdm) * 100, 2, ".", ",")
            );
        }

        echo '{"mydata":' . json_encode($data) . '}';
    }

    public function ops_day_ST($company, $tahun, $bulan) {
        $oracle = $this->load->database('oramso', TRUE);
        $query_cap = $oracle->query("SELECT
                                            	KL2.CLINKER AS ST_KL2,
                                                KL3.CLINKER AS ST_Kl3,
                                                KL4.CLINKER AS ST_Kl4,
                                                KL5.CLINKER AS ST_KL5,
                                                FM2.CEMENT AS ST_FM2,
                                                FM3.CEMENT AS ST_FM3,
                                                FM41.CEMENT AS ST_FM41,
                                                FM42.CEMENT AS ST_FM42,
                                                FM51.CEMENT AS ST_FM51,
                                                FM52.CEMENT AS ST_FM52
                                    FROM
                                            (
                                                    (
                                                            SELECT
                                                                    COMPANY,
                                                                    CLINKER
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'tns2'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) kl2
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CLINKER
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'tns3'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) kl3 ON kl2.COMPANY = kl3.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CLINKER
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'tns41'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) kl4 ON kl3.COMPANY = kl4.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CLINKER
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'tns51'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) kl5 ON kl4.COMPANY = kl5.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CEMENT
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'tns2'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) fm2 ON kl5.COMPANY = fm2.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CEMENT
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'tns3'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) fm3 ON fm2.COMPANY = fm3.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CEMENT
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'tns41'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) fm41 ON fm3.COMPANY = fm41.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CEMENT
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'tns42'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) fm42 ON fm41.COMPANY = fm42.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CEMENT
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'tns51'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) fm51 ON fm42.COMPANY = fm51.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CEMENT
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'tns52'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) fm52 ON fm51.COMPANY = fm52.COMPANY
                                            )");

        foreach ($query_cap->result() as $rows) {
            $cap_kl2 = $rows->ST_KL2;
            $cap_kl3 = $rows->ST_KL3;
            $cap_kl4 = $rows->ST_KL4;
            $cap_kl5 = $rows->ST_KL5;
            $cap_fm2 = $rows->ST_FM2;
            $cap_fm3 = $rows->ST_FM3;
            $cap_fm41 = $rows->ST_FM41;
            $cap_fm42 = $rows->ST_FM42;
            $cap_fm51 = $rows->ST_FM51;
            $cap_fm52 = $rows->ST_FM52;
        }

        $query_prod = $oracle->query("SELECT
                                            TO_NUMBER (TO_CHAR(DATE_PROD, 'DD')) AS ID,
                                            DATE_PROD,
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
                                            PIS_ST_PRODDAILY
                                    WHERE
                                            TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                    ORDER BY
                                            DATE_PROD");

        foreach ($query_prod->result() as $rows) {
            $date = $rows->DATE_PROD;
            $id = $rows->ID;
            $st_kl2 = $rows->KL2_PROD;
            $st_kl3 = $rows->KL3_PROD;
            $st_kl4 = $rows->KL4_PROD;
            $st_kl5 = $rows->KL5_PROD;
            $st_fm2 = $rows->FM2_PROD;
            $st_fm3 = $rows->FM3_PROD;
            $st_fm41 = $rows->FM41_PROD;
            $st_fm42 = $rows->FM42_PROD;
            $st_fm51 = $rows->FM51_PROD;
            $st_fm52 = $rows->FM52_PROD;

            $data[] = array(
                'DATE_PROD' => $date,
                'ID' => $id,
                'KL2_PROD' => @number_format(($st_kl2 / $cap_kl2) * 100, 2, ".", ","),
                'KL3_PROD' => @number_format(($st_kl3 / $cap_kl3) * 100, 2, ".", ","),
                'KL4_PROD' => @number_format(($st_kl4 / $cap_kl4) * 100, 2, ".", ","),
                'KL5_PROD' => @number_format(($st_kl5 / $cap_kl5) * 100, 2, ".", ","),
                'FM2_PROD' => @number_format(($st_fm2 / $cap_fm2) * 100, 2, ".", ","),
                'FM3_PROD' => @number_format(($st_fm3 / $cap_fm3) * 100, 2, ".", ","),
                'FM41_PROD' => @number_format(($st_fm41 / $cap_fm41) * 100, 2, ".", ","),
                'FM42_PROD' => @number_format(($st_fm42 / $cap_fm42) * 100, 2, ".", ","),
                'FM51_PROD' => @number_format(($st_fm51 / $cap_fm51) * 100, 2, ".", ","),
                'FM52_PROD' => @number_format(($st_fm52 / $cap_fm52) * 100, 2, ".", ",")
            );
        }

        echo '{"mydata":' . json_encode($data) . '}';
    }

    public function ops_day_TLCC($company, $tahun, $bulan) {
        $oracle = $this->load->database('oramso', TRUE);
        $query_cap = $oracle->query("SELECT
                                            T1.CLINKER AS TLCC_KL1,
                                            T2.CEMENT AS TLCC_FMMP,
                                            T3.CEMENT AS TLCC_FMHCM
                                    FROM
                                            (
                                                    (
                                                            SELECT
                                                                    COMPANY,
                                                                    CLINKER
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'mp'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) T1
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CEMENT
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'mp'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) T2 ON T1.COMPANY = T2.COMPANY
                                                    JOIN (
                                                            SELECT
                                                                    COMPANY,
                                                                    CEMENT
                                                            FROM
                                                                    PIS_CAPACITY_PLANT
                                                            WHERE
                                                                    COMPANY = $company
                                                            AND PLANT = 'hcm'
                                                            AND TAHUN = $tahun
                                                            AND BULAN = $bulan
                                                    ) T3 ON T2.COMPANY = T3.COMPANY
                                            )");

        foreach ($query_cap->result() as $rows) {
            $cap_kl = $rows->TLCC_KL1;
            $cap_fmmp = $rows->TLCC_FMMP;
            $cap_fmhcm = $rows->TLCC_FMHCM;
        }

        $query_prod = $oracle->query("SELECT
                                            TO_NUMBER (TO_CHAR(DATE_PROD, 'DD')) AS ID,
                                            DATE_PROD,
                                            KL1_PROD,
                                            FMMP_PROD,
                                            FMHCM_PROD
                                    FROM
                                            PIS_TLCC_PRODDAILY
                                    WHERE
                                            TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                    ORDER BY
                                            DATE_PROD");

        foreach ($query_prod->result() as $rows) {
            $date = $rows->DATE_PROD;
            $id = $rows->ID;
            $tlcc_kl = $rows->KL1_PROD;
            $tlcc_fmmp = $rows->FMMP_PROD;
            $tlcc_fmhcm = $rows->FMHCM_PROD;

            $data[] = array(
                'DATE_PROD' => $date,
                'ID' => $id,
                'KL1_PROD' => @number_format(($tlcc_kl / $cap_kl) * 100, 2, ".", ","),
                'FMMP_PROD' => @number_format(($tlcc_fmmp / $cap_fmmp) * 100, 2, ".", ","),
                'FMHCM_PROD' => @number_format(($tlcc_fmhcm / $cap_fmhcm) * 100, 2, ".", ",")
            );
        }

        echo '{"mydata":' . json_encode($data) . '}';
    }

    // </editor-fold>
    
    // <editor-fold defaultstate="collapsed" desc="Inventory Report Per Day Per Opco">
    public function get_dash_D_SG($date_start, $date_end) {
        $oracle = $this->load->database('oramso', TRUE);
        $query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PROD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR (PROD.DATE_PROD, 'DD-MM-YY') AS TGL,
                                        ROWNUM,
                                        PROD.DATE_PROD,
                                        PROD.PROD_KL,
                                        PROD.PROD_FM,
                                        PROG.PROG_KL,
                                        PROG.PROG_FM
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        (
                                                                KL1_PROD + KL2_PROD + KL3_PROD + KL4_PROD
                                                        ) AS PROD_KL,
                                                        (
                                                                FM1_PROD + FM2_PROD + FM3_PROD + FM4_PROD + FM5_PROD + FM6_PROD + FM7_PROD + FM8_PROD + FM9_PROD + FMA_PROD + FMB_PROD + FMC_PROD
                                                        ) AS PROD_FM
                                                FROM
                                                        PIS_SG_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM-DD') BETWEEN '$date_start'
                                                AND '$date_end'
                                        ) PROD
                                LEFT JOIN (
                                        SELECT
                                                DATE_PROD,
                                                (
                                                        KL1_PROD + KL2_PROD + KL3_PROD + KL4_PROD
                                                ) AS PROG_KL,
                                                (
                                                        FM1_PROD + FM2_PROD + FM3_PROD + FM4_PROD + FM5_PROD + FM6_PROD + FM7_PROD + FM8_PROD + FM9_PROD + FMA_PROD + FMB_PROD + FMC_PROD
                                                ) AS PROG_FM
                                        FROM
                                                PIS_SG_PROGNOSE
                                        WHERE
                                                TO_CHAR (DATE_PROD, 'YYYY-MM-DD') BETWEEN '$date_start'
                                        AND '$date_end'
                                ) PROG ON PROD.DATE_PROD = PROG.DATE_PROD
                                ORDER BY
                                        PROD.DATE_PROD");

        foreach ($query->result_array() as $value) {
            $ID = $value['ID'];
            $DATE_PROD = $value['DATE_PROD'];
            $PROD_KL = $value['PROD_KL'];
            $PROD_FM = $value['PROD_FM'];
            $PROG_KL = $value['PROG_KL'];
            $PROG_FM = $value['PROG_FM'];
            
            $data[$ID] = array (
                'ID'        => $ID,
                'DATE_PROD' => $DATE_PROD,
                'PROD_KL'   => $PROD_KL,
                'PROD_FM'   => $PROD_FM,
                'PROG_KL'   => $PROG_KL,
                'PROG_FM'   => $PROG_FM
            );
        }
        
        return $query->result_array();
    }

    public function get_dash_D_SP($date_start, $date_end) {
        $oracle = $this->load->database('oramso', TRUE);
        $query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PROD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR (PROD.DATE_PROD, 'DD-MM-YY') AS TGL,
                                        ROWNUM,
                                        PROD.DATE_PROD,
                                        PROD.PROD_KL,
                                        PROD.PROD_FM,
                                        PROG.PROG_KL,
                                        PROG.PROG_FM
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        (
                                                                KL2_PROD + KL3_PROD + KL4_PROD + KL5_PROD
                                                        ) AS PROD_KL,
                                                        (
                                                                FM2_PROD + FM3_PROD + FM41_PROD + FM42_PROD + FM51_PROD + FM52_PROD + FMDM_PROD
                                                        ) AS PROD_FM
                                                FROM
                                                        PIS_SP_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM-DD') BETWEEN '$date_start'
                                                AND '$date_end'
                                        ) PROD
                                LEFT JOIN (
                                        SELECT
                                                DATE_PROD,
                                                (
                                                        KL2_PROD + KL3_PROD + KL4_PROD + KL5_PROD
                                                ) AS PROG_KL,
                                                (
                                                        FM2_PROD + FM3_PROD + FM41_PROD + FM42_PROD + FM51_PROD + FM52_PROD + FMDM_PROD
                                                ) AS PROG_FM
                                        FROM
                                                PIS_SP_PROGNOSE
                                        WHERE
                                                TO_CHAR (DATE_PROD, 'YYYY-MM-DD') BETWEEN '$date_start'
                                        AND '$date_end'
                                ) PROG ON PROD.DATE_PROD = PROG.DATE_PROD
                                ORDER BY
                                        PROD.DATE_PROD");

        foreach ($query->result_array() as $value) {
            $ID = $value['ID'];
            $DATE_PROD = $value['DATE_PROD'];
            $PROD_KL = $value['PROD_KL'];
            $PROD_FM = $value['PROD_FM'];
            $PROG_KL = $value['PROG_KL'];
            $PROG_FM = $value['PROG_FM'];
            
            $data[$ID] = array (
                'ID'        => $ID,
                'DATE_PROD' => $DATE_PROD,
                'PROD_KL'   => $PROD_KL,
                'PROD_FM'   => $PROD_FM,
                'PROG_KL'   => $PROG_KL,
                'PROG_FM'   => $PROG_FM
            );
        }
        
        return $query->result_array();
    }

    public function get_dash_D_ST($date_start, $date_end) {
        $oracle = $this->load->database('oramso', TRUE);
        $query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PROD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR (PROD.DATE_PROD, 'DD-MM-YY') AS TGL,
                                        ROWNUM,
                                        PROD.DATE_PROD,
                                        PROD.PROD_KL,
                                        PROD.PROD_FM,
                                        PROG.PROG_KL,
                                        PROG.PROG_FM
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        (
                                                                KL2_PROD + KL3_PROD + KL4_PROD + KL5_PROD
                                                        ) AS PROD_KL,
                                                        (
                                                                FM2_PROD + FM3_PROD + FM41_PROD + FM42_PROD + FM51_PROD + FM52_PROD
                                                        ) AS PROD_FM
                                                FROM
                                                        PIS_ST_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM-DD') BETWEEN '$date_start'
                                                AND '$date_end'
                                        ) PROD
                                LEFT JOIN (
                                        SELECT
                                                DATE_PROD,
                                                (
                                                        KL2_PROD + KL3_PROD + KL4_PROD + KL5_PROD
                                                ) AS PROG_KL,
                                                (
                                                        FM2_PROD + FM3_PROD + FM41_PROD + FM42_PROD + FM51_PROD + FM52_PROD
                                                ) AS PROG_FM
                                        FROM
                                                PIS_ST_PROGNOSE
                                        WHERE
                                                TO_CHAR (DATE_PROD, 'YYYY-MM-DD') BETWEEN '$date_start'
                                        AND '$date_end'
                                ) PROG ON PROD.DATE_PROD = PROG.DATE_PROD
                                ORDER BY
                                        PROD.DATE_PROD");

        foreach ($query->result_array() as $value) {
            $ID = $value['ID'];
            $DATE_PROD = $value['DATE_PROD'];
            $PROD_KL = $value['PROD_KL'];
            $PROD_FM = $value['PROD_FM'];
            $PROG_KL = $value['PROG_KL'];
            $PROG_FM = $value['PROG_FM'];
            
            $data[$ID] = array (
                'ID'        => $ID,
                'DATE_PROD' => $DATE_PROD,
                'PROD_KL'   => $PROD_KL,
                'PROD_FM'   => $PROD_FM,
                'PROG_KL'   => $PROG_KL,
                'PROG_FM'   => $PROG_FM
            );
        }
        
        return $query->result_array();
    }

    public function get_dash_D_TLCC($date_start, $date_end) {
        $oracle = $this->load->database('oramso', TRUE);
        $query = $oracle->query("SELECT
                                        TO_NUMBER (
                                                TO_CHAR (PROD.DATE_PROD, 'DD')
                                        ) AS ID,
                                        TO_CHAR (PROD.DATE_PROD, 'DD-MM-YY') AS TGL,
                                        ROWNUM,
                                        PROD.DATE_PROD,
                                        PROD.PROD_KL,
                                        PROD.PROD_FM,
                                        PROG.PROG_KL,
                                        PROG.PROG_FM
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        KL1_PROD AS PROD_KL,
                                                        (FMMP_PROD + FMHCM_PROD) AS PROD_FM
                                                FROM
                                                        PIS_TLCC_PRODDAILY
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM-DD') BETWEEN '$date_start'
                                                AND '$date_end'
                                        ) PROD
                                LEFT JOIN (
                                        SELECT
                                                DATE_PROD,
                                                KL1_PROD AS PROG_KL,
                                                (FMMP_PROD + FMHCM_PROD) AS PROG_FM
                                        FROM
                                                PIS_TLCC_PROGNOSE
                                        WHERE
                                                TO_CHAR (DATE_PROD, 'YYYY-MM-DD') BETWEEN '$date_start'
                                        AND '$date_end'
                                ) PROG ON PROD.DATE_PROD = PROG.DATE_PROD
                                ORDER BY
                                        PROD.DATE_PROD");

        foreach ($query->result_array() as $value) {
            $ID = $value['ID'];
            $DATE_PROD = $value['DATE_PROD'];
            $PROD_KL = $value['PROD_KL'];
            $PROD_FM = $value['PROD_FM'];
            $PROG_KL = $value['PROG_KL'];
            $PROG_FM = $value['PROG_FM'];
            
            $data[$ID] = array (
                'ID'        => $ID,
                'DATE_PROD' => $DATE_PROD,
                'PROD_KL'   => $PROD_KL,
                'PROD_FM'   => $PROD_FM,
                'PROG_KL'   => $PROG_KL,
                'PROG_FM'   => $PROG_FM
            );
        }
        
        return $query->result_array();
    }

    // </editor-fold>

    public function get_dash_CMRelease_TLCC($date_start, $date_end) {
        $oracle = $this->load->database('oramso', TRUE);
        $query = $oracle->query("");
        return $query->result_array();
    }

    public function get_dash_CMInventory_TLCC($date_start, $date_end) {
        $oracle = $this->load->database('oramso', TRUE);
        $query = $oracle->query("");
        return $query->result_array();
    }

    public function get_dash_CLInventory_TLCC($date_start, $date_end) {
        $oracle = $this->load->database('oramso', TRUE);
        $query = $oracle->query("");
        return $query->result_array();
    }

}
