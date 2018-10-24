<script type="text/javascript"  src="<?= base_url() ?>bootstrap/plantView/assets/js/jquery-1.11.3.min.js"></script>
<style>
    /*@import url('http://getbootstrap.com/dist/css/bootstrap.css');*/
    html, body, .container-table {
        height: 100%;
    }
    .container-table {
        display: table;
    }
    .vertical-center-row {
        display: table-cell;
        vertical-align: middle;
    }
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
        /*color: #312828;*/
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
</style>
<script>
    function dataUpdate() {
        $.ajax({
            url: 'http://par4digma.semenindonesia.com/api/index.php/plant_rembang/get_packer_machine',
            type: 'GET',
            success: function (data) {
                var data1 = data.replace("<title>Json</title>", "");
                var data2 = data1.replace("(", "[");
                var data3 = data2.replace(");", "]");
                var dataJson = JSON.parse(data3);

                //Value
                var pm01_bag_rel = parseFloat(dataJson[0].tags[0].props[0].val).toFixed(0);
                var pm02_bag_rel = parseFloat(dataJson[0].tags[8].props[0].val).toFixed(0);
                var pm03_bag_rel = parseFloat(dataJson[0].tags[16].props[0].val).toFixed(0);
                var pm04_bag_rel = parseFloat(dataJson[0].tags[24].props[0].val).toFixed(0);

                var pm01_ops_hr = parseFloat(dataJson[0].tags[2].props[0].val).toFixed(2);
                var pm02_ops_hr = parseFloat(dataJson[0].tags[10].props[0].val).toFixed(2);
                var pm03_ops_hr = parseFloat(dataJson[0].tags[18].props[0].val).toFixed(2);
                var pm04_ops_hr = parseFloat(dataJson[0].tags[26].props[0].val).toFixed(2);
                
                
                var pm01_rdy_hr = parseFloat(dataJson[0].tags[5].props[0].val).toFixed(2);
                var pm02_rdy_hr = parseFloat(dataJson[0].tags[13].props[0].val).toFixed(2);
                var pm03_rdy_hr = parseFloat(dataJson[0].tags[21].props[0].val).toFixed(2);
                var pm04_rdy_hr = parseFloat(dataJson[0].tags[29].props[0].val).toFixed(2);
                
                var pm01_speed = parseFloat(dataJson[0].tags[7].props[0].val).toFixed(0);
                var pm02_speed = parseFloat(dataJson[0].tags[15].props[0].val).toFixed(0);
                var pm03_speed = parseFloat(dataJson[0].tags[23].props[0].val).toFixed(0);
                var pm04_speed = parseFloat(dataJson[0].tags[31].props[0].val).toFixed(0);
                

                $("#pm01_bag_rel").html(pm01_bag_rel);
                $("#pm02_bag_rel").html(pm02_bag_rel);
                $("#pm03_bag_rel").html(pm03_bag_rel);
                $("#pm04_bag_rel").html(pm04_bag_rel);

                $("#pm01_ops_hr").html(pm01_ops_hr);
                $("#pm02_ops_hr").html(pm02_ops_hr);
                $("#pm03_ops_hr").html(pm03_ops_hr);
                $("#pm04_ops_hr").html(pm04_ops_hr);
                
                $("#pm01_speed").html(pm01_speed);
                $("#pm02_speed").html(pm02_speed);
                $("#pm03_speed").html(pm03_speed);
                $("#pm04_speed").html(pm04_speed);
                
                $("#pm01_rdy_hr").html(pm01_rdy_hr);
                $("#pm02_rdy_hr").html(pm02_rdy_hr);
                $("#pm03_rdy_hr").html(pm03_rdy_hr);
                $("#pm04_rdy_hr").html(pm04_rdy_hr);
                
                //Status
                pm01_ops_stat = dataJson[0].tags[4].props[0].val;
                pm02_ops_stat = dataJson[0].tags[12].props[0].val;
                pm03_ops_stat = dataJson[0].tags[20].props[0].val;
                pm04_ops_stat = dataJson[0].tags[28].props[0].val;

                if (pm01_ops_stat == 'True') {
                    $("#pm01_ops_stat").addClass('OnPadang');
                    $("#pm01_ops_stat").removeClass('OffPadang');
                } else {
                    $("#pm01_ops_stat").addClass('OffPadang');
                    $("#pm01_ops_stat").removeClass('OnPadang');
                }

                if (pm02_ops_stat == 'True') {
                    $("#pm02_ops_stat").addClass('OnPadang');
                    $("#pm02_ops_stat").removeClass('OffPadang');
                } else {
                    $("#pm02_ops_stat").addClass('OffPadang');
                    $("#pm02_ops_stat").removeClass('OnPadang');
                }

                if (pm03_ops_stat == 'True') {
                    $("#pm03_ops_stat").addClass('OnPadang');
                    $("#pm03_ops_stat").removeClass('OffPadang');
                } else {
                    $("#pm03_ops_stat").addClass('OffPadang');
                    $("#pm03_ops_stat").removeClass('OnPadang');
                }

                if (pm04_ops_stat == 'True') {
                    $("#pm04_ops_stat").addClass('OnPadang');
                    $("#pm04_ops_stat").removeClass('OffPadang');
                } else {
                    $("#pm04_ops_stat").addClass('OffPadang');
                    $("#pm04_ops_stat").removeClass('OnPadang');
                }
                
                pm01_rdy_stat = dataJson[0].tags[1].props[0].val;
                pm02_rdy_stat = dataJson[0].tags[9].props[0].val;
                pm03_rdy_stat = dataJson[0].tags[17].props[0].val;
                pm04_rdy_stat = dataJson[0].tags[25].props[0].val;

                if (pm01_rdy_stat == 'True') {
                    $("#pm01_rdy_stat").addClass('OnPadang');
                    $("#pm01_rdy_stat").removeClass('OffPadang');
                } else {
                    $("#pm01_rdy_stat").addClass('OffPadang');
                    $("#pm01_rdy_stat").removeClass('OnPadang');
                }

                if (pm02_rdy_stat == 'True') {
                    $("#pm02_rdy_stat").addClass('OnPadang');
                    $("#pm02_rdy_stat").removeClass('OffPadang');
                } else {
                    $("#pm02_rdy_stat").addClass('OffPadang');
                    $("#pm02_rdy_stat").removeClass('OnPadang');
                }

                if (pm03_rdy_stat == 'True') {
                    $("#pm03_rdy_stat").addClass('OnPadang');
                    $("#pm03_rdy_stat").removeClass('OffPadang');
                } else {
                    $("#pm03_rdy_stat").addClass('OffPadang');
                    $("#pm03_rdy_stat").removeClass('OnPadang');
                }

                if (pm04_rdy_stat == 'True') {
                    $("#pm04_rdy_stat").addClass('OnPadang');
                    $("#pm04_rdy_stat").removeClass('OffPadang');
                } else {
                    $("#pm04_rdy_stat").addClass('OffPadang');
                    $("#pm04_rdy_stat").removeClass('OnPadang');
                }
            }
        }).done(function (data) {}).fail(function () {
        });
    };
    setInterval(dataUpdate, 1000);
