<script type="text/javascript"  src="<?= base_url() ?>bootstrap/plantView/assets/js/jquery-1.11.3.min.js"></script>
<style>
    .noPadding{
        padding-top:1px;
        padding-left:1px;
        padding-right:1px;
        padding-bottom:1px;
    }
    .cubesRun{
        height:95px;
        width:100%;
    }
    .onzi{
        float: right;
        color: #fff;
        padding-top: 27px;
    }
    .onzi-up{
        float: right;
        color: #fff;
        padding-top: 11px;
    }
    .onzi-down{
        float: right;
        color: #fff;
        padding-top: 11px;
    }
    .onzi-two{
        float: right;
        color: #fff;
        padding-top: 27px;
        margin-right: -13px;
    }
    .TagName{
        font-size: 12px;
        /* font-weight: bold; */
        /* border-style: solid; */
        color: #656565;
    }
    .TagData{
        font-size: 26px;
        /*    font-weight: bold;*/
        color: #312828;
    }
    .blink_me {
        animation: blinker 1s linear infinite;
    }
    @keyframes blinker {  
        50% { opacity: 0; }
    }
    .OnPadang {
        color: #6fc962;
    }
    .OffPadang {
        color: #e54b37;
    }
    .valOPC {
        color: white;
        font-size: xx-large;
    }
    .p-plant-btg{
        font-family: Segoe UI;
        font-size: 22px;
        color: #615859;
        float: left;
        line-height: 38px;
    }
    .power_on {
        font-size: 40px;
        font-style: italic;
        font-weight: bold;
        color: #97CE68;
    }
    .power_off {
        font-size: 40px;
        font-style: italic;
        font-weight: bold;
        color: #E3000E;
    }
</style>
<script>
    $(function () {
        $('#btn_power_mon').click(function () {
            window.location.href = 'index.php/plant_tonasa/power_btg';
        });
        $('#btn_load_shed').click(function () {
            window.location.href = 'index.php/plant_tonasa/load_shed';
        });
        $('#btn_pltu_mon').click(function () {
            window.location.href = 'index.php/plant_tonasa/pltu_mon';
        });
    });
</script>
<div class="row">
    <nav class="navbar navbar-default panelup">
        <div class="container-fluid">
            <div class="navbar-header ">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h3 style="text-align: left; padding-left: 12px; margin-top: 10px;">Real Time BTG Power Distribution</h3>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="#"> <span class="sr-only">(current)</span></a></li>
                    <li>
                    </li>
                </ul>
                <form class="navbar-form navbar-left">
                    <div class="form-group">

                    </div>
                    <div class="btn-group">
                        <button class="btn btn-warning" aria-label="Left Align" id="btn_power_mon" type="button">
                            Power Monitoring
                        </button>
                        <button class="btn btn-warning" aria-label="Left Align" id="btn_load_shed" type="button">
                            Load Shedding 
                        </button>
                        <button class="btn btn-default " aria-label="Left Align" id="btn_pltu_mon" type="button">
                            PLTU Monitoring
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </nav>
</div>

