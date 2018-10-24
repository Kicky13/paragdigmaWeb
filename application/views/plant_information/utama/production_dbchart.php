<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<style>
    .noPadding{
        padding-left: 1px;
        padding-right: 1px;
    }
    .pembatas{
        padding-bottom: 10px;
    }
</style>

<?php
$thn = date('Y');

$jml_jan = ($datacm_sg["$thn-01"]['sg']) + ($datacm_sp["$thn-01"]['sp']) + ($datacm_st["$thn-01"]['st']) + ($datacm_tlcc["$thn-01"]['tlcc']);
$jml_feb = ($datacm_sg["$thn-02"]['sg']) + ($datacm_sp["$thn-02"]['sp']) + ($datacm_st["$thn-02"]['st']) + ($datacm_tlcc["$thn-02"]['tlcc']);
$jml_mar = ($datacm_sg["$thn-03"]['sg']) + ($datacm_sp["$thn-03"]['sp']) + ($datacm_st["$thn-03"]['st']) + ($datacm_tlcc["$thn-03"]['tlcc']);

$total_upto_q1 = $jml_jan + $jml_feb + $jml_mar;

$total_rkap_q1 = ($rkap_cm[1]['cement']) + ($rkap_cm[2]['cement']) + ($rkap_cm[3]['cement']);

$total_q1 = ($total_upto_q1 / $total_rkap_q1) * 100;

$jml_apr = ($datacm_sg["$thn-04"]['sg']) + ($datacm_sp["$thn-04"]['sp']) + ($datacm_st["$thn-04"]['st']) + ($datacm_tlcc["$thn-04"]['tlcc']);
$jml_may = ($datacm_sg["$thn-05"]['sg']) + ($datacm_sp["$thn-05"]['sp']) + ($datacm_st["$thn-05"]['st']) + ($datacm_tlcc["$thn-05"]['tlcc']);
$jml_jun = ($datacm_sg["$thn-06"]['sg']) + ($datacm_sp["$thn-06"]['sp']) + ($datacm_st["$thn-06"]['st']) + ($datacm_tlcc["$thn-06"]['tlcc']);

$total_upto_q2 = $jml_apr + $jml_may + $jml_jun;

$total_rkap_q2 = ($rkap_cm[4]['cement']) + ($rkap_cm[5]['cement']) + ($rkap_cm[6]['cement']);

$total_q2 = ($total_upto_q2 / $total_rkap_q2) * 100;

$jml_jul = ($datacm_sg["$thn-07"]['sg']) + ($datacm_sp["$thn-07"]['sp']) + ($datacm_st["$thn-07"]['st']) + ($datacm_tlcc["$thn-07"]['tlcc']);
$jml_aug = ($datacm_sg["$thn-08"]['sg']) + ($datacm_sp["$thn-08"]['sp']) + ($datacm_st["$thn-08"]['st']) + ($datacm_tlcc["$thn-08"]['tlcc']);
$jml_sep = ($datacm_sg["$thn-09"]['sg']) + ($datacm_sp["$thn-09"]['sp']) + ($datacm_st["$thn-09"]['st']) + ($datacm_tlcc["$thn-09"]['tlcc']);

$total_upto_q3 = $jml_jul + $jml_aug + $jml_sep;

$total_rkap_q3 = ($rkap_cm[7]['cement']) + ($rkap_cm[8]['cement']) + ($rkap_cm[9]['cement']);

$total_q3 = ($total_upto_q3 / $total_rkap_q3) * 100;
?>

