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
        min-height:100px;
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
    $(function() {
        $('#btn_prod_semen').click(function() {
            window.location.href = 'index.php/plant_gresik/prod_semen';
        });
        $('#btn_prod_lime').click(function() {
            window.location.href = 'index.php/plant_gresik/prod_lime';
        });
        $('#btn_prod_klin').click(function() {
            window.location.href = 'index.php/plant_gresik/klin_semen';
        });
        $('#btn_prod_rawmix').click(function() {
            window.location.href = 'index.php/plant_gresik/prod_rawmix';
        });
        $('#btn_prod_silica').click(function() {
            window.location.href = 'index.php/plant_gresik/prod_silica';
        });
        $('#btn_prod_fineCoal').click(function() {
            window.location.href = 'index.php/plant_gresik/prod_fineCoal';
        });
        $('#btnChart').click(function() {
            window.location.href = 'index.php/plant_gresik/prod_limeChart';
        });
    });
    function selectThn() {
        var thn = $('#tahun').val();
        window.location.href = 'index.php/plant_gresik/prod_semen?tahun=' + thn;
    }
    
        $('#Tahun_<?php
if (!empty($input['tahun'])) {
    echo $input['tahun'];
} else {
    echo date('Y');
}
?>').addClass('active btn-danger');

    function Btn_Tahun(tahun) {
        var url = "<?= base_url() ?>index.php/plant_gresik/klin_semen";
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
                            $Query = $oracle->query("SELECT * FROM (SELECT TO_CHAR(DATE_PROD, 'YYYY-MM-DD') AS DATE_PROD FROM PIS_SG_PRODDAILY ORDER BY DATE_PROD DESC) WHERE ROWNUM = 1");
                            $data = $Query->result_array();
                            $tanggal = date_create($data['0']['DATE_PROD']);
                            $last_date = date_format($tanggal, "d");
                            //echo 'Last Update on : ' . date_format($tanggal, "d F Y");

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
                            <li><a href="<?= base_url() ?>index.php/plant_padang/klin_semen">Padang</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_rembang/klin_semen">Gresik</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="active"><a href="<?= base_url() ?>index.php/plant_gresik/klin_semen">KSO SI-SG</a></li>
                            <li role="separator" class="divider"></li>

                            <li><a href="<?= base_url() ?>index.php/plant_tonasa/klin_semen">Tonasa</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_tlcc/klin_semen">TLCC</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
        <!--            batas try-->
        <!--            <div class="col-md-6 col-xs-12">-->

        <!--<div class="col-md-4 col-xs-12">-->

        <!--            </div>-->
        <!--            </div>-->
        <!-- Collect the nav links, forms, and other content for toggling -->
        <!-- /.navbar-collapse -->

        <!-- /.container-fluid -->
    </nav>
</div>
<!--        batas-->
<div class="row">
    <section class="content-header">
        <h1>
            Total Value
            <small>Clinker Production</small>
        </h1>
    </section>
</div>

<div class="row">
    <div class="col-xs-12  col-md-2 noPadding">
        <div class=" headfive cubesRun" > 
                    <div class="col-xs-2 noPadding"  style="font-weight: bold; ">SG</div>
                    <div class="col-xs-10 noPadding" align="right">RKAP : 
                        <?php
                        for ($i = 1; $i <= 12; $i++) {
                            if (strlen($i) < 2) {
                                $my_month = '0' . $i;
                            } else {
                                $my_month = $i;
                            }

                            if (empty($klinData["$thn-$my_month"])) {
                                $klinData["$thn-$my_month"]['tuban1'] = 0;
                                $klinData["$thn-$my_month"]['tuban2'] = 0;
                                $klinData["$thn-$my_month"]['tuban3'] = 0;
                                $klinData["$thn-$my_month"]['tuban4'] = 0;
                            }
                        }
                        $total_upto_year_sg = (array_sum(($klinData["$thn-01"]))) + (array_sum(($klinData["$thn-02"]))) + (array_sum(($klinData["$thn-03"]))) + (array_sum(($klinData["$thn-04"]))) + (array_sum(($klinData["$thn-05"]))) + (array_sum(($klinData["$thn-06"]))) + (array_sum(($klinData["$thn-07"]))) + (array_sum(($klinData["$thn-08"]))) + (array_sum(($klinData["$thn-09"]))) + (array_sum(($klinData["$thn-10"]))) + (array_sum(($klinData["$thn-11"]))) + (array_sum(($klinData["$thn-12"])));

                        $total_rkap_year_sg = ($DProduction[1]['clinker']) + ($DProduction[2]['clinker']) + ($DProduction[3]['clinker']) + ($DProduction[4]['clinker']) + ($DProduction[5]['clinker']) + ($DProduction[6]['clinker']) + ($DProduction[7]['clinker']) + ($DProduction[8]['clinker']) + ($DProduction[9]['clinker']) + ($DProduction[10]['clinker']) + ($DProduction[11]['clinker']) + ($DProduction[12]['clinker']);
                        echo number_format($total_rkap_year_sg)
                        ?> T</div>
                    <?php
                    $hasil_year_sg = ($total_upto_year_sg / $total_rkap_year_sg) * 100;
                    if ($hasil_year_sg < 100) {
                        echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_year_sg, 2, ",", ".") . '%</h4></div>';
                    } else {
                        echo '<div class="col-xs-12 noPadding" align="center" style="color: #6bbb3e"><h4>' . number_format($hasil_year_sg, 2, ",", ".") . '%</h4></div>';
                    }
                    ?>
                    Real : 
                    <span class="row-xs-2 noPadding" align="left"  style="font-weight: bold;"><?php echo number_format($total_upto_year_sg) ?> T</span>
                </div>

            </div>
    <div class="col-xs-12  col-md-2 noPadding">
                <div class="headfive cubesRun" > 
                    <div class="col-xs-2 noPadding"  style="font-weight: bold;">TB I</div>
                    <div class="col-xs-10 noPadding" align="right">RKAP :
                        <?php
                        
                        for ($i = 1; $i <= 12; $i++) {
                            if (strlen($i) < 2) {
                                $my_month = '0' . $i;
                            } else {
                                $my_month = $i;
                            }

                            if (empty($klinData["$thn-$my_month"]['tuban1'])) {
                                $klinData["$thn-$my_month"]['tuban1'] = 0;
                                $klinData["$thn-$my_month"]['tuban2'] = 0;
                                $klinData["$thn-$my_month"]['tuban3'] = 0;
                                $klinData["$thn-$my_month"]['tuban4'] = 0;
                            }
                        }
                        if (empty($rkap_klin[$thn]['tuban1'])) {
                            $rkap_klin[$thn]['tuban1'] = 0;
                        }
                        $total_rkap_year_tb1 = $rkap_klin[$thn]['tuban1'];
                        $total_upto_year_tb1 = (($klinData["$thn-01"]['tuban1']) + ($klinData["$thn-02"]['tuban1']) + ($klinData["$thn-03"]['tuban1'])) + (($klinData["$thn-04"]['tuban1']) + ($klinData["$thn-05"]['tuban1']) + ($klinData["$thn-06"]['tuban1'])) + (($klinData["$thn-07"]['tuban1']) + ($klinData["$thn-08"]['tuban1']) + ($klinData["$thn-09"]['tuban1'])) + (($klinData["$thn-10"]['tuban1']) + ($klinData["$thn-11"]['tuban1']) + ($klinData["$thn-12"]['tuban1']));

                        echo number_format($total_rkap_year_tb1)
                        ?> T</div>
                    <?php
                    $hasil_year_tb1 = @($total_upto_year_tb1 / $total_rkap_year_tb1) * 100;
                    if ($hasil_year_tb1 < 100) {
                        echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_year_tb1, 2, ",", ".") . '%</h4></div>';
                    } else {
                        echo '<div class="col-xs-12 noPadding" align="center" style="color: #6bbb3e"><h4>' . number_format($hasil_year_tb1, 2, ",", ".") . '%</h4></div>';
                    }
                    ?>
                    Real : 
                    <span class="row-xs-2 noPadding" align="left"  style="font-weight: bold;"><?php echo number_format($total_upto_year_tb1) ?> T</span>
                </div>
            </div>
    <div class="col-xs-12  col-md-2 noPadding">
                <div class="headfive cubesRun" > 
                    <div class="col-xs-2 noPadding"  style="font-weight: bold;">TB II</div>
                    <div class="col-xs-10 noPadding" align="right">RKAP : 
                        <?php
                        
                        for ($i = 1; $i <= 12; $i++) {
                            if (strlen($i) < 2) {
                                $my_month = '0' . $i;
                            } else {
                                $my_month = $i;
                            }

                            if (empty($klinData["$thn-$my_month"]['tuban2'])) {
                                $klinData["$thn-$my_month"]['tuban1'] = 0;
                                $klinData["$thn-$my_month"]['tuban2'] = 0;
                                $klinData["$thn-$my_month"]['tuban3'] = 0;
                                $klinData["$thn-$my_month"]['tuban4'] = 0;
                            }
                        }
                        if (empty($rkap_klin[$thn]['tuban2'])) {
                            $rkap_klin[$thn]['tuban2'] = 0;
                        }
                        
                        $total_rkap_year_tb2 = $rkap_klin[$thn]['tuban2'];
                        $total_upto_year_tb2 = (($klinData["$thn-01"]['tuban2']) + ($klinData["$thn-02"]['tuban2']) + ($klinData["$thn-03"]['tuban2'])) + (($klinData["$thn-04"]['tuban2']) + ($klinData["$thn-05"]['tuban2']) + ($klinData["$thn-06"]['tuban2'])) + (($klinData["$thn-07"]['tuban2']) + ($klinData["$thn-08"]['tuban2']) + ($klinData["$thn-09"]['tuban2'])) + (($klinData["$thn-10"]['tuban2']) + ($klinData["$thn-11"]['tuban2']) + ($klinData["$thn-12"]['tuban2']));

                        echo number_format($total_rkap_year_tb2)
                        ?> T</div>
                    <?php
                    $hasil_year_tb2 = @($total_upto_year_tb2 / $total_rkap_year_tb2) * 100;
                    if ($hasil_year_tb2 < 100) {
                        echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_year_tb2, 2, ",", ".") . '%</h4></div>';
                    } else {
                        echo '<div class="col-xs-12 noPadding" align="center" style="color: #6bbb3e"><h4>' . number_format($hasil_year_tb2, 2, ",", ".") . '%</h4></div>';
                    }
                    ?>
                    Real : 
                    <span class="row-xs-2 noPadding" align="left"  style="font-weight: bold;"><?php echo number_format($total_upto_year_tb2) ?> T</span>
                </div>
            </div>
    <div class="col-xs-12  col-md-2 noPadding">
                <div class="headfive cubesRun" > 
                    <div class="col-xs-2 noPadding"  style="font-weight: bold;">TB III</div>
                    <div class="col-xs-10 noPadding" align="right">RKAP : 
                        <?php
                        
                        for ($i = 1; $i <= 12; $i++) {
                            if (strlen($i) < 2) {
                                $my_month = '0' . $i;
                            } else {
                                $my_month = $i;
                            }

                            if (empty($klinData["$thn-$my_month"]['tuban3'])) {
                                $klinData["$thn-$my_month"]['tuban1'] = 0;
                                $klinData["$thn-$my_month"]['tuban2'] = 0;
                                $klinData["$thn-$my_month"]['tuban3'] = 0;
                                $klinData["$thn-$my_month"]['tuban4'] = 0;
                            }
                        }
                        if (empty($rkap_klin[$thn]['tuban3'])) {
                            $rkap_klin[$thn]['tuban3'] = 0;
                        }
                        $total_rkap_year_tb3 = $rkap_klin[$thn]['tuban3'];
                        $total_upto_year_tb3 = (($klinData["$thn-01"]['tuban3']) + ($klinData["$thn-02"]['tuban3']) + ($klinData["$thn-03"]['tuban3'])) + (($klinData["$thn-04"]['tuban3']) + ($klinData["$thn-05"]['tuban3']) + ($klinData["$thn-06"]['tuban3'])) + (($klinData["$thn-07"]['tuban3']) + ($klinData["$thn-08"]['tuban3']) + ($klinData["$thn-09"]['tuban3'])) + (($klinData["$thn-10"]['tuban3']) + ($klinData["$thn-11"]['tuban3']) + ($klinData["$thn-12"]['tuban3']));
                        echo number_format($total_rkap_year_tb3)
                        ?> T</div>
                    <?php
                    $hasil_year_tb3 = @($total_upto_year_tb3 / $total_rkap_year_tb3) * 100;
                    if ($hasil_year_tb3 < 100) {
                        echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_year_tb3, 2, ",", ".") . '%</h4></div>';
                    } else {
                        echo '<div class="col-xs-12 noPadding" align="center" style="color: #6bbb3e"><h4>' . number_format($hasil_year_tb3, 2, ",", ".") . '%</h4></div>';
                    }
                    ?>
                    Real : 
                    <span class="row-xs-2 noPadding" align="left"  style="font-weight: bold;"><?php echo number_format($total_upto_year_tb3) ?> T</span>
                </div>
            </div>
    <div class="col-xs-12  col-md-2 noPadding">
                <div class="headfive cubesRun" > 
                    <div class="col-xs-2 noPadding"  style="font-weight: bold;">TB IV </div>
                    <div class="col-xs-10 noPadding" align="right">RKAP : 
                        <?php
                        
                        for ($i = 1; $i <= 12; $i++) {
                            if (strlen($i) < 2) {
                                $my_month = '0' . $i;
                            } else {
                                $my_month = $i;
                            }

                            if (empty($klinData["$thn-$my_month"]['tuban4'])) {
                                $klinData["$thn-$my_month"]['tuban1'] = 0;
                                $klinData["$thn-$my_month"]['tuban2'] = 0;
                                $klinData["$thn-$my_month"]['tuban3'] = 0;
                                $klinData["$thn-$my_month"]['tuban4'] = 0;
                            }
                        }
                        if (empty($rkap_klin[$thn]['tuban4'])) {
                            $rkap_klin[$thn]['tuban4'] = 0;
                        }
                        $total_rkap_year_tb4 = $rkap_klin[$thn]['tuban4'];
                        $total_upto_year_tb4 = (($klinData["$thn-01"]['tuban4']) + ($klinData["$thn-02"]['tuban4']) + ($klinData["$thn-03"]['tuban4'])) + (($klinData["$thn-04"]['tuban4']) + ($klinData["$thn-05"]['tuban4']) + ($klinData["$thn-06"]['tuban4'])) + (($klinData["$thn-07"]['tuban4']) + ($klinData["$thn-08"]['tuban4']) + ($klinData["$thn-09"]['tuban4'])) + (($klinData["$thn-10"]['tuban3']) + ($klinData["$thn-11"]['tuban3']) + ($klinData["$thn-12"]['tuban3']));
                        echo number_format($total_rkap_year_tb4)
                        ?> T</div>
                    <?php
                    $hasil_year_tb4 = @($total_upto_year_tb4 / $total_rkap_year_tb4) * 100;
                    if ($hasil_year_tb4 < 100) {
                        echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_year_tb4, 2, ",", ".") . '%</h4></div>';
                    } else {
                        echo '<div class="col-xs-12 noPadding" align="center" style="color: #6bbb3e"><h4>' . number_format($hasil_year_tb4, 2, ",", ".") . '%</h4></div>';
                    }
                    ?>
                    Real : 
                    <span class="row-xs-2 noPadding" align="left"  style="font-weight: bold;"><?php echo number_format($total_upto_year_tb4) ?> T</span>
                </div>
            </div>
    <div class="col-xs-12  col-md-2 noPadding">
                <div class="headfive cubesRun" > 
                    <div class="col-xs-2 noPadding"  style="font-weight: bold;">RMB</div>
                    <div class="col-xs-10 noPadding" align="right">RKAP : 
                        <!--?php
                        
                        for ($i = 1; $i <= 12; $i++) {
                            if (strlen($i) < 2) {
                                $my_month = '0' . $i;
                            } else {
                                $my_month = $i;
                            }

                            if (empty($klinData["$thn-$my_month"]['tuban4'])) {
                                $klinData["$thn-$my_month"]['tuban1'] = 0;
                                $klinData["$thn-$my_month"]['tuban2'] = 0;
                                $klinData["$thn-$my_month"]['tuban3'] = 0;
                                $klinData["$thn-$my_month"]['tuban4'] = 0;
                            }
                        }
                        if (empty($rkap_klin[$thn]['tuban4'])) {
                            $rkap_klin[$thn]['tuban4'] = 0;
                        }
                        $total_rkap_year_tb4 = $rkap_klin[$thn]['tuban4'];
                        $total_upto_year_tb4 = (($klinData["$thn-01"]['tuban4']) + ($klinData["$thn-02"]['tuban4']) + ($klinData["$thn-03"]['tuban4'])) + (($klinData["$thn-04"]['tuban4']) + ($klinData["$thn-05"]['tuban4']) + ($klinData["$thn-06"]['tuban4'])) + (($klinData["$thn-07"]['tuban4']) + ($klinData["$thn-08"]['tuban4']) + ($klinData["$thn-09"]['tuban4'])) + (($klinData["$thn-10"]['tuban3']) + ($klinData["$thn-11"]['tuban3']) + ($klinData["$thn-12"]['tuban3']));
                        echo number_format($total_rkap_year_tb4)
                        ?--> 
                        0,00 T</div>
                    <!--?php
                    $hasil_year_tb4 = @($total_upto_year_tb4 / $total_rkap_year_tb4) * 100;
                    if ($hasil_year_tb4 < 100) {
                        echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_year_tb4, 2, ",", ".") . '%</h4></div>';
                    } else {
                        echo '<div class="col-xs-12 noPadding" align="center" style="color: #6bbb3e"><h4>' . number_format($hasil_year_tb4, 2, ",", ".") . '%</h4></div>';
                    }
                    ?-->
                    <div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>0,00 %</h4></div>
                    Real : 
                    <span class="row-xs-2 noPadding" align="left"  style="font-weight: bold;"><?php echo number_format(0,2,",","."); ?> T</span>
                </div>
            </div>
