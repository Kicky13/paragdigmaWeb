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
                <h3 style="text-align: left; padding-left: 12px; margin-top: 10px;"><?php echo $a; ?></h3>
            </div>
            <div style="padding-left: 1029px;padding-top:8px; ">
                <button type="button" class="btn btn-default" style="font-size:14px; " data-toggle="modal" data-target="#addModal">
                    <a href="<?= base_url() ?>index.php/master_data" ><span style="font-size:12px;color: white;" class="glyphicon glyphicon-add"></span>Home</a>
                </button>
            </div>
        </div>
    </nav>
    <!--    <form method="post">
            <select required  class="form-control" id="status" name="bulan" style="width: 80%;">
                <option value='1'>Januari</option>
                <option value='2'>Februari</option>
            </select>-->
    <button name="load" id="load">Load</button>
    <!--</form>-->
</div>
<br><br>
<div class="row">
    <div id="exampleConsole" class="console"></div>
    <div id="example" class="handsontable htRowHeaders htColumnHeaders"></div>
</div>
<button name="save" id="save">Save</button>
<script>
    $(function() {
        $('.datepicker').datepicker({
            dateFormat: 'dd-mm-yyyy',
            autoclose: true
        });
    });

    var $container = $("#example"),
            $console = $("#exampleConsole"),
            $parent = $container.parent(),
            autosaveNotification,
            hot;

    hot = new Handsontable($container[0], {
        columnSorting: true,
        startRows: 31,
        startCols: 9,
        rowHeaders: true,
        colHeaders: ['BULAN', 'CEMENT', 'CLINKER', 'FINECOAL', 'LIMESTONE', 'RAWMIX', 'SILICA'],
        columns: [
            {},
            {},
            {},
            {},
            {},
            {},
            {}
        ],
        minSpareCols: 0,
        minSpareRows: 1,
        contextMenu: true,
        afterChange: function(change, source) {
            var data;
            if (source === 'loadData' || !$parent.find('input[name=autosave]').is(':checked')) {
                return;
            }
            data = change[0];

            // transform sorted row to original row
            data[0] = hot.sortIndex[data[0]] ? hot.sortIndex[data[0]][0] : data[0];

            clearTimeout(autosaveNotification);
            $.ajax({
                url: 'php/save.php',
                dataType: 'json',
                type: 'POST',
                data: {changes: change}, // contains changed cells' data
                success: function() {
                    $console.text('Autosaved (' + change.length + ' cell' + (change.length > 1 ? 's' : '') + ')');

                    autosaveNotification = setTimeout(function() {
                        $console.text('Changes will be autosaved');
                    }, 1000);
                }
            });
        }
    });

    $("#load").click(function() {
        $.ajax({
            url: 'master_data/get_rkap_plant',
            type: 'GET',
            success: function(res) {
                var mine = JSON.parse(res);
                var data = [], row;

                for (var i = 0, ilen = mine.mydata.length; i < ilen; i++) {
                    row = [];
                    row[0] = mine.mydata[i].BULAN;
                    row[1] = mine.mydata[i].CEMENT;
                    row[2] = mine.mydata[i].CLINKER;
                    row[3] = mine.mydata[i].FINECOAL;
                    row[4] = mine.mydata[i].LIMESTONE;
                    row[5] = mine.mydata[i].RAWMIX;
                    row[6] = mine.mydata[i].SILICA;
                    data[mine.mydata[i].ID - 1] = row;
                }
                $console.text('Data loaded');
                hot.loadData(data);
            }
        });
    })//.click(); // execute immediately

    $("#save").click(function() {
        $.ajax({
            url: 'http://10.15.5.150/dev/PlantSystem/plant_test/save',
            data: {data: hot.getData()}, // returns all cells' data
            dataType: 'json',
            type: 'POST',
            success: function(res) {
                if (res.result === 'ok') {
                    $console.text('Data saved');
                } else {
                    $console.text('Save error');
                }
            },
            error: function() {
                $console.text('Save error');
            }
        });
    });
</script>