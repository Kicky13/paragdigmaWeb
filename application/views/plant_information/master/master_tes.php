<link rel="stylesheet" media="screen" href="<?php echo base_url() ?>bootstrap/handsontable/handsontable.full.css">
<link rel="stylesheet" media="screen" href="<?php echo base_url() ?>bootstrap/handsontable/pikaday/pikaday.css">
<script src="<?php echo base_url() ?>bootstrap/plantView/assets/js/jquery-1.11.3.min.js"></script>
<script src="<?php echo base_url() ?>bootstrap/handsontable/handsontable.full.js"></script>
<script src="<?php echo base_url() ?>bootstrap/handsontable/pikaday/pikaday.js"></script>
<script src="<?php echo base_url() ?>bootstrap/handsontable/moment/moment.js"></script>
<script src="<?php echo base_url() ?>bootstrap/handsontable/zeroclipboard/ZeroClipboard.js"></script>
<script src="<?php echo base_url() ?>bootstrap/handsontable/numbro/numbro.js"></script>
<script src="<?php echo base_url() ?>bootstrap/handsontable/numbro/languages.js"></script>

<div class="row">
    <nav class="navbar navbar-default panelup">
        <div class="container-fluid">
            <div class="navbar-header ">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div style="padding-left: 1029px;padding-top:8px; ">
                <button type="button" class="btn btn-default" style="font-size:14px; " data-toggle="modal" data-target="#addModal">
                    <a href="<?= base_url() ?>index.php/master_data" ><span style="font-size:12px;color: white;" class="glyphicon glyphicon-add"></span>Home</a>
                </button>
            </div>
        </div>
    </nav>
    <p>
        <button id="load">Load</button>
        <button name="save" id="save">Save</button>
        <button name="save" id="decode">Decode</button>
        <label><input type="checkbox" name="autosave" checked="checked" autocomplete="off"> Autosave</label>
    </p>
</div>

<br><br>
<div class="row" class="table-responsive">
    <div id="exampleConsole" class="console"></div>
    <div id="example" class="handsontable htRowHeaders htColumnHeaders"></div>
</div>

<script>

    var $container = $("#example"),
            $console = $("#exampleConsole"),
            $parent = $container.parent(),
            autosaveNotification,
            hot;

    hot = new Handsontable($container[0], {
        columnSorting: true,
        startRows: 10,
        startCols: 3,
        rowHeaders: true,
        manualColumnResize: true,
        manualRowResize: true,
        preventOverflow: 'horizontal',
        colHeaders: ['ID', 'MANUFACTURER', 'YEAR', 'PRICE'],
        columns: [
            {}, {}, {}, {}
        ],
        minSpareCols: 0,
        minSpareRows: 1,
        contextMenu: true,
        afterChange: function (change, source) {
            var data;

            if (source === 'loadData' || !$parent.find('input[name=autosave]').is(':checked')) {
                return;
            }
            data = change[0];

            data[0] = hot.sortIndex[data[0]] ? hot.sortIndex[data[0]][0] : data[0];

            clearTimeout(autosaveNotification);
            $.ajax({
                url: 'plant_test/simpan',
                dataType: 'json',
                type: 'POST',
                data: {changes: change},
                success: function () {
                    $console.text('Autosaved (' + change.length + ' cell' + (change.length > 1 ? 's' : '') + ')');

                    autosaveNotification = setTimeout(function () {
                        $console.text('Changes will be autosaved');
                    }, 500);
                }
            });
        }
    });

    $("#load").click(function () {
        $.ajax({
            url: 'plant_test/muat',
            dataType: 'json',
            type: 'GET',
            success: function (res) {
                var data = [], row;
                for (var i = 0, ilen = res.length; i < ilen; i++) {
                    row = [];
                    row[0] = res[i].ID;
                    row[1] = res[i].MANUFACTURER;
                    row[2] = res[i].YEAR;
                    row[3] = res[i].PRICE;
                    data[res[i].ID - 1] = row;
                }
                $console.text('Data loaded');
                hot.loadData(data);
            }
        });
    }).click();

    $("#save").click(function () {
        $.ajax({
            url: 'plant_test/simpan',
            data: {data: hot.getData()},
            dataType: 'json',
            type: 'POST',
            success: function (res) {
                if (res.result === 'ok') {
                    console.log(hot.getData());
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
    $parent.find('input[name=autosave]').click(function () {
        if ($(this).is(':checked')) {
            $console.text('Changes will be autosaved');
        } else {
            $console.text('Changes will not be autosaved');
        }
    });
</script>