<div class="row">
    <div><center><h3 style="margin-top: 0px;"><b>BTG 1A</b></h3></center></div>
    <div class="col-md-3 col-xs-6 noPadding layout1"> 
        <div class="col-xs-12 noPadding plant-head">
            <div class="col-xs-2" style="background-color: #ffa83c; height: 60px;"> 
                <img src="media/icon/button-on-off.png" class="img-up">
            </div>
            <div class="col-xs-10"><p class="p-plant-btg">STATUS</p></div>					
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-orange padding-orange-bottom" id="BTG1A_Status" >
                <div class="col-xs-12" style="text-align: center;">
                    <span class="TagData" id="BTG_DTL_PLTU_BTG1A_Status"></span></div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-xs-6 noPadding layout1" >
        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-2" style="background-color: #ffa83c; height: 90px;"> 
                <img src="media/icon/mode.png" class="img-up">
            </div>
            <div class="col-xs-10"><p class="p-plant-btg">MODE</p></div>					
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-orange padding-orange-bottom" >
                <div class="col-xs-12" style="text-align: center;">
                    <span class="TagData" id="BTG_DTL_PLTU_BTG1A_Mode"></span></div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-xs-6 noPadding layout1" >
        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-2" style="background-color: #ffa83c; height: 90px;"> 
                <img src="media/icon/energy.png" class="img-up">
            </div>
            <div class="col-xs-10"><p class="p-plant-btg">ACTUAL POWER</p></div>					
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-orange padding-orange-bottom" >
                <div class="col-xs-12" style="text-align: center;">
                    <span class="TagData" id="BTG_DTL_PLTU_BTG1A_Actual"></span></div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-xs-6 noPadding layout1" >
        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-2" style="background-color: #ffa83c; height: 90px;"> 
                <img src="media/icon/reserved.png" class="img-up">
            </div>
            <div class="col-xs-10"><p class="p-plant-btg">SPINNING RSVD</p></div>					
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-orange padding-orange-bottom" >
                <div class="col-xs-12" style="text-align: center;">
                    <span class="TagData" id="BTG_DTL_PLTU_BTG1A_Spin"></span></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div><center><h3 style="margin-top: 0px;"><b>BTG 1B</b></h3></center></div>
    <div class="col-md-3 col-xs-6 noPadding layout1" >
        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-2" style="background-color: #ffa83c; height: 90px;"> 
                <img src="media/icon/button-on-off.png" class="img-up">
            </div>
            <div class="col-xs-10"><p class="p-plant-btg">STATUS</p></div>					
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-orange padding-orange-bottom" id="BTG1B_Status">
                <div class="col-xs-12" style="text-align: center;">
                    <span class="TagData" id="BTG_DTL_PLTU_BTG1B_Status"></span></div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-xs-6 noPadding layout1" >
        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-2" style="background-color: #ffa83c; height: 90px;"> 
                <img src="media/icon/mode.png" class="img-up">
            </div>
            <div class="col-xs-10"><p class="p-plant-btg">MODE</p></div>					
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-orange padding-orange-bottom" >
                <div class="col-xs-12" style="text-align: center;">
                    <span class="TagData" id="BTG_DTL_PLTU_BTG1B_Mode"></span></div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-xs-6 noPadding layout1" >
        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-2" style="background-color: #ffa83c; height: 90px;"> 
                <img src="media/icon/energy.png" class="img-up">
            </div>
            <div class="col-xs-10"><p class="p-plant-btg">ACTUAL POWER</p></div>					
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-orange padding-orange-bottom" >
                <div class="col-xs-12" style="text-align: center;">
                    <span class="TagData" id="BTG_DTL_PLTU_BTG1B_Actual"></span></div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-xs-6 noPadding layout1" >
        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-2" style="background-color: #ffa83c; height: 90px;"> 
                <img src="media/icon/reserved.png" class="img-up">
            </div>
            <div class="col-xs-10"><p class="p-plant-btg">SPINNING RSVD</p></div>					
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-orange padding-orange-bottom" >
                <div class="col-xs-12" style="text-align: center;">
                    <span class="TagData" id="BTG_DTL_PLTU_BTG1B_Spin"></span></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div><center><h3 style="margin-top: 0px;"><b>BTG 2C</b></h3></center></div>
    <div class="col-md-3 col-xs-6 noPadding layout1" >
        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-2" style="background-color: #ffa83c; height: 90px;"> 
                <img src="media/icon/button-on-off.png" class="img-up">
            </div>
            <div class="col-xs-10"><p class="p-plant-btg">STATUS</p></div>					
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-orange padding-orange-bottom"id="BTG2C_Status" >
                <div class="col-xs-12" style="text-align: center;">
                    <span class="TagData" id="BTG_DTL_PLTU_BTG2C_Status"></span></div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-xs-6 noPadding layout1" >
        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-2" style="background-color: #ffa83c; height: 90px;"> 
                <img src="media/icon/mode.png" class="img-up">
            </div>
            <div class="col-xs-10"><p class="p-plant-btg">MODE</p></div>					
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-orange padding-orange-bottom" >
                <div class="col-xs-12" style="text-align: center;">
                    <span class="TagData" id="BTG_DTL_PLTU_BTG2C_Mode"></span></div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-xs-6 noPadding layout1" >
        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-2" style="background-color: #ffa83c; height: 90px;"> 
                <img src="media/icon/energy.png" class="img-up">
            </div>
            <div class="col-xs-10"><p class="p-plant-btg">ACTUAL POWER</p></div>					
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-orange padding-orange-bottom" >
                <div class="col-xs-12" style="text-align: center;">
                    <span class="TagData" id="BTG_DTL_PLTU_BTG2C_Actual"></span></div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-xs-6 noPadding layout1" >
        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-2" style="background-color: #ffa83c; height: 90px;"> 
                <img src="media/icon/reserved.png" class="img-up">
            </div>
            <div class="col-xs-10"><p class="p-plant-btg">SPINNING RSVD</p></div>					
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-orange padding-orange-bottom" >
                <div class="col-xs-12" style="text-align: center;">
                    <span class="TagData" id="BTG_DTL_PLTU_BTG2C_Spin"></span></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div><center><h3 style="margin-top: 0px;"><b>BTG 2D</b></h3></center></div>
    <div class="col-md-3 col-xs-6 noPadding layout1" >
        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-2" style="background-color: #ffa83c; height: 90px;"> 
                <img src="media/icon/button-on-off.png" class="img-up">
            </div>
            <div class="col-xs-10"><p class="p-plant-btg">STATUS</p></div>					
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-orange padding-orange-bottom" id="BTG2D_Status">
                <div class="col-xs-12" style="text-align: center;">
                    <span class="TagData" id="BTG_DTL_PLTU_BTG2D_Status"></span></div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-xs-6 noPadding layout1" >
        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-2" style="background-color: #ffa83c; height: 90px;"> 
                <img src="media/icon/mode.png" class="img-up">
            </div>
            <div class="col-xs-10"><p class="p-plant-btg">MODE</p></div>					
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-orange padding-orange-bottom" >
                <div class="col-xs-12" style="text-align: center;">
                    <span class="TagData" id="BTG_DTL_PLTU_BTG2D_Mode"></span></div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-xs-6 noPadding layout1" >
        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-2" style="background-color: #ffa83c; height: 90px;"> 
                <img src="media/icon/energy.png" class="img-up">
            </div>
            <div class="col-xs-10"><p class="p-plant-btg">ACTUAL POWER</p></div>					
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-orange padding-orange-bottom" >
                <div class="col-xs-12" style="text-align: center;">
                    <span class="TagData" id="BTG_DTL_PLTU_BTG2D_Actual"></span></div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-xs-6 noPadding layout1" >
        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-2" style="background-color: #ffa83c; height: 90px;"> 
                <img src="media/icon/reserved.png" class="img-up">
            </div>
            <div class="col-xs-10"><p class="p-plant-btg">SPINNING RSVD</p></div>					
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-orange padding-orange-bottom" >
                <div class="col-xs-12" style="text-align: center;">
                    <span class="TagData" id="BTG_DTL_PLTU_BTG2D_Spin"></span></div>
            </div>
        </div>
    </div>
