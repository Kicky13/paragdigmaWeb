<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mplant_eksekutif extends CI_Model {

//////////////==================================================================================================================================================================//////    
//////////////==============QUERY TERAK TON REAL FOR ALL===============////////
    function get_ton_real_opco_dan_plant($input, $tahun, $data, $mesin, $tanggal_mesin) {
        if (empty($input['periode'])) {
            $input['periode'] = date('m');
        }
        if (empty($input['tahun'])) {
            $input['tahun'] = date('Y');
        }
//////////////==============PADANG PER PLANT===============////////
        if ($data == 2 and ! empty($mesin) and ! empty($tanggal_mesin)) {
            $oracle = $this->load->database('oramso', TRUE);
            $Query = $oracle->query("SELECT DATE_PROD,
                                        SUBSTR (DATE_PROD, 1, 2) AS tanggal,
                                        TO_CHAR(DATE_PROD, 'MM') AS bulan,
                                        SUBSTR (DATE_PROD, 8, 2) AS tahun,
                                        $mesin AS TON_REAL
                                        FROM PIS_SP_PRODDAILY
                                        WHERE TO_CHAR(DATE_PROD, 'YYYY-MM') = '" . $input['tahun'] . "-$tanggal_mesin'
                                        ORDER BY DATE_PROD
                                    ");
            $data = array();
            $ton_real = array();
            foreach ($Query->result() as $rows) {
                $ton_real [(float) ($rows->DATE_PROD)][] = $rows->TON_REAL;
            }
            for ($i = 1; $i <= count($ton_real); $i++) {
                $data[$i] = array('TON_REAL' => array_sum($ton_real[$i]));
            }
        }

//////////////==============PADANG PER OPCO===============/////////
        elseif ($data == 2) {
            $oracle = $this->load->database('oramso', TRUE);
            $Query = $oracle->query("SELECT DATE_PROD,
                                    SUBSTR (DATE_PROD, 1, 2) AS tanggal,
                                    TO_CHAR(DATE_PROD, 'MM') AS bulan,
                                    (KL2_PROD + KL3_PROD + KL4_PROD + KL5_PROD) AS TON_REAL
                                    FROM PIS_SP_PRODDAILY
                                    WHERE TO_CHAR(DATE_PROD, 'YYYY-MM') = '" . $input['tahun'] . "-" . sprintf('%02d', $input['periode']) . "'
                                    ORDER BY DATE_PROD
                                    ");
            $data = array();
            $ton_real = array();
            foreach ($Query->result() as $rows) {
                $ton_real [(float) ($rows->DATE_PROD)][] = $rows->TON_REAL;
            }
            for ($i = 1; $i <= count($ton_real); $i++) {
                $data[$i] = array('TON_REAL' => array_sum($ton_real[$i]));
            }
        }

//////////////==============GRESIK PER PLANT===============////////
        if ($data == 3 and ! empty($mesin) and ! empty($tanggal_mesin)) {
            $oracle = $this->load->database('oramso', TRUE);
            $Query = $oracle->query("SELECT DATE_PROD,
                                        SUBSTR (DATE_PROD, 1, 2) AS tanggal,
                                        TO_CHAR(DATE_PROD, 'MM') AS bulan,
                                        SUBSTR (DATE_PROD, 8, 2) AS tahun,
                                        $mesin AS TON_REAL
                                        FROM PIS_SG_PRODDAILY
                                        WHERE TO_CHAR(DATE_PROD, 'YYYY-MM') = '" . $input['tahun'] . "-$tanggal_mesin'
                                        ORDER BY DATE_PROD
                                    ");
            $data = array();
            $ton_real = array();
            foreach ($Query->result() as $rows) {
                $ton_real [(float) ($rows->DATE_PROD)][] = $rows->TON_REAL;
            }
            for ($i = 1; $i <= count($ton_real); $i++) {
                $data[$i] = array('TON_REAL' => array_sum($ton_real[$i]));
            }
        }

//////////////==============GRESIK PER OPCO===============///////
        elseif ($data == 3) {
            $oracle = $this->load->database('oramso', TRUE);
            $Query = $oracle->query("SELECT DATE_PROD,
                                        SUBSTR (DATE_PROD, 1, 2) AS tanggal,
                                        TO_CHAR(DATE_PROD, 'MM') AS bulan,
                                        SUBSTR (DATE_PROD, 8, 2) AS tahun,
                                        (KL1_PROD + KL2_PROD + KL3_PROD +KL4_PROD) AS TON_REAL
                                        FROM PIS_SG_PRODDAILY
                                        WHERE TO_CHAR(DATE_PROD, 'YYYY-MM') = '" . $input['tahun'] . "-" . sprintf('%02d', $input['periode']) . "'
                                        ORDER BY DATE_PROD
                                    ");
            $data = array();
            $ton_real = array();
            foreach ($Query->result() as $rows) {
                $ton_real [(float) ($rows->DATE_PROD)][] = $rows->TON_REAL;
            }
            for ($i = 1; $i <= count($ton_real); $i++) {
                $data[$i] = array('TON_REAL' => array_sum($ton_real[$i]));
            }
        }

//////////////==============TONASA PER PLANT===============////////
        if ($data == 4 and ! empty($mesin) and ! empty($tanggal_mesin)) {
            $oracle = $this->load->database('oramso', TRUE);
            $Query = $oracle->query("SELECT DATE_PROD,
                                        SUBSTR (DATE_PROD, 1, 2) AS tanggal,
                                        TO_CHAR(DATE_PROD, 'MM') AS bulan,
                                        SUBSTR (DATE_PROD, 8, 2) AS tahun,
                                        $mesin AS TON_REAL
                                        FROM PIS_ST_PRODDAILY
                                        WHERE TO_CHAR(DATE_PROD, 'YYYY-MM') = '" . $input['tahun'] . "-$tanggal_mesin'
                                        ORDER BY DATE_PROD
                                    ");
            $data = array();
            $ton_real = array();
            foreach ($Query->result() as $rows) {
                $ton_real [(float) ($rows->DATE_PROD)][] = $rows->TON_REAL;
            }
            for ($i = 1; $i <= count($ton_real); $i++) {
                $data[$i] = array('TON_REAL' => array_sum($ton_real[$i]));
            }
        }

//////////////==============TONASA PER OPCO===============////////
        elseif ($data == 4) {
            $oracle = $this->load->database('oramso', TRUE);
            $Query = $oracle->query("SELECT DATE_PROD,
                                        SUBSTR (DATE_PROD, 1, 2) AS tanggal,
                                        TO_CHAR(DATE_PROD, 'MM') AS bulan,
                                        SUBSTR (DATE_PROD, 8, 2) AS tahun,
                                        (KL2_PROD + KL3_PROD + KL4_PROD + KL5_PROD) AS TON_REAL
                                        FROM PIS_ST_PRODDAILY
                                        WHERE TO_CHAR(DATE_PROD, 'YYYY-MM') = '" . $input['tahun'] . "-" . sprintf('%02d', $input['periode']) . "'
                                        ORDER BY DATE_PROD
                                    ");
            $data = array();
            $ton_real = array();
            foreach ($Query->result() as $rows) {
                $ton_real [(float) ($rows->DATE_PROD)][] = $rows->TON_REAL;
            }
            for ($i = 1; $i <= count($ton_real); $i++) {
                $data[$i] = array('TON_REAL' => array_sum($ton_real[$i]));
            }
        }

//////////////==============TLCC OPCO======================////////
        if ($data == 5) {
            $oracle = $this->load->database('oramso', TRUE);
            $Query = $oracle->query("SELECT DATE_PROD,
                                        SUBSTR (DATE_PROD, 1, 2) AS tanggal,
                                        TO_CHAR(DATE_PROD, 'MM') AS bulan,
                                        SUBSTR (DATE_PROD, 8, 2) AS tahun,
                                        KL1_PROD AS TON_REAL
                                        FROM PIS_TLCC_PRODDAILY
                                        WHERE TO_CHAR(DATE_PROD, 'YYYY-MM') = '" . $input['tahun'] . "-" . sprintf('%02d', $input['periode']) . "'
                                        ORDER BY DATE_PROD
                                    ");
            $data = array();
            $ton_real = array();
            foreach ($Query->result() as $rows) {
                $ton_real [(float) ($rows->DATE_PROD)][] = $rows->TON_REAL;
            }
            for ($i = 1; $i <= count($ton_real); $i++) {
                $data[$i] = array('TON_REAL' => array_sum($ton_real[$i]));
            }
        }

        //////////////==============REMBANG PER PLANT===============////////
        if ($data == 6 and ! empty($mesin) and ! empty($tanggal_mesin)) {
            $oracle = $this->load->database('oramso', TRUE);
            $Query = $oracle->query("SELECT DATE_PROD,
                                        SUBSTR (DATE_PROD, 1, 2) AS tanggal,
                                        TO_CHAR(DATE_PROD, 'MM') AS bulan,
                                        SUBSTR (DATE_PROD, 8, 2) AS tahun,
                                        $mesin AS TON_REAL
                                        FROM PIS_SGR_PRODDAILY
                                        WHERE TO_CHAR(DATE_PROD, 'YYYY-MM') = '" . $input['tahun'] . "-$tanggal_mesin'
                                        ORDER BY DATE_PROD
                                    ");
            $data = array();
            $ton_real = array();
            foreach ($Query->result() as $rows) {
                $ton_real [(float) ($rows->DATE_PROD)][] = $rows->TON_REAL;
            }
            for ($i = 1; $i <= count($ton_real); $i++) {
                $data[$i] = array('TON_REAL' => array_sum($ton_real[$i]));
            }
        }

//////////////==============REMBANG PER OPCO===============////////
        elseif ($data == 6) {
            $oracle = $this->load->database('oramso', TRUE);
            $Query = $oracle->query("SELECT DATE_PROD,
                                        SUBSTR (DATE_PROD, 1, 2) AS tanggal,
                                        TO_CHAR(DATE_PROD, 'MM') AS bulan,
                                        SUBSTR (DATE_PROD, 8, 2) AS tahun,
                                        KL1_PROD AS TON_REAL
                                        FROM PIS_SGR_PRODDAILY
                                        WHERE TO_CHAR(DATE_PROD, 'YYYY-MM') = '" . $input['tahun'] . "-" . sprintf('%02d', $input['periode']) . "'
                                        ORDER BY DATE_PROD
                                    ");
            $data = array();
            $ton_real = array();
            foreach ($Query->result() as $rows) {
                $ton_real [(float) ($rows->DATE_PROD)][] = $rows->TON_REAL;
            }
            for ($i = 1; $i <= count($ton_real); $i++) {
                $data[$i] = array('TON_REAL' => array_sum($ton_real[$i]));
            }
        }
        return $data;
    }

    function get_ton_real_clinker_SI($tahun, $bulan) {
        if (empty($bulan['periode'])) {
            $bulan['periode'] = date('m');
        }
        if (strlen($bulan['periode']) < 2) {
            $my_month2 = '0' . $bulan['periode'];
        } else {
            $my_month2 = $bulan['periode'];
        }

        if (empty($tahun['tahun'])) {
            $tahun['tahun'] = date('Y');
        }
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT CLINKER as CLINKER FROM V_CLINKER_SMIG WHERE TO_CHAR(DATE_PROD,'YYYY-MM') = '" . $tahun['tahun'] . "-$my_month2'");

        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $data[] = array(
                    'CLINKER' => $value["CLINKER"]
                );
            }
        } else {
            $data = "";
        }
        return $data;
    }

//////////////=================================================================================================================================================////////
//////////////==============QUERY TERAK TON DESIGN FOR ALL===============////////
    public function get_ton_design_klinker($plant, $tahun, $input, $tanggal_mesin) {
        if (empty($input['periode'])) {
            $input['periode'] = date('mm');
        }
        if (empty($tahun['tahun'])) {
            $tahun['tahun'] = date('Y');
        }
        if (strlen($input['periode']) < 2) {
            $my_month2 = '0' . $input['periode'];
        } else {
            $my_month2 = $input['periode'];
        }
        $oracle = $this->load->database('oramso', TRUE);
        if (!empty($plant) and ! empty($tanggal_mesin)) {
            $Query = $oracle->query("SELECT CLINKER FROM PIS_CAPACITY_PLANT
                        WHERE PLANT = '$plant'
                        AND TAHUN = " . $tahun['tahun'] . "
                        AND BULAN = $tanggal_mesin
                            ");
            $Q = $Query->result_array();
        } else {
            $Query = $oracle->query("SELECT CLINKER FROM PIS_CAPACITY_PLANT
                                    WHERE PLANT = '$plant'
                                    AND TAHUN = " . $tahun['tahun'] . "
                                    AND BULAN = $my_month2
                                        ");
            $Q = $Query->result_array();
        }
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $data[] = array(
                    'CLINKER' => $value["CLINKER"]
                );
            }
        } else {
            $data = "";
        }

        return $data;
    }

    public function get_ton_design_klinker_opco($company, $tahun, $bulan) {
        if (empty($bulan['periode'])) {
            $bulan['periode'] = date('m');
        }
        if (empty($tahun['tahun'])) {
            $tahun['tahun'] = date('Y');
        }
        $oracle = $this->load->database('oramso', TRUE);
        if ($tahun['tahun'] >= 2017) {
            $Query = $oracle->query("SELECT SUM (CLINKER) AS CLINKER FROM PIS_CAPACITY_PLANT
                                    WHERE COMPANY = $company
                                    AND TAHUN = " . $tahun['tahun'] . "
                                    AND BULAN = " . $bulan['periode'] . "
                                    AND PLANT != 'rmb1'");
        } else {
            $Query = $oracle->query("SELECT SUM (CLINKER) AS  CLINKER FROM PIS_CAPACITY_PLANT
                                    WHERE COMPANY = $company
                                    AND TAHUN = " . $tahun['tahun'] . "
                                    AND BULAN = " . $bulan['periode'] . "
                                    ");
        }
        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $data[] = array(
                    'CLINKER' => $value["CLINKER"]
                );
            }
        } else {
            $data = "";
        }
        return $data;
    }

    public function get_ton_design_clinker_SI($tahun, $bulan) {
        if (empty($bulan['periode'])) {
            $bulan['periode'] = date('m');
        }
        if (strlen($bulan['periode']) < 2) {
            $my_month2 = '0' . $bulan['periode'];
        } else {
            $my_month2 = $bulan['periode'];
        }

        if (empty($tahun['tahun'])) {
            $tahun['tahun'] = date('Y');
        }
        $oracle = $this->load->database('oramso', TRUE);
        if ($tahun['tahun'] >= 2017) {
            $Query = $oracle->query("SELECT SUM (CLINKER) AS CLINKER
                                FROM PIS_CAPACITY_PLANT
                                WHERE TAHUN = " . $tahun['tahun'] . "
                                AND BULAN = $my_month2 AND PLANT !='rmb1'");
        } else {
            $Query = $oracle->query("SELECT SUM (CLINKER) AS CLINKER
                                FROM PIS_CAPACITY_PLANT
                                WHERE TAHUN = " . $tahun['tahun'] . "
                                AND BULAN = $my_month2");
        }
        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $data[] = array(
                    'CLINKER' => $value["CLINKER"]
                );
            }
        } else {
            $data = "";
        }

        return $data;
    }

//////////////=================================================================================================================================================////////
//////////////==============QUERY TERAK PROGNOSE PERHARIAN FOR ALL===============////////
    public function get_ton_prognose_klinker($company, $plant, $tahun, $bulan, $tanggal_mesin) {
        if (empty($input['periode'])) {
            $input['periode'] = date('m');
        }
        if (empty($tahun['tahun'])) {
            $tahun['tahun'] = date('Y');
        }
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT COMPANY, CLINKER
                                FROM PIS_PROGNOSA_PLANT
                                WHERE COMPANY = $company
                                AND PLANT = '$plant'
                                AND TAHUN = " . $tahun['tahun'] . "
                                AND BULAN = " . $input['periode'] . "");

        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $data["COMPANY"] = array(
                    'CLINKER' => $value["CLINKER"]
                );
            }
        } else {
            $data = "";
        }

        return $data;
    }

    public function get_ton_prognose_klinker_opco($company, $tahun, $bulan) {
        if (empty($input['periode'])) {
            $input['periode'] = date('m');
        }
        if (empty($tahun['tahun'])) {
            $tahun['tahun'] = date('Y');
        }
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT COMPANY, SUM(CLINKER) AS CLINKER
                                FROM PIS_PROGNOSA_PLANT
                                WHERE COMPANY = $company
                                AND TAHUN = " . $tahun['tahun'] . "
                                AND BULAN = " . $input['periode'] . "
                                GROUP BY COMPANY");

        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $data["COMPANY"] = array(
                    'CLINKER' => $value["CLINKER"]
                );
            }
        } else {
            $data = "";
        }

        return $data;
    }

    public function get_ton_prognose_clinker_SI($tahun, $bulan) {
        if (empty($bulan['periode'])) {
            $bulan['periode'] = date('m');
        }
        if (strlen($bulan['periode']) < 2) {
            $my_month2 = '0' . $bulan['periode'];
        } else {
            $my_month2 = $bulan['periode'];
        }
        if (empty($tahun['tahun'])) {
            $tahun['tahun'] = date('Y');
        }
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("
                                SELECT SUM(CLINKER) AS CLINKER
                                FROM PIS_PROGNOSA_PLANT
                                WHERE TAHUN = " . $tahun['tahun'] . "
                                AND BULAN = $my_month2
                                GROUP BY TAHUN");

        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $data["COMPANY"] = array(
                    'CLINKER' => $value["CLINKER"]
                );
            }
        } else {
            $data = "";
        }
        return $data;
    }

//////////////=================================================================================================================================================////////
//////////////==============QUERY TERAK TON BUDGET FOR ALL===============////////
    public function get_ton_budget_klinker_plant_dan_opco($plant, $tahun, $input, $my_month, $company) {
        $oracle = $this->load->database('oramso', TRUE);
        if (empty($input['periode'])) {
            $input['periode'] = date('m');
        }
//        $my_month2 = $input['periode'];
        if (strlen($input['periode']) < 2) {
            $my_month2 = '0' . $input['periode'];
        } else {
            $my_month2 = $input['periode'];
        }
        if (empty($tahun['tahun'])) {
            $tahun['tahun'] = date('Y');
        }
        if ($company == 0) {
            $Query = $oracle->query("SELECT ROUND ( RKAP_CLINKER / TO_CHAR ( LAST_DAY ( TO_DATE (
                                                            '" . $tahun['tahun'] . "-$my_month',
                                                            'YYYY-MM'
                                                    )
                                            ),
                                            'DD'
                                    )
                            ) AS BUDGET
                    FROM PIS_CAPACITY_PLANT
                    WHERE PLANT = '$plant'
                    AND BULAN = $my_month
                    AND TAHUN = " . $tahun['tahun'] . "");
            $Q = $Query->result_array();
        } else {
            $Query = $oracle->query("SELECT ROUND ( SUM(RKAP_CLINKER) / TO_CHAR ( LAST_DAY ( TO_DATE (
                                                                        '" . $tahun['tahun'] . "-$my_month2',
                                                                        'YYYY-MM'
                                                                )
                                                        ),
                                                        'DD'
                                                )
                                        ) AS BUDGET
                                FROM PIS_CAPACITY_PLANT
                                WHERE COMPANY = $company
                                AND BULAN = $my_month2
                                AND TAHUN = " . $tahun['tahun'] . "");
            $Q = $Query->result_array();
        }
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $data[] = array(
                    'BUDGET' => $value["BUDGET"]
                );
            }
        } else {
            $data = "";
        }
        return $data;
    }

    public function get_ton_budget_clinker_SI($tahun, $bulan) {
        if (empty($bulan['periode'])) {
            $bulan['periode'] = date('m');
        }
        if (strlen($bulan['periode']) < 2) {
            $my_month2 = '0' . $bulan['periode'];
        } else {
            $my_month2 = $bulan['periode'];
        }
        if (empty($tahun['tahun'])) {
            $tahun['tahun'] = date('Y');
        }
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT ROUND ( SUM(RKAP_CLINKER) / TO_CHAR (
                                                        LAST_DAY (
                                                                TO_DATE ('" . $tahun['tahun'] . "-$my_month2', 'YYYY-MM')
                                                        ),
                                                        'DD'
                                                )
                                        ) AS BUDGET
                                FROM PIS_CAPACITY_PLANT
                                WHERE BULAN = $my_month2
                                AND TAHUN = " . $tahun['tahun'] . "");
        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $data[] = array(
                    'BUDGET' => $value["BUDGET"]
                );
            }
        } else {
            $data = "";
        }
        return $data;
    }

