<?php
$input = $this->input->get('input');
$tahun = !empty($input) ? $input['tahun'] : date('Y');
$dateof_year = date('z', mktime(0, 0, 0, 12, 31, $tahun)) + 1;
$dateup_year = date('z') + 1;
//===================================================Untuk Quartal dan bulanan===================================================//
$jml_jan = ($datacl_sg["$thn-01"]['sg']) + ($datacl_sp["$thn-01"]['sp']) + ($datacl_st["$thn-01"]['st']) + ($datacl_tlcc["$thn-01"]['tlcc']) + ($rkap_cl_rb["$thn-01"]['rembang']);
$jml_feb = ($datacl_sg["$thn-02"]['sg']) + ($datacl_sp["$thn-02"]['sp']) + ($datacl_st["$thn-02"]['st']) + ($datacl_tlcc["$thn-02"]['tlcc']) + ($rkap_cl_rb["$thn-02"]['rembang']);
$jml_mar = ($datacl_sg["$thn-03"]['sg']) + ($datacl_sp["$thn-03"]['sp']) + ($datacl_st["$thn-03"]['st']) + ($datacl_tlcc["$thn-03"]['tlcc']) + ($rkap_cl_rb["$thn-03"]['rembang']);

$total_upto_q1 = $jml_jan + $jml_feb + $jml_mar;

$total_rkap_q1 = ($rkap_cl[1]['CLINKER']) + ($rkap_cl[2]['CLINKER']) + ($rkap_cl[3]['CLINKER']);

$total_q1 = ($total_upto_q1 / $total_rkap_q1) * 100;

$jml_apr = ($datacl_sg["$thn-04"]['sg']) + ($datacl_sp["$thn-04"]['sp']) + ($datacl_st["$thn-04"]['st']) + ($datacl_tlcc["$thn-04"]['tlcc']) + ($rkap_cl_rb["$thn-04"]['rembang']);
$jml_may = ($datacl_sg["$thn-05"]['sg']) + ($datacl_sp["$thn-05"]['sp']) + ($datacl_st["$thn-05"]['st']) + ($datacl_tlcc["$thn-05"]['tlcc']) + ($rkap_cl_rb["$thn-05"]['rembang']);
$jml_jun = ($datacl_sg["$thn-06"]['sg']) + ($datacl_sp["$thn-06"]['sp']) + ($datacl_st["$thn-06"]['st']) + ($datacl_tlcc["$thn-06"]['tlcc']) + ($rkap_cl_rb["$thn-06"]['rembang']);

$total_upto_q2 = $jml_apr + $jml_may + $jml_jun;

$total_rkap_q2 = ($rkap_cl[4]['CLINKER']) + ($rkap_cl[5]['CLINKER']) + ($rkap_cl[6]['CLINKER']);

$total_q2 = ($total_upto_q2 / $total_rkap_q2) * 100;

$jml_jul = ($datacl_sg["$thn-07"]['sg']) + ($datacl_sp["$thn-07"]['sp']) + ($datacl_st["$thn-07"]['st']) + ($datacl_tlcc["$thn-07"]['tlcc']) + ($rkap_cl_rb["$thn-07"]['rembang']);
$jml_aug = ($datacl_sg["$thn-08"]['sg']) + ($datacl_sp["$thn-08"]['sp']) + ($datacl_st["$thn-08"]['st']) + ($datacl_tlcc["$thn-08"]['tlcc']) + ($rkap_cl_rb["$thn-08"]['rembang']);
$jml_sep = ($datacl_sg["$thn-09"]['sg']) + ($datacl_sp["$thn-09"]['sp']) + ($datacl_st["$thn-09"]['st']) + ($datacl_tlcc["$thn-09"]['tlcc']) + ($rkap_cl_rb["$thn-09"]['rembang']);

$total_upto_q3 = $jml_jul + $jml_aug + $jml_sep;

$total_rkap_q3 = ($rkap_cl[7]['CLINKER']) + ($rkap_cl[8]['CLINKER']) + ($rkap_cl[9]['CLINKER']);

$total_q3 = ($total_upto_q3 / $total_rkap_q3) * 100;

$jml_okt = ($datacl_sg["$thn-10"]['sg']) + ($datacl_sp["$thn-10"]['sp']) + ($datacl_st["$thn-10"]['st']) + ($datacl_tlcc["$thn-10"]['tlcc']) + ($rkap_cl_rb["$thn-10"]['rembang']);
$jml_nov = ($datacl_sg["$thn-11"]['sg']) + ($datacl_sp["$thn-11"]['sp']) + ($datacl_st["$thn-11"]['st']) + ($datacl_tlcc["$thn-11"]['tlcc']) + ($rkap_cl_rb["$thn-11"]['rembang']);
$jml_des = ($datacl_sg["$thn-12"]['sg']) + ($datacl_sp["$thn-12"]['sp']) + ($datacl_st["$thn-12"]['st']) + ($datacl_tlcc["$thn-12"]['tlcc']) + ($rkap_cl_rb["$thn-12"]['rembang']);

$total_upto_q4 = $jml_okt + $jml_nov + $jml_des;

$total_rkap_q4 = ($rkap_cl[10]['CLINKER']) + ($rkap_cl[11]['CLINKER']) + ($rkap_cl[12]['CLINKER']);

$total_q4 = ($total_upto_q4 / $total_rkap_q4) * 100;
//===================================================Untuk menu samping kiri (collapsed)===================================================//
// Semen Indonesia Group [CLINKER]
$total_upto_sg_cl = ($datacl_sg["$thn-01"]['sg']) + ($datacl_sg["$thn-02"]['sg']) +
        ($datacl_sg["$thn-03"]['sg']) + ($datacl_sg["$thn-04"]['sg']) +
        ($datacl_sg["$thn-05"]['sg']) + ($datacl_sg["$thn-06"]['sg']) +
        ($datacl_sg["$thn-07"]['sg']) + ($datacl_sg["$thn-08"]['sg']) + 
        ($datacl_sg["$thn-09"]['sg']) + ($datacl_sg["$thn-10"]['sg']) + 
        ($datacl_sg["$thn-11"]['sg']) + ($datacl_sg["$thn-12"]['sg']);

$total_upto_sp_cl = ($datacl_sp["$thn-01"]['sp']) + ($datacl_sp["$thn-02"]['sp']) +
        ($datacl_sp["$thn-03"]['sp']) + ($datacl_sp["$thn-04"]['sp']) +
        ($datacl_sp["$thn-05"]['sp']) + ($datacl_sp["$thn-06"]['sp']) +
        ($datacl_sp["$thn-07"]['sp']) + ($datacl_sp["$thn-08"]['sp']) + 
        ($datacl_sp["$thn-09"]['sp']) + ($datacl_sp["$thn-10"]['sp']) + 
        ($datacl_sp["$thn-11"]['sp']) + ($datacl_sp["$thn-12"]['sp']);

$total_upto_st_cl = ($datacl_st["$thn-01"]['st']) + ($datacl_st["$thn-02"]['st']) +
        ($datacl_st["$thn-03"]['st']) + ($datacl_st["$thn-04"]['st']) +
        ($datacl_st["$thn-05"]['st']) + ($datacl_st["$thn-06"]['st']) +
        ($datacl_st["$thn-07"]['st']) + ($datacl_st["$thn-08"]['st']) + 
        ($datacl_st["$thn-09"]['st']) + ($datacl_st["$thn-10"]['st']) + 
        ($datacl_st["$thn-11"]['st']) + ($datacl_st["$thn-12"]['st']);

$total_upto_tlcc_cl = ($datacl_tlcc["$thn-01"]['tlcc']) + ($datacl_tlcc["$thn-02"]['tlcc']) +
        ($datacl_tlcc["$thn-03"]['tlcc']) + ($datacl_tlcc["$thn-04"]['tlcc']) +
        ($datacl_tlcc["$thn-05"]['tlcc']) + ($datacl_tlcc["$thn-06"]['tlcc']) +
        ($datacl_tlcc["$thn-07"]['tlcc']) + ($datacl_tlcc["$thn-08"]['tlcc']) + 
        ($datacl_tlcc["$thn-09"]['tlcc']) + ($datacl_tlcc["$thn-10"]['tlcc']) + 
        ($datacl_tlcc["$thn-11"]['tlcc']) + ($datacl_tlcc["$thn-12"]['tlcc']);

$total_upto_smig_cl = $total_upto_sg_cl + $total_upto_sp_cl + $total_upto_st_cl + $total_upto_tlcc_cl;

$total_rkap_smig_cl = ($rkap_cl[1]['CLINKER']) + ($rkap_cl[2]['CLINKER']) +
        ($rkap_cl[3]['CLINKER']) + ($rkap_cl[4]['CLINKER']) +
        ($rkap_cl[5]['CLINKER']) + ($rkap_cl[6]['CLINKER']) +
        ($rkap_cl[7]['CLINKER']) + ($rkap_cl[8]['CLINKER']) +
        ($rkap_cl[9]['CLINKER']) + ($rkap_cl[10]['CLINKER']) +
        ($rkap_cl[11]['CLINKER']) + ($rkap_cl[12]['CLINKER']);

$hasil_year_smig_cl = ($total_upto_smig_cl / $total_rkap_smig_cl) * 100;

// Semen Padang [CLINKER]
$hasil_tot_klinsp = number_format((($data_sp['0']['CLINKER'] / $rkap_sp['0']['KLINKER'] ) * 100), 2, ",", ".");
// Semen Gresik [CLINKER]
$hasil_tot_klinsg = number_format((($data['0']['CLINKER'] / $rkap['0']['KLINKER']) * 100), 2, ",", ".");
// Semen Tonasa [CLINKER]
$hasil_tot_klinst = number_format((( $data_st['0']['CLINKER'] / $rkap_st['0']['KLINKER']) * 100), 2, ",", ".");
// Semen TLCC [CLINKER]
$hasil_tot_klintl = number_format((( $data_tl['0']['CLINKER'] / $rkap_tl['0']['KLINKER']) * 100), 2, ",", ".");
// Semen Gresik Rembang [CLINKER]
$hasil_tot_klinrb = number_format((( $data_rb['0']['CLINKER'] / $rkap_rb['0']['KLINKER']) * 100), 2, ",", ".");

