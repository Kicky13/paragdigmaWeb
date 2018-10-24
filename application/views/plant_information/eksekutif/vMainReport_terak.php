<?php
$bulannn = date_create($data_bulan['0']['BULAN']);
$my_bln = date_format($bulannn, 'm');
$txt_bln = explode('0', $my_bln);

$month = $this->input->get('input');
$tanggal = date_create($data_tgl['0']['TGL']);
$my_tgl = date_format($tanggal, 'd');

$prognose_cl = $prog_cl["COMPANY"]["CLINKER"];

if (!empty($des_cl['0']["CLINKER"])) {
    $design_cl = $des_cl['0']["CLINKER"];
} else {
    $design_cl = 0;
}

if (!empty($bud_cl['0']["BUDGET"])) {
    $budget_cl = $bud_cl['0']["BUDGET"];
} else {
    $budget_cl = 0;
}
$prog = 0;
$acc_real = 0;
$input = $this->input->get('input');
$tahun = !empty($input) ? $input['tahun'] : date('Y');
$bulan = !empty($input) ? $input['periode'] : date('n');

if (strlen($bulan) < 2) {
    $this_bulan = '0' . $bulan;
} else {
    $this_bulan = $bulan;
}
$str_cocok = $tahun . $this_bulan;
// getting last update
$now = date('Ym');
$strday_last = date_create($last[0]['FULL_DAY']);
$day_last = date_format($strday_last, "Ym");

if ($str_cocok == $day_last) {
    $last_update = $last[0]['LAST_TGL'];
} else {
    $last_update = $my_tgl;
}
//end of getting last update
?>
<script src="Highcharts-4.2.4/js/highcharts.js"></script>
<script src="Highcharts-4.2.4/js/modules/exporting.js"></script>
<script>
    $(document).ready(function () {
        $('#padang').addClass('active');
    });
    $(function () {
        $('#btn_prod_semen').click(function () {
            window.location.href = 'index.php/eksekutif_report/cement_1';
        });
        $('#btn_prod_klin').click(function () {
            window.location.href = 'index.php/eksekutif_report';
        });
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
                        <button class="btn btn-default" aria-label="Left Align" id="btn_prod_klin" type="button">
                            Clinker
                        </button>
                        <button class="btn btn-warning " aria-label="Left Align" id="btn_prod_semen" type="button">
                            Cement 
                        </button>
                    </div>
                </form>
            </div>
            <div style="padding-left: 750px">
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
            <div style="padding-left: 850px">
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
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff ">SMIG GROUP<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="active">
                                <a href="<?= base_url() ?>index.php/eksekutif_report">SMIG GROUP</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a id="padang" href="<?= base_url() ?>index.php/eksekutif_report/eksekutif_report_terak/2">PADANG</a>
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
                            <li>
                                <a href="<?= base_url() ?>index.php/eksekutif_report/eksekutif_report_terak/5">TLCC</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>

<?php
$input = $this->input->get('input');
$tahun = !empty($input) ? $input['tahun'] : date('Y');
$bulan = !empty($input) ? $input['periode'] : date('n');
$plant = $this->input->get('jenis');
?>
<script type="text/javascript">
    $(function () {
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
//                positioner: function () {
//                    return {x: 0, y: 0};
//                },
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
for ($i = 0; $i < $SumDate; $i++) {
    $c = $design_cl;
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
if (!empty($ton_real[0]['CLINKER'])) {
    echo $ton_real[0]['CLINKER'];
    for ($i = 1; $i < count($ton_real); $i++) {
        echo "," . $ton_real[$i]['CLINKER'];
    }
} else {
    echo 0;
}
?>
                    ],
//                    borderWidth: 2,
//                    borderColor: '#009900',
                    cursor: 'pointer'
                }, {
                    name: 'Accum Real',
                    type: 'spline',
                    color: '#5E147D',
                    lineWidth :10 ,
                    tooltip: {
                        valueSuffix: ' T'
                    },
                    data: [<?php
for ($i = 0; $i < $last_update-1; $i++) {
    $acc_real += $ton_real[$i]["CLINKER"];
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
for ($x = 0; $x < $SumDate; $x++) {
    if ($x <= $last_update) {
        $prog += $ton_real[$x]["CLINKER"];
    } else {
        $prog += $prognose[$x]['KL_PROGNOSE'];
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
    $c += $budget_cl;
    echo $c . ",";
}
?>]
                }
            ]
        },
                function (chart) {
                    var max = <?php
if (!empty($des_cl['0']["CLINKER"])) {
    echo $des_cl['0']["CLINKER"];
} else {
    echo 0;
}
?>;
                    $.each(chart.series[1].data, function (i, data) {

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

    function Btn_periode(periode) {
        var url = "<?= base_url() ?>index.php/eksekutif_report";
//        var url = "";
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
    echo date('m'); ////bulan
}
?>" />' +
                '<input type="hidden" name="input[tahun]" value="' + tahun + '" />' +
                '</form>'
                );
        $('body').append(form);
        $(form).submit();
    }
</script>
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
<div style="padding-left: 50px">
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
</div>