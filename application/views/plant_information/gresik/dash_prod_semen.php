<?php
//===================================================Untuk Quartal dan bulanan===================================================//
$thn = date('Y');

$jml_jan = ($datacm_sg["$thn-01"]['sg']) + ($datacm_sp["$thn-01"]['sp']) + ($datacm_st["$thn-01"]['st']) + ($datacm_tlcc["$thn-01"]['tlcc']);
$jml_feb = ($datacm_sg["$thn-02"]['sg']) + ($datacm_sp["$thn-02"]['sp']) + ($datacm_st["$thn-02"]['st']) + ($datacm_tlcc["$thn-02"]['tlcc']);
$jml_mar = ($datacm_sg["$thn-03"]['sg']) + ($datacm_sp["$thn-03"]['sp']) + ($datacm_st["$thn-03"]['st']) + ($datacm_tlcc["$thn-03"]['tlcc']);

$total_upto_q1 = $jml_jan + $jml_feb + $jml_mar;

$total_rkap_q1 = ($rkap_cm[1]['cement']) + ($rkap_cm[2]['cement']) + ($rkap_cm[3]['cement']);

$total_q1 = ($total_upto_q1 / $total_rkap_q1) * 100;

$jml_apr = ($datacm_sg["$thn-04"]['sg']) + ($datacm_sp["$thn-04"]['sp']) + ($datacm_st["$thn-04"]['st']) + ($datacm_tlcc["$thn-04"]['tlcc']);
$jml_may = ($datacm_sg["$thn-05"]['sg']) + ($datacm_sp["$thn-05"]['sp']) + ($datacm_st["$thn-05"]['st']) + ($datacm_tlcc["$thn-05"]['tlcc']);
$jml_jun = ($datacm_sg["$thn-06"]['sg']) + ($datacm_sp["$thn-06"]['sp']) + ($datacm_st["$thn-06"]['st']) + ($datacm_tlcc["$thn-06"]['tlcc']);

$total_upto_q2 = $jml_apr + $jml_may + $jml_jun;

$total_rkap_q2 = ($rkap_cm[4]['cement']) + ($rkap_cm[5]['cement']) + ($rkap_cm[6]['cement']);

$total_q2 = ($total_upto_q2 / $total_rkap_q2) * 100;

$jml_jul = ($datacm_sg["$thn-07"]['sg']) + ($datacm_sp["$thn-07"]['sp']) + ($datacm_st["$thn-07"]['st']) + ($datacm_tlcc["$thn-07"]['tlcc']);
$jml_aug = ($datacm_sg["$thn-08"]['sg']) + ($datacm_sp["$thn-08"]['sp']) + ($datacm_st["$thn-08"]['st']) + ($datacm_tlcc["$thn-08"]['tlcc']);
$jml_sep = ($datacm_sg["$thn-09"]['sg']) + ($datacm_sp["$thn-09"]['sp']) + ($datacm_st["$thn-09"]['st']) + ($datacm_tlcc["$thn-09"]['tlcc']);

$total_upto_q3 = $jml_jul + $jml_aug + $jml_sep;

$total_rkap_q3 = ($rkap_cm[7]['cement']) + ($rkap_cm[8]['cement']) + ($rkap_cm[9]['cement']);

$total_q3 = ($total_upto_q3 / $total_rkap_q3) * 100;
//===================================================Untuk menu samping kiri (collapsed)===================================================//
// Semen Indonesia Group [CEMENT]
$total_upto_sg_cm = ($datacm_sg["2016-01"]['sg']) + ($datacm_sg["2016-02"]['sg']) +
        ($datacm_sg["2016-03"]['sg']) + ($datacm_sg["2016-04"]['sg']) +
        ($datacm_sg["2016-05"]['sg']) + ($datacm_sg["2016-06"]['sg']) +
        ($datacm_sg["2016-07"]['sg']) + ($datacm_sg["2016-08"]['sg']) + ($datacm_sg["2016-09"]['sg']); // +  ($datacm_sg["2016-10"]['sg']) + ($datacm_sg["2016-11"]['sg']) + ($datacm_sg["2016-12"]['sg']);
$total_upto_sp_cm = ($datacm_sp["2016-01"]['sp']) + ($datacm_sp["2016-02"]['sp']) +
        ($datacm_sp["2016-03"]['sp']) + ($datacm_sp["2016-04"]['sp']) +
        ($datacm_sp["2016-05"]['sp']) + ($datacm_sp["2016-06"]['sp']) +
        ($datacm_sp["2016-07"]['sp']) + ($datacm_sp["2016-08"]['sp']) + ($datacm_sp["2016-09"]['sp']); // + ($datacm_sp["2016-10"]['sp']) + ($datacm_sp["2016-11"]['sp']) + ($datacm_sp["2016-12"]['sp']);
$total_upto_st_cm = ($datacm_st["2016-01"]['st']) + ($datacm_st["2016-02"]['st']) +
        ($datacm_st["2016-03"]['st']) + ($datacm_st["2016-04"]['st']) +
        ($datacm_st["2016-05"]['st']) + ($datacm_st["2016-06"]['st']) +
        ($datacm_st["2016-07"]['st']) + ($datacm_st["2016-08"]['st']) + ($datacm_st["2016-09"]['st']); // + ($datacm_st["2016-10"]['st']) + ($datacm_st["2016-11"]['st']) + ($datacm_st["2016-12"]['st']);
$total_upto_tlcc_cm = ($datacm_tlcc["2016-01"]['tlcc']) + ($datacm_tlcc["2016-02"]['tlcc']) +
        ($datacm_tlcc["2016-03"]['tlcc']) + ($datacm_tlcc["2016-04"]['tlcc']) +
        ($datacm_tlcc["2016-05"]['tlcc']) + ($datacm_tlcc["2016-06"]['tlcc']) +
        ($datacm_tlcc["2016-07"]['tlcc']) + ($datacm_tlcc["2016-08"]['tlcc']) + ($datacm_tlcc["2016-09"]['tlcc']); // + ($datacm_tlcc["2016-10"]['tlcc']) + ($datacm_tlcc["2016-11"]['tlcc']) + ($datacm_tlcc["2016-12"]['tlcc']);

$total_upto_smig_cm = $total_upto_sg_cm + $total_upto_sp_cm + $total_upto_st_cm + $total_upto_tlcc_cm;

$total_rkap_smig_cm = ($rkap_cm[1]['cement']) + ($rkap_cm[2]['cement']) +
        ($rkap_cm[3]['cement']) + ($rkap_cm[4]['cement']) +
        ($rkap_cm[5]['cement']) + ($rkap_cm[6]['cement']) +
        ($rkap_cm[7]['cement']) + ($rkap_cm[8]['cement']) +
        ($rkap_cm[9]['cement']) + ($rkap_cm[10]['cement']) +
        ($rkap_cm[11]['cement']) + ($rkap_cm[12]['cement']);

$hasil_year_smig_cm = ($total_upto_smig_cm / $total_rkap_smig_cm) * 100;
// Semen Indonesia Group [CLINKER]
$total_upto_sg_cl = ($datacl_sg["2016-01"]['sg']) + ($datacl_sg["2016-02"]['sg']) +
        ($datacl_sg["2016-03"]['sg']) + ($datacl_sg["2016-04"]['sg']) +
        ($datacl_sg["2016-05"]['sg']) + ($datacl_sg["2016-06"]['sg']) +
        ($datacl_sg["2016-07"]['sg']) + ($datacl_sg["2016-08"]['sg']) + ($datacl_sg["2016-09"]['sg']); // +  ($datacl_sg["2016-10"]['sg']) + ($datacl_sg["2016-11"]['sg']) + ($datacl_sg["2016-12"]['sg']);
$total_upto_sp_cl = ($datacl_sp["2016-01"]['sp']) + ($datacl_sp["2016-02"]['sp']) +
        ($datacl_sp["2016-03"]['sp']) + ($datacl_sp["2016-04"]['sp']) +
        ($datacl_sp["2016-05"]['sp']) + ($datacl_sp["2016-06"]['sp']) +
        ($datacl_sp["2016-07"]['sp']) + ($datacl_sp["2016-08"]['sp']) + ($datacl_sp["2016-09"]['sp']); // + ($datacl_sp["2016-10"]['sp']) + ($datacl_sp["2016-11"]['sp']) + ($datacl_sp["2016-12"]['sp']);
