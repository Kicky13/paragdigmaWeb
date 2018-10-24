<?php
$input = $this->input->get('input');
$tahun = !empty($input) ? $input['tahun'] : date('Y');
$dateof_year = date('z', mktime(0, 0, 0, 12, 31, $tahun)) + 1;
$dateup_year = date('z') + 1;
//===================================================Untuk Quartal dan bulanan===================================================//
$jml_jan = ($datacm_sg["$thn-01"]['sg']) + ($datacm_sp["$thn-01"]['sp']) + ($datacm_st["$thn-01"]['st']) + ($datacm_tlcc["$thn-01"]['tlcc']);
$jml_feb = ($datacm_sg["$thn-02"]['sg']) + ($datacm_sp["$thn-02"]['sp']) + ($datacm_st["$thn-02"]['st']) + ($datacm_tlcc["$thn-02"]['tlcc']);
$jml_mar = ($datacm_sg["$thn-03"]['sg']) + ($datacm_sp["$thn-03"]['sp']) + ($datacm_st["$thn-03"]['st']) + ($datacm_tlcc["$thn-03"]['tlcc']);

$total_upto_q1 = $jml_jan + $jml_feb + $jml_mar;

$total_rkap_q1 = ($rkap_cm[1]['CEMENT']) + ($rkap_cm[2]['CEMENT']) + ($rkap_cm[3]['CEMENT']);

$total_q1 = ($total_upto_q1 / $total_rkap_q1) * 100;

$jml_apr = ($datacm_sg["$thn-04"]['sg']) + ($datacm_sp["$thn-04"]['sp']) + ($datacm_st["$thn-04"]['st']) + ($datacm_tlcc["$thn-04"]['tlcc']);
$jml_may = ($datacm_sg["$thn-05"]['sg']) + ($datacm_sp["$thn-05"]['sp']) + ($datacm_st["$thn-05"]['st']) + ($datacm_tlcc["$thn-05"]['tlcc']);
$jml_jun = ($datacm_sg["$thn-06"]['sg']) + ($datacm_sp["$thn-06"]['sp']) + ($datacm_st["$thn-06"]['st']) + ($datacm_tlcc["$thn-06"]['tlcc']);

$total_upto_q2 = $jml_apr + $jml_may + $jml_jun;

$total_rkap_q2 = ($rkap_cm[4]['CEMENT']) + ($rkap_cm[5]['CEMENT']) + ($rkap_cm[6]['CEMENT']);

$total_q2 = ($total_upto_q2 / $total_rkap_q2) * 100;

$jml_jul = ($datacm_sg["$thn-07"]['sg']) + ($datacm_sp["$thn-07"]['sp']) + ($datacm_st["$thn-07"]['st']) + ($datacm_tlcc["$thn-07"]['tlcc']);
$jml_aug = ($datacm_sg["$thn-08"]['sg']) + ($datacm_sp["$thn-08"]['sp']) + ($datacm_st["$thn-08"]['st']) + ($datacm_tlcc["$thn-08"]['tlcc']);
$jml_sep = ($datacm_sg["$thn-09"]['sg']) + ($datacm_sp["$thn-09"]['sp']) + ($datacm_st["$thn-09"]['st']) + ($datacm_tlcc["$thn-09"]['tlcc']);

$total_upto_q3 = $jml_jul + $jml_aug + $jml_sep;

$total_rkap_q3 = ($rkap_cm[7]['CEMENT']) + ($rkap_cm[8]['CEMENT']) + ($rkap_cm[9]['CEMENT']);

$total_q3 = ($total_upto_q3 / $total_rkap_q3) * 100;

$jml_oct = ($datacm_sg["$thn-10"]['sg']) + ($datacm_sp["$thn-10"]['sp']) + ($datacm_st["$thn-10"]['st']) + ($datacm_tlcc["$thn-10"]['tlcc']);
$jml_nov = ($datacm_sg["$thn-11"]['sg']) + ($datacm_sp["$thn-11"]['sp']) + ($datacm_st["$thn-11"]['st']) + ($datacm_tlcc["$thn-11"]['tlcc']);
$jml_dec = ($datacm_sg["$thn-12"]['sg']) + ($datacm_sp["$thn-12"]['sp']) + ($datacm_st["$thn-12"]['st']) + ($datacm_tlcc["$thn-12"]['tlcc']);

$total_upto_q4 = $jml_oct + $jml_nov + $jml_dec;

$total_rkap_q4 = ($rkap_cm[10]['CEMENT']) + ($rkap_cm[11]['CEMENT']) + ($rkap_cm[12]['CEMENT']);

$total_q4 = ($total_upto_q4 / $total_rkap_q4) * 100;
//===================================================Untuk menu samping kiri (collapsed)===================================================//
// Semen Indonesia Group [CEMENT]
$total_upto_sg_cm = ($datacm_sg["$thn-01"]['sg']) + ($datacm_sg["$thn-02"]['sg']) +
        ($datacm_sg["$thn-03"]['sg']) + ($datacm_sg["$thn-04"]['sg']) +
        ($datacm_sg["$thn-05"]['sg']) + ($datacm_sg["$thn-06"]['sg']) +
        ($datacm_sg["$thn-07"]['sg']) + ($datacm_sg["$thn-08"]['sg']) +
        ($datacm_sg["$thn-09"]['sg']) + ($datacm_sg["$thn-10"]['sg']) +
        ($datacm_sg["$thn-11"]['sg']) + ($datacm_sg["$thn-12"]['sg']);
$total_upto_sp_cm = ($datacm_sp["$thn-01"]['sp']) + ($datacm_sp["$thn-02"]['sp']) +
        ($datacm_sp["$thn-03"]['sp']) + ($datacm_sp["$thn-04"]['sp']) +
        ($datacm_sp["$thn-05"]['sp']) + ($datacm_sp["$thn-06"]['sp']) +
        ($datacm_sp["$thn-07"]['sp']) + ($datacm_sp["$thn-08"]['sp']) +
        ($datacm_sp["$thn-09"]['sp']) + ($datacm_sp["$thn-10"]['sp']) +
        ($datacm_sp["$thn-11"]['sp']) + ($datacm_sp["$thn-12"]['sp']);
$total_upto_st_cm = ($datacm_st["$thn-01"]['st']) + ($datacm_st["$thn-02"]['st']) +
        ($datacm_st["$thn-03"]['st']) + ($datacm_st["$thn-04"]['st']) +
        ($datacm_st["$thn-05"]['st']) + ($datacm_st["$thn-06"]['st']) +
        ($datacm_st["$thn-07"]['st']) + ($datacm_st["$thn-08"]['st']) +
        ($datacm_st["$thn-09"]['st']) + ($datacm_st["$thn-10"]['st']) +
        ($datacm_st["$thn-11"]['st']) + ($datacm_st["$thn-12"]['st']);
$total_upto_tlcc_cm = ($datacm_tlcc["$thn-01"]['tlcc']) + ($datacm_tlcc["$thn-02"]['tlcc']) +
        ($datacm_tlcc["$thn-03"]['tlcc']) + ($datacm_tlcc["$thn-04"]['tlcc']) +
        ($datacm_tlcc["$thn-05"]['tlcc']) + ($datacm_tlcc["$thn-06"]['tlcc']) +
        ($datacm_tlcc["$thn-07"]['tlcc']) + ($datacm_tlcc["$thn-08"]['tlcc']) +
        ($datacm_tlcc["$thn-09"]['tlcc']) + ($datacm_tlcc["$thn-10"]['tlcc']) +
        ($datacm_tlcc["$thn-11"]['tlcc']) + ($datacm_tlcc["$thn-12"]['tlcc']);

$total_upto_smig_cm = $total_upto_sg_cm + $total_upto_sp_cm + $total_upto_st_cm + $total_upto_tlcc_cm;