//=================================================== Semen Padang (collapsed)===================================================//
if (!empty($klinDataPD["$thn-01"])) {
    $arr_jan_sp = (array_sum(($klinDataPD["$thn-01"])));
} else {
    $arr_jan_sp = 0;
}
if (!empty($klinDataPD["$thn-02"])) {
    $arr_feb_sp = (array_sum(($klinDataPD["$thn-02"])));
} else {
    $arr_feb_sp = 0;
}
if (!empty($klinDataPD["$thn-03"])) {
    $arr_mar_sp = (array_sum(($klinDataPD["$thn-03"])));
} else {
    $arr_mar_sp = 0;
}
if (!empty($klinDataPD["$thn-04"])) {
    $arr_apr_sp = (array_sum(($klinDataPD["$thn-04"])));
} else {
    $arr_apr_sp = 0;
}
if (!empty($klinDataPD["$thn-05"])) {
    $arr_may_sp = (array_sum(($klinDataPD["$thn-05"])));
} else {
    $arr_may_sp = 0;
}
if (!empty($klinDataPD["$thn-06"])) {
    $arr_jun_sp = (array_sum(($klinDataPD["$thn-06"])));
} else {
    $arr_jun_sp = 0;
}
if (!empty($klinDataPD["$thn-07"])) {
    $arr_jul_sp = (array_sum(($klinDataPD["$thn-07"])));
} else {
    $arr_jul_sp = 0;
}
if (!empty($klinDataPD["$thn-08"])) {
    $arr_aug_sp = (array_sum(($klinDataPD["$thn-08"])));
} else {
    $arr_aug_sp = 0;
}
if (!empty($klinDataPD["$thn-09"])) {
    $arr_sep_sp = (array_sum(($klinDataPD["$thn-09"])));
} else {
    $arr_sep_sp = 0;
}
if (!empty($klinDataPD["$thn-10"])) {
    $arr_okt_sp = (array_sum(($klinDataPD["$thn-10"])));
} else {
    $arr_okt_sp = 0;
}
if (!empty($klinDataPD["$thn-11"])) {
    $arr_nop_sp = (array_sum(($klinDataPD["$thn-11"])));
} else {
    $arr_nop_sp = 0;
}
if (!empty($klinDataPD["$thn-12"])) {
    $arr_dec_sp = (array_sum(($klinDataPD["$thn-12"])));
} else {
    $arr_dec_sp = 0;
}

$total_upto_year_sp = $arr_jan_sp + $arr_feb_sp + $arr_mar_sp + $arr_apr_sp + $arr_may_sp + $arr_jun_sp + $arr_jul_sp + $arr_aug_sp + $arr_sep_sp + $arr_okt_sp + $arr_nop_sp + $arr_dec_sp;
$total_rkap_year_sp = ($DProductionPD[1]['clinker']) + ($DProductionPD[2]['clinker']) +
        ($DProductionPD[3]['clinker']) + ($DProductionPD[4]['clinker']) +
        ($DProductionPD[5]['clinker']) + ($DProductionPD[6]['clinker']) +
        ($DProductionPD[7]['clinker']) + ($DProductionPD[8]['clinker']) +
        ($DProductionPD[9]['clinker']) + ($DProductionPD[10]['clinker']) +
        ($DProductionPD[11]['clinker']) + ($DProductionPD[12]['clinker']);
$hasil_year_sp = ($total_upto_year_sp / $total_rkap_year_sp) * 100;
//******************************* Indarung II *******************************//
$total_rkap_year_ind2 = $rkap_klinPD[$thn]['indarung2'];
$total_upto_year_ind2 = (($klinDataPD["$thn-01"]['indarung2']) + ($klinDataPD["$thn-02"]['indarung2']) + ($klinDataPD["$thn-03"]['indarung2'])) + (($klinDataPD["$thn-04"]['indarung2']) + ($klinDataPD["$thn-05"]['indarung2']) + ($klinDataPD["$thn-06"]['indarung2'])) + (($klinDataPD["$thn-07"]['indarung2']) + ($klinDataPD["$thn-08"]['indarung2']) + ($klinDataPD["$thn-09"]['indarung2'])) + (($klinDataPD["$thn-10"]['indarung2']) + ($klinDataPD["$thn-11"]['indarung2']) + ($klinDataPD["$thn-12"]['indarung2']));
$hasil_year_ind2 = ($total_upto_year_ind2 / $total_rkap_year_ind2) * 100;
//******************************* Indarung III *******************************//
$total_rkap_year_ind3 = $rkap_klinPD[$thn]['indarung3'];
$total_upto_year_ind3 = (($klinDataPD["$thn-01"]['indarung3']) + ($klinDataPD["$thn-02"]['indarung3']) + ($klinDataPD["$thn-03"]['indarung3'])) + (($klinDataPD["$thn-04"]['indarung3']) + ($klinDataPD["$thn-05"]['indarung3']) + ($klinDataPD["$thn-06"]['indarung3'])) + (($klinDataPD["$thn-07"]['indarung3']) + ($klinDataPD["$thn-08"]['indarung3']) + ($klinDataPD["$thn-09"]['indarung3'])) + (($klinDataPD["$thn-10"]['indarung3']) + ($klinDataPD["$thn-11"]['indarung3']) + ($klinDataPD["$thn-12"]['indarung3']));
$hasil_year_ind3 = ($total_upto_year_ind3 / $total_rkap_year_ind3) * 100;
//******************************* Indarung IV *******************************//
$total_rkap_year_ind4 = $rkap_klinPD[$thn]['indarung4'];
$total_upto_year_ind4 = (($klinDataPD["$thn-01"]['indarung4']) + ($klinDataPD["$thn-02"]['indarung4']) + ($klinDataPD["$thn-03"]['indarung4'])) + (($klinDataPD["$thn-04"]['indarung4']) + ($klinDataPD["$thn-05"]['indarung4']) + ($klinDataPD["$thn-06"]['indarung4'])) + (($klinDataPD["$thn-07"]['indarung4']) + ($klinDataPD["$thn-08"]['indarung4']) + ($klinDataPD["$thn-09"]['indarung4'])) + (($klinDataPD["$thn-10"]['indarung4']) + ($klinDataPD["$thn-11"]['indarung4']) + ($klinDataPD["$thn-12"]['indarung4']));
$hasil_year_ind4 = ($total_upto_year_ind4 / $total_rkap_year_ind4) * 100;
//******************************* Indarung V *******************************//
$total_rkap_year_ind5 = $rkap_klinPD[$thn]['indarung5'];
$total_upto_year_ind5 = (($klinDataPD["$thn-01"]['indarung5']) + ($klinDataPD["$thn-02"]['indarung5']) + ($klinDataPD["$thn-03"]['indarung5'])) + (($klinDataPD["$thn-04"]['indarung5']) + ($klinDataPD["$thn-05"]['indarung5']) + ($klinDataPD["$thn-06"]['indarung5'])) + (($klinDataPD["$thn-07"]['indarung5']) + ($klinDataPD["$thn-08"]['indarung5']) + ($klinDataPD["$thn-09"]['indarung5'])) + (($klinDataPD["$thn-10"]['indarung4']) + ($klinDataPD["$thn-11"]['indarung4']) + ($klinDataPD["$thn-12"]['indarung4']));
$hasil_year_ind5 = ($total_upto_year_ind5 / $total_rkap_year_ind5) * 100;
//******************************* Indarung VI *******************************//
$total_rkap_year_ind6 = $rkap_klinPD[$thn]['indarung6'];
$total_upto_year_ind6 = (($klinDataPD["$thn-01"]['indarung6']) + ($klinDataPD["$thn-02"]['indarung6']) + ($klinDataPD["$thn-03"]['indarung6'])) + (($klinDataPD["$thn-04"]['indarung6']) + ($klinDataPD["$thn-05"]['indarung6']) + ($klinDataPD["$thn-06"]['indarung6'])) + (($klinDataPD["$thn-07"]['indarung6']) + ($klinDataPD["$thn-08"]['indarung6']) + ($klinDataPD["$thn-09"]['indarung6'])) + (($klinDataPD["$thn-10"]['indarung4']) + ($klinDataPD["$thn-11"]['indarung4']) + ($klinDataPD["$thn-12"]['indarung4']));
$hasil_year_ind6 = ($total_upto_year_ind6 / $total_rkap_year_ind6) * 100;

//=================================================== Semen Gresik (collapsed)===================================================//
//******************************* Semen Gresik *******************************//
if (!empty($klinData["$thn-01"])) {
    $arr_jan_sg = (array_sum(($klinData["$thn-01"])));
} else {
    $arr_jan_sg = 0;
}
if (!empty($klinData["$thn-02"])) {
    $arr_feb_sg = (array_sum(($klinData["$thn-02"])));
} else {
    $arr_feb_sg = 0;
}
if (!empty($klinData["$thn-03"])) {
    $arr_mar_sg = (array_sum(($klinData["$thn-03"])));
} else {
    $arr_mar_sg = 0;
}
if (!empty($klinData["$thn-04"])) {
    $arr_apr_sg = (array_sum(($klinData["$thn-04"])));
} else {
    $arr_apr_sg = 0;
}
if (!empty($klinData["$thn-05"])) {
    $arr_may_sg = (array_sum(($klinData["$thn-05"])));
} else {
    $arr_may_sg = 0;
}
if (!empty($klinData["$thn-06"])) {
    $arr_jun_sg = (array_sum(($klinData["$thn-06"])));
} else {
    $arr_jun_sg = 0;
}
if (!empty($klinData["$thn-07"])) {
    $arr_jul_sg = (array_sum(($klinData["$thn-07"])));
} else {
    $arr_jul_sg = 0;
}
if (!empty($klinData["$thn-08"])) {
    $arr_aug_sg = (array_sum(($klinData["$thn-08"])));
} else {
    $arr_aug_sg = 0;
}
if (!empty($klinData["$thn-09"])) {
    $arr_sep_sg = (array_sum(($klinData["$thn-09"])));
} else {
    $arr_sep_sg = 0;
}
if (!empty($klinData["$thn-10"])) {
    $arr_okt_sg = (array_sum(($klinData["$thn-10"])));
} else {
    $arr_okt_sg = 0;
}
if (!empty($klinData["$thn-11"])) {
    $arr_nop_sg = (array_sum(($klinData["$thn-11"])));
} else {
    $arr_nop_sg = 0;
}
if (!empty($klinData["$thn-12"])) {
    $arr_dec_sg = (array_sum(($klinData["$thn-12"])));
} else {
    $arr_dec_sg = 0;
}

$total_upto_year_sg = $arr_jan_sg + $arr_feb_sg + $arr_mar_sg + $arr_apr_sg + $arr_may_sg + $arr_jun_sg + $arr_jul_sg + $arr_aug_sg + $arr_sep_sg + $arr_okt_sg + $arr_nop_sg + $arr_dec_sg;

$total_rkap_year_sg = ($DProduction[1]['clinker']) + ($DProduction[2]['clinker']) +
        ($DProduction[3]['clinker']) + ($DProduction[4]['clinker']) +
        ($DProduction[5]['clinker']) + ($DProduction[6]['clinker']) +
        ($DProduction[7]['clinker']) + ($DProduction[8]['clinker']) +
        ($DProduction[9]['clinker']) + ($DProduction[10]['clinker']) +
        ($DProduction[11]['clinker']) + ($DProduction[12]['clinker']);
