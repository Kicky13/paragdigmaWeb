<script type="text/javascript" src="bootstrap/plantView/master_opc/js/opc-lib-min.js"></script>
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
    .fnt10{
        font-size:10px;
        font-weight:bold;
        text-align: center;
    }
    .fnt14{
        font-size:24px;
        font-weight:bold;
        text-align: center;
    }
    .blink_me {
        animation: blinker 1s linear infinite;
    }
    @keyframes blinker {  
        50% { opacity: 0; }
    }
    .safe {
        color: #54a846;
    }
    .unsafe{
        color: #c53a27;
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
                <h3 style="text-align: left; padding-left: 12px; margin-top: 10px;">Emission Plant Tonasa</h3>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff ">Tonasa<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= base_url() ?>index.php/plant_padang/emission">Padang</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_rembang/emission">Rembang</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_gresik/emission">Gresik</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="active"><a href="<?= base_url() ?>index.php/plant_tonasa/emission">Tonasa</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_tlcc/emission">TLCC</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>
<!--        batas-->
<div class="row plant_cover" style="padding-top: 23px;">
    <div class="col-xs-12 col-md-3 noPadding" >
        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-4" style="background-color: #ffa83c; height: 90px;"> 
                <img src="media/icon/factor2.png" class="img-up">
            </div>
            <div class="col-xs-8"><p class="p-plant">TONASA</p><br><p class="p-numb">2</p></div>
        </div>
        <div class="col-xs-12 noPadding img-thumbnail"  id="ep_kl2">
            <div class="col-xs-6">
                <p class="fnt10">Kiln</p>
            </div>
            <div class="col-xs-3">
                <span style="font-weight:bold;">
                    <p id="tns2_kle" class="fnt14"></p>
                </span>
            </div>
            <div class="col-xs-3">
                <p class="fnt10">(in mg/Nm<sup>3</sup>) </p>
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
        <div class="col-xs-12 noPadding img-thumbnail" id="ep_kl3">
            <div class="col-xs-6">
                <p class="fnt10">Kiln</p>
            </div>
            <div class="col-xs-3">
                <span style="font-weight:bold;">
                    <p id="tns3_kle" class="fnt14"></p>
                </span>
            </div>
            <div class="col-xs-3">
                <p class="fnt10">(in mg/Nm<sup>3</sup>) </p>
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
        <div class="col-xs-12 noPadding img-thumbnail" >
            <div class="col-xs-6">
                <p class="fnt10">Raw Mill 4.1</p>
            </div>
            <div class="col-xs-3" style="text-align:right;">
                <span id="silo_13" style="font-weight:bold;">
                    <p class="fnt14"></p>
                </span>
            </div>
            <div class="col-xs-3">
                <p class="fnt10">(in mg/Nm<sup>3</sup>) </p>
            </div>
        </div>
        <div class="col-xs-12 noPadding img-thumbnail" >
            <div class="col-xs-6">
                <p class="fnt10">Raw Mill 4.2</p>
            </div>
            <div class="col-xs-3" style="text-align:right;">
                <span id="silo_13" style="font-weight:bold;">
                    <p class="fnt14"></p>
                </span>
            </div>
            <div class="col-xs-3">
                <p class="fnt10">(in mg/Nm<sup>3</sup>) </p>
            </div>
        </div>
        <div class="col-xs-12 noPadding img-thumbnail" >
            <div class="col-xs-6">
                <p class="fnt10">Kiln</p>
            </div>
            <div class="col-xs-3">
                <span id="silo_13" style="font-weight:bold;">
                    <p class="fnt14"></p>
                </span>
            </div>
            <div class="col-xs-3">
                <p class="fnt10">(in mg/Nm<sup>3</sup>) </p>
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

        <div class="col-xs-12 noPadding img-thumbnail" >
            <div class="col-xs-6">
                <p class="fnt10">Raw Mill 5</p>
            </div>
            <div class="col-xs-3" style="text-align:right;">
                <span style="font-weight:bold;">
                    <p id="tns5_rme" class="fnt14"></p>
                </span>
            </div>
            <div class="col-xs-3">
                <p class="fnt10">(in %) </p>
                <!--<p class="fnt10">(in mg/Nm<sup>3</sup>) </p>-->
            </div>
        </div>
        <div class="col-xs-12 noPadding img-thumbnail" >
            <div class="col-xs-6">
                <p class="fnt10">Kiln</p>
            </div>
            <div class="col-xs-3" style="text-align:right;">
                <span style="font-weight:bold;">
                    <p id="tns5_kle" class="fnt14"></p>
                </span>
            </div>
            <div class="col-xs-3">
                <p class="fnt10">(in %) </p>
                <!--<p class="fnt10">(in mg/Nm<sup>3</sup>) </p>-->
            </div>
        </div>
    </div>
</div>
<script>
    function dataUpdate() {
        $.ajax({
            url: 'http://par4digma.semenindonesia.com/api/index.php/plant_tonasa/get_emission',
            type: 'GET',
            success: function (data) {
                var data1 = data.replace("<title>Json</title>", "");
                var data2 = data1.replace("(", "[");
                var data3 = data2.replace(");", "]");
                var dataJson = JSON.parse(data3);

                //Value
                var v_tns2_rme = parseFloat(dataJson[0].tags[2].props[0].val).toFixed(2);
                var v_tns2_kle = parseFloat(dataJson[0].tags[0].props[0].val).toFixed(2);
                var v_tns3_rme = parseFloat(dataJson[0].tags[3].props[0].val).toFixed(2);
                var v_tns3_kle = parseFloat(dataJson[0].tags[1].props[0].val).toFixed(2);

                var v_tns4_rme = parseFloat(dataJson[0].tags[4].props[0].val).toFixed(2);
                var v_tns4_kle = parseFloat(dataJson[0].tags[5].props[0].val).toFixed(2);
                var v_tns5_rme = parseFloat(dataJson[0].tags[6].props[0].val).toFixed(2);
                var v_tns5_kle = parseFloat(dataJson[0].tags[7].props[0].val).toFixed(2);

                $("#tns2_rme").html(v_tns2_rme);
                $("#tns2_kle").html(v_tns2_kle);
                $("#tns3_rme").html(v_tns3_rme);
                $("#tns3_kle").html(v_tns3_kle);

                $("#tns4_rme").html(v_tns4_rme);
                $("#tns4_kle").html(v_tns4_kle);
                $("#tns5_rme").html(v_tns5_rme);
                $("#tns5_kle").html(v_tns5_kle);

                if (v_tns2_kle >= 80) {
                    $("#tns2_kle").addClass('unsafe');
                    $("#tns2_kle").addClass('blink_me');
                    $("#tns2_kle").removeClass('safe');
                } else {
                    $("#tns2_kle").addClass('safe');
                    $("#tns2_kle").removeClass('unsafe');
                    $("#tns2_kle").removeClass('blink_me');
                }

                if (v_tns3_kle >= 80) {
                    $("#tns3_kle").addClass('unsafe');
                    $("#tns3_kle").addClass('blink_me');
                    $("#tns3_kle").removeClass('safe');
                } else {
                    $("#tns3_kle").addClass('safe');
                    $("#tns3_kle").removeClass('unsafe');
                    $("#tns3_kle").removeClass('blink_me');
                }

                if (v_tns5_rme >= 70) {
                    $("#tns5_rme").addClass('unsafe');
                    $("#tns5_rme").addClass('blink_me');
                    $("#tns5_rme").removeClass('safe');
                } else {
                    $("#tns5_rme").addClass('safe');
                    $("#tns5_rme").removeClass('unsafe');
                    $("#tns5_rme").removeClass('blink_me');
                }

                if (v_tns5_kle >= 70) {
                    $("#tns5_kle").addClass('unsafe');
                    $("#tns5_kle").addClass('blink_me');
                    $("#tns5_kle").removeClass('safe');
                } else {
                    $("#tns5_kle").addClass('safe');
                    $("#tns5_kle").removeClass('unsafe');
                    $("#tns5_kle").removeClass('blink_me');
                }
            }
        }).done(function (data) {}).fail(function () {
        });
    }
    ;
    setInterval(dataUpdate, 1000);
</script>