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
    .OnPadang {
        color: #71BA51;
    }
    .OffPadang {
        color: #d9534f;
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff ">Padang<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= base_url() ?>index.php/plant_gresik/offstate">Overall</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="active"><a href="<?= base_url() ?>index.php/plant_padang/overview">Padang</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_rembang/overview">Rembang</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_gresik/overview">Tuban, Gresik, Cigading</a></li>
                            <li role="separator" class="divider"></li>

                            <li><a href="<?= base_url() ?>index.php/plant_tonasa/overview">Tonasa</a></li>
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
    <div class="col-xs-12 col-md-3 noPadding"  style="width:20%">
        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-4" style="background-color: #ffa83c; height: 90px;"> 
                <img src="media/icon/factor2.png" class="img-up">
            </div>
            <div class="col-xs-8"><p class="p-plant">INDARUNG</p><br><p class="p-numb">2</p></div>					
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #ffa83c;" >
                <div class="col-xs-10" style="text-align: center;padding:0"><div class="TagName">2R1M01 - Raw Mill</div>
                    <span id="val_ind2_rm1" class="TagData">
                    </span><span style="font-size: 18px"> T/h</span>
                </div>
                <div class="row"><div class="col-xs-2 content-plant" >
                        <div id="o_ind2_rm1" class="fa fa-power-off fa-2x onzi"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #ffa83c;" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">2W1W01 - Kiln</div>
                    <span id="val_ind2_kl1" class="TagData">
                    </span><span style="font-size: 18px"> T/h</span></div>
                <div  class="row"><div class="col-xs-2 content-plant" >
                        <div id="o_ind2_kl1" class="fa fa-power-off fa-2x onzi"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #ffa83c;" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">2K1M01 - Coal Mill</div>
                    <span id="val_ind2_cm1" class="TagData">
                    </span><span style="font-size: 18px"> %</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div id="o_ind2_cm1" class="fa fa-power-off fa-2x onzi"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #ffa83c; border-bottom: 3px solid #ffa83c;" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">2Z1M01 - Finish Mill</div>
                    <span id="val_ind2_fm1" class="TagData">
                    </span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div id="o_ind2_fm1" class="fa fa-power-off fa-2x onzi"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-xs-12 col-md-3 noPadding"  style="width:20%">
        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-4" style="background-color: #53d0c0; height: 90px;"> 
                <img src="media/icon/factor2.png" class="img-up">
            </div>
            <div class="col-xs-8"><p class="p-plant">INDARUNG</p><br><p class="p-numb">3</p></div>					
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #53d0c0;">
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">3R1M01 - Raw Mill</div>
                    <span id="val_ind3_rm1" class="TagData">
                    </span><span style="font-size: 18px"> T/h</span>

                </div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div id="o_ind3_rm1" class="fa fa-power-off fa-2x onzi"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #53d0c0;" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">3W2W01 - Kiln</div>
                    <span id="val_ind3_kl1" class="TagData">
                    </span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div id="o_ind3_kl1" class="fa fa-power-off fa-2x onzi"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #53d0c0;" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">3K2M01 - Coal Mill</div>
                    <span id="val_ind3_cm1" class="TagData">
                    </span><span style="font-size: 18px"> %</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div id="o_ind3_cm1" class="fa fa-power-off fa-2x onzi"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #53d0c0; border-bottom: 3px solid #53d0c0;" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">3Z2M01 - Finish Mill</div>
                    <span id="val_ind3_fm1" class="TagData">
                    </span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div id="o_ind3_fm1" class="fa fa-power-off fa-2x onzi"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-3 noPadding"  style="width:20%">
        <div class="col-xs-12 noPadding plant-head" >

            <div class="col-xs-4" style="background-color: #62a9f9; height: 90px;"> 
                <img src="media/icon/factor2.png" class="img-up">
            </div>
            <div class="col-xs-8"><p class="p-plant">INDARUNG</p><br><p class="p-numb">4</p></div>					
        </div>
        <div class="col-xs-6 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #62a9f9;">
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">4R1M01 - Raw Mill</div>
                    <span id="val_ind4_rm1" class="TagData">
                    </span><span style="font-size: 18px"> T/h</span>
                </div>
                <div class="row"><div class="col-xs-2 content-plant" >
                        <div id="o_ind4_rm1" class="fa fa-power-off fa-2x onzi-two"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 noPadding" >
            <div class="img-thumbnail cubesRun" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">4R2M01 - Raw Mill</div>
                    <span id="val_ind4_rm2" class="TagData">
                    </span><span style="font-size: 18px"> T/h</span>
                </div>
                <div class="row"><div class="col-xs-2 content-plant" >
                        <div id="o_ind4_rm2" class="fa fa-power-off fa-2x onzi-two"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #62a9f9;" >
                <div class="col-xs-11" style="text-align: center;"><div class="TagName">4W1W01 - Kiln</div>
                    <span id="val_ind4_kl1" class="TagData">
                    </span><span style="font-size: 18px"> T/h</span></div>
                <div  class="row">
                    <div class="col-xs-1 content-plant" >
                        <div id="o_ind4_kl1" class="fa fa-power-off fa-2x onzi-two"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #62a9f9;" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">4K2M01 - Coal Mill</div>
                    <span id="val_ind4_cm1" class="TagData" style="font-size: 18px">
                    </span><span style="font-size: 18px"> %</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div id="o_ind4_cm1" class="fa fa-power-off fa-2x onzi-two"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 noPadding" >
            <div class="img-thumbnail cubesRun" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">4K3M01 - Coal Mill</div>
                    <span id="val_ind4_cm2" class="TagData" style="font-size: 18px">
                    </span><span style="font-size: 18px"> %</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div id="o_ind4_cm2" class="fa fa-power-off fa-2x onzi-two"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #62a9f9; border-bottom: 3px solid #62a9f9;" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName" style="font-size: 11px;">4Z1M01 - Finish Mill</div>
                    <span id="val_ind4_fm1" class="TagData" style="font-size: 18px">
                    </span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div id="o_ind4_fm1" class="fa fa-power-off fa-2x onzi-two"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-bottom: 3px solid #62a9f9;">
                <div class="col-xs-10" style="text-align: center;"><div class="TagName" style="font-size: 11px;">4Z2M01 - Finish Mill</div>
                    <span id="val_ind4_fm2" class="TagData" style="font-size: 18px">
                    </span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div id="o_ind4_fm2" class="fa fa-power-off fa-2x onzi-two"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-xs-12 col-md-3 noPadding"  style="width:20%">
        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-4" style="background-color: #f76767; height: 90px;"> 
                <img src="media/icon/factor2.png" class="img-up">
            </div>
            <div class="col-xs-8"><p class="p-plant">INDARUNG</p><br><p class="p-numb">5</p></div>					
        </div>

        <div class="col-xs-6 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #f76767;">
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">5R1M01 - Raw Mill</div>
                    <span id="val_ind5_rm1" class="TagData" style="font-size: 18px;">
                    </span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div id="o_ind5_rm1" class="fa fa-power-off fa-2x onzi-two"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 noPadding" >
            <div class="img-thumbnail cubesRun" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">5R2M01 - Raw Mill</div>
                    <span id="val_ind5_rm2" class="TagData" style="font-size: 18px;">
                    </span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div id="o_ind5_rm2" class="fa fa-power-off fa-2x onzi-two"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #f76767;" >
                <div class="col-xs-11" style="text-align: center;"><div class="TagName">5W1W01 - Kiln</div>
                    <span id="val_ind5_kl1" class="TagData">
                    </span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-1 content-plant" >
                        <div id="o_ind5_kl1" class="fa fa-power-off fa-2x onzi-two"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #f76767;" >
                <div class="col-xs-11" style="text-align: center;"><div class="TagName">5K1M01 - Coal Mill</div>
                    <span id="val_ind5_cm1"  class="TagData">
                    </span><span style="font-size: 18px"> %</span></div>
                <div class="row">
                    <div class="col-xs-1 content-plant" >
                        <div id="o_ind5_cm1" class="fa fa-power-off fa-2x onzi-two"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-6 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #f76767; border-bottom: 3px solid #f76767;" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName" style="font-size: 11px;">5Z1M01 - Finish Mill</div>
                    <span id="val_ind5_fm1" class="TagData" style="font-size: 18px;">
                    </span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div id="o_ind5_fm1" class="fa fa-power-off fa-2x onzi-two"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-bottom: 3px solid #f76767;">
                <div class="col-xs-10" style="text-align: center;"><div class="TagName" style="font-size: 11px;">5Z2M01 - Finish Mill</div>
                    <span id="val_ind5_fm2" class="TagData" style="font-size: 18px;">
                    </span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div id="o_ind5_fm2" class="fa fa-power-off fa-2x onzi-two"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-3 noPadding" style="width:20%">
        <div class="col-xs-12 noPadding plant-head"  style="background-color: #d03fff;">
            <div class="col-xs-4" style="background-color: #d03fff; height: 90px;"> 
                <img src="media/icon/factor2.png" class="img-up">
            </div>
            <div class="col-xs-8"><p class="p-plant">INDARUNG</p><br><p class="p-numb">6</p></div>                  
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #d03fff;" >
                <div class="col-xs-11" style="text-align: center;"><div class="TagName">6R1M01 - Raw Mill</div>
                    <span id="val_ind6_rm1" class="TagData">
                    </span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-1 content-plant" >
                        <div id="o_ind6_rm1" class="fa fa-power-off fa-2x onzi-two"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #d03fff;" >
                <div class="col-xs-11" style="text-align: center;"><div class="TagName">6W1W01 - Kiln</div>
                    <span id="val_ind6_kl1"  class="TagData">
                    </span><span style="font-size: 18px"> %</span></div>
                <div class="row">
                    <div class="col-xs-1 content-plant" >
                        <div id="o_ind6_kl1" class="fa fa-power-off fa-2x onzi-two"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #d03fff;" >
                <div class="col-xs-11" style="text-align: center;"><div class="TagName">6K1M01 - Coal Mill</div>
                    <span id="val_ind6_cm1"  class="TagData">
                    </span><span style="font-size: 18px"> %</span></div>
                <div class="row">
                    <div class="col-xs-1 content-plant" >
                        <div id="o_ind6_cm1" class="fa fa-power-off fa-2x onzi-two"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #d03fff;border-bottom:3px solid #d03fff;" >
                <div class="col-xs-11" style="text-align: center;"><div class="TagName">6Z1M01 - Finish Mill</div>
                    <span id="val_ind6_fm1"  class="TagData">
                    </span><span style="font-size: 18px"> %</span></div>
                <div class="row">
                    <div class="col-xs-1 content-plant" >
                        <div id="o_ind6_fm1" class="fa fa-power-off fa-2x onzi-two"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function dataUpdate() {
        $.ajax({
            url: 'http://par4digma.semenindonesia.com/api/index.php/plant_padang/get_state',
            type: 'GET',
            success: function (data) {
                var data1 = data.replace("<title>Json</title>", "");
                var data2 = data1.replace("(", "[");
                var data3 = data2.replace(");", "]");
                var dataJson = JSON.parse(data3);
                
                //Raw Mill
                ind2_rm1 = dataJson.values[0];
                ind3_rm1 = dataJson.values[1];
                ind4_rm1 = dataJson.values[2];
                ind4_rm2 = dataJson.values[3];
                ind5_rm1 = dataJson.values[4];
                ind5_rm2 = dataJson.values[5];
                ind6_rm1 = dataJson.values[21];


                if (ind2_rm1 == '1') {
                    $("#o_ind2_rm1").addClass('OnPadang');
                } else {
                    $("#o_ind2_rm1").addClass('OffPadang');
                }
                if (ind3_rm1 == '1') {
                    $("#o_ind3_rm1").addClass('OnPadang');
                } else {
                    $("#o_ind3_rm1").addClass('OffPadang');
                }
                if (ind4_rm1 == '1') {
                    $("#o_ind4_rm1").addClass('OnPadang');
                } else {
                    $("#o_ind4_rm1").addClass('OffPadang');
                }
                if (ind4_rm2 == '1') {
                    $("#o_ind4_rm2").addClass('OnPadang');
                } else {
                    $("#o_ind4_rm2").addClass('OffPadang');
                }
                if (ind5_rm1 == '32768') {
                    $("#o_ind5_rm1").addClass('OnPadang');
                } else {
                    $("#o_ind5_rm1").addClass('OffPadang');
                }
                if (ind5_rm2 == '32768') {
                    $("#o_ind5_rm2").addClass('OnPadang');
                } else {
                    $("#o_ind5_rm2").addClass('OffPadang');
                }
                if (ind6_rm1 === 1) {
                    $("#o_ind6_rm1").addClass('OnPadang');
                } else {
                    $("#o_ind6_rm1").addClass('OffPadang');
                }

                //Coal Mill
                ind2_cm1 = dataJson.values[10];
                ind3_cm1 = dataJson.values[11];
                ind4_cm1 = dataJson.values[12];
                ind4_cm2 = dataJson.values[13];
                ind5_cm1 = dataJson.values[14];

                if (ind2_cm1 == '1') {
                    $("#o_ind2_cm1").addClass('OnPadang');
                } else {
                    $("#o_ind2_cm1").addClass('OffPadang');
                }
                if (ind3_cm1 == '1') {
                    $("#o_ind3_cm1").addClass('OnPadang');
                } else {
                    $("#o_ind3_cm1").addClass('OffPadang');
                }
                if (ind4_cm1 == '1') {
                    $("#o_ind4_cm1").addClass('OnPadang');
                } else {
                    $("#o_ind4_cm1").addClass('OffPadang');
                }
                if (ind4_cm2 == '1') {
                    $("#o_ind4_cm2").addClass('OnPadang');
                } else {
                    $("#o_ind4_cm2").addClass('OffPadang');
                }
                if (ind5_cm1 == '32768') {
                    $("#o_ind5_cm1").addClass('OnPadang');
                } else {
                    $("#o_ind5_cm1").addClass('OffPadang');
                }
                if (ind6_cm1 === 1) {
                    $("#o_ind6_cm1").addClass('OnPadang');
                } else {
                    $("#o_ind6_cm1").addClass('OffPadang');
                }

                //KILN
                ind2_kl1 = dataJson.values[6];
                ind3_kl1 = dataJson.values[7];
                ind4_kl1 = dataJson.values[8];
                ind5_kl1 = dataJson.values[9];
                ind6_kl1 = dataJson.values[22];


                if (ind2_kl1 == '1') {
                    $("#o_ind2_kl1").addClass('OnPadang');
                } else {
                    $("#o_ind2_kl1").addClass('OffPadang');
                }
                if (ind3_kl1 == '1') {
                    $("#o_ind3_kl1").addClass('OnPadang');
                } else {
                    $("#o_ind3_kl1").addClass('OffPadang');
                }
                if (ind4_kl1 == '1') {
                    $("#o_ind4_kl1").addClass('OnPadang');
                } else {
                    $("#o_ind4_kl1").addClass('OffPadang');
                }
                if (ind5_kl1 == '32768') {
                    $("#o_ind5_kl1").addClass('OnPadang');
                } else {
                    $("#o_ind5_kl1").addClass('OffPadang');
                }
                if (ind6_kl1 === 1) {
                    $("#o_ind6_kl1").addClass('OnPadang');
                } else {
                    $("#o_ind6_kl1").addClass('OffPadang');
                }

                //Finish Mill
                ind2_fm1 = dataJson.values[15];
                ind3_fm1 = dataJson.values[16];
                ind4_fm1 = dataJson.values[17];
                ind4_fm2 = dataJson.values[18];
                ind5_fm1 = dataJson.values[19];
                ind5_fm2 = dataJson.values[20];
                ind6_fm1 = dataJson.values[24];

                
                if (ind2_fm1 == '1') {
                    $("#o_ind2_fm1").addClass('OnPadang');
                } else {
                    $("#o_ind2_fm1").addClass('OffPadang');
                }
                if (ind3_fm1 == '1') {
                    $("#o_ind3_fm1").addClass('OnPadang');
                } else {
                    $("#o_ind3_fm1").addClass('OffPadang');
                }
                if (ind4_fm1 == '1') {
                    $("#o_ind4_fm1").addClass('OnPadang');
                } else {
                    $("#o_ind4_fm1").addClass('OffPadang');
                }
                if (ind4_fm2 == '1') {
                    $("#o_ind4_fm2").addClass('OnPadang');
                } else {
                    $("#o_ind4_fm2").addClass('OffPadang');
                }
                if (ind5_fm1 == '32768') {
                    $("#o_ind5_fm1").addClass('OnPadang');
                } else {
                    $("#o_ind5_fm1").addClass('OffPadang');
                }
                if (ind5_fm2 == '32768') {
                    $("#o_ind5_fm2").addClass('OnPadang');
                } else {
                    $("#o_ind5_fm2").addClass('OffPadang');
                }
                if (ind6_fm1 === 1) {
                    $("#o_ind6_fm1").addClass('OnPadang');
                } else {
                    $("#o_ind6_fm1").addClass('OffPadang');
                }

            }
        }).done(function (data) {}).fail(function () {

        });
        
        $.ajax({
            url: 'http://par4digma.semenindonesia.com/api/index.php/plant_padang/get_feed',
            type: 'GET',
            success: function (data) {
                var data1 = data.replace("<title>Json</title>", "");
                var data2 = data1.replace("(", "[");
                var data3 = data2.replace(");", "]");
                var dataJson = JSON.parse(data3);

                //Raw Mill
                ind2_rm1 = parseFloat(dataJson.values[0]).toFixed(2);
                ind3_rm1 = parseFloat(dataJson.values[1]).toFixed(2);
                ind4_rm1 = parseFloat(dataJson.values[2]).toFixed(2);
                ind4_rm2 = parseFloat(dataJson.values[3]).toFixed(2);
                ind5_rm1 = parseFloat(dataJson.values[4]).toFixed(2);
                ind5_rm2 = parseFloat(dataJson.values[5]).toFixed(2);
                ind6_rm1 = parseFloat(dataJson.values[21]).toFixed(2);

                $("#val_ind2_rm1").html(ind2_rm1);
                $("#val_ind3_rm1").html(ind3_rm1);
                $("#val_ind4_rm1").html(ind4_rm1);
                $("#val_ind4_rm2").html(ind4_rm2);
                $("#val_ind5_rm1").html(ind5_rm1);
                $("#val_ind5_rm2").html(ind5_rm2);
                $("#val_ind6_rm1").html(ind6_rm1);
                //KILN
                ind2_kl1 = parseFloat(dataJson.values[6]).toFixed(2);
                ind3_kl1 = parseFloat(dataJson.values[7]).toFixed(2);
                ind4_kl1 = parseFloat(dataJson.values[8]).toFixed(2);
                ind5_kl1 = parseFloat(dataJson.values[9]).toFixed(2);
                ind6_kl1 = parseFloat(dataJson.values[22]).toFixed(2);

                $("#val_ind2_kl1").html(ind2_kl1);
                $("#val_ind3_kl1").html(ind3_kl1);
                $("#val_ind4_kl1").html(ind4_kl1);
                $("#val_ind5_kl1").html(ind5_kl1);
                $("#val_ind6_kl1").html(ind6_kl1);

                //Coal Mill
                ind2_cm1 = parseFloat(dataJson.values[10]).toFixed(2);
                ind3_cm1 = parseFloat(dataJson.values[11]).toFixed(2);
                ind4_cm1 = parseFloat(dataJson.values[12]).toFixed(2);
                ind4_cm2 = parseFloat(dataJson.values[13]).toFixed(2);
                ind5_cm1 = parseFloat(dataJson.values[14]).toFixed(2);
                ind6_cm1 = parseFloat(dataJson.values[23]).toFixed(2);

                $("#val_ind2_cm1").html(ind2_cm1);
                $("#val_ind3_cm1").html(ind3_cm1);
                $("#val_ind4_cm1").html(ind4_cm1);
                $("#val_ind4_cm2").html(ind4_cm2);
                $("#val_ind5_cm1").html(ind5_cm1);
                $("#val_ind6_cm1").html(ind6_cm1);

                //Finish Mill
                ind2_fm1 = parseFloat(dataJson.values[15]).toFixed(2);
                ind3_fm1 = parseFloat(dataJson.values[16]).toFixed(2);
                ind4_fm1 = parseFloat(dataJson.values[17]).toFixed(2);
                ind4_fm2 = parseFloat(dataJson.values[18]).toFixed(2);
                ind5_fm1 = parseFloat(dataJson.values[19]).toFixed(2);
                ind5_fm2 = parseFloat(dataJson.values[20]).toFixed(2);
                ind6_fm1 = parseFloat(dataJson.values[24]).toFixed(2);

                $("#val_ind2_fm1").html(ind2_fm1);
                $("#val_ind3_fm1").html(ind3_fm1);
                $("#val_ind4_fm1").html(ind4_fm1);
                $("#val_ind4_fm2").html(ind4_fm2);
                $("#val_ind5_fm1").html(ind5_fm1);
                $("#val_ind5_fm2").html(ind5_fm2);
                $("#val_ind6_fm1").html(ind6_fm1);

                
            }
        }).done(function (data) {}).fail(function () {

        });
    };
    setInterval(dataUpdate, 1000);
</script>