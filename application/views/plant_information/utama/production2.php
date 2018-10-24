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
                <h3 style="text-align: left; padding-left: 12px; margin-top: 10px;">Real Time Plant Overview</h3>
            </div>


            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <!--<ul>
                <ol class="bread">
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Dashboard</li>
</ol>
  </ul>-->



                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff ">Plant List <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= base_url() ?>index.php/plant_padang/overview">Padang</a></li>
                            <li role="separator" class="divider"></li>

                            <li><a href="<?= base_url() ?>index.php/plant_gresik/overview">Gresik</a></li>
                            <li role="separator" class="divider"></li>

                            <li><a href="<?= base_url() ?>index.php/plant_tonasa/overview">Tonasa</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_tlcc/overview">TLCC</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>

<div class="panelku panel-default">
    <h4 style="text-align: center; font-style: bold; ">Cement & Clinker Annual Production</h4>
</div>
<div class="row">
    <div class="col-sm-12 col-xs-12">
        <div class="small-box " style="background-image: url(media/pattern.png); background-repeat: no-repeat; background-color: #ffffff; color: #4e4e4e;  border: 1px #e4e4e4 solid; margin-bottom: 5px;">
            <div class="col-xs-12 col-md-6">
                <img src="media/banner-logo.png" class="img-responsive" width="700px">
            </div>
            <div class="col-xs-12 col-md-3">
                <div class="inner"><p style="color:#4e4e4e; " >Cement</p> 
                    <h3 style="color: #d9534f;">
                        <?php
                        $total_upto_sg = ($datacm_sg["2016-01"]['sg']) + ($datacm_sg["2016-02"]['sg']) +
                                ($datacm_sg["2016-03"]['sg']) + ($datacm_sg["2016-04"]['sg']) +
                                ($datacm_sg["2016-05"]['sg']) + ($datacm_sg["2016-06"]['sg']) +
                                ($datacm_sg["2016-07"]['sg']) + ($datacm_sg["2016-08"]['sg']) + ($datacm_sg["2016-09"]['sg']); // +  ($datacm_sg["2016-10"]['sg']) + ($datacm_sg["2016-11"]['sg']) + ($datacm_sg["2016-12"]['sg']);
                        $total_upto_sp = ($datacm_sp["2016-01"]['sp']) + ($datacm_sp["2016-02"]['sp']) +
                                ($datacm_sp["2016-03"]['sp']) + ($datacm_sp["2016-04"]['sp']) +
                                ($datacm_sp["2016-05"]['sp']) + ($datacm_sp["2016-06"]['sp']) +
                                ($datacm_sp["2016-07"]['sp']) + ($datacm_sp["2016-08"]['sp']) + ($datacm_sp["2016-09"]['sp']); // + ($datacm_sp["2016-10"]['sp']) + ($datacm_sp["2016-11"]['sp']) + ($datacm_sp["2016-12"]['sp']);
                        $total_upto_st = ($datacm_st["2016-01"]['st']) + ($datacm_st["2016-02"]['st']) +
                                ($datacm_st["2016-03"]['st']) + ($datacm_st["2016-04"]['st']) +
                                ($datacm_st["2016-05"]['st']) + ($datacm_st["2016-06"]['st']) +
                                ($datacm_st["2016-07"]['st']) + ($datacm_st["2016-08"]['st']) + ($datacm_st["2016-09"]['st']); // + ($datacm_st["2016-10"]['st']) + ($datacm_st["2016-11"]['st']) + ($datacm_st["2016-12"]['st']);
                        $total_upto_tlcc = ($datacm_tlcc["2016-01"]['tlcc']) + ($datacm_tlcc["2016-02"]['tlcc']) +
                                ($datacm_tlcc["2016-03"]['tlcc']) + ($datacm_tlcc["2016-04"]['tlcc']) +
                                ($datacm_tlcc["2016-05"]['tlcc']) + ($datacm_tlcc["2016-06"]['tlcc']) +
                                ($datacm_tlcc["2016-07"]['tlcc']) + ($datacm_tlcc["2016-08"]['tlcc']) + ($datacm_tlcc["2016-09"]['tlcc']); // + ($datacm_tlcc["2016-10"]['tlcc']) + ($datacm_tlcc["2016-11"]['tlcc']) + ($datacm_tlcc["2016-12"]['tlcc']);

                        $total_upto_smig = $total_upto_sg + $total_upto_sp + $total_upto_st + $total_upto_tlcc;

                        $total_rkap_smig = ($rkap_cm[1]['cement']) + ($rkap_cm[2]['cement']) +
                                ($rkap_cm[3]['cement']) + ($rkap_cm[4]['cement']) +
                                ($rkap_cm[5]['cement']) + ($rkap_cm[6]['cement']) +
                                ($rkap_cm[7]['cement']) + ($rkap_cm[8]['cement']) +
                                ($rkap_cm[9]['cement']) + ($rkap_cm[10]['cement']) +
                                ($rkap_cm[11]['cement']) + ($rkap_cm[12]['cement']);

                        $hasil_year_smig = ($total_upto_smig / $total_rkap_smig) * 100;
                        if ($hasil_year_smig < 100) {
                            echo number_format($hasil_year_smig, 2, ",", ".");
                        } else {
                            echo number_format($hasil_year_smig, 2, ",", ".");
                        }
                        ?> 
                        <sup style="font-size: 20px">%</sup></h3>
                    <div class="row">
                        <div class="col-xs-6">RKAP : <p><?php echo number_format($total_rkap_smig, 0, ",", "."); ?> T</p></div>
                        <div class="col-xs-6">Real :<br><p class="text-center" style="color:#4e4e4e; float: left;"><?php echo number_format($total_upto_smig, 0, ",", ".")//$data['finishmill'];      ?> T</p></div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-3">

                <div class="inner"><p style="color:#4e4e4e; " >Clinker</p> 
                    <h3 style="color: #d9534f;">

                        <?php
                        $total_upto_sg = ($datacl_sg["2016-01"]['sg']) + ($datacl_sg["2016-02"]['sg']) +
                                ($datacl_sg["2016-03"]['sg']) + ($datacl_sg["2016-04"]['sg']) +
                                ($datacl_sg["2016-05"]['sg']) + ($datacl_sg["2016-06"]['sg']) +
                                ($datacl_sg["2016-07"]['sg']) + ($datacl_sg["2016-08"]['sg']) + ($datacl_sg["2016-09"]['sg']); // +  ($datacl_sg["2016-10"]['sg']) + ($datacl_sg["2016-11"]['sg']) + ($datacl_sg["2016-12"]['sg']);
                        $total_upto_sp = ($datacl_sp["2016-01"]['sp']) + ($datacl_sp["2016-02"]['sp']) +
                                ($datacl_sp["2016-03"]['sp']) + ($datacl_sp["2016-04"]['sp']) +
                                ($datacl_sp["2016-05"]['sp']) + ($datacl_sp["2016-06"]['sp']) +
                                ($datacl_sp["2016-07"]['sp']) + ($datacl_sp["2016-08"]['sp']) + ($datacl_sp["2016-09"]['sp']); // + ($datacl_sp["2016-10"]['sp']) + ($datacl_sp["2016-11"]['sp']) + ($datacl_sp["2016-12"]['sp']);
                        $total_upto_st = ($datacl_st["2016-01"]['st']) + ($datacl_st["2016-02"]['st']) +
                                ($datacl_st["2016-03"]['st']) + ($datacl_st["2016-04"]['st']) +
                                ($datacl_st["2016-05"]['st']) + ($datacl_st["2016-06"]['st']) +
                                ($datacl_st["2016-07"]['st']) + ($datacl_st["2016-08"]['st']) + ($datacl_st["2016-09"]['st']); // + ($datacl_st["2016-10"]['st']) + ($datacl_st["2016-11"]['st']) + ($datacl_st["2016-12"]['st']);
                        $total_upto_tlcc = ($datacl_tlcc["2016-01"]['tlcc']) + ($datacl_tlcc["2016-02"]['tlcc']) +
                                ($datacl_tlcc["2016-03"]['tlcc']) + ($datacl_tlcc["2016-04"]['tlcc']) +
                                ($datacl_tlcc["2016-05"]['tlcc']) + ($datacl_tlcc["2016-06"]['tlcc']) +
                                ($datacl_tlcc["2016-07"]['tlcc']) + ($datacl_tlcc["2016-08"]['tlcc']) + ($datacl_tlcc["2016-09"]['tlcc']); // + ($datacl_tlcc["2016-10"]['tlcc']) + ($datacl_tlcc["2016-11"]['tlcc']) + ($datacl_tlcc["2016-12"]['tlcc']);

                        $total_upto_smig = $total_upto_sg + $total_upto_sp + $total_upto_st + $total_upto_tlcc;

                        $total_rkap_smig = ($rkap_cl[1]['clinker']) + ($rkap_cl[2]['clinker']) +
                                ($rkap_cl[3]['clinker']) + ($rkap_cl[4]['clinker']) +
                                ($rkap_cl[5]['clinker']) + ($rkap_cl[6]['clinker']) +
                                ($rkap_cl[7]['clinker']) + ($rkap_cl[8]['clinker']) +
                                ($rkap_cl[9]['clinker']) + ($rkap_cl[10]['clinker']) +
                                ($rkap_cl[11]['clinker']) + ($rkap_cl[12]['clinker']);

                        $hasil_year_smig = ($total_upto_smig / $total_rkap_smig) * 100;
                        if ($hasil_year_smig < 100) {
                            echo number_format($hasil_year_smig, 2, ",", ".");
                        } else {
                            echo number_format($hasil_year_smig, 2, ",", ".");
                        }
                        ?> 
                        <sup style="font-size: 20px">%</sup></h3>
                    <div class="row">
                        <div class="col-xs-6">RKAP : <p><?php echo number_format($total_rkap_smig, 0, ",", "."); ?> T</p></div>
                        <div class="col-xs-6">Real :<br><p class="text-center" style="color:#4e4e4e; float: left;"><?php echo number_format($total_upto_smig, 0, ",", ".")//$data['finishmill'];      ?> T</p></div>
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
            <a href="<?php echo base_url(); ?>index.php/plant_system/dashboard_semen" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
