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
    .my_margin {
        margin-left: 10px;
        margin-right: 10px;
    }
    .blink_me {
        animation: blinker 1s linear infinite;
    }
    @keyframes blinker {  
        50% { opacity: 0; }
    }
</style>
<?php
$my_month = date_create($last_update['0']['BULAN']);
$my_bln = date_format($my_month, 'm');

$bln_x = $this->input->get('bulan');
if (strlen($bln_x) < 2) {
    $bln = '0' . $bln_x;
} else {
    $bln = $bln_x;
}
$thn = $this->input->get('tahun');
$tahun = !empty($thn) ? $thn : date('Y');
$bulan = !empty($bln) ? $bln : date('m');
?>
<div class="row" style="margin-bottom: 2px;">
    <nav class="navbar navbar-inverse my_margin">
        <div class="col-md-6 container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?= base_url() ?>index.php/master_data/tlcc">Tonasa Yield Report</a>
            </div>
        </div>
        <div class="col-md-6"> <!--   container-fluid -->
            <div class="col-md-4" style="padding-left: 0px">
                <ul class="nav navbar-nav navbar-center">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff "><?php echo date("F", mktime(0, 0, 0, $bulan, 10)) ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php
                            for ($ii = 1; $ii <= $my_bln; $ii++) {
                                if (strlen($ii) < 2) {
                                    $i = '0' . $ii;
                                } else {
                                    $i = $ii;
                                }
                                echo '<li>
                                    <button class="btn btn-default" type="button" id="bulan_' . $i . '" onclick="Btn_periode(' . $i . ')" style="min-width:120px;border:none;border-radius: 0 !important;">' . date("F", mktime(0, 0, 0, $i, 10)) . '</button>
                                     </li>';
                            }
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-md-4" style="padding-left: 0px">
                <ul class="nav navbar-nav navbar-center">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff "><?php echo $tahun ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php
                            for ($i = 2016; $i <= date('Y'); $i++) {
                                echo '<li>
                                        <button class="btn btn-default" type="button" id="Tahun_' . $i . '" onclick="Btn_Tahun(' . $i . ')" style="min-width:120px;">' . $i . '</button>
                                        </li>';
                            }
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>
            <form name="load" id="load" style="width: 100%;">
                <div class="col-md-3 collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="float: right;">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff ">Tonasa<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= base_url() ?>index.php/plant_dashboard/padang">Padang</a></li>
                                <li role="separator" class="divider"></li>

                                <li><a href="<?= base_url() ?>index.php/plant_dashboard/gresik">Gresik</a></li>
                                <li role="separator" class="divider"></li>

                                <li class="active"><a href="<?= base_url() ?>index.php/plant_dashboard/tonasa">Tonasa</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?= base_url() ?>index.php/plant_dashboard/tlcc">TLCC</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </form>
        </div>
    </nav>    
</div>
<div class="col-md-12 col-xs-12" style="padding: 1px; margin-bottom: 5px">
    <div class="col-xs-2" style="padding-right: 2px;">
        <button type="button" class="btn btn-info" style="font-size: 14px; width: 180px;" onclick="klikTbl()" disabled>Download data to Excel</button>
    </div>
    <div class="col-xs-8" style="font-size: 16px; padding-top: 5px" id="exampleConsole"><strong class="blink_me">Select month and year then click Load</strong></div>
    <div class="col-md-2">
        <a href="<?php echo base_url()?>plant_system/portal_production"><button type="button" class="btn btn-primary" style="font-size: 14px; width: 100px;">Back</button></a>
    </div>
</div>
<br>
<div class="col-md-12 col-xs-12">
    <div id="example" style="overflow: hidden"></div>
