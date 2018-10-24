<link rel="stylesheet" media="screen" href="<?php echo base_url() ?>bootstrap/handsontable/handsontable.full.css">
<link rel="stylesheet" media="screen" href="<?php echo base_url() ?>bootstrap/handsontable/pikaday/pikaday.css">
<script src="<?php echo base_url() ?>bootstrap/plantView/assets/js/jquery-1.11.3.min.js"></script>
<script src="<?php echo base_url() ?>bootstrap/handsontable/handsontable.full.js"></script>
<script src="<?php echo base_url() ?>bootstrap/handsontable/pikaday/pikaday.js"></script>
<script src="<?php echo base_url() ?>bootstrap/handsontable/moment/moment.js"></script>
<script src="<?php echo base_url() ?>bootstrap/handsontable/zeroclipboard/ZeroClipboard.js"></script>
<script src="<?php echo base_url() ?>bootstrap/handsontable/numbro/numbro.js"></script>
<script src="<?php echo base_url() ?>bootstrap/handsontable/numbro/languages.js"></script>


<!--<h4>
    Production Semen Gresik
</h4>-->
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
    <form name="load" id="load" style="width: 200px">
        <select name="plant" id="plant">
            <option value="1">MP</option>
            <option value="2">HCM</option>
        </select>
        <select name="tahun" id="tahun">
            <option value="2016">2016</option>
            <option value="2017">2017</option>
        </select>

        <?php
        $bantu = $this->input->get('plant');
        $bantu2 = $this->input->get('tahun');
        ?>
        <button id="load">Load</button>
    </form> 
</div>

<br><br>
<div class="row" class="table-responsive">
    <div id="exampleConsole" class="console"></div>
    <div id="example" class="handsontable htRowHeaders htColumnHeaders"></div>
</div>
<button name="save" id="save">Save</button>
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
        rowHeaders: true,
        manualColumnResize: true,
        manualRowResize: true,
        preventOverflow: 'horizontal',
        colHeaders: ['ID', 'COMPANY','PLANT','TAHUN', 'BULAN', 'CEMENT', 'CLINKER'],
        columns: [
            {}, {}, {}, {}, {}, {}
        ],
        minSpareCols: 0,
        minSpareRows: 1,
        contextMenu: true
    });

    $("#load").click(function() {
        $.ajax({
            url: 'master_data/get_prognose/<?php echo $pemisah; ?>/<?php echo $bantu; ?>/<?php echo $bantu2; ?>',
            type: 'GET',
            success: function(res) {
                var mine = JSON.parse(res);
                var data = [], row;
                for (var i = 0, ilen = mine.mydata.length; i < ilen; i++) {
                    row = [];
                    row[0] = mine.mydata[i].ID;
                    row[1] = mine.mydata[i].COMPANY;
                    row[2] = mine.mydata[i].PLANT;
                    row[3] = mine.mydata[i].TAHUN;
                    row[4] = mine.mydata[i].BULAN;
                    row[5] = mine.mydata[i].CEMENT;
                    row[6] = mine.mydata[i].CLINKER;
                    data[mine.mydata[i].ID - 1] = row;
                }
                $console.text('Data loaded');
                hot.loadData(data);
            }
        });
    }).click();
</script>