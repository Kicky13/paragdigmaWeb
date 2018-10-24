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
            <!-- SEMEN GRESIK -->
            <div class="item active">
                <div class="col-sm-12 col-xs-12  " >
                    <div class="small-box " style="background-image: url(<?php echo base_url(); ?>media/full-pattern.png);    background-size: 15%; background-repeat: repeat-y; background-color: #f9f9f9; color: #4e4e4e;  border: 1px #e4e4e4 solid; margin-bottom: 5px;">
                        <div class="row">
                            <div class="col-sm-1 col-xs-12  " ><img src="<?php echo base_url(); ?>media/icKota1.png" class="img-logos"></div>
                            <div class="col-sm-11 col-xs-12  " >
                                <div class="col-xs-8 tittle-logos" style="font-size: 23px; font-weight: bold; font-family: Segoe UI;">GRESIK CEMENT</div>
                                <div class="col-xs-4 tittle-logos" style="font-size: 23px; font-weight: bold; font-family: Segoe UI; text-align: right;"><a id="login_sg" class="blink_me" href="<?php echo base_url(); ?>ldap_access/login">LOGIN</a></div>
                            </div>
                        </div>
                    </div>			
                </div>
                <div class="col-sm-3 col-xs-12">
                    <div class="col-xs-12">
                        <div align="center" style="margin-bottom: 10px;">
                            <div class="tittleops"><b>Tuban I</b> Operation</div>
                            <div class="col-xs-6 box" id="oo_tb1_rm1">
                                <div class="col-xs-12 noPadding titl" id="o_tb1_rm1">
                                    <span style="float:left">Raw Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                    <div><h1 class="valOPC" id="vtb1_rm1"></h1></div>
                                </div>
                            </div>
                            <div class="col-xs-6 box" id="oo_tb1_cm1">
                                <div class="col-xs-12 noPadding titl" id="o_tb1_cm1">
                                    <span style="float:left">Coal Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                    <div><h1 class="valOPC" id="vtb1_cm1"></h1></div>
                                </div>
                            </div>
                            <div class="col-xs-6 box" id="oo_tb1_kl1">
                                <div class="col-xs-12 noPadding titl" id="o_tb1_kl1">
                                    <span style="float:left">Kiln</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                    <div><h1 class="valOPC" id="vtb1_kl1"></h1></div>
                                </div>
                            </div>
                            <div class="col-xs-6 box" id="oo_tb1_fm1">
                                <div class="col-xs-12 noPadding titl" id="o_tb1_fm1">
                                    <span style="float:left">Finish Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                    <div><h1 class="valOPC" id="vtb1_fm1"></h1></div>
                                </div>
                            </div>
                            <div class="col-xs-6 box" id="oo_tb1_fm2">
                                <div class="col-xs-12 noPadding titl" id="o_tb1_fm2">
                                    <span style="float:left">Finish Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                    <div><h1 class="valOPC" id="vtb1_fm2"></h1></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12  ">
                    <div class="col-xs-12">
                        <div align="center" style="margin-bottom: 10px;">
                            <div class="tittleops"><b>Tuban II</b> Operation</div>
                            <div class="col-xs-6 box" id="oo_tb2_rm1">
                                <div class="col-xs-12 noPadding titl" id="o_tb2_rm1">
                                    <span style="float:left">Raw Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                    <div><h1 class="valOPC" id="vtb2_rm1"></h1></div>
                                </div>
                            </div>
                            <div class="col-xs-6 box" id="oo_tb2_cm1">
                                <div class="col-xs-12 noPadding titl" id="o_tb2_cm1">
                                    <span style="float:left">Coal Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                    <div><h1 class="valOPC" id="vtb2_cm1"></h1></div>
                                </div>
                            </div>
                            <div class="col-xs-6 box" id="oo_tb2_kl1">
                                <div class="col-xs-12 noPadding titl" id="o_tb2_kl1">
                                    <span style="float:left">Kiln</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                    <div><h1 class="valOPC" id="vtb2_kl1"></h1></div>
                                </div>
                            </div>
                            <div class="col-xs-6 box" id="oo_tb2_fm1">
                                <div class="col-xs-12 noPadding titl" id="o_tb2_fm1">
                                    <span style="float:left">Finish Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                    <div><h1 class="valOPC" id="vtb2_fm1"></h1></div>
                                </div>
                            </div>
                            <div class="col-xs-6 box" id="oo_tb2_fm2">
                                <div class="col-xs-12 noPadding titl" id="o_tb2_fm2">
                                    <span style="float:left">Finish Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                    <div><h1 class="valOPC" id="vtb2_fm2"></h1></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12  ">
                    <div class="col-xs-12">
                        <div align="center" style="margin-bottom: 10px;">
                            <div class="tittleops"><b>Tuban III</b> Operation</div>
                            <div class="col-xs-6 box" id="oo_tb3_rm1">
                                <div class="col-xs-12 noPadding titl" id="o_tb3_rm1">
                                    <span style="float:left">Raw Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                    <div><h1 class="valOPC" id="RawFeed3" opc-tag-txt='{"tag":"RM3_Tuban_Feed.Value","config":{"formats":{"bad_q":"...","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                </div>
                            </div>
                            <div class="col-xs-6 box" id="oo_tb3_cm1">
                                <div class="col-xs-12 noPadding titl" id="o_tb3_cm1">
                                    <span style="float:left">Coal Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                    <div><h1 class="valOPC" id="Coal3Prod"  opc-tag-txt='{"tag":"Tuban 3\/4 Accessories.Coal_Mill3_Product.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                </div>
                            </div>
                            <div class="col-xs-6 box" id="oo_tb3_kl1">
                                <div class="col-xs-12 noPadding titl" id="o_tb3_kl1">
                                    <span style="float:left">Kiln</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                    <div><h1 class="valOPC" id="KilnFede3" opc-tag-txt='{"tag":"KL3_Tuban_Feed.Value","config":{"formats":{"bad_q":"...","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                </div>
                            </div>
                            <div class="col-xs-6 box" id="oo_tb3_fm1">
                                <div class="col-xs-12 noPadding titl" id="o_tb3_fm1">
                                    <span style="float:left">Finish Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                    <div><h1 class="valOPC" id="feed5" opc-tag-txt='{"tag":"FM5_Tuban_Feed.Value","config":{"formats":{"bad_q":"...","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                </div>
                            </div>
                            <div class="col-xs-6 box" id="oo_tb3_fm2">
                                <div class="col-xs-12 noPadding titl" id="o_tb3_fm2">
                                    <span style="float:left">Finish Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                    <div><h1 class="valOPC" id="feed6" opc-tag-txt='{"tag":"FM6_Tuban_Feed.Value","config":{"formats":{"bad_q":"...","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12  ">
                    <div class="col-xs-12">
                        <div align="center" style="margin-bottom: 10px;">
                            <div class="tittleops"><b>Tuban IV</b> Operation</div>
                            <div class="col-xs-6 box" id="oo_tb4_rm1">
                                <div class="col-xs-12 noPadding titl" id="o_tb4_rm1">
                                    <span style="float:left">Raw Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                    <div><h1 class="valOPC" id="RawFeed4" opc-tag-txt='{"tag":"RM4_Tuban_Feed.Value","config":{"formats":{"bad_q":"...","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                </div>
                            </div>
                            <div class="col-xs-6 box" id="oo_tb4_cm1">
                                <div class="col-xs-12 noPadding titl" id="o_tb4_cm1">
                                    <span style="float:left">Coal Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                    <div><h1 class="valOPC" id="Coal4Prod" opc-tag-txt='{"tag":"Tuban 3\/4 Accessories.Coal_Mill4_Product.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                </div>
                            </div>
                            <div class="col-xs-6 box" id="oo_tb4_kl1">
                                <div class="col-xs-12 noPadding titl" id="o_tb4_kl1">
                                    <span style="float:left">Kiln</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                    <div><h1 class="valOPC" id="KilnFede4"  opc-tag-txt='{"tag":"KL4_Tuban_Feed.Value","config":{"formats":{"bad_q":"...","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                </div>
                            </div>
                            <div class="col-xs-6 box" id="oo_tb4_fm1">
                                <div class="col-xs-12 noPadding titl" id="o_tb4_fm1">
                                    <span style="float:left">Finish Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                    <div><h1 class="valOPC" id="feed7" opc-tag-txt='{"tag":"FM7_Tuban_Feed.Value","config":{"formats":{"bad_q":"...","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                </div>
                            </div>
                            <div class="col-xs-6 box" id="oo_tb4_fm2">
                                <div class="col-xs-12 noPadding titl" id="o_tb4_fm2">
                                    <span style="float:left">Finish Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                    <div><h1 class="valOPC" id="feed8" opc-tag-txt='{"tag":"FM8_Tuban_Feed.Value","config":{"formats":{"bad_q":"...","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
        <script>
            function dataOnOff() {
                $.ajax({
                    url: 'http://par4digma.semenindonesia.com/api/index.php/plant_tuban/get_statefeed',
                    type: 'GET',
                    success: function (data) {
                        var data1 = data.replace("<title>Json</title>", "");
                        var data2 = data1.replace("(", "[");
                        var data3 = data2.replace(");", "]");
                        var dataJson = JSON.parse(data3);

                        //Raw Mill
                        tb3_rm1 = dataJson[0].tags[8].props[0].val;
                        tb4_rm1 = dataJson[0].tags[9].props[0].val;

                        if (tb3_rm1 == 'True') {
                            $("#o_tb3_rm1").addClass('OnPadang');
                            $("#oo_tb3_rm1").addClass('OnPadangx');

                            $("#o_tb3_rm1").removeClass('OffPadang');
                            $("#oo_tb3_rm1").removeClass('OffPadangx');
                        } else {
                            $("#o_tb3_rm1").addClass('OffPadang');
                            $("#oo_tb3_rm1").addClass('OffPadangx');

                            $("#o_tb3_rm1").removeClass('OnPadang');
                            $("#oo_tb3_rm1").removeClass('OnPadangx');
                        }
                        if (tb4_rm1 == 'True') {
                            $("#o_tb4_rm1").addClass('OnPadang');
                            $("#oo_tb4_rm1").addClass('OnPadangx');

                            $("#o_tb4_rm1").removeClass('OffPadang');
                            $("#oo_tb4_rm1").removeClass('OffPadangx');
                        } else {
                            $("#o_tb4_rm1").addClass('OffPadang');
                            $("#oo_tb4_rm1").addClass('OffPadangx');

                            $("#o_tb4_rm1").removeClass('OnPadang');
                            $("#oo_tb4_rm1").removeClass('OnPadangx');
                        }

                        //Coal Mill
                        tb3_cm1 = dataJson[0].tags[12].props[0].val;
                        tb4_cm1 = dataJson[0].tags[13].props[0].val;

                        if (tb3_cm1 == 'True') {
                            $("#o_tb3_cm1").addClass('OnPadang');
                            $("#oo_tb3_cm1").addClass('OnPadangx');

                            $("#o_tb3_cm1").removeClass('OffPadang');
                            $("#oo_tb3_cm1").removeClass('OffPadangx');
                        } else {
                            $("#o_tb3_cm1").addClass('OffPadang');
                            $("#oo_tb3_cm1").addClass('OffPadangx');

                            $("#o_tb3_cm1").removeClass('OnPadang');
                            $("#oo_tb3_cm1").removeClass('OnPadangx');
                        }
                        if (tb4_cm1 == 'True') {
                            $("#o_tb4_cm1").addClass('OnPadang');
                            $("#oo_tb4_cm1").addClass('OnPadangx');

                            $("#o_tb4_cm1").removeClass('OffPadang');
                            $("#oo_tb4_cm1").removeClass('OffPadangx');
                        } else {
                            $("#o_tb4_cm1").addClass('OffPadang');
                            $("#oo_tb4_cm1").addClass('OffPadangx');

                            $("#o_tb4_cm1").removeClass('OnPadang');
                            $("#oo_tb4_cm1").removeClass('OnPadangx');
                        }

                        //KILN
                        tb3_kl1 = dataJson[0].tags[10].props[0].val;
                        tb4_kl1 = dataJson[0].tags[11].props[0].val;

                        if (tb3_kl1 == 'True') {
                            $("#o_tb3_kl1").addClass('OnPadang');
                            $("#oo_tb3_kl1").addClass('OnPadangx');

                            $("#o_tb3_kl1").removeClass('OffPadang');
                            $("#oo_tb3_kl1").removeClass('OffPadangx');
                        } else {
                            $("#o_tb3_kl1").addClass('OffPadang');
                            $("#oo_tb3_kl1").addClass('OffPadangx');

                            $("#o_tb3_kl1").removeClass('OnPadang');
                            $("#oo_tb3_kl1").removeClass('OnPadangx');
                        }
                        if (tb4_kl1 == 'True') {
                            $("#o_tb4_kl1").addClass('OnPadang');
                            $("#oo_tb4_kl1").addClass('OnPadangx');

                            $("#o_tb4_kl1").removeClass('OffPadang');
                            $("#oo_tb4_kl1").removeClass('OffPadangx');
                        } else {
                            $("#o_tb4_kl1").addClass('OffPadang');
                            $("#oo_tb4_kl1").addClass('OffPadangx');

                            $("#o_tb4_kl1").removeClass('OnPadang');
                            $("#oo_tb4_kl1").removeClass('OnPadangx');
                        }

                        //Finish Mill
                        tb3_fm1 = dataJson[0].tags[14].props[0].val;//FM 5
                        tb3_fm2 = dataJson[0].tags[16].props[0].val;//FM 6
                        tb4_fm1 = dataJson[0].tags[15].props[0].val;//FM 7
                        tb4_fm2 = dataJson[0].tags[19].props[0].val;//FM 8

                        if (tb3_fm1 == 'True') {
                            $("#o_tb3_fm1").addClass('OnPadang');
                            $("#oo_tb3_fm1").addClass('OnPadangx');

                            $("#o_tb3_fm1").removeClass('OffPadang');
                            $("#oo_tb3_fm1").removeClass('OffPadangx');
                        } else {
                            $("#o_tb3_fm1").addClass('OffPadang');
                            $("#oo_tb3_fm1").addClass('OffPadangx');

                            $("#o_tb3_fm1").removeClass('OnPadang');
                            $("#oo_tb3_fm1").removeClass('OnPadangx');
                        }
                        if (tb3_fm2 == 'True') {
                            $("#o_tb3_fm2").addClass('OnPadang');
                            $("#oo_tb3_fm2").addClass('OnPadangx');

                            $("#o_tb3_fm2").removeClass('OffPadang');
                            $("#oo_tb3_fm2").removeClass('OffPadangx');
                        } else {
                            $("#o_tb3_fm2").addClass('OffPadang');
                            $("#oo_tb3_fm2").addClass('OffPadangx');

                            $("#o_tb3_fm2").removeClass('OnPadang');
                            $("#oo_tb3_fm2").removeClass('OnPadangx');
                        }
                        if (tb4_fm1 == 'True') {
                            $("#o_tb4_fm1").addClass('OnPadang');
                            $("#oo_tb4_fm1").addClass('OnPadangx');

                            $("#o_tb4_fm1").removeClass('OffPadang');
                            $("#oo_tb4_fm1").removeClass('OffPadangx');
                        } else {
                            $("#o_tb4_fm1").addClass('OffPadang');
                            $("#oo_tb4_fm1").addClass('OffPadangx');

                            $("#o_tb4_fm1").removeClass('OnPadang');
                            $("#oo_tb4_fm1").removeClass('OnPadangx');
                        }
                        if (tb4_fm2 == 'True') {
                            $("#o_tb4_fm2").addClass('OnPadang');
                            $("#oo_tb4_fm2").addClass('OnPadangx');

                            $("#o_tb4_fm2").removeClass('OffPadang');
                            $("#oo_tb4_fm2").removeClass('OffPadangx');
                        } else {
                            $("#o_tb4_fm2").addClass('OffPadang');
                            $("#oo_tb4_fm2").addClass('OffPadangx');

                            $("#o_tb4_fm2").removeClass('OnPadang');
                            $("#oo_tb4_fm2").removeClass('OnPadangx');
                        }

                    }
                }).done(function (data) {}).fail(function () {
                });


                $.ajax({
                    url: 'http://par4digma.semenindonesia.com/api/index.php/plant_tuban/get_statefeedtb12',
                    type: 'GET',
                    success: function (data) {
                        var data1 = data.replace("<title>Json</title>", "");
                        var data2 = data1.replace("(", "[");
                        var data3 = data2.replace(");", "]");
                        var dataJson = JSON.parse(data3);

                        //Raw Mill
                        tb1_rm1 = dataJson[0].tags[3].props[0].val;
                        tb2_rm1 = dataJson[0].tags[17].props[0].val;
                        vtb1_rm1 = dataJson[0].tags[1].props[0].val;
                        vtb2_rm1 = dataJson[0].tags[21].props[0].val;

                        if (tb1_rm1 == 'Run' || tb1_rm1 == 'True') {
                            $("#o_tb1_rm1").addClass('OnPadang');
                            $("#oo_tb1_rm1").addClass('OnPadangx');

                            $("#o_tb1_rm1").removeClass('OffPadang');
                            $("#oo_tb1_rm1").removeClass('OffPadangx');
                        } else {
                            $("#o_tb1_rm1").addClass('OffPadang');
                            $("#oo_tb1_rm1").addClass('OffPadangx');

                            $("#o_tb1_rm1").removeClass('OnPadang');
                            $("#oo_tb1_rm1").removeClass('OnPadangx');
                        }
                        if (tb2_rm1 == 'Run' || tb2_rm1 == 'True') {
                            $("#o_tb2_rm1").addClass('OnPadang');
                            $("#oo_tb2_rm1").addClass('OnPadangx');

                            $("#o_tb2_rm1").removeClass('OffPadang');
                            $("#oo_tb2_rm1").removeClass('OffPadangx');
                        } else {
                            $("#o_tb2_rm1").addClass('OffPadang');
                            $("#oo_tb2_rm1").addClass('OffPadangx');

                            $("#o_tb2_rm1").removeClass('OnPadang');
                            $("#oo_tb2_rm1").removeClass('OnPadangx');
                        }

                        $('#vtb1_rm1').html(vtb1_rm1);
                        $('#vtb2_rm1').html(vtb2_rm1);
                        //Coal Mill
                        tb1_cm1 = dataJson[0].tags[4].props[0].val;
                        tb2_cm1 = dataJson[0].tags[19].props[0].val;
                        vtb1_cm1 = 0;//dataJson[0].tags[6].props[0].val;
                        vtb2_cm1 = 0;//dataJson[0].tags[6].props[0].val;


                        if (tb1_cm1 == 'Run' || tb1_cm1 == 'True') {
                            $("#o_tb1_cm1").addClass('OnPadang');
                            $("#oo_tb1_cm1").addClass('OnPadangx');

                            $("#o_tb1_cm1").removeClass('OffPadang');
                            $("#oo_tb1_cm1").removeClass('OffPadangx');
                        } else {
                            $("#o_tb1_cm1").addClass('OffPadang');
                            $("#oo_tb1_cm1").addClass('OffPadangx');

                            $("#o_tb1_cm1").removeClass('OnPadang');
                            $("#oo_tb1_cm1").removeClass('OnPadangx');
                        }
                        if (tb2_cm1 == 'Run' || tb2_cm1 == 'True') {
                            $("#o_tb2_cm1").addClass('OnPadang');
                            $("#oo_tb2_cm1").addClass('OnPadangx');

                            $("#o_tb2_cm1").removeClass('OffPadang');
                            $("#oo_tb2_cm1").removeClass('OffPadangx');
                        } else {
                            $("#o_tb2_cm1").addClass('OffPadang');
                            $("#oo_tb2_cm1").addClass('OffPadangx');

                            $("#o_tb2_cm1").removeClass('OnPadang');
                            $("#oo_tb2_cm1").removeClass('OnPadangx');
                        }

                        $('#vtb1_cm1').html(vtb1_cm1);
                        $('#vtb2_cm1').html(vtb2_cm1);
                        //KILN
                        tb1_kl1 = dataJson[0].tags[10].props[0].val;
                        tb2_kl1 = dataJson[0].tags[25].props[0].val;
                        vtb1_kl1 = dataJson[0].tags[5].props[0].val;
                        x1 = dataJson[0].tags[18].props[0].val;
                        x2 = dataJson[0].tags[22].props[0].val;
                        vtb2_kl1 = parseFloat(x1) + parseFloat(x2);

                        if (tb1_kl1 == 'Run' || tb1_kl1 == 'True') {
                            $("#o_tb1_kl1").addClass('OnPadang');
                            $("#oo_tb1_kl1").addClass('OnPadangx');

                            $("#o_tb1_kl1").removeClass('OffPadang');
                            $("#oo_tb1_kl1").removeClass('OffPadangx');
                        } else {
                            $("#o_tb1_kl1").addClass('OffPadang');
                            $("#oo_tb1_kl1").addClass('OffPadangx');

                            $("#o_tb1_kl1").removeClass('OnPadang');
                            $("#oo_tb1_kl1").removeClass('OnPadangx');
                        }
                        if (tb2_kl1 == 'Run' || tb2_kl1 == 'True') {
                            $("#o_tb2_kl1").addClass('OnPadang');
                            $("#oo_tb2_kl1").addClass('OnPadangx');

                            $("#o_tb2_kl1").removeClass('OffPadang');
                            $("#oo_tb2_kl1").removeClass('OffPadangx');
                        } else {
                            $("#o_tb2_kl1").addClass('OffPadang');
                            $("#oo_tb2_kl1").addClass('OffPadangx');

                            $("#o_tb2_kl1").removeClass('OnPadang');
                            $("#oo_tb2_kl1").removeClass('OnPadangx');
                        }

                        $('#vtb1_kl1').html(vtb1_kl1);
                        $('#vtb2_kl1').html(vtb2_kl1);
                        //Finish Mill
                        tb1_fm1 = dataJson[0].tags[6].props[0].val;
                        tb1_fm2 = dataJson[0].tags[11].props[0].val;
                        tb2_fm1 = dataJson[0].tags[24].props[0].val;
                        tb2_fm2 = dataJson[0].tags[20].props[0].val;
                        vtb1_fm1 = dataJson[0].tags[13].props[0].val;
                        vtb1_fm2 = dataJson[0].tags[8].props[0].val;
                        vtb2_fm1 = dataJson[0].tags[23].props[0].val;
                        vtb2_fm2 = dataJson[0].tags[16].props[0].val;

                        if (tb1_fm1 == 'Run' || tb1_fm1 == 'True') {
                            $("#o_tb1_fm1").addClass('OnPadang');
                            $("#oo_tb1_fm1").addClass('OnPadangx');

                            $("#o_tb1_fm1").removeClass('OffPadang');
                            $("#oo_tb1_fm1").removeClass('OffPadangx');
                        } else {
                            $("#o_tb1_fm1").addClass('OffPadang');
                            $("#oo_tb1_fm1").addClass('OffPadangx');

                            $("#o_tb1_fm1").removeClass('OnPadang');
                            $("#oo_tb1_fm1").removeClass('OnPadangx');
                        }
                        if (tb1_fm2 == 'Run' || tb1_fm2 == 'True') {
                            $("#o_tb1_fm2").addClass('OnPadang');
                            $("#oo_tb1_fm2").addClass('OnPadangx');

                            $("#o_tb1_fm2").removeClass('OffPadang');
                            $("#oo_tb1_fm2").removeClass('OffPadangx');
                        } else {
                            $("#o_tb1_fm2").addClass('OffPadang');
                            $("#oo_tb1_fm2").addClass('OffPadangx');

                            $("#o_tb1_fm2").removeClass('OnPadang');
                            $("#oo_tb1_fm2").removeClass('OnPadangx');
                        }

                        if (tb2_fm1 == 'Run' || tb2_fm1 == 'True') {
                            $("#o_tb2_fm1").addClass('OnPadang');
                            $("#oo_tb2_fm1").addClass('OnPadangx');

                            $("#o_tb2_fm1").removeClass('OffPadang');
                            $("#oo_tb2_fm1").removeClass('OffPadangx');
                        } else {
                            $("#o_tb2_fm1").addClass('OffPadang');
                            $("#oo_tb2_fm1").addClass('OffPadangx');

                            $("#o_tb2_fm1").removeClass('OnPadang');
                            $("#oo_tb2_fm1").removeClass('OnPadangx');
                        }
                        if (tb1_fm2 == 'Run' || tb1_fm2 == 'True') {
                            $("#o_tb2_fm2").addClass('OnPadang');
                            $("#oo_tb2_fm2").addClass('OnPadangx');

                            $("#o_tb2_fm2").removeClass('OffPadang');
                            $("#oo_tb2_fm2").removeClass('OffPadangx');
                        } else {
                            $("#o_tb2_fm2").addClass('OffPadang');
                            $("#oo_tb2_fm2").addClass('OffPadangx');

                            $("#o_tb2_fm2").removeClass('OnPadang');
                            $("#oo_tb2_fm2").removeClass('OnPadangx');
                        }

                        $('#vtb1_fm1').html(vtb1_fm1);
                        $('#vtb1_fm2').html(vtb1_fm2);
                        $('#vtb2_fm1').html(vtb2_fm1);
                        $('#vtb2_fm2').html(vtb2_fm2);
                    }
                }).done(function (data) {}).fail(function () {
                });
            }
            ;
            setInterval(dataOnOff, 1000);
        </script>
</html>