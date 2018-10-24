<script src="<?php echo base_url() ?>bootstrap/plantView/assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url() ?>bootstrap/plantView/highcharts/highcharts.js"></script>
<script src="<?php echo base_url() ?>bootstrap/plantView/highcharts/highcharts-3d.js"></script>
<style>
    .blink_me {
        animation: blinker 1s linear infinite;
    }
    @keyframes blinker {  
        50% { opacity: 0; }
    }
</style>
<script>
    $(function () {
        $('#maintenance_perf').click(function () {
            window.location.href = 'index.php/plant_gresik/maintenance_perf';
        });
        $('#maintenance_perf_tbl').click(function () {
            window.location.href = 'index.php/plant_gresik/maintenance_perf_tbl';
        });
    });
</script>
<div class="row">
    <nav class="navbar navbar-default panelup">
        <div class="container-fluid">
            <div class="col-xs-7 navbar-header ">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h3 style="text-align: left; padding-left: 12px; margin-top: 10px;">Tuban Plant Performance Report</h3>
            </div>
            <div class="col-xs-2">
                <ul class="nav navbar-nav">
                    <li><a href="#"> <span class="sr-only">(current)</span></a></li>
                    <li>
                    </li>
                </ul>
                <form class="navbar-form navbar-left">
                    <div class="form-group">
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-default" aria-label="Left Align" id="maintenance_perf" type="button">
                            Chart
                        </button>
                        <button class="btn btn-warning" aria-label="Left Align" id="maintenance_perf_tbl" type="button">
                            Table 
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-xs-1"  style="padding-top: 8px;">
                <a href="<?php echo base_url(); ?>index.php/plant_system/portal_maintenance" style="float: right"><button class="btn btn-success">Back</button></a>
            </div>
            <div class="col-xs-2 collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="float: right;">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff ">Gresik<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= base_url() ?>index.php/plant_padang/maintenance">Padang</a></li>
                            <li role="separator" class="divider"></li>

                            <li class="active"><a href="<?= base_url() ?>index.php/plant_gresik/maintenance">Gresik</a></li>
                            <li role="separator" class="divider"></li>

                            <li><a href="<?= base_url() ?>index.php/plant_tonasa/maintenance">Tonasa</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_tlcc/maintenance">TLCC</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div class="row">
    <div class="col-xs-4">
        <div align="center"><h3>Yield</h3></div>
        <div class="col-xs-4">&nbsp;</div>
        <div id="dash_yield" class="col-xs-12" style="min-height: 300px"></div>
        <div class="col-xs-4">&nbsp;</div>
    </div>
    <div class="col-xs-4">
        <div align="center"><h3>Utilisasi</h3></div>
        <div class="col-xs-4">&nbsp;</div>
        <div id="dash_util" class="col-xs-12" style="min-height: 300px"></div>
        <div class="col-xs-4">&nbsp;</div>
    </div>
    <div class="col-xs-4">
        <div align="center"><h3>Efisiensi</h3></div>
        <div class="col-xs-4">&nbsp;</div>
        <div id="dash_eff" class="col-xs-12" style="min-height: 300px"></div>
        <div class="col-xs-4">&nbsp;</div>
    </div>
</div>
<div class="row">
    <div align="center"> Tuban 1</div>
    <div class="col-xs-4">
        <div id="board_yield_tb1" class="col-xs-12" style="min-height: 300px"></div>
    </div>
    <div class="col-xs-4">
        <div id="board_util_tb1" class="col-xs-12" style="min-height: 300px"></div>
    </div>
    <div class="col-xs-4">
        <div id="board_eff_tb1" class="col-xs-12" style="min-height: 300px"></div>
    </div>
</div>

<div class="row">
    <div align="center"> Tuban 2</div>
    <div class="col-xs-4">
        <div id="board_yield_tb2" class="col-xs-12" style="min-height: 300px"></div>
    </div>
    <div class="col-xs-4">
        <div id="board_util_tb2" class="col-xs-12" style="min-height: 300px"></div>
    </div>
    <div class="col-xs-4">
        <div id="board_eff_tb2" class="col-xs-12" style="min-height: 300px"></div>
    </div>
