<!DOCTYPE HTML>
<html>
    <head>
        <title><?php echo $Title ?></title>
        <script src="<?php echo base_url()?>bootstrap/plantView/assets/js/jquery-1.11.3.min.js"></script>
        <script src="<?php echo base_url()?>bootstrap/plantView/highcharts/highcharts.js"></script>
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
                        <h3 style="text-align: left; padding-left: 12px; margin-top: 10px;">TLCC Plant Data Historian</h3>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                        <ul class="nav navbar-nav navbar-right">

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff ">TLCC<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?= base_url() ?>index.php/plant_historian/sp_hist">Padang</a></li>
                                    <li role="separator" class="divider"></li>

                                    <li><a href="<?= base_url() ?>index.php/plant_historian/sg_hist">Gresik</a></li>
                                    <li role="separator" class="divider"></li>

                                    <li><a href="<?= base_url() ?>index.php/plant_historian/st_hist">Tonasa</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li class="active"><a href="<?= base_url() ?>index.php/plant_historian/tlcc_hist">TLCC</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
        <!--        batas-->
        <div class="row">
            <div id="container" style="width: 1170px; min-height: 400px"></div>
        </div>
        <script>
            Highcharts.chart('container', {
                title: {
                    text: 'Solar Employment Growth by Sector, 2010-2016'
                },
                subtitle: {
                    text: 'Source: thesolarfoundation.com'
                },
                yAxis: {
                    title: {
                        text: 'Number of Employees'
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle'
                },
                plotOptions: {
                    series: {
                        pointStart: 2010
                    }
                },
                series: [{
                        name: 'Installation',
                        data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
                    }, {
                        name: 'Manufacturing',
                        data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
                    }, {
                        name: 'Sales & Distribution',
                        data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
                    }, {
                        name: 'Project Development',
                        data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
                    }, {
                        name: 'Other',
                        data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
                    }]

            });
        </script>
    </body>
</html>