$total_rkap_smig_cm = ($rkap_cm[1]['CEMENT']) + ($rkap_cm[2]['CEMENT']) +
        ($rkap_cm[3]['CEMENT']) + ($rkap_cm[4]['CEMENT']) +
        ($rkap_cm[5]['CEMENT']) + ($rkap_cm[6]['CEMENT']) +
        ($rkap_cm[7]['CEMENT']) + ($rkap_cm[8]['CEMENT']) +
        ($rkap_cm[9]['CEMENT']) + ($rkap_cm[10]['CEMENT']) +
        ($rkap_cm[11]['CEMENT']) + ($rkap_cm[12]['CEMENT']);

$hasil_year_smig_cm = ($total_upto_smig_cm / $total_rkap_smig_cm) * 100;

// Semen Padang [CEMENT]
$hasil_tot_semensp = number_format((($data_sp['0']['CEMENT'] / $rkap_sp['0']['SEMEN']) * 100), 2, ",", ".");
// Semen Gresik [CEMENT]
$hasil_tot_semensg = number_format((($data['0']['CEMENT'] / $rkap['0']['SEMEN']) * 100), 2, ",", ".");
// Semen Tonasa [CEMENT]
$hasil_tot_semenst = number_format((($data_st['0']['CEMENT'] / $rkap_st['0']['SEMEN']) * 100), 2, ",", ".");
// Semen TLCC [CEMENT]
$hasil_tot_sementl = number_format((($data_tl['0']['CEMENT'] / $rkap_tl['0']['SEMEN']) * 100), 2, ",", ".");
// Semen Gresik Rembang [CEMENT]
$hasil_tot_semenrb = number_format((($data_rb['0']['CEMENT'] / $rkap_rb['0']['SEMEN']) * 100), 2, ",", ".");

//=================================================== Semen Padang (collapsed)===================================================//
//******************************* Indarung II *******************************//
if (!empty($myDataPD["$thn-01"])) {
    $arr_jan_sp = (array_sum(($myDataPD["$thn-01"])));
} else {
    $arr_jan_sp = 0;
}
if (!empty($myDataPD["$thn-02"])) {
    $arr_feb_sp = (array_sum(($myDataPD["$thn-02"])));
} else {
    $arr_feb_sp = 0;
}
if (!empty($myDataPD["$thn-03"])) {
    $arr_mar_sp = (array_sum(($myDataPD["$thn-03"])));
} else {
    $arr_mar_sp = 0;
}
if (!empty($myDataPD["$thn-04"])) {
    $arr_apr_sp = (array_sum(($myDataPD["$thn-04"])));
} else {
    $arr_apr_sp = 0;
}
if (!empty($myDataPD["$thn-05"])) {
    $arr_may_sp = (array_sum(($myDataPD["$thn-05"])));
} else {
    $arr_may_sp = 0;
}
if (!empty($myDataPD["$thn-06"])) {
    $arr_jun_sp = (array_sum(($myDataPD["$thn-06"])));
} else {
    $arr_jun_sp = 0;
}
if (!empty($myDataPD["$thn-07"])) {
    $arr_jul_sp = (array_sum(($myDataPD["$thn-07"])));
} else {
    $arr_jul_sp = 0;
}
if (!empty($myDataPD["$thn-08"])) {
    $arr_aug_sp = (array_sum(($myDataPD["$thn-08"])));
} else {
    $arr_aug_sp = 0;
}
if (!empty($myDataPD["$thn-09"])) {
    $arr_sep_sp = (array_sum(($myDataPD["$thn-09"])));
} else {
    $arr_sep_sp = 0;
}
if (!empty($myDataPD["$thn-10"])) {
    $arr_okt_sp = (array_sum(($myDataPD["$thn-10"])));
} else {
    $arr_okt_sp = 0;
}
if (!empty($myDataPD["$thn-11"])) {
    $arr_nop_sp = (array_sum(($myDataPD["$thn-11"])));
} else {
    $arr_nop_sp = 0;
}
if (!empty($myDataPD["$thn-12"])) {
    $arr_dec_sp = (array_sum(($myDataPD["$thn-12"])));
} else {
    $arr_dec_sp = 0;
}

$total_upto_year_sp = $arr_jan_sp + $arr_feb_sp + $arr_mar_sp + $arr_apr_sp + $arr_may_sp + $arr_jun_sp + $arr_jul_sp + $arr_aug_sp + $arr_sep_sp + $arr_okt_sp + $arr_nop_sp + $arr_dec_sp;
$total_rkap_year_sp = ($DProductionPD[1]['cement']) + ($DProductionPD[2]['cement']) + 
        ($DProductionPD[3]['cement']) + ($DProductionPD[4]['cement']) +
        ($DProductionPD[5]['cement']) + ($DProductionPD[6]['cement']) +
        ($DProductionPD[7]['cement']) + ($DProductionPD[8]['cement']) + 
        ($DProductionPD[9]['cement']) + ($DProductionPD[10]['cement']) + 
        ($DProductionPD[11]['cement']) + ($DProductionPD[12]['cement']);
$hasil_year_sp = ($total_upto_year_sp / $total_rkap_year_sp) * 100;

$total_rkap_year_ind2 = $rkap_cementPD[$thn]['indarung2'];
$total_upto_year_ind2 = (($myDataPD["$thn-01"]['indarung2']) + ($myDataPD["$thn-02"]['indarung2']) +
        ($myDataPD["$thn-03"]['indarung2']) + (($myDataPD["$thn-04"]['indarung2']) +
        ($myDataPD["$thn-05"]['indarung2']) + ($myDataPD["$thn-06"]['indarung2'])) +
        ($myDataPD["$thn-07"]['indarung2']) + ($myDataPD["$thn-08"]['indarung2']) +
        ($myDataPD["$thn-09"]['indarung2']) + ($myDataPD["$thn-10"]['indarung2']) +
        ($myDataPD["$thn-11"]['indarung2']) + ($myDataPD["$thn-12"]['indarung2']));
$hasil_year_ind2 = ($total_upto_year_ind2 / $total_rkap_year_ind2) * 100;
//******************************* Indarung III *******************************//
$total_rkap_year_ind3 = $rkap_cementPD[$thn]['indarung3'];
$total_upto_year_ind3 = (($myDataPD["$thn-01"]['indarung3']) + ($myDataPD["$thn-02"]['indarung3']) +
        ($myDataPD["$thn-03"]['indarung3']) + (($myDataPD["$thn-04"]['indarung3']) +
        ($myDataPD["$thn-05"]['indarung3']) + ($myDataPD["$thn-06"]['indarung3'])) +
        ($myDataPD["$thn-07"]['indarung3']) + ($myDataPD["$thn-08"]['indarung3']) +
        ($myDataPD["$thn-09"]['indarung3']) + ($myDataPD["$thn-10"]['indarung3']) +
        ($myDataPD["$thn-11"]['indarung3']) + ($myDataPD["$thn-12"]['indarung3']));
$hasil_year_ind3 = ($total_upto_year_ind3 / $total_rkap_year_ind3) * 100;
//******************************* Indarung IV *******************************//
$total_rkap_year_ind4 = $rkap_cementPD[$thn]['indarung4'];
$total_upto_year_ind4 = (($myDataPD["$thn-01"]['indarung4']) + ($myDataPD["$thn-02"]['indarung4']) +
        ($myDataPD["$thn-03"]['indarung4']) + ($myDataPD["$thn-04"]['indarung4']) +
        ($myDataPD["$thn-05"]['indarung4']) + ($myDataPD["$thn-06"]['indarung4']) +
        ($myDataPD["$thn-07"]['indarung4']) + ($myDataPD["$thn-08"]['indarung4']) +
        ($myDataPD["$thn-09"]['indarung4']) + ($myDataPD["$thn-10"]['indarung4']) +
        ($myDataPD["$thn-11"]['indarung4']) + ($myDataPD["$thn-12"]['indarung4']));