<div class="row">
    <div class="col-xs-12  col-md-4">
        TEST
    </div>
    <div class="col-xs-12  col-md-8">
        <div class="col-xs-12 col-md-12 pembatas">
            <div><h3 style="text-align: center;">SMIG Group Annual Production</h3></div>
            <div><h4 style="text-align: center;">Cement Production</h4></div>
            <div id="container" style=" background: #E7E7DE;min-height: 330px;margin: 0 auto" align="right"></div>
        </div>

        <div class="col-xs-12 col-md-12 pembatas">
            <div class="col-xs-6 col-md-3 noPadding">
                <div id="quartal1" style=" background: #E7E7DE;min-height: 210px; margin: 0 auto" align="right"></div>
                <div class="panel panel-body noPadding" align="center">
                    <div><?php echo 'RKAP : ';echo number_format($total_rkap_q1, 0, ",", "."); ?></div>
                    <div><?php echo 'Real : ';echo number_format($total_upto_q1, 0, ",", "."); ?></div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 noPadding">
                <div id="quartal2" style=" background: #E7E7DE;min-height: 210px; margin: 0 auto" align="right"></div>
                <div class="panel panel-body noPadding" align="center">
                    <div><?php echo 'RKAP : ';echo number_format($total_rkap_q2, 0, ",", "."); ?></div>
                    <div><?php echo 'Real : ';echo number_format($total_upto_q2, 0, ",", "."); ?></div>
                </div>
            </div>

            <div class="col-xs-6 col-md-3 noPadding">
                <div id="quartal3" style=" background: #E7E7DE;min-height: 210px; margin: 0 auto" align="right"></div>
                <div class="panel panel-body noPadding" align="center">
                    <div><?php echo 'RKAP : ';echo number_format($total_rkap_q3, 0, ",", "."); ?></div>
                    <div><?php echo 'Real : ';echo number_format($total_upto_q3, 0, ",", "."); ?></div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 noPadding">
                <div id="quartal4" style=" background: #E7E7DE;min-height: 210px; margin: 0 auto" align="right"></div>
                <div class="panel panel-body noPadding" align="center">
                    <div><?php echo 'RKAP : ';echo number_format(0, 0, ",", "."); ?></div>
                    <div><?php echo 'Real : ';echo number_format(0, 0, ",", "."); ?></div>
                </div>
            </div>
        </div>
    </div>
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


  if (typeof(x) !== "undefined") {
    // reverse the digits. regexp works from left to right.
    for (i=x.length-1;i>=0;i--)
      z += x.charAt(i);
    // add seperators. but undo the trailing one, if there
    z = z.replace(/(\d{3})/g, "$1" + sep);
    if (z.slice(-sep.length) === sep)
      z = z.slice(0, -sep.length);
    x = "";
    // reverse again to get back the number
    for (i=z.length-1;i>=0;i--)
      x += z.charAt(i);
    // add the fraction back in, if it was there
    if (typeof(y) !== "undefined" && y.length > 0)
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
            backgroundColor:'transparent',
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
        yAxis: [{ // Primary yAxis
            labels: {
                formatter: function () {
                    return Highcharts.numberFormat((this.value)/1000, 0,',','.') + ' K';
                },
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            min: 0,
            max:2450000,
            title: {
                text: 'Ton',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            }
        }, { // Secondary yAxis
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
                    display:'none'
                }
            },
            opposite: true
        }],
        tooltip: {
                 formatter: function() {
                var s = '<b>'+ this.x +'</b>';
                s += '<br/><b>SMIG: </b>'+ FormatNumberBy3((this.points[0].total/1000).toFixed(0),",", ".") + 'K T';
                $.each(this.points, function(i, point) {
                    s += '<br/>'+ point.series.name +': '+ FormatNumberBy3((point.y/1000).toFixed(0),",", ".") + 'K T';
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
            data: [<?php echo($datacm_sg["2016-01"]['sg']);echo ',';echo ($datacm_sg["2016-02"]['sg']);echo ',';echo ($datacm_sg["2016-03"]['sg']);echo ',';echo ($datacm_sg["2016-04"]['sg']);echo ',';echo ($datacm_sg["2016-05"]['sg']);echo ',';echo ($datacm_sg["2016-06"]['sg']);echo ',';echo ($datacm_sg["2016-07"]['sg']);echo ',';echo ($datacm_sg["2016-08"]['sg']);echo ',';echo ($datacm_sg["2016-09"]['sg']);?>]      

        }, 
          {
              name: 'SP',
            type: 'column',
              
            yAxis: 1,
           tooltip: {
                valueSuffix: ' T'
            },
            data: [<?php echo($datacm_sp["2016-01"]['sp']);echo ',';echo ($datacm_sp["2016-02"]['sp']);echo ',';echo ($datacm_sp["2016-03"]['sp']);echo ',';echo ($datacm_sp["2016-04"]['sp']);echo ',';echo ($datacm_sp["2016-05"]['sp']);echo ',';echo ($datacm_sp["2016-06"]['sp']);echo ',';echo ($datacm_sp["2016-07"]['sp']);echo ',';echo ($datacm_sp["2016-08"]['sp']);echo ',';echo ($datacm_sp["2016-09"]['sp']);?>]
        }, {
            name: 'ST',
            yAxis: 1,
            type: 'column',
            tooltip: {
                valueSuffix: ' T'
            },
            data: [<?php echo($datacm_st["2016-01"]['st']);echo ',';echo ($datacm_st["2016-02"]['st']);echo ',';echo ($datacm_st["2016-03"]['st']);echo ',';echo ($datacm_st["2016-04"]['st']);echo ',';echo ($datacm_st["2016-05"]['st']);echo ',';echo ($datacm_st["2016-06"]['st']);echo ',';echo ($datacm_st["2016-07"]['st']);echo ',';echo ($datacm_st["2016-08"]['st']);echo ',';echo ($datacm_st["2016-09"]['st']);?>]
        },
                {
            name: 'TLCC',
            yAxis: 1,
            type: 'column',
            tooltip: {
                valueSuffix: ' T'
            },
            data: [<?php echo($datacm_tlcc["2016-01"]['tlcc']);echo ',';echo ($datacm_tlcc["2016-02"]['tlcc']);echo ',';echo ($datacm_tlcc["2016-03"]['tlcc']);echo ',';echo ($datacm_tlcc["2016-04"]['tlcc']);echo ',';echo ($datacm_tlcc["2016-05"]['tlcc']);echo ',';echo ($datacm_tlcc["2016-06"]['tlcc']);echo ',';echo ($datacm_tlcc["2016-07"]['tlcc']);echo ',';echo ($datacm_tlcc["2016-08"]['tlcc']);echo ',';echo ($datacm_tlcc["2016-09"]['tlcc']);?>]
        },
          {
            name: 'RKAP',
            type: 'spline',
             tooltip: {
                valueSuffix: 'T'
            },
            data: [<?php echo($rkap_cm[1]['cement']);echo ',';echo ($rkap_cm[2]['cement']);echo ',';echo ($rkap_cm[3]['cement']);echo ',';echo ($rkap_cm[4]['cement']);echo ',';echo ($rkap_cm[5]['cement']);echo ',';echo ($rkap_cm[6]['cement']);echo ',';echo ($rkap_cm[7]['cement']);echo ',';echo ($rkap_cm[8]['cement']);echo ',';echo ($rkap_cm[9]['cement']);echo ',';echo ($rkap_cm[10]['cement']);echo ',';echo ($rkap_cm[11]['cement']);echo ',';echo ($rkap_cm[12]['cement']);?>]
            
        }]
    });
});


