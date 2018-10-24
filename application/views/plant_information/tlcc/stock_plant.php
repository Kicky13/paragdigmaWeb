<script type="text/javascript" src="bootstrap/plantView/master_opc/js/opc-lib-min.js"></script>
<script type="text/javascript" src="<?php ?>component/fushioncharts/js/fusioncharts.js"></script>
<script type="text/javascript" src="<?php ?>component/fushioncharts/js/fusioncharts.charts.js"></script>
<script type="text/javascript" src="<?php ?>component/fushioncharts/js/themes/fusioncharts.theme.ocean.js"></script>
<script>
    OPC_config = {
        token: '7e61b230-481d-4551-b24b-ba9046e3d8f2',
        serverURL: 'http://10.15.3.146:58725'
    };
</script>
<style>
    .noPadding{
        padding-top:1px;
        padding-left:1px;
        padding-right:1px;
        padding-bottom:1px;
    }
</style>
<div class="row">
    <nav class="navbar navbar-default panelup">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header ">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--      <a class="navbar-brand" href="#">Real Time Plant Overview</a>-->
                <h3 style="text-align: left; padding-left: 12px; margin-top: 10px;">Stock Plant Overview</h3>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff ">TLCC<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= base_url() ?>index.php/plant_padang/stock">Padang</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_rembang/stock">Rembang</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_gresik/stock">Gresik</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_tonasa/stock">Tonasa</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="active"><a href="<?= base_url() ?>index.php/plant_tlcc/stock">TLCC</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>
<!--        batas-->

<div class="row">
    <div  class="col-md-3"></div>
    <div  class="col-md-6 noPadding">
        <div class="row" style="padding-top: 23px;margin:0;">
        <div class="col-xs-12 noPadding plant-head" style="background-color: #ffa83c; height: 90px;"> 
            <div class="col-xs-2" style="background-color: #ffa83c; height: 90px;"> 
                <img src="media/icon/factor2.png" class="img-up">
            </div>
            <div class="col-xs-10"><p class="p-plant">TLCC</p><br><p class="p-numb">1</p></div>
        </div>
        <div style="display:none;">
            <div class="col-xs-12 noPadding img-thumbnail" >
                <div>
                    <div class="col-xs-3">
                        Silo MP 1
                    </div>
                    <div class="col-xs-6">
                        <span id="silo_1"style="font-weight:bold;">0.00</span>
                    </div>
                    <div class="col-xs-3">Ton</div>
                </div>

            </div>
            <div class="col-xs-12 noPadding img-thumbnail" >
                <div>
                    <div class="col-xs-3">
                        Silo MP 2
                    </div>
                    <div class="col-xs-6">
                        <span id="silo_2"style="font-weight:bold;">0.00</span>
                    </div>
                    <div class="col-xs-3">Ton</div>
                </div>
            </div>
            <div class="col-xs-12 noPadding img-thumbnail" >
                <div>
                    <div class="col-xs-3">
                        Silo HCM 1
                    </div>
                    <div class="col-xs-6">
                        <span id="silo_3" style="font-weight:bold;">0.00</span>
                    </div>
                    <div class="col-xs-3">Ton</div>
                </div>
            </div>
            <div class="col-xs-12 noPadding img-thumbnail" >
                <div>
                    <div class="col-xs-3">
                        Silo HCM 2
                    </div>
                    <div class="col-xs-6">
                        <span id="silo_4"  style="font-weight:bold;">0.00</span>
                    </div>
                    <div class="col-xs-3">Ton</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 noPadding">
        <div class="col-md-3 noPadding sl_box" style="text-align: center">
            <div id="silo_tlcc_1"></div>
            <div style="font-size: 20px; font-weight: bold;"><span id="meter_1"></span><span>&nbsp;% Cap</span></div>
        </div>
        <div class="col-md-3 noPadding sl_box" style="text-align: center">
            <div id="silo_tlcc_2"></div>
            <div style="font-size: 20px; font-weight: bold;"><span id="meter_2"></span><span>&nbsp;% Cap</span></div>
        </div>
        <div class="col-md-3 noPadding sl_box" style="text-align: center">
            <div id="silo_tlcc_3"></div>
            <div style="font-size: 20px; font-weight: bold;"><span id="meter_3"></span><span>&nbsp;% Cap</span></div>
        </div>
        <div class="col-md-3 noPadding sl_box" style="text-align: center">
            <div id="silo_tlcc_4"></div>
            <div style="font-size: 20px; font-weight: bold;"><span id="meter_4"></span><span>&nbsp;% Cap</span></div>
        </div>
    </div>
    </div>