$hasil_year_ind4 = @($total_upto_year_ind4 / $total_rkap_year_ind4) * 100;
//******************************* Indarung V *******************************//
$total_rkap_year_ind5 = $rkap_cementPD[$thn]['indarung5'];
$total_upto_year_ind5 = (($myDataPD["$thn-01"]['indarung5']) + ($myDataPD["$thn-02"]['indarung5']) +
        ($myDataPD["$thn-03"]['indarung5']) + (($myDataPD["$thn-04"]['indarung5']) +
        ($myDataPD["$thn-05"]['indarung5']) + ($myDataPD["$thn-06"]['indarung5'])) +
        ($myDataPD["$thn-07"]['indarung5']) + ($myDataPD["$thn-08"]['indarung5']) +
        ($myDataPD["$thn-09"]['indarung5']) + ($myDataPD["$thn-10"]['indarung5']) +
        ($myDataPD["$thn-11"]['indarung5']) + ($myDataPD["$thn-12"]['indarung5']));
$hasil_year_ind5 = @($total_upto_year_ind5 / $total_rkap_year_ind5) * 100;
//******************************* Dumai *******************************//
$total_rkap_year_dmi = $rkap_cementPD[$thn]['dumai'];
$total_upto_year_dmi = (($myDataPD["$thn-01"]['dumai']) + ($myDataPD["$thn-02"]['dumai']) +
        ($myDataPD["$thn-03"]['dumai']) + (($myDataPD["$thn-04"]['dumai']) +
        ($myDataPD["$thn-05"]['dumai']) + ($myDataPD["$thn-06"]['dumai'])) +
        ($myDataPD["$thn-07"]['dumai']) + ($myDataPD["$thn-08"]['dumai']) +
        ($myDataPD["$thn-09"]['dumai']) + ($myDataPD["$thn-10"]['dumai']) +
        ($myDataPD["$thn-11"]['dumai']) + ($myDataPD["$thn-12"]['dumai']));
$hasil_year_dmi = ($total_upto_year_dmi / $total_rkap_year_dmi) * 100;
//******************************* Indarung VI *******************************//
$total_rkap_year_ind6 = $rkap_cementPD[$thn]['indarung6'];
$total_upto_year_ind6 = (($myDataPD["$thn-01"]['indarung6']) + ($myDataPD["$thn-02"]['indarung6']) +
        ($myDataPD["$thn-03"]['indarung6']) + (($myDataPD["$thn-04"]['indarung6']) +
        ($myDataPD["$thn-05"]['indarung6']) + ($myDataPD["$thn-06"]['indarung6'])) +
        ($myDataPD["$thn-07"]['indarung6']) + ($myDataPD["$thn-08"]['indarung6']) +
        ($myDataPD["$thn-09"]['indarung6']) + ($myDataPD["$thn-10"]['indarung6']) +
        ($myDataPD["$thn-11"]['indarung6']) + ($myDataPD["$thn-12"]['indarung6']));
$hasil_year_ind6 = @($total_upto_year_ind6 / $total_rkap_year_ind6) * 100;
//=================================================== Semen Gresik (collapsed)===================================================//
//******************************* Semen Gresik *******************************//
if (!empty($myData["$thn-01"])) {
    $arr_jan_sg = (array_sum(($myData["$thn-01"])));
} else {
    $arr_jan_sg = 0;
}
if (!empty($myData["$thn-02"])) {
    $arr_feb_sg = (array_sum(($myData["$thn-02"])));
} else {
    $arr_feb_sg = 0;
}
if (!empty($myData["$thn-03"])) {
    $arr_mar_sg = (array_sum(($myData["$thn-03"])));
} else {
    $arr_mar_sg = 0;
}
if (!empty($myData["$thn-04"])) {
    $arr_apr_sg = (array_sum(($myData["$thn-04"])));
} else {
    $arr_apr_sg = 0;
}
if (!empty($myData["$thn-05"])) {
    $arr_may_sg = (array_sum(($myData["$thn-05"])));
} else {
    $arr_may_sg = 0;
}
if (!empty($myData["$thn-06"])) {
    $arr_jun_sg = (array_sum(($myData["$thn-06"])));
} else {
    $arr_jun_sg = 0;
}
if (!empty($myData["$thn-07"])) {
    $arr_jul_sg = (array_sum(($myData["$thn-07"])));
} else {
    $arr_jul_sg = 0;
}
if (!empty($myData["$thn-08"])) {
    $arr_aug_sg = (array_sum(($myData["$thn-08"])));
} else {
    $arr_aug_sg = 0;
}
if (!empty($myData["$thn-09"])) {
    $arr_sep_sg = (array_sum(($myData["$thn-09"])));
} else {
    $arr_sep_sg = 0;
}
if (!empty($myData["$thn-10"])) {
    $arr_okt_sg = (array_sum(($myData["$thn-10"])));
} else {
    $arr_okt_sg = 0;
}
if (!empty($myData["$thn-11"])) {
    $arr_nop_sg = (array_sum(($myData["$thn-11"])));
} else {
    $arr_nop_sg = 0;
}
if (!empty($myData["$thn-12"])) {
    $arr_dec_sg = (array_sum(($myData["$thn-12"])));
} else {
    $arr_dec_sg = 0;
}

$total_upto_year_sg = $arr_jan_sg + $arr_feb_sg + $arr_mar_sg + $arr_apr_sg + $arr_may_sg + $arr_jun_sg + $arr_jul_sg + $arr_aug_sg + $arr_sep_sg + $arr_okt_sg + $arr_nop_sg + $arr_dec_sg;

$total_rkap_year_sg = ($DProduction[1]['cement']) + ($DProduction[2]['cement']) +
        ($DProduction[3]['cement']) + ($DProduction[4]['cement']) +
        ($DProduction[5]['cement']) + ($DProduction[6]['cement']) +
        ($DProduction[7]['cement']) + ($DProduction[8]['cement']) +
        ($DProduction[9]['cement']) + ($DProduction[10]['cement']) +
        ($DProduction[11]['cement']) + ($DProduction[12]['cement']);
$hasil_year_sg = ($total_upto_year_sg / $total_rkap_year_sg) * 100;
//******************************* Tuban I *******************************//
$total_rkap_year_tb1 = $rkap_cement[$thn]['tuban1'];
$total_upto_year_tb1 = (($myData["$thn-01"]['tuban1']) + ($myData["$thn-02"]['tuban1']) +
        ($myData["$thn-03"]['tuban1']) + ($myData["$thn-04"]['tuban1']) +
        ($myData["$thn-05"]['tuban1']) + ($myData["$thn-06"]['tuban1']) +
        ($myData["$thn-07"]['tuban1']) + ($myData["$thn-08"]['tuban1']) +
        ($myData["$thn-09"]['tuban1']) + ($myData["$thn-10"]['tuban1']) +
        ($myData["$thn-11"]['tuban1']) + ($myData["$thn-12"]['tuban1']));
$hasil_year_tb1 = ($total_upto_year_tb1 / $total_rkap_year_tb1) * 100;
//******************************* Tuban II *******************************//
$total_rkap_year_tb2 = $rkap_cement[$thn]['tuban2'];
$total_upto_year_tb2 = (($myData["$thn-01"]['tuban2']) + ($myData["$thn-02"]['tuban2']) +
        ($myData["$thn-03"]['tuban2']) + ($myData["$thn-04"]['tuban2']) +
        ($myData["$thn-05"]['tuban2']) + ($myData["$thn-06"]['tuban2']) +
        ($myData["$thn-07"]['tuban2']) + ($myData["$thn-08"]['tuban2']) +
        ($myData["$thn-09"]['tuban2']) + ($myData["$thn-10"]['tuban2']) +
        ($myData["$thn-11"]['tuban2']) + ($myData["$thn-12"]['tuban2']));
