<script src="<?php echo base_url() ?>bootstrap/plantView/assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url() ?>bootstrap/plantView/assets/js/accounting.js"></script>
<script src="<?php echo base_url() ?>bootstrap/plantView/highcharts/highcharts.js"></script>
<style>
    .blink_me {
        animation: blinker 1s linear infinite;
    }
    @keyframes blinker {  
        50% { opacity: 0; }
    }
    .td_right {
        text-align: right;
    }
    hr {
        margin-top: 20px;
        margin-bottom: 20px;
        border: 0;
        border-top: 2px solid #c35a5a;
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
                <h3 style="text-align: left; padding-left: 12px; margin-top: 10px;">Tuban Plant Maintenance Cost Report</h3>
            </div>
            <div style="padding-top: 8px;" class="col-xs-1">
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

<div class="col-xs-12" style="padding-bottom: 10px;">
    <div class="col-xs-4">
        <div align="center" style="font-size: 20px">.:: Maintenance Cost by <b>Jenis kegiatan</b> ::.</div>
        <div id="JENIS_KEG" style="min-height: 300px"></div>
    </div>
    <div class="col-xs-4">
        <div align="center" style="font-size: 20px">.:: Maintenance Cost by <b>Biaya</b> ::.</div>
        <div id="BIAYA" style="min-height: 300px"></div>
    </div>
    <div class="col-xs-4">
        <div align="center" style="font-size: 20px">.:: Maintenance Cost by <b>Kelp. Nilai</b> ::.</div>
        <div id="KELP_NILAI" style="min-height: 300px"></div>
    </div>
</div>
<hr style="width: 100%;">
<div class="col-xs-12" style="padding-bottom: 10px;">
    <div class="col-xs-3">
        <div align="center" style="font-size: 20px">.:: Maintenance Cost by <b>Kegiatan</b> ::.</div>
        <div style="height: 500px; overflow-x: scroll;">
            <table class="table table-striped" border="1px" style="font-size: 12px; color: black;">
                <thead style="background-color: #E0E4CC">
                <th>No</th>
                <th style="text-align: center">Type</th>
                <th style="text-align: center">Amount</th>
                </thead>
                <tbody id="KEGIATAN">
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-xs-3">
        <div align="center" style="font-size: 20px">.:: Maintenance Cost by <b>BU_5</b> ::.</div>
        <div style="height: 500px; overflow-x: scroll;">
            <table class="table table-striped" border="1px" style="font-size: 12px; color: black;">
                <thead style="background-color: #E0E4CC">
                <th>No</th>
                <th style="text-align: center">Type</th>
                <th style="text-align: center">Amount</th>
                </thead>
                <tbody id="BU_5">
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-xs-3">
        <div align="center" style="font-size: 20px">.:: Maintenance Cost by <b>Plant</b> ::.</div>
        <div style="height: 500px; overflow-x: scroll;">
            <table class="table table-striped" border="1px" style="font-size: 12px; color: black;">
                <thead style="background-color: #E0E4CC">
                <th>No</th>
                <th style="text-align: center">Type</th>
                <th style="text-align: center">Amount</th>
                </thead>
                <tbody id="PLANT">
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-xs-3">
        <div align="center" style="font-size: 20px">.:: Maintenance Cost by <b>Area Proses</b> ::.</div>
        <div style="height: 500px; overflow-x: scroll;">
            <table class="table table-striped" border="1px" style="font-size: 12px; color: black;">
                <thead style="background-color: #E0E4CC">
                <th>No</th>
                <th style="text-align: center">Type</th>
                <th style="text-align: center">Amount</th>
                </thead>
                <tbody id="AREA_PROC">
                </tbody>
            </table>
        </div>
    </div>
</div>
<hr style="width: 100%;">
<div class="col-xs-12" style="padding-bottom: 10px;">
    <div class="col-xs-3">
        <div align="center" style="font-size: 20px">.:: Maintenance Cost by <b>kelmp C_E</b> ::.</div>
        <div style="height: 500px; overflow-x: scroll;">
            <table class="table table-striped" border="1px" style="font-size: 12px; color: black;">
                <thead style="background-color: #E0E4CC">
                <th>No</th>
                <th style="text-align: center">Type</th>
                <th style="text-align: center">Amount</th>
                </thead>
                <tbody id="KELP_CE">
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-xs-3">
        <div align="center" style="font-size: 20px">.:: Maintenance Cost by <b>Des kelmp C_E</b> ::.</div>
        <div style="height: 500px; overflow-x: scroll;">
            <table class="table table-striped" border="1px" style="font-size: 12px; color: black;">
                <thead style="background-color: #E0E4CC">
                <th>No</th>
                <th style="text-align: center">Type</th>
                <th style="text-align: center">Amount</th>
                </thead>
                <tbody id="DESC_CE">
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-xs-3">
        <div align="center" style="font-size: 20px">.:: Maintenance Cost by <b>Depart</b> ::.</div>
        <div style="height: 500px; overflow-x: scroll;">
            <table class="table table-striped" border="1px" style="font-size: 12px; color: black;">
                <thead style="background-color: #E0E4CC">
                <th>No</th>
                <th style="text-align: center">Type</th>
                <th style="text-align: center">Amount</th>
                </thead>
                <tbody id="DEPART">
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-xs-3">
        <div align="center" style="font-size: 20px">.:: Maintenance Cost by <b>Unit Kerja</b> ::.</div>
        <div style="height: 500px; overflow-x: scroll;">
            <table class="table table-striped" border="1px" style="font-size: 12px; color: black;">
                <thead style="background-color: #E0E4CC">
                <th>No</th>
                <th style="text-align: center">Type</th>
                <th style="text-align: center">Amount</th>
                </thead>
                <tbody id="UNIT_KERJA">
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    //Dashboard
    var my_bulan = '<?php echo date('m') ?>';
    var my_tahun = <?php echo date('Y') ?>;
    var url_src = '<?php echo base_url(); ?>';

    //Chart
    $.ajax({
        url: url_src + 'index.php/plant_gresik/maintenance_cost_chart?bulan=9&tahun=2017&param=JENIS_KEG',
        type: 'GET',
        success: function (data) {
            var data1 = data.replace("<title>Json</title>", "");
            var data2 = data1.replace("(", "[");
            var data3 = data2.replace(");", "]");

            var dataJson = JSON.parse(data3);

            var count = parseFloat(dataJson.count);

            var type = [];
            var amount = [];
            var no = [];
            var keys = [];

            for (var i = 1; i <= count; i++) {
                var key = 's' + i.toString();

                keys[key] = key;
                no[key] = i.toString();
                type[key] = dataJson.data[key].type;
                amount[key] = dataJson.data[key].amount;
            }

            $('#JENIS_KEG').highcharts({
                chart: {
                    type: 'bar'
                },
                title: {
                    text: ''
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: [type['s1'], type['s2']],
                    title: ''
                },
                credits: {
                    enabled: false
                },
                exporting: {
                    enabled: false
                },
                yAxis: {
                    labels: {
                        formatter: function () {
                            return Highcharts.numberFormat((this.value) / 1000000000, 0, ',', '.') + ' Bio';
                        },
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    title: ''
                },
                tooltip: {
                    formatter: function () {
                        var d = '<b>' + this.x + '</b>';
                        d += ': ' + accounting.formatMoney((this.y / 1000000), "Rp ", 0) + ' Mio';
                        return d;
                    },
                    shared: true
                },
                plotOptions: {
                    column: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: true
                    }
                },
                series: [{
                        name: 'Jenis Kegiatan',
                        color: '#7BB0A6',
                        data: [parseFloat(amount['s1']), parseFloat(amount['s2'])]
                    }]
            });
        }
    }).done(function (data) {
    }).fail(function () {
    });

    $.ajax({
        url: url_src + 'index.php/plant_gresik/maintenance_cost_chart?bulan=9&tahun=2017&param=BIAYA',
        type: 'GET',
        success: function (data) {
            var data1 = data.replace("<title>Json</title>", "");
            var data2 = data1.replace("(", "[");
            var data3 = data2.replace(");", "]");

            var dataJson = JSON.parse(data3);

            var count = parseFloat(dataJson.count);

            var type = [];
            var amount = [];
            var no = [];
            var keys = [];

            for (var i = 1; i <= count; i++) {
                var key = 's' + i.toString();

                keys[key] = key;
                no[key] = i.toString();
                type[key] = dataJson.data[key].type;
                amount[key] = dataJson.data[key].amount;
            }


            $('#BIAYA').highcharts({
                chart: {
                    type: 'bar'
                },
                title: {
                    text: ''
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: [type['s1'], type['s2']],
                    title: ''
                },
                credits: {
                    enabled: false
                },
                exporting: {
                    enabled: false
                },
                yAxis: {
                    labels: {
                        formatter: function () {
                            return Highcharts.numberFormat((this.value) / 1000000000, 0, ',', '.') + ' Bio';
                        },
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    title: ''
                },
                tooltip: {
                    formatter: function () {
                        var d = '<b>' + this.x + '</b>';
                        d += ': ' + accounting.formatMoney((this.y / 1000000), "Rp ", 0) + ' Mio';
                        return d;
                    },
                    shared: true
                },
                plotOptions: {
                    column: {
                        dataLabels: {
                            enabled: true,
                        },
                        enableMouseTracking: true
                    }
                },
                series: [{
                        name: 'Biaya',
                        color: '#87766C',
                        data: [parseFloat(amount['s1']), parseFloat(amount['s2'])]
                    }]
            });
        }
    }).done(function (data) {
    }).fail(function () {
    });

    $.ajax({
        url: url_src + 'index.php/plant_gresik/maintenance_cost_chart?bulan=9&tahun=2017&param=KELP_NILAI',
        type: 'GET',
        success: function (data) {
            var data1 = data.replace("<title>Json</title>", "");
            var data2 = data1.replace("(", "[");
            var data3 = data2.replace(");", "]");

            var dataJson = JSON.parse(data3);

            var count = parseFloat(dataJson.count);

            var type = [];
            var amount = [];
            var no = [];
            var keys = [];

            for (var i = 1; i <= count; i++) {
                var key = 's' + i.toString();

                keys[key] = key;
                no[key] = i.toString();
                type[key] = dataJson.data[key].type;
                amount[key] = dataJson.data[key].amount;
            }

            console.log(type['s1']);
            console.log(type['s2']);

            $('#KELP_NILAI').highcharts({
                chart: {
                    type: 'bar'
                },
                title: {
                    text: ''
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: [type['s1'], type['s2']],
                    title: ''
                },
                credits: {
                    enabled: false
                },
                exporting: {
                    enabled: false
                },
                yAxis: {
                    labels: {
                        formatter: function () {
                            return Highcharts.numberFormat((this.value) / 1000000000, 0, ',', '.') + ' Bio';
                        },
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    title: ''
                },
                tooltip: {
                    formatter: function () {
                        var d = '<b>' + this.x + '</b>';
                        d += ': ' + accounting.formatMoney((this.y / 1000000), "Rp ", 0) + ' Mio';
                        return d;
                    },
                    shared: true
                },
                plotOptions: {
                    column: {
                        dataLabels: {
                            enabled: true,
                        },
                        enableMouseTracking: true
                    }
                },
                series: [{
                        name: 'Kelp. Nilai',
                        color: '#D33257',
                        data: [parseFloat(amount['s1']), parseFloat(amount['s2'])]
                    }]
            });
        }
    }).done(function (data) {
    }).fail(function () {
    });

    //Table
    $.ajax({
        url: url_src + 'index.php/plant_gresik/maintenance_cost_chart?bulan=9&tahun=2017&param=KELP_CE',
        type: 'GET',
        success: function (data) {
            var data1 = data.replace("<title>Json</title>", "");
            var data2 = data1.replace("(", "[");
            var data3 = data2.replace(");", "]");

            var dataJson = JSON.parse(data3);
            var count = parseFloat(dataJson.count);
            var catatan = '';

            var type = [];
            var amount = [];
            var no = [];
            var keys = [];

            var catatan = '';

            for (var i = 1; i <= count; i++) {
                var key = 's' + i.toString();

                keys[key] = key;
                no[key] = i.toString();
                type[key] = dataJson.data[key].type;
                amount[key] = dataJson.data[key].amount;

                catatan += '<tr><td>' + i + '</td><td>' + type[key] + '</td><td class="td_right">' + accounting.formatMoney(amount[key], "Rp ", 0) + '</td></tr>';
            }
            $("#KELP_CE").html(catatan);
        }
    }).done(function (data) {
    }).fail(function () {
    });

    $.ajax({
        url: url_src + 'index.php/plant_gresik/maintenance_cost_chart?bulan=9&tahun=2017&param=DESC_CE',
        type: 'GET',
        success: function (data) {
            var data1 = data.replace("<title>Json</title>", "");
            var data2 = data1.replace("(", "[");
            var data3 = data2.replace(");", "]");

            var dataJson = JSON.parse(data3);
            var count = parseFloat(dataJson.count);
            var catatan = '';

            var type = [];
            var amount = [];
            var no = [];
            var keys = [];

            var catatan = '';

            for (var i = 1; i <= count; i++) {
                var key = 's' + i.toString();

                keys[key] = key;
                no[key] = i.toString();
                type[key] = dataJson.data[key].type;
                amount[key] = dataJson.data[key].amount;

                catatan += '<tr><td>' + i + '</td><td>' + type[key] + '</td><td class="td_right">' + accounting.formatMoney(amount[key], "Rp ", 0) + '</td></tr>';
            }
            $("#DESC_CE").html(catatan);
        }
    }).done(function (data) {
    }).fail(function () {
    });

    $.ajax({
        url: url_src + 'index.php/plant_gresik/maintenance_cost_chart?bulan=9&tahun=2017&param=KEGIATAN',
        type: 'GET',
        success: function (data) {
            var data1 = data.replace("<title>Json</title>", "");
            var data2 = data1.replace("(", "[");
            var data3 = data2.replace(");", "]");

            var dataJson = JSON.parse(data3);
            var count = parseFloat(dataJson.count);
            var catatan = '';

            var type = [];
            var amount = [];
            var no = [];
            var keys = [];

            var catatan = '';

            for (var i = 1; i <= count; i++) {
                var key = 's' + i.toString();

                keys[key] = key;
                no[key] = i.toString();
                type[key] = dataJson.data[key].type;
                amount[key] = dataJson.data[key].amount;

                catatan += '<tr><td>' + i + '</td><td>' + type[key] + '</td><td class="td_right">' + accounting.formatMoney(amount[key], "Rp ", 0) + '</td></tr>';
            }
            $("#KEGIATAN").html(catatan);
        }
    }).done(function (data) {
    }).fail(function () {
    });

    $.ajax({
        url: url_src + 'index.php/plant_gresik/maintenance_cost_chart?bulan=9&tahun=2017&param=BU_5',
        type: 'GET',
        success: function (data) {
            var data1 = data.replace("<title>Json</title>", "");
            var data2 = data1.replace("(", "[");
            var data3 = data2.replace(");", "]");

            var dataJson = JSON.parse(data3);
            var count = parseFloat(dataJson.count);
            var catatan = '';

            var type = [];
            var amount = [];
            var no = [];
            var keys = [];

            var catatan = '';

            for (var i = 1; i <= count; i++) {
                var key = 's' + i.toString();

                keys[key] = key;
                no[key] = i.toString();
                type[key] = dataJson.data[key].type;
                amount[key] = dataJson.data[key].amount;

                catatan += '<tr><td>' + i + '</td><td class="td_right">' + type[key] + '</td><td class="td_right">' + accounting.formatMoney(amount[key], "Rp ", 0) + '</td></tr>';
            }
            $("#BU_5").html(catatan);
        }
    }).done(function (data) {
    }).fail(function () {
    });

    $.ajax({
        url: url_src + 'index.php/plant_gresik/maintenance_cost_chart?bulan=9&tahun=2017&param=PLANT',
        type: 'GET',
        success: function (data) {
            var data1 = data.replace("<title>Json</title>", "");
            var data2 = data1.replace("(", "[");
            var data3 = data2.replace(");", "]");

            var dataJson = JSON.parse(data3);
            var count = parseFloat(dataJson.count);
            var catatan = '';

            var type = [];
            var amount = [];
            var no = [];
            var keys = [];

            var catatan = '';

            for (var i = 1; i <= count; i++) {
                var key = 's' + i.toString();

                keys[key] = key;
                no[key] = i.toString();
                type[key] = dataJson.data[key].type;
                amount[key] = dataJson.data[key].amount;

                catatan += '<tr><td>' + i + '</td><td>' + type[key] + '</td><td class="td_right">' + accounting.formatMoney(amount[key], "Rp ", 0) + '</td></tr>';
            }
            $("#PLANT").html(catatan);
        }
    }).done(function (data) {
    }).fail(function () {
    });

    $.ajax({
        url: url_src + 'index.php/plant_gresik/maintenance_cost_chart?bulan=9&tahun=2017&param=AREA_PROC',
        type: 'GET',
        success: function (data) {
            var data1 = data.replace("<title>Json</title>", "");
            var data2 = data1.replace("(", "[");
            var data3 = data2.replace(");", "]");

            var dataJson = JSON.parse(data3);
            var count = parseFloat(dataJson.count);
            var catatan = '';

            var type = [];
            var amount = [];
            var no = [];
            var keys = [];

            var catatan = '';

            for (var i = 1; i <= count; i++) {
                var key = 's' + i.toString();

                keys[key] = key;
                no[key] = i.toString();
                type[key] = dataJson.data[key].type;
                amount[key] = dataJson.data[key].amount;

                catatan += '<tr><td>' + i + '</td><td>' + type[key] + '</td><td class="td_right">' + accounting.formatMoney(amount[key], "Rp ", 0) + '</td></tr>';
            }
            $("#AREA_PROC").html(catatan);
        }
    }).done(function (data) {
    }).fail(function () {
    });

    $.ajax({
        url: url_src + 'index.php/plant_gresik/maintenance_cost_chart?bulan=9&tahun=2017&param=DEPART',
        type: 'GET',
        success: function (data) {
            var data1 = data.replace("<title>Json</title>", "");
            var data2 = data1.replace("(", "[");
            var data3 = data2.replace(");", "]");

            var dataJson = JSON.parse(data3);
            var count = parseFloat(dataJson.count);
            var catatan = '';

            var type = [];
            var amount = [];
            var no = [];
            var keys = [];

            var catatan = '';

            for (var i = 1; i <= count; i++) {
                var key = 's' + i.toString();

                keys[key] = key;
                no[key] = i.toString();
                type[key] = dataJson.data[key].type;
                amount[key] = dataJson.data[key].amount;

                catatan += '<tr><td>' + i + '</td><td>' + type[key] + '</td><td class="td_right">' + accounting.formatMoney(amount[key], "Rp ", 0) + '</td></tr>';
            }
            $("#DEPART").html(catatan);
        }
    }).done(function (data) {
    }).fail(function () {
    });

    $.ajax({
        url: url_src + 'index.php/plant_gresik/maintenance_cost_chart?bulan=9&tahun=2017&param=UNIT_KERJA',
        type: 'GET',
        success: function (data) {
            var data1 = data.replace("<title>Json</title>", "");
            var data2 = data1.replace("(", "[");
            var data3 = data2.replace(");", "]");

            var dataJson = JSON.parse(data3);
            var count = parseFloat(dataJson.count);
            var catatan = '';

            var type = [];
            var amount = [];
            var no = [];
            var keys = [];

            var catatan = '';

            for (var i = 1; i <= count; i++) {
                var key = 's' + i.toString();

                keys[key] = key;
                no[key] = i.toString();
                type[key] = dataJson.data[key].type;
                amount[key] = dataJson.data[key].amount;

                catatan += '<tr><td>' + i + '</td><td>' + type[key] + '</td><td class="td_right">' + accounting.formatMoney(amount[key], "Rp ", 0) + '</td></tr>';
            }
            $("#UNIT_KERJA").html(catatan);
        }
    }).done(function (data) {
    }).fail(function () {
    });
</script>