$(function () {

    $('#quartal1').highcharts({
        chart: {
            type: 'gauge',
            backgroundColor:'transparent',
            plotBackgroundColor: null,
            plotBackgroundImage: null,
            plotBorderWidth: 0,
            plotShadow: false,
            
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
            text: 'Quartal 1'
        },
        pane: {
            startAngle: -150,
            endAngle: 150,
            background: [{
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                        [0, '#FFF'],
                        [1, '#333']
                    ]
                },
                borderWidth: 0,
                outerRadius: '109%'
            }, {
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
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
            data: [<?php echo number_format($total_q1,2);?>],
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
            backgroundColor:'transparent',
            plotBackgroundColor: null,
            plotBackgroundImage: null,
            plotBorderWidth: 0,
            plotShadow: false,
            
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
            text: 'Quartal 2'
        },
        pane: {
            startAngle: -150,
            endAngle: 150,
            background: [{
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                        [0, '#FFF'],
                        [1, '#333']
                    ]
                },
                borderWidth: 0,
                outerRadius: '109%'
            }, {
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
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
            data: [<?php echo number_format($total_q2,2);?>],
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
            backgroundColor:'transparent',
            plotBackgroundColor: null,
            plotBackgroundImage: null,
            plotBorderWidth: 0,
            plotShadow: false,
            
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
            text: 'Quartal 3'
        },
        pane: {
            startAngle: -150,
            endAngle: 150,
            background: [{
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                        [0, '#FFF'],
                        [1, '#333']
                    ]
                },
                borderWidth: 0,
                outerRadius: '109%'
            }, {
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
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
            data: [<?php echo number_format($total_q3,2);?>],
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
            backgroundColor:'transparent',
            plotBackgroundColor: null,
            plotBackgroundImage: null,
            plotBorderWidth: 0,
            plotShadow: false,
            
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
            text: 'Quartal 4'
        },
        pane: {
            startAngle: -150,
            endAngle: 150,
            background: [{
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                        [0, '#FFF'],
                        [1, '#333']
                    ]
                },
                borderWidth: 0,
                outerRadius: '109%'
            }, {
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
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
            data: [0],
            tooltip: {
                valueSuffix: ' %'
            }
        }]

    });
});
</script>