$hasil_year_tb2 = ($total_upto_year_tb2 / $total_rkap_year_tb2) * 100;
//******************************* Tuban III *******************************//
$total_rkap_year_tb3 = $rkap_cement[$thn]['tuban3'];
$total_upto_year_tb3 = (($myData["$thn-01"]['tuban3']) + ($myData["$thn-02"]['tuban3']) +
        ($myData["$thn-03"]['tuban3']) + ($myData["$thn-04"]['tuban3']) +
        ($myData["$thn-05"]['tuban3']) + ($myData["$thn-06"]['tuban3']) +
        ($myData["$thn-07"]['tuban3']) + ($myData["$thn-08"]['tuban3']) +
        ($myData["$thn-09"]['tuban3']) + ($myData["$thn-10"]['tuban3']) +
        ($myData["$thn-11"]['tuban3']) + ($myData["$thn-12"]['tuban3']));
$hasil_year_tb3 = ($total_upto_year_tb3 / $total_rkap_year_tb3) * 100;
//******************************* Tuban IV *******************************//
$total_rkap_year_tb4 = $rkap_cement[$thn]['tuban4'];
$total_upto_year_tb4 = (($myData["$thn-01"]['tuban4']) + ($myData["$thn-02"]['tuban4']) +
        ($myData["$thn-03"]['tuban4'])) + (($myData["$thn-04"]['tuban4']) +
        ($myData["$thn-05"]['tuban4']) + ($myData["$thn-06"]['tuban4'])) +
        (($myData["$thn-07"]['tuban4']) + ($myData["$thn-08"]['tuban4']) +
        ($myData["$thn-09"]['tuban4'])) + (($myData["$thn-10"]['tuban4']) +
        ($myData["$thn-11"]['tuban4']) + ($myData["$thn-12"]['tuban4']));
$hasil_year_tb4 = ($total_upto_year_tb4 / $total_rkap_year_tb4) * 100;
//******************************* Gresik *******************************//
$total_rkap_year_grs = $rkap_cement[$thn]['gresik'];
$total_upto_year_grs = (($myData["$thn-01"]['gresik']) + ($myData["$thn-02"]['gresik']) +
        ($myData["$thn-03"]['gresik']) + ($myData["$thn-04"]['gresik']) +
        ($myData["$thn-05"]['gresik']) + ($myData["$thn-06"]['gresik']) +
        ($myData["$thn-07"]['gresik']) + ($myData["$thn-08"]['gresik']) +
        ($myData["$thn-09"]['gresik']) + ($myData["$thn-10"]['tuban3']) +
        ($myData["$thn-11"]['tuban3']) + ($myData["$thn-12"]['tuban3']));
$hasil_year_grs = ($total_upto_year_grs / $total_rkap_year_grs) * 100;

//=================================================== Semen Tonasa (collapsed)===================================================//
//******************************* Semen Tonasa *******************************//
if (!empty($myDataTN["$thn-01"])) {
    $arr_jan_st = (array_sum(($myDataTN["$thn-01"])));
} else {
    $arr_jan_st = 0;
}
if (!empty($myDataTN["$thn-02"])) {
    $arr_feb_st = (array_sum(($myDataTN["$thn-02"])));
} else {
    $arr_feb_st = 0;
}
if (!empty($myDataTN["$thn-03"])) {
    $arr_mar_st = (array_sum(($myDataTN["$thn-03"])));
} else {
    $arr_mar_st = 0;
}
if (!empty($myDataTN["$thn-04"])) {
    $arr_apr_st = (array_sum(($myDataTN["$thn-04"])));
} else {
    $arr_apr_st = 0;
}
if (!empty($myDataTN["$thn-05"])) {
    $arr_may_st = (array_sum(($myDataTN["$thn-05"])));
} else {
    $arr_may_st = 0;
}
if (!empty($myDataTN["$thn-06"])) {
    $arr_jun_st = (array_sum(($myDataTN["$thn-06"])));
} else {
    $arr_jun_st = 0;
}
if (!empty($myDataTN["$thn-07"])) {
    $arr_jul_st = (array_sum(($myDataTN["$thn-07"])));
} else {
    $arr_jul_st = 0;
}
if (!empty($myDataTN["$thn-08"])) {
    $arr_aug_st = (array_sum(($myDataTN["$thn-08"])));
} else {
    $arr_aug_st = 0;
}
if (!empty($myDataTN["$thn-09"])) {
    $arr_sep_st = (array_sum(($myDataTN["$thn-09"])));
} else {
    $arr_sep_st = 0;
}
if (!empty($myDataTN["$thn-10"])) {
    $arr_okt_st = (array_sum(($myDataTN["$thn-10"])));
} else {
    $arr_okt_st = 0;
}
if (!empty($myDataTN["$thn-11"])) {
    $arr_nop_st = (array_sum(($myDataTN["$thn-11"])));
} else {
    $arr_nop_st = 0;
}
if (!empty($myDataTN["$thn-12"])) {
    $arr_dec_st = (array_sum(($myDataTN["$thn-12"])));
} else {
    $arr_dec_st = 0;
}

$total_upto_year_tns = $arr_jan_st + $arr_feb_st + $arr_mar_st + $arr_apr_st + $arr_may_st + $arr_jun_st + $arr_jul_st + $arr_aug_st + $arr_sep_st + $arr_okt_st + $arr_nop_st + $arr_dec_st;
$total_rkap_year_tns = ($DProductionTN[1]['cement']) + ($DProductionTN[2]['cement']) +
        ($DProductionTN[3]['cement']) + ($DProductionTN[4]['cement']) +
        ($DProductionTN[5]['cement']) + ($DProductionTN[6]['cement']) +
        ($DProductionTN[7]['cement']) + ($DProductionTN[8]['cement']) +
        ($DProductionTN[9]['cement']) + ($DProductionTN[10]['cement']) +
        ($DProductionTN[11]['cement']) + ($DProductionTN[12]['cement']);
$hasil_year_tns = ($total_upto_year_tns / $total_rkap_year_tns) * 100;
//******************************* Tonasa II *******************************//
$total_rkap_year_tns2 = $rkap_cementTN[$thn]['tonasa2'];
$total_upto_year_tns2 = (($myDataTN["$thn-01"]['tonasa2']) + ($myDataTN["$thn-02"]['tonasa2']) +
        ($myDataTN["$thn-03"]['tonasa2']) + ($myDataTN["$thn-04"]['tonasa2']) +
        ($myDataTN["$thn-05"]['tonasa2']) + ($myDataTN["$thn-06"]['tonasa2']) +
        ($myDataTN["$thn-07"]['tonasa2']) + ($myDataTN["$thn-08"]['tonasa2']) +
        ($myDataTN["$thn-09"]['tonasa2']) + ($myDataTN["$thn-10"]['tonasa2']) +
        ($myDataTN["$thn-11"]['tonasa2']) + ($myDataTN["$thn-12"]['tonasa2']));
$hasil_year_tns2 = ($total_upto_year_tns2 / $total_rkap_year_tns2) * 100;
//******************************* Tonasa III *******************************//
$total_rkap_year_tns3 = $rkap_cementTN[$thn]['tonasa3'];
$total_upto_year_tns3 = (($myDataTN["$thn-01"]['tonasa3']) + ($myDataTN["$thn-02"]['tonasa3']) +
        ($myDataTN["$thn-03"]['tonasa3']) + ($myDataTN["$thn-04"]['tonasa3']) +
        ($myDataTN["$thn-05"]['tonasa3']) + ($myDataTN["$thn-06"]['tonasa3']) +
        ($myDataTN["$thn-07"]['tonasa3']) + ($myDataTN["$thn-08"]['tonasa3']) +
        ($myDataTN["$thn-09"]['tonasa3']) + ($myDataTN["$thn-10"]['tonasa3']) +
        ($myDataTN["$thn-11"]['tonasa3']) + ($myDataTN["$thn-12"]['tonasa3']));
