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
                <h3 style="text-align: left; padding-left: 12px; margin-top: 10px;">Emission Plant Rembang</h3>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff ">TLCC<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= base_url() ?>index.php/plant_padang/emission">Padang</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="active"><a href="<?= base_url() ?>index.php/plant_rembang/emission">Rembang</a></li>
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
<div class="col-xs-12 col-md-4 noPadding" >&nbsp;&nbsp;</div>
<div class="col-xs-12 col-md-4 noPadding plant_cover" >
    <div class="col-xs-12 noPadding plant-head" style="background-color: #ffa83c; height: 90px;">
        <div class="col-xs-4" style="background-color: #ffa83c; height: 90px;"> 
            <img src="media/icon/factor2.png" class="img-up">
        </div>
        <div class="col-xs-8"><p class="p-plant">TLCC</p><br><p class="p-numb">1</p></div>
    </div>
    <div class="col-xs-12 noPadding img-thumbnail" >
        <div class="row">
            <div class="col-xs-6">
                <p class="fnt10">Raw Mill Dust</p>
            </div>
            <div class="col-xs-3">
                <span id="ep_rm1" style="font-weight:bold;">0.00</span>
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
                <span id="ep_kl1"style="font-weight:bold;">0.00</span>
            </div>
            <div class="col-xs-3">
                <p class="fnt10">(in mg/Nm<sup>3</sup>) </p>
            </div>
        </div>
    </div>
</div>
<div class="col-xs-12 col-md-4 noPadding" >&nbsp;&nbsp;</div>
<script>
    function dataUpdate() {
        $.ajax({
            url: 'http://par4digma.semenindonesia.com/api/index.php/plant_rembang/get_emission',
            type: 'GET',
            success: function (data) {
                var data1 = data.replace("<title>Json</title>", "");
                var data2 = data1.replace("(", "[");
                var data3 = data2.replace(");", "]");
                var dataJson = JSON.parse(data3);

                //Value
                var ep_rm1 = parseFloat(dataJson[0].tags[0].props[0].val).toFixed(2);
                var ep_kl1 = parseFloat(dataJson[0].tags[1].props[0].val).toFixed(2);

                $("#ep_rm1").html(ep_rm1);
                $("#ep_kl1").html(ep_kl1);
            }
        }).done(function (data) {}).fail(function () {
        });
    }
    ;
    setInterval(dataUpdate, 1000);
</script>