</div>

<script>
    function dataUpdate() {
        $.ajax({
            url: 'http://par4digma.semenindonesia.com/api/index.php/plant_tonasa/get_btg_pltu',
            type: 'GET',
            success: function (data) {
                var data1 = data.replace("<title>Json</title>", "");
                var data2 = data1.replace("(", "[");
                var data3 = data2.replace(");", "]");
                var dataJson = JSON.parse(data3);

                //Value
                var BTG_DTL_PLTU_BTG1A_Actual = dataJson[0].tags[0].props[0].val;
                var BTG_DTL_PLTU_BTG1A_Mode = dataJson[0].tags[1].props[0].val;
                var BTG_DTL_PLTU_BTG1A_Spin = dataJson[0].tags[2].props[0].val;
                var BTG_DTL_PLTU_BTG1A_Status = dataJson[0].tags[3].props[0].val;
                var BTG_DTL_PLTU_BTG1B_Actual = dataJson[0].tags[4].props[0].val;
                var BTG_DTL_PLTU_BTG1B_Mode = dataJson[0].tags[5].props[0].val;
                var BTG_DTL_PLTU_BTG1B_Spin = dataJson[0].tags[6].props[0].val;
                var BTG_DTL_PLTU_BTG1B_Status = dataJson[0].tags[7].props[0].val;
                var BTG_DTL_PLTU_BTG2C_Actual = dataJson[0].tags[8].props[0].val;
                var BTG_DTL_PLTU_BTG2C_Mode = dataJson[0].tags[9].props[0].val;
                var BTG_DTL_PLTU_BTG2C_Spin = dataJson[0].tags[10].props[0].val;
                var BTG_DTL_PLTU_BTG2C_Status = dataJson[0].tags[11].props[0].val;
                var BTG_DTL_PLTU_BTG2D_Actual = dataJson[0].tags[12].props[0].val;
                var BTG_DTL_PLTU_BTG2D_Mode = dataJson[0].tags[13].props[0].val;
                var BTG_DTL_PLTU_BTG2D_Spin = dataJson[0].tags[14].props[0].val;
                var BTG_DTL_PLTU_BTG2D_Status = dataJson[0].tags[15].props[0].val;
                
                var str_statA = "";
                var str_statB = "";
                var str_statC = "";
                var str_statD = "";
                
                var str_modeA = "";
                var str_modeB = "";
                var str_modeC = "";
                var str_modeD = "";
                //Status
                if (BTG_DTL_PLTU_BTG1A_Status == '1'){
                    str_statA = "ON";
                    $("#BTG_DTL_PLTU_BTG1A_Status").addClass('power_on');
                    $("#BTG_DTL_PLTU_BTG1A_Status").removeClass('power_off');
                } else {
                    str_statA = "OFF";
                    $("#BTG_DTL_PLTU_BTG1A_Status").addClass('power_off');
                    $("#BTG_DTL_PLTU_BTG1A_Status").removeClass('power_on');
                }
                
                if (BTG_DTL_PLTU_BTG1B_Status == '1'){
                    str_statB = "ON";
                    $("#BTG_DTL_PLTU_BTG1B_Status").addClass('power_on');
                    $("#BTG_DTL_PLTU_BTG1B_Status").removeClass('power_off');
                } else {
                    str_statB = "OFF";
                    $("#BTG_DTL_PLTU_BTG1B_Status").addClass('power_off');
                    $("#BTG_DTL_PLTU_BTG1B_Status").removeClass('power_on');
                }
                
                if (BTG_DTL_PLTU_BTG2C_Status == '1'){
                    str_statC = "ON";
                    $("#BTG_DTL_PLTU_BTG2C_Status").addClass('power_on');
                    $("#BTG_DTL_PLTU_BTG2C_Status").removeClass('power_off');
                } else {
                    str_statC = "OFF";
                    $("#BTG_DTL_PLTU_BTG2C_Status").addClass('power_off');
                    $("#BTG_DTL_PLTU_BTG2C_Status").removeClass('power_on');
                }
                
                if (BTG_DTL_PLTU_BTG2D_Status == '1'){
                    str_statD = "ON";
                    $("#BTG_DTL_PLTU_BTG2D_Status").addClass('power_on');
                    $("#BTG_DTL_PLTU_BTG2D_Status").removeClass('power_off');
                } else {
                    str_statD = "OFF";
                    $("#BTG_DTL_PLTU_BTG2D_Status").addClass('power_off');
                    $("#BTG_DTL_PLTU_BTG2D_Status").removeClass('power_on');
                }
                //Mode
                if (BTG_DTL_PLTU_BTG1A_Mode == '0'){
                    str_modeA = "POWER MODE";
                } else {
                    str_modeA = "ISOCH";
                }
                
                if (BTG_DTL_PLTU_BTG1B_Mode == '0'){
                    str_modeB = "POWER MODE";
                } else {
                    str_modeB = "ISOCH";
                }
                
                if (BTG_DTL_PLTU_BTG2C_Mode == '0'){
                    str_modeC = "POWER MODE";
                } else {
                    str_modeC = "ISOCH";
                }
                
                if (BTG_DTL_PLTU_BTG2D_Mode == '0'){
                    str_modeD = "POWER MODE";
                } else {
                    str_modeD = "ISOCH";
                }

                $("#BTG_DTL_PLTU_BTG1A_Actual").html(BTG_DTL_PLTU_BTG1A_Actual);
                $("#BTG_DTL_PLTU_BTG1A_Mode").html(str_modeA);
                $("#BTG_DTL_PLTU_BTG1A_Spin").html(BTG_DTL_PLTU_BTG1A_Spin);
                $("#BTG_DTL_PLTU_BTG1A_Status").html(str_statA);
                $("#BTG_DTL_PLTU_BTG1B_Actual").html(BTG_DTL_PLTU_BTG1B_Actual);
                $("#BTG_DTL_PLTU_BTG1B_Mode").html(str_modeB);
                $("#BTG_DTL_PLTU_BTG1B_Spin").html(BTG_DTL_PLTU_BTG1B_Spin);
                $("#BTG_DTL_PLTU_BTG1B_Status").html(str_statB);
                $("#BTG_DTL_PLTU_BTG2C_Actual").html(BTG_DTL_PLTU_BTG2C_Actual);
                $("#BTG_DTL_PLTU_BTG2C_Mode").html(str_modeC);
                $("#BTG_DTL_PLTU_BTG2C_Spin").html(BTG_DTL_PLTU_BTG2C_Spin);
                $("#BTG_DTL_PLTU_BTG2C_Status").html(str_statC);
                $("#BTG_DTL_PLTU_BTG2D_Actual").html(BTG_DTL_PLTU_BTG2D_Actual);
                $("#BTG_DTL_PLTU_BTG2D_Mode").html(str_modeD);
                $("#BTG_DTL_PLTU_BTG2D_Spin").html(BTG_DTL_PLTU_BTG2D_Spin);
                $("#BTG_DTL_PLTU_BTG2D_Status").html(str_statD);
            }
        }).done(function (data) {}).fail(function () {
        });
    }
    ;
    setInterval(dataUpdate, 1000);
</script>