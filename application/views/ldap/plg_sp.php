<html lang="en" utf-8>
    <title>Welcome to PIS</title>
    <head>
        <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/plantView/bootstrap3.3.5/css/bootstrap.css"><link>
        <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/plantView/bootstrap3.3.5/css/bootstrap.min.css"><link>
        <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/plantView/fontA/css/font-awesome.css"><link>
        <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/plantView/fontA/css/font-awesome.min.css"><link>
        <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/plantView/dist/css/AdminLTE.css"><link>
        <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/plantView/dist/css/AdminLTE.min.css"><link>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>bootstrap/plantView/master_opc/js/opc-lib-min.js"></script>
    </head>
    <script>
        OPC_config = {
            token: '7e61b230-481d-4551-b24b-ba9046e3d8f2',
            serverURL: 'http://10.15.3.146:58725'
        };
    </script>
    <style>
        /* Thumbnail Box */
        .caption h4 {
            font-size: 1rem;
            color: #444;
        }
        .caption p {
            font-size: 0.75rem;
            color: #999;
        }
        .btn.btn-mini {
            font-size: 0.63rem;
        }
        /* Carousel Control */
        .control-box {
            text-align: center;
            width: 100%;
        }
        .carousel-control{
            text-align:center;
            background: #3c8dbc;
            border: 0px;
            border-radius: 5px;
            display: inline-block;
            font-size: 34px;
            font-weight: 200;
            line-height: 18px;
            opacity: 0.5;
            padding: 1px 1px 1px 1px;
            position: static;
            height: 30px;
            width: 30px;
        }
        /* Footer */
        .footer {
            margin: auto;
            width: 100%;
            max-width: 960px;
            display: block;
            font-size: 0.69rem;
        }
        .footer, .footer a {
            color: #c9e4f7;
        }
        p.right  { 
            float: right; 
        }
        /* Mobile Only */
        @media (max-width: 767px) {
            .page-header, .control-box {
                text-align: center;
            } 
        }
        @media (max-width: 479px) {
            .caption {
                word-break: break-all;
            }
        }
        /* ADD-ON
        -------------------------------------------------- */
        ::selection { background: #ff5e99; color: #FFFFFF; text-shadow: 0; }
        ::-moz-selection { background: #ff5e99; color: #FFFFFF; }

        a, a:focus, a:active, a:hover, object, embed { outline: none; }
        :-moz-any-link:focus { outline: none; }
        input::-moz-focus-inner { border: 0; }
        .tittleops{
            text-align: center;
            border-bottom: 1px solid #ecd8d5;
            font-size: x-large;
        }
        .noPadding{
            padding-top:1px;
            padding-left:1px;
            padding-right:1px;
            padding-bottom:1px;
        }
        .colPadding{
            padding-left: 0px;
            padding-right: 0px;
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
        .TagName{
            font-size: 12px;
            color: #656565;
        }
        .TagData{
            font-size: 26px;
            color: #312828;
        }
        .scale{
            transition: all .2s ease-in-out;
            transition-property: all;
            transition-duration: .2s;
            transition-timing-function: ease-in-out;
            transition-delay: initial;
        }
        .scale:hover{
            transform: scale(1.1);
        }
        .tab-content{
            color: #3c8dbc; 
        }
        .pad-one{
            padding: 1px;
        }
        .fright{
            text-align: right;
        }
        .fleft{
            text-align: left;
        }
        .img-logos{
            width: 38px;
            margin: auto;
            display: block;
            margin-top: 5px;
            margin-bottom: 5px;
        }
        .tittle-logos{
            margin-top: 7px;
        }
        .inex{
            font-size: 25px;
            font-weight: bold;
            padding-right: 12px;
        }
        .titl{
            /*background-color: #c53a27;*/
            padding: 9px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.59);
            font-size: 12px;
            margin-bottom: 10px;
        }
        .box{
            /*background-color: #e54b37;*/ 
            padding: 0px; 
            margin-bottom:10px;
            display: inline-block;
            max-width: 100%;
            height: auto;
            margin: auto;
            min-height: 110px;
            border-radius: 6px;
            /* margin-right: 1px; */
            border: 2px solid rgb(255, 255, 255);
        }
        .box_by2{
            /*background-color: #e54b37;*/ 
            padding: 0px; 
            margin-bottom:10px;
            display: inline-block;
            max-width: 100%;
            height: auto;
            margin: auto;
            min-height: 110px;
            border-radius: 6px;
            /* margin-right: 1px; */
            border: 2px solid rgb(255, 255, 255);
        }
        .bagan:hover, .bagan:visited {
            opacity: 0.6;
        }
        .titab{
            padding: 16px;
            font-size: 14px;
            font-weight: 500;
        }
        #footer {
            position:fixed;
            left:0px;
            bottom:0px;
            height:30px;
            width:100%;
            background:#999;
        }
        .blink_me {
            animation: blinker 1s linear infinite;
        }
        @keyframes blinker {  
            50% { opacity: 0; }
        }
        .OnPadang {
            background-color: #6fc962;
        }
        .OnPadangx {
            background-color: #54a846;
        }
        .OffPadang {
            background-color: #e54b37;
        }
        .OffPadangx {
            background-color: #c53a27;
        }
        .valOPC {
            color: white;
            font-size: xx-large;
        }
    </style>
    <body>
        <div class="row">
            <!-- SEMEN PADANG -->
            <div class="item">
                <div class="col-sm-12 col-xs-12  " >

                    <div class="small-box " style="background-image: url(<?php echo base_url(); ?>media/full-pattern.png);    background-size: 15%; background-repeat: repeat-y; background-color: #f9f9f9; color: #4e4e4e;  border: 1px #e4e4e4 solid; margin-bottom: 5px;">
                        <div class="row">
                            <div class="col-sm-1 col-xs-12  " ><img src="<?php echo base_url(); ?>media/icKota2.png" class="img-logos"></div>
                            <div class="col-sm-11 col-xs-12  " >
                                <div class="col-xs-8 tittle-logos" style="font-size: 23px; font-weight: bold; font-family: Segoe UI;">PADANG CEMENT</div>
                                <div class="col-xs-4 tittle-logos" style="font-size: 23px; font-weight: bold; font-family: Segoe UI; text-align: right;"><a id="login_sp" class="blink_me"href="<?php echo base_url(); ?>ldap_access/login">LOGIN</a></div>
                            </div>
                        </div>
                    </div>			
                </div>
                <div class="col-sm-3 col-xs-12  ">
                    <div class="col-xs-12">
                        <div align="center" style="margin-bottom: 10px;">
                            <div class="tittleops"><b>Indarung II</b> Operation</div>
                            <div class="col-xs-6 box" id="oo_ind2_rm1">
                                <div class="col-xs-12 noPadding titl" id="o_ind2_rm1">
                                    <span style="float:left">Raw Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                    <div><h1 class="valOPC" id="val_ind2_rm1"></h1></div>
                                </div>
                            </div>
                            <div class="col-xs-6 box" id="oo_ind2_cm1">
                                <div class="col-xs-12 noPadding titl" id="o_ind2_cm1">
                                    <span style="float:left">Coal Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                    <div><h1 class="valOPC" id="val_ind2_cm1"></h1></div>
                                </div>
                            </div>
                            <div class="col-xs-6 box" id="oo_ind2_kl1">
                                <div class="col-xs-12 noPadding titl" id="o_ind2_kl1">
                                    <span style="float:left">Kiln</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                    <div><h1 class="valOPC" id="val_ind2_kl1"></h1></div>
                                </div>
                            </div>
                            <div class="col-xs-6 box" id="oo_ind2_fm1">
                                <div class="col-xs-12 noPadding titl" id="o_ind2_fm1">
                                    <span style="float:left">Finish Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                    <div><h1 class="valOPC" id="val_ind2_fm1"></h1></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12  ">
                    <div class="col-xs-12">
                        <div align="center" style="margin-bottom: 10px;">
                            <div class="tittleops"><b>Indarung III</b> Operation</div>
                            <div class="col-xs-6 box" id="oo_ind3_rm1">
                                <div class="col-xs-12 noPadding titl" id="o_ind3_rm1">
                                    <span style="float:left">Raw Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                    <div><h1 class="valOPC" id="val_ind3_rm1"></h1></div>
                                </div>
                            </div>
                            <div class="col-xs-6 box" id="oo_ind3_cm1">
                                <div class="col-xs-12 noPadding titl" id="o_ind3_cm1">
                                    <span style="float:left">Coal Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                    <div><h1 class="valOPC" id="val_ind3_cm1"></h1></div>
                                </div>
                            </div>
                            <div class="col-xs-6 box" id="oo_ind3_kl1">
                                <div class="col-xs-12 noPadding titl" id="o_ind3_kl1">
                                    <span style="float:left">Kiln</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                    <div><h1 class="valOPC" id="val_ind3_kl1"></h1></div>
                                </div>
                            </div>
                            <div class="col-xs-6 box" id="oo_ind3_fm1">
                                <div class="col-xs-12 noPadding titl" id="o_ind3_fm1">
                                    <span style="float:left">Finish Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                    <div><h1 class="valOPC" id="val_ind3_fm1"></h1></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12  ">
                    <div class="col-xs-12">
                        <div align="center" style="margin-bottom: 10px;">
                            <div class="tittleops"><b>Indarung IV</b> Operation</div>
                            <div class="col-xs-6 colPadding">
                                <div class="col-xs-6 box noPadding" id="oo_ind4_rm1">
                                    <div class="col-xs-12 noPadding titl" id="o_ind4_rm1">
                                        <span style="float:left">Raw Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                        <div><h1 class="valOPC" id="val_ind4_rm1"></h1></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 colPadding">
                                <div class="col-xs-6 box noPadding" id="oo_ind4_rm2">
                                    <div class="col-xs-12 noPadding titl" id="o_ind4_rm2">
                                        <span style="float:left">Raw Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                        <div><h1 class="valOPC" id="val_ind4_rm2"></h1></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 colPadding">
                                <div class="col-xs-3 box" id="oo_ind4_cm1">
                                    <div class="col-xs-12 noPadding titl" id="o_ind4_cm1">
                                        <span style="float:left">Coal Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                        <div><h1 class="valOPC" id="val_ind4_cm1"></h1></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 colPadding">
                                <div class="col-xs-3 box" id="oo_ind4_cm2">
                                    <div class="col-xs-12 noPadding titl" id="o_ind4_cm2">
                                        <span style="float:left">Coal Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                        <div><h1 class="valOPC" id="val_ind4_cm2"></h1></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 box" id="oo_ind4_kl1">
                                <div class="col-xs-12 noPadding titl" id="o_ind4_kl1">
                                    <span style="float:left">Kiln</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                    <div><h1 class="valOPC" id="val_ind4_kl1"></h1></div>
                                </div>
                            </div>
                            <!--CONTOH DUAL SLIDE-->
                            <div class="col-xs-6 colPadding">
                                <div class="col-xs-6 box" id="oo_ind4_fm1">
                                    <div class="col-xs-12 noPadding titl" id="o_ind4_fm1">
                                        <span style="float:left">Finish Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                        <div><h1 class="valOPC" id="val_ind4_fm1"></h1></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 colPadding">
                                <div class="col-xs-6 box" id="oo_ind4_fm2">
                                    <div class="col-xs-12 noPadding titl" id="o_ind4_fm2">
                                        <span style="float:left">Finish Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                        <div><h1 class="valOPC" id="val_ind4_fm2"></h1></div>
                                    </div>
                                </div>
                            </div>
                            <!--END CONTOH DUAL SLIDE-->
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12  ">
                    <div class="col-xs-12">
                        <div align="center" style="margin-bottom: 10px;">
                            <div class="tittleops"><b>Indarung V</b> Operation</div>
                            <div class="col-xs-6 colPadding">
                                <div class="col-xs-3 box" id="oo_ind5_rm1">
                                    <div class="col-xs-12 noPadding titl" id="o_ind5_rm1">
                                        <span style="float:left">Raw Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                        <div><h1 class="valOPC" id="val_ind5_rm1"></h1></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 colPadding">
                                <div class="col-xs-3 box" id="oo_ind5_rm2">
                                    <div class="col-xs-12 noPadding titl" id="o_ind5_rm2">
                                        <span style="float:left">Raw Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                        <div><h1 class="valOPC" id="val_ind5_rm2"></h1></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 box" id="oo_ind5_cm1">
                                <div class="col-xs-12 noPadding titl" id="o_ind5_cm1">
                                    <span style="float:left">Coal Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                    <div><h1 class="valOPC" id="val_ind5_cm1"></h1></div>
                                </div>
                            </div>
                            <div class="col-xs-6 box" id="oo_ind5_kl1">
                                <div class="col-xs-12 noPadding titl" id="o_ind5_kl1">
                                    <span style="float:left">Kiln</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                    <div><h1 class="valOPC" id="val_ind5_kl1"></h1></div>
                                </div>
                            </div>
                            <div class="col-xs-6 colPadding">
                                <div class="col-xs-3 box" id="oo_ind5_fm1">
                                    <div class="col-xs-12 noPadding titl" id="o_ind5_fm1">
                                        <span style="float:left">Finish Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                        <div><h1 class="valOPC" id="val_ind5_fm1"></h1></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 colPadding">
                                <div class="col-xs-3 box" id="oo_ind5_fm2">
                                    <div class="col-xs-12 noPadding titl" id="o_ind5_fm2">
                                        <span style="float:left">Finish Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                        <div><h1 class="valOPC" id="val_ind5_fm2"></h1></div>
                                    </div>
                                </div>
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

                        if (ind2_rm1 == '1') {
                            $("#o_ind2_rm1").addClass('OnPadang');
                            $("#oo_ind2_rm1").addClass('OnPadangx');

                            $("#o_ind2_rm1").removeClass('OffPadang');
                            $("#oo_ind2_rm1").removeClass('OffPadangx');
                        } else {
                            $("#o_ind2_rm1").addClass('OffPadang');
                            $("#oo_ind2_rm1").addClass('OffPadangx');

                            $("#o_ind2_rm1").removeClass('OnPadang');
                            $("#oo_ind2_rm1").removeClass('OnPadangx');
                        }
                        if (ind3_rm1 == '1') {
                            $("#o_ind3_rm1").addClass('OnPadang');
                            $("#oo_ind3_rm1").addClass('OnPadangx');

                            $("#o_ind3_rm1").removeClass('OffPadang');
                            $("#oo_ind3_rm1").removeClass('OffPadangx');
                        } else {
                            $("#o_ind3_rm1").addClass('OffPadang');
                            $("#oo_ind3_rm1").addClass('OffPadangx');

                            $("#o_ind3_rm1").removeClass('OnPadang');
                            $("#oo_ind3_rm1").removeClass('OnPadangx');
                        }
                        if (ind4_rm1 == '1') {
                            $("#o_ind4_rm1").addClass('OnPadang');
                            $("#oo_ind4_rm1").addClass('OnPadangx');

                            $("#o_ind4_rm1").removeClass('OffPadang');
                            $("#oo_ind4_rm1").removeClass('OffPadangx');
                        } else {
                            $("#o_ind4_rm1").addClass('OffPadang');
                            $("#oo_ind4_rm1").addClass('OffPadangx');

                            $("#o_ind4_rm1").removeClass('OnPadang');
                            $("#oo_ind4_rm1").removeClass('OnPadangx');
                        }
                        if (ind4_rm2 == '1') {
                            $("#o_ind4_rm2").addClass('OnPadang');
                            $("#oo_ind4_rm2").addClass('OnPadangx');

                            $("#o_ind4_rm2").removeClass('OffPadang');
                            $("#oo_ind4_rm2").removeClass('OffPadangx');
                        } else {
                            $("#o_ind4_rm2").addClass('OffPadang');
                            $("#oo_ind4_rm2").addClass('OffPadangx');

                            $("#o_ind4_rm2").removeClass('OnPadang');
                            $("#oo_ind4_rm2").removeClass('OnPadangx');
                        }
                        if (ind5_rm1 == '32768') {
                            $("#o_ind5_rm1").addClass('OnPadang');
                            $("#oo_ind5_rm1").addClass('OnPadangx');

                            $("#o_ind5_rm1").removeClass('OffPadang');
                            $("#oo_ind5_rm1").removeClass('OffPadangx');
                        } else {
                            $("#o_ind5_rm1").addClass('OffPadang');
                            $("#oo_ind5_rm1").addClass('OffPadangx');

                            $("#o_ind5_rm1").removeClass('OnPadang');
                            $("#oo_ind5_rm1").removeClass('OnPadangx');
                        }
                        if (ind5_rm2 == '32768') {
                            $("#o_ind5_rm2").addClass('OnPadang');
                            $("#oo_ind5_rm2").addClass('OnPadangx');

                            $("#o_ind5_rm2").removeClass('OffPadang');
                            $("#oo_ind5_rm2").removeClass('OffPadangx');
                        } else {
                            $("#o_ind5_rm2").addClass('OffPadang');
                            $("#oo_ind5_rm2").addClass('OffPadangx');

                            $("#o_ind5_rm2").removeClass('OnPadang');
                            $("#oo_ind5_rm2").removeClass('OnPadangx');
                        }
                        //Coal Mill
                        ind2_cm1 = dataJson.values[10];
                        ind3_cm1 = dataJson.values[11];
                        ind4_cm1 = dataJson.values[12];
                        ind4_cm2 = dataJson.values[13];
                        ind5_cm1 = dataJson.values[14];

                        if (ind2_cm1 == '1') {
                            $("#o_ind2_cm1").addClass('OnPadang');
                            $("#oo_ind2_cm1").addClass('OnPadangx');

                            $("#o_ind2_cm1").removeClass('OffPadang');
                            $("#oo_ind2_cm1").removeClass('OffPadangx');
                        } else {
                            $("#o_ind2_cm1").addClass('OffPadang');
                            $("#oo_ind2_cm1").addClass('OffPadangx');

                            $("#o_ind2_cm1").removeClass('OnPadang');
                            $("#oo_ind2_cm1").removeClass('OnPadangx');
                        }
                        if (ind3_cm1 == '1') {
                            $("#o_ind3_cm1").addClass('OnPadang');
                            $("#oo_ind3_cm1").addClass('OnPadangx');

                            $("#o_ind3_cm1").removeClass('OffPadang');
                            $("#oo_ind3_cm1").removeClass('OffPadangx');
                        } else {
                            $("#o_ind3_cm1").addClass('OffPadang');
                            $("#oo_ind3_cm1").addClass('OffPadangx');

                            $("#o_ind3_cm1").removeClass('OnPadang');
                            $("#oo_ind3_cm1").removeClass('OnPadangx');
                        }
                        if (ind4_cm1 == '1') {
                            $("#o_ind4_cm1").addClass('OnPadang');
                            $("#oo_ind4_cm1").addClass('OnPadangx');

                            $("#o_ind4_cm1").removeClass('OffPadang');
                            $("#oo_ind4_cm1").removeClass('OffPadangx');
                        } else {
                            $("#o_ind4_cm1").addClass('OffPadang');
                            $("#oo_ind4_cm1").addClass('OffPadangx');

                            $("#o_ind4_cm1").removeClass('OnPadang');
                            $("#oo_ind4_cm1").removeClass('OnPadangx');
                        }
                        if (ind4_cm2 == '1') {
                            $("#o_ind4_cm2").addClass('OnPadang');
                            $("#oo_ind4_cm2").addClass('OnPadangx');

                            $("#o_ind4_cm2").removeClass('OffPadang');
                            $("#oo_ind4_cm2").removeClass('OffPadangx');
                        } else {
                            $("#o_ind4_cm2").addClass('OffPadang');
                            $("#oo_ind4_cm2").addClass('OffPadangx');

                            $("#o_ind4_cm2").removeClass('OnPadang');
                            $("#oo_ind4_cm2").removeClass('OnPadangx');
                        }
                        if (ind5_cm1 == '32768') {
                            $("#o_ind5_cm1").addClass('OnPadang');
                            $("#oo_ind5_cm1").addClass('OnPadangx');

                            $("#o_ind5_cm1").removeClass('OffPadang');
                            $("#oo_ind5_cm1").removeClass('OffPadangx');
                        } else {
                            $("#o_ind5_cm1").addClass('OffPadang');
                            $("#oo_ind5_cm1").addClass('OffPadangx');

                            $("#o_ind5_cm1").removeClass('OnPadang');
                            $("#oo_ind5_cm1").removeClass('OnPadangx');
                        }
                        //KILN
                        ind2_kl1 = dataJson.values[6];
                        ind3_kl1 = dataJson.values[7];
                        ind4_kl1 = dataJson.values[8];
                        ind5_kl1 = dataJson.values[9];

                        if (ind2_kl1 == '1') {
                            $("#o_ind2_kl1").addClass('OnPadang');
                            $("#oo_ind2_kl1").addClass('OnPadangx');

                            $("#o_ind2_kl1").removeClass('OffPadang');
                            $("#oo_ind2_kl1").removeClass('OffPadangx');
                        } else {
                            $("#o_ind2_kl1").addClass('OffPadang');
                            $("#oo_ind2_kl1").addClass('OffPadangx');

                            $("#o_ind2_kl1").removeClass('OnPadang');
                            $("#oo_ind2_kl1").removeClass('OnPadangx');
                        }
                        if (ind3_kl1 == '1') {
                            $("#o_ind3_kl1").addClass('OnPadang');
                            $("#oo_ind3_kl1").addClass('OnPadangx');

                            $("#o_ind3_kl1").removeClass('OffPadang');
                            $("#oo_ind3_kl1").removeClass('OffPadangx');
                        } else {
                            $("#o_ind3_kl1").addClass('OffPadang');
                            $("#oo_ind3_kl1").addClass('OffPadangx');

                            $("#o_ind3_kl1").removeClass('OnPadang');
                            $("#oo_ind3_kl1").removeClass('OnPadangx');
                        }
                        if (ind4_kl1 == '1') {
                            $("#o_ind4_kl1").addClass('OnPadang');
                            $("#oo_ind4_kl1").addClass('OnPadangx');

                            $("#o_ind4_kl1").removeClass('OffPadang');
                            $("#oo_ind4_kl1").removeClass('OffPadangx');
                        } else {
                            $("#o_ind4_kl1").addClass('OffPadang');
                            $("#oo_ind4_kl1").addClass('OffPadangx');

                            $("#o_ind4_kl1").removeClass('OnPadang');
                            $("#oo_ind4_kl1").removeClass('OnPadangx');
                        }
                        if (ind5_kl1 == '32768') {
                            $("#o_ind5_kl1").addClass('OnPadang');
                            $("#oo_ind5_kl1").addClass('OnPadangx');

                            $("#o_ind5_kl1").removeClass('OffPadang');
                            $("#oo_ind5_kl1").removeClass('OffPadangx');
                        } else {
                            $("#o_ind5_kl1").addClass('OffPadang');
                            $("#oo_ind5_kl1").addClass('OffPadangx');

                            $("#o_ind5_kl1").removeClass('OnPadang');
                            $("#oo_ind5_kl1").removeClass('OnPadangx');
                        }
                        //Finish Mill
                        ind2_fm1 = dataJson.values[15];
                        ind3_fm1 = dataJson.values[16];
                        ind4_fm1 = dataJson.values[17];
                        ind4_fm2 = dataJson.values[18];
                        ind5_fm1 = dataJson.values[19];
                        ind5_fm2 = dataJson.values[20];

                        if (ind2_fm1 == '1') {
                            $("#o_ind2_fm1").addClass('OnPadang');
                            $("#oo_ind2_fm1").addClass('OnPadangx');

                            $("#o_ind2_fm1").removeClass('OffPadang');
                            $("#oo_ind2_fm1").removeClass('OffPadangx');
                        } else {
                            $("#o_ind2_fm1").addClass('OffPadang');
                            $("#oo_ind2_fm1").addClass('OffPadangx');

                            $("#o_ind2_fm1").removeClass('OnPadang');
                            $("#oo_ind2_fm1").removeClass('OnPadangx');
                        }
                        if (ind3_fm1 == '1') {
                            $("#o_ind3_fm1").addClass('OnPadang');
                            $("#oo_ind3_fm1").addClass('OnPadangx');

                            $("#o_ind3_fm1").removeClass('OffPadang');
                            $("#oo_ind3_fm1").removeClass('OffPadangx');
                        } else {
                            $("#o_ind3_fm1").addClass('OffPadang');
                            $("#oo_ind3_fm1").addClass('OffPadangx');

                            $("#o_ind3_fm1").removeClass('OnPadang');
                            $("#oo_ind3_fm1").removeClass('OnPadangx');
                        }
                        if (ind4_fm1 == '1') {
                            $("#o_ind4_fm1").addClass('OnPadang');
                            $("#oo_ind4_fm1").addClass('OnPadangx');

                            $("#o_ind4_fm1").removeClass('OffPadang');
                            $("#oo_ind4_fm1").removeClass('OffPadangx');
                        } else {
                            $("#o_ind4_fm1").addClass('OffPadang');
                            $("#oo_ind4_fm1").addClass('OffPadangx');

                            $("#o_ind4_fm1").removeClass('OnPadang');
                            $("#oo_ind4_fm1").removeClass('OnPadangx');
                        }
                        if (ind4_fm2 == '1') {
                            $("#o_ind4_fm2").addClass('OnPadang');
                            $("#oo_ind4_fm2").addClass('OnPadangx');

                            $("#o_ind4_fm2").removeClass('OffPadang');
                            $("#oo_ind4_fm2").removeClass('OffPadangx');
                        } else {
                            $("#o_ind4_fm2").addClass('OffPadang');
                            $("#oo_ind4_fm2").addClass('OffPadangx');

                            $("#o_ind4_fm2").removeClass('OnPadang');
                            $("#oo_ind4_fm2").removeClass('OnPadangx');
                        }
                        if (ind5_fm1 == '32768') {
                            $("#o_ind5_fm1").addClass('OnPadang');
                            $("#oo_ind5_fm1").addClass('OnPadangx');

                            $("#o_ind5_fm1").removeClass('OffPadang');
                            $("#oo_ind5_fm1").removeClass('OffPadangx');
                        } else {
                            $("#o_ind5_fm1").addClass('OffPadang');
                            $("#oo_ind5_fm1").addClass('OffPadangx');

                            $("#o_ind5_fm1").removeClass('OnPadang');
                            $("#oo_ind5_fm1").removeClass('OnPadangx');
                        }
                        if (ind5_fm2 == '32768') {
                            $("#o_ind5_fm2").addClass('OnPadang');
                            $("#oo_ind5_fm2").addClass('OnPadangx');

                            $("#o_ind5_fm2").removeClass('OffPadang');
                            $("#oo_ind5_fm2").removeClass('OffPadangx');
                        } else {
                            $("#o_ind5_fm2").addClass('OffPadang');
                            $("#oo_ind5_fm2").addClass('OffPadangx');

                            $("#o_ind5_fm2").removeClass('OnPadang');
                            $("#oo_ind5_fm2").removeClass('OnPadangx');
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

                        $("#val_ind2_rm1").html(ind2_rm1);
                        $("#val_ind3_rm1").html(ind3_rm1);
                        $("#val_ind4_rm1").html(ind4_rm1);
                        $("#val_ind4_rm2").html(ind4_rm2);
                        $("#val_ind5_rm1").html(ind5_rm1);
                        $("#val_ind5_rm2").html(ind5_rm2);
                        //KILN
                        ind2_kl1 = parseFloat(dataJson.values[6]).toFixed(2);
                        ind3_kl1 = parseFloat(dataJson.values[7]).toFixed(2);
                        ind4_kl1 = parseFloat(dataJson.values[8]).toFixed(2);
                        ind5_kl1 = parseFloat(dataJson.values[9]).toFixed(2);

                        $("#val_ind2_kl1").html(ind2_kl1);
                        $("#val_ind3_kl1").html(ind3_kl1);
                        $("#val_ind4_kl1").html(ind4_kl1);
                        $("#val_ind5_kl1").html(ind5_kl1);

                        //Coal Mill
                        ind2_cm1 = parseFloat(dataJson.values[10]).toFixed(2);
                        ind3_cm1 = parseFloat(dataJson.values[11]).toFixed(2);
                        ind4_cm1 = parseFloat(dataJson.values[12]).toFixed(2);
                        ind4_cm2 = parseFloat(dataJson.values[13]).toFixed(2);
                        ind5_cm1 = parseFloat(dataJson.values[14]).toFixed(2);

                        $("#val_ind2_cm1").html(ind2_cm1);
                        $("#val_ind3_cm1").html(ind3_cm1);
                        $("#val_ind4_cm1").html(ind4_cm1);
                        $("#val_ind4_cm2").html(ind4_cm2);
                        $("#val_ind5_cm1").html(ind5_cm1);

                        //Finish Mill
                        ind2_fm1 = parseFloat(dataJson.values[15]).toFixed(2);
                        ind3_fm1 = parseFloat(dataJson.values[16]).toFixed(2);
                        ind4_fm1 = parseFloat(dataJson.values[17]).toFixed(2);
                        ind4_fm2 = parseFloat(dataJson.values[18]).toFixed(2);
                        ind5_fm1 = parseFloat(dataJson.values[19]).toFixed(2);
                        ind5_fm2 = parseFloat(dataJson.values[20]).toFixed(2);

                        $("#val_ind2_fm1").html(ind2_fm1);
                        $("#val_ind3_fm1").html(ind3_fm1);
                        $("#val_ind4_fm1").html(ind4_fm1);
                        $("#val_ind4_fm2").html(ind4_fm2);
                        $("#val_ind5_fm1").html(ind5_fm1);
                        $("#val_ind5_fm2").html(ind5_fm2);

                    }
                }).done(function (data) {}).fail(function () {
                });
            }
            ;
            setInterval(dataUpdate, 1000);
        </script>
</html>