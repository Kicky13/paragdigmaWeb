<?php
$month = $this->input->get('input');
$tanggal = date_create($data_tgl['0']['TGL']);
$my_tgl = date_format($tanggal, 'd');
//echo '<h1>'.$my_tgl.'</h1><br><h3>'.$data_tgl['0']['TGL'].'</h3><br><h2>'.$month['periode'].'</h2>';
$prognose_cm = $prog_cm["COMPANY"]["CEMENT"];

if (!empty($design_cm['0']["CEMENT"])) {
    $design_cm = $design_cm['0']["CEMENT"];
} else {
    $design_cm = 0;
}

if (!empty($bud_cm['0']["BUDGET"])) {
    $budget_cm = $bud_cm['0']["BUDGET"];
} else {
    $budget_cm = 0;
}

$acc_real =0;
?>
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
                <h3 style="text-align: left; padding-left: 12px; margin-top: 10px;">Eksekutif Report</h3>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff ">Report List <span class="caret"></span></a>
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
                                <a href="<?= base_url() ?>index.php/eksekutif_report/eksekutif_report_cement/3">GRESIK</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="<?= base_url() ?>index.php/eksekutif_report/eksekutif_report_cement/4">TONASA</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/eksekutif_report/eksekutif_report_cement/5">TLCC</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>

<?php $input = $this->input->get('input');
    $tahun = !empty($input) ? $input['tahun'] : date('Y');
    $bulan = !empty($input) ? $input['periode'] : date('n');
    $plant = $this->input->get('jenis');
