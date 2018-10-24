<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    $.ajax({
        url: 'eksekutif_report/get_kiln_operation?tanggal=12&bulan=02&tahun=2016&plant=mp&company=6000',
        type: 'GET',
        success: function (data) {
            var dataJson = JSON.parse(data);
            console.log(dataJson);
            a = dataJson[0].DATE_PROD;
            b = dataJson[0].STOP_COUNT;
            c = dataJson[0].STOP_DESC;
            
            console.log(a + "-" + b + "-" +c);
            $("#tgl").html(a);
            $("#stop").html(b);
            $("#desc").html(c);
        }
    }).done(function (data) {
    }).fail(function () {

    });
</script>
<div>
    <h3 id="tgl"></h3>
    <h1 id="stop"></h1>
    <h2 id="desc"></h2>
</div>
<?php
//$oracle = $this->load->database('oramso', TRUE);
//$Query1 = $oracle->query("SELECT TO_CHAR (DATE_PROD, 'YYYY-MM-DD') AS TGL FROM PIS_SG_PRODDAILY
//                            WHERE ROWNUM = 1
//                            ORDER BY DATE_PROD DESC");
//$data1 = $Query1->result_array();
//$tanggal = date_create($data1['0']['TGL']);
////tes tanggal
//$contoh = 5;
//$cont = 2018;
////$ke_tanggal = mktime();
////echo '<h1>'.date('t', mktime(0, 0, 0, $contoh, 1, $cont)).'</h1>';
////echo '<h1>' . date('Y-m-d', mktime(0, 0, 0, $contoh, 1, $cont)) . '</h1>';
////$date = $date_ku;
//
////$SumDate = date('t', mktime(0, 0, 0, date('n'), 1, date('Y')));
//$SumDate = date('t', mktime(0, 0, 0, 2, 1, 2015));
////if (!empty($input['periode'])) {
////    $SumDate = date('t', mktime(0, 0, 0, 2, 1, 2016));
////} else {
////    $SumDate = date('t', mktime(0, 0, 0, date('m'), 1, date('Y')));
////}
////echo '1';
//for ($i = 1; $i <= $SumDate; $i++) {
//    echo '<h1>'.$i.'</h1>';
//}
//
//$get_last = date_format($tanggal, 'Y-m-d');
//$my_tgl = date_format($tanggal, 'd');
//
//$prognose_cm = $prog_cm["COMPANY"]["CEMENT"];
//$prognose_cl = $prog_cl["COMPANY"]["CLINKER"];
//
//$budget_cm = $bud_cm['0']["BUDGET"];
//$budget_cl = $bud_cl['0']["BUDGET"];
//
//$design_cm = $design_cm['0']["CEMENT"];
//$design_cl = $design_cl['0']["CLINKER"];
//
//$a = 0;
//$b = 0;
//$c = 0;
//$d = 0;
//$e = 0;
//$f = 0;
//$prog = 0;
//$my_prognose = 0;
//$mine = 0;
//$cacc = 0;
//$dacc = 0;
//$acc_real = 0;
//$avg_real = 0;
//
//echo 'tanggal : ' . date('Y-m-d') . '<br>';
//
//echo '<b>' . $prognose_cm . '</b> / PROGNOSE CEMENT =============================================<br>';
//for ($i = 1; $i <= date('t'); $i++) {
//    $a += $prognose_cm;
//    echo "tanggal : " . $i . "->" . $a . "<br>";
//}
//echo '<b>' . $prognose_cl . '</b> / PROGNOSE CLINKER =============================================<br>';
//for ($i = 1; $i <= date('t'); $i++) {
//    $b += $prognose_cl;
//    echo "tanggal : " . $i . "->" . $b . "<br>";
//}
//
//////////////////////
//echo '<b>' . $budget_cm . '</b> / TON BUDGET CEMENT =============================================<br>';
//for ($i = 1; $i <= date('t'); $i++) {
//    $c = $budget_cm;
//    echo "tanggal : " . $i . "->" . $c . "<br>";
//}
//echo '<b>' . $budget_cl . '</b> / TON BUDGET CLINKER =============================================<br>';
//for ($i = 1; $i <= date('t'); $i++) {
//    $d = $budget_cl;
//    echo "tanggal : " . $i . "->" . $d . "<br>";
//}
//echo '<b>' . $budget_cm . '</b> / ACCUM TON BUDGET CEMENT =============================================<br>';
//for ($i = 1; $i <= date('t'); $i++) {
//    $cacc += $budget_cm;
//    echo "tanggal : " . $i . "->" . $cacc . "<br>";
//}
//echo '<b>' . $budget_cl . '</b> / ACCUM TON BUDGET CLINKER =============================================<br>';
//for ($i = 1; $i <= date('t'); $i++) {
//    $dacc += $budget_cl;
//    echo "tanggal : " . $i . "->" . $dacc . "<br>";
//}
////fixed
//echo '<b>' . $design_cm . '</b> / TON DESIGN CEMENT =============================================<br>';
//for ($i = 1; $i <= date('t'); $i++) {
//    $e = $design_cm;
//    echo "tanggal : " . $i . "->" . $e . "<br>";
//}
////fixed
//echo '<b>' . $design_cl . '</b> / TON DESIGN CLINKER =============================================<br>';
//for ($i = 1; $i <= date('t'); $i++) {
//    $f = $design_cl;
//    echo "tanggal : " . $i . "->" . $f . "<br>";
//}
///////////////////////////////
//
//echo '<b>' . $get_last . '</b> / PROGNOSE CONTOH =============================================<br>';
//
//if (date('Y-m-d') < $tanggal) {
//    for ($x = 0; $x < $my_tgl; $x++) {
//        $get_real_cm = $get_real[$x]["CEMENT"];
//    }
//    $my_prognose = $get_real_cm;
//} else {
//    $my_prognose = $prognose_cm;
//}
//
//
//for ($x = 0; $x < $my_tgl; $x++) {
//    $get_real_cm = $get_real[$x]["CEMENT"];
//    $prog = $get_real_cm;
//    echo "tanggal : " . $x . "->" . $prog . "<br>";
//}
//for ($x < $my_tgl; $x <= date('t'); $x++) {
//    $prog = $prognose_cm;
//    echo "tanggal : " . $x . "->" . $prog . "<br>";
//}
//echo '<b>' . $prog . '</b> / PROGNOSE CONTOH =============================================<br>';
//for ($i = 1; $i <= date('t'); $i++) {
//    $mine += $prog;
//    echo "tanggal : " . $i . "->" . $mine . "<br>";
//}
//
//echo '<b>' . $get_last . '</b> / ACCUM REAL =============================================<br>';
//for ($x = 0; $x < $my_tgl; $x++) {
//    $get_real_cm = $get_real[$x]["CEMENT"];
//    $acc_real += $get_real_cm;
//    echo "tanggal : " . $x . "->" . $acc_real . "<br>";
//}
//
//echo '<strong>CONTOH AVR REAL</strong> =============================================<br>';
//for ($x = 0; $x < $my_tgl; $x++) {
//    for ($y = 0; $y < $x; $y++) {
//        $get_real_cm = array_sum($get_real[$y]);
//        $get_jop_cm = array_sum($get_jop[$y]);
//        $avg_real = ($get_real_cm / $get_jop_cm) * 22 * 1;
//    }
//
//    echo "tanggal : " . $x . "->" . ceil($avg_real) . "<br>";
//    echo "jop : " . $x . "->" . $get_jop[$y]['JOP'] . "<br>";
//    echo "prod : " . $x . "->" . $get_real[$y]['CEMENT'] . "<br>";
//}
?>
