<script src="<?php echo base_url() ?>bootstrap/plantView/assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url() ?>bootstrap/plantView/highcharts/highcharts.js"></script>
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
            <div class="col-xs-9 navbar-header ">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h3 style="text-align: left; padding-left: 12px; margin-top: 10px;">Tuban Plant Input Performance Data</h3>
            </div>
            <div class="col-xs-1" style="padding-top: 8px;">
                <a href="<?php echo base_url(); ?>index.php/plant_system/portal_maintenance" style="float: right"><button class="btn btn-success">Back</button></a>
            </div>
            <div class="col-xs-2 collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="float: right;">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff ">Gresik<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= base_url() ?>index.php/plant_padang/maintenance">Padang</a></li>
                            <li role="separator" class="divider"></li>

                            <li class="active"><a href="<?= base_url() ?>index.php/plant_gresik/maintenance">Gresik</a></li>
                            <li role="separator" class="divider"></li>

                            <li><a href="<?= base_url() ?>index.php/plant_tonasa/maintenance">Tonasa</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url() ?>index.php/plant_tlcc/maintenance">TLCC</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<!--<div class="col-md-12 col-xs-12">
    <div style="font-size: 16px; padding-top: 5px" id="exampleConsole"></div>
    <div id="example"  style="width:100%; height:500px; overflow: hidden"></div>   class="handsontable htRowHeaders htColumnHeaders" 
</div>-->

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
        <form action="<?php echo base_url(); ?>index.php/plant_gresik/data_mass_gresik" method="post" enctype="multipart/form-data">
            <input style="margin-bottom: 10px;" type="file" accept=".xls,.xlsx, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel" name="file" class="form-control">
            <input type="submit" class="btn btn-info" value="Upload" name="Upload">
        </form>
        <p style="margin-top: 10px;">Don't have any template before? <a href="<?php echo base_url(); ?>media/template_inspeksi_KSO_Tuban.xls" download>Download this template</a></p>
    </div>
</div>

<div class="col-1-5">
    <div style="padding-bottom: 10px;">
        <center><img src="<?php echo base_url(); ?>media/icKota1.png" width="64px" alt="SG"/></center>
    </div>
    <div>
        <form action="<?php echo base_url(); ?>index.php/plant_rembang/data_mass_rembang" method="post" enctype="multipart/form-data">
            <input style="margin-bottom: 10px;" type="file" accept=".xls,.xlsx, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel" name="file" class="form-control">
            <input type="submit" class="btn btn-info" value="Upload" name="Upload">
        </form>
        <p style="margin-top: 10px;">Don't have any template before? <a href="<?php echo base_url() ?>media/template_inspeksi_SG_Rembang.xls" download>Download this template</a></p>
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


<?php
$tahun = date('Y');
$bulan = date('m') - 1;
?>
<script>
    var $container = $("#example"),
            $console = $("#exampleConsole"),
            $parent = $container.parent(),
            autosaveNotification,
            hot,
            category = 'UTILITAS',
            year_avg = <?php echo date('Y');?>;

    hot = new Handsontable($container[0], {
        columnSorting: true,
        startRows: 15,
        startCols: 14,
        minRows: 20,
        rowHeaders: true,
        colHeaders: false,
        columns: [
            {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {}
        ],
        minSpareCols: 0,
        minSpareRows: 1,
        fixedRowsTop: 2,
        fixedColumnsLeft: 1,
        contextMenu: true,
        manualColumnResize: true,
        manualRowResize: true,
        cells: function (row, col, prop) {
            var cellProperties = {};

            cellProperties.renderer = all;
            cellProperties.className = "htCenter htMiddle";
            
            if (row === 0 && col > 0) {
                if (col < 1)
                    cellProperties.renderer = CATEGORY; // uses function directly
                else if (col >= 1 && col < 13)
                    cellProperties.renderer = BULAN;
                else if (col === 13)
                    cellProperties.renderer = YEAR;
            }
            return cellProperties;
        },
        data: [
            [category, 'JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC', year_avg]
        ]
    });
    
    function BULAN(instance, td, row, col, prop, value, cellProperties) {
        Handsontable.renderers.TextRenderer.apply(this, arguments);
        td.style.fontWeight = 'bold';
        td.style.color = 'white';
        td.style.background = '#1D2247';
    }
    function CATEGORY(instance, td, row, col, prop, value, cellProperties) {
        Handsontable.renderers.TextRenderer.apply(this, arguments);

        td.style.color = 'white';
        td.style.background = '#D4D4D4';
    }
    function YEAR(instance, td, row, col, prop, value, cellProperties) {
        Handsontable.renderers.TextRenderer.apply(this, arguments);

        td.style.color = 'white';
        td.style.background = '#45362E';
    }
    
    function all(instance, td, row, col, prop, value, cellProperties) {
        Handsontable.renderers.TextRenderer.apply(this, arguments);
        if (row % 2 === 0 && row > 1) {
            td.style.background = '#D2D7D3';
        } else if (row % 2 === 1 && row > 1) {
            td.style.background = 'white';
        }
    }
    
    var settings = {};
    settings.readOnly = true;  // make table cells read-only
    settings.contextMenu = false;  // disable context menu to change things
    settings.disableVisualSelection = false;  // prevent user from visually selecting

    settings.comments = false;  // prevent editing of comments
    hot.updateSettings(settings);

    $("#load").click(function () {
        $.ajax({
            url: 'master_data/get_production_gresik/<?php echo $bulan; ?>/<?php echo $tahun; ?>',
            type: 'GET',
            success: function (res) {
                var mine = JSON.parse(res);
                var data = [], row;
                data[0] = [category, 'JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC', year_avg];
                
                for (var i = 0, ilen = mine.mydata.length; i < ilen; i++) {
                    row = [];
                    row[0] = mine.mydata[i].DATE_PROD;
                    row[1] = mine.mydata[i].RM1_PROD;
                    row[2] = mine.mydata[i].RM1_JOP;
                    row[3] = mine.mydata[i].RM2_PROD;
                    row[4] = mine.mydata[i].RM2_JOP;
                    row[5] = mine.mydata[i].RM3_PROD;
                    row[6] = mine.mydata[i].RM3_JOP;
                    row[7] = mine.mydata[i].RM4_PROD;
                    row[8] = mine.mydata[i].RM4_JOP;
                    row[9] = mine.mydata[i].KL1_PROD;
                    row[10] = mine.mydata[i].KL1_JOP;
                    row[11] = mine.mydata[i].KL2_PROD;
                    row[12] = mine.mydata[i].KL2_JOP;
                    row[13] = mine.mydata[i].KL3_PROD;
                    
                    data[parseInt(mine.mydata[i].ID) + 1] = row;
                }
            }
        });
    }).click();
</script>