<?php $input = $this->input->get('input'); ?>
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
            series: [{
                    name: 'Ton Real',
                    type: 'column',
                    yAxis: 1,
                    //	zIndex: 1,
                    color: 'red',
                    borderRadius: 5,
                    data: [
                            <?php
                            if (!empty($DataTerak[1]['ton_real'])) {
                                echo $DataTerak[1]['ton_real'];
                                for ($i = 2; $i <= count($DataTerak); $i++) {
                                    echo "," . $DataTerak[$i]['ton_real'];
                                }
                            } else {
                                echo 0;
                            }
                            ?>
                    ],
                    borderWidth: 2,
                    borderColor: '#009900',
                    cursor: 'pointer'

//	Atas Chart 1
                }, {
                    name: 'Avg Real',
                    type: 'spline',
                    yAxis: 1,
                    zIndex: 2,
                    color: '#000099',
                    data: [
                    <?php
                    if (!empty($DataTerak[1]['avg_real'])) {
                        echo $DataTerak[1]['avg_real'];
                        for ($i = 2; $i <= count($DataTerak); $i++) {
                            if (!empty($DataTerak[$i]['avg_real'])) {
                                echo "," . $DataTerak[$i]['avg_real'];
                            }
                        }
                    } else {
                        echo 0;
                    }
                    ?>
                    ]
                }, {
                    name: 'Budget',
                    type: 'spline',
                    yAxis: 0,
                    zIndex: 3,
                    color: '#FF007F',
                    data: [
                    <?php
                    if (!empty($DataTerak[1]['accum_budget'])) {
                        echo $DataTerak[1]['accum_budget'];
                        for ($i = 2; $i <= count($DataTerak); $i++) {
                            echo "," . $DataTerak[$i]['accum_budget'];
                        }
                    } else {
                        echo 0;
                    }
                    ?>
                                        ]
                }, {
                    name: 'Prognosa',
                    type: 'spline',
                    yAxis: 0,
                    zIndex: 4,
                    data: [
                    <?php
                    if (!empty($DataTerak[1]['accum_prognosa'])) {
                        echo $DataTerak[1]['accum_prognosa'];
                        for ($i = 2; $i <= count($DataTerak); $i++) {
                            echo "," . $DataTerak[$i]['accum_prognosa'];
                        }
                    } else {
                        echo 0;
                    }
                    ?>
                    ],
                    tooltip: {
                        valueSuffix: ' Ton',
                        headerFormat: ''
                    }
                }, {
                    name: 'Accum Real',
                    type: 'spline',
                    yAxis: 0,
                    zIndex: 5,
                    color: '#FFFF00',
                    data: [
                    <?php
                    if (!empty($DataTerak[1]['accum_real'])) {
                        echo $DataTerak[1]['accum_real'];
                        for ($i = 2; $i <= count($DataTerak); $i++) {
                            if (!empty($DataTerak[$i]['accum_real'])) {
                                echo "," . $DataTerak[$i]['accum_real'];
                            }
                        }
                    } else {
                        echo 0;
                    }
                    ?>
                    ]
                }, {
                    name: 'Ton Design',
                    type: 'spline',
                    yAxis: 1,
                    zIndex: 6,
                    color: '#990000',
                    allowPointSelect: false,
                    data: [
                    <?php
                    if (!empty($DataTerak[1]['ton_design'])) {
                        echo $DataTerak[1]['ton_design'];
                        for ($i = 2; $i <= count($DataTerak); $i++) {
                            echo "," . $DataTerak[$i]['ton_design'];
                        }
                    } else {
                        echo 0;
                    }
                    ?>
                    ], dashStyle: 'shortdot', marker: {
                        enabled: false
                    },
                    shadow: false, tooltip: {
                        valueSuffix: ' Ton',
                        headerFormat: ''
                    }

                }]
        },
            function(chart) {
                var max = <?php
            if (!empty($DataTerak[1]['ton_design'])) {
                echo $DataTerak[1]['ton_design'];
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
                '</form>');
        $('body').append(form);
        $(form).submit();
    }
    function Btn_Tahun(tahun) {
        var url = "";
        var form = $('<form action="' + url + '" method="get">' +
                '<input type="hidden" name="input[periode]" value="<?php
if (!empty($input['periode'])) {
    echo $input['periode'];
} else {
    echo date('n');
}
?>" />' +
                '<input type="hidden" name="input[tahun]" value="' + tahun + '" />' +
                '</form>');
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