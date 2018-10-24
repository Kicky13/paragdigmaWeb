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
                <h3 style="text-align: left; padding-left: 12px; margin-top: 10px;">Emission Plant Overview</h3>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff ">Padang<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="active"><a href="<?= base_url() ?>index.php/plant_padang/emission">Padang</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_rembang/emission">Rembang</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_gresik/emission">Gresik</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_tonasa/emission">Tonasa</a></li>
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
            <div class="col-xs-8"><p class="p-plant">INDARUNG</p><br><p class="p-numb">2</p></div>
        </div>
        <div class="col-xs-12 noPadding img-thumbnail" >
            <div class="row">
                <div class="col-xs-6">
                    <p class="fnt10">2W1W01X3</p> 
                </div>
                <div class="col-xs-3">
                    <span id="silo_13" style="font-weight:bold;">
                        <p class="fnt14" id="ind2"></p>
                    </span>
                </div>
                <div class="col-xs-3">
                    <p class="fnt10">(mg/Nm<sup>3</sup>) </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-3 noPadding" >
        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-4" style="background-color: #53d0c0; height: 90px;"> 
                <img src="media/icon/factor2.png" class="img-up">
            </div>
            <div class="col-xs-8"><p class="p-plant">INDARUNG</p><br><p class="p-numb">3</p></div>					
        </div>
        <div class="col-xs-12 noPadding img-thumbnail" >
            <div class="row">
                <div class="col-xs-6">
                    <p class="fnt10">3W2W01X3</p>
                </div>
                <div class="col-xs-3">
                    <span id="silo_13" style="font-weight:bold;">
                        <p class="fnt14" id="ind3"></p>
                    </span>
                </div>
                <div class="col-xs-3">
                    <p class="fnt10">(in mg/Nm<sup>3</sup>) </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-3 noPadding" >
        <div class="col-xs-12 noPadding plant-head" >

            <div class="col-xs-4" style="background-color: #62a9f9; height: 90px;"> 
                <img src="media/icon/factor2.png" class="img-up">
            </div>
            <div class="col-xs-8"><p class="p-plant">INDARUNG</p><br><p class="p-numb">4</p></div>					
        </div>
        <div class="col-xs-12 noPadding img-thumbnail" >
            <div class="col-xs-6">
                <p class="fnt10">4J1P11X1_2</p>
            </div>
            <div class="col-xs-3" style="text-align:right;">
                <span id="silo_13" style="font-weight:bold;">
                    <p class="fnt14" id="ind41"></p>
                </span>
            </div>
            <div class="col-xs-3">
                <p class="fnt10">(in mg/Nm<sup>3</sup>) </p>
            </div>

        </div>
        <div class="col-xs-12 noPadding img-thumbnail" >
            <div class="col-xs-6">
                <p class="fnt10">4J1P11X1_2</p>
            </div>
            <div class="col-xs-3" style="text-align:right;">
                <span id="silo_13" style="font-weight:bold;">
                    <p class="fnt14" id="ind42"></p>
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
            <div class="col-xs-8"><p class="p-plant">INDARUNG</p><br><p class="p-numb">5</p></div>					
        </div>

        <div class="col-xs-12 noPadding img-thumbnail" >
            <div class="row">
                <div class="col-xs-6">
                    <p class="fnt10">5J1P01N3A02</p>
                </div>
                <div class="col-xs-3" style="text-align:right;">
                    <span id="silo_13" style="font-weight:bold;">
                        <p class="fnt14" id="ind5"></p>
                    </span>
                </div>
                <div class="col-xs-3">
                    <p class="fnt10">(in mg/Nm<sup>3</sup>) </p>
                </div>
            </div>						
        </div>
    </div>
</div>
<script>
    function dataUpdate() {
        $.ajax({
            url: 'http://par4digma.semenindonesia.com/api/index.php/plant_padang/get_emission',
            type: 'GET',
            success: function (data) {
                var data1 = data.replace("<title>Json</title>", "");
                var data2 = data1.replace("(", "[");
                var data3 = data2.replace(");", "]");
                var dataJson = JSON.parse(data3);

                var ind2 = [];
                var ind3 = [];
                var ind41 = [];
                var ind42 = [];
                var ind5 = [];

                ind2 = parseFloat(dataJson.values[0]).toFixed(2);
                ind3 = parseFloat(dataJson.values[1]).toFixed(2);
                ind41 = parseFloat(dataJson.values[2]).toFixed(2);
                ind42 = parseFloat(dataJson.values[3]).toFixed(2);
                ind5 = parseFloat(dataJson.values[4]).toFixed(2);

                $("#ind2").html(ind2);
                $("#ind3").html(ind3);
                $("#ind41").html(ind41);
                $("#ind42").html(ind42);
                $("#ind5").html(ind5);

                if (ind2 >= 80) {
                    $("#ind2").addClass('unsafe');
                    $("#ind2").addClass('blink_me');
                    $("#ind2").removeClass('safe');
                } else {
                    $("#ind2").addClass('safe');
                    $("#ind2").removeClass('unsafe');
                    $("#ind2").removeClass('blink_me');
                }
                
                if (ind3 >= 80) {
                    $("#ind3").addClass('unsafe');
                    $("#ind3").addClass('blink_me');
                    $("#ind3").removeClass('safe');
                } else {
                    $("#ind3").addClass('safe');
                    $("#ind3").removeClass('unsafe');
                    $("#ind3").removeClass('blink_me');
                }
                
                if (ind41 >= 80) {
                    $("#ind41").addClass('unsafe');
                    $("#ind41").addClass('blink_me');
                    $("#ind41").removeClass('safe');
                } else {
                    $("#ind41").addClass('safe');
                    $("#ind41").removeClass('unsafe');
                    $("#ind41").removeClass('blink_me');
                }
                
                if (ind42 >= 80) {
                    $("#ind42").addClass('unsafe');
                    $("#ind42").addClass('blink_me');
                    $("#ind42").removeClass('safe');
                } else {
                    $("#ind42").addClass('safe');
                    $("#ind42").removeClass('unsafe');
                    $("#ind42").removeClass('blink_me');
                }
                
                if (ind5 >= 80) {
                    $("#ind5").addClass('unsafe');
                    $("#ind5").addClass('blink_me');
                    $("#ind5").removeClass('safe');
                } else {
                    $("#ind5").addClass('safe');
                    $("#ind5").removeClass('unsafe');
                    $("#ind5").removeClass('blink_me');
                }
                
            }
        }).done(function (data) {}).fail(function () {

        });
    }
    ;
    setInterval(dataUpdate, 1000);
</script>