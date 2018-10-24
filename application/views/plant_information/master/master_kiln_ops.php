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
<div class="row" style="margin-bottom: 2px;">
    <nav class="navbar navbar-inverse my_margin">
        <div class="col-md-6 container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?= base_url() ?>index.php/master_data/tlcc">Kiln Operations Report</a>
            </div>
        </div>
        <div class="col-md-6"> <!--   container-fluid -->
            <form name="load" id="load" style="width: 100%;">
                <div class="col-md-4" style="margin-top: 8px;">
                    <select class="form-control" name="bulan" id="bulan">
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
                </div>
                <div class="col-md-4" style="margin-top: 8px;">
                    <select class="form-control" name="tahun" id="tahun">
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                    </select>
                </div>
                <?php
                $bulan = $this->input->get('bulan');
                $tahun = $this->input->get('tahun');
                ?>
                <div class="col-md-4" style="margin-top: 8px; padding: 0px">
                    <button class="btn btn-success" id="load" style="font-size:14px; width: 85px">Load</button>
                    <button type="button" class="btn btn-default" style="font-size:14px; width: 85px" data-toggle="modal" data-target="#addModal">
                        <a href="<?= base_url() ?>index.php/master_data" >Back</a>
                    </button>
                </div>
            </form>
        </div>
    </nav>    
</div>
<div class="col-md-12 col-xs-12">
    <div id="exampleConsole"></div><br>
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
        startRows: 31,
        startCols: 9,
        rowHeaders: true,
        colHeaders: ['DATE_PROD', 'KL1_PROD', 'KL1_JOP', 'STOP_COUNT', 'STOP_DESC'],
        columns: [
            {},
            {},
            {},
            {},
            {}
        ],
        minSpareCols: 0,
        minSpareRows: 1,
        contextMenu: true
    });

    $("#load").click(function () {
        $.ajax({
            url: 'master_data/get_kiln_ops_edit/<?php echo $bulan; ?>/<?php echo $tahun; ?>',
            type: 'GET',
            success: function (res) {
                var mine = JSON.parse(res);
                var data = [], row;

                for (var i = 0, ilen = mine.mydata.length; i < ilen; i++) {
                    row = [];
                    row[0] = mine.mydata[i].DATE_PROD;
                    row[1] = mine.mydata[i].KL1_PROD;
                    row[2] = mine.mydata[i].KL1_JOP;
                    row[3] = mine.mydata[i].STOP_COUNT;
                    row[4] = mine.mydata[i].STOP_DESC;
                    data[mine.mydata[i].ID - 1] = row;
                }
                $console.html('Data loaded in <?php echo '<b>' . date("F", mktime(0, 0, 0, $bulan, 10)) . '</b>';
                echo '&nbsp;<b>' . $tahun . '</b>'; ?>');
                hot.loadData(data);
            }
        });
    }).click();
</script>