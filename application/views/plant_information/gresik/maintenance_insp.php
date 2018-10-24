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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff ">Gresik<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:;">Padang</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_rembang/maintenance_insp">Rembang</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="active"><a href="<?= base_url() ?>index.php/plant_gresik/maintenance_insp">Gresik</a></li>
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
    <div align="center" style="font-weight: bold;">Availability Peralatan Total (%)</div><br>
    <div class="col-xs-4">&nbsp;</div>
    <div id="dash" class="col-xs-4" style="min-height: 300px"></div>
    <div class="col-xs-4">&nbsp;</div>
</div>
<div>&nbsp;</div>
<div class="col-xs-12">
    <div class="col-xs-3">
        <div align="center" style="font-weight: bold;">Prosentase Kondisi Peralatan Tuban 1(%)</div><br>
        <div id="piechart1" style="min-height: 300px"></div><br>
        <div align="center" style="font-weight: bold;">Kondisi Peralatan Tiap Area Tuban 1(Equipment)</div><br>
        <div id="columnchart1" style="min-height: 300px"></div><br>
        <div align="center" style="font-weight: bold;">Potential Problem Tuban 1</div><br>
        <div style="width: 100%;">
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
    <div class="col-xs-3">
        <div align="center" style="font-weight: bold;">Prosentase Kondisi Peralatan Tuban 2(%)</div><br>
        <div id="piechart2" style="min-height: 300px"></div><br>
        <div align="center" style="font-weight: bold;">Kondisi Peralatan Tiap Area Tuban 2(Equipment)</div><br>
        <div id="columnchart2" style="min-height: 300px"></div><br>
        <div align="center" style="font-weight: bold;">Potential Problem Tuban 2</div><br>
        <div style="width: 100%; height: auto">
            <table class="table table-striped" border="1px" style="font-size: 12px; color: black;">
                <thead style="background-color: #E0E4CC">
                <th>No</th>
                <th style="text-align: center">Equipment</th>
                <th style="text-align: center">Problem</th>
                <th style="text-align: center">Action Plan</th>
                </thead>
                <tbody id="note_tb2">
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-xs-3">
        <div align="center" style="font-weight: bold;">Prosentase Kondisi Peralatan Tuban 3(%)</div><br>
        <div id="piechart3" style="min-height: 300px"></div><br>
        <div align="center" style="font-weight: bold;">Kondisi Peralatan Tiap Area Tuban 3(Equipment)</div><br>
        <div id="columnchart3" style="min-height: 300px"></div><br>
        <div align="center" style="font-weight: bold;">Potential Problem Tuban 3</div><br>
        <div style="width: 100%; height: auto">
            <table class="table table-striped" border="1px" style="font-size: 12px; color: black;">
                <thead style="background-color: #E0E4CC">
                <th>No</th>
                <th style="text-align: center">Equipment</th>
                <th style="text-align: center">Problem</th>
                <th style="text-align: center">Action Plan</th>
                </thead>
                <tbody id="note_tb3">
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-xs-3">
        <div align="center" style="font-weight: bold;">Prosentase Kondisi Peralatan Tuban 4(%)</div><br>
        <div id="piechart4" style="min-height: 300px"></div><br>
        <div align="center" style="font-weight: bold;">Kondisi Peralatan Tiap Area Tuban 4(Equipment)</div><br>
        <div id="columnchart4" style="min-height: 300px"></div><br>
        <div align="center" style="font-weight: bold;">Potential Problem Tuban 4</div><br>
        <div style="width: 100%; height: auto">
            <table class="table table-striped" border="1px" style="font-size: 12px; color: black;">
                <thead style="background-color: #E0E4CC">
                <th>No</th>
                <th style="text-align: center">Equipment</th>
                <th style="text-align: center">Problem</th>
                <th style="text-align: center">Action Plan</th>
                </thead>
                <tbody id="note_tb4">
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
        url: url_src + '/api/index.php/plant_tuban/get_ip_dash?tahun=' + my_tahun + '&bulan=' + my_bulan,
        type: 'GET',
        success: function (data) {
            var data1 = data.replace("<title>Json</title>", "");
            var data2 = data1.replace("(", "[");
            var data3 = data2.replace(");", "]");

            var dataJson = JSON.parse(data3);

            var GOOD_tbn1 = parseFloat(dataJson.tbn1.good);
            var TOTAL_tbn1 = parseFloat(dataJson.tbn1.total);
            var GOOD_tbn2 = parseFloat(dataJson.tbn2.good);
            var TOTAL_tbn2 = parseFloat(dataJson.tbn2.total);
            var GOOD_tbn3 = parseFloat(dataJson.tbn3.good);
            var TOTAL_tbn3 = parseFloat(dataJson.tbn3.total);
            var GOOD_tbn4 = parseFloat(dataJson.tbn4.good);
            var TOTAL_tbn4 = parseFloat(dataJson.tbn4.total);

            var tbn1 = (GOOD_tbn1 / TOTAL_tbn1) * 100;
            var tbn2 = (GOOD_tbn2 / TOTAL_tbn2) * 100;
            var tbn3 = (GOOD_tbn3 / TOTAL_tbn3) * 100;
            var tbn4 = (GOOD_tbn4 / TOTAL_tbn4) * 100;
            var total = ((GOOD_tbn1 + GOOD_tbn2 + GOOD_tbn3 + GOOD_tbn4) / (TOTAL_tbn1 + TOTAL_tbn2 + TOTAL_tbn3 + TOTAL_tbn4)) * 100;

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
                    categories: ['Total', 'Tb 1', 'Tb 2', 'Tb 3', 'Tb 4'],
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
                            }, {
                                name: 'Tuban 1',
                                color: '#97CE68',
                                y: tbn1
                            }, {
                                name: 'Tuban 2',
                                color: '#97CE68',
                                y: tbn2
                            }, {
                                name: 'Tuban 3',
                                color: '#97CE68',
                                y: tbn3
                            }, {
                                name: 'Tuban 4',
                                color: '#97CE68',
                                y: tbn4
                            }]
                    }]
            });
        }
    }).done(function (data) {
    }).fail(function () {
    });

    //Pie Tuban 1
    $.ajax({
        url: url_src + '/api/index.php/plant_tuban/get_ip_report_pie?tahun=' + my_tahun + '&bulan=' + my_bulan + '&plant=tbn1',
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
                        name: 'Tuban 1 of ',
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

    //Pie Tuban 2
    $.ajax({
        url: url_src + '/api/index.php/plant_tuban/get_ip_report_pie?tahun=' + my_tahun + '&bulan=' + my_bulan + '&plant=tbn2',
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

            $('#piechart2').highcharts({
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
                        name: 'Tuban 2 of ',
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

    //Pie Tuban 3
    $.ajax({
        url: url_src + '/api/index.php/plant_tuban/get_ip_report_pie?tahun=' + my_tahun + '&bulan=' + my_bulan + '&plant=tbn3',
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

            $('#piechart3').highcharts({
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
                        name: 'Tuban 3 of ',
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

    //Pie Tuban 4
    $.ajax({
        url: url_src + '/api/index.php/plant_tuban/get_ip_report_pie?tahun=' + my_tahun + '&bulan=' + my_bulan + '&plant=tbn4',
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

            $('#piechart4').highcharts({
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
                        name: 'Tuban 4 of ',
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

    //Column Chart Tuban 1
    $.ajax({
        url: url_src + '/api/index.php/plant_tuban/get_ip_report_column?tahun=' + my_tahun + '&bulan=' + my_bulan + '&plant=tbn1',
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
//                    var GOOD_VM = parseFloat(dataJson.GOOD.mesin.VERTICAL_MILL.jml);

            var LOW_RISK_CM = parseFloat(dataJson.LOW_RISK.mesin.COAL_MILL.jml);
            var LOW_RISK_CR = parseFloat(dataJson.LOW_RISK.mesin.CRUSHER.jml);
            var LOW_RISK_FM = parseFloat(dataJson.LOW_RISK.mesin.FINISH_MILL.jml);
            var LOW_RISK_KL = parseFloat(dataJson.LOW_RISK.mesin.KILN.jml);
            var LOW_RISK_RM = parseFloat(dataJson.LOW_RISK.mesin.RAW_MILL.jml);
//                    var LOW_RISK_VM = parseFloat(dataJson.LOW_RISK.mesin.VERTICAL_MILL.jml);

            var MED_RISK_CM = parseFloat(dataJson.MED_RISK.mesin.COAL_MILL.jml);
            var MED_RISK_CR = parseFloat(dataJson.MED_RISK.mesin.CRUSHER.jml);
            var MED_RISK_FM = parseFloat(dataJson.MED_RISK.mesin.FINISH_MILL.jml);
            var MED_RISK_KL = parseFloat(dataJson.MED_RISK.mesin.KILN.jml);
            var MED_RISK_RM = parseFloat(dataJson.MED_RISK.mesin.RAW_MILL.jml);
//                    var MED_RISK_VM = parseFloat(dataJson.MED_RISK.mesin.VERTICAL_MILL.jml);

            var HIGH_RISK_CM = parseFloat(dataJson.HIGH_RISK.mesin.COAL_MILL.jml);
            var HIGH_RISK_CR = parseFloat(dataJson.HIGH_RISK.mesin.CRUSHER.jml);
            var HIGH_RISK_FM = parseFloat(dataJson.HIGH_RISK.mesin.FINISH_MILL.jml);
            var HIGH_RISK_KL = parseFloat(dataJson.HIGH_RISK.mesin.KILN.jml);
            var HIGH_RISK_RM = parseFloat(dataJson.HIGH_RISK.mesin.RAW_MILL.jml);
//                    var HIGH_RISK_VM = parseFloat(dataJson.HIGH_RISK.mesin.VERTICAL_MILL.jml);

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
                    categories: ['COAL MILL', 'CRUSHER', 'FINISH MILL', 'KILN', 'RAW MILL']
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
                        data: [HIGH_RISK_CM, HIGH_RISK_CR, HIGH_RISK_FM, HIGH_RISK_KL, HIGH_RISK_RM]
                    }, {
                        name: 'MED RISK',
                        color: '#FD5B03',
                        stack: 'male',
                        data: [MED_RISK_CM, MED_RISK_CR, MED_RISK_FM, MED_RISK_KL, MED_RISK_RM]
                    }, {
                        name: 'LOW RISK',
                        color: '#FEC606',
                        stack: 'male',
                        data: [LOW_RISK_CM, LOW_RISK_CR, LOW_RISK_FM, LOW_RISK_KL, LOW_RISK_RM]
                    }, {
                        name: 'GOOD',
                        color: '#71BA51',
                        stack: 'male',
                        data: [GOOD_CM, GOOD_CR, GOOD_FM, GOOD_KL, GOOD_RM]
                    }]
            });
        }
    }).done(function (data) {
    }).fail(function () {

    });

    //Column Chart Tuban 2
    $.ajax({
        url: url_src + '/api/index.php/plant_tuban/get_ip_report_column?tahun=' + my_tahun + '&bulan=' + my_bulan + '&plant=tbn2',
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
            var GOOD_VM = parseFloat(dataJson.GOOD.mesin.VERTICAL_MILL.jml);

            var LOW_RISK_CM = parseFloat(dataJson.LOW_RISK.mesin.COAL_MILL.jml);
            var LOW_RISK_CR = parseFloat(dataJson.LOW_RISK.mesin.CRUSHER.jml);
            var LOW_RISK_FM = parseFloat(dataJson.LOW_RISK.mesin.FINISH_MILL.jml);
            var LOW_RISK_KL = parseFloat(dataJson.LOW_RISK.mesin.KILN.jml);
            var LOW_RISK_RM = parseFloat(dataJson.LOW_RISK.mesin.RAW_MILL.jml);
            var LOW_RISK_VM = parseFloat(dataJson.LOW_RISK.mesin.VERTICAL_MILL.jml);

            var MED_RISK_CM = parseFloat(dataJson.MED_RISK.mesin.COAL_MILL.jml);
            var MED_RISK_CR = parseFloat(dataJson.MED_RISK.mesin.CRUSHER.jml);
            var MED_RISK_FM = parseFloat(dataJson.MED_RISK.mesin.FINISH_MILL.jml);
            var MED_RISK_KL = parseFloat(dataJson.MED_RISK.mesin.KILN.jml);
            var MED_RISK_RM = parseFloat(dataJson.MED_RISK.mesin.RAW_MILL.jml);
            var MED_RISK_VM = parseFloat(dataJson.MED_RISK.mesin.VERTICAL_MILL.jml);

            var HIGH_RISK_CM = parseFloat(dataJson.HIGH_RISK.mesin.COAL_MILL.jml);
            var HIGH_RISK_CR = parseFloat(dataJson.HIGH_RISK.mesin.CRUSHER.jml);
            var HIGH_RISK_FM = parseFloat(dataJson.HIGH_RISK.mesin.FINISH_MILL.jml);
            var HIGH_RISK_KL = parseFloat(dataJson.HIGH_RISK.mesin.KILN.jml);
            var HIGH_RISK_RM = parseFloat(dataJson.HIGH_RISK.mesin.RAW_MILL.jml);
            var HIGH_RISK_VM = parseFloat(dataJson.HIGH_RISK.mesin.VERTICAL_MILL.jml);

            $('#columnchart2').highcharts({
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
                    categories: ['COAL MILL', 'CRUSHER', 'FINISH MILL', 'KILN', 'RAW MILL', 'VERTICAL MILL']
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
                        data: [HIGH_RISK_CM, HIGH_RISK_CR, HIGH_RISK_FM, HIGH_RISK_KL, HIGH_RISK_RM, HIGH_RISK_VM]
                    }, {
                        name: 'MED RISK',
                        color: '#FD5B03',
                        stack: 'male',
                        data: [MED_RISK_CM, MED_RISK_CR, MED_RISK_FM, MED_RISK_KL, MED_RISK_RM, MED_RISK_VM]
                    }, {
                        name: 'LOW RISK',
                        color: '#FEC606',
                        stack: 'male',
                        data: [LOW_RISK_CM, LOW_RISK_CR, LOW_RISK_FM, LOW_RISK_KL, LOW_RISK_RM, LOW_RISK_VM]
                    }, {
                        name: 'GOOD',
                        color: '#71BA51',
                        stack: 'male',
                        data: [GOOD_CM, GOOD_CR, GOOD_FM, GOOD_KL, GOOD_RM, GOOD_VM]
                    }]
            });
        }
    }).done(function (data) {
    }).fail(function () {

    });

    //Column Chart Tuban 3
    $.ajax({
        url: url_src + '/api/index.php/plant_tuban/get_ip_report_column?tahun=' + my_tahun + '&bulan=' + my_bulan + '&plant=tbn3',
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
//                    var GOOD_VM = parseFloat(dataJson.GOOD.mesin.VERTICAL_MILL.jml);

            var LOW_RISK_CM = parseFloat(dataJson.LOW_RISK.mesin.COAL_MILL.jml);
            var LOW_RISK_CR = parseFloat(dataJson.LOW_RISK.mesin.CRUSHER.jml);
            var LOW_RISK_FM = parseFloat(dataJson.LOW_RISK.mesin.FINISH_MILL.jml);
            var LOW_RISK_KL = parseFloat(dataJson.LOW_RISK.mesin.KILN.jml);
            var LOW_RISK_RM = parseFloat(dataJson.LOW_RISK.mesin.RAW_MILL.jml);
//                    var LOW_RISK_VM = parseFloat(dataJson.LOW_RISK.mesin.VERTICAL_MILL.jml);

            var MED_RISK_CM = parseFloat(dataJson.MED_RISK.mesin.COAL_MILL.jml);
            var MED_RISK_CR = parseFloat(dataJson.MED_RISK.mesin.CRUSHER.jml);
            var MED_RISK_FM = parseFloat(dataJson.MED_RISK.mesin.FINISH_MILL.jml);
            var MED_RISK_KL = parseFloat(dataJson.MED_RISK.mesin.KILN.jml);
            var MED_RISK_RM = parseFloat(dataJson.MED_RISK.mesin.RAW_MILL.jml);
//                    var MED_RISK_VM = parseFloat(dataJson.MED_RISK.mesin.VERTICAL_MILL.jml);

            var HIGH_RISK_CM = parseFloat(dataJson.HIGH_RISK.mesin.COAL_MILL.jml);
            var HIGH_RISK_CR = parseFloat(dataJson.HIGH_RISK.mesin.CRUSHER.jml);
            var HIGH_RISK_FM = parseFloat(dataJson.HIGH_RISK.mesin.FINISH_MILL.jml);
            var HIGH_RISK_KL = parseFloat(dataJson.HIGH_RISK.mesin.KILN.jml);
            var HIGH_RISK_RM = parseFloat(dataJson.HIGH_RISK.mesin.RAW_MILL.jml);
//                    var HIGH_RISK_VM = parseFloat(dataJson.HIGH_RISK.mesin.VERTICAL_MILL.jml);

            $('#columnchart3').highcharts({
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
                    categories: ['COAL MILL', 'CRUSHER', 'FINISH MILL', 'KILN', 'RAW MILL']
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
                        data: [HIGH_RISK_CM, HIGH_RISK_CR, HIGH_RISK_FM, HIGH_RISK_KL, HIGH_RISK_RM]
                    }, {
                        name: 'MED RISK',
                        color: '#FD5B03',
                        stack: 'male',
                        data: [MED_RISK_CM, MED_RISK_CR, MED_RISK_FM, MED_RISK_KL, MED_RISK_RM]
                    }, {
                        name: 'LOW RISK',
                        color: '#FEC606',
                        stack: 'male',
                        data: [LOW_RISK_CM, LOW_RISK_CR, LOW_RISK_FM, LOW_RISK_KL, LOW_RISK_RM]
                    }, {
                        name: 'GOOD',
                        color: '#71BA51',
                        stack: 'male',
                        data: [GOOD_CM, GOOD_CR, GOOD_FM, GOOD_KL, GOOD_RM]
                    }]
            });
        }
    }).done(function (data) {
    }).fail(function () {

    });

    //Column Chart Tuban 4
    $.ajax({
        url: url_src + '/api/index.php/plant_tuban/get_ip_report_column?tahun=' + my_tahun + '&bulan=' + my_bulan + '&plant=tbn4',
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
//                    var GOOD_VM = parseFloat(dataJson.GOOD.mesin.VERTICAL_MILL.jml);

            var LOW_RISK_CM = parseFloat(dataJson.LOW_RISK.mesin.COAL_MILL.jml);
            var LOW_RISK_CR = parseFloat(dataJson.LOW_RISK.mesin.CRUSHER.jml);
            var LOW_RISK_FM = parseFloat(dataJson.LOW_RISK.mesin.FINISH_MILL.jml);
            var LOW_RISK_KL = parseFloat(dataJson.LOW_RISK.mesin.KILN.jml);
            var LOW_RISK_RM = parseFloat(dataJson.LOW_RISK.mesin.RAW_MILL.jml);
//                    var LOW_RISK_VM = parseFloat(dataJson.LOW_RISK.mesin.VERTICAL_MILL.jml);

            var MED_RISK_CM = parseFloat(dataJson.MED_RISK.mesin.COAL_MILL.jml);
            var MED_RISK_CR = parseFloat(dataJson.MED_RISK.mesin.CRUSHER.jml);
            var MED_RISK_FM = parseFloat(dataJson.MED_RISK.mesin.FINISH_MILL.jml);
            var MED_RISK_KL = parseFloat(dataJson.MED_RISK.mesin.KILN.jml);
            var MED_RISK_RM = parseFloat(dataJson.MED_RISK.mesin.RAW_MILL.jml);
//                    var MED_RISK_VM = parseFloat(dataJson.MED_RISK.mesin.VERTICAL_MILL.jml);

            var HIGH_RISK_CM = parseFloat(dataJson.HIGH_RISK.mesin.COAL_MILL.jml);
            var HIGH_RISK_CR = parseFloat(dataJson.HIGH_RISK.mesin.CRUSHER.jml);
            var HIGH_RISK_FM = parseFloat(dataJson.HIGH_RISK.mesin.FINISH_MILL.jml);
            var HIGH_RISK_KL = parseFloat(dataJson.HIGH_RISK.mesin.KILN.jml);
            var HIGH_RISK_RM = parseFloat(dataJson.HIGH_RISK.mesin.RAW_MILL.jml);
//                    var HIGH_RISK_VM = parseFloat(dataJson.HIGH_RISK.mesin.VERTICAL_MILL.jml);

            $('#columnchart4').highcharts({
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
                    categories: ['COAL MILL', 'CRUSHER', 'FINISH MILL', 'KILN', 'RAW MILL']
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
                        data: [HIGH_RISK_CM, HIGH_RISK_CR, HIGH_RISK_FM, HIGH_RISK_KL, HIGH_RISK_RM]
                    }, {
                        name: 'MED RISK',
                        color: '#FD5B03',
                        stack: 'male',
                        data: [MED_RISK_CM, MED_RISK_CR, MED_RISK_FM, MED_RISK_KL, MED_RISK_RM]
                    }, {
                        name: 'LOW RISK',
                        color: '#FEC606',
                        stack: 'male',
                        data: [LOW_RISK_CM, LOW_RISK_CR, LOW_RISK_FM, LOW_RISK_KL, LOW_RISK_RM]
                    }, {
                        name: 'GOOD',
                        color: '#71BA51',
                        stack: 'male',
                        data: [GOOD_CM, GOOD_CR, GOOD_FM, GOOD_KL, GOOD_RM]
                    }]
            });
        }
    }).done(function (data) {
    }).fail(function () {

    });

    //Problem Notes Tuban 1
    $.ajax({
        url: url_src + '/api/index.php/plant_tuban/get_ip_notes?tahun=' + my_tahun + '&bulan=' + my_bulan + '&plant=tbn1',
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

    //Problem Notes Tuban 2
    $.ajax({
        url: url_src + '/api/index.php/plant_tuban/get_ip_notes?tahun=' + my_tahun + '&bulan=' + my_bulan + '&plant=tbn2',
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
            $("#note_tb2").html(catatan);
        }
    }).done(function (data) {
    }).fail(function () {

    });

    //Problem Notes Tuban 3
    $.ajax({
        url: url_src + '/api/index.php/plant_tuban/get_ip_notes?tahun=' + my_tahun + '&bulan=' + my_bulan + '&plant=tbn3',
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
            $("#note_tb3").html(catatan);
        }
    }).done(function (data) {
    }).fail(function () {

    });

    //Problem Notes Tuban 4
    $.ajax({
        url: url_src + '/api/index.php/plant_tuban/get_ip_notes?tahun=' + my_tahun + '&bulan=' + my_bulan + '&plant=tbn4',
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
            $("#note_tb4").html(catatan);
        }
    }).done(function (data) {
    }).fail(function () {

    });
</script>
