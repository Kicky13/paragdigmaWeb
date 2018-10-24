<?php
//===================================================Untuk Quartal dan bulanan===================================================//
for ($i = 1; $i <= 12; $i++) {
    if (strlen($i) < 2) {
        $my_month = '0' . $i;
    } else {
        $my_month = $i;
    }

    if (empty($datacm_sg["$thn-$my_month"])) {
        $datacm_sg["$thn-$my_month"]['sg'] = 0;
    }
    if (empty($datacm_sp["$thn-$my_month"])) {
        $datacm_sp["$thn-$my_month"]['sp'] = 0;
    }
    if (empty($datacm_st["$thn-$my_month"])) {
        $datacm_st["$thn-$my_month"]['st'] = 0;
    }
    if (empty($datacm_tlcc["$thn-$my_month"])) {
        $datacm_tlcc["$thn-$my_month"]['tlcc'] = 0;
    }
}

$jml_jan = ($datacm_sg["$thn-01"]['sg']) + ($datacm_sp["$thn-01"]['sp']) + ($datacm_st["$thn-01"]['st']) + ($datacm_tlcc["$thn-01"]['tlcc']);
$jml_feb = ($datacm_sg["$thn-02"]['sg']) + ($datacm_sp["$thn-02"]['sp']) + ($datacm_st["$thn-02"]['st']) + ($datacm_tlcc["$thn-02"]['tlcc']);
$jml_mar = ($datacm_sg["$thn-03"]['sg']) + ($datacm_sp["$thn-03"]['sp']) + ($datacm_st["$thn-03"]['st']) + ($datacm_tlcc["$thn-03"]['tlcc']);

$total_upto_q1 = $jml_jan + $jml_feb + $jml_mar;

$total_rkap_q1 = ($rkap_cm[1]['CEMENT']) + ($rkap_cm[2]['CEMENT']) + ($rkap_cm[3]['CEMENT']);

$total_q1 = ($total_upto_q1 / $total_rkap_q1) * 100;

$jml_apr = ($datacm_sg["$thn-04"]['sg']) + ($datacm_sp["$thn-04"]['sp']) + ($datacm_st["$thn-04"]['st']) + ($datacm_tlcc["$thn-04"]['tlcc']);
$jml_may = ($datacm_sg["$thn-05"]['sg']) + ($datacm_sp["$thn-05"]['sp']) + ($datacm_st["$thn-05"]['st']) + ($datacm_tlcc["$thn-05"]['tlcc']);
$jml_jun = ($datacm_sg["$thn-06"]['sg']) + ($datacm_sp["$thn-06"]['sp']) + ($datacm_st["$thn-06"]['st']) + ($datacm_tlcc["$thn-06"]['tlcc']);

$total_upto_q2 = $jml_apr + $jml_may + $jml_jun;

$total_rkap_q2 = ($rkap_cm[4]['CEMENT']) + ($rkap_cm[5]['CEMENT']) + ($rkap_cm[6]['CEMENT']);

$total_q2 = ($total_upto_q2 / $total_rkap_q2) * 100;

$jml_jul = ($datacm_sg["$thn-07"]['sg']) + ($datacm_sp["$thn-07"]['sp']) + ($datacm_st["$thn-07"]['st']) + ($datacm_tlcc["$thn-07"]['tlcc']);
$jml_aug = ($datacm_sg["$thn-08"]['sg']) + ($datacm_sp["$thn-08"]['sp']) + ($datacm_st["$thn-08"]['st']) + ($datacm_tlcc["$thn-08"]['tlcc']);
$jml_sep = ($datacm_sg["$thn-09"]['sg']) + ($datacm_sp["$thn-09"]['sp']) + ($datacm_st["$thn-09"]['st']) + ($datacm_tlcc["$thn-09"]['tlcc']);

$total_upto_q3 = $jml_jul + $jml_aug + $jml_sep;

$total_rkap_q3 = ($rkap_cm[7]['CEMENT']) + ($rkap_cm[8]['CEMENT']) + ($rkap_cm[9]['CEMENT']);

$total_q3 = ($total_upto_q3 / $total_rkap_q3) * 100;