</div>
<script>
    var $container = $("#example"),
            $console = $("#exampleConsole"),
            $parent = $container.parent(),
            autosaveNotification,
            hot;

    hot = new Handsontable($container[0], {
        columnSorting: true,
        startRows: 20,
        startCols: 35,
        width: 1130,
        height: 445,
        rowHeaders: true,
        colHeaders: false,
        columns: [
            {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {}
        ],
        cells: function (row, col, prop) {
            var cellProperties = {};

            cellProperties.className = "htCenter htMiddle";
            if (row >= 1 && col > 0) {
                cellProperties.renderer = UpOne_Value;
            }

            return cellProperties;
        },
        minRows: 20,
        minSpareCols: 0,
        minSpareRows: 1,
        fixedRowsTop: 2,
        fixedColumnsLeft: 1,
        manualColumnResize: true,
        manualRowResize: true,
        contextMenu: true,
        data: [
            ['Date', 'Yield in %', '', '', '', '', '', '', '', '', ''],
            ['', 'KL2', 'KL3', 'KL4', 'KL5', 'FM2', 'FM3', 'FM41', 'FM42', 'FM51', 'FM52']
        ],
        mergeCells: [
            {row: 0, col: 0, rowspan: 2, colspan: 1},
            {row: 0, col: 1, rowspan: 1, colspan: 10},
        ]
    });
    
    function UpOne_Value(instance, td, row, col, prop, value, cellProperties) {
        Handsontable.renderers.TextRenderer.apply(this, arguments);

        if (parseFloat(value, 10) < 1) {
            td.style.background = '#EEE';
        } else if (parseFloat(value, 10) >= 100) {
            td.style.color = 'green';
            td.style.fontWeight = 'bold';
        } else if ((parseFloat(value, 10) > 1) && (parseFloat(value, 10) < 100)) {
            td.style.color = 'red';
            td.style.fontWeight = 'italic';
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
            url: 'plant_dashboard/ops_day_ST/<?php echo $tahun; ?>/<?php echo $bulan; ?>',
            type: 'GET',
            success: function (res) {
                var mine = JSON.parse(res);
                var data = [], row;
                data[0] = ['Date', 'Yield in %', '', '', '', '', '', '', '', '', ''];
                data[1] = ['', 'KL2', 'KL3', 'KL4', 'KL5', 'FM2', 'FM3', 'FM41', 'FM42', 'FM51', 'FM52'];
                for (var i = 0, ilen = mine.mydata.length; i < ilen; i++) {
                    row = [];
                    row[0] = mine.mydata[i].DATE_PROD;
                    row[1] = mine.mydata[i].KL2_PROD;
                    row[2] = mine.mydata[i].KL3_PROD;
                    row[3] = mine.mydata[i].KL4_PROD;
                    row[4] = mine.mydata[i].KL5_PROD;
                    row[5] = mine.mydata[i].FM2_PROD;
                    row[6] = mine.mydata[i].FM3_PROD;
                    row[7] = mine.mydata[i].FM41_PROD;
                    row[8] = mine.mydata[i].FM42_PROD;
                    row[9] = mine.mydata[i].FM51_PROD;
                    row[10] = mine.mydata[i].FM52_PROD;
                    
                    data[parseInt(mine.mydata[i].ID) + 1] = row;
                }
                $console.html('Data loaded in <?php
                echo '<b>' . date("F", mktime(0, 0, 0, $bulan + 1, 0, $tahun)) . '</b>';
                echo ' ';
                echo '<b>' . $tahun . '</b>';
                ?>');
                hot.loadData(data);
            }
        });
    }).click();

    function klikTbl() {
        if (bulan === null || bulan === 0 || bulan === 'undefined') {
            alert("Select month and year then click Load");
        } else {
            location.href = 'master_data/xls_SP/<?php echo $bulan; ?>/<?php echo $tahun; ?>';
        }
    }
    
    function Btn_periode(periode) {
        var url = "<?= base_url() ?>index.php/plant_dashboard/tonasa";
        var form = $('<form action="' + url + '" method="get">' +
                '<input type="hidden" name="bulan" value="' + periode + '" />' +
                '<input type="hidden" name="tahun" value="<?php
                            if (!empty($thn)) {
                                echo $thn;
                            } else {
                                echo date('Y');
                            }
                            ?>" />' +
                '</form>'
                );
        $('body').append(form);
        $(form).submit();
    }

    function Btn_Tahun(tahun) {
        var url = "";
        var form = $('<form action="' + url + '" method="get">' +
                '<input type="hidden" name="bulan" value="<?php
                            if (!empty($bln) and $bln > $my_bln) {
                                echo $bln;
                            } else {
                                echo date('m');
                            }
                            ?>" />' +
                '<input type="hidden" name="tahun" value="' + tahun + '" />' +
                '</form>'
                );
        $('body').append(form);
        $(form).submit();
    }
</script>