$total_upto_st_cl = ($datacl_st["2016-01"]['st']) + ($datacl_st["2016-02"]['st']) +
        ($datacl_st["2016-03"]['st']) + ($datacl_st["2016-04"]['st']) +
        ($datacl_st["2016-05"]['st']) + ($datacl_st["2016-06"]['st']) +
        ($datacl_st["2016-07"]['st']) + ($datacl_st["2016-08"]['st']) + ($datacl_st["2016-09"]['st']); // + ($datacl_st["2016-10"]['st']) + ($datacl_st["2016-11"]['st']) + ($datacl_st["2016-12"]['st']);
$total_upto_tlcc_cl = ($datacl_tlcc["2016-01"]['tlcc']) + ($datacl_tlcc["2016-02"]['tlcc']) +
        ($datacl_tlcc["2016-03"]['tlcc']) + ($datacl_tlcc["2016-04"]['tlcc']) +
        ($datacl_tlcc["2016-05"]['tlcc']) + ($datacl_tlcc["2016-06"]['tlcc']) +
        ($datacl_tlcc["2016-07"]['tlcc']) + ($datacl_tlcc["2016-08"]['tlcc']) + ($datacl_tlcc["2016-09"]['tlcc']); // + ($datacl_tlcc["2016-10"]['tlcc']) + ($datacl_tlcc["2016-11"]['tlcc']) + ($datacl_tlcc["2016-12"]['tlcc']);

$total_upto_smig_cl = $total_upto_sg_cl + $total_upto_sp_cl + $total_upto_st_cl + $total_upto_tlcc_cl;

$total_rkap_smig_cl = ($rkap_cl[1]['clinker']) + ($rkap_cl[2]['clinker']) +
        ($rkap_cl[3]['clinker']) + ($rkap_cl[4]['clinker']) +
        ($rkap_cl[5]['clinker']) + ($rkap_cl[6]['clinker']) +
        ($rkap_cl[7]['clinker']) + ($rkap_cl[8]['clinker']) +
        ($rkap_cl[9]['clinker']) + ($rkap_cl[10]['clinker']) +
        ($rkap_cl[11]['clinker']) + ($rkap_cl[12]['clinker']);

$hasil_year_smig_cl = ($total_upto_smig_cl / $total_rkap_smig_cl) * 100;

// Semen Padang [CEMENT]
$hasil_tot_semensp = number_format((($data_sp['0']['cement'] / $rkap_sp['0']['semen']) * 100), 2, ",", ".");
// Semen Padang [CLINKER]
$hasil_tot_klinsp = number_format((($data_sp['0']['clinker'] / $rkap_sp['0']['klinker'] ) * 100), 2, ",", ".");
// Semen Gresik [CEMENT]
$hasil_tot_semensg = number_format((($data['finishmill'] / $rkap['0']['semen']) * 100), 2, ",", ".");
// Semen Gresik [CLINKER]
$hasil_tot_klinsg = number_format((($data['kiln'] / $rkap['0']['klinker']) * 100), 2, ",", ".");
// Semen Tonasa [CEMENT]
$hasil_tot_semenst = number_format((($data_st['0']['cement'] / $rkap_st['0']['semen']) * 100), 2, ",", ".");
// Semen Tonasa [CLINKER]
$hasil_tot_klinst = number_format((( $data_st['0']['clinker'] / $rkap_st['0']['klinker']) * 100), 2, ",", ".");
// Semen TLCC [CEMENT]
$hasil_tot_sementl = number_format((($data_tl['0']['cement'] / $rkap_tl['0']['semen']) * 100), 2, ",", ".");
// Semen TLCC [CLINKER]
$hasil_tot_klintl = number_format((( $data_tl['0']['clinker'] / $rkap_tl['0']['klinker']) * 100), 2, ",", ".");

//=================================================== Semen Padang (collapsed)===================================================//
//******************************* Indarung II *******************************//
$total_rkap_year_ind2 = $rkap_cementPD[$thn]['indarung2'];
$total_upto_year_ind2 = (($myDataPD["$thn-01"]['indarung2']) + ($myDataPD["$thn-02"]['indarung2']) + ($myDataPD["$thn-03"]['indarung2'])) + (($myDataPD["$thn-04"]['indarung2']) + ($myDataPD["$thn-05"]['indarung2']) + ($myDataPD["$thn-06"]['indarung2'])) + (($myDataPD["$thn-07"]['indarung2']) + ($myDataPD["$thn-08"]['indarung2']) + ($myDataPD["$thn-09"]['indarung2'])); //+ (($myDataPD["$thn-10"]['indarung2']) + ($myDataPD["$thn-11"]['indarung2'])) + ($myDataPD["$thn-12"]['indarung2']));
$hasil_year_ind2 = ($total_upto_year_ind2 / $total_rkap_year_ind2) * 100;
//******************************* Indarung III *******************************//
$total_rkap_year_ind3 = $rkap_cementPD[$thn]['indarung3'];
$total_upto_year_ind3 = (($myDataPD["$thn-01"]['indarung3']) + ($myDataPD["$thn-02"]['indarung3']) + ($myDataPD["$thn-03"]['indarung3'])) + (($myDataPD["$thn-04"]['indarung3']) + ($myDataPD["$thn-05"]['indarung3']) + ($myDataPD["$thn-06"]['indarung3'])) + (($myDataPD["$thn-07"]['indarung3']) + ($myDataPD["$thn-08"]['indarung3']) + ($myDataPD["$thn-09"]['indarung3'])); //+ (($myDataPD["$thn-10"]['indarung3']) + ($myDataPD["$thn-11"]['indarung3'])) + ($myDataPD["$thn-12"]['indarung3']));
$hasil_year_ind3 = ($total_upto_year_ind3 / $total_rkap_year_ind3) * 100;
//******************************* Indarung IV *******************************//
$total_rkap_year_ind4 = $rkap_cementPD[$thn]['indarung4'];
$total_upto_year_ind4 = (($myDataPD["$thn-01"]['indarung4']) + ($myDataPD["$thn-02"]['indarung4']) + ($myDataPD["$thn-03"]['indarung4'])) + (($myDataPD["$thn-04"]['indarung4']) + ($myDataPD["$thn-05"]['indarung4']) + ($myDataPD["$thn-06"]['indarung4'])) + (($myDataPD["$thn-07"]['indarung4']) + ($myDataPD["$thn-08"]['indarung4']) + ($myDataPD["$thn-09"]['indarung4'])); //+ (($myDataPD["$thn-10"]['indarung4']) + ($myDataPD["$thn-11"]['indarung4'])) + ($myDataPD["$thn-12"]['indarung4']));
$hasil_year_ind4 = ($total_upto_year_ind4 / $total_rkap_year_ind4) * 100;
//******************************* Indarung V *******************************//
$total_rkap_year_ind5 = $rkap_cementPD[$thn]['indarung5'];
$total_upto_year_ind5 = (($myDataPD["$thn-01"]['indarung5']) + ($myDataPD["$thn-02"]['indarung5']) + ($myDataPD["$thn-03"]['indarung5'])) + (($myDataPD["$thn-04"]['indarung5']) + ($myDataPD["$thn-05"]['indarung5']) + ($myDataPD["$thn-06"]['indarung5'])) + (($myDataPD["$thn-07"]['indarung5']) + ($myDataPD["$thn-08"]['indarung5']) + ($myDataPD["$thn-09"]['indarung5'])); //+ (($myDataPD["$thn-10"]['indarung4']) + ($myDataPD["$thn-11"]['indarung4'])) + ($myDataPD["$thn-12"]['indarung4']));
$hasil_year_ind5 = ($total_upto_year_ind5 / $total_rkap_year_ind5) * 100;
//******************************* Dumai *******************************//
$total_rkap_year_dmi = $rkap_cementPD[$thn]['dumai'];
$total_upto_year_dmi = (($myDataPD["$thn-01"]['dumai']) + ($myDataPD["$thn-02"]['dumai']) + ($myDataPD["$thn-03"]['dumai'])) + (($myDataPD["$thn-04"]['dumai']) + ($myDataPD["$thn-05"]['dumai']) + ($myDataPD["$thn-06"]['dumai'])) + (($myDataPD["$thn-07"]['dumai']) + ($myDataPD["$thn-08"]['dumai']) + ($myDataPD["$thn-09"]['dumai'])); //+ (($myDataPD["$thn-10"]['indarung4']) + ($myDataPD["$thn-11"]['indarung4'])) + ($myDataPD["$thn-12"]['indarung4']));
$hasil_year_dmi = ($total_upto_year_dmi / $total_rkap_year_dmi) * 100;

