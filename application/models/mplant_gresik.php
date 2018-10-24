<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mplant_gresik extends CI_Model {

    function data_Plg() {
        $oracle = $this->load->database('orasatu', TRUE);
        $Query = $oracle->query("select TBH.SORT,TBH.PNTIDC,TBH.PLANTC,TBH.TEXT,TBX.PNTTEXT,TBX.VALUEDEFAULT,TBX.ONRLT, SYSDATE AS NOW,
                                        HourTOCHAR((SYSDATE - TBX.ONRLT)*24) AS SEL
                                         from
                                        (SELECT TB1.*,TB2.* FROM (select SORT,PNTID as PNTIDC,LOCATION as PLANTC,TEXT from TEXT_CONFIG WHERE FLAG=1 GROUP BY PNTID,SORT,LOCATION,TEXT) tb1
                                        left join 
                                        (select PNTID as PNTIDM,to_char(MAX(ONRLT),'YYYYMMDD HH24:MI:SS') as TIMESET, PLANT AS PLANTM from PLG_EVENT_NEW
                                                group by PNTID,PLANT) tb2
                                        ON (tb1.PNTIDC=tb2.PNTIDM and tb1.PLANTC =tb2.PLANTM)
                                        )TBH
                                        LEFT JOIN PLG_EVENT_NEW TBX
                                        ON TBH.PNTIDM = TBX.PNTID AND TBH.TIMESET = to_char(TBX.ONRLT,'YYYYMMDD HH24:MI:SS') AND TBH.PLANTM = TBX.PLANT");
        foreach ($Query->result() as $rows) {
            $data [trim($rows->PNTIDC)][1] = $rows->VALUEDEFAULT;
        }
        return $data;
    }

    function data_duration() {
        $oracle = $this->load->database('orasatu', TRUE);
        $Query = $oracle->query("select TBH.SORT,TBH.PNTIDC,TBH.PLANTC,TBH.TEXT,TBX.PNTTEXT,TBX.VALUEDEFAULT,TBX.ONRLT, SYSDATE AS NOW,
                                    HourTOCHAR((SYSDATE - TBX.ONRLT)*24) AS SEL
                                     from
                                    (SELECT TB1.*,TB2.* FROM (select SORT,PNTID as PNTIDC,LOCATION as PLANTC,TEXT from TEXT_CONFIG WHERE FLAG=1 GROUP BY PNTID,SORT,LOCATION,TEXT) tb1
                                    left join 
                                    (select PNTID as PNTIDM,to_char(MAX(ONRLT),'YYYYMMDD HH24:MI:SS') as TIMESET, PLANT AS PLANTM from PLG_EVENT_NEW
                                            group by PNTID,PLANT) tb2
                                    ON (tb1.PNTIDC=tb2.PNTIDM and tb1.PLANTC =tb2.PLANTM)
                                    )TBH
                                    LEFT JOIN PLG_EVENT_NEW TBX
                                    ON TBH.PNTIDM = TBX.PNTID AND TBH.TIMESET = to_char(TBX.ONRLT,'YYYYMMDD HH24:MI:SS') AND TBH.PLANTM = TBX.PLANT");
        foreach ($Query->result() as $rows) {
            $data[trim($rows->SORT)] = $rows->SEL;
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
                                        COMPANY = 7000
                                    AND TAHUN =$thn");

        foreach ($Query->result() as $rows) {
            $Data[$rows->BULAN] = array('BULAN' => $rows->BULAN,
                'limestone' => $rows->LIMESTONE,
                'rawmix' => $rows->RAWMIX,
                'clinker' => $rows->CLINKER,
                'silica' => $rows->SILICA,
                'finecoal' => $rows->FINECOAL,
                'cement' => $rows->CEMENT);
        }
        return $Data;
    }

    function getProdFinishMill($thn) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                MONTH_PROD,
                                ( SUM (FM1_PROD) + SUM (FM2_PROD) + SUM (FM9_PROD) ) AS TUBAN1,
                                ( SUM (FM3_PROD) + SUM (FM4_PROD)) AS TUBAN2,
                                ( SUM (FM5_PROD) + SUM (FM6_PROD) ) AS TUBAN3,
                                ( SUM (FM7_PROD) + SUM (FM8_PROD) ) AS TUBAN4,
                                ( SUM (FMA_PROD) + SUM (FMB_PROD) + SUM (FMC_PROD) ) AS GRESIK
                                FROM PIS_SG_PRODMONTH
                                WHERE MONTH_PROD LIKE '%$thn%'
                                GROUP BY MONTH_PROD
                                ORDER BY MONTH_PROD ASC");
        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $tes [$value["MONTH_PROD"]] = array(
                    'tuban1' => $value["TUBAN1"],
                    'tuban2' => $value["TUBAN2"],
                    'tuban3' => $value["TUBAN3"],
                    'tuban4' => $value["TUBAN4"],
                    'gresik' => $value["GRESIK"]
                );
            }
        } else {
            $tes = "";
        }

        return $tes;
    }

    function getProdKlinker($thn) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                    MONTH_PROD,
                    SUM (KL1_PROD) AS TUBAN1,
                    SUM (KL2_PROD) AS TUBAN2,
                    SUM (KL3_PROD) AS TUBAN3,
                    SUM (KL4_PROD) AS TUBAN4
                    FROM PIS_SG_PRODMONTH
                    WHERE MONTH_PROD LIKE '%$thn%'
                    GROUP BY MONTH_PROD
                    ORDER BY MONTH_PROD ASC");
        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $klin [$value["MONTH_PROD"]] = array(
                    'tuban1' => $value["TUBAN1"],
                    'tuban2' => $value["TUBAN2"],
                    'tuban3' => $value["TUBAN3"],
                    'tuban4' => $value["TUBAN4"]
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
                SELECT (SUM(CLINKER)) AS rkap_clinker FROM PIS_RKAP_PLANT WHERE company = '7000' AND plant = 'tbn1' AND TO_CHAR(tahun) = '$thn') AS tuban1, (
                SELECT (SUM(CLINKER)) AS rkap_clinker FROM PIS_RKAP_PLANT WHERE company = '7000' AND plant = 'tbn2' AND TO_CHAR(tahun) = '$thn') AS tuban2, (
                SELECT (SUM(CLINKER)) AS rkap_clinker FROM PIS_RKAP_PLANT WHERE company = '7000' AND plant = 'tbn3' AND TO_CHAR(tahun) = '$thn') AS tuban3, (
                SELECT (SUM(CLINKER)) AS rkap_clinker FROM PIS_RKAP_PLANT WHERE company = '7000' AND plant = 'tbn4' AND TO_CHAR(tahun) = '$thn') AS tuban4, (
                SELECT (SUM(CLINKER)) AS rkap_clinker FROM PIS_RKAP_PLANT WHERE company = '7000' AND plant = 'rmb1' AND TO_CHAR(tahun) = '$thn') AS rembang
                FROM PIS_RKAP_PLANT WHERE ROWNUM = 1");
        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $rkap_klin [$value["TAHUN"]] = array(
                    'tuban1' => $value["TUBAN1"],
                    'tuban2' => $value["TUBAN2"],
                    'tuban3' => $value["TUBAN3"],
                    'tuban4' => $value["TUBAN4"],
                    'gresik' => $value["REMBANG"]
                );
            }
        } else {
            $rkap_klin = "";
        }
        return $rkap_klin;
    }

    function getRKAPCementPlant($thn) {
        $ora_mso = $this->load->database('oramso', TRUE);
        $Query = $ora_mso->query("SELECT '$thn' as tahun,(
                SELECT (SUM(CEMENT)) AS rkap_cement FROM PIS_RKAP_PLANT WHERE company = '7000' AND plant = 'tbn1' AND TO_CHAR(tahun) = '$thn') AS tuban1, (
                SELECT (SUM(CEMENT)) AS rkap_cement FROM PIS_RKAP_PLANT WHERE company = '7000' AND plant = 'tbn2' AND TO_CHAR(tahun) = '$thn') AS tuban2, (
                SELECT (SUM(CEMENT)) AS rkap_cement FROM PIS_RKAP_PLANT WHERE company = '7000' AND plant = 'tbn3' AND TO_CHAR(tahun) = '$thn') AS tuban3, (
                SELECT (SUM(CEMENT)) AS rkap_cement FROM PIS_RKAP_PLANT WHERE company = '7000' AND plant = 'tbn4' AND TO_CHAR(tahun) = '$thn') AS tuban4, (
                SELECT (SUM(CEMENT)) AS rkap_cement FROM PIS_RKAP_PLANT WHERE company = '7000' AND plant = 'grs' AND TO_CHAR(tahun) = '$thn') AS gresik, (
                SELECT (SUM(CEMENT)) AS rkap_cement FROM PIS_RKAP_PLANT WHERE company = '7000' AND plant = 'rmb1' AND TO_CHAR(tahun) = '$thn') AS rembang, (
                SELECT (SUM(CEMENT)) AS rkap_cement FROM PIS_RKAP_PLANT WHERE company = '7000' AND plant = 'cgd' AND TO_CHAR(tahun) = '$thn') AS cigading
                FROM PIS_RKAP_PLANT WHERE ROWNUM = 1");
        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $rkap_cement [$value["TAHUN"]] = array(
                    'tuban1' => $value["TUBAN1"],
                    'tuban2' => $value["TUBAN2"],
                    'tuban3' => $value["TUBAN3"],
                    'tuban4' => $value["TUBAN4"],
                    'gresik' => $value["GRESIK"],
                    'rembang' => $value["REMBANG"],
                    'cigading' => $value["CIGADING"]
                );
            }
        } else {
            $rkap_cement = "";
        }
        return $rkap_cement;
    }

    function get_prod_rembang() {
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
                                        COMPANY = 7000
                                    AND TAHUN =$thn");

        foreach ($Query->result() as $rows) {
            $Data[$rows->BULAN] = array('BULAN' => $rows->BULAN,
                'limestone' => $rows->LIMESTONE,
                'rawmix' => $rows->RAWMIX,
                'clinker' => $rows->CLINKER,
                'silica' => $rows->SILICA,
                'finecoal' => $rows->FINECOAL,
                'cement' => $rows->CEMENT);
        }
        return $Data;
    }

    function maintenance_cost_upload($data) {
        if (strpos($data['COPART_OBJNAME'], "'") !== false) {
            $copart_objname = "q'[" . $data['COPART_OBJNAME'] . "]'";
            $this->db->set("COPART_OBJNAME", " q'[" . $data['COPART_OBJNAME'] . "]' ", false);
        } else {
            $copart_objname = $data['COPART_OBJNAME'];
            $this->db->set("COPART_OBJNAME", $data['COPART_OBJNAME']);
        }

        if (strpos($data['NAME'], "'") !== false) {
            $copart_objname = "q'[" . $data['NAME'] . "]'";
            $this->db->set("NAME", " q'[" . $data['NAME'] . "]' ", false);
        } else {
            $copart_objname = $data['NAME'];
            $this->db->set("NAME", $data['NAME']);
        }

        unset($data['NAME']);
        unset($data['COPART_OBJNAME']);

        $this->db->set("POSTG_DATE", "TO_DATE('" . $data['POSTG_DATE'] . "', 'YYYY-MM-DD')", false);
        unset($data['POSTG_DATE']);

        $result = $this->db->insert('MSO_PM_MAINT_COST', $data);
        $url = base_url() . 'index.php/plant_gresik/maintenance_cost_input';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';

//        if ($result == 1) {
//            return 'Data Sukses Diupdate';
//            $url = base_url() . 'index.php/plant_gresik/maintenance_cost_input';
//            echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
//        } else {
//            return 'Data Gagal Diupdate';
//            $url = base_url() . 'index.php/plant_gresik/maintenance_cost_input';
//            echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
//        }
    }

    function maintenance_cost_chart() {
        $oracle = $this->load->database('oramso', TRUE);

        if (!empty($_GET['bulan'])) {
            $bulan = $_GET['bulan'];
        } else {
            $bulan = date('n');
        }
        if (!empty($_GET['tahun'])) {
            $tahun = $_GET['tahun'];
        } else {
            $tahun = date('Y');
        }
        if (!empty($_GET['param'])) {
            $param = $_GET['param'];
        } else {
            $param = 'KELP_CE';
        }

        $Query = $oracle->query("SELECT
                                        ROWNUM AS NO,
                                        A.*
                                FROM
                                        (
                                                SELECT
                                                        $param AS CHART,
                                                        SUM (TO_NUMBER(OBJ_CURR)) AS COST
                                                FROM
                                                        MSO_PM_MAINT_COST
                                                WHERE
                                                        MONTH = $bulan
                                                AND TAHUN = $tahun
                                                GROUP BY
                                                        $param
                                        ) A");

        foreach ($Query->result() as $rows) {
            $no = $rows->NO;
            $chart = $rows->CHART;
            $cost = $rows->COST;

            $jml["s" . $no] = array(
                'type' => $chart,
                'amount' => $cost
            );
        }
        echo "{" . '"count"' . ":" . $no . "," . '"data"' . ":", json_encode($jml), "}";
    }

    function maintenance_perf_data() {
        $oracle = $this->load->database('oramso', TRUE);

        if (!empty($_GET['company'])) {
            $company = $_GET['company'];
        } else {
            $company = 7000;
        }
        if (!empty($_GET['tahun'])) {
            $tahun = $_GET['tahun'];
        } else {
            $tahun = date('Y');
        }
        if (!empty($_GET['cat'])) {
            $category = $_GET['cat'];
        } else {
            $category = 'UTILISASI';
        }

        $Query = $oracle->query("SELECT
                                        ROWNUM AS ID,
                                        T .*
                                FROM
                                        (
                                                SELECT
                                                        A .*, ROUND (
                                                                (
                                                                        NVL (B01_DATA, 0) + NVL (B02_DATA, 0) + NVL (B03_DATA, 0) + NVL (B04_DATA, 0) + NVL (B05_DATA, 0) + NVL (B06_DATA, 0) + NVL (B07_DATA, 0) + NVL (B08_DATA, 0) + NVL (B09_DATA, 0) + NVL (B10_DATA, 0) + NVL (B11_DATA, 0) + NVL (B12_DATA, 0)
                                                                ) / (
                                                                        SELECT
                                                                                MAX (BULAN)
                                                                        FROM
                                                                                MSO_PM_PERFORMANCE
                                                                )
                                                        ) AS TOTAL
                                                FROM
                                                        (
                                                                SELECT
                                                                        *
                                                                FROM
                                                                        MSO_PM_PERFORMANCE
                                                                WHERE
                                                                        CATEGORY = '$category'
                                                                AND TAHUN = $tahun
                                                                AND COMPANY = $company
                                                                UNION
                                                                        SELECT
                                                                                COMPANY,
                                                                                PLANT,
                                                                                'TOTAL_PLANT' AS EQUIPMENT,
                                                                                TAHUN,
                                                                                BULAN,
                                                                                TO_CHAR (ROUND(SUM(DATA_INPUT) / 6)) AS DATA,
                                                                                SATUAN,
                                                                                CATEGORY
                                                                        FROM
                                                                                MSO_PM_PERFORMANCE
                                                                        WHERE
                                                                                CATEGORY = '$category'
                                                                        AND TAHUN = $tahun
                                                                        AND COMPANY = $company
                                                                        GROUP BY
                                                                                COMPANY,
                                                                                PLANT,
                                                                                TAHUN,
                                                                                BULAN,
                                                                                SATUAN,
                                                                                CATEGORY
                                                        ) PIVOT (
                                                                SUM (ROUND(NVL(DATA_INPUT, 0))) AS DATA FOR BULAN IN (
                                                                        '01' AS \"B01\",
                                                                        '02' AS \"B02\",
                                                                        '03' AS \"B03\",
                                                                        '04' AS \"B04\",
                                                                        '05' AS \"B05\",
                                                                        '06' AS \"B06\",
                                                                        '07' AS \"B07\",
                                                                        '08' AS \"B08\",
                                                                        '09' AS \"B09\",
                                                                        '10' AS \"B10\",
                                                                        '11' AS \"B11\",
                                                                        '12' AS \"B12\"
                                                                )
                                                        ) A
                                                ORDER BY
                                                        PLANT,
                                                        CASE
                                                WHEN EQUIPMENT = 'TOTAL_PLANT' THEN
                                                        1
                                                WHEN EQUIPMENT = 'CRUSHER' THEN
                                                        2
                                                WHEN EQUIPMENT = 'RAW_MILL' THEN
                                                        3
                                                WHEN EQUIPMENT = 'KILN' THEN
                                                        4
                                                WHEN EQUIPMENT = 'COAL_MILL' THEN
                                                        5
                                                WHEN EQUIPMENT = 'FINISH_MILL' THEN
                                                        6
                                                WHEN EQUIPMENT = 'PACKER' THEN
                                                        7
                                                END
                                        ) T");

        $Q = $Query->result_array();
        $result = array("data" => $Q);
        echo json_encode($result);
    }

    function backlog_data() {
        $oracle = $this->load->database('oramso', TRUE);

        if (!empty($_GET['company'])) {
            $company = $_GET['company'];
        } else {
            $company = 7000;
        }
        if (!empty($_GET['tahun'])) {
            $tahun = $_GET['tahun'];
        } else {
            $tahun = date('Y');
        }

        $Query = $oracle->query("SELECT
                                        *
                                FROM
                                        (
                                                SELECT
                                                        *
                                                FROM
                                                        (
                                                                SELECT
                                                                        'BACKLOG' AS STATUS,
                                                                        TANGGAL,
                                                                        PLANT,
                                                                        NVL (
                                                                                ROUND (
                                                                                        OPEN_STATUS / (
                                                                                                NVL (CLOSE_STATUS, 0) + NVL (OPEN_STATUS, 0)
                                                                                        ) * 100
                                                                                ),
                                                                                0
                                                                        ) JML
                                                                FROM
                                                                        (
                                                                                SELECT
                                                                                        CASE
                                                                                WHEN ASTNR LIKE 'CRTD%'
                                                                                OR ASTNR LIKE 'REL%' THEN
                                                                                        'OPEN'
                                                                                ELSE
                                                                                        'CLOSE'
                                                                                END STATUS,
                                                                                SUBSTR (GSTRP, 5, 2) TANGGAL,
                                                                                WERKS PLANT,
                                                                                COUNT (AUFNR) JML
                                                                        FROM
                                                                                MSO_ORDER
                                                                        WHERE
                                                                                GSTRP LIKE '$tahun%'
                                                                        AND SUBSTR (WERKS, 1, 1) = SUBSTR ('$company', 1, 1)
                                                                        GROUP BY
                                                                                SUBSTR (GSTRP, 5, 2),
                                                                                WERKS,
                                                                                CASE
                                                                        WHEN ASTNR LIKE 'CRTD%'
                                                                        OR ASTNR LIKE 'REL%' THEN
                                                                                'OPEN'
                                                                        ELSE
                                                                                'CLOSE'
                                                                        END
                                                                        ) PIVOT (
                                                                                SUM (JML) AS STATUS FOR (STATUS) IN (
                                                                                        'OPEN' AS \"OPEN\",
                                                                                        'CLOSE' AS \"CLOSE\"
                                                                                )
                                                                        )
                                                                UNION
                                                                        SELECT
                                                                                CASE
                                                                        WHEN ASTNR LIKE 'CRTD%'
                                                                        OR ASTNR LIKE 'REL%' THEN
                                                                                'OPEN'
                                                                        ELSE
                                                                                'CLOSE'
                                                                        END STATUS,
                                                                        SUBSTR (GSTRP, 5, 2) TANGGAL,
                                                                        WERKS PLANT,
                                                                        COUNT (AUFNR) JML
                                                                FROM
                                                                        MSO_ORDER
                                                                WHERE
                                                                        GSTRP LIKE '$tahun%'
                                                                AND SUBSTR (WERKS, 1, 1) = SUBSTR ('$company', 1, 1)
                                                                GROUP BY
                                                                        SUBSTR (GSTRP, 5, 2),
                                                                        WERKS,
                                                                        CASE
                                                                WHEN ASTNR LIKE 'CRTD%'
                                                                OR ASTNR LIKE 'REL%' THEN
                                                                        'OPEN'
                                                                ELSE
                                                                        'CLOSE'
                                                                END
                                                        )
                                                ORDER BY
                                                        PLANT,
                                                        TANGGAL
                                        ) PIVOT (
                                                SUM (JML) AS BLN FOR (TANGGAL) IN (
                                                        '01' AS \"B01\",
                                                        '02' AS \"B02\",
                                                        '03' AS \"B03\",
                                                        '04' AS \"B04\",
                                                        '05' AS \"B05\",
                                                        '06' AS \"B06\",
                                                        '07' AS \"B07\",
                                                        '08' AS \"B08\",
                                                        '09' AS \"B09\",
                                                        '10' AS \"B10\",
                                                        '11' AS \"B11\",
                                                        '12' AS \"B12\"
                                                )
                                        )
                                ORDER BY
                                        PLANT,
                                        STATUS");
        foreach ($Query->result() as $rows) {
            $status = $rows->STATUS;
            $plant = $rows->PLANT;
            $b01_bln = $rows->B01_BLN;
            $b02_bln = $rows->B02_BLN;
            $b03_bln = $rows->B03_BLN;
            $b04_bln = $rows->B04_BLN;
            $b05_bln = $rows->B05_BLN;
            $b06_bln = $rows->B06_BLN;
            $b07_bln = $rows->B07_BLN;
            $b08_bln = $rows->B08_BLN;
            $b09_bln = $rows->B09_BLN;
            $b10_bln = $rows->B10_BLN;
            $b11_bln = $rows->B11_BLN;
            $b12_bln = $rows->B12_BLN;


            $jml["s" . $no] = array(
                'type' => $chart,
                'amount' => $cost
            );
        }
        echo "{" . '"count"' . ":" . $no . "," . '"data"' . ":", json_encode($jml), "}";
    }

}
