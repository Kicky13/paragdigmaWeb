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
    .p-plant-btg{
        font-family: Segoe UI;
        font-size: 22px;
        color: #615859;
        float: left;
        line-height: 38px;
    }
    .col-twenty-percent {
        width: 20%;
        margin: 0px;
        padding: 0px;
    }

    .col-xs-5ths,
    .col-sm-5ths,
    .col-md-5ths,
    .col-lg-5ths {
        position: relative;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px;
    }

    .col-xs-5ths {
        width: 20%;
        float: left;
    }

    @media (min-width: 768px) {
        .col-sm-5ths {
            width: 20%;
            float: left;
        }
    }

    @media (min-width: 992px) {
        .col-md-5ths {
            width: 20%;
            float: left;
        }
    }

    @media (min-width: 1200px) {
        .col-lg-5ths {
            width: 20%;
            float: left;
        }
        hr {
            margin-top: 20px;
            margin-bottom: 20px;
            border: 0;
            border-top: 2px solid #c35a5a;
        }
        .color_total {
            background-color: #D2D7D3;
        }
        .color_PLN {
            background-color: #E7F76D;
        }
        .color_error {
            background-color: #D8335B;
        }
    </style>
    <script>
        $(function () {
            $('#btn_power_mon').click(function () {
                window.location.href = 'index.php/plant_tonasa/power_btg';
            });
            $('#btn_load_shed').click(function () {
                window.location.href = 'index.php/plant_tonasa/load_shed';
            });
            $('#btn_pltu_mon').click(function () {
                window.location.href = 'index.php/plant_tonasa/pltu_mon';
            });
        });
    </script>
    <div class="row">
        <nav class="navbar navbar-default panelup">
            <div class="container-fluid">
                <div class="navbar-header ">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <h3 style="text-align: left; padding-left: 12px; margin-top: 10px;">Real Time BTG Power Distribution</h3>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="#"> <span class="sr-only">(current)</span></a></li>
                        <li>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-left">
                        <div class="form-group">

                        </div>
                        <div class="btn-group">
                            <button class="btn btn-default" aria-label="Left Align" id="btn_power_mon" type="button">
                                Power Monitoring
                            </button>
                            <button class="btn btn-warning " aria-label="Left Align" id="btn_load_shed" type="button">
                                Load Shedding
                            </button>
                            <button class="btn btn-warning " aria-label="Left Align" id="btn_pltu_mon" type="button">
                                PLTU Monitoring
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-5ths col-xs-6 noPadding" >
            <div class="col-xs-12 noPadding plant-head" >
                <div class="col-xs-4" style="background-color: #ffa83c; height: 90px;"> 
                    <img src="media/icon/tower.png" class="img-up">
                </div>
                <div class="col-xs-8"><p class="p-plant-btg">TOTAL UNIT ABCD</p></div>					
            </div>
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">PLTU A</div>
                        <span class="TagData" id="BTG_TOTAL_UNIT_PLTU_A"></span><span style="font-size: 18px"> MW</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">PLTU B</div>
                        <span class="TagData" id="BTG_TOTAL_UNIT_PLTU_B"></span><span style="font-size: 18px"> MW</span></div>
                </div>
            </div>
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">PLTU C</div>
                        <span id="BTG_TOTAL_UNIT_PLTU_C" class="TagData"></span><span style="font-size: 18px"> MW</span></div>
                </div>
            </div>
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange padding-orange-bottom" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">PLTU D</div>
                        <span class="TagData" id="BTG_TOTAL_UNIT_PLTU_D"></span><span style="font-size: 18px"> MW</span></div>
                </div>
            </div>
        </div>

        <div class="col-md-5ths col-xs-6 noPadding" >
            <div class="col-xs-12 noPadding plant-head" >
                <div class="col-xs-4" style="background-color: #ffa83c; height: 90px;"> 
                    <img src="media/icon/used.png" class="img-up">
                </div>
                <div class="col-xs-8"><p class="p-plant-btg">SELF USED</p></div>					
            </div>
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">PLTU A</div>
                        <span class="TagData" id="BTG_SELF_USED_PLTU_A"></span><span style="font-size: 18px"> MW</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">PLTU B</div>
                        <span class="TagData" id="BTG_SELF_USED_PLTU_B"></span><span style="font-size: 18px"> MW</span></div>
                </div>
            </div>
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">PLTU C</div>
                        <span id="BTG_SELF_USED_PLTU_C" class="TagData"></span><span style="font-size: 18px"> MW</span></div>
                </div>
            </div>
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange padding-orange-bottom" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">PLTU D</div>
                        <span class="TagData" id="BTG_SELF_USED_PLTU_D"></span><span style="font-size: 18px"> MW</span></div>
                </div>
            </div>
        </div>

        <div class="col-md-5ths col-xs-6 noPadding" >
            <div class="col-xs-12 noPadding plant-head" >
                <div class="col-xs-4" style="background-color: #ffa83c; height: 90px;"> 
                    <img src="media/icon/harbor.png" class="img-up">
                </div>
                <div class="col-xs-8"><p class="p-plant-btg">HARBOR</p></div>					
            </div>
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">HARBOUR</div>
                        <span class="TagData" id="BTG_HARBOR_Harbor"></span><span style="font-size: 18px"> MW</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange padding-orange-bottom" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">TL+CUS</div>
                        <span class="TagData" id="BTG_HARBOR_TL_Cus"></span><span style="font-size: 18px"> MW</span></div>
                </div>
            </div>
        </div>

        <div class="col-md-5ths col-xs-6 noPadding" >
            <div class="col-xs-12 noPadding plant-head" >
                <div class="col-xs-4" style="background-color: #ffa83c; height: 90px;"> 
                    <img src="media/icon/factor2.png" class="img-up">
                </div>
                <div class="col-xs-8"><p class="p-plant-btg">PLN</p></div>					
            </div>
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">Tonasa 5 580HV03</div>
                        <span class="TagData" id="BTG_PLN_Tonasa_5_580HV03"></span><span style="font-size: 18px"> MW</span>
                    </div> 
                </div>
            </div>
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">Tonasa 2/3 Q1 KILN+CM</div>
                        <span class="TagData" id="BTG_PLN_Tonasa_23_Q0_KILN_CM"></span><span style="font-size: 18px"> MM</span></div>
                </div>
            </div>
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">Tonasa 2/3 HVSG07</div>
                        <span id="BTG_PLN_Tonasa_23_HVSG07" class="TagData"></span><span style="font-size: 18px"> MW</span></div>
                </div>
            </div>
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange color_PLN" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">Tonasa 3 Q1 FM+RM</div>
                        <span id="BTG_PLN_Tonasa_3_Q1_FMRM" class="TagData"></span><span style="font-size: 18px"> MW</span></div>
                </div>
            </div>
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange padding-orange-bottom color_PLN" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">Tonasa 4 HVSG07</div>
                        <span class="TagData" id="BTG_PLN_Tonasa_4_HVSG07"></span><span style="font-size: 18px"> MW</span></div>
                </div>
            </div>
        </div>

        <div class="col-md-5ths col-xs-6 noPadding" >
            <div class="col-xs-12 noPadding plant-head" >
                <div class="col-xs-4" style="background-color: #ffa83c; height: 90px;"> 
                    <img src="media/icon/trans.png" class="img-up">
                </div>
                <div class="col-xs-8"><p class="p-plant-btg">TOTAL TRANSMISI BTG</p></div>					
            </div>
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">Tonasa 5 580HV01</div>
                        <span class="TagData" id="BTG_TRANSMISI_Tonasa_5_580HV01"></span><span style="font-size: 18px"> MW</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">Tonasa 5 580HV02</div>
                        <span class="TagData" id="BTG_TRANSMISI_Tonasa_5_580HV02"></span><span style="font-size: 18px"> MW</span></div>
                </div>
            </div>
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">Tonasa 4 HVSG01</div>
                        <span id="BTG_TRANSMISI_Tonasa_4_HVSG01" class="TagData"></span><span style="font-size: 18px"> MW</span></div>
                </div>
            </div>
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange padding-orange-bottom" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">Tonasa 4 HVSG02</div>
                        <span class="TagData" id="BTG_TRANSMISI_Tonasa_4_HVSG02"></span><span style="font-size: 18px"> MW</span></div>
                </div>
            </div>
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange-all color_error" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">TOTAL LOSSES</div>
                        <span class="TagData" id="BTG_TRANSMISI_TOTAL_LOSS"></span><span style="font-size: 18px"> MW</span></div>
                </div>
            </div>
        </div>
    </div>
    <!--<hr style="width: 100%">-->
    <div class="row">
        <div class="col-md-5ths col-xs-6 noPadding" >
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange-all color_total" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">TOTAL</div>
                        <span class="TagData" id="BTG_TOTAL_UNIT_TOTAL_PLTU"></span><span style="font-size: 18px"> MW</span></div>
                </div>
            </div>
        </div>

        <div class="col-md-5ths col-xs-6 noPadding" >
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange-all color_total" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">TOTAL</div>
                        <span class="TagData" id="BTG_SELF_USED_TOTAL_PLTU"></span><span style="font-size: 18px"> MW</span></div>
                </div>
            </div>
        </div>

        <div class="col-md-5ths col-xs-6 noPadding" >
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange-all color_total" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">TOTAL</div>
                        <span class="TagData" id="BTG_HARBOR_TOTAL_HARBOR"></span><span style="font-size: 18px"> MW</span></div>
                </div>
            </div>
        </div>

        <div class="col-md-5ths col-xs-6 noPadding" >
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange-all color_total" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">TOTAL</div>
                        <span class="TagData" id="BTG_PLN_TOTAL_PLN"></span><span style="font-size: 18px"> MW</span></div>
                </div>
            </div>
        </div>

        <div class="col-md-5ths col-xs-6 noPadding" >
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange-all color_total" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">TOTAL TRANSMISI</div>
                        <span class="TagData" id="BTG_TRANSMISI_TOTAL_TRANS"></span><span style="font-size: 18px"> MW</span></div>
                </div>
            </div>
        </div>
    </div>
    <hr style="width: 100%; margin:0;">
    <div class="row">
        <div class="col-md-5ths col-xs-6 noPadding" >
            <div class="col-xs-12 noPadding plant-head" >
                <div class="col-xs-4" style="background-color: #ffa83c; height: 90px;"> 
                    <img src="media/icon/to.png" class="img-up">
                </div>
                <div class="col-xs-8"><p class="p-plant-btg">PLTU To Tonasa 2/3</p></div>					
            </div>
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">Tonasa 3 Q1</div>
                        <span class="TagData" id="BTG_PLTU_TNS23_Tonasa_3_Q1"></span><span style="font-size: 18px"> MW</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">Tonasa 4 SS3 AH5</div>
                        <span class="TagData" id="BTG_PLTU_TNS23_Tonasa_4_SS3_AH5"></span><span style="font-size: 18px"> MW</span></div>
                </div>
            </div>
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange-all color_total" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">TOTAL</div>
                        <span class="TagData" id="BTG_PLTU_TNS23_TOTAL_PLTU"></span><span style="font-size: 18px"> MW</span></div>
                </div>
            </div>
        </div>

        <div class="col-md-5ths col-xs-6 noPadding" >
            <div class="col-xs-12 noPadding plant-head" >
                <div class="col-xs-4" style="background-color: #ffa83c; height: 90px;"> 
                    <img src="media/icon/to.png" class="img-up">
                </div>
                <div class="col-xs-8"><p class="p-plant-btg">PLTU To Tonasa 4</p></div>					
            </div>
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">Tonasa 4 HVSG01</div>
                        <span class="TagData" id="BTG_PLTU_TNS4_Tonasa_4_HVSG01"></span><span style="font-size: 18px"> MW</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">Tonasa 4 HVSG02</div>
                        <span class="TagData" id="BTG_PLTU_TNS4_Tonasa_4_HVSG02"></span><span style="font-size: 18px"> MW</span></div>
                </div>
            </div>
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange-all color_total" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">TOTAL</div>
                        <span class="TagData" id="BTG_PLTU_TNS4_TOTAL_PLTU"></span><span style="font-size: 18px"> MW</span></div>
                </div>
            </div>
        </div>

        <div class="col-md-5ths col-xs-6 noPadding" >
            <div class="col-xs-12 noPadding plant-head" >
                <div class="col-xs-4" style="background-color: #ffa83c; height: 90px;"> 
                    <img src="media/icon/factor2.png" class="img-up">
                </div>
                <div class="col-xs-8"><p class="p-plant-btg">PLN Tonasa 5 580HV03</p></div>					
            </div>
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">PLN Tonasa 5 580HV03</div>
                        <span class="TagData" id="BTG_PLN_Other_PLN_Tonasa_5_580HV03"></span><span style="font-size: 18px"> MW</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 noPadding plant-head" >
                <div class="col-xs-4" style="background-color: #ffa83c; height: 90px;"> 
                    <img src="media/icon/factor2.png" class="img-up">
                </div>
                <div class="col-xs-8"><p class="p-plant-btg">PLN Tonasa 2/3 Q0</p></div>					
            </div>
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange padding-orange-bottom" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">PLN Tonasa 2/3 Q0 KILN+CM</div>
                        <span class="TagData" id="BTG_PLN_Other_PLN_Tonasa_23_Q0_KILN_CM"></span><span style="font-size: 18px"> MW</span></div>
                </div>
            </div>
        </div>

        <div class="col-md-5ths col-xs-6 noPadding" >
            <div class="col-xs-12 noPadding plant-head" >
                <div class="col-xs-4" style="background-color: #ffa83c; height: 90px;"> 
                    <img src="media/icon/factor2.png" class="img-up">
                </div>
                <div class="col-xs-8"><p class="p-plant-btg">PLN Tonasa 2/3_Q0+HVSG07</p></div>					
            </div>
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">PLN Tonasa 2/3_Q0+HVSG07</div>
                        <span class="TagData" id="BTG_PLN_Other_PLN_Tonasa_2_3_Q0_HVSG07"></span><span style="font-size: 18px"> MW</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 noPadding plant-head" >
                <div class="col-xs-4" style="background-color: #ffa83c; height: 90px;"> 
                    <img src="media/icon/factor2.png" class="img-up">
                </div>
                <div class="col-xs-8"><p class="p-plant-btg">PLN Tonasa 3_Q1</p></div>					
            </div>
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange padding-orange-bottom" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">Tonasa 3_Q1 FM+RM</div>
                        <span class="TagData" id="BTG_PLN_Other_Tonasa_3_Q1_FM_RM"></span><span style="font-size: 18px"> MW</span></div>
                </div>
            </div>
        </div>

        <div class="col-md-5ths col-xs-6 noPadding" >
            <div class="col-xs-12 noPadding plant-head" >
                <div class="col-xs-4" style="background-color: #ffa83c; height: 90px;"> 
                    <img src="media/icon/factor2.png" class="img-up">
                </div>
                <div class="col-xs-8"><p class="p-plant-btg">PLN Tonasa 4_HVSG07-Q1</p></div>					
            </div>
            <div class="col-xs-12 noPadding" >
                <div class="img-thumbnail cubesRun padding-orange" >
                    <div class="col-xs-12" style="text-align: center;"><div class="TagName">PLN Tonasa 4_HVSG07-Q1</div>
                        <span class="TagData" id="BTG_PLN_Other_PLN_Tonasa_4_HVSG07_Q1"></span><span style="font-size: 18px"> MW</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function dataUpdate() {
            $.ajax({
                url: 'http://par4digma.semenindonesia.com/api/index.php/plant_tonasa/get_btg_pwrmon',
                type: 'GET',
                success: function (data) {
                    var data1 = data.replace("<title>Json</title>", "");
                    var data2 = data1.replace("(", "[");
                    var data3 = data2.replace(");", "]");
                    var dataJson = JSON.parse(data3);

                    //Value
                    var BTG_HARBOR_Harbor = parseFloat(dataJson[0].tags[0].props[0].val).toFixed(2);
                    var BTG_HARBOR_TL_Cus = parseFloat(dataJson[0].tags[1].props[0].val).toFixed(2);
                    var BTG_HARBOR_TOTAL_HARBOR = parseFloat(dataJson[0].tags[2].props[0].val).toFixed(2);
                    var BTG_PLN_Tonasa_23_HVSG07 = parseFloat(dataJson[0].tags[3].props[0].val).toFixed(2);
                    var BTG_PLN_Tonasa_23_Q0_KILN_CM = parseFloat(dataJson[0].tags[4].props[0].val).toFixed(2);
                    var BTG_PLN_Tonasa_3_Q1_FMRM = parseFloat(dataJson[0].tags[5].props[0].val).toFixed(2);
                    var BTG_PLN_Tonasa_4_HVSG07 = parseFloat(dataJson[0].tags[6].props[0].val).toFixed(2);
                    var BTG_PLN_Tonasa_5_580HV03 = parseFloat(dataJson[0].tags[7].props[0].val).toFixed(2);
                    var BTG_PLN_TOTAL_PLN = parseFloat(dataJson[0].tags[8].props[0].val).toFixed(2);
                    var BTG_PLN_Other_PLN_Tonasa_2_3_Q0_HVSG07 = parseFloat(dataJson[0].tags[9].props[0].val).toFixed(2);
                    var BTG_PLN_Other_PLN_Tonasa_23_Q0_KILN_CM = parseFloat(dataJson[0].tags[10].props[0].val).toFixed(2);
                    var BTG_PLN_Other_PLN_Tonasa_4_HVSG07_Q1 = parseFloat(dataJson[0].tags[11].props[0].val).toFixed(2);
                    var BTG_PLN_Other_PLN_Tonasa_5_580HV03 = parseFloat(dataJson[0].tags[12].props[0].val).toFixed(2);
                    var BTG_PLN_Other_Tonasa_3_Q1_FM_RM = parseFloat(dataJson[0].tags[13].props[0].val).toFixed(2);
                    var BTG_PLTU_TNS23_Tonasa_3_Q1 = parseFloat(dataJson[0].tags[14].props[0].val).toFixed(2);
                    var BTG_PLTU_TNS23_Tonasa_4_SS3_AH5 = parseFloat(dataJson[0].tags[15].props[0].val).toFixed(2);
                    var BTG_PLTU_TNS23_TOTAL_PLTU = parseFloat(dataJson[0].tags[16].props[0].val).toFixed(2);
                    var BTG_PLTU_TNS4_Tonasa_4_HVSG01 = parseFloat(dataJson[0].tags[17].props[0].val).toFixed(2);
                    var BTG_PLTU_TNS4_Tonasa_4_HVSG02 = parseFloat(dataJson[0].tags[18].props[0].val).toFixed(2);
                    var BTG_PLTU_TNS4_TOTAL_PLTU = parseFloat(dataJson[0].tags[19].props[0].val).toFixed(2);
                    var BTG_SELF_USED_PLTU_A = parseFloat(dataJson[0].tags[20].props[0].val).toFixed(2);
                    var BTG_SELF_USED_PLTU_B = parseFloat(dataJson[0].tags[21].props[0].val).toFixed(2);
                    var BTG_SELF_USED_PLTU_C = parseFloat(dataJson[0].tags[22].props[0].val).toFixed(2);
                    var BTG_SELF_USED_PLTU_D = parseFloat(dataJson[0].tags[23].props[0].val).toFixed(2);
                    var BTG_SELF_USED_TOTAL_PLTU = parseFloat(dataJson[0].tags[24].props[0].val).toFixed(2);
                    var BTG_TOTAL_UNIT_PLTU_A = parseFloat(dataJson[0].tags[25].props[0].val).toFixed(2);
                    var BTG_TOTAL_UNIT_PLTU_B = parseFloat(dataJson[0].tags[26].props[0].val).toFixed(2);
                    var BTG_TOTAL_UNIT_PLTU_C = parseFloat(dataJson[0].tags[27].props[0].val).toFixed(2);
                    var BTG_TOTAL_UNIT_PLTU_D = parseFloat(dataJson[0].tags[28].props[0].val).toFixed(2);
                    var BTG_TOTAL_UNIT_TOTAL_PLTU = parseFloat(dataJson[0].tags[29].props[0].val).toFixed(2);
                    var BTG_TRANSMISI_Tonasa_4_HVSG01 = parseFloat(dataJson[0].tags[30].props[0].val).toFixed(2);
                    var BTG_TRANSMISI_Tonasa_4_HVSG02 = parseFloat(dataJson[0].tags[31].props[0].val).toFixed(2);
                    var BTG_TRANSMISI_Tonasa_5_580HV01 = parseFloat(dataJson[0].tags[32].props[0].val).toFixed(2);
                    var BTG_TRANSMISI_Tonasa_5_580HV02 = parseFloat(dataJson[0].tags[33].props[0].val).toFixed(2);
                    var BTG_TRANSMISI_TOTAL_LOSS = parseFloat(dataJson[0].tags[34].props[0].val).toFixed(2);
                    var BTG_TRANSMISI_TOTAL_TRANS = parseFloat(dataJson[0].tags[35].props[0].val).toFixed(2);

                    $("#BTG_HARBOR_Harbor").html(BTG_HARBOR_Harbor);
                    $("#BTG_HARBOR_TL_Cus").html(BTG_HARBOR_TL_Cus);
                    $("#BTG_HARBOR_TOTAL_HARBOR").html(BTG_HARBOR_TOTAL_HARBOR);
                    $("#BTG_PLN_Tonasa_23_HVSG07").html(BTG_PLN_Tonasa_23_HVSG07);
                    $("#BTG_PLN_Tonasa_23_Q0_KILN_CM").html(BTG_PLN_Tonasa_23_Q0_KILN_CM);
                    $("#BTG_PLN_Tonasa_3_Q1_FMRM").html(BTG_PLN_Tonasa_3_Q1_FMRM);
                    $("#BTG_PLN_Tonasa_4_HVSG07").html(BTG_PLN_Tonasa_4_HVSG07);
                    $("#BTG_PLN_Tonasa_5_580HV03").html(BTG_PLN_Tonasa_5_580HV03);
                    $("#BTG_PLN_TOTAL_PLN").html(BTG_PLN_TOTAL_PLN);
                    $("#BTG_PLN_Other_PLN_Tonasa_2_3_Q0_HVSG07").html(BTG_PLN_Other_PLN_Tonasa_2_3_Q0_HVSG07);
                    $("#BTG_PLN_Other_PLN_Tonasa_23_Q0_KILN_CM").html(BTG_PLN_Other_PLN_Tonasa_23_Q0_KILN_CM);
                    $("#BTG_PLN_Other_PLN_Tonasa_4_HVSG07_Q1").html(BTG_PLN_Other_PLN_Tonasa_4_HVSG07_Q1);
                    $("#BTG_PLN_Other_PLN_Tonasa_5_580HV03").html(BTG_PLN_Other_PLN_Tonasa_5_580HV03);
                    $("#BTG_PLN_Other_Tonasa_3_Q1_FM_RM").html(BTG_PLN_Other_Tonasa_3_Q1_FM_RM);
                    $("#BTG_PLTU_TNS23_Tonasa_3_Q1").html(BTG_PLTU_TNS23_Tonasa_3_Q1);
                    $("#BTG_PLTU_TNS23_Tonasa_4_SS3_AH5").html(BTG_PLTU_TNS23_Tonasa_4_SS3_AH5);
                    $("#BTG_PLTU_TNS23_TOTAL_PLTU").html(BTG_PLTU_TNS23_TOTAL_PLTU);
                    $("#BTG_PLTU_TNS4_Tonasa_4_HVSG01").html(BTG_PLTU_TNS4_Tonasa_4_HVSG01);
                    $("#BTG_PLTU_TNS4_Tonasa_4_HVSG02").html(BTG_PLTU_TNS4_Tonasa_4_HVSG02);
                    $("#BTG_PLTU_TNS4_TOTAL_PLTU").html(BTG_PLTU_TNS4_TOTAL_PLTU);
                    $("#BTG_SELF_USED_PLTU_A").html(BTG_SELF_USED_PLTU_A);
                    $("#BTG_SELF_USED_PLTU_B").html(BTG_SELF_USED_PLTU_B);
                    $("#BTG_SELF_USED_PLTU_C").html(BTG_SELF_USED_PLTU_C);
                    $("#BTG_SELF_USED_PLTU_D").html(BTG_SELF_USED_PLTU_D);
                    $("#BTG_SELF_USED_TOTAL_PLTU").html(BTG_SELF_USED_TOTAL_PLTU);
                    $("#BTG_TOTAL_UNIT_PLTU_A").html(BTG_TOTAL_UNIT_PLTU_A);
                    $("#BTG_TOTAL_UNIT_PLTU_B").html(BTG_TOTAL_UNIT_PLTU_B);
                    $("#BTG_TOTAL_UNIT_PLTU_C").html(BTG_TOTAL_UNIT_PLTU_C);
                    $("#BTG_TOTAL_UNIT_PLTU_D").html(BTG_TOTAL_UNIT_PLTU_D);
                    $("#BTG_TOTAL_UNIT_TOTAL_PLTU").html(BTG_TOTAL_UNIT_TOTAL_PLTU);
                    $("#BTG_TRANSMISI_Tonasa_4_HVSG01").html(BTG_TRANSMISI_Tonasa_4_HVSG01);
                    $("#BTG_TRANSMISI_Tonasa_4_HVSG02").html(BTG_TRANSMISI_Tonasa_4_HVSG02);
                    $("#BTG_TRANSMISI_Tonasa_5_580HV01").html(BTG_TRANSMISI_Tonasa_5_580HV01);
                    $("#BTG_TRANSMISI_Tonasa_5_580HV02").html(BTG_TRANSMISI_Tonasa_5_580HV02);
                    $("#BTG_TRANSMISI_TOTAL_LOSS").html(BTG_TRANSMISI_TOTAL_LOSS);
                    $("#BTG_TRANSMISI_TOTAL_TRANS").html(BTG_TRANSMISI_TOTAL_TRANS);
                }
            }).done(function (data) {}).fail(function () {
            });
        }
        ;
        setInterval(dataUpdate, 1000);
    </script>