$hasil_year_sg = ($total_upto_year_sg / $total_rkap_year_sg) * 100;
//******************************* Tuban I *******************************//
$total_rkap_year_tb1 = $rkap_klin[$thn]['tuban1'];
$total_upto_year_tb1 = (($klinData["$thn-01"]['tuban1']) + ($klinData["$thn-02"]['tuban1']) + ($klinData["$thn-03"]['tuban1'])) + (($klinData["$thn-04"]['tuban1']) + ($klinData["$thn-05"]['tuban1']) + ($klinData["$thn-06"]['tuban1'])) + (($klinData["$thn-07"]['tuban1']) + ($klinData["$thn-08"]['tuban1']) + ($klinData["$thn-09"]['tuban1'])) + (($klinData["$thn-10"]['tuban1']) + ($klinData["$thn-11"]['tuban1']) + ($klinData["$thn-12"]['tuban1']));
$hasil_year_tb1 = ($total_upto_year_tb1 / $total_rkap_year_tb1) * 100;
//******************************* Tuban II *******************************//
$total_rkap_year_tb2 = $rkap_klin[$thn]['tuban2'];
$total_upto_year_tb2 = (($klinData["$thn-01"]['tuban2']) + ($klinData["$thn-02"]['tuban2']) + ($klinData["$thn-03"]['tuban2'])) + (($klinData["$thn-04"]['tuban2']) + ($klinData["$thn-05"]['tuban2']) + ($klinData["$thn-06"]['tuban2'])) + (($klinData["$thn-07"]['tuban2']) + ($klinData["$thn-08"]['tuban2']) + ($klinData["$thn-09"]['tuban2'])) + (($klinData["$thn-10"]['tuban2']) + ($klinData["$thn-11"]['tuban2']) + ($klinData["$thn-12"]['tuban2']));
$hasil_year_tb2 = ($total_upto_year_tb2 / $total_rkap_year_tb2) * 100;
//******************************* Tuban III *******************************//
$total_rkap_year_tb3 = $rkap_klin[$thn]['tuban3'];
$total_upto_year_tb3 = (($klinData["$thn-01"]['tuban3']) + ($klinData["$thn-02"]['tuban3']) + ($klinData["$thn-03"]['tuban3'])) + (($klinData["$thn-04"]['tuban3']) + ($klinData["$thn-05"]['tuban3']) + ($klinData["$thn-06"]['tuban3'])) + (($klinData["$thn-07"]['tuban3']) + ($klinData["$thn-08"]['tuban3']) + ($klinData["$thn-09"]['tuban3'])) + (($klinData["$thn-10"]['tuban3']) + ($klinData["$thn-11"]['tuban3']) + ($klinData["$thn-12"]['tuban3']));
$hasil_year_tb3 = ($total_upto_year_tb3 / $total_rkap_year_tb3) * 100;
//******************************* Tuban IV *******************************//
$total_rkap_year_tb4 = $rkap_klin[$thn]['tuban4'];
$total_upto_year_tb4 = (($klinData["$thn-01"]['tuban4']) + ($klinData["$thn-02"]['tuban4']) + ($klinData["$thn-03"]['tuban4'])) + (($klinData["$thn-04"]['tuban4']) + ($klinData["$thn-05"]['tuban4']) + ($klinData["$thn-06"]['tuban4'])) + (($klinData["$thn-07"]['tuban4']) + ($klinData["$thn-08"]['tuban4']) + ($klinData["$thn-09"]['tuban4'])) + (($klinData["$thn-10"]['tuban4']) + ($klinData["$thn-11"]['tuban4']) + ($klinData["$thn-12"]['tuban4']));
$hasil_year_tb4 = ($total_upto_year_tb4 / $total_rkap_year_tb4) * 100;

//=================================================== Semen Tonasa (collapsed)===================================================//
//******************************* Semen Tonasa *******************************//
if (!empty($klinDataTN["$thn-01"])) {
    $arr_jan_st = (array_sum(($klinDataTN["$thn-01"])));
} else {
    $arr_jan_st = 0;
}
if (!empty($klinDataTN["$thn-02"])) {
    $arr_feb_st = (array_sum(($klinDataTN["$thn-02"])));
} else {
    $arr_feb_st = 0;
}
if (!empty($klinDataTN["$thn-03"])) {
    $arr_mar_st = (array_sum(($klinDataTN["$thn-03"])));
} else {
    $arr_mar_st = 0;
}
if (!empty($klinDataTN["$thn-04"])) {
    $arr_apr_st = (array_sum(($klinDataTN["$thn-04"])));
} else {
    $arr_apr_st = 0;
}
if (!empty($klinDataTN["$thn-05"])) {
    $arr_may_st = (array_sum(($klinDataTN["$thn-05"])));
} else {
    $arr_may_st = 0;
}
if (!empty($klinDataTN["$thn-06"])) {
    $arr_jun_st = (array_sum(($klinDataTN["$thn-06"])));
} else {
    $arr_jun_st = 0;
}
if (!empty($klinDataTN["$thn-07"])) {
    $arr_jul_st = (array_sum(($klinDataTN["$thn-07"])));
} else {
    $arr_jul_st = 0;
}
if (!empty($klinDataTN["$thn-08"])) {
    $arr_aug_st = (array_sum(($klinDataTN["$thn-08"])));
} else {
    $arr_aug_st = 0;
}
if (!empty($klinDataTN["$thn-09"])) {
    $arr_sep_st = (array_sum(($klinDataTN["$thn-09"])));
} else {
    $arr_sep_st = 0;
}
if (!empty($klinDataTN["$thn-10"])) {
    $arr_okt_st = (array_sum(($klinDataTN["$thn-10"])));
} else {
    $arr_okt_st = 0;
}
if (!empty($klinDataTN["$thn-11"])) {
    $arr_nop_st = (array_sum(($klinDataTN["$thn-11"])));
} else {
    $arr_nop_st = 0;
}
if (!empty($klinDataTN["$thn-12"])) {
    $arr_dec_st = (array_sum(($klinDataTN["$thn-12"])));
} else {
    $arr_dec_st = 0;
}

$total_upto_year_tns = $arr_jan_st + $arr_feb_st + $arr_mar_st + $arr_apr_st + $arr_may_st + $arr_jun_st + $arr_jul_st + $arr_aug_st + $arr_sep_st + $arr_okt_st + $arr_nop_st + $arr_dec_st;

$total_rkap_year_tns = ($DProductionTN[1]['clinker']) + ($DProductionTN[2]['clinker']) + ($DProductionTN[3]['clinker']) + ($DProductionTN[4]['clinker']) + ($DProductionTN[5]['clinker']) + ($DProductionTN[6]['clinker']) + ($DProductionTN[7]['clinker']) + ($DProductionTN[8]['clinker']) + ($DProductionTN[9]['clinker']) + ($DProductionTN[10]['clinker']) + ($DProductionTN[11]['clinker']) + ($DProductionTN[12]['clinker']);
$hasil_year_tns = ($total_upto_year_tns / $total_rkap_year_tns) * 100;
//******************************* Tonasa II *******************************//
$total_rkap_year_tns2 = $rkap_klinTN[$thn]['tonasa2'];
$total_upto_year_tns2 = (($klinDataTN["$thn-01"]['tonasa2']) + ($klinDataTN["$thn-02"]['tonasa2']) + ($klinDataTN["$thn-03"]['tonasa2'])) + (($klinDataTN["$thn-04"]['tonasa2']) + ($klinDataTN["$thn-05"]['tonasa2']) + ($klinDataTN["$thn-06"]['tonasa2'])) + (($klinDataTN["$thn-07"]['tonasa2']) + ($klinDataTN["$thn-08"]['tonasa2']) + ($klinDataTN["$thn-09"]['tonasa2'])) + (($klinDataTN["$thn-10"]['tonasa2']) + ($klinDataTN["$thn-11"]['tonasa2']) + ($klinDataTN["$thn-12"]['tonasa2']));
$hasil_year_tns2 = ($total_upto_year_tns2 / $total_rkap_year_tns2) * 100;
//******************************* Tonasa III *******************************//
$total_rkap_year_tns3 = $rkap_klinTN[$thn]['tonasa3'];
$total_upto_year_tns3 = (($klinDataTN["$thn-01"]['tonasa3']) + ($klinDataTN["$thn-02"]['tonasa3']) + ($klinDataTN["$thn-03"]['tonasa3'])) + (($klinDataTN["$thn-04"]['tonasa3']) + ($klinDataTN["$thn-05"]['tonasa3']) + ($klinDataTN["$thn-06"]['tonasa3'])) + (($klinDataTN["$thn-07"]['tonasa3']) + ($klinDataTN["$thn-08"]['tonasa3']) + ($klinDataTN["$thn-09"]['tonasa3'])) + (($klinDataTN["$thn-10"]['tonasa3']) + ($klinDataTN["$thn-11"]['tonasa3']) + ($klinDataTN["$thn-12"]['tonasa3']));
$hasil_year_tns3 = ($total_upto_year_tns3 / $total_rkap_year_tns3) * 100;
//******************************* Tonasa IV *******************************//
$total_rkap_year_tns4 = $rkap_klinTN[$thn]['tonasa4'];
$total_upto_year_tns4 = (($klinDataTN["$thn-01"]['tonasa4']) + ($klinDataTN["$thn-02"]['tonasa4']) + ($klinDataTN["$thn-03"]['tonasa4'])) + (($klinDataTN["$thn-04"]['tonasa4']) + ($klinDataTN["$thn-05"]['tonasa4']) + ($klinDataTN["$thn-06"]['tonasa4'])) + (($klinDataTN["$thn-07"]['tonasa4']) + ($klinDataTN["$thn-08"]['tonasa4']) + ($klinDataTN["$thn-09"]['tonasa4'])) + (($klinDataTN["$thn-10"]['tonasa4']) + ($klinDataTN["$thn-11"]['tonasa4']) + ($klinDataTN["$thn-12"]['tonasa4']));
$hasil_year_tns4 = ($total_upto_year_tns4 / $total_rkap_year_tns4) * 100;
//******************************* Tonasa V *******************************//
$total_rkap_year_tns5 = $rkap_klinTN[$thn]['tonasa5'];
$total_upto_year_tns5 = (($klinDataTN["$thn-01"]['tonasa5']) + ($klinDataTN["$thn-02"]['tonasa5']) + ($klinDataTN["$thn-03"]['tonasa5'])) + (($klinDataTN["$thn-04"]['tonasa5']) + ($klinDataTN["$thn-05"]['tonasa5']) + ($klinDataTN["$thn-06"]['tonasa5'])) + (($klinDataTN["$thn-07"]['tonasa5']) + ($klinDataTN["$thn-08"]['tonasa5']) + ($klinDataTN["$thn-09"]['tonasa5'])) + (($klinDataTN["$thn-10"]['tonasa4']) + ($klinDataTN["$thn-11"]['tonasa4']) + ($klinDataTN["$thn-12"]['tonasa4']));
$hasil_year_tns5 = ($total_upto_year_tns5 / $total_rkap_year_tns5) * 100;

