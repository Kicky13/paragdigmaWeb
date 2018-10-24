<script src="<?php echo base_url() ?>bootstrap/plantView/assets/js/jquery-1.12.4.js"></script>
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
</style>
<script>
    $(function () {
        $('#maintenance_perf').click(function () {
            window.location.href = 'index.php/plant_gresik/maintenance_perf';
        });
        $('#maintenance_perf_tbl').click(function () {
            window.location.href = 'index.php/plant_gresik/maintenance_perf_tbl';
        });
    });
</script>
<div class="row">
    <nav class="navbar navbar-default panelup">
        <div class="container-fluid">
            <div class="col-xs-6 navbar-header ">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h3 style="text-align: left; padding-left: 12px; margin-top: 10px;">Tuban Plant Performance Report</h3>
            </div>
            <div class="col-xs-2">
                <ul class="nav navbar-nav">
                    <li><a href="#"> <span class="sr-only">(current)</span></a></li>
                    <li>
                    </li>
                </ul>
                <form class="navbar-form navbar-left">
                    <div class="form-group">
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-warning" aria-label="Left Align" id="maintenance_perf" type="button">
                            Chart
                        </button>
                        <button class="btn btn-default " aria-label="Left Align" id="maintenance_perf_tbl" type="button">
                            Table 
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-xs-2"  style="padding-top: 8px;">
                <a href="<?php echo base_url(); ?>index.php/plant_system/portal_maintenance" style="float: right"><button class="btn btn-success">Back</button></a>
                <button id="load" class="btn btn-info">Load</button>
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
<center><p>Report UTILISASI</p></center>
<div class="row col-xs-12">
    <div id="utilisasi"></div>
</div>
<center><p>Report YIELD</p></center>
<div class="row col-xs-12">
    <div id="yield"></div>
</div>
<center><p>Report EFISIENSI</p></center>
<div class="row col-xs-12">
    <div id="efisiensi"></div>
