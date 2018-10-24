<!DOCTYPE HTML>
<html>
    <head>
        <title>Data Historian</title>
    </head>
    <body>
        <div class="row" style="padding-top: 1px;">
            <nav class="navbar navbar-default panelup">
                <div class="container-fluid">
                    <div class="navbar-header ">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <h3 style="text-align: left; padding-left: 12px; margin-top: 10px;">Production Daily Report</h3>
                    </div>

                    <div style="padding-left: 750px">
                        <ul class="nav navbar-nav navbar-center">
                            <li class="dropdown">
                                <?php
                                $jenis_arr = array(1 => "FINISH MILL 1", 2 => "FINISH MILL 2", 3 => "FINISH MILL 3",
                                    4 => "FINISH MILL 4", 5 => "FINISH MILL 5", 6 => "FINISH MILL 6", 7 => "FINISH MILL 7",
                                    8 => "FINISH MILL 8", 9 => "FINISH MILL 9", 10 => "FINISH MILL A", 11 => "FINISH MILL B", 12 => "FINISH MILL C", 13 => "FM CIGADING");
                                ?>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff ">
                                    <?php
                                    for ($x = 1; $x <= count($jenis_arr); $x++) {
                                        if ($x == 0) {
                                            echo 'SELECT EQUIPMENT';
                                        } else {
//                                            echo $jenis_arr[$x];
                                        }
                                    }
                                    ?>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php
                                    foreach ($jenis_arr as $i => $val) {
                                        echo '<li> <button class="btn btn-default" type="button" id="mesin_' . $i . '" onclick="mesin(this,' . $i . ')" style="min-width:120px;border:none;border-radius: 0 !important;">' . $val . '</button></li>';
                                    }
                                    ?>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff ">THANG LONG<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?= base_url() ?>index.php/eksekutif_report">SMIG GROUP</a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="<?= base_url() ?>index.php/eksekutif_report/eksekutif_report_terak/2">PADANG</a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="<?= base_url() ?>index.php/eksekutif_report/eksekutif_report_terak/6">GRESIK</a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="<?= base_url() ?>index.php/eksekutif_report/eksekutif_report_terak/3">KSO SI-SG</a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="<?= base_url() ?>index.php/eksekutif_report/eksekutif_report_terak/4">TONASA</a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li class="active"><a href="<?= base_url() ?>index.php/eksekutif_report/eksekutif_report_terak/5">TLCC</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <center>
                <div>
                    <iframe style="width: 100%; height: 450px; border: none; padding: 0; margin: 0;" id="load_chart" src="">
                    </iframe>
                </div>
            </center>
        </div>
    </body>

    <script>
        var uri = "http://10.15.26.4/influxdb/?m=Tuban4.Kiln4.Feed&t=TBN34_A&s=2017-09-01&e=2017-09-01&u=Ton/Hours";
        document.getElementById('load_chart').src = uri;
    </script>
</html>