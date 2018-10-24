<script type="text/javascript" src="bootstrap/plantView/master_opc/js/opc-lib-min.js"></script>
<script>
    OPC_config = {
        token: '7e61b230-481d-4551-b24b-ba9046e3d8f2',
        serverURL: 'http://10.15.3.146:58725'
    };
</script>
<style>
    .fnt10{
        font-size:10px;
        font-weight:bold;
        text-align: center;
    }
    .noPadding{
        padding-top:1px;
        padding-left:1px;
        padding-right:1px;
        padding-bottom:1px;

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
                <h3 style="text-align: left; padding-left: 12px; margin-top: 10px;">Emission Plant Gresik</h3>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff ">Gresik<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= base_url() ?>index.php/plant_padang/emission">Padang</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_rembang/emission">Rembang</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="active"><a href="<?= base_url() ?>index.php/plant_gresik/emission">Gresik</a></li>
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
            <div class="col-xs-8"><p class="p-plant">TUBAN</p><br><p class="p-numb">1</p></div>
        </div>
        <div class="col-xs-12 noPadding img-thumbnail" >
            <div class="row">
                <div class="col-xs-6">
                    <p class="fnt10">Raw Mill</p>
                </div>
                <div class="col-xs-3">
                    <p class="fnt14"><?php echo $OnOff['964'][1] ?></p>
                </div>
                <div class="col-xs-3">
                    <p class="fnt10">(in mg/Nm<sup>3</sup>) </p>
                </div>
            </div>

        </div>
        <div class="col-xs-12 noPadding img-thumbnail" >
            <div class="row">
                <div class="col-xs-6">
                    <p class="fnt10">Kiln</p>
                </div>
                <div class="col-xs-3">
                    <p class="fnt14"><?php echo $OnOff['808'][1] ?></p>
                </div>
                <div class="col-xs-3">
                    <p class="fnt10">(in mg/Nm<sup>3</sup>) </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-3 noPadding" >

        <div class="col-xs-12 noPadding plant-head" >

            <div class="col-xs-4" style="background-color: #53d0c0; height: 90px;"> 
                <img src="media/icon/factor2.png" class="img-up">
            </div>
            <div class="col-xs-8"><p class="p-plant">TUBAN</p><br><p class="p-numb">2</p></div>					
        </div>

        <div class="col-xs-12 noPadding img-thumbnail" >
            <div class="row">
                <div class="col-xs-6">
                    <p class="fnt10">Raw Mill</p>
                </div>
                <div class="col-xs-3">
                    <p class="fnt14"><?php echo $OnOff['2932'][1] ?></p>
                </div>
                <div class="col-xs-3">
                    <p class="fnt10">(in mg/Nm<sup>3</sup>) </p>
                </div>
            </div>
        </div>

        <div class="col-xs-12 noPadding img-thumbnail" >
            <div class="row">
                <div class="col-xs-6">
                    <p class="fnt10">Kiln</p>
                </div>
                <div class="col-xs-3">
                    <p class="fnt14"><?php echo $OnOff['3389'][1] ?></p>
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
            <div class="col-xs-8"><p class="p-plant">TUBAN</p><br><p class="p-numb">3</p></div>					
        </div>
        <div class="col-xs-12 noPadding img-thumbnail" >
            <div class="row">
                <div class="col-xs-6">
                    <p class="fnt10">Raw Mill</p>
                </div>
                <div class="col-xs-3" style="text-align:right;">
                    <p class="fnt14" id="epraw3"
                       opc-tag-txt='{"tag":"RM3_Tuban_EP.Value","config":{"formats":{"bad_q":"...","bool_f":"False","bool_t":"True","float":"0.0","int":"0","string":"{0}"},"offset":0}}'>
                    </p>
                </div>
                <div class="col-xs-3">
                    <p class="fnt10">(in mg/Nm<sup>3</sup>) </p>
                </div>
            </div>
        </div>
        <div class="col-xs-12 noPadding img-thumbnail" >
            <div class="row">
                <div class="col-xs-6">
                    <p class="fnt10">Kiln</p>
                </div>
                <div class="col-xs-3" style="text-align:right;">
                    <p class="fnt14" id="epkiln3"
                       opc-tag-txt='{"tag":"KL3_Tuban_EP.Value","config":{"formats":{"bad_q":"...","bool_f":"False","bool_t":"True","float":"0.0","int":"0","string":"{0}"},"offset":0}}'>
                    </p>
                </div>
                <div class="col-xs-3">
                    <p class="fnt10">(in mg/Nm<sup>3</sup>) </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-3 noPadding" >


        <div class="col-xs-12 noPadding plant-head" >

            <div class="col-xs-4" style="background-color: #f76767; height: 90px;"> 
                <img src="media/icon/factor2.png" class="img-up">
            </div>
            <div class="col-xs-8"><p class="p-plant">TUBAN</p><br><p class="p-numb">4</p></div>					
        </div>

        <div class="col-xs-12 noPadding img-thumbnail" >
            <div class="row">
                <div class="col-xs-6">
                    <p class="fnt10">Raw Mill</p>
                </div>
                <div class="col-xs-3" style="text-align:right;">
                    <p class="fnt14"id="epraw4"
                       opc-tag-txt='{"tag":"RM4_Tuban_EP.Value","config":{"formats":{"bad_q":"...","bool_f":"False","bool_t":"True","float":"0.0","int":"0","string":"{0}"},"offset":0}}'>
                    </p>
                </div>
                <div class="col-xs-3">
                    <p class="fnt10">(in mg/Nm<sup>3</sup>) </p>
                </div>
            </div>						
        </div>

        <div class="col-xs-12 noPadding img-thumbnail" >
            <div class="row">
                <div class="col-xs-6">
                    <p class="fnt10">Kiln</p>
                </div>
                <div class="col-xs-3" style="text-align:right;">
                    <p class="fnt14"id="epkiln4"
                       opc-tag-txt='{"tag":"KL4_Tuban_EP.Value","config":{"formats":{"bad_q":"...","bool_f":"False","bool_t":"True","float":"0.0","int":"0","string":"{0}"},"offset":0}}'>
                    </p>
                </div>
                <div class="col-xs-3">
                    <p class="fnt10">(in mg/Nm<sup>3</sup>) </p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function update() {
        var e_rm3 = OPC.get_value("RM3_Tuban_EP.Value");
        var e_kl3 = OPC.get_value("KL3_Tuban_EP.Value");
        var e_rm4 = OPC.get_value("RM4_Tuban_EP.Value");
        var e_kl4 = OPC.get_value("KL4_Tuban_EP.Value");
        
        if (e_rm3 >= 80) {
            $("#epraw3").addClass('unsafe');
            $("#epraw3").addClass('blink_me');
            $("#epraw3").removeClass('safe');
        } else {
            $("#epraw3").addClass('safe');
            $("#epraw3").removeClass('unsafe');
            $("#epraw3").removeClass('blink_me');
        }
        
        if (e_kl3 >= 80) {
            $("#epkiln3").addClass('unsafe');
            $("#epkiln3").addClass('blink_me');
            $("#epkiln3").removeClass('safe');
        } else {
            $("#epkiln3").addClass('safe');
            $("#epkiln3").removeClass('unsafe');
            $("#epkiln3").removeClass('blink_me');
        }
        
        if (e_rm4 >= 80) {
            $("#epraw4").addClass('unsafe');
            $("#epraw4").addClass('blink_me');
            $("#epraw4").removeClass('safe');
        } else {
            $("#epraw4").addClass('safe');
            $("#epraw4").removeClass('unsafe');
            $("#epraw4").removeClass('blink_me');
        }
        
        if (e_kl4 >= 80) {
            $("#epkiln4").addClass('unsafe');
            $("#epkiln4").addClass('blink_me');
            $("#epkiln4").removeClass('safe');
        } else {
            $("#epkiln4").addClass('safe');
            $("#epkiln4").removeClass('unsafe');
            $("#epkiln4").removeClass('blink_me');
        }
    }
    setInterval(update, 1000);
</script>