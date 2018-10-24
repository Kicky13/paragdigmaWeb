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
    /* CSS KILN */
    .dropbtnkl {
        background-color: #4CAF50;
        color: white;
        /*padding: 16px;*/
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    .dropdownkl {
        position: relative;
        display: inline-block;
    }

    .dropdown-contentkl {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-contentkl a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-contentkl a:hover {background-color: #D2D7D3}

    .dropdownkl:hover .dropdown-contentkl {
        display: block;
    }

    .dropdownkl:hover .dropbtnkl {
        background-color: #3e8e41;
    }
    /* CSS FM */
    .dropbtnfm {
        background-color: #4CAF50;
        color: white;
        /*padding: 16px;*/
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    .dropdownfm {
        position: relative;
        display: inline-block;
    }

    .dropdown-contentfm {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-contentfm a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-contentfm a:hover {background-color: #D2D7D3}

    .dropdownfm:hover .dropdown-contentfm {
        display: block;
    }

    .dropdownfm:hover .dropbtnfm {
        background-color: #3e8e41;
    }
</style>
<!--        batas-->
<section class="content-header" style="margin-bottom:15px;">
    <h1>
        Maintenance Portal
        <small>Option page</small>
    </h1>
    <ol class="breadcrumb" style="font-size: large; font-weight: bold;">Today : 
        <?php
        echo date('l') . ", ";
        echo date('d F Y');
        ?>
    </ol>
</section>

<div class="row" style="height:29px; margin-bottom:34px;">
    <section class="content-header" style="margin-bottom:15px;">
        <h1>
            Input Section
        </h1>
    </section>
    <div class="col-xs-12 padding-orange padding-orange-bottom">        
        <a href="<?php echo base_url(); ?>index.php/plant_gresik/maintenance_insp_input">
            <!--<a href="javascript:;">-->
            <div class="col-md-3 col-xs-12">
                <div class="info-box" style="background: #dd4b39; color:#FFFFFF">
                    <span class="info-box-icon bg-red"><img class="scale" src="media/icon/inspection.png" width="64px"  alt="..."></span>

                    <div class="info-box-content">
                        <span class="info-box-text" style="font-size:24px;">Inspection Data</span>
                        <span class="info-box-number" style="font-size:12px;">Input Data of Equipment Availability, Condition and Potential Problem Report in Chart</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
        </a>

        <a href="<?php echo base_url(); ?>index.php/plant_gresik/maintenance_data">
            <!--<a href="javascript:;">-->
            <div class="col-md-3 col-xs-12">
                <div class="info-box" style="background: #dd4b39; color:#FFFFFF;">
                    <span class="info-box-icon bg-red"><img class="scale" src="media/icon/performance.png" width="64px"  alt="..."></span>

                    <div class="info-box-content">
                        <span class="info-box-text" style="font-size:24px;">Performance Data</span>
                        <span class="info-box-number" style="font-size:12px;">Input Data of Performance, Utilization and Efficiency of Plant Equipment</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
        </a>

        <a href="javascript:;">
            <!--<a href="javascript:;">-->
            <div class="col-md-3 col-xs-12">
                <div class="info-box" style="background: #dd4b39; color:#FFFFFF;opacity: 0.3">
                    <span class="info-box-icon bg-red"><img class="scale" src="media/icon/backlog.png" width="64px"  alt="..."></span>

                    <div class="info-box-content">
                        <span class="info-box-text" style="font-size:24px;">Backlog Data</span>
                        <span class="info-box-number" style="font-size:12px;">Show Backlog Report</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
        </a>
        
        <a href="javascript:;">
            <!--<a href="javascript:;">-->
            <div class="col-md-3 col-xs-12">
                <div class="info-box" style="background: #dd4b39; color:#FFFFFF;opacity: 0.3">
                    <span class="info-box-icon bg-red"><img class="scale" src="media/icon/pyramid-chart.png" width="64px"  alt="..."></span>

                    <div class="info-box-content">
                        <span class="info-box-text" style="font-size:24px;">FMEA Data</span>
                        <span class="info-box-number" style="font-size:12px;">Show FMEA Report</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div> 
        </a>

        <a href="<?php echo base_url(); ?>index.php/plant_gresik/maintenance_cost_input">
            <!--<a href="javascript:;">-->
            <div class="col-md-3 col-xs-12">
                <div class="info-box" style="background: #dd4b39; color:#FFFFFF;">
                    <span class="info-box-icon bg-red"><img class="scale" src="media/icon/money-bag.png" width="64px"  alt="..."></span>

                    <div class="info-box-content">
                        <span class="info-box-text" style="font-size:24px;">Maintenance Cost Input</span>
                        <span class="info-box-number" style="font-size:12px;">Input Data of Maintenance Cost</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div> 
        </a>
    </div>
    <div style="padding-bottom: 0px">&nbsp;</div>
    <section class="content-header" style="margin-bottom:15px;">
        <h1>
            Report Section
        </h1>
    </section>
    <div class="col-xs-12 padding-red padding-red-bottom">

        <a href="<?php echo base_url(); ?>index.php/plant_gresik/maintenance_insp">
            <!--<a href="javascript:;">-->
            <div class="col-md-3 col-xs-12">
                <div class="info-box" style="background: #dd4b39; color:#FFFFFF">
                    <span class="info-box-icon bg-red"><img class="scale" src="media/icon/inspection.png" width="64px"  alt="..."></span>

                    <div class="info-box-content">
                        <span class="info-box-text" style="font-size:24px;">Inspection</span>
                        <span class="info-box-number" style="font-size:12px;">Show Equipment Availability, Condition and Potential Problem Report in Chart</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
        </a>

        <a href="<?php echo base_url(); ?>index.php/plant_gresik/maintenance_perf">
            <!--<a href="javascript:;">-->
            <div class="col-md-3 col-xs-12">
                <div class="info-box" style="background: #dd4b39; color:#FFFFFF;">
                    <span class="info-box-icon bg-red"><img class="scale" src="media/icon/performance.png" width="64px"  alt="..."></span>

                    <div class="info-box-content">
                        <span class="info-box-text" style="font-size:24px;">Performance Report</span>
                        <span class="info-box-number" style="font-size:12px;">Show Performance, Utilization and Efficiency of Plant Equipment in Monthly</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
        </a>

        <a href="<?php echo base_url(); ?>index.php/plant_gresik/backlog">
            <!--<a href="javascript:;">-->
            <div class="col-md-3 col-xs-12">
                <div class="info-box" style="background: #dd4b39; color:#FFFFFF;opacity: 0.3">
                    <span class="info-box-icon bg-red"><img class="scale" src="media/icon/backlog.png" width="64px"  alt="..."></span>

                    <div class="info-box-content">
                        <span class="info-box-text" style="font-size:24px;">Backlog</span>
                        <span class="info-box-number" style="font-size:12px;">Show Backlog Report</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
        </a>

        <a href="<?php echo base_url(); ?>index.php/plant_gresik/fmea">
            <!--<a href="javascript:;">-->
            <div class="col-md-3 col-xs-12">
                <div class="info-box" style="background: #dd4b39; color:#FFFFFF;opacity: 0.3">
                    <span class="info-box-icon bg-red"><img class="scale" src="media/icon/pyramid-chart.png" width="64px"  alt="..."></span>

                    <div class="info-box-content">
                        <span class="info-box-text" style="font-size:24px;">FMEA</span>
                        <span class="info-box-number" style="font-size:12px;">Show FMEA Report</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div> 
        </a>

        <a href="<?php echo base_url(); ?>index.php/plant_gresik/maintenance_cost">
            <!--<a href="javascript:;">-->
            <div class="col-md-3 col-xs-12">
                <div class="info-box" style="background: #dd4b39; color:#FFFFFF;">
                    <span class="info-box-icon bg-red"><img class="scale" src="media/icon/money-bag.png" width="64px"  alt="..."></span>

                    <div class="info-box-content">
                        <span class="info-box-text" style="font-size:24px;">Maintenance Cost</span>
                        <span class="info-box-number" style="font-size:12px;">Show Maintenance Cost Report</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div> 
        </a>
    </div>
</div>