<?php
$input = $this->input->get('input');
$tahun = !empty($input) ? $input['tahun'] : date('Y');
?>
<style>
    .noPadding{
        padding-top:1px;
        padding-left:1px;
        padding-right:1px;
        padding-bottom:1px;
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
</style>
<script>
    $(function () {
        $('#btn_prod_semen').click(function () {
            window.location.href = 'index.php/plant_padang/prod_semen';
        });
        $('#btn_prod_lime').click(function () {
            window.location.href = 'index.php/plant_padang/prod_lime';
        });
        $('#btn_prod_rawmix').click(function () {
            window.location.href = 'index.php/plant_padang/prod_rawmix';
        });
        $('#btn_prod_klin').click(function () {
            window.location.href = 'index.php/plant_padang/klin_semen';
        });
        $('#btn_prod_silica').click(function () {
            window.location.href = 'index.php/plant_padang/prod_silica';
        });
        $('#btn_prod_fineCoal').click(function () {
            window.location.href = 'index.php/plant_padang/prod_fineCoal';
        });
        $('#btnChart').click(function () {
            window.location.href = 'index.php/plant_padang/prod_semenChart';
        });

    });
    $('#Tahun_<?php
if (!empty($input['tahun'])) {
    echo $input['tahun'];
} else {
    echo date('Y');
}
?>').addClass('active btn-danger');

    function Btn_Tahun(tahun) {
        var url = "<?= base_url() ?>index.php/plant_padang/prod_semen";
        var form = $('<form action="' + url + '" method="get">' +
                '<input type="hidden" name="input[tahun]" value="' + tahun + '" />' +
                '</form>'
                );
        $('body').append(form);
        $(form).submit();
    }
</script>
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
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff "><?php echo $tahun ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php
                            for ($i = 2016; $i <= date('Y'); $i++) {
                                echo '<li>
                                        <button class="btn btn-warning" type="button" id="Tahun_' . $i . '" onclick="Btn_Tahun(' . $i . ')" style="min-width:120px;">' . $i . '</button>
                                        </li>';
                            }
                            ?>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <div style="margin-top: 15px;">
                            <?php
                            $oracle = $this->load->database('oramso', TRUE);
                            $Query = $oracle->query("SELECT * FROM (SELECT TO_CHAR(DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD FROM PIS_SP_PRODDAILY ORDER BY DATE_PROD DESC) WHERE ROWNUM = 1");
                            $data = $Query->result_array();
                            $tanggal = date_create($data['0']['DATE_PROD']);
                            $last_date = date_format($tanggal, "d");
//                            echo 'Last Update on : ' . date_format($tanggal, "d F Y");

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
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff ">Plant List <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= base_url() ?>index.php/plant_system/dashboard_klin">Group SMIG</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="active"><a href="<?= base_url() ?>index.php/plant_padang/prod_semen">Padang</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_rembang/prod_semen">Gresik</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_gresik/prod_semen">KSO SI-SG</a></li>
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
<!--batas-->
<div class="row">
    <section class="content-header">
        <h1>
            Total Value
            <small>Cement Production</small>
        </h1>
    </section>
</div>
<div class="row">
    <div class="col-xs-12  col-md-2 noPadding">
        <div class=" headsix cubesRun" > 
            <div class="col-xs-2 noPadding"  style="font-weight: bold; ">SP</div>
            <div class="col-xs-10 noPadding" align="right">RKAP : 
                <?php
                for ($i = 1; $i <= 12; $i++) {
                    if (strlen($i) < 2) {
                        $my_month = '0' . $i;
                    } else {
                        $my_month = $i;
                    }

                    if (empty($myData["$thn-$my_month"])) {
                        $myData["$thn-$my_month"]['indarung2'] = 0;
                        $myData["$thn-$my_month"]['indarung3'] = 0;
                        $myData["$thn-$my_month"]['indarung4'] = 0;
                        $myData["$thn-$my_month"]['indarung5'] = 0;
                        $myData["$thn-$my_month"]['dumai'] = 0;
                    }
                }
                $total_upto_year_sp = (array_sum(($myData["$thn-01"]))) + (array_sum(($myData["$thn-02"]))) + (array_sum(($myData["$thn-03"]))) + (array_sum(($myData["$thn-04"]))) + (array_sum(($myData["$thn-05"]))) + (array_sum(($myData["$thn-06"]))) + (array_sum(($myData["$thn-07"]))) + (array_sum(($myData["$thn-08"]))) + (array_sum(($myData["$thn-09"]))) + (array_sum(($myData["$thn-10"]))) + (array_sum(($myData["$thn-11"]))) + (array_sum(($myData["$thn-12"])));

                $total_rkap_year_sp = ($DProduction[1]['cement']) + ($DProduction[2]['cement']) + ($DProduction[3]['cement']) + ($DProduction[4]['cement']) + ($DProduction[5]['cement']) + ($DProduction[6]['cement']) + ($DProduction[7]['cement']) + ($DProduction[8]['cement']) + ($DProduction[9]['cement']) + ($DProduction[10]['cement']) + ($DProduction[11]['cement']) + ($DProduction[12]['cement']);
                echo number_format($total_rkap_year_sp)
                ?> T</div>
            <?php
            $hasil_year_sp = ($total_upto_year_sp / $total_rkap_year_sp) * 100;
            if ($hasil_year_sp < 100) {
                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_year_sp, 2, ",", ".") . '%</h4></div>';
            } else {
                echo '<div class="col-xs-12 noPadding" align="center" style="color: #6bbb3e"><h4>' . number_format($hasil_year_sp, 2, ",", ".") . '%</h4></div>';
            }
            ?>
            Real : 
            <span class="row-xs-2 noPadding" align="left"  style="font-weight: bold;"><?php echo number_format($total_upto_year_sp) ?> T</span>
        </div>

    </div>
    <div class="col-xs-12  col-md-2 noPadding">
        <div class="headsix cubesRun" > 
            <div class="col-xs-2 noPadding"  style="font-weight: bold;">IND II</div>
            <div class="col-xs-10 noPadding" align="right">RKAP :
                <?php
                for ($i = 1; $i <= 12; $i++) {
                    if (strlen($i) < 2) {
                        $my_month = '0' . $i;
                    } else {
                        $my_month = $i;
                    }

                    if (empty($myData["$thn-$my_month"]['indarung2'])) {
                        $myData["$thn-$my_month"]['indarung2'] = 0;
                        $myData["$thn-$my_month"]['indarung3'] = 0;
                        $myData["$thn-$my_month"]['indarung4'] = 0;
                        $myData["$thn-$my_month"]['indarung5'] = 0;
                        $myData["$thn-$my_month"]['dumai'] = 0;
                    }
                }
                if (empty($rkap_cement[$thn]['indarung2'])) {
                    $rkap_cement[$thn]['indarung2'] = 0;
                }
                $total_rkap_year_ind2 = $rkap_cement[$thn]['indarung2'];
                $total_upto_year_ind2 = (($myData["$thn-01"]['indarung2']) + ($myData["$thn-02"]['indarung2']) + ($myData["$thn-03"]['indarung2'])) + (($myData["$thn-04"]['indarung2']) + ($myData["$thn-05"]['indarung2']) + ($myData["$thn-06"]['indarung2'])) + (($myData["$thn-07"]['indarung2']) + ($myData["$thn-08"]['indarung2']) + ($myData["$thn-09"]['indarung2'])) + (($myData["$thn-10"]['indarung2']) + ($myData["$thn-11"]['indarung2']) + ($myData["$thn-12"]['indarung2']));

                echo number_format($total_rkap_year_ind2)
                ?> T</div>
            <?php
            $hasil_year_ind2 = @($total_upto_year_ind2 / $total_rkap_year_ind2) * 100;
            if ($hasil_year_ind2 < 100) {
                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_year_ind2, 2, ",", ".") . '%</h4></div>';
            } else {
                echo '<div class="col-xs-12 noPadding" align="center" style="color: #6bbb3e"><h4>' . number_format($hasil_year_ind2, 2, ",", ".") . '%</h4></div>';
            }
            ?>
            Real : 
            <span class="row-xs-2 noPadding" align="left"  style="font-weight: bold;"><?php echo number_format($total_upto_year_ind2) ?> T</span>
        </div>

    </div>
    <div class="col-xs-12  col-md-2 noPadding">
        <div class="headsix cubesRun" > 
            <div class="col-xs-2 noPadding"  style="font-weight: bold;">IND III</div>
            <div class="col-xs-10 noPadding" align="right">RKAP : 
                <?php
                for ($i = 1; $i <= 12; $i++) {
                    if (strlen($i) < 2) {
                        $my_month = '0' . $i;
                    } else {
                        $my_month = $i;
                    }

                    if (empty($myData["$thn-$my_month"]['indarung3'])) {
                        $myData["$thn-$my_month"]['indarung2'] = 0;
                        $myData["$thn-$my_month"]['indarung3'] = 0;
                        $myData["$thn-$my_month"]['indarung4'] = 0;
                        $myData["$thn-$my_month"]['indarung5'] = 0;
                        $myData["$thn-$my_month"]['dumai'] = 0;
                    }
                }
                if (empty($rkap_cement[$thn]['indarung3'])) {
                    $rkap_cement[$thn]['indarung3'] = 0;
                }

                $total_rkap_year_ind3 = $rkap_cement[$thn]['indarung3'];
                $total_upto_year_ind3 = (($myData["$thn-01"]['indarung3']) + ($myData["$thn-02"]['indarung3']) + ($myData["$thn-03"]['indarung3'])) + (($myData["$thn-04"]['indarung3']) + ($myData["$thn-05"]['indarung3']) + ($myData["$thn-06"]['indarung3'])) + (($myData["$thn-07"]['indarung3']) + ($myData["$thn-08"]['indarung3']) + ($myData["$thn-09"]['indarung3'])) + (($myData["$thn-10"]['indarung3']) + ($myData["$thn-11"]['indarung3']) + ($myData["$thn-12"]['indarung3']));

                echo number_format($total_rkap_year_ind3)
                ?> T</div>
            <?php
            $hasil_year_ind3 = @($total_upto_year_ind3 / $total_rkap_year_ind3) * 100;
            if ($hasil_year_ind3 < 100) {
                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_year_ind3, 2, ",", ".") . '%</h4></div>';
            } else {
                echo '<div class="col-xs-12 noPadding" align="center" style="color: #6bbb3e"><h4>' . number_format($hasil_year_ind3, 2, ",", ".") . '%</h4></div>';
            }
            ?>
            Real : 
            <span class="row-xs-2 noPadding" align="left"  style="font-weight: bold;"><?php echo number_format($total_upto_year_ind3) ?> T</span>
        </div>
    </div>
    <div class="col-xs-12  col-md-2 noPadding">
        <div class="headsix cubesRun" > 
            <div class="col-xs-2 noPadding"  style="font-weight: bold;">IND IV</div>
            <div class="col-xs-10 noPadding" align="right">RKAP : 
                <?php
                for ($i = 1; $i <= 12; $i++) {
                    if (strlen($i) < 2) {
                        $my_month = '0' . $i;
                    } else {
                        $my_month = $i;
                    }

                    if (empty($myData["$thn-$my_month"]['indarung4'])) {
                        $myData["$thn-$my_month"]['indarung2'] = 0;
                        $myData["$thn-$my_month"]['indarung3'] = 0;
                        $myData["$thn-$my_month"]['indarung4'] = 0;
                        $myData["$thn-$my_month"]['indarung5'] = 0;
                        $myData["$thn-$my_month"]['dumai'] = 0;
                    }
                }
                if (empty($rkap_cement[$thn]['indarung4'])) {
                    $rkap_cement[$thn]['indarung4'] = 0;
                }
                $total_rkap_year_ind4 = $rkap_cement[$thn]['indarung4'];
                $total_upto_year_ind4 = (($myData["$thn-01"]['indarung4']) + ($myData["$thn-02"]['indarung4']) + ($myData["$thn-03"]['indarung4'])) + (($myData["$thn-04"]['indarung4']) + ($myData["$thn-05"]['indarung4']) + ($myData["$thn-06"]['indarung4'])) + (($myData["$thn-07"]['indarung4']) + ($myData["$thn-08"]['indarung4']) + ($myData["$thn-09"]['indarung4'])) + (($myData["$thn-10"]['indarung4']) + ($myData["$thn-11"]['indarung4']) + ($myData["$thn-12"]['indarung4']));
                echo number_format($total_rkap_year_ind4)
                ?> T</div>
            <?php
            $hasil_year_ind4 = @($total_upto_year_ind4 / $total_rkap_year_ind4) * 100;
            if ($hasil_year_ind4 < 100) {
                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_year_ind4, 2, ",", ".") . '%</h4></div>';
            } else {
                echo '<div class="col-xs-12 noPadding" align="center" style="color: #6bbb3e"><h4>' . number_format($hasil_year_ind4, 2, ",", ".") . '%</h4></div>';
            }
            ?>
            Real : 
            <span class="row-xs-2 noPadding" align="left"  style="font-weight: bold;"><?php echo number_format($total_upto_year_ind4) ?> T</span>
        </div>
    </div>
    <div class="col-xs-12  col-md-2 noPadding">
        <div class="headsix cubesRun" > 
            <div class="col-xs-2 noPadding"  style="font-weight: bold;">IND V</div>
            <div class="col-xs-10 noPadding" align="right">RKAP : 
                <?php
                for ($i = 1; $i <= 12; $i++) {
                    if (strlen($i) < 2) {
                        $my_month = '0' . $i;
                    } else {
                        $my_month = $i;
                    }

                    if (empty($myData["$thn-$my_month"]['indarung5'])) {
                        $myData["$thn-$my_month"]['indarung2'] = 0;
                        $myData["$thn-$my_month"]['indarung3'] = 0;
                        $myData["$thn-$my_month"]['indarung4'] = 0;
                        $myData["$thn-$my_month"]['indarung5'] = 0;
                        $myData["$thn-$my_month"]['dumai'] = 0;
                    }
                }
                if (empty($rkap_cement[$thn]['indarung5'])) {
                    $rkap_cement[$thn]['indarung5'] = 0;
                }
                $total_rkap_year_ind5 = $rkap_cement[$thn]['indarung5'];
                $total_upto_year_ind5 = (($myData["$thn-01"]['indarung5']) + ($myData["$thn-02"]['indarung5']) + ($myData["$thn-03"]['indarung5'])) + (($myData["$thn-04"]['indarung5']) + ($myData["$thn-05"]['indarung5']) + ($myData["$thn-06"]['indarung5'])) + (($myData["$thn-07"]['indarung5']) + ($myData["$thn-08"]['indarung5']) + ($myData["$thn-09"]['indarung5'])) + (($myData["$thn-10"]['indarung4']) + ($myData["$thn-11"]['indarung4']) + ($myData["$thn-12"]['indarung4']));
                echo number_format($total_rkap_year_ind5)
                ?> T</div>
            <?php
            $hasil_year_ind5 = @($total_upto_year_ind5 / $total_rkap_year_ind5) * 100;
            if ($hasil_year_ind5 < 100) {
                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_year_ind5, 2, ",", ".") . '%</h4></div>';
            } else {
                echo '<div class="col-xs-12 noPadding" align="center" style="color: #6bbb3e"><h4>' . number_format($hasil_year_ind5, 2, ",", ".") . '%</h4></div>';
            }
            ?>
            Real : 
            <span class="row-xs-2 noPadding" align="left"  style="font-weight: bold;"><?php echo number_format($total_upto_year_ind5) ?> T</span>
        </div>
    </div>
    <div class="col-xs-12  col-md-2 noPadding">
        <div class="headsix cubesRun" > 
            <div class="col-xs-2 noPadding"  style="font-weight: bold;">DMI</div>
            <div class="col-xs-10 noPadding" align="right">RKAP : 
                <?php
                for ($i = 1; $i <= 12; $i++) {
                    if (strlen($i) < 2) {
                        $my_month = '0' . $i;
                    } else {
                        $my_month = $i;
                    }

                    if (empty($myData["$thn-$my_month"]['dumai'])) {
                        $myData["$thn-$my_month"]['indarung2'] = 0;
                        $myData["$thn-$my_month"]['indarung3'] = 0;
                        $myData["$thn-$my_month"]['indarung4'] = 0;
                        $myData["$thn-$my_month"]['indarung5'] = 0;
                        $myData["$thn-$my_month"]['dumai'] = 0;
                    }
                }
                if (empty($rkap_cement[$thn]['dumai'])) {
                    $rkap_cement[$thn]['dumai'] = 0;
                }
                $total_rkap_year_dmi = $rkap_cement[$thn]['dumai'];
                $total_upto_year_dmi = (($myData["$thn-01"]['dumai']) + ($myData["$thn-02"]['dumai']) + ($myData["$thn-03"]['dumai'])) + (($myData["$thn-04"]['dumai']) + ($myData["$thn-05"]['dumai']) + ($myData["$thn-06"]['dumai'])) + (($myData["$thn-07"]['dumai']) + ($myData["$thn-08"]['dumai']) + ($myData["$thn-09"]['dumai'])) + (($myData["$thn-10"]['indarung4']) + ($myData["$thn-11"]['indarung4']) + ($myData["$thn-12"]['indarung4']));
                echo number_format($total_rkap_year_dmi)
                ?> T</div>
            <?php
            $hasil_year_dmi = @($total_upto_year_dmi / $total_rkap_year_dmi) * 100;
            if ($hasil_year_dmi < 100) {
                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_year_dmi, 2, ",", ".") . '%</h4></div>';
            } else {
                echo '<div class="col-xs-12 noPadding" align="center" style="color: #6bbb3e"><h4>' . number_format($hasil_year_dmi, 2, ",", ".") . '%</h4></div>';
            }
            ?>
            Real : 
            <span class="row-xs-2 noPadding" align="left"  style="font-weight: bold;"><?php echo number_format($total_upto_year_dmi) ?> T</span>
        </div>
    </div>
