<script type="text/javascript"  src="<?= base_url() ?>bootstrap/plantView/assets/js/jquery-1.11.3.min.js"></script>
<style>
    .row {
        font-family: 'Montserrat', sans-serif;
    }
    .noPadding{
        padding-top:1px;
        padding-left:1px;
        padding-right:1px;
        padding-bottom:1px;
    }
    .satuan{
        font-size: 17px;
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
        /* font-weight: bold; */
        /* border-style: solid; */
        color: #656565;
    }
    .TagData{
        font-size: 26px;
        /*    font-weight: bold;*/
        /*color: #312828;*/
    }
    .TagData2{
        font-size: 12px;
        /*    font-weight: bold;*/
        color: #312828;
    }
    .TagData3{
        font-size: 19px;
        /*    font-weight: bold;*/
        color: #312828;
    }
    .bread{
        position: absolute;
        display: inline-block;
        margin-top: 13px;
        color: white;
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
                <h4 style="text-align: left; padding-left: 12px; margin-top: 10px;font-family: 'Montserrat', sans-serif;">Real Time Plant Overview</h4>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff ">Overall<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="active"><a href="<?= base_url() ?>index.php/plant_gresik/offstate">Overall</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_padang/overview">Padang</a></li>
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
    <div class="col-xs-12 col-md-2 noPadding" >
        <div class="col-xs-12 noPadding" >
            <div class="col-xs-12 noPadding offplant" align="center"><p class="p-planthead">PADANG</p></div>
        </div>
        <div id="data_off_paddang">
        	
        </div>
    </div>
    <div class="col-xs-12 col-md-2 noPadding" >
        <div class="col-xs-12 noPadding" >
            <div class="col-xs-12 noPadding offplant" align="center"><p class="p-planthead">REMBANG</p></div>
        </div>
        <div id="data_off_rembang">
            
        </div>
    </div>
    <div class="col-xs-12 col-md-2 noPadding" >
        <div class="col-xs-12 noPadding" >
            <div class="col-xs-12 noPadding offplant" align="center"><p class="p-planthead">TUBAN</p></div>
        </div>
        <div id="data_off_tuban">
            
        </div>
    </div>
    <div class="col-xs-12 col-md-2 noPadding" >
        <div class="col-xs-12 noPadding" >
            <div class="col-xs-12 noPadding offplant" align="center"><p class="p-planthead">TONASA</p></div>
        </div>
        <div id="data_off_tonasa">
            
        </div>
    </div>
    <div class="col-xs-12 col-md-2 noPadding" >
        <div class="col-xs-12 noPadding" >
            <div class="col-xs-12 noPadding offplant" align="center"><p class="p-planthead">TLCC</p></div>
        </div>
        <div id="data_off_tlcc">
            
        </div>
    </div>
</div>


<!-- ================================================================================== MODAL ================================================================================== -->
<!-- 343RM1M01 tuban3-->
<div class="modal fade" id="RM3Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header one-padding">
                <h4 class="modal-title" id="myModalLabel">Raw Mill 3 Details</h4>
            </div>
            <div class="modal-body zero-padding">
                <div class="row">
                    <div class="col-xs-6 col-md-3 noPadding" >
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Ampere</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <span class="col-xs-6 TagData noPadding" id="RawAmp3"
                                      opc-tag-txt='{"tag":"Tuban 3\/4 Accessories.RM3_Motor_Ampere.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'
                                      ></span><span class="col-xs-6 satuan">Amp</span>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 noPadding " >
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Speed</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body" >
                                <span class="col-xs-6 TagData noPadding">0.00</span>
                                <span class="col-xs-6 satuan">rpm</span>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 noPadding">
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Temperature</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <span class="col-xs-6 TagData noPadding" id="RawTemp3"
                                      opc-tag-txt='{"tag":"Tuban 3\/4 Accessories.RM3_Motor_Bearing.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'
                                      ></span><span class="col-xs-6 satuan">&#176;C</span>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 noPadding ">
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Vibration</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <span class="col-xs-6 TagData noPadding" id="RawVib3"
                                      opc-tag-txt='{"tag":"Tuban 3\/4 Accessories.RM3_Motor_Vibrasi.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'
                                      ></span><span class="col-xs-6 satuan">mm/s</span>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>
<!-- 443KL1M01  tuban3-->
<div class="modal fade " id="KL3Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  " role="document">
        <div class="modal-content">
            <div class="modal-header one-padding">
                <div class="col-md-12" style="text-align: center">ANALITYCAL KILN 3</div>
            </div>
            <div class="modal-body zero-padding">
                <div class="row">
                    <div class="col-xs-6">
                        <div>Hood Draft</div>
                        <div><span style="font-weight: bold" id="kl3_hooddraft"></span>&nbsp;<span>(mm)</span></div>
                    </div>
                    <div class="col-xs-6">
                        <div>Speed Cooler</div>
                        <div><span style="font-weight: bold" id="kl3_speedcooler"></span>&nbsp;<span>(stroke/min)</span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div>Temp Kiln</div>
                        <div><span style="font-weight: bold" id="kl3_tempkiln"></span>&nbsp;<span>&#x2103;</span></div>
                    </div>
                    <div class="col-xs-6">
                        <div>Depth Cooler</div>
                        <div><span style="font-weight: bold" id="kl3_depthcooler"></span>&nbsp;<span>(mm)</span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div>Kiln Burner</div>
                        <div><span style="font-weight: bold" id="kl3_kilnburner"></span>&nbsp;<span>(T/H)</span></div>
                    </div>
                    <div class="col-xs-6">
                        <div>Heat Cons</div>
                        <div><span style="font-weight: bold" id="kl3_heatcons"></span>&nbsp;<span>kCal/Kg</span></div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-xs-12" style="text-align: center">ILC</div>
                    <div class="col-xs-12">
                        <div class="col-xs-12">
                            <div class="col-xs-6">Rate</div>
                            <div class="col-xs-6"><span style="font-weight: bold" id="kl3_ilc_rate"></span>&nbsp;<span>(T/H)</span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">ID Fan 1 Speed</div>
                            <div class="col-xs-6"><span style="font-weight: bold" id="kl3_ilc_idfan1speed"></span>&nbsp;<span>%</span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">ID Fan 1 Power</div>
                            <div class="col-xs-6"><span style="font-weight: bold" id="kl3_ilc_idfan1power"></span>&nbsp;<span>KW</span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">ID Fan 1 Vibrasi 1</div>
                            <div class="col-xs-6"><span style="font-weight: bold" id="kl3_ilc_idfan1vib1"></span>&nbsp;<span>(mm/s)</span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">ID Fan 1 Vibrasi 2</div>
                            <div class="col-xs-6"><span style="font-weight: bold" id="kl3_ilc_idfan1vib2"></span>&nbsp;<span>(mm/s)</span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">ID Fan 1 Damper</div>
                            <div class="col-xs-6"><span style="font-weight: bold" id="kl3_ilc_idfan1damper"></span>&nbsp;<span>%</span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">EXT Temp 1</div>
                            <div class="col-xs-6"><span style="font-weight: bold" id="kl3_ilc_exttemp1"></span>&nbsp;<span>&#x2103;</span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">Rate Coal Burner</div>
                            <div class="col-xs-6"><span style="font-weight: bold" id="kl3_ilc_ratecoalburner"></span>&nbsp;<span>(T/H)</span></div>
                        </div>
                    </div>
                    <div class="col-xs-12" style="text-align: center">SLC</div>
                    <div class="col-xs-12">
                        <div class="col-xs-12">
                            <div class="col-xs-6">Rate</div>
                            <div class="col-xs-6"><span style="font-weight: bold" id="kl3_slc_rate"></span>&nbsp;<span>(T/H)</span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">ID Fan 2 Speed</div>
                            <div class="col-xs-6"><span style="font-weight: bold" id="kl3_slc_idfan2speed"></span>&nbsp;<span>%</span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">ID Fan 2 Power</div>
                            <div class="col-xs-6"><span style="font-weight: bold" id="kl3_slc_idfan2power"></span>&nbsp;<span>KW</span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">ID Fan 2 Vibrasi 1</div>
                            <div class="col-xs-6"><span style="font-weight: bold" id="kl3_slc_idfan2vib1"></span>&nbsp;<span>(mm/s)</span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">ID Fan 2 Vibrasi 2</div>
                            <div class="col-xs-6"><span style="font-weight: bold" id="kl3_slc_idfan2vib2"></span>&nbsp;<span>(mm/s)</span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">ID Fan 2 Damper</div>
                            <div class="col-xs-6"><span style="font-weight: bold" id="kl3_slc_idfan2damper"></span>&nbsp;<span>%</span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">EXT Temp 2</div>
                            <div class="col-xs-6"><span style="font-weight: bold" id="kl3_slc_exttemp2"></span>&nbsp;<span>&#x2103;</span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">Rate Coal Burner</div>
                            <div class="col-xs-6"><span style="font-weight: bold" id="kl3_slc_ratecoalburner"></span>&nbsp;<span>(T/H)</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>
<!-- 473RM1M01  tuban3-->
<div class="modal fade " id="CM3Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  " role="document">
        <div class="modal-content">
            <div class="modal-header one-padding">
                <!--<button type="button"><span aria-hidden="true">&times;</span></button> class="close" data-dismiss="modal" aria-label="Close"-->
                <h4 class="modal-title" id="myModalLabel">Coal Mill 3 Details</h4>
            </div>
            <div class="modal-body zero-padding">
                <div class="row">
                    <div class="col-xs-6 col-md-3 noPadding" >
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Ampere</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <span class="col-xs-6 TagData noPadding" id="CMAmp3"
                                      opc-tag-txt='{"tag":"Tuban 3\/4 Accessories.Coal_Mill3_Drive_Current.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'
                                      ></span><span class="col-xs-6 satuan">Amp</span>
                            </div>
                            <!-- /.box-body -->
                        </div>

                    </div>
                    <div class="col-xs-6 col-md-3 noPadding " >
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Speed</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <span class="col-xs-6 TagData noPadding">0.00</span>
                                <span class="col-xs-6 satuan">rpm</span>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 noPadding">
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Temperature</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <span class="col-xs-6 TagData noPadding" id="CMTemp3"
                                      opc-tag-txt='{"tag":"Tuban 3\/4 Accessories.Coal_Mill3_Bearing_Temp.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'
                                      ></span><span class="col-xs-6 satuan">&#176;C</span>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 noPadding ">
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Vibration</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <span class="col-xs-6 TagData noPadding" id="CMVib3"
                                      opc-tag-txt='{"tag":"Tuban 3\/4 Accessories.Coal_Mill3_Vibrasi.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'
                                      ></span><span class="col-xs-6 satuan noPadding">mm/s</span>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>
<!-- 545MM1M01  tuban3-->
<div class="modal fade" id="FM3Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header one-padding">
                <!--<button type="button"><span aria-hidden="true">&times;</span></button> class="close" data-dismiss="modal" aria-label="Close"-->
                <h4 class="modal-title" id="myModalLabel">Finish Mill 3 #1 Details</h4>
            </div>
            <div class="modal-body zero-padding">
                <div class="row">
                    <div class="col-xs-6 col-md-3 noPadding" >
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Ampere</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <span class="col-xs-6 TagData noPadding" id="FMAmp3"
                                      >0.00</span><span class="col-xs-6 satuan">Amp</span>
                            </div>
                            <!-- /.box-body -->
                        </div>

                    </div>
                    <div class="col-xs-6 col-md-3 noPadding " >
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Speed</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <span class="col-xs-6 TagData noPadding">0.00</span>
                                <span class="col-xs-6 satuan">rpm</span>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 noPadding">
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Temperature</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <span class="col-xs-6 TagData noPadding" id="FMTemp3"
                                      >0.00</span><span class="col-xs-6 satuan">&#176;C</span>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 noPadding ">
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Vibration</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <span class="col-xs-6 TagData noPadding" id="FMVib3"
                                      >0.00</span><span class="col-xs-6 satuan">mm/s</span>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>
<!-- 546MM1M01  tuban3-->
<div class="modal fade" id="FM3Modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header one-padding">
                <!--<button type="button"><span aria-hidden="true">&times;</span></button> class="close" data-dismiss="modal" aria-label="Close"-->
                <h4 class="modal-title" id="myModalLabel">Finish Mill 3 #2 Details</h4>
            </div>
            <div class="modal-body zero-padding">
                <div class="row">
                    <div class="col-xs-6 col-md-3 noPadding" >
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Ampere</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <span class="col-xs-6 TagData noPadding" id="FM2Amp3"
                                      >0.00</span><span class="col-xs-6 satuan">Amp</span>
                            </div>
                            <!-- /.box-body -->
                        </div>

                    </div>
                    <div class="col-xs-6 col-md-3 noPadding " >
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Speed</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <span class="col-xs-6 TagData noPadding">0.00</span>
                                <span class="col-xs-6 satuan">rpm</span>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 noPadding">
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Temperature</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <span class="col-xs-6 TagData noPadding" id="FM2Temp3"
                                      >0.00</span><span class="col-xs-6 satuan">&#176;C</span>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 noPadding ">
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Vibration</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <span class="col-xs-6 TagData noPadding" id="FM2Vib3"
                                      >0.00</span><span class="col-xs-6 satuan">mm/s</span>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>

<!--   tuban4-->
<div class="modal fade" id="RM4Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header one-padding">
                <!--<button type="button"><span aria-hidden="true">&times;</span></button> class="close" data-dismiss="modal" aria-label="Close"-->
                <h4 class="modal-title" id="myModalLabel">Raw Mill 4 Details</h4>
            </div>
            <div class="modal-body zero-padding">
                <div class="row">
                    <div class="col-xs-6 col-md-3 noPadding" >
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Ampere</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <span class="col-xs-6 TagData noPadding" id="RawAmp4"
                                      opc-tag-txt='{"tag":"Tuban 3\/4 Accessories.RM4_Motor_Ampere1.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'
                                      ></span><span class="col-xs-6 satuan">Amp</span>
                            </div>
                            <!-- /.box-body -->
                        </div>

                    </div>
                    <div class="col-xs-6 col-md-3 noPadding " >
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Speed</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <span class="col-xs-6 TagData noPadding">0.00</span>
                                <span class="col-xs-6 satuan">rpm</span>
                            </div>
                            <!-- /.box-body -->
                        </div>


                    </div>
                    <div class="col-xs-6 col-md-3 noPadding">
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Temperature</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <span class="col-xs-6 TagData noPadding" id="RawTemp4"
                                      opc-tag-txt='{"tag":"Tuban 3\/4 Accessories.RM4_Motor_Bearing.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'
                                      ></span><span class="col-xs-6 satuan">&#176;C</span>
                            </div>
                            <!-- /.box-body -->
                        </div>


                    </div>
                    <div class="col-xs-6 col-md-3 noPadding ">
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Vibration</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <span class="col-xs-6 TagData noPadding" id="RawVib4"
                                      opc-tag-txt='{"tag":"Tuban 3\/4 Accessories.RM4_Motor_Vibration.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'
                                      ></span><span class="col-xs-6 satuan">mm/s</span>
                            </div>
                            <!-- /.box-body -->
                        </div>


                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>
<!-- 444KL01MD01  tuban4-->
<div class="modal fade" id="KL4Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header one-padding">
                <div class="col-md-12" style="text-align: center">ANALITYCAL KILN 4</div>
            </div>
            <div class="modal-body zero-padding">
                <div class="row">
                    <div class="col-xs-6">
                        <div>Hood Draft</div>
                        <div><span style="font-weight: bold" id="kl4_hooddraft"></span>&nbsp;<span>(mm)</span></div>
                    </div>
                    <div class="col-xs-6">
                        <div>Speed Cooler</div>
                        <div><span style="font-weight: bold" id="kl4_speedcooler"></span>&nbsp;<span>(stroke/min)</span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div>Temp Kiln</div>
                        <div><span style="font-weight: bold" id="kl4_tempkiln"></span>&nbsp;<span>&#x2103;</span></div>
                    </div>
                    <div class="col-xs-6">
                        <div>Depth Cooler</div>
                        <div><span style="font-weight: bold" id="kl4_depthcooler"></span>&nbsp;<span>(mm)</span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div>Kiln Burner</div>
                        <div><span style="font-weight: bold" id="kl4_kilnburner"></span>&nbsp;<span>(T/H)</span></div>
                    </div>
                    <div class="col-xs-6">
                        <div>Heat Cons</div>
                        <div><span style="font-weight: bold" id="kl4_heatcons"></span>&nbsp;<span>kCal/Kg</span></div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-xs-12" style="text-align: center">KILN 4</div>
                    <div class="col-xs-12">
                        <div class="col-xs-12">
                            <div class="col-xs-6">Rate</div>
                            <div class="col-xs-6"><span style="font-weight: bold" id="kl4_rate"></span>&nbsp;<span>(T/H)</span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">ID Fan 1 Speed</div>
                            <div class="col-xs-6"><span style="font-weight: bold" id="kl4_idfan1speed"></span>&nbsp;<span>%</span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">ID Fan 1 Current</div>
                            <div class="col-xs-6"><span style="font-weight: bold" id="kl4_idfan1curr"></span>&nbsp;<span>A</span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">ID Fan 1 Vibrasi 1</div>
                            <div class="col-xs-6"><span style="font-weight: bold" id="kl4_idfan1vib1"></span>&nbsp;<span>(mm/s)</span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">ID Fan 1 Vibrasi 2</div>
                            <div class="col-xs-6"><span style="font-weight: bold" id="kl4_idfan1vib2"></span>&nbsp;<span>(mm/s)</span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">ID Fan 1 Damper</div>
                            <div class="col-xs-6"><span style="font-weight: bold" id="kl4_idfan1damper"></span>&nbsp;<span>%</span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">ID Fan 2 Speed</div>
                            <div class="col-xs-6"><span style="font-weight: bold" id="kl4_idfan2speed"></span>&nbsp;<span>%</span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">ID Fan 2 Current</div>
                            <div class="col-xs-6"><span style="font-weight: bold" id="kl4_idfan2curr"></span>&nbsp;<span>A</span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">ID Fan 2 Vibrasi 1</div>
                            <div class="col-xs-6"><span style="font-weight: bold" id="kl4_idfan2vib1"></span>&nbsp;<span>(mm/s)</span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">ID Fan 2 Vibrasi 2</div>
                            <div class="col-xs-6"><span style="font-weight: bold" id="kl4_idfan2vib2"></span>&nbsp;<span>(mm/s)</span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">ID Fan 2 Damper</div>
                            <div class="col-xs-6"><span style="font-weight: bold" id="kl4_idfan2damper"></span>&nbsp;<span>%</span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">EXT 1 Temp 1</div>
                            <div class="col-xs-6"><span style="font-weight: bold" id="kl4_ext1temp1"></span>&nbsp;<span>&#x2103;</span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">EXT 1 Temp 2</div>
                            <div class="col-xs-6"><span style="font-weight: bold" id="kl4_ext1temp2"></span>&nbsp;<span>&#x2103;</span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">EXT 1 Temp 2</div>
                            <div class="col-xs-6"><span style="font-weight: bold" id="kl4_ext2temp1"></span>&nbsp;<span>&#x2103;</span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">EXT 2 Temp 2</div>
                            <div class="col-xs-6"><span style="font-weight: bold" id="kl4_ext2temp2"></span>&nbsp;<span>&#x2103;</span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">Rate Coal Burner</div>
                            <div class="col-xs-6"><span style="font-weight: bold" id="kl4_ratecoalburner"></span>&nbsp;<span>(T/H)</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>
<!-- 474RM01M01  tuban4-->
<div class="modal fade" id="CM4Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header one-padding">
                <!--<button type="button"><span aria-hidden="true">&times;</span></button> class="close" data-dismiss="modal" aria-label="Close"-->
                <h4 class="modal-title" id="myModalLabel">Coal Mill 4 Details</h4>
            </div>
            <div class="modal-body zero-padding">
                <div class="row">
                    <div class="col-xs-6 col-md-3 noPadding" >
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Ampere</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="col-xs-6 TagData noPadding" id="CMAmp4"
                                     opc-tag-txt='{"tag":"Tuban 3\/4 Accessories.Coal_Mill4_Motor_Ampere.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'
                                     ></div><span class="col-xs-6 satuan">Amp</span>
                            </div>
                            <!-- /.box-body -->
                        </div>

                    </div>
                    <div class="col-xs-6 col-md-3 noPadding " >
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Speed</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <span class="col-xs-6 TagData noPadding">0.00</span>
                                <span class="col-xs-6 satuan">rpm</span>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 noPadding">
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Temperature</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <span class="col-xs-6 TagData noPadding" id="CMTemp4"
                                      opc-tag-txt='{"tag":"Tuban 3\/4 Accessories.Coal_Mill4_Bearing_Temp.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'
                                      ></span><span class="col-xs-6 satuan">&#176;C</span>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 noPadding ">
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Vibration</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <span class="col-xs-6 TagData noPadding" id="CMVib4"
                                      opc-tag-txt='{"tag":"Tuban 3\/4 Accessories.Coal_Mill4_Motor_Vibration.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'
                                      ></span><span class="col-xs-6 satuan">mm/s</span>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>
<!-- 547RM01M01 tuban4-->
<div class="modal fade" id="FM4Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header one-padding">
                <!--<button type="button"><span aria-hidden="true">&times;</span></button> class="close" data-dismiss="modal" aria-label="Close"-->
                <h4 class="modal-title" id="myModalLabel">Finish Mill 4 #1 Details</h4>
            </div>
            <div class="modal-body zero-padding">
                <div class="row">
                    <div class="col-xs-6 col-md-3 noPadding" >
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Ampere</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="col-xs-6 TagData noPadding" id="FMAmp4"
                                     opc-tag-txt='{"tag":"Tuban 3\/4 Accessories.FM7_Motor_Ampere.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'
                                     ></div><span class="col-xs-6 satuan">Amp</span>
                            </div>
                            <!-- /.box-body -->
                        </div>

                    </div>
                    <div class="col-xs-6 col-md-3 noPadding " >
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Speed</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <span class="col-xs-6 TagData noPadding">0.00</span>
                                <span class="col-xs-6 satuan">rpm</span>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 noPadding">
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Temperature</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <span class="col-xs-6 TagData noPadding" id="FMTemp4"
                                      opc-tag-txt='{"tag":"Tuban 3\/4 Accessories.FM7_Motor_Bearing_Temp.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'
                                      ></span><span class="col-xs-6 satuan">&#176;C</span>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 noPadding ">
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Vibration</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <span class="col-xs-6 TagData noPadding" id="FMVib4"
                                      opc-tag-txt='{"tag":"Tuban 3\/4 Accessories.FM7_Motor_Vibration.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'
                                      ></span><span class="col-xs-6 satuan">mm/s</span>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>
<!-- 548RM01M01  tuban4-->
<div class="modal fade" id="FM4Modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header one-padding">
                <!--<button type="button"><span aria-hidden="true">&times;</span></button> class="close" data-dismiss="modal" aria-label="Close"-->
                <h4 class="modal-title" id="myModalLabel">Finish Mill 4 #2 Details</h4>
            </div>
            <div class="modal-body zero-padding">
                <div class="row">
                    <div class="col-xs-6 col-md-3 noPadding" >
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Ampere</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="col-xs-6 TagData noPadding" id="FM2Amp4"
                                     opc-tag-txt='{"tag":"Tuban 3\/4 Accessories.FM8_Motor_Ampere.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'
                                     ></div><span class="col-xs-6 satuan">Amp</span>
                            </div>
                            <!-- /.box-body -->
                        </div>

                    </div>
                    <div class="col-xs-6 col-md-3 noPadding " >
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Speed</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <span class="col-xs-6 TagData noPadding">0.00</span>
                                <span class="col-xs-6 satuan">rpm</span>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 noPadding">
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Temperature</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <span class="col-xs-6 TagData noPadding" id="FM2Temp4"
                                      opc-tag-txt='{"tag":"Tuban 3\/4 Accessories.FM8_Motor_Bearing_Temp.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'
                                      ></span><span class="col-xs-6 satuan">&#176;C</span>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 noPadding ">
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Vibration</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <span class="col-xs-6 TagData noPadding" id="FM2Vib4"
                                      opc-tag-txt='{"tag":"Tuban 3\/4 Accessories.FM8_Motor_Vibration.Value","config":{"formats":{"bad_q":"?????","bool_f":"False","bool_t":"True","float":"0.00","int":"0","string":"{0}"},"offset":0}}'
                                      ></span><span class="col-xs-6 satuan">mm/s</span>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>
<script src="assets/js/offstate.js"></script>
<style>
    #data_off_tonasa, #data_off_paddang, #data_off_rembang, #data_off_tuban, #data_off_tlcc{height:69vh;overflow-y: scroll;width:100%;}
</style>