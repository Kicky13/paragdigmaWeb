<script src="<?php echo base_url() ?>bootstrap/plantView/assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url() ?>bootstrap/plantView/highcharts/highcharts.js"></script>
<style>
    .blink_me {
        animation: blinker 1s linear infinite;
    }
    @keyframes blinker {  
        50% { opacity: 0; }
    }
    @media(min-width: 768px){
        .col-1-5{
            width: 20%;
            float: left;
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }
    }
</style>
<div class="row">
    <nav class="navbar navbar-default panelup">
        <div class="container-fluid">
            <div class="col-xs-11 navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h3 style="text-align: left; padding-left: 12px; margin-top: 10px;">Tuban Plant Maintenance Cost Report</h3>
            </div>
            <div style="padding-top: 8px;" class="col-xs-1">
                <a href="<?php echo base_url(); ?>index.php/plant_system/portal_maintenance" style="float: right"><button class="btn btn-default">Back</button></a>
            </div>
        </div>
    </nav>
</div>
<div class="col-1-5">
    <div style="padding-bottom: 10px;">
        <center><img src="<?php echo base_url(); ?>media/icKota2.png" width="64px" alt="SP" style="opacity: 0.1"/></center>
    </div>
    <div>
        <form action="<?php echo base_url(); ?>index.php/plant_administrator/data_mass_padang" method="post" enctype="multipart/form-data">
            <input style="margin-bottom: 10px;" type="file" accept=".xls,.xlsx, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel" name="file" class="form-control" disabled>
            <input type="submit" class="btn btn-info" value="Upload" name="Upload" disabled>
        </form>
        <!--<p style="margin-top: 10px;">Don't have any template before? <a href="javascript:;" download>Download this template</a></p>-->
    </div>
</div>
<div class="col-1-5">
    <div style="padding-bottom: 10px;">
        <center><img src="<?php echo base_url(); ?>media/KSO.png" width="64px" alt="KSO"/></center>
    </div>
    <div>
        <form action="<?php echo base_url(); ?>index.php/plant_gresik/maintenance_cost_upload" method="post" enctype="multipart/form-data">
            <input style="margin-bottom: 10px;" type="file" accept=".xls,.xlsx, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel" name="file" class="form-control">
            <input type="submit" class="btn btn-info" value="Upload" name="Upload">
        </form>
        <p style="margin-top: 10px;">Don't have any template before? <a href="<?php echo base_url(); ?>media/template_maint_cost_KSO_Tuban.xls" download>Download this template</a></p>
    </div>
</div>

<div class="col-1-5">
    <div style="padding-bottom: 10px;">
        <center><img src="<?php echo base_url(); ?>media/icKota1.png" width="64px" alt="SG" style="opacity: 0.1"/></center>
    </div>
    <div>
        <form action="<?php echo base_url(); ?>index.php/plant_rembang/data_mass_rembang" method="post" enctype="multipart/form-data">
            <input style="margin-bottom: 10px;" type="file" accept=".xls,.xlsx, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel" name="file" class="form-control" disabled>
            <input type="submit" class="btn btn-info" value="Upload" name="Upload" disabled>
        </form>
        <!--<p style="margin-top: 10px;">Don't have any template before? <a href="javascript:;" download>Download this template</a></p>-->
    </div>
</div>

<div class="col-1-5">
    <div style="padding-bottom: 10px;">
        <center><img src="<?php echo base_url(); ?>media/icKota3.png" width="64px" alt="ST" style="opacity: 0.1"/></center>
    </div>
    <div>
        <form action="<?php echo base_url(); ?>index.php/plant_administrator/data_mass_tonasa" method="post" enctype="multipart/form-data">
            <input style="margin-bottom: 10px;" type="file" accept=".xls,.xlsx, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel" name="file" class="form-control" disabled>
            <input type="submit" class="btn btn-info" value="Upload" name="Upload" disabled>
        </form>
        <!--<p style="margin-top: 10px;">Don't have any template before? <a href="javascript:;" download>Download this template</a></p>-->
    </div>
</div>

<div class="col-1-5">
    <div style="padding-bottom: 10px;">
        <center><img src="<?php echo base_url(); ?>media/icKota4.png" width="64px" alt="TLCC" style="opacity: 0.1"/></center>
    </div>
    <div>
        <form action="<?php echo base_url(); ?>index.php/plant_administrator/data_mass_tlcc" method="post" enctype="multipart/form-data">
            <input style="margin-bottom: 10px;" type="file" accept=".xls,.xlsx, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel" name="file" class="form-control" disabled>
            <input type="submit" class="btn btn-info" value="Upload" name="Upload" disabled>
        </form>
        <!--<p style="margin-top: 10px;">Don't have any template before? <a href="javascript:;" download>Download this template</a></p>-->
    </div>
</div>