</div>
<style type="text/css">
    .sl_box{border:1px solid #eaeaea; border-top:0; border-right:0;overflow: hidden;}
    .sl_box:last-child{border-right:1px solid #eaeaea;}
    .sl_box div:nth-child(2){position: relative; top: -20px; text-align: left; padding-left: 18px;}
    .sl_box > div, .sl_box div span{margin:0 auto !important;text-align: center;}
</style>
<script>
    var url_src = 'http://par4digma.semenindonesia.com';
    FusionCharts.ready(function () {
        var fuelVolume = 0,
                fuelWidget = new FusionCharts({
                    type: 'cylinder',
                    dataFormat: 'json',
                    id: 'fuelMeter1',
                    renderAt: 'silo_tlcc_1',
                    width: '160',
                    height: '250',
                    dataSource: {
                        "chart": {
                            "caption": "Silo Capacity",
                            "subcaption": "Cement MP 1",
                            "subcaptionFontBold": "0",
                            "lowerLimit": "0",
                            "upperLimit": "100",
                            "lowerLimitDisplay": "0 %",
                            "upperLimitDisplay": "100 %",
                            "numberSuffix": " %",
                            "showValue": "0",
                            "showhovereffect": "1",
                            "bgCOlor": "#ffffff",
                            "bgAlpha": "50",
                            "borderAlpha": "0",
                            "cylFillColor": "#656565"
                        },
                        "value": "0"
                    },
                    "events": {
                        "rendered": function (evtObj, argObj) {
                            var fuelVolume, fuelVolumeT,
                                    gaugeRef = evtObj.sender;
                            gaugeRef.chartInterval = setInterval(function () {

                                $.ajax({
                                    url: url_src + '/api/index.php/plant_tlcc/get_silo',
                                    type: 'GET',
                                    success: function (data) {
                                        var data1 = data.replace("<title>Json</title>", "");
                                        var data2 = data1.replace("(", "[");
                                        var data3 = data2.replace(");", "]");
                                        var dataJson = JSON.parse(data3);

                                        mtrSilo = dataJson[0].tags[2].props[0].val;
                                        fuelVolumeT = parseFloat(mtrSilo);
                                        fuelVolume = (fuelVolumeT / 16000) * 40;
										
										persen = ((((parseFloat(fuelVolumeT).toFixed(0)/40)*100).toFixed(0))>100)? 100 : ((parseFloat(fuelVolumeT).toFixed(0)/40)*100).toFixed(0);
										$("#meter_1").html(persen);
                                    }
                                }).done(function (data) {
                                }).fail(function () {

                                });
								persen = ((((parseFloat(fuelVolumeT).toFixed(0)/40)*100).toFixed(0))>100)? 100 : ((parseFloat(fuelVolumeT).toFixed(0)/40)*100).toFixed(0);
                                gaugeRef.feedData("&value=" + persen);
                            }, 500);
                        },
                        "disposed": function (evt, arg) {
                            clearInterval(evt.sender.chartInterval);
                        }
                    }
                }).render();
    });
    FusionCharts.ready(function () {
        var fuelVolume = 0,
                fuelWidget = new FusionCharts({
                    type: 'cylinder',
                    dataFormat: 'json',
                    id: 'fuelMeter2',
                    renderAt: 'silo_tlcc_2',
                    width: '160',
                    height: '250',
                    dataSource: {
                        "chart": {
                            "caption": "Silo Capacity",
                            "subcaption": "Cement MP 2",
                            "subcaptionFontBold": "0",
                            "lowerLimit": "0",
                            "upperLimit": "100",
                            "lowerLimitDisplay": "0 %",
                            "upperLimitDisplay": "100 %",
                            "numberSuffix": " %",
                            "showValue": "0",
                            "showhovereffect": "1",
                            "bgCOlor": "#ffffff",
                            "bgAlpha": "50",
                            "borderAlpha": "0",
                            "cylFillColor": "#656565"
                        },
                        "value": "0"
                    },
                    "events": {
                        "rendered": function (evtObj, argObj) {
                            var fuelVolume, fuelVolumeT,
                                    gaugeRef = evtObj.sender;
                            gaugeRef.chartInterval = setInterval(function () {

                                $.ajax({
                                    url: url_src + '/api/index.php/plant_tlcc/get_silo',
                                    type: 'GET',
                                    success: function (data) {
                                        var data1 = data.replace("<title>Json</title>", "");
                                        var data2 = data1.replace("(", "[");
                                        var data3 = data2.replace(");", "]");
                                        var dataJson = JSON.parse(data3);

                                        mtrSilo = dataJson[0].tags[3].props[0].val;
                                        fuelVolumeT = parseFloat(mtrSilo);
                                        fuelVolume = (fuelVolumeT / 16000) * 40;
										persen = ((((parseFloat(fuelVolumeT).toFixed(0)/40)*100).toFixed(0))>100)? 100 : ((parseFloat(fuelVolumeT).toFixed(0)/40)*100).toFixed(0);
                                        $("#meter_2").html(persen);
                                    }
                                }).done(function (data) {
                                }).fail(function () {

                                });
								persen = ((((parseFloat(fuelVolumeT).toFixed(0)/40)*100).toFixed(0))>100)? 100 : ((parseFloat(fuelVolumeT).toFixed(0)/40)*100).toFixed(0);
                                gaugeRef.feedData("&value=" + persen);
                            }, 500);
                        },
                        "disposed": function (evt, arg) {
                            clearInterval(evt.sender.chartInterval);
                        }
                    }
                }).render();
    });
    FusionCharts.ready(function () {
        var fuelVolume = 0,
                fuelWidget = new FusionCharts({
                    type: 'cylinder',
                    dataFormat: 'json',
                    id: 'fuelMeter3',
                    renderAt: 'silo_tlcc_3',
                    width: '160',
                    height: '250',
                    dataSource: {
                        "chart": {
                            "caption": "Silo Capacity",
                            "subcaption": "Cement HCM 1",
                            "subcaptionFontBold": "0",
                            "lowerLimit": "0",
                            "upperLimit": "100",
                            "lowerLimitDisplay": "0 %",
                            "upperLimitDisplay": "100 %",
                            "numberSuffix": " %",
                            "showValue": "0",
                            "showhovereffect": "1",
                            "bgCOlor": "#ffffff",
                            "bgAlpha": "50",
                            "borderAlpha": "0",
                            "cylFillColor": "#656565"
                        },
                        "value": "0"
                    },
                    "events": {
                        "rendered": function (evtObj, argObj) {
                            var fuelVolume, fuelVolumeT,
                                    gaugeRef = evtObj.sender;
                            gaugeRef.chartInterval = setInterval(function () {

                                $.ajax({
                                    url: url_src + '/api/index.php/plant_tlcc/get_silo',
                                    type: 'GET',
                                    success: function (data) {
                                        var data1 = data.replace("<title>Json</title>", "");
                                        var data2 = data1.replace("(", "[");
                                        var data3 = data2.replace(");", "]");
                                        var dataJson = JSON.parse(data3);

                                        mtrSilo = dataJson[0].tags[6].props[0].val;
                                        fuelVolumeT = parseFloat(mtrSilo);
                                        fuelVolume = (fuelVolumeT / 16000) * 40;
										
										persen = ((((parseFloat(fuelVolumeT).toFixed(0)/40)*100).toFixed(0))>100)? 100 : ((parseFloat(fuelVolumeT).toFixed(0)/40)*100).toFixed(0);
                                        $("#meter_3").html(persen);
                                    }
                                }).done(function (data) {
                                }).fail(function () {

                                });
								
								persen = ((((parseFloat(fuelVolumeT).toFixed(0)/40)*100).toFixed(0))>100)? 100 : ((parseFloat(fuelVolumeT).toFixed(0)/40)*100).toFixed(0);
                                gaugeRef.feedData("&value=" + persen);
                            }, 500);
                        },
                        "disposed": function (evt, arg) {
                            clearInterval(evt.sender.chartInterval);
                        }
                    }
                }).render();
    });
    FusionCharts.ready(function () {
        var fuelVolume = 0,
                fuelWidget = new FusionCharts({
                    type: 'cylinder',
                    dataFormat: 'json',
                    id: 'fuelMeter4',
                    renderAt: 'silo_tlcc_4',
                    width: '160',
                    height: '250',
                    dataSource: {
                        "chart": {
                            "caption": "Silo Capacity",
                            "subcaption": "Cement HCM 2",
                            "subcaptionFontBold": "0",
                            "lowerLimit": "0",
                            "upperLimit": "100",
                            "lowerLimitDisplay": "0 %",
                            "upperLimitDisplay": "100 %",
                            "numberSuffix": " %",
                            "showValue": "0",
                            "showhovereffect": "1",
                            "bgCOlor": "#ffffff",
                            "bgAlpha": "50",
                            "borderAlpha": "0",
                            "cylFillColor": "#656565"
                        },
                        "value": "0"
                    },
                    "events": {
                        "rendered": function (evtObj, argObj) {
                            var fuelVolume, fuelVolumeT,
                                    gaugeRef = evtObj.sender;
                            gaugeRef.chartInterval = setInterval(function () {

                                $.ajax({
                                    url: url_src + '/api/index.php/plant_tlcc/get_silo',
                                    type: 'GET',
                                    success: function (data) {
                                        var data1 = data.replace("<title>Json</title>", "");
                                        var data2 = data1.replace("(", "[");
                                        var data3 = data2.replace(");", "]");
                                        var dataJson = JSON.parse(data3);

                                        mtrSilo = dataJson[0].tags[7].props[0].val;
                                        fuelVolumeT = parseFloat(mtrSilo);
                                        fuelVolume = (fuelVolumeT / 16000) * 40;
										
										persen = ((((parseFloat(fuelVolumeT).toFixed(0)/40)*100).toFixed(0))>100)? 100 : ((parseFloat(fuelVolumeT).toFixed(0)/40)*100).toFixed(0);
                                        $("#meter_4").html(persen);
                                    }
                                }).done(function (data) {
                                }).fail(function () {

                                });
								
								persen = ((((parseFloat(fuelVolumeT).toFixed(0)/40)*100).toFixed(0))>100)? 100 : ((parseFloat(fuelVolumeT).toFixed(0)/40)*100).toFixed(0);
                                gaugeRef.feedData("&value=" + persen);
                            }, 500);
                        },
                        "disposed": function (evt, arg) {
                            clearInterval(evt.sender.chartInterval);
                        }
                    }
                }).render();
    });
    function dataUpdate() {
        $.ajax({
            url: url_src + '/api/index.php/plant_tlcc/get_silo',
            type: 'GET',
            success: function (data) {
                var data1 = data.replace("<title>Json</title>", "");
                var data2 = data1.replace("(", "[");
                var data3 = data2.replace(");", "]");
                var dataJson = JSON.parse(data3);

                var silo_ton_mp1 = dataJson[0].tags[0].props[0].val;
                var silo_ton_mp2 = dataJson[0].tags[1].props[0].val;
                var silo_meter_mp1 = dataJson[0].tags[2].props[0].val;
                var silo_meter_mp2 = dataJson[0].tags[3].props[0].val;
                var silo_ton_hcm1 = dataJson[0].tags[4].props[0].val;
                var silo_ton_hcm2 = dataJson[0].tags[5].props[0].val;
                var silo_meter_hcm1 = dataJson[0].tags[6].props[0].val;
                var silo_meter_hcm2 = dataJson[0].tags[7].props[0].val;

                $("#silo_1").html(parseFloat(silo_ton_mp1).toFixed(0));
                $("#silo_2").html(parseFloat(silo_ton_mp2).toFixed(0));
                $("#silo_3").html(parseFloat(silo_ton_hcm1).toFixed(0));
                $("#silo_4").html(parseFloat(silo_ton_hcm2).toFixed(0));
            }
        }).done(function (data) {
        }).fail(function () {

        });
    }
    setInterval(dataUpdate, 1000);
</script>