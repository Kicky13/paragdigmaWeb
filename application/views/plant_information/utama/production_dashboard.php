<script>
    $(function () {
        $('#semenPadang').addClass("bg_plain");
        $('#klinkerPadang').addClass("bg_plain");
        $('#semenGresik').addClass("bg_plain");
        $('#klinkerGresik').addClass("bg_plain");
        $('#semenTonasa').addClass("bg_plain");
        $('#klinkerTonasa').addClass("bg_plain");
        $('#semenTLCC').addClass("bg_plain");
        $('#klinkerTLCC').addClass("bg_plain");
        /* Tombol Detail Semen*/
        $('#btn_sPadang').click(function () {
            window.location.href = '<?= base_url() ?>index.php/plant_padang/prod_semen';
        });
        $('#btn_sGresik').click(function () {
            window.location.href = '<?= base_url() ?>index.php/plant_gresik/prod_semen';
        });
        $('#btn_sTonasa').click(function () {
            window.location.href = '<?= base_url() ?>index.php/plant_tonasa/prod_semen';
        });
        $('#btn_sTLCC').click(function () {
            window.location.href = '<?= base_url() ?>index.php/plant_tlcc/prod_semen';
        });
        /* Tombol Detail Klinker*/
        $('#btn_kPadang').click(function () {
            window.location.href = '<?= base_url() ?>index.php/plant_padang/klin_semen';
        });
        $('#btn_kGresik').click(function () {
            window.location.href = '<?= base_url() ?>index.php/plant_gresik/klin_semen';
        });
        $('#btn_kTonasa').click(function () {
            window.location.href = '<?= base_url() ?>index.php/plant_tonasa/klin_semen';
        });
        $('#btn_kTLCC').click(function () {
            window.location.href = '<?= base_url() ?>index.php/plant_tlcc/klin_semen';
        });

    });
    function selectThn() {
        var thn = $('#tahun').val();
        window.location.href = 'index.php/plant_system/production_dashboard?tahun=' + thn;
    }
</script>
<style>
    .panelku {
        margin-bottom: 10px;
        background-color: #e3000e;
        border: 1px solid;
        border-color: #E0E4CC;
        border-radius: 4px;
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        color: white;
        font-family: "Montserrat, sans-serif";
        height: 40px;

    }
    .bg_danger{
        background-color:#d9534f;
        color:#fff;
    }
    .bg_success{
        background-color:#5cb85c;
        color:#fff;
    }
    .bg_plain{
        background-color:#FFFFF7;
        color:#fff;
    }
    .baris{
        margin-right: -15px;
        margin-left: -15px;
        margin-top: 5px;
        margin-bottom: 5px;
    }
    .testimonial-group > .row {
        overflow-x: auto;
        white-space: nowrap;
    }
    .testimonial-group > .row > .col-sm-3 {
        display: inline-block;
        float: none;
    }
    @media(min-width: 768px){
        .col-1-5{
            width: 20%;
            float: left;
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }
    }
</style>
<!-- <div class="panelku panel-default">
    <h4 style="text-align: center; font-style: bold; ">Cement & Clinker Annual Production</h4>
