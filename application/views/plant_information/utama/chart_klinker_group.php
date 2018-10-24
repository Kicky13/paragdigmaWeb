<?php
//===================================================Untuk Quartal dan bulanan===================================================//
for ($i = 1; $i <= 12; $i++) {
    if (strlen($i) < 2) {
        $my_month = '0' . $i;
    } else {
        $my_month = $i;
    }

    if (empty($datacl_sg["$thn-$my_month"])) {
        $datacl_sg["$thn-$my_month"]['sg'] = 0;
    }
    if (empty($datacl_sp["$thn-$my_month"])) {
        $datacl_sp["$thn-$my_month"]['sp'] = 0;
    }
    if (empty($datacl_st["$thn-$my_month"])) {
        $datacl_st["$thn-$my_month"]['st'] = 0;
    }
    if (empty($datacl_tlcc["$thn-$my_month"])) {
        $datacl_tlcc["$thn-$my_month"]['tlcc'] = 0;
    }
}

$jml_jan = ($datacl_sg["$thn-01"]['sg']) + ($datacl_sp["$thn-01"]['sp']) + ($datacl_st["$thn-01"]['st']) + ($datacl_tlcc["$thn-01"]['tlcc']);
$jml_feb = ($datacl_sg["$thn-02"]['sg']) + ($datacl_sp["$thn-02"]['sp']) + ($datacl_st["$thn-02"]['st']) + ($datacl_tlcc["$thn-02"]['tlcc']);
$jml_mar = ($datacl_sg["$thn-03"]['sg']) + ($datacl_sp["$thn-03"]['sp']) + ($datacl_st["$thn-03"]['st']) + ($datacl_tlcc["$thn-03"]['tlcc']);

$total_upto_q1 = $jml_jan + $jml_feb + $jml_mar;

$total_rkap_q1 = ($rkap_cl[1]['CLINKER']) + ($rkap_cl[2]['CLINKER']) + ($rkap_cl[3]['CLINKER']);

$total_q1 = ($total_upto_q1 / $total_rkap_q1) * 100;

$jml_apr = ($datacl_sg["$thn-04"]['sg']) + ($datacl_sp["$thn-04"]['sp']) + ($datacl_st["$thn-04"]['st']) + ($datacl_tlcc["$thn-04"]['tlcc']);
$jml_may = ($datacl_sg["$thn-05"]['sg']) + ($datacl_sp["$thn-05"]['sp']) + ($datacl_st["$thn-05"]['st']) + ($datacl_tlcc["$thn-05"]['tlcc']);
$jml_jun = ($datacl_sg["$thn-06"]['sg']) + ($datacl_sp["$thn-06"]['sp']) + ($datacl_st["$thn-06"]['st']) + ($datacl_tlcc["$thn-06"]['tlcc']);

$total_upto_q2 = $jml_apr + $jml_may + $jml_jun;

$total_rkap_q2 = ($rkap_cl[4]['CLINKER']) + ($rkap_cl[5]['CLINKER']) + ($rkap_cl[6]['CLINKER']);

$total_q2 = ($total_upto_q2 / $total_rkap_q2) * 100;

$jml_jul = ($datacl_sg["$thn-07"]['sg']) + ($datacl_sp["$thn-07"]['sp']) + ($datacl_st["$thn-07"]['st']) + ($datacl_tlcc["$thn-07"]['tlcc']);
$jml_aug = ($datacl_sg["$thn-08"]['sg']) + ($datacl_sp["$thn-08"]['sp']) + ($datacl_st["$thn-08"]['st']) + ($datacl_tlcc["$thn-08"]['tlcc']);
$jml_sep = ($datacl_sg["$thn-09"]['sg']) + ($datacl_sp["$thn-09"]['sp']) + ($datacl_st["$thn-09"]['st']) + ($datacl_tlcc["$thn-09"]['tlcc']);

$total_upto_q3 = $jml_jul + $jml_aug + $jml_sep;

