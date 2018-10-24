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
<div class="row">
    <nav class="navbar navbar-inverse my_margin"  style="margin-bottom: 0px;">
        <div class="col-md-6 container-fluid">
            <div class="navbar-header">
                <h3 style="text-align: left; padding-left: 12px; margin-top: 10px; color: white"><?php echo $a; ?></h3>
            </div>
        </div>
        <div class="col-md-6">
            <form name="load" id="load" style="width: 100%;">
                <div class="col-md-4" style="margin-top: 8px;">
                    <select class="form-control" name="plant" id="plant">
                        <option value="1"></option>
                        <option value="2">Ho Chi Minh</option>
                    </select>
                </div>
                <div class="col-md-4" style="margin-top: 8px;">
                    <select class="form-control" name="tahun" id="tahun">
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                    </select>
                </div>
                <?php
                $bantu = $this->input->get('plant');
                $bantu2 = $this->input->get('tahun');
                ?>
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
<?php
if ($bantu == 1) {
    $plant = 'Main Plant / Quanh Ninh';
} else if ($bantu == 2) {
    $plant = 'Ho Chi Minh';
}
?>
<?php
$this_month = date('m');
$yest = $this_month - 1;
if (strlen($yest) < 2) {
    $yest_month = '0' . $yest;
} else {
    $yest_month = $yest;
}

//echo '<h1>'.$yest_month.'</h1><br>';
//echo '<h1>'.$this_month.'</h1><br>';
//echo '<h1>'.$yest.'</h1><br>';
?>
<div class="col-md-12 col-xs-12" style="padding: 1px; margin-bottom: 5px; font-size: 16px; padding-top: 5px">
    <div class="col-xs-10" id="exampleConsole"><strong class="blink_me">Select month and year then click Load</strong></div>
    <div class="col-xs-2" style="float: right"><input type="checkbox" id="autosave" name="autosave" checked="checked" autocomplete="off">&nbsp;Autosave</div>
</div>
<br>
<div class="col-md-12 col-xs-12">
    <div id="example" style="width: 100%; height: 400px; overflow: hidden"></div>
    <button class="btn btn-success" id="save" style="font-size:14px; width: 85px">Save</button>
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
        startCols: 4,
        rowHeaders: true,
        manualColumnResize: true,
        manualRowResize: true,
        colHeaders: false,
        columns: [
            {}, {}, {}, {}, {}
        ],
        minSpareCols: 0,
        minSpareRows: 1,
        minRows: 12,
        contextMenu: true,
        afterChange: function (change, source) {
            var data;
            if (source === 'loadData' || !$('input[name=autosave]').is(':checked')) {
                return;
            }
            data = change[0];
            console.log(hot.getDataAtCell(1, 1));
            data[0] = hot.sortIndex[data[0]] ? hot.sortIndex[data[0]][0] : data[0];

            clearTimeout(autosaveNotification);
            $.ajax({
                url: '<?= site_url() ?>/master_data/get_ht_save',
                dataType: 'json',
                type: 'POST',
                data: {changes: change, id: hot.getDataAtCell(change[0][0], 0), plant: <?php echo $bantu; ?>, year: <?php echo $bantu2; ?>}, // contains changed cells' data
                success: function () {
                    $console.text('Autosaved (' + change.length + ' cell' + (change.length > 1 ? 's' : '') + ')');
                    autosaveNotification = setTimeout(function () {
                        $console.text('Changes will be autosaved');
                    }, 1000);
                }
            });
        },
        cells: function (row, col, prop) {
            var cellProperties = {};

            cellProperties.renderer = all;
            cellProperties.className = "htCenter htMiddle";
            if (col < 1) {
                cellProperties.editor = false;
            }
            if (row <= 1 && col > 0) {
                if (col < 1)
                    cellProperties.renderer = Pojok;
                else if (col < 3)
                    cellProperties.renderer = Capacity;
            }
            if (row <= 1 && col < 1) {
                cellProperties.renderer = Pojok;
            }
            return cellProperties;
        },
        data: [
            ['BULAN', 'CAPACITY', ''],
            ['', 'CEMENT', 'CLINKER']
        ],
        mergeCells: [
            {row: 0, col: 0, rowspan: 2, colspan: 1},
            {row: 0, col: 1, rowspan: 1, colspan: 2},
            {row: 0, col: 3, rowspan: 1, colspan: 2},
        ]
    });

    function Capacity(instance, td, row, col, prop, value, cellProperties) {
        Handsontable.renderers.TextRenderer.apply(this, arguments);

        td.style.color = 'white';
        td.style.background = '#E3C39D';
        td.style.borderColor = 'black';
    }
    function Pojok(instance, td, row, col, prop, value, cellProperties) {
        Handsontable.renderers.TextRenderer.apply(this, arguments);

        td.style.color = 'black';
        td.style.background = '#E0E4CC';
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
            url: 'master_data/get_ht_tes/<?php echo $bantu; ?>/<?php echo $bantu2; ?>',
            type: 'GET',
            success: function (res) {
                var mine = JSON.parse(res);
                var data = [], row;
                data[0] = ['BULAN', 'CAPACITY', ''];
                data[1] = ['', 'CEMENT', 'CLINKER'];

                for (var i = 0, ilen = mine.mydata.length; i < ilen; i++) {
                    row = [];
                    row[0] = mine.mydata[i].BULAN;
                    row[1] = mine.mydata[i].CEMENT;
                    row[2] = mine.mydata[i].CLINKER;
                    data[parseInt(mine.mydata[i].ID) + 1] = row;
                }
                $console.html('Data loaded in plant <?php echo '<b>' . $plant . '</b> and year <b>' . $bantu2 . '</b>'; ?>');
                hot.loadData(data);
            }
        });
    }).click();
    
    $("#save").click(function () {
        $.ajax({
            url: '<?= site_url() ?>/master_data/get_ht_save',
            data: {data: hot.getData(), plant: <?php echo $bantu; ?>, year: <?php echo $bantu2; ?>}, // returns all cells' data
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
</script>