$hasil_year_tns3 = ($total_upto_year_tns3 / $total_rkap_year_tns3) * 100;
//******************************* Tonasa IV *******************************//
$total_rkap_year_tns4 = $rkap_cementTN[$thn]['tonasa4'];
$total_upto_year_tns4 = (($myDataTN["$thn-01"]['tonasa4']) + ($myDataTN["$thn-02"]['tonasa4']) +
        ($myDataTN["$thn-03"]['tonasa4']) + ($myDataTN["$thn-04"]['tonasa4']) +
        ($myDataTN["$thn-05"]['tonasa4']) + ($myDataTN["$thn-06"]['tonasa4']) +
        ($myDataTN["$thn-07"]['tonasa4']) + ($myDataTN["$thn-08"]['tonasa4']) +
        ($myDataTN["$thn-09"]['tonasa4']) + ($myDataTN["$thn-10"]['tonasa4']) +
        ($myDataTN["$thn-11"]['tonasa4']) + ($myDataTN["$thn-12"]['tonasa4']));
$hasil_year_tns4 = @($total_upto_year_tns4 / $total_rkap_year_tns4) * 100;
//******************************* Tonasa V *******************************//
$total_rkap_year_tns5 = $rkap_cementTN[$thn]['tonasa5'];
$total_upto_year_tns5 = (($myDataTN["$thn-01"]['tonasa5']) + ($myDataTN["$thn-02"]['tonasa5']) +
        ($myDataTN["$thn-03"]['tonasa5']) + ($myDataTN["$thn-04"]['tonasa5']) +
        ($myDataTN["$thn-05"]['tonasa5']) + ($myDataTN["$thn-06"]['tonasa5']) +
        ($myDataTN["$thn-07"]['tonasa5']) + ($myDataTN["$thn-08"]['tonasa5']) +
        ($myDataTN["$thn-09"]['tonasa5']) + ($myDataTN["$thn-10"]['tonasa5']) +
        ($myDataTN["$thn-11"]['tonasa5']) + ($myDataTN["$thn-12"]['tonasa5']));
$hasil_year_tns5 = @($total_upto_year_tns5 / $total_rkap_year_tns5) * 100;

//=================================================== Semen TLCC (collapsed)===================================================//
//******************************* Semen TLCC *******************************//
if (!empty($myDataTL["$thn-01"])) {
    $arr_jan_tlcc = (array_sum(($myDataTL["$thn-01"])));
} else {
    $arr_jan_tlcc = 0;
}
if (!empty($myDataTL["$thn-02"])) {
    $arr_feb_tlcc = (array_sum(($myDataTL["$thn-02"])));
} else {
    $arr_feb_tlcc = 0;
}
if (!empty($myDataTL["$thn-03"])) {
    $arr_mar_tlcc = (array_sum(($myDataTL["$thn-03"])));
} else {
    $arr_mar_tlcc = 0;
}
if (!empty($myDataTL["$thn-04"])) {
    $arr_apr_tlcc = (array_sum(($myDataTL["$thn-04"])));
} else {
    $arr_apr_tlcc = 0;
}
if (!empty($myDataTL["$thn-05"])) {
    $arr_may_tlcc = (array_sum(($myDataTL["$thn-05"])));
} else {
    $arr_may_tlcc = 0;
}
if (!empty($myDataTL["$thn-06"])) {
    $arr_jun_tlcc = (array_sum(($myDataTL["$thn-06"])));
} else {
    $arr_jun_tlcc = 0;
}
if (!empty($myDataTL["$thn-07"])) {
    $arr_jul_tlcc = (array_sum(($myDataTL["$thn-07"])));
} else {
    $arr_jul_tlcc = 0;
}
if (!empty($myDataTL["$thn-08"])) {
    $arr_aug_tlcc = (array_sum(($myDataTL["$thn-08"])));
} else {
    $arr_aug_tlcc = 0;
}
if (!empty($myDataTL["$thn-09"])) {
    $arr_sep_tlcc = (array_sum(($myDataTL["$thn-09"])));
} else {
    $arr_sep_tlcc = 0;
}
if (!empty($myDataTL["$thn-10"])) {
    $arr_okt_tlcc = (array_sum(($myDataTL["$thn-10"])));
} else {
    $arr_okt_tlcc = 0;
}
if (!empty($myDataTL["$thn-11"])) {
    $arr_nop_tlcc = (array_sum(($myDataTL["$thn-11"])));
} else {
    $arr_nop_tlcc = 0;
}
if (!empty($myDataTL["$thn-12"])) {
    $arr_dec_tlcc = (array_sum(($myDataTL["$thn-12"])));
} else {
    $arr_dec_tlcc = 0;
}

$total_upto_year_tlcc = $arr_jan_tlcc + $arr_feb_tlcc + $arr_mar_tlcc + $arr_apr_tlcc + $arr_may_tlcc + $arr_jun_tlcc + $arr_jul_tlcc + $arr_aug_tlcc + $arr_sep_tlcc + $arr_okt_tlcc + $arr_nop_tlcc + $arr_dec_tlcc;
$total_rkap_year_tlcc = ($DProductionTL[1]['cement']) + ($DProductionTL[2]['cement']) +
        ($DProductionTL[3]['cement']) + ($DProductionTL[4]['cement']) +
        ($DProductionTL[5]['cement']) + ($DProductionTL[6]['cement']) +
        ($DProductionTL[7]['cement']) + ($DProductionTL[8]['cement']) +
        ($DProductionTL[9]['cement']) + ($DProductionTL[10]['cement']) +
        ($DProductionTL[11]['cement']) + ($DProductionTL[12]['cement']);
$hasil_year_tlcc = ($total_upto_year_tlcc / $total_rkap_year_tlcc) * 100;
//******************************* TLCC Ho Chi Minh *******************************//
$total_rkap_year_mp = $rkap_cementTL[$thn]['tlcc_mp'];
$total_upto_year_mp = (($myDataTL["$thn-01"]['mp']) + ($myDataTL["$thn-02"]['mp']) +
        ($myDataTL["$thn-03"]['mp']) + ($myDataTL["$thn-04"]['mp']) +
        ($myDataTL["$thn-05"]['mp']) + ($myDataTL["$thn-06"]['mp']) +
        ($myDataTL["$thn-07"]['mp']) + ($myDataTL["$thn-08"]['mp']) +
        ($myDataTL["$thn-09"]['mp']) + ($myDataTL["$thn-10"]['mp']) +
        ($myDataTL["$thn-11"]['mp']) + ($myDataTL["$thn-12"]['mp']));
$hasil_year_mp = ($total_upto_year_mp / $total_rkap_year_mp) * 100;
//******************************* TLCC MP *******************************//
$total_rkap_year_hcm = $rkap_cementTL[$thn]['tlcc_hcm'];
$total_upto_year_hcm = (($myDataTL["$thn-01"]['gp']) + ($myDataTL["$thn-02"]['gp']) +
        ($myDataTL["$thn-03"]['gp']) + ($myDataTL["$thn-04"]['gp']) +
        ($myDataTL["$thn-05"]['gp']) + ($myDataTL["$thn-06"]['gp'])) +
        ($myDataTL["$thn-07"]['gp']) + ($myDataTL["$thn-08"]['gp']) +
        ($myDataTL["$thn-09"]['gp']) + (($myDataTL["$thn-10"]['gp']) +
        ($myDataTL["$thn-11"]['gp']) + ($myDataTL["$thn-12"]['gp']));
$hasil_year_hcm = ($total_upto_year_hcm / $total_rkap_year_hcm) * 100;

