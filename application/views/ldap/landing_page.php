<html lang="en" utf-8>
    <title>.:: PIS SMIG Plants ::.</title>
    <head>
        <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/plantView/bootstrap3.3.5/css/bootstrap.css"><link>
        <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/plantView/bootstrap3.3.5/css/bootstrap.min.css"><link>
        <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/plantView/fontA/css/font-awesome.css"><link>
        <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/plantView/fontA/css/font-awesome.min.css"><link>
        <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/plantView/dist/css/AdminLTE.css"><link>
        <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/plantView/dist/css/AdminLTE.min.css"><link>
        <script src="<?php echo base_url() ?>bootstrap/plantView/assets/js/jquery-1.12.4.js"></script>
        <script src="<?php echo base_url() ?>bootstrap/plantView/bootstrap3.3.5/js/bootstrap.min.js"></script>
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
        <!--<a href="<?php echo base_url(); ?>/ldap_access/index_login"><div>LOGIN</div></a>-->
        <!--        batas-->
        <div class="row">
            <div class="carousel slide" id="myCarousel">
                <div class="carousel-inner">
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
                    <!-- SEMEN TONASA -->
                    <div class="item">
                        <div class="col-sm-12 col-xs-12  " >

                            <div class="small-box " style="background-image: url(<?php echo base_url(); ?>media/full-pattern.png);    background-size: 15%; background-repeat: repeat-y; background-color: #f9f9f9; color: #4e4e4e;  border: 1px #e4e4e4 solid; margin-bottom: 5px;">
                                <div class="row">
                                    <div class="col-sm-1 col-xs-12  " ><img src="<?php echo base_url(); ?>media/icKota3.png" class="img-logos"></div>
                                    <div class="col-sm-11 col-xs-12  " >
                                        <div class="col-xs-8 tittle-logos" style="font-size: 23px; font-weight: bold; font-family: Segoe UI;">TONASA CEMENT</div>
                                        <div class="col-xs-4 tittle-logos" style="font-size: 23px; font-weight: bold; font-family: Segoe UI; text-align: right;"><a id="login_st" class="blink_me" href="<?php echo base_url(); ?>ldap_access/login">LOGIN</a></div>
                                    </div>
                                </div>
                            </div>			
                        </div>
                        <div class="col-sm-3 col-xs-12  ">
                            <div class="col-xs-12">
                                <div align="center" style="margin-bottom: 10px;">
                                    <div class="tittleops"><b>Tonasa II</b> Operation</div>
                                    <div class="col-xs-6 box" id="oo_tns2_rm1">
                                        <div class="col-xs-12 noPadding titl" id="o_tns2_rm1">
                                            <span style="float:left">Raw Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                            <div><h1 class="valOPC" id="tns2_rm1_f" opc-tag-txt='{"tag":"Tonasa 2\/3.RM1_TNS2_Feed.Value","config":{"formats":{"bad_q":"...","bool_f":"False","bool_t":"True","float":"0.0","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 box" id="oo_tns2_cm1">
                                        <div class="col-xs-12 noPadding titl" id="o_tns2_cm1">
                                            <span style="float:left">Coal Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                            <div><h1 class="valOPC" id="tns2_cm1_f" opc-tag-txt='{"tag":"Tonasa 2\/3.CM_TNS2_Feed.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 box" id="oo_tns2_kl1">
                                        <div class="col-xs-12 noPadding titl" id="o_tns2_kl1">
                                            <span style="float:left">Kiln</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                            <div><h1 class="valOPC" id="tns2_kl1_f" opc-tag-txt='{"tag":"Tonasa 2\/3.KL1_TNS2_Feed.Value","config":{"formats":{"bad_q":"...","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 box" id="oo_tns2_fm1">
                                        <div class="col-xs-12 noPadding titl" id="o_tns2_fm1">
                                            <span style="float:left">Finish Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                            <div><h1 class="valOPC" id="tns2_fm1_f" opc-tag-txt='{"tag":"Tonasa 2\/3.FM1_TNS2_Feed.Value","config":{"formats":{"bad_q":"...","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-12  ">
                            <div class="col-xs-12">
                                <div align="center" style="margin-bottom: 10px;">
                                    <div class="tittleops"><b>Tonasa III</b> Operation</div>
                                    <div class="col-xs-6 box" id="oo_tns3_rm1">
                                        <div class="col-xs-12 noPadding titl" id="o_tns3_rm1">
                                            <span style="float:left">Raw Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                            <div><h1 class="valOPC" id="tns3_rm1_f" opc-tag-txt='{"tag":"Tonasa 2\/3.RM1_TNS3_Feed.Value","config":{"formats":{"bad_q":"...","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 box" id="oo_tns3_cm1">
                                        <div class="col-xs-12 noPadding titl" id="o_tns3_cm1">
                                            <span style="float:left">Coal Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                            <div><h1 class="valOPC" id="tns3_cm1_f" opc-tag-txt='{"tag":"Tonasa 2\/3.CM_TNS3_Feed.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 box" id="oo_tns3_kl1">
                                        <div class="col-xs-12 noPadding titl" id="o_tns3_kl1">
                                            <span style="float:left">Kiln</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                            <div><h1 class="valOPC" id="tns3_kl1_f" opc-tag-txt='{"tag":"Tonasa 2\/3.KL1_TNS3_Feed.Value","config":{"formats":{"bad_q":"...","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 box" id="oo_tns3_fm1">
                                        <div class="col-xs-12 noPadding titl" id="o_tns3_fm1">
                                            <span style="float:left">Finish Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                            <div><h1 class="valOPC" id="tns3_fm1_f" opc-tag-txt='{"tag":"Tonasa 2\/3.FM1_TNS3_Feed.Value","config":{"formats":{"bad_q":"...","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-12  ">
                            <div class="col-xs-12">
                                <div align="center" style="margin-bottom: 10px;">
                                    <div class="tittleops"><b>Tonasa IV</b> Operation</div>
                                    <div class="col-xs-6 colPadding">
                                        <div class="col-xs-3 box" id="oo_tns4_rm1">
                                            <div class="col-xs-12 noPadding titl" id="o_tns4_rm1">
                                                <span style="float:left">Raw Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                                <div><h1 class="valOPC" id="tns4_rm1_f" opc-tag-txt='{"tag":"Tonasa 4.RM1_TNS4_Feed.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 colPadding">
                                        <div class="col-xs-3 box" id="oo_tns4_rm2">
                                            <div class="col-xs-12 noPadding titl" id="o_tns4_rm2">
                                                <span style="float:left">Raw Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                                <div><h1 class="valOPC" id="tns4_rm2_f" opc-tag-txt='{"tag":"Tonasa 4.RM2_TNS4_Feed.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 colPadding">
                                        <div class="col-xs-3 box" id="oo_tns4_cm1">
                                            <div class="col-xs-12 noPadding titl" id="o_tns4_cm1">
                                                <span style="float:left">Coal Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                                <div><h1 class="valOPC" id="tns4_cm1_f" opc-tag-txt='{"tag":"Tonasa 4.CM1_TNS4_Feed.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 colPadding">
                                        <div class="col-xs-3 box" id="oo_tns4_cm2">
                                            <div class="col-xs-12 noPadding titl" id="o_tns4_cm2">
                                                <span style="float:left">Coal Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                                <div><h1 class="valOPC" id="tns4_cm2_f" opc-tag-txt='{"tag":"Tonasa 4.CM2_TNS4_Feed.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 box" id="oo_tns4_kl1">
                                        <div class="col-xs-12 noPadding titl" id="o_tns4_kl1">
                                            <span style="float:left">Kiln</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                            <div><h1 class="valOPC" id="tns4_kl_f" opc-tag-txt='{"tag":"Tonasa 4.KL_TNS4_Feed.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 colPadding">
                                        <div class="col-xs-3 box" id="oo_tns4_fm1">
                                            <div class="col-xs-12 noPadding titl" id="o_tns4_fm1">
                                                <span style="float:left">Finish Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                                <div><h1 class="valOPC" id="tns4_fm1_f" opc-tag-txt='{"tag":"Tonasa 4.FM1_TNS4_Feed.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 colPadding">
                                        <div class="col-xs-3 box" id="oo_tns4_fm2">
                                            <div class="col-xs-12 noPadding titl" id="o_tns4_fm2">
                                                <span style="float:left">Finish Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                                <div><h1 class="valOPC" id="tns4_fm2_f" opc-tag-txt='{"tag":"Tonasa 4.FM2_TNS4_Feed.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-12  ">
                            <div class="col-xs-12">
                                <div align="center" style="margin-bottom: 10px;">
                                    <div class="tittleops"><b>Tonasa V</b> Operation</div>
                                    <div class="col-xs-6 box" id="oo_tns5_rm1">
                                        <div class="col-xs-12 noPadding titl" id="o_tns5_rm1">
                                            <span style="float:left">Raw Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                            <div><h1 class="valOPC" id="tns5_rm1_f" opc-tag-txt='{"tag":"Tonasa 5.RM_TNS5_Feed.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 box" id="oo_tns5_cm1">
                                        <div class="col-xs-12 noPadding titl" id="o_tns5_cm1">
                                            <span style="float:left">Coal Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                            <div><h1 class="valOPC" id="tns5_cm_f" opc-tag-txt='{"tag":"Tonasa 5.CM_TNS5_Feed.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 box" id="oo_tns5_kl1">
                                        <div class="col-xs-12 noPadding titl" id="o_tns5_kl1">
                                            <span style="float:left">Kiln</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                            <div><h1 class="valOPC" id="tns5_kl1_f" opc-tag-txt='{"tag":"Tonasa 5.KL_TNS5_Feed.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 colPadding">
                                        <div class="col-xs-3 box" id="oo_tns5_fm1">
                                            <div class="col-xs-12 noPadding titl" id="o_tns5_fm1">
                                                <span style="float:left">Finish Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                                <div><h1 class="valOPC" id="tns5_fm1_f" opc-tag-txt='{"tag":"Tonasa 5.FM1_TNS5_Feed.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 colPadding">
                                        <div class="col-xs-3 box" id="oo_tns5_fm2">
                                            <div class="col-xs-12 noPadding titl" id="o_tns5_fm2">
                                                <span style="float:left">Finish Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                                <div><h1 class="valOPC" id="tns5_fm2_f" opc-tag-txt='{"tag":"Tonasa 5.FM2_TNS5_Feed.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- SEMEN TLCC -->
                    <div class="item">
                        <div class="col-sm-12 col-xs-12  " >
                            <div class="small-box " style="background-image: url(<?php echo base_url(); ?>media/full-pattern.png);    background-size: 15%; background-repeat: repeat-y; background-color: #f9f9f9; color: #4e4e4e;  border: 1px #e4e4e4 solid; margin-bottom: 5px;">
                                <div class="row">
                                    <div class="col-sm-1 col-xs-12  " ><img src="<?php echo base_url(); ?>media/icKota4.png" class="img-logos"></div>
                                    <div class="col-sm-11 col-xs-12  " >
                                        <div class="col-xs-8 tittle-logos" style="font-size: 23px; font-weight: bold; font-family: Segoe UI;">TLCC CEMENT</div>
                                        <div class="col-xs-4 tittle-logos" style="font-size: 23px; font-weight: bold; font-family: Segoe UI; text-align: right;"><a id="login_tlcc" class="blink_me" href="<?php echo base_url(); ?>ldap_access/login">LOGIN</a></div>
                                    </div>
                                </div>
                            </div>			
                        </div>
                        <div class="col-lg-12" align="center">
                            <div class="col-sm-4 col-xs-4">&nbsp;</div>
                            <div class="col-sm-4 col-xs-4">
                                <div class="col-xs-12">
                                    <div align="center" style="margin-bottom: 10px;">
                                        <div class="tittleops"><b>Thang Long</b> Operation</div>
                                        <div class="col-xs-6 box" id="oo_tlcc_rm1">
                                            <div class="col-xs-12 noPadding titl" id="o_tlcc_rm1">
                                                <span style="float:left">Raw Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                                <div><h1 class="valOPC" id="tlcc_rm1_f" opc-tag-txt='{"tag":"TLCC.RM1_Feed.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 box" id="oo_tlcc_cm1">
                                            <div class="col-xs-12 noPadding titl" id="o_tlcc_cm1">
                                                <span style="float:left">Coal Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                                <div><h1 class="valOPC" id="tlcc_cm1_f" opc-tag-txt='{"tag":"TLCC.CM1_Feed.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 box" id="oo_tlcc_kl1">
                                            <div class="col-xs-12 noPadding titl" id="o_tlcc_kl1">
                                                <span style="float:left">Kiln</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                                <div><h1 class="valOPC" id="tlcc_kl1_f" opc-tag-txt='{"tag":"TLCC.KL1_Feed.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                            </div>
                                        </div>
                                        <!--<div class="col-xs-6 colPadding">-->
                                            <div class="col-xs-6 box" id="oo_tlcc_fm1">
                                                <div class="col-xs-12 noPadding titl" id="o_tlcc_fm1">
                                                    <span style="float:left">Finish Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                                    <div><h1 class="valOPC" id="tlcc_fm1_f" opc-tag-txt='{"tag":"TLCC.FM1_Feed.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                                </div>
                                            </div>
                                        <!--</div>-->
