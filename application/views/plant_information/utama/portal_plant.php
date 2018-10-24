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
        border-radius: 21px;
        display: inline-block;
        font-size: 34px;
        font-weight: 200;
        line-height: 18px;
        opacity: 0.5;
        padding: 4px 10px 0px;
        position: static;
        height: 30px;
        width: 15px;
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
        transition-duration: 0.2s;
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
</style>
<!--        batas-->
<section class="content-header" style="margin-bottom:15px;">
    <h1>
        Plant Overview
        <small>Option page</small>
    </h1>
    <ol class="breadcrumb" style="font-size: large; font-weight: bold;">Today : 
        <?php echo date('d F Y'); ?>
    </ol>
</section>

<div class="row" style="height:29px; margin-bottom:34px;">
    <a href="<?php echo base_url(); ?>index.php/plant_gresik/overview">
        <div class="col-md-3 col-xs-12">
            <div class="info-box" style="background: #dd4b39; color:#FFFFFF;">
                <span class="info-box-icon bg-red"><img class="scale" src="media/icon/3.png" width="64px"  alt="..."></span>

                <div class="info-box-content">
                    <span class="info-box-text" style="font-size:24px;">Overview</span>
                    <span class="info-box-number" style="font-size:12px;">See about your machine status, temperature, and perfomance</span>
                </div>
            </div>
        </div>
    </a>

    <a href="<?php echo base_url(); ?>index.php/plant_gresik/stock">
        <div class="col-md-3 col-xs-12">
            <div class="info-box" style="background: #dd4b39; color:#FFFFFF;">
                <span class="info-box-icon bg-red"><img class="scale" src="media/icon/1.png" width="64px"  alt="..."></span>

                <div class="info-box-content">
                    <span class="info-box-text" style="font-size:24px;">Stock Silo</span>
                    <span class="info-box-number" style="font-size:12px;">Check your stock everyday to make sure it at normal level</span>
                </div>
            </div>
        </div>
    </a>

    <a  href="<?php echo base_url(); ?>index.php/plant_gresik/emission">
        <div class="col-md-3 col-xs-12">
            <div class="info-box" style="background: #dd4b39; color:#FFFFFF;">
                <span class="info-box-icon bg-red"><img class="scale" src="media/icon/2.png" width="64px"  alt="..."></span>

                <div class="info-box-content">
                    <span class="info-box-text" style="font-size:24px;">Emission</span>
                    <span class="info-box-number" style="font-size:12px;">Monitor your plant emission and keep your machine eco-friendly</span>
                </div>
            </div>
        </div>
    </a>

<!--    <a href="javascript:void(0)"><?php echo base_url(); ?>index.php/plant_gresik/analysis
        <div class="col-md-3 col-xs-12">
            <div class="info-box" style="background: #dd4b39; color:#FFFFFF; opacity: 0.3">
                <span class="info-box-icon bg-red"><img class="scale" src="media/icon/4.png" width="64px"  alt="..."></span>

                <div class="info-box-content">
                    <span class="info-box-text" style="font-size:24px;">Analysis</span>
                    <span class="info-box-number" style="font-size:12px;">Start analyzing abnormalities on your machine</span>
                </div>
            </div>
        </div>
    </a>-->
    
<!--    <a href="<?php echo base_url(); ?>index.php/plant_historian">
        <div class="col-md-3 col-xs-12">
            <div class="info-box" style="background: #dd4b39; color:#FFFFFF;">
                <span class="info-box-icon bg-red"><img class="scale" src="media/icon/historian.png" width="64px"  alt="..."></span>

                <div class="info-box-content">
                    <span class="info-box-text" style="font-size:24px;">Historian</span>
                    <span class="info-box-number" style="font-size:12px;">Show Historical Data in Attractive Chart</span>
                </div>
            </div>
        </div>
    </a>-->
    
    <a href="<?php echo base_url(); ?>index.php/plant_tonasa/power_btg">
        <div class="col-md-3 col-xs-12">
            <div class="info-box" style="background: #dd4b39; color:#FFFFFF;">
                <span class="info-box-icon bg-red"><img class="scale" src="media/icon/tower.png" width="64px"  alt="..."></span>

                <div class="info-box-content">
                    <span class="info-box-text" style="font-size:24px;">Power Plant</span>
                    <span class="info-box-number" style="font-size:12px;">Display Power Plant Status and its Production</span>
                </div>
            </div>
        </div>
    </a>
    
<!--    <a href="<?php echo base_url(); ?>index.php/plant_historian/mimic">
        <div class="col-md-3 col-xs-12">
            <div class="info-box" style="background: #dd4b39; color:#FFFFFF; opacity: 0.3">
                <span class="info-box-icon bg-red"><img class="scale" src="media/icon/worker.png" width="64px"  alt="..."></span>

                <div class="info-box-content">
                    <span class="info-box-text" style="font-size:24px;">Display Mimic</span>
                    <span class="info-box-number" style="font-size:12px;">Display  Mimic in reatime data</span>
                </div>
            </div>
        </div>
    </a>-->
    
<!--    <a href="javascript:void(0)"><?php echo base_url(); ?>index.php/plant_gresik/analysis
        <div class="col-md-3 col-xs-12">
            <div class="info-box" style="background: #dd4b39; color:#FFFFFF; opacity: 0.3">
                <span class="info-box-icon bg-red"><img class="scale" src="media/icon/cctv.png" width="64px"  alt="..."></span>

                <div class="info-box-content">
                    <span class="info-box-text" style="font-size:24px;">Display Camera</span>
                    <span class="info-box-number" style="font-size:12px;">Display Realtime Camera</span>
                </div>
            </div>
        </div>
    </a>-->
    
    <a href="<?php echo base_url(); ?>index.php/plant_rembang/packer_plant"><!--<?php echo base_url(); ?>index.php/plant_gresik/analysis-->
        <div class="col-md-3 col-xs-12">
            <div class="info-box" style="background: #dd4b39; color:#FFFFFF;">
                <span class="info-box-icon bg-red"><img class="scale" src="media/icon/forklift.png" width="64px"  alt="..."></span>

                <div class="info-box-content">
                    <span class="info-box-text" style="font-size:24px;">Packer Plant</span>
                    <span class="info-box-number" style="font-size:12px;">Display Packer Plant Activity and Realtime Data</span>
                </div>
            </div>
        </div>
    </a>
</div>