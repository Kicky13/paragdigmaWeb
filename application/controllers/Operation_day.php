<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Operation_day extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->auth->GetSesionLogin();
        $this->load->model('m_master', 'master');
    }

    public function get_kiln_sg($bulan, $tahun, $plant) {
        if ($plant == 1) {
            echo '{"data":' . json_encode($this->master->add_ops_kiln_7000_tb1($bulan, $tahun)) . '}';
        } elseif ($plant == 2) {
            echo '{"data":' . json_encode($this->master->add_ops_kiln_7000_tb2($bulan, $tahun)) . '}';
        } elseif ($plant == 3) {
            echo '{"data":' . json_encode($this->master->add_ops_kiln_7000_tb3($bulan, $tahun)) . '}';
        } elseif ($plant == 4) {
            echo '{"data":' . json_encode($this->master->add_ops_kiln_7000_tb4($bulan, $tahun)) . '}';
        }
    }

    public function save_kiln_sg($bulan, $tahun, $plant) {
        if ($plant == 1) {
            $this->master->save_ops_kiln_7000_tb1($bulan, $tahun);
        } elseif ($plant == 2) {
            $this->master->save_ops_kiln_7000_tb2($bulan, $tahun);
        } elseif ($plant == 3) {
            $this->master->save_ops_kiln_7000_tb3($bulan, $tahun);
        } elseif ($plant == 4) {
            $this->master->save_ops_kiln_7000_tb4($bulan, $tahun);
        }
    }

    public function get_kiln_sp($bulan, $tahun, $plant) {
        if ($plant == 1) {
            echo '{"data":' . json_encode($this->master->add_ops_kiln_3000_ind2($bulan, $tahun)) . '}';
        } elseif ($plant == 2) {
            echo '{"data":' . json_encode($this->master->add_ops_kiln_3000_ind3($bulan, $tahun)) . '}';
        } elseif ($plant == 3) {
            echo '{"data":' . json_encode($this->master->add_ops_kiln_3000_ind4($bulan, $tahun)) . '}';
        } elseif ($plant == 4) {
            echo '{"data":' . json_encode($this->master->add_ops_kiln_3000_ind5($bulan, $tahun)) . '}';
        }
    }

    public function save_kiln_sp($bulan, $tahun, $plant) {
        if ($plant == 1) {
            $this->master->save_ops_kiln_3000_ind2($bulan, $tahun);
        } elseif ($plant == 2) {
            $this->master->save_ops_kiln_3000_ind3($bulan, $tahun);
        } elseif ($plant == 3) {
            $this->master->save_ops_kiln_3000_ind4($bulan, $tahun);
        } elseif ($plant == 4) {
            $this->master->save_ops_kiln_3000_ind5($bulan, $tahun);
        }
    }

    public function get_kiln_st($bulan, $tahun, $plant) {
        if ($plant == 1) {
            echo '{"data":' . json_encode($this->master->add_ops_kiln_4000_tns2($bulan, $tahun)) . '}';
        } elseif ($plant == 2) {
            echo '{"data":' . json_encode($this->master->add_ops_kiln_4000_tns3($bulan, $tahun)) . '}';
        } elseif ($plant == 3) {
            echo '{"data":' . json_encode($this->master->add_ops_kiln_4000_tns4($bulan, $tahun)) . '}';
        } elseif ($plant == 4) {
            echo '{"data":' . json_encode($this->master->add_ops_kiln_4000_tns5($bulan, $tahun)) . '}';
        }
    }

    public function save_kiln_st($bulan, $tahun, $plant) {
        if ($plant == 1) {
            $this->master->save_ops_kiln_4000_tns2($bulan, $tahun);
        } elseif ($plant == 2) {
            $this->master->save_ops_kiln_4000_tns3($bulan, $tahun);
        } elseif ($plant == 3) {
            $this->master->save_ops_kiln_4000_tns4($bulan, $tahun);
        } elseif ($plant == 4) {
            $this->master->save_ops_kiln_4000_tns5($bulan, $tahun);
        }
    }

    public function get_kiln_tlcc($bulan, $tahun) {
        echo '{"data":' . json_encode($this->master->add_ops_kiln_6000_mp($bulan, $tahun)) . '}';
    }

    public function save_kiln_tlcc($bulan, $tahun) {
        $this->master->save_ops_kiln_6000_mp($bulan, $tahun);
    }
}