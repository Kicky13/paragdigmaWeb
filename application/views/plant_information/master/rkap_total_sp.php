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
$thn = $this->input->get('tahun');
$tahun = !empty($thn) ? $thn : date('Y');
?>
<div class="row" style="margin-bottom: 2px;">
    <nav class="navbar navbar-inverse my_margin">
        <div class="col-md-6 container-fluid">
            <div class="navbar-header">
                <h3 style="text-align: left; padding-left: 12px; margin-top: 10px; color: white"><?php echo $a; ?></h3>
            </div>
        </div>
        <div class="col-md-6">
            <form name="load" id="load" style="width: 100%;">
                <div class="col-md-4" style="margin-top: 8px;">
                    &nbsp;&nbsp;
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
                <div class="col-md-4" style="margin-top: 8px; padding: 0px">
                    <button class="btn btn-success" id="load" style="font-size:14px; width: 85px">Load</button>
                    <a href="<?= base_url() ?>index.php/master_data" ><button type="button" class="btn btn-default" style="font-size:14px; width: 85px" data-toggle="modal" data-target="#addModal">
                            Back
                        </button></a>
                </div>
            </form>
        </div>
    </nav>    
</div>
<div class="col-md-12 col-xs-12" style="padding: 1px; margin-bottom: 5px">
    <div class="col-xs-10" style="font-size: 16px; padding-top: 5px" id="exampleConsole"><strong class="blink_me">Select month and year then click Load</strong></div>
    <!--<div class="col-xs-2" style="float: right"><input type="checkbox" id="autosave" name="autosave" checked="checked" disabled autocomplete="off">&nbsp;Autosave</div>-->
</div>
<br>
<div class="col-md-12">
    <div class="col-md-6" id="example" style="overflow: hidden"></div>
    <div class="col-md-6">
        <p>If you want to edit RKAP per Opco, just edit RKAP per Plant in menu RKAP (PLANT)</p>
    </div>
    <!--<button class="btn btn-success" id="save" style="font-size:14px; width: 85px">Save</button>-->
