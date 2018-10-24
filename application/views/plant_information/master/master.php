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
        colHeaders: ['DATE_PROD', 'RM1_PROD', 'RM1_JOP', 'KL1_PROD', 'KL1_JOP', 'FMMP_PROD', 'FMMP_JOP', 'FMHCM_PROD', 'FMHCM_JOP'],
        columns: [
            {},
            {},
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
//        console.log(bulan);
        $.ajax({
            url: 'http://10.15.5.150/dev/PlantSystem/plant_test/get_daily_tlcc/5',
//            dataType: 'json',
            type: 'GET',
            success: function(res) {
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
//                console.log(mine.data[2].RM1_PROD);
                $console.text('Data loaded');
                hot.loadData(data);
            }
        });
    })//.click(); // execute immediately

    $("#save").click(function() {
//    $parent.find('button[name=save]').click(function () {
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

//    function dataUpdate() {
//        $.ajax({
//            url: 'http://10.15.5.150/dev/PlantSystem/plant_test/get_daily_tlcc',
//            dataType: 'json',
//            type: 'GET',
//            success: function (res) {
//                console.log(res);
//            }
//        });
//    }
//    ;
//    setInterval(dataUpdate, 1000);
</script>