//////////////==================================================================================================================================================================//////    
//////////////==============QUERY CEMENT TON REAL FOR ALL===============/////////////////////////////////
    function get_ton_real_cement_SI($tahun, $bulan) {
        if (empty($bulan['periode'])) {
            $bulan['periode'] = date('m');
        }
        if (strlen($bulan['periode']) < 2) {
            $my_month2 = '0' . $bulan['periode'];
        } else {
            $my_month2 = $bulan['periode'];
        }

        if (empty($tahun['tahun'])) {
            $tahun['tahun'] = date('Y');
        }
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT CEMENT as CEMENT FROM V_CEMENT_SMIG WHERE TO_CHAR(DATE_PROD,'YYYY-MM') = '" . $tahun['tahun'] . "-$my_month2'");

        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $data[] = array(
                    'CEMENT' => $value["CEMENT"]
                );
            }
        } else {
            $data = "";
        }
        return $data;
    }

    function get_ton_real_cement($bulan, $tahun, $data, $mesin, $tanggal_mesin) {
        if (empty($bulan['periode'])) {
            $bulan['periode'] = date('m');
        }
        if (empty($tahun['tahun'])) {
            $tahun['tahun'] = date('Y');
        }
////////////////==============KHUSUS SEMEN PADANG==============/////////////////
        if ($data == 2 and ! empty($mesin) and ! empty($tanggal_mesin)) {
            $oracle = $this->load->database('oramso', TRUE);
            $Query = $oracle->query("SELECT DATE_PROD,
                                    SUBSTR (DATE_PROD, 1, 2) AS tanggal,
                                    TO_CHAR (DATE_PROD, 'MM') AS bulan,
                                    SUBSTR (DATE_PROD, 8, 2) AS tahun,
                                    $mesin AS TON_REAL
                                    FROM PIS_SP_PRODDAILY
                                    WHERE TO_CHAR(DATE_PROD, 'YYYY-MM') = '" . $tahun['tahun'] . "-$tanggal_mesin'
                                    ORDER BY DATE_PROD
                                    ");
            $data = array();
            $ton_real = array();
            foreach ($Query->result() as $rows) {
                $ton_real [(float) ($rows->DATE_PROD)][] = $rows->TON_REAL;
            }
            for ($i = 1; $i <= count($ton_real); $i++) {
                $data[$i] = array('TON_REAL' => array_sum($ton_real[$i]));
            }
        } elseif ($data == 2) {
            $oracle = $this->load->database('oramso', TRUE);
            $Query = $oracle->query("SELECT DATE_PROD,
                                    SUBSTR (DATE_PROD, 1, 2) AS tanggal,
                                    TO_CHAR (DATE_PROD, 'MM') AS bulan,
                                    SUBSTR (DATE_PROD, 8, 2) AS tahun,
                                    (FM2_PROD+FM3_PROD+FM41_PROD+FM42_PROD+FM51_PROD+FM52_PROD+FMDM_PROD) AS TON_REAL
                                    FROM PIS_SP_PRODDAILY
                                    WHERE TO_CHAR(DATE_PROD, 'YYYY-MM') = '" . $tahun['tahun'] . "-" . sprintf('%02d', $bulan['periode']) . "'
                                    ORDER BY DATE_PROD
                                    ");
            $data = array();
            $ton_real = array();
            foreach ($Query->result() as $rows) {
                $ton_real [(float) ($rows->DATE_PROD)][] = $rows->TON_REAL;
            }
            for ($i = 1; $i <= count($ton_real); $i++) {
                $data[$i] = array('TON_REAL' => array_sum($ton_real[$i]));
            }
        }

        ////////////////KHUSUS SEMEN GRESIK/////////////////
        if ($data == 3 and ! empty($mesin) and ! empty($tanggal_mesin)) {
            $oracle = $this->load->database('oramso', TRUE);
            $Query = $oracle->query("SELECT DATE_PROD,
                                    SUBSTR (DATE_PROD, 1, 2) AS tanggal,
                                    TO_CHAR (DATE_PROD, 'MM') AS bulan,
                                    SUBSTR (DATE_PROD, 8, 2) AS tahun,
                                    $mesin AS TON_REAL
                                    FROM PIS_SG_PRODDAILY
                                    WHERE TO_CHAR(DATE_PROD, 'YYYY-MM') = '" . $tahun['tahun'] . "-$tanggal_mesin'
                                    ORDER BY DATE_PROD
                                    ");
            $data = array();
            $ton_real = array();
            foreach ($Query->result() as $rows) {
                $ton_real [(float) ($rows->DATE_PROD)][] = $rows->TON_REAL;
            }
            for ($i = 1; $i <= count($ton_real); $i++) {
                $data[$i] = array('TON_REAL' => array_sum($ton_real[$i]));
            }
        } elseif ($data == 3) {
            $oracle = $this->load->database('oramso', TRUE);
            $Query = $oracle->query("SELECT DATE_PROD,
                                    SUBSTR (DATE_PROD, 1, 2) AS tanggal,
                                    TO_CHAR (DATE_PROD, 'MM') AS bulan,
                                    SUBSTR (DATE_PROD, 8, 2) AS tahun,
                                    (FM1_PROD+ FM2_PROD+FM3_PROD+FM4_PROD+FM5_PROD+FM6_PROD+FM7_PROD+FM8_PROD+FM9_PROD+FMA_PROD+FMB_PROD+FMC_PROD) AS TON_REAL
                                    FROM PIS_SG_PRODDAILY
                                    WHERE TO_CHAR(DATE_PROD, 'YYYY-MM') = '" . $tahun['tahun'] . "-" . sprintf('%02d', $bulan['periode']) . "'
                                    ORDER BY DATE_PROD
                                    ");
            $data = array();
            $ton_real = array();
            foreach ($Query->result() as $rows) {
                $ton_real [(float) ($rows->DATE_PROD)][] = $rows->TON_REAL;
            }
            for ($i = 1; $i <= count($ton_real); $i++) {
                $data[$i] = array('TON_REAL' => array_sum($ton_real[$i]));
            }
        }


        ////////////////KHUSUS SEMEN TONASA/////////////////
        if ($data == 4 and ! empty($mesin) and ! empty($tanggal_mesin)) {
            $oracle = $this->load->database('oramso', TRUE);
            $Query = $oracle->query("SELECT DATE_PROD,
                                    SUBSTR (DATE_PROD, 1, 2) AS tanggal,
                                    TO_CHAR (DATE_PROD, 'MM') AS bulan,
                                    SUBSTR (DATE_PROD, 8, 2) AS tahun,
                                    $mesin AS TON_REAL
                                    FROM PIS_ST_PRODDAILY
                                    WHERE TO_CHAR(DATE_PROD, 'YYYY-MM') = '" . $tahun['tahun'] . "-$tanggal_mesin'
                                    ORDER BY DATE_PROD
                                    ");
            $data = array();
            $ton_real = array();
            foreach ($Query->result() as $rows) {
                $ton_real [(float) ($rows->DATE_PROD)][] = $rows->TON_REAL;
            }
            for ($i = 1; $i <= count($ton_real); $i++) {
                $data[$i] = array('TON_REAL' => array_sum($ton_real[$i]));
            }
        } elseif ($data == 4) {
            $oracle = $this->load->database('oramso', TRUE);
            $Query = $oracle->query("SELECT DATE_PROD,
                                    SUBSTR (DATE_PROD, 1, 2) AS tanggal,
                                    TO_CHAR (DATE_PROD, 'MM') AS bulan,
                                    SUBSTR (DATE_PROD, 8, 2) AS tahun,
                                    (FM2_PROD + FM3_PROD+FM41_PROD+FM42_PROD+FM51_PROD+FM52_PROD) AS TON_REAL
                                    FROM PIS_ST_PRODDAILY
                                    WHERE TO_CHAR(DATE_PROD, 'YYYY-MM') = '" . $tahun['tahun'] . "-" . sprintf('%02d', $bulan['periode']) . "'
                                    ORDER BY DATE_PROD
                                    ");
            $data = array();
            $ton_real = array();
            foreach ($Query->result() as $rows) {
                $ton_real [(float) ($rows->DATE_PROD)][] = $rows->TON_REAL;
            }
            for ($i = 1; $i <= count($ton_real); $i++) {
                $data[$i] = array('TON_REAL' => array_sum($ton_real[$i]));
            }
        }


        ////////////////KHUSUS SEMEN THANGLONG/////////////////
        if ($data == 5 and ! empty($mesin) and ! empty($tanggal_mesin)) {
            $oracle = $this->load->database('oramso', TRUE);
            $Query = $oracle->query("SELECT
                                    DATE_PROD,FMMP_PROD, FMHCM_PROD,
                                    SUBSTR (DATE_PROD, 1, 2) AS tanggal,
                                    TO_CHAR (DATE_PROD, 'MM') AS bulan,
                                    SUBSTR (DATE_PROD, 8, 2) AS tahun,
                                    $mesin AS TON_REAL
                                    FROM PIS_TLCC_PRODDAILY
                                    WHERE TO_CHAR(DATE_PROD, 'YYYY-MM') = '" . $tahun['tahun'] . "-$tanggal_mesin'
                                    ORDER BY DATE_PROD
                                    ");
            $data = array();
            $ton_real = array();
            foreach ($Query->result() as $rows) {
                $ton_real [(float) ($rows->DATE_PROD)][] = $rows->TON_REAL;
            }
            for ($i = 1; $i <= count($ton_real); $i++) {
                $data[$i] = array('TON_REAL' => array_sum($ton_real[$i]));
            }
        } elseif ($data == 5) {
            $oracle = $this->load->database('oramso', TRUE);
            $Query = $oracle->query("SELECT
                                    DATE_PROD,FMMP_PROD, FMHCM_PROD,
                                    SUBSTR (DATE_PROD, 1, 2) AS tanggal,
                                    TO_CHAR (DATE_PROD, 'MM') AS bulan,
                                    SUBSTR (DATE_PROD, 8, 2) AS tahun,
                                    (FMMP_PROD + FMHCM_PROD) AS TON_REAL FROM PIS_TLCC_PRODDAILY
                                    WHERE TO_CHAR(DATE_PROD, 'YYYY-MM') = '" . $tahun['tahun'] . "-" . sprintf('%02d', $bulan['periode']) . "'
                                    ORDER BY DATE_PROD
                                    ");
            $data = array();
            $ton_real = array();
            foreach ($Query->result() as $rows) {
                $ton_real [(float) ($rows->DATE_PROD)][] = $rows->TON_REAL;
            }
            for ($i = 1; $i <= count($ton_real); $i++) {
                $data[$i] = array('TON_REAL' => array_sum($ton_real[$i]));
            }
        }
        return $data;
    }

    function get_ton_real_cement_SGR($tahun, $bulan) {
        if (empty($bulan)) {
            $bln = date('m');
        }
        if (strlen($bulan) < 2) {
            $bln = '0' . $bulan;
        } else {
            $bln = $bulan;
        }

        if (empty($tahun)) {
            $thn = date('Y');
        }
        $oracle = $this->load->database('oramso', TRUE);

        $Query = $oracle->query("SELECT
                                        DATE_PROD,
                                        SUBSTR (DATE_PROD, 1, 2) AS tanggal,
                                        TO_CHAR (DATE_PROD, 'MM') AS bulan,
                                        SUBSTR (DATE_PROD, 8, 2) AS tahun,
                                        (
                                                FM1_PROD + FM2_PROD
                                        ) AS TON_REAL
                                FROM
                                        PIS_SGR_PRODDAILY
                                WHERE
                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bln'
                                ORDER BY
                                        DATE_PROD");

        $data = array();
        $ton_real = array();
        foreach ($Query->result() as $rows) {
            $ton_real [(float) ($rows->DATE_PROD)][] = $rows->TON_REAL;
        }
        for ($i = 1; $i <= count($ton_real); $i++) {
            $data[$i] = array('TON_REAL' => array_sum($ton_real[$i]));
        }
        return $data;
    }

//////////////=================================================================================================================================================////////
//////////////==============QUERY CEMENT TON DESIGN FOR ALL===============////////
    public function get_ton_design_cement_SI($tahun, $bulan) {
        if (empty($bulan['periode'])) {
            $bulan['periode'] = date('m');
        }
        if (strlen($bulan['periode']) < 2) {
            $my_month2 = '0' . $bulan['periode'];
        } else {
            $my_month2 = $bulan['periode'];
        }

        if (empty($tahun['tahun'])) {
            $tahun['tahun'] = date('Y');
        }
        $oracle = $this->load->database('oramso', TRUE);
        if ($tahun['tahun'] >= 2017) {
            $Query = $oracle->query("SELECT SUM (CEMENT) AS  CEMENT
                                FROM PIS_CAPACITY_PLANT
                                WHERE TAHUN = " . $tahun['tahun'] . "
                                AND BULAN = $my_month2
                                AND PLANT != 'tbnd'
                                AND PLANT != 'rmb1'
                                AND PLANT != 'rmb2'
                                AND PLANT != 'cgd'");
        } else {
            $Query = $oracle->query("SELECT SUM (CEMENT) AS  CEMENT
                                FROM PIS_CAPACITY_PLANT
                                WHERE TAHUN = " . $tahun['tahun'] . "
                                AND BULAN = $my_month2");
        }
        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $data[] = array(
                    'CEMENT' => $value["CEMENT"]
                );
            }
        } else {
            $data = "";
        }

        return $data;
    }

    public function get_ton_design_cement($plant, $tahun, $bulan, $tanggal_mesin) {
        if (empty($bulan['periode'])) {
            $bulan['periode'] = date('mm');
        }
        if (empty($tahun['tahun'])) {
            $tahun['tahun'] = date('Y');
        }
        if (strlen($bulan['periode']) < 2) {
            $my_month2 = '0' . $bulan['periode'];
        } else {
            $my_month2 = $bulan['periode'];
        }
        $oracle = $this->load->database('oramso', TRUE);
        if (!empty($plant) and ! empty($tanggal_mesin)) {
            $Query = $oracle->query("SELECT CEMENT FROM PIS_CAPACITY_PLANT
                        WHERE PLANT = '$plant'
                        AND TAHUN = '" . $tahun['tahun'] . "'
                        AND BULAN = '$tanggal_mesin'
                            ");
            $Q = $Query->result_array();
        } else {
            $Query = $oracle->query("SELECT CEMENT FROM PIS_CAPACITY_PLANT
                                    WHERE PLANT = '$plant'
                                    AND TAHUN = '" . $tahun['tahun'] . "'
                                    AND BULAN = '$my_month2'
                                        ");
            $Q = $Query->result_array();
        }
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $data[] = array(
                    'CEMENT' => $value["CEMENT"]
                );
            }
        } else {
            $data = "";
        }

        return $data;
    }

    public function get_ton_design_cement_opco($company, $tahun, $bulan) {
        if (empty($bulan['periode'])) {
            $bulan['periode'] = date('m');
        }
        if (empty($tahun['tahun'])) {
            $tahun['tahun'] = date('Y');
        }
        $oracle = $this->load->database('oramso', TRUE);
        if ($tahun['tahun'] >= 2017) {
            $Query = $oracle->query("SELECT SUM (CEMENT) AS CEMENT FROM PIS_CAPACITY_PLANT
                                    WHERE COMPANY = $company
                                    AND TAHUN = " . $tahun['tahun'] . "
                                    AND BULAN = " . $bulan['periode'] . "
                                    AND PLANT != 'tbnd'
                                    AND PLANT != 'rmb1'
                                    AND PLANT != 'rmb2'
                                    AND PLANT != 'cgd'");
        } else {
            $Query = $oracle->query("SELECT SUM (CEMENT) AS  CEMENT FROM PIS_CAPACITY_PLANT
                                        WHERE COMPANY = $company
                                        AND TAHUN = " . $tahun['tahun'] . "
                                        AND BULAN = " . $bulan['periode'] . "
                                        ");
        }
        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $data[] = array(
                    'CEMENT' => $value["CEMENT"]
                );
            }
        } else {
            $data = "";
        }

        return $data;
    }

//////////////=================================================================================================================================================////////
//////////////==============QUERY CEMENT TON BUDGET FOR ALL===============////////
    public function get_ton_budget_cement_SI($tahun, $bulan) {
        if (empty($bulan['periode'])) {
            $bulan['periode'] = date('m');
        }
        if (strlen($bulan['periode']) < 2) {
            $my_month2 = '0' . $bulan['periode'];
        } else {
            $my_month2 = $bulan['periode'];
        }

        if (empty($tahun['tahun'])) {
            $tahun['tahun'] = date('Y');
        }

        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT ROUND ( SUM(CEMENT) / TO_CHAR (
                                                        LAST_DAY (
                                                                TO_DATE ('" . $tahun['tahun'] . "-$my_month2', 'YYYY-MM')
                                                        ),
                                                        'DD'
                                                )
                                        ) AS BUDGET
                                FROM PIS_RKAP_PLANT
                                WHERE BULAN = $my_month2
                                AND TAHUN = " . $tahun['tahun'] . "");

        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $data[] = array(
                    'BUDGET' => $value["BUDGET"]
                );
            }
        } else {
            $data = "";
        }

        return $data;
    }

    public function get_ton_budget_cement($plant, $tahun, $bulan, $my_month, $company) {
        $oracle = $this->load->database('oramso', TRUE);
        if (empty($bulan['periode'])) {
            $bulan['periode'] = date('m');
        }
        if (strlen($bulan['periode']) < 2) {
            $my_month2 = '0' . $bulan['periode'];
        } else {
            $my_month2 = $bulan['periode'];
        }
        if (empty($tahun['tahun'])) {
            $tahun['tahun'] = date('Y');
        }
        if ($company == 0) {
            $Query = $oracle->query("SELECT ROUND ( RKAP_CEMENT / TO_CHAR ( LAST_DAY ( TO_DATE (
                                                            '" . $tahun['tahun'] . "-" . $bulan['periode'] . "',
                                                            'YYYY-MM'
                                                    )
                                            ),
                                            'DD'
                                    )
                            ) AS BUDGET
                    FROM PIS_CAPACITY_PLANT
                    WHERE PLANT = '$plant'
                    AND BULAN = $my_month
                    AND TAHUN = " . $tahun['tahun'] . "");
            $Q = $Query->result_array();
        } else {
            $Query = $oracle->query("SELECT ROUND ( SUM(RKAP_CEMENT) / TO_CHAR ( LAST_DAY ( TO_DATE (
                                                                        '" . $tahun['tahun'] . "-$my_month2',
                                                                        'YYYY-MM'
                                                                )
                                                        ),
                                                        'DD'
                                                )
                                        ) AS BUDGET
                                FROM PIS_CAPACITY_PLANT
                                WHERE COMPANY = $company
                                AND BULAN = $my_month2
                                AND TAHUN = " . $tahun['tahun'] . "");
            $Q = $Query->result_array();
        }
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $data[] = array(
                    'BUDGET' => $value["BUDGET"]
                );
            }
        } else {
            $data = "";
        }
        return $data;
    }

