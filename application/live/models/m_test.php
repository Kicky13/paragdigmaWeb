<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_test extends CI_Model {

    public function muat() {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query('SELECT * FROM CARS');
        $Q = $Query->result_array();
        return $Q;
    }
    
    public function muat_edit($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_NUMBER (TO_CHAR(DATE_PROD, 'DD')) AS ID,
                                        TO_CHAR (DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        RM1_PROD,
                                        RM1_JOP,
                                        KL1_PROD,
                                        KL1_JOP,
                                        FMMP_PROD,
                                        FMMP_JOP,
                                        FMHCM_PROD,
                                        FMHCM_JOP
                                FROM
                                        PIS_TLCC_EDIT
                                WHERE
                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ORDER BY
                                        DATE_PROD ASC");
        $Q = $Query->result_array();
        echo '{"mydata":' . json_encode($Q) . '}';
    }

    public function simpan() {
        $oracle = $this->load->database('oramso', TRUE);
        
        if($this->input->post('data')){
            $data = $this->input->post('data');
            $oracle->query('DELETE FROM CARS');
            foreach ($data as $row) {
                $new = array(
                    'ID' => $row[0],
                    'MANUFACTURER' => $row[1],
                    'YEAR' => $row[2],
                    'PRICE' => $row[3]
                );
                $oracle->insert('CARS', $new);
            }
        } else if ($this->input->post('changes')){
            $changes = $this->input->post('changes');
            $col = array(
                0 => 'ID',
                1 => 'MANUFACTURER',
                2 => 'YEAR',
                3 => 'PRICE'
            );
            foreach ($changes as $row) {
                $select = $oracle->query('SELECT ID FROM CARS WHERE '.$col[$row[1]].' = '.$col[$row[2]])->result_array();
                foreach ($select as $result) {
                    $oracle->set($col[$row[1]], $col[$row[3]]);
                    $oracle->where('ID',$result['ID']);
                    $oracle->update('CARS');
                }
            }
        }
        $out = array(
            'result' => 'ok'
        );
        return $out;
    }
    
    public function simpan_edit($bulan, $tahun) {
        $oracle = $this->load->database('oramso', TRUE);
        
        if($this->input->post('data')){
            $data = $this->input->post('data');
            $oracle->query("DELETE FROM PIS_TLCC_EDIT WHERE TO_CHAR(DATE_PROD, 'YYYY-MM-DD') = '$tahun-$bulan'");
            foreach ($data as $row) {
                $new = array(
                    'DATE_PROD' => $row[0],
                    'RM1_PROD' => $row[1],
                    'RM1_JOP' => $row[2],
                    'KL1_PROD' => $row[3],
                    'KL1_JOP' => $row[4],
                    'FMMP_PROD' => $row[5],
                    'FMMP_JOP' => $row[6],
                    'FMHCM_PROD' => $row[7],
                    'FMHCM_JOP' => $row[8]
                );
                $oracle->insert('PIS_TLCC_EDIT', $new);
            }
        } else if ($this->input->post('changes')){
            $changes = $this->input->post('changes');
            $col = array(
                0 => 'DATE_PROD',
                1 => 'RM1_PROD',
                2 => 'RM1_JOP',
                3 => 'KL1_PROD',
                4 => 'KL1_JOP',
                5 => 'FMMP_PROD',
                6 => 'FMMP_JOP',
                7 => 'FMHCM_PROD',
                8 => 'FMHCM_JOP'
            );
            foreach ($changes as $row) {
                $select = $oracle->query('SELECT ID FROM PIS_TLCC_EDIT WHERE '.$col[$row[1]].' = '.$col[$row[2]])->result_array();
                foreach ($select as $result) {
                    $oracle->set($col[$row[1]], $col[$row[3]]);
                    $oracle->where('DATE_PROD','TO_CHAR('.$result['DATE_PROD'].',\'YYYY-MM-DD\')');
                    $oracle->update('CARS');
                }
            }
        }
        $out = array(
            'result' => 'ok',
            'date' => $this->input->post('changes'),
            'text' => $this->input->post('data')
        );
        return $out;
    }
    
    public function simpan_tes() {
        $data = $this->input->post('data');
        $changes = $this->input->post('changes');
//        echo json_encode($data);
    }

    public function get_hot_test() {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT * FROM CARS");
        $Q = $Query->result_array();
        echo '{"mydata":' . json_encode($Q) . '}';
    }

    public function get_mv() {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        *
                                FROM
                                        MVIEW1");
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

        return $data;
    }

    public function get_pdo() {
        $this->orapdo = $this->load->database('orapdo', TRUE);
        $sql = <<<QUERY
		select * from PIS_TLCC_TES
QUERY;

        $stmt = $this->orapdo->conn_id->prepare($sql);
        $stmt->execute();
        $tes = $stmt->fetchAll(2);
        print_r($tes);
        exit;
    }

    public function get_daily_tlcc($bulan) {
        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT TO_NUMBER (TO_CHAR(DATE_PROD, 'DD')) AS ID,
                                        TO_CHAR(DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD,
                                        RM1_PROD,
                                        RM1_JOP,
                                        KL1_PROD,
                                        KL1_JOP,
                                        FMMP_PROD,
                                        FMMP_JOP,
                                        FMHCM_PROD,
                                        FMHCM_JOP
                                FROM PIS_TLCC_PRODDAILY
                                WHERE TO_CHAR (DATE_PROD, 'YYYY-MM') = '2016-0$bulan'
                                ORDER BY DATE_PROD ASC");
        $Q = $Query->result_array();
        echo '{"mydata":' . json_encode($Q) . '}';
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

        return $data;
    }

    public function get_last() {
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
                                                        TO_CHAR (DATE_PROD, 'YYYY') DESC
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

        return $data;
    }

    public function get_ton_prognose_cement($company, $plant, $tahun, $bulan) {

        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        COMPANY,
                                        CEMENT
                                FROM
                                        PIS_PROGNOSA_PLANT
                                WHERE
                                        COMPANY = $company
                                AND PLANT = '$plant'
                                AND TAHUN = $tahun
                                AND BULAN = $bulan");

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

        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        COMPANY,
                                        SUM(CEMENT) AS CEMENT
                                FROM
                                        PIS_PROGNOSA_PLANT
                                WHERE
                                        COMPANY = $company
                                AND TAHUN = $tahun
                                AND BULAN = $bulan
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

    public function get_ton_prognose_cement_SI($tahun, $bulan) {

        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT SUM (CEMENT) AS CEMENT
                                FROM PIS_PROGNOSA_PLANT
                                WHERE TAHUN = $tahun
                                AND BULAN = $bulan
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

    public function get_ton_prognose_clinker($company, $plant, $tahun, $bulan) {

        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        COMPANY,
                                        CLINKER
                                FROM
                                        PIS_PROGNOSA_PLANT
                                WHERE
                                        COMPANY = $company
                                AND PLANT = '$plant'
                                AND TAHUN = $tahun
                                AND BULAN = $bulan");

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

    public function get_ton_prognose_clinker_opco($company, $tahun, $bulan) {

        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        COMPANY,
                                        SUM(CLINKER) AS CLINKER
                                FROM
                                        PIS_PROGNOSA_PLANT
                                WHERE
                                        COMPANY = $company
                                AND TAHUN = $tahun
                                AND BULAN = $bulan
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

        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT SUM(CLINKER) AS CLINKER
                                FROM PIS_PROGNOSA_PLANT
                                WHERE TAHUN = $tahun
                                AND BULAN = $bulan
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

    public function get_ton_budget_cement($plant, $tahun, $bulan) {

        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        ROUND (
                                                RKAP_CEMENT / TO_CHAR (
                                                        LAST_DAY (
                                                                TO_DATE (
                                                                        '$tahun-$bulan',
                                                                        'YYYY-MM'
                                                                )
                                                        ),
                                                        'DD'
                                                )
                                        ) AS BUDGET
                                FROM
                                        PIS_CAPACITY_PLANT
                                WHERE
                                        PLANT = '$plant'
                                AND BULAN = $bulan
                                AND TAHUN = $tahun");

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

    public function get_ton_budget_cement_opco($company, $tahun, $bulan) {

        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        ROUND (
                                                SUM(RKAP_CEMENT) / TO_CHAR (
                                                        LAST_DAY (
                                                                TO_DATE ('$tahun-$bulan', 'YYYY-MM')
                                                        ),
                                                        'DD'
                                                )
                                        ) AS BUDGET
                                FROM
                                        PIS_CAPACITY_PLANT
                                WHERE
                                        COMPANY = $company
                                AND BULAN = $bulan
                                AND TAHUN = $tahun");

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

    public function get_ton_budget_cement_SI($tahun, $bulan) {

        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT ROUND ( SUM(RKAP_CEMENT) / TO_CHAR (
                                                        LAST_DAY (
                                                                TO_DATE ('$tahun-$bulan', 'YYYY-MM')
                                                        ),
                                                        'DD'
                                                )
                                        ) AS BUDGET
                                FROM PIS_CAPACITY_PLANT
                                WHERE BULAN = $bulan
                                AND TAHUN = $tahun");

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

    public function get_ton_budget_clinker($plant, $tahun, $bulan) {

        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        ROUND (
                                                RKAP_CLINKER / TO_CHAR (
                                                        LAST_DAY (
                                                                TO_DATE (
                                                                        '$tahun-$bulan',
                                                                        'YYYY-MM'
                                                                )
                                                        ),
                                                        'DD'
                                                )
                                        ) AS BUDGET
                                FROM
                                        PIS_CAPACITY_PLANT
                                WHERE
                                        PLANT = '$plant'
                                AND BULAN = $bulan
                                AND TAHUN = $tahun");

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

    public function get_ton_budget_clinker_opco($company, $tahun, $bulan) {

        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        ROUND (
                                                SUM(RKAP_CLINKER) / TO_CHAR (
                                                        LAST_DAY (
                                                                TO_DATE ('$tahun-$bulan', 'YYYY-MM')
                                                        ),
                                                        'DD'
                                                )
                                        ) AS BUDGET
                                FROM
                                        PIS_CAPACITY_PLANT
                                WHERE
                                        COMPANY = $company
                                AND BULAN = $bulan
                                AND TAHUN = $tahun");

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

    public function get_ton_budget_clinker_SI($tahun, $bulan) {

        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT ROUND ( SUM(RKAP_CLINKER) / TO_CHAR (
                                                        LAST_DAY (
                                                                TO_DATE ('$tahun-$bulan', 'YYYY-MM')
                                                        ),
                                                        'DD'
                                                )
                                        ) AS BUDGET
                                FROM PIS_CAPACITY_PLANT
                                WHERE BULAN = $bulan
                                AND TAHUN = $tahun");

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

    public function get_ton_design_cement($plant, $tahun, $bulan) {
        ////////PEMECAH BULAN//////////////////
        if (empty($input['periode'])) {
            $input['periode'] = date('m');
        }
        /////////////////PEMECAH TAHUN/////////////////
        if (empty($input['tahun'])) {
            $input['tahun'] = date('Y');
        }

        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        CEMENT
                                FROM
                                        PIS_CAPACITY_PLANT
                                WHERE PLANT = '$plant'
                                AND TAHUN = $tahun
                                AND BULAN = $bulan");

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

    public function get_ton_design_cement_opco($company, $tahun, $bulan) {
        if (empty($input['periode'])) {
            $input['periode'] = date('m');
        }
        if (empty($input['tahun'])) {
            $input['tahun'] = date('Y');
        }

        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        SUM (CEMENT) AS  CEMENT
                                FROM
                                        PIS_CAPACITY_PLANT
                                WHERE
                                        COMPANY = $company
                                AND TAHUN = $tahun
                                AND BULAN = $bulan");

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

    public function get_ton_design_cement_SI($tahun, $bulan) {
        if (empty($input['periode'])) {
            $input['periode'] = date('m');
        }
        if (empty($input['tahun'])) {
            $input['tahun'] = date('Y');
        }

        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT SUM (CEMENT) AS  CEMENT
                                FROM PIS_CAPACITY_PLANT
                                WHERE TAHUN = $tahun
                                AND BULAN = $bulan");

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

    public function get_ton_design_clinker($plant, $tahun, $bulan) {

        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        CLINKER
                                FROM
                                        PIS_CAPACITY_PLANT
                                WHERE PLANT = '$plant'
                                AND TAHUN = $tahun
                                AND BULAN = $bulan");

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

    public function get_ton_design_clinker_opco($company, $tahun, $bulan) {

        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        SUM (CLINKER) AS CLINKER
                                FROM
                                        PIS_CAPACITY_PLANT
                                WHERE
                                        COMPANY = $company
                                AND TAHUN = $tahun
                                AND BULAN = $bulan");

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

        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT SUM (CLINKER) AS CLINKER
                                FROM PIS_CAPACITY_PLANT
                                WHERE TAHUN = $tahun
                                AND BULAN = $bulan");

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

    public function get_last_sg() {

        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        TO_CHAR (DATE_PROD, 'YYYY-MM-DD') AS TGL
                                FROM
                                        PIS_SG_PRODDAILY
                                WHERE
                                        ROWNUM = 1
                                ORDER BY
                                        DATE_PROD DESC");

        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $data = $value["TGL"];
            }
        } else {
            $data = "";
        }

        return $data;
    }

    public function get_real_sg($tahun, $bulan) {

        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        FM1_PROD AS CEMENT
                                FROM
                                        PIS_SG_PRODDAILY
                                WHERE
                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ORDER BY
                                        TO_CHAR (DATE_PROD, 'YYYY-MM-DD') ASC");

        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {
                $real = $value["CEMENT"];

                $data[] = array(
                    'CEMENT' => $value["CEMENT"]
                );
            }
        } else {
            $data = "";
        }

        return $data;
    }

    public function get_jop_sg($tahun, $bulan) {

        $oracle = $this->load->database('oramso', TRUE);
        $Query = $oracle->query("SELECT
                                        FM1_JOP AS JOP
                                FROM
                                        PIS_SG_PRODDAILY
                                WHERE
                                        TO_CHAR (DATE_PROD, 'YYYY-MM') = '$tahun-$bulan'
                                ORDER BY
                                        TO_CHAR (DATE_PROD, 'YYYY-MM-DD') ASC");

        $Q = $Query->result_array();
        if (!empty($Q)) {
            foreach ($Query->result_array() as $value) {

                $data[] = array(
                    'JOP' => $value["JOP"]
                );
            }
        } else {
            $data = "";
        }
//        print_r($data);exit;
        return $data;
    }

}
