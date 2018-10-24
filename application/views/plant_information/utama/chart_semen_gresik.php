<?php
for ($i = 1; $i <= 12; $i++) {
    if (strlen($i) < 2) {
        $my_month = '0' . $i;
    } else {
        $my_month = $i;
    }

    if (empty($myData["$thn-$my_month"])) {
        $myData["$thn-$my_month"]['tuban1'] = 0;
        $myData["$thn-$my_month"]['tuban2'] = 0;
        $myData["$thn-$my_month"]['tuban3'] = 0;
        $myData["$thn-$my_month"]['tuban4'] = 0;
        $myData["$thn-$my_month"]['gresik'] = 0;
    }
}
$total_rkap_q1 = ($DProduction[1]['cement']) + ($DProduction[2]['cement']) + ($DProduction[3]['cement']);
$total_upto_q1 = (array_sum(($myData["$thn-01"]))) + (array_sum(($myData["$thn-02"]))) + (array_sum(($myData["$thn-03"])));
$hasil_q1 = ($total_upto_q1 / $total_rkap_q1) * 100;

$total_rkap_q2 = ($DProduction[4]['cement']) + ($DProduction[5]['cement']) + ($DProduction[6]['cement']);
$total_upto_q2 = (array_sum(($myData["$thn-04"]))) + (array_sum(($myData["$thn-05"]))) + (array_sum(($myData["$thn-06"])));
$hasil_q2 = ($total_upto_q2 / $total_rkap_q2) * 100;

$total_rkap_q3 = ($DProduction[7]['cement']) + ($DProduction[8]['cement']) + ($DProduction[9]['cement']);
$total_upto_q3 = (array_sum(($myData["$thn-07"]))) + (array_sum(($myData["$thn-08"]))) + (array_sum(($myData["$thn-09"])));
$hasil_q3 = ($total_upto_q3 / $total_rkap_q3) * 100;

$total_rkap_q4 = ($DProduction[10]['cement']) + ($DProduction[11]['cement']) + ($DProduction[12]['cement']);
$total_upto_q4 = (array_sum(($myData["$thn-10"]))) + (array_sum(($myData["$thn-11"])))+ (array_sum(($myData["$thn-12"])));
$hasil_q4 = ($total_upto_q4 / $total_rkap_q4) * 100;
?>