</div> -->
<div class="row">
    <div class="col-sm-12 col-xs-12" style="padding:10px 0;">
        <div class="small-box " style="background-image: url(media/pattern.png); background-repeat: no-repeat; background-color: #ffffff; color: #4e4e4e;  border: 1px #e4e4e4 solid; margin-bottom: 5px;">
            <div class="col-xs-12 col-md-6">
                <img src="media/banner-logo.png" class="img-responsive" width="700px">
            </div>
            <div class="col-xs-12 col-md-3">
                <div class="inner"><p style="color:#4e4e4e; " >Cement</p>
                    <?php
                    $total_upto_sg = ($datacm_sg["$thn-01"]['sg']) + ($datacm_sg["$thn-02"]['sg']) +
                            ($datacm_sg["$thn-03"]['sg']) + ($datacm_sg["$thn-04"]['sg']) +
                            ($datacm_sg["$thn-05"]['sg']) + ($datacm_sg["$thn-06"]['sg']) +
                            ($datacm_sg["$thn-07"]['sg']) + ($datacm_sg["$thn-08"]['sg']) +
                            ($datacm_sg["$thn-09"]['sg']) + ($datacm_sg["$thn-10"]['sg']) +
                            ($datacm_sg["$thn-11"]['sg']) + ($datacm_sg["$thn-12"]['sg']);
                    $total_upto_sp = ($datacm_sp["$thn-01"]['sp']) + ($datacm_sp["$thn-02"]['sp']) +
                            ($datacm_sp["$thn-03"]['sp']) + ($datacm_sp["$thn-04"]['sp']) +
                            ($datacm_sp["$thn-05"]['sp']) + ($datacm_sp["$thn-06"]['sp']) +
                            ($datacm_sp["$thn-07"]['sp']) + ($datacm_sp["$thn-08"]['sp']) +
                            ($datacm_sp["$thn-09"]['sp']) + ($datacm_sp["$thn-10"]['sp']) +
                            ($datacm_sp["$thn-11"]['sp']) + ($datacm_sp["$thn-12"]['sp']);
                    $total_upto_st = ($datacm_st["$thn-01"]['st']) + ($datacm_st["$thn-02"]['st']) +
                            ($datacm_st["$thn-03"]['st']) + ($datacm_st["$thn-04"]['st']) +
                            ($datacm_st["$thn-05"]['st']) + ($datacm_st["$thn-06"]['st']) +
                            ($datacm_st["$thn-07"]['st']) + ($datacm_st["$thn-08"]['st']) +
                            ($datacm_st["$thn-09"]['st']) + ($datacm_st["$thn-10"]['st']) +
                            ($datacm_st["$thn-11"]['st']) + ($datacm_st["$thn-12"]['st']);
                    $total_upto_tlcc = ($datacm_tlcc["$thn-01"]['tlcc']) + ($datacm_tlcc["$thn-02"]['tlcc']) +
                            ($datacm_tlcc["$thn-03"]['tlcc']) + ($datacm_tlcc["$thn-04"]['tlcc']) +
                            ($datacm_tlcc["$thn-05"]['tlcc']) + ($datacm_tlcc["$thn-06"]['tlcc']) +
                            ($datacm_tlcc["$thn-07"]['tlcc']) + ($datacm_tlcc["$thn-08"]['tlcc']) +
                            ($datacm_tlcc["$thn-09"]['tlcc']) + ($datacm_tlcc["$thn-10"]['tlcc']) +
                            ($datacm_tlcc["$thn-11"]['tlcc']) + ($datacm_tlcc["$thn-12"]['tlcc']);

                    $total_upto_smig = $total_upto_sg + $total_upto_sp + $total_upto_st + $total_upto_tlcc;

                    $total_rkap_smig = ($rkap_cm[1]['CEMENT']) + ($rkap_cm[2]['CEMENT']) +
                            ($rkap_cm[3]['CEMENT']) + ($rkap_cm[4]['CEMENT']) +
                            ($rkap_cm[5]['CEMENT']) + ($rkap_cm[6]['CEMENT']) +
                            ($rkap_cm[7]['CEMENT']) + ($rkap_cm[8]['CEMENT']) +
                            ($rkap_cm[9]['CEMENT']) + ($rkap_cm[10]['CEMENT']) +
                            ($rkap_cm[11]['CEMENT']) + ($rkap_cm[12]['CEMENT']);

                    $hasil_year_smig = ($total_upto_smig / $total_rkap_smig) * 100;
                    if ($hasil_year_smig > 100) {
                        echo '<h3 style="color: #71BA51;">' . number_format($hasil_year_smig, 2, ",", ".") . '<sup style="font-size: 20px">%</sup></h3>';
                    } else {
                        echo '<h3 style="color: #d9534f;">' . number_format($hasil_year_smig, 2, ",", ".") . '<sup style="font-size: 20px">%</sup></h3>';
                    }
                    ?>
                    <div class="row">
                        <div class="col-xs-6">RKAP : <p><?php echo number_format($total_rkap_smig, 0, ",", "."); ?> T</p></div>
                        <div class="col-xs-6">Real :<br><p class="text-center" style="color:#4e4e4e; float: left;"><?php echo number_format($total_upto_smig, 0, ",", ".")//$data['finishmill'];     ?> T</p></div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-3">
                <div class="inner"><p style="color:#4e4e4e; " >Clinker</p>
                    <?php
                    $total_upto_sg = ($datacl_sg["$thn-01"]['sg']) + ($datacl_sg["$thn-02"]['sg']) +
                            ($datacl_sg["$thn-03"]['sg']) + ($datacl_sg["$thn-04"]['sg']) +
                            ($datacl_sg["$thn-05"]['sg']) + ($datacl_sg["$thn-06"]['sg']) +
                            ($datacl_sg["$thn-07"]['sg']) + ($datacl_sg["$thn-08"]['sg']) +
                            ($datacl_sg["$thn-09"]['sg']) + ($datacl_sg["$thn-10"]['sg']) +
                            ($datacl_sg["$thn-11"]['sg']) + ($datacl_sg["$thn-12"]['sg']);
                    $total_upto_sp = ($datacl_sp["$thn-01"]['sp']) + ($datacl_sp["$thn-02"]['sp']) +
                            ($datacl_sp["$thn-03"]['sp']) + ($datacl_sp["$thn-04"]['sp']) +
                            ($datacl_sp["$thn-05"]['sp']) + ($datacl_sp["$thn-06"]['sp']) +
                            ($datacl_sp["$thn-07"]['sp']) + ($datacl_sp["$thn-08"]['sp']) +
                            ($datacl_sp["$thn-09"]['sp']) + ($datacl_sp["$thn-10"]['sp']) +
                            ($datacl_sp["$thn-11"]['sp']) + ($datacl_sp["$thn-12"]['sp']);
                    $total_upto_st = ($datacl_st["$thn-01"]['st']) + ($datacl_st["$thn-02"]['st']) +
                            ($datacl_st["$thn-03"]['st']) + ($datacl_st["$thn-04"]['st']) +
                            ($datacl_st["$thn-05"]['st']) + ($datacl_st["$thn-06"]['st']) +
                            ($datacl_st["$thn-07"]['st']) + ($datacl_st["$thn-08"]['st']) +
                            ($datacl_st["$thn-09"]['st']) + ($datacl_st["$thn-10"]['st']) +
                            ($datacl_st["$thn-11"]['st']) + ($datacl_st["$thn-12"]['st']);
                    $total_upto_tlcc = ($datacl_tlcc["$thn-01"]['tlcc']) + ($datacl_tlcc["$thn-02"]['tlcc']) +
                            ($datacl_tlcc["$thn-03"]['tlcc']) + ($datacl_tlcc["$thn-04"]['tlcc']) +
                            ($datacl_tlcc["$thn-05"]['tlcc']) + ($datacl_tlcc["$thn-06"]['tlcc']) +
                            ($datacl_tlcc["$thn-07"]['tlcc']) + ($datacl_tlcc["$thn-08"]['tlcc']) +
                            ($datacl_tlcc["$thn-09"]['tlcc']) + ($datacl_tlcc["$thn-10"]['tlcc']) +
                            ($datacl_tlcc["$thn-11"]['tlcc']) + ($datacl_tlcc["$thn-12"]['tlcc']);

                    $total_upto_smig = $total_upto_sg + $total_upto_sp + $total_upto_st + $total_upto_tlcc;

                    $total_rkap_smig = ($rkap_cl[1]['CLINKER']) + ($rkap_cl[2]['CLINKER']) +
                            ($rkap_cl[3]['CLINKER']) + ($rkap_cl[4]['CLINKER']) +
                            ($rkap_cl[5]['CLINKER']) + ($rkap_cl[6]['CLINKER']) +
                            ($rkap_cl[7]['CLINKER']) + ($rkap_cl[8]['CLINKER']) +
                            ($rkap_cl[9]['CLINKER']) + ($rkap_cl[10]['CLINKER']) +
                            ($rkap_cl[11]['CLINKER']) + ($rkap_cl[12]['CLINKER']);

                    $hasil_year_smig = ($total_upto_smig / $total_rkap_smig) * 100;
                    if ($hasil_year_smig > 100) {
                        echo '<h3 style="color: #71BA51;">' . number_format($hasil_year_smig, 2, ",", ".") . '<sup style="font-size: 20px">%</sup></h3>';
                    } else {
                        echo '<h3 style="color: #d9534f;">' . number_format($hasil_year_smig, 2, ",", ".") . '<sup style="font-size: 20px">%</sup></h3>';
                    }
                    ?>
                    <div class="row">
                        <div class="col-xs-6">RKAP : <p><?php echo number_format($total_rkap_smig, 0, ",", "."); ?> T</p></div>
                        <div class="col-xs-6">Real :<br><p class="text-center" style="color:#4e4e4e; float: left;"><?php echo number_format($total_upto_smig, 0, ",", ".")//$data['finishmill'];     ?> T</p></div>
                    </div>
                </div>
            </div>
            <div class="inner"><p class="text-center" style="color:#4e4e4e;" ></p> 
                <h3 style="color: #d9534f;">
                    <sup style="font-size: 20px"></sup></h3>
                <div class="row">
                    <div class="col-xs-6"></div>
                    <div class="col-xs-6"></div>
                </div>
            </div>
            <a href="<?php echo base_url(); ?>index.php/plant_system/dashboard_semen" class="small-box-footer" style="color: #4e4e4e">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