//=================================================== Semen Gresik Rembang (collapsed)===================================================//
//******************************* Semen Gresik Rembang *******************************//
if (!empty($myDataRB["$thn-01"])) {
    $arr_jan_rb = (array_sum(($myDataRB["$thn-01"])));
} else {
    $arr_jan_rb = 0;
}
if (!empty($myDataRB["$thn-02"])) {
    $arr_feb_rb = (array_sum(($myDataRB["$thn-02"])));
} else {
    $arr_feb_rb = 0;
}
if (!empty($myDataRB["$thn-03"])) {
    $arr_mar_rb = (array_sum(($myDataRB["$thn-03"])));
} else {
    $arr_mar_rb = 0;
}
if (!empty($myDataRB["$thn-04"])) {
    $arr_apr_rb = (array_sum(($myDataRB["$thn-04"])));
} else {
    $arr_apr_rb = 0;
}
if (!empty($myDataRB["$thn-05"])) {
    $arr_may_rb = (array_sum(($myDataRB["$thn-05"])));
} else {
    $arr_may_rb = 0;
}
if (!empty($myDataRB["$thn-06"])) {
    $arr_jun_rb = (array_sum(($myDataRB["$thn-06"])));
} else {
    $arr_jun_rb = 0;
}
if (!empty($myDataRB["$thn-07"])) {
    $arr_jul_rb = (array_sum(($myDataRB["$thn-07"])));
} else {
    $arr_jul_rb = 0;
}
if (!empty($myDataRB["$thn-08"])) {
    $arr_aug_rb = (array_sum(($myDataRB["$thn-08"])));
} else {
    $arr_aug_rb = 0;
}
if (!empty($myDataRB["$thn-09"])) {
    $arr_sep_rb = (array_sum(($myDataRB["$thn-09"])));
} else {
    $arr_sep_rb = 0;
}
if (!empty($myDataRB["$thn-10"])) {
    $arr_okt_rb = (array_sum(($myDataRB["$thn-10"])));
} else {
    $arr_okt_rb = 0;
}
if (!empty($myDataRB["$thn-11"])) {
    $arr_nop_rb = (array_sum(($myDataRB["$thn-11"])));
} else {
    $arr_nop_rb = 0;
}
if (!empty($myDataRB["$thn-12"])) {
    $arr_dec_rb = (array_sum(($myDataRB["$thn-12"])));
} else {
    $arr_dec_rb = 0;
}

$total_upto_year_rb = $arr_jan_rb + $arr_feb_rb + $arr_mar_rb + $arr_apr_rb + $arr_may_rb + $arr_jun_rb + $arr_jul_rb + $arr_aug_rb + $arr_sep_rb + $arr_okt_rb + $arr_nop_rb + $arr_dec_rb;
$total_rkap_year_rb = ($DProductionRB[1]['cement']) + ($DProductionRB[2]['cement']) +
        ($DProductionRB[3]['cement']) + ($DProductionRB[4]['cement']) +
        ($DProductionRB[5]['cement']) + ($DProductionRB[6]['cement']) +
        ($DProductionRB[7]['cement']) + ($DProductionRB[8]['cement']) +
        ($DProductionRB[9]['cement']) + ($DProductionRB[10]['cement']) +
        ($DProductionRB[11]['cement']) + ($DProductionRB[12]['cement']);
$hasil_year_rb = ($total_upto_year_rb / $total_rkap_year_rb) * 100;

//******************************* Rembang FM 1 *******************************//
$total_rkap_year_rb_fm1 = $rkap_cementRB[$thn]['fm1'];
$total_upto_year_rb_fm1 = (($myDataRB["$thn-01"]['fm1']) + ($myDataRB["$thn-02"]['fm1']) +
        ($myDataRB["$thn-03"]['fm1']) + ($myDataRB["$thn-04"]['fm1']) +
        ($myDataRB["$thn-05"]['fm1']) + ($myDataRB["$thn-06"]['fm1']) +
        ($myDataRB["$thn-07"]['fm1']) + ($myDataRB["$thn-08"]['fm1']) +
        ($myDataRB["$thn-09"]['fm1']) + ($myDataRB["$thn-10"]['fm1']) +
        ($myDataRB["$thn-11"]['fm1']) + ($myDataRB["$thn-12"]['fm1']));
$hasil_year_rb_fm1 = ($total_upto_year_rb_fm1 / $total_rkap_year_rb_fm1) * 100;
//******************************* Rembang FM 2 *******************************//
//$total_rkap_year_rb_fm2 = $rkap_cementRB[$thn]['fm2'];
//$total_upto_year_rb_fm2 = (($myDataRB["$thn-01"]['fm2']) + ($myDataRB["$thn-02"]['fm2']) +
//        ($myDataRB["$thn-03"]['fm2']) + ($myDataRB["$thn-04"]['fm2']) +
//        ($myDataRB["$thn-05"]['fm2']) + ($myDataRB["$thn-06"]['fm2'])) +
//        ($myDataRB["$thn-07"]['fm2']) + ($myDataRB["$thn-08"]['fm2']) +
//        ($myDataRB["$thn-09"]['fm2']) + (($myDataRB["$thn-10"]['fm2']) +
//        ($myDataRB["$thn-11"]['fm2']) + ($myDataRB["$thn-12"]['fm2']));
//$hasil_year_rb_fm2 = ($total_upto_year_rb_fm2 / $total_rkap_year_rb_fm2) * 100;

//=============== PERFORMANCE
$num_rkap_perday_smig = $total_rkap_smig_cm / $dateof_year;
$rkap_perday_smig = $num_rkap_perday_smig * $dateup_year;
$performance_smig = ($total_upto_smig_cm / $rkap_perday_smig) * 100;

$num_rkap_perday_sg = $rkap['0']['SEMEN'] / $dateof_year;
$rkap_perday_sg = $num_rkap_perday_sg * $dateup_year;
$performance_sg = ($total_upto_sg_cm / $rkap_perday_sg) * 100;

$num_rkap_perday_sp = $rkap_sp['0']['SEMEN'] / $dateof_year;
$rkap_perday_sp = $num_rkap_perday_sp * $dateup_year;
$performance_sp = ($total_upto_sp_cm / $rkap_perday_sp) * 100;

$num_rkap_perday_st = $rkap_st['0']['SEMEN'] / $dateof_year;
$rkap_perday_st = $num_rkap_perday_sp * $dateup_year;
$performance_st = ($total_upto_st_cm / $rkap_perday_st) * 100;

$num_rkap_perday_tlcc = $rkap_tl['0']['SEMEN'] / $dateof_year;
$rkap_perday_tlcc = $num_rkap_perday_tlcc * $dateup_year;
$performance_tlcc = ($total_upto_tlcc_cm / $rkap_perday_tlcc) * 100;

$num_rkap_perday_ind2 = $total_rkap_year_ind2 / $dateof_year;
$rkap_perday_ind2 = $num_rkap_perday_ind2 * $dateup_year;
$performance_ind2 = ($total_upto_year_ind2 / $rkap_perday_ind2) * 100;

$num_rkap_perday_ind3 = $total_rkap_year_ind3 / $dateof_year;
$rkap_perday_ind3 = $num_rkap_perday_ind3 * $dateup_year;
$performance_ind3 = ($total_upto_year_ind3 / $rkap_perday_ind3) * 100;

$num_rkap_perday_ind4 = $total_rkap_year_ind4 / $dateof_year;
$rkap_perday_ind4 = $num_rkap_perday_ind4 * $dateup_year;
$performance_ind4 = ($total_upto_year_ind4 / $rkap_perday_ind4) * 100;

$num_rkap_perday_ind5 = $total_rkap_year_ind5 / $dateof_year;
$rkap_perday_ind5 = $num_rkap_perday_ind5 * $dateup_year;
$performance_ind5 = ($total_upto_year_ind5 / $rkap_perday_ind5) * 100;

$num_rkap_perday_dmi = $total_rkap_year_dmi / $dateof_year;
$rkap_perday_dmi = $num_rkap_perday_dmi * $dateup_year;
$performance_dmi = ($total_upto_year_dmi / $rkap_perday_dmi) * 100;

$num_rkap_perday_ind6 = $total_rkap_year_ind6 / $dateof_year;
$rkap_perday_ind6 = $num_rkap_perday_ind6 * $dateup_year;
$performance_ind6 = ($total_upto_year_ind6 / $rkap_perday_ind6) * 100;

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

