<script src="<?php echo base_url() ?>bootstrap/plantView/assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url() ?>bootstrap/plantView/highcharts/highcharts.js"></script>
<style>
    .blink_me {
        animation: blinker 1s linear infinite;
    }
    @keyframes blinker {  
        50% { opacity: 0; }
    }
</style>
<div class="row">
    <nav class="navbar navbar-default panelup">
        <div class="container-fluid">
            <div class="col-xs-9 navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h3 style="text-align: left; padding-left: 12px; margin-top: 10px;">Tuban Plant Inspection Report</h3>
            </div>
            <div style="padding-top: 8px;" class="col-xs-1">
                <a href="<?php echo base_url(); ?>index.php/plant_system/portal_maintenance" style="float: right"><button class="btn btn-success">Back</button></a>
            </div>
            <div class="col-xs-2 collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="float: right;">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff ">Rembang<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:;">Padang</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="active"><a href="<?= base_url() ?>index.php/plant_rembang/maintenance_insp">Rembang</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_gresik/maintenance_insp">Gresik</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:;">Tonasa</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:;">TLCC</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div class="col-xs-12">
    <div class="col-xs-6">
        <div align="center" style="font-weight: bold;">Availability Peralatan Total (%)</div><br>
        <div id="dash" style="min-height: 300px"></div>
    </div>
    <div class="col-xs-6">
        <div align="center" style="font-weight: bold;">Prosentase Kondisi Peralatan (%)</div><br>
        <div id="piechart1" style="min-height: 300px"></div>
    </div>
</div>
<div>&nbsp;</div>
<div class="col-xs-12">
    <div class="col-xs-6">
        <div align="center" style="font-weight: bold;">Kondisi Peralatan Tiap Area (Equipment)</div><br>
        <div id="columnchart1" style="min-height: 300px"></div>            
    </div>
    <div class="col-xs-6">
        <div align="center" style="font-weight: bold;">Potential Problem Rembang</div><br>
        <div style="width: 100%; height: 300px; overflow: auto">
            <table class="table table-striped" border="1px" style="font-size: 12px; color: black;">
                <thead style="background-color: #E0E4CC">
                <th>No</th>
                <th style="text-align: center">Equipment</th>
                <th style="text-align: center">Problem</th>
                <th style="text-align: center">Action Plan</th>
                </thead>
                <tbody id="note_tb1">
                </tbody>
            </table>
        </div>            
    </div>