$total_rkap_q3 = ($rkap_cl[7]['CLINKER']) + ($rkap_cl[8]['CLINKER']) + ($rkap_cl[9]['CLINKER']);

$total_q3 = ($total_upto_q3 / $total_rkap_q3) * 100;

$jml_okt = ($datacl_sg["$thn-10"]['sg']) + ($datacl_sp["$thn-10"]['sp']) + ($datacl_st["$thn-10"]['st']) + ($datacl_tlcc["$thn-10"]['tlcc']);
$jml_nov = ($datacl_sg["$thn-11"]['sg']) + ($datacl_sp["$thn-11"]['sp']) + ($datacl_st["$thn-11"]['st']) + ($datacl_tlcc["$thn-11"]['tlcc']);
$jml_des = ($datacl_sg["$thn-12"]['sg']) + ($datacl_sp["$thn-12"]['sp']) + ($datacl_st["$thn-12"]['st']) + ($datacl_tlcc["$thn-12"]['tlcc']);

$total_upto_q4 = $jml_okt +$jml_nov +$jml_des;

$total_rkap_q4 = ($rkap_cl[10]['CLINKER']) + ($rkap_cl[11]['CLINKER']) + ($rkap_cl[12]['CLINKER']);

$total_q4 = ($total_upto_q4 / $total_rkap_q4) * 100;
?>