//=================================================== Semen Gresik (collapsed)===================================================//
//******************************* Semen Gresik *******************************//
$total_upto_year_sg = (array_sum(($myData["$thn-01"]))) + (array_sum(($myData["$thn-02"]))) + (array_sum(($myData["$thn-03"]))) 
        + (array_sum(($myData["$thn-04"]))) + (array_sum(($myData["$thn-05"]))) + (array_sum(($myData["$thn-06"]))) 
        + (array_sum(($myData["$thn-07"]))) + (array_sum(($myData["$thn-08"]))) + (array_sum(($myData["$thn-09"])));
$total_rkap_year_sg = ($DProduction[1]['cement']) + ($DProduction[2]['cement']) + ($DProduction[3]['cement']) + ($DProduction[4]['cement']) + ($DProduction[5]['cement']) + ($DProduction[6]['cement']) + ($DProduction[7]['cement']) + ($DProduction[8]['cement']) + ($DProduction[9]['cement']) + ($DProduction[10]['cement']) + ($DProduction[11]['cement']) + ($DProduction[12]['cement']);
$hasil_year_sg = ($total_upto_year_sg / $total_rkap_year_sg) * 100;
//******************************* Tuban I *******************************//
$total_rkap_year_tb1 = $rkap_cement[$thn]['tuban1'];
$total_upto_year_tb1 = (($myData["$thn-01"]['tuban1']) + ($myData["$thn-02"]['tuban1']) + ($myData["$thn-03"]['tuban1'])) 
        + (($myData["$thn-04"]['tuban1']) + ($myData["$thn-05"]['tuban1']) + ($myData["$thn-06"]['tuban1'])) 
        + (($myData["$thn-07"]['tuban1']) + ($myData["$thn-08"]['tuban1']) + ($myData["$thn-09"]['tuban1'])); //+ (($myData["$thn-10"]['tuban1']) + ($myData["$thn-11"]['tuban1'])) + ($myData["$thn-12"]['tuban1']));
$hasil_year_tb1 = ($total_upto_year_tb1 / $total_rkap_year_tb1) * 100;
//******************************* Tuban II *******************************//
$total_rkap_year_tb2 = $rkap_cement[$thn]['tuban2'];
$total_upto_year_tb2 = (($myData["$thn-01"]['tuban2']) + ($myData["$thn-02"]['tuban2']) + ($myData["$thn-03"]['tuban2'])) 
        + (($myData["$thn-04"]['tuban2']) + ($myData["$thn-05"]['tuban2']) + ($myData["$thn-06"]['tuban2'])) 
        + (($myData["$thn-07"]['tuban2']) + ($myData["$thn-08"]['tuban2']) + ($myData["$thn-09"]['tuban2'])); //+ (($myData["$thn-10"]['tuban2']) + ($myData["$thn-11"]['tuban2'])) + ($myData["$thn-12"]['tuban2']));
$hasil_year_tb2 = ($total_upto_year_tb2 / $total_rkap_year_tb2) * 100;
//******************************* Tuban III *******************************//
$total_rkap_year_tb3 = $rkap_cement[$thn]['tuban3'];
$total_upto_year_tb3 = (($myData["$thn-01"]['tuban3']) + ($myData["$thn-02"]['tuban3']) + ($myData["$thn-03"]['tuban3'])) + (($myData["$thn-04"]['tuban3']) + ($myData["$thn-05"]['tuban3']) + ($myData["$thn-06"]['tuban3'])) + (($myData["$thn-07"]['tuban3']) + ($myData["$thn-08"]['tuban3']) + ($myData["$thn-09"]['tuban3'])); //+ (($myData["$thn-10"]['tuban3']) + ($myData["$thn-11"]['tuban3'])) + ($myData["$thn-12"]['tuban3']));
$hasil_year_tb3 = ($total_upto_year_tb3 / $total_rkap_year_tb3) * 100;
//******************************* Tuban IV *******************************//
$total_rkap_year_tb4 = $rkap_cement[$thn]['tuban4'];
$total_upto_year_tb4 = (($myData["$thn-01"]['tuban4']) + ($myData["$thn-02"]['tuban4']) + ($myData["$thn-03"]['tuban4'])) + (($myData["$thn-04"]['tuban4']) + ($myData["$thn-05"]['tuban4']) + ($myData["$thn-06"]['tuban4'])) + (($myData["$thn-07"]['tuban4']) + ($myData["$thn-08"]['tuban4']) + ($myData["$thn-09"]['tuban4'])); //+ (($myData["$thn-10"]['tuban4']) + ($myData["$thn-11"]['tuban4'])) + ($myData["$thn-12"]['tuban4']));
$hasil_year_tb4 = ($total_upto_year_tb4 / $total_rkap_year_tb4) * 100;
//******************************* Gresik *******************************//
$total_rkap_year_grs = $rkap_cement[$thn]['gresik'];
$total_upto_year_grs = (($myData["$thn-01"]['gresik']) + ($myData["$thn-02"]['gresik']) + ($myData["$thn-03"]['gresik'])) + (($myData["$thn-04"]['gresik']) + ($myData["$thn-05"]['gresik']) + ($myData["$thn-06"]['gresik'])) + (($myData["$thn-07"]['gresik']) + ($myData["$thn-08"]['gresik']) + ($myData["$thn-09"]['gresik'])); //+ (($myData["$thn-10"]['tuban3']) + ($myData["$thn-11"]['tuban3'])) + ($myData["$thn-12"]['tuban3']));
$hasil_year_grs = ($total_upto_year_grs / $total_rkap_year_grs) * 100;

//=================================================== Semen Tonasa (collapsed)===================================================//
//******************************* Semen Tonasa *******************************//
$total_upto_year_tns = (array_sum(($myDataTN["$thn-01"]))) + (array_sum(($myDataTN["$thn-02"]))) + (array_sum(($myDataTN["$thn-03"]))) 
        + (array_sum(($myDataTN["$thn-04"]))) + (array_sum(($myDataTN["$thn-05"]))) + (array_sum(($myDataTN["$thn-06"]))) 
        + (array_sum(($myDataTN["$thn-07"]))) + (array_sum(($myDataTN["$thn-08"]))) + (array_sum(($myDataTN["$thn-09"])));
$total_rkap_year_tns = ($DProductionTN[1]['cement']) + ($DProductionTN[2]['cement']) + ($DProductionTN[3]['cement']) + ($DProductionTN[4]['cement']) + ($DProductionTN[5]['cement']) + ($DProductionTN[6]['cement']) + ($DProductionTN[7]['cement']) + ($DProductionTN[8]['cement']) + ($DProductionTN[9]['cement']) + ($DProductionTN[10]['cement']) + ($DProductionTN[11]['cement']) + ($DProductionTN[12]['cement']);
$hasil_year_tns = ($total_upto_year_tns / $total_rkap_year_tns) * 100;
//******************************* Tonasa II *******************************//
$total_rkap_year_tns2 = $rkap_cementTN[$thn]['tonasa2'];
$total_upto_year_tns2 = (($myDataTN["$thn-01"]['tonasa2']) + ($myDataTN["$thn-02"]['tonasa2']) + ($myDataTN["$thn-03"]['tonasa2'])) 
        + (($myDataTN["$thn-04"]['tonasa2']) + ($myDataTN["$thn-05"]['tonasa2']) + ($myDataTN["$thn-06"]['tonasa2'])) 
        + (($myDataTN["$thn-07"]['tonasa2']) + ($myDataTN["$thn-08"]['tonasa2']) + ($myDataTN["$thn-09"]['tonasa2'])); //+ (($myDataTN["$thn-10"]['tonasa2']) + ($myDataTN["$thn-11"]['tonasa2'])) + ($myDataTN["$thn-12"]['tonasa2']));
$hasil_year_tns2 = ($total_upto_year_tns2 / $total_rkap_year_tns2) * 100;
//******************************* Tonasa III *******************************//
$total_rkap_year_tns3 = $rkap_cementTN[$thn]['tonasa3'];
$total_upto_year_tns3 = (($myDataTN["$thn-01"]['tonasa3']) + ($myDataTN["$thn-02"]['tonasa3']) + ($myDataTN["$thn-03"]['tonasa3'])) 
        + (($myDataTN["$thn-04"]['tonasa3']) + ($myDataTN["$thn-05"]['tonasa3']) + ($myDataTN["$thn-06"]['tonasa3'])) 
        + (($myDataTN["$thn-07"]['tonasa3']) + ($myDataTN["$thn-08"]['tonasa3']) + ($myDataTN["$thn-09"]['tonasa3'])); //+ (($myDataTN["$thn-10"]['tonasa3']) + ($myDataTN["$thn-11"]['tonasa3'])) + ($myDataTN["$thn-12"]['tonasa3']));
