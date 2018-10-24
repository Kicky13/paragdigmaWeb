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
</style>
<div class="row">
    <nav class="navbar navbar-inverse my_margin">
        <div class="col-md-3 container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?= base_url() ?>index.php/master_data/tlcc">Thang Long Production Report</a>
            </div>
        </div>
        <div class="col-md-9 container-fluid">
            <form name="load" id="load" style="width: 100%">
                <select name="bulan" id="bulan">
                    <option value="01">January</option>
                    <option value="02">Pebruari</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <select name="tahun" id="tahun">
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                </select>

                <?php
                $bantu = $this->input->get('bulan');
                $bantu2 = $this->input->get('tahun');
                ?>

                <button id="load">Load</button>
                <button name="save" id="save">Save</button>
            </form>
        </div>
    </nav>    
</div>
<br><br>
<div class="col-md-12 col-xs-12">
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
        startRows: 20,
        startCols: 9,
        rowHeaders: true,
        colHeaders: ['DATE_PROD', 'RM1_PROD', 'RM1_JOP', 'KL1_PROD', 'KL1_JOP', 'FMMP_PROD', 'FMMP_JOP', 'FMHCM_PROD', 'FMHCM_JOP'],
        columns: [
            {}, {}, {}, {}, {}, {}, {}, {}, {}
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
                url: 'plant_test/simpan_edit/<?php echo $bantu; ?>/<?php echo $bantu2; ?>',
                dataType: 'json',
                type: 'POST',
                data: {changes: change},
                success: function () {
                    $console.text('Autosaved (' + change.length + ' cell' + (change.length > 1 ? 's' : '') + ')');

                    autosaveNotification = setTimeout(function () {
                        $console.text('Changes will be autosaved');
                    }, 1000);
                }
            });
        }
    });

    $("#load").click(function () {
        $.ajax({
            url: 'plant_test/muat_edit/<?php echo $bantu; ?>/<?php echo $bantu2; ?>',
            type: 'GET',
            success: function (res) {
                var mine = JSON.parse(res);
                var data = [], row;

                for (var i = 0, ilen = mine.mydata.length; i < ilen; i++) {
                    row = [];
                    row[0] = mine.mydata[i].DATE_PROD;
                    row[1] = mine.mydata[i].RM1_PROD;
                    row[2] = mine.mydata[i].RM1_JOP;
                    row[3] = mine.mydata[i].KL1_PROD;
                    row[4] = mine.mydata[i].KL1_JOP;
                    row[5] = mine.mydata[i].FMMP_PROD;
                    row[6] = mine.mydata[i].FMMP_JOP;
                    row[7] = mine.mydata[i].FMHCM_PROD;
                    row[8] = mine.mydata[i].FMHCM_JOP;
                    data[mine.mydata[i].ID - 1] = row;
                }
                $console.text('Data loaded');
                hot.loadData(data);
            }
        });
    }).click(); // execute immediately

    $("#save").click(function () {
        $.ajax({
//            url: 'plant_test/simpan_edit/<?php echo $bantu; ?>/<?php echo $bantu2; ?>',
            url: 'plant_test/simpan_tes',
            data: {data: hot.getData()},
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
</script>