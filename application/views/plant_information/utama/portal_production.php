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
        Production Portal
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
    <a href="<?php echo base_url(); ?>index.php/plant_system/production">
        <div class="col-md-3 col-xs-12">
            <div class="info-box" style="background: #dd4b39; color:#FFFFFF;">
                <span class="info-box-icon bg-red"><img class="scale" src="media/icon/prod_sum.png" width="64px"  alt="..."></span>

                <div class="info-box-content">
                    <span class="info-box-text" style="font-size:24px;">Summary</span>
                    <span class="info-box-number" style="font-size:12px;">Show Production Amount in Chart and Summary</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
    </a>

    <a href="<?php echo base_url(); ?>index.php/plant_system/dashboard_semen">
        <div class="col-md-3 col-xs-12">
            <div class="info-box" style="background: #dd4b39; color:#FFFFFF;">
                <span class="info-box-icon bg-red"><img class="scale" src="media/icon/prod_detail.png" width="64px"  alt="..."></span>

                <div class="info-box-content">
                    <span class="info-box-text" style="font-size:24px;">Prod. Detail</span>
                    <span class="info-box-number" style="font-size:12px;">Show Production Amount in Monthly and Quarterly</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
    </a>

    <a href="<?php echo base_url(); ?>index.php/eksekutif_report">
        <div class="col-md-3 col-xs-12">
            <div class="info-box" style="background: #dd4b39; color:#FFFFFF;">
                <span class="info-box-icon bg-red"><img class="scale" src="media/icon/prod_clinker.png" width="64px"  alt="..."></span>

                <div class="info-box-content">
                    <span class="info-box-text" style="font-size:24px;">Daily Clinker</span>
                    <span class="info-box-number" style="font-size:12px;">Clinker Daily Report All SMIG Operating Company</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
    </a>

    <a  href="<?php echo base_url(); ?>index.php/eksekutif_report/cement_1">
        <div class="col-md-3 col-xs-12">
            <div class="info-box" style="background: #dd4b39; color:#FFFFFF;">
                <span class="info-box-icon bg-red"><img class="scale" src="media/icon/prod_cement.png" width="64px"  alt="..."></span>

                <div class="info-box-content">
                    <span class="info-box-text" style="font-size:24px;">Daily Cement</span>
                    <span class="info-box-number" style="font-size:12px;">Cement Daily Report All SMIG Operating Company</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
    </a>

    <a href="<?php echo base_url(); ?>index.php/plant_dashboard/dashboard_sg">
        <div class="col-md-3 col-xs-12">
            <div class="info-box" style="background: #dd4b39; color:#FFFFFF;">
                <span class="info-box-icon bg-red"><img class="scale" src="media/icon/invent_icon.png" width="64px"  alt="..."></span>

                <div class="info-box-content">
                    <span class="info-box-text" style="font-size:24px;">Inventory</span>
                    <span class="info-box-number" style="font-size:12px;">Inventory Data of Cement and Clinker</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
    </a>

    <!--    <a href="javascript:void(0)">
            <div class="col-md-3 col-xs-12">
                <div class="info-box" style="background: #dd4b39; color:#FFFFFF; opacity: 0.3;">
                    <span class="info-box-icon bg-red"><img class="scale" src="media/icon/index_icon.png" width="64px"  alt="..."></span>
    
                    <div class="info-box-content">
                        <span class="info-box-text" style="font-size:24px;">Prod. Index</span>
                        <span class="info-box-number" style="font-size:12px;">Calculate Daily Index Production</span>
                    </div>
                     /.info-box-content 
                </div>
            </div>
        </a>-->

    <a href="<?php echo base_url(); ?>index.php/plant_dashboard/gresik">
        <div class="col-md-3 col-xs-12">
            <div class="info-box" style="background: #dd4b39; color:#FFFFFF;">
                <span class="info-box-icon bg-red"><img class="scale" src="media/icon/ops_icon.png" width="64px"  alt="..."></span>

                <div class="info-box-content">
                    <span class="info-box-text" style="font-size:24px;">Yield</span>
                    <span class="info-box-number" style="font-size:12px;">Production Per Day divided by Capacity Plan per Day</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
    </a>

    <!--    <a href="javascript:void(0)">
            <div class="col-md-3 col-xs-12">
                <div class="info-box" style="background: #dd4b39; color:#FFFFFF; opacity: 0.3;">
                    <span class="info-box-icon bg-red"><img class="scale" src="media/icon/dash_icon.png" width="64px"  alt="..."></span>
    
                    <div class="info-box-content">
                        <span class="info-box-text" style="font-size:24px;">Dashboard</span>
                        <span class="info-box-number" style="font-size:12px;">Dashboard of Production and Inventory</span>
                    </div>
                     /.info-box-content 
                </div>
            </div>
        </a>-->

    <!--<div class="col-md-3 col-xs-12">&nbsp;</div>-->

    <div class="dropdownkl col-md-3 col-xs-12">
        <div class="dropbtnkl info-box" style="background: #dd4b39; color:#FFFFFF;">
            <span class="info-box-icon bg-red"><img class="scale" src="media/icon/icon_man2.png" width="64px"  alt="..."></span>
            <div class="dropdown-contentkl" align="left">
                <a href="<?php echo base_url(); ?>index.php/master_data/kiln_ops/3"><img src="media/icKota2.png" width="48px"  alt="...">&nbsp; | Padang</a>
                <a href="javascript:void(0)"><img src="media/icKota1.png" width="48px"  alt="...">&nbsp; | Gresik</a>
                <a href="<?php echo base_url(); ?>index.php/master_data/kiln_ops/2"><img src="media/KSO.png" width="48px"  alt="...">&nbsp; | KSO SI-SG</a>
                <a href="<?php echo base_url(); ?>index.php/master_data/kiln_ops/4"><img src="media/icKota3.png" width="48px"  alt="...">&nbsp; | Tonasa</a>
                <a href="<?php echo base_url(); ?>index.php/master_data/kiln_ops/5"><img src="media/icKota4.png" width="48px"  alt="...">&nbsp; | TLCC</a>
            </div>
            <div class="info-box-content">
                <span class="info-box-text" style="font-size:24px;">KILN Ops</span>
                <span class="info-box-number" style="font-size:12px;">Insert Data of KILN Operations</span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>

    <div class="dropdownfm col-md-3 col-xs-12">
        <div class="dropbtnfm info-box" style="background: #dd4b39; color:#FFFFFF;">
            <span class="info-box-icon bg-red"><img class="scale" src="media/icon/icon_man4.png" width="64px"  alt="..."></span>
            <div class="dropdown-contentfm" align="left">
                <a href="<?php echo base_url(); ?>index.php/master_data/fm_ops/3"><img src="media/icKota2.png" width="48px"  alt="...">&nbsp; | Padang</a>
                <a href="javascript:void(0)"><img src="media/icKota1.png" width="48px"  alt="...">&nbsp; | Gresik</a>
                <a href="<?php echo base_url(); ?>index.php/master_data/fm_ops/2"><img src="media/KSO.png" width="48px"  alt="...">&nbsp; | KSO SI-SG</a>
                <a href="<?php echo base_url(); ?>index.php/master_data/fm_ops/4"><img src="media/icKota3.png" width="48px"  alt="...">&nbsp; | Tonasa</a>
                <a href="<?php echo base_url(); ?>index.php/master_data/fm_ops/5"><img src="media/icKota4.png" width="48px"  alt="...">&nbsp; | TLCC</a>
            </div>
            <div class="info-box-content">
                <span class="info-box-text" style="font-size:24px;">FM Ops</span>
                <span class="info-box-number" style="font-size:12px;">Insert Data of FM Operations</span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>
    <!--<div class="col-md-3 col-xs-12">&nbsp;</div>-->
<!--    <a href="javascript:void(0)">
        <div class="col-md-3 col-xs-12">
            <div class="info-box" style="background: #dd4b39; color:#FFFFFF; opacity: 0.3;">
                <span class="info-box-icon bg-red"><img class="scale" src="media/icon/numbered-list.png" width="64px"  alt="..."></span>

                <div class="info-box-content">
                    <span class="info-box-text" style="font-size:24px;">Chart's X-Y</span>
                    <span class="info-box-number" style="font-size:12px;">Manage Chart's X-Y values</span>
                </div>
            </div>
        </div>
    </a>
    <div class="col-md-3 col-xs-12">&nbsp;</div>
    <div class="col-md-3 col-xs-12">&nbsp;</div>
    <div class="col-md-3 col-xs-12">&nbsp;</div>-->
</div>