$hasil_year_tns3 = ($total_upto_year_tns3 / $total_rkap_year_tns3) * 100;
//******************************* Tonasa IV *******************************//
$total_rkap_year_tns4 = $rkap_cementTN[$thn]['tonasa4'];
$total_upto_year_tns4 = (($myDataTN["$thn-01"]['tonasa4']) + ($myDataTN["$thn-02"]['tonasa4']) + ($myDataTN["$thn-03"]['tonasa4'])) 
        + (($myDataTN["$thn-04"]['tonasa4']) + ($myDataTN["$thn-05"]['tonasa4']) + ($myDataTN["$thn-06"]['tonasa4'])) 
        + (($myDataTN["$thn-07"]['tonasa4']) + ($myDataTN["$thn-08"]['tonasa4']) + ($myDataTN["$thn-09"]['tonasa4'])); //+ (($myDataTN["$thn-10"]['tonasa4']) + ($myDataTN["$thn-11"]['tonasa4'])) + ($myDataTN["$thn-12"]['tonasa4']));
$hasil_year_tns4 = ($total_upto_year_tns4 / $total_rkap_year_tns4) * 100;
//******************************* Tonasa V *******************************//
$total_rkap_year_tns5 = $rkap_cementTN[$thn]['tonasa5'];
$total_upto_year_tns5 = (($myDataTN["$thn-01"]['tonasa5']) + ($myDataTN["$thn-02"]['tonasa5']) + ($myDataTN["$thn-03"]['tonasa5'])) 
        + (($myDataTN["$thn-04"]['tonasa5']) + ($myDataTN["$thn-05"]['tonasa5']) + ($myDataTN["$thn-06"]['tonasa5'])) 
        + (($myDataTN["$thn-07"]['tonasa5']) + ($myDataTN["$thn-08"]['tonasa5']) + ($myDataTN["$thn-09"]['tonasa5'])); //+ (($myDataTN["$thn-10"]['tonasa4']) + ($myDataTN["$thn-11"]['tonasa4'])) + ($myDataTN["$thn-12"]['tonasa4']));
$hasil_year_tns5 = ($total_upto_year_tns5 / $total_rkap_year_tns5) * 100;

//=================================================== Semen TLCC (collapsed)===================================================//
//******************************* Semen TLCC *******************************//
$total_upto_year_tlcc = (array_sum(($myDataTL["$thn-01"]))) + (array_sum(($myDataTL["$thn-02"]))) + (array_sum(($myDataTL["$thn-03"]))) 
        + (array_sum(($myDataTL["$thn-04"]))) + (array_sum(($myDataTL["$thn-05"]))) + (array_sum(($myDataTL["$thn-06"]))) 
        + (array_sum(($myDataTL["$thn-07"]))) + (array_sum(($myDataTL["$thn-08"]))) + (array_sum(($myDataTL["$thn-09"])));
$total_rkap_year_tlcc = ($DProductionTL[1]['cement']) + ($DProductionTL[2]['cement']) + ($DProductionTL[3]['cement']) + ($DProductionTL[4]['cement']) + ($DProductionTL[5]['cement']) + ($DProductionTL[6]['cement']) + ($DProductionTL[7]['cement']) + ($DProductionTL[8]['cement']) + ($DProductionTL[9]['cement']) + ($DProductionTL[10]['cement']) + ($DProductionTL[11]['cement']) + ($DProductionTL[12]['cement']);
$hasil_year_tlcc = ($total_upto_year_tlcc / $total_rkap_year_tlcc) * 100;
//******************************* TLCC Ho Chi Minh *******************************//
$total_rkap_year_mp = $rkap_cementTL[$thn]['tlcc_mp'];
$total_upto_year_mp = (($myDataTL["$thn-01"]['mp']) + ($myDataTL["$thn-02"]['mp']) + ($myDataTL["$thn-03"]['mp'])) 
        + (($myDataTL["$thn-04"]['mp']) + ($myDataTL["$thn-05"]['mp']) + ($myDataTL["$thn-06"]['mp'])) 
        + (($myDataTL["$thn-07"]['mp']) + ($myDataTL["$thn-08"]['mp']) + ($myDataTL["$thn-09"]['mp'])); //+ (($myDataTL["$thn-10"]['mp']) + ($myDataTL["$thn-11"]['mp'])) + ($myDataTL["$thn-12"]['mp']));
$hasil_year_mp = ($total_upto_year_mp / $total_rkap_year_mp) * 100;
//******************************* TLCC MP *******************************//
$total_rkap_year_hcm = $rkap_cementTL[$thn]['tlcc_hcm'];
$total_upto_year_hcm = (($myDataTL["$thn-01"]['gp']) + ($myDataTL["$thn-02"]['gp']) + ($myDataTL["$thn-03"]['gp'])) 
        + (($myDataTL["$thn-04"]['gp']) + ($myDataTL["$thn-05"]['gp']) + ($myDataTL["$thn-06"]['gp'])) 
        + (($myDataTL["$thn-07"]['gp']) + ($myDataTL["$thn-08"]['gp']) + ($myDataTL["$thn-09"]['gp'])); //+ (($myDataTL["$thn-10"]['gp']) + ($myDataTL["$thn-11"]['gp'])) + ($myDataTL["$thn-12"]['gp']));
