<?php
$month = $this->input->get('input');
$tanggal = date_create($data_tgl['0']['TGL']);
$my_tgl = date_format($tanggal, 'd');

/////dibutuhkan untuk data last month===JANGAN DIHAPUS
$bulannn = date_create($data_bulan['0']['BULAN']);
$my_bln = date_format($bulannn, 'm');


$prognose_cm = $prog_cm["COMPANY"]["CEMENT"];

if (!empty($des_cm['0']["CEMENT"])) {
    $design_cm = $des_cm['0']["CEMENT"];
} else {
    $design_cm = 0;
}
$prog = 0;
if (!empty($bud_cm['0']["BUDGET"])) {
    $budget_cm = $bud_cm['0']["BUDGET"];
} else {
    $budget_cm = 0;
}
$acc_real = 0;
$acc_real = 0;
$state_detail = 0;
$machine = $this->input->get('jenis');
if (!empty($machine)) {
    $state_detail = 1;
} else {
    $state_detail = 0;
}
$input = $this->input->get('input');
$tahun = !empty($input) ? $input['tahun'] : date('Y');
$bulan = !empty($input) ? $input['periode'] : date('n');
$plant = $this->input->get('jenis');
if($plant == 1){
    $plant_m = "mp";
} elseif ($plant == 2){
    $plant_m = "hcm";
} else {
    $plant_m = "ind10";
}

if(strlen($bulan) < 2){
    $this_bulan = '0'.$bulan;
} else {
    $this_bulan = $bulan;
}
$str_cocok = $tahun.$this_bulan;
// getting last update
$now = date('Ym');
$strday_last = date_create($last[0]['FULL_DAY']);
$day_last = date_format($strday_last,"Ym");

if($str_cocok == $day_last){
    $last_update = $last[0]['LAST_TGL'];
} else {
    $last_update = $my_tgl;
}
//end of getting last update
?>
<style>
    .hide_detail {
        display: none;
    }

    .show_detail {
        display: block;
    }
</style>
<script>
    $(function () {
        $('#btn_prod_semen').click(function () {
            window.location.href = 'index.php/eksekutif_report/eksekutif_report_cement/5';
        });
        $('#btn_prod_klin').click(function () {
            window.location.href = 'index.php/eksekutif_report/eksekutif_report_terak/5';
        });
        var state = <?php echo $state_detail; ?>;

        if (state == '1') {
            $('#operation_detail').addClass('show_detail');
            $('#operation_detail').removeClass('hide_detail');
            $('#operation_detail_x').addClass('show_detail');
            $('#operation_detail_x').removeClass('hide_detail');
        } else if (state == '0') {
            $('#operation_detail').addClass('hide_detail');
            $('#operation_detail').removeClass('show_detail');
            $('#operation_detail_x').addClass('hide_detail');
            $('#operation_detail_x').removeClass('show_detail');
        }
    });