$jml_okt = ($datacm_sg["$thn-10"]['sg']) + ($datacm_sp["$thn-10"]['sp']) + ($datacm_st["$thn-10"]['st']) + ($datacm_tlcc["$thn-10"]['tlcc']);
$jml_nov = ($datacm_sg["$thn-11"]['sg']) + ($datacm_sp["$thn-11"]['sp']) + ($datacm_st["$thn-11"]['st']) + ($datacm_tlcc["$thn-11"]['tlcc']);
$jml_des = ($datacm_sg["$thn-12"]['sg']) + ($datacm_sp["$thn-12"]['sp']) + ($datacm_st["$thn-12"]['st']) + ($datacm_tlcc["$thn-12"]['tlcc']);

$total_upto_q4 = $jml_okt + $jml_nov + $jml_des;

$total_rkap_q4 = ($rkap_cm[10]['CEMENT']) + ($rkap_cm[11]['CEMENT']) + ($rkap_cm[12]['CEMENT']);

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
    <div><h4 style="text-align: center; margin-bottom: 2px;">Cement Production</h4></div>
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
                    <div class="realval">RKAP : <b><?php echo number_format($total_rkap_q2, 0, ",", "."); ?></b></div>
                    <div style="font-size: 16px; font-style: italic">Real : <b><?php echo number_format($total_upto_q2, 0, ",", "."); ?></b></div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 noPadding">
                <div id="quartal3" style="  min-height: 167px; margin: 0 auto" align="right"></div>
                <div class="panel panel-body noPadding" align="center" style=" margin-bottom: 0px;">
                    <div class="realval">RKAP : <b><?php echo number_format($total_rkap_q3, 0, ",", "."); ?></b></div>
                    <div style="font-size: 16px; font-style: italic">Real : <b><?php echo number_format($total_upto_q3, 0, ",", "."); ?></b></div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 noPadding">
                <div id="quartal4" style="  min-height: 167px; margin: 0 auto" align="right"></div>
                <div class="panel panel-body noPadding" align="center" style=" margin-bottom: 0px;">
                    <div class="realval">RKAP : <b><?php echo number_format($total_rkap_q4, 0, ",", "."); ?></b></div>
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
        if (arguments.length === 2) {
            sep = ",";
        }
        if (arguments.length === 1) {
            sep = ",";
            decpoint = ".";
        }
        num = num.toString();
        a = num.split(decpoint);
        x = a[0]; // decimal
        y = a[1]; // fraction
        z = "";


        if (typeof (x) !== "undefined") {
            for (i = x.length - 1; i >= 0; i--)
                z += x.charAt(i);
            z = z.replace(/(\d{3})/g, "$1" + sep);
            if (z.slice(-sep.length) === sep)
                z = z.slice(0, -sep.length);
            x = "";
            for (i = z.length - 1; i >= 0; i--)
                x += z.charAt(i);
            if (typeof (y) !== "undefined" && y.length > 0)
                x += decpoint + y;
        }
        return x;
    }
</script>