</div>
<script>
    //Dashboard
    var my_bulan = '<?php echo date('m') ?>';
    var my_tahun = <?php echo date('Y') ?>;
    var url_src = 'http://par4digma.semenindonesia.com';

    $.ajax({
        url: url_src + '/api/index.php/plant_rembang/get_ip_dash?tahun=' + my_tahun + '&bulan=' + my_bulan,
        type: 'GET',
        success: function (data) {
            var data1 = data.replace("<title>Json</title>", "");
            var data2 = data1.replace("(", "[");
            var data3 = data2.replace(");", "]");

            var dataJson = JSON.parse(data3);

            var GOOD_rmb1 = parseFloat(dataJson.rmb1.good);
            var TOTAL_rmb1 = parseFloat(dataJson.rmb1.total);

            var total = (GOOD_rmb1 / TOTAL_rmb1) * 100;

            $('#dash').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: ''
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: ['Total'],
                    title: ''
                },
                credits: {
                    enabled: false
                },
                exporting: {
                    enabled: false
                },
                yAxis: {
                    min: 0,
                    title: ''
                },
                tooltip: {
                    shared: true
                },
                plotOptions: {
                    column: {
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:.1f}%'
                        },
                        enableMouseTracking: true
                    }
                },
                series: [{
                        name: 'Data Total',
                        data: [{
                                name: 'Total',
                                color: '#00FF00',
                                y: total
                            }]
                    }]
            });
        }
    }).done(function (data) {
    }).fail(function () {
    });

    //Pie Rembang
    $.ajax({
        url: url_src + '/api/index.php/plant_rembang/get_ip_report_pie?tahun=' + my_tahun + '&bulan=' + my_bulan + '&plant=rmb1',
        type: 'GET',
        success: function (data) {
            var data1 = data.replace("<title>Json</title>", "");
            var data2 = data1.replace("(", "[");
            var data3 = data2.replace(");", "]");

            var dataJson = JSON.parse(data3);

            var GOOD = parseFloat(dataJson.data.GOOD.jml);
            var LOW_RISK = parseFloat(dataJson.data.LOW_RISK.jml);
            var MED_RISK = parseFloat(dataJson.data.MED_RISK.jml);
            var HIGH_RISK = parseFloat(dataJson.data.HIGH_RISK.jml);

            $('#piechart1').highcharts({
                chart: {
                    type: 'pie',
                    options3d: {
                        enabled: true,
                        alpha: 45,
                        beta: 0
                    }
                },
                colors: ['#71BA51', '#FEC606', '#FD5B03', '#E3000E'],
                title: {
                    text: ''
                },
                subtitle: {
                    text: '(hover on the chart for detail)'
                },
                credits: {
                    enabled: false
                },
                exporting: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        depth: 35,
                        dataLabels: {
                            enabled: true,
                            format: '{point.name}'
                        }
                    }
                },
                series: [{
                        type: 'pie',
                        name: 'Rembang of ',
                        data: [
                            ['Good', GOOD],
                            ['Low Risk', LOW_RISK],
                            ['Med Risk', MED_RISK],
                            ['High Risk', HIGH_RISK]
                        ]
                    }]
            });
        }
    }).done(function (data) {
    }).fail(function () {
    });

    //Column Chart Rembang
    $.ajax({
        url: url_src + '/api/index.php/plant_rembang/get_ip_report_column?tahun=' + my_tahun + '&bulan=' + my_bulan + '&plant=rmb1',
        type: 'GET',
        success: function (data) {
            var data1 = data.replace("<title>Json</title>", "");
            var data2 = data1.replace("(", "[");
            var data3 = data2.replace(");", "]");

            var dataJson = JSON.parse(data3);

            var GOOD_CM = parseFloat(dataJson.GOOD.mesin.COAL_MILL.jml);
            var GOOD_CR = parseFloat(dataJson.GOOD.mesin.CRUSHER.jml);
            var GOOD_FM = parseFloat(dataJson.GOOD.mesin.FINISH_MILL.jml);
            var GOOD_KL = parseFloat(dataJson.GOOD.mesin.KILN.jml);
            var GOOD_RM = parseFloat(dataJson.GOOD.mesin.RAW_MILL.jml);
            var GOOD_PK = parseFloat(dataJson.GOOD.mesin.PACKER.jml);

            var LOW_RISK_CM = parseFloat(dataJson.LOW_RISK.mesin.COAL_MILL.jml);
            var LOW_RISK_CR = parseFloat(dataJson.LOW_RISK.mesin.CRUSHER.jml);
            var LOW_RISK_FM = parseFloat(dataJson.LOW_RISK.mesin.FINISH_MILL.jml);
            var LOW_RISK_KL = parseFloat(dataJson.LOW_RISK.mesin.KILN.jml);
            var LOW_RISK_RM = parseFloat(dataJson.LOW_RISK.mesin.RAW_MILL.jml);
            var LOW_RISK_PK = parseFloat(dataJson.LOW_RISK.mesin.PACKER.jml);

            var MED_RISK_CM = parseFloat(dataJson.MED_RISK.mesin.COAL_MILL.jml);
            var MED_RISK_CR = parseFloat(dataJson.MED_RISK.mesin.CRUSHER.jml);
            var MED_RISK_FM = parseFloat(dataJson.MED_RISK.mesin.FINISH_MILL.jml);
            var MED_RISK_KL = parseFloat(dataJson.MED_RISK.mesin.KILN.jml);
            var MED_RISK_RM = parseFloat(dataJson.MED_RISK.mesin.RAW_MILL.jml);
            var MED_RISK_PK = parseFloat(dataJson.MED_RISK.mesin.PACKER.jml);

            var HIGH_RISK_CM = parseFloat(dataJson.HIGH_RISK.mesin.COAL_MILL.jml);
            var HIGH_RISK_CR = parseFloat(dataJson.HIGH_RISK.mesin.CRUSHER.jml);
            var HIGH_RISK_FM = parseFloat(dataJson.HIGH_RISK.mesin.FINISH_MILL.jml);
            var HIGH_RISK_KL = parseFloat(dataJson.HIGH_RISK.mesin.KILN.jml);
            var HIGH_RISK_RM = parseFloat(dataJson.HIGH_RISK.mesin.RAW_MILL.jml);
            var HIGH_RISK_PK = parseFloat(dataJson.HIGH_RISK.mesin.PACKER.jml);

            $('#columnchart1').highcharts({
                chart: {
                    type: 'column',
                    spacingBottom: 7,
                    spacingTop: 2,
                    spacingLeft: 2,
                    spacingRight: 2,
                    marginLeft: 2,
                    marginRight: 2,
                    options3d: {
                        enabled: true,
                        alpha: 10,
                        beta: 25,
                        depth: 70
                    }
                },
                title: {
                    text: ''
                },
                subtitle: {
                    text: '(hover on the chart for detail)'
                },
                credits: {
                    enabled: false
                },
                exporting: {
                    enabled: false
                },
                plotOptions: {
                    column: {
                        depth: 25,
                        stacking: 'normal'
                    }
                },
                xAxis: {
                    categories: ['COAL MILL', 'CRUSHER', 'FINISH MILL', 'KILN', 'RAW MILL', 'PACKER']
                },
                yAxis: {
                    title: {
                        text: null
                    }
                },
                legend: {
                    floating: false,
                    layout: "horizontal",
                    itemDistance: 2,
                    itemStyle: {
                        fontSize: '9px'
                    }
                },
                series: [{
                        name: 'HIGH RISK',
                        color: '#E3000E',
                        stack: 'male',
                        data: [HIGH_RISK_CM, HIGH_RISK_CR, HIGH_RISK_FM, HIGH_RISK_KL, HIGH_RISK_RM, HIGH_RISK_PK]
                    }, {
                        name: 'MED RISK',
                        color: '#FD5B03',
                        stack: 'male',
                        data: [MED_RISK_CM, MED_RISK_CR, MED_RISK_FM, MED_RISK_KL, MED_RISK_RM, MED_RISK_PK]
                    }, {
                        name: 'LOW RISK',
                        color: '#FEC606',
                        stack: 'male',
                        data: [LOW_RISK_CM, LOW_RISK_CR, LOW_RISK_FM, LOW_RISK_KL, LOW_RISK_RM, LOW_RISK_PK]
                    }, {
                        name: 'GOOD',
                        color: '#71BA51',
                        stack: 'male',
                        data: [GOOD_CM, GOOD_CR, GOOD_FM, GOOD_KL, GOOD_RM, GOOD_PK]
                    }]
            });
        }
    }).done(function (data) {
    }).fail(function () {

    });

    $.ajax({
        url: url_src + '/api/index.php/plant_rembang/get_ip_notes?tahun=' + my_tahun + '&bulan=' + my_bulan + '&plant=rmb1',
        type: 'GET',
        success: function (data) {
            var data1 = data.replace("<title>Json</title>", "");
            var data2 = data1.replace("(", "[");
            var data3 = data2.replace(");", "]");

            var dataJson = JSON.parse(data3);
            var obj = dataJson.data;
            var count = Object.keys(obj).length;
            var catatan = '';
            for (var i = 1; i <= count; i++) {
                var note = dataJson.data[i].catatan;
                var equipment = dataJson.data[i].mesin;
                var solution = dataJson.data[i].solusi;
                catatan += '<tr><td>' + i + '</td><td>' + equipment + '</td><td>' + note + '</td><td>' + solution + '</td></tr>';
            }
            $("#note_tb1").html(catatan);
        }
    }).done(function (data) {
    }).fail(function () {

    });
</script>