//////////////=================================================================================================================================================////////
///////////////////=================PROGNOSE======================//////////////////////
    public function get_ton_prognose_cement_SI($tahun, $bulan) {
        if (empty($bulan['periode'])) {
            $bulan['periode'] = date('m');
        }
        if (strlen($bulan['periode']) < 2) {
            $my_month2 = '0' . $bulan['periode'];
        } else {
            $my_month2 = $bulan['periode'];
        }
        if (empty($tahun['tahun'])) {
            $tahun['tahun'] = date('Y');
        }

        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT SUM (CEMENT) AS CEMENT
                                FROM PIS_PROGNOSA_PLANT
                                WHERE TAHUN = " . $tahun['tahun'] . "
                                AND BULAN = $my_month2
                                GROUP BY TAHUN");

        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $data["COMPANY"] = array(
                    'CEMENT' => $value["CEMENT"]
                );
            }
        } else {
            $data = "";
        }
        return $data;
    }

    public function get_ton_prognose_cement($company, $plant, $tahun, $bulan, $tanggal_mesin) {
        if (empty($bulan['periode'])) {
            $bulan['periode'] = date('m');
        }
        if (empty($tahun['tahun'])) {
            $tahun['tahun'] = date('Y');
        }
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT COMPANY, CEMENT
                                FROM PIS_PROGNOSA_PLANT
                                WHERE COMPANY = $company
                                AND PLANT = '$plant'
                                AND TAHUN = " . $tahun['tahun'] . "
                                AND BULAN = " . $bulan['periode'] . "");

        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $data["COMPANY"] = array(
                    'CEMENT' => $value["CEMENT"]
                );
            }
        } else {
            $data = "";
        }

        return $data;
    }

    public function get_ton_prognose_cement_opco($company, $tahun, $bulan) {
        if (empty($bulan['periode'])) {
            $bulan['periode'] = date('m');
        }
        if (empty($tahun['tahun'])) {
            $tahun['tahun'] = date('Y');
        }
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT COMPANY, SUM(CEMENT) AS CEMENT
                                FROM PIS_PROGNOSA_PLANT
                                WHERE COMPANY = $company
                                AND TAHUN = " . $tahun['tahun'] . "
                                AND BULAN = " . $bulan['periode'] . "
                                GROUP BY COMPANY");

        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $data["COMPANY"] = array(
                    'CEMENT' => $value["CEMENT"]
                );
            }
        } else {
            $data = "";
        }

        return $data;
    }

    ///////////////////=================LAST UPDATE======================//////////////////////
    public function get_last_update($comp, $tahun, $bulan, $my_month) {
        /////setting bulan per opco
        if (empty($bulan['periode'])) {
            $bulan['periode'] = date('m');
        }
        if (strlen($bulan['periode']) < 2) {
            $my_month2 = '0' . $bulan['periode'];
        } else {
            $my_month2 = $bulan['periode'];
        }

        if (empty($tahun['tahun'])) {
            $tahun['tahun'] = date('Y');
        }

        $oracle = $this->load->database('oramso', TRUE);
        if (empty($my_month)) {///peropco
            $Query = $oracle->query("SELECT TO_CHAR (DATE_PROD, 'YYYY-MM-DD') AS TGL
                                    FROM PIS_" . $comp . "_PRODDAILY
                                    WHERE TO_CHAR (DATE_PROD, 'YYYY-MM') = '" . $tahun['tahun'] . "-$my_month2'
                                    AND ROWNUM = 1
                                    ORDER BY DATE_PROD DESC");
            $Q = $Query->result_array();
        } else {//////permesin
            $Query = $oracle->query("SELECT TO_CHAR (DATE_PROD, 'YYYY-MM-DD') AS TGL
                        FROM PIS_" . $comp . "_PRODDAILY
                        WHERE TO_CHAR (DATE_PROD, 'YYYY-MM') = '" . $tahun['tahun'] . "-$my_month'
                        AND ROWNUM = 1
                        ORDER BY DATE_PROD DESC");
            $Q = $Query->result_array();
        }
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $data[] = array(
                    'TGL' => $value["TGL"]
                );
            }
        } else {
            $data = "";
        }
        return $data;
    }

    ///////////////////=================LAST MONTH UPDATE======================//////////////////////
    public function get_last_month_update($comp, $tahun) {
        /////setting bulan per opco
        if (empty($tahun)) {
            $tahun = date('Y');
        }

        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT TO_CHAR (DATE_PROD, 'YYYY-MM-DD') AS BULAN
                                FROM PIS_" . $comp . "_PRODDAILY
                                WHERE TO_CHAR (DATE_PROD, 'YYYY') = '$tahun'
                                AND ROWNUM = 1
                                ORDER BY DATE_PROD DESC");
        $Q = $Query->result_array();

        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $data[] = array(
                    'BULAN' => $value["BULAN"]
                );
            }
        } else {
            $data = "";
        }
        return $data;
    }

    public function get_prog_daily_update($comp, $tahun) {
        /////setting bulan per opco
        if (empty($tahun)) {
            $tahun = date('Y');
        }

        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT TO_CHAR (DATE_PROD, 'YYYY-MM-DD') AS BULAN
                                FROM PIS_" . $comp . "_PROGNOSE
                                WHERE TO_CHAR (DATE_PROD, 'YYYY') = '$tahun'
                                AND ROWNUM = 1
                                ORDER BY DATE_PROD DESC");
        $Q = $Query->result_array();

        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $data[] = array(
                    'BULAN' => $value["BULAN"]
                );
            }
        } else {
            $data = "";
        }
        return $data;
    }

    ///////////////////=================LAST JUMLAH PLANT======================//////////////////////
    public function get_jumlah_plant($comp, $tahun, $bulan) {
        if (empty($tahun)) {
            $tahun = date('Y');
        }
        if (empty($bulan['periode'])) {
            $bulan['periode'] = date('m');
        }

        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT COUNT(PLANT) FROM PIS_CAPACITY_PLANT
                                    WHERE BULAN = " . $bulan['periode'] . " AND COMPANY = $comp AND TAHUN= $tahun");
//        $Q = $Query->result_array();
        $data = $Query->row();
        return $data;
    }

    /* ##############################################################
      ##########################GET KILN OPS##########################
      ############################################################## */

    public function get_klin_ops($company, $tahun, $bulan, $plant) {
        if (empty($bulan['periode'])) {
            $bulan['periode'] = date('m');
        }
        if (strlen($bulan['periode']) < 2) {
            $my_month2 = '0' . $bulan['periode'];
        } else {
            $my_month2 = $bulan['periode'];
        }
        if (empty($tahun['tahun'])) {
            $tahun['tahun'] = date('Y');
        }
        $oracle = $this->load->database('oramso', TRUE);
        if ($plant == 0) {
            $Query = $oracle->query("SELECT DATE_PROD,STOP_COUNT,STOP_DESC
                                    FROM PIS_KILN_OPS WHERE COMPANY = $company and
                                    TO_CHAR(DATE_PROD,'YYYY-MM') = '" . $tahun['tahun'] . "-$my_month2'
                                    AND TO_CHAR(DATE_PROD,'DD') <=15 ");
        } else {
            $Query = $oracle->query("SELECT DATE_PROD,STOP_COUNT,STOP_DESC
                                FROM PIS_KILN_OPS WHERE COMPANY = $company AND PLANT = '$plant' and
                                TO_CHAR(DATE_PROD,'YYYY-MM') = '" . $tahun['tahun'] . "-$my_month2'
                                AND TO_CHAR(DATE_PROD,'DD') <=15 ");
        }
        $Q = $Query->result();
        return $Q;
    }

    public function get_klin_ops2($company, $tahun, $input, $plant) {
        if (empty($input['periode'])) {
            $input['periode'] = date('m');
        }
        if (strlen($input['periode']) < 2) {
            $my_month2 = '0' . $input['periode'];
        } else {
            $my_month2 = $input['periode'];
        }
        if (empty($tahun['tahun'])) {
            $tahun['tahun'] = date('Y');
        }
        $oracle = $this->load->database('oramso', TRUE);
        if ($plant == 0) {
            $Query = $oracle->query("SELECT DATE_PROD,STOP_COUNT,STOP_DESC
                                    FROM PIS_KILN_OPS WHERE COMPANY = $company and
                                    TO_CHAR(DATE_PROD,'YYYY-MM') = '" . $tahun['tahun'] . "-$my_month2'
                                    AND TO_CHAR(DATE_PROD,'DD') >15 ");
        } else {
            $Query = $oracle->query("SELECT DATE_PROD,STOP_COUNT,STOP_DESC
                                FROM PIS_KILN_OPS WHERE COMPANY = $company AND PLANT = '$plant' and
                                TO_CHAR(DATE_PROD,'YYYY-MM') = '" . $tahun['tahun'] . "-$my_month2'
                                AND TO_CHAR(DATE_PROD,'DD') >15 ");
        }
        $Q = $Query->result();
        return $Q;
    }

    public function get_klin_oprt() {
        if (!empty($_GET['bulan'])) {
            $bulan = $_GET['bulan'];
        } else {
            $bulan = date('m');
        }
        if (strlen($bulan) < 2) {
            $my_month2 = '0' . $bulan;
        } else {
            $my_month2 = $bulan;
        }


        if (!empty($_GET['tahun'])) {
            $tahun = $_GET['tahun'];
        } else {
            $tahun = date('Y');
        }

        if (!empty($_GET['tanggal'])) {
            $tanggal = $_GET['tanggal'];
        } else {
            $tanggal = date('D');
        }

        if (strlen($tanggal) < 2) {
            $tanggal2 = '0' . $tanggal;
        } else {
            $tanggal2 = $tanggal;
        }

        if (!empty($_GET['company'])) {
            $company = $_GET['company'];
        } else {
            $company = '7000';
        }

        if (!empty($_GET['plant'])) {
            $where1 = 'AND PLANT =' . "'" . $_GET['plant'] . "'";
        } else {
            $where1 = '';
        }

        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT TO_CHAR (DATE_PROD, 'YYYY-MON-DD') AS DATE_PROD,
                                STOP_COUNT,
                                STOP_DESC
                                FROM PIS_KILN_OPS
                                WHERE COMPANY = $company
                                $where1
                                AND TO_CHAR (DATE_PROD, 'YYYY-MM-DD') = '$tahun-$my_month2-$tanggal2'");

        $Q = $Query->result();
        echo json_encode($Q);
    }

    public function get_fm_oprt() {
        if (!empty($_GET['bulan'])) {
            $bulan = $_GET['bulan'];
        } else {
            $bulan = date('m');
        }
        if (strlen($bulan) < 2) {
            $my_month2 = '0' . $bulan;
        } else {
            $my_month2 = $bulan;
        }


        if (!empty($_GET['tahun'])) {
            $tahun = $_GET['tahun'];
        } else {
            $tahun = date('Y');
        }

        if (!empty($_GET['tanggal'])) {
            $tanggal = $_GET['tanggal'];
        } else {
            $tanggal = date('D');
        }

        if (strlen($tanggal) < 2) {
            $tanggal2 = '0' . $tanggal;
        } else {
            $tanggal2 = $tanggal;
        }

        if (!empty($_GET['company'])) {
            $company = $_GET['company'];
        } else {
            $company = '7000';
        }

        if (!empty($_GET['plant'])) {
            $where1 = 'AND PLANT =' . "'" . $_GET['plant'] . "'";
        } else {
            $where1 = '';
        }

        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_CHAR (DATE_PROD, 'YYYY-MON-DD') AS DATE_PROD,
                                        STOP_DESC
                                FROM
                                        PIS_FM_OPS
                                WHERE COMPANY = $company
                                $where1
                                AND TO_CHAR (DATE_PROD, 'YYYY-MM-DD') = '$tahun-$my_month2-$tanggal2'");

        $Q = $Query->result();
        echo json_encode($Q);
    }

    public function get_chart_interval_l($chart, $company, $plant, $tahun) {
        if (empty($tahun['tahun'])) {
            $tahun['tahun'] = date('Y');
        }
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT INTV_LEFT
                                FROM PIS_CHART_INTERVAL
                                WHERE CHART = '$chart'
                                AND COMPANY = $company
                                AND PLANT = '$plant'
                                AND TAHUN = " . $tahun['tahun'] . "");

        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $data[] = array(
                    'INTV_LEFT' => $value["INTV_LEFT"]
                );
            }
        } else {
            $data = "";
        }
        return $data;
    }

    public function get_chart_interval_r($chart, $company, $plant, $tahun) {
        if (empty($tahun['tahun'])) {
            $tahun['tahun'] = date('Y');
        }
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT INTV_RIGHT
                                FROM PIS_CHART_INTERVAL
                                WHERE CHART = '$chart'
                                AND COMPANY = $company
                                AND PLANT = '$plant'
                                AND TAHUN = " . $tahun['tahun'] . "");

        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $data[] = array(
                    'INTV_RIGHT' => $value["INTV_RIGHT"]
                );
            }
        } else {
            $data = "";
        }
        return $data;
    }

