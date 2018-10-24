<!DOCTYPE HTML>
<html>
    <head>
        <title><?php echo $Title ?></title>
        <script src="<?php echo base_url() ?>bootstrap/plantView/assets/js/jquery-1.11.3.min.js"></script>
        <script src="<?php echo base_url() ?>bootstrap/plantView/highcharts/highstock.js"></script>
        <!--<script src="<?php echo base_url() ?>bootstrap/plantView/highcharts/highcharts.js"></script>-->
        <style>
            .blink_me {
                animation: blinker 1s linear infinite;
            }
            @keyframes blinker {  
                50% { opacity: 0; }
            }
        </style>
    </head>
    <body>
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
                        <h3 style="text-align: left; padding-left: 12px; margin-top: 10px;">Gresik Plant Data Historian</h3>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                        <ul class="nav navbar-nav navbar-right">

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff ">Gresik<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?= base_url() ?>index.php/plant_historian/sp_hist">Padang</a></li>
                                    <li role="separator" class="divider"></li>

                                    <li class="active"><a href="<?= base_url() ?>index.php/plant_historian/sg_hist">Gresik</a></li>
                                    <li role="separator" class="divider"></li>

                                    <li><a href="<?= base_url() ?>index.php/plant_historian/st_hist">Tonasa</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?= base_url() ?>index.php/plant_historian/tlcc_hist">TLCC</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
        <!--        batas-->
        <div class="row">
            <div class="col-md-4">
                <select>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
            </div>
            <div class="col-md-4">
                <select>
                    <option>A</option>
                    <option>B</option>
                    <option>C</option>
                    <option>D</option>
                </select>
            </div>
            <div class="col-md-4">
                <select>
                    <option>1A</option>
                    <option>2B</option>
                    <option>3C</option>
                    <option>4D</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div id="chart_title" style="text-align: center; font-size: 20px; font-weight: bold"></div>
        </div>
        <div class="row" style=" overflow-x: scroll">
            <div id="container" style="width: 3000px; min-height: 400px;"></div>
        </div>
        <?php
        $url = 'http://par4digma.semenindonesia.com/api/index.php/plant_tuban/get_data_logger?m=04&y=2017&d=14&id=175';
        $obj = file_get_contents($url);
        $res = json_decode($obj, true);
        $my_array = array();
        $my_label = array();
        $my_data = array();

        foreach ($res['data_logger'] as $key => $value) {
            foreach ($value as $new) {
                $str_time = $value['str_time'];
                $full_date = $value['full_date'];
                $hari = $value['hari'];
                $jam = $value['jam'];
                $value_data = (float) $value['value'];
                $equip_desc = $value['equip_desc'];
                $plant = $value['plant'];
                $opco = $value['opco'];
                $description = $value['description'];

                $list = "[" . $str_time . "," . $value_data . "],";
                $list = "[" . $value_data . "],";
                $my_data = "[" . $list . "]";
                array_push($my_array, $value_data);
                array_push($my_label, $jam);
            }
        }
        ?>
        <script>
            var chartTitle = '<?= $opco."-".$description ?>';
            $("#chart_title").html(chartTitle);
            Highcharts.chart('container', {
                title: {
                    text: ''
                },
                credit: {
                    enabled: false
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: <?php echo json_encode($my_label) ?>
                },
                yAxis: {
                    title: {
                        text: 'Value'
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle'
                },
                plotOptions: {
                },
                series: [{
                        name: '<?= $description ?>',
                        data: <?php echo json_encode($my_array) ?>
                    }]

            });
        </script>
    </body>
</html>