//=================================================== Semen TLCC (collapsed)===================================================//
//******************************* Semen TLCC *******************************//
if (!empty($klinDataTL["$thn-01"])) {
    $arr_jan_tlcc = (array_sum(($klinDataTL["$thn-01"])));
} else {
    $arr_jan_tlcc = 0;
}
if (!empty($klinDataTL["$thn-02"])) {
    $arr_feb_tlcc = (array_sum(($klinDataTL["$thn-02"])));
} else {
    $arr_feb_tlcc = 0;
}
if (!empty($klinDataTL["$thn-03"])) {
    $arr_mar_tlcc = (array_sum(($klinDataTL["$thn-03"])));
} else {
    $arr_mar_tlcc = 0;
}
if (!empty($klinDataTL["$thn-04"])) {
    $arr_apr_tlcc = (array_sum(($klinDataTL["$thn-04"])));
} else {
    $arr_apr_tlcc = 0;
}
if (!empty($klinDataTL["$thn-05"])) {
    $arr_may_tlcc = (array_sum(($klinDataTL["$thn-05"])));
} else {
    $arr_may_tlcc = 0;
}
if (!empty($klinDataTL["$thn-06"])) {
    $arr_jun_tlcc = (array_sum(($klinDataTL["$thn-06"])));
} else {
    $arr_jun_tlcc = 0;
}
if (!empty($klinDataTL["$thn-07"])) {
    $arr_jul_tlcc = (array_sum(($klinDataTL["$thn-07"])));
} else {
    $arr_jul_tlcc = 0;
}
if (!empty($klinDataTL["$thn-08"])) {
    $arr_aug_tlcc = (array_sum(($klinDataTL["$thn-08"])));
} else {
    $arr_aug_tlcc = 0;
}
if (!empty($klinDataTL["$thn-09"])) {
    $arr_sep_tlcc = (array_sum(($klinDataTL["$thn-09"])));
} else {
    $arr_sep_tlcc = 0;
}
if (!empty($klinDataTL["$thn-10"])) {
    $arr_okt_tlcc = (array_sum(($klinDataTL["$thn-10"])));
} else {
    $arr_okt_tlcc = 0;
}
if (!empty($klinDataTL["$thn-11"])) {
    $arr_nop_tlcc = (array_sum(($klinDataTL["$thn-11"])));
} else {
    $arr_nop_tlcc = 0;
}
if (!empty($klinDataTL["$thn-12"])) {
    $arr_dec_tlcc = (array_sum(($klinDataTL["$thn-12"])));
} else {
    $arr_dec_tlcc = 0;
}

$total_upto_year_tlcc = $arr_jan_tlcc + $arr_feb_tlcc + $arr_mar_tlcc + $arr_apr_tlcc + $arr_may_tlcc + $arr_jun_tlcc + $arr_jul_tlcc + $arr_aug_tlcc + $arr_sep_tlcc + $arr_okt_tlcc + $arr_nop_tlcc + $arr_dec_tlcc;
$total_rkap_year_tlcc = ($DProductionTL[1]['clinker']) + ($DProductionTL[2]['clinker']) + ($DProductionTL[3]['clinker']) + ($DProductionTL[4]['clinker']) + ($DProductionTL[5]['clinker']) + ($DProductionTL[6]['clinker']) + ($DProductionTL[7]['clinker']) + ($DProductionTL[8]['clinker']) + ($DProductionTL[9]['clinker']) + ($DProductionTL[10]['clinker']) + ($DProductionTL[11]['clinker']) + ($DProductionTL[12]['clinker']);
$hasil_year_tlcc = ($total_upto_year_tlcc / $total_rkap_year_tlcc) * 100;
//******************************* TLCC Ho Chi Minh *******************************//
$total_rkap_year_mp = $rkap_klinTL[$thn]['tlcc'];
$total_upto_year_mp = (($klinDataTL["$thn-01"]['tlcc1']) + ($klinDataTL["$thn-02"]['tlcc1']) + ($klinDataTL["$thn-03"]['tlcc1'])) + (($klinDataTL["$thn-04"]['tlcc1']) + ($klinDataTL["$thn-05"]['tlcc1']) + ($klinDataTL["$thn-06"]['tlcc1'])) + (($klinDataTL["$thn-07"]['tlcc1']) + ($klinDataTL["$thn-08"]['tlcc1']) + ($klinDataTL["$thn-09"]['tlcc1'])) + (($klinDataTL["$thn-10"]['tlcc1']) + ($klinDataTL["$thn-11"]['tlcc1']) + ($klinDataTL["$thn-12"]['tlcc1']));
$hasil_year_mp = ($total_upto_year_mp / $total_rkap_year_mp) * 100;

//=================================================== Semen Gresik Rembang (collapsed)===================================================//
//******************************* Semen Gresik Rembang *******************************//
$total_upto_sgr_cl = ($rkap_cl_rb["$thn-01"]['rembang']) + ($rkap_cl_rb["$thn-02"]['rembang']) +
        ($rkap_cl_rb["$thn-03"]['rembang']) + ($rkap_cl_rb["$thn-04"]['rembang']) +
        ($rkap_cl_rb["$thn-05"]['rembang']) + ($rkap_cl_rb["$thn-06"]['rembang']) +
        ($rkap_cl_rb["$thn-07"]['rembang']) + ($rkap_cl_rb["$thn-08"]['rembang']) + 
        ($rkap_cl_rb["$thn-09"]['rembang']) + ($rkap_cl_rb["$thn-10"]['rembang']) + 
        ($rkap_cl_rb["$thn-11"]['rembang']) + ($rkap_cl_rb["$thn-12"]['rembang']);

if (!empty($klinDataRB["$thn-01"])) {
    $arr_jan_rb = (array_sum(($klinDataRB["$thn-01"])));
} else {
    $arr_jan_rb = 0;
}
if (!empty($klinDataRB["$thn-02"])) {
    $arr_feb_rb = (array_sum(($klinDataRB["$thn-02"])));
} else {
    $arr_feb_rb = 0;
}
if (!empty($klinDataRB["$thn-03"])) {
    $arr_mar_rb = (array_sum(($klinDataRB["$thn-03"])));
} else {
    $arr_mar_rb = 0;
}
if (!empty($klinDataRB["$thn-04"])) {
    $arr_apr_rb = (array_sum(($klinDataRB["$thn-04"])));
} else {
    $arr_apr_rb = 0;
}
if (!empty($klinDataRB["$thn-05"])) {
    $arr_may_rb = (array_sum(($klinDataRB["$thn-05"])));
} else {
    $arr_may_rb = 0;
}
if (!empty($klinDataRB["$thn-06"])) {
    $arr_jun_rb = (array_sum(($klinDataRB["$thn-06"])));
} else {
    $arr_jun_rb = 0;
}
if (!empty($klinDataRB["$thn-07"])) {
    $arr_jul_rb = (array_sum(($klinDataRB["$thn-07"])));
} else {
    $arr_jul_rb = 0;
}
if (!empty($klinDataRB["$thn-08"])) {
    $arr_aug_rb = (array_sum(($klinDataRB["$thn-08"])));
} else {
    $arr_aug_rb = 0;
}
if (!empty($klinDataRB["$thn-09"])) {
    $arr_sep_rb = (array_sum(($klinDataRB["$thn-09"])));
} else {
    $arr_sep_rb = 0;
}
if (!empty($klinDataRB["$thn-10"])) {
    $arr_okt_rb = (array_sum(($klinDataRB["$thn-10"])));
} else {
    $arr_okt_rb = 0;
}
if (!empty($klinDataRB["$thn-11"])) {
    $arr_nop_rb = (array_sum(($klinDataRB["$thn-11"])));
} else {
    $arr_nop_rb = 0;
}
if (!empty($klinDataRB["$thn-12"])) {
    $arr_dec_rb = (array_sum(($klinDataRB["$thn-12"])));
} else {
    $arr_dec_rb = 0;
}

$total_upto_year_rb = $arr_jan_rb + $arr_feb_rb + $arr_mar_rb + $arr_apr_rb + $arr_may_rb + $arr_jun_rb + $arr_jul_rb + $arr_aug_rb + $arr_sep_rb + $arr_okt_rb + $arr_nop_rb + $arr_dec_rb;
$total_rkap_year_rb = ($DProductionRB[1]['clinker']) + ($DProductionRB[2]['clinker']) + ($DProductionRB[3]['clinker']) + ($DProductionRB[4]['clinker']) + ($DProductionRB[5]['clinker']) + ($DProductionRB[6]['clinker']) + ($DProductionRB[7]['clinker']) + ($DProductionRB[8]['clinker']) + ($DProductionRB[9]['clinker']) + ($DProductionRB[10]['clinker']) + ($DProductionRB[11]['clinker']) + ($DProductionRB[12]['clinker']);
$hasil_year_rb = ($total_upto_year_rb / $total_rkap_year_rb) * 100;

//******************************* KILN 1 Rembang *******************************//
$total_rkap_year_kl1 = $rkap_klinRB[$thn]['kl1'];
$total_upto_year_kl1 = (($klinDataRB["$thn-01"]['kl1']) + ($klinDataRB["$thn-02"]['kl1']) + ($klinDataRB["$thn-03"]['kl1'])) + (($klinDataRB["$thn-04"]['kl1']) + ($klinDataRB["$thn-05"]['kl1']) + ($klinDataRB["$thn-06"]['kl1'])) + (($klinDataRB["$thn-07"]['kl1']) + ($klinDataRB["$thn-08"]['kl1']) + ($klinDataRB["$thn-09"]['kl1'])) + (($klinDataRB["$thn-10"]['kl1']) + ($klinDataRB["$thn-11"]['kl1']) + ($klinDataRB["$thn-12"]['kl1']));
$hasil_year_kl1 = ($total_upto_year_kl1 / $total_rkap_year_kl1) * 100;

//=============== PERFORMANCE
$num_rkap_perday_sp = $rkap_sp['0']['KLINKER'] / $dateof_year;
$rkap_perday_sp = $num_rkap_perday_sp * $dateup_year;
$performance_sp = ($total_upto_sp_cl / $rkap_perday_sp) * 100;

$num_rkap_perday_sg = $rkap['0']['KLINKER'] / $dateof_year;
$rkap_perday_sg = $num_rkap_perday_sg * $dateup_year;
$performance_sg = ($total_upto_sg_cl / $rkap_perday_sg) * 100;

$num_rkap_perday_sgr = $rkap_rb['0']['KLINKER'] / $dateof_year;
$rkap_perday_sgr = $num_rkap_perday_sgr * $dateup_year;
$performance_sgr = ($total_upto_sgr_cl / $rkap_perday_sgr) * 100;

