<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Opex extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('mopex_report');
    }

    public function get_data_monthly() {

        $time           = isset($_GET['time']) ? $_GET['time'] : null;
        $company           = isset($_GET['comp']) ? $_GET['comp'] : null; 
        $category = isset($_GET['cat']) ? $_GET['cat'] : null;
        $year = substr($time, 0, 4);
        $month = substr($time, -2);
        $viewMonth=array();

        $selmonth = $month;
        $nl='0';
        for($i=$selmonth+1;$i<=12;$i++){
            if($i>9){
                $nl='';
            }
            $viewMonth[] = ($year-1).'.'.$nl.$i;
        }
        $nl='0';
        for($i=1;$i<=$selmonth;$i++){
            if($i>9){
                $nl='';
            }
            $viewMonth[] = $year.'.'.$nl.$i;
        }

        $company    = str_replace(",", "','", $company);
        $company    = str_replace(" ", "", $company);
        $input      = "";
        $tutup      = "";
        $cek        = $this->mopex_report->cek_subsidiary($company);
        

        $resultx=array();
        foreach($viewMonth as $months => $dates){
            IF ($company == "2000','7000" || $company == "5000','7000") {
                $company = explode("','", $company);
                $data = $this->mopex_report->data_coststructure_gabungan($company, $category, $dates, $dates);
                $data2 = $this->set_data($data, $company, $category, $dates, $dates);
            } ELSE IF ($company == "7000") {
                $data = $this->mopex_report->data_coststructure($company, $category, $dates, $dates);
                $data2 = $this->set_data($data, $company, $category, $dates, $dates);
            } ELSE IF ($cek != 'SUBSIDIARY') {
                $input = "<input id=iwip type=text onblur=change(this) onfocus=focusa(this) value=";
                $tutup = "></input>";
                $data = $this->mopex_report->data_coststructure($company, $category, $dates, $dates);
                $data2 = $this->set_data($data, $company, $category, $dates, $dates);
            }

            $datak = array();
            $data_download = array();
            IF ($cek == 'SUBSIDIARY') {
                //DATA ANAK USAHA=========================================================================================
                $kirim = $this->mopex_report->data_coststructure_subsidiary($company, $category, $dates, $dates);
    //            echopre($kirim); exit;
                $total_cogm = 0;
                $total_cogs = 0;
                $total_adm = 0;
                $total_sales = 0;
                foreach ($kirim as $key => $value) {
                    $datak[$key]["DESCRIPTION"] = "<span class=\"change_lang_eng\">$value->DESC_ENGLISH</span><span class=\"change_lang_ina hidden\">$value->DESC_INDO</span>";
                    $datak[$key]["COST_GROUP"] = $value->COST_GROUP2;
                    $datak[$key]["COST_GROUP_DESC"] = $value->COST_GROUP;
                    $datak[$key]["GL_ACCOUNT"] = $value->GL_ACCOUNT;
                    $data_download[$key]["DESCRIPTION"] = $value->DESC_ENGLISH;
                    $data_download[$key]["COST_GROUP"] = $value->COST_GROUP2;
                    $data_download[$key]["COST_GROUP_DESC"] = $value->COST_GROUP;
                    $data_download[$key]["GL_ACCOUNT"] = $value->GL_ACCOUNT;

                    IF ($value->DESC_ENGLISH == NULL || $value->DESC_ENGLISH == "<b>Cost of Goods Sold</b>" && $key == 0 || $value->DESC_ENGLISH == "<b>General & Administration Exp:</b>" || $value->DESC_ENGLISH == "<b>Selling & Marketing Exp:</b>") {
                        $datak[$key]["JUMLAH"] = "";
                        $data_download[$key]["JUMLAH"] = "";
                    } ELSE {
                        $datak[$key]["JUMLAH"] = number_format($value->JUMLAH, 0, '.', ',');
                        $data_download[$key]["JUMLAH"] = $value->JUMLAH;

                        //MENJUMLAHKAN NILAI TOTAL COST GROUP============================================================
                        IF ($value->COST_GROUP == "HPP") {
                            $total_cogm = $total_cogm + $value->JUMLAH;
                        } else if ($value->COST_GROUP == "HPP2") {
                            $total_cogs = $total_cogs + $value->JUMLAH;
                        } else if ($value->COST_GROUP == "ADM") {
                            $total_adm = $total_adm + $value->JUMLAH;
                        } else if ($value->COST_GROUP == "SALES") {
                            $total_sales = $total_sales + $value->JUMLAH;
                        }
                    }
                }
                //SET TOTAL PER COST GROUP ==============================================================
                foreach ($kirim as $key => $value) {
                    if ($value->COST_GROUP == "TOTAL_COGM") {
                        $datak[$key]["JUMLAH"] = number_format($total_cogm, 0, '.', ',');
                        $data_download[$key]["JUMLAH"] = $total_cogm;
                    } else if ($value->COST_GROUP == "TOTAL_COGS") {
                        $total_cogs = $total_cogm + $total_cogs;
                        $datak[$key]["JUMLAH"] = number_format($total_cogs, 0, '.', ',');
                        $data_download[$key]["JUMLAH"] = $total_cogs;
                    } else if ($value->COST_GROUP == "TOTAL_ADM") {
                        $datak[$key]["JUMLAH"] = number_format($total_adm, 0, '.', ',');
                        $data_download[$key]["JUMLAH"] = $total_adm;
                    } else if ($value->COST_GROUP == "TOTAL_SALES") {
                        $datak[$key]["JUMLAH"] = number_format($total_sales, 0, '.', ',');
                        $data_download[$key]["JUMLAH"] = $total_sales;
                    }
                }
                $this->session->set_userdata("data_coststructure", json_encode($data_download));
                $this->session->set_userdata("data_wip", number_format($kirim[14]->JUMLAH, 0, '.', ','));
            } else {
                //DATA GCEMENT ======================================================================================
                $kirim = $this->mopex_report->template_coststructure($company);
                foreach ($kirim as $key => $value) {
                    $datak[$key]["DESCRIPTION"] = "<span class=\"change_lang_eng\">$value->DESC_ENGLISH</span><span class=\"change_lang_ina hidden\">$value->DESC_INDO</span>";
                    $datak[$key]["COST_GROUP"] = $value->COST_GROUP2;
                    $datak[$key]["COST_GROUP_DESC"] = $value->COST_GROUP;
                    $datak[$key]["GL_ACCOUNT"] = $value->GL_ACCOUNT;
                    $datak[$key]["GL_ACCOUNT2"] = $value->GL_ACCOUNT2;
                    $data_download[$key]["DESCRIPTION"] = $value->DESC_ENGLISH;
                    $data_download[$key]["COST_GROUP"] = $value->COST_GROUP2;
                    $data_download[$key]["COST_GROUP_DESC"] = $value->COST_GROUP;
                    $data_download[$key]["GL_ACCOUNT"] = $value->GL_ACCOUNT;
                    $data_download[$key]["GL_ACCOUNT2"] = $value->GL_ACCOUNT2;

                    IF ($value->DESC_ENGLISH == NULL || $value->DESC_ENGLISH == "<b>Cost of Goods Sold</b>" && $key == 0 || $value->DESC_ENGLISH == "<b>General & Administration Exp:</b>" || $value->DESC_ENGLISH == "<b>Selling & Marketing Exp:</b>") {
                        $datak[$key]["JUMLAH"] = "";
                        $data_download[$key]["JUMLAH"] = "";
                    } ELSE {
                        $datak[$key]["JUMLAH"] = number_format($data2[$key]->JUMLAH, 0, '.', ',');
                        $data_download[$key]["JUMLAH"] = $data2[$key]->JUMLAH;
                    }
                }
                $this->session->set_userdata("data_coststructure", json_encode($data_download));
                $this->session->set_userdata("data_wip", number_format($data2[14]->JUMLAH, 0, '.', ','));
            }
            $resultx[] = $datak;
        }
        echo json_encode($resultx);
    }

    public function get_data() {

        $time           = isset($_GET['time']) ? $_GET['time'] : null;
        $company           = isset($_GET['comp']) ? $_GET['comp'] : null; 
        $category = isset($_GET['cat']) ? $_GET['cat'] : null;
        $year = substr($time, 0, 4);
        $month = substr($time, -2);
        if (date("Y.m") == "$year.$month") {
            $day = date('d');
            if ($day <= 15) {
                if ($month > 1) {
                    $month = $month - 1;
                    $month = substr("0$month", -2);
                } else {
                    $month = 12;
                    $year = $year - 1;
                }
            }
        }
        $date_last      = ((float)$year-1).'.'.$month;

        $company    = str_replace(",", "','", $company);
        $company    = str_replace(" ", "", $company);
        $input      = "";
        $tutup      = "";
        $cek        = $this->mopex_report->cek_subsidiary($company);

        IF ($company == "2000','7000" || $company == "5000','7000") {
            $company = explode("','", $company);
            $data = $this->mopex_report->data_coststructure_gabungan($company, $category, "$year.$month", "$year.$month");
            $data2 = $this->set_data($data, $company, $category, "$year.$month", "$year.$month");
        } ELSE IF ($company == "7000") {
            $data = $this->mopex_report->data_coststructure($company, $category, "$year.$month", "$year.$month");
            $data2 = $this->set_data($data, $company, $category, "$year.$month", "$year.$month");
        } ELSE IF ($cek != 'SUBSIDIARY') {
            $input = "<input id=iwip type=text onblur=change(this) onfocus=focusa(this) value=";
            $tutup = "></input>";
            $data = $this->mopex_report->data_coststructure($company, $category, "$year.$month", "$year.$month");
            $data2 = $this->set_data($data, $company, $category, "$year.$month", "$year.$month");
        }

        $datak = array();
        $data_download = array();
        IF ($cek == 'SUBSIDIARY') {
            //DATA ANAK USAHA=========================================================================================
            $kirim = $this->mopex_report->data_coststructure_subsidiary($company, $category, "$year.$month", "$year.$month");
//            echopre($kirim); exit;
            $total_cogm = 0;
            $total_cogs = 0;
            $total_adm = 0;
            $total_sales = 0;
            foreach ($kirim as $key => $value) {
                $datak[$key]["DESCRIPTION"] = "<span class=\"change_lang_eng\">$value->DESC_ENGLISH</span><span class=\"change_lang_ina hidden\">$value->DESC_INDO</span>";
                $datak[$key]["COST_GROUP"] = $value->COST_GROUP2;
                $datak[$key]["COST_GROUP_DESC"] = $value->COST_GROUP;
                $datak[$key]["GL_ACCOUNT"] = $value->GL_ACCOUNT;
                $data_download[$key]["DESCRIPTION"] = $value->DESC_ENGLISH;
                $data_download[$key]["COST_GROUP"] = $value->COST_GROUP2;
                $data_download[$key]["COST_GROUP_DESC"] = $value->COST_GROUP;
                $data_download[$key]["GL_ACCOUNT"] = $value->GL_ACCOUNT;

                IF ($value->DESC_ENGLISH == NULL || $value->DESC_ENGLISH == "<b>Cost of Goods Sold</b>" && $key == 0 || $value->DESC_ENGLISH == "<b>General & Administration Exp:</b>" || $value->DESC_ENGLISH == "<b>Selling & Marketing Exp:</b>") {
                    $datak[$key]["JUMLAH"] = "";
                    $data_download[$key]["JUMLAH"] = "";
                } ELSE {
                    $datak[$key]["JUMLAH"] = number_format($value->JUMLAH, 0, '.', ',');
                    $data_download[$key]["JUMLAH"] = $value->JUMLAH;

                    //MENJUMLAHKAN NILAI TOTAL COST GROUP============================================================
                    IF ($value->COST_GROUP == "HPP") {
                        $total_cogm = $total_cogm + $value->JUMLAH;
                    } else if ($value->COST_GROUP == "HPP2") {
                        $total_cogs = $total_cogs + $value->JUMLAH;
                    } else if ($value->COST_GROUP == "ADM") {
                        $total_adm = $total_adm + $value->JUMLAH;
                    } else if ($value->COST_GROUP == "SALES") {
                        $total_sales = $total_sales + $value->JUMLAH;
                    }
                }
            }
            //SET TOTAL PER COST GROUP ==============================================================
            foreach ($kirim as $key => $value) {
                if ($value->COST_GROUP == "TOTAL_COGM") {
                    $datak[$key]["JUMLAH"] = number_format($total_cogm, 0, '.', ',');
                    $data_download[$key]["JUMLAH"] = $total_cogm;
                } else if ($value->COST_GROUP == "TOTAL_COGS") {
                    $total_cogs = $total_cogm + $total_cogs;
                    $datak[$key]["JUMLAH"] = number_format($total_cogs, 0, '.', ',');
                    $data_download[$key]["JUMLAH"] = $total_cogs;
                } else if ($value->COST_GROUP == "TOTAL_ADM") {
                    $datak[$key]["JUMLAH"] = number_format($total_adm, 0, '.', ',');
                    $data_download[$key]["JUMLAH"] = $total_adm;
                } else if ($value->COST_GROUP == "TOTAL_SALES") {
                    $datak[$key]["JUMLAH"] = number_format($total_sales, 0, '.', ',');
                    $data_download[$key]["JUMLAH"] = $total_sales;
                }
            }
            $this->session->set_userdata("data_coststructure", json_encode($data_download));
            $this->session->set_userdata("data_wip", number_format($kirim[14]->JUMLAH, 0, '.', ','));
        } else {
            //DATA GCEMENT ======================================================================================
            $kirim = $this->mopex_report->template_coststructure($company);
            foreach ($kirim as $key => $value) {
                $datak[$key]["DESCRIPTION"] = "<span class=\"change_lang_eng\">$value->DESC_ENGLISH</span><span class=\"change_lang_ina hidden\">$value->DESC_INDO</span>";
                $datak[$key]["COST_GROUP"] = $value->COST_GROUP2;
                $datak[$key]["COST_GROUP_DESC"] = $value->COST_GROUP;
                $datak[$key]["GL_ACCOUNT"] = $value->GL_ACCOUNT;
                $datak[$key]["GL_ACCOUNT2"] = $value->GL_ACCOUNT2;
                $data_download[$key]["DESCRIPTION"] = $value->DESC_ENGLISH;
                $data_download[$key]["COST_GROUP"] = $value->COST_GROUP2;
                $data_download[$key]["COST_GROUP_DESC"] = $value->COST_GROUP;
                $data_download[$key]["GL_ACCOUNT"] = $value->GL_ACCOUNT;
                $data_download[$key]["GL_ACCOUNT2"] = $value->GL_ACCOUNT2;

                IF ($value->DESC_ENGLISH == NULL || $value->DESC_ENGLISH == "<b>Cost of Goods Sold</b>" && $key == 0 || $value->DESC_ENGLISH == "<b>General & Administration Exp:</b>" || $value->DESC_ENGLISH == "<b>Selling & Marketing Exp:</b>") {
                    $datak[$key]["JUMLAH"] = "";
                    $data_download[$key]["JUMLAH"] = "";
                } ELSE {
                    $datak[$key]["JUMLAH"] = number_format($data2[$key]->JUMLAH, 0, '.', ',');
                    $data_download[$key]["JUMLAH"] = $data2[$key]->JUMLAH;
                }
            }
            $this->session->set_userdata("data_coststructure", json_encode($data_download));
            $this->session->set_userdata("data_wip", number_format($data2[14]->JUMLAH, 0, '.', ','));
        }

        echo json_encode($datak);
    }


    public function set_data($data, $company, $category, $time, $time2) {
        $data2;
        for ($i = 0; $i < 86; $i++) {
            if (isset($data[$i]->NOMOR)) {
                $NO = (int) $data[$i]->NOMOR;
                $data2[$NO] = $data[$i];
            }
            if (!isset($data2[$i]->NOMOR)) {
                $nilai['NOMOR'] = $i;
                $nilai['JUMLAH'] = 0;
                $data2[$i] = (object) $nilai;
            }
        }
        //COGM
        $nilai['JUMLAH'] = $data2[1]->JUMLAH + $data2[2]->JUMLAH + $data2[3]->JUMLAH + $data2[4]->JUMLAH + $data2[5]->JUMLAH + $data2[6]->JUMLAH + $data2[7]->JUMLAH + $data2[8]->JUMLAH + $data2[9]->JUMLAH + $data2[52]->JUMLAH + $data2[53]->JUMLAH + $data2[54]->JUMLAH + $data2[55]->JUMLAH + $data2[56]->JUMLAH + $data2[57]->JUMLAH + $data2[58]->JUMLAH + $data2[59]->JUMLAH;
        $data2[10] = (object) $nilai;
        //DATA VARIANCE STOK
        $data2[13]->JUMLAH = $data2[13]->JUMLAH - $data2[14]->JUMLAH;
        if ($company == "4000") {
            $data2[13]->JUMLAH = $data2[13]->JUMLAH - $data2[12]->JUMLAH - $data2[11]->JUMLAH - $data2[10]->JUMLAH;
        }
        //COGS
        $nilai['JUMLAH'] = $data2[10]->JUMLAH + $data2[11]->JUMLAH + $data2[12]->JUMLAH + $data2[13]->JUMLAH + $data2[14]->JUMLAH;
        $data2[15] = (object) $nilai;
        //TOTAL GENERAL DAN ADMINISTRATION EXP
        $nilai['JUMLAH'] = $data2[18]->JUMLAH + $data2[19]->JUMLAH + $data2[20]->JUMLAH + $data2[21]->JUMLAH + $data2[22]->JUMLAH + $data2[23]->JUMLAH + $data2[24]->JUMLAH + $data2[25]->JUMLAH + $data2[40]->JUMLAH + $data2[41]->JUMLAH + $data2[42]->JUMLAH + $data2[43]->JUMLAH + $data2[44]->JUMLAH + $data2[45]->JUMLAH + $data2[46]->JUMLAH + $data2[47]->JUMLAH + $data2[48]->JUMLAH + $data2[49]->JUMLAH + $data2[50]->JUMLAH + $data2[51]->JUMLAH;
        $data2[26] = (object) $nilai;
        if ($company == '7000' || $company == array("2000", "7000")) {
            //MARKETING
            $min_marketing = $this->mopex_report->get_total_min_marketing($company, $category, $time, $time2)->JUMLAH;
            $data2[36]->JUMLAH = $data2[36]->JUMLAH - $min_marketing;
        }
        //TOTAL SELLING DAN MARKETING EXP
        $nilai['JUMLAH'] = $data2[29]->JUMLAH + $data2[30]->JUMLAH + $data2[31]->JUMLAH + $data2[32]->JUMLAH + $data2[33]->JUMLAH + $data2[34]->JUMLAH + $data2[35]->JUMLAH + $data2[36]->JUMLAH + $data2[60]->JUMLAH + $data2[61]->JUMLAH + $data2[62]->JUMLAH + $data2[63]->JUMLAH + $data2[64]->JUMLAH + $data2[65]->JUMLAH + $data2[66]->JUMLAH + $data2[67]->JUMLAH + $data2[68]->JUMLAH + $data2[69]->JUMLAH + $data2[70]->JUMLAH + $data2[71]->JUMLAH + $data2[72]->JUMLAH + $data2[73]->JUMLAH;
        $data2[37] = (object) $nilai;

        return $data2;
    }

    public function get_last_date($time) {
        $time_sebelum;
        //MENGAMBIL BULAN=============================================================================
        $month = substr($time, -2);
        $month1 = $month - 1;
        $month1 = "0$month1";
        $month1 = substr($month1, -2);

        //MENGAMBIL TAHUN==============================================================================
        $year = substr($time, 0, 4);
        if ($month1 == "00") {
            $month1 = "12";
            $time_sebelum = $year - 1 . '.' . $month1;
        } else {
            $time_sebelum = $year . '.' . $month1;
        }
        return $time_sebelum;
    }

    public function get_detail() {
        $company = $_POST['ecompany'];
        $category = $_POST['ecategory'];
        //======================= time =========================
        $time = $_POST['etime'];
        $year = substr($time, 0, 4);
        $month = substr($time, -2);
        if (date("Y.m") == "$year.$month") {
            $day = date('d');
            if ($day <= 15) {
                if ($month > 1) {
                    $month = $month - 1;
                    $month = substr("0$month", -2);
                } else {
                    $month = 12;
                    $year = $year - 1;
                }
            }
        }
        //==========================================================
        $time2 = $_POST['etime2'];
        $year2 = substr($time2, 0, 4);
        $month2 = substr($time2, -2);
        if (date("Y.m") == "$year2.$month2") {
            $day = date('d');
            if ($day <= 15) {
                if ($month2 > 1) {
                    $month2 = $month2 - 1;
                    $month2 = substr("0$month2", -2);
                } else {
                    $month2 = 12;
                    $year2 = $year2 - 1;
                }
            }
        }
        //==========================================================
        $index = $_POST['eindex'];
        $group = $_POST['egroup'];
        $account = $_POST['eaccount'];
        $cek = $_POST['ecek'];
        $time3 = $this->get_last_date("$year.$month");
        $time4 = $this->get_last_date("$year2.$month2");
        $nomor = substr('0' . $index, -2);

        IF ($company == "2000','7000" || $company == "5000','7000") {
            $company = explode("','", $company);
            $name[0] = $category . '_' . $company[0] . '_D';
            $name[1] = $category . '_' . $company[1] . '_D';
            $data['rows'] = $this->M_cost->detail_gabungan("$year.$month", "$year2.$month2", 'NOT', $name, $nomor);
            echo json_encode($data);
        } ELSE {
            if ($cek == 'GCEMENT') {
                $name = $category . '_' . $company . '_D';
                $data['rows'] = $this->M_cost->detail_coststructure("$year.$month", "$year2.$month2", 'NOT', $name, $nomor);
                echo json_encode($data);
            } else {
                $data['rows'] = $this->M_cost->detail_coststructure_subsidiary("$year.$month", "$year2.$month2", $nomor, $group, $account, $company, $category);
                echo json_encode($data);
            }
        }
    }

    public function get_detail_nc() {
        $company = $_POST['ecompany'];
        $category = $_POST['ecategory'];
        //======================= time =========================
        $time = $_POST['etime'];
        $year = substr($time, 0, 4);
        $month = substr($time, -2);
        if (date("Y.m") == "$year.$month") {
            $day = date('d');
            if ($day <= 15) {
                if ($month > 1) {
                    $month = $month - 1;
                    $month = substr("0$month", -2);
                } else {
                    $month = 12;
                    $year = $year - 1;
                }
            }
        }
        //==========================================================
        $time2 = $_POST['etime2'];
        $year2 = substr($time2, 0, 4);
        $month2 = substr($time2, -2);
        if (date("Y.m") == "$year2.$month2") {
            $day = date('d');
            if ($day <= 15) {
                if ($month2 > 1) {
                    $month2 = $month2 - 1;
                    $month2 = substr("0$month2", -2);
                } else {
                    $month2 = 12;
                    $year2 = $year2 - 1;
                }
            }
        }
        //==========================================================
        $index = $_POST['eindex'];
        $nomor = substr('0' . $index, -2);

        IF ($company == "2000','7000" || $company == "5000','7000") {
            $company = explode("','", $company);
            $name[0] = $category . '_' . $company[0] . '_D';
            $name[1] = $category . '_' . $company[1] . '_D';
            $data['rows'] = $this->M_cost->detail_gabungan("$year.$month", "$year2.$month2", '', $name, $nomor);
            echo json_encode($data);
        } ELSE {
            $name = $category . '_' . $company . '_D';
            $data['rows'] = $this->M_cost->detail_coststructure("$year.$month", "$year2.$month2", '', $name, $nomor);
            echo json_encode($data);
        }
    }

    //GET DATA COSTCENTER======================================================================================================================================
    public function detail_total($fs, $company, $category, $time, $time2, $parent) {
        $data['rows'] = $this->M_cost->get_detail($fs, $company, $category, $time, $time2, $parent);
        echo json_encode($data);
    }

    //GET DATA NON COSTCENTER=================================================================================================================================
    public function detail_total_nc($fs, $company, $category, $time, $time2, $nc) {
        $data['rows'] = $this->M_cost->get_detail_nc($fs, $company, $category, $time, $time2, $nc);
        echo json_encode($data);
    }

    public function detail_total_nc_not($fs, $company, $category, $time, $time2, $nc, $gl_not) {
        $data['rows'] = $this->M_cost->get_detail_nc_not($fs, $company, $category, $time, $time2, $nc, $gl_not);
        echo json_encode($data);
    }
}

