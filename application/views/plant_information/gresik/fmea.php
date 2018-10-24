<script src="<?php echo base_url() ?>bootstrap/plantView/assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url() ?>bootstrap/plantView/highcharts/highcharts.js"></script>
<style>
    .blink_me {
        animation: blinker 1s linear infinite;
    }
    @keyframes blinker {  
        50% { opacity: 0; }
    }
    .panel_up {
        margin-bottom: 10px;
        background-color: #25454e;
        border: 1px solid;
        border-color: #E0E4CC;
        border-radius: 4px;
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        color: white;
        font-family: "Segoe UI";

    }
</style>
<div class="row">
    <nav class="navbar navbar-default panel_up">
        <div class="container-fluid">
            <div class="col-xs-9 navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h3 style="text-align: left; padding-left: 12px; margin-top: 10px;">Tuban Plant FMEA Report</h3>
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
<div class="row col-xs-12">
    <div class="col-xs-8">
        <center><h3>Jumlah Record Data FMEA</h3></center>
        <div class="col-xs-12">
            <div class="col-xs-3 panel panel-default">
                <div class="panel panel-heading">
                    <center><b>Jumlah record</b></center>
                </div>
                <div class="panel panel-body" style="height: 100px; text-align: center; font-size: 32px">
                    83
                </div>
            </div>
            <div class="col-xs-3 panel panel-default">
                <div class="panel panel-heading">
                    <center><b>High RPN</b></center>
                </div>
                <div class="panel panel-body" style="height: 100px; text-align: center; font-size: 32px">
                    3
                </div>
            </div>
            <div class="col-xs-3 panel panel-default">
                <div class="panel panel-heading">
                    <center><b>Medium RPN</b></center>
                </div>
                <div class="panel panel-body" style="height: 100px; text-align: center; font-size: 32px">
                    25
                </div>
            </div>
            <div class="col-xs-3 panel panel-default">
                <div class="panel panel-heading">
                    <center><b>Low RPN</b></center>
                </div>
                <div class="panel panel-body" style="height: 100px; text-align: center; font-size: 32px">
                    55
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <select>
                <option>1</option>
                <option>1</option>
                <option>1</option>
                <option>1</option>
            </select>
        </div>
        <div class="col-xs-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Equipment</th>
                        <th scope="col">Failure Mode</th>
                        <th scope="col">Recom Prev. Ctrl</th>
                        <th scope="col">Edit Link</th>
                        <th scope="col">RPN</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-xs-4">
        <center><div style="font-size: 20px;">Summary  Record Berdasarkan Status Eksekusi</div></center>
        <div class="col-xs-12">
            <div id="column" style="min-height: 300px;"></div>
        </div>
        <center><div style="font-size: 20px;">Summary  Record Berdasarkan Kategori RPN</div></center>
        <div class="col-xs-12">
            <div id="donut" style="min-height: 300px;"></div>
        </div>
    </div>
</div>
<script>
    Highcharts.chart('column', {
        chart: {
            type: 'column'
        },
        title: {
            text: ''
        },
        exporting: {
            enabled: false
        },
        credits: {
            enabled: false
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [
                '',
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
                name: 'Executed',
                data: [49.9]

            }, {
                name: 'Not Executed',
                data: [83.6]

            }]
    });

    Highcharts.chart('donut', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false
        },
        exporting: {
            enabled: false
        },
        credits: {
            enabled: false
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        title: {
            text: ''
        },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    distance: -50,
                    style: {
                        fontWeight: 'bold',
                        color: 'white'
                    }
                },
                startAngle: 0,
                endAngle: 360,
                center: ['50%', '50%']
            }
        },
        series: [{
                type: 'pie',
                name: 'Browser share',
                innerSize: '50%',
                data: [
                    ['Low RPN', 10.38],
                    ['Med PRN', 56.33],
                    ['High RPN', 24.03],
                    {
                        name: '',
                        y: 0.2,
                        dataLabels: {
                            enabled: true
                        }
                    }
                ]
            }]
    });
</script>