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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff ">Tonasa<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= base_url() ?>index.php/plant_padang/stock">Padang</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_rembang/stock">Rembang</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_gresik/stock">Gresik</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="active"><a href="<?= base_url() ?>index.php/plant_tonasa/stock">Tonasa</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_tlcc/stock">TLCC</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>
<!--        batas-->
<div class="row">
    <!--<img src="media/st-map.png" class="img-responsive" style="margin: auto; display: block">-->
    <div class="col-xs-4">
        <div class="col-xs-12 noPadding plant-head" style="background-color: #ffa83c; height: 90px;">
            <div class="col-xs-2" style="background-color: #ffa83c; height: 90px;"> 
                <img src="media/icon/factor2.png" class="img-up">
            </div>
            <div class="col-xs-10"><p class="p-plant">TONASA</p><br><p class="p-numb">2 & 3</p></div>
        </div>
        <div style="display: none;">
            <div class="col-xs-12 noPadding img-thumbnail" >
                <div class="row">
                    <div class="col-xs-6">
                        Silo 1
                    </div>
                    <div class="col-xs-3">
                        <span id="" style="font-weight:bold;">0.00</span>
                    </div>
                    <div class="col-xs-3">Ton</div>
                </div>

            </div>
            <div class="col-xs-12 noPadding img-thumbnail" >
                <div class="row">
                    <div class="col-xs-6">
                        Silo 2
                    </div>
                    <div class="col-xs-3">
                        <span id="" style="font-weight:bold;">0.00</span>
                    </div>
                    <div class="col-xs-3">Ton</div>
                </div>
            </div>
            <div class="col-xs-12 noPadding img-thumbnail" >
                <div class="row">
                    <div class="col-xs-6">
                        Silo 3
                    </div>
                    <div class="col-xs-3">
                        <span id="" style="font-weight:bold;">0.00</span>
                    </div>
                    <div class="col-xs-3">Ton</div>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="col-xs-4 sl_box">
                <div id="silo_tn23_1"></div>
            </div>
            <div class="col-xs-4 sl_box">
                <div id="silo_tn23_2"></div>
            </div>
            <div class="col-xs-4 sl_box">
                <div id="silo_tn23_3"></div>
            </div>
        </div>
    </div>
    <div class="col-xs-4">
        <div class="col-xs-12 noPadding plant-head" style="background-color: #62a9f9; height: 90px;"> 
            <div class="col-xs-2" style="background-color: #62a9f9; height: 90px;"> 
                <img src="media/icon/factor2.png" class="img-up">
            </div>
            <div class="col-xs-10"><p class="p-plant">TONASA</p><br><p class="p-numb">4</p></div>					
        </div>
        <div style="display: none;">
        <div class="col-xs-12 noPadding img-thumbnail" >
            <div class="row">
                <div class="col-xs-6">
                    Silo 4.1
                </div>
                <div class="col-xs-3" style="text-align:right;">
                    <span id="silo_41" style="font-weight:bold;" >0.00</span>
                </div>
                <div class="col-xs-3">% Cap</div>
            </div>
        </div>
        <div class="col-xs-12 noPadding img-thumbnail" >
            <div class="row">
                <div class="col-xs-6">
                    Silo 4.2
                </div>
                <div class="col-xs-3" style="text-align:right;">
                    <span id="silo_42" style="font-weight:bold;" >0.00</span>
                </div>
                <div class="col-xs-3">% Cap</div>
            </div>
        </div>
        <div class="col-xs-12 noPadding img-thumbnail" >
            <div class="row">
                <div class="col-xs-6">
                    Silo 4.3
                </div>
                <div class="col-xs-3" style="text-align:right;">
                    <span id="silo_43" style="font-weight:bold;" >0.00</span>
                </div>
                <div class="col-xs-3">% Cap</div>
            </div>
        </div>
        </div>
        <div class="col-xs-12 noPadding" style="overflow: hidden;">
            <div class="col-xs-4 noPadding sl_box">
                <div id="silo_tn4_1"></div>
                <div style="font-size: 20px; font-weight: bold;"><span id="meter_tn41"></span><span>&nbsp;% Cap</span></div>
            </div>
            <div class="col-xs-4 noPadding sl_box">
                <div id="silo_tn4_2"></div>
                <div style="font-size: 20px; font-weight: bold;"><span id="meter_tn42"></span><span>&nbsp;% Cap</span></div>
            </div>
            <div class="col-xs-4 noPadding sl_box">
                <div id="silo_tn4_3"></div>
                <div style="font-size: 20px; font-weight: bold;"><span id="meter_tn43"></span><span>&nbsp;% Cap</span></div>
            </div>
        </div>
    </div>
    <div class="col-xs-4">
        <div class="col-xs-12 noPadding">
            <div class="col-xs-12 noPadding plant-head" style="background-color: #f76767; height: 90px;"> 
                <div class="col-xs-2" style="background-color: #f76767; height: 90px;"> 
                    <img src="media/icon/factor2.png" class="img-up">
                </div>
                <div class="col-xs-10"><p class="p-plant">TONASA</p><br><p class="p-numb">5</p></div>					
            </div>
            <div style="display: none;">
            <div class="col-xs-12 noPadding img-thumbnail" >
                <div class="row">
                    <div class="col-xs-6">
                        Silo 5.1
                    </div>
                    <div class="col-xs-3" style="text-align:right;">
                        <span id="silo_51" style="font-weight:bold;">0.00</span>
                    </div>
                    <div class="col-xs-3">Ton</div>
                </div>						
            </div>

            <div class="col-xs-12 noPadding img-thumbnail" >
                <div class="row">
                    <div class="col-xs-6">
                        Silo 5.2
                    </div>
                    <div class="col-xs-3" style="text-align:right;">
                        <span id="silo_52" style="font-weight:bold;">0.00</span>
                    </div>
                    <div class="col-xs-3">Ton</div>
                </div>
            </div>

            <div class="col-xs-12 noPadding img-thumbnail" >
                <div class="row">
                    <div class="col-xs-6">
                        Silo 5.3
                    </div>
                    <div class="col-xs-3" style="text-align:right;">
                        <span id="silo_53" style="font-weight:bold;">0.00</span>
                    </div>
                    <div class="col-xs-3">Ton</div>
                </div>
            </div>
        </div>
        </div>
        <div class="col-xs-12 noPadding" style="overflow: hidden;">
        <div class="col-xs-4 noPadding sl_box">
            <div id="silo_tn5_1"></div>
            <div style="font-size: 20px; font-weight: bold;"><span id="meter_tn51"></span><span>&nbsp;% Cap</span></div>
        </div>
        <div class="col-xs-4 noPadding sl_box">
            <div id="silo_tn5_2"></div>
            <div style="font-size: 20px; font-weight: bold;"><span id="meter_tn52"></span><span>&nbsp;% Cap</span></div>
        </div>
        <div class="col-xs-4 noPadding sl_box">
            <div id="silo_tn5_3"></div>
            <div style="font-size: 20px; font-weight: bold;"><span id="meter_tn53"></span><span>&nbsp;% Cap</span></div>
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
                    id: 'fuelMeter41',
                    renderAt: 'silo_tn4_1',
                    width: '160',
                    height: '250',
                    dataSource: {
                        "chart": {
                            "caption": "Silo Capacity",
                            "subcaption": "Cement Tonasa 4.1",
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
                                    url: url_src + '/api/index.php/plant_tonasa/get_silo',
                                    type: 'GET',
                                    success: function (data) {
                                        var data1 = data.replace("<title>Json</title>", "");
                                        var data2 = data1.replace("(", "[");
                                        var data3 = data2.replace(");", "]");
                                        var dataJson = JSON.parse(data3);

                                        mtrSilo12 = dataJson[0].tags[6].props[0].val;
                                        fuelVolumeT = parseFloat(mtrSilo12);
                                        fuelVolume = (fuelVolumeT / 16000) * 40;
										
										var persen = (parseFloat(fuelVolumeT).toFixed(0)>100)? 100 : parseFloat(fuelVolumeT).toFixed(0);
                                        $("#meter_tn41").html(persen);
                                    }
                                }).done(function (data) {
                                }).fail(function () {

                                });
								
								var persen = (parseFloat(fuelVolumeT).toFixed(0)>100)? 100 : parseFloat(fuelVolumeT).toFixed(0);
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
                    id: 'fuelMeter42',
                    renderAt: 'silo_tn4_2',
                    width: '160',
                    height: '250',
                    dataSource: {
                        "chart": {
                            "caption": "Silo Capacity",
                            "subcaption": "Cement Tonasa 4.2",
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
                                    url: url_src + '/api/index.php/plant_tonasa/get_silo',
                                    type: 'GET',
                                    success: function (data) {
                                        var data1 = data.replace("<title>Json</title>", "");
                                        var data2 = data1.replace("(", "[");
                                        var data3 = data2.replace(");", "]");
                                        var dataJson = JSON.parse(data3);

                                        mtrSilo12 = dataJson[0].tags[7].props[0].val;
                                        fuelVolumeT = parseFloat(mtrSilo12);
                                        fuelVolume = (fuelVolumeT / 16000) * 40;

										var persen = (parseFloat(fuelVolumeT).toFixed(0)>100)? 100 : parseFloat(fuelVolumeT).toFixed(0);
                                        $("#meter_tn42").html(persen);
                                    }
                                }).done(function (data) {
                                }).fail(function () {

                                });

								var persen = (parseFloat(fuelVolumeT).toFixed(0)>100)? 100 : parseFloat(fuelVolumeT).toFixed(0);
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
                    id: 'fuelMeter43',
                    renderAt: 'silo_tn4_3',
                    width: '160',
                    height: '250',
                    dataSource: {
                        "chart": {
                            "caption": "Silo Capacity",
                            "subcaption": "Cement Tonasa 4.3",
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
                                    url: url_src + '/api/index.php/plant_tonasa/get_silo',
                                    type: 'GET',
                                    success: function (data) {
                                        var data1 = data.replace("<title>Json</title>", "");
                                        var data2 = data1.replace("(", "[");
                                        var data3 = data2.replace(");", "]");
                                        var dataJson = JSON.parse(data3);

                                        mtrSilo12 = dataJson[0].tags[8].props[0].val;
                                        fuelVolumeT = parseFloat(mtrSilo12);
                                        fuelVolume = (fuelVolumeT / 16000) * 40;

										var persen = (parseFloat(fuelVolumeT).toFixed(0)>100)? 100 : parseFloat(fuelVolumeT).toFixed(0);
                                        $("#meter_tn43").html(persen);
                                    }
                                }).done(function (data) {
                                }).fail(function () {

                                });

								var persen = (parseFloat(fuelVolumeT).toFixed(0)>100)? 100 : parseFloat(fuelVolumeT).toFixed(0);
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
                    id: 'fuelMeter51',
                    renderAt: 'silo_tn5_1',
                    width: '160',
                    height: '250',
                    dataSource: {
                        "chart": {
                            "caption": "Silo Capacity",
                            "subcaption": "Cement Tonasa 5.1",
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
                                    url: url_src + '/api/index.php/plant_tonasa/get_silo',
                                    type: 'GET',
                                    success: function (data) {
                                        var data1 = data.replace("<title>Json</title>", "");
                                        var data2 = data1.replace("(", "[");
                                        var data3 = data2.replace(");", "]");
                                        var dataJson = JSON.parse(data3);

                                        mtrSilo12 = dataJson[0].tags[3].props[0].val;
                                        fuelVolumeT = parseFloat(mtrSilo12);
                                        fuelVolume = (fuelVolumeT / 16000) * 40;
										persen = ((((parseFloat(fuelVolume).toFixed(0)/40)*100).toFixed(0))>100)? 100 : ((parseFloat(fuelVolume).toFixed(0)/40)*100).toFixed(0);
                                        $("#meter_tn51").html(persen);
                                    }
                                }).done(function (data) {
                                }).fail(function () {

                                });
								persen = ((((parseFloat(fuelVolume).toFixed(0)/40)*100).toFixed(0))>100)? 100 : ((parseFloat(fuelVolume).toFixed(0)/40)*100).toFixed(0);
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
                    id: 'fuelMeter52',
                    renderAt: 'silo_tn5_2',
                    width: '160',
                    height: '250',
                    dataSource: {
                        "chart": {
                            "caption": "Silo Capacity",
                            "subcaption": "Cement Tonasa 5.2",
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
                                    url: url_src + '/api/index.php/plant_tonasa/get_silo',
                                    type: 'GET',
                                    success: function (data) {
                                        var data1 = data.replace("<title>Json</title>", "");
                                        var data2 = data1.replace("(", "[");
                                        var data3 = data2.replace(");", "]");
                                        var dataJson = JSON.parse(data3);

                                        mtrSilo12 = dataJson[0].tags[4].props[0].val;
                                        fuelVolumeT = parseFloat(mtrSilo12);
                                        fuelVolume = (fuelVolumeT / 16000) * 40;
										persen = ((((parseFloat(fuelVolume).toFixed(0)/40)*100).toFixed(0))>100)? 100 : ((parseFloat(fuelVolume).toFixed(0)/40)*100).toFixed(0);
                                        $("#meter_tn52").html(persen);
                                    }
                                }).done(function (data) {
                                }).fail(function () {

                                });
								persen = ((((parseFloat(fuelVolume).toFixed(0)/40)*100).toFixed(0))>100)? 100 : ((parseFloat(fuelVolume).toFixed(0)/40)*100).toFixed(0);

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
                    id: 'fuelMeter53',
                    renderAt: 'silo_tn5_3',
                    width: '160',
                    height: '250',
                    dataSource: {
                        "chart": {
                            "caption": "Silo Capacity",
                            "subcaption": "Cement Tonasa 5.3",
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
                                    url: url_src + '/api/index.php/plant_tonasa/get_silo',
                                    type: 'GET',
                                    success: function (data) {
                                        var data1 = data.replace("<title>Json</title>", "");
                                        var data2 = data1.replace("(", "[");
                                        var data3 = data2.replace(");", "]");
                                        var dataJson = JSON.parse(data3);

                                        mtrSilo12 = dataJson[0].tags[5].props[0].val;
                                        fuelVolumeT = parseFloat(mtrSilo12);
                                        fuelVolume = (fuelVolumeT / 16000) * 40;
										
										persen = ((((parseFloat(fuelVolume).toFixed(0)/40)*100).toFixed(0))>100)? 100 : ((parseFloat(fuelVolume).toFixed(0)/40)*100).toFixed(0);
                                        $("#meter_tn53").html(persen);
                                    }
                                }).done(function (data) {
                                }).fail(function () {

                                });
								persen = ((((parseFloat(fuelVolume).toFixed(0)/40)*100).toFixed(0))>100)? 100 : ((parseFloat(fuelVolume).toFixed(0)/40)*100).toFixed(0);
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
            url: url_src + '/api/index.php/plant_tonasa/get_silo',
            type: 'GET',
            success: function (data) {
                var data1 = data.replace("<title>Json</title>", "");
                var data2 = data1.replace("(", "[");
                var data3 = data2.replace(");", "]");
                var dataJson = JSON.parse(data3);

                var silo_tns41 = dataJson[0].tags[6].props[0].val;
                var silo_tns42 = dataJson[0].tags[7].props[0].val;
                var silo_tns43 = dataJson[0].tags[8].props[0].val;
                
                var silo_tns51 = dataJson[0].tags[3].props[0].val;
                var silo_tns52 = dataJson[0].tags[4].props[0].val;
                var silo_tns53 = dataJson[0].tags[5].props[0].val;

                $("#silo_41").html(parseFloat(silo_tns41).toFixed(0));
                $("#silo_42").html(parseFloat(silo_tns42).toFixed(0));
                $("#silo_43").html(parseFloat(silo_tns43).toFixed(0));
                $("#silo_51").html(parseFloat(silo_tns51).toFixed(0));
                $("#silo_52").html(parseFloat(silo_tns52).toFixed(0));
                $("#silo_53").html(parseFloat(silo_tns53).toFixed(0));
            }
        }).done(function (data) {
        }).fail(function () {

        });
    }
    setInterval(dataUpdate, 1000);
</script>