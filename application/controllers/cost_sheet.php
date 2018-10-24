<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class cost_sheet extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mcost_sheet');
    }

    public function category() {
        echo json_encode($this->mcost_sheet->get_category());
    }

    public function get_material() {
        $comp = isset($_GET['company']) ? $_GET['company'] : "7000";
        echo json_encode($this->mcost_sheet->get_material($comp));
    }

    public function get_column() {
        $comp = $_GET['company'];
        $mat = $_GET['material'];
        $column = $this->mcost_sheet->get_column($comp, $mat);
        echo json_encode($column);
    }

    public function get_data1() {
        $i = isset($_GET['id']) ? $_GET['id'] : 'AWAL';
        $limit = $this->input->post('rows');
        $offset = ($this->input->post('page') - 1) * $limit;

        $comp = $_GET['ecomp'];
        $mat = $_GET['emat'];
        $cat = $_GET['ecat'];
        $year = $_GET['eyear'];
        $column = $_GET['ecolumn'];

        IF ($i == 'AWAL') {
            $return = $this->mcost_sheet->awal($_GET);
        } ELSE IF ($i == 'mat') {
            $return = $this->mcost_sheet->get_mat($comp, $mat, $year);
        } ELSE IF ($i == 'op') {
            $return = $this->mcost_sheet->get_op($_GET);
        } ELSE IF ($i == 'fix') {
            $return = $this->mcost_sheet->get_fix($comp, $mat, $year);
        } ELSE {
            $return = $this->mcost_sheet->material_consumption($comp, $mat, $year);
        }

        echo json_encode($return);
    }

    public function get_data() {
        $desc['MC'] = $this->mcost_sheet->get_detail_material(array($_GET['emat']));
        $ttl = array(
            array('code' => 'PRD', 'desc' => $desc['MC']['DATA_PRODUCT'][$_GET['emat']]),
            array('code' => 'COV', 'desc' => 'COST VARIABLE'),
            array('code' => 'CF', 'desc' => 'COST FIXED')
        );
        $COV = array(
            array('code' => 'MC', 'desc' => 'MATERIAL CONSUMPTION'),
            array('code' => 'OC', 'desc' => 'OPERASIONAL COST')
        );
        $column = $this->mcost_sheet->get_column($_GET['ecomp'], $_GET['emat']);
        $desc['OC'] = array('BAHAN BAKAR', 'BAHAN BAKU', 'BAHAN PENOLONG', 'KEMASAN', 'LISTRIK', 'PERNIAGA');

        $desc['CF'] = array('DEPLASI, PENYUSUTAN & AMORTISASI', 'KAPITALISASI ASSET', 'PAJAK ASSURANSI', 'PEMELIHARAAN', 'TENAGA KERJA', 'URUSAN UMUM ADM.');

        $dt = $this->mcost_sheet->get_val($_GET, $column, $desc['MC']['DATA_MATERIAL'][$_GET['emat']]);

        foreach ($ttl as $k => $v) {
            $ret['rows'][$k]['id'] = $v['code'];
            $ret['rows'][$k]['COST'] = "<b>" . $v['desc'] . "</b>";
            if ($v['code'] == 'PRD') {
                $ret['rows'][$k]['COST'] = "<b>" . $_GET['emat'] . " : " . $v['desc'] . "</b>";
                //INI UNTUK PRODUK BELUM BISA AMBIL QUERY
            } elseif ($v['code'] == 'COV') {
                foreach ($COV as $kk => $vv) {
                    $ret['rows'][$k]['children'][$kk]['id'] = $vv['code'];
                    $ret['rows'][$k]['children'][$kk]['COST'] = "<b>" . $vv['desc'] . "</b>";
                    foreach ($column as $key => $val) {
//                        $qty_mc = array_sum($dt['MC']['QTY'][$val->PLANT]);
                        $val_mc = array_sum($dt['MC']['COS'][$val->PLANT]);
                        $val_oc = array_sum($dt['OC']['PRC'][$val->PLANT]);

//                        $qty = number_format($qty_mc);
                        $val = number_format($val_mc + $val_oc);
//                        $ret['rows'][$k]['QTY' . $key] = "<b>$qty</b>";
//                        $ret['rows'][$k]['TON' . $key] = "";
                        $ret['rows'][$k]['AMOUNT' . $key] = "<b>$val</b>";
                    }
                    if ($vv['code'] == "MC") {
                        foreach ($column as $key => $val) {
                            $qty = array_sum($dt['MC']['QTY'][$val->PLANT]);
                            $prc = array_sum($dt['MC']['PRC'][$val->PLANT]) / COUNT($dt['MC']['PRC'][$val->PLANT]);
                            $val = array_sum($dt['MC']['COS'][$val->PLANT]);
                            $ret['rows'][$k]['children'][$kk]['QTY' . $key] = "<b>" . number_format($qty) . "</b>";
//                            $ret['rows'][$k]['children'][$kk]['TON' . $key] = "<b>".number_format($prc)."</b>";
                            $ret['rows'][$k]['children'][$kk]['AMOUNT' . $key] = "<b>" . number_format($val) . "</b>";
                        }
                        //tampilkan nilai default dari product
                        $no = 0;
                        $cek_ada = 0;

                        foreach ($column as $key => $val) {
                            $ret['rows'][$k]['children'][$kk]['children'][$no]['id'] = $vv['code'] . "__" . str_replace("-", "_", $_GET['emat']);
                            $ret['rows'][$k]['children'][$kk]['children'][$no]['COST'] = "ORIGINAL COST PRODUCT";
                            $cek_val_product = isset($dt['MC']['QTY'][$val->PLANT][$_GET['emat']]) ? $dt['MC']['QTY'][$val->PLANT][$_GET['emat']] : "iw";

                            if ($cek_val_product != "iw") {
                                $qty = $dt['MC']['QTY'][$val->PLANT][$_GET['emat']];
                                $prc = $dt['MC']['PRC'][$val->PLANT][$_GET['emat']];
                                $vale = $dt['MC']['COS'][$val->PLANT][$_GET['emat']];

                                $ret['rows'][$k]['children'][$kk]['children'][$no]['QTY' . $key] = number_format($qty);
                                $ret['rows'][$k]['children'][$kk]['children'][$no]['TON' . $key] = number_format($prc);
                                $ret['rows'][$k]['children'][$kk]['children'][$no]['AMOUNT' . $key] = number_format($vale);
                                $cek_ada++;
                            }
                        }

                        if ($cek_ada != 0) {
                            $no++;
                        }
                        foreach ($desc['MC']['DATA_MATERIAL'][$_GET['emat']] as $kkk => $vvv) {
                            $ret['rows'][$k]['children'][$kk]['children'][$no]['id'] = $vv['code'] . "__" . str_replace("-", "_", $kkk);
                            $ret['rows'][$k]['children'][$kk]['children'][$no]['COST'] = $vvv;

                            foreach ($column as $key => $val) {
                                $qty = $dt['MC']['QTY'][$val->PLANT][$kkk];
                                $prc = $dt['MC']['PRC'][$val->PLANT][$kkk];
                                $vale = $dt['MC']['COS'][$val->PLANT][$kkk];
                                $ret['rows'][$k]['children'][$kk]['children'][$no]['QTY' . $key] = number_format($qty);
                                $ret['rows'][$k]['children'][$kk]['children'][$no]['TON' . $key] = number_format($prc);
                                $ret['rows'][$k]['children'][$kk]['children'][$no]['AMOUNT' . $key] = number_format($vale);
                            }
                            $no++;
                        }
                        //Operational Cost
                    } else {
                        foreach ($column as $key => $val) {
                            $val = array_sum($dt['OC']['PRC'][$val->PLANT]);
//                            $ret['rows'][$k]['children'][$kk]['QTY' . $key] = "";
//                            $ret['rows'][$k]['children'][$kk]['TON' . $key] = "";
                            $ret['rows'][$k]['children'][$kk]['AMOUNT' . $key] = "<b>" . number_format($val) . "</b>";
                        }
                        $no = 0;
                        foreach ($desc[$vv['code']] as $kkk => $vvv) {
                            $ret['rows'][$k]['children'][$kk]['children'][$no]['id'] = $vv['code'] . "__" . str_replace("-", "_", $kkk);
                            $ret['rows'][$k]['children'][$kk]['children'][$no]['COST'] = $vvv;
                            foreach ($column as $key => $val) {
                                $val = $dt['OC']['PRC'][$val->PLANT][$kkk];
//                                $ret['rows'][$k]['children'][$kk]['children'][$no]['QTY' . $key] = '';
//                                $ret['rows'][$k]['children'][$kk]['children'][$no]['TON' . $key] = "";
                                $ret['rows'][$k]['children'][$kk]['children'][$no]['AMOUNT' . $key] = number_format($val);
                            }
                            $no++;
                        }
                    }
                }
            } else {
                //Cost Fixed
                foreach ($column as $key => $val) {
                    $val = array_sum($dt['CF']['PRC'][$val->PLANT]);
//                    $ret['rows'][$k]['QTY' . $key] = '';
//                    $ret['rows'][$k]['TON' . $key] = "";
                    $ret['rows'][$k]['AMOUNT' . $key] = "<b>" . number_format($val) . "</b>";
                }
                foreach ($desc[$v['code']] as $kk => $vv) {
                    $ret['rows'][$k]['children'][$kk]['id'] = $v['code'] . "__" . $kk;
                    $ret['rows'][$k]['children'][$kk]['COST'] = $vv;
                    foreach ($column as $key => $val) {
                        $val = $dt['CF']['PRC'][$val->PLANT][$kk];
//                        $ret['rows'][$k]['children'][$kk]['QTY' . $key] = '';
//                        $ret['rows'][$k]['children'][$kk]['TON' . $key] = '';
                        $ret['rows'][$k]['children'][$kk]['AMOUNT' . $key] = number_format($val);
                        ;
                    }
                }
            }
        }
        echo json_encode($ret);
    }

}
