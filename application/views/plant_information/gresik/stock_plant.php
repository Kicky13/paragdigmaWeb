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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff ">Gresik<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= base_url() ?>index.php/plant_padang/stock">Padang</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_rembang/stock">Rembang</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="active"><a href="<?= base_url() ?>index.php/plant_gresik/stock">Gresik</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_tonasa/stock">Tonasa</a></li>
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
    <div class="col-xs-6">
        <div class="col-xs-12">
            <div class="col-xs-12 noPadding plant-head" style="background-color: #ffa83c; height: 90px;"> 
                <div class="col-xs-2" style="background-color: #ffa83c; height: 90px;"> 
                    <img src="media/icon/factor2.png" class="img-up">
                </div>
                <div class="col-xs-10"><p class="p-plant">TUBAN</p><br><p class="p-numb">1</p></div>
            </div>
            <div style="display:none;">
                <div class="col-xs-12 noPadding img-thumbnail" >
                    <div class="row">
                        <div class="col-xs-6">
                            Silo 1
                        </div>
                        <div class="col-xs-3" style="text-align:right;">
                            <span id="silo_01" style="font-weight:bold;" opc-tag-txt='{"tag":"Tuban1.Silo1_Ton.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0","int":"0","string":"{0}"},"offset":0}}'> </span>
                        </div>
                        <div class="col-xs-3">Ton</div>
                    </div>
                </div>
                <div class="col-xs-12 noPadding img-thumbnail" >
                    <div class="row">
                        <div class="col-xs-6">
                            Silo 2
                        </div>
                        <div class="col-xs-3" style="text-align:right;">
                            <span id="silo_02" style="font-weight:bold;" opc-tag-txt='{"tag":"Tuban1.Silo2_Ton.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0","int":"0","string":"{0}"},"offset":0}}'> </span>
                        </div>
                        <div class="col-xs-3">Ton</div>
                    </div>
                </div>
                <div class="col-xs-12 noPadding img-thumbnail" >
                    <div class="row">
                        <div class="col-xs-6">
                            Silo 3
                        </div>
                        <div class="col-xs-3" style="text-align:right;">
                            <span id="silo_03" style="font-weight:bold;" opc-tag-txt='{"tag":"Tuban1.Silo3_Ton.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0","int":"0","string":"{0}"},"offset":0}}'> </span>
                        </div>
                        <div class="col-xs-3">Ton</div>
                    </div>
                </div>
                <div class="col-xs-12 noPadding img-thumbnail" >
                    <div class="row">
                        <div class="col-xs-6">
                            Silo 4
                        </div>
                        <div class="col-xs-3" style="text-align:right;">
                            <span id="silo_04" style="font-weight:bold;" opc-tag-txt='{"tag":"Tuban1.Silo4_Ton.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0","int":"0","string":"{0}"},"offset":0}}'> </span>
                        </div>
                        <div class="col-xs-3">Ton</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="col-xs-3 noPadding sl_box">
                <div id="silo_tb1_1"></div>
                <div style="font-size: 20px; font-weight: bold;"><span id="meter_tb1_1"></span><span>&nbsp;% Cap</span></div>
            </div>
            <div class="col-xs-3 noPadding sl_box">
                <div id="silo_tb1_2"></div>
                <div style="font-size: 20px; font-weight: bold;"><span id="meter_tb1_2"></span><span>&nbsp;% Cap</span></div>
            </div>
            <div class="col-xs-3 noPadding sl_box">
                <div id="silo_tb1_3"></div>
                <div style="font-size: 20px; font-weight: bold;"><span id="meter_tb1_3"></span><span>&nbsp;% Cap</span></div>
            </div>
            <div class="col-xs-3 noPadding sl_box">
                <div id="silo_tb1_4"></div>
                <div style="font-size: 20px; font-weight: bold;"><span id="meter_tb1_4"></span><span>&nbsp;% Cap</span></div>
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="col-xs-12">
            <div class="col-xs-12 noPadding plant-head" style="background-color: #53d0c0; height: 90px;"> 
                <div class="col-xs-2" style="background-color: #53d0c0; height: 90px;"> 
                    <img src="media/icon/factor2.png" class="img-up">
                </div>
                <div class="col-xs-10"><p class="p-plant">TUBAN</p><br><p class="p-numb">2</p></div>					
            </div>
            <div style="display: none;">
                <div class="col-xs-12 noPadding img-thumbnail" >
                    <div class="row">
                        <div class="col-xs-6">
                            Silo 5
                        </div>
                        <div class="col-xs-3" style="text-align:right;">
                            <span id="silo_05" style="font-weight:bold;" opc-tag-txt='{"tag":"Tuban2.Silo5_Ton.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0","int":"0","string":"{0}"},"offset":0}}'> </span>
                        </div>
                        <div class="col-xs-3">Ton</div>
                    </div>
                </div>
                <div class="col-xs-12 noPadding img-thumbnail" >
                    <div class="row">
                        <div class="col-xs-6">
                            Silo 6
                        </div>
                        <div class="col-xs-3" style="text-align:right;">
                            <span id="silo_06" style="font-weight:bold;" opc-tag-txt='{"tag":"Tuban2.Silo6_Ton.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0","int":"0","string":"{0}"},"offset":0}}'> </span>
                        </div>
                        <div class="col-xs-3">Ton</div>
                    </div>
                </div>
                <div class="col-xs-12 noPadding img-thumbnail" >
                    <div class="row">
                        <div class="col-xs-6">
                            Silo 7
                        </div>
                        <div class="col-xs-3" style="text-align:right;">
                            <span id="silo_07" style="font-weight:bold;" opc-tag-txt='{"tag":"Tuban2.Silo7_Ton.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0","int":"0","string":"{0}"},"offset":0}}'> </span>
                        </div>
                        <div class="col-xs-3">Ton</div>
                    </div>
                </div>
                <div class="col-xs-12 noPadding img-thumbnail" >
                    <div class="row">
                        <div class="col-xs-6">
                            Silo 8
                        </div>
                        <div class="col-xs-3" style="text-align:right;">
                            <span id="silo_08" style="font-weight:bold;" opc-tag-txt='{"tag":"Tuban2.Silo8_Ton.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0","int":"0","string":"{0}"},"offset":0}}'> </span>
                        </div>
                        <div class="col-xs-3">Ton</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="col-xs-3 noPadding sl_box">
                <div id="silo_tb2_1"></div>
                <div style="font-size: 20px; font-weight: bold;"><span id="meter_tb2_1"></span><span>&nbsp;% Cap</span></div>
            </div>
            <div class="col-xs-3 noPadding sl_box">
                <div id="silo_tb2_2"></div>
                <div style="font-size: 20px; font-weight: bold;"><span id="meter_tb2_2"></span><span>&nbsp;% Cap</span></div>
            </div>
            <div class="col-xs-3 noPadding sl_box">
                <div id="silo_tb2_3"></div>
                <div style="font-size: 20px; font-weight: bold;"><span id="meter_tb2_3"></span><span>&nbsp;% Cap</span></div>
            </div>
            <div class="col-xs-3 noPadding sl_box">
                <div id="silo_tb2_4"></div>
                <div style="font-size: 20px; font-weight: bold;"><span id="meter_tb2_4"></span><span>&nbsp;% Cap</span></div>
            </div>
        </div>
    </div>
    <div class="col-xs-12" style="height:5px;"></div>
    <div class="col-xs-6">
        <div class="col-xs-12">
            <div class="col-xs-12 noPadding plant-head" style="background-color: #62a9f9; height: 90px;">
                <div class="col-xs-2" style="background-color: #62a9f9; height: 90px;"> 
                    <img src="media/icon/factor2.png" class="img-up">
                </div>
                <div class="col-xs-10"><p class="p-plant">TUBAN</p><br><p class="p-numb">3</p></div>					
            </div>
            <div style="display:none;">
                <div class="col-xs-12 noPadding img-thumbnail" >
                    <div class="row">
                        <div class="col-xs-6">
                            Silo 9
                        </div>
                        <div class="col-xs-3" style="text-align:right;">
                            <span id="silo_09" style="font-weight:bold;" 
                                  opc-tag-txt='{"tag":"Silo_Tuban_09.Value","config":{"formats":{"bad_q":"connecting..","bool_f":"False","bool_t":"True","float":"0","int":"0","string":"{0}"},"offset":0}}'
                                  > </span>
                        </div>
                        <div class="col-xs-3">Ton</div>
                    </div>
                </div>
                <div class="col-xs-12 noPadding img-thumbnail" >
                    <div class="row">
                        <div class="col-xs-6">
                            Silo 10
                        </div>
                        <div class="col-xs-3" style="text-align:right;">
                            <span id="silo_10" style="font-weight:bold;" 
                                  opc-tag-txt='{"tag":"Silo_Tuban_10.Value","config":{"formats":{"bad_q":"connecting..","bool_f":"False","bool_t":"True","float":"0","int":"0","string":"{0}"},"offset":0}}'
                                  > </span>
                        </div>
                        <div class="col-xs-3">Ton</div>
                    </div>
                </div>
                <div class="col-xs-12 noPadding img-thumbnail" >
                    <div class="row">
                        <div class="col-xs-6">
                            Silo 11
                        </div>
                        <div class="col-xs-3" style="text-align:right;">
                            <span id="silo_11" style="font-weight:bold;" 
                                  opc-tag-txt='{"tag":"Silo_Tuban_11.Value","config":{"formats":{"bad_q":"connecting..","bool_f":"False","bool_t":"True","float":"0","int":"0","string":"{0}"},"offset":0}}'
                                  > </span>
                        </div>
                        <div class="col-xs-3">Ton</div>
                    </div>
                </div>
                <div class="col-xs-12 noPadding img-thumbnail" >
                    <div class="row">
                        <div class="col-xs-6">
                            Silo 12
                        </div>
                        <div class="col-xs-3" style="text-align:right;">
                            <span id="silo_12" style="font-weight:bold;" 
                                  opc-tag-txt='{"tag":"Silo_Tuban_12.Value","config":{"formats":{"bad_q":"connecting..","bool_f":"False","bool_t":"True","float":"0","int":"0","string":"{0}"},"offset":0}}'
                                  > </span>
                        </div>
                        <div class="col-xs-3">Ton</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="col-xs-3 noPadding sl_box">
                <div id="silo_tb3_1"></div>
                <div style="font-size: 20px; font-weight: bold;"><span id="meter_tb3_1"></span><span>&nbsp;% Cap</span></div>
            </div>
            <div class="col-xs-3 noPadding sl_box">
                <div id="silo_tb3_2"></div>
                <div style="font-size: 20px; font-weight: bold;"><span id="meter_tb3_2"></span><span>&nbsp;% Cap</span></div>
            </div>
            <div class="col-xs-3 noPadding sl_box">
                <div id="silo_tb3_3"></div>
                <div style="font-size: 20px; font-weight: bold;"><span id="meter_tb3_3"></span><span>&nbsp;% Cap</span></div>
            </div>
            <div class="col-xs-3 noPadding sl_box">
                <div id="silo_tb3_4"></div>
                <div style="font-size: 20px; font-weight: bold;"><span id="meter_tb3_4"></span><span>&nbsp;% Cap</span></div>
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="col-xs-12">
            <div class="col-xs-12 noPadding plant-head" style="background-color: #f76767; height: 90px;"> 
                <div class="col-xs-2" style="background-color: #f76767; height: 90px;"> 
                    <img src="media/icon/factor2.png" class="img-up">
                </div>
                <div class="col-xs-10"><p class="p-plant">TUBAN</p><br><p class="p-numb">4</p></div>					
            </div>
            <div style="display:none;">
                <div class="col-xs-12 noPadding img-thumbnail" >
                    <div class="row">
                        <div class="col-xs-6">
                            Silo 13
                        </div>
                        <div class="col-xs-3" style="text-align:right;">
                            <span id="silo_13" style="font-weight:bold;" 
                                  opc-tag-txt='{"tag":"Silo_Tuban_13.Value","config":{"formats":{"bad_q":"connecting..","bool_f":"False","bool_t":"True","float":"0","int":"0","string":"{0}"},"offset":0}}'
                                  > </span>
                        </div>
                        <div class="col-xs-3">Ton</div>
                    </div>						
                </div>
                <div class="col-xs-12 noPadding img-thumbnail" >
                    <div class="row">
                        <div class="col-xs-6">
                            Silo 14
                        </div>
                        <div class="col-xs-3" style="text-align:right;">
                            <span id="silo_14" style="font-weight:bold;" 
                                  opc-tag-txt='{"tag":"Silo_Tuban_14.Value","config":{"formats":{"bad_q":"connecting..","bool_f":"False","bool_t":"True","float":"0","int":"0","string":"{0}"},"offset":0}}'> </span>
                        </div>
                        <div class="col-xs-3">Ton</div>
                    </div>
                </div>
                <div class="col-xs-12 noPadding img-thumbnail" >
                    <div class="row">
                        <div class="col-xs-6">
                            Silo 15
                        </div>
                        <div class="col-xs-3" style="text-align:right;">
                            <span id="silo_15" style="font-weight:bold;" 
                                  opc-tag-txt='{"tag":"Silo_Tuban_15.Value","config":{"formats":{"bad_q":"connecting..","bool_f":"False","bool_t":"True","float":"0","int":"0","string":"{0}"},"offset":0}}'
                                  > </span>
                        </div>
                        <div class="col-xs-3">Ton</div>
                    </div>
                </div>
                <div class="col-xs-12 noPadding img-thumbnail" >
                    <div class="row">
                        <div class="col-xs-6">
                            Silo 16
                        </div>
                        <div class="col-xs-3" style="text-align:right;">
                            <span  id="silo_16" style="font-weight:bold;" 
                                   opc-tag-txt='{"tag":"Silo_Tuban_16.Value","config":{"formats":{"bad_q":"connecting..","bool_f":"False","bool_t":"True","float":"0","int":"0","string":"{0}"},"offset":0}}'
                                   > </span>
                        </div>
                        <div class="col-xs-3">Ton</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="col-xs-3 noPadding sl_box">
                <div id="silo_tb4_1"></div>
                <div style="font-size: 20px; font-weight: bold;"><span id="meter_tb4_1"></span><span>&nbsp;% Cap</span></div>
            </div>
            <div class="col-xs-3 noPadding sl_box">
                <div id="silo_tb4_2"></div>
                <div style="font-size: 20px; font-weight: bold;"><span id="meter_tb4_2"></span><span>&nbsp;% Cap</span></div>
            </div>
            <div class="col-xs-3 noPadding sl_box">
                <div id="silo_tb4_3"></div>
                <div style="font-size: 20px; font-weight: bold;"><span id="meter_tb4_3"></span><span>&nbsp;% Cap</span></div>
            </div>
            <div class="col-xs-3 noPadding sl_box">
                <div id="silo_tb4_4"></div>
                <div style="font-size: 20px; font-weight: bold;"><span id="meter_tb4_4"></span><span>&nbsp;% Cap</span></div>
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
        var fuelVolume = 110,
                fuelWidget = new FusionCharts({
                    type: 'cylinder',
                    dataFormat: 'json',
                    id: 'fuelMeter11',
                    renderAt: 'silo_tb1_1',
                    width: '160',
                    height: '250',
                    dataSource: {
                        "chart": {
                            "caption": "Silo Capacity",
                            "subcaption": "Cement Tuban 1.1",
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
                                    url: url_src + '/api/index.php/plant_tuban/get_silotb12',
                                    type: 'GET',
                                    success: function (data) {
                                        var data1 = data.replace("<title>Json</title>", "");
                                        var data2 = data1.replace("(", "[");
                                        var data3 = data2.replace(");", "]");
                                        var dataJson = JSON.parse(data3);

                                        mtrSilo12 = dataJson[0].tags[6].props[0].val;
                                        fuelVolumeT = parseFloat(mtrSilo12);
                                        fuelVolume = (fuelVolumeT / 16000) * 40;
										
										var persen = (((fuelVolume/40)*100).toFixed(0)>100)? 100 : ((fuelVolume/40)*100).toFixed(0);
                                        $("#meter_tb1_1").html(persen);
                                    }
                                }).done(function (data) {
                                }).fail(function () {

                                });
								var persen = (((fuelVolume/40)*100).toFixed(0)>100)? 100 : ((fuelVolume/40)*100).toFixed(0);
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
        var fuelVolume = 110,
                fuelWidget = new FusionCharts({
                    type: 'cylinder',
                    dataFormat: 'json',
                    id: 'fuelMeter12',
                    renderAt: 'silo_tb1_2',
                    width: '160',
                    height: '250',
                    dataSource: {
                        "chart": {
                            "caption": "Silo Capacity",
                            "subcaption": "Cement Tuban 1.2",
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
                                    url: url_src + '/api/index.php/plant_tuban/get_silotb12',
                                    type: 'GET',
                                    success: function (data) {
                                        var data1 = data.replace("<title>Json</title>", "");
                                        var data2 = data1.replace("(", "[");
                                        var data3 = data2.replace(");", "]");
                                        var dataJson = JSON.parse(data3);

                                        mtrSilo12 = dataJson[0].tags[4].props[0].val;
                                        fuelVolumeT = parseFloat(mtrSilo12);
                                        fuelVolume = (fuelVolumeT / 16000) * 40;
										
										var persen = (((fuelVolume/40)*100).toFixed(0)>100)? 100 : ((fuelVolume/40)*100).toFixed(0);
                                        $("#meter_tb1_2").html(persen);
                                    }
                                }).done(function (data) {
                                }).fail(function () {

                                });
								
								var persen = (((fuelVolume/40)*100).toFixed(0)>100)? 100 : ((fuelVolume/40)*100).toFixed(0);
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
        var fuelVolume = 110,
                fuelWidget = new FusionCharts({
                    type: 'cylinder',
                    dataFormat: 'json',
                    id: 'fuelMeter13',
                    renderAt: 'silo_tb1_3',
                    width: '160',
                    height: '250',
                    dataSource: {
                        "chart": {
                            "caption": "Silo Capacity",
                            "subcaption": "Cement Tuban 1.3",
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
                                    url: url_src + '/api/index.php/plant_tuban/get_silotb12',
                                    type: 'GET',
                                    success: function (data) {
                                        var data1 = data.replace("<title>Json</title>", "");
                                        var data2 = data1.replace("(", "[");
                                        var data3 = data2.replace(");", "]");
                                        var dataJson = JSON.parse(data3);

                                        mtrSilo12 = dataJson[0].tags[7].props[0].val;
                                        fuelVolumeT = parseFloat(mtrSilo12);
                                        fuelVolume = (fuelVolumeT / 16000) * 40;
										
										var persen = (((fuelVolume/40)*100).toFixed(0)>100)? 100 : ((fuelVolume/40)*100).toFixed(0);
                                        $("#meter_tb1_3").html(persen);
                                    }
                                }).done(function (data) {
                                }).fail(function () {

                                });
								
								var persen = (((fuelVolume/40)*100).toFixed(0)>100)? 100 : ((fuelVolume/40)*100).toFixed(0);
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
        var fuelVolume = 110,
                fuelWidget = new FusionCharts({
                    type: 'cylinder',
                    dataFormat: 'json',
                    id: 'fuelMeter14',
                    renderAt: 'silo_tb1_4',
                    width: '160',
                    height: '250',
                    dataSource: {
                        "chart": {
                            "caption": "Silo Capacity",
                            "subcaption": "Cement Tuban 1.4",
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
                                    url: url_src + '/api/index.php/plant_tuban/get_silotb12',
                                    type: 'GET',
                                    success: function (data) {
                                        var data1 = data.replace("<title>Json</title>", "");
                                        var data2 = data1.replace("(", "[");
                                        var data3 = data2.replace(");", "]");
                                        var dataJson = JSON.parse(data3);

                                        mtrSilo12 = dataJson[0].tags[5].props[0].val;
                                        fuelVolumeT = parseFloat(mtrSilo12);
                                        fuelVolume = (fuelVolumeT / 16000) * 40;
										
										var persen = (((fuelVolume/40)*100).toFixed(0)>100)? 100 : ((fuelVolume/40)*100).toFixed(0);
                                        $("#meter_tb1_4").html(persen);
                                    }
                                }).done(function (data) {
                                }).fail(function () {

                                });
								
								var persen = (((fuelVolume/40)*100).toFixed(0)>100)? 100 : ((fuelVolume/40)*100).toFixed(0);
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
        var fuelVolume = 110,
                fuelWidget = new FusionCharts({
                    type: 'cylinder',
                    dataFormat: 'json',
                    id: 'fuelMeter21',
                    renderAt: 'silo_tb2_1',
                    width: '160',
                    height: '250',
                    dataSource: {
                        "chart": {
                            "caption": "Silo Capacity",
                            "subcaption": "Cement Tuban 2.1",
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
                                    url: url_src + '/api/index.php/plant_tuban/get_silotb12',
                                    type: 'GET',
                                    success: function (data) {
                                        var data1 = data.replace("<title>Json</title>", "");
                                        var data2 = data1.replace("(", "[");
                                        var data3 = data2.replace(");", "]");
                                        var dataJson = JSON.parse(data3);

                                        mtrSilo12 = dataJson[0].tags[1].props[0].val;
                                        fuelVolumeT = parseFloat(mtrSilo12);
                                        fuelVolume = (fuelVolumeT / 16000) * 40;
										
										var persen = (((fuelVolume/40)*100).toFixed(0)>100)? 100 : ((fuelVolume/40)*100).toFixed(0);
                                        $("#meter_tb2_1").html(persen);
                                    }
                                }).done(function (data) {
                                }).fail(function () {

                                });
								
								var persen = (((fuelVolume/40)*100).toFixed(0)>100)? 100 : ((fuelVolume/40)*100).toFixed(0);
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
        var fuelVolume = 110,
                fuelWidget = new FusionCharts({
                    type: 'cylinder',
                    dataFormat: 'json',
                    id: 'fuelMeter22',
                    renderAt: 'silo_tb2_2',
                    width: '160',
                    height: '250',
                    dataSource: {
                        "chart": {
                            "caption": "Silo Capacity",
                            "subcaption": "Cement Tuban 2.2",
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
                                    url: url_src + '/api/index.php/plant_tuban/get_silotb12',
                                    type: 'GET',
                                    success: function (data) {
                                        var data1 = data.replace("<title>Json</title>", "");
                                        var data2 = data1.replace("(", "[");
                                        var data3 = data2.replace(");", "]");
                                        var dataJson = JSON.parse(data3);

                                        mtrSilo12 = dataJson[0].tags[0].props[0].val;
                                        fuelVolumeT = parseFloat(mtrSilo12);
                                        fuelVolume = (fuelVolumeT / 16000) * 40;
										
										var persen = (((fuelVolume/40)*100).toFixed(0)>100)? 100 : ((fuelVolume/40)*100).toFixed(0);
                                        $("#meter_tb2_2").html(persen);
                                    }
                                }).done(function (data) {
                                }).fail(function () {

                                });
								
								var persen = (((fuelVolume/40)*100).toFixed(0)>100)? 100 : ((fuelVolume/40)*100).toFixed(0);
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
        var fuelVolume = 110,
                fuelWidget = new FusionCharts({
                    type: 'cylinder',
                    dataFormat: 'json',
                    id: 'fuelMeter23',
                    renderAt: 'silo_tb2_3',
                    width: '160',
                    height: '250',
                    dataSource: {
                        "chart": {
                            "caption": "Silo Capacity",
                            "subcaption": "Cement Tuban 2.3",
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
                                    url: url_src + '/api/index.php/plant_tuban/get_silotb12',
                                    type: 'GET',
                                    success: function (data) {
                                        var data1 = data.replace("<title>Json</title>", "");
                                        var data2 = data1.replace("(", "[");
                                        var data3 = data2.replace(");", "]");
                                        var dataJson = JSON.parse(data3);

                                        mtrSilo12 = dataJson[0].tags[2].props[0].val;
                                        fuelVolumeT = parseFloat(mtrSilo12);
                                        fuelVolume = (fuelVolumeT / 16000) * 40;
										
										var persen = (((fuelVolume/40)*100).toFixed(0)>100)? 100 : ((fuelVolume/40)*100).toFixed(0);
                                        $("#meter_tb2_3").html(persen);
                                    }
                                }).done(function (data) {
                                }).fail(function () {

                                });
								
								var persen = (((fuelVolume/40)*100).toFixed(0)>100)? 100 : ((fuelVolume/40)*100).toFixed(0);
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
        var fuelVolume = 110,
                fuelWidget = new FusionCharts({
                    type: 'cylinder',
                    dataFormat: 'json',
                    id: 'fuelMeter24',
                    renderAt: 'silo_tb2_4',
                    width: '160',
                    height: '250',
                    dataSource: {
                        "chart": {
                            "caption": "Silo Capacity",
                            "subcaption": "Cement Tuban 2.4",
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
                                    url: url_src + '/api/index.php/plant_tuban/get_silotb12',
                                    type: 'GET',
                                    success: function (data) {
                                        var data1 = data.replace("<title>Json</title>", "");
                                        var data2 = data1.replace("(", "[");
                                        var data3 = data2.replace(");", "]");
                                        var dataJson = JSON.parse(data3);

                                        mtrSilo12 = dataJson[0].tags[3].props[0].val;
                                        fuelVolumeT = parseFloat(mtrSilo12);
                                        fuelVolume = (fuelVolumeT / 16000) * 40;
										
										var persen = (((fuelVolume/40)*100).toFixed(0)>100)? 100 : ((fuelVolume/40)*100).toFixed(0);
                                        $("#meter_tb2_4").html(persen);
                                    }
                                }).done(function (data) {
                                }).fail(function () {

                                });
								
								var persen = (((fuelVolume/40)*100).toFixed(0)>100)? 100 : ((fuelVolume/40)*100).toFixed(0);
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
        var fuelVolume = 110,
                fuelWidget = new FusionCharts({
                    type: 'cylinder',
                    dataFormat: 'json',
                    id: 'fuelMeter31',
                    renderAt: 'silo_tb3_1',
                    width: '160',
                    height: '250',
                    dataSource: {
                        "chart": {
                            "caption": "Silo Capacity",
                            "subcaption": "Cement Tuban 3.1",
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
                                    url: url_src + '/api/index.php/plant_tuban/get_silo',
                                    type: 'GET',
                                    success: function (data) {
                                        var data1 = data.replace("<title>Json</title>", "");
                                        var data2 = data1.replace("(", "[");
                                        var data3 = data2.replace(");", "]");
                                        var dataJson = JSON.parse(data3);

                                        mtrSilo12 = dataJson[0].tags[0].props[0].val;
                                        fuelVolumeT = parseFloat(mtrSilo12);
                                        fuelVolume = (fuelVolumeT / 16000) * 40;
										
										var persen = (((fuelVolume/40)*100).toFixed(0)>100)? 100 : ((fuelVolume/40)*100).toFixed(0);
                                        $("#meter_tb3_1").html(persen);
                                    }
                                }).done(function (data) {
                                }).fail(function () {

                                });
								
								var persen = (((fuelVolume/40)*100).toFixed(0)>100)? 100 : ((fuelVolume/40)*100).toFixed(0);
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
        var fuelVolume = 110,
                fuelWidget = new FusionCharts({
                    type: 'cylinder',
                    dataFormat: 'json',
                    id: 'fuelMeter32',
                    renderAt: 'silo_tb3_2',
                    width: '160',
                    height: '250',
                    dataSource: {
                        "chart": {
                            "caption": "Silo Capacity",
                            "subcaption": "Cement Tuban 3.2",
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
                                    url: url_src + '/api/index.php/plant_tuban/get_silo',
                                    type: 'GET',
                                    success: function (data) {
                                        var data1 = data.replace("<title>Json</title>", "");
                                        var data2 = data1.replace("(", "[");
                                        var data3 = data2.replace(");", "]");
                                        var dataJson = JSON.parse(data3);

                                        mtrSilo12 = dataJson[0].tags[1].props[0].val;
                                        fuelVolumeT = parseFloat(mtrSilo12);
                                        fuelVolume = (fuelVolumeT / 16000) * 40;
										
										var persen = (((fuelVolume/40)*100).toFixed(0)>100)? 100 : ((fuelVolume/40)*100).toFixed(0);
                                        $("#meter_tb3_2").html(persen);
                                    }
                                }).done(function (data) {
                                }).fail(function () {

                                });
								
								var persen = (((fuelVolume/40)*100).toFixed(0)>100)? 100 : ((fuelVolume/40)*100).toFixed(0);
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
        var fuelVolume = 110,
                fuelWidget = new FusionCharts({
                    type: 'cylinder',
                    dataFormat: 'json',
                    id: 'fuelMeter33',
                    renderAt: 'silo_tb3_3',
                    width: '160',
                    height: '250',
                    dataSource: {
                        "chart": {
                            "caption": "Silo Capacity",
                            "subcaption": "Cement Tuban 3.3",
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
                                    url: url_src + '/api/index.php/plant_tuban/get_silo',
                                    type: 'GET',
                                    success: function (data) {
                                        var data1 = data.replace("<title>Json</title>", "");
                                        var data2 = data1.replace("(", "[");
                                        var data3 = data2.replace(");", "]");
                                        var dataJson = JSON.parse(data3);

                                        mtrSilo12 = dataJson[0].tags[2].props[0].val;
                                        fuelVolumeT = parseFloat(mtrSilo12);
                                        fuelVolume = (fuelVolumeT / 16000) * 40;
										
										var persen = (((fuelVolume/40)*100).toFixed(0)>100)? 100 : ((fuelVolume/40)*100).toFixed(0);
                                        $("#meter_tb3_3").html(persen);
                                    }
                                }).done(function (data) {
                                }).fail(function () {

                                });
								
								var persen = (((fuelVolume/40)*100).toFixed(0)>100)? 100 : ((fuelVolume/40)*100).toFixed(0);
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
        var fuelVolume = 110,
                fuelWidget = new FusionCharts({
                    type: 'cylinder',
                    dataFormat: 'json',
                    id: 'fuelMeter34',
                    renderAt: 'silo_tb3_4',
                    width: '160',
                    height: '250',
                    dataSource: {
                        "chart": {
                            "caption": "Silo Capacity",
                            "subcaption": "Cement Tuban 3.4",
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
                                    url: url_src + '/api/index.php/plant_tuban/get_silo',
                                    type: 'GET',
                                    success: function (data) {
                                        var data1 = data.replace("<title>Json</title>", "");
                                        var data2 = data1.replace("(", "[");
                                        var data3 = data2.replace(");", "]");
                                        var dataJson = JSON.parse(data3);

                                        mtrSilo12 = dataJson[0].tags[3].props[0].val;
                                        fuelVolumeT = parseFloat(mtrSilo12);
                                        fuelVolume = (fuelVolumeT / 16000) * 40;
										
										var persen = (((fuelVolume/40)*100).toFixed(0)>100)? 100 : ((fuelVolume/40)*100).toFixed(0);
                                        $("#meter_tb3_4").html(persen);
                                    }
                                }).done(function (data) {
                                }).fail(function () {

                                });
								
								var persen = (((fuelVolume/40)*100).toFixed(0)>100)? 100 : ((fuelVolume/40)*100).toFixed(0);
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
        var fuelVolume = 110,
                fuelWidget = new FusionCharts({
                    type: 'cylinder',
                    dataFormat: 'json',
                    id: 'fuelMeter41',
                    renderAt: 'silo_tb4_1',
                    width: '160',
                    height: '250',
                    dataSource: {
                        "chart": {
                            "caption": "Silo Capacity",
                            "subcaption": "Cement Tuban 4.1",
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
                                    url: url_src + '/api/index.php/plant_tuban/get_silo',
                                    type: 'GET',
                                    success: function (data) {
                                        var data1 = data.replace("<title>Json</title>", "");
                                        var data2 = data1.replace("(", "[");
                                        var data3 = data2.replace(");", "]");
                                        var dataJson = JSON.parse(data3);

                                        mtrSilo12 = dataJson[0].tags[4].props[0].val;
                                        fuelVolumeT = parseFloat(mtrSilo12);
                                        fuelVolume = (fuelVolumeT / 16000) * 40;
										
										var persen = (((fuelVolume/40)*100).toFixed(0)>100)? 100 : ((fuelVolume/40)*100).toFixed(0);
                                        $("#meter_tb4_1").html(persen);
                                    }
                                }).done(function (data) {
                                }).fail(function () {

                                });
								
								var persen = (((fuelVolume/40)*100).toFixed(0)>100)? 100 : ((fuelVolume/40)*100).toFixed(0);
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
        var fuelVolume = 110,
                fuelWidget = new FusionCharts({
                    type: 'cylinder',
                    dataFormat: 'json',
                    id: 'fuelMeter42',
                    renderAt: 'silo_tb4_2',
                    width: '160',
                    height: '250',
                    dataSource: {
                        "chart": {
                            "caption": "Silo Capacity",
                            "subcaption": "Cement Tuban 4.2",
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
                                    url: url_src + '/api/index.php/plant_tuban/get_silo',
                                    type: 'GET',
                                    success: function (data) {
                                        var data1 = data.replace("<title>Json</title>", "");
                                        var data2 = data1.replace("(", "[");
                                        var data3 = data2.replace(");", "]");
                                        var dataJson = JSON.parse(data3);

                                        mtrSilo12 = dataJson[0].tags[5].props[0].val;
                                        fuelVolumeT = parseFloat(mtrSilo12);
                                        fuelVolume = (fuelVolumeT / 16000) * 40;
										
										var persen = (((fuelVolume/40)*100).toFixed(0)>100)? 100 : ((fuelVolume/40)*100).toFixed(0);
                                        $("#meter_tb4_2").html(persen);
                                    }
                                }).done(function (data) {
                                }).fail(function () {

                                });
								
								var persen = (((fuelVolume/40)*100).toFixed(0)>100)? 100 : ((fuelVolume/40)*100).toFixed(0);
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
        var fuelVolume = 110,
                fuelWidget = new FusionCharts({
                    type: 'cylinder',
                    dataFormat: 'json',
                    id: 'fuelMeter43',
                    renderAt: 'silo_tb4_3',
                    width: '160',
                    height: '250',
                    dataSource: {
                        "chart": {
                            "caption": "Silo Capacity",
                            "subcaption": "Cement Tuban 4.3",
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
                                    url: url_src + '/api/index.php/plant_tuban/get_silo',
                                    type: 'GET',
                                    success: function (data) {
                                        var data1 = data.replace("<title>Json</title>", "");
                                        var data2 = data1.replace("(", "[");
                                        var data3 = data2.replace(");", "]");
                                        var dataJson = JSON.parse(data3);

                                        mtrSilo12 = dataJson[0].tags[6].props[0].val;
                                        fuelVolumeT = parseFloat(mtrSilo12);
                                        fuelVolume = (fuelVolumeT / 16000) * 40;
										
										var persen = (((fuelVolume/40)*100).toFixed(0)>100)? 100 : ((fuelVolume/40)*100).toFixed(0);
                                        $("#meter_tb4_3").html(persen);
                                    }
                                }).done(function (data) {
                                }).fail(function () {

                                });
								
								var persen = (((fuelVolume/40)*100).toFixed(0)>100)? 100 : ((fuelVolume/40)*100).toFixed(0);
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
        var fuelVolume = 110,
                fuelWidget = new FusionCharts({
                    type: 'cylinder',
                    dataFormat: 'json',
                    id: 'fuelMeter44',
                    renderAt: 'silo_tb4_4',
                    width: '160',
                    height: '250',
                    dataSource: {
                        "chart": {
                            "caption": "Silo Capacity",
                            "subcaption": "Cement Tuban 4.4",
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
                                    url: url_src + '/api/index.php/plant_tuban/get_silo',
                                    type: 'GET',
                                    success: function (data) {
                                        var data1 = data.replace("<title>Json</title>", "");
                                        var data2 = data1.replace("(", "[");
                                        var data3 = data2.replace(");", "]");
                                        var dataJson = JSON.parse(data3);

                                        mtrSilo12 = dataJson[0].tags[7].props[0].val;
                                        fuelVolumeT = parseFloat(mtrSilo12);
                                        fuelVolume = (fuelVolumeT / 16000) * 40;
										persen = ((((fuelVolume/40)*100).toFixed(0))>100)? 100 : ((fuelVolume/40)*100).toFixed(0);
                                        $("#meter_tb4_4").html(persen);
                                    }
                                }).done(function (data) {
                                }).fail(function () {
									
                                });

								persen = ((((fuelVolume/40)*100).toFixed(0))>100)? 100 : ((fuelVolume/40)*100).toFixed(0);
                                gaugeRef.feedData("&value=" + persen);
                            }, 500);
                        },
                        "disposed": function (evt, arg) {
                            clearInterval(evt.sender.chartInterval);
                        }
                    }
                }).render();
    });
</script>