</div>
<div class="row">
    <section class="content-header">
        <h1>
            Month View
            <small>Clinker Production</small>
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
                        if (!empty($DProduction[1]['clinker'])) {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($DProduction[1]['clinker'], 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                        <div class="row-xs-2 noPadding" align="center" >
                            <?php
                            if (!empty($klinData["$thn-01"]) && !empty($DProduction[1]['clinker'])) {
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
                                $hasil_jan = (array_sum($klinData["$thn-01"])) / ($DProduction[1]['clinker']) * 100;

                                $pembagi = $last_date;
                                $rkap_today_jan = ($DProduction[1]['clinker']) / $pembagi_tetap;
                                $hasil_today_jan = ((array_sum($klinData["$thn-01"])) / ($rkap_today_jan * $pembagi)) * 100;

                                if ($hasil_today_jan < 100) {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_jan, 2, ",", ".") . '%</h4></div>';
                                } else {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_jan, 2, ",", ".") . '%</h4></div>';
                                }
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(array_sum($klinData["$thn-01"]), 0, ",", ".") . ' T</div>';
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
                        if (!empty($klinData["$thn-01"])) {
                            foreach ($klinData["$thn-01"] as $rows) {
                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">';
                                if ($no == 1) {
                                    echo'I';
                                } elseif ($no == 2) {
                                    echo'II';
                                } elseif ($no == 3) {
                                    echo'III';
                                } elseif ($no == 4) {
                                    echo'IV';
                                }
                                echo '</div>';
                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rows, 0, ",", ".") . ' T</div>';
                                $no++;
                            }
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">&nbsp</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">&nbsp</div>';
                        } else {
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">I</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">&nbsp</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">&nbsp</div>';
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
                        if (!empty($DProduction[2]['clinker'])) {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($DProduction[2]['clinker'], 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                        <div class="row-xs-2 noPadding" align="center" >
                            <?php
                            if (!empty($klinData["$thn-02"]) && !empty($DProduction[2]['clinker'])) {
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
                                $hasil_feb = (array_sum($klinData["$thn-02"])) / ($DProduction[2]['clinker']) * 100;

                                $pembagi = $last_date;
                                $rkap_today_feb = ($DProduction[2]['clinker']) / $pembagi_tetap;
                                $hasil_today_feb = ((array_sum($klinData["$thn-02"])) / ($rkap_today_feb * $pembagi)) * 100;

                                if ($hasil_today_feb < 100) {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_feb, 2, ",", ".") . '%</h4></div>';
                                } else {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_feb, 2, ",", ".") . '%</h4></div>';
                                }
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(array_sum($klinData["$thn-02"]), 0, ",", ".") . ' T</div>';
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
                        if (!empty($klinData["$thn-02"])) {
                            foreach ($klinData["$thn-02"] as $rows) {
                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">';
                                if ($no == 1) {
                                    echo'I';
                                } elseif ($no == 2) {
                                    echo'II';
                                } elseif ($no == 3) {
                                    echo'III';
                                } elseif ($no == 4) {
                                    echo'IV';
                                }
                                echo '</div>';
                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rows, 0, ",", ".") . ' T</div>';
                                $no++;
                            }
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">&nbsp</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">&nbsp</div>';
                        } else {
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">I</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">&nbsp</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">&nbsp</div>';
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
                        if (!empty($DProduction[3]['clinker'])) {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($DProduction[3]['clinker'], 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                        <div class="row-xs-2 noPadding" align="center" >
                            <?php
                            if (!empty($klinData["$thn-03"]) && !empty($DProduction[3]['clinker'])) {
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
                                $hasil_mar = (array_sum($klinData["$thn-03"])) / ($DProduction[3]['clinker']) * 100;

                                $pembagi = $last_date;
                                $rkap_today_mar = ($DProduction[3]['clinker']) / $pembagi_tetap;
                                $hasil_today_mar = ((array_sum($klinData["$thn-03"])) / ($rkap_today_mar * $pembagi)) * 100;

                                if ($hasil_today_mar < 100) {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_mar, 2, ",", ".") . '%</h4></div>';
                                } else {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_mar, 2, ",", ".") . '%</h4></div>';
                                }
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(array_sum($klinData["$thn-03"]), 0, ",", ".") . ' T</div>';
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
                        if (!empty($klinData["$thn-03"])) {
                            foreach ($klinData["$thn-03"] as $rows) {
                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">';
                                if ($no == 1) {
                                    echo'I';
                                } elseif ($no == 2) {
                                    echo'II';
                                } elseif ($no == 3) {
                                    echo'III';
                                } elseif ($no == 4) {
                                    echo'IV';
                                }
                                echo '</div>';
                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rows, 0, ",", ".") . ' T</div>';
                                $no++;
                            }
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">&nbsp</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">&nbsp</div>';
                        } else {
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">I</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">&nbsp</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">&nbsp</div>';
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
                        if (!empty($DProduction[1]['clinker']) || !empty($DProduction[2]['clinker']) || !empty($DProduction[3]['clinker'])) {
                            $total_rkap_q1 = ($DProduction[1]['clinker']) + ($DProduction[2]['clinker']) + ($DProduction[3]['clinker']);
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($total_rkap_q1, 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                        <div class="row-xs-2 noPadding" align="center" >
                            <?php
                            if (!empty($klinData["$thn-01"]) || !empty($klinData["$thn-02"]) || !empty($klinData["$thn-03"])) {
                                $total_upto_q1 = (array_sum(($klinData["$thn-01"]))) + (array_sum(($klinData["$thn-02"]))) + (array_sum(($klinData["$thn-03"])));
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
                        if (!empty($klinData["$thn-01"]) || !empty($klinData["$thn-02"]) || !empty($klinData["$thn-03"])) {
                            $tot_tb1 = (($klinData["$thn-01"]['tuban1']) + ($klinData["$thn-02"]['tuban1']) + ($klinData["$thn-03"]['tuban1']));
                            $tot_tb2 = (($klinData["$thn-01"]['tuban2']) + ($klinData["$thn-02"]['tuban2']) + ($klinData["$thn-03"]['tuban2']));
                            $tot_tb3 = (($klinData["$thn-01"]['tuban3']) + ($klinData["$thn-02"]['tuban3']) + ($klinData["$thn-03"]['tuban3']));
                            $tot_tb4 = (($klinData["$thn-01"]['tuban4']) + ($klinData["$thn-02"]['tuban4']) + ($klinData["$thn-03"]['tuban4']));

                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">I</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_tb1, 0, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_tb2, 0, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_tb3, 0, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_tb4, 0, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">&nbsp</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">&nbsp</div>';
                        } else {
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">I</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">&nbsp</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">&nbsp</div>';
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
                        if (!empty($DProduction[4]['clinker'])) {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($DProduction[4]['clinker'], 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                        <div class="row-xs-2 noPadding" align="center" >
                            <?php
                            if (!empty($klinData["$thn-04"]) && !empty($DProduction[4]['clinker'])) {
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
                                $hasil_apr = (array_sum($klinData["$thn-04"])) / ($DProduction[4]['clinker']) * 100;

                                $pembagi = $last_date;
                                $rkap_today_apr = ($DProduction[4]['clinker']) / $pembagi_tetap;
                                $hasil_today_apr = ((array_sum($klinData["$thn-04"])) / ($rkap_today_apr * $pembagi)) * 100;

                                if ($hasil_today_apr < 100) {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_apr, 2, ",", ".") . '%</h4></div>';
                                } else {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_apr, 2, ",", ".") . '%</h4></div>';
                                }
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(array_sum($klinData["$thn-04"]), 0, ",", ".") . ' T</div>';
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
                        if (!empty($klinData["$thn-04"])) {
                            foreach ($klinData["$thn-04"] as $rows) {
                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">';
                                if ($no == 1) {
                                    echo'I';
                                } elseif ($no == 2) {
                                    echo'II';
                                } elseif ($no == 3) {
                                    echo'III';
                                } elseif ($no == 4) {
                                    echo'IV';
                                }
                                echo '</div>';
                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rows, 0, ",", ".") . ' T</div>';
                                $no++;
                            }
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">&nbsp</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">&nbsp</div>';
                        } else {
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">I</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">&nbsp</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">&nbsp</div>';
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
                        if (!empty($DProduction[5]['clinker'])) {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($DProduction[5]['clinker'], 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                        <div class="row-xs-2 noPadding" align="center" >
                            <?php
                            if (!empty($klinData["$thn-05"]) && !empty($DProduction[5]['clinker'])) {
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
                                $hasil_may = (array_sum($klinData["$thn-05"])) / ($DProduction[5]['clinker']) * 100;

                                $pembagi = $last_date;
                                $rkap_today_may = ($DProduction[5]['clinker']) / $pembagi_tetap;
                                $hasil_today_may = ((array_sum($klinData["$thn-05"])) / ($rkap_today_may * $pembagi)) * 100;

                                if ($hasil_today_may < 100) {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_may, 2, ",", ".") . '%</h4></div>';
                                } else {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_may, 2, ",", ".") . '%</h4></div>';
                                }
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(array_sum($klinData["$thn-05"]), 0, ",", ".") . ' T</div>';
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
                        if (!empty($klinData["$thn-05"])) {
                            foreach ($klinData["$thn-05"] as $rows) {
                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">';
                                if ($no == 1) {
                                    echo'I';
                                } elseif ($no == 2) {
                                    echo'II';
                                } elseif ($no == 3) {
                                    echo'III';
                                } elseif ($no == 4) {
                                    echo'IV';
                                }
                                echo '</div>';
                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rows, 0, ",", ".") . ' T</div>';
                                $no++;
                            }
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">&nbsp</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">&nbsp</div>';
                        } else {
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">I</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">&nbsp</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">&nbsp</div>';
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
                        if (!empty($DProduction[6]['clinker'])) {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($DProduction[6]['clinker'], 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                        <div class="row-xs-2 noPadding" align="center" >
                            <?php
                            if (!empty($klinData["$thn-06"]) && !empty($DProduction[6]['clinker'])) {
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
                                $hasil_jun = (array_sum($klinData["$thn-06"])) / ($DProduction[6]['clinker']) * 100;

                                $pembagi = $last_date;
                                $rkap_today_jun = ($DProduction[6]['clinker']) / $pembagi_tetap;
                                $hasil_today_jun = ((array_sum($klinData["$thn-06"])) / ($rkap_today_jun * $pembagi)) * 100;

                                if ($hasil_today_jun < 100) {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_jun, 2, ",", ".") . '%</h4></div>';
                                } else {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_jun, 2, ",", ".") . '%</h4></div>';
                                }
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(array_sum($klinData["$thn-06"]), 0, ",", ".") . ' T</div>';
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
                        if (!empty($klinData["$thn-06"])) {
                            foreach ($klinData["$thn-06"] as $rows) {
                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">';
                                if ($no == 1) {
                                    echo'I';
                                } elseif ($no == 2) {
                                    echo'II';
                                } elseif ($no == 3) {
                                    echo'III';
                                } elseif ($no == 4) {
                                    echo'IV';
                                }
                                echo '</div>';
                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rows, 0, ",", ".") . ' T</div>';
                                $no++;
                            }
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">&nbsp</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">&nbsp</div>';
                        } else {
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">I</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">&nbsp</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">&nbsp</div>';
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
                        if (!empty($DProduction[4]['clinker']) || !empty($DProduction[5]['clinker']) || !empty($DProduction[6]['clinker'])) {
                            $total_rkap_q2 = ($DProduction[4]['clinker']) + ($DProduction[5]['clinker']) + ($DProduction[6]['clinker']);
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($total_rkap_q2, 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                        <div class="row-xs-2 noPadding" align="center" >
                            <?php
                            if (!empty($klinData["$thn-04"]) || !empty($klinData["$thn-05"]) || !empty($klinData["$thn-06"])) {
                                $total_upto_q2 = (array_sum(($klinData["$thn-04"]))) + (array_sum(($klinData["$thn-05"]))) + (array_sum(($klinData["$thn-06"])));
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
                        if (!empty($klinData["$thn-04"]) || !empty($klinData["$thn-05"]) || !empty($klinData["$thn-06"])) {
                            $tot_tb1 = (($klinData["$thn-04"]['tuban1']) + ($klinData["$thn-05"]['tuban1']) + ($klinData["$thn-06"]['tuban1']));
                            $tot_tb2 = (($klinData["$thn-04"]['tuban2']) + ($klinData["$thn-05"]['tuban2']) + ($klinData["$thn-06"]['tuban2']));
                            $tot_tb3 = (($klinData["$thn-04"]['tuban3']) + ($klinData["$thn-05"]['tuban3']) + ($klinData["$thn-06"]['tuban3']));
                            $tot_tb4 = (($klinData["$thn-04"]['tuban4']) + ($klinData["$thn-05"]['tuban4']) + ($klinData["$thn-06"]['tuban4']));

                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">I</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_tb1, 0, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_tb2, 0, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_tb3, 0, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_tb4, 0, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">&nbsp</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">&nbsp</div>';
                        } else {
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">I</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">&nbsp</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">&nbsp</div>';
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
                        if (!empty($DProduction[7]['clinker'])) {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($DProduction[7]['clinker'], 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                        <div class="row-xs-2 noPadding" align="center" >
                            <?php
                            if (!empty($klinData["$thn-07"]) && !empty($DProduction[7]['clinker'])) {
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
                                $hasil_jul = (array_sum($klinData["$thn-07"])) / ($DProduction[7]['clinker']) * 100;

                                $pembagi = $last_date;
                                $rkap_today_jul = ($DProduction[7]['clinker']) / $pembagi_tetap;
                                $hasil_today_jul = ((array_sum($klinData["$thn-07"])) / ($rkap_today_jul * $pembagi)) * 100;

                                if ($hasil_today_jul < 100) {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_jul, 2, ",", ".") . '%</h4></div>';
                                } else {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_jul, 2, ",", ".") . '%</h4></div>';
                                }
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(array_sum($klinData["$thn-07"]), 0, ",", ".") . ' T</div>';
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
                        if (!empty($klinData["$thn-07"])) {
                            foreach ($klinData["$thn-07"] as $rows) {
                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">';
                                if ($no == 1) {
                                    echo'I';
                                } elseif ($no == 2) {
                                    echo'II';
                                } elseif ($no == 3) {
                                    echo'III';
                                } elseif ($no == 4) {
                                    echo'IV';
                                }
                                echo '</div>';
                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rows, 0, ",", ".") . ' T</div>';
                                $no++;
                            }
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">&nbsp</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">&nbsp</div>';
                        } else {
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">I</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">&nbsp</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">&nbsp</div>';
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
                        if (!empty($DProduction[8]['clinker'])) {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($DProduction[8]['clinker'], 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                        <div class="row-xs-2 noPadding" align="center" >
                            <?php
                            if (!empty($klinData["$thn-08"]) && !empty($DProduction[8]['clinker'])) {
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
                                $hasil_aug = (array_sum($klinData["$thn-08"])) / ($DProduction[8]['clinker']) * 100;

                                $pembagi = $last_date;
                                $rkap_today_aug = ($DProduction[8]['clinker']) / $pembagi_tetap;
                                $hasil_today_aug = ((array_sum($klinData["$thn-08"])) / ($rkap_today_aug * $pembagi)) * 100;

                                if ($hasil_today_aug < 100) {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_aug, 2, ",", ".") . '%</h4></div>';
                                } else {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_aug, 2, ",", ".") . '%</h4></div>';
                                }
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(array_sum($klinData["$thn-08"]), 0, ",", ".") . ' T</div>';
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
                        if (!empty($klinData["$thn-08"])) {
                            foreach ($klinData["$thn-08"] as $rows) {
                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">';
                                if ($no == 1) {
                                    echo'I';
                                } elseif ($no == 2) {
                                    echo'II';
                                } elseif ($no == 3) {
                                    echo'III';
                                } elseif ($no == 4) {
                                    echo'IV';
                                }
                                echo '</div>';
                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rows, 0, ",", ".") . ' T</div>';
                                $no++;
                            }
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">&nbsp</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">&nbsp</div>';
                        } else {
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">I</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">&nbsp</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">&nbsp</div>';
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
                        if (!empty($DProduction[9]['clinker'])) {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($DProduction[9]['clinker'], 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                        <div class="row-xs-2 noPadding" align="center" >
                            <?php
                            if (!empty($klinData["$thn-09"]) && !empty($DProduction[9]['clinker'])) {
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
                                $hasil_sep = (array_sum($klinData["$thn-09"])) / ($DProduction[9]['clinker']) * 100;

                                $pembagi = $last_date;
                                $rkap_today_sep = ($DProduction[9]['clinker']) / $pembagi_tetap;
                                $hasil_today_sep = ((array_sum($klinData["$thn-09"])) / ($rkap_today_sep * $pembagi)) * 100;

                                if ($hasil_today_sep < 100) {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_sep, 2, ",", ".") . '%</h4></div>';
                                } else {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_sep, 2, ",", ".") . '%</h4></div>';
                                }
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(array_sum($klinData["$thn-09"]), 0, ",", ".") . ' T</div>';
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
                        if (!empty($klinData["$thn-09"])) {
                            foreach ($klinData["$thn-09"] as $rows) {
                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">';
                                if ($no == 1) {
                                    echo'I';
                                } elseif ($no == 2) {
                                    echo'II';
                                } elseif ($no == 3) {
                                    echo'III';
                                } elseif ($no == 4) {
                                    echo'IV';
                                }
                                echo '</div>';
                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rows, 0, ",", ".") . ' T</div>';
                                $no++;
                            }
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">&nbsp</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">&nbsp</div>';
                        } else {
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">I</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">&nbsp</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">&nbsp</div>';
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
                        if (!empty($DProduction[7]['clinker']) || !empty($DProduction[8]['clinker']) || !empty($DProduction[9]['clinker'])) {
                            $total_rkap_q3 = ($DProduction[7]['clinker']) + ($DProduction[8]['clinker']) + ($DProduction[9]['clinker']);
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($total_rkap_q3, 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                        <div class="row-xs-2 noPadding" align="center" >
                            <?php
                            if (!empty($klinData["$thn-07"]) || !empty($klinData["$thn-08"]) || !empty($klinData["$thn-09"])) {
                                $total_upto_q3 = (array_sum(($klinData["$thn-07"]))) + (array_sum(($klinData["$thn-08"]))) + (array_sum(($klinData["$thn-09"])));
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
                        if (!empty($klinData["$thn-07"]) || !empty($klinData["$thn-08"]) || !empty($klinData["$thn-09"])) {
                            $tot_tb1 = (($klinData["$thn-07"]['tuban1']) + ($klinData["$thn-08"]['tuban1']) + ($klinData["$thn-09"]['tuban1']));
                            $tot_tb2 = (($klinData["$thn-07"]['tuban2']) + ($klinData["$thn-08"]['tuban2']) + ($klinData["$thn-09"]['tuban2']));
                            $tot_tb3 = (($klinData["$thn-07"]['tuban3']) + ($klinData["$thn-08"]['tuban3']) + ($klinData["$thn-09"]['tuban3']));
                            $tot_tb4 = (($klinData["$thn-07"]['tuban4']) + ($klinData["$thn-08"]['tuban4']) + ($klinData["$thn-09"]['tuban4']));

                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">I</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_tb1, 0, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_tb2, 0, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_tb3, 0, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_tb4, 0, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">&nbsp</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">&nbsp</div>';
                        } else {
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">I</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">&nbsp</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">&nbsp</div>';
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
                        if (!empty($DProduction[10]['clinker'])) {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($DProduction[10]['clinker'], 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                        <div class="row-xs-2 noPadding" align="center" >
                            <?php
                            if (!empty($klinData["$thn-10"]) && !empty($DProduction[10]['clinker'])) {
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
                                $hasil_oct = (array_sum($klinData["$thn-10"])) / ($DProduction[10]['clinker']) * 100;

                                $pembagi = $last_date;
                                $rkap_today_oct = ($DProduction[10]['clinker']) / $pembagi_tetap;
                                $hasil_today_oct = ((array_sum($klinData["$thn-10"])) / ($rkap_today_oct * $pembagi)) * 100;

                                if ($hasil_today_oct < 100) {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_oct, 2, ",", ".") . '%</h4></div>';
                                } else {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_oct, 2, ",", ".") . '%</h4></div>';
                                }
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(array_sum($klinData["$thn-10"]), 0, ",", ".") . ' T</div>';
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
                        if (!empty($klinData["$thn-10"])) {
                            foreach ($klinData["$thn-10"] as $rows) {
                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">';
                                if ($no == 1) {
                                    echo'I';
                                } elseif ($no == 2) {
                                    echo'II';
                                } elseif ($no == 3) {
                                    echo'III';
                                } elseif ($no == 4) {
                                    echo'IV';
                                }
                                echo '</div>';
                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rows, 0, ",", ".") . ' T</div>';
                                $no++;
                            }
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">&nbsp</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">&nbsp</div>';
                        } else {
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">I</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">&nbsp</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">&nbsp</div>';
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
                        if (!empty($DProduction[11]['clinker'])) {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($DProduction[11]['clinker'], 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                        <div class="row-xs-2 noPadding" align="center" >
                            <?php
                            if (!empty($klinData["$thn-11"]) && !empty($DProduction[11]['clinker'])) {
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
                                $hasil_nov = (array_sum($klinData["$thn-11"])) / ($DProduction[11]['clinker']) * 100;

                                $pembagi = $last_date;
                                $rkap_today_nov = ($DProduction[11]['clinker']) / $pembagi_tetap;
                                $hasil_today_nov = ((array_sum($klinData["$thn-11"])) / ($rkap_today_nov * $pembagi)) * 100;

                                if ($hasil_today_nov < 100) {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_nov, 2, ",", ".") . '%</h4></div>';
                                } else {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_nov, 2, ",", ".") . '%</h4></div>';
                                }
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(array_sum($klinData["$thn-11"]), 0, ",", ".") . ' T</div>';
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
                        if (!empty($klinData["$thn-11"])) {
                            foreach ($klinData["$thn-11"] as $rows) {
                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">';
                                if ($no == 1) {
                                    echo'I';
                                } elseif ($no == 2) {
                                    echo'II';
                                } elseif ($no == 3) {
                                    echo'III';
                                } elseif ($no == 4) {
                                    echo'IV';
                                }
                                echo '</div>';
                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rows, 0, ",", ".") . ' T</div>';
                                $no++;
                            }
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">&nbsp</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">&nbsp</div>';
                        } else {
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">I</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">&nbsp</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">&nbsp</div>';
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
                        if (!empty($DProduction[12]['clinker'])) {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($DProduction[12]['clinker'], 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                        <div class="row-xs-2 noPadding" align="center" >
                            <?php
                            if (!empty($klinData["$thn-12"]) && !empty($DProduction[12]['clinker'])) {
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
                                $hasil_dec = (array_sum($klinData["$thn-12"])) / ($DProduction[12]['clinker']) * 100;

                                $pembagi = $last_date;
                                $rkap_today_dec = ($DProduction[12]['clinker']) / $pembagi_tetap;
                                $hasil_today_dec = ((array_sum($klinData["$thn-12"])) / ($rkap_today_dec * $pembagi)) * 100;

                                if ($hasil_today_dec < 100) {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_dec, 2, ",", ".") . '%</h4></div>';
                                } else {
                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_dec, 2, ",", ".") . '%</h4></div>';
                                }
                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(array_sum($klinData["$thn-12"]), 0, ",", ".") . ' T</div>';
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
                        if (!empty($klinData["$thn-12"])) {
                            foreach ($klinData["$thn-12"] as $rows) {
                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">';
                                if ($no == 1) {
                                    echo'I';
                                } elseif ($no == 2) {
                                    echo'II';
                                } elseif ($no == 3) {
                                    echo'III';
                                } elseif ($no == 4) {
                                    echo'IV';
                                }
                                echo '</div>';
                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rows, 0, ",", ".") . ' T</div>';
                                $no++;
                            }
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">&nbsp</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">&nbsp</div>';
                        } else {
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">I</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">&nbsp</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">&nbsp</div>';
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
                        if (!empty($DProduction[10]['clinker']) || !empty($DProduction[11]['clinker']) || !empty($DProduction[12]['clinker'])) {
                            $total_rkap_q4 = ($DProduction[10]['clinker']) + ($DProduction[11]['clinker']) + ($DProduction[12]['clinker']);
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($total_rkap_q4, 0, ",", ".") . ' T</div>';
                        } else {
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                        }
                        ?>
                        <div class="row-xs-2 noPadding" align="center" >
                            <?php
                            if (!empty($klinData["$thn-10"]) || !empty($klinData["$thn-11"]) || !empty($klinData["$thn-12"])) {
                                $total_upto_q4 = (array_sum(($klinData["$thn-10"]))) + (array_sum(($klinData["$thn-11"]))) + (array_sum(($klinData["$thn-12"])));
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
                        if (!empty($klinData["$thn-10"]) || !empty($klinData["$thn-11"]) || !empty($klinData["$thn-12"])) {
                            $tot_tb1 = (($klinData["$thn-10"]['tuban1']) + ($klinData["$thn-11"]['tuban1']) + ($klinData["$thn-12"]['tuban1']));
                            $tot_tb2 = (($klinData["$thn-10"]['tuban2']) + ($klinData["$thn-11"]['tuban2']) + ($klinData["$thn-12"]['tuban2']));
                            $tot_tb3 = (($klinData["$thn-10"]['tuban3']) + ($klinData["$thn-11"]['tuban3']) + ($klinData["$thn-12"]['tuban3']));
                            $tot_tb4 = (($klinData["$thn-10"]['tuban4']) + ($klinData["$thn-11"]['tuban4']) + ($klinData["$thn-12"]['tuban4']));

                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">I</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_tb1, 0, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_tb2, 0, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_tb3, 0, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_tb4, 0, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">&nbsp</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">&nbsp</div>';
                        } else {
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">I</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">&nbsp</div>';
                            echo '<div class="col-xs-10 noPadding" align="right">&nbsp</div>';
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