</script>
<div class="row">
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
            <div>
                <ul class="nav navbar-nav">
                    <li><a href="#"> <span class="sr-only">(current)</span></a></li>
                    <li>
                    </li>
                </ul>
                <form class="navbar-form navbar-left">
                    <div class="form-group">
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-warning" aria-label="Left Align" id="btn_prod_klin" type="button">
                            Clinker
                        </button>
                        <button class="btn btn-default " aria-label="Left Align" id="btn_prod_semen" type="button">
                            Cement 
                        </button>
                    </div>
                </form>
            </div>
            <div style="padding-left: 500px">
                <ul class="nav navbar-nav navbar-center">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff "><?php echo date("F", mktime(0, 0, 0, $bulan, 10)) ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php
                            for ($i = 1; $i <= $my_bln; $i++) {
                                echo '<li>
                                            <button class="btn btn-default" type="button" id="bulan_' . $i . '" onclick="Btn_periode(' . $i . ')" style="min-width:120px;border:none;border-radius: 0 !important;">' . date("F", mktime(0, 0, 0, $i, 10)) . '</button>
                                          </li>';
                            }
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>
            <div style="padding-left: 600px">
                <ul class="nav navbar-nav navbar-center">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff "><?php echo $tahun ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php
                            for ($i = 2016; $i <= date('Y'); $i++) {
                                echo '<li>
                                        <button class="btn btn-default" type="button" id="Tahun_' . $i . '" onclick="Btn_Tahun(' . $i . ')" style="min-width:120px;">' . $i . '</button>
                                        </li>';
                            }
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>

            <div style="padding-left: 750px">
                <ul class="nav navbar-nav navbar-center">
                    <li class="dropdown">
                        <?php
                        $jenis_arr = array(1 => "FINISH MILL MP", 2 => "FINISH MILL HCM");
                        ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff ">
                            <?php
                            if ($plant == 0) {
                                echo 'SELECT EQUIPMENT';
                            } else {
                                echo $jenis_arr[$plant];
                            }
                            ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                            foreach ($jenis_arr as $i => $val) {
                                echo '<li> <button class="btn btn-default" data-periode="' . $bulan . '" type="button" id="mesin_' . $i . '" onclick="mesin(this,' . $i . ')" style="min-width:120px;border:none;border-radius: 0 !important;">' . $val . '</button></li>';
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
                                <a href="<?= base_url() ?>index.php/eksekutif_report/cement_1">SMIG GROUP</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="<?= base_url() ?>index.php/eksekutif_report/eksekutif_report_cement/2">PADANG</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="<?= base_url() ?>index.php/eksekutif_report/eksekutif_report_cement/6">GRESIK</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="<?= base_url() ?>index.php/eksekutif_report/eksekutif_report_cement/3">KSO SI-SG</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="<?= base_url() ?>index.php/eksekutif_report/eksekutif_report_cement/4">TONASA</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li class="active">
                                <a href="<?= base_url() ?>index.php/eksekutif_report/eksekutif_report_cement/5">TLCC</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>

<script type="text/javascript">
    $(function() {
        $('#bulan_<?php
                            if (!empty($input['periode'])) {
                                echo $input['periode'];
                            } else {
                                echo date('n');
                            }
                            ?>').addClass('active btn-danger');

        $('#Tahun_<?php
                            if (!empty($input['tahun'])) {
                                echo $input['tahun'];
                            } else {
                                echo date('Y');
                            }
                            ?>').addClass('active btn-danger');

        $('#mesin_<?php
                            if (!empty($plant)) {
                                echo $plant;
                            }
                            ?>').addClass('active btn-danger');

        $('#container').highcharts({
            chart: {
                zoomType: 'xy',
                height: 500,
            },
            title: {
                text: '<?php echo $Title; ?>'
            },
            subtitle: {
                text: 'Source: Plant Information System'
            },
            exporting: {
                enabled: false
            },
            credits: {
                enabled: false
            },
            xAxis: [{
                    categories: [<?php
                            $SumDate = date('t', mktime(0, 0, 0, date('n'), 1, date('Y')));
                            if (!empty($input['periode'])) {
                                $SumDate = date('t', mktime(0, 0, 0, $input['periode'], 1, $input['tahun']));
                            } else {
                                $SumDate = date('t', mktime(0, 0, 0, date('m'), 1, date('Y')));
                            }
                            echo '1';
                            for ($i = 2; $i <= $SumDate; $i++) {
                                echo ", $i";
                            }
                            ?>],
                    crosshair: true
                }],
            yAxis: [{// Primary yAxis
                    labels: {
                        format: '{value:,.0f} Ton',
                        style: {
                            color: 'black'
                        }
                    }, //tickInterval: 9000,
                    title: {
                        text: 'Accumulative',
                        style: {
                            color: Highcharts.getOptions().colors['brown']
                        }
                    },
//                            interval ada di sisi sebelah kanan layar
                    opposite: true, tickPositions: [<?php echo $Interval_r[0]['INTV_RIGHT']; ?>]
                }, {// Secondary yAxis
                    gridLineWidth: 1,
                    title: {
                        text: 'Real & Design',
                        style: {
                            color: Highcharts.getOptions().colors['black']
                        }
                    },
                    labels: {
                        format: '{value} Ton',
                        style: {
                            color: 'black'
                        }
                    }, tickPositions: [<?php echo $Interval_l[0]['INTV_LEFT']; ?>]

                }],
            tooltip: {
                shared: true,
                valueDecimals: 2,
                shadow: true,
                borderWidth: 0,
                backgroundColor: 'rgba(255,255,255,0.9)'
            },
            legend: {
                align: 'left',
                x: 80,
                verticalAlign: 'bottom',
                //    y: 55,
                //  floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
            },
            plotOptions: {
                series: {
                    cursor: 'pointer',
                    point: {
                        events: {
                            click: function() {
                                var tgl = this.category;
                                var tanggal = (tgl.length < 2) ? '0' + tgl : tgl;
                                var bulan = <?php echo $bulan ?>;
                                var tahun = <?php echo $tahun ?>;
                                var plant = <?php echo "'".$plant_m."'"?>;
                                if (plant != null) {
                                    var myUrl = 'eksekutif_report/get_fm_operation?tanggal=' + tgl + '&bulan=' + bulan + '&tahun=' + tahun + '&plant=' + plant + '&company=6000';
                                } else {
                                    var myUrl = 'eksekutif_report/get_fm_operation?tanggal=' + tgl + '&bulan=' + bulan + '&tahun=' + tahun + '&plant=mp&company=6000';
                                }
                                $.ajax({
                                    url: myUrl,
                                    type: 'GET',
                                    success: function(data) {
                                        var dataJson = JSON.parse(data);
                                        a = dataJson[0].DATE_PROD;
                                        c = dataJson[0].STOP_DESC;
                                        console.log(dataJson);
                                        $("#date_ops").html(a);
                                        $("#fm_ops").html(c);
                                    }
                                }).done(function(data) {
                                }).fail(function() {

                                });

                            }
                        }
                    }
                }
            },
            series: [{
                    name: 'Ton Design',
                    type: 'area',
                    yAxis: 1,
                    color: {
                        linearGradient: {x1: 0, x2: 0, y1: 0, y2: 1},
                        stops: [
                            [0, '#657576'],
                            [1, '#FFFFFF']
                        ]
                    },
                    allowPointSelect: false,
                    data: [<?php
                            $SumDate = date('t', mktime(0, 0, 0, date('n'), 1, date('Y')));
                            if (!empty($input['periode'])) {
                                $SumDate = date('t', mktime(0, 0, 0, $input['periode'], 1, $input['tahun']));
                            } else {
                                $SumDate = date('t', mktime(0, 0, 0, date('m'), 1, date('Y')));
                            }
                            for ($i = 1; $i <= $SumDate; $i++) {
                                $c = $design_cm;
                                if (!empty($c)) {
                                    echo $c . ",";
                                }
                            }
                            ?>]
                }, {
                    name: 'Ton Real',
                    type: 'column',
                    yAxis: 1,
                    //  zIndex: 1,
                    color: 'red',
                    borderRadius: 5,
                    data: [
<?php
if (!empty($ton_real[1]['TON_REAL'])) {
    echo $ton_real[1]['TON_REAL'];
    for ($i = 2; $i <= count($ton_real); $i++) {
        echo "," . $ton_real[$i]['TON_REAL'];
    }
} else {
    echo 0;
}
?>
                    ]
                }, {
                    name: 'Accum Real',
                    type: 'spline',
                    color: '#5E147D',
                    lineWidth :10 ,
                    tooltip: {
                        valueSuffix: ' T'
                    },
                    data: [<?php
for ($x = 1; $x < $last_update; $x++) {
    $acc_real += $ton_real[$x]["TON_REAL"];
    ;
    echo $acc_real . ",";
}
?>]
                }, {
                    name: 'Accum Prognose',
                    type: 'line',
                    color: '#92F22A',
                    tooltip: {
                        valueSuffix: ' T'
                    },
                    data: [<?php
$SumDate = date('t', mktime(0, 0, 0, date('n'), 1, date('Y')));
if (!empty($input['periode'])) {
    $SumDate = date('t', mktime(0, 0, 0, $input['periode'], 1, $input['tahun']));
} else {
    $SumDate = date('t', mktime(0, 0, 0, date('m'), 1, date('Y')));
}
for ($x = 1; $x <= $SumDate; $x++){
    if($x <= $last_update) {
        $prog += $ton_real[$x]["TON_REAL"];
    } else {
        $prog += $prognose[$x]['PROGNOSE'];
    }
    echo $prog . ",";
}
?>]
                }, {
                    name: 'Accum Budget',
                    type: 'spline',
                    color: '#0057A0',
                    tooltip: {
                        valueSuffix: ' T'
                    },
                    data: [<?php
$SumDate = date('t', mktime(0, 0, 0, date('n'), 1, date('Y')));
if (!empty($input['periode'])) {
    $SumDate = date('t', mktime(0, 0, 0, $input['periode'], 1, $input['tahun']));
} else {
    $SumDate = date('t', mktime(0, 0, 0, date('m'), 1, date('Y')));
}
for ($i = 1; $i <= $SumDate; $i++) {
    $c += $budget_cm;
    echo $c . ",";
}
?>]
                }]
        },
        function(chart) {
            var max = <?php
if (!empty($des_cm['0']["CEMENT"])) {
    echo $des_cm['0']["CEMENT"];
} else {
    echo 0;
}
?>;
            $.each(chart.series[1].data, function(i, data) {

                if (data.y < max)
                    data.update({
                        color: 'red'
                    });
                else
                    data.update({
                        color: '#006600'
                    });
            });
        });
<?php
if (!empty($MasterPlant)) {
    foreach ($MasterPlant as $rows) {
        $url = "eksekutif_report/DetailKlinker?plant=" . $rows['value'] . "&company=" . $rows['company'] . "&nama=" . $rows['nama'] . "&input[periode]=" . date('n') . "&input[tahun]=2016";

        echo '$("#link_' . $rows['value'] . '").click(function(){
                                        window.location.href = "' . $url . '";
                        });';
    }
}
?>
    });


    function mesin(elm, jenis) {
        var period = $(elm).data('periode');
        var url = "";
        var form = $('<form action="' + url + '" method="get">' +
                '<input type="hidden" name="jenis" value="' + jenis + '" />' +
                '<input type="hidden" name="period" value="' + period + '" />' +
                '<input type="hidden" name="input[periode]" value="' + period + '" />' +
                '<input type="hidden" name="input[tahun]" value="<?php
if (!empty($input['tahun'])) {
    echo $input['tahun'];
} else {
    echo date('Y');
}
?>" />' +
                '</form>'
                );
        $('body').append(form);
        $(form).submit();
    }

    function Btn_periode(periode) {
        var url = "";
        var form = $('<form action="' + url + '" method="get">' +
                '<input type="hidden" name="input[periode]" value="' + periode + '" />' +
                '<input type="hidden" name="input[tahun]" value="<?php
if (!empty($input['tahun'])) {
    echo $input['tahun'];
} else {
    echo date('Y');
}
?>" />' +
                '</form>'
                );
        $('body').append(form);
        $(form).submit();
    }

    function Btn_Tahun(tahun) {
        var url = "";
        var form = $('<form action="' + url + '" method="get">' +
                '<input type="hidden" name="input[periode]" value="<?php
if (!empty($input['periode']) and $input['periode'] > $my_bln) {
    echo $input['periode'];
} else {
    echo date('m');
}
?>" />' +
                '<input type="hidden" name="input[tahun]" value="' + tahun + '" />' +
                '</form>'
                );
        $('body').append(form);
        $(form).submit();
    }
</script>
<script src="Highcharts-4.2.4/js/highcharts.js"></script>
<script src="Highcharts-4.2.4/js/modules/exporting.js"></script>

<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
<div id="LoadDetail"></div>


<div class="col-lg-3" style="padding:0px;">
    <?php
    if (!empty($MasterPlant)) {
        foreach ($MasterPlant as $rows) {
            echo '<button type="button" class="btn btn-info" id="link_' . $rows['value'] . '" style="min-width:120px;">' . $rows['nama'] . '</button>';
        }
    }
    ?>
</div>

<!--<div style="padding-left: 50px">
    <div class="panel panel-default" style="padding:5px;border:none;border-radius: 0 !important;">
        <div style="padding:0px;">
            <strong>Design Capacity : </strong>
            <?php
            if (!empty($des_cl['0']["CLINKER"])) {
                echo '<b style="font-style: italic;">' . number_format($des_cl['0']["CLINKER"]) . '</b>';
            } else {
                echo '<b style="font-style: italic;">' . number_format(0, 2) . '</b>';
            }
            ?> Ton/Day &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;

            <strong>Avg. Real Capacity : </strong>
            <?php
            if (!empty($DataTerak[1]['ton_design'])) {
                echo '<b style="font-style: italic;">' . number_format($DataTerak[1]['ton_design']) . '</b>';
            } else {
                echo '<b style="font-style: italic;">' . number_format(0, 2) . '</b>';
            }
            ?> Ton/Day &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;

            <strong>Accum. Budget : </strong> <?php
            if (!empty($DataTerak[1]['ton_design'])) {
                echo '<b style="font-style: italic;">' . number_format($DataTerak[1]['ton_design']) . '</b>';
            } else {
                echo '<b style="font-style: italic;">' . number_format(0, 2) . '</b>';
            }
            ?> Ton &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;

            <strong>Accum. Real : </strong><?php
            if (!empty($DataTerak[1]['ton_design'])) {
                echo '<b style="font-style: italic;">' . number_format($DataTerak[1]['ton_design']) . '</b>';
            } else {
                echo '<b style="font-style: italic;">' . number_format(0, 2) . '</b>';
            }
            ?> Ton &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;

            <strong>Prognose : </strong><?php
            if (!empty($DataTerak[1]['ton_design'])) {
                echo '<b style="font-style: italic;">' . number_format($DataTerak[1]['ton_design']) . '</b>';
            } else {
                echo '<b style="font-style: italic;">' . number_format(0, 2) . '</b>';
            }
            ?> Ton &nbsp;&nbsp; &nbsp;
        </div>
    </div>
</div>-->
            
<br><br><br><br><br>
<div id="operation_detail_x" class="row">
    <div class="col-md-6 col-md-offset-3">
        <center><p style="background-color: red; color: white;">
                Please click on the chart bar to see detail about Finish Mill Operations
            </p></center>
    </div>
</div>

<div id="operation_detail" class="row">
    <div class="col-xs-12" style="margin-bottom: 0px">
        <table id="example1" class="table table-bordered table-striped">
            <thead class="thead-inverse">
                <tr style="background-color: red; color: white; padding: 1px">
                    <th style="width: 50px" class="text-center" >Date</th>
                    <th  class="text-center" style="width: 200px">Stop Desc</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center" style="padding: 1px">
                    <td style="width: 50px"><b><p id="date_ops"></p></b></td>
                    <td style="width: 200px"><b><p id="fm_ops"></p></b></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
