<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mplant_rembang extends CI_Model {

    function GetProduction($thn) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        BULAN, '$thn' as TAHUN,
                                        COALESCE (LIMESTONE, '0') AS LIMESTONE,
                                        COALESCE (RAWMIX, '0') AS RAWMIX,
                                        COALESCE (CLINKER, '0') AS CLINKER,
                                        COALESCE (SILICA, '0') AS SILICA,
                                        COALESCE (FINECOAL, '0') AS FINECOAL,
                                        COALESCE (CEMENT, '0') AS CEMENT
                                        FROM 
                                            PIS_RKAP_TOTAL
                                        WHERE
                                            COMPANY = 5000
                                        AND TAHUN = $thn");

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

    function getProdFinishMill($thn) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        MONTH_PROD,
                                        (
                                                SUM (FM1_PROD) + SUM (FM2_PROD) 
                                        ) AS RMB
                                FROM
                                        PIS_SGR_PRODMONTH
                                WHERE
                                        MONTH_PROD LIKE '%$thn%'
                                GROUP BY
                                        MONTH_PROD
                                ORDER BY
                                        MONTH_PROD ASC");
        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $data [$value["MONTH_PROD"]] = array(
                    'fm1' => $value["RMB"]
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
                                                SUM (
                                                        CAST (
                                                                REPLACE (KL1_PROD, ',', '.') AS FLOAT
                                                        )
                                                )
                                        ) AS KL1
                                FROM
                                        PIS_SGR_PRODMONTH
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
                    'kl1' => $value["KL1"]
                );
            }
        } else {
            $klin = "";
        }

        return $klin;
    }

    function getRKAPClinkerPlant($thn) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        '$thn' AS TAHUN,
                                        (
                                                SELECT
                                                        (
                                                                SUM (CAST(CLINKER AS NUMERIC))
                                                        ) AS rkap_clinker
                                                FROM
                                                        PIS_RKAP_PLANT
                                                WHERE
                                                        COMPANY = '5000'
                                                AND PLANT = 'rmb1'
                                                AND TAHUN LIKE '%$thn%'
                                        ) AS KL1
                                FROM
                                        PIS_RKAP_PLANT
                                WHERE
                                        ROWNUM = 1");
        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $rkap_klin [$value["TAHUN"]] = array(
                    'kl1' => $value["KL1"]
                );
            }
        } else {
            $rkap_klin = "";
        }
        return $rkap_klin;
    }

    function getRKAPCementPlant($thn) {
        $oracle = $this->load->database('oramso', TRUE);
//        $Query = $oracle->query("SELECT '$thn' as
//                                            TAHUN,
//                                            ( SELECT SUM ((CEMENT)) AS RKAP_CEMENT
//                                                    FROM PIS_RKAP_PLANT
//                                                    WHERE COMPANY = '5000'
//                                                        AND PLANT = 'rmb1'
//                                                        AND TAHUN = '$thn'
//                                                ) AS FM1,
//                                            ( SELECT SUM ((CEMENT)) AS RKAP_CEMENT
//                                                    FROM PIS_RKAP_PLANT
//                                                    WHERE COMPANY = '5000'
//                                                        AND PLANT = 'rmb2'
//                                                        AND TAHUN = '$thn'
//                                                ) AS FM2
//                                                
//                                            FROM PIS_RKAP_PLANT
//                                            WHERE  ROWNUM = 1");
//        $Q = $Query->result_array();
//        if (!empty($Q)) {
//            foreach ($Query->result_array() as $value) {
//                $rkap_cement [$value["TAHUN"]] = array(
//                    'fm1' => $value["FM1"],
//                    'fm2' => $value["FM2"]
//                );
//            }
//        } else {
//            $rkap_cement = "";
//        }
        $Query = $oracle->query("SELECT '$thn' as
                                            TAHUN,
                                            ( SELECT SUM ((CEMENT)) AS RKAP_CEMENT
                                                    FROM PIS_RKAP_PLANT
                                                    WHERE COMPANY = '5000'
                                                        AND PLANT = 'rmb1'
                                                        AND TAHUN = '$thn'
                                                ) AS FM1
                                            FROM PIS_RKAP_PLANT
                                            WHERE  ROWNUM = 1");
        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $rkap_cement [$value["TAHUN"]] = array(
                    'fm1' => $value["FM1"]
                );
            }
        } else {
            $rkap_cement = "";
        }
        return $rkap_cement;
    }
}