?>
        <script type="text/javascript">
            $(function() {
                $('#bulan_<?php
                    if (!empty($input['periode'])) {
                        echo $input['periode'];
                    }else {
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
                        zoomType: 'xy'
                    },
                    title: {
                        text: '<?php echo $Title; ?>'
                    },
                    subtitle: {
                        text: 'Source: Plant Information System'
                    },
                    xAxis: [{
                            categories: [<?php
                            $SumDate = date('t', mktime(0, 0, 0, date('n'), 1, date('Y')));
                            //if(!empty($input['periode'])) { $SumDate = date('t', mktime(0, 0, 0, $input['periode'], 1, $input['tahun']));}else{$SumDate = date('t', mktime(0, 0, 0, date('m'), 1, date('Y'))); }
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
                            text: 'real',
                            style: {
                                color: Highcharts.getOptions().colors[2]
                            }
                        },
    //                            interval ada di sisi sebelah kanan layar
                        opposite: true, tickPositions: [<?php echo $Interval[0]; ?>]
                    }, {// Secondary yAxis
                    gridLineWidth: 1,
                    title: {
                        text: 'Design',
                        style: {
                            color: Highcharts.getOptions().colors[0]
                        }
                    },
                    labels: {
                        format: '{value} Ton',
                        style: {
                            color: 'black'
                        }
                    }, tickPositions: [<?php echo $Interval[1]; ?>]

                }],
                tooltip: {
                    shared: true,
                    positioner: function() {
                        return {x: 0, y: 0};
                    },
                    valueDecimals: 2
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
                    spline: {
                        marker: {
                            enabled: false
                        }
                    },
                    line: {
                        marker: {
                            enabled: false
                        }
                    },
                    area: {
                        marker: {
                            enabled: false
                        }
                    }
                },
                series: [
                {
                    name: 'Ton Budget',
                    type: 'spline',
                    yAxis: 1,
                    zIndex: 6,
                    color: '#e67e22',
                    allowPointSelect: false,
                    tooltip: {
                        valueSuffix: ' T'
                    },
                    data: [<?php
                        for ($i = 1; $i <= date('t'); $i++) {
                            $c = $budget_cm;
                            echo $c . ",";
                        }
                        ?>]
                }, {
                    name: 'Ton Design',
                    type: 'spline',
                    yAxis: 1,
                    zIndex: 6,
                    color: '#990000',
                    allowPointSelect: false,
                    data: [<?php
                            for ($i = 1; $i <= date('t'); $i++) {
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
                    color: '#27ae60',
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
                },{
                name: 'Prognose Harian',
                type: 'spline',
                    yAxis: 1,
                tooltip: {
                    valueSuffix: ' T'
                },
                data: [<?php 
                for ($x = 1; $x < $my_tgl; $x++) {
                    $get_real_cm = $ton_real[$x]["TON_REAL"];
                    $prog = $get_real_cm;
                    echo $prog . ",";
                }
                for ($x < $my_tgl; $x <= date('t'); $x++) {
                    $prog = $prognose_cm;
                    echo $prog . ",";
                }
                ?>]
            },{
                name: 'Accum Real',
                type: 'spline',
                color: '#e67e22',
                tooltip: {
                    valueSuffix: ' T'
                },
                data: [<?php
                for ($x = 1; $x < $my_tgl; $x++) {
                    $acc_real += $ton_real[$x]["TON_REAL"];;
                    echo $acc_real . ","; }
                    ?>]
            },{
                name: 'Accum Budget',
                type: 'spline',
                tooltip: {
                    valueSuffix: ' T'
                },
                data: [<?php 
                for ($i = 1; $i <= date('t'); $i++) {
                    $c += $budget_cm;
                    echo $c.",";
                }?>]
            },{
                name: 'Accum Prognose',
                type: 'line',
                tooltip: {
                    valueSuffix: ' T'
                },
                data: [<?php 
                for ($x = 1; $x < $my_tgl; $x++) {
                    $prog += $ton_real[$x]["TON_REAL"];;
                    echo $prog . ",";
                }
                for ($x < $my_tgl; $x <= date('t'); $x++) {
                    $prog += $prognose_cm;
                    echo $prog . ",";
                }
                ?>]
            }]
        },
        function(chart) {
            var max = <?php
                        if (!empty($tlcc_ton_design[1]['CLINKER'])) {
                            echo $tlcc_ton_design[1]['CLINKER'];
                        } else {
                            echo 0;
                        }
                        ?>;
            $.each(chart.series[0].data, function(i, data) {

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
    
    function mesin(elm,jenis) {
        var period = $(elm).data('periode');
//        console.log(period);
        var url = "";
        var form = $('<form action="' + url + '" method="get">' +
                '<input type="hidden" name="jenis" value="' + jenis + '" />'+
                '<input type="hidden" name="period" value="' + period + '" />'+
                '<input type="hidden" name="input[periode]" value="' + period + '" />'+
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
        var url = "<?= base_url() ?>index.php/eksekutif_report/eksekutif_report_cement/2";
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
                        if (!empty($input['tahun'])) {
                            echo $input['tahun'];
                        } else {
                            echo date('y');
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
<div class="col-lg-4" style="padding:0px;">

    <?php
    for ($i = 1; $i <= 12; $i++) {
        echo '<button class="btn btn-default" type="button" id="bulan_' . $i . '" onclick="Btn_periode(' . $i . ')" style="min-width:120px;border:none;border-radius: 0 !important;">' . date("F", mktime(0, 0, 0, $i, 10)) . '</button>';
    }
    ?>

</div>

<div class="col-lg-2" style="padding:0px;">
    <div class="btn-group" aria-label="First group" role="group">
        <?php
        for ($i = 2016; $i <= date('Y'); $i++) {
            echo '<button class="btn btn-default" type="button" id="Tahun_' . $i . '" onclick="Btn_Tahun(' . $i . ')" style="min-width:120px;">' . $i . '</button>';
        }
        ?>
    </div>
</div>


<!--tombol permesin-->

<div class="col-lg-3">
    <?php
    for ($i = 1; $i <= 7; $i++) {
            if ($i == 1) {
                echo '<button class="btn btn-default" data-periode="'.$bulan.'" type="button" id="mesin_' . $i . '" onclick="mesin(this,' . $i . ')" style="min-width:120px;border:none;border-radius: 0 !important;">' . "Finish Mill II" . '</button>';
            } elseif ($i == 2) {
                echo '<button class="btn btn-default" data-periode="'.$bulan.'" type="button" id="mesin_' . $i . '" onclick="mesin(this,' . $i . ')" style="min-width:120px;border:none;border-radius: 0 !important;">' . "Finish Mill III" . '</button>';
            } elseif ($i == 3) {
                echo '<button class="btn btn-default" data-periode="'.$bulan.'" type="button" id="mesin_' . $i . '" onclick="mesin(this,' . $i . ')" style="min-width:120px;border:none;border-radius: 0 !important;">' . "Finish Mill IV a" . '</button>';
            } elseif ($i == 4) {
                echo '<button class="btn btn-default" data-periode="'.$bulan.'" type="button" id="mesin_' . $i . '" onclick="mesin(this,' . $i . ')" style="min-width:120px;border:none;border-radius: 0 !important;">' . "Finish Mill IV b" . '</button>';
            } elseif ($i == 5) {
                echo '<button class="btn btn-default" data-periode="'.$bulan.'" type="button" id="mesin_' . $i . '" onclick="mesin(this,' . $i . ')" style="min-width:120px;border:none;border-radius: 0 !important;">' . "Finish Mill V a" . '</button>';
            } elseif ($i == 6) {
                echo '<button class="btn btn-default" data-periode="'.$bulan.'" type="button" id="mesin_' . $i . '" onclick="mesin(this,' . $i . ')" style="min-width:120px;border:none;border-radius: 0 !important;">' . "Finish Mill V b" . '</button>';
            } elseif ($i == 7) {
                echo '<button class="btn btn-default" data-periode="'.$bulan.'" type="button" id="mesin_' . $i . '" onclick="mesin(this,' . $i . ')" style="min-width:120px;border:none;border-radius: 0 !important;">' . "Finish Mill FMDM" . '</button>';
            }
        }
    ?>

</div>

<div class="col-lg-3" style="padding:0px;">
    <?php
    if (!empty($MasterPlant)) {
        foreach ($MasterPlant as $rows) {
            echo '<button type="button" class="btn btn-info" id="link_' . $rows['value'] . '" style="min-width:120px;">' . $rows['nama'] . '</button>';
        }
    }
    ?>
</div>
<div class="col-lg-3" style="padding:0px;">
    <div class="panel panel-default" style="padding:5px;border:none;border-radius: 0 !important;">
        <strong>Design Capacity</strong> <?php
        if (!empty($DataTerak[1]['ton_design'])) {
            echo number_format($DataTerak[1]['ton_design']);
        } else {
            echo 0;
        }
        ?> Ton/ Day <br>
        <strong>Accum. Budget</strong> Ton<br>
        <strong>Prognosa</strong> Ton<br>
    </div>
</div>