<div class="container testimonial-group col-sm-12">
    <div class="row">
        <?php
        $oracle = $this->load->database('oramso', TRUE);
        $Query1 = $oracle->query("SELECT TO_CHAR (DATE_PROD, 'YYYY-MM-DD') AS TGL FROM PIS_SP_PRODDAILY
                            WHERE ROWNUM = 1
                            ORDER BY DATE_PROD DESC");
        $Query2 = $oracle->query("SELECT TO_CHAR (DATE_PROD, 'YYYY-MM-DD') AS TGL2 FROM PIS_SG_PRODDAILY
                            WHERE ROWNUM = 1
                            ORDER BY DATE_PROD DESC");
        $data1 = $Query1->result_array();
        $data2 = $Query2->result_array();
        $tanggal_padang = date_create($data1['0']['TGL']);
        $tanggal_gresik = date_create($data2['0']['TGL2']);
        ?>
        <!-- ******************************** PADANG ******************************** -->
        <div class="col-1-5"><!--col-xs-12-->
            <div class="baris">
                <div class="col-sm-12" style="text-align: center">
                    <div class="small-box " style="background-color: #ff9b1f; color: #4e4e4e;  border: 1px #e4e4e4 solid; margin-bottom: 6px;">
                        <div class="inner" style="padding: 0px;"><p class="text-center" style="color:#fff"><b>Semen Padang</b></p></div>
                        <!--                    <div class="small-box-footer" style="line-height: 14px;">
                                                <marquee><?php echo 'Last Update on : ' . date_format($tanggal_gresik, "d F Y") . ''; ?></marquee>
                                            </div>-->
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="small-box " style="background-color: #ffffff; color: #4e4e4e;  border: 1px #e4e4e4 solid;  margin-bottom: 11px;">
                        <div class="inner"><p class="text-center" style="color:#4e4e4e">Cement</p>
                            <?php
                            $hasil_tot_semensp = number_format((($data_sp['0']['CEMENT'] / $rkap_sp['0']['SEMEN']) * 100), 2, ",", "."); //
                            if ($hasil_tot_semensp > 100) {
                                echo '<h3 style="color: #71BA51;">' . $hasil_tot_semensp . '<sup style="font-size: 20px">%</sup></h3>';
                            } else {
                                echo '<h3 style="color: #d9534f;">' . $hasil_tot_semensp . '<sup style="font-size: 20px">%</sup></h3>';
                            }
                            ?>
                            <div class="row">
                                <div class="col-xs-6">RKAP : <p><?php echo number_format($rkap_sp['0']['SEMEN'], 0, ",", "."); ?> T</p></div>
                                <div class="col-xs-6">Real :<br><p class="text-center" style="color:#4e4e4e; float: left;"><?php echo number_format($data_sp['0']['CEMENT'], 0, ",", "."); ?> T</p></div>
                            </div>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?php echo base_url(); ?>index.php/plant_padang/prod_semen" class="small-box-footer" style="color: #4e4e4e">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    <!--                        batas-->
                </div>
                <div class="col-sm-12">
                    <div class="small-box " style="background-color: #ffffff; color: #4e4e4e;  border: 1px #e4e4e4 solid;">
                        <div class="inner"><p class="text-center" style="color:#4e4e4e">Clinker</p>
                            <h3 style="color: #d9534f;">
                                <?php
                                $hasil_tot_klinsp = number_format((($data_sp['0']['CLINKER'] / $rkap_sp['0']['KLINKER'] ) * 100), 2, ",", "."); //
                                if ($hasil_tot_klinsp > 100) {
                                    echo $hasil_tot_klinsp;
                                } else {
                                    echo $hasil_tot_klinsp;
                                }
                                ?>
                                <sup style="font-size: 20px">%</sup></h3>
                            <div class="row">
                                <div class="col-xs-6">RKAP : <p><?php echo number_format($rkap_sp['0']['KLINKER'], 0, ",", "."); ?> T</p></div>
                                <div class="col-xs-6">Real :<br><p class="text-center" style="color:#4e4e4e; float: left;"><?php echo number_format($data_sp['0']['CLINKER'], 0, ",", "."); ?> T</p></div>
                            </div>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?php echo base_url(); ?>index.php/plant_padang/klin_semen" class="small-box-footer" style="color: #4e4e4e" id="btn_kGresik">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ******************************** GRESIK ******************************** -->
        <div class="col-1-5"><!--col-xs-12-->
            <div class="baris">
                <div class="col-sm-12" style="text-align: center">
                    <div class="small-box " style="background-color: #CD6B97; color: #4e4e4e;  border: 1px #e4e4e4 solid; margin-bottom: 6px;">
                        <div class="inner" style="padding: 0px;"><p class="text-center" style="color:#fff"><b>Semen Gresik</b></p></div>
                        <!--                    <div class="small-box-footer" style="line-height: 14px;">
                                                <marquee><?php echo 'Last Update on : ' . date_format($tanggal_gresik, "d F Y") . ''; ?></marquee>
                                            </div>-->
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="small-box " style="background-color: #ffffff; color: #4e4e4e;  border: 1px #e4e4e4 solid;  margin-bottom: 11px;">
                        <div class="inner"><p class="text-center" style="color:#4e4e4e">Cement</p>
                            <?php
                            $hasil_tot_semenrb = number_format((($data_rb['0']['CEMENT'] / $rkap_rb['0']['SEMEN']) * 100), 2, ",", ".");
                            if ($hasil_tot_semenrb > 100) {
                                echo '<h3 style="color: #71BA51;">' . $hasil_tot_semenrb . '<sup style="font-size: 20px">%</sup></h3>';
                            } else {
                                echo '<h3 style="color: #d9534f;">' . $hasil_tot_semenrb . '<sup style="font-size: 20px">%</sup></h3>';
                            }
                            ?>
                            <div class="row">
                                <div class="col-xs-6">RKAP : <p><?php echo number_format($rkap_rb['0']['SEMEN'], 0, ",", ".");  ?> T</p></div>
                                <div class="col-xs-6">Real :<br><p class="text-center" style="color:#4e4e4e; float: left;"><?php echo number_format($data_rb['0']['CEMENT'], 0, ",", ".");  ?> T</p></div>
                            </div>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?php echo base_url(); ?>index.php/plant_rembang/prod_semen" class="small-box-footer" style="color: #4e4e4e">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    <!--                        batas-->
                </div>
                <div class="col-sm-12">
                    <div class="small-box " style="background-color: #ffffff; color: #4e4e4e;  border: 1px #e4e4e4 solid;">
                        <div class="inner"><p class="text-center" style="color:#4e4e4e">Clinker</p>
                            <?php
                            $hasil_tot_klinrb = number_format((($data_rb['0']['CLINKER'] / $rkap_rb['0']['KLINKER']) * 100), 2, ",", ".");
                            if ($hasil_tot_klinrb > 100) {
                                echo '<h3 style="color: #71BA51;">' . $hasil_tot_klinrb . '<sup style="font-size: 20px">%</sup></h3>';
                            } else {
                                echo '<h3 style="color: #d9534f;">' . $hasil_tot_klinrb . '<sup style="font-size: 20px">%</sup></h3>';
                            }
                            ?>
                            <div class="row">
                                <div class="col-xs-6">RKAP : <p><?php echo number_format($rkap_rb['0']['KLINKER'], 0, ",", ".");  ?> T</p></div>
                                <div class="col-xs-6">Real :<br><p class="text-center" style="color:#4e4e4e; float: left;"><?php echo number_format($data_rb['0']['CLINKER'], 0, ",", ".");  ?> T</p></div>
                            </div>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?php echo base_url(); ?>index.php/plant_rembang/klin_semen" class="small-box-footer" style="color: #4e4e4e" id="btn_kGresik">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ******************************** KSO SI-SG ******************************** -->
        <div class="col-1-5"><!--col-xs-12-->
            <div class="baris">
                <div class="col-sm-12" style="text-align: center">
                    <div class="small-box " style="background-color: #53d0c0; color: #4e4e4e;  border: 1px #e4e4e4 solid; margin-bottom: 6px;">
                        <div class="inner" style="padding: 0px;"><p class="text-center" style="color:#fff"><b>KSO SG-SI</b></p></div>
                        <!--                    <div class="small-box-footer" style="line-height: 14px;">
                                                <marquee><?php echo 'Last Update on : ' . date_format($tanggal_gresik, "d F Y") . ''; ?></marquee>
                                            </div>-->
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="small-box " style="background-color: #ffffff; color: #4e4e4e;  border: 1px #e4e4e4 solid;  margin-bottom: 11px;">
                        <div class="inner"><p class="text-center" style="color:#4e4e4e">Cement</p>
                            <?php
                            $hasil_tot_semensg = number_format((($data['0']['CEMENT'] / $rkap['0']['SEMEN']) * 100), 2, ",", ".");
                            if ($hasil_tot_semensg > 100) {
                                echo '<h3 style="color: #71BA51;">' . $hasil_tot_semensg . '<sup style="font-size: 20px">%</sup></h3>';
                            } else {
                                echo '<h3 style="color: #d9534f;">' . $hasil_tot_semensg . '<sup style="font-size: 20px">%</sup></h3>';
                            }
                            ?>
                            <div class="row">
                                <div class="col-xs-6">RKAP : <p><?php echo number_format($rkap['0']['SEMEN'], 0, ",", "."); ?> T</p></div>
                                <div class="col-xs-6">Real :<br><p class="text-center" style="color:#4e4e4e; float: left;"><?php echo number_format($data['0']['CEMENT'], 0, ",", "."); ?> T</p></div>
                            </div>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?php echo base_url(); ?>index.php/plant_gresik/prod_semen" class="small-box-footer" style="color: #4e4e4e">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    <!--                        batas-->
                </div>
                <div class="col-sm-12">
                    <div class="small-box " style="background-color: #ffffff; color: #4e4e4e;  border: 1px #e4e4e4 solid;">
                        <div class="inner"><p class="text-center" style="color:#4e4e4e">Clinker</p>
                            <?php
                            $hasil_tot_klinsg = number_format((($data['0']['CLINKER'] / $rkap['0']['KLINKER']) * 100), 2, ",", ".");
                            if ($hasil_tot_klinsg > 100) {
                                echo '<h3 style="color: #71BA51;">' . $hasil_tot_klinsg . '<sup style="font-size: 20px">%</sup></h3>';
                            } else {
                                echo '<h3 style="color: #d9534f;">' . $hasil_tot_klinsg . '<sup style="font-size: 20px">%</sup></h3>';
                            }
                            ?>
                            <div class="row">
                                <div class="col-xs-6">RKAP : <p><?php echo number_format($rkap['0']['KLINKER'], 0, ",", "."); ?> T</p></div>
                                <div class="col-xs-6">Real :<br><p class="text-center" style="color:#4e4e4e; float: left;"><?php echo number_format($data['0']['CLINKER'], 0, ",", "."); ?> T</p></div>
                            </div>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?php echo base_url(); ?>index.php/plant_gresik/klin_semen" class="small-box-footer" style="color: #4e4e4e" id="btn_kGresik">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ******************************** TONASA ******************************** -->
        <div class="col-1-5"><!--col-xs-12-->
            <div class="baris">
                <div class="col-sm-12" style="text-align: center">
                    <div class="small-box " style="background-color: #62a9f9; color: #4e4e4e;  border: 1px #e4e4e4 solid; margin-bottom: 6px;">
                        <div class="inner" style="padding: 0px;"><p class="text-center" style="color:#fff"><b>Semen Tonasa</b></p> 
                        </div>
                        <?php
                        $oracle = $this->load->database('oramso', TRUE);
                        $Query1 = $oracle->query("SELECT TO_CHAR (DATE_PROD, 'YYYY-MM-DD') AS TGL FROM PIS_ST_PRODDAILY
                                            WHERE ROWNUM = 1
                                            ORDER BY DATE_PROD DESC");
                        $data = $Query1->result_array();
                        $tanggal_tonasa = date_create($data['0']['TGL']);
                        ?>
                        <!--<div class="small-box-footer" style="line-height: 14px;"><marquee><?php echo 'Last Update on : ' . date_format($tanggal_tonasa, "d F Y") . ''; ?></marquee>  </div>-->
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="small-box " style="background-color: #ffffff; color: #4e4e4e;  border: 1px #e4e4e4 solid;  margin-bottom: 11px;">
                        <div class="inner"><p class="text-center" style="color:#4e4e4e">Cement</p>
                            <?php
                            $hasil_tot_semenst = number_format((($data_st['0']['CEMENT'] / $rkap_st['0']['SEMEN']) * 100), 2, ",", "."); //
                            if ($hasil_tot_semenst > 100) {
                                echo '<h3 style="color: #71BA51;">' . $hasil_tot_semenst . '<sup style="font-size: 20px">%</sup></h3>';
                            } else {
                                echo '<h3 style="color: #d9534f;">' . $hasil_tot_semenst . '<sup style="font-size: 20px">%</sup></h3>';
                            }
                            ?>
                            <div class="row">
                                <div class="col-xs-6">RKAP : <p><?php echo number_format($rkap_st['0']['SEMEN'], 0, ",", "."); ?> T</p></div>
                                <div class="col-xs-6">Real :<br><p class="text-center" style="color:#4e4e4e; float: left;"><?php echo number_format($data_st['0']['CEMENT'], 0, ",", ".")//$data['finishmill'];      ?> T</p></div>
                            </div>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?php echo base_url(); ?>index.php/plant_tonasa/prod_semen" class="small-box-footer" style="color: #4e4e4e">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    <!--                        batas-->
                </div>
                <div class="col-sm-12">
                    <div class="small-box " style="background-color: #ffffff; color: #4e4e4e;  border: 1px #e4e4e4 solid;">
                        <div class="inner"><p class="text-center" style="color:#4e4e4e">Clinker</p>
                            <?php
                            $hasil_tot_klinst = number_format((( $data_st['0']['CLINKER'] / $rkap_st['0']['KLINKER']) * 100), 2, ",", "."); //
                            if ($hasil_tot_klinst > 100) {
                                echo '<h3 style="color: #71BA51;">' . $hasil_tot_klinst . '<sup style="font-size: 20px">%</sup></h3>';
                            } else {
                                echo '<h3 style="color: #d9534f;">' . $hasil_tot_klinst . '<sup style="font-size: 20px">%</sup></h3>';
                            }
                            ?>
                            <div class="row">
                                <div class="col-xs-6">RKAP : <p><?php echo number_format($rkap_st['0']['KLINKER'], 0, ",", "."); ?> T</p></div>
                                <div class="col-xs-6">Real :<br><p class="text-center" style="color:#4e4e4e; float: left;"><?php echo number_format($data_st['0']['CLINKER'], 0, ",", ".")//$data['kiln'];      ?> T</p></div>
                            </div>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?php echo base_url(); ?>index.php/plant_tonasa/klin_semen" class="small-box-footer" style="color: #4e4e4e">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ******************************** TLCC ******************************** -->
        <div class="col-1-5"><!--col-xs-12-->
            <div class="baris">
                <div class="col-sm-12" style="text-align: center">
                    <div class="small-box " style="background-color: #f76767; color: #4e4e4e;  border: 1px #e4e4e4 solid; margin-bottom: 6px;">
                        <div class="inner" style="padding: 0px;"><p class="text-center" style="color:#fff"><b>Thang Long Cement JSC</b></p></div>
                        <?php
                        $oracle = $this->load->database('oramso', TRUE);
                        $Query1 = $oracle->query("SELECT TO_CHAR (DATE_PROD, 'YYYY-MM-DD') AS TGL FROM PIS_TLCC_PRODDAILY
                                            WHERE ROWNUM = 1
                                            ORDER BY DATE_PROD DESC");
                        $data = $Query1->result_array();
                        $tanggal_tlcc = date_create($data['0']['TGL']);
                        ?>
                        <!--<div class="small-box-footer" style="line-height: 14px;"><marquee><?php echo 'Last Update on : ' . date_format($tanggal_tlcc, "d F Y") . ''; ?></marquee>  </div>-->
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="small-box " style="background-color: #ffffff; color: #4e4e4e;  border: 1px #e4e4e4 solid;  margin-bottom: 11px;">
                        <div class="inner"><p class="text-center" style="color:#4e4e4e">Cement</p>
                            <?php
                            $hasil_tot_sementl = number_format((($data_tl['0']['CEMENT'] / $rkap_tl['0']['SEMEN']) * 100), 2, ",", "."); //
                            if ($hasil_tot_sementl > 100) {
                                echo '<h3 style="color: #71BA51;">' . $hasil_tot_sementl . '<sup style="font-size: 20px">%</sup></h3>';
                            } else {
                                echo '<h3 style="color: #d9534f;">' . $hasil_tot_sementl . '<sup style="font-size: 20px">%</sup></h3>';
                            }
                            ?>
                            <div class="row">
                                <div class="col-xs-6">RKAP : <p><?php echo number_format($rkap_tl['0']['SEMEN'], 0, ",", "."); ?> T</p></div>
                                <div class="col-xs-6">Real :<br><p class="text-center" style="color:#4e4e4e; float: left;"><?php echo number_format($data_tl['0']['CEMENT'], 0, ",", ".")//$data['finishmill'];     ?> T</p></div>
                            </div>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?php echo base_url(); ?>index.php/plant_tlcc/prod_semen" class="small-box-footer" style="color: #4e4e4e">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    <!--                        batas-->
                </div>
                <div class="col-sm-12">

                    <div class="small-box " style="background-color: #ffffff; color: #4e4e4e;  border: 1px #e4e4e4 solid;">
                        <div class="inner"><p class="text-center" style="color:#4e4e4e">Clinker</p>
                            <?php
                            $hasil_tot_klintl = number_format((( $data_tl['0']['CLINKER'] / $rkap_tl['0']['KLINKER']) * 100), 2, ",", "."); //
                            if ($hasil_tot_klintl > 100) {
                                echo '<h3 style="color: #71BA51;">' . $hasil_tot_klintl . '<sup style="font-size: 20px">%</sup></h3>';
                            } else {
                                echo '<h3 style="color: #d9534f;">' . $hasil_tot_klintl . '<sup style="font-size: 20px">%</sup></h3>';
                            }
                            ?>
                            <div class="row">
                                <div class="col-xs-6">RKAP : <p><?php echo number_format($rkap_tl['0']['KLINKER'], 0, ",", "."); ?> T </p></div>
                                <div class="col-xs-6">Real :<br><p class="text-center" style="color:#4e4e4e; float: left;"><?php echo number_format($data_tl['0']['CLINKER'], 0, ",", ".")//$data['kiln'];      ?> T</p></div>
                            </div>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?php echo base_url(); ?>index.php/plant_tlcc/klin_semen" class="small-box-footer" style="color: #4e4e4e">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>