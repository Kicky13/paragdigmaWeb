<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mplant_padang extends CI_Model {

    function data_onOff() {
        $postgresql = $this->load->database('psqlsatu', TRUE);
        $Query = $postgresql->query("SELECT a.tag_name,a.waktu,b.value,b.quality FROM (select tag_name,max(timestamp) as waktu from log_padang where tag_name in (
                                        'N11.R1M03M1',
                                        'N12.W1W03_05M1',
                                        'N12.K1M03M1',
                                        'N13.Z1M03M1',
                                        'N21.R2M03M1',
                                        'N22.W2W03_05M1',
                                        'N22.K2M03M1',
                                        'N23.Z2M03M1',
                                        'T_4R1.M03M1_M2',
                                        'T_4R2.M03M1',
                                        'T_4W1.W03_W05',
                                        'T_4K2.M03M1',
                                        'T_4K3.M03M1_FC',
                                        'T_4Z1.M03M1_M2',
                                        'T_4Z2.M03M1',
                                        'T_5R1.M03M1',
                                        'T_5R2.M03M1',
                                        'T_5W1.W03M1',
                                        'T_5K1.M03M1',
                                        'T_5Z1.M03M1',
                                        'T_5Z2.M03M1')
                                    GROUP BY tag_name) a
                                    LEFT JOIN log_padang b ON a.tag_name = b.tag_name and a.waktu = b.timestamp");

        foreach ($Query->result() as $rows) {
            $data [trim($rows->tag_name)][0] = $rows->value;
            $data [trim($rows->tag_name)][1] = $rows->quality;
        }
        return $data;
    }

    function data_Analog() {
        $postgresql = $this->load->database('psqlsatu', TRUE);
        $Query = $postgresql->query("SELECT a.tag_name,a.waktu,b.value,b.quality FROM (select tag_name,max(timestamp) as waktu from log_padang where tag_name not in (
                                        'N11.R1M03M1',
                                        'N12.W1W03_05M1',
                                        'N12.K1M03M1',
                                        'N13.Z1M03M1',
                                        'N21.R2M03M1',
                                        'N22.W2W03_05M1',
                                        'N22.K2M03M1',
                                        'N23.Z2M03M1',
                                        'T_4R1.M03M1_M2',
                                        'T_4R2.M03M1',
                                        'T_4W1.W03_W05',
                                        'T_4K2.M03M1',
                                        'T_4K3.M03M1_FC',
                                        'T_4Z1.M03M1_M2',
                                        'T_4Z2.M03M1',
                                        'T_5R1.M03M1',
                                        'T_5R2.M03M1',
                                        'T_5W1.W03M1',
                                        'T_5K1.M03M1',
                                        'T_5Z1.M03M1',
                                        'T_5Z2.M03M1')
                                    GROUP BY tag_name) a
                                    LEFT JOIN log_padang b ON a.tag_name = b.tag_name and a.waktu = b.timestamp");
        foreach ($Query->result() as $rows) {
            $data [trim($rows->tag_name)][0] = $rows->value;
            $data [trim($rows->tag_name)][1] = $rows->quality;
        }
        return $data;
    }

    function GetProduction($thn) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                    BULAN,
                                    TAHUN,
                                    COALESCE (LIMESTONE, '0') AS LIMESTONE,
                                    COALESCE (RAWMIX, '0') AS RAWMIX,
                                    COALESCE (CLINKER, '0') AS CLINKER,
                                    COALESCE (SILICA, '0') AS SILICA,
                                    COALESCE (FINECOAL, '0') AS FINECOAL,
                                    COALESCE (CEMENT, '0') AS CEMENT
                                    FROM 
                                        PIS_RKAP_TOTAL
                                    WHERE
                                        COMPANY = 3000
                                    AND TAHUN = $thn");
        foreach ($Query->result() as $rows) {
            $Data[$rows->BULAN] = array('BULAN' => $rows->BULAN,
                'limestone' => $rows->LIMESTONE,
                'rawmix' => $rows->RAWMIX,
                'clinker' => $rows->CLINKER,
                'silica' => $rows->SILICA,
                'finecoal' => $rows->FINECOAL,
                'cement' => $rows->CEMENT);
        }

        if(!empty($Data)){
            return $Data;
        } else {
            return 0;
        }
        
    }

    function getProdFinishMill($thn) {
        $ora_mso = $this->load->database('oramso', TRUE);
        $Query = $ora_mso->query("SELECT
                                    MONTH_PROD,
                                    SUM (FM2_PROD) AS INDARUNG2,
                                    SUM (FM3_PROD) AS INDARUNG3,
                                    (
                                            SUM (FM41_PROD) + SUM (FM42_PROD)
                                    ) AS INDARUNG4,
                                    (
                                            SUM (FM51_PROD) + SUM (FM52_PROD)
                                    ) AS INDARUNG5,
                                    SUM (FMDM_PROD) AS DUMAI,
                                    SUM (FM61_PROD) AS INDARUNG6
                            FROM
                                    PIS_SP_PRODMONTH
                            WHERE
                                    MONTH_PROD LIKE '%$thn%'
                            GROUP BY
                                    MONTH_PROD
                            ORDER BY
                                    MONTH_PROD");
        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $data [$value["MONTH_PROD"]] = array(
                    'indarung2' => $value["INDARUNG2"],
                    'indarung3' => $value["INDARUNG3"],
                    'indarung4' => $value["INDARUNG4"],
                    'indarung5' => $value["INDARUNG5"],
                    'indarung6' => $value["INDARUNG6"],
                    'dumai' => $value["DUMAI"]
                );
            }
        } else {
            $data = "";
        }

        return $data;
    }

    function getProdKlinker($thn) {
        $ora_mso = $this->load->database('oramso', TRUE);
        $Query = $ora_mso->query("SELECT
                        MONTH_PROD,
                        SUM (KL2_PROD) AS INDARUNG2,
                        SUM (KL3_PROD) AS INDARUNG3,
                        SUM (KL4_PROD) AS INDARUNG4,
                        SUM (KL5_PROD) AS INDARUNG5,
                        SUM (KL6_PROD) AS INDARUNG6
                        FROM
                                PIS_SP_PRODMONTH
                        WHERE
                                MONTH_PROD LIKE '%$thn%'
                        GROUP BY
                                MONTH_PROD
                        ORDER BY
                                MONTH_PROD ASC");
        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $klin [$value["MONTH_PROD"]] = array(
                    'indarung2' => $value["INDARUNG2"],
                    'indarung3' => $value["INDARUNG3"],
                    'indarung4' => $value["INDARUNG4"],
                    'indarung5' => $value["INDARUNG5"],
                    'indarung6' => $value["INDARUNG6"],
                );
            }
        } else {
            $klin = "";
        }

        return $klin;
    }

    function getRKAPClinkerPlant($thn) {
        $ora_mso = $this->load->database('oramso', TRUE);
        $Query = $ora_mso->query("SELECT '$thn' as TAHUN,(
                SELECT (SUM(CLINKER)) AS rkap_clinker FROM PIS_RKAP_PLANT WHERE company = '3000' AND plant = 'ind2' AND TO_CHAR(tahun) = '$thn') AS indarung2, (
                SELECT (SUM(CLINKER)) AS rkap_clinker FROM PIS_RKAP_PLANT WHERE company = '3000' AND plant = 'ind3' AND TO_CHAR(tahun) = '$thn') AS indarung3, (
                SELECT (SUM(CLINKER)) AS rkap_clinker FROM PIS_RKAP_PLANT WHERE company = '3000' AND plant IN ('ind41', 'ind42') AND TO_CHAR(tahun) = '$thn') AS indarung4, (
                SELECT (SUM(CLINKER)) AS rkap_clinker FROM PIS_RKAP_PLANT WHERE company = '3000' AND plant IN ('ind51', 'ind52') AND TO_CHAR(tahun) = '$thn') AS indarung5, (
                SELECT (SUM(CLINKER)) AS rkap_clinker FROM PIS_RKAP_PLANT WHERE company = '3000' AND plant = 'ind6' AND TO_CHAR(tahun) = '$thn') AS indarung6
                FROM PIS_RKAP_PLANT WHERE ROWNUM = 1");
        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $rkap_klin [$value["TAHUN"]] = array(
                    'indarung2' => $value["INDARUNG2"],
                    'indarung3' => $value["INDARUNG3"],
                    'indarung4' => $value["INDARUNG4"],
                    'indarung5' => $value["INDARUNG5"],
                    'indarung6' => $value["INDARUNG6"],
                );
            }
        } else {
            $rkap_klin = "";
        }
        return $rkap_klin;
    }

    function getRKAPCementPlant($thn) {
        $ora_mso = $this->load->database('oramso', TRUE);
        $Query = $ora_mso->query("SELECT '$thn' as TAHUN,(
                SELECT (SUM(CEMENT)) AS rkap_cement FROM PIS_RKAP_PLANT WHERE company = '3000' AND plant = 'ind2' AND TO_CHAR(tahun) = '$thn') AS indarung2, (
                SELECT (SUM(CEMENT)) AS rkap_cement FROM PIS_RKAP_PLANT WHERE company = '3000' AND plant = 'ind3' AND TO_CHAR(tahun) = '$thn') AS indarung3, (
                SELECT (SUM(CEMENT)) AS rkap_cement FROM PIS_RKAP_PLANT WHERE company = '3000' AND plant IN ('ind41', 'ind42') AND TO_CHAR(tahun) = '$thn') AS indarung4, (
                SELECT (SUM(CEMENT)) AS rkap_cement FROM PIS_RKAP_PLANT WHERE company = '3000' AND plant IN ('ind51', 'ind52') AND TO_CHAR(tahun) = '$thn') AS indarung5, (
                SELECT (SUM(CEMENT)) AS rkap_cement FROM PIS_RKAP_PLANT WHERE company = '3000' AND plant = 'ind6' AND TO_CHAR(tahun) = '$thn') AS indarung6, (
                SELECT (SUM(CEMENT)) AS rkap_cement FROM PIS_RKAP_PLANT WHERE company = '3000' AND plant = 'dmi' AND TO_CHAR(tahun) = '$thn') AS dumai
                FROM PIS_RKAP_PLANT WHERE ROWNUM = 1");
        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $rkap_cement [$value["TAHUN"]] = array(
                    'indarung2' => $value["INDARUNG2"],
                    'indarung3' => $value["INDARUNG3"],
                    'indarung4' => $value["INDARUNG4"],
                    'indarung5' => $value["INDARUNG5"],
                    'indarung6' => $value["INDARUNG6"],
                    'dumai' => $value["DUMAI"]
                );
            }
        } else {
            $rkap_cement = "";
        }
        return $rkap_cement;
    }

}