</script>
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
                <h3 style="text-align: left; padding-left: 12px; margin-top: 10px;">Real Time Packer Plant Overview</h3>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff ">Rembang<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:;">Padang</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="active"><a href="<?= base_url() ?>index.php/plant_rembang/overview">Rembang</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:;">Gresik</a></li>
                            <li role="separator" class="divider"></li>

                            <li><a href="javascript:;">Tonasa</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:;">TLCC</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:;">BTG Tonasa</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid --> 
    </nav>
</div>

<div class="row">
    <div class="col-md-3 noPadding layout1">
        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-2" style="background-color: #ffa83c; height: 90px;"> 
                <img src="media/icon/No_1.png" class="img-up">
            </div>
            <div class="col-xs-10"><p class="p-plant">Packer Machine</p></div>					
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #ffa83c;">
                <div class="col-xs-5" style="text-align: center;"><div class="TagName">Bag Release</div>
                    <span class="TagData" id="pm01_bag_rel"></span><span style="font-size: 18px"> Bag</span>
                </div>
                <div class="col-xs-5" style="text-align: center;"><div class="TagName">Operations</div>
                    <span class="TagData" id="pm01_ops_hr"></span><span style="font-size: 18px"> Hrs</span>
                </div>
                <div class="row">
                    <div class="col-xs-2 content-plant" style="width: 16%; float: right; margin-right: 10px">
                        <div class="fa fa-power-off fa-2x onzi" id="pm01_ops_stat"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #ffa83c;">
                <div class="col-xs-5" style="text-align: center;"><div class="TagName">Speed</div>
                    <span style="font-size: 18px">Mode </span><span class="TagData" id="pm01_speed"></span>
                </div>
                <div class="col-xs-5" style="text-align: center;"><div class="TagName">Ready</div>
                    <span class="TagData" id="pm01_rdy_hr"></span><span style="font-size: 18px"> Hrs</span>
                </div>
                <div class="row">
                    <div class="col-xs-2 content-plant" style="width: 16%; float: right; margin-right: 10px">
                        <div class="fa fa-power-off fa-2x onzi" id="pm01_rdy_stat"></div>
                    </div>
                </div>
            </div>
        </div>

