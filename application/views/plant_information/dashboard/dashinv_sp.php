<script src="<?php echo base_url() ?>bootstrap/plantView/assets/js/jquery-1.11.3.min.js"></script>
<script src="<?php echo base_url() ?>bootstrap/plantView/highcharts/highcharts.js"></script>
<script src="<?php echo base_url() ?>bootstrap/plantView/assets/js/jquery-ui.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/plantView/assets/css/jquery-ui.css">
<script language="JavaScript" src="http://www.hashemian.com/js/NumberFormat.js"></script>

<style>
    .my_margin {
        margin-left: 10px;
        margin-right: 10px;
    }
    .blink_me {
        animation: blinker 1s linear infinite;
    }
    @keyframes blinker {  
        50% { opacity: 0; }
    }
</style>
<script>
    $(function () {
        $(".datepicker").datepicker({dateFormat: 'yy-mm-dd'});
    });
</script>
<?php
$year_now = date('Y');
$month_now = date('m');
$first_day = '01';
$last_day = date('t');

$str_start = $year_now . "-" . $month_now . "-" . $first_day;
$str_end = $year_now . "-" . $month_now . "-" . $last_day;
?>
<div class="row" style="margin-bottom: 2px;">
    <nav class="navbar navbar-inverse my_margin" style="margin-bottom: 2px;">
        <div class="col-md-6 container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="javascript:void(0)">Padang Inventory Report</a>
            </div>
        </div>
        <div class="col-md-6">
            <form method="post" id="my_date">
                <div class="col-md-9 form-group" style="margin-top: 7px;">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="sdate" id="sdate" value="<?= (isset($sdate)) ? $sdate : $str_start; ?>" class="form-control datepicker" required> <!-- value="<?= (isset($sdate)) ? $sdate : '' ?>" -->
                        <div class="input-group-addon">
                            <i class="fa fa-minus"></i>
                        </div>
                        <input type="text" name="edate" id="edate" value="<?= (isset($edate)) ? $edate : $str_end; ?>" class="form-control datepicker" required> <!-- value="<?= (isset($edate)) ? $edate : '' ?>" -->
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-flat" name="goload" id="goload" type="submit">Load</button>
                        </span>
                    </div>
                </div>
            </form>
            <div class="col-md-3 collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="float: right;">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff ">Padang<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="active"><a href="<?= base_url() ?>index.php/plant_dashboard/dashboard_sp">Padang</a></li>
                            <li role="separator" class="divider"></li>

                            <li><a href="<?= base_url() ?>index.php/plant_dashboard/dashboard_sg">Gresik</a></li>
                            <li role="separator" class="divider"></li>

                            <li><a href="<?= base_url() ?>index.php/plant_dashboard/dashboard_st">Tonasa</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_dashboard/dashboard_tlcc">TLCC</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div class="col-md-12 col-xs-12">
    <div style="text-align: center;"><h3 style="margin-top: 2px"><b>SP : Cement Inventory Report</b></h3></div>
    <div style="overflow-x: scroll;">
        <div id="container"></div>
    </div>
</div>
<?php
$s_start = $this->input->post('sdate');
$s_end = $this->input->post('edate');

$_start = !empty($s_start) ? $s_start : $str_start;
$_end = !empty($s_end) ? $s_end : $str_end;

$str_split = explode('-', $_end);
$_last = $str_split[2];

$update_day_cm = date_create($last_cm[0]['FULL_DAY']);
$update_day_cl = date_create($last_cl[0]['FULL_DAY']);
$update_day_cm_s = date_format($update_day_cm, "Y-m");
$update_day_cl_s = date_format($update_day_cl, "Y-m");

$day_cm = date_create($last_cm[0]['FULL_DAY']);
$day_cl = date_create($last_cl[0]['FULL_DAY']);
$day_cm_s = date_format($update_day_cm, "d");
$day_cl_s = date_format($update_day_cl, "d");

$date_input = $str_split[0] . "-" . $str_split[1];
$date_now = date('Y-m');

if ($date_input == $date_now) {
    $last_update = $day_cm_s;
} else {
    $last_update = $_last;
}

if ($date_input == $date_now) {
    $last_update = $day_cl_s;
} else {
    $last_update = $_last;
}

$counting = count($daily);
?>
<script>
    Highcharts.chart('container', {
        chart: {
            height: 440,
            width: <?php echo $counting * 36; ?>
        },
        title: {
            text: ''
        },
        credits: {
            enabled: false
        },
        xAxis: {
            categories: [<?php
for ($i = 0; $i < $counting; $i++) {
    echo "'" . $daily[$i]['TGL'] . "',";
}
?>]
        },
        yAxis: {
            title: {
                text: ''
            }
        },
        legend: {
            layout: 'horizontal',
            align: 'left',
            verticalAlign: 'bottom'
        },
        plotOptions: {
        },
        tooltip: {
            formatter: function () {
                var s = 'Date : <b>' + this.x + '</b>';
                $.each(this.points, function (i, point) {
                    s += '<br/>' + point.series.name + ': ' + FormatNumberBy3((point.y / 1000).toFixed(0), ",", ".") + 'K T';
                });
                return s;
            },
            shared: true
        },
        series: [{
                name: 'PROG_FM',
                type: 'spline',
                data: [<?php
for ($i = 0; $i < $counting; $i++) {
    echo $daily[$i]['PROG_FM'] . ",";
}
?>]
            }, {
                name: 'PROD_FM',
                type: 'spline',
                data: [<?php
for ($i = 0; $i < $counting; $i++) {
    echo $daily[$i]['PROD_FM'] . ",";
}
?>]
            }, {
                name: 'PROG_KL',
                type: 'spline',
                data: [<?php
for ($i = 0; $i < $counting; $i++) {
    echo $daily[$i]['PROG_KL'] . ",";
}
?>]
            }, {
                name: 'PROD_KL',
                type: 'spline',
                data: [<?php
for ($i = 0; $i < $counting; $i++) {
    echo $daily[$i]['PROD_KL'] . ",";
}
?>]
            }]
    });
</script>