//    public function get_klin_equipment($company, $tahun, $bulan, $plant) {
//        if (empty($input['periode'])) {
//            $input['periode'] = date('m');
//        }
//        if (strlen($input['periode']) < 2) {
//            $my_month2 = '0' . $input['periode'];
//        } else {
//            $my_month2 = $input['periode'];
//        }
//
//        if (empty($tahun)) {
//            $tahun = date('Y');
//        }
//        $oracle = $this->load->database('oramso', TRUE);
//        $Query = $oracle->query("SELECT DATE_PROD,STOP_COUNT,STOP_DESC
//                                FROM PIS_KILN_OPS WHERE COMPANY = $company AND PLANT = '$plant' and
//                                TO_CHAR(DATE_PROD,'YYYY-MM') = '$tahun-$my_month2'
//                                AND TO_CHAR(DATE_PROD,'DD') <=15 ");
//
//        $Q = $Query->result();
//        return $Q;
//    }
//    
//    public function get_klin_equipment2($company, $tahun, $bulan, $plant) {
//        if (empty($input['periode'])) {
//            $input['periode'] = date('m');
//        }
//        if (strlen($input['periode']) < 2) {
//            $my_month2 = '0' . $input['periode'];
//        } else {
//            $my_month2 = $input['periode'];
//        }
//        if (empty($tahun)) {
//            $tahun = date('Y');
//        }
//        
//        $oracle = $this->load->database('oramso', TRUE);
//        $Query = $oracle->query("SELECT DATE_PROD,STOP_COUNT,STOP_DESC
//                                FROM PIS_KILN_OPS WHERE COMPANY = $company AND PLANT = '$plant' and
//                                TO_CHAR(DATE_PROD,'YYYY-MM') = '$tahun-$my_month2'
//                                AND TO_CHAR(DATE_PROD,'DD') > 15 ");
//
//        $Q = $Query->result();
//        return $Q;
//    }
//    

    function getTerakSemenIndonesia($company, $plant, $input) {
        $postgresql = $this->load->database('psqlsatu', TRUE);
        if (empty($input['periode'])) {
            $input['periode'] = date('m');
        }
        if (empty($input['tahun'])) {
            $input['tahun'] = date('Y');
        }
        $QueryE = "SELECT
                    company,
                    tahun,
                    substr(bulan,3,2) bulan,
                    substr(bulan,1,2) tanggal,
                    plant,
                    replace(ton_real,',','.') ton_real,
                    replace(ton_design,',','.') ton_design,
                    replace(ton_prognosa,',','.') ton_prognosa,
                    replace(ton_budget,',','.') ton_budget,
                    replace(accum_real,',','.') accum_real,
                    replace(avg_real,',','.') avg_real,
                    replace(accum_prognosa,',','.') accum_prognosa,
                    replace(accum_budget,',','.') accum_budget
            FROM
                    report_clinker
            WHERE
                    company = $company and
                    tahun = " . $input['tahun'] . " and
                    substr(bulan,3,2) = '" . sprintf('%02d', $input['periode']) . "' and
                    plant in (" . $plant . ")";
        $Query = $postgresql->query($QueryE);

        $data = array();
        $ton_real = array();
        foreach ($Query->result() as $rows) {
            $ton_real [(int) ($rows->tanggal)][] = $rows->ton_real;
            $ton_design [(int) ($rows->tanggal)][] = $rows->ton_design;
            $ton_prognosa [(int) ($rows->tanggal)][] = $rows->ton_prognosa;
            $ton_budget [(int) ($rows->tanggal)][] = $rows->ton_budget;
            $accum_real[(int) ($rows->tanggal)][] = $rows->accum_real;
            $avg_real [(int) ($rows->tanggal)][] = $rows->avg_real;
            $accum_prognosa [(int) ($rows->tanggal)][] = $rows->accum_prognosa;
            $accum_budget [(int) ($rows->tanggal)][] = $rows->accum_budget;
        }
        for ($i = 1; $i <= count($ton_real); $i++) {
            $data[$i] = array('ton_real' => array_sum($ton_real[$i]),
                'ton_design' => array_sum($ton_design[$i]),
                'ton_prognosa' => array_sum($ton_prognosa[$i]),
                'ton_budget' => array_sum($ton_budget[$i]),
                'accum_real' => array_sum($accum_real[$i]),
                'avg_real' => array_sum($avg_real[$i]),
                'accum_prognosa' => array_sum($accum_prognosa[$i]),
                'accum_budget' => array_sum($accum_budget[$i]));
        }
        return $data;
    }

    function getPlantMaster($company, $plant) {

        $postgresql = $this->load->database('psqlsatu', TRUE);
        $Query = $postgresql->query("select plant,name,company from master_plant where company=$company and plant in (" . $plant . ") and parent='1'");
        $data = array();
        foreach ($Query->result() as $rows) {
            $data[] = array('value' => $rows->plant, 'nama' => $rows->name, 'company' => $rows->company);
        }
        return $data;
    }

    function getMillMaster($company, $plant) {
        $postgresql = $this->load->database('psqlsatu', TRUE);
        $Query = $postgresql->query("select plant,fmill,company from master_plant where company=$company and plant in (" . $plant . ") and parent='0'");
        $data = array();
        foreach ($Query->result() as $rows) {
            $data[] = array('value' => $rows->fmill, 'nama' => $rows->fmill, 'company' => $rows->company);
        }
        return $data;
    }

    function getIntervalMaster($plant, $input) {
        if (empty($input['periode'])) {
            $input['periode'] = 4;
        }
        $postgresql = $this->load->database('psqlsatu', TRUE);
        //$Query = $postgresql->query("select company,Interval_0,Interval_1 from setInterval where company='".$plant."' and bulan='".$input['periode']."' and bahan='Terak'");
        $Query = $postgresql->query("select company,Interval_0,Interval_1 from setInterval where company='" . $plant . "' and bulan='5' and bahan='Terak'");
        $rows = $Query->row();
        $data[0] = $rows->interval_0;
        $data[1] = $rows->interval_1;
        return $data;
    }

    function getCementSemenIndonesia($company, $plant, $input) {
        if (empty($input['periode'])) {
            $input['periode'] = date('m');
        }
        if (empty($input['tahun'])) {
            $input['tahun'] = date('Y');
        }

        if ($company = "2000" and $plant = "SI") {
            $where01 = "";
        } else {
            $where01 = "and company = $company  and plant in (" . $plant . ")";
        }
        //echo $where01;
        //exit;
        $postgresql = $this->load->database('psqlsatu', TRUE);
        $QueryE = "SELECT
										company,
										tahun,
										substr(bulan,3,2) bulan,
										substr(bulan,1,2) tanggal,
										plant,
										replace(ton_real,',','.') ton_real,
										replace(ton_design,',','.') ton_design,
										replace(ton_prognosa,',','.') ton_prognosa,
										replace(ton_budget,',','.') ton_budget,
										replace(accum_real,',','.') accum_real,
										replace(avg_real,',','.') avg_real,
										replace(accum_prognosa,',','.') accum_prognosa,
										replace(accum_budget,',','.') accum_budget
									FROM
										report_cement
									WHERE
										tahun = " . date('Y') . " and
										substr(bulan,3,2) = '" . sprintf('%02d', $input['periode']) . "' " . $where01;
        $Query = $postgresql->query($QueryE);

        $data = array();
        $ton_real = array();

        foreach ($Query->result() as $rows) {
            $ton_real [(int) ($rows->tanggal)][] = $rows->ton_real;
            $ton_design [(int) ($rows->tanggal)][] = $rows->ton_design;
            $ton_prognosa [(int) ($rows->tanggal)][] = $rows->ton_prognosa;
            $ton_budget [(int) ($rows->tanggal)][] = $rows->ton_budget;
            $accum_real[(int) ($rows->tanggal)][] = $rows->accum_real;
            $avg_real [(int) ($rows->tanggal)][] = $rows->avg_real;
            $accum_prognosa [(int) ($rows->tanggal)][] = $rows->accum_prognosa;
            $accum_budget [(int) ($rows->tanggal)][] = $rows->accum_budget;
        }
        for ($i = 1; $i <= count($ton_real); $i++) {
            $data[$i] = array('ton_real' => array_sum($ton_real[$i]),
                'ton_design' => array_sum($ton_design[$i]),
                'ton_prognosa' => array_sum($ton_prognosa[$i]),
                'ton_budget' => array_sum($ton_budget[$i]),
                'accum_real' => array_sum($accum_real[$i]),
                'avg_real' => array_sum($avg_real[$i]),
                'accum_prognosa' => array_sum($accum_prognosa[$i]),
                'accum_budget' => array_sum($accum_budget[$i]));
        }
        return $data;
    }

    public function get_first() {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        *
                                FROM
                                        (
                                                SELECT
                                                        TO_CHAR (DATE_PROD, 'YYYY') AS TAHUN
                                                FROM
                                                        V_CEMENT_SMIG
                                                GROUP BY
                                                        TO_CHAR (DATE_PROD, 'YYYY')
                                                ORDER BY
                                                        TO_CHAR (DATE_PROD, 'YYYY')
                                        )
                                WHERE
                                        ROWNUM = 1");
        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $data[] = array(
                    'TAHUN' => $value["TAHUN"]
                );
            }
        } else {
            $data = "";
        }
        echo json_encode($data);
    }

    public function get_last() {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        *
                                FROM
                                        (
                                                SELECT
                                                        TO_CHAR (DATE_PROD, 'YYYY') AS TAHUN,
                                                        TO_CHAR (DATE_PROD, 'MM') AS BULAN,
                                                        TO_CHAR (DATE_PROD, 'MM') AS TGL
                                                FROM
                                                        V_CEMENT_SMIG
                                                ORDER BY
                                                        TO_CHAR (DATE_PROD, 'YYYY') DESC
                                        )
                                WHERE
                                        ROWNUM = 1");
        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $data[] = array(
                    'TAHUN' => $value["TAHUN"],
                    'BULAN' => $value["BULAN"],
                    'TGL' => $value["TGL"]
                );
            }
        } else {
            $data = "";
        }
        echo json_encode($data);
    }

    public function get_prognose_daily_sg($tahun, $bulan, $equipment) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        DATE_PROD,
                                        $equipment AS PROGNOSE
                                FROM
                                        PIS_SG_PROGNOSE
                                WHERE
                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ORDER BY
                                        DATE_PROD");
        $data = array();
        $ton_real = array();
        foreach ($Query->result() as $rows) {
            $ton_real [(float) ($rows->DATE_PROD)][] = $rows->PROGNOSE;
        }
        for ($i = 1; $i <= count($ton_real); $i++) {
            $data[$i] = array('PROGNOSE' => array_sum($ton_real[$i]));
        }
        return $data;
    }

    public function get_prognose_daily_sp($tahun, $bulan, $equipment) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        DATE_PROD,
                                        $equipment AS PROGNOSE
                                FROM
                                        PIS_SP_PROGNOSE
                                WHERE
                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ORDER BY
                                        DATE_PROD");
        $data = array();
        $ton_real = array();
        foreach ($Query->result() as $rows) {
            $ton_real [(float) ($rows->DATE_PROD)][] = $rows->PROGNOSE;
        }
        for ($i = 1; $i <= count($ton_real); $i++) {
            $data[$i] = array('PROGNOSE' => array_sum($ton_real[$i]));
        }
        return $data;
    }

    public function get_prognose_daily_st($tahun, $bulan, $equipment) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        DATE_PROD,
                                        $equipment AS PROGNOSE
                                FROM
                                        PIS_ST_PROGNOSE
                                WHERE
                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ORDER BY
                                        DATE_PROD");
        $data = array();
        $ton_real = array();
        foreach ($Query->result() as $rows) {
            $ton_real [(float) ($rows->DATE_PROD)][] = $rows->PROGNOSE;
        }
        for ($i = 1; $i <= count($ton_real); $i++) {
            $data[$i] = array('PROGNOSE' => array_sum($ton_real[$i]));
        }
        return $data;
    }

    public function get_prognose_daily_tlcc($tahun, $bulan, $equipment) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        DATE_PROD,
                                        $equipment AS PROGNOSE
                                FROM
                                        PIS_TLCC_PROGNOSE
                                WHERE
                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ORDER BY
                                        DATE_PROD");
        $data = array();
        $ton_real = array();
        foreach ($Query->result() as $rows) {
            $ton_real [(float) ($rows->DATE_PROD)][] = $rows->PROGNOSE;
        }
        for ($i = 1; $i <= count($ton_real); $i++) {
            $data[$i] = array('PROGNOSE' => array_sum($ton_real[$i]));
        }
        return $data;
    }

    public function get_prognose_daily_rembang($tahun, $bulan, $equipment) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        DATE_PROD,
                                        $equipment AS PROGNOSE
                                FROM
                                        PIS_SGR_PROGNOSE
                                WHERE
                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ORDER BY
                                        DATE_PROD");
        $data = array();
        $ton_real = array();
        foreach ($Query->result() as $rows) {
            $ton_real [(float) ($rows->DATE_PROD)][] = $rows->PROGNOSE;
        }
        for ($i = 1; $i <= count($ton_real); $i++) {
            $data[$i] = array('PROGNOSE' => array_sum($ton_real[$i]));
        }
        return $data;
    }

    public function get_prognose_daily_SI($tahun, $bulan) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TLCC.DATE_PROD,
                                        (
                                                TLCC.KL_PROG + SG.KL_PROG + SP.KL_PROG + ST.KL_PROG
                                        ) AS KL_PROGNOSE,
                                        (
                                                TLCC.FM_PROG + SG.FM_PROG + SP.FM_PROG + ST.FM_PROG
                                        ) AS FM_PROGNOSE
                                FROM
                                        (
                                                SELECT
                                                        DATE_PROD,
                                                        (KL1_PROD) AS KL_PROG,
                                                        (FMMP_PROD + FMHCM_PROD) AS FM_PROG
                                                FROM
                                                        PIS_TLCC_PROGNOSE
                                                WHERE
                                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                        ) TLCC
                                JOIN (
                                        SELECT
                                                DATE_PROD,
                                                (
                                                        KL1_PROD + KL2_PROD + KL3_PROD + KL4_PROD
                                                ) AS KL_PROG,
                                                (
                                                        FM1_PROD + FM2_PROD + FM3_PROD + FM4_PROD + FM5_PROD + FM6_PROD + FM7_PROD + FM8_PROD + FM9_PROD + FMA_PROD + FMB_PROD + FMC_PROD
                                                ) AS FM_PROG
                                        FROM
                                                PIS_SG_PROGNOSE
                                        WHERE
                                                TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) SG ON TLCC.DATE_PROD = SG.DATE_PROD
                                JOIN (
                                        SELECT
                                                DATE_PROD,
                                                (
                                                        KL2_PROD + KL3_PROD + KL4_PROD + KL5_PROD
                                                ) AS KL_PROG,
                                                (
                                                        FM2_PROD + FM3_PROD + FM41_PROD + FM42_PROD + FM51_PROD + FM52_PROD + FMDM_PROD
                                                ) AS FM_PROG
                                        FROM
                                                PIS_SP_PROGNOSE
                                        WHERE
                                                TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) SP ON SG.DATE_PROD = SP.DATE_PROD
                                JOIN (
                                        SELECT
                                                DATE_PROD,
                                                (
                                                        KL2_PROD + KL3_PROD + KL4_PROD + KL5_PROD
                                                ) AS KL_PROG,
                                                (
                                                        FM2_PROD + FM3_PROD + FM41_PROD + FM42_PROD + FM51_PROD + FM52_PROD
                                                ) AS FM_PROG
                                        FROM
                                                PIS_ST_PROGNOSE
                                        WHERE
                                                TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ) ST ON SP.DATE_PROD = ST.DATE_PROD
                                ORDER BY
                                        TLCC.DATE_PROD");

        $data = array();
        $kl = array();
        $fm = array();
        foreach ($Query->result() as $rows) {
            $kl [(float) ($rows->DATE_PROD)][] = $rows->KL_PROGNOSE;
            $fm [(float) ($rows->DATE_PROD)][] = $rows->FM_PROGNOSE;
        }
        for ($i = 1; $i <= count($kl); $i++) {
            $data[$i] = array(
                'KL_PROGNOSE' => array_sum($kl[$i]),
                'FM_PROGNOSE' => array_sum($fm[$i])
            );
        }
        return $data;
    }

    public function get_last_day_cl($company, $equipment) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        *
                                FROM
                                        MV_LAST_CL
                                WHERE
                                        COMPANY = $company
                                AND EQUIPMENT = '$equipment'");
        return $Query->result_array();
    }

    public function get_last_day_cm($company, $equipment) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        *
                                FROM
                                        MV_LAST_CM
                                WHERE
                                        COMPANY = $company
                                AND EQUIPMENT = '$equipment'");
        return $Query->result_array();
    }

    public function get_last_day_cm_opco($company) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        MAX (FULL_DAY) AS FULL_DAY,
                                        MAX (LAST_THN) AS LAST_THN,
                                        MAX (LAST_BLN) AS LAST_BLN,
                                        MAX (LAST_TGL) AS LAST_TGL
                                FROM
                                        MV_LAST_CM
                                WHERE
                                        COMPANY = $company");
        return $Query->result_array();
    }

    public function get_last_day_cl_opco($company) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        MAX (FULL_DAY) AS FULL_DAY,
                                        MAX (LAST_THN) AS LAST_THN,
                                        MAX (LAST_BLN) AS LAST_BLN,
                                        MAX (LAST_TGL) AS LAST_TGL
                                FROM
                                        MV_LAST_CL
                                WHERE
                                        COMPANY = $company");
        return $Query->result_array();
    }

    public function get_last_day_cm_SI() {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        MAX (FULL_DAY) AS FULL_DAY,
                                        MAX (LAST_THN) AS LAST_THN,
                                        MAX (LAST_BLN) AS LAST_BLN,
                                        MAX (LAST_TGL) AS LAST_TGL
                                FROM
                                        MV_LAST_CM");
        return $Query->result_array();
    }

    public function get_last_day_cl_SI() {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        MAX (FULL_DAY) AS FULL_DAY,
                                        MAX (LAST_THN) AS LAST_THN,
                                        MAX (LAST_BLN) AS LAST_BLN,
                                        MAX (LAST_TGL) AS LAST_TGL
                                FROM
                                        MV_LAST_CL");
        return $Query->result_array();
    }

}
