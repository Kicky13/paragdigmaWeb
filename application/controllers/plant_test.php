<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class plant_test extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->auth->GetSesionLogin();
        $this->load->library('Template');
        $this->load->library('plant_link');
    }
    
    public function muat() {
        $this->load->model('M_test');
        echo json_encode( $this->M_test->muat());
    }
    
    public function simpan() {
        header("Content-Type:application/json;charset=UTF-8");
        $this->load->model('M_test');
        echo json_encode( $this->M_test->simpan());
    }
    
    public function muat_edit($bulan, $tahun) {
        $this->load->model('M_test');
        $this->M_test->muat_edit($bulan, $tahun);
    }
    
    public function simpan_edit($bulan, $tahun) {
        header("Content-Type:application/json;charset=UTF-8");
        $this->load->model('M_test');
        echo json_encode( $this->M_test->simpan_edit($bulan, $tahun));
    }
    
    public function simpan_tes() {
        header("Content-Type:application/json;charset=UTF-8");
        $this->load->model('M_test');
        echo json_encode( $this->M_test->simpan_tes());
    }
    
    public function tes() {
        $this->template->load('plant_information/administrator_index', 'plant_information/master/master_tes');
    }
    
    public function edit() {
        $this->template->load('plant_information/administrator_index', 'plant_information/master/master_edit');
    }
    
    public function get_pdo() {
        $this->load->model('M_test');
        $this->M_test->get_pdo();
    }

    public function index() {
        $tahun = date('Y');
        $bulan = date('m');
        $plant = 'tbn1';
        $company = '7000';

        $load['Title'] = "Tes Variable";
        $this->load->model('M_test');
        $load['prog_cm'] = $this->M_test->get_ton_prognose_cement($company, $plant, $tahun, $bulan);
        $load['prog_cl'] = $this->M_test->get_ton_prognose_clinker($company, $plant, $tahun, $bulan);

        $load['bud_cm'] = $this->M_test->get_ton_budget_cement($plant, $tahun, $bulan);
        $load['bud_cl'] = $this->M_test->get_ton_budget_clinker($plant, $tahun, $bulan);

        $load['design_cm'] = $this->M_test->get_ton_design_cement($plant, $tahun, $bulan);
        $load['design_cl'] = $this->M_test->get_ton_design_clinker($plant, $tahun, $bulan);

        $load['date_ku'] = $this->M_test->get_last_sg();
        $load['get_real'] = $this->M_test->get_real_sg($tahun, $bulan);
        $load['get_jop'] = $this->M_test->get_jop_sg($tahun, $bulan);

        $this->template->load('plant_information/home_index', 'plant_information/utama/variable', $load);
    }

    public function chart() {
        $load['Title'] = "Tes Chart";
        $tahun = date('Y');
        $bulan = date('m');
        $plant = 'tbn1';
        $company = '7000';

        $this->load->model('M_test');
        $load['design_cm'] = $this->M_test->get_ton_design_cement($plant, $tahun, $bulan);
        $load['design_cl'] = $this->M_test->get_ton_design_clinker($plant, $tahun, $bulan);

        $load['prog_cm'] = $this->M_test->get_ton_prognose_cement($company, $plant, $tahun, $bulan);
        $load['prog_cl'] = $this->M_test->get_ton_prognose_clinker($company, $plant, $tahun, $bulan);

        $load['bud_cm'] = $this->M_test->get_ton_budget_cement($plant, $tahun, $bulan);
        $load['bud_cl'] = $this->M_test->get_ton_budget_clinker($plant, $tahun, $bulan);

        $load['get_real'] = $this->M_test->get_real_sg($tahun, $bulan);
        $load['get_jop'] = $this->M_test->get_jop_sg($tahun, $bulan);

        $this->template->load('plant_information/home_index', 'plant_information/utama/chart_test', $load);
    }

    public function get_first() {
        $this->load->model('m_test');
        $this->m_test->get_first();
    }

    public function get_last() {
        $this->load->model('m_test');
        $this->m_test->get_last();
    }

    public function get_daily_tlcc($id) {
        $this->load->model('m_test');
        $this->m_test->get_daily_tlcc($id);
    }

    public function make_pdo() {
        $orapdo = $this->load->database('orapdo', TRUE);
        $param = '2016-12';
        $stmt = $orapdo->conn_id->prepare("select * from MV_SG_MONTH WHERE MONTH_DATE = :param");
        $stmt->bindValue(':param', $param, PDO::PARAM_STR);
        $stmt->execute();
        $tes = $stmt->fetchAll(2);
        echo json_encode($tes);
    }

    public function load() {
        $this->load->model('m_test');
        $this->m_test->get_hot_test();
    }
    
    public function testing() {
        $rubah = $this->input->post('changes');
        $dataku = $this->input->post('data');
        echo json_encode($dataku);
//        print_r($dataku);exit;
    }

    public function save() {
        try {
            $db = $this->load->database('orapdo', TRUE);
            $colMap = array(
                0 => 'MANUFACTURER',
                1 => 'YEAR',
                2 => 'PRICE'
            );
            $rubah = $this->input->post('changes');
            $dataku = $this->input->post('data');
            
            if (isset($rubah) && $rubah) {
                foreach ($rubah as $change) {
                    $rowId = $change[0] + 1;
                    $colId = $change[1];
                    $newVal = $change[3];

                    if (!isset($colMap[$colId])) {
                        echo "\n spadam";
                        continue;
                    }

                    $select = $db->conn_id->prepare('SELECT ID FROM CARS WHERE id=? AND ROWNUM = 1');
                    $select->execute(array(
                        $rowId
                    ));

                    if ($row = $select->fetch()) {
                        $query = $db->conn_id->prepare('UPDATE CARS SET `' . $colMap[$colId] . '` = :newVal WHERE ID = :id');
                    } else {
                        $query = $db->conn_id->prepare('INSERT INTO CARS (ID, `' . $colMap[$colId] . '`) VALUES(:id, :newVal)');
                    }
                    $query->bindValue(':id', $rowId, PDO::PARAM_INT);
                    $query->bindValue(':newVal', $newVal, PDO::PARAM_STR);
                    $query->execute();
                }
            } elseif (isset($dataku) && $dataku) {
//                $select = $db->conn_id->prepare('DELETE FROM CARS');
//                $select->execute();

                for ($r = 0, $rlen = count($dataku); $r < $rlen; $r++) {
                    $rowId = $r + 1;
                    for ($c = 0, $clen = count($dataku[$r]); $c < $clen; $c++) {
                        if (!isset($colMap[$c])) {
                            continue;
                        }

                        $newVal = $dataku[$r][$c];

                        $select = $db->conn_id->prepare('SELECT ID FROM CARS WHERE id= :row AND ROWNUM = 1');
//                        $select->execute(array(
//                            $rowId
//                        ));
                        
                        $select->bindValue(':row', $rowId, PDO::PARAM_STR);
                        $select->execute();
                        
                        if ($row = $select->fetch()) {
                            $query = $db->conn_id->prepare('UPDATE CARS SET `' . $colMap[$c] . '` = :newVal WHERE ID = :id');
                        } else {
                            $query = $db->conn_id->prepare('INSERT INTO CARS (ID, `' . $colMap[$c] . '`) VALUES(:id, :newVal)');
                        }
                        $query->bindValue(':id', $rowId, PDO::PARAM_INT);
                        $query->bindValue(':newVal', $newVal, PDO::PARAM_STR);
                        $query->execute();
                    }
                }
            }
            $xx = $db->last_query();
            $a = count($dataku);

            $out = array(
                'result' => 'ok',
                'coeg' => $row
            );
            echo json_encode($out);
        } catch (PDOException $ex) {
            print 'Exception : ' . $ex->getMessage();
        }
    }

}