<script>
    $(function() {
//        var categoryLinks = {
//            'Jan': 'http://10.15.5.150/dev/PlantSystem/index.php/eksekutif_report/Cement?input[periode]=1&input[tahun]=2016',
//            'Feb': 'http://10.15.5.150/dev/PlantSystem/index.php/eksekutif_report/Cement?input[periode]=2&input[tahun]=2016',
//            'Mar': 'http://10.15.5.150/dev/PlantSystem/index.php/eksekutif_report/Cement?input[periode]=3&input[tahun]=2016',
//            'Apr': 'http://10.15.5.150/dev/PlantSystem/index.php/eksekutif_report/Cement?input[periode]=4&input[tahun]=2016',
//            'May': 'http://10.15.5.150/dev/PlantSystem/index.php/eksekutif_report/Cement?input[periode]=5&input[tahun]=2016',
//            'Jun': 'http://10.15.5.150/dev/PlantSystem/index.php/eksekutif_report/Cement?input[periode]=6&input[tahun]=2016',
//            'Jul': 'http://10.15.5.150/dev/PlantSystem/index.php/eksekutif_report/Cement?input[periode]=7&input[tahun]=2016',
//            'Aug': 'http://10.15.5.150/dev/PlantSystem/index.php/eksekutif_report/Cement?input[periode]=8&input[tahun]=2016',
//            'Sep': 'http://10.15.5.150/dev/PlantSystem/index.php/eksekutif_report/Cement?input[periode]=9&input[tahun]=2016',
//            'Oct': 'http://10.15.5.150/dev/PlantSystem/index.php/eksekutif_report/Cement?input[periode]=10&input[tahun]=2016',
//            'Nov': 'http://10.15.5.150/dev/PlantSystem/index.php/eksekutif_report/Cement?input[periode]=11&input[tahun]=2016',
//            'Dec': 'http://10.15.5.150/dev/PlantSystem/index.php/eksekutif_report/Cement?input[periode]=12&input[tahun]=2016'
//        };
        var categoryLinks = {
            'Jan': 'http://10.15.5.150/dev/PlantSystem/index.php/eksekutif_report/cement_1',
            'Feb': 'http://10.15.5.150/dev/PlantSystem/index.php/eksekutif_report/cement_1',
            'Mar': 'http://10.15.5.150/dev/PlantSystem/index.php/eksekutif_report/cement_1',
            'Apr': 'http://10.15.5.150/dev/PlantSystem/index.php/eksekutif_report/cement_1',
            'May': 'http://10.15.5.150/dev/PlantSystem/index.php/eksekutif_report/cement_1',
            'Jun': 'http://10.15.5.150/dev/PlantSystem/index.php/eksekutif_report/cement_1',
            'Jul': 'http://10.15.5.150/dev/PlantSystem/index.php/eksekutif_report/cement_1',
            'Aug': 'http://10.15.5.150/dev/PlantSystem/index.php/eksekutif_report/cement_1',
            'Sep': 'http://10.15.5.150/dev/PlantSystem/index.php/eksekutif_report/cement_1',
            'Oct': 'http://10.15.5.150/dev/PlantSystem/index.php/eksekutif_report/cement_1',
            'Nov': 'http://10.15.5.150/dev/PlantSystem/index.php/eksekutif_report/cement_1',
            'Dec': 'http://10.15.5.150/dev/PlantSystem/index.php/eksekutif_report/cement_1'
        };
        $('#container').highcharts({
            chart: {
                zoomType: 'xy',
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
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                labels: {
                    formatter: function() {
                        return '<a href="' + categoryLinks[this.value] + '">' + this.value + '</a>';
                    }
                }
            },
            yAxis: [{// Primary yAxis
                    labels: {
                        formatter: function() {
                            return Highcharts.numberFormat((this.value) / 1000, 0, ',', '.') + ' K';
                        },
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    min: 0,
                    max: 3500000,
                    title: {
                        text: 'Ton',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    }
                }],
            tooltip: {
                formatter: function() {
                    var s = '<b>' + this.x + '</b>';
                    s += '<br/><b>SMIG: </b>' + FormatNumberBy3((this.points[0].total / 1000).toFixed(0), ",", ".") + 'K T';
                    $.each(this.points, function(i, point) {
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
                    tooltip: {
                        valueSuffix: ' T'
                    },
                    data: [<?php
echo($datacm_sg["$thn-01"]['sg']);
echo ',';
echo ($datacm_sg["$thn-02"]['sg']);
echo ',';
echo ($datacm_sg["$thn-03"]['sg']);
echo ',';
echo ($datacm_sg["$thn-04"]['sg']);
echo ',';
echo ($datacm_sg["$thn-05"]['sg']);
echo ',';
echo ($datacm_sg["$thn-06"]['sg']);
echo ',';
echo ($datacm_sg["$thn-07"]['sg']);
echo ',';
echo ($datacm_sg["$thn-08"]['sg']);
echo ',';
echo ($datacm_sg["$thn-09"]['sg']);
echo ',';
echo ($datacm_sg["$thn-10"]['sg']);
echo ',';
echo ($datacm_sg["$thn-11"]['sg']);
echo ',';
echo ($datacm_sg["$thn-12"]['sg']);
?>]

                },
                {
                    name: 'SP',
                    type: 'column',
                    tooltip: {
                        valueSuffix: ' T'
                    },
                    data: [<?php
echo($datacm_sp["$thn-01"]['sp']);
echo ',';
echo ($datacm_sp["$thn-02"]['sp']);
echo ',';
echo ($datacm_sp["$thn-03"]['sp']);
echo ',';
echo ($datacm_sp["$thn-04"]['sp']);
echo ',';
echo ($datacm_sp["$thn-05"]['sp']);
echo ',';
echo ($datacm_sp["$thn-06"]['sp']);
echo ',';
echo ($datacm_sp["$thn-07"]['sp']);
echo ',';
echo ($datacm_sp["$thn-08"]['sp']);
echo ',';
echo ($datacm_sp["$thn-09"]['sp']);
echo ',';
echo ($datacm_sp["$thn-10"]['sp']);
echo ',';
echo ($datacm_sp["$thn-11"]['sp']);
echo ',';
echo ($datacm_sp["$thn-12"]['sp']);
?>]
                }, {
                    name: 'ST',
                    type: 'column',
                    tooltip: {
                        valueSuffix: ' T'
                    },
                    data: [<?php
echo($datacm_st["$thn-01"]['st']);
echo ',';
echo ($datacm_st["$thn-02"]['st']);
echo ',';
echo ($datacm_st["$thn-03"]['st']);
echo ',';
echo ($datacm_st["$thn-04"]['st']);
echo ',';
echo ($datacm_st["$thn-05"]['st']);
echo ',';
echo ($datacm_st["$thn-06"]['st']);
echo ',';
echo ($datacm_st["$thn-07"]['st']);
echo ',';
echo ($datacm_st["$thn-08"]['st']);
echo ',';
echo ($datacm_st["$thn-09"]['st']);
echo ',';
echo ($datacm_st["$thn-10"]['st']);
echo ',';
echo ($datacm_st["$thn-11"]['st']);
echo ',';
echo ($datacm_st["$thn-12"]['st']);
?>]
                },
                {
                    name: 'TLCC',
                    type: 'column',
                    tooltip: {
                        valueSuffix: ' T'
                    },
                    data: [<?php
echo($datacm_tlcc["$thn-01"]['tlcc']);
echo ',';
echo ($datacm_tlcc["$thn-02"]['tlcc']);
echo ',';
echo ($datacm_tlcc["$thn-03"]['tlcc']);
echo ',';
echo ($datacm_tlcc["$thn-04"]['tlcc']);
echo ',';
echo ($datacm_tlcc["$thn-05"]['tlcc']);
echo ',';
echo ($datacm_tlcc["$thn-06"]['tlcc']);
echo ',';
echo ($datacm_tlcc["$thn-07"]['tlcc']);
echo ',';
echo ($datacm_tlcc["$thn-08"]['tlcc']);
echo ',';
echo ($datacm_tlcc["$thn-09"]['tlcc']);
echo ',';
echo ($datacm_tlcc["$thn-10"]['tlcc']);
echo ',';
echo ($datacm_tlcc["$thn-11"]['tlcc']);
echo ',';
echo ($datacm_tlcc["$thn-12"]['tlcc']);
?>]
                },
                {
                    name: 'RKAP',
                    type: 'spline',
                    tooltip: {
                        valueSuffix: 'T'
                    },
                    data: [<?php
echo($rkap_cm[1]['CEMENT']);
echo ',';
echo ($rkap_cm[2]['CEMENT']);
echo ',';
echo ($rkap_cm[3]['CEMENT']);
echo ',';
echo ($rkap_cm[4]['CEMENT']);
echo ',';
echo ($rkap_cm[5]['CEMENT']);
echo ',';
echo ($rkap_cm[6]['CEMENT']);
echo ',';
echo ($rkap_cm[7]['CEMENT']);
echo ',';
echo ($rkap_cm[8]['CEMENT']);
echo ',';
echo ($rkap_cm[9]['CEMENT']);
echo ',';
echo ($rkap_cm[10]['CEMENT']);
echo ',';
echo ($rkap_cm[11]['CEMENT']);
echo ',';
echo ($rkap_cm[12]['CEMENT']);
?>]

                }]
        });
    });

    ///=====================QUARTAL 1============================
    $(function() {
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

    ///=====================QUARTAL 2============================
    $(function() {
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

    ///=====================QUARTAL 3============================
    $(function() {
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

    ///=====================QUARTAL 4============================
    $(function() {
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