<!--        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #ffa83c;" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">Ready Hours</div>
                    <span class="TagData" id="pm01_rdy_hr"></span><span style="font-size: 18px"> Hours</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" style="width: 12%; float: right; margin-right: 10px">
                        <div class="fa fa-power-off fa-2x onzi" id="pm01_rdy_stat"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #ffa83c;" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">Operation Hours</div>
                    <span class="TagData" id="pm01_ops_hr"></span><span style="font-size: 18px"> Hours</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" style="width: 12%; float: right; margin-right: 10px">	
                        <div class="fa fa-power-off fa-2x onzi" id="pm01_ops_stat"></div>
                    </div>
                </div>
            </div>
        </div>-->

    </div>
    <div class="col-md-3 noPadding layout1">
        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-2" style="background-color: #ffa83c; height: 90px;"> 
                <img src="media/icon/No_2.png" class="img-up">
            </div>
            <div class="col-xs-10"><p class="p-plant">Packer Machine</p></div>					
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #ffa83c;">
                <div class="col-xs-5" style="text-align: center;"><div class="TagName">Bag Release</div>
                    <span class="TagData" id="pm02_bag_rel"></span><span style="font-size: 18px"> Bag</span>
                </div>
                <div class="col-xs-5" style="text-align: center;"><div class="TagName">Operations</div>
                    <span class="TagData" id="pm02_ops_hr"></span><span style="font-size: 18px"> Hrs</span>
                </div>
                <div class="row">
                    <div class="col-xs-2 content-plant" style="width: 16%; float: right; margin-right: 10px">
                        <div class="fa fa-power-off fa-2x onzi" id="pm02_ops_stat"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #ffa83c;">
                <div class="col-xs-5" style="text-align: center;"><div class="TagName">Speed</div>
                    <span style="font-size: 18px">Mode </span><span class="TagData" id="pm02_speed"></span>
                </div>
                <div class="col-xs-5" style="text-align: center;"><div class="TagName">Ready</div>
                    <span class="TagData" id="pm02_rdy_hr"></span><span style="font-size: 18px"> Hrs</span>
                </div>
                <div class="row">
                    <div class="col-xs-2 content-plant" style="width: 16%; float: right; margin-right: 10px">
                        <div class="fa fa-power-off fa-2x onzi" id="pm02_rdy_stat"></div>
                    </div>
                </div>
            </div>
        </div>

<!--        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #ffa83c;" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">Ready Hours</div>
                    <span class="TagData" id="pm02_rdy_hr"></span><span style="font-size: 18px"> Hours</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" style="width: 12%; float: right; margin-right: 10px">
                        <div class="fa fa-power-off fa-2x onzi" id="pm02_rdy_stat"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #ffa83c;" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">Operation Hours</div>
                    <span class="TagData" id="pm02_ops_hr"></span><span style="font-size: 18px"> Hours</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" style="width: 12%; float: right; margin-right: 10px">	
                        <div class="fa fa-power-off fa-2x onzi" id="pm02_ops_stat"></div>
                    </div>
                </div>
            </div>
        </div>-->
    </div>
    <div class="col-md-3 noPadding layout1">
        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-2" style="background-color: #ffa83c; height: 90px;"> 
                <img src="media/icon/No_3.png" class="img-up">
            </div>
            <div class="col-xs-10"><p class="p-plant">Packer Machine</p></div>					
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #ffa83c;">
                <div class="col-xs-5" style="text-align: center;"><div class="TagName">Bag Release</div>
                    <span class="TagData" id="pm03_bag_rel"></span><span style="font-size: 18px"> Bag</span>
                </div>
                <div class="col-xs-5" style="text-align: center;"><div class="TagName">Operations</div>
                    <span class="TagData" id="pm03_ops_hr"></span><span style="font-size: 18px"> Hrs</span>
                </div>
                <div class="row">
                    <div class="col-xs-2 content-plant" style="width: 16%; float: right; margin-right: 10px">
                        <div class="fa fa-power-off fa-2x onzi" id="pm03_ops_stat"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #ffa83c;">
                <div class="col-xs-5" style="text-align: center;"><div class="TagName">Speed</div>
                    <span style="font-size: 18px">Mode </span><span class="TagData" id="pm03_speed"></span>
                </div>
                <div class="col-xs-5" style="text-align: center;"><div class="TagName">Ready</div>
                    <span class="TagData" id="pm03_rdy_hr"></span><span style="font-size: 18px"> Hrs</span>
                </div>
                <div class="row">
                    <div class="col-xs-2 content-plant" style="width: 16%; float: right; margin-right: 10px">
                        <div class="fa fa-power-off fa-2x onzi" id="pm03_rdy_stat"></div>
                    </div>
                </div>
            </div>
        </div>

