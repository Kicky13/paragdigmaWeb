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
                <a class="navbar-brand" href="javascript:void(0)">KSO SI-SG Cement Production Report</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-4" style="padding-left: 0px">
                <ul class="nav navbar-nav navbar-center">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff "><?php echo date("F", mktime(0, 0, 0, $bulan, 10)) ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php
                            for ($i = 1; $i <= $my_bln; $i++) {
                                if(strlen($i) < 2){
                                    $x = '0'.$i;
                                } else {
                                    $x = $i;
                                }
                                echo '<li>
                                    <button class="btn btn-default" type="button" id="bulan_' . $x . '" onclick="Btn_periode(\'' . $x . '\')" style="min-width:120px;border:none;border-radius: 0 !important;">' . date("F", mktime(0, 0, 0, $i, 10)) . '</button>
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
                <div class="col-md-4" style="margin-top: 8px; padding: 0px">
                    <a href="<?= base_url() ?>index.php/master_data" ><button type="button" class="btn btn-default" style="font-size:14px; width: 85px; float: right" data-toggle="modal" data-target="#addModal">
                            Back
                        </button></a>
                </div>
            </form>
        </div>
    </nav>    
</div>
<div class="col-md-12 col-xs-12" style="padding: 1px; margin-bottom: 5px">
    <div class="col-xs-2" style="padding-right: 2px;">
        <button type="button" class="btn btn-info" style="font-size: 14px; width: 180px;" onclick="klikTbl()">Download data to Excel</button>
    </div>
    <div class="col-xs-10" style="font-size: 16px; padding-top: 5px" id="exampleConsole"><strong class="blink_me">Select month and year then click Load</strong></div>
</div>
<br>
<div class="col-md-12 col-xs-12">
    <div id="example"  style="width:100%; height:500px; overflow: hidden"></div> <!--  class="handsontable htRowHeaders htColumnHeaders" -->
</div>
<script>

    var $container = $("#example"),
            $console = $("#exampleConsole"),
            $parent = $container.parent(),
            autosaveNotification,
            hot;

    hot = new Handsontable($container[0], {
        columnSorting: true,
        startRows: 15,
        startCols: 43,
        minRows: 20,
        rowHeaders: true,
        colHeaders: false,
        columns: [
            {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {},
            {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {},
            {}, {}, {}
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

            if (row <= 1 && col > 0) {
                if (col < 9)
                    cellProperties.renderer = RawMillRender; // uses function directly
                else if (col < 17)
                    cellProperties.renderer = KilnRender;
                else if (col > 16)
                    cellProperties.renderer = FinishMillRender;
            }
            if (row >= 32 && col > 0) {
                cellProperties.renderer = TOTAL;
            }
            return cellProperties;
        },
        data: [
            ['Date', 'R.MILL #1', '', 'R.MILL #2', '', 'R.MILL #3', '', 'R.MILL #4', '', 'KILN #1', '', 'KILN #2', '', 'KILN #3', '', 'KILN #4', '', 'F.MILL #1', '', 'F.MILL #2', '', 'F.MILL #3', '', 'F.MILL #4', '', 'F.MILL #5', '', 'F.MILL #6',
                '', 'F.MILL #7', '', 'F.MILL #8', '', 'F.MILL #9', '', 'F.MILL #A', '', 'F.MILL #B', '', 'F.MILL #C', '', 'F.MILL CGD', ''],
            ['', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD',
                'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP']
        ],
        mergeCells: [
            {row: 0, col: 0, rowspan: 2, colspan: 1},
            {row: 0, col: 1, rowspan: 1, colspan: 2},
            {row: 0, col: 3, rowspan: 1, colspan: 2},
            {row: 0, col: 5, rowspan: 1, colspan: 2},
            {row: 0, col: 7, rowspan: 1, colspan: 2},
            {row: 0, col: 9, rowspan: 1, colspan: 2},
            {row: 0, col: 11, rowspan: 1, colspan: 2},
            {row: 0, col: 13, rowspan: 1, colspan: 2},
            {row: 0, col: 15, rowspan: 1, colspan: 2},
            {row: 0, col: 17, rowspan: 1, colspan: 2},
            {row: 0, col: 19, rowspan: 1, colspan: 2},
            {row: 0, col: 21, rowspan: 1, colspan: 2},
            {row: 0, col: 23, rowspan: 1, colspan: 2},
            {row: 0, col: 25, rowspan: 1, colspan: 2},
            {row: 0, col: 27, rowspan: 1, colspan: 2},
            {row: 0, col: 29, rowspan: 1, colspan: 2},
            {row: 0, col: 31, rowspan: 1, colspan: 2},
            {row: 0, col: 33, rowspan: 1, colspan: 2},
            {row: 0, col: 35, rowspan: 1, colspan: 2},
            {row: 0, col: 37, rowspan: 1, colspan: 2},
            {row: 0, col: 39, rowspan: 1, colspan: 2},
            {row: 0, col: 41, rowspan: 1, colspan: 2},
        ]
    });
    function TOTAL(instance, td, row, col, prop, value, cellProperties) {
        Handsontable.renderers.TextRenderer.apply(this, arguments);
        td.style.fontWeight = 'bold';
    }
    function RawMillRender(instance, td, row, col, prop, value, cellProperties) {
        Handsontable.renderers.TextRenderer.apply(this, arguments);

        td.style.color = 'white';
        td.style.background = '#E3C39D';
        td.style.borderColor = 'black';
    }
    function KilnRender(instance, td, row, col, prop, value, cellProperties) {
        Handsontable.renderers.TextRenderer.apply(this, arguments);

        td.style.color = 'white';
        td.style.background = '#888888';
        td.style.borderColor = 'black';
    }
    function FinishMillRender(instance, td, row, col, prop, value, cellProperties) {
        Handsontable.renderers.TextRenderer.apply(this, arguments);

        td.style.color = 'white';
        td.style.background = '#25373D';
        td.style.borderColor = 'black';
    }
    function DisabledColRenderer(instance, td, row, col, prop, value, cellProperties) {
        Handsontable.renderers.TextRenderer.apply(this, arguments);
        td.style.borderColor = 'black';
        td.style.background = '#eaebed';
    }
    function all(instance, td, row, col, prop, value, cellProperties) {
        Handsontable.renderers.TextRenderer.apply(this, arguments);
        if (row % 2 === 0 && row > 1) {
            td.style.background = '#E0E4CC';
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
                data[0] = ['Date', 'R.MILL #1', '', 'R.MILL #2', '', 'R.MILL #3', '', 'R.MILL #4', '', 'KILN #1', '', 'KILN #2', '', 'KILN #3', '', 'KILN #4', '', 'F.MILL #1', '', 'F.MILL #2', '', 'F.MILL #3', '', 'F.MILL #4', '', 'F.MILL #5', '', 'F.MILL #6', '', 'F.MILL #7', '', 'F.MILL #8', '', 'F.MILL #9', '', 'F.MILL #A', '', 'F.MILL #B', '', 'F.MILL #C', '', 'F.MILL CGD', ''];
                data[1] = ['', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP', 'PROD', 'JOP'];
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
                    row[14] = mine.mydata[i].KL3_JOP;
                    row[15] = mine.mydata[i].KL4_PROD;
                    row[16] = mine.mydata[i].KL4_JOP;

                    row[17] = mine.mydata[i].FM1_PROD;
                    row[18] = mine.mydata[i].FM1_JOP;
                    row[19] = mine.mydata[i].FM2_PROD;
                    row[20] = mine.mydata[i].FM2_JOP;
                    row[21] = mine.mydata[i].FM3_PROD;
                    row[22] = mine.mydata[i].FM3_JOP;
                    row[23] = mine.mydata[i].FM4_PROD;
                    row[24] = mine.mydata[i].FM4_JOP;

                    row[25] = mine.mydata[i].FM5_PROD;
                    row[26] = mine.mydata[i].FM5_JOP;
                    row[27] = mine.mydata[i].FM6_PROD;
                    row[28] = mine.mydata[i].FM6_JOP;
                    row[29] = mine.mydata[i].FM7_PROD;
                    row[30] = mine.mydata[i].FM7_JOP;
                    row[31] = mine.mydata[i].FM8_PROD;
                    row[32] = mine.mydata[i].FM8_JOP;
                    row[33] = mine.mydata[i].FM9_PROD;
                    row[34] = mine.mydata[i].FM9_JOP;
                    row[35] = mine.mydata[i].FMA_PROD;
                    row[36] = mine.mydata[i].FMA_JOP;
                    row[37] = mine.mydata[i].FMB_PROD;
                    row[38] = mine.mydata[i].FMB_JOP;
                    row[39] = mine.mydata[i].FMC_PROD;
                    row[40] = mine.mydata[i].FMC_JOP;
                    row[41] = mine.mydata[i].FMCGD_PROD;
                    row[42] = mine.mydata[i].FMCGD_JOP;
                    data[parseInt(mine.mydata[i].ID) + 1] = row;
                    console.log(mine.mydata[i].ID);
                }

                $console.html('Data loaded in <?php
                            echo '<b>' . date("F", mktime(0, 0, 0, $bulan, 10)) . '</b>';
                            echo '&nbsp;<b>' . $tahun . '</b>';
                            ?>');
                hot.loadData(data);
                console.log(data);
            }
        });
    }).click();

    function klikTbl() {
        var bulan = <?php echo $bulan; ?>;
        var tahun = <?php echo $tahun; ?>;

        if (bulan === null || bulan === 0 || bulan === 'undefined') {
            alert("Select month and year then click Load");
        } else {
            location.href = 'master_data/xls_SG/<?php echo $bulan; ?>/<?php echo $tahun; ?>';
        }
    }

    function Btn_periode(periode) {
        var url = "<?= base_url() ?>index.php/master_data/gresik";
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
                            if (!empty($bulan) and $bulan > $my_bln) {
                                echo $bulan;
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
    
    $('#bulan_<?php
    if (!empty($bulan)) {
        echo $bulan;
    } else {
        echo date('n');
    }
    ?>').addClass('active btn-danger');

    $('#Tahun_<?php
    if (!empty($tahun)) {
        echo $tahun;
    } else {
        echo date('Y');
    }
    ?>').addClass('active btn-danger');
</script>