<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mplant_tonasa extends CI_Model {

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
                                        COMPANY = 4000
                                AND TAHUN =$thn");
        foreach ($Query->result() as $rows) {
            $Data[$rows->BULAN] = array('BULAN' => $rows->BULAN,
                'limistone' => $rows->LIMESTONE,
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

    function getProdFinisihMill($thn) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT MONTH_PROD,
                                ( SUM ( CAST ( REPLACE (FM2_PROD, ',', '.') AS FLOAT)))AS TONASA2,
                                ( SUM ( CAST ( REPLACE (FM3_PROD, ',', '.') AS FLOAT)))AS TONASA3,
                                
                                ( SUM ( CAST ( REPLACE (FM41_PROD, ',', '.') AS FLOAT)))+
                                ( SUM ( CAST ( REPLACE (FM42_PROD, ',', '.') AS FLOAT)))AS TONASA4,
                                
                                ( SUM ( CAST ( REPLACE (FM51_PROD, ',', '.') AS FLOAT)))+
                                ( SUM ( CAST ( REPLACE (FM52_PROD, ',', '.') AS FLOAT)))AS TONASA5
                                FROM
                                        PIS_ST_PRODMONTH
                                WHERE
                                        SUBSTR (MONTH_PROD, 1, 4) LIKE '%$thn%'
                                GROUP BY
                                        MONTH_PROD
                                ORDER BY
                                        MONTH_PROD ASC");
        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $data [$value["MONTH_PROD"]] = array(
                    'tonasa2' => $value["TONASA2"],
                    'tonasa3' => $value["TONASA3"],
                    'tonasa4' => $value["TONASA4"],
                    'tonasa5' => $value["TONASA5"]
                );
            }
        } else {
            $data = "";
        }

        return $data;
    }

    function getProdKlinker($thn) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                MONTH_PROD,
                                (
                                        SUM(CAST (REPLACE (KL2_PROD, ',', '.') AS FLOAT))
                                ) AS TONASA2,
                                (
                                        SUM(CAST (REPLACE (KL3_PROD, ',', '.') AS FLOAT))
                                ) AS TONASA3,
                                (
                                        SUM(CAST (REPLACE (KL4_PROD, ',', '.') AS FLOAT))
                                ) AS TONASA4,
                                (
                                        SUM(CAST (REPLACE (KL5_PROD, ',', '.') AS FLOAT))
                                ) AS TONASA5
                                FROM
                                        PIS_ST_PRODMONTH
                                WHERE 
                                SUBSTR (MONTH_PROD, 1, 4) LIKE '%$thn%'
                                GROUP BY
                                        MONTH_PROD
                                ORDER BY
                                        MONTH_PROD ASC");

        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $klin [$value["MONTH_PROD"]] = array(
                    'tonasa2' => $value["TONASA2"],
                    'tonasa3' => $value["TONASA3"],
                    'tonasa4' => $value["TONASA4"],
                    'tonasa5' => $value["TONASA5"],
                );
            }
        } else {
            $klin = "";
        }
        return $klin;
    }

    function getRKAPClinkerPlant($thn) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT '$thn' AS
                                    TAHUN,
                                    (SELECT( SUM (CAST(CLINKER AS NUMERIC))) AS rkap_clinker
                                            FROM PIS_RKAP_PLANT
                                            WHERE COMPANY = 4000
                                            AND PLANT = 'tns2'
                                            AND TAHUN LIKE '%$thn%'
                                    ) AS TONASA2,
                                    
                                    ( SELECT ( SUM (CAST(CLINKER AS NUMERIC)) ) AS rkap_clinker
                                            FROM PIS_RKAP_PLANT
                                            WHERE COMPANY = 4000
                                            AND PLANT = 'tns3'
                                            AND TAHUN LIKE '%$thn%'
                                    ) AS TONASA3,
                                    
                                    ( SELECT ( SUM (CAST(CLINKER AS NUMERIC)) ) AS PIS_RKAP_PLANT
                                            FROM PIS_RKAP_PLANT
                                            WHERE COMPANY = 4000
                                            AND PLANT IN ('tns41','tns42')
                                            AND TAHUN LIKE '%$thn%'
                                    ) AS TONASA4,
                                    
                                    ( SELECT ( SUM (CAST(CLINKER AS NUMERIC)) ) AS rkap_clinker
                                            FROM PIS_RKAP_PLANT
                                            WHERE COMPANY = 4000
                                            AND PLANT IN ('tns51','tns52')
                                            AND TAHUN LIKE '%$thn%' ) AS TONASA5
                                    
                                FROM PIS_RKAP_PLANT WHERE ROWNUM = 1");

        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $rkap_klin [$value["TAHUN"]] = array(
                    'tonasa2' => $value["TONASA2"],
                    'tonasa3' => $value["TONASA3"],
                    'tonasa4' => $value["TONASA4"],
                    'tonasa5' => $value["TONASA5"]
                );
            }
        } else {
            $rkap_klin = "";
        }
        return $rkap_klin;
    }

    function getRKAPCementPlant($thn) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT '$thn' AS
                                    TAHUN,
                                    (SELECT( SUM (CAST(CEMENT AS NUMERIC))) AS rkap_clinker
                                            FROM PIS_RKAP_PLANT
                                            WHERE COMPANY = 4000
                                            AND PLANT = 'tns2'
                                            AND TAHUN LIKE '%$thn'
                                    ) AS TONASA2,
                                    
                                    ( SELECT ( SUM (CAST(CEMENT AS NUMERIC)) ) AS rkap_clinker
                                            FROM PIS_RKAP_PLANT
                                            WHERE COMPANY = 4000
                                            AND PLANT = 'tns3'
                                            AND TAHUN LIKE '%$thn%'
                                    ) AS TONASA3,
                                    
                                    ( SELECT ( SUM (CAST(CEMENT AS NUMERIC)) ) AS PIS_RKAP_PLANT
                                            FROM PIS_RKAP_PLANT
                                            WHERE COMPANY = 4000
                                            AND PLANT IN ('tns41','tns42')
                                            AND TAHUN LIKE '%$thn%'
                                    ) AS TONASA4,
                                    
                                    ( SELECT ( SUM (CAST(CEMENT AS NUMERIC)) ) AS rkap_clinker
                                            FROM PIS_RKAP_PLANT
                                            WHERE COMPANY = 4000
                                            AND PLANT IN ('tns51','tns52')
                                            AND TAHUN LIKE '%$thn%' ) AS TONASA5
                                    
                                FROM PIS_RKAP_PLANT WHERE ROWNUM = 1");

        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $rkap_cement [$value["TAHUN"]] = array(
                    'tonasa2' => $value["TONASA2"],
                    'tonasa3' => $value["TONASA3"],
                    'tonasa4' => $value["TONASA4"],
                    'tonasa5' => $value["TONASA5"]
                );
            }
        } else {
            $rkap_cement = "";
        }
        return $rkap_cement;
    }

}