<style>
    .noPadding{
        padding-top:1px;
        padding-left:1px;
        padding-right:1px;
        padding-bottom:1px;
    }
    .twoPadding{
        padding-top:3px;
        padding-left:3px;
        padding-right:3px;
        padding-bottom:3px;
    }
    .cubesRun{
        min-height:50px;
        width:100%;
        font-size:11px;
    }
    .cubesRun2{
        min-height:110px;
        margin: auto;
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
    .red-indicator{
        background-color:#e3000e;
    }
    .green-indicator{
        background-color:#33cc33;
    }
    .img-rotate{
        -webkit-transform: rotate(180deg);
    }
    .img-thumbnail {
        display: inline-block;
        width: 100%;
        height: auto;
        padding: 4px;
        line-height: 1.42857143;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 4px;
        -webkit-transition: all .2s ease-in-out;
        -o-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
    }
    .realval{
        font-size: large;
    }
</style>

<div class="col-md-7 col-xs-12 img-thumbnail">
        <div><h3 style="text-align: center; margin-top: 4px;">SMIG Group Annual Production</h3></div>
        <div><h4 style="text-align: center; margin-bottom: 2px;">Clinker Production</h4></div>
        <div id="container" style="min-height: 330px;margin: 0 auto" align="right"></div>
        <div class="box-header with-border">
            <i class="fa fa-pie-chart" aria-hidden="true"></i>

            <h4 class="box-title">Quarterly Graph</h4>
        </div>
        <!-- /.box-body -->
        <div class="box-footer no-border" style="position: relative;">
            <div class="row" style="    text-align: center;  font-family: Segoe UI;">
                <div class="col-xs-6 col-md-3 noPadding">Q1</div>
                <div class="col-xs-6 col-md-3 noPadding">Q2</div>
                <div class="col-xs-6 col-md-3 noPadding">Q3</div>
                <div class="col-xs-6 col-md-3 noPadding">Q4</div>
            </div>
            <div class="row" style="color:#000">
                <div class="col-xs-6 col-md-3 noPadding">
                    <div id="quartal1" style="  min-height: 166px; margin: 0 auto" align="right"></div>
                    <div class="panel panel-body noPadding" align="center" style=" margin-bottom: 0px;">
                        <div class="realval">RKAP : <b><?php echo number_format($total_rkap_q1, 0, ",", "."); ?></b></div>
                        <div style="font-size: 16px; font-style: italic">Real : <b><?php echo number_format($total_upto_q1, 0, ",", "."); ?></b></div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 noPadding">
                    <div id="quartal2" style="  min-height: 166px; margin: 0 auto" align="right"></div>
                    <div class="panel panel-body noPadding" align="center" style=" margin-bottom: 0px;">
                        <div class="realval">RKAP : <b><?php echo number_format($total_rkap_q2, 0, ",", "."); ?></div>
                        <div style="font-size: 16px; font-style: italic">Real : <b><?php echo number_format($total_upto_q2, 0, ",", "."); ?></b></div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 noPadding">
                    <div id="quartal3" style="  min-height: 167px; margin: 0 auto" align="right"></div>
                    <div class="panel panel-body noPadding" align="center" style=" margin-bottom: 0px;">
                        <div class="realval">RKAP : <b><?php echo number_format($total_rkap_q3, 0, ",", "."); ?></div>
                        <div style="font-size: 16px; font-style: italic">Real : <b><?php echo number_format($total_upto_q3, 0, ",", "."); ?></b></div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 noPadding">
                    <div id="quartal4" style="  min-height: 167px; margin: 0 auto" align="right"></div>
                    <div class="panel panel-body noPadding" align="center" style=" margin-bottom: 0px;">
                        <div class="realval">RKAP : <b><?php echo number_format($total_rkap_q4, 0, ",", "."); ?></div>
                        <div style="font-size: 16px; font-style: italic">Real : <b><?php echo number_format($total_upto_q4, 0, ",", "."); ?></b></div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-footer -->
</div>

<script>
    function FormatNumberBy3(num, decpoint, sep) {
        // check for missing parameters and use defaults if so
        if (arguments.length === 2) {
            sep = ",";
        }
        if (arguments.length === 1) {
            sep = ",";
            decpoint = ".";
        }
        // need a string for operations
        num = num.toString();
        // separate the whole number and the fraction if possible
        a = num.split(decpoint);
        x = a[0]; // decimal
        y = a[1]; // fraction
        z = "";


        if (typeof (x) !== "undefined") {
            // reverse the digits. regexp works from left to right.
            for (i = x.length - 1; i >= 0; i--)
                z += x.charAt(i);
            // add seperators. but undo the trailing one, if there
            z = z.replace(/(\d{3})/g, "$1" + sep);
            if (z.slice(-sep.length) === sep)
                z = z.slice(0, -sep.length);
            x = "";
            // reverse again to get back the number
            for (i = z.length - 1; i >= 0; i--)
                x += z.charAt(i);
            // add the fraction back in, if it was there
            if (typeof (y) !== "undefined" && y.length > 0)
                x += decpoint + y;
        }
        return x;
    }
</script>
<script>
    $(function () {
        $('#container').highcharts({
            chart: {
                zoomType: 'xy',
//            width: 842,
//            height: 350,
                backgroundColor: 'transparent',
                spacingBottom: 50,
                spacingTop: 10,
                spacingLeft: 10,
                spacingRight: 10
            },
            colors: ['#97CE68', '#FEC606', '#FF7416', '#CF000F', '#8085e9', '#f15c80', '#e4d354', '#8085e8', '#8d4653', '#91e8e1'],
            credits: {
                enabled: false
            },
            exporting: {
                enabled: false
            },
            title: {
                text: ''
            },
            subtitle: {
                text: ''
            },
            xAxis: [{
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                }],
            yAxis: [{// Primary yAxis
                    labels: {
                        formatter: function () {
                            return Highcharts.numberFormat((this.value) / 1000, 0, ',', '.') + ' K';
                        },
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    min: 0,
                    max: 2450000,
                    title: {
                        text: 'Ton',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    }
                }, {// Secondary yAxis
                    title: {
                        text: '',
                        style: {
                            color: Highcharts.getOptions().colors[0]
                        }
                    },
                    min: 0,
                    max: 2450000,
                    labels: {
                        format: '{value} T',
                        style: {
                            color: Highcharts.getOptions().colors[0],
                            display: 'none'
                        }
                    },
                    opposite: true
                }],
            tooltip: {
                formatter: function () {
                    var s = '<b>' + this.x + '</b>';
                    s += '<br/><b>SMIG: </b>' + FormatNumberBy3((this.points[0].total / 1000).toFixed(0), ",", ".") + 'K T';
                    $.each(this.points, function (i, point) {
                        s += '<br/>' + point.series.name + ': ' + FormatNumberBy3((point.y / 1000).toFixed(0), ",", ".") + 'K T';
                    });
                    return s;
                },
                shared: true
            },
            legend: {
                layout: 'horizontal',
                align: 'right',
//            x: 3,
                verticalAlign: 'bottom',
                y: 40,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || 'transparent'
            },
            plotOptions: {
                column: {
                    stacking: 'normal'
                }
            },
            series: [
                {
                    name: 'SG',
                    type: 'column',
                    yAxis: 1,
                    tooltip: {
                        valueSuffix: ' T'
                    },
                    data: [<?php
echo($datacl_sg["$thn-01"]['sg']);
echo ',';
echo ($datacl_sg["$thn-02"]['sg']);
echo ',';
echo ($datacl_sg["$thn-03"]['sg']);
echo ',';
echo ($datacl_sg["$thn-04"]['sg']);
echo ',';
echo ($datacl_sg["$thn-05"]['sg']);
echo ',';
echo ($datacl_sg["$thn-06"]['sg']);
echo ',';
echo ($datacl_sg["$thn-07"]['sg']);
echo ',';
echo ($datacl_sg["$thn-08"]['sg']);
echo ',';
echo ($datacl_sg["$thn-09"]['sg']);
echo ',';
echo ($datacl_sg["$thn-10"]['sg']);
echo ',';
echo ($datacl_sg["$thn-11"]['sg']);
echo ',';
echo ($datacl_sg["$thn-12"]['sg']);
?>]

                },
                {
                    name: 'SP',
                    type: 'column',
                    yAxis: 1,
                    tooltip: {
                        valueSuffix: ' T'
                    },
                    data: [<?php
echo($datacl_sp["$thn-01"]['sp']);
echo ',';
echo ($datacl_sp["$thn-02"]['sp']);
echo ',';
echo ($datacl_sp["$thn-03"]['sp']);
echo ',';
echo ($datacl_sp["$thn-04"]['sp']);
echo ',';
echo ($datacl_sp["$thn-05"]['sp']);
echo ',';
echo ($datacl_sp["$thn-06"]['sp']);
echo ',';
echo ($datacl_sp["$thn-07"]['sp']);
echo ',';
echo ($datacl_sp["$thn-08"]['sp']);
echo ',';
echo ($datacl_sp["$thn-09"]['sp']);
echo ',';
echo ($datacl_sp["$thn-10"]['sp']);
echo ',';
echo ($datacl_sp["$thn-11"]['sp']);
echo ',';
echo ($datacl_sp["$thn-12"]['sp']);
?>]
                }, {
                    name: 'ST',
                    yAxis: 1,
                    type: 'column',
                    tooltip: {
                        valueSuffix: ' T'
                    },
                    data: [<?php
echo($datacl_st["$thn-01"]['st']);
echo ',';
echo ($datacl_st["$thn-02"]['st']);
echo ',';
echo ($datacl_st["$thn-03"]['st']);
echo ',';
echo ($datacl_st["$thn-04"]['st']);
echo ',';
echo ($datacl_st["$thn-05"]['st']);
echo ',';
echo ($datacl_st["$thn-06"]['st']);
echo ',';
echo ($datacl_st["$thn-07"]['st']);
echo ',';
echo ($datacl_st["$thn-08"]['st']);
echo ',';
echo ($datacl_st["$thn-09"]['st']);
echo ',';
echo ($datacl_st["$thn-10"]['st']);
echo ',';
echo ($datacl_st["$thn-11"]['st']);
echo ',';
echo ($datacl_st["$thn-12"]['st']);
?>]
                },
                {
                    name: 'TLCC',
                    yAxis: 1,
                    type: 'column',
                    tooltip: {
                        valueSuffix: ' T'
                    },
                    data: [<?php
echo($datacl_tlcc["$thn-01"]['tlcc']);
echo ',';
echo ($datacl_tlcc["$thn-02"]['tlcc']);
echo ',';
echo ($datacl_tlcc["$thn-03"]['tlcc']);
echo ',';
echo ($datacl_tlcc["$thn-04"]['tlcc']);
echo ',';
echo ($datacl_tlcc["$thn-05"]['tlcc']);
echo ',';
echo ($datacl_tlcc["$thn-06"]['tlcc']);
echo ',';
echo ($datacl_tlcc["$thn-07"]['tlcc']);
echo ',';
echo ($datacl_tlcc["$thn-08"]['tlcc']);
echo ',';
echo ($datacl_tlcc["$thn-09"]['tlcc']);
echo ',';
echo ($datacl_tlcc["$thn-10"]['tlcc']);
echo ',';
echo ($datacl_tlcc["$thn-11"]['tlcc']);
echo ',';
echo ($datacl_tlcc["$thn-12"]['tlcc']);
?>]
                },
                {
                    name: 'RKAP',
                    type: 'spline',
                    tooltip: {
                        valueSuffix: 'T'
                    },
                    data: [<?php
echo($rkap_cl[1]['CLINKER']);
echo ',';
echo ($rkap_cl[2]['CLINKER']);
echo ',';
echo ($rkap_cl[3]['CLINKER']);
echo ',';
echo ($rkap_cl[4]['CLINKER']);
echo ',';
echo ($rkap_cl[5]['CLINKER']);
echo ',';
echo ($rkap_cl[6]['CLINKER']);
echo ',';
echo ($rkap_cl[7]['CLINKER']);
echo ',';
echo ($rkap_cl[8]['CLINKER']);
echo ',';
echo ($rkap_cl[9]['CLINKER']);
echo ',';
echo ($rkap_cl[10]['CLINKER']);
echo ',';
echo ($rkap_cl[11]['CLINKER']);
echo ',';
echo ($rkap_cl[12]['CLINKER']);
?>]

                }]
        });
    });


    $(function () {

        $('#quartal1').highcharts({
            chart: {
                type: 'gauge',
                backgroundColor: 'transparent',
                plotBackgroundColor: null,
                plotBackgroundImage: null,
                plotBorderWidth: 0,
                plotShadow: false,
                width: 150,
                spacingBottom: 2,
                spacingTop: 2,
                spacingLeft: 2,
                spacingRight: 2
            },
            credits: {
                enabled: false
            },
            exporting: {
                enabled: false
            },
            title: {
                text: ''
            },
            pane: {
                startAngle: -150,
                endAngle: 150,
                background: [{
                        backgroundColor: {
                            linearGradient: {x1: 0, y1: 0, x2: 0, y2: 1},
                            stops: [
                                [0, '#FFF'],
                                [1, '#333']
                            ]
                        },
                        borderWidth: 0,
                        outerRadius: '109%'
                    }, {
                        backgroundColor: {
                            linearGradient: {x1: 0, y1: 0, x2: 0, y2: 1},
                            stops: [
                                [0, '#333'],
                                [1, '#FFF']
                            ]
                        },
                        borderWidth: 1,
                        outerRadius: '107%'
                    }, {
                        // default background
                    }, {
                        backgroundColor: '#DDD',
                        borderWidth: 0,
                        outerRadius: '105%',
                        innerRadius: '103%'
                    }]
            },
            // the value axis
            yAxis: {
                min: 0,
                max: 120,
                minorTickInterval: 'auto',
                minorTickWidth: 1,
                minorTickLength: 10,
                minorTickPosition: 'inside',
                minorTickColor: '#666',
                tickPixelInterval: 20,
                tickWidth: 2,
                tickPosition: 'inside',
                tickLength: 10,
                tickColor: '#666',
                labels: {
                    step: 2,
                    rotation: 'auto'
                },
//            title: {
//                text: '%'
//            },
                plotBands: [{
                        from: 0,
                        to: 50,
                        color: '#DF5353' // green
                    }, {
                        from: 50,
                        to: 100,
                        color: '#DDDF0D' // yellow
                    }, {
                        from: 100,
                        to: 120,
                        color: '#55BF3B' // red
                    }]
            },
            series: [{
                    name: 'Percentage',
                    data: [<?php echo number_format($total_q1, 2); ?>],
                    tooltip: {
                        valueSuffix: ' %'
                    }
                }]
        });

    });

    $(function () {

        $('#quartal2').highcharts({
            chart: {
                type: 'gauge',
                backgroundColor: 'transparent',
                plotBackgroundColor: null,
                plotBackgroundImage: null,
                plotBorderWidth: 0,
                plotShadow: false,
                width: 150,
                spacingBottom: 2,
                spacingTop: 2,
                spacingLeft: 2,
                spacingRight: 2
            },
            credits: {
                enabled: false
            },
            exporting: {
                enabled: false
            },
            title: {
                text: ''
            },
            pane: {
                startAngle: -150,
                endAngle: 150,
                background: [{
                        backgroundColor: {
                            linearGradient: {x1: 0, y1: 0, x2: 0, y2: 1},
                            stops: [
                                [0, '#FFF'],
                                [1, '#333']
                            ]
                        },
                        borderWidth: 0,
                        outerRadius: '109%'
                    }, {
                        backgroundColor: {
                            linearGradient: {x1: 0, y1: 0, x2: 0, y2: 1},
                            stops: [
                                [0, '#333'],
                                [1, '#FFF']
                            ]
                        },
                        borderWidth: 1,
                        outerRadius: '107%'
                    }, {
                        // default background
                    }, {
                        backgroundColor: '#DDD',
                        borderWidth: 0,
                        outerRadius: '105%',
                        innerRadius: '103%'
                    }]
            },
            // the value axis
            yAxis: {
                min: 0,
                max: 120,
                minorTickInterval: 'auto',
                minorTickWidth: 1,
                minorTickLength: 10,
                minorTickPosition: 'inside',
                minorTickColor: '#666',
                tickPixelInterval: 20,
                tickWidth: 2,
                tickPosition: 'inside',
                tickLength: 10,
                tickColor: '#666',
                labels: {
                    step: 2,
                    rotation: 'auto'
                },
                title: {
                    text: ''
                },
                plotBands: [{
                        from: 0,
                        to: 50,
                        color: '#DF5353' // green
                    }, {
                        from: 50,
                        to: 100,
                        color: '#DDDF0D' // yellow
                    }, {
                        from: 100,
                        to: 120,
                        color: '#55BF3B' // red
                    }]
            },
            series: [{
                    name: 'Percentage',
                    data: [<?php echo number_format($total_q2, 2); ?>],
                    tooltip: {
                        valueSuffix: ' %'
                    }
                }]
        });
    });

    $(function () {

        $('#quartal3').highcharts({
            chart: {
                type: 'gauge',
                backgroundColor: 'transparent',
                plotBackgroundColor: null,
                plotBackgroundImage: null,
                plotBorderWidth: 0,
                plotShadow: false,
                width: 150,
                spacingBottom: 2,
                spacingTop: 2,
                spacingLeft: 2,
                spacingRight: 2
            },
            credits: {
                enabled: false
            },
            exporting: {
                enabled: false
            },
            title: {
                text: ''
            },
            pane: {
                startAngle: -150,
                endAngle: 150,
                background: [{
                        backgroundColor: {
                            linearGradient: {x1: 0, y1: 0, x2: 0, y2: 1},
                            stops: [
                                [0, '#FFF'],
                                [1, '#333']
                            ]
                        },
                        borderWidth: 0,
                        outerRadius: '109%'
                    }, {
                        backgroundColor: {
                            linearGradient: {x1: 0, y1: 0, x2: 0, y2: 1},
                            stops: [
                                [0, '#333'],
                                [1, '#FFF']
                            ]
                        },
                        borderWidth: 1,
                        outerRadius: '107%'
                    }, {
                        // default background
                    }, {
                        backgroundColor: '#DDD',
                        borderWidth: 0,
                        outerRadius: '105%',
                        innerRadius: '103%'
                    }]
            },
            // the value axis
            yAxis: {
                min: 0,
                max: 120,
                minorTickInterval: 'auto',
                minorTickWidth: 1,
                minorTickLength: 10,
                minorTickPosition: 'inside',
                minorTickColor: '#666',
                tickPixelInterval: 20,
                tickWidth: 2,
                tickPosition: 'inside',
                tickLength: 10,
                tickColor: '#666',
                labels: {
                    step: 2,
                    rotation: 'auto'
                },
                title: {
                    text: ''
                },
                plotBands: [{
                        from: 0,
                        to: 50,
                        color: '#DF5353' // green
                    }, {
                        from: 50,
                        to: 100,
                        color: '#DDDF0D' // yellow
                    }, {
                        from: 100,
                        to: 120,
                        color: '#55BF3B' // red
                    }]
            },
            series: [{
                    name: 'Percentage',
                    data: [<?php echo number_format($total_q3, 2); ?>],
                    tooltip: {
                        valueSuffix: ' %'
                    }
                }]

        });
    });

    $(function () {

        $('#quartal4').highcharts({
            chart: {
                type: 'gauge',
                backgroundColor: 'transparent',
                plotBackgroundColor: null,
                plotBackgroundImage: null,
                plotBorderWidth: 0,
                plotShadow: false,
                width: 150,
                spacingBottom: 2,
                spacingTop: 2,
                spacingLeft: 2,
                spacingRight: 2
            },
            credits: {
                enabled: false
            },
            exporting: {
                enabled: false
            },
            title: {
                text: ''
            },
            pane: {
                startAngle: -150,
                endAngle: 150,
                background: [{
                        backgroundColor: {
                            linearGradient: {x1: 0, y1: 0, x2: 0, y2: 1},
                            stops: [
                                [0, '#FFF'],
                                [1, '#333']
                            ]
                        },
                        borderWidth: 0,
                        outerRadius: '109%'
                    }, {
                        backgroundColor: {
                            linearGradient: {x1: 0, y1: 0, x2: 0, y2: 1},
                            stops: [
                                [0, '#333'],
                                [1, '#FFF']
                            ]
                        },
                        borderWidth: 1,
                        outerRadius: '107%'
                    }, {
                        // default background
                    }, {
                        backgroundColor: '#DDD',
                        borderWidth: 0,
                        outerRadius: '105%',
                        innerRadius: '103%'
                    }]
            },
            // the value axis
            yAxis: {
                min: 0,
                max: 120,
                minorTickInterval: 'auto',
                minorTickWidth: 1,
                minorTickLength: 10,
                minorTickPosition: 'inside',
                minorTickColor: '#666',
                tickPixelInterval: 20,
                tickWidth: 2,
                tickPosition: 'inside',
                tickLength: 10,
                tickColor: '#666',
                labels: {
                    step: 2,
                    rotation: 'auto'
                },
                title: {
                    text: ''
                },
                plotBands: [{
                        from: 0,
                        to: 50,
                        color: '#DF5353' // green
                    }, {
                        from: 50,
                        to: 100,
                        color: '#DDDF0D' // yellow
                    }, {
                        from: 100,
                        to: 120,
                        color: '#55BF3B' // red
                    }]
            },
            series: [{
                    name: 'Percentage',
                    data: [<?php echo number_format($total_q4, 2); ?>],
                    tooltip: {
                        valueSuffix: ' %'
                    }
                }]

        });
    });
</script>