<script language="JavaScript" src="http://www.hashemian.com/js/NumberFormat.js"></script>

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
    <div><h3 style="text-align: center; margin-top: 4px;">KSO SI-SG Annual Production</h3></div>
    <div><h4 style="text-align: center; margin-bottom: 2px;">Cement Production</h4></div>
    <div id="container" style="min-height: 330px; margin: 0 auto;"></div>
    <div class="box-header with-border">
        <i class="fa fa-pie-chart" aria-hidden="true"></i>
        <h4 class="box-title">Quarterly Graph</h4>
    </div>
    <div class="box-footer no-border" style="position: relative;">
        <div class="row" style="color:#000">
            <div class="col-xs-6 col-md-3 noPadding">
                <div class="col-xs-6 col-md-3 noPadding" align="right" style="font-style: italic; font-weight: bold;">Q1</div>
                <div id="quartal1" style="  min-height: 166px; margin: 0 auto" align="right"></div>
                <div class="panel panel-body noPadding" align="center" style=" margin-bottom: 0px;">
                    <div class="realval">RKAP : <b><?php echo number_format($total_rkap_q1, 0); ?> T</b></div>
                    <div style="font-size: 16px; font-style: italic">Real : <b><?php echo number_format($total_upto_q1, 0); ?> T</b></div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 noPadding">
                <div class="col-xs-6 col-md-3 noPadding" align="right" style="font-style: italic; font-weight: bold;">Q2</div>
                <div id="quartal2" style="  min-height: 166px; margin: 0 auto" align="right"></div>
                <div class="panel panel-body noPadding" align="center" style=" margin-bottom: 0px;">
                    <div class="realval">RKAP : <b><?php echo number_format($total_rkap_q2, 0); ?> T</b></div>
                    <div style="font-size: 16px; font-style: italic">Real : <b><?php echo number_format($total_upto_q2, 0); ?> T</b></div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 noPadding">
                <div class="col-xs-6 col-md-3 noPadding" align="right" style="font-style: italic; font-weight: bold;">Q3</div>
                <div id="quartal3" style="  min-height: 167px; margin: 0 auto" align="right"></div>
                <div class="panel panel-body noPadding" align="center" style=" margin-bottom: 0px;">
                    <div class="realval">RKAP : <b><?php echo number_format($total_rkap_q3, 0); ?> T</b></div>
                    <div style="font-size: 16px; font-style: italic">Real : <b><?php echo number_format($total_upto_q3, 0); ?> T</b></div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 noPadding">
                <div class="col-xs-6 col-md-3 noPadding" align="right" style="font-style: italic; font-weight: bold;">Q4</div>
                <div id="quartal4" style="  min-height: 167px; margin: 0 auto" align="right"></div>
                <div class="panel panel-body noPadding" align="center" style=" margin-bottom: 0px;">
                    <div class="realval">RKAP : <b><?php echo number_format($total_rkap_q4, 0); ?> T</b></div>
                    <div style="font-size: 16px; font-style: italic">Real : <b><?php echo number_format($total_upto_q4, 0); ?> T</b></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('#container').highcharts({
            chart: {
                zoomType: 'xy',
                backgroundColor: 'transparent',
                spacingBottom: 50,
                spacingTop: 10,
                spacingLeft: 10,
                spacingRight: 10
            },
            colors: ['#96281B', '#97CE68', '#FEC606', '#FF7416', '#CF000F', '#8085e9', '#f15c80', '#e4d354', '#8d4653', '#91e8e1', '#2c3e50'],
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
                    max: 1250000,
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
                    max: 1250000,
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
                    s += '<br/><b>SG : </b>' + FormatNumberBy3((this.points[0].total / 1000).toFixed(0), ",", ".") + 'K T';
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
                    name: 'TBN I',
                    type: 'column',
                    yAxis: 1,
                    tooltip: {
                        valueSuffix: ' T'
                    },
                    data: [<?php echo $myData["$thn-01"]['tuban1'];
echo ',';
echo $myData["$thn-02"]['tuban1'];
echo ',';
echo $myData["$thn-03"]['tuban1'];
echo ',';
echo $myData["$thn-04"]['tuban1'];
echo ',';
echo $myData["$thn-05"]['tuban1'];
echo ',';
echo $myData["$thn-06"]['tuban1'];
echo ',';
echo $myData["$thn-07"]['tuban1'];
echo ',';
echo $myData["$thn-08"]['tuban1'];
echo ',';
echo $myData["$thn-09"]['tuban1'];
echo ',';
echo $myData["$thn-10"]['tuban1'];
echo ',';
echo $myData["$thn-11"]['tuban1'];
echo ',';
echo $myData["$thn-12"]['tuban1'];?>]
                }, {
                    name: 'TBN II',
                    type: 'column',
                    yAxis: 1,
                    tooltip: {
                        valueSuffix: ' T'
                    },
                    data: [<?php echo $myData["$thn-01"]['tuban2'];
echo ',';
echo $myData["$thn-02"]['tuban2'];
echo ',';
echo $myData["$thn-03"]['tuban2'];
echo ',';
echo $myData["$thn-04"]['tuban2'];
echo ',';
echo $myData["$thn-05"]['tuban2'];
echo ',';
echo $myData["$thn-06"]['tuban2'];
echo ',';
echo $myData["$thn-07"]['tuban2'];
echo ',';
echo $myData["$thn-08"]['tuban2'];
echo ',';
echo $myData["$thn-09"]['tuban2'];
echo ','; 
echo $myData["$thn-10"]['tuban2'];
echo ','; 
echo $myData["$thn-11"]['tuban2'];
echo ','; 
echo $myData["$thn-12"]['tuban2'];?>]
                }, {
                    name: 'TBN III',
                    type: 'column',
                    yAxis: 1,
                    tooltip: {
                        valueSuffix: ' T'
                    },
                    data: [<?php echo $myData["$thn-01"]['tuban3'];
echo ',';
echo $myData["$thn-02"]['tuban3'];
echo ',';
echo $myData["$thn-03"]['tuban3'];
echo ',';
echo $myData["$thn-04"]['tuban3'];
echo ',';
echo $myData["$thn-05"]['tuban3'];
echo ',';
echo $myData["$thn-06"]['tuban3'];
echo ',';
echo $myData["$thn-07"]['tuban3'];
echo ',';
echo $myData["$thn-08"]['tuban3'];
echo ',';
echo $myData["$thn-09"]['tuban3'];
echo ','; 
echo $myData["$thn-10"]['tuban3'];
echo ','; 
echo $myData["$thn-11"]['tuban3'];
echo ','; 
echo $myData["$thn-12"]['tuban3'];?>]
                }, {
                    name: 'TBN IV',
                    type: 'column',
                    yAxis: 1,
                    tooltip: {
                        valueSuffix: ' T'
                    },
                    data: [<?php echo $myData["$thn-01"]['tuban4'];
echo ',';
echo $myData["$thn-02"]['tuban4'];
echo ',';
echo $myData["$thn-03"]['tuban4'];
echo ',';
echo $myData["$thn-04"]['tuban4'];
echo ',';
echo $myData["$thn-05"]['tuban4'];
echo ',';
echo $myData["$thn-06"]['tuban4'];
echo ',';
echo $myData["$thn-07"]['tuban4'];
echo ',';
echo $myData["$thn-08"]['tuban4'];
echo ',';
echo $myData["$thn-09"]['tuban4'];
echo ',';
echo $myData["$thn-10"]['tuban4'];
echo ',';
echo $myData["$thn-11"]['tuban4'];
echo ',';
echo $myData["$thn-12"]['tuban4'];?>]
                }, {
                    name: 'GRS',
                    type: 'column',
                    yAxis: 1,
                    tooltip: {
                        valueSuffix: ' T'
                    },
                    data: [<?php echo $myData["$thn-01"]['gresik'];
echo ',';
echo $myData["$thn-02"]['gresik'];
echo ',';
echo $myData["$thn-03"]['gresik'];
echo ',';
echo $myData["$thn-04"]['gresik'];
echo ',';
echo $myData["$thn-05"]['gresik'];
echo ',';
echo $myData["$thn-06"]['gresik'];
echo ',';
echo $myData["$thn-07"]['gresik'];
echo ',';
echo $myData["$thn-08"]['gresik'];
echo ',';
echo $myData["$thn-09"]['gresik'];
echo ',';
echo $myData["$thn-10"]['gresik'];
echo ',';
echo $myData["$thn-11"]['gresik'];
echo ',';
echo $myData["$thn-12"]['gresik'];?>]
                }, {
                    name: 'RKAP',
                    type: 'spline',
                    tooltip: {
                        valueSuffix: 'T'
                    },
                    data: [<?php echo $DProduction[1]['cement'];
echo ',';
echo $DProduction[2]['cement'];
echo ',';
echo $DProduction[3]['cement'];
echo ',';
echo $DProduction[4]['cement'];
echo ',';
echo $DProduction[5]['cement'];
echo ',';
echo $DProduction[6]['cement'];
echo ',';
echo $DProduction[7]['cement'];
echo ',';
echo $DProduction[8]['cement'];
echo ',';
echo $DProduction[9]['cement'];
echo ',';
echo $DProduction[10]['cement'];
echo ',';
echo $DProduction[11]['cement'];
echo ',';
echo $DProduction[12]['cement'];
echo ','; ?>]
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
                    data: [<?php echo number_format($hasil_q1, 2); ?>],
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
                    data: [<?php echo number_format($hasil_q2, 2); ?>],
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
                    data: [<?php echo number_format($hasil_q3, 2); ?>],
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
                    data: [<?php echo number_format($hasil_q4, 2); ?>],
                    tooltip: {
                        valueSuffix: ' %'
                    }
                }]

        });
    });
</script>