</div>
<div class="row">
    <section class="content-header">
        <h1>
            Month View
            <small>Cement Production</small>
        </h1>
    </section>
</div>
<div class="row">
    <div class="col-xs-12 col-md-12" >
        <div class="row">
            <div class="col-xs-12 col-md-3 noPadding" >
                <div class="img-thumbnail cubesRun2">
                    <div class="col-xs-7 noPadding" >
                        <div class="col-xs-2 noPadding" align="center">Jan</div>
                        <?php
                        if (!empty($DProduction[1]['cement'])) {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($DProduction[1]['cement'], 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                        <div class="row-xs-2 noPadding" align="center" >
                            <?php
//                                                    print_r($myData["$thn-01"]);exit;
                            if (!empty($myData["$thn-01"]) && !empty($DProduction[1]['cement'])) {
                                $bulan_view = 1;
                                $pembagi_tetap = $my_day[$bulan_view - 1];

                                if ($bulan_view == $bulan_curret) {
                                    if ($bulan_curret == $bulan_data) {
                                        $last_date = $tgl_data;
                                    } elseif ($bulan_curret > $bulan_data) {
                                        $last_date = $tgl_data;
                                    }
                                } elseif ($bulan_view < $bulan_curret) {
                                    $last_date = $my_day[$bulan_view - 1];
                                }
                                $hasil_jan = (array_sum($myData["$thn-01"])) / ($DProduction[1]['cement']) * 100;

                                $pembagi = $last_date;
                                $rkap_today_jan = ($DProduction[1]['cement']) / $pembagi_tetap;
                                $hasil_today_jan = ((array_sum($myData["$thn-01"])) / ($rkap_today_jan * $pembagi)) * 100;

                                if ($hasil_today_jan < 100) {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_jan, 2, ",", ".") . '%</h4></div>';
                                } else {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_jan, 2, ",", ".") . '%</h4></div>';
                                }
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(array_sum($myData["$thn-01"]), 0, ",", ".") . ' T</div>';
                            } else {
                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format(0, 2, ",", ".") . '%</h4></div>';
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(0, 2, ",", ".") . ' T</div>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-5 noPadding" align="right">
                        <?php
//                                                    print_r($myData["2017-01"]);exit;
                        $no = 1;
                        if (!empty($myData["$thn-01"])) {
                            foreach ($myData["$thn-01"] as $rows) {
                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">';
                                if ($no == 1) {
                                    echo'II';
                                } elseif ($no == 2) {
                                    echo'III';
                                } elseif ($no == 3) {
                                    echo'IV';
                                } elseif ($no == 4) {
                                    echo'V';
                                } elseif ($no == 5) {
                                    echo'DM';
                                }
                                echo '</div>';
                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rows, 0, ",", ".") . ' T</div>';
                                $no++;
                            }
                        } else {
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">V</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">DM</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                    </div>
                </div>

            </div>
            <div class="col-xs-12 col-md-3 noPadding" >
                <div class="img-thumbnail cubesRun2">
                    <div class="col-xs-7 noPadding" >
                        <div class="col-xs-2 noPadding" align="center">Feb</div>
                        <?php
                        if (!empty($DProduction[2]['cement'])) {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($DProduction[2]['cement'], 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                        <div class="row-xs-2 noPadding" align="center" >
                            <?php
                            if (!empty($myData["$thn-02"]) && !empty($DProduction[2]['cement'])) {
                                $bulan_view = 2;
                                $pembagi_tetap = $my_day[$bulan_view - 1];

                                if ($bulan_view == $bulan_curret) {
                                    if ($bulan_curret == $bulan_data) {
                                        $last_date = $tgl_data;
                                    } elseif ($bulan_curret > $bulan_data) {
                                        $last_date = $tgl_data;
                                    }
                                } elseif ($bulan_view < $bulan_curret) {
                                    $last_date = $my_day[$bulan_view - 1];
                                }
                                $hasil_feb = (array_sum($myData["$thn-02"])) / ($DProduction[2]['cement']) * 100;

                                $pembagi = $last_date;
                                $rkap_today_feb = ($DProduction[2]['cement']) / $pembagi_tetap;
                                $hasil_today_feb = ((array_sum($myData["$thn-02"])) / ($rkap_today_feb * $pembagi)) * 100;

                                if ($hasil_today_feb < 100) {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_feb, 2, ",", ".") . '%</h4></div>';
                                } else {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_feb, 2, ",", ".") . '%</h4></div>';
                                }
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(array_sum($myData["$thn-02"]), 0, ",", ".") . ' T</div>';
                            } else {
                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format(0, 2, ",", ".") . '%</h4></div>';
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(0, 2, ",", ".") . ' T</div>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-5 noPadding" align="right">
                        <?php
                        $no = 1;
                        if (!empty($myData["$thn-02"])) {
                            foreach ($myData["$thn-02"] as $rows) {
                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">';
                                if ($no == 1) {
                                    echo'II';
                                } elseif ($no == 2) {
                                    echo'III';
                                } elseif ($no == 3) {
                                    echo'IV';
                                } elseif ($no == 4) {
                                    echo'V';
                                } elseif ($no == 5) {
                                    echo'DM';
                                }
                                echo '</div>';
                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rows, 0, ",", ".") . ' T</div>';
                                $no++;
                            }
                        } else {
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">V</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">DM</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                    </div> 
                </div>
            </div>
            <div class="col-xs-12 col-md-3 noPadding" >
                <div class="img-thumbnail cubesRun2">
                    <div class="col-xs-7 noPadding" >
                        <div class="col-xs-2 noPadding" align="center">Mar</div>
                        <?php
                        if (!empty($DProduction[3]['cement'])) {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($DProduction[3]['cement'], 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                        <div class="row-xs-2 noPadding" align="center" >
                            <?php
                            if (!empty($myData["$thn-03"]) && !empty($DProduction[3]['cement'])) {
                                $bulan_view = 3;
                                $pembagi_tetap = $my_day[$bulan_view - 1];

                                if ($bulan_view == $bulan_curret) {
                                    if ($bulan_curret == $bulan_data) {
                                        $last_date = $tgl_data;
                                    } elseif ($bulan_curret > $bulan_data) {
                                        $last_date = $tgl_data;
                                    }
                                } elseif ($bulan_view < $bulan_curret) {
                                    $last_date = $my_day[$bulan_view - 1];
                                }
                                $hasil_mar = (array_sum($myData["$thn-03"])) / ($DProduction[3]['cement']) * 100;

                                $pembagi = $last_date;
                                $rkap_today_mar = ($DProduction[3]['cement']) / $pembagi_tetap;
                                $hasil_today_mar = ((array_sum($myData["$thn-03"])) / ($rkap_today_mar * $pembagi)) * 100;

                                if ($hasil_today_mar < 100) {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_mar, 2, ",", ".") . '%</h4></div>';
                                } else {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_mar, 2, ",", ".") . '%</h4></div>';
                                }
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(array_sum($myData["$thn-03"]), 0, ",", ".") . ' T</div>';
                            } else {
                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format(0, 2, ",", ".") . '%</h4></div>';
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(0, 2, ",", ".") . ' T</div>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-5 noPadding" align="right">
                        <?php
                        $no = 1;
                        if (!empty($myData["$thn-03"])) {
                            foreach ($myData["$thn-03"] as $rows) {
                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">';
                                if ($no == 1) {
                                    echo'II';
                                } elseif ($no == 2) {
                                    echo'III';
                                } elseif ($no == 3) {
                                    echo'IV';
                                } elseif ($no == 4) {
                                    echo'V';
                                } elseif ($no == 5) {
                                    echo'DM';
                                }
                                echo '</div>';
                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rows, 0, ",", ".") . ' T</div>';
                                $no++;
                            }
                        } else {
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">V</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">DM</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                    </div> 
                </div>
            </div>
            <div class="col-xs-12 col-md-3 noPadding" >
                <div class="headmenu cubesRun2">
                    <div class="col-xs-7 noPadding" >
                        <div class="col-xs-2 noPadding" align="center">Q1</div>
                        <?php
                        if (!empty($DProduction[1]['cement']) || !empty($DProduction[2]['cement']) || !empty($DProduction[3]['cement'])) {
                            $total_rkap_q1 = ($DProduction[1]['cement']) + ($DProduction[2]['cement']) + ($DProduction[3]['cement']);
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($total_rkap_q1, 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                        <div class="row-xs-2 noPadding" align="center" >
                            <?php
                            if (!empty($myData["$thn-01"]) || !empty($myData["$thn-02"]) || !empty($myData["$thn-03"])) {
                                $total_upto_q1 = (array_sum(($myData["$thn-01"]))) + (array_sum(($myData["$thn-02"]))) + (array_sum(($myData["$thn-03"])));
                                $hasil_q1 = ($total_upto_q1 / $total_rkap_q1) * 100;
                                if ($hasil_q1 < 100) {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_q1, 2, ",", ".") . '%</h4></div>';
                                } else {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_q1, 2, ",", ".") . '%</h4></div>';
                                }
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format($total_upto_q1, 0, ",", ".") . ' T</div>';
                            } else {
                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format(0, 2, ",", ".") . '%</h4></div>';
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(0, 2, ",", ".") . ' T</div>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-5 noPadding" align="right">
                        <?php
                        if (!empty($myData["$thn-01"]) || !empty($myData["$thn-02"]) || !empty($myData["$thn-03"])) {
                            $tot_ind2 = (($myData["$thn-01"]['indarung2']) + ($myData["$thn-02"]['indarung2']) + ($myData["$thn-03"]['indarung2']));
                            $tot_ind3 = (($myData["$thn-01"]['indarung3']) + ($myData["$thn-02"]['indarung3']) + ($myData["$thn-03"]['indarung3']));
                            $tot_ind4 = (($myData["$thn-01"]['indarung4']) + ($myData["$thn-02"]['indarung4']) + ($myData["$thn-03"]['indarung4']));
                            $tot_ind5 = (($myData["$thn-01"]['indarung5']) + ($myData["$thn-02"]['indarung5']) + ($myData["$thn-03"]['indarung5']));
                            $tot_dmi = (($myData["$thn-01"]['dumai']) + ($myData["$thn-02"]['dumai']) + ($myData["$thn-03"]['dumai']));

                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_ind2, 0, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_ind3, 0, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_ind4, 0, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">V</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_ind5, 0, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">DM</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_dmi, 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">V</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">DM</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                    </div> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-3 noPadding" >
                <div class="img-thumbnail cubesRun2">
                    <div class="col-xs-7 noPadding" >
                        <div class="col-xs-2 noPadding" align="center">Apr</div>
                        <?php
                        if (!empty($DProduction[4]['cement'])) {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($DProduction[4]['cement'], 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                        <div class="row-xs-2 noPadding" align="center" >
                            <?php
                            if (!empty($myData["$thn-04"]) && !empty($DProduction[4]['cement'])) {
                                $bulan_view = 4;
                                $pembagi_tetap = $my_day[$bulan_view - 1];

                                if ($bulan_view == $bulan_curret) {
                                    if ($bulan_curret == $bulan_data) {
                                        $last_date = $tgl_data;
                                    } elseif ($bulan_curret > $bulan_data) {
                                        $last_date = $tgl_data;
                                    }
                                } elseif ($bulan_view < $bulan_curret) {
                                    $last_date = $my_day[$bulan_view - 1];
                                }
                                $hasil_apr = (array_sum($myData["$thn-04"])) / ($DProduction[4]['cement']) * 100;

                                $pembagi = $last_date;
                                $rkap_today_apr = ($DProduction[4]['cement']) / $pembagi_tetap;
                                $hasil_today_apr = ((array_sum($myData["$thn-04"])) / ($rkap_today_apr * $pembagi)) * 100;

                                if ($hasil_today_apr < 100) {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_apr, 2, ",", ".") . '%</h4></div>';
                                } else {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_apr, 2, ",", ".") . '%</h4></div>';
                                }
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(array_sum($myData["$thn-04"]), 0, ",", ".") . ' T</div>';
                            } else {
                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format(0, 2, ",", ".") . '%</h4></div>';
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(0, 2, ",", ".") . ' T</div>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-5 noPadding" align="right">
                        <?php
                        $no = 1;
                        if (!empty($myData["$thn-04"])) {
                            foreach ($myData["$thn-04"] as $rows) {
                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">';
                                if ($no == 1) {
                                    echo'II';
                                } elseif ($no == 2) {
                                    echo'III';
                                } elseif ($no == 3) {
                                    echo'IV';
                                } elseif ($no == 4) {
                                    echo'V';
                                } elseif ($no == 5) {
                                    echo'DM';
                                }
                                echo '</div>';
                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rows, 0, ",", ".") . ' T</div>';
                                $no++;
                            }
                        } else {
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">V</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">DM</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                    </div> 
                </div>

            </div>
            <div class="col-xs-12 col-md-3 noPadding" >
                <div class="img-thumbnail cubesRun2">
                    <div class="col-xs-7 noPadding" >
                        <div class="col-xs-2 noPadding" align="center">May</div>
                        <?php
                        if (!empty($DProduction[5]['cement'])) {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($DProduction[5]['cement'], 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                        <div class="row-xs-2 noPadding" align="center" >
                            <?php
                            if (!empty($myData["$thn-05"]) && !empty($DProduction[5]['cement'])) {
                                $bulan_view = 5;
                                $pembagi_tetap = $my_day[$bulan_view - 1];

                                if ($bulan_view == $bulan_curret) {
                                    if ($bulan_curret == $bulan_data) {
                                        $last_date = $tgl_data;
                                    } elseif ($bulan_curret > $bulan_data) {
                                        $last_date = $tgl_data;
                                    }
                                } elseif ($bulan_view < $bulan_curret) {
                                    $last_date = $my_day[$bulan_view - 1];
                                }
                                $hasil_may = (array_sum($myData["$thn-05"])) / ($DProduction[5]['cement']) * 100;

                                $pembagi = $last_date;
                                $rkap_today_may = ($DProduction[5]['cement']) / $pembagi_tetap;
                                $hasil_today_may = ((array_sum($myData["$thn-05"])) / ($rkap_today_may * $pembagi)) * 100;

                                if ($hasil_today_may < 100) {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_may, 2, ",", ".") . '%</h4></div>';
                                } else {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_may, 2, ",", ".") . '%</h4></div>';
                                }
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(array_sum($myData["$thn-05"]), 0, ",", ".") . ' T</div>';
                            } else {
                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format(0, 2, ",", ".") . '%</h4></div>';
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(0, 2, ",", ".") . ' T</div>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-5 noPadding" align="right">
                        <?php
                        $no = 1;
                        if (!empty($myData["$thn-05"])) {
                            foreach ($myData["$thn-05"] as $rows) {
                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">';
                                if ($no == 1) {
                                    echo'II';
                                } elseif ($no == 2) {
                                    echo'III';
                                } elseif ($no == 3) {
                                    echo'IV';
                                } elseif ($no == 4) {
                                    echo'V';
                                } elseif ($no == 5) {
                                    echo'DM';
                                }
                                echo '</div>';
                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rows, 0, ",", ".") . ' T</div>';
                                $no++;
                            }
                        } else {
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">V</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">DM</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                    </div> 
                </div>
            </div>
            <div class="col-xs-12 col-md-3 noPadding" >
                <div class="img-thumbnail cubesRun2">
                    <div class="col-xs-7 noPadding" >
                        <div class="col-xs-2 noPadding" align="center">Jun</div>
                        <?php
                        if (!empty($DProduction[6]['cement'])) {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($DProduction[6]['cement'], 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                        <div class="row-xs-2 noPadding" align="center" >
                            <?php
                            if (!empty($myData["$thn-06"]) && !empty($DProduction[6]['cement'])) {
                                $bulan_view = 6;
                                $pembagi_tetap = $my_day[$bulan_view - 1];

                                if ($bulan_view == $bulan_curret) {
                                    if ($bulan_curret == $bulan_data) {
                                        $last_date = $tgl_data;
                                    } elseif ($bulan_curret > $bulan_data) {
                                        $last_date = $tgl_data;
                                    }
                                } elseif ($bulan_view < $bulan_curret) {
                                    $last_date = $my_day[$bulan_view - 1];
                                }
                                $hasil_jun = (array_sum($myData["$thn-06"])) / ($DProduction[6]['cement']) * 100;

                                $pembagi = $last_date;
                                $rkap_today_jun = ($DProduction[6]['cement']) / $pembagi_tetap;
                                $hasil_today_jun = ((array_sum($myData["$thn-06"])) / ($rkap_today_jun * $pembagi)) * 100;

                                if ($hasil_today_jun < 100) {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_jun, 2, ",", ".") . '%</h4></div>';
                                } else {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_jun, 2, ",", ".") . '%</h4></div>';
                                }
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(array_sum($myData["$thn-06"]), 0, ",", ".") . ' T</div>';
                            } else {
                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format(0, 2, ",", ".") . '%</h4></div>';
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(0, 2, ",", ".") . ' T</div>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-5 noPadding" align="right">
                        <?php
                        $no = 1;
                        if (!empty($myData["$thn-06"])) {
                            foreach ($myData["$thn-06"] as $rows) {
                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">';
                                if ($no == 1) {
                                    echo'II';
                                } elseif ($no == 2) {
                                    echo'III';
                                } elseif ($no == 3) {
                                    echo'IV';
                                } elseif ($no == 4) {
                                    echo'V';
                                } elseif ($no == 5) {
                                    echo'DM';
                                }
                                echo '</div>';
                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rows, 0, ",", ".") . ' T</div>';
                                $no++;
                            }
                        } else {
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">V</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">DM</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                    </div> 
                </div>
            </div>
            <div class="col-xs-12 col-md-3 noPadding" >
                <div class="headmenu cubesRun2">
                    <div class="col-xs-7 noPadding" >
                        <div class="col-xs-2 noPadding" align="center">Q2</div>
                        <?php
                        if (!empty($DProduction[4]['cement']) || !empty($DProduction[5]['cement']) || !empty($DProduction[6]['cement'])) {
                            $total_rkap_q2 = ($DProduction[4]['cement']) + ($DProduction[5]['cement']) + ($DProduction[6]['cement']);
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($total_rkap_q2, 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                        <div class="row-xs-2 noPadding" align="center" >
                            <?php
                            if (!empty($myData["$thn-04"]) || !empty($myData["$thn-05"]) || !empty($myData["$thn-06"])) {
                                $total_upto_q2 = (array_sum(($myData["$thn-04"]))) + (array_sum(($myData["$thn-05"]))) + (array_sum(($myData["$thn-06"])));
                                $hasil_q2 = ($total_upto_q2 / $total_rkap_q2) * 100;
                                if ($hasil_q2 < 100) {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_q2, 2, ",", ".") . '%</h4></div>';
                                } else {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_q2, 2, ",", ".") . '%</h4></div>';
                                }
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format($total_upto_q2, 0, ",", ".") . ' T</div>';
                            } else {
                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format(0, 2, ",", ".") . '%</h4></div>';
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(0, 2, ",", ".") . ' T</div>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-5 noPadding" align="right">
                        <?php
                        if (!empty($myData["$thn-04"]) || !empty($myData["$thn-05"]) || !empty($myData["$thn-06"])) {
                            $tot_ind2 = (($myData["$thn-04"]['indarung2']) + ($myData["$thn-05"]['indarung2']) + ($myData["$thn-06"]['indarung2']));
                            $tot_ind3 = (($myData["$thn-04"]['indarung3']) + ($myData["$thn-05"]['indarung3']) + ($myData["$thn-06"]['indarung3']));
                            $tot_ind4 = (($myData["$thn-04"]['indarung4']) + ($myData["$thn-05"]['indarung4']) + ($myData["$thn-06"]['indarung4']));
                            $tot_ind5 = (($myData["$thn-04"]['indarung5']) + ($myData["$thn-05"]['indarung5']) + ($myData["$thn-06"]['indarung5']));
                            $tot_dmi = (($myData["$thn-04"]['dumai']) + ($myData["$thn-05"]['dumai']) + ($myData["$thn-06"]['dumai']));

                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_ind2, 0, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_ind3, 0, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_ind4, 0, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">V</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_ind5, 0, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">DM</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_dmi, 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">V</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">DM</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                    </div> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-3 noPadding" >
                <div class="img-thumbnail cubesRun2">
                    <div class="col-xs-7 noPadding" >
                        <div class="col-xs-2 noPadding" align="center">Jul</div>
                        <?php
                        if (!empty($DProduction[7]['cement'])) {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($DProduction[7]['cement'], 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                        <div class="row-xs-2 noPadding" align="center" >
                            <?php
                            if (!empty($myData["$thn-07"]) && !empty($DProduction[7]['cement'])) {
                                $bulan_view = 7;
                                $pembagi_tetap = $my_day[$bulan_view - 1];

                                if ($bulan_view == $bulan_curret) {
                                    if ($bulan_curret == $bulan_data) {
                                        $last_date = $tgl_data;
                                    } elseif ($bulan_curret > $bulan_data) {
                                        $last_date = $tgl_data;
                                    }
                                } elseif ($bulan_view < $bulan_curret) {
                                    $last_date = $my_day[$bulan_view - 1];
                                }
                                $hasil_jul = (array_sum($myData["$thn-07"])) / ($DProduction[7]['cement']) * 100;

                                $pembagi = $last_date;
                                $rkap_today_jul = ($DProduction[7]['cement']) / $pembagi_tetap;
                                $hasil_today_jul = ((array_sum($myData["$thn-07"])) / ($rkap_today_jul * $pembagi)) * 100;

                                if ($hasil_today_jul < 100) {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_jul, 2, ",", ".") . '%</h4></div>';
                                } else {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_jul, 2, ",", ".") . '%</h4></div>';
                                }
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(array_sum($myData["$thn-07"]), 0, ",", ".") . ' T</div>';
                            } else {
                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format(0, 2, ",", ".") . '%</h4></div>';
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(0, 2, ",", ".") . ' T</div>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-5 noPadding" align="right">
                        <?php
                        $no = 1;
                        if (!empty($myData["$thn-07"])) {
                            foreach ($myData["$thn-07"] as $rows) {
                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">';
                                if ($no == 1) {
                                    echo'II';
                                } elseif ($no == 2) {
                                    echo'III';
                                } elseif ($no == 3) {
                                    echo'IV';
                                } elseif ($no == 4) {
                                    echo'V';
                                } elseif ($no == 5) {
                                    echo'DM';
                                }
                                echo '</div>';
                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rows, 0, ",", ".") . ' T</div>';
                                $no++;
                            }
                        } else {
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">V</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">DM</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                    </div> 
                </div>

            </div>
            <div class="col-xs-12 col-md-3 noPadding" >
                <div class="img-thumbnail cubesRun2">
                    <div class="col-xs-7 noPadding" >
                        <div class="col-xs-2 noPadding" align="center">Aug</div>
                        <?php
                        if (!empty($DProduction[8]['cement'])) {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($DProduction[8]['cement'], 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                        <div class="row-xs-2 noPadding" align="center" >
                            <?php
                            if (!empty($myData["$thn-08"]) && !empty($DProduction[8]['cement'])) {
                                $bulan_view = 8;
                                $pembagi_tetap = $my_day[$bulan_view - 1];

                                if ($bulan_view == $bulan_curret) {
                                    if ($bulan_curret == $bulan_data) {
                                        $last_date = $tgl_data;
                                    } elseif ($bulan_curret > $bulan_data) {
                                        $last_date = $tgl_data;
                                    }
                                } elseif ($bulan_view < $bulan_curret) {
                                    $last_date = $my_day[$bulan_view - 1];
                                }
                                $hasil_aug = (array_sum($myData["$thn-08"])) / ($DProduction[8]['cement']) * 100;

                                $pembagi = $last_date;
                                $rkap_today_aug = ($DProduction[8]['cement']) / $pembagi_tetap;
                                $hasil_today_aug = ((array_sum($myData["$thn-08"])) / ($rkap_today_aug * $pembagi)) * 100;

                                if ($hasil_today_aug < 100) {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_aug, 2, ",", ".") . '%</h4></div>';
                                } else {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_aug, 2, ",", ".") . '%</h4></div>';
                                }
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(array_sum($myData["$thn-08"]), 0, ",", ".") . ' T</div>';
                            } else {
                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format(0, 2, ",", ".") . '%</h4></div>';
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(0, 2, ",", ".") . ' T</div>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-5 noPadding" align="right">
                        <?php
                        $no = 1;
                        if (!empty($myData["$thn-08"])) {
                            foreach ($myData["$thn-08"] as $rows) {
                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">';
                                if ($no == 1) {
                                    echo'II';
                                } elseif ($no == 2) {
                                    echo'III';
                                } elseif ($no == 3) {
                                    echo'IV';
                                } elseif ($no == 4) {
                                    echo'V';
                                } elseif ($no == 5) {
                                    echo'DM';
                                }
                                echo '</div>';
                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rows, 0, ",", ".") . ' T</div>';
                                $no++;
                            }
                        } else {
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">V</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">DM</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                    </div> 
                </div>
            </div>
            <div class="col-xs-12 col-md-3 noPadding" >
                <div class="img-thumbnail cubesRun2">
                    <div class="col-xs-7 noPadding" >
                        <div class="col-xs-2 noPadding" align="center">Sep</div>
                        <?php
                        if (!empty($DProduction[9]['cement'])) {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($DProduction[9]['cement'], 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                        <div class="row-xs-2 noPadding" align="center" >
                            <?php
                            if (!empty($myData["$thn-09"]) && !empty($DProduction[9]['cement'])) {
                                $bulan_view = 9;
                                $pembagi_tetap = $my_day[$bulan_view - 1];

                                if ($bulan_view == $bulan_curret) {
                                    if ($bulan_curret == $bulan_data) {
                                        $last_date = $tgl_data;
                                    } elseif ($bulan_curret > $bulan_data) {
                                        $last_date = $tgl_data;
                                    }
                                } elseif ($bulan_view < $bulan_curret) {
                                    $last_date = $my_day[$bulan_view - 1];
                                }
                                $hasil_sep = (array_sum($myData["$thn-09"])) / ($DProduction[9]['cement']) * 100;

                                $pembagi = $last_date;
                                $rkap_today_sep = ($DProduction[9]['cement']) / $pembagi_tetap;
                                $hasil_today_sep = ((array_sum($myData["$thn-09"])) / ($rkap_today_sep * $pembagi)) * 100;

                                if ($hasil_today_sep < 100) {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_sep, 2, ",", ".") . '%</h4></div>';
                                } else {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_sep, 2, ",", ".") . '%</h4></div>';
                                }
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(array_sum($myData["$thn-09"]), 0, ",", ".") . ' T</div>';
                            } else {
                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format(0, 2, ",", ".") . '%</h4></div>';
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(0, 2, ",", ".") . ' T</div>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-5 noPadding" align="right">
                        <?php
                        $no = 1;
                        if (!empty($myData["$thn-09"])) {
                            foreach ($myData["$thn-09"] as $rows) {
                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">';
                                if ($no == 1) {
                                    echo'II';
                                } elseif ($no == 2) {
                                    echo'III';
                                } elseif ($no == 3) {
                                    echo'IV';
                                } elseif ($no == 4) {
                                    echo'V';
                                } elseif ($no == 5) {
                                    echo'DM';
                                }
                                echo '</div>';
                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rows, 0, ",", ".") . ' T</div>';
                                $no++;
                            }
                        } else {
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">V</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">DM</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                    </div> 
                </div>
            </div>
            <div class="col-xs-12 col-md-3 noPadding" >
                <div class="headmenu cubesRun2">
                    <div class="col-xs-7 noPadding" >
                        <div class="col-xs-2 noPadding" align="center">Q3</div>
                        <?php
                        if (!empty($DProduction[7]['cement']) || !empty($DProduction[8]['cement']) || !empty($DProduction[9]['cement'])) {
                            $total_rkap_q3 = ($DProduction[7]['cement']) + ($DProduction[8]['cement']) + ($DProduction[9]['cement']);
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($total_rkap_q3, 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                        <div class="row-xs-2 noPadding" align="center" >
                            <?php
                            if (!empty($myData["$thn-07"]) || !empty($myData["$thn-08"]) || !empty($myData["$thn-09"])) {
                                $total_upto_q3 = (array_sum(($myData["$thn-07"]))) + (array_sum(($myData["$thn-08"]))) + (array_sum(($myData["$thn-09"])));
                                $hasil_q3 = ($total_upto_q3 / $total_rkap_q3) * 100;
                                if ($hasil_q3 < 100) {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_q3, 2, ",", ".") . '%</h4></div>';
                                } else {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_q3, 2, ",", ".") . '%</h4></div>';
                                }
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format($total_upto_q3, 0, ",", ".") . ' T</div>';
                            } else {
                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format(0, 2, ",", ".") . '%</h4></div>';
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(0, 2, ",", ".") . ' T</div>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-5 noPadding" align="right">
                        <?php
                        if (!empty($myData["$thn-07"]) || !empty($myData["$thn-08"]) || !empty($myData["$thn-09"])) {
                            $tot_ind2 = (($myData["$thn-07"]['indarung2']) + ($myData["$thn-08"]['indarung2']) + ($myData["$thn-09"]['indarung2']));
                            $tot_ind3 = (($myData["$thn-07"]['indarung3']) + ($myData["$thn-08"]['indarung3']) + ($myData["$thn-09"]['indarung3']));
                            $tot_ind4 = (($myData["$thn-07"]['indarung4']) + ($myData["$thn-08"]['indarung4']) + ($myData["$thn-09"]['indarung4']));
                            $tot_ind5 = (($myData["$thn-07"]['indarung5']) + ($myData["$thn-08"]['indarung5']) + ($myData["$thn-09"]['indarung5']));
                            $tot_dmi = (($myData["$thn-07"]['dumai']) + ($myData["$thn-08"]['dumai']) + ($myData["$thn-09"]['dumai']));

                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_ind2, 0, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_ind3, 0, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_ind4, 0, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">V</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_ind5, 0, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">DM</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_dmi, 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">V</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">DM</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                    </div> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-3 noPadding" >
                <div class="img-thumbnail cubesRun2">
                    <div class="col-xs-7 noPadding" >
                        <div class="col-xs-2 noPadding" align="center">Oct</div>
                        <?php
                        if (!empty($DProduction[10]['cement'])) {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($DProduction[10]['cement'], 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                        <div class="row-xs-2 noPadding" align="center" >
                            <?php
                            if (!empty($myData["$thn-10"]) && !empty($DProduction[10]['cement'])) {
                                $bulan_view = 10;
                                $pembagi_tetap = $my_day[$bulan_view - 1];

                                if ($bulan_view == $bulan_curret) {
                                    if ($bulan_curret == $bulan_data) {
                                        $last_date = $tgl_data;
                                    } elseif ($bulan_curret > $bulan_data) {
                                        $last_date = $tgl_data;
                                    }
                                } elseif ($bulan_view < $bulan_curret) {
                                    $last_date = $my_day[$bulan_view - 1];
                                }
                                $hasil_oct = (array_sum($myData["$thn-10"])) / ($DProduction[10]['cement']) * 100;

                                $pembagi = $last_date;
                                $rkap_today_oct = ($DProduction[10]['cement']) / $pembagi_tetap;
                                $hasil_today_oct = ((array_sum($myData["$thn-10"])) / ($rkap_today_oct * $pembagi)) * 100;

                                if ($hasil_today_oct < 100) {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_oct, 2, ",", ".") . '%</h4></div>';
                                } else {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_oct, 2, ",", ".") . '%</h4></div>';
                                }
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(array_sum($myData["$thn-10"]), 0, ",", ".") . ' T</div>';
                            } else {
                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format(0, 2, ",", ".") . '%</h4></div>';
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(0, 2, ",", ".") . ' T</div>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-5 noPadding" align="right">
                        <?php
                        $no = 1;
                        if (!empty($myData["$thn-10"])) {
                            foreach ($myData["$thn-10"] as $rows) {
                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">';
                                if ($no == 1) {
                                    echo'II';
                                } elseif ($no == 2) {
                                    echo'III';
                                } elseif ($no == 3) {
                                    echo'IV';
                                } elseif ($no == 4) {
                                    echo'V';
                                } elseif ($no == 5) {
                                    echo'DM';
                                }
                                echo '</div>';
                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rows, 0, ",", ".") . ' T</div>';
                                $no++;
                            }
                        } else {
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">V</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">DM</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                    </div> 
                </div>

            </div>
            <div class="col-xs-12 col-md-3 noPadding" >
                <div class="img-thumbnail cubesRun2">
                    <div class="col-xs-7 noPadding" >
                        <div class="col-xs-2 noPadding" align="center">Nov</div>
                        <?php
                        if (!empty($DProduction[11]['cement'])) {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($DProduction[11]['cement'], 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                        <div class="row-xs-2 noPadding" align="center" >
                            <?php
                            if (!empty($myData["$thn-11"]) && !empty($DProduction[11]['cement'])) {
                                $bulan_view = 11;
                                $pembagi_tetap = $my_day[$bulan_view - 1];

                                if ($bulan_view == $bulan_curret) {
                                    if ($bulan_curret == $bulan_data) {
                                        $last_date = $tgl_data;
                                    } elseif ($bulan_curret > $bulan_data) {
                                        $last_date = $tgl_data;
                                    }
                                } elseif ($bulan_view < $bulan_curret) {
                                    $last_date = $my_day[$bulan_view - 1];
                                }
                                $hasil_nov = (array_sum($myData["$thn-11"])) / ($DProduction[11]['cement']) * 100;

                                $pembagi = $last_date;
                                $rkap_today_nov = ($DProduction[11]['cement']) / $pembagi_tetap;
                                $hasil_today_nov = ((array_sum($myData["$thn-11"])) / ($rkap_today_nov * $pembagi)) * 100;

                                if ($hasil_today_nov < 100) {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_nov, 2, ",", ".") . '%</h4></div>';
                                } else {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_nov, 2, ",", ".") . '%</h4></div>';
                                }
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(array_sum($myData["$thn-11"]), 0, ",", ".") . ' T</div>';
                            } else {
                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format(0, 2, ",", ".") . '%</h4></div>';
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(0, 2, ",", ".") . ' T</div>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-5 noPadding" align="right">
                        <?php
                        $no = 1;
                        if (!empty($myData["$thn-11"])) {
                            foreach ($myData["$thn-11"] as $rows) {
                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">';
                                if ($no == 1) {
                                    echo'II';
                                } elseif ($no == 2) {
                                    echo'III';
                                } elseif ($no == 3) {
                                    echo'IV';
                                } elseif ($no == 4) {
                                    echo'V';
                                } elseif ($no == 5) {
                                    echo'DM';
                                }
                                echo '</div>';
                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rows, 0, ",", ".") . ' T</div>';
                                $no++;
                            }
                        } else {
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">V</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">DM</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                    </div> 
                </div>
            </div>
            <div class="col-xs-12 col-md-3 noPadding" >
                <div class="img-thumbnail cubesRun2">
                    <div class="col-xs-7 noPadding" >
                        <div class="col-xs-2 noPadding" align="center">Dec</div>
                        <?php
                        if (!empty($DProduction[12]['cement'])) {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($DProduction[12]['cement'], 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                        <div class="row-xs-2 noPadding" align="center" >
                            <?php
                            if (!empty($myData["$thn-12"]) && !empty($DProduction[12]['cement'])) {
                                $bulan_view = 12;
                                $pembagi_tetap = $my_day[$bulan_view - 1];

                                if ($bulan_view == $bulan_curret) {
                                    if ($bulan_curret == $bulan_data) {
                                        $last_date = $tgl_data;
                                    } elseif ($bulan_curret > $bulan_data) {
                                        $last_date = $tgl_data;
                                    }
                                } elseif ($bulan_view < $bulan_curret) {
                                    $last_date = $my_day[$bulan_view - 1];
                                }
                                $hasil_dec = (array_sum($myData["$thn-12"])) / ($DProduction[12]['cement']) * 100;

                                $pembagi = $last_date;
                                $rkap_today_dec = ($DProduction[12]['cement']) / $pembagi_tetap;
                                $hasil_today_dec = ((array_sum($myData["$thn-12"])) / ($rkap_today_dec * $pembagi)) * 100;

                                if ($hasil_today_dec < 100) {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_dec, 2, ",", ".") . '%</h4></div>';
                                } else {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_dec, 2, ",", ".") . '%</h4></div>';
                                }
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(array_sum($myData["$thn-12"]), 0, ",", ".") . ' T</div>';
                            } else {
                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format(0, 2, ",", ".") . '%</h4></div>';
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(0, 2, ",", ".") . ' T</div>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-5 noPadding" align="right">
                        <?php
                        $no = 1;
                        if (!empty($myData["$thn-12"])) {
                            foreach ($myData["$thn-12"] as $rows) {
                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">';
                                if ($no == 1) {
                                    echo'II';
                                } elseif ($no == 2) {
                                    echo'III';
                                } elseif ($no == 3) {
                                    echo'IV';
                                } elseif ($no == 4) {
                                    echo'V';
                                } elseif ($no == 5) {
                                    echo'DM';
                                }
                                echo '</div>';
                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rows, 0, ",", ".") . ' T</div>';
                                $no++;
                            }
                        } else {
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">V</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">DM</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                    </div> 
                </div>
            </div>
            <div class="col-xs-12 col-md-3 noPadding" >
                <div class="headmenu cubesRun2">
                    <div class="col-xs-7 noPadding" >
                        <div class="col-xs-2 noPadding" align="center">Q4</div>
                        <?php
                        if (!empty($DProduction[10]['cement']) || !empty($DProduction[11]['cement']) || !empty($DProduction[12]['cement'])) {
                            $total_rkap_q4 = ($DProduction[10]['cement']) + ($DProduction[11]['cement']) + ($DProduction[12]['cement']);
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($total_rkap_q4, 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                        <div class="row-xs-2 noPadding" align="center" >
                            <?php
                            if (!empty($myData["$thn-10"]) || !empty($myData["$thn-11"]) || !empty($myData["$thn-12"])) {
                                $total_upto_q4 = (array_sum(($myData["$thn-10"]))) + (array_sum(($myData["$thn-11"]))); // + (array_sum(($myData["$thn-12"])));
                                $hasil_q4 = ($total_upto_q4 / $total_rkap_q4) * 100;
                                if ($hasil_q4 < 100) {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #d9534f"><h4>' . number_format($hasil_q4, 2, ",", ".") . '%</h4></div>';
                                } else {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_q4, 2, ",", ".") . '%</h4></div>';
                                }
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format($total_upto_q4, 0, ",", ".") . ' T</div>';
                            } else {
                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format(0, 2, ",", ".") . '%</h4></div>';
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(0, 2, ",", ".") . ' T</div>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-5 noPadding" align="right">
                        <?php
                        if (!empty($myData["$thn-10"]) || !empty($myData["$thn-11"]) || !empty($myData["$thn-12"])) {
                            $tot_ind2 = (($myData["$thn-10"]['indarung2']) + ($myData["$thn-11"]['indarung2']) + ($myData["$thn-12"]['indarung2']));
                            $tot_ind3 = (($myData["$thn-10"]['indarung3']) + ($myData["$thn-11"]['indarung3']) + ($myData["$thn-12"]['indarung3']));
                            $tot_ind4 = (($myData["$thn-10"]['indarung4']) + ($myData["$thn-11"]['indarung4']) + ($myData["$thn-12"]['indarung4']));
                            $tot_ind5 = (($myData["$thn-10"]['indarung5']) + ($myData["$thn-11"]['indarung5']) + ($myData["$thn-12"]['indarung5']));
                            $tot_dmi = (($myData["$thn-10"]['dumai']) + ($myData["$thn-11"]['dumai']) + ($myData["$thn-12"]['dumai']));

                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_ind2, 0, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_ind3, 0, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_ind4, 0, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">V</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_ind5, 0, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">DM</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_dmi, 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">V</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">DM</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<style>
	.cubesRun2 > div:first-child > div:first-child{
		font-weight: bold;
		position: absolute;
		font-size: 20px;
	}
</style>