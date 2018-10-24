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
<script>
    $(function () {
        $('#btn_cement_chart').click(function () {
            window.location.href = 'index.php/plant_administrator/editChartSeq';
        });
        $('#btn_clinker_chart').click(function () {
            window.location.href = 'index.php/plant_administrator/editChartSeqCl';
        });
    });
</script>
<div class="row" style="margin-bottom: 2px; margin-top: 5px;">
    <nav class="navbar navbar-inverse my_margin">
        <div class="col-md-3 container-fluid">
            <div class="navbar-header">
                <h3 style="text-align: left; padding-left: 12px; margin-top: 10px; color: white">Cement Chart's Y-Axis</h3>
            </div>
        </div>
        <div class="col-md-9">
            <div class="col-md-3">
                &nbsp;
            </div>
            <div class="col-md-2" style="padding-left: 0px">
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
            <div class="col-md-3 collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="#"> <span class="sr-only">(current)</span></a></li>
                    <li>
                    </li>
                </ul>
                <form class="navbar-form navbar-left">
                    <div class="form-group">

                    </div>
                    <div class="btn-group">
                        <button class="btn btn-default" aria-label="Left Align" id="btn_cement_chart" type="button">
                            Cement Chart
                        </button>
                        <button class="btn btn-warning " aria-label="Left Align" id="btn_clinker_chart" type="button">
                            Clinker Chart
                        </button>
                    </div>
                </form>
            </div>
            <form name="load" id="load" style="width: 100%;">
                <div class="col-md-2" style="margin-top: 8px; padding: 0px">
                    <a href="<?= base_url() ?>index.php/master_data" ><button type="button" class="btn btn-default" style="font-size:14px; width: 85px; float: right" data-toggle="modal" data-target="#addModal">
                            Back
                        </button></a>
                </div>
            </form>
        </div>
    </nav>    
</div>
<div class="col-md-12 col-xs-12" style="padding: 1px; margin-bottom: 5px">
    <div class="col-xs-10" style="font-size: 16px; padding-top: 5px" id="exampleConsole"><strong class="blink_me">Select month and year then click Load</strong></div>
    <div class="col-xs-2" style="float: right"><input type="checkbox" id="autosave" name="autosave" checked="checked" disabled autocomplete="off">&nbsp;Autosave</div>
</div>
<br>
<div class="col-md-12">
    <div class="col-md-12" id="example" style="overflow: hidden;"></div>
    <div class="col-md-12" style="margin-top: 10px">
        <button class="btn btn-success" id="save" style="font-size:14px; width: 85px">Save All</button>
        <span style="padding-top: 5px;">&nbsp;&nbsp;After copying all data from Excel to this table, click "<strong>Save All</strong>" to save changes.</span>
    </div>
</div>
<script>
    var $container = $("#example"),
            $console = $("#exampleConsole"),
            $parent = $container.parent(),
            autosaveNotification,
            hot;

    hot = new Handsontable($container[0], {
        columnSorting: true,
        startRows: 22,
        startCols: 8,
        width: 1055,
        height: 400,
        rowHeaders: true,
        colHeaders: false,
        manualColumnResize: true,
        manualRowResize: true,
        columns: [
            {}, {}, {}, {}, {}, {}
        ],
        minSpareCols: 0,
        minSpareRows: 1,
        minRows: 12,
        contextMenu: true,
        cells: function (row, col, prop) {
            var cellProperties = {};

//            cellProperties.className = "htCenter htMiddle";

            return cellProperties;
        },
        data: [
            ['OPCO','COMPANY','PLANT ID','PLANT', 'LEFT Y-AXIS', 'RIGHT Y-AXIS']
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
                url: '<?= site_url() ?>/plant_administrator/save_chart_cement/<?php echo $tahun; ?>',
                dataType: 'json',
                type: 'POST',
                data: {changes: change, opco: hot.getDataAtCell(change[0][0], 0), plant: hot.getDataAtCell(change[0][0], 2), idplant: hot.getDataAtCell(change[0][0], 3), tahun: <?php echo $tahun; ?>},
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

    $("#load").click(function () {
        $.ajax({
            url: 'plant_administrator/load_chart_cement?tahun=<?php echo $tahun; ?>',
            type: 'GET',
            success: function (res) {
                var mine = JSON.parse(res);
                var data = [], row;
                data[0] = ['OPCO','COMPANY','PLANT ID','PLANT', 'LEFT Y-AXIS', 'RIGHT Y-AXIS'];

                for (var i = 0, ilen = mine.mydata.length; i < ilen; i++) {
                    row = [];
                    row[0] = mine.mydata[i].OPCO;
                    row[1] = mine.mydata[i].COMPANY;
                    row[2] = mine.mydata[i].PLANT;
                    row[3] = mine.mydata[i].ID_PLANT;
                    row[4] = mine.mydata[i].INTV_LEFT.replace(/[\n\r]/g, '');
                    row[5] = mine.mydata[i].INTV_RIGHT.replace(/[\n\r]/g, '');
                    
                    data[parseInt(mine.mydata[i].ID)] = row;
                }
                $console.html('Data loaded in <?php
                echo '<b>' . $tahun . '</b>';
                ?>');
                hot.loadData(data);
            }
        });
    }).click();

    $("#save").click(function () {
        $.ajax({
            url: '<?= site_url() ?>/plant_administrator/save_chart_cement/<?php echo $tahun; ?>',
            data: {data: hot.getData()}, // returns all cells' data
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
    
    function loading(){
        $.ajax({
                url: '<?= site_url() ?>/plant_administrator/save_chart_cement/<?php echo $tahun; ?>',
                data: {data: hot.getData()}, // returns all cells' data
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
    }

    $("#autosave").click(function () {
        if ($(this).is(':checked')) {
            $console.text('Changes will be autosaved');
        } else {
            $console.text('Changes will not be autosaved');
        }
    });

    function Btn_Tahun(tahun) {
        var url = "";
        loading();
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