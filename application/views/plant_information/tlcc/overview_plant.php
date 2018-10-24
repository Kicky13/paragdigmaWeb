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
            url: 'http://par4digma.semenindonesia.com/api/index.php/plant_tlcc/get_statefeed',
            type: 'GET',
            success: function (data) {
                var data1 = data.replace("<title>Json</title>", "");
                var data2 = data1.replace("(", "[");
                var data3 = data2.replace(");", "]");
                var dataJson = JSON.parse(data3);

                //Value
                var tlcc_rm_v = parseFloat(dataJson[0].tags[0].props[0].val).toFixed(2);
                var tlcc_cm_v = parseFloat(dataJson[0].tags[1].props[0].val).toFixed(2);
                var tlcc_kl_v = parseFloat(dataJson[0].tags[2].props[0].val).toFixed(2);
                var tlcc_fm_v = parseFloat(dataJson[0].tags[3].props[0].val).toFixed(2);
                var tlcc_fmhcm_v = parseFloat(dataJson[0].tags[4].props[0].val).toFixed(2);
                
                $("#tlcc_rm1_f").html(tlcc_rm_v);
                $("#tlcc_cm1_f").html(tlcc_cm_v);
                $("#tlcc_kl1_f").html(tlcc_kl_v);
                $("#tlcc_fm1_f").html(tlcc_fm_v);
                $("#tlcc_fm2_f").html(tlcc_fmhcm_v);
                //Raw Mill
                tlcc_rm1 = dataJson[0].tags[5].props[0].val;

                if (tlcc_rm1 == 'True') {
                    $("#tlcc_rm1_s").addClass('OnPadang');

                    $("#tlcc_rm1_s").removeClass('OffPadang');
                } else {
                    $("#tlcc_rm1_s").addClass('OffPadang');

                    $("#tlcc_rm1_s").removeClass('OnPadang');
                }

                //Coal Mill
                tlcc_cm1 = dataJson[0].tags[6].props[0].val;

                if (tlcc_cm1 == 'True') {
                    $("#tlcc_cm1_s").addClass('OnPadang');

                    $("#tlcc_cm1_s").removeClass('OffPadang');
                } else {
                    $("#tlcc_cm1_s").addClass('OffPadang');

                    $("#tlcc_cm1_s").removeClass('OnPadang');
                }
                //KILN
                tlcc_kl1 = dataJson[0].tags[7].props[0].val;

                if (tlcc_kl1 == 'True') {
                    $("#tlcc_kl1_s").addClass('OnPadang');

                    $("#tlcc_kl1_s").removeClass('OffPadang');
                } else {
                    $("#tlcc_kl1_s").addClass('OffPadang');

                    $("#tlcc_kl1_s").removeClass('OnPadang');
                }

                //Finish Mill
                tlcc_fm1 = dataJson[0].tags[8].props[0].val;
                tlcc_fm2 = dataJson[0].tags[9].props[0].val;

                if (tlcc_fm1 == 'True') {
                    $("#tlcc_fm1_s").addClass('OnPadang');

                    $("#tlcc_fm1_s").removeClass('OffPadang');
                } else {
                    $("#tlcc_fm1_s").addClass('OffPadang');

                    $("#tlcc_fm1_s").removeClass('OnPadang');
                }
                
                if (tlcc_fm2 == 'True') {
                    $("#tlcc_fm2_s").addClass('OnPadang');

                    $("#tlcc_fm2_s").removeClass('OffPadang');
                } else {
                    $("#tlcc_fm2_s").addClass('OffPadang');

                    $("#tlcc_fm2_s").removeClass('OnPadang');
                }

            }
        }).done(function (data) {}).fail(function () {
        });
    }
    ;
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
                <h3 style="text-align: left; padding-left: 12px; margin-top: 10px;">Real Time Plant Overview</h3>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff ">Thanglong<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= base_url() ?>index.php/plant_gresik/offstate">Overall</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_padang/overview">Padang</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_rembang/overview">Rembang</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_gresik/overview">Tuban, Gresik, Cigading</a></li>
                            <li role="separator" class="divider"></li>

                            <li><a href="<?= base_url() ?>index.php/plant_tonasa/overview">Tonasa</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="active"><a href="<?= base_url() ?>index.php/plant_tlcc/overview">TLCC</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>
<!--        batas-->

<div class="row plant_cover">
    <div class="col-md-4"></div>
    <div class="col-xs-12 col-md-4 noPadding">
        <div class="col-xs-12 noPadding plant-head" style="background-color: #ffa83c; height: 90px;">
            <div class="col-xs-4" style="background-color: #ffa83c; height: 90px;"> 
                <img src="media/icon/factor2.png" class="img-up">
            </div>
            <div class="col-xs-8"><p class="p-plant">TLCC</p><br><p class="p-numb">1</p></div>					
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #ffa83c;" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">Raw Mill</div>
                    <span class="TagData" id="tlcc_rm1_f"></span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" style="width: 12%; float: right; margin-right: 10px">
                        <div class="fa fa-power-off fa-2x onzi" id="tlcc_rm1_s"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #ffa83c;" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">Kiln</div>
                    <span class="TagData" id="tlcc_kl1_f"></span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" style="width: 12%; float: right; margin-right: 10px">	
                        <div class="fa fa-power-off fa-2x onzi" id="tlcc_kl1_s"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #ffa83c;" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">Coal Mill</div>
                    <span class="TagData" id="tlcc_cm1_f"></span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" style="width: 12%; float: right; margin-right: 10px">
                        <div class="fa fa-power-off fa-2x onzi" id="tlcc_cm1_s"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #ffa83c;" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">Finish Mill MP</div>
                    <span class="TagData" id="tlcc_fm1_f" ></span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" style="width: 12%;float: right; margin-right: 10px">
                        <div class="fa fa-power-off fa-2x onzi" id="tlcc_fm1_s" ></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun" style="border-left: 3px solid #ffa83c; border-bottom: 3px solid #ffa83c;" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">Finish Mill HCM</div>
                    <span class="TagData" id="tlcc_fm2_f" ></span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" style="width: 12%;float: right; margin-right: 10px">
                        <div class="fa fa-power-off fa-2x onzi" id="tlcc_fm2_s" ></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>