<!--                                        <div class="col-xs-6 colPadding">
                                            <div class="col-xs-6 box" id="oo_tlcc_fm2">
                                                <div class="col-xs-12 noPadding titl" id="o_tlcc_fm2">
                                                    <span style="float:left">Finish Mill</span><i class="fa fa-bars" aria-hidden="true" style="float:right"></i>
                                                    <div><h1 class="valOPC" id="tlcc_fm2_f" opc-tag-txt='{"tag":"TLCC.FM2_Feed.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'></h1></div>
                                                </div>
                                            </div>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-4">&nbsp;</div>
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
                    url: 'http://par4digma.semenindonesia.com/api/index.php/plant_tonasa/get_statefeed',
                    type: 'GET',
                    success: function (data) {
                        var data1 = data.replace("<title>Json</title>", "");
                        var data2 = data1.replace("(", "[");
                        var data3 = data2.replace(");", "]");
                        var dataJson = JSON.parse(data3);

                        //Raw Mill
                        tns2_rm1 = dataJson[0].tags[6].props[0].val;
                        tns3_rm1 = dataJson[0].tags[7].props[0].val;
                        tns4_rm1 = dataJson[0].tags[30].props[0].val;
                        tns4_rm2 = dataJson[0].tags[31].props[0].val;
                        tns5_rm1 = dataJson[0].tags[41].props[0].val;

                        if (tns2_rm1 == 'True') {
                            $("#o_tns2_rm1").addClass('OnPadang');
                            $("#oo_tns2_rm1").addClass('OnPadangx');
                            
                            $("#o_tns2_rm1").removeClass('OffPadang');
                            $("#oo_tns2_rm1").removeClass('OffPadangx');
                        } else {
                            $("#o_tns2_rm1").addClass('OffPadang');
                            $("#oo_tns2_rm1").addClass('OffPadangx');
                            
                            $("#o_tns2_rm1").removeClass('OnPadang');
                            $("#oo_tns2_rm1").removeClass('OnPadangx');
                        }
                        if (tns3_rm1 == 'True') {
                            $("#o_tns3_rm1").addClass('OnPadang');
                            $("#oo_tns3_rm1").addClass('OnPadangx');
                            
                            $("#o_tns3_rm1").removeClass('OffPadang');
                            $("#oo_tns3_rm1").removeClass('OffPadangx');
                        } else {
                            $("#o_tns3_rm1").addClass('OffPadang');
                            $("#oo_tns3_rm1").addClass('OffPadangx');
                            
                            $("#o_tns3_rm1").removeClass('OnPadang');
                            $("#oo_tns3_rm1").removeClass('OnPadangx');
                        }
                        if (tns4_rm1 == 'True') {
                            $("#o_tns4_rm1").addClass('OnPadang');
                            $("#oo_tns4_rm1").addClass('OnPadangx');
                            
                            $("#o_tns4_rm1").removeClass('OffPadang');
                            $("#oo_tns4_rm1").removeClass('OffPadangx');
                        } else {
                            $("#o_tns4_rm1").addClass('OffPadang');
                            $("#oo_tns4_rm1").addClass('OffPadangx');
                            
                            $("#o_tns4_rm1").removeClass('OnPadang');
                            $("#oo_tns4_rm1").removeClass('OnPadangx');
                        }
                        if (tns4_rm2 == 'True') {
                            $("#o_tns4_rm2").addClass('OnPadang');
                            $("#oo_tns4_rm2").addClass('OnPadangx');
                            
                            $("#o_tns4_rm2").removeClass('OffPadang');
                            $("#oo_tns4_rm2").removeClass('OffPadangx');
                        } else {
                            $("#o_tns4_rm2").addClass('OffPadang');
                            $("#oo_tns4_rm2").addClass('OffPadangx');
                            
                            $("#o_tns4_rm2").removeClass('OnPadang');
                            $("#oo_tns4_rm2").removeClass('OnPadangx');
                        }
                        if (tns5_rm1 == 'True') {
                            $("#o_tns5_rm1").addClass('OnPadang');
                            $("#oo_tns5_rm1").addClass('OnPadangx');
                            
                            $("#o_tns5_rm1").removeClass('OffPadang');
                            $("#oo_tns5_rm1").removeClass('OffPadangx');
                        } else {
                            $("#o_tns5_rm1").addClass('OffPadang');
                            $("#oo_tns5_rm1").addClass('OffPadangx');
                            
                            $("#o_tns5_rm1").removeClass('OnPadang');
                            $("#oo_tns5_rm1").removeClass('OnPadangx');
                        }

                        //Coal Mill
                        tns2_cm1 = dataJson[0].tags[0].props[0].val;
                        tns3_cm1 = dataJson[0].tags[1].props[0].val;
                        tns4_cm1 = dataJson[0].tags[25].props[0].val;
                        tns4_cm2 = dataJson[0].tags[26].props[0].val;
                        tns5_cm1 = dataJson[0].tags[37].props[0].val;

                        if (tns2_cm1 == 'True') {
                            $("#o_tns2_cm1").addClass('OnPadang');
                            $("#oo_tns2_cm1").addClass('OnPadangx');
                            
                            $("#o_tns2_cm1").removeClass('OffPadang');
                            $("#oo_tns2_cm1").removeClass('OffPadangx');
                        } else {
                            $("#o_tns2_cm1").addClass('OffPadang');
                            $("#oo_tns2_cm1").addClass('OffPadangx');
                            
                            $("#o_tns2_cm1").removeClass('OnPadang');
                            $("#oo_tns2_cm1").removeClass('OnPadangx');
                        }
                        if (tns3_cm1 == 'True') {
                            $("#o_tns3_cm1").addClass('OnPadang');
                            $("#oo_tns3_cm1").addClass('OnPadangx');
                            
                            $("#o_tns3_cm1").removeClass('OffPadang');
                            $("#oo_tns3_cm1").removeClass('OffPadangx');
                        } else {
                            $("#o_tns3_cm1").addClass('OffPadang');
                            $("#oo_tns3_cm1").addClass('OffPadangx');
                            
                            $("#o_tns3_cm1").removeClass('OnPadang');
                            $("#oo_tns3_cm1").removeClass('OnPadangx');
                        }
                        if (tns4_cm1 == 'True') {
                            $("#o_tns4_cm1").addClass('OnPadang');
                            $("#oo_tns4_cm1").addClass('OnPadangx');
                            
                            $("#o_tns4_cm1").removeClass('OffPadang');
                            $("#oo_tns4_cm1").removeClass('OffPadangx');
                        } else {
                            $("#o_tns4_cm1").addClass('OffPadang');
                            $("#oo_tns4_cm1").addClass('OffPadangx');
                            
                            $("#o_tns4_cm1").removeClass('OnPadang');
                            $("#oo_tns4_cm1").removeClass('OnPadangx');
                        }
                        if (tns4_cm2 == 'True') {
                            $("#o_tns4_cm2").addClass('OnPadang');
                            $("#oo_tns4_cm2").addClass('OnPadangx');
                            
                            $("#o_tns4_cm2").removeClass('OffPadang');
                            $("#oo_tns4_cm2").removeClass('OffPadangx');
                        } else {
                            $("#o_tns4_cm2").addClass('OffPadang');
                            $("#oo_tns4_cm2").addClass('OffPadangx');
                            
                            $("#o_tns4_cm2").removeClass('OnPadang');
                            $("#oo_tns4_cm2").removeClass('OnPadangx');
                        }
                        if (tns5_cm1 == 'True') {
                            $("#o_tns5_cm1").addClass('OnPadang');
                            $("#oo_tns5_cm1").addClass('OnPadangx');
                            
                            $("#o_tns5_cm1").removeClass('OffPadang');
                            $("#oo_tns5_cm1").removeClass('OffPadangx');
                        } else {
                            $("#o_tns5_cm1").addClass('OffPadang');
                            $("#oo_tns5_cm1").addClass('OffPadangx');
                            
                            $("#o_tns5_cm1").removeClass('OnPadang');
                            $("#oo_tns5_cm1").removeClass('OnPadangx');
                        }
                        //KILN
                        tns2_kl1 = dataJson[0].tags[4].props[0].val;
                        tns3_kl1 = dataJson[0].tags[5].props[0].val;
                        tns4_kl1 = dataJson[0].tags[29].props[0].val;
                        tns5_kl1 = dataJson[0].tags[40].props[0].val;

                        if (tns2_kl1 == 'True') {
                            $("#o_tns2_kl1").addClass('OnPadang');
                            $("#oo_tns2_kl1").addClass('OnPadangx');
                            
                            $("#o_tns2_kl1").removeClass('OffPadang');
                            $("#oo_tns2_kl1").removeClass('OffPadangx');
                        } else {
                            $("#o_tns2_kl1").addClass('OffPadang');
                            $("#oo_tns2_kl1").addClass('OffPadangx');
                            
                            $("#o_tns2_kl1").removeClass('OnPadang');
                            $("#oo_tns2_kl1").removeClass('OnPadangx');
                        }
                        if (tns3_kl1 == 'True') {
                            $("#o_tns3_kl1").addClass('OnPadang');
                            $("#oo_tns3_kl1").addClass('OnPadangx');
                            
                            $("#o_tns3_kl1").removeClass('OffPadang');
                            $("#oo_tns3_kl1").removeClass('OffPadangx');
                        } else {
                            $("#o_tns3_kl1").addClass('OffPadang');
                            $("#oo_tns3_kl1").addClass('OffPadangx');
                            
                            $("#o_tns3_kl1").removeClass('OnPadang');
                            $("#oo_tns3_kl1").removeClass('OnPadangx');
                        }
                        if (tns4_kl1 == 'True') {
                            $("#o_tns4_kl1").addClass('OnPadang');
                            $("#oo_tns4_kl1").addClass('OnPadangx');
                            
                            $("#o_tns4_kl1").removeClass('OffPadang');
                            $("#oo_tns4_kl1").removeClass('OffPadangx');
                        } else {
                            $("#o_tns4_kl1").addClass('OffPadang');
                            $("#oo_tns4_kl1").addClass('OffPadangx');
                            
                            $("#o_tns4_kl1").removeClass('OnPadang');
                            $("#oo_tns4_kl1").removeClass('OnPadangx');
                        }
                        if (tns5_kl1 == 'True') {
                            $("#o_tns5_kl1").addClass('OnPadang');
                            $("#oo_tns5_kl1").addClass('OnPadangx');
                            
                            $("#o_tns5_kl1").removeClass('OffPadang');
                            $("#oo_tns5_kl1").removeClass('OffPadangx');
                        } else {
                            $("#o_tns5_kl1").addClass('OffPadang');
                            $("#oo_tns5_kl1").addClass('OffPadangx');
                            
                            $("#o_tns5_kl1").removeClass('OnPadang');
                            $("#oo_tns5_kl1").removeClass('OnPadangx');
                        }
                        //Finish Mill
                        tns2_fm1 = dataJson[0].tags[2].props[0].val;
                        tns3_fm1 = dataJson[0].tags[3].props[0].val;
                        tns4_fm1 = dataJson[0].tags[27].props[0].val;
                        tns4_fm2 = dataJson[0].tags[28].props[0].val;
                        tns5_fm1 = dataJson[0].tags[38].props[0].val;
                        tns5_fm2 = dataJson[0].tags[39].props[0].val;

                        if (tns2_fm1 == 'True') {
                            $("#o_tns2_fm1").addClass('OnPadang');
                            $("#oo_tns2_fm1").addClass('OnPadangx');
                            
                            $("#o_tns2_fm1").removeClass('OffPadang');
                            $("#oo_tns2_fm1").removeClass('OffPadangx');
                        } else {
                            $("#o_tns2_fm1").addClass('OffPadang');
                            $("#oo_tns2_fm1").addClass('OffPadangx');
                            
                            $("#o_tns2_fm1").removeClass('OnPadang');
                            $("#oo_tns2_fm1").removeClass('OnPadangx');
                        }
                        if (tns3_fm1 == 'True') {
                            $("#o_tns3_fm1").addClass('OnPadang');
                            $("#oo_tns3_fm1").addClass('OnPadangx');
                            
                            $("#o_tns3_fm1").removeClass('OffPadang');
                            $("#oo_tns3_fm1").removeClass('OffPadangx');
                        } else {
                            $("#o_tns3_fm1").addClass('OffPadang');
                            $("#oo_tns3_fm1").addClass('OffPadangx');
                            
                            $("#o_tns3_fm1").removeClass('OnPadang');
                            $("#oo_tns3_fm1").removeClass('OnPadangx');
                        }
                        if (tns4_fm1 == 'True') {
                            $("#o_tns4_fm1").addClass('OnPadang');
                            $("#oo_tns4_fm1").addClass('OnPadangx');
                            
                            $("#o_tns4_fm1").removeClass('OffPadang');
                            $("#oo_tns4_fm1").removeClass('OffPadangx');
                        } else {
                            $("#o_tns4_fm1").addClass('OffPadang');
                            $("#oo_tns4_fm1").addClass('OffPadangx');
                            
                            $("#o_tns4_fm1").removeClass('OnPadang');
                            $("#oo_tns4_fm1").removeClass('OnPadangx');
                        }
                        if (tns4_fm2 == 'True') {
                            $("#o_tns4_fm2").addClass('OnPadang');
                            $("#oo_tns4_fm2").addClass('OnPadangx');
                            
                            $("#o_tns4_fm2").removeClass('OffPadang');
                            $("#oo_tns4_fm2").removeClass('OffPadangx');
                        } else {
                            $("#o_tns4_fm2").addClass('OffPadang');
                            $("#oo_tns4_fm2").addClass('OffPadangx');
                            
                            $("#o_tns4_fm2").removeClass('OnPadang');
                            $("#oo_tns4_fm2").removeClass('OnPadangx');
                        }
                        if (tns5_fm1 == 'True') {
                            $("#o_tns5_fm1").addClass('OnPadang');
                            $("#oo_tns5_fm1").addClass('OnPadangx');
                            
                            $("#o_tns5_fm1").removeClass('OffPadang');
                            $("#oo_tns5_fm1").removeClass('OffPadangx');
                        } else {
                            $("#o_tns5_fm1").addClass('OffPadang');
                            $("#oo_tns5_fm1").addClass('OffPadangx');
                            
                            $("#o_tns5_fm1").removeClass('OnPadang');
                            $("#oo_tns5_fm1").removeClass('OnPadangx');
                        }
                        if (tns5_fm2 == 'True') {
                            $("#o_tns5_fm2").addClass('OnPadang');
                            $("#oo_tns5_fm2").addClass('OnPadangx');
                            
                            $("#o_tns5_fm2").removeClass('OffPadang');
                            $("#oo_tns5_fm2").removeClass('OffPadangx');
                        } else {
                            $("#o_tns5_fm2").addClass('OffPadang');
                            $("#oo_tns5_fm2").addClass('OffPadangx');
                            
                            $("#o_tns5_fm2").removeClass('OnPadang');
                            $("#oo_tns5_fm2").removeClass('OnPadangx');
                        }
                    }
                }).done(function (data) {}).fail(function () {
                });

                $.ajax({
                    url: 'http://par4digma.semenindonesia.com/api/index.php/plant_tlcc/get_statefeed',
                    type: 'GET',
                    success: function (data) {
                        var data1 = data.replace("<title>Json</title>", "");
                        var data2 = data1.replace("(", "[");
                        var data3 = data2.replace(");", "]");
                        var dataJson = JSON.parse(data3);

                        //Raw Mill
                        tlcc_rm1 = dataJson[0].tags[5].props[0].val;

                        if (tlcc_rm1 == 'True') {
                            $("#o_tlcc_rm1").addClass('OnPadang');
                            $("#oo_tlcc_rm1").addClass('OnPadangx');

                            $("#o_tlcc_rm1").removeClass('OffPadang');
                            $("#oo_tlcc_rm1").removeClass('OffPadangx');
                        } else {
                            $("#o_tlcc_rm1").addClass('OffPadang');
                            $("#oo_tlcc_rm1").addClass('OffPadangx');

                            $("#o_tlcc_rm1").removeClass('OnPadang');
                            $("#oo_tlcc_rm1").removeClass('OnPadangx');
                        }

                        //Coal Mill
                        tlcc_cm1 = dataJson[0].tags[6].props[0].val;

                        if (tlcc_cm1 == 'True') {
                            $("#o_tlcc_cm1").addClass('OnPadang');
                            $("#oo_tlcc_cm1").addClass('OnPadangx');

                            $("#o_tlcc_cm1").removeClass('OffPadang');
                            $("#oo_tlcc_cm1").removeClass('OffPadangx');
                        } else {
                            $("#o_tlcc_cm1").addClass('OffPadang');
                            $("#oo_tlcc_cm1").addClass('OffPadangx');

                            $("#o_tlcc_cm1").removeClass('OnPadang');
                            $("#oo_tlcc_cm1").removeClass('OnPadangx');
                        }
                        //KILN
                        tlcc_kl1 = dataJson[0].tags[7].props[0].val;

                        if (tlcc_kl1 == 'True') {
                            $("#o_tlcc_kl1").addClass('OnPadang');
                            $("#oo_tlcc_kl1").addClass('OnPadangx');

                            $("#o_tlcc_kl1").removeClass('OffPadang');
                            $("#oo_tlcc_kl1").removeClass('OffPadangx');
                        } else {
                            $("#o_tlcc_kl1").addClass('OffPadang');
                            $("#oo_tlcc_kl1").addClass('OffPadangx');

                            $("#o_tlcc_kl1").removeClass('OnPadang');
                            $("#oo_tlcc_kl1").removeClass('OnPadangx');
                        }

                        //Finish Mill
                        tlcc_fm1 = dataJson[0].tags[8].props[0].val;
                        tlcc_fm2 = dataJson[0].tags[9].props[0].val;

                        if (tlcc_fm1 == 'True') {
                            $("#o_tlcc_fm1").addClass('OnPadang');
                            $("#oo_tlcc_fm1").addClass('OnPadangx');

                            $("#o_tlcc_fm1").removeClass('OffPadang');
                            $("#oo_tlcc_fm1").removeClass('OffPadangx');
                        } else {
                            $("#o_tlcc_fm1").addClass('OffPadang');
                            $("#oo_tlcc_fm1").addClass('OffPadangx');

                            $("#o_tlcc_fm1").removeClass('OnPadang');
                            $("#oo_tlcc_fm1").removeClass('OnPadangx');
                        }
                        if (tlcc_fm2 == 'True') {
                            $("#o_tlcc_fm2").addClass('OnPadang');
                            $("#oo_tlcc_fm2").addClass('OnPadangx');

                            $("#o_tlcc_fm2").removeClass('OffPadang');
                            $("#oo_tlcc_fm2").removeClass('OffPadangx');
                        } else {
                            $("#o_tlcc_fm2").addClass('OffPadang');
                            $("#oo_tlcc_fm2").addClass('OffPadangx');

                            $("#o_tlcc_fm2").removeClass('OnPadang');
                            $("#oo_tlcc_fm2").removeClass('OnPadangx');
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
        <script>
            // Carousel Auto-Cycle
            $(document).ready(function () {
                $('.carousel').carousel({
                    interval: 10000
                })
            });
        </script>
    </body>
    <footer>
        <div class="control-box">                            
            <a data-slide="prev" href="#myCarousel" class="carousel-control left" style="position: relative;"><i class="fa fa-angle-double-left" style="display: block;"></i></a>
            <a data-slide="next" href="#myCarousel" class="carousel-control right" style="position: relative;"><i class="fa fa-angle-double-right" style="display: block; padding-left: 6px"></i></a>
        </div>
    </footer>
</html>