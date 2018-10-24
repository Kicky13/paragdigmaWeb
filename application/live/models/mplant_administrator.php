<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mplant_administrator extends CI_Model {

    // <editor-fold defaultstate="collapsed" desc="Model Karyawan">
    function ListKaryawan($input) {
        $v_hris = $this->load->database('hris', TRUE);
        $oramso = $this->load->database('oramso', TRUE);

        if (!empty($input['nama']) and empty($input['nopeg'])) {
            $Qhris = $v_hris->query("select a.mk_nopeg, a.mk_nama, a.mk_email, a.company from v_karyawan a where a.mk_nama like '" . strtoupper($input['nama']) . "' and  a.mjab_kode != '99999999'");
        } else if (empty($input['nama']) and ! empty($input['nopeg'])) {
            $Qhris = $v_hris->query("select a.mk_nopeg, a.mk_nama, a.mk_email, a.company from v_karyawan a  where a.mk_nopeg like '" . strtoupper($input['nopeg']) . "' and  a.mjab_kode != '99999999'");
        } else if (!empty($input['nama']) and ! empty($input['nopeg'])) {
            $Qhris = $v_hris->query("select a.mk_nopeg, a.mk_nama, a.mk_email, a.company from v_karyawan a where a.mk_nopeg like '" . strtoupper($input['nopeg']) . "' and a.mk_nama like '" . strtoupper($input['nama']) . "' and  a.mjab_kode != '99999999'");
        } else {
            $Qhris = $v_hris->query("select a.mk_nopeg, a.mk_nama, a.mk_email, a.company from v_karyawan a where a.muk_kode='" . $input['unitkerja'] . "' and  a.mjab_kode != 99999999");
        }
        $data = $Qhris->result();
        $Query = $oramso->query("SELECT LDAPNAME, ROLE, LDAP_FLAG, MK_NOPEG, MK_NAMA, OPCO_ACCESS FROM PIS_USERLIST");
        $GetKar = $Query->result();
        foreach ($GetKar as $rows) {
            $Karlis[$rows->LDAPNAME] = $rows;
        }
        echo '<table class="table" style="font-size:12px;">';
        echo '<tr>';
        echo '<th>Nopeg</th>';
        echo '<th>Nama</th>';
        echo '<th>Email</th>';
        echo '</tr>';
        $i = 1;
        foreach ($data as $rows) {
            echo '<tr>';
            $match = strtolower($rows->mk_email);
            if (empty($Karlis[$match])) {
                echo "<td><button id='button" . $i . "' type='button' class='btn btn-warning' onclick='load_toform(" . $i . ")'><span id='a" . $i . "'>" . $rows->mk_nopeg . "</span></button></td>";
            } else {
                echo "<td><button type='button' class='btn btn-success disabled' ><span id='a" . $i . "'>" . $rows->mk_nopeg . "</span></button></td>";
            }
            echo "<td><span id='b" . $i . "'>" . $rows->mk_nama . "</span></td>";
            echo "<td><span id='c" . $i . "'>" . $rows->mk_email . "</span></td>";
            echo "<td><span id='d" . $i . "'>" . $rows->company . "</span></td>";
            echo '</tr>';
            $i++;
        }

        echo '</table>';
    }

    function SetKaryawabDaftar($input) {
        $oramso = $this->load->database('oramso', TRUE);
        $oramso->query("INSERT INTO PIS_USERLIST (LDAPNAME, MK_NOPEG, MK_NAMA,OPCO_ACCESS, ROLE) values('" . strtolower($input['email']) . "','" . substr($input['nopeg'], 4) . "','" . $input['nama'] . "','" . $input['opco'] . "','" . $input['role'] . "')");
        return true;
    }

    function ListKaryawanTerdaftar() {
        $oramso = $this->load->database('oramso', TRUE);
        $Query = $oramso->query("SELECT LDAPNAME, ROLE, LDAP_FLAG, MK_NOPEG, MK_NAMA, OPCO_ACCESS FROM PIS_USERLIST ORDER BY LDAPNAME ASC");
        $Data = $Query->result();
        foreach ($Data as $rows) {
            echo '<tr>';
            echo '<td>' . $rows->LDAPNAME . '</td>';
            echo '<td>' . $rows->MK_NOPEG . '</td>';
            echo '<td>' . $rows->ROLE . '</td>';
            echo '<td><button type="button" class="btn btn-danger" onclick="delete_list(' . "'" . $rows->LDAPNAME . "'" . ')"><i class="fa fa-times" aria-hidden="true"></i></button></td>';
            echo '</tr>';
        }
    }

    function HapusKaryawanTerdaftar($input) {
        $oramso = $this->load->database('oramso', TRUE);
        $Query = $oramso->query("DELETE FROM PIS_USERLIST WHERE LDAPNAME =  '" . $input . "'");
        return true;
    }

    // </editor-fold>
    
    // <editor-fold defaultstate="collapsed" desc="Model Chart Interval">
    function get_interval_cement($tahun) {
        $oramso = $this->load->database('oramso', TRUE);
        $Query = $oramso->query("SELECT
                                        ROWNUM AS ID,
                                        PLANT,
                                        COMPANY AS OPCO,
                                        TAHUN,
                                            CASE COMPANY
                                        WHEN '7000' THEN
                                                'SG'
                                        WHEN '3000' THEN
                                                'SP'
                                        WHEN '4000' THEN
                                                'ST'
                                        WHEN '6000' THEN
                                                'TLCC'
                                        END AS COMPANY,
                                        ID_PLANT,
                                        INTV_LEFT,
                                        INTV_RIGHT
                                FROM
                                        PIS_CHART_INTERVAL
                                WHERE
                                        CHART = 'CEMENT'
                                AND TAHUN = $tahun
                                ORDER BY
                                        PLANT");
        $Q = $Query->result();
        echo '{"mydata":' . json_encode($Q) . '}';
    }

    function get_interval_clinker($tahun) {
        $oramso = $this->load->database('oramso', TRUE);
        $Query = $oramso->query("SELECT
                                        ROWNUM AS ID,
                                        PLANT,
                                        COMPANY AS OPCO,
                                        TAHUN,
                                            CASE COMPANY
                                        WHEN '7000' THEN
                                                'SG'
                                        WHEN '3000' THEN
                                                'SP'
                                        WHEN '4000' THEN
                                                'ST'
                                        WHEN '6000' THEN
                                                'TLCC'
                                        END AS COMPANY,
                                        ID_PLANT,
                                        INTV_LEFT,
                                        INTV_RIGHT
                                FROM
                                        PIS_CHART_INTERVAL
                                WHERE
                                        CHART = 'CLINKER'
                                AND TAHUN = $tahun
                                ORDER BY
                                        PLANT");
        $Q = $Query->result();
        echo '{"mydata":' . json_encode($Q) . '}';
    }

    public function save_interval_cement($tahun, $plant, $opco, $id_plant) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');

        if ($data) {
            $oracle->query("DELETE FROM PIS_CHART_INTERVAL WHERE TAHUN = '$tahun' AND CHART = 'CEMENT'");
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'ID_PLANT' => $data[$i][3],
                    'COMPANY' => $data[$i][0],
                    'PLANT' => $data[$i][2],
                    'CHART' => 'CEMENT',
                    'INTV_LEFT' => $data[$i][4],
                    'INTV_RIGHT' => $data[$i][5],
                    'TAHUN' => $tahun,
                );
                $oracle->insert('PIS_CHART_INTERVAL', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'ID_PLANT',
                1 => 'CHART',
                2 => 'COMPANY',
                3 => 'PLANT',
                4 => 'INTV_LEFT',
                5 => 'INTV_RIGHT',
                6 => 'TAHUN'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('CHART', 'CEMENT');
                $oracle->where('TAHUN', $tahun);
                $oracle->where('PLANT', $plant);
                $oracle->where('COMPANY', $opco);
                $oracle->update('PIS_CHART_INTERVAL');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    public function save_interval_clinker($tahun, $plant, $opco, $id_plant) {
        $oracle = $this->load->database('oramso', TRUE);
        $changes = $this->input->post('changes');
        $data = $this->input->post('data');

        if ($data) {
            $oracle->query("DELETE FROM PIS_CHART_INTERVAL WHERE TAHUN = '$tahun' AND CHART = 'CLINKER'");
            for ($i = 1; $i < (count($data) - 1); $i++) {
                $newcol = array(
                    'ID_PLANT' => $data[$i][3],
                    'COMPANY' => $data[$i][0],
                    'PLANT' => $data[$i][2],
                    'CHART' => 'CLINKER',
                    'INTV_LEFT' => $data[$i][4],
                    'INTV_RIGHT' => $data[$i][5],
                    'TAHUN' => $tahun,
                );
                $oracle->insert('PIS_CHART_INTERVAL', $newcol);
            }
        } elseif ($changes) {
            $col = array(
                0 => 'ID_PLANT',
                1 => 'CHART',
                2 => 'COMPANY',
                3 => 'PLANT',
                4 => 'INTV_LEFT',
                5 => 'INTV_RIGHT',
                6 => 'TAHUN'
            );
            foreach ($changes as $row) {
                $oracle->set($col[$row[1]], $row[3]);
                $oracle->where('CHART', 'CLINKER');
                $oracle->where('TAHUN', $tahun);
                $oracle->where('PLANT', $plant);
                $oracle->where('COMPANY', $opco);
                $oracle->update('PIS_CHART_INTERVAL');
            }
        }

        $out = array(
            'result' => 'ok'
        );
        echo json_encode($out);
    }

    // </editor-fold>

    function get_update_status() {
        $ora_mso = $this->load->database('msodev', TRUE);
        $Query = $ora_mso->query("SELECT
                                        *
                                FROM
                                        (
                                                SELECT
                                                        *
                                                FROM
                                                        MT_T_REKAP_OLD
                                                ORDER BY
                                                        TANGGAL DESC
                                        )
                                WHERE
                                        ROWNUM <= 10");
        $Q = $Query->result_array();
        return $Q;
    }

    // <editor-fold defaultstate="collapsed" desc="Excel Mass Upload PADANG">
    function x_padang_kiln_count($data) {
        $ora_mso = $this->load->database('oramso', TRUE);
        $ora_mso->query("INSERT INTO PIS_KILN_TES (DATE_PROD, COMPANY, PLANT, STOP_COUNT, STOP_DESC) VALUES (TO_DATE('" . $data['DATE'] . "','YYYY-MM-DD'),'3000','" . $data['PLANT'] . "','1','" . $data['VALUE'] . "')");
        $url = base_url() . 'index.php/master_data';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
    }
    
    function x_padang_kiln_desc($data) {
        $ora_mso = $this->load->database('oramso', TRUE);
        $ora_mso->query("UPDATE PIS_KILN_TES SET STOP_DESC = '" . $data['VALUE'] . "' WHERE TO_CHAR (DATE_PROD, 'YYYY-MM-DD') = '" . $data['DATE'] . "' AND PLANT = '" . $data['PLANT'] . "'");
        $url = base_url() . 'index.php/master_data';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
    }
    
    function x_padang_fm_count($data) {
        $ora_mso = $this->load->database('oramso', TRUE);
        $ora_mso->query("INSERT INTO PIS_FM_TES (DATE_PROD, COMPANY, PLANT, STOP_COUNT, STOP_DESC) VALUES (TO_DATE('" . $data['DATE'] . "','YYYY-MM-DD'),'3000','" . $data['PLANT'] . "','1','" . $data['VALUE'] . "')");
        $url = base_url() . 'index.php/master_data';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
    }
    
    function x_padang_fm_desc($data) {
        $ora_mso = $this->load->database('oramso', TRUE);
        $ora_mso->query("UPDATE PIS_FM_TES SET STOP_DESC = '" . $data['VALUE'] . "' WHERE TO_CHAR (DATE_PROD, 'YYYY-MM-DD') = '" . $data['DATE'] . "' AND PLANT = '" . $data['PLANT'] . "'");
        $url = base_url() . 'index.php/master_data';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
    }
    
    function x_padang_prognose($data) {
        $this->db->set("DATE_PROD", "TO_DATE('" . $data['DATE_PROD'] . "', 'YYYY-MM-DD')", false);
        unset($data['DATE_PROD']);
        $result = $this->db->insert('PIS_SP_PROGNOSE_TES', $data);
        if ($result == 1) {
            return 'Data Sukses Diinputkan';
            $url = base_url() . 'index.php/master_data';
            echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
        } else {
            return 'Data Gagal Diinputkan';
            $url = base_url() . 'index.php/master_data';
            echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
        }
    }
    // </editor-fold>
    
    // <editor-fold defaultstate="collapsed" desc="Excel Mass Upload GRESIK">
    function x_gresik_kiln_count($data) {
        $ora_mso = $this->load->database('oramso', TRUE);
        $ora_mso->query("INSERT INTO PIS_KILN_TES (DATE_PROD, COMPANY, PLANT, STOP_COUNT, STOP_DESC) VALUES (TO_DATE('" . $data['DATE'] . "','YYYY-MM-DD'),'3000','" . $data['PLANT'] . "','1','" . $data['VALUE'] . "')");
        $url = base_url() . 'index.php/master_data';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
    }
    
    function x_gresik_kiln_desc($data) {
        $ora_mso = $this->load->database('oramso', TRUE);
        $ora_mso->query("UPDATE PIS_KILN_TES SET STOP_DESC = '" . $data['VALUE'] . "' WHERE TO_CHAR (DATE_PROD, 'YYYY-MM-DD') = '" . $data['DATE'] . "' AND PLANT = '" . $data['PLANT'] . "'");
        $url = base_url() . 'index.php/master_data';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
    }
    
    function x_gresik_fm_count($data) {
        $ora_mso = $this->load->database('oramso', TRUE);
        $ora_mso->query("INSERT INTO PIS_FM_TES (DATE_PROD, COMPANY, PLANT, STOP_COUNT, STOP_DESC) VALUES (TO_DATE('" . $data['DATE'] . "','YYYY-MM-DD'),'3000','" . $data['PLANT'] . "','1','" . $data['VALUE'] . "')");
        $url = base_url() . 'index.php/master_data';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
    }
    
    function x_gresik_fm_desc($data) {
        $ora_mso = $this->load->database('oramso', TRUE);
        $ora_mso->query("UPDATE PIS_FM_TES SET STOP_DESC = '" . $data['VALUE'] . "' WHERE TO_CHAR (DATE_PROD, 'YYYY-MM-DD') = '" . $data['DATE'] . "' AND PLANT = '" . $data['PLANT'] . "'");
        $url = base_url() . 'index.php/master_data';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
    }
    
    function x_gresik_prognose($data) {
        $this->db->set("DATE_PROD", "TO_DATE('" . $data['DATE_PROD'] . "', 'YYYY-MM-DD')", false);
        unset($data['DATE_PROD']);
        $result = $this->db->insert('PIS_SP_PROGNOSE_TES', $data);
        if ($result == 1) {
            return 'Data Sukses Diinputkan';
            $url = base_url() . 'index.php/master_data';
            echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
        } else {
            return 'Data Gagal Diinputkan';
            $url = base_url() . 'index.php/master_data';
            echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
        }
    }
    // </editor-fold>
    
    // <editor-fold defaultstate="collapsed" desc="Excel Mass Upload REMBANG">
    function x_rembang_kiln_count($data) {
        $ora_mso = $this->load->database('oramso', TRUE);
        $ora_mso->query("INSERT INTO PIS_KILN_TES (DATE_PROD, COMPANY, PLANT, STOP_COUNT, STOP_DESC) VALUES (TO_DATE('" . $data['DATE'] . "','YYYY-MM-DD'),'3000','" . $data['PLANT'] . "','1','" . $data['VALUE'] . "')");
        $url = base_url() . 'index.php/master_data';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
    }
    
    function x_rembang_kiln_desc($data) {
        $ora_mso = $this->load->database('oramso', TRUE);
        $ora_mso->query("UPDATE PIS_KILN_TES SET STOP_DESC = '" . $data['VALUE'] . "' WHERE TO_CHAR (DATE_PROD, 'YYYY-MM-DD') = '" . $data['DATE'] . "' AND PLANT = '" . $data['PLANT'] . "'");
        $url = base_url() . 'index.php/master_data';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
    }
    
    function x_rembang_fm_count($data) {
        $ora_mso = $this->load->database('oramso', TRUE);
        $ora_mso->query("INSERT INTO PIS_FM_TES (DATE_PROD, COMPANY, PLANT, STOP_COUNT, STOP_DESC) VALUES (TO_DATE('" . $data['DATE'] . "','YYYY-MM-DD'),'3000','" . $data['PLANT'] . "','1','" . $data['VALUE'] . "')");
        $url = base_url() . 'index.php/master_data';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
    }
    
    function x_rembang_fm_desc($data) {
        $ora_mso = $this->load->database('oramso', TRUE);
        $ora_mso->query("UPDATE PIS_FM_TES SET STOP_DESC = '" . $data['VALUE'] . "' WHERE TO_CHAR (DATE_PROD, 'YYYY-MM-DD') = '" . $data['DATE'] . "' AND PLANT = '" . $data['PLANT'] . "'");
        $url = base_url() . 'index.php/master_data';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
    }
    
    function x_rembang_prognose($data) {
        $this->db->set("DATE_PROD", "TO_DATE('" . $data['DATE_PROD'] . "', 'YYYY-MM-DD')", false);
        unset($data['DATE_PROD']);
        $result = $this->db->insert('PIS_SP_PROGNOSE_TES', $data);
        if ($result == 1) {
            return 'Data Sukses Diinputkan';
            $url = base_url() . 'index.php/master_data';
            echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
        } else {
            return 'Data Gagal Diinputkan';
            $url = base_url() . 'index.php/master_data';
            echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
        }
    }
    // </editor-fold>
    
    // <editor-fold defaultstate="collapsed" desc="Excel Mass Upload TONASA">
    function x_tonasa_kiln_count($data) {
        $ora_mso = $this->load->database('oramso', TRUE);
        $ora_mso->query("INSERT INTO PIS_KILN_TES (DATE_PROD, COMPANY, PLANT, STOP_COUNT, STOP_DESC) VALUES (TO_DATE('" . $data['DATE'] . "','YYYY-MM-DD'),'3000','" . $data['PLANT'] . "','1','" . $data['VALUE'] . "')");
        $url = base_url() . 'index.php/master_data';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
    }
    
    function x_tonasa_kiln_desc($data) {
        $ora_mso = $this->load->database('oramso', TRUE);
        $ora_mso->query("UPDATE PIS_KILN_TES SET STOP_DESC = '" . $data['VALUE'] . "' WHERE TO_CHAR (DATE_PROD, 'YYYY-MM-DD') = '" . $data['DATE'] . "' AND PLANT = '" . $data['PLANT'] . "'");
        $url = base_url() . 'index.php/master_data';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
    }
    
    function x_tonasa_fm_count($data) {
        $ora_mso = $this->load->database('oramso', TRUE);
        $ora_mso->query("INSERT INTO PIS_FM_TES (DATE_PROD, COMPANY, PLANT, STOP_COUNT, STOP_DESC) VALUES (TO_DATE('" . $data['DATE'] . "','YYYY-MM-DD'),'3000','" . $data['PLANT'] . "','1','" . $data['VALUE'] . "')");
        $url = base_url() . 'index.php/master_data';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
    }
    
    function x_tonasa_fm_desc($data) {
        $ora_mso = $this->load->database('oramso', TRUE);
        $ora_mso->query("UPDATE PIS_FM_TES SET STOP_DESC = '" . $data['VALUE'] . "' WHERE TO_CHAR (DATE_PROD, 'YYYY-MM-DD') = '" . $data['DATE'] . "' AND PLANT = '" . $data['PLANT'] . "'");
        $url = base_url() . 'index.php/master_data';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
    }
    
    function x_tonasa_prognose($data) {
        $this->db->set("DATE_PROD", "TO_DATE('" . $data['DATE_PROD'] . "', 'YYYY-MM-DD')", false);
        unset($data['DATE_PROD']);
        $result = $this->db->insert('PIS_SP_PROGNOSE_TES', $data);
        if ($result == 1) {
            return 'Data Sukses Diinputkan';
            $url = base_url() . 'index.php/master_data';
            echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
        } else {
            return 'Data Gagal Diinputkan';
            $url = base_url() . 'index.php/master_data';
            echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
        }
    }
    // </editor-fold>

    // <editor-fold defaultstate="collapsed" desc="Excel Mass Upload TLCC">
    function x_tlcc_kiln_count($data) {
        $ora_mso = $this->load->database('oramso', TRUE);
        $ora_mso->query("INSERT INTO PIS_KILN_TES (DATE_PROD, COMPANY, PLANT, STOP_COUNT, STOP_DESC) VALUES (TO_DATE('" . $data['DATE'] . "','YYYY-MM-DD'),'3000','" . $data['PLANT'] . "','1','" . $data['VALUE'] . "')");
        $url = base_url() . 'index.php/master_data';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
    }
    
    function x_tlcc_kiln_desc($data) {
        $ora_mso = $this->load->database('oramso', TRUE);
        $ora_mso->query("UPDATE PIS_KILN_TES SET STOP_DESC = '" . $data['VALUE'] . "' WHERE TO_CHAR (DATE_PROD, 'YYYY-MM-DD') = '" . $data['DATE'] . "' AND PLANT = '" . $data['PLANT'] . "'");
        $url = base_url() . 'index.php/master_data';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
    }
    
    function x_tlcc_fm_count($data) {
        $ora_mso = $this->load->database('oramso', TRUE);
        $ora_mso->query("INSERT INTO PIS_FM_TES (DATE_PROD, COMPANY, PLANT, STOP_COUNT, STOP_DESC) VALUES (TO_DATE('" . $data['DATE'] . "','YYYY-MM-DD'),'3000','" . $data['PLANT'] . "','1','" . $data['VALUE'] . "')");
        $url = base_url() . 'index.php/master_data';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
    }
    
    function x_tlcc_fm_desc($data) {
        $ora_mso = $this->load->database('oramso', TRUE);
        $ora_mso->query("UPDATE PIS_FM_TES SET STOP_DESC = '" . $data['VALUE'] . "' WHERE TO_CHAR (DATE_PROD, 'YYYY-MM-DD') = '" . $data['DATE'] . "' AND PLANT = '" . $data['PLANT'] . "'");
        $url = base_url() . 'index.php/master_data';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
    }
    
    function x_tlcc_prognose($data) {
        $this->db->set("DATE_PROD", "TO_DATE('" . $data['DATE_PROD'] . "', 'YYYY-MM-DD')", false);
        unset($data['DATE_PROD']);
        $result = $this->db->insert('PIS_SP_PROGNOSE_TES', $data);
        if ($result == 1) {
            return 'Data Sukses Diinputkan';
            $url = base_url() . 'index.php/master_data';
            echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
        } else {
            return 'Data Gagal Diinputkan';
            $url = base_url() . 'index.php/master_data';
            echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . $url . '">';
        }
    }
    // </editor-fold>
}