$num_rkap_perday_grs = $total_rkap_year_grs / $dateof_year;
$rkap_perday_grs = $num_rkap_perday_grs * $dateup_year;
$performance_grs = ($total_upto_year_grs / $rkap_perday_grs) * 100;

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

$num_rkap_perday_mp = $total_rkap_year_mp / $dateof_year;
$rkap_perday_mp = $num_rkap_perday_mp * $dateup_year;
$performance_mp = ($total_upto_year_mp / $rkap_perday_mp) * 100;

$num_rkap_perday_hcm = $total_rkap_year_hcm / $dateof_year;
$rkap_perday_hcm = $num_rkap_perday_hcm * $dateup_year;
$performance_hcm = ($total_upto_year_hcm / $rkap_perday_hcm) * 100;
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
        var url = "<?= base_url() ?>index.php/plant_system/production";
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
                <h3 style="text-align: left; padding-left: 12px; margin-top: 10px;">Cement Production</h3>
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
                        <button class="btn btn-default" aria-label="Left Align" id="btn_prod_klin" type="button">
                            Clinker
                        </button>
                        <button class="btn btn-warning " aria-label="Left Align" id="btn_prod_semen" type="button">
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
                            <td><div align="center"><strong>Trend</strong></div></td>
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
										<td style="font-weight: bold;"><div align="right"><?php echo number_format($total_rkap_smig_cm / 1000, 0); ?> K T</div></td>
										<td style="font-weight: bold;">
											<div  align="center" class="style1">
												<div align="right"><?php echo number_format($total_upto_smig_cm / 1000, 0); ?> K T</div>
											</div>
										</td>
										<td style="font-weight: bold;">
											<div align="right">
											<?php
											if ($performance_smig < 100) {
												echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
											} else {
												echo '<img src="media/up-green.png" alt="" width="16px"/> ';
											}
											echo number_format($hasil_year_smig_cm, 2, ",", ".");
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
                                                <td> <div align="right"><?php echo number_format(($rkap_sp['0']['SEMEN']) / 1000, 0); ?> K T</div></td>
                                                <td><div  align="center" class="style1">
                                                        <div align="right"><?php echo number_format(($data_sp['0']['CEMENT']) / 1000, 0); ?> K T</div>
                                                    </div></td>
                                                <td><div align="right"><?php
                                                        if ($performance_sp < 100) {
                                                            echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                        } else {
                                                            echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                        }
                                                        echo $hasil_tot_semensp;
                                                        ?> %</div></td>
                                                <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>SG</td>
                                                <td > <div align="right"><?php echo number_format(($rkap_rb['0']['SEMEN']) / 1000, 0); ?> K T</div></td>
                                                <td ><div align="center" class="style1">
                                                        <div align="right"><?php echo number_format(($data_rb['0']['CEMENT']) / 1000, 0); ?> K T</div>
                                                    </div></td>
                                                <td><div align="right"><?php
                                                        if ($performance_sg < 100) {
                                                            echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                        } else {
                                                            echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                        }
                                                        echo $hasil_tot_semenrb;
                                                        ?> %</div></td>
                                                <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>KSO SG-SI</td>
                                                <td > <div align="right"><?php echo number_format(($rkap['0']['SEMEN']) / 1000, 0); ?> K T</div></td>
                                                <td ><div align="center" class="style1">
                                                        <div align="right"><?php echo number_format(($data['0']['CEMENT']) / 1000, 0); ?> K T</div>
                                                    </div></td>
                                                <td><div align="right"><?php
                                                        if ($performance_sg < 100) {
                                                            echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                        } else {
                                                            echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                        }
                                                        echo $hasil_tot_semensg;
                                                        ?> %</div></td>
                                                <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>ST</td>
                                                <td> <div align="right"><?php echo number_format(($rkap_st['0']['SEMEN']) / 1000, 0); ?> K T</div></td>
                                                <td> <div align="right"><?php echo number_format(($data_st['0']['CEMENT'] ) / 1000, 0); ?> K T</div></td>
                                                <td><div align="right"><?php
                                                        if ($performance_st < 100) {
                                                            echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                        } else {
                                                            echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                        }
                                                        echo $hasil_tot_semenst;
                                                        ?> %</div></td>
                                                <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>TL</td>
                                                <td><div align="right"><?php echo number_format(($rkap_tl['0']['SEMEN']) / 1000, 0); ?> K T</div></td>
                                                <td><div align="right"><?php echo number_format(($data_tl['0']['CEMENT'] ) / 1000, 0); ?> K T</div></td>
                                                <td><div align="right"><?php
                                                        if ($performance_tlcc < 100) {
                                                            echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                        } else {
                                                            echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                        }
                                                        echo $hasil_tot_sementl;
                                                        ?> %</div></td>
                                                <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
                                            </tr>
                                            <tr bgcolor="#F9F9F9">
                                                <td height="23">&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td bgcolor="#F9F9F9">Total</td>
                                                <td bgcolor="#F9F9F9"><div align="right"><?php echo number_format($total_rkap_smig_cm / 1000, 0); ?> K T</div></td>
                                                <td bgcolor="#F9F9F9"><div  align="center" class="style1">
                                                        <div align="right"><?php echo number_format($total_upto_smig_cm / 1000, 0); ?> K T</div>
                                                    </div></td>
                                                <td><div align="right"><?php
                                                        if ($performance_smig < 100) {
                                                            echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                        } else {
                                                            echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                        }
                                                        echo number_format($hasil_year_smig_cm, 2, ",", ".");
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
										<td style="font-weight: bold;"><div align="right"><?php echo number_format($rkap_sp['0']['SEMEN'] / 1000, 0); ?> K T</div></td>
										<td style="font-weight: bold;">
											<div  align="center" class="style1">
												<div align="right"><?php echo number_format($data_sp['0']['CEMENT'] / 1000, 0); ?> K T</div>
											</div>
										</td>
										<td style="font-weight: bold;">
											<div align="right">
											<?php
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
                                                    <div align="right"><?php echo number_format($total_upto_year_ind2 / 1000, 0); ?> K T</div></div></td>
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
                                            <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></td>
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
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>Dumai</td>
                                            <td> <div align="right"><?php echo number_format($total_rkap_year_dmi / 1000, 0); ?> K T</div></td>
                                            <td><div align="center" class="style1">
                                                    <div align="right"><?php echo number_format($total_upto_year_dmi / 1000, 0); ?> K T</div>
                                                </div></td>
                                            <td><div align="right"><?php
                                                    if ($performance_dmi < 100) {
                                                        echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                    } else {
                                                        echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                    }
                                                    echo number_format($hasil_year_dmi, 2, ",", ".");
                                                    ?> %</div></td>
                                            <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></i></div></td>
                                        </tr>
                                        <tr bgcolor="#F9F9F9">
                                            <td>&nbsp;</td>
                                            <td>Total</td>
                                            <td> <div align="right"><?php echo number_format($rkap_sp['0']['SEMEN'] / 1000, 0); ?> K T</div></td>
                                            <td><div align="center" class="style1">
                                                    <div align="right"><?php echo number_format($data_sp['0']['CEMENT'] / 1000, 0); ?> K T</div>
                                                </div></td>
                                            <td><div align="right"><?php
                                                    if ($performance_sp < 100) {
                                                        echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                    } else {
                                                        echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                    }
                                                    echo number_format($hasil_year_sp, 2, ",", ".");
                                                    ?> %</div></td>
                                            <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></i></div></td>
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
										<td style="font-weight: bold;"><div align="right"><?php echo number_format($total_rkap_year_rb / 1000, 0); ?> K T</div></td>
										<td style="font-weight: bold;">
											<div  align="center" class="style1">
												<div align="right"><?php echo number_format($total_upto_year_rb / 1000, 0); ?> K T</div>
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
                                            <td><div align="right"><?php echo number_format($total_rkap_year_rb_fm1 / 1000, 0); ?> K T</div></td>
                                            <td><div  align="center" class="style1">
                                                    <div align="right"><?php echo number_format($total_upto_year_rb_fm1 / 1000, 0); ?> K T</div>
                                                </div></td>
                                            <td><div align="right"><?php
                                                    if ($performance_tbn1 < 100) {
                                                        echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                    } else {
                                                        echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                    }
                                                    echo number_format($hasil_year_rb_fm1, 2, ",", ".");
                                                    ?> %</div></td>
                                            <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></div></td>
                                        </tr>
                                        <tr bgcolor="#F9F9F9">
                                            <td>&nbsp;</td>
                                            <td>Total</td>
                                            <td><div align="right"><?php echo number_format($total_rkap_year_rb / 1000, 0); ?> K T</div></td>
                                            <td><div align="center" class="style1">
                                                    <div align="right"><?php echo number_format($total_upto_year_rb / 1000, 0); ?> K T</div>
                                                </div></td>
                                            <td><div align="right"><?php
                                                    if ($performance_sg < 100) {
                                                        echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                    } else {
                                                        echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                    }
                                                    echo number_format($hasil_year_rb, 2, ",", ".");
                                                    ?> %</div></td>
                                            <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></i></div></td>
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
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>Gresik</td>
                                            <td><div align="right"><?php echo number_format($total_rkap_year_grs / 1000, 0); ?> K T</div></td>
                                            <td><div align="center" class="style1">
                                                    <div align="right"><?php echo number_format($total_upto_year_grs / 1000, 0); ?> K T</div>
                                                </div></td>
                                            <td><div align="right"><?php
                                                    if ($performance_grs < 100) {
                                                        echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                    } else {
                                                        echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                    }
                                                    echo number_format($hasil_year_grs, 2, ",", ".");
                                                    ?> %</div></td>
                                            <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></i></div></td>
                                        </tr>
                                        <tr bgcolor="#F9F9F9">
                                            <td>&nbsp;</td>
                                            <td>Total</td>
                                            <td><div align="right"><?php echo number_format($total_rkap_year_sg / 1000, 0); ?> K T</div></td>
                                            <td><div align="center" class="style1">
                                                    <div align="right"><?php echo number_format($total_upto_year_sg / 1000, 0); ?> K T</div>
                                                </div></td>
                                            <td><div align="right"><?php
                                                    if ($performance_sg < 100) {
                                                        echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                    } else {
                                                        echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                    }
                                                    echo number_format($hasil_year_sg, 2, ",", ".");
                                                    ?> %</div></td>
                                            <td><div align="right"><!--img src="media/up-green.png" width="16px" /--></i></div></td>
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
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>HCM</td>
                                            <td><div align="right"><?php echo number_format($total_rkap_year_hcm / 1000, 0); ?> K T</div></td>
                                            <td><div align="center" class="style1">
                                                    <div align="right"><?php echo number_format($total_upto_year_hcm / 1000, 0); ?> K T</div>
                                                </div></td>
                                            <td><div align="right"><?php
                                                    if ($performance_hcm < 100) {
                                                        echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                    } else {
                                                        echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                    }
                                                    echo number_format($hasil_year_hcm, 2, ",", ".");
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
        <a id='example' class="pop" rel='popover' data-placement='right' data-content='Click on Month Name at the chart for Report Detail. Like Jan, Feb, Mar,..' data-original-title='Executive Report'></a>
        <div class="img-thumbnail">
            <div><h3 style="text-align: center; margin-top: 4px;">SMIG Group Annual Production</h3></div>
            <div><h4 style="text-align: center; margin-bottom: 2px;">Cement Production</h4></div>
            <div id="container" style="min-height: 330px;margin: 0 auto" align="right">
                <script>
                    var on_year_this = <?php echo $tahun; ?>;
                    var baseurl = '<?php echo base_url(); ?>';
					<?php if($opco=="SPCement"){?>
						var uriSMIG = baseurl + 'index.php/plant_chart/chart_semen_padang?input[tahun]=' + on_year_this;
					<?php }elseif($opco=="SGCement"){?>
						var uriSMIG = baseurl + 'index.php/plant_chart/chart_semen_gresik?input[tahun]=' + on_year_this;
					<?php }elseif($opco=="SGRCement"){?>
						var uriSMIG = baseurl + 'index.php/plant_chart/chart_semen_rembang?input[tahun]=' + on_year_this;
					<?php }elseif($opco=="STCement"){?>
						var uriSMIG = baseurl + 'index.php/plant_chart/chart_semen_tonasa?input[tahun]=' + on_year_this;
					<?php }elseif($opco=="TLCCCement"){?>
						var uriSMIG = baseurl + 'index.php/plant_chart/chart_semen_tlcc?input[tahun]=' + on_year_this;
					<?php }else{?>
						var uriSMIG = baseurl + 'index.php/plant_chart/chart_semen_group?input[tahun]=' + on_year_this;
					<?php }?>
                    $("#LoadChart").load(uriSMIG);
                </script>
            </div>            
            <div class="box-header with-border">
                <i class="fa fa-pie-chart" aria-hidden="true"></i>
                <h4 class="box-title">Quarterly Graph</h4>
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-border" style="position: relative;">
                <div class="row" style="color:#000">
                    <div class="col-xs-6 col-md-3 noPadding">
                        <div class="col-xs-6 col-md-3 noPadding" align="right" style="font-style: italic; font-weight: bold;">Q1</div>
                        <div id="quartal1" style="  min-height: 166px; margin: 0 auto" align="right"></div>
                        <div class="panel panel-body noPadding" align="center" style=" margin-bottom: 0px;">
                            <div class="realval">RKAP : <b><?php echo number_format($total_rkap_q1, 0, ",", "."); ?></b></div>
                            <div style="font-size: 16px; font-style: italic">Real : <b><?php echo number_format($total_upto_q1, 0, ",", "."); ?></b></div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 noPadding">
                        <div class="col-xs-6 col-md-3 noPadding" align="right" style="font-style: italic; font-weight: bold;">Q2</div>
                        <div id="quartal2" style="  min-height: 166px; margin: 0 auto" align="right"></div>
                        <div class="panel panel-body noPadding" align="center" style=" margin-bottom: 0px;">
                            <div class="realval">RKAP : <b><?php echo number_format($total_rkap_q2, 0, ",", "."); ?></b></div>
                            <div style="font-size: 16px; font-style: italic">Real : <b><?php echo number_format($total_upto_q2, 0, ",", "."); ?></b></div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 noPadding">
                        <div class="col-xs-6 col-md-3 noPadding" align="right" style="font-style: italic; font-weight: bold;">Q3</div>
                        <div id="quartal3" style="  min-height: 167px; margin: 0 auto" align="right"></div>
                        <div class="panel panel-body noPadding" align="center" style=" margin-bottom: 0px;">
                            <div class="realval">RKAP : <b><?php echo number_format($total_rkap_q3, 0, ",", "."); ?></b></div>
                            <div style="font-size: 16px; font-style: italic">Real : <b><?php echo number_format($total_upto_q3, 0, ",", "."); ?></b></div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 noPadding">
                        <div class="col-xs-6 col-md-3 noPadding" align="right" style="font-style: italic; font-weight: bold;">Q4</div>
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
    var uriSMIG = baseurl + 'index.php/plant_chart/chart_semen_group';
    var uriPD = baseurl + 'index.php/plant_chart/chart_semen_padang';
    var uriGR = baseurl + 'index.php/plant_chart/chart_semen_gresik';
    var uriRB = baseurl + 'index.php/plant_chart/chart_semen_rembang';
    var uriTN = baseurl + 'index.php/plant_chart/chart_semen_tonasa';
    var uriTL = baseurl + 'index.php/plant_chart/chart_semen_tlcc';

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