<!--        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #ffa83c;" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">Ready Hours</div>
                    <span class="TagData" id="pm03_rdy_hr"></span><span style="font-size: 18px"> Hours</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" style="width: 12%; float: right; margin-right: 10px">
                        <div class="fa fa-power-off fa-2x onzi" id="pm03_rdy_stat"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #ffa83c;" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">Operation Hours</div>
                    <span class="TagData" id="pm03_ops_hr"></span><span style="font-size: 18px"> Hours</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" style="width: 12%; float: right; margin-right: 10px">	
                        <div class="fa fa-power-off fa-2x onzi" id="pm03_ops_stat"></div>
                    </div>
                </div>
            </div>
        </div>-->
    </div>
    <div class="col-md-3 noPadding layout1">
        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-2" style="background-color: #ffa83c; height: 90px;"> 
                <img src="media/icon/No_4.png" class="img-up">
            </div>
            <div class="col-xs-10"><p class="p-plant">Packer Machine</p></div>					
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #ffa83c;">
                <div class="col-xs-5" style="text-align: center;"><div class="TagName">Bag Release</div>
                    <span class="TagData" id="pm04_bag_rel"></span><span style="font-size: 18px"> Bag</span>
                </div>
                <div class="col-xs-5" style="text-align: center;"><div class="TagName">Operations</div>
                    <span class="TagData" id="pm04_ops_hr"></span><span style="font-size: 18px"> Hrs</span>
                </div>
                <div class="row">
                    <div class="col-xs-2 content-plant" style="width: 16%; float: right; margin-right: 10px">
                        <div class="fa fa-power-off fa-2x onzi" id="pm04_ops_stat"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xs-12 noPadding layout1" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #ffa83c;">
                <div class="col-xs-5" style="text-align: center;"><div class="TagName">Speed</div>
                    <span style="font-size: 18px">Mode </span><span class="TagData" id="pm04_speed"></span>
                </div>
                <div class="col-xs-5" style="text-align: center;"><div class="TagName">Ready</div>
                    <span class="TagData" id="pm04_rdy_hr"></span><span style="font-size: 18px"> Hrs</span>
                </div>
                <div class="row">
                    <div class="col-xs-2 content-plant" style="width: 16%; float: right; margin-right: 10px">
                        <div class="fa fa-power-off fa-2x onzi" id="pm04_rdy_stat"></div>
                    </div>
                </div>
            </div>
        </div>

<!--        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #ffa83c;" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">Ready Hours</div>
                    <span class="TagData" id="pm04_rdy_hr"></span><span style="font-size: 18px"> Hours</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" style="width: 12%; float: right; margin-right: 10px">
                        <div class="fa fa-power-off fa-2x onzi" id="pm04_rdy_stat"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #ffa83c;" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">Operation Hours</div>
                    <span class="TagData" id="pm04_ops_hr"></span><span style="font-size: 18px"> Hours</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" style="width: 12%; float: right; margin-right: 10px">	
                        <div class="fa fa-power-off fa-2x onzi" id="pm04_ops_stat"></div>
                    </div>
                </div>
            </div>
        </div>-->
    </div>
</div>