</div>
<script>

    var $container = $("#example"),
            $console = $("#exampleConsole"),
            $parent = $container.parent(),
            autosaveNotification,
            hot;

    hot = new Handsontable($container[0], {
        columnSorting: true,
        startRows: 12,
        startCols: 8,
        width: 525,
        height: 400,
        rowHeaders: true,
        colHeaders: false,
        manualColumnResize: true,
        manualRowResize: true,
        columns: [
            {}, {}, {}, {}, {}, {}, {}
        ],
        minSpareCols: 0,
        minSpareRows: 1,
        minRows: 12,
        contextMenu: true,
        cells: function (row, col, prop) {
            var cellProperties = {};

            cellProperties.renderer = all;
            cellProperties.className = "htCenter htMiddle";

            if (row <= 1 && col > 0) {
                if (col < 1)
                    cellProperties.renderer = Bulan; // uses function directly
                else if (col >= 1)
                    cellProperties.renderer = Data;
            }
            if (row < 1 && col < 1) {
                cellProperties.renderer = Pojok;
            }
            return cellProperties;
        },
        data: [
            ['BULAN', 'RKAP', '', '', '', '', ''],
            ['', 'CEMENT', 'CLINKER', 'FINECOAL', 'LIMESTONE', 'RAWMIX', 'SILICA']
        ],
        mergeCells: [
            {row: 0, col: 0, rowspan: 2, colspan: 1},
            {row: 0, col: 1, rowspan: 1, colspan: 6},
        ],
        afterChange: function (change, source) {
            var data;
            if (source === 'loadData' || !$('input[name=autosave]').is(':checked')) {
                return;
            }
            data = change[0];

            data[0] = hot.sortIndex[data[0]] ? hot.sortIndex[data[0]][0] : data[0];

            clearTimeout(autosaveNotification);
            $.ajax({
                url: '<?= site_url() ?>/master_data/save_rkap_total_sp',
                dataType: 'json',
                type: 'POST',
                data: {changes: change, id: hot.getDataAtCell(change[0][0], 0), year: <?php echo $tahun; ?>},
                success: function () {
                    $console.text('Autosaved (' + change.length + ' cell' + (change.length > 1 ? 's' : '') + ')');

                    console.log(change);
                    autosaveNotification = setTimeout(function () {
                        $console.text('Changes will be autosaved');
                    }, 1000);
                }
            });
        }
    });

    function Bulan(instance, td, row, col, prop, value, cellProperties) {
        Handsontable.renderers.TextRenderer.apply(this, arguments);

        td.style.color = 'white';
        td.style.background = '#E3C39D';
        td.style.borderColor = 'black';
    }
    function Data(instance, td, row, col, prop, value, cellProperties) {
        Handsontable.renderers.TextRenderer.apply(this, arguments);

        td.style.color = 'white';
        td.style.background = '#888888';
        td.style.borderColor = 'black';
    }
    function Pojok(instance, td, row, col, prop, value, cellProperties) {
        Handsontable.renderers.TextRenderer.apply(this, arguments);

        td.style.color = 'white';
        td.style.background = '#888888';
        td.style.borderColor = 'black';
    }
    function all(instance, td, row, col, prop, value, cellProperties) {
        Handsontable.renderers.TextRenderer.apply(this, arguments);
        if (row % 2 === 0 && row > 1) {
            td.style.background = '#E0E4CC';
        } else if (row % 2 === 1 && row > 1) {
            td.style.background = 'white';
        }
    }

    $("#load").click(function () {
        $.ajax({
            url: 'master_data/get_rkap_total_sp/<?php echo $pemisah; ?>/<?php echo $tahun; ?>',
            type: 'GET',
            success: function (res) {
                var mine = JSON.parse(res);
                var data = [], row;
                data[0] = ['BULAN', 'RKAP', '', '', '', '', ''];
                data[1] = ['', 'CEMENT', 'CLINKER', 'FINECOAL', 'LIMESTONE', 'RAWMIX', 'SILICA'];
                for (var i = 0, ilen = mine.mydata.length; i < ilen; i++) {
                    row = [];
                    row[0] = mine.mydata[i].BULAN;
                    row[1] = mine.mydata[i].CEMENT;
                    row[2] = mine.mydata[i].CLINKER;
                    row[3] = mine.mydata[i].FINECOAL;
                    row[4] = mine.mydata[i].LIMESTONE;
                    row[5] = mine.mydata[i].RAWMIX;
                    row[6] = mine.mydata[i].SILICA;
                    data[parseInt(mine.mydata[i].ID) + 1] = row;
                }
                $console.html('Data loaded in <?php echo 'year <b>' . $tahun . '</b>'; ?>');
                hot.loadData(data);
            }
        });
    }).click();
    
    $("#save").click(function () {
        $.ajax({
            url: '<?= site_url() ?>/master_data/save_rkap_total_sp',
            data: {data: hot.getData(), year: <?php echo $tahun; ?>}, // returns all cells' data
            dataType: 'json',
            type: 'POST',
            success: function (res) {
                if (res.result === 'ok') {
                    $console.text('Data saved');
                } else {
                    $console.text('Save error');
                }
            },
            error: function () {
                $console.text('Save error');
            }
        });
    });
    
    $("#autosave").click(function () {
        if ($(this).is(':checked')) {
            $console.text('Changes will be autosaved');
        } else {
            $console.text('Changes will not be autosaved');
        }
    });
    
    function Btn_Tahun(tahun) {
        var url = "";
        var form = $('<form action="' + url + '" method="get">' +
                '<input type="hidden" name="tahun" value="' + tahun + '" />' +
                '</form>'
                );
        $('body').append(form);
        $(form).submit();
    }
    
    $('#Tahun_<?php
    if (!empty($tahun)) {
        echo $tahun;
    } else {
        echo date('Y');
    }
    ?>').addClass('active btn-danger');
</script>