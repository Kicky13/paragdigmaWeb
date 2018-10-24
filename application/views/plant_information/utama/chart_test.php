<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script language="JavaScript" src="http://www.hashemian.com/js/NumberFormat.js"></script>
<?php
$prognose_cm = $prog_cm["COMPANY"]["CEMENT"];
$prognose_cl = $prog_cl["COMPANY"]["CLINKER"];

$budget_cm = $bud_cm['0']["BUDGET"];
$budget_cl = $bud_cl['0']["BUDGET"];

$design_cm = $design_cm['0']["CEMENT"];
$design_cl = $design_cl['0']["CLINKER"];

$oracle = $this->load->database('oramso', TRUE);
$Query1 = $oracle->query("SELECT TO_CHAR (DATE_PROD, 'YYYY-MM-DD') AS TGL FROM PIS_SG_PRODDAILY
                            WHERE ROWNUM = 1
                            ORDER BY DATE_PROD DESC");
$data1 = $Query1->result_array();
$tanggal = date_create($data1['0']['TGL']);

$get_last = date_format($tanggal, 'Y-m-d');
$my_tgl = date_format($tanggal, 'd');

$a = 0;
$b = 0;
$c = 0;
$d = 0;
$e = 0;
$f = 0;
$prog = 0;
$my_prognose = 0;
$mine = 0;
$cacc = 0;
$dacc = 0;
$acc_real = 0;
$avg_real = 0;
?>
<div id="container" style="min-height: 610px"></div>

<script>
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
                categories: [<?php 
                for ($i = 1; $i <= date('t'); $i++) {
                    echo $i.",";
                }?>]
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
                max: 5000,
                title: {
                    text: 'Ton',
                    style: {
                        color: Highcharts.getOptions().colors[1]
                    }
                }
            }, {// Secondary yAxis
                title: {
                    text: 'Akumulasi',
                    style: {
                        color: Highcharts.getOptions().colors[0]
                    }
                },
                min: 0,
                max: 150000,
                labels: {
                    format: '{value} T',
                    style: {
                        color: Highcharts.getOptions().colors[0]
                    }
                },
                opposite: true
            }],
        tooltip: {
            shared: true
        },
        legend: {
            layout: 'horizontal',
            align: 'right',
            verticalAlign: 'bottom',
            y: 40,
            floating: true,
            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || 'transparent'
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
                name: 'Ton Design',
                type: 'area',
                tooltip: {
                    valueSuffix: ' T'
                },
                data: [<?php 
                for ($i = 0; $i <= date('t'); $i++) {
                    $c = $design_cm;
                    echo $c.",";
                }?>]
            },{
                name: 'Ton Budget',
                type: 'area',
                tooltip: {
                    valueSuffix: ' T'
                },
                data: [<?php 
                for ($i = 0; $i <= date('t'); $i++) {
                    $c = $budget_cm;
                    echo $c.",";
                }?>]
            },{
                name: 'Realisasi',
                type: 'column',
                tooltip: {
                    valueSuffix: ' T'
                },
                data: [<?php 
                for ($x = 0; $x < $my_tgl; $x++) {
                    $get_real_cm = $get_real[$x]["CEMENT"];
                    $prog = $get_real_cm;
                    echo $prog . ",";
                }?>]
            },{
                name: 'Avg Realisasi',
                type: 'line',
                tooltip: {
                    valueSuffix: ' T'
                },
                data: [<?php 
                for ($x = 0; $x < $my_tgl; $x++) {
                    $get_real_cm = array_sum($get_real[$x]);
                    $get_jop_cm = array_sum($get_jop[$x]);

                    $avg_real = ($get_real_cm / $get_jop_cm) * 22 * 1;
                    echo ceil($avg_real) . ",";
                }?>]
            },{
                name: 'Prognose Harian',
                type: 'spline',
                tooltip: {
                    valueSuffix: ' T'
                },
                data: [<?php 
                for ($x = 0; $x < $my_tgl; $x++) {
                    $get_real_cm = $get_real[$x]["CEMENT"];
                    $prog = $get_real_cm;
                    echo $prog . ",";
                }
                for ($x < $my_tgl; $x <= date('t'); $x++) {
                    $prog = $prognose_cm;
                    echo $prog . ",";
                }
                ?>]
            }, {
                name: 'Accum Real',
                type: 'spline',
                yAxis: 1,
                tooltip: {
                    valueSuffix: ' T'
                },
                data: [<?php
                for ($x = 0; $x < $my_tgl; $x++) {
                    $get_real_cm = $get_real[$x]["CEMENT"];
                    $acc_real += $get_real_cm;
                    echo $acc_real . ","; }
                    ?>]
            },{
                name: 'Accum Budget',
                type: 'spline',
                yAxis: 1,
                tooltip: {
                    valueSuffix: ' T'
                },
                data: [<?php 
                for ($i = 0; $i <= date('t'); $i++) {
                    $c += $budget_cm;
                    echo $c.",";
                }?>]
            },{
                name: 'Accum Prognose',
                type: 'line',
                yAxis: 1,
                tooltip: {
                    valueSuffix: ' T'
                },
                data: [<?php 
                for ($x = 0; $x < $my_tgl; $x++) {
                    $get_real_cm = $get_real[$x]["CEMENT"];
                    $prog += $get_real_cm;
                    echo $prog . ",";
                }
                for ($x < $my_tgl; $x <= date('t'); $x++) {
                    $prog += $prognose_cm;
                    echo $prog . ",";
                }
                ?>]
            },]
    });
</script>