<!--<div class="row">
    <div class="col-md-4 noPadding">
        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-4" style="background-color: #ffa83c; height: 90px;"> 
                <img src="media/icon/factor2.png" class="img-up">
            </div>
            <div class="col-xs-8"><p class="p-plant">Cement Silo</p><br><p class="p-numb">1</p></div>					
        </div>
        <div class="col-xs-12 noPadding">
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #ffa83c;">
                <div class="col-xs-12"><div class="TagName" align="center">BK01</div></div>
                <div class="col-xs-6" style="text-align: center;">
                    <span class="TagData" id="cs01_bk01_cnt"></span><span style="font-size: 18px" id="cs01_bk01_opstat"> Counts</span>
                </div>
                <div class="col-xs-6" style="text-align: center;">
                    <span class="TagData" id="cs01_bk01_hr"></span><span style="font-size: 18px" id="cs01_bk01_rdystat"> Hours</span>
                </div>
            </div>
        </div>
        <div class="col-xs-12 noPadding">
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #ffa83c;">
                <div class="col-xs-12"><div class="TagName" align="center">BK02</div></div>
                <div class="col-xs-6" style="text-align: center;">
                    <span class="TagData" id="cs01_bk02_cnt"></span><span style="font-size: 18px" id="cs01_bk02_opstat"> Counts</span>
                </div>
                <div class="col-xs-6" style="text-align: center;">
                    <span class="TagData" id="cs01_bk02_hr"></span><span style="font-size: 18px" id="cs01_bk02_rdystat"> Hours</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 noPadding">

        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-4" style="background-color: #ffa83c; height: 90px;"> 
                <img src="media/icon/factor2.png" class="img-up">
            </div>
            <div class="col-xs-8"><p class="p-plant">Cement Silo</p><br><p class="p-numb">2</p></div>					
        </div>

        <div class="col-xs-12 noPadding">
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #ffa83c;">
                <div class="col-xs-12"><div class="TagName" align="center">BK01</div></div>
                <div class="col-xs-6" style="text-align: center;">
                    <span class="TagData" id="cs02_bk01_cnt"></span><span style="font-size: 18px" id="cs02_bk01_opstat"> Counts</span>
                </div>
                <div class="col-xs-6" style="text-align: center;">
                    <span class="TagData" id="cs02_bk01_hr"></span><span style="font-size: 18px" id="cs02_bk01_rdystat"> Hours</span>
                </div>
            </div>
        </div>
        <div class="col-xs-12 noPadding">
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #ffa83c;">
                <div class="col-xs-12"><div class="TagName" align="center">BK02</div></div>
                <div class="col-xs-6" style="text-align: center;">
                    <span class="TagData" id="cs02_bk02_cnt"></span><span style="font-size: 18px" id="cs02_bk02_opstat"> Counts</span>
                </div>
                <div class="col-xs-6" style="text-align: center;">
                    <span class="TagData" id="cs02_bk02_hr"></span><span style="font-size: 18px" id="cs02_bk02_rdystat"> Hours</span>
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-4 noPadding">
        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-4" style="background-color: #ffa83c; height: 90px;"> 
                <img src="media/icon/factor2.png" class="img-up">
            </div>
            <div class="col-xs-8"><p class="p-plant">Cement Silo</p><br><p class="p-numb">3</p></div>					
        </div>
        <div class="col-xs-12 noPadding">
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #ffa83c;">
                <div class="col-xs-12"><div class="TagName" align="center">BK01</div></div>
                <div class="col-xs-6" style="text-align: center;">
                    <span class="TagData" id="cs03_bk01_cnt"></span><span style="font-size: 18px" id="cs03_bk01_opstat"> Counts</span>
                </div>
                <div class="col-xs-6" style="text-align: center;">
                    <span class="TagData" id="cs03_bk01_hr"></span><span style="font-size: 18px" id="cs03_bk01_rdystat"> Hours</span>
                </div>
            </div>
        </div>
        <div class="col-xs-12 noPadding">
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #ffa83c;">
                <div class="col-xs-12"><div class="TagName" align="center">BK02</div></div>
                <div class="col-xs-6" style="text-align: center;">
                    <span class="TagData" id="cs03_bk02_cnt"></span><span style="font-size: 18px" id="cs03_bk02_opstat"> Counts</span>
                </div>
                <div class="col-xs-6" style="text-align: center;">
                    <span class="TagData" id="cs03_bk02_hr"></span><span style="font-size: 18px" id="cs03_bk02_rdystat"> Hours</span>
                </div>
            </div>
        </div>
    </div>
</div>-->