$num_rkap_perday_st = $rkap_st['0']['KLINKER'] / $dateof_year;
$rkap_perday_st = $num_rkap_perday_st * $dateup_year;
$performance_st = ($total_upto_st_cl / $rkap_perday_st) * 100;

$num_rkap_perday_tlcc = $total_rkap_year_tlcc / $dateof_year;
$rkap_perday_tlcc = $num_rkap_perday_tlcc * $dateup_year;
$performance_tlcc = ($total_upto_year_tlcc / $rkap_perday_tlcc) * 100;

$num_rkap_perday_ind2 = $total_rkap_year_ind2 / $dateof_year;
$rkap_perday_ind2 = $num_rkap_perday_ind2 * $dateup_year;
$performance_ind2 = ($total_upto_year_ind2 / $rkap_perday_ind2) * 100;

$num_rkap_perday_ind3 = $total_rkap_year_ind3 / $dateof_year;
$rkap_perday_ind3 = $num_rkap_perday_ind3 * $dateup_year;
$performance_ind3 = ($total_upto_year_ind3 / $rkap_perday_ind3) * 100;

$num_rkap_perday_ind4 = $total_rkap_year_ind4 / $dateof_year;
$rkap_perday_ind4 = $num_rkap_perday_ind4 * $dateup_year;
$performance_ind4 =($total_upto_year_ind4 / $rkap_perday_ind4) * 100;

$num_rkap_perday_ind5 = $total_rkap_year_ind5 / $dateof_year;
$rkap_perday_ind5 = $num_rkap_perday_ind5 * $dateup_year;
$performance_ind5 = ($total_upto_year_ind5 / $rkap_perday_ind5) * 100;

$num_rkap_perday_ind6 = $total_rkap_year_ind5 / $dateof_year;
$rkap_perday_ind6 = $num_rkap_perday_ind6 * $dateup_year;
$performance_ind6 = ($total_upto_year_ind6 / $rkap_perday_ind6) * 100;

$num_rkap_perday_tns2 = $total_rkap_year_tns2 / $dateof_year;
$rkap_perday_tns2 = $num_rkap_perday_tns2 * $dateup_year;
$performance_tns2 = ($total_upto_year_tns2 / $rkap_perday_tns2) * 100;

$num_rkap_perday_tns3 = $total_rkap_year_tns3 / $dateof_year;
$rkap_perday_tns3 = $num_rkap_perday_tns3 * $dateup_year;
$performance_tns3 = ($total_upto_year_tns3 / $rkap_perday_tns3) * 100;

$num_rkap_perday_tns4 = $total_rkap_year_tns4 / $dateof_year;
$rkap_perday_tns4 = $num_rkap_perday_tns4 * $dateup_year;
$performance_tns4 = ($total_upto_year_tns4 / $rkap_perday_tns4) * 100;

$num_rkap_perday_tns5 = $total_rkap_year_tns5 / $dateof_year;
$rkap_perday_tns5 = $num_rkap_perday_tns5 * $dateup_year;
$performance_tns5 = ($total_upto_year_tns5 / $rkap_perday_tns5) * 100;

$num_rkap_perday_tb1 = $total_rkap_year_tb1 / $dateof_year;
$rkap_perday_tb1 = $num_rkap_perday_tb1 * $dateup_year;
$performance_tbn1 = ($total_upto_year_tb1 / $rkap_perday_tb1) * 100;

$num_rkap_perday_tb2 = $total_rkap_year_tb2 / $dateof_year;
$rkap_perday_tb2 = $num_rkap_perday_tb2 * $dateup_year;
$performance_tbn2 = ($total_upto_year_tb2 / $rkap_perday_tb2) * 100;

$num_rkap_perday_tb3 = $total_rkap_year_tb3 / $dateof_year;
$rkap_perday_tb3 = $num_rkap_perday_tb3 * $dateup_year;
$performance_tbn3 = ($total_upto_year_tb3 / $rkap_perday_tb3) * 100;

$num_rkap_perday_tb4 = $total_rkap_year_tb4 / $dateof_year;
$rkap_perday_tb4 = $num_rkap_perday_tb4 * $dateup_year;
$performance_tbn4 = ($total_upto_year_tb4 / $rkap_perday_tb4) * 100;