</div>
<?php
$tahun = $this->input->get('tahun');
$company = 7000; //$this->input->get('company');
$category = 'UTILISASI'; //$this->input->get('cat');
?>
<script>
    var $container_util = $("#utilisasi"),
            $container_yield = $("#yield"),
            $container_eff = $("#efisiensi"),
            autosaveNotification,
            hot_util,
            hot_yield,
            hot_eff,
            category = '<?php echo $category; ?>',
            year_avg = <?php echo date('Y'); ?>;

    hot_util = new Handsontable($container_util[0], {
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
            if (row === 1 && row === 8 && row === 15 && row === 22) {
                cellProperties.renderer = TOTAL;
            }
            return cellProperties;
        },
        data: [
            ['UTILISASI', 'JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC', year_avg]
        ]
    });
    
    hot_yield = new Handsontable($container_yield[0], {
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
            if (row === 1 && row === 8 && row === 15 && row === 22) {
                cellProperties.renderer = TOTAL;
            }
            return cellProperties;
        },
        data: [
            ['YIELD', 'JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC', year_avg]
        ]
    });
    
    hot_eff = new Handsontable($container_eff[0], {
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
                if (col === 0)
                    cellProperties.renderer = CATEGORY; // uses function directly
                else if (col >= 1 && col < 13)
                    cellProperties.renderer = BULAN;
                else if (col === 13)
                    cellProperties.renderer = YEAR;
            }
            if (row === 1 && row === 8 && row === 15 && row === 22 && col > 0) {
                cellProperties.renderer = TOTAL;
            }
            return cellProperties;
        },
        data: [
            ['EFISIENSI', 'JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC', year_avg]
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
        td.style.background = '#8A2D3C';
    }
    function YEAR(instance, td, row, col, prop, value, cellProperties) {
        Handsontable.renderers.TextRenderer.apply(this, arguments);

        td.style.color = 'white';
        td.style.background = '#45362E';
    }

    function all(instance, td, row, col, prop, value, cellProperties) {
        Handsontable.renderers.TextRenderer.apply(this, arguments);
        td.style.background = 'white';
    }

    function TOTAL(instance, td, row, col, prop, value, cellProperties) {
        Handsontable.renderers.TextRenderer.apply(this, arguments);
        td.style.color = 'white';
        td.style.background = 'black';
    }

    var settings = {};
    settings.readOnly = true;  // make table cells read-only
    settings.contextMenu = false;  // disable context menu to change things
    settings.disableVisualSelection = false;  // prevent user from visually selecting

    settings.comments = false;  // prevent editing of comments
    hot_util.updateSettings(settings);
    hot_yield.updateSettings(settings);
    hot_eff.updateSettings(settings);
    
    $("#load").click(function () {
        $.ajax({
            url: '<?php echo base_url() ?>index.php/plant_gresik/maintenance_perf_data?cat=UTILISASI&tahun=<?php echo $tahun; ?>&company=<?php echo $company; ?>',
                        type: 'GET',
                        success: function (res) {
                            var mine = JSON.parse(res);
                            var data = [], row;
                            data[0] = ['UTILISASI', 'JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC', year_avg];

                            for (var i = 0, ilen = mine.data.length; i < ilen; i++) {
                                row = [];
                                row[0] = mine.data[i].EQUIPMENT;
                                row[1] = mine.data[i].B01_DATA;
                                row[2] = mine.data[i].B02_DATA;
                                row[3] = mine.data[i].B03_DATA;
                                row[4] = mine.data[i].B04_DATA;
                                row[5] = mine.data[i].B05_DATA;
                                row[6] = mine.data[i].B06_DATA;
                                row[7] = mine.data[i].B07_DATA;
                                row[8] = mine.data[i].B08_DATA;
                                row[9] = mine.data[i].B09_DATA;
                                row[10] = mine.data[i].B10_DATA;
                                row[11] = mine.data[i].B11_DATA;
                                row[12] = mine.data[i].B12_DATA;
                                row[13] = mine.data[i].TOTAL;

                                data[parseInt(mine.data[i].ID)] = row;
                            }
                            hot_util.loadData(data);
                        }
                    });
                    
        $.ajax({
            url: '<?php echo base_url() ?>index.php/plant_gresik/maintenance_perf_data?cat=YIELD&tahun=<?php echo $tahun; ?>&company=<?php echo $company; ?>',
                        type: 'GET',
                        success: function (res) {
                            var mine = JSON.parse(res);
                            var data = [], row;
                            data[0] = ['YIELD', 'JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC', year_avg];

                            for (var i = 0, ilen = mine.data.length; i < ilen; i++) {
                                row = [];
                                row[0] = mine.data[i].EQUIPMENT;
                                row[1] = mine.data[i].B01_DATA;
                                row[2] = mine.data[i].B02_DATA;
                                row[3] = mine.data[i].B03_DATA;
                                row[4] = mine.data[i].B04_DATA;
                                row[5] = mine.data[i].B05_DATA;
                                row[6] = mine.data[i].B06_DATA;
                                row[7] = mine.data[i].B07_DATA;
                                row[8] = mine.data[i].B08_DATA;
                                row[9] = mine.data[i].B09_DATA;
                                row[10] = mine.data[i].B10_DATA;
                                row[11] = mine.data[i].B11_DATA;
                                row[12] = mine.data[i].B12_DATA;
                                row[13] = mine.data[i].TOTAL;

                                data[parseInt(mine.data[i].ID)] = row;
                            }
                            hot_yield.loadData(data);
                        }
                    });
                    
        $.ajax({
            url: '<?php echo base_url() ?>index.php/plant_gresik/maintenance_perf_data?cat=EFISIENSI&tahun=<?php echo $tahun; ?>&company=<?php echo $company; ?>',
                        type: 'GET',
                        success: function (res) {
                            var mine = JSON.parse(res);
                            var data = [], row;
                            data[0] = ['EFISIENSI', 'JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC', year_avg];

                            for (var i = 0, ilen = mine.data.length; i < ilen; i++) {
                                row = [];
                                row[0] = mine.data[i].EQUIPMENT;
                                row[1] = mine.data[i].B01_DATA;
                                row[2] = mine.data[i].B02_DATA;
                                row[3] = mine.data[i].B03_DATA;
                                row[4] = mine.data[i].B04_DATA;
                                row[5] = mine.data[i].B05_DATA;
                                row[6] = mine.data[i].B06_DATA;
                                row[7] = mine.data[i].B07_DATA;
                                row[8] = mine.data[i].B08_DATA;
                                row[9] = mine.data[i].B09_DATA;
                                row[10] = mine.data[i].B10_DATA;
                                row[11] = mine.data[i].B11_DATA;
                                row[12] = mine.data[i].B12_DATA;
                                row[13] = mine.data[i].TOTAL;

                                data[parseInt(mine.data[i].ID)] = row;
                            }
                            hot_eff.loadData(data);
                        }
                    });
                }).click();
</script>