</div>

<div class="row">
    <div align="center"> Tuban 3</div>
    <div class="col-xs-4">
        <div id="board_yield_tb3" class="col-xs-12" style="min-height: 300px"></div>
    </div>
    <div class="col-xs-4">
        <div id="board_util_tb3" class="col-xs-12" style="min-height: 300px"></div>
    </div>
    <div class="col-xs-4">
        <div id="board_eff_tb3" class="col-xs-12" style="min-height: 300px"></div>
    </div>
</div>

<div class="row">
    <div align="center"> Tuban 4</div>
    <div class="col-xs-4">
        <div id="board_yield_tb4" class="col-xs-12" style="min-height: 300px"></div>
    </div>
    <div class="col-xs-4">
        <div id="board_util_tb4" class="col-xs-12" style="min-height: 300px"></div>
    </div>
    <div class="col-xs-4">
        <div id="board_eff_tb4" class="col-xs-12" style="min-height: 300px"></div>
    </div>
</div>

<script>
    var my_bulan = '04';//'<?php echo date('m') ?>';
    var my_tahun = <?php echo date('Y') ?>;
    var url_src = 'http://par4digma.semenindonesia.com';
    var wc_util = [90, 90, 90, 90, 90];
    var wc_yield = [95, 95, 95, 95, 95];
    var wc_eff = [85, 85, 85, 85, 85];

    var wc_util_ = [90, 90, 90, 90, 90, 90];
    var wc_yield_ = [95, 95, 95, 95, 95, 95];
    var wc_eff_ = [85, 85, 85, 85, 85, 85];

    //Chart All Plant
    $.ajax({
        url: url_src + '/api/index.php/plant_tuban/get_pm_dash?tahun=' + my_tahun + '&bulan=' + my_bulan,
        type: 'GET',
        success: function (data) {
            var data1 = data.replace("<title>Json</title>", "");
            var data2 = data1.replace("(", "[");
            var data3 = data2.replace(");", "]");

            var dataJson = JSON.parse(data3);

            var U_tb1 = parseFloat(dataJson.tbn2.UTILISASI.persen);
            var Y_tb1 = parseFloat(dataJson.tbn2.YIELD.persen);
            var E_tb1 = parseFloat(dataJson.tbn2.EFISIENSI.persen);

            var U_tb2 = parseFloat(dataJson.tbn2.UTILISASI.persen);
            var Y_tb2 = parseFloat(dataJson.tbn2.YIELD.persen);
            var E_tb2 = parseFloat(dataJson.tbn2.EFISIENSI.persen);

            var U_tb3 = parseFloat(dataJson.tbn3.UTILISASI.persen);
            var Y_tb3 = parseFloat(dataJson.tbn3.YIELD.persen);
            var E_tb3 = parseFloat(dataJson.tbn3.EFISIENSI.persen);

            var U_tb4 = parseFloat(dataJson.tbn4.UTILISASI.persen);
            var Y_tb4 = parseFloat(dataJson.tbn4.YIELD.persen);
            var E_tb4 = parseFloat(dataJson.tbn4.EFISIENSI.persen);

            var total_U = ((U_tb1 + U_tb2 + U_tb3 + U_tb4) / 4);
            var total_Y = ((Y_tb1 + Y_tb2 + Y_tb3 + Y_tb4) / 4);
            var total_E = ((E_tb1 + E_tb2 + E_tb3 + E_tb4) / 4);

            $('#dash_yield').highcharts({
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
                                color: '#71BA51',
                                y: total_Y
                            }, {
                                name: 'Tuban 1',
                                color: '#FEC606',
                                y: Y_tb1
                            }, {
                                name: 'Tuban 2',
                                color: '#FEC606',
                                y: Y_tb2
                            }, {
                                name: 'Tuban 3',
                                color: '#FEC606',
                                y: Y_tb3
                            }, {
                                name: 'Tuban 4',
                                color: '#FEC606',
                                y: Y_tb4
                            }]
                    }, {
                        name: '<b>World Class (95%)</b>',
                        type: 'spline',
                        color: '#E74C3C',
                        data: wc_yield
                    }]
            });

            $('#dash_util').highcharts({
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
                                color: '#71BA51',
                                y: total_U
                            }, {
                                name: 'Tuban 1',
                                color: '#FEC606',
                                y: U_tb1
                            }, {
                                name: 'Tuban 2',
                                color: '#FEC606',
                                y: U_tb2
                            }, {
                                name: 'Tuban 3',
                                color: '#FEC606',
                                y: U_tb3
                            }, {
                                name: 'Tuban 4',
                                color: '#FEC606',
                                y: U_tb4
                            }]
                    }, {
                        name: '<b>World Class (90%)</b>',
                        type: 'spline',
                        color: '#E74C3C',
                        data: wc_util
                    }]
            });

            $('#dash_eff').highcharts({
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
                                color: '#71BA51',
                                y: total_E
                            }, {
                                name: 'Tuban 1',
                                color: '#FEC606',
                                y: E_tb1
                            }, {
                                name: 'Tuban 2',
                                color: '#FEC606',
                                y: E_tb2
                            }, {
                                name: 'Tuban 3',
                                color: '#FEC606',
                                y: E_tb3
                            }, {
                                name: 'Tuban 4',
                                color: '#FEC606',
                                y: E_tb4
                            }]
                    }, {
                        name: '<b>World Class (85%)</b>',
                        type: 'spline',
                        color: '#E74C3C',
                        data: wc_eff
                    }]
            });
        }
    }).done(function (data) {
    }).fail(function () {
    });

    //Chart Tuban 1
    $.ajax({
        url: url_src + '/api/index.php/plant_tuban/get_pm_detail?tahun=' + my_tahun + '&bulan=' + my_bulan + '&plant=tbn1',
        type: 'GET',
        success: function (data) {
            var data1 = data.replace("<title>Json</title>", "");
            var data2 = data1.replace("(", "[");
            var data3 = data2.replace(");", "]");

            var dataJson = JSON.parse(data3);

            var U_CR_tbn1 = parseFloat(dataJson.tbn1.UTILISASI.CRUSHER.data);
            var U_RM_tbn1 = parseFloat(dataJson.tbn1.UTILISASI.RAW_MILL.data);
            var U_KL_tbn1 = parseFloat(dataJson.tbn1.UTILISASI.KILN.data);
            var U_CM_tbn1 = parseFloat(dataJson.tbn1.UTILISASI.COAL_MILL.data);
            var U_FM_tbn1 = parseFloat(dataJson.tbn1.UTILISASI.FINISH_MILL.data);
            var U_PK_tbn1 = parseFloat(dataJson.tbn1.UTILISASI.PACKER.data);
            var Y_CR_tbn1 = parseFloat(dataJson.tbn1.YIELD.CRUSHER.data);
            var Y_RM_tbn1 = parseFloat(dataJson.tbn1.YIELD.RAW_MILL.data);
            var Y_KL_tbn1 = parseFloat(dataJson.tbn1.YIELD.KILN.data);
            var Y_CM_tbn1 = parseFloat(dataJson.tbn1.YIELD.COAL_MILL.data);
            var Y_FM_tbn1 = parseFloat(dataJson.tbn1.YIELD.FINISH_MILL.data);
            var Y_PK_tbn1 = parseFloat(dataJson.tbn1.YIELD.PACKER.data);
            var E_CR_tbn1 = parseFloat(dataJson.tbn1.EFISIENSI.CRUSHER.data);
            var E_RM_tbn1 = parseFloat(dataJson.tbn1.EFISIENSI.RAW_MILL.data);
            var E_KL_tbn1 = parseFloat(dataJson.tbn1.EFISIENSI.KILN.data);
            var E_CM_tbn1 = parseFloat(dataJson.tbn1.EFISIENSI.COAL_MILL.data);
            var E_FM_tbn1 = parseFloat(dataJson.tbn1.EFISIENSI.FINISH_MILL.data);
            var E_PK_tbn1 = parseFloat(dataJson.tbn1.EFISIENSI.PACKER.data);


            $('#board_yield_tb1').highcharts({
                chart: {
                    type: 'column',
                    spacingBottom: 7,
                    spacingTop: 2,
                    spacingLeft: 2,
                    spacingRight: 2,
                    marginLeft: 2,
                    marginRight: 2
                },
                title: {
                    text: ''
                },
                subtitle: {
                    text: ''
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
                        stacking: 'normal',
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}'
                        },
                        enableMouseTracking: true
                    }
                },
                xAxis: {
                    categories: ['CRUSHER', 'RAW MILL', 'KILN', 'COAL MILL', 'FINISH MILL', 'PACKER']
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
                        name: 'Yield',
                        color: '#71BA51',
                        stack: 'male',
                        data: [Y_CR_tbn1, Y_RM_tbn1, Y_KL_tbn1, Y_CM_tbn1, Y_FM_tbn1, Y_PK_tbn1]
                    }, {
                        name: '<b>World Class (95%)</b>',
                        type: 'spline',
                        color: '#E74C3C',
                        data: wc_yield_
                    }]
            });

            $('#board_util_tb1').highcharts({
                chart: {
                    type: 'column',
                    spacingBottom: 7,
                    spacingTop: 2,
                    spacingLeft: 2,
                    spacingRight: 2,
                    marginLeft: 2,
                    marginRight: 2
                },
                title: {
                    text: ''
                },
                subtitle: {
                    text: ''
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
                        stacking: 'normal',
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}'
                        },
                        enableMouseTracking: true
                    }
                },
                xAxis: {
                    categories: ['CRUSHER', 'RAW MILL', 'KILN', 'COAL MILL', 'FINISH MILL', 'PACKER']
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
                        name: 'Utilisasi',
                        color: '#71BA51',
                        stack: 'male',
                        data: [U_CR_tbn1, U_RM_tbn1, U_KL_tbn1, U_CM_tbn1, U_FM_tbn1, U_PK_tbn1]
                    }, {
                        name: '<b>World Class (90%)</b>',
                        type: 'spline',
                        color: '#E74C3C',
                        data: wc_util_
                    }]
            });

            $('#board_eff_tb1').highcharts({
                chart: {
                    type: 'column',
                    spacingBottom: 7,
                    spacingTop: 2,
                    spacingLeft: 2,
                    spacingRight: 2,
                    marginLeft: 2,
                    marginRight: 2
                },
                title: {
                    text: ''
                },
                subtitle: {
                    text: ''
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
                        stacking: 'normal',
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}'
                        },
                        enableMouseTracking: true
                    }
                },
                xAxis: {
                    categories: ['CRUSHER', 'RAW MILL', 'KILN', 'COAL MILL', 'FINISH MILL', 'PACKER']
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
                        name: 'Efisiensi',
                        color: '#71BA51',
                        stack: 'male',
                        data: [ E_CR_tbn1,  E_RM_tbn1,  E_KL_tbn1,  E_CM_tbn1,  E_FM_tbn1,  E_PK_tbn1]
                    }, {
                        name: '<b>World Class (85%)</b>',
                        type: 'spline',
                        color: '#E74C3C',
                        data: wc_eff_
                    }]
            });
        }
    }).done(function (data) {
    }).fail(function () {

    });
    
    //Chart Tuban 2
    $.ajax({
        url: url_src + '/api/index.php/plant_tuban/get_pm_detail?tahun=' + my_tahun + '&bulan=' + my_bulan + '&plant=tbn2',
        type: 'GET',
        success: function (data) {
            var data1 = data.replace("<title>Json</title>", "");
            var data2 = data1.replace("(", "[");
            var data3 = data2.replace(");", "]");

            var dataJson = JSON.parse(data3);

            var U_CR_tbn2 = parseFloat(dataJson.tbn2.UTILISASI.CRUSHER.data);
            var U_RM_tbn2 = parseFloat(dataJson.tbn2.UTILISASI.RAW_MILL.data);
            var U_KL_tbn2 = parseFloat(dataJson.tbn2.UTILISASI.KILN.data);
            var U_CM_tbn2 = parseFloat(dataJson.tbn2.UTILISASI.COAL_MILL.data);
            var U_FM_tbn2 = parseFloat(dataJson.tbn2.UTILISASI.FINISH_MILL.data);
            var U_PK_tbn2 = parseFloat(dataJson.tbn2.UTILISASI.PACKER.data);
            var Y_CR_tbn2 = parseFloat(dataJson.tbn2.YIELD.CRUSHER.data);
            var Y_RM_tbn2 = parseFloat(dataJson.tbn2.YIELD.RAW_MILL.data);
            var Y_KL_tbn2 = parseFloat(dataJson.tbn2.YIELD.KILN.data);
            var Y_CM_tbn2 = parseFloat(dataJson.tbn2.YIELD.COAL_MILL.data);
            var Y_FM_tbn2 = parseFloat(dataJson.tbn2.YIELD.FINISH_MILL.data);
            var Y_PK_tbn2 = parseFloat(dataJson.tbn2.YIELD.PACKER.data);
            var E_CR_tbn2 = parseFloat(dataJson.tbn2.EFISIENSI.CRUSHER.data);
            var E_RM_tbn2 = parseFloat(dataJson.tbn2.EFISIENSI.RAW_MILL.data);
            var E_KL_tbn2 = parseFloat(dataJson.tbn2.EFISIENSI.KILN.data);
            var E_CM_tbn2 = parseFloat(dataJson.tbn2.EFISIENSI.COAL_MILL.data);
            var E_FM_tbn2 = parseFloat(dataJson.tbn2.EFISIENSI.FINISH_MILL.data);
            var E_PK_tbn2 = parseFloat(dataJson.tbn2.EFISIENSI.PACKER.data);


            $('#board_yield_tb2').highcharts({
                chart: {
                    type: 'column',
                    spacingBottom: 7,
                    spacingTop: 2,
                    spacingLeft: 2,
                    spacingRight: 2,
                    marginLeft: 2,
                    marginRight: 2
                },
                title: {
                    text: ''
                },
                subtitle: {
                    text: ''
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
                        stacking: 'normal',
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}'
                        },
                        enableMouseTracking: true
                    }
                },
                xAxis: {
                    categories: ['CRUSHER', 'RAW MILL', 'KILN', 'COAL MILL', 'FINISH MILL', 'PACKER']
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
                        name: 'Yield',
                        color: '#71BA51',
                        stack: 'male',
                        data: [Y_CR_tbn2, Y_RM_tbn2, Y_KL_tbn2, Y_CM_tbn2, Y_FM_tbn2, Y_PK_tbn2]
                    }, {
                        name: '<b>World Class (95%)</b>',
                        type: 'spline',
                        color: '#E74C3C',
                        data: wc_yield_
                    }]
            });

            $('#board_util_tb2').highcharts({
                chart: {
                    type: 'column',
                    spacingBottom: 7,
                    spacingTop: 2,
                    spacingLeft: 2,
                    spacingRight: 2,
                    marginLeft: 2,
                    marginRight: 2
                },
                title: {
                    text: ''
                },
                subtitle: {
                    text: ''
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
                        stacking: 'normal',
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}'
                        },
                        enableMouseTracking: true
                    }
                },
                xAxis: {
                    categories: ['CRUSHER', 'RAW MILL', 'KILN', 'COAL MILL', 'FINISH MILL', 'PACKER']
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
                        name: 'Utilisasi',
                        color: '#71BA51',
                        stack: 'male',
                        data: [U_CR_tbn2, U_RM_tbn2, U_KL_tbn2, U_CM_tbn2, U_FM_tbn2, U_PK_tbn2]
                    }, {
                        name: '<b>World Class (90%)</b>',
                        type: 'spline',
                        color: '#E74C3C',
                        data: wc_util_
                    }]
            });

            $('#board_eff_tb2').highcharts({
                chart: {
                    type: 'column',
                    spacingBottom: 7,
                    spacingTop: 2,
                    spacingLeft: 2,
                    spacingRight: 2,
                    marginLeft: 2,
                    marginRight: 2
                },
                title: {
                    text: ''
                },
                subtitle: {
                    text: ''
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
                        stacking: 'normal',
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}'
                        },
                        enableMouseTracking: true
                    }
                },
                xAxis: {
                    categories: ['CRUSHER', 'RAW MILL', 'KILN', 'COAL MILL', 'FINISH MILL', 'PACKER']
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
                        name: 'Efisiensi',
                        color: '#71BA51',
                        stack: 'male',
                        data: [ E_CR_tbn2,  E_RM_tbn2,  E_KL_tbn2,  E_CM_tbn2,  E_FM_tbn2,  E_PK_tbn2]
                    }, {
                        name: '<b>World Class (85%)</b>',
                        type: 'spline',
                        color: '#E74C3C',
                        data: wc_eff_
                    }]
            });
        }
    }).done(function (data) {
    }).fail(function () {

    });
    
    //Chart Tuban 3
    $.ajax({
        url: url_src + '/api/index.php/plant_tuban/get_pm_detail?tahun=' + my_tahun + '&bulan=' + my_bulan + '&plant=tbn3',
        type: 'GET',
        success: function (data) {
            var data1 = data.replace("<title>Json</title>", "");
            var data2 = data1.replace("(", "[");
            var data3 = data2.replace(");", "]");

            var dataJson = JSON.parse(data3);

            var U_CR_tbn3 = parseFloat(dataJson.tbn3.UTILISASI.CRUSHER.data);
            var U_RM_tbn3 = parseFloat(dataJson.tbn3.UTILISASI.RAW_MILL.data);
            var U_KL_tbn3 = parseFloat(dataJson.tbn3.UTILISASI.KILN.data);
            var U_CM_tbn3 = parseFloat(dataJson.tbn3.UTILISASI.COAL_MILL.data);
            var U_FM_tbn3 = parseFloat(dataJson.tbn3.UTILISASI.FINISH_MILL.data);
            var U_PK_tbn3 = parseFloat(dataJson.tbn3.UTILISASI.PACKER.data);
            var Y_CR_tbn3 = parseFloat(dataJson.tbn3.YIELD.CRUSHER.data);
            var Y_RM_tbn3 = parseFloat(dataJson.tbn3.YIELD.RAW_MILL.data);
            var Y_KL_tbn3 = parseFloat(dataJson.tbn3.YIELD.KILN.data);
            var Y_CM_tbn3 = parseFloat(dataJson.tbn3.YIELD.COAL_MILL.data);
            var Y_FM_tbn3 = parseFloat(dataJson.tbn3.YIELD.FINISH_MILL.data);
            var Y_PK_tbn3 = parseFloat(dataJson.tbn3.YIELD.PACKER.data);
            var E_CR_tbn3 = parseFloat(dataJson.tbn3.EFISIENSI.CRUSHER.data);
            var E_RM_tbn3 = parseFloat(dataJson.tbn3.EFISIENSI.RAW_MILL.data);
            var E_KL_tbn3 = parseFloat(dataJson.tbn3.EFISIENSI.KILN.data);
            var E_CM_tbn3 = parseFloat(dataJson.tbn3.EFISIENSI.COAL_MILL.data);
            var E_FM_tbn3 = parseFloat(dataJson.tbn3.EFISIENSI.FINISH_MILL.data);
            var E_PK_tbn3 = parseFloat(dataJson.tbn3.EFISIENSI.PACKER.data);


            $('#board_yield_tb3').highcharts({
                chart: {
                    type: 'column',
                    spacingBottom: 7,
                    spacingTop: 2,
                    spacingLeft: 2,
                    spacingRight: 2,
                    marginLeft: 2,
                    marginRight: 2
                },
                title: {
                    text: ''
                },
                subtitle: {
                    text: ''
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
                        stacking: 'normal',
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}'
                        },
                        enableMouseTracking: true
                    }
                },
                xAxis: {
                    categories: ['CRUSHER', 'RAW MILL', 'KILN', 'COAL MILL', 'FINISH MILL', 'PACKER']
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
                        name: 'Yield',
                        color: '#71BA51',
                        stack: 'male',
                        data: [Y_CR_tbn3, Y_RM_tbn3, Y_KL_tbn3, Y_CM_tbn3, Y_FM_tbn3, Y_PK_tbn3]
                    }, {
                        name: '<b>World Class (95%)</b>',
                        type: 'spline',
                        color: '#E74C3C',
                        data: wc_yield_
                    }]
            });

            $('#board_util_tb3').highcharts({
                chart: {
                    type: 'column',
                    spacingBottom: 7,
                    spacingTop: 2,
                    spacingLeft: 2,
                    spacingRight: 2,
                    marginLeft: 2,
                    marginRight: 2
                },
                title: {
                    text: ''
                },
                subtitle: {
                    text: ''
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
                        stacking: 'normal',
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}'
                        },
                        enableMouseTracking: true
                    }
                },
                xAxis: {
                    categories: ['CRUSHER', 'RAW MILL', 'KILN', 'COAL MILL', 'FINISH MILL', 'PACKER']
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
                        name: 'Utilisasi',
                        color: '#71BA51',
                        stack: 'male',
                        data: [U_CR_tbn3, U_RM_tbn3, U_KL_tbn3, U_CM_tbn3, U_FM_tbn3, U_PK_tbn3]
                    }, {
                        name: '<b>World Class (90%)</b>',
                        type: 'spline',
                        color: '#E74C3C',
                        data: wc_util_
                    }]
            });

            $('#board_eff_tb3').highcharts({
                chart: {
                    type: 'column',
                    spacingBottom: 7,
                    spacingTop: 2,
                    spacingLeft: 2,
                    spacingRight: 2,
                    marginLeft: 2,
                    marginRight: 2
                },
                title: {
                    text: ''
                },
                subtitle: {
                    text: ''
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
                        stacking: 'normal',
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}'
                        },
                        enableMouseTracking: true
                    }
                },
                xAxis: {
                    categories: ['CRUSHER', 'RAW MILL', 'KILN', 'COAL MILL', 'FINISH MILL', 'PACKER']
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
                        name: 'Efisiensi',
                        color: '#71BA51',
                        stack: 'male',
                        data: [ E_CR_tbn3,  E_RM_tbn3,  E_KL_tbn3,  E_CM_tbn3,  E_FM_tbn3,  E_PK_tbn3]
                    }, {
                        name: '<b>World Class (85%)</b>',
                        type: 'spline',
                        color: '#E74C3C',
                        data: wc_eff_
                    }]
            });
        }
    }).done(function (data) {
    }).fail(function () {

    });
    
    //Chart Tuban 4
    $.ajax({
        url: url_src + '/api/index.php/plant_tuban/get_pm_detail?tahun=' + my_tahun + '&bulan=' + my_bulan + '&plant=tbn4',
        type: 'GET',
        success: function (data) {
            var data1 = data.replace("<title>Json</title>", "");
            var data2 = data1.replace("(", "[");
            var data3 = data2.replace(");", "]");

            var dataJson = JSON.parse(data3);

            var U_CR_tbn4 = parseFloat(dataJson.tbn4.UTILISASI.CRUSHER.data);
            var U_RM_tbn4 = parseFloat(dataJson.tbn4.UTILISASI.RAW_MILL.data);
            var U_KL_tbn4 = parseFloat(dataJson.tbn4.UTILISASI.KILN.data);
            var U_CM_tbn4 = parseFloat(dataJson.tbn4.UTILISASI.COAL_MILL.data);
            var U_FM_tbn4 = parseFloat(dataJson.tbn4.UTILISASI.FINISH_MILL.data);
            var U_PK_tbn4 = parseFloat(dataJson.tbn4.UTILISASI.PACKER.data);
            var Y_CR_tbn4 = parseFloat(dataJson.tbn4.YIELD.CRUSHER.data);
            var Y_RM_tbn4 = parseFloat(dataJson.tbn4.YIELD.RAW_MILL.data);
            var Y_KL_tbn4 = parseFloat(dataJson.tbn4.YIELD.KILN.data);
            var Y_CM_tbn4 = parseFloat(dataJson.tbn4.YIELD.COAL_MILL.data);
            var Y_FM_tbn4 = parseFloat(dataJson.tbn4.YIELD.FINISH_MILL.data);
            var Y_PK_tbn4 = parseFloat(dataJson.tbn4.YIELD.PACKER.data);
            var E_CR_tbn4 = parseFloat(dataJson.tbn4.EFISIENSI.CRUSHER.data);
            var E_RM_tbn4 = parseFloat(dataJson.tbn4.EFISIENSI.RAW_MILL.data);
            var E_KL_tbn4 = parseFloat(dataJson.tbn4.EFISIENSI.KILN.data);
            var E_CM_tbn4 = parseFloat(dataJson.tbn4.EFISIENSI.COAL_MILL.data);
            var E_FM_tbn4 = parseFloat(dataJson.tbn4.EFISIENSI.FINISH_MILL.data);
            var E_PK_tbn4 = parseFloat(dataJson.tbn4.EFISIENSI.PACKER.data);


            $('#board_yield_tb4').highcharts({
                chart: {
                    type: 'column',
                    spacingBottom: 7,
                    spacingTop: 2,
                    spacingLeft: 2,
                    spacingRight: 2,
                    marginLeft: 2,
                    marginRight: 2
                },
                title: {
                    text: ''
                },
                subtitle: {
                    text: ''
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
                        stacking: 'normal',
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}'
                        },
                        enableMouseTracking: true
                    }
                },
                xAxis: {
                    categories: ['CRUSHER', 'RAW MILL', 'KILN', 'COAL MILL', 'FINISH MILL', 'PACKER']
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
                        name: 'Yield',
                        color: '#71BA51',
                        stack: 'male',
                        data: [Y_CR_tbn4, Y_RM_tbn4, Y_KL_tbn4, Y_CM_tbn4, Y_FM_tbn4, Y_PK_tbn4]
                    }, {
                        name: '<b>World Class (95%)</b>',
                        type: 'spline',
                        color: '#E74C3C',
                        data: wc_yield_
                    }]
            });

            $('#board_util_tb4').highcharts({
                chart: {
                    type: 'column',
                    spacingBottom: 7,
                    spacingTop: 2,
                    spacingLeft: 2,
                    spacingRight: 2,
                    marginLeft: 2,
                    marginRight: 2
                },
                title: {
                    text: ''
                },
                subtitle: {
                    text: ''
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
                        stacking: 'normal',
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}'
                        },
                        enableMouseTracking: true
                    }
                },
                xAxis: {
                    categories: ['CRUSHER', 'RAW MILL', 'KILN', 'COAL MILL', 'FINISH MILL', 'PACKER']
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
                        name: 'Utilisasi',
                        color: '#71BA51',
                        stack: 'male',
                        data: [U_CR_tbn4, U_RM_tbn4, U_KL_tbn4, U_CM_tbn4, U_FM_tbn4, U_PK_tbn4]
                    }, {
                        name: '<b>World Class (90%)</b>',
                        type: 'spline',
                        color: '#E74C3C',
                        data: wc_util_
                    }]
            });

            $('#board_eff_tb4').highcharts({
                chart: {
                    type: 'column',
                    spacingBottom: 7,
                    spacingTop: 2,
                    spacingLeft: 2,
                    spacingRight: 2,
                    marginLeft: 2,
                    marginRight: 2
                },
                title: {
                    text: ''
                },
                subtitle: {
                    text: ''
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
                        stacking: 'normal',
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}'
                        },
                        enableMouseTracking: true
                    }
                },
                xAxis: {
                    categories: ['CRUSHER', 'RAW MILL', 'KILN', 'COAL MILL', 'FINISH MILL', 'PACKER']
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
                        name: 'Efisiensi',
                        color: '#71BA51',
                        stack: 'male',
                        data: [ E_CR_tbn4,  E_RM_tbn4,  E_KL_tbn4,  E_CM_tbn4,  E_FM_tbn4,  E_PK_tbn4]
                    }, {
                        name: '<b>World Class (85%)</b>',
                        type: 'spline',
                        color: '#E74C3C',
                        data: wc_eff_
                    }]
            });
        }
    }).done(function (data) {
    }).fail(function () {

    });
</script>