<div class="row">
    <?php
    $postgresql = $this->load->database('psqlsatu', TRUE);
    $Query1 = $postgresql->query("SELECT date_prod from plg_sp_plant ORDER BY date_prod DESC LIMIT 1");
    $Query2 = $postgresql->query("SELECT date_prod from plg_sg_plant ORDER BY date_prod DESC LIMIT 1");
    $data1 = $Query1->result_array();
    $data2 = $Query2->result_array();
    $tanggal_padang = date_create($data1['0']['date_prod']);
    $tanggal_gresik = date_create($data2['0']['date_prod']);
    ?>
    <div class="col-sm-3 col-xs-12">
        <div class="baris">
            <div class="col-sm-12" style="text-align: center; ">
                <div class="small-box " style="background-color: #ff9b1f; color: #4e4e4e;  border: 1px #e4e4e4 solid; margin-bottom: 6px;">
                    <div class="inner" style="padding: 0px;"><p class="text-center" style="color:#fff"><b>Padang</b></p></div>
                    <div class="small-box-footer" style="line-height: 14px;">
                        <marquee><?php echo 'Last Update on : ' . date_format($tanggal_padang, "d F Y") . ''; ?></marquee>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="small-box" style="background-color: #ffffff; color: #4e4e4e;  border: 1px #e4e4e4 solid; margin-bottom: 11px;">
                    <div class="inner"><p class="text-center" style="color:#4e4e4e">Cement</p> 
                        <h3 style="color: #d9534f;">
                            <?php
                            $hasil_tot_semensp = number_format((($data_sp['0']['cement'] / $rkap_sp['0']['semen']) * 100), 2, ",", "."); //
                            if ($hasil_tot_semensp < 100) {
                                echo $hasil_tot_semensp;
                            } else {
                                echo $hasil_tot_semensp;
                            }
                            ?>
                            <sup style="font-size: 20px">%</sup></h3>
                        <div class="row">
                            <div class="col-xs-6">RKAP :<p><?php echo number_format($rkap_sp['0']['semen'], 0, ",", "."); ?> T</p></div>
                            <div class="col-xs-6">Real :<br><p class="text-center" style="color:#4e4e4e; float: left;"><?php echo number_format($data_sp['0']['cement'], 0, ",", ".")//$data['finishmill'];      ?> T</p></div>
                        </div>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>index.php/plant_padang/prod_semen" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="small-box " style="background-color: #ffffff; color: #4e4e4e;  border: 1px #e4e4e4 solid; margin-bottom: 11px;">
                    <div class="inner"><p class="text-center" style="color:#4e4e4e">Clinker</p> 
                        <h3 style="color: #d9534f;">
                            <?php
                            $hasil_tot_klinsp = number_format((($data_sp['0']['clinker'] / $rkap_sp['0']['klinker'] ) * 100), 2, ",", "."); //
                            if ($hasil_tot_klinsp < 100) {
                                echo $hasil_tot_klinsp;
                            } else {
                                echo $hasil_tot_klinsp;
                            }
                            ?>
                            <sup style="font-size: 20px">%</sup></h3>
                        <div class="row">
                            <div class="col-xs-6">RKAP :<p><?php echo number_format($rkap_sp['0']['klinker'], 0, ",", "."); ?> T </p></div>
                            <div class="col-xs-6">Real :<br><p class="text-center" style="color:#4e4e4e; float: left;"><?php echo number_format($data_sp['0']['clinker'], 0, ",", ".")//$data['kiln'];      ?> T</p></div>
                        </div>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>index.php/plant_padang/klin_semen" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3 col-xs-12">
        <div class="baris">
            <div class="col-sm-12" style="text-align: center">
                <div class="small-box " style="background-color: #53d0c0; color: #4e4e4e;  border: 1px #e4e4e4 solid; margin-bottom: 6px;">
                    <div class="inner" style="padding: 0px;"><p class="text-center" style="color:#fff"><b>Gresik</b></p></div>
                    <div class="small-box-footer" style="line-height: 14px;">
                        <marquee><?php echo 'Last Update on : ' . date_format($tanggal_gresik, "d F Y") . ''; ?></marquee>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="small-box " style="background-color: #ffffff; color: #4e4e4e;  border: 1px #e4e4e4 solid;  margin-bottom: 11px;">
                    <div class="inner"><p class="text-center" style="color:#4e4e4e">Cement</p> 
                        <h3 style="color: #d9534f;">
                            <?php
                            $hasil_tot_semensg = number_format((($data['finishmill'] / $rkap['0']['semen']) * 100), 2, ",", ".");
                            if ($hasil_tot_semensg < 100) {
                                echo $hasil_tot_semensg;
                            } else {
                                echo $hasil_tot_semensg;
                            }
                            ?>
                            <sup style="font-size: 20px">%</sup></h3>
                        <div class="row">
                            <div class="col-xs-6">RKAP : <p><?php echo number_format($rkap['0']['semen'], 0, ",", "."); ?> T</p></div>
                            <div class="col-xs-6">Real :<br><p class="text-center" style="color:#4e4e4e; float: left;"><?php echo number_format($data['finishmill'], 0, ",", "."); ?> T</p></div>
                        </div>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>index.php/plant_gresik/prod_semen" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                <!--                        batas-->
            </div>
            <div class="col-sm-12">
                <div class="small-box " style="background-color: #ffffff; color: #4e4e4e;  border: 1px #e4e4e4 solid;">
                    <div class="inner"><p class="text-center" style="color:#4e4e4e">Clinker</p> 
                        <h3 style="color: #d9534f;">
                            <?php
                            $hasil_tot_klinsg = number_format((($data['kiln'] / $rkap['0']['klinker']) * 100), 2, ",", ".");
                            if ($hasil_tot_klinsg < 100) {
                                echo $hasil_tot_klinsg;
                            } else {
                                echo $hasil_tot_klinsg;
                            }
                            ?>
                            <sup style="font-size: 20px">%</sup></h3>
                        <div class="row">
                            <div class="col-xs-6">RKAP : <p><?php echo number_format($rkap['0']['klinker'], 0, ",", "."); ?> T</p></div>
                            <div class="col-xs-6">Real :<br><p class="text-center" style="color:#4e4e4e; float: left;"><?php echo number_format($data['kiln'], 0, ",", "."); ?> T</p></div>
                        </div>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>index.php/plant_gresik/klin_semen" class="small-box-footer" id="btn_kGresik">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3 col-xs-12" >
        <div class="baris">
            <div class="col-sm-12" style="text-align: center">
                <div class="small-box " style="background-color: #62a9f9; color: #4e4e4e;  border: 1px #e4e4e4 solid; margin-bottom: 6px;">
                    <div class="inner" style="padding: 0px;"><p class="text-center" style="color:#fff"><b>Tonasa</b></p> 
                    </div>
                    <?php
                    $postgresql = $this->load->database('psqlsatu', TRUE);
                    $Query = $postgresql->query("SELECT date_prod from plg_st_plant ORDER BY date_prod DESC LIMIT 1");
                    $data = $Query->result_array();
                    $tanggal_tonasa = date_create($data['0']['date_prod']);
                    ?>
                    <div class="small-box-footer" style="line-height: 14px;"><marquee><?php echo 'Last Update on : ' . date_format($tanggal_tonasa, "d F Y") . ''; ?></marquee>  </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="small-box " style="background-color: #ffffff; color: #4e4e4e;  border: 1px #e4e4e4 solid;  margin-bottom: 11px;">
                    <div class="inner"><p class="text-center" style="color:#4e4e4e">Cement</p> 
                        <h3 style="color: #d9534f;">
                            <?php
                            $hasil_tot_semenst = number_format((($data_st['0']['cement'] / $rkap_st['0']['semen']) * 100), 2, ",", "."); //
                            if ($hasil_tot_semenst < 100) {
                                echo $hasil_tot_semenst;
                            } else {
                                echo $hasil_tot_semenst;
                            }
                            ?>
                            <sup style="font-size: 20px">%</sup></h3>
                        <div class="row">
                            <div class="col-xs-6">RKAP : <p><?php echo number_format($rkap_st['0']['semen'], 0, ",", "."); ?> T</p></div>
                            <div class="col-xs-6">Real :<br><p class="text-center" style="color:#4e4e4e; float: left;"><?php echo number_format($data_st['0']['cement'], 0, ",", ".")//$data['finishmill'];       ?> T</p></div>
                        </div>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>index.php/plant_tonasa/prod_semen" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                <!--                        batas-->
            </div>
            <div class="col-sm-12">
                <div class="small-box " style="background-color: #ffffff; color: #4e4e4e;  border: 1px #e4e4e4 solid;">
                    <div class="inner"><p class="text-center" style="color:#4e4e4e">Clinker</p> 
                        <h3 style="color: #d9534f;">
                            <?php
                            $hasil_tot_klinst = number_format((( $data_st['0']['clinker'] / $rkap_st['0']['klinker']) * 100), 2, ",", "."); //
                            if ($hasil_tot_klinst < 100) {
                                echo $hasil_tot_klinst;
                            } else {
                                echo $hasil_tot_klinst;
                            }
                            ?>
                            <sup style="font-size: 20px">%</sup></h3>
                        <div class="row">
                            <div class="col-xs-6">RKAP : <p><?php echo number_format($rkap_st['0']['klinker'], 0, ",", "."); ?> T</p></div>
                            <div class="col-xs-6">Real :<br><p class="text-center" style="color:#4e4e4e; float: left;"><?php echo number_format($data_st['0']['clinker'], 0, ",", ".")//$data['kiln'];       ?> T</p></div>
                        </div>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>index.php/plant_tonasa/klin_semen" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3 col-xs-12">
        <div class="baris">
            <div class="col-sm-12" style="text-align: center">
                <div class="small-box " style="background-color: #f76767; color: #4e4e4e;  border: 1px #e4e4e4 solid; margin-bottom: 6px;">
                    <div class="inner" style="padding: 0px;"><p class="text-center" style="color:#fff"><b>TLCC</b></p></div>
                    <?php
                    $postgresql = $this->load->database('psqlsatu', TRUE);
                    $Query = $postgresql->query("SELECT date_prod from plg_tlcc_plant ORDER BY date_prod DESC LIMIT 1");
                    $data = $Query->result_array();
                    $tanggal_tlcc = date_create($data['0']['date_prod']);
                    ?>
                    <div class="small-box-footer" style="line-height: 14px;"><marquee><?php echo 'Last Update on : ' . date_format($tanggal_tlcc, "d F Y") . ''; ?></marquee>  </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="small-box " style="background-color: #ffffff; color: #4e4e4e;  border: 1px #e4e4e4 solid;  margin-bottom: 11px;">
                    <div class="inner"><p class="text-center" style="color:#4e4e4e">Cement</p> 
                        <h3 style="color: #d9534f;">

                            <?php
                            $hasil_tot_sementl = number_format((($data_tl['0']['cement'] / $rkap_tl['0']['semen']) * 100), 2, ",", "."); //
                            if ($hasil_tot_sementl < 100) {
                                echo $hasil_tot_sementl;
                            } else {
                                echo $hasil_tot_sementl;
                            }
                            ?>
                            <sup style="font-size: 20px">%</sup></h3>
                        <div class="row">
                            <div class="col-xs-6">RKAP : <p><?php echo number_format($rkap_tl['0']['semen'], 0, ",", "."); ?> T</p></div>
                            <div class="col-xs-6">Real :<br><p class="text-center" style="color:#4e4e4e; float: left;"><?php echo number_format($data_tl['0']['cement'], 0, ",", ".")//$data['finishmill'];      ?> T</p></div>
                        </div>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>index.php/plant_tlcc/prod_semen" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                <!--                        batas-->
            </div>
            <div class="col-sm-12">

                <div class="small-box " style="background-color: #ffffff; color: #4e4e4e;  border: 1px #e4e4e4 solid;">
                    <div class="inner"><p class="text-center" style="color:#4e4e4e">Clinker</p> 
                        <h3 style="color: #d9534f;">

                            <?php
                            $hasil_tot_klintl = number_format((( $data_tl['0']['clinker'] / $rkap_tl['0']['klinker']) * 100), 2, ",", "."); //
                            if ($hasil_tot_klintl < 100) {
                                echo $hasil_tot_klintl;
                            } else {
                                echo $hasil_tot_klintl;
                            }
                            ?>
                            <sup style="font-size: 20px">%</sup></h3>
                        <div class="row">
                            <div class="col-xs-6">RKAP : <p><?php echo number_format($rkap_tl['0']['klinker'], 0, ",", "."); ?> T </p></div>
                            <div class="col-xs-6">Real :<br><p class="text-center" style="color:#4e4e4e; float: left;"><?php echo number_format($data_tl['0']['clinker'], 0, ",", ".")//$data['kiln'];       ?> T</p></div>
                        </div>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>index.php/plant_tlcc/klin_semen" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('#semenPadang').addClass("bg_plain");
        $('#klinkerPadang').addClass("bg_plain");
        $('#semenGresik').addClass("bg_plain");
        $('#klinkerGresik').addClass("bg_plain");
        $('#semenTonasa').addClass("bg_plain");
        $('#klinkerTonasa').addClass("bg_plain");
        $('#semenTLCC').addClass("bg_plain");
        $('#klinkerTLCC').addClass("bg_plain");
        /* Tombol Detail Semen*/
        $('#btn_sPadang').click(function() {
            window.location.href = '<?= base_url() ?>index.php/plant_padang/prod_semen?tahun=2016';
        });
        $('#btn_sGresik').click(function() {
            window.location.href = '<?= base_url() ?>index.php/plant_gresik/prod_semen?tahun=2016';
        });
        $('#btn_sTonasa').click(function() {
            window.location.href = '<?= base_url() ?>index.php/plant_tonasa/prod_semen?tahun=2016';
        });
        $('#btn_sTLCC').click(function() {
            window.location.href = '<?= base_url() ?>index.php/plant_tlcc/prod_semen?tahun=2016';
        });
        /* Tombol Detail Klinker*/
        $('#btn_kPadang').click(function() {
            window.location.href = '<?= base_url() ?>index.php/plant_padang/klin_semen?tahun=2016';
        });
        $('#btn_kGresik').click(function() {
            window.location.href = '<?= base_url() ?>index.php/plant_gresik/klin_semen?tahun=2016';
        });
        $('#btn_kTonasa').click(function() {
            window.location.href = '<?= base_url() ?>index.php/plant_tonasa/klin_semen?tahun=2016';
        });
        $('#btn_kTLCC').click(function() {
            window.location.href = '<?= base_url() ?>index.php/plant_tlcc/klin_semen?tahun=2016';
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
        font-family: "Segoe UI";
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
</style>