$hasil_year_hcm = ($total_upto_year_hcm / $total_rkap_year_hcm) * 100;
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
            window.location.href = 'index.php/plant_gresik/prod_semen?tahun=2016';
        });
        $('#btn_prod_lime').click(function () {
            window.location.href = 'index.php/plant_gresik/prod_lime';
        });
        $('#btn_prod_klin').click(function () {
            window.location.href = 'index.php/plant_gresik/klin_semen?tahun=2016';
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
    function selectThn() {
        var thn = $('#tahun').val();
        window.location.href = 'index.php/plant_gresik/prod_semen?tahun=' + thn;
    }
</script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
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
                        <!--			<button class="btn btn-default" aria-label="Left Align" id="btn_prod_lime" type="button">
                                                        Lime Stone
                                                </button>-->
                        <!--			<button class="btn btn-default" aria-label="Left Align" id="btn_prod_rawmix"  type="button">
                                                        Raw Mix
                                                </button>-->
                        <button class="btn btn-default" aria-label="Left Align" id="btn_prod_klin" type="button">
                            Clinker
                        </button>
                        <!--			<button class="btn btn-default" aria-label="Left Align" id="btn_prod_silica" type="button">
                                                        Silica Stone
                                                </button>-->
                        <!--			<button class="btn btn-default" aria-label="Left Align" id="btn_prod_fineCoal" type="button">
                                                        Fine Coal
                                                </button>-->
                        <button class="btn btn-warning " aria-label="Left Align" id="btn_prod_semen" type="button">
                            Cement 
                        </button>
                    </div>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <div class="date" style="MARGIN-TOP: 16px; margin-right: 18px;">
                            <?php
                            $postgresql = $this->load->database('psqlsatu', TRUE);
                            $Query = $postgresql->query("SELECT date_prod from plg_sg_plant ORDER BY date_prod DESC LIMIT 1");
                            $data_day = $Query->result_array();
                            $tanggal = date_create($data_day['0']['date_prod']);
                            $last_date = date_format($tanggal, "d");
                            echo 'Last Update on : ' . date_format($tanggal, "d F Y") . '&nbsp';

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
                            ?></div>
                    </li>
                    <li>
                        <select name="tahun" id="tahun" onchange="selectThn()" class="form-control" data-width="fit" title="Choose Year" style=" margin-top: 8px;">
                            <?php
                            $thn = date("Y");
                            for ($i = $thn; $i <= $thn; $i++) {
                                echo '<option>' . $i . '</option>';
                            }
                            ?>
                        </select>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff ">Plant List <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= base_url() ?>index.php/plant_padang/prod_semen">Group SMIG</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_padang/prod_semen">Padang</a></li>
                            <li role="separator" class="divider"></li>

                            <li><a href="<?= base_url() ?>index.php/plant_gresik/prod_semen">Gresik</a></li>
                            <li role="separator" class="divider"></li>

                            <li><a href="<?= base_url() ?>index.php/plant_tonasa/prod_semen">Tonasa</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_tlcc/prod_semen">TLCC</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

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
                    </tbody></ul>
                </table>
            </div>
            <div class="box-body">
                <div id="accordion">
                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                    <!-- <div class="panel box box-primary"> -->
                    <div class="panel headpan"><a data-toggle="collapse" data-parent="#accordion" href="#SMIGGroup" >
                            <div class="headaccordion">
                                <span style="font-weight: bold;">SMIG Group</span>
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
                                                <td> <div align="right"><?php echo number_format(($rkap_sp['0']['semen']) / 1000, 0); ?> K T</div></td>
                                                <td><div  align="center" class="style1">
                                                        <div align="right"><?php echo number_format(($data_sp['0']['cement']) / 1000, 0); ?> K T</div>
                                                    </div></td>
                                                <td><div align="right"><?php
                                                        if ($hasil_tot_semensp < 100) {
                                                            echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                        } else {
                                                            echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                        }
                                                        echo $hasil_tot_semensp;
                                                        ?> %</div></td>
                                                <td><div align="right"><img src="media/up-green.png" width="16px" /></div></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>SG</td>
                                                <td > <div align="right"><?php echo number_format(($rkap['0']['semen']) / 1000, 0); ?> K T</div></td>
                                                <td ><div align="center" class="style1">
                                                        <div align="right"><?php echo number_format(($data['finishmill']) / 1000, 0); ?> K T</div>
                                                    </div></td>
                                                <td><div align="right"><?php
                                                        if ($hasil_tot_semensg < 100) {
                                                            echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                        } else {
                                                            echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                        }
                                                        echo $hasil_tot_semensg;
                                                        ?> %</div></td>
                                                <td><div align="right"><img src="media/up-green.png" width="16px" /></div></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>ST</td>
                                                <td> <div align="right"><?php echo number_format(($rkap_st['0']['semen']) / 1000, 0); ?> K T</div></td>
                                                <td> <div align="right"><?php echo number_format(($data_st['0']['cement'] ) / 1000, 0); ?> K T</div></td>
                                                <td><div align="right"><?php
                                                        if ($hasil_tot_semenst < 100) {
                                                            echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                        } else {
                                                            echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                        }
                                                        echo $hasil_tot_semenst;
                                                        ?> %</div></td>
                                                <td><div align="right"><img src="media/up-red.png" width="16px" /></div></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>TL</td>
                                                <td><div align="right"><?php echo number_format(($rkap_tl['0']['semen']) / 1000, 0); ?> K T</div></td>
                                                <td><div align="right"><?php echo number_format(($data_tl['0']['cement'] ) / 1000, 0); ?> K T</div></td>
                                                <td><div align="right"><?php
                                                        if ($hasil_tot_sementl < 100) {
                                                            echo '<img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> ';
                                                        } else {
                                                            echo '<img src="media/up-green.png" alt="" width="16px"/> ';
                                                        }
                                                        echo $hasil_tot_sementl;
                                                        ?> %</div></td>
                                                <td><div align="right"><img src="media/up-red.png" width="16px" /></div></td>
                                            </tr>
                                            <tr bgcolor="#F9F9F9">
                                                <td height="23">&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td bgcolor="#F9F9F9">Total</td>
                                                <td bgcolor="#F9F9F9"><div align="right"><?php echo number_format($total_rkap_smig_cm / 1000, 0); ?> K T</div></td>
                                                <td bgcolor="#F9F9F9"><div  align="center" class="style1">
                                                        <div align="right"><?php echo number_format($total_upto_smig_cm / 1000, 0); ?> K T</div>
                                                    </div></td>
                                                <td bgcolor="#F9F9F9"><div align="right"><img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> <?php echo number_format($hasil_year_smig_cm, 2, ",", "."); ?> %</div></td>
                                                <td bgcolor="#F9F9F9"><div align="right"><img src="media/up-green.png" width="16px" /></div></td>
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
                                <span style="font-weight: bold;">Semen Padang</span>
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
                                            <td><div align="right"><img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> <?php echo number_format($hasil_year_ind2, 2) ?> %</div></td>
                                            <td><div align="right"><img src="media/up-red.png" width="16px" /></div></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>Indarung III</td>
                                            <td> <div align="right"><?php echo number_format($total_rkap_year_ind3 / 1000, 0); ?> K T</div></td>
                                            <td><div align="center" class="style1">
                                                    <div align="right"><?php echo number_format($total_upto_year_ind3 / 1000, 0); ?> K T</div>
                                                </div></td>
                                            <td><div align="right"><img src="media/up-red.png" alt="" width="16px" class="img-rotate111"/> <?php echo number_format($hasil_year_ind3, 2) ?> %</div></td>
                                            <td><div align="right"><img src="media/up-red.png" width="16px" /></div></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>Indarung IV</td>
                                            <td> <div align="right"><?php echo number_format($total_rkap_year_ind4 / 1000, 0); ?> K T</div></td>
                                            <td><div align="center" class="style1">
                                                    <div align="right"><?php echo number_format($total_upto_year_ind4 / 1000, 0); ?> K T</div>
                                                </div></td>
                                            <td><div align="right"><img src="media/up-red.png" alt="" width="16px" class="img-rotate1111"/> <?php echo number_format($hasil_year_ind4, 2) ?> %</div></td>
                                            <td><div align="right"><img src="media/up-red.png" width="16px" /></div></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>Indarung V</td>
                                            <td> <div align="right"><?php echo number_format($total_rkap_year_ind5 / 1000, 0); ?> K T</div></td>
                                            <td><div align="center" class="style1">
                                                    <div align="right"><?php echo number_format($total_upto_year_ind5 / 1000, 0); ?> K T</div>
                                                </div></td>
                                            <td><div align="right"><img src="media/up-red.png" alt="" width="16px" class="img-rotate1112"/> <?php echo number_format($hasil_year_ind5, 2) ?> %</div></td>
                                            <td><div align="right"><img src="media/up-red.png" width="16px" /></div></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>Dumai</td>
                                            <td> <div align="right"><?php echo number_format($total_rkap_year_dmi / 1000, 0); ?> K T</div></td>
                                            <td><div align="center" class="style1">
                                                    <div align="right"><?php echo number_format($total_upto_year_dmi / 1000, 0); ?> K T</div>
                                                </div></td>
                                            <td><div align="right"><img src="media/up-red.png" alt="" width="16px" class="img-rotate11121"/> <?php echo number_format($hasil_year_dmi, 2) ?> %</div></td>
                                            <td><div align="right"><img src="media/up-green.png" alt="" width="16px" /></i></div></td>
                                        </tr>
                                        <tr bgcolor="#F9F9F9">
                                            <td>&nbsp;</td>
                                            <td>Total</td>
                                            <td> <div align="right"><?php echo number_format($rkap_sp['0']['semen'] / 1000, 0); ?> K T</div></td>
                                            <td><div align="center" class="style1">
                                                    <div align="right"><?php echo number_format($data_sp['0']['cement'] / 1000, 0); ?> K T</div>
                                                </div></td>
                                            <td><div align="right"><img src="media/up-red.png" alt="" width="16px" class="img-rotate11121"/> <?php echo number_format($hasil_tot_semensp, 2) ?> %</div></td>
                                            <td><div align="right"><img src="media/up-green.png" alt="" width="16px" /></i></div></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel headpan">
                        <a data-toggle="collapse" data-parent="#accordion" href="#SGCement" >
                            <div class="headaccordion">
                                <span style="font-weight: bold;">Semen Gresik</span>
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
                                            <td><div align="right"><img src="media/up-red.png" alt="" width="16px" class="img-rotate211"/> <?php echo number_format($hasil_year_tb1, 2); ?> %</div></td>
                                            <td><div align="right"><img src="media/up-red.png" width="16px" /></div></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>Tuban II</td>
                                            <td><div align="right"><?php echo number_format($total_rkap_year_tb2 / 1000, 0); ?> K T</div></td>
                                            <td><div align="center" class="style1">
                                                    <div align="right"><?php echo number_format($total_upto_year_tb2 / 1000, 0); ?> K T</div>
                                                </div></td>
                                            <td><div align="right"><img src="media/up-red.png" alt="" width="16px" class="img-rotate111"/> <?php echo number_format($hasil_year_tb2, 2); ?> %</div></td>
                                            <td><div align="right"><img src="media/up-red.png" width="16px" /></div></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>Tuban III</td>
                                            <td><div align="right"><?php echo number_format($total_rkap_year_tb3 / 1000, 0); ?> K T</div></td>
                                            <td><div align="right"><?php echo number_format($total_upto_year_tb3 / 1000, 0); ?> K T</div></td>
                                            <td><div align="right"><img src="media/up-red.png" alt="" width="16px" class="img-rotate1111"/> <?php echo number_format($hasil_year_tb3, 2); ?> %</div></td>
                                            <td><div align="right"><img src="media/up-red.png" width="16px" /></div></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>Tuban IV</td>
                                            <td><div align="right"><?php echo number_format($total_rkap_year_tb4 / 1000, 0); ?> K T</div></td>
                                            <td><div align="right"><?php echo number_format($total_upto_year_tb4 / 1000, 0); ?> K T</div></td>
                                            <td><div align="right"><img src="media/up-red.png" alt="" width="16px" class="img-rotate1112"/> <?php echo number_format($hasil_year_tb4, 2); ?> %</div></td>
                                            <td><div align="right"><img src="media/up-red.png" width="16px" /></div></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>Gresik</td>
                                            <td><div align="right"><?php echo number_format($total_rkap_year_grs / 1000, 0); ?> K T</div></td>
                                            <td><div align="center" class="style1">
                                                    <div align="right"><?php echo number_format($total_upto_year_grs / 1000, 0); ?> K T</div>
                                                </div></td>
                                            <td><div align="right"><img src="media/up-red.png" alt="" width="16px" class="img-rotate11121"/> <?php echo number_format($hasil_year_grs, 2); ?> %</div></td>
                                            <td><div align="right"><img src="media/up-green.png" alt="" width="16px" /></i></div></td>
                                        </tr>
                                        <tr bgcolor="#F9F9F9">
                                            <td>&nbsp;</td>
                                            <td>Total</td>
                                            <td><div align="right"><?php echo number_format($total_rkap_year_sg / 1000, 0); ?> K T</div></td>
                                            <td><div align="center" class="style1">
                                                    <div align="right"><?php echo number_format($total_upto_year_sg / 1000, 0); ?> K T</div>
                                                </div></td>
                                            <td><div align="right"><img src="media/up-red.png" alt="" width="16px" class="img-rotate11121"/> <?php echo number_format($hasil_year_sg, 2); ?> %</div></td>
                                            <td><div align="right"><img src="media/up-green.png" alt="" width="16px" /></i></div></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="panel headpan">
                        <a data-toggle="collapse" data-parent="#accordion" href="#STCement" >
                            <div class="headaccordion">
                                <span style="font-weight: bold;">Semen Tonasa</span>
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
                                            <td><div align="right"><img src="media/up-red.png" alt="" width="16px" class="img-rotate2111"/> <?php echo number_format($hasil_year_tns2, 2); ?> %</div></td>
                                            <td><div align="right"><img src="media/up-red.png" width="16px" /></div></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>Tonasa III</td>
                                            <td><div align="right"><?php echo number_format($total_rkap_year_tns3 / 1000, 0); ?> K T</div></td>
                                            <td><div align="center" class="style1">
                                                    <div align="right"><?php echo number_format($total_upto_year_tns3 / 1000, 0); ?> K T</div>
                                                </div></td>
                                            <td><div align="right"><img src="media/up-red.png" alt="" width="16px" class="img-rotate1113"/> <?php echo number_format($hasil_year_tns3, 2); ?> %</div></td>
                                            <td><div align="right"><img src="media/up-red.png" width="16px" /></div></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>Tonasa IV</td>
                                            <td><div align="right"><?php echo number_format($total_rkap_year_tns4 / 1000, 0); ?> K T</div></td>
                                            <td><div align="right"><?php echo number_format($total_upto_year_tns4 / 1000, 0); ?> K T</div></td>
                                            <td><div align="right"><img src="media/up-red.png" alt="" width="16px" class="img-rotate11111"/> <?php echo number_format($hasil_year_tns4, 2); ?> %</div></td>
                                            <td><div align="right"><img src="media/up-red.png" width="16px" /></div></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>Tonasa V</td>
                                            <td><div align="right"><?php echo number_format($total_rkap_year_tns5 / 1000, 0); ?> K T</div></td>
                                            <td><div align="right"><?php echo number_format($total_upto_year_tns5 / 1000, 0); ?> K T</div></td>
                                            <td><div align="right"><img src="media/up-red.png" alt="" width="16px" class="img-rotate11122"/> <?php echo number_format($hasil_year_tns5, 2); ?> %</div></td>
                                            <td><div align="right"><img src="media/up-red.png" width="16px" /></div></td>
                                        </tr>
                                        <tr bgcolor="#F9F9F9">
                                            <td>&nbsp;</td>
                                            <td>Total</td>
                                            <td><div align="right"><?php echo number_format($total_rkap_year_tns / 1000, 0); ?> K T</div></td>
                                            <td><div align="right"><?php echo number_format($total_upto_year_tns / 1000, 0); ?> K T</div></td>
                                            <td><div align="right"><img src="media/up-red.png" alt="" width="16px" class="img-rotate11122"/> <?php echo number_format($hasil_year_tns, 2); ?> %</div></td>
                                            <td><div align="right"><img src="media/up-red.png" width="16px" /></div></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel headpan">
                        <a data-toggle="collapse" data-parent="#accordion" href="#TLCCCement" >
                            <div class="headaccordion">
                                <span style="font-weight: bold;">Thang long Cement</span>
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
                                            <td><div align="right"><img src="media/up-red.png" alt="" width="16px" class="img-rotate2112"/> <?php echo number_format($hasil_year_mp, 2); ?> %</div></td>
                                            <td><div align="right"><img src="media/up-red.png" width="16px" /></div></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>HCM</td>
                                            <td><div align="right"><?php echo number_format($total_rkap_year_hcm / 1000, 0); ?> K T</div></td>
                                            <td><div align="center" class="style1">
                                                    <div align="right"><?php echo number_format($total_upto_year_hcm / 1000, 0); ?> K T</div>
                                                </div></td>
                                            <td><div align="right"><img src="media/up-red.png" alt="" width="16px" class="img-rotate1114"/> <?php echo number_format($hasil_year_hcm, 2); ?> %</div></td>
                                            <td><div align="right"><img src="media/up-red.png" width="16px" /></div></td>
                                        </tr>
                                        <tr bgcolor="#F9F9F9">
                                            <td>&nbsp;</td>
                                            <td>Total</td>
                                            <td><div align="right"><?php echo number_format($total_rkap_year_tlcc / 1000, 0); ?> K T</div></td>
                                            <td><div align="center" class="style1">
                                                    <div align="right"><?php echo number_format($total_upto_year_tlcc / 1000, 0); ?> K T</div>
                                                </div></td>
                                            <td><div align="right"><img src="media/up-red.png" alt="" width="16px" class="img-rotate1114"/> <?php echo number_format($hasil_year_tlcc, 2); ?> %</div></td>
                                            <td><div align="right"><img src="media/up-red.png" width="16px" /></div></td>
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
            <div><h4 style="text-align: center; margin-bottom: 2px;">Cement Production</h4></div>
            <div id="container" style="min-height: 330px;margin: 0 auto" align="right"></div>
            <div class="box-header with-border">
                <i class="fa fa-pie-chart" aria-hidden="true"></i>
                <h4 class="box-title">Quartal Graph</h4>
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
                            <div class="realval"><b><?php echo number_format($total_rkap_q1, 0, ",", "."); ?></b></div>
                            <div><b><?php echo number_format($total_upto_q1, 0, ",", "."); ?></b></div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 noPadding">
                        <div id="quartal2" style="  min-height: 166px; margin: 0 auto" align="right"></div>
                        <div class="panel panel-body noPadding" align="center" style=" margin-bottom: 0px;">
                            <div class="realval"><?php echo number_format($total_rkap_q2, 0, ",", "."); ?></div>
                            <div><?php echo number_format($total_upto_q2, 0, ",", "."); ?></div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 noPadding">
                        <div id="quartal3" style="  min-height: 167px; margin: 0 auto" align="right"></div>
                        <div class="panel panel-body noPadding" align="center" style=" margin-bottom: 0px;">
                            <div class="realval"><?php echo number_format($total_rkap_q3, 0, ",", "."); ?></div>
                            <div><?php echo number_format($total_upto_q3, 0, ",", "."); ?></div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 noPadding">
                        <div id="quartal4" style="  min-height: 167px; margin: 0 auto" align="right"></div>
                        <div class="panel panel-body noPadding" align="center" style=" margin-bottom: 0px;">
                            <div class="realval"><?php echo number_format(0, 0, ",", "."); ?></div>
                            <div><?php echo number_format(0, 0, ",", "."); ?></div>
                        </div>
                    </div>
                </div
            </div>
        </div>
    </div>
</div>

<script>
    var baseurl = '<?php echo base_url();?>';
    var uriSMIG = baseurl+'index.php/plant_chart/chart_semen_group';
    var uriPD = baseurl+'index.php/plant_chart/chart_semen_padang';
    var uriGR = baseurl+'index.php/plant_chart/chart_semen_gresik';
    var uriTN = baseurl+'index.php/plant_chart/chart_semen_tonasa';
    var uriTL = baseurl+'index.php/plant_chart/chart_semen_tlcc';
    
    $(function() {
    $('.collapse').on('shown.bs.collapse', function (e) {
        var uri = baseurl+'index.php/plant_system/chart';
        var myID = e.currentTarget.id;
        
        if(myID === 'SPCement'){
            $("#LoadChart").load(uriPD);
        } else if(myID === 'SGCement'){
            $("#LoadChart").load(uriGR);
        } else if(myID === 'STCement'){
            $("#LoadChart").load(uriTN);
        } else if(myID === 'TLCCCement'){
            $("#LoadChart").load(uriTL);
        } else if(myID === 'SMIGGroup'){
            $("#LoadChart").load(uriSMIG);
        }
    })
});
</script>
<script>
var acc = document.getElementsByClassName("accordion");
var i;
for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        this.nextElementSibling.classList.toggle("show");
    }
}                                 
</script>
<script>
    function FormatNumberBy3(num, decpoint, sep) {
        if (arguments.length === 2) {
            sep = ",";
        }
        if (arguments.length === 1) {
            sep = ",";
            decpoint = ".";
        }
        num = num.toString();
        a = num.split(decpoint);
        x = a[0];
        y = a[1];
        z = "";


        if (typeof (x) !== "undefined") {
            for (i = x.length - 1; i >= 0; i--)
                z += x.charAt(i);
            z = z.replace(/(\d{3})/g, "$1" + sep);
            if (z.slice(-sep.length) === sep)
                z = z.slice(0, -sep.length);
            x = "";
            for (i = z.length - 1; i >= 0; i--)
                x += z.charAt(i);
            if (typeof (y) !== "undefined" && y.length > 0)
                x += decpoint + y;
        }
        return x;
    }