$num_rkap_perday_mp = $rkap_klinTL[$thn]['tlcc'] / $dateof_year;
$rkap_perday_mp = $num_rkap_perday_mp * $dateup_year;
$performance_mp = ($total_upto_year_mp / $rkap_perday_mp) * 100;
?>
<style>
    .noPadding{
        padding-top:1px;
        padding-left:1px;
        padding-right:1px;
        padding-bottom:1px;
    }
    .twoPadding{
        padding-top:3px;
        padding-left:3px;
        padding-right:3px;
        padding-bottom:3px;
    }
    .cubesRun{
        min-height:50px;
        width:100%;
        font-size:11px;
    }
    .cubesRun2{
        min-height:110px;
        margin: auto;
        /*min-height:100px;*/
        width: 100%;
        font-size:11px;
        padding: 16px;
    }
    .PlantColor{
        background: #C0C0C0;
    }
    .ErrorMsg{
        font-size: 14px;
        color: #f00;
        text-align: center;
    }
    .red-indicator{
        background-color:#e3000e;
    }
    .green-indicator{
        background-color:#33cc33;
    }
    .img-rotate{
        -webkit-transform: rotate(180deg);
    }
    .img-thumbnail {
        display: inline-block;
        width: 100%;
        height: auto;
        padding: 4px;
        line-height: 1.42857143;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 4px;
        -webkit-transition: all .2s ease-in-out;
        -o-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
    }

    .style1 {color: #333333}
    .img-rotate1 {	-webkit-transform: rotate(180deg);
    }
    .img-rotate2 {	-webkit-transform: rotate(180deg);
    }
    .img-rotate21 {-webkit-transform: rotate(180deg);
    }
    .img-rotate11 {-webkit-transform: rotate(180deg);
    }
    .img-rotate211 {-webkit-transform: rotate(180deg);
    }
    .img-rotate111 {-webkit-transform: rotate(180deg);
    }
    .img-rotate1111 {-webkit-transform: rotate(180deg);
    }
    .img-rotate1112 {-webkit-transform: rotate(180deg);
    }
    .img-rotate11121 {-webkit-transform: rotate(180deg);
    }
    .img-rotate1113 {-webkit-transform: rotate(180deg);
    }
    .img-rotate11111 {-webkit-transform: rotate(180deg);
    }
    .img-rotate11122 {-webkit-transform: rotate(180deg);
    }
    .img-rotate111211 {-webkit-transform: rotate(180deg);
    }
    .img-rotate2111 {-webkit-transform: rotate(180deg);
    }
    .img-rotate1114 {-webkit-transform: rotate(180deg);
    }
    .img-rotate11112 {-webkit-transform: rotate(180deg);
    }
    .img-rotate11123 {-webkit-transform: rotate(180deg);
    }
    .img-rotate111212 {-webkit-transform: rotate(180deg);
    }
    .img-rotate2112 {-webkit-transform: rotate(180deg);
    }
    .style2 {color: #333333; font-weight: bold; }
    .realval{
        font-size: large;
    }
    .headaccordion {
        background-color: #fff;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        text-align: left;
        border: none;
        outline: none;
        transition: 0.4s;
        border-bottom: 2px solid rgba(227, 0, 14, 0.35);
    }

    .headaccordion:after {
        content: '\02795'; /* Unicode character for "plus" sign (+) */
        font-size: 13px;
        color: #777;
        float: right;
        margin-left: 5px;
    }
    .headaccordion.active {
        border-bottom: 2px solid #e3000e;
    }
    .headaccordion.active:after {
        content: "\2796"; /* Unicode character for "minus" sign (-) */
    }

    .headaccordion:hover {
        background-color: #f9f9f9;
    }
    .panelq {
        padding: 0 18px;
        background-color: white;
        display: none;
    }

    /* The "show" class is added to the accordion panel when the user clicks on one of the buttons. This will show the panel content */
    .panelq.show {
        display: block;
    }

    .headpan{
        margin-bottom: 0px;
    }


    .hov:hover{

    }
    .img-logos {
        width: 38px;
        margin: auto;
        display: block;
        margin-top: 5px;
        margin-bottom: 5px;
    }

</style>
<script>
    $(function () {
        $('#btn_prod_semen').click(function () {
            window.location.href = 'index.php/plant_system/production';
        });
        $('#btn_prod_lime').click(function () {
            window.location.href = 'index.php/plant_gresik/prod_lime';
        });
        $('#btn_prod_klin').click(function () {
            window.location.href = 'index.php/plant_system/production_clinker';
        });
        $('#btn_prod_rawmix').click(function () {
            window.location.href = 'index.php/plant_gresik/prod_rawmix';
        });
        $('#btn_prod_silica').click(function () {
            window.location.href = 'index.php/plant_gresik/prod_silica';
        });
        $('#btn_prod_fineCoal').click(function () {
            window.location.href = 'index.php/plant_gresik/prod_fineCoal';
        });
        $('#btnChart').click(function () {
            window.location.href = 'index.php/plant_gresik/prod_limeChart';
        });
    });
    function Btn_Tahun(tahun) {
        var url = "<?= base_url() ?>index.php/plant_system/production_clinker";
        var form = $('<form action="' + url + '" method="get">' +
                '<input type="hidden" name="input[tahun]" value="' + tahun + '" />' +
                '</form>'
                );
        $('body').append(form);
        $(form).submit();
    }
    $(function () {
        window.setTimeout("$('#example').popover('show')", 1000);
    });
</script>
<script src="bootstrap/plantView/highcharts/highcharts.js"></script>
<script src="bootstrap/plantView/highcharts/highcharts-more.js"></script>
<script src="bootstrap/plantView/highcharts/exporting.js"></script>
<div class="row">
    <nav class="navbar navbar-default panelup">
        <div class="container-fluid">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header ">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--      <a class="navbar-brand" href="#">Real Time Plant Overview</a>-->
                <h3 style="text-align: left; padding-left: 12px; margin-top: 10px;">Clinker Production</h3>
            </div>
            <!--            awal trt-->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="#"> <span class="sr-only">(current)</span></a></li>
                    <li>
                    </li>
                </ul>
                <form class="navbar-form navbar-left">
                    <div class="form-group">
                    </div>
                    <div class="btn-group">
                        <!--			<button class="btn btn-default" aria-label="Left Align" id="btn_prod_lime" type="button">
                                                        Lime Stone
                                                </button>-->
                        <!--			<button class="btn btn-default" aria-label="Left Align" id="btn_prod_rawmix"  type="button">
                                                        Raw Mix
                                                </button>-->
                        <button class="btn btn-warning" aria-label="Left Align" id="btn_prod_klin" type="button">
                            Clinker
                        </button>
                        <!--			<button class="btn btn-default" aria-label="Left Align" id="btn_prod_silica" type="button">
                                                        Silica Stone
                                                </button>-->
                        <!--			<button class="btn btn-default" aria-label="Left Align" id="btn_prod_fineCoal" type="button">
                                                        Fine Coal
                                                </button>-->
                        <button class="btn btn-default " aria-label="Left Align" id="btn_prod_semen" type="button">
                            Cement 
                        </button>
                    </div>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff " id="my_year"> Select Year &nbsp;&nbsp; <?php echo $tahun ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
<?php
for ($i = 2016; $i <= date('Y'); $i++) {
    echo '<li>
                                        <button class="btn btn-warning" type="button" id="Tahun" onclick="Btn_Tahun(' . $i . ');" style="min-width:120px;">' . $i . '</button>
                                        </li>';
}
?>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <div style="margin-top: 15px;">
<?php
$oracle = $this->load->database('oramso', TRUE);
$Query = $oracle->query("SELECT * FROM (SELECT TO_CHAR(DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD FROM PIS_SG_PRODDAILY ORDER BY DATE_PROD DESC) WHERE ROWNUM = 1");
$data_tgl = $Query->result_array();
$tanggal = date_create($data_tgl['0']['DATE_PROD']);
$last_date = date_format($tanggal, "d");
//echo 'Last Update on : ' . date_format($tanggal, "d F Y") . '';

$bulan_data = date_format($tanggal, "m");
$bulan_curret = date("m");
$tgl_data = date_format($tanggal, "d");

if ((date("Y") % 4) == 0) {
    $feb = 29;
} else {
    $feb = 28;
}
$jan = 31;
$mar = 31;
$apr = 30;
$mei = 31;
$jun = 30;
$jul = 31;
$ags = 31;
$sep = 30;
$okt = 31;
$nov = 30;
$des = 31;
$my_day = array($jan, $feb, $mar, $apr, $mei, $jun, $jul, $ags, $sep, $okt, $nov, $des);
?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<style>
	.table{width:100%}
	.headaccordion{height:70px;position:relative;}
	.headaccordion:after{position:absolute;right:10px;top:25px;}
</style>
<div class="row">
    <div class="col-md-5 col-xs-12 noPadding">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Plan Overview Detail</h3>
            </div>
            <div class="box-body no-padding">
                <table class="table table-condensed">
                    <tbody>
                        <tr>
                            <td height="23">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><strong>Category</strong></td>
                            <td> <div align="right"><strong>RKAP</strong></div></td>
                            <td><div  align="center" class="style2">
                                    <div align="right">Real</div>
                                </div></td>
                            <td><div align="right"><strong>Procentage</strong></div></td>
                            <td><div align="center"><strong> </strong></div></td>
                            <!--<td><div align="center"><strong>Trend</strong></div></td>-->
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="box-body">
                <div id="accordion">
                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                    <!-- <div class="panel box box-primary"> -->
                    <div class="panel headpan"><a data-toggle="collapse" data-parent="#accordion" href="#SMIGGroup" >
                            <div class="headaccordion">
								<table class="table table-condensed" style="float:left;">
									<tr>
										<td style="font-weight: bold;">SMIG Group</td>
										<td style="font-weight: bold;"><div align="right"><?php echo number_format($total_rkap_smig_cl / 1000, 0); ?> K T</div></td>
										<td style="font-weight: bold;">
											<div  align="center" class="style1">
												<div align="right"><?php echo number_format($total_upto_smig_cl / 1000, 0); ?> K T</div>
											</div>
										</td>
										<td style="font-weight: bold;">
											<div align="right"><?php
											if ($hasil_year_smig_cl < 100) {
												echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
											} else {
												echo '<img src="media/up-green.png" alt="" width="16px"/> ';
											}
											echo number_format($hasil_year_smig_cl, 2, ",", ".");
											?> %
											</div>
										</td>
										<td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
									</tr>
								</table>
                            </div></a>
                        <div id="SMIGGroup" class="panel-collapse collapse in">
                            <div class="box-body">
                                <table class="table table-condensed">
                                    <ul class="list-unstyled">
                                        <tbody>
                                            <tr>
                                                <td height="23">&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>SP</td>
                                                <td> <div align="right"><?php echo number_format(($rkap_sp['0']['KLINKER']) / 1000, 0); ?> K T</div></td>
                                                <td><div  align="center" class="style1">
                                                        <div align="right"><?php echo number_format(($data_sp['0']['CLINKER']) / 1000, 0); ?> K T</div>
                                                    </div></td>
                                                <td><div align="right"><?php
                            if ($performance_sp < 100) {
                                echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                            } else {
                                echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                            }
                            echo $hasil_tot_klinsp;
                            ?> %</div></td>
                                                <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>SG</td>
                                                <td > <div align="right"><?php echo number_format(($rkap_rb['0']['KLINKER']) / 1000, 0); ?> K T</div></td>
                                                <td ><div align="center" class="style1">
                                                        <div align="right"><?php echo number_format(($data_rb['0']['CLINKER']) / 1000, 0); ?> K T</div>
                                                    </div></td>
                                                <td><div align="right"><?php
                            if ($performance_sgr < 100) {
                                echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                            } else {
                                echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                            }
                            echo $hasil_tot_klinrb;//$hasil_tot_klinsg;
                            ?> %</div></td>
                                                <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>KSO SG-SI</td>
                                                <td > <div align="right"><?php echo number_format(($rkap['0']['KLINKER']) / 1000, 0); ?> K T</div></td>
                                                <td ><div align="center" class="style1">
                                                        <div align="right"><?php echo number_format(($data['0']['CLINKER']) / 1000, 0); ?> K T</div>
                                                    </div></td>
                                                <td><div align="right"><?php
                            if ($performance_sg < 100) {
                                echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                            } else {
                                echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                            }
                            echo $hasil_tot_klinsg;
                            ?> %</div></td>
                                                <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>ST</td>
                                                <td> <div align="right"><?php echo number_format(($rkap_st['0']['KLINKER']) / 1000, 0); ?> K T</div></td>
                                                <td> <div align="right"><?php echo number_format(($data_st['0']['CLINKER'] ) / 1000, 0); ?> K T</div></td>
                                                <td><div align="right"><?php
                            if ($performance_st < 100) {
                                echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                            } else {
                                echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                            }
                            echo $hasil_tot_klinst;
                            ?> %</div></td>
                                                <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>TL</td>
                                                <td><div align="right"><?php echo number_format(($rkap_tl['0']['KLINKER']) / 1000, 0); ?> K T</div></td>
                                                <td><div align="right"><?php echo number_format(($data_tl['0']['CLINKER'] ) / 1000, 0); ?> K T</div></td>
                                                <td><div align="right"><?php
                            if ($performance_tlcc < 100) {
                                echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                            } else {
                                echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                            }
                            echo $hasil_tot_klintl;
                            ?> %</div></td>
                                                <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
                                            </tr>
                                            <tr bgcolor="#F9F9F9">
                                                <td height="23">&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td bgcolor="#F9F9F9">Total</td>
                                                <td bgcolor="#F9F9F9"><div align="right"><?php echo number_format($total_rkap_smig_cl / 1000, 0); ?> K T</div></td>
                                                <td bgcolor="#F9F9F9"><div  align="center" class="style1">
                                                        <div align="right"><?php echo number_format($total_upto_smig_cl / 1000, 0); ?> K T</div>
                                                    </div></td>
                                                <td><div align="right"><?php
                            if ($hasil_year_smig_cl < 100) {
                                echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                            } else {
                                echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                            }
                            echo number_format($hasil_year_smig_cl, 2, ",", ".");
                            ?> %</div></td>
                                                <td bgcolor="#F9F9F9"><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
                                            </tr>
                                        </tbody>
                                    </ul>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- </div> -->
                    <div class="panel headpan">
                        <a data-toggle="collapse" data-parent="#accordion" href="#SPCement" >
                            <div class="headaccordion">								
								<table class="table table-condensed" style="float:left;">
									<tr>
										<td style="font-weight: bold;">Semen Padang</td>
										<td style="font-weight: bold;"><div align="right"><?php echo number_format($rkap_sp['0']['KLINKER'] / 1000, 0); ?> K T</div></td>
										<td style="font-weight: bold;">
											<div  align="center" class="style1">
												<div align="right"><?php echo number_format($data_sp['0']['CLINKER'] / 1000, 0); ?> K T</div>
											</div>
										</td>
										<td style="font-weight: bold;">
											<div align="right"><?php
												if ($performance_sp < 100) {
													echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
												} else {
													echo '<img src="media/up-green.png" alt="" width="16px"/> ';
												}
												echo number_format($hasil_year_sp, 2, ",", ".");
											?> %
											</div>
										</td>
										<td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
									</tr>
								</table>
                            </div></a>
                        <div id="SPCement" class="panel-collapse collapse">
                            <div class="box-body">
                                <table class="table table-condensed">
                                    <tbody>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>Indarung II</td>
                                            <td > <div align="right"><?php echo number_format($total_rkap_year_ind2 / 1000, 0); ?> K T</div></td>
                                            <td ><div  align="center" class="style1">
                                                    <div align="right"><?php echo number_format($total_upto_year_ind2 / 1000, 0); ?> K T</div>
                                                </div></td>
                                            <td><div align="right"><?php
                                                        if ($performance_ind2 < 100) {
                                                            echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                        } else {
                                                            echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                        }
                                                        echo number_format($hasil_year_ind2, 2, ",", ".");
                            ?> %</div></td>
                                            <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>Indarung III</td>
                                            <td> <div align="right"><?php echo number_format($total_rkap_year_ind3 / 1000, 0); ?> K T</div></td>
                                            <td><div align="center" class="style1">
                                                    <div align="right"><?php echo number_format($total_upto_year_ind3 / 1000, 0); ?> K T</div>
                                                </div></td>
                                            <td><div align="right"><?php
                                                        if ($performance_ind3 < 100) {
                                                            echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                        } else {
                                                            echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                        }
                                                        echo number_format($hasil_year_ind3, 2, ",", ".");
                            ?> %</div></td>
                                            <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>Indarung IV</td>
                                            <td> <div align="right"><?php echo number_format($total_rkap_year_ind4 / 1000, 0); ?> K T</div></td>
                                            <td><div align="center" class="style1">
                                                    <div align="right"><?php echo number_format($total_upto_year_ind4 / 1000, 0); ?> K T</div>
                                                </div></td>
                                            <td><div align="right"><?php
                                                        if ($performance_ind4 < 100) {
                                                            echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                        } else {
                                                            echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                        }
                                                        echo number_format($hasil_year_ind4, 2, ",", ".");
                            ?> %</div></td>
                                            <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>Indarung V</td>
                                            <td> <div align="right"><?php echo number_format($total_rkap_year_ind5 / 1000, 0); ?> K T</div></td>
                                            <td><div align="center" class="style1">
                                                    <div align="right"><?php echo number_format($total_upto_year_ind5 / 1000, 0); ?> K T</div>
                                                </div></td>
                                            <td><div align="right"><?php
                                                        if ($performance_ind5 < 100) {
                                                            echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                        } else {
                                                            echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                        }
                                                        echo number_format($hasil_year_ind5, 2, ",", ".");
                            ?> %</div></td>
                                            <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>Indarung VI</td>
                                            <td> <div align="right"><?php echo number_format($total_rkap_year_ind6 / 1000, 0); ?> K T</div></td>
                                            <td><div align="center" class="style1">
                                                    <div align="right"><?php echo number_format($total_upto_year_ind6 / 1000, 0); ?> K T</div>
                                                </div></td>
                                            <td><div align="right"><?php
                                                        if ($performance_ind6 < 100) {
                                                            echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                        } else {
                                                            echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                        }
                                                        echo number_format($hasil_year_ind6, 2, ",", ".");
                            ?> %</div></td>
                                            <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
                                        </tr>
                                        <tr bgcolor="#F9F9F9">
                                            <td>&nbsp;</td>
                                            <td>Total</td>
                                            <td> <div align="right"><?php echo number_format($rkap_sp['0']['KLINKER'] / 1000, 0); ?> K T</div></td>
                                            <td><div align="center" class="style1">
                                                    <div align="right"><?php echo number_format($data_sp['0']['CLINKER'] / 1000, 0); ?> K T</div>
                                                </div></td>
                                            <td><div align="right"><?php
                                                        if ($performance_sp < 100) {
                                                            echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                        } else {
                                                            echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                        }
                                                        echo number_format($hasil_year_sp, 2, ",", ".");
                            ?> %</div></td>
                                            <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel headpan">
                        <a data-toggle="collapse" data-parent="#accordion" href="#SGRCement" >
                            <div class="headaccordion">
								<table class="table table-condensed" style="float:left;">
									<tr>
										<td style="font-weight: bold;">Semen Gresik</td>
										<td style="font-weight: bold;"><div align="right"><?php echo number_format($rkap_rb['0']['KLINKER'] / 1000, 0); ?> K T</div></td>
										<td style="font-weight: bold;">
											<div  align="center" class="style1">
												<div align="right"><?php echo number_format($data_rb['0']['CLINKER'] / 1000, 0); ?> K T</div>
											</div>
										</td>
										<td style="font-weight: bold;">
											<div align="right">
												<?php
                                                        if ($performance_sgr < 100) {
                                                            echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                        } else {
                                                            echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                        }
                                                        echo number_format($hasil_year_rb, 2, ",", ".");
												?> %
											</div>
										</td>
										<td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
									</tr>
								</table>
                            </div></a>
                        <div id="SGRCement" class="panel-collapse collapse">
                            <div class="box-body">
                                <table class="table table-condensed">
                                    <tbody>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>Rembang I</td>
                                            <td > <div align="right"><?php echo number_format($total_rkap_year_rb / 1000, 0); ?> K T</div></td>
                                            <td ><div  align="center" class="style1">
                                                    <div align="right"><?php echo number_format($total_upto_year_rb / 1000, 0); ?> K T</div>
                                                </div></td>
                                            <td><div align="right"><?php
                                                        if ($performance_sgr < 100) {
                                                            echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                        } else {
                                                            echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                        }
                                                        echo number_format($hasil_year_rb, 2, ",", "."); ?> %</div></td>
                                            <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
                                        </tr>
                                        <tr bgcolor="#F9F9F9">
                                            <td>&nbsp;</td>
                                            <td>Total</td>
                                            <td> <div align="right"><?php echo number_format($rkap_rb['0']['KLINKER'] / 1000, 0); ?> K T</div></td>
                                            <td><div align="center" class="style1">
                                                    <div align="right"><?php echo number_format($data_rb['0']['CLINKER'] / 1000, 0); ?> K T</div>
                                                </div></td>
                                            <td><div align="right"><?php
                                                        if ($performance_sgr < 100) {
                                                            echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                        } else {
                                                            echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                        }
                                                        echo number_format($hasil_year_rb, 2, ",", ".");
                            ?> %</div></td>
                                            <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel headpan">
                        <a data-toggle="collapse" data-parent="#accordion" href="#SGCement" >
                            <div class="headaccordion">	
								<table class="table table-condensed" style="float:left;">
									<tr>
										<td style="font-weight: bold;">KSO SG-SI</td>
										<td style="font-weight: bold;"><div align="right"><?php echo number_format($total_rkap_year_sg / 1000, 0); ?> K T</div></td>
										<td style="font-weight: bold;">
											<div  align="center" class="style1">
												<div align="right"><?php echo number_format($total_upto_year_sg / 1000, 0); ?> K T</div>
											</div>
										</td>
										<td style="font-weight: bold;">
											<div align="right">
												<?php
                                                    if ($performance_sg < 100) {
                                                        echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                    } else {
                                                        echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                    }
                                                    echo number_format($hasil_year_sg, 2, ",", ".");
												?> %
											</div>
										</td>
										<td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
									</tr>
								</table>
                            </div></a>
                        <div id="SGCement" class="panel-collapse collapse">
                            <div class="box-body">
                                <table class="table table-condensed">
                                    <tbody>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>Tuban I</td>
                                            <td><div align="right"><?php echo number_format($total_rkap_year_tb1 / 1000, 0); ?> K T</div></td>
                                            <td><div  align="center" class="style1">
                                                    <div align="right"><?php echo number_format($total_upto_year_tb1 / 1000, 0); ?> K T</div>
                                                </div></td>
                                            <td><div align="right"><?php
                                                    if ($performance_tbn1 < 100) {
                                                        echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                    } else {
                                                        echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                    }
                                                    echo number_format($hasil_year_tb1, 2, ",", ".");
                            ?> %</div></td>
                                            <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>Tuban II</td>
                                            <td><div align="right"><?php echo number_format($total_rkap_year_tb2 / 1000, 0); ?> K T</div></td>
                                            <td><div align="center" class="style1">
                                                    <div align="right"><?php echo number_format($total_upto_year_tb2 / 1000, 0); ?> K T</div>
                                                </div></td>
                                            <td><div align="right"><?php
                                                    if ($performance_tbn2 < 100) {
                                                        echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                    } else {
                                                        echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                    }
                                                    echo number_format($hasil_year_tb2, 2, ",", ".");
                            ?> %</div></td>
                                            <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>Tuban III</td>
                                            <td><div align="right"><?php echo number_format($total_rkap_year_tb3 / 1000, 0); ?> K T</div></td>
                                            <td><div align="right"><?php echo number_format($total_upto_year_tb3 / 1000, 0); ?> K T</div></td>
                                            <td><div align="right"><?php
                                                    if ($performance_tbn3 < 100) {
                                                        echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                    } else {
                                                        echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                    }
                                                    echo number_format($hasil_year_tb3, 2, ",", ".");
                                                    ?> %</div></td>
                                            <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>Tuban IV</td>
                                            <td><div align="right"><?php echo number_format($total_rkap_year_tb4 / 1000, 0); ?> K T</div></td>
                                            <td><div align="right"><?php echo number_format($total_upto_year_tb4 / 1000, 0); ?> K T</div></td>
                                            <td><div align="right"><?php
                                                    if ($performance_tbn4 < 100) {
                                                        echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                    } else {
                                                        echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                    }
                                                    echo number_format($hasil_year_tb4, 2, ",", ".");
                                                    ?> %</div></td>
                                            <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
                                        </tr>
                                        <tr bgcolor="#F9F9F9">
                                            <td>&nbsp;</td>
                                            <td>Total</td>
                                            <td><div align="right"><?php echo number_format($total_rkap_year_sg / 1000, 0); ?> K T</div></td>
                                            <td><div align="right"><?php echo number_format($total_upto_year_sg / 1000, 0); ?> K T</div></td>
                                            <td><div align="right"><?php
                                                    if ($performance_sg < 100) {
                                                        echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                    } else {
                                                        echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                    }
                                                    echo number_format($hasil_year_sg, 2, ",", ".");
                                                    ?> %</div></td>
                                            <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="panel headpan">
                        <a data-toggle="collapse" data-parent="#accordion" href="#STCement" >
                            <div class="headaccordion">										
								<table class="table table-condensed" style="float:left;">
									<tr>
										<td style="font-weight: bold;">Semen Tonasa</td>
										<td style="font-weight: bold;"><div align="right"><?php echo number_format($total_rkap_year_tns / 1000, 0); ?> K T</div></td>
										<td style="font-weight: bold;">
											<div  align="center" class="style1">
												<div align="right"><?php echo number_format($total_upto_year_tns / 1000, 0); ?> K T</div>
											</div>
										</td>
										<td style="font-weight: bold;">
											<div align="right">
												<?php
												if ($performance_st < 100) {
													echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
												} else {
													echo '<img src="media/up-green.png" alt="" width="16px"/> ';
												}
												echo number_format($hasil_year_tns, 2, ",", ".");
												?> %
											</div>
										</td>
										<td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
									</tr>
								</table>
                            </div></a>
                        <div id="STCement" class="panel-collapse collapse">
                            <div class="box-body">

                                <table class="table table-condensed">
                                    <tbody>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>Tonasa II</td>
                                            <td><div align="right"><?php echo number_format($total_rkap_year_tns2 / 1000, 0); ?> K T</div></td>
                                            <td><div  align="center" class="style1">
                                                    <div align="right"><?php echo number_format($total_upto_year_tns2 / 1000, 0); ?> K T</div>
                                                </div></td>
                                            <td><div align="right"><?php
                                                    if ($performance_tns2 < 100) {
                                                        echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                    } else {
                                                        echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                    }
                                                    echo number_format($hasil_year_tns2, 2, ",", ".");
                                                    ?> %</div></td>
                                            <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>Tonasa III</td>
                                            <td><div align="right"><?php echo number_format($total_rkap_year_tns3 / 1000, 0); ?> K T</div></td>
                                            <td><div align="center" class="style1">
                                                    <div align="right"><?php echo number_format($total_upto_year_tns3 / 1000, 0); ?> K T</div>
                                                </div></td>
                                            <td><div align="right"><?php
                                                    if ($performance_tns3 < 100) {
                                                        echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                    } else {
                                                        echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                    }
                                                    echo number_format($hasil_year_tns3, 2, ",", ".");
                                                    ?> %</div></td>
                                            <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>Tonasa IV</td>
                                            <td><div align="right"><?php echo number_format($total_rkap_year_tns4 / 1000, 0); ?> K T</div></td>
                                            <td><div align="right"><?php echo number_format($total_upto_year_tns4 / 1000, 0); ?> K T</div></td>
                                            <td><div align="right"><?php
                                                    if ($performance_tns4 < 100) {
                                                        echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                    } else {
                                                        echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                    }
                                                    echo number_format($hasil_year_tns4, 2, ",", ".");
                                                    ?> %</div></td>
                                            <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>Tonasa V</td>
                                            <td><div align="right"><?php echo number_format($total_rkap_year_tns5 / 1000, 0); ?> K T</div></td>
                                            <td><div align="right"><?php echo number_format($total_upto_year_tns5 / 1000, 0); ?> K T</div></td>
                                            <td><div align="right"><?php
                                                    if ($performance_tns5 < 100) {
                                                        echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                    } else {
                                                        echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                    }
                                                    echo number_format($hasil_year_tns5, 2, ",", ".");
                                                    ?> %</div></td>
                                            <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
                                        </tr>
                                        <tr bgcolor="#F9F9F9">
                                            <td>&nbsp;</td>
                                            <td>Total</td>
                                            <td><div align="right"><?php echo number_format($total_rkap_year_tns / 1000, 0); ?> K T</div></td>
                                            <td><div align="right"><?php echo number_format($total_upto_year_tns / 1000, 0); ?> K T</div></td>
                                            <td><div align="right"><?php
                                                    if ($performance_st < 100) {
                                                        echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                    } else {
                                                        echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                    }
                                                    echo number_format($hasil_year_tns, 2, ",", ".");
                                                    ?> %</div></td>
                                            <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel headpan">
                        <a data-toggle="collapse" data-parent="#accordion" href="#TLCCCement" >
                            <div class="headaccordion">
								<table class="table table-condensed" style="float:left;">
									<tr>
										<td style="font-weight: bold;">Thang long Cement</td>
										<td style="font-weight: bold;"><div align="right"><?php echo number_format($total_rkap_year_tlcc / 1000, 0); ?> K T</div></td>
										<td style="font-weight: bold;">
											<div  align="center" class="style1">
												<div align="right"><?php echo number_format($total_upto_year_tlcc / 1000, 0); ?> K T</div>
											</div>
										</td>
										<td style="font-weight: bold;">
											<div align="right">
												<?php
												if ($performance_tlcc < 100) {
													echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
												} else {
													echo '<img src="media/up-green.png" alt="" width="16px"/> ';
												}
												echo number_format($hasil_year_tlcc, 2, ",", ".");
												?> %
											</div>
										</td>
										<td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
									</tr>
								</table>
                            </div></a>
                        <div id="TLCCCement" class="panel-collapse collapse">
                            <div class="box-body">
                                <table class="table table-condensed">
                                    <tbody>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>MP</td>
                                            <td><div align="right"><?php echo number_format($total_rkap_year_mp / 1000, 0); ?> K T</div></td>
                                            <td><div  align="center" class="style1">
                                                    <div align="right"><?php echo number_format($total_upto_year_mp / 1000, 0); ?> K T</div>
                                                </div></td>
                                            <td><div align="right"><?php
                                                    if ($performance_mp < 100) {
                                                        echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                    } else {
                                                        echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                    }
                                                    echo number_format($hasil_year_mp, 2, ",", ".");
                                                    ?> %</div></td>
                                            <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
                                        </tr>
                                        <tr bgcolor="#F9F9F9">
                                            <td>&nbsp;</td>
                                            <td>Total</td>
                                            <td><div align="right"><?php echo number_format($total_rkap_year_tlcc / 1000, 0); ?> K T</div></td>
                                            <td><div align="center" class="style1">
                                                    <div align="right"><?php echo number_format($total_upto_year_tlcc / 1000, 0); ?> K T</div>
                                                </div></td>
                                            <td><div align="right"><?php
                                                    if ($performance_tlcc < 100) {
                                                        echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                    } else {
                                                        echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                    }
                                                    echo number_format($hasil_year_tlcc, 2, ",", ".");
                                                    ?> %</div></td>
                                            <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
                                        </tr>
                                    </tbody>
                                </table>  
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="LoadChart" class="col-md-7 col-xs-12"> 
        <div class="img-thumbnail">
            <div><h3 style="text-align: center; margin-top: 4px;">SMIG Group Annual Production</h3></div>
            <div><h4 style="text-align: center; margin-bottom: 2px;">Clinker Production</h4></div>
            <div id="container" style="min-height: 330px;margin: 0 auto" align="right">
                <script>
					var on_year_this = <?php echo $tahun; ?>;
					var baseurl = '<?php echo base_url(); ?>';
					<?php if($opco=="SPCement"){?>
						var uriSMIG = baseurl + 'index.php/plant_chart/chart_klinker_padang?input[tahun]=' + on_year_this;
					<?php }elseif($opco=="SGCement"){?>
						var uriSMIG = baseurl + 'index.php/plant_chart/chart_klinker_gresik?input[tahun]=' + on_year_this;
					<?php }elseif($opco=="SGRCement"){?>
						var uriSMIG = baseurl + 'index.php/plant_chart/chart_klinker_rembang?input[tahun]=' + on_year_this;
					<?php }elseif($opco=="STCement"){?>
						var uriSMIG = baseurl + 'index.php/plant_chart/chart_klinker_tonasa?input[tahun]=' + on_year_this;
					<?php }elseif($opco=="TLCCCement"){?>
						var uriSMIG = baseurl + 'index.php/plant_chart/chart_klinker_tlcc?input[tahun]=' + on_year_this;
					<?php }else{?>
						var uriSMIG = baseurl + 'index.php/plant_chart/chart_klinker_group?input[tahun]=' + on_year_this;
					<?php }?>
					$("#LoadChart").load(uriSMIG);
                </script>
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-border" style="position: relative;">
                <div class="row" style="    text-align: center;  font-family: Segoe UI;">
                    <div class="col-xs-6 col-md-3 noPadding">Q1</div>
                    <div class="col-xs-6 col-md-3 noPadding">Q2</div>
                    <div class="col-xs-6 col-md-3 noPadding">Q3</div>
                    <div class="col-xs-6 col-md-3 noPadding">Q4</div>
                </div>
                <div class="row" style="color:#000">
                    <div class="col-xs-6 col-md-3 noPadding">
                        <div id="quartal1" style="  min-height: 166px; margin: 0 auto" align="right"></div>
                        <div class="panel panel-body noPadding" align="center" style=" margin-bottom: 0px;">
                            <div class="realval">RKAP : <b><?php echo number_format($total_rkap_q1, 0, ",", "."); ?></b></div>
                            <div style="font-size: 16px; font-style: italic">Real : <b><?php echo number_format($total_upto_q1, 0, ",", "."); ?></b></div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 noPadding">
                        <div id="quartal2" style="  min-height: 166px; margin: 0 auto" align="right"></div>
                        <div class="panel panel-body noPadding" align="center" style=" margin-bottom: 0px;">
                            <div class="realval">RKAP : <b><?php echo number_format($total_rkap_q2, 0, ",", "."); ?></b></div>
                            <div style="font-size: 16px; font-style: italic">Real : <b><?php echo number_format($total_upto_q2, 0, ",", "."); ?></b></div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 noPadding">
                        <div id="quartal3" style="  min-height: 167px; margin: 0 auto" align="right"></div>
                        <div class="panel panel-body noPadding" align="center" style=" margin-bottom: 0px;">
                            <div class="realval">RKAP : <b><?php echo number_format($total_rkap_q3, 0, ",", "."); ?></b></div>
                            <div style="font-size: 16px; font-style: italic">Real : <b><?php echo number_format($total_upto_q3, 0, ",", "."); ?></b></div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 noPadding">
                        <div id="quartal4" style="  min-height: 167px; margin: 0 auto" align="right"></div>
                        <div class="panel panel-body noPadding" align="center" style=" margin-bottom: 0px;">
                            <div class="realval">RKAP : <b><?php echo number_format($total_rkap_q4, 0, ",", "."); ?></b></div>
                            <div style="font-size: 16px; font-style: italic">Real : <b><?php echo number_format($total_upto_q4, 0, ",", "."); ?></b></div>
                        </div>
                    </div>
                </div
            </div>
        </div>
    </div>
</div>
</div>
<script>
    var baseurl = '<?php echo base_url(); ?>';
    var uriSMIG = baseurl + 'index.php/plant_chart/chart_klinker_group';
    var uriPD = baseurl + 'index.php/plant_chart/chart_klinker_padang';
    var uriGR = baseurl + 'index.php/plant_chart/chart_klinker_gresik';
    var uriRB = baseurl + 'index.php/plant_chart/chart_klinker_rembang';
    var uriTN = baseurl + 'index.php/plant_chart/chart_klinker_tonasa';
    var uriTL = baseurl + 'index.php/plant_chart/chart_klinker_tlcc';

    $(function () {
        $('.collapse').on('shown.bs.collapse', function (e) {
            var uri = baseurl + 'index.php/plant_system/chart';
            var myID = e.currentTarget.id;
            var on_year_this = <?php echo $tahun; ?>;
            if (myID === 'SPCement') {
                $("#LoadChart").load(uriPD + '?input[tahun]=' + on_year_this);
            } else if (myID === 'SGCement') {
                $("#LoadChart").load(uriGR + '?input[tahun]=' + on_year_this);
            } else if (myID === 'SGRCement') {
                $("#LoadChart").load(uriRB + '?input[tahun]=' + on_year_this);
            } else if (myID === 'STCement') {
                $("#LoadChart").load(uriTN + '?input[tahun]=' + on_year_this);
            } else if (myID === 'TLCCCement') {
                $("#LoadChart").load(uriTL + '?input[tahun]=' + on_year_this);
            } else if (myID === 'SMIGGroup') {
                $("#LoadChart").load(uriSMIG + '?input[tahun]=' + on_year_this);
            }
        })
    });
    var acc = document.getElementsByClassName("accordion");
    var i;
    for (i = 0; i < acc.length; i++) {
        acc[i].onclick = function () {
            this.classList.toggle("active");
            this.nextElementSibling.classList.toggle("show");
        }
    }
	<?php if($opco=="SPCement"){?>
		$('a[href=#SPCement]').trigger('click');
	<?php }elseif($opco=="SGCement"){?>
		$('a[href=#SGCement]').trigger('click');
	<?php }elseif($opco=="SGRCement"){?>
		$('a[href=#SGRCement]').trigger('click');
	<?php }elseif($opco=="STCement"){?>
		$('a[href=#STCement]').trigger('click');
	<?php }elseif($opco=="TLCCCement"){?>
		$('a[href=#TLCCCement]').trigger('click');
	<?php }?>
</script>