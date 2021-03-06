<link rel="stylesheet" media="screen" href="<?php echo base_url() ?>bootstrap/handsontable/handsontable.full.css">
<link rel="stylesheet" media="screen" href="<?php echo base_url() ?>bootstrap/handsontable/pikaday/pikaday.css">
<script src="<?php echo base_url() ?>bootstrap/plantView/assets/js/jquery-1.11.3.min.js"></script>
<script src="<?php echo base_url() ?>bootstrap/handsontable/handsontable.full.js"></script>
<script src="<?php echo base_url() ?>bootstrap/handsontable/pikaday/pikaday.js"></script>
<script src="<?php echo base_url() ?>bootstrap/handsontable/moment/moment.js"></script>
<script src="<?php echo base_url() ?>bootstrap/handsontable/zeroclipboard/ZeroClipboard.js"></script>
<script src="<?php echo base_url() ?>bootstrap/handsontable/numbro/numbro.js"></script>
<script src="<?php echo base_url() ?>bootstrap/handsontable/numbro/languages.js"></script>
<style>
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
<div class="row" style="margin-bottom: 2px;">
    <nav class="navbar navbar-inverse my_margin">
        <div class="col-md-10 container-fluid">
            <div class="navbar-header">
                <h3 style="text-align: left; padding-left: 12px; margin-top: 10px; color: white"><?php echo $a; ?></h3>
            </div>
        </div>
        <div class="col-md-2">
            <a href="<?php echo base_url();?>index.php/master_data"><div class="btn btn-info">Back</div></a>
        </div>
    </nav>
    <div class="col-xs-12">
        <p>Use <strong>Import Excel</strong> feature below to make bulk update or insert new data.</p>
        <p>Available for : <b>KILN & Finish Mill Operations Detail, Daily Prognose, Daily Stock</b></p>
    </div>
    <div class="col-1-5">
        <div style="padding-bottom: 10px;">
            <center><img src="<?php echo base_url(); ?>media/icKota2.png" width="64px" alt="SP"/></center>
        </div>
        <div>
            <form action="<?php echo base_url(); ?>index.php/plant_administrator/data_mass_padang" method="post" enctype="multipart/form-data">
                <input style="margin-bottom: 10px;" type="file" accept=".xls,.xlsx, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel" name="file" class="form-control">
                <input type="submit" class="btn btn-info" value="Upload" name="Upload">
            </form>
            <p style="margin-top: 10px;">Don't have any template before? <a href="<?php echo base_url(); ?>media/template_upload_PIS_Padang.xls" download>Download this template</a></p>
        </div>
    </div>

    <div class="col-1-5">
        <div style="padding-bottom: 10px;">
            <center><img src="<?php echo base_url(); ?>media/KSO.png" width="64px" alt="KSO"/></center>
        </div>
        <div>
            <form action="<?php echo base_url(); ?>index.php/plant_administrator/data_mass_gresik" method="post" enctype="multipart/form-data">
                <input style="margin-bottom: 10px;" type="file" accept=".xls,.xlsx, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel" name="file" class="form-control">
                <input type="submit" class="btn btn-info" value="Upload" name="Upload">
            </form>
            <p style="margin-top: 10px;">Don't have any template before? <a href="<?php echo base_url(); ?>media/template_upload_PIS_Gresik.xls" download>Download this template</a></p>
        </div>
    </div>

    <div class="col-1-5">
        <div style="padding-bottom: 10px;">
            <center><img src="<?php echo base_url(); ?>media/icKota1.png" width="64px" alt="SG"/></center>
        </div>
        <div>
            <form action="<?php echo base_url(); ?>index.php/plant_administrator/data_mass_rembang" method="post" enctype="multipart/form-data">
                <input style="margin-bottom: 10px;" type="file" accept=".xls,.xlsx, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel" name="file" class="form-control">
                <input type="submit" class="btn btn-info" value="Upload" name="Upload">
            </form>
            <p style="margin-top: 10px;">Don't have any template before? <a href="<?php echo base_url()?>media/template_upload_PIS_Rembang.xls" download>Download this template</a></p>
        </div>
    </div>

    <div class="col-1-5">
        <div style="padding-bottom: 10px;">
            <center><img src="<?php echo base_url(); ?>media/icKota3.png" width="64px" alt="ST"/></center>
        </div>
        <div>
            <form action="<?php echo base_url(); ?>index.php/plant_administrator/data_mass_tonasa" method="post" enctype="multipart/form-data">
                <input style="margin-bottom: 10px;" type="file" accept=".xls,.xlsx, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel" name="file" class="form-control">
                <input type="submit" class="btn btn-info" value="Upload" name="Upload">
            </form>
            <p style="margin-top: 10px;">Don't have any template before? <a href="<?php echo base_url()?>media/template_upload_PIS_Tonasa.xls" download>Download this template</a></p>
        </div>
    </div>

    <div class="col-1-5">
        <div style="padding-bottom: 10px;">
            <center><img src="<?php echo base_url(); ?>media/icKota4.png" width="64px" alt="TLCC"/></center>
        </div>
        <div>
            <form action="<?php echo base_url(); ?>index.php/plant_administrator/data_mass_tlcc" method="post" enctype="multipart/form-data">
                <input style="margin-bottom: 10px;" type="file" accept=".xls,.xlsx, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel" name="file" class="form-control">
                <input type="submit" class="btn btn-info" value="Upload" name="Upload">
            </form>
            <p style="margin-top: 10px;">Don't have any template before? <a href="<?php echo base_url()?>media/template_upload_PIS_TLCC.xls" download>Download this template</a></p>
        </div>
    </div>
</div>