</script>
<script>
    $(function () {
        $('#container').highcharts({
            chart: {
                zoomType: 'xy',
//            width: 842,
//            height: 350,
                backgroundColor: 'transparent',
                spacingBottom: 50,
                spacingTop: 10,
                spacingLeft: 10,
                spacingRight: 10
            },
            colors: ['#97CE68', '#FEC606', '#FF7416', '#CF000F', '#8085e9', '#f15c80', '#e4d354', '#8085e8', '#8d4653', '#91e8e1'],
            credits: {
                enabled: false
            },
            exporting: {
                enabled: false
            },
            title: {
                text: ''
            },
            subtitle: {
                text: ''
            },
            xAxis: [{
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                }],
            yAxis: [{// Primary yAxis
                    labels: {
                        formatter: function () {
                            return Highcharts.numberFormat((this.value) / 1000, 0, ',', '.') + ' K';
                        },
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    min: 0,
                    max: 2450000,
                    title: {
                        text: 'Ton',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    }
                }, {// Secondary yAxis
                    title: {
                        text: '',
                        style: {
                            color: Highcharts.getOptions().colors[0]
                        }
                    },
                    min: 0,
                    max: 2450000,
                    labels: {
                        format: '{value} T',
                        style: {
                            color: Highcharts.getOptions().colors[0],
                            display: 'none'
                        }
                    },
                    opposite: true
                }],
            tooltip: {
                formatter: function () {
                    var s = '<b>' + this.x + '</b>';
                    s += '<br/><b>SMIG: </b>' + FormatNumberBy3((this.points[0].total / 1000).toFixed(0), ",", ".") + 'K T';
                    $.each(this.points, function (i, point) {
                        s += '<br/>' + point.series.name + ': ' + FormatNumberBy3((point.y / 1000).toFixed(0), ",", ".") + 'K T';
                    });
                    return s;
                },
                shared: true
            },
            legend: {
                layout: 'horizontal',
                align: 'right',
//            x: 3,
                verticalAlign: 'bottom',
                y: 40,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || 'transparent'
            },
            plotOptions: {
                column: {
                    stacking: 'normal'
                }
            },
            series: [
                {
                    name: 'SG',
                    type: 'column',
                    yAxis: 1,
                    tooltip: {
                        valueSuffix: ' T'
                    },
                    data: [<?php
echo($datacm_sg["2016-01"]['sg']);
echo ',';
echo ($datacm_sg["2016-02"]['sg']);
echo ',';
echo ($datacm_sg["2016-03"]['sg']);
echo ',';
echo ($datacm_sg["2016-04"]['sg']);
echo ',';
echo ($datacm_sg["2016-05"]['sg']);
echo ',';
echo ($datacm_sg["2016-06"]['sg']);
echo ',';
echo ($datacm_sg["2016-07"]['sg']);
echo ',';
echo ($datacm_sg["2016-08"]['sg']);
echo ',';
echo ($datacm_sg["2016-09"]['sg']);
?>]

                },
                {
                    name: 'SP',
                    type: 'column',
                    yAxis: 1,
                    tooltip: {
                        valueSuffix: ' T'
                    },
                    data: [<?php
echo($datacm_sp["2016-01"]['sp']);
echo ',';
echo ($datacm_sp["2016-02"]['sp']);
echo ',';
echo ($datacm_sp["2016-03"]['sp']);
echo ',';
echo ($datacm_sp["2016-04"]['sp']);
echo ',';
echo ($datacm_sp["2016-05"]['sp']);
echo ',';
echo ($datacm_sp["2016-06"]['sp']);
echo ',';
echo ($datacm_sp["2016-07"]['sp']);
echo ',';
echo ($datacm_sp["2016-08"]['sp']);
echo ',';
echo ($datacm_sp["2016-09"]['sp']);
?>]
                }, {
                    name: 'ST',
                    yAxis: 1,
                    type: 'column',
                    tooltip: {
                        valueSuffix: ' T'
                    },
                    data: [<?php
echo($datacm_st["2016-01"]['st']);
echo ',';
echo ($datacm_st["2016-02"]['st']);
echo ',';
echo ($datacm_st["2016-03"]['st']);
echo ',';
echo ($datacm_st["2016-04"]['st']);
echo ',';
echo ($datacm_st["2016-05"]['st']);
echo ',';
echo ($datacm_st["2016-06"]['st']);
echo ',';
echo ($datacm_st["2016-07"]['st']);
echo ',';
echo ($datacm_st["2016-08"]['st']);
echo ',';
echo ($datacm_st["2016-09"]['st']);
?>]
                },
                {
                    name: 'TLCC',
                    yAxis: 1,
                    type: 'column',
                    tooltip: {
                        valueSuffix: ' T'
                    },
                    data: [<?php
echo($datacm_tlcc["2016-01"]['tlcc']);
echo ',';
echo ($datacm_tlcc["2016-02"]['tlcc']);
echo ',';
echo ($datacm_tlcc["2016-03"]['tlcc']);
echo ',';
echo ($datacm_tlcc["2016-04"]['tlcc']);
echo ',';
echo ($datacm_tlcc["2016-05"]['tlcc']);
echo ',';
echo ($datacm_tlcc["2016-06"]['tlcc']);
echo ',';
echo ($datacm_tlcc["2016-07"]['tlcc']);
echo ',';
echo ($datacm_tlcc["2016-08"]['tlcc']);
echo ',';
echo ($datacm_tlcc["2016-09"]['tlcc']);
?>]
                },
                {
                    name: 'RKAP',
                    type: 'spline',
                    tooltip: {
                        valueSuffix: 'T'
                    },
                    data: [<?php
echo($rkap_cm[1]['cement']);
echo ',';
echo ($rkap_cm[2]['cement']);
echo ',';
echo ($rkap_cm[3]['cement']);
echo ',';
echo ($rkap_cm[4]['cement']);
echo ',';
echo ($rkap_cm[5]['cement']);
echo ',';
echo ($rkap_cm[6]['cement']);
echo ',';
echo ($rkap_cm[7]['cement']);
echo ',';
echo ($rkap_cm[8]['cement']);
echo ',';
echo ($rkap_cm[9]['cement']);
echo ',';
echo ($rkap_cm[10]['cement']);
echo ',';
echo ($rkap_cm[11]['cement']);
echo ',';
echo ($rkap_cm[12]['cement']);
?>]

                }]
        });
    });


    $(function () {

        $('#quartal1').highcharts({
            chart: {
                type: 'gauge',
                backgroundColor: 'transparent',
                plotBackgroundColor: null,
                plotBackgroundImage: null,
                plotBorderWidth: 0,
                plotShadow: false,
                width: 150,
                spacingBottom: 2,
                spacingTop: 2,
                spacingLeft: 2,
                spacingRight: 2
            },
            credits: {
                enabled: false
            },
            exporting: {
                enabled: false
            },
            title: {
                text: ''
            },
            pane: {
                startAngle: -150,
                endAngle: 150,
                background: [{
                        backgroundColor: {
                            linearGradient: {x1: 0, y1: 0, x2: 0, y2: 1},
                            stops: [
                                [0, '#FFF'],
                                [1, '#333']
                            ]
                        },
                        borderWidth: 0,
                        outerRadius: '109%'
                    }, {
                        backgroundColor: {
                            linearGradient: {x1: 0, y1: 0, x2: 0, y2: 1},
                            stops: [
                                [0, '#333'],
                                [1, '#FFF']
                            ]
                        },
                        borderWidth: 1,
                        outerRadius: '107%'
                    }, {
                        // default background
                    }, {
                        backgroundColor: '#DDD',
                        borderWidth: 0,
                        outerRadius: '105%',
                        innerRadius: '103%'
                    }]
            },
            // the value axis
            yAxis: {
                min: 0,
                max: 120,
                minorTickInterval: 'auto',
                minorTickWidth: 1,
                minorTickLength: 10,
                minorTickPosition: 'inside',
                minorTickColor: '#666',
                tickPixelInterval: 20,
                tickWidth: 2,
                tickPosition: 'inside',
                tickLength: 10,
                tickColor: '#666',
                labels: {
                    step: 2,
                    rotation: 'auto'
                },
//            title: {
//                text: '%'
//            },
                plotBands: [{
                        from: 0,
                        to: 50,
                        color: '#DF5353' // green
                    }, {
                        from: 50,
                        to: 100,
                        color: '#DDDF0D' // yellow
                    }, {
                        from: 100,
                        to: 120,
                        color: '#55BF3B' // red
                    }]
            },
            series: [{
                    name: 'Percentage',
                    data: [<?php echo number_format($total_q1, 2); ?>],
                    tooltip: {
                        valueSuffix: ' %'
                    }
                }]
        });

    });

    $(function () {

        $('#quartal2').highcharts({
            chart: {
                type: 'gauge',
                backgroundColor: 'transparent',
                plotBackgroundColor: null,
                plotBackgroundImage: null,
                plotBorderWidth: 0,
                plotShadow: false,
                width: 150,
                spacingBottom: 2,
                spacingTop: 2,
                spacingLeft: 2,
                spacingRight: 2
            },
            credits: {
                enabled: false
            },
            exporting: {
                enabled: false
            },
            title: {
                text: ''
            },
            pane: {
                startAngle: -150,
                endAngle: 150,
                background: [{
                        backgroundColor: {
                            linearGradient: {x1: 0, y1: 0, x2: 0, y2: 1},
                            stops: [
                                [0, '#FFF'],
                                [1, '#333']
                            ]
                        },
                        borderWidth: 0,
                        outerRadius: '109%'
                    }, {
                        backgroundColor: {
                            linearGradient: {x1: 0, y1: 0, x2: 0, y2: 1},
                            stops: [
                                [0, '#333'],
                                [1, '#FFF']
                            ]
                        },
                        borderWidth: 1,
                        outerRadius: '107%'
                    }, {
                        // default background
                    }, {
                        backgroundColor: '#DDD',
                        borderWidth: 0,
                        outerRadius: '105%',
                        innerRadius: '103%'
                    }]
            },
            // the value axis
            yAxis: {
                min: 0,
                max: 120,
                minorTickInterval: 'auto',
                minorTickWidth: 1,
                minorTickLength: 10,
                minorTickPosition: 'inside',
                minorTickColor: '#666',
                tickPixelInterval: 20,
                tickWidth: 2,
                tickPosition: 'inside',
                tickLength: 10,
                tickColor: '#666',
                labels: {
                    step: 2,
                    rotation: 'auto'
                },
                title: {
                    text: ''
                },
                plotBands: [{
                        from: 0,
                        to: 50,
                        color: '#DF5353' // green
                    }, {
                        from: 50,
                        to: 100,
                        color: '#DDDF0D' // yellow
                    }, {
                        from: 100,
                        to: 120,
                        color: '#55BF3B' // red
                    }]
            },
            series: [{
                    name: 'Percentage',
                    data: [<?php echo number_format($total_q2, 2); ?>],
                    tooltip: {
                        valueSuffix: ' %'
                    }
                }]
        });
    });

    $(function () {

        $('#quartal3').highcharts({
            chart: {
                type: 'gauge',
                backgroundColor: 'transparent',
                plotBackgroundColor: null,
                plotBackgroundImage: null,
                plotBorderWidth: 0,
                plotShadow: false,
                width: 150,
                spacingBottom: 2,
                spacingTop: 2,
                spacingLeft: 2,
                spacingRight: 2
            },
            credits: {
                enabled: false
            },
            exporting: {
                enabled: false
            },
            title: {
                text: ''
            },
            pane: {
                startAngle: -150,
                endAngle: 150,
                background: [{
                        backgroundColor: {
                            linearGradient: {x1: 0, y1: 0, x2: 0, y2: 1},
                            stops: [
                                [0, '#FFF'],
                                [1, '#333']
                            ]
                        },
                        borderWidth: 0,
                        outerRadius: '109%'
                    }, {
                        backgroundColor: {
                            linearGradient: {x1: 0, y1: 0, x2: 0, y2: 1},
                            stops: [
                                [0, '#333'],
                                [1, '#FFF']
                            ]
                        },
                        borderWidth: 1,
                        outerRadius: '107%'
                    }, {
                        // default background
                    }, {
                        backgroundColor: '#DDD',
                        borderWidth: 0,
                        outerRadius: '105%',
                        innerRadius: '103%'
                    }]
            },
            // the value axis
            yAxis: {
                min: 0,
                max: 120,
                minorTickInterval: 'auto',
                minorTickWidth: 1,
                minorTickLength: 10,
                minorTickPosition: 'inside',
                minorTickColor: '#666',
                tickPixelInterval: 20,
                tickWidth: 2,
                tickPosition: 'inside',
                tickLength: 10,
                tickColor: '#666',
                labels: {
                    step: 2,
                    rotation: 'auto'
                },
                title: {
                    text: ''
                },
                plotBands: [{
                        from: 0,
                        to: 50,
                        color: '#DF5353' // green
                    }, {
                        from: 50,
                        to: 100,
                        color: '#DDDF0D' // yellow
                    }, {
                        from: 100,
                        to: 120,
                        color: '#55BF3B' // red
                    }]
            },
            series: [{
                    name: 'Percentage',
                    data: [<?php echo number_format($total_q3, 2); ?>],
                    tooltip: {
                        valueSuffix: ' %'
                    }
                }]

        });
    });

    $(function () {

        $('#quartal4').highcharts({
            chart: {
                type: 'gauge',
                backgroundColor: 'transparent',
                plotBackgroundColor: null,
                plotBackgroundImage: null,
                plotBorderWidth: 0,
                plotShadow: false,
                width: 150,
                spacingBottom: 2,
                spacingTop: 2,
                spacingLeft: 2,
                spacingRight: 2
            },
            credits: {
                enabled: false
            },
            exporting: {
                enabled: false
            },
            title: {
                text: ''
            },
            pane: {
                startAngle: -150,
                endAngle: 150,
                background: [{
                        backgroundColor: {
                            linearGradient: {x1: 0, y1: 0, x2: 0, y2: 1},
                            stops: [
                                [0, '#FFF'],
                                [1, '#333']
                            ]
                        },
                        borderWidth: 0,
                        outerRadius: '109%'
                    }, {
                        backgroundColor: {
                            linearGradient: {x1: 0, y1: 0, x2: 0, y2: 1},
                            stops: [
                                [0, '#333'],
                                [1, '#FFF']
                            ]
                        },
                        borderWidth: 1,
                        outerRadius: '107%'
                    }, {
                        // default background
                    }, {
                        backgroundColor: '#DDD',
                        borderWidth: 0,
                        outerRadius: '105%',
                        innerRadius: '103%'
                    }]
            },
            // the value axis
            yAxis: {
                min: 0,
                max: 120,
                minorTickInterval: 'auto',
                minorTickWidth: 1,
                minorTickLength: 10,
                minorTickPosition: 'inside',
                minorTickColor: '#666',
                tickPixelInterval: 20,
                tickWidth: 2,
                tickPosition: 'inside',
                tickLength: 10,
                tickColor: '#666',
                labels: {
                    step: 2,
                    rotation: 'auto'
                },
                title: {
                    text: ''
                },
                plotBands: [{
                        from: 0,
                        to: 50,
                        color: '#DF5353' // green
                    }, {
                        from: 50,
                        to: 100,
                        color: '#DDDF0D' // yellow
                    }, {
                        from: 100,
                        to: 120,
                        color: '#55BF3B' // red
                    }]
            },
            series: [{
                    name: 'Percentage',
                    data: [0],
                    tooltip: {
                        valueSuffix: ' %'
                    }
                }]

        });
    });
</script>
