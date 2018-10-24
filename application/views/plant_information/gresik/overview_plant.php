<script type="text/javascript"  src="<?= base_url() ?>bootstrap/plantView/assets/js/jquery-1.11.3.min.js"></script>
<style>
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
                <h3 style="text-align: left; padding-left: 12px; margin-top: 10px;">Real Time Plant Overview</h3>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff ">Tuban, Gresik, Cigading<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= base_url() ?>index.php/plant_gresik/offstate">Overall</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_padang/overview">Padang</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_rembang/overview">Rembang</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="active"><a href="<?= base_url() ?>index.php/plant_gresik/overview">Tuban, Gresik, Cigading</a></li>
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
        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-4" style="background-color: #ffa83c; height: 90px;"> 
                <img src="media/icon/factor2.png" class="img-up">
            </div>
            <div class="col-xs-8"><p class="p-plant">TUBAN</p><br><p class="p-numb">1</p></div>
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-orange" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName"> 341RM1M01 - Raw Mill</div>
                    <span class="TagData" id="vtb1_rm1"></span><span>  T/h</span>
                </div>
                <div class="row"><div class="col-xs-2 content-plant" >
                        <div id="o_tb1_rm1" class="fa fa-power-off fa-2x onzi"></div>
                    </div>
                    <!-- Button trigger modal -->
                </div>    
            </div>
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-orange" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">441KL1M01 - Kiln</div>
                    <span class="TagData" id="vtb1_kl1"></span><span>  Ton Prod</span>
                </div>
                <div class="row"> <div class="col-xs-2 content-plant" >
                        <div id="o_tb1_kl1" class="fa fa-power-off fa-2x onzi"></div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-orange" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">471RM1M01 - Coal Mill</div>
                    <span class="TagData" id="vtb1_cm1"></span><span> T/h</span></div>
                <div class="row"><div class="col-xs-2 content-plant" >
                        <div id="o_tb1_cm1" class="fa fa-power-off fa-2x onzi"></div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-orange" >
                <div class="col-xs-10" style="text-align: center;"><span class="TagName">541MM1M01 - Finish Mill</span><br/>
                    <span class="TagData" id="vtb1_fm1"></span><span> T/h</span></div>
                <div class="row"><div class="col-xs-2 content-plant" >
                        <div id="o_tb1_fm1" class="fa fa-power-off fa-2x onzi"></div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-orange" >
                <div class="col-xs-10" style="text-align: center;"><span class="TagName">542MM1M01 - Finish Mill</span><br/>
                    <span class="TagData" id="vtb1_fm2"></span><span> T/h</span></div>
                <div class="row"><div class="col-xs-2 content-plant" >
                        <div id="o_tb1_fm2" class="fa fa-power-off fa-2x onzi"></div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-orange" >
                <div class="col-xs-10" style="text-align: center;"><span class="TagName">549RM01M01 - Finish Mill</span><br/>
                    <span class="TagData" id="vtb1_fm9"></span><span> T/h</span></div>
                <div class="row"><div class="col-xs-2 content-plant" >
                        <div id="o_tb1_fm9" class="fa fa-power-off fa-2x onzi"></div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-orange padding-orange-bottom" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">Atox - New Coal Mill</div>
                    <span class="TagData" id="vtb1_atx1"></span><span> T/h</span></div>
                <div class="row"><div class="col-xs-2 content-plant" >
                        <div id="o_tb1_atx1" class="fa fa-power-off fa-2x onzi"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-2 noPadding" >

        <div class="col-xs-12 noPadding plant-head" >

            <div class="col-xs-4" style="background-color: #53d0c0; height: 90px;"> 
                <img src="media/icon/factor2.png" class="img-up">
            </div>
            <div class="col-xs-8"><p class="p-plant">TUBAN</p><br><p class="p-numb">2</p></div>					
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-green" >
                <div class="col-xs-10" style="text-align: center;"><span class="TagName">342RM1M01 - Raw Mill</span>
                    <div class="TagData" id="vtb2_rm1"><span> T/h</span>
                    </div></div>
                <div class="row"><div class="col-xs-2 content-plant" >
                        <div id="o_tb2_rm1" class="fa fa-power-off fa-2x onzi"></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-green" ><div class="col-xs-10" style="text-align: center;"><span class="TagName">442KL1M01 - Kiln</span>
                    <div class="TagData" id="vtb2_kl1"><span> T/h</span>
                    </div></div>
                <div class="row"><div class="col-xs-2 content-plant" >
                        <div id="o_tb2_kl1" class="fa fa-power-off fa-2x onzi"></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-green" >
                <div class="col-xs-10" style="text-align: center;"><div class="TagName">472RM1M01 - Coal Mill</div>
                <span class="TagData" id="vtb2_cm1"></span><span> T/h</span></div>
                <div class="row"><div class="col-xs-2 content-plant" >
                        <div id="o_tb2_cm1" class="fa fa-power-off fa-2x onzi"></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-green" >
                <div class="col-xs-10" style="text-align: center;"><span class="TagName">543MM1M01 - Finish Mill</span>
                    <div class="TagData" id="vtb2_fm1"><span> T/h</span>
                    </div></div>
                <div class="row"><div class="col-xs-2 content-plant" >
                        <div id="o_tb2_fm1" class="fa fa-power-off fa-2x onzi"></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-green padding-green-bottom" >
                <div class="col-xs-10" style="text-align: center;"><span class="TagName">544MM1M01 - Finish Mill</span>
                    <div class="TagData" id="vtb2_fm2"><span> T/h</span>
                    </div></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div id="o_tb2_fm2" class="fa fa-power-off fa-2x onzi"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-2 noPadding" >
        <div class="col-xs-12 noPadding plant-head" >

            <div class="col-xs-4" style="background-color: #62a9f9; height: 90px;"> 
                <img src="media/icon/factor2.png" class="img-up">
            </div>
            <div class="col-xs-8"><p class="p-plant">TUBAN</p><br><p class="p-numb">3</p></div>					
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-blue" >
                <div class="col-xs-1">
                    <!--<button type="button" class="btn bg-silver btn-sm" data-toggle="modal" data-target="#RM3Modal"><i class="fa fa-expand"></i></button>-->         
                </div>
                <div class="col-xs-9" style="text-align: center;"><div class="TagName">343RM1M01 - Raw Mill</div>
                    <span class="TagData" id="vtb3_rm1"></span><span style="font-size: 18px"> T/h</span>
                </div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div id="o_tb3_rm1" class="fa fa-power-off fa-2x onzi"></div>
                    </div>
                    <!-- Modal -->

                </div>
            </div>
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-blue" >                 
                <div class="col-xs-1">                     
                    <button type="button" class="btn bg-silver btn-sm" data-toggle="modal" data-target="#KL3Modal"><i class="fa fa-expand"></i></button>
                </div>
                <div class="col-xs-9" style="text-align: center;"><div class="TagName">443KL1M01 - Kiln</div>
                    <span class="TagData" id="vtb3_kl1"></span><span style="font-size: 18px"> T/h</span></div>
                <div  class="row"><div class="col-xs-2 content-plant" >

                        <div class="fa fa-power-off fa-2x onzi" id="o_tb3_kl1"></div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-blue" >                 
                <div class="col-xs-1">                     
                    <!--<button type="button" class="btn bg-silver btn-sm" data-toggle="modal" data-target="#CM3Modal"><i class="fa fa-expand"></i></button>-->
                </div>
                <div class="col-xs-9" style="text-align: center;"><div class="TagName">473RM1M01 - Coal Mill</div>
                    <span class="TagData" id="vtb3_cm1"></span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div class="fa fa-power-off fa-2x onzi" id="o_tb3_cm1" ></div>

                    </div>

                </div>
            </div>
        </div>
        <div class="col-xs-12 noPadding">
            <div class="img-thumbnail cubesRun padding-blue" style="height:90px;">                 
                <div class="col-xs-1">                     
                    <!--<button type="button" class="btn bg-silver btn-sm" data-toggle="modal" data-target="#FM3Modal"><i class="fa fa-expand"></i></button>-->
                </div>
                <div class="col-xs-9" style="text-align: center;"><div class="TagName">545MM1M01 - Finish Mill</div>
                    <span class="TagData" id="vtb3_fm1"></span><span style="font-size: 18px"> T/h</span><br>
                    <span style="text-align: center;">545GA1 - HRC</span>
                </div>

                <div class="row">
                    <div class="col-xs-2 content-plant" >  <div class="fa fa-power-off fa-2x onzi-up" id="o_tb3_fm1" ></div>
                        <div class="fa fa-power-off fa-2x onzi-down" style="float: right;" id="o_tb3_hrc1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-blue padding-blue-bottom" style="height:90px;"> 
                <div class="col-xs-1">                     
                    <!--<button type="button" class="btn bg-silver btn-sm" data-toggle="modal" data-target="#FM3Modal2"><i class="fa fa-expand"></i></button>-->
                </div>
                <div class="col-xs-9" style="text-align: center;"><div class="TagName">546MM1M01 - Finish Mill</div>
                    <span class="TagData" id="vtb3_fm2"></span><span style="font-size: 18px"> T/h</span><br>
                    <span style="text-align: center;">546GA1 - HRC</span>
                </div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div class="fa fa-power-off fa-2x onzi-up" id="o_tb3_fm2" ></div>
                        <div class="fa fa-power-off fa-2x onzi-down" style="float: right;" id="o_tb3_hrc2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-2 noPadding" >
        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-4" style="background-color: #f76767; height: 90px;"> 
                <img src="media/icon/factor2.png" class="img-up">
            </div>
            <div class="col-xs-8"><p class="p-plant">TUBAN</p><br><p class="p-numb">4</p></div>					
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-red" >
                <div class="col-xs-1">
                    <!--<button type="button" class="btn bg-silver btn-sm" data-toggle="modal" data-target="#RM4Modal"><i class="fa fa-expand"></i></button>-->
                </div>
                <div class="col-xs-9" style="text-align: center;"><div class="TagName">344RM01M01 - Raw Mill</div>
                    <span class="TagData" id="vtb4_rm1"></span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div id="o_tb4_rm1" class="fa fa-power-off fa-2x onzi"></div>
                    </div>
                </div>
            </div>
            <!-- Modal -->

        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-red" >                
                <div class="col-xs-1">                     
                    <button type="button" class="btn bg-silver btn-sm" data-toggle="modal" data-target="#KL4Modal"><i class="fa fa-expand"></i></button>
                </div>
                <div class="col-xs-9" style="text-align: center;"><div class="TagName">444KL01MD01 - Kiln</div>
                    <span class="TagData" id="vtb4_kl1"></span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >	
                        <div class="fa fa-power-off fa-2x onzi" id="o_tb4_kl1"></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-red" > 
                <div class="col-xs-1">                 
                    <!--<button type="button" class="btn bg-silver btn-sm" data-toggle="modal" data-target="#CM4Modal"><i class="fa fa-expand"></i></button>-->
                </div>
                <div class="col-xs-9" style="text-align: center;"><div class="TagName">474RM01M01 - Coal Mill</div>
                    <span class="TagData" id="vtb4_cm1"></span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >	

                        <div class="fa fa-power-off fa-2x onzi" id="o_tb4_cm1"></div>

                    </div>

                </div>
            </div>
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-red" > 
                <div class="col-xs-1">             
                    <!--<button type="button" class="btn bg-silver btn-sm" data-toggle="modal" data-target="#FM4Modal"><i class="fa fa-expand"></i></button>-->
                </div>
                <div class="col-xs-9" style="text-align: center;"><div class="TagName">547RM01M01 - Finish Mill</div>
                    <span class="TagData" id="vtb4_fm1"></span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div class="fa fa-power-off fa-2x onzi" id="o_tb4_fm1" ></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-red padding-red-bottom" >
                <div class="col-xs-1">             
                    <!--<button type="button" class="btn bg-silver btn-sm" data-toggle="modal" data-target="#FM4Modal2"><i class="fa fa-expand"></i></button>-->
                </div>
                <div class="col-xs-9" style="text-align: center;"><div class="TagName">548RM01M01 - Finish Mill</div>
                    <span class="TagData" id="vtb4_fm2"></span><span style="font-size: 18px"> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div class="fa fa-power-off fa-2x onzi" id="o_tb4_fm2" ></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-2 noPadding" >
        <div class="col-xs-12 noPadding plant-head" >
            <div class="col-xs-4" style="background-color: #d03fff; height: 90px;"> 
                <img src="media/icon/factor2.png" class="img-up">
            </div>
            <div class="col-xs-8"><p class="p-plant">CIGADING</p></div>                 
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-red" style="border-left-color:#d03fff;">
                <div class="col-xs-1">
                </div>
                <div class="col-xs-9" style="text-align: center;"><div class="TagName">Finish Mill</div>
                    <span class="TagData" id="vcgd_fm1"></span><span> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div id="o_cgd_fm1" class="fa fa-power-off fa-2x onzi"></div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
        </div>
        <div class="col-xs-12 noPadding plant-head" style="background-color: #4438ff;" >
            <div class="col-xs-4" style="background-color: #4438ff; height: 90px;"> 
                <img src="media/icon/factor2.png" class="img-up">
            </div>
            <div class="col-xs-8"><p class="p-plant">Gresik</p></div>                 
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-red" style="border-left-color:#4438ff;">
                <div class="col-xs-1">
                </div>
                <div class="col-xs-9" style="text-align: center;"><div class="TagName">Finish Mill A - Gresik</div>
                    <span class="TagData" id="vfma_grs"></span><span> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div id="o_fma_grs" class="fa fa-power-off fa-2x onzi"></div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-red" style="border-left-color:#4438ff;">
                <div class="col-xs-1">
                </div>
                <div class="col-xs-9" style="text-align: center;"><div class="TagName">Finish Mill B - Gresik</div>
                    <span class="TagData" id="vfmb_grs"></span><span> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div id="o_fmb_grs" class="fa fa-power-off fa-2x onzi"></div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-red" style="border-left-color:#4438ff;">
                <div class="col-xs-1">
                </div>
                <div class="col-xs-9" style="text-align: center;"><div class="TagName">Finish Mill C - Gresik</div>
                    <span class="TagData" id="vfmc_grs"></span><span> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div id="o_fmc_grs" class="fa fa-power-off fa-2x onzi"></div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
        </div>
        <div class="col-xs-12 noPadding" >
            <div class="img-thumbnail cubesRun padding-red" style="border-left-color:#4438ff; border-bottom: 3px solid #4438ff;">
                <div class="col-xs-1">
                </div>
                <div class="col-xs-9" style="text-align: center;"><div class="TagName">Finish Mill D - Gresik</div>
                    <span class="TagData" id="vfmd_grs"></span><span> T/h</span></div>
                <div class="row">
                    <div class="col-xs-2 content-plant" >
                        <div id="o_fmd_grs" class="fa fa-power-off fa-2x onzi"></div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
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
                //value
                var vtb3_rm1 = parseFloat(dataJson[0].tags[0].props[0].val).toFixed(2);
                var vtb3_cm1 = parseFloat(dataJson[0].tags[17].props[0].val).toFixed(2);
                var vtb3_kl1 = parseFloat(dataJson[0].tags[2].props[0].val).toFixed(2);
                var vtb3_fm1 = parseFloat(dataJson[0].tags[4].props[0].val).toFixed(2);
                var vtb3_fm2 = parseFloat(dataJson[0].tags[6].props[0].val).toFixed(2);
                var vtb4_rm1 = parseFloat(dataJson[0].tags[1].props[0].val).toFixed(2);
                var vtb4_cm1 = parseFloat(dataJson[0].tags[18].props[0].val).toFixed(2);
                var vtb4_kl1 = parseFloat(dataJson[0].tags[3].props[0].val).toFixed(2);
                var vtb4_fm1 = parseFloat(dataJson[0].tags[5].props[0].val).toFixed(2);
                var vtb4_fm2 = parseFloat(dataJson[0].tags[7].props[0].val).toFixed(2);
                
                var vtb3_kl1_prod = parseFloat(dataJson[0].tags[22].props[0].val).toFixed(2);
                var vtb4_kl1_prod = parseFloat(dataJson[0].tags[23].props[0].val).toFixed(2);
                
                $('#vtb3_rm1').html(vtb3_rm1);
                $('#vtb3_cm1').html(vtb3_cm1);
                $('#vtb3_kl1').html(vtb3_kl1_prod);
                $('#vtb3_fm1').html(vtb3_fm1);
                $('#vtb3_fm2').html(vtb3_fm2);
                $('#vtb4_rm1').html(vtb4_rm1);
                $('#vtb4_cm1').html(vtb4_cm1);
                $('#vtb4_kl1').html(vtb4_kl1_prod);
                $('#vtb4_fm1').html(vtb4_fm1);
                $('#vtb4_fm2').html(vtb4_fm2);
                //Raw Mill
                tb3_rm1 = dataJson[0].tags[8].props[0].val;
                tb4_rm1 = dataJson[0].tags[9].props[0].val;
                if (tb3_rm1 == 'True') {
                    $("#o_tb3_rm1").addClass('OnPadang');
                    $("#o_tb3_rm1").removeClass('OffPadang');
                } else {
                    $("#o_tb3_rm1").addClass('OffPadang');
                    $("#o_tb3_rm1").removeClass('OnPadang');
                }
                if (tb4_rm1 == 'True') {
                    $("#o_tb4_rm1").addClass('OnPadang');
                    $("#o_tb4_rm1").removeClass('OffPadang');
                } else {
                    $("#o_tb4_rm1").addClass('OffPadang');
                    $("#o_tb4_rm1").removeClass('OnPadang');
                }

                //Coal Mill
                tb3_cm1 = dataJson[0].tags[12].props[0].val;
                tb4_cm1 = dataJson[0].tags[13].props[0].val;
                if (tb3_cm1 == 'True') {
                    $("#o_tb3_cm1").addClass('OnPadang');
                    $("#o_tb3_cm1").removeClass('OffPadang');
                } else {
                    $("#o_tb3_cm1").addClass('OffPadang');
                    $("#o_tb3_cm1").removeClass('OnPadang');
                }
                if (tb4_cm1 == 'True') {
                    $("#o_tb4_cm1").addClass('OnPadang');
                    $("#o_tb4_cm1").removeClass('OffPadang');
                } else {
                    $("#o_tb4_cm1").addClass('OffPadang');
                    $("#o_tb4_cm1").removeClass('OnPadang');
                }

                //KILN
                tb3_kl1 = dataJson[0].tags[10].props[0].val;
                tb4_kl1 = dataJson[0].tags[11].props[0].val;
                if (tb3_kl1 == 'True') {
                    $("#o_tb3_kl1").addClass('OnPadang');
                    $("#o_tb3_kl1").removeClass('OffPadang');
                } else {
                    $("#o_tb3_kl1").addClass('OffPadang');
                    $("#o_tb3_kl1").removeClass('OnPadang');
                }
                if (tb4_kl1 == 'True') {
                    $("#o_tb4_kl1").addClass('OnPadang');
                    $("#o_tb4_kl1").removeClass('OffPadang');
                } else {
                    $("#o_tb4_kl1").addClass('OffPadang');
                    $("#o_tb4_kl1").removeClass('OnPadang');
                }

                //Finish Mill
                tb3_fm1 = dataJson[0].tags[14].props[0].val; //FM 5
                tb3_fm2 = dataJson[0].tags[16].props[0].val; //FM 6
                tb3_hrc1 = dataJson[0].tags[20].props[0].val;
                tb3_hrc2 = dataJson[0].tags[21].props[0].val;
                tb4_fm1 = dataJson[0].tags[15].props[0].val; //FM 7
                tb4_fm2 = dataJson[0].tags[19].props[0].val; //FM 8

                if (tb3_fm1 == 'True') {
                    $("#o_tb3_fm1").addClass('OnPadang');
                    $("#o_tb3_fm1").removeClass('OffPadang');
                } else {
                    $("#o_tb3_fm1").addClass('OffPadang');
                    $("#o_tb3_fm1").removeClass('OnPadang');
                }
                if (tb3_fm2 == 'True') {
                    $("#o_tb3_fm2").addClass('OnPadang');
                    $("#o_tb3_fm2").removeClass('OffPadang');
                } else {
                    $("#o_tb3_fm2").addClass('OffPadang');
                    $("#o_tb3_fm2").removeClass('OnPadang');
                }
                if (tb3_hrc1 == 'True') {
                    $("#o_tb3_hrc1").addClass('OnPadang');
                    $("#o_tb3_hrc1").removeClass('OffPadang');
                } else {
                    $("#o_tb3_hrc1").addClass('OffPadang');
                    $("#o_tb3_hrc1").removeClass('OnPadang');
                }
                if (tb3_hrc2 == 'True') {
                    $("#o_tb3_hrc2").addClass('OnPadang');
                    $("#o_tb3_hrc2").removeClass('OffPadang');
                } else {
                    $("#o_tb3_hrc2").addClass('OffPadang');
                    $("#o_tb3_hrc2").removeClass('OnPadang');
                }
                if (tb4_fm1 == 'True') {
                    $("#o_tb4_fm1").addClass('OnPadang');
                    $("#o_tb4_fm1").removeClass('OffPadang');
                } else {
                    $("#o_tb4_fm1").addClass('OffPadang');
                    $("#o_tb4_fm1").removeClass('OnPadang');
                }
                if (tb4_fm2 == 'True') {
                    $("#o_tb4_fm2").addClass('OnPadang');
                    $("#o_tb4_fm2").removeClass('OffPadang');
                } else {
                    $("#o_tb4_fm2").addClass('OffPadang');
                    $("#o_tb4_fm2").removeClass('OnPadang');
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
                vtb1_rm1 = parseFloat(dataJson[0].tags[1].props[0].val).toFixed(2);
                vtb2_rm1 = parseFloat(dataJson[0].tags[21].props[0].val).toFixed(2);
                if (tb1_rm1 == 'Run' || tb1_rm1 == 'True') {
                    $("#o_tb1_rm1").addClass('OnPadang');
                    $("#o_tb1_rm1").removeClass('OffPadang');
                } else {
                    $("#o_tb1_rm1").addClass('OffPadang');
                    $("#o_tb1_rm1").removeClass('OnPadang');
                }
                if (tb2_rm1 == 'Run' || tb2_rm1 == 'True') {
                    $("#o_tb2_rm1").addClass('OnPadang');
                    $("#o_tb2_rm1").removeClass('OffPadang');
                } else {
                    $("#o_tb2_rm1").addClass('OffPadang');
                    $("#o_tb2_rm1").removeClass('OnPadang');
                }

                $('#vtb1_rm1').html(vtb1_rm1);
                $('#vtb2_rm1').html(vtb2_rm1);
                //Coal Mill
                tb1_cm1 = dataJson[0].tags[4].props[0].val;
                tb1_atx1 = dataJson[0].tags[7].props[0].val;
                tb2_cm1 = dataJson[0].tags[19].props[0].val;
                vtb1_cm1 = parseFloat(dataJson[0].tags[28].props[0].val).toFixed(2);
                vtb1_atx1 = parseFloat(dataJson[0].tags[27].props[0].val).toFixed(2);
                vtb2_cm1 = parseFloat(dataJson[0].tags[29].props[0].val).toFixed(2);


                if (tb1_cm1 == 'Run' || tb1_cm1 == 'True') {
                    $("#o_tb1_cm1").addClass('OnPadang');
                    $("#o_tb1_cm1").removeClass('OffPadang');
                } else {
                    $("#o_tb1_cm1").addClass('OffPadang');
                    $("#o_tb1_cm1").removeClass('OnPadang');
                }
                if (tb1_atx1 == 'Run' || tb1_atx1 == 'True') {
                    $("#o_tb1_atx1").addClass('OnPadang');
                    $("#o_tb1_atx1").removeClass('OffPadang');
                } else {
                    $("#o_tb1_atx1").addClass('OffPadang');
                    $("#o_tb1_atx1").removeClass('OnPadang');
                }
                if (tb2_cm1 == 'Run' || tb2_cm1 == 'True') {
                    $("#o_tb2_cm1").addClass('OnPadang');
                    $("#o_tb2_cm1").removeClass('OffPadang');
                } else {
                    $("#o_tb2_cm1").addClass('OffPadang');
                    $("#o_tb2_cm1").removeClass('OnPadang');
                }

                $('#vtb1_cm1').html(vtb1_cm1);
                $('#vtb1_atx1').html(vtb1_atx1);
                $('#vtb2_cm1').html(vtb2_cm1);
                //KILN
                tb1_kl1 = dataJson[0].tags[10].props[0].val;
                tb2_kl1 = dataJson[0].tags[25].props[0].val;
                vtb1_kl1 = parseFloat(dataJson[0].tags[5].props[0].val).toFixed(2);
                x1 = dataJson[0].tags[18].props[0].val;
                x2 = dataJson[0].tags[22].props[0].val;
                x3 = parseFloat(dataJson[0].tags[30].props[0].val).toFixed(2);
                vtb2_kl1 = parseFloat(x3);
                if (tb1_kl1 == 'Run' || tb1_kl1 == 'True') {
                    $("#o_tb1_kl1").addClass('OnPadang');
                    $("#o_tb1_kl1").removeClass('OffPadang');
                } else {
                    $("#o_tb1_kl1").addClass('OffPadang');
                    $("#o_tb1_kl1").removeClass('OnPadang');
                }
                if (tb2_kl1 == 'Run' || tb2_kl1 == 'True') {
                    $("#o_tb2_kl1").addClass('OnPadang');
                    $("#o_tb2_kl1").removeClass('OffPadang');
                } else {
                    $("#o_tb2_kl1").addClass('OffPadang');
                    $("#o_tb2_kl1").removeClass('OnPadang');
                }
                
                vtb1_kl1_prod = parseFloat(dataJson[0].tags[31].props[0].val).toFixed(2);
                vtb2_kl1_prod = parseFloat(dataJson[0].tags[32].props[0].val).toFixed(2);

                $('#vtb1_kl1').html(vtb1_kl1_prod);
                $('#vtb2_kl1').html(vtb2_kl1_prod);
                //Finish Mill
                tb1_fm1 = dataJson[0].tags[6].props[0].val;
                tb1_fm2 = dataJson[0].tags[11].props[0].val;
                tb1_fm9 = dataJson[0].tags[12].props[0].val;
                tb2_fm1 = dataJson[0].tags[24].props[0].val;
                tb2_fm2 = dataJson[0].tags[20].props[0].val;
                vtb1_fm1 = parseFloat(dataJson[0].tags[13].props[0].val).toFixed(2);
                vtb1_fm2 = parseFloat(dataJson[0].tags[8].props[0].val).toFixed(2);
                vtb1_fm9 = parseFloat(dataJson[0].tags[2].props[0].val).toFixed(2);
                vtb2_fm1 = parseFloat(dataJson[0].tags[23].props[0].val).toFixed(2);
                vtb2_fm2 = parseFloat(dataJson[0].tags[16].props[0].val).toFixed(2);
                if (tb1_fm1 == 'Run' || tb1_fm1 == 'True') {
                    $("#o_tb1_fm1").addClass('OnPadang');
                    $("#o_tb1_fm1").removeClass('OffPadang');
                } else {
                    $("#o_tb1_fm1").addClass('OffPadang');
                    $("#o_tb1_fm1").removeClass('OnPadang');
                }
                if (tb1_fm2 == 'Run' || tb1_fm2 == 'True') {
                    $("#o_tb1_fm2").addClass('OnPadang');
                    $("#o_tb1_fm2").removeClass('OffPadang');
                } else {
                    $("#o_tb1_fm2").addClass('OffPadang');
                    $("#o_tb1_fm2").removeClass('OnPadang');
                }
                if (tb1_fm9 == 'Run' || tb1_fm9 == 'True') {
                    $("#o_tb1_fm9").addClass('OnPadang');
                    $("#o_tb1_fm9").removeClass('OffPadang');
                } else {
                    $("#o_tb1_fm9").addClass('OffPadang');
                    $("#o_tb1_fm9").removeClass('OnPadang');
                }

                if (tb2_fm1 == 'Run' || tb2_fm1 == 'True') {
                    $("#o_tb2_fm1").addClass('OnPadang');
                    $("#o_tb2_fm1").removeClass('OffPadang');
                } else {
                    $("#o_tb2_fm1").addClass('OffPadang');
                    $("#o_tb2_fm1").removeClass('OnPadang');
                }
                if (tb2_fm2 == 'Run' || tb2_fm2 == 'True') {
                    $("#o_tb2_fm2").addClass('OnPadang');
                    $("#o_tb2_fm2").removeClass('OffPadang');
                } else {
                    $("#o_tb2_fm2").addClass('OffPadang');
                    $("#o_tb2_fm2").removeClass('OnPadang');
                }

                $('#vtb1_fm1').html(vtb1_fm1);
                $('#vtb1_fm2').html(vtb1_fm2);
                $('#vtb1_fm9').html(vtb1_fm9);
                $('#vtb2_fm1').html(vtb2_fm1);
                $('#vtb2_fm2').html(vtb2_fm2);
            }
        }).done(function (data) {}).fail(function () {
        });
        $.ajax({
            url: 'http://par4digma.semenindonesia.com/api/index.php/plant_tuban/get_statefeedcgd',
            type: 'GET',
            success: function (data) {
                var data1 = data.replace("<title>Json</title>", "");
                var data2 = data1.replace("(", "[");
                var data3 = data2.replace(");", "]");
                var dataJson = JSON.parse(data3);
                //value
                var vcgd_fm1 = parseFloat(dataJson[0].tags[0].props[0].val).toFixed(2);
                
                $('#vcgd_fm1').html(vcgd_fm1);

                cgd_fm1 = dataJson[0].tags[1].props[0].val;
                
                if (cgd_fm1 == 'True') {
                    $("#o_cgd_fm1").addClass('OnPadang');
                    $("#o_cgd_fm1").removeClass('OffPadang');
                } else {
                    $("#o_cgd_fm1").addClass('OffPadang');
                    $("#o_cgd_fm1").removeClass('OnPadang');
                }
            }
        }).done(function (data) {}).fail(function () {
        });
        $.ajax({
            url: 'http://par4digma.semenindonesia.com/api/index.php/plant_tuban/get_statefeedgrs',
            type: 'GET',
            success: function (data) {
                var data1 = data.replace("<title>Json</title>", "");
                var data2 = data1.replace("(", "[");
                var data3 = data2.replace(");", "]");
                var dataJson = JSON.parse(data3);
                
                feed_A = parseFloat(dataJson[0].tags[0].props[0].val).toFixed(2);
                feed_B = parseFloat(dataJson[0].tags[1].props[0].val).toFixed(2);
                feed_C = parseFloat(dataJson[0].tags[2].props[0].val).toFixed(2);
                feed_D = parseFloat(dataJson[0].tags[3].props[0].val).toFixed(2);

                onoff_A = dataJson[0].tags[4].props[0].val;
                onoff_B = dataJson[0].tags[5].props[0].val;
                onoff_C = dataJson[0].tags[6].props[0].val;
                onoff_D = dataJson[0].tags[7].props[0].val;

                if (onoff_A == 'Run' || onoff_A == 'True') {
                    $("#o_fma_grs").addClass('OnPadang');
                    $("#o_fma_grs").removeClass('OffPadang');
                } else {
                    $("#o_fma_grs").addClass('OffPadang');
                    $("#o_fma_grs").removeClass('OnPadang');
                }

                if (onoff_B == 'Run' || onoff_B == 'True') {
                    $("#o_fmb_grs").addClass('OnPadang');
                    $("#o_fmb_grs").removeClass('OffPadang');
                } else {
                    $("#o_fmb_grs").addClass('OffPadang');
                    $("#o_fmb_grs").removeClass('OnPadang');
                }

                if (onoff_C == 'Run' || onoff_C == 'True') {
                    $("#o_fmc_grs").addClass('OnPadang');
                    $("#o_fmc_grs").removeClass('OffPadang');
                } else {
                    $("#o_fmc_grs").addClass('OffPadang');
                    $("#o_fmc_grs").removeClass('OnPadang');
                }

                if (onoff_D == 'Run' || onoff_D == 'True') {
                    $("#o_fmd_grs").addClass('OnPadang');
                    $("#o_fmd_grs").removeClass('OffPadang');
                } else {
                    $("#o_fmd_grs").addClass('OffPadang');
                    $("#o_fmd_grs").removeClass('OnPadang');
                }

                $("#vfma_grs").html(feed_A);
                $("#vfmb_grs").html(feed_B);
                $("#vfmc_grs").html(feed_C);
                $("#vfmd_grs").html(feed_D);
            }
        }).done(function (data) {}).fail(function () {
        });
        $.ajax({
            url: 'http://par4digma.semenindonesia.com/api/index.php/plant_tuban/get_analitycal_kiln3',
            type: 'GET',
            success: function (data) {
                var data1 = data.replace("<title>Json</title>", "");
                var data2 = data1.replace("(", "[");
                var data3 = data2.replace(");", "]");
                var dataJson = JSON.parse(data3);

                var kl3_hooddraft = parseFloat(dataJson[0].tags[0].props[0].val).toFixed(2);
                var kl3_speedcooler = parseFloat(dataJson[0].tags[1].props[0].val).toFixed(2);
                var kl3_tempkiln = parseFloat(dataJson[0].tags[2].props[0].val).toFixed(2);
                var kl3_depthcooler = parseFloat(dataJson[0].tags[3].props[0].val).toFixed(2);
                var kl3_kilnburner = parseFloat(dataJson[0].tags[4].props[0].val).toFixed(2);
                var kl3_heatcons = parseFloat(dataJson[0].tags[5].props[0].val).toFixed(2);

                var kl3_ilc_rate = parseFloat(dataJson[0].tags[6].props[0].val).toFixed(2);
                var kl3_ilc_idfan1speed = parseFloat(dataJson[0].tags[7].props[0].val).toFixed(2);
                var kl3_ilc_idfan1power = parseFloat(dataJson[0].tags[8].props[0].val).toFixed(2);
                var kl3_ilc_idfan1vib1 = parseFloat(dataJson[0].tags[9].props[0].val).toFixed(2);
                var kl3_ilc_idfan1vib2 = parseFloat(dataJson[0].tags[10].props[0].val).toFixed(2);
                var kl3_ilc_idfan1damper = parseFloat(dataJson[0].tags[11].props[0].val).toFixed(2);
                var kl3_ilc_exttemp1 = parseFloat(dataJson[0].tags[12].props[0].val).toFixed(2);
                var kl3_ilc_ratecoalburner = parseFloat(dataJson[0].tags[13].props[0].val).toFixed(2);

                var kl3_slc_rate = parseFloat(dataJson[0].tags[14].props[0].val).toFixed(2);
                var kl3_slc_idfan2speed = parseFloat(dataJson[0].tags[15].props[0].val).toFixed(2);
                var kl3_slc_idfan2power = parseFloat(dataJson[0].tags[16].props[0].val).toFixed(2);
                var kl3_slc_idfan2vib1 = parseFloat(dataJson[0].tags[17].props[0].val).toFixed(2);
                var kl3_slc_idfan2vib2 = parseFloat(dataJson[0].tags[18].props[0].val).toFixed(2);
                var kl3_slc_idfan2damper = parseFloat(dataJson[0].tags[19].props[0].val).toFixed(2);
                var kl3_slc_exttemp2 = parseFloat(dataJson[0].tags[20].props[0].val).toFixed(2);
                var kl3_slc_ratecoalburner = parseFloat(dataJson[0].tags[21].props[0].val).toFixed(2);

                $("#kl3_hooddraft").html(kl3_hooddraft);
                $("#kl3_speedcooler").html(kl3_speedcooler);
                $("#kl3_tempkiln").html(kl3_tempkiln);
                $("#kl3_depthcooler").html(kl3_depthcooler);
                $("#kl3_kilnburner").html(kl3_kilnburner);
                $("#kl3_heatcons").html(kl3_heatcons);
                //ILC
                $("#kl3_ilc_rate").html(kl3_ilc_rate);
                $("#kl3_ilc_idfan1speed").html(kl3_ilc_idfan1speed);
                $("#kl3_ilc_idfan1power").html(kl3_ilc_idfan1power);
                $("#kl3_ilc_idfan1vib1").html(kl3_ilc_idfan1vib1);
                $("#kl3_ilc_idfan1vib2").html(kl3_ilc_idfan1vib2);
                $("#kl3_ilc_idfan1damper").html(kl3_ilc_idfan1damper);
                $("#kl3_ilc_exttemp1").html(kl3_ilc_exttemp1);
                $("#kl3_ilc_ratecoalburner").html(kl3_ilc_ratecoalburner);
                //SLC
                $("#kl3_slc_rate").html(kl3_slc_rate);
                $("#kl3_slc_idfan2speed").html(kl3_slc_idfan2speed);
                $("#kl3_slc_idfan2power").html(kl3_slc_idfan2power);
                $("#kl3_slc_idfan2vib1").html(kl3_slc_idfan2vib1);
                $("#kl3_slc_idfan2vib2").html(kl3_slc_idfan2vib2);
                $("#kl3_slc_idfan2damper").html(kl3_slc_idfan2damper);
                $("#kl3_slc_exttemp2").html(kl3_slc_exttemp2);
                $("#kl3_slc_ratecoalburner").html(kl3_slc_ratecoalburner);
            }
        }).done(function (data) {}).fail(function () {
        });

        $.ajax({
            url: 'http://par4digma.semenindonesia.com/api/index.php/plant_tuban/get_analitycal_kiln4',
            type: 'GET',
            success: function (data) {
                var data1 = data.replace("<title>Json</title>", "");
                var data2 = data1.replace("(", "[");
                var data3 = data2.replace(");", "]");
                var dataJson = JSON.parse(data3);

                var kl4_hooddraft = parseFloat(dataJson[0].tags[0].props[0].val).toFixed(2);
                var kl4_speedcooler = parseFloat(dataJson[0].tags[1].props[0].val).toFixed(2);
                var kl4_tempkiln = parseFloat(dataJson[0].tags[2].props[0].val).toFixed(2);
                var kl4_depthcooler = parseFloat(dataJson[0].tags[3].props[0].val).toFixed(2);
                var kl4_kilnburner = parseFloat(dataJson[0].tags[4].props[0].val).toFixed(2);
                var kl4_heatcons = parseFloat(dataJson[0].tags[5].props[0].val).toFixed(2);

                var kl4_rate = parseFloat(dataJson[0].tags[6].props[0].val).toFixed(2);
                var kl4_idfan1speed = parseFloat(dataJson[0].tags[7].props[0].val).toFixed(2);
                var kl4_idfan1curr = parseFloat(dataJson[0].tags[8].props[0].val).toFixed(2);
                var kl4_idfan1vib1 = parseFloat(dataJson[0].tags[9].props[0].val).toFixed(2);
                var kl4_idfan1vib2 = parseFloat(dataJson[0].tags[10].props[0].val).toFixed(2);
                var kl4_idfan1damper = parseFloat(dataJson[0].tags[11].props[0].val).toFixed(2);
                var kl4_idfan2speed = parseFloat(dataJson[0].tags[12].props[0].val).toFixed(2);
                var kl4_idfan2curr = parseFloat(dataJson[0].tags[13].props[0].val).toFixed(2);
                var kl4_idfan2vib1 = parseFloat(dataJson[0].tags[14].props[0].val).toFixed(2);
                var kl4_idfan2vib2 = parseFloat(dataJson[0].tags[15].props[0].val).toFixed(2);
                var kl4_idfan2damper = parseFloat(dataJson[0].tags[16].props[0].val).toFixed(2);
                var kl4_ext1temp1 = parseFloat(dataJson[0].tags[17].props[0].val).toFixed(2);
                var kl4_ext1temp2 = parseFloat(dataJson[0].tags[18].props[0].val).toFixed(2);
                var kl4_ext2temp1 = parseFloat(dataJson[0].tags[19].props[0].val).toFixed(2);
                var kl4_ext2temp2 = parseFloat(dataJson[0].tags[20].props[0].val).toFixed(2);
                var kl4_ratecoalburner = parseFloat(dataJson[0].tags[21].props[0].val).toFixed(2);

                $("#kl4_hooddraft").html(kl4_hooddraft);
                $("#kl4_speedcooler").html(kl4_speedcooler);
                $("#kl4_tempkiln").html(kl4_tempkiln);
                $("#kl4_depthcooler").html(kl4_depthcooler);
                $("#kl4_kilnburner").html(kl4_kilnburner);
                $("#kl4_heatcons").html(kl4_heatcons);

                $("#kl4_rate").html(kl4_rate);
                $("#kl4_idfan1speed").html(kl4_idfan1speed);
                $("#kl4_idfan1curr").html(kl4_idfan1curr);
                $("#kl4_idfan1vib1").html(kl4_idfan1vib1);
                $("#kl4_idfan1vib2").html(kl4_idfan1vib2);
                $("#kl4_idfan1damper").html(kl4_idfan1damper);
                $("#kl4_idfan2speed").html(kl4_idfan2speed);
                $("#kl4_idfan2curr").html(kl4_idfan2curr);
                $("#kl4_idfan2vib1").html(kl4_idfan2vib1);
                $("#kl4_idfan2vib2").html(kl4_idfan2vib2);
                $("#kl4_idfan2damper").html(kl4_idfan2damper);
                $("#kl4_ext1temp1").html(kl4_ext1temp1);
                $("#kl4_ext1temp2").html(kl4_ext1temp2);
                $("#kl4_ext2temp1").html(kl4_ext2temp1);
                $("#kl4_ext2temp2").html(kl4_ext2temp2);
                $("#kl4_ratecoalburner").html(kl4_ratecoalburner);
            }
        }).done(function (data) {}).fail(function () {
        });
    }
    ;
    setInterval(dataOnOff, 1000);
</script>