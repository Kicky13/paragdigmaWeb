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
                <h3 style="text-align: left; padding-left: 12px; margin-top: 10px;">Real Time Plant Overview</h3>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff ">Tonasa<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= base_url() ?>index.php/plant_gresik/offstate">Overall</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_padang/overview">Padang</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_rembang/overview">Rembang</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_gresik/overview">Tuban, Gresik, Cigading</a></li>
                            <li role="separator" class="divider"></li>

                            <li class="active"><a href="<?= base_url() ?>index.php/plant_tonasa/overview">Tonasa</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_tlcc/overview">TLCC</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>
<!--        batas-->

<div class="row plant_cover">
    <div class="col-xs-12 col-md-3 noPadding" >
        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-4" style="background-color: #ffa83c; height: 90px;"> 
                <img src="media/icon/factor2.png" class="img-up">
            </div>
            <div class="col-xs-8"><p class="p-plant">TONASA</p><br><p class="p-numb">2</p></div>					
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-orange" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">Raw Mill</div>
                    <span class="TagData" id="tns2_rm1_f"></span><span style="font-size: 18px"> T/h</span>
                </div>
                <div class="row"><div class="col-xs-2 content-plant" >
                        <div class="fa fa-power-off fa-2x onzi" id="tns2_rm1_s"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-orange" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">Kiln</div>
                    <span class="TagData" id="tns2_kl1_f"></span><span style="font-size: 18px"> T/h</span></div>
                <div  class="row"><div class="col-xs-2 content-plant" >

                        <div class="fa fa-power-off fa-2x onzi" id="tns2_kl1_s"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-orange" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">Coal Mill</div>
                    <span id="tns2_cm1_f" class="TagData">0,00</span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div class="fa fa-power-off fa-2x onzi" id="tns2_cm1_s"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-orange padding-orange-bottom" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">Finish Mill</div>
                    <span class="TagData" id="tns2_fm1_f"></span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div class="fa fa-power-off fa-2x onzi" id="tns2_fm1_s"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-xs-12 col-md-3 noPadding" >
        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-4" style="background-color: #53d0c0; height: 90px;"> 
                <img src="media/icon/factor2.png" class="img-up">
            </div>
            <div class="col-xs-8"><p class="p-plant">TONASA</p><br><p class="p-numb">3</p></div>					
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-green" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">Raw Mill</div>
                    <span class="TagData" id="tns3_rm1_f"></span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div class="fa fa-power-off fa-2x onzi"id="tns3_rm1_s"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-green" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">Kiln</div>
                    <span class="TagData" id="tns3_kl1_f"></span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >	
                        <div class="fa fa-power-off fa-2x onzi" id="tns3_kl1_s"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-green" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">Coal Mill</div>
                    <span id="tns3_cm1_f" class="TagData">0,00</span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >	

                        <div class="fa fa-power-off fa-2x onzi" id="tns3_cm1_s"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-green padding-green-bottom" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">Finish Mill</div>
                    <span class="TagData" id="tns3_fm1_f"></span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div class="fa fa-power-off fa-2x onzi" id="tns3_fm1_s"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-3 noPadding" >
        <div class="col-xs-12 noPadding plant-head" >

            <div class="col-xs-4" style="background-color: #62a9f9; height: 90px;"> 
                <img src="media/icon/factor2.png" class="img-up">
            </div>
            <div class="col-xs-8"><p class="p-plant">TONASA</p><br><p class="p-numb">4</p></div>					
        </div>
        <div class="col-xs-6 noPadding" >
            <div class="img-thumbnail cubesRun padding-blue" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">Raw Mill 4.11 - 411MD01</div>
                    <span class="TagData" id="tns4_rm1_f"></span><span style="font-size: 18px"> T/h</span>
                </div>
                <div class="row"><div class="col-xs-2 content-plant" >
                        <div class="fa fa-power-off fa-2x onzi-two" id="tns4_rm1_s"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 noPadding" >
            <div class="img-thumbnail cubesRun " >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">Raw Mill 4.12 - 412MD01</div>
                    <span class="TagData"id="tns4_rm2_f"></span><span style="font-size: 18px"> T/h</span>
                </div>
                <div class="row"><div class="col-xs-2 content-plant" >
                        <div class="fa fa-power-off fa-2x onzi-two" id="tns4_rm2_s"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-blue" >
                <div class="col-xs-11" style="text-align: center;"><div class="TagName">Kiln - 416RK01M2M6</div>
                    <span class="TagData" id="tns4_kl1_f"></span><span style="font-size: 18px"> T/h</span></div>
                <div  class="row"><div class="col-xs-1 content-plant" >

                        <div class="fa fa-power-off fa-2x onzi-two" id="tns4_kl1_s"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 noPadding" >
            <div class="img-thumbnail cubesRun padding-blue" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">Coal Mill 4.30 - 430MD02</div>
                    <span class="TagData" id="tns4_cm1_f"></span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div class="fa fa-power-off fa-2x onzi-two" id="tns4_cm1_s"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 noPadding" >
            <div class="img-thumbnail cubesRun" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">Coal Mill 4.86 - 486MD201</div>
                    <span class="TagData"id="tns4_cm2_f"></span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div class="fa fa-power-off fa-2x onzi-two" id="tns4_cm2_s"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 noPadding" >
            <div class="img-thumbnail cubesRun padding-blue padding-blue-bottom" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">Finish Mill 4.19 - 419MD01M1</div>
                    <span class="TagData"id="tns4_fm1_f"></span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div class="fa fa-power-off fa-2x onzi-two" id="tns4_fm1_s"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 noPadding" >
            <div class="img-thumbnail cubesRun padding-blue-bottom" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">Finish Mill 4.20 - 420MD01M1</div>
                    <span class="TagData" id="tns4_fm2_f"></span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div class="fa fa-power-off fa-2x onzi-two" id="tns4_fm2_s"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-xs-12 col-md-3 noPadding" >
        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-4" style="background-color: #f76767; height: 90px;"> 
                <img src="media/icon/factor2.png" class="img-up">
            </div>
            <div class="col-xs-8"><p class="p-plant">TONASA</p><br><p class="p-numb">5</p></div>					
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-red" >
                <div class="col-xs-11" style="text-align: center;"><div class="TagName">Raw Mill</div>
                    <span id="tns5_rm1_f" class="TagData"></span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-1 content-plant" >
                        <div class="fa fa-power-off fa-2x onzi-two" id="tns5_rm1_s"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-red" >
                <div class="col-xs-11" style="text-align: center;"><div class="TagName">Kiln</div>
                    <span class="TagData" id="tns5_kl1_f"></span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-1 content-plant" >	
                        <div class="fa fa-power-off fa-2x onzi-two" id="tns5_kl1_s" ></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-red" >
                <div class="col-xs-11" style="text-align: center;"><div class="TagName">Coal Mill</div>
                    <span class="TagData" id="tns5_cm1_f"></span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-1 content-plant" >
                        <div class="fa fa-power-off fa-2x onzi-two" id="tns5_cm1_s"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-6 noPadding" >
            <div class="img-thumbnail cubesRun padding-red padding-red-bottom" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">Finish Mill</div>
                    <span class="TagData" id="tns5_fm1_f"></span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div class="fa fa-power-off fa-2x onzi-two" id="tns5_fm1_s"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 noPadding" >
            <div class="img-thumbnail cubesRun padding-red-bottom" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">Finish Mill</div>
                    <span class="TagData" id="tns5_fm2_f"></span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div class="fa fa-power-off fa-2x onzi-two" id="tns5_fm2_s"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function dataUpdate() {
        $.ajax({
            url: 'http://par4digma.semenindonesia.com/api/index.php/plant_tonasa/get_statefeed',
            type: 'GET',
            success: function (data) {
                var data1 = data.replace("<title>Json</title>", "");
                var data2 = data1.replace("(", "[");
                var data3 = data2.replace(");", "]");
                var dataJson = JSON.parse(data3);

                //Value
                var v_tns2_rm1 = parseFloat(dataJson[0].tags[12].props[0].val).toFixed(2);
                var v_tns2_cm1 = parseFloat(dataJson[0].tags[14].props[0].val).toFixed(2);
                var v_tns2_kl1 = parseFloat(dataJson[0].tags[10].props[0].val).toFixed(2);
                var v_tns2_fm1 = parseFloat(dataJson[0].tags[8].props[0].val).toFixed(2);

                var v_tns3_rm1 = parseFloat(dataJson[0].tags[13].props[0].val).toFixed(2);
                var v_tns3_cm1 = parseFloat(dataJson[0].tags[17].props[0].val).toFixed(2);
                var v_tns3_kl1 = parseFloat(dataJson[0].tags[11].props[0].val).toFixed(2);
                var v_tns3_fm1 = parseFloat(dataJson[0].tags[9].props[0].val).toFixed(2);
                
                var v_tns4_rm1 = parseFloat(dataJson[0].tags[23].props[0].val).toFixed(2);
                var v_tns4_rm2 = parseFloat(dataJson[0].tags[24].props[0].val).toFixed(2);
                var v_tns4_cm1 = parseFloat(dataJson[0].tags[18].props[0].val).toFixed(2);
                var v_tns4_cm2 = parseFloat(dataJson[0].tags[19].props[0].val).toFixed(2);
                var v_tns4_kl1 = parseFloat(dataJson[0].tags[22].props[0].val).toFixed(2);
                var v_tns4_fm1 = parseFloat(dataJson[0].tags[20].props[0].val).toFixed(2);
                var v_tns4_fm2 = parseFloat(dataJson[0].tags[21].props[0].val).toFixed(2);
                
                var v_tns5_rm1 = parseFloat(dataJson[0].tags[36].props[0].val).toFixed(2);
                var v_tns5_cm1 = parseFloat(dataJson[0].tags[32].props[0].val).toFixed(2);
                var v_tns5_kl1 = parseFloat(dataJson[0].tags[35].props[0].val).toFixed(2);
                var v_tns5_fm1 = parseFloat(dataJson[0].tags[33].props[0].val).toFixed(2);
                var v_tns5_fm2 = parseFloat(dataJson[0].tags[34].props[0].val).toFixed(2);

                $("#tns2_rm1_f").html(v_tns2_rm1);
                $("#tns2_cm1_f").html(v_tns2_cm1);
                $("#tns2_kl1_f").html(v_tns2_kl1);
                $("#tns2_fm1_f").html(v_tns2_fm1);

                $("#tns3_rm1_f").html(v_tns3_rm1);
                $("#tns3_cm1_f").html(v_tns3_cm1);
                $("#tns3_kl1_f").html(v_tns3_kl1);
                $("#tns3_fm1_f").html(v_tns3_fm1);
                
                $("#tns4_rm1_f").html(v_tns4_rm1);
                $("#tns4_rm2_f").html(v_tns4_rm2);
                $("#tns4_cm1_f").html(v_tns4_cm1);
                $("#tns4_cm2_f").html(v_tns4_cm2);
                $("#tns4_kl1_f").html(v_tns4_kl1);
                $("#tns4_fm1_f").html(v_tns4_fm1);
                $("#tns4_fm2_f").html(v_tns4_fm2);
                
                $("#tns5_rm1_f").html(v_tns5_rm1);
                $("#tns5_cm1_f").html(v_tns5_cm1);
                $("#tns5_kl1_f").html(v_tns5_kl1);
                $("#tns5_fm1_f").html(v_tns5_fm1);
                $("#tns5_fm2_f").html(v_tns5_fm2);
                //Raw Mill
                tns2_rm1 = dataJson[0].tags[6].props[0].val;
                tns3_rm1 = dataJson[0].tags[7].props[0].val;
                tns4_rm1 = dataJson[0].tags[30].props[0].val;
                tns4_rm2 = dataJson[0].tags[31].props[0].val;
                tns5_rm1 = dataJson[0].tags[41].props[0].val;

                if (tns2_rm1 == 'True') {
                    $("#tns2_rm1_s").addClass('OnPadang');

                    $("#tns2_rm1_s").removeClass('OffPadang');
                } else {
                    $("#tns2_rm1_s").addClass('OffPadang');

                    $("#tns2_rm1_s").removeClass('OnPadang');
                }
                if (tns3_rm1 == 'True') {
                    $("#tns3_rm1_s").addClass('OnPadang');

                    $("#tns3_rm1_s").removeClass('OffPadang');
                } else {
                    $("#tns3_rm1_s").addClass('OffPadang');

                    $("#tns3_rm1_s").removeClass('OnPadang');
                }
                if (tns4_rm1 == 'True') {
                    $("#tns4_rm1_s").addClass('OnPadang');

                    $("#tns4_rm1_s").removeClass('OffPadang');
                } else {
                    $("#tns4_rm1_s").addClass('OffPadang');

                    $("#tns4_rm1_s").removeClass('OnPadang');
                }
                if (tns4_rm2 == 'True') {
                    $("#tns4_rm2_s").addClass('OnPadang');

                    $("#tns4_rm2_s").removeClass('OffPadang');
                } else {
                    $("#tns4_rm2_s").addClass('OffPadang');

                    $("#tns4_rm2_s").removeClass('OnPadang');
                }
                if (tns5_rm1 == 'True') {
                    $("#tns5_rm1_s").addClass('OnPadang');

                    $("#tns5_rm1_s").removeClass('OffPadang');
                } else {
                    $("#tns5_rm1_s").addClass('OffPadang');

                    $("#tns5_rm1_s").removeClass('OnPadang');
                }

                //Coal Mill
                tns2_cm1 = dataJson[0].tags[0].props[0].val;
                tns3_cm1 = dataJson[0].tags[1].props[0].val;
                tns4_cm1 = dataJson[0].tags[25].props[0].val;
                tns4_cm2 = dataJson[0].tags[26].props[0].val;
                tns5_cm1 = dataJson[0].tags[37].props[0].val;

                if (tns2_cm1 == 'True') {
                    $("#tns2_cm1_s").addClass('OnPadang');

                    $("#tns2_cm1_s").removeClass('OffPadang');
                } else {
                    $("#tns2_cm1_s").addClass('OffPadang');

                    $("#tns2_cm1_s").removeClass('OnPadang');
                }
                if (tns3_cm1 == 'True') {
                    $("#tns3_cm1_s").addClass('OnPadang');

                    $("#tns3_cm1_s").removeClass('OffPadang');
                } else {
                    $("#tns3_cm1_s").addClass('OffPadang');

                    $("#tns3_cm1_s").removeClass('OnPadang');
                }
                if (tns4_cm1 == 'True') {
                    $("#tns4_cm1_s").addClass('OnPadang');

                    $("#tns4_cm1_s").removeClass('OffPadang');
                } else {
                    $("#tns4_cm1_s").addClass('OffPadang');

                    $("#tns4_cm1_s").removeClass('OnPadang');
                }
                if (tns4_cm2 == 'True') {
                    $("#tns4_cm2_s").addClass('OnPadang');

                    $("#tns4_cm2_s").removeClass('OffPadang');
                } else {
                    $("#tns4_cm2_s").addClass('OffPadang');

                    $("#tns4_cm2_s").removeClass('OnPadang');
                }
                if (tns5_cm1 == 'True') {
                    $("#tns5_cm1_s").addClass('OnPadang');

                    $("#tns5_cm1_s").removeClass('OffPadang');
                } else {
                    $("#tns5_cm1_s").addClass('OffPadang');

                    $("#tns5_cm1_s").removeClass('OnPadang');
                }
                //KILN
                tns2_kl1 = dataJson[0].tags[4].props[0].val;
                tns3_kl1 = dataJson[0].tags[5].props[0].val;
                tns4_kl1 = dataJson[0].tags[29].props[0].val;
                tns5_kl1 = dataJson[0].tags[40].props[0].val;

                if (tns2_kl1 == 'True') {
                    $("#tns2_kl1_s").addClass('OnPadang');

                    $("#tns2_kl1_s").removeClass('OffPadang');
                } else {
                    $("#tns2_kl1_s").addClass('OffPadang');

                    $("#tns2_kl1_s").removeClass('OnPadang');
                }
                if (tns3_kl1 == 'True') {
                    $("#tns3_kl1_s").addClass('OnPadang');

                    $("#tns3_kl1_s").removeClass('OffPadang');
                } else {
                    $("#tns3_kl1_s").addClass('OffPadang');

                    $("#tns3_kl1_s").removeClass('OnPadang');
                }
                if (tns4_kl1 == 'True') {
                    $("#tns4_kl1_s").addClass('OnPadang');

                    $("#tns4_kl1_s").removeClass('OffPadang');
                } else {
                    $("#tns4_kl1_s").addClass('OffPadang');

                    $("#tns4_kl1_s").removeClass('OnPadang');
                }
                if (tns5_kl1 == 'True') {
                    $("#tns5_kl1_s").addClass('OnPadang');

                    $("#tns5_kl1_s").removeClass('OffPadang');
                } else {
                    $("#tns5_kl1_s").addClass('OffPadang');

                    $("#tns5_kl1_s").removeClass('OnPadang');
                }
                //Finish Mill
                tns2_fm1 = dataJson[0].tags[2].props[0].val;
                tns3_fm1 = dataJson[0].tags[3].props[0].val;
                tns4_fm1 = dataJson[0].tags[27].props[0].val;
                tns4_fm2 = dataJson[0].tags[28].props[0].val;
                tns5_fm1 = dataJson[0].tags[38].props[0].val;
                tns5_fm2 = dataJson[0].tags[39].props[0].val;

                if (tns2_fm1 == 'True') {
                    $("#tns2_fm1_s").addClass('OnPadang');

                    $("#tns2_fm1_s").removeClass('OffPadang');
                } else {
                    $("#tns2_fm1_s").addClass('OffPadang');

                    $("#tns2_fm1_s").removeClass('OnPadang');
                }
                if (tns3_fm1 == 'True') {
                    $("#tns3_fm1_s").addClass('OnPadang');

                    $("#tns3_fm1_s").removeClass('OffPadang');
                } else {
                    $("#tns3_fm1_s").addClass('OffPadang');

                    $("#tns3_fm1_s").removeClass('OnPadang');
                }
                if (tns4_fm1 == 'True') {
                    $("#tns4_fm1_s").addClass('OnPadang');

                    $("#tns4_fm1_s").removeClass('OffPadang');
                } else {
                    $("#tns4_fm1_s").addClass('OffPadang');

                    $("#tns4_fm1_s").removeClass('OnPadang');
                }
                if (tns4_fm2 == 'True') {
                    $("#tns4_fm2_s").addClass('OnPadang');

                    $("#tns4_fm2_s").removeClass('OffPadang');
                } else {
                    $("#tns4_fm2_s").addClass('OffPadang');

                    $("#tns4_fm2_s").removeClass('OnPadang');
                }
                if (tns5_fm1 == 'True') {
                    $("#tns5_fm1_s").addClass('OnPadang');

                    $("#tns5_fm1_s").removeClass('OffPadang');
                } else {
                    $("#tns5_fm1_s").addClass('OffPadang');

                    $("#tns5_fm1_s").removeClass('OnPadang');
                }
                if (tns5_fm2 == 'True') {
                    $("#tns5_fm2_s").addClass('OnPadang');

                    $("#tns5_fm2_s").removeClass('OffPadang');
                } else {
                    $("#tns5_fm2_s").addClass('OffPadang');

                    $("#tns5_fm2_s").removeClass('OnPadang');
                }
            }
        }).done(function (data) {}).fail(function () {
        });
    };
    setInterval(dataUpdate, 1000);
</script>