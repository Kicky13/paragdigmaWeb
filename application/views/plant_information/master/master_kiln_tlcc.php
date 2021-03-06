<?php
$input = $this->input->get('input');
$tahun = !empty($input) ? $input['tahun'] : date('Y');
$bulan = !empty($input) ? $input['periode'] : date('m');
$str_date = $bulan;

$my_bln = date('m', mktime(0,0,0, $bulan,1,$tahun));
?>
<link rel="stylesheet" media="screen" href="<?php echo base_url() ?>bootstrap/handsontable/handsontable.full.css">
<link rel="stylesheet" media="screen" href="<?php echo base_url() ?>bootstrap/handsontable/pikaday/pikaday.css">
<script src="<?php echo base_url() ?>bootstrap/plantView/assets/js/jquery-1.11.3.min.js"></script>
<script src="<?php echo base_url() ?>bootstrap/handsontable/handsontable.full.js"></script>
<script src="<?php echo base_url() ?>bootstrap/plantView/assets/js/jquery.handsontable.maxlength.full.js"></script>
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
$plantx = $this->input->get('jenis');

$plant = !empty($plantx) ? $plantx : 1;

if ($plant == 1) {
    $bantu = 'Indarung 2';
} elseif ($plant == 2) {
    $bantu = 'Indarung 3';
} elseif ($plant == 3) {
    $bantu = 'Indarung 4';
} elseif ($plant == 4) {
    $bantu = 'Indarung 5';
} else {
    $bantu = '';
}
?>
<div class="row" style="margin-bottom: 2px;">
    <nav class="navbar navbar-inverse my_margin">
        <form name="load" id="load" style="width: 100%;">
            <div class="col-md-4 container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="javascript:void(0)">TLCC : KILN Operations Report</a>
                </div>
            </div>
            <div class="col-md-7"> <!--   container-fluid -->
                <div class="col-md-4">&nbsp;&nbsp;</div>
                <div class="col-md-4" style="padding-left: 0px">
                    <ul class="nav navbar-nav navbar-center">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff "><?php echo date("F", mktime(0, 0, 0, $bulan, 10)) ?><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php
                                for ($ii = 1; $ii <= $my_bln; $ii++) {
                                    if (strlen($ii) < 2) {
                                        $i = '0' . $ii;
                                    } else {
                                        $i = $ii;
                                    }
                                    echo '<li>
                                    <button class="btn btn-default" type="button" id="bulan_' . $i . '" onclick="Btn_periode(' . $i . ')" style="min-width:120px;border:none;border-radius: 0 !important;">' . date("F", mktime(0, 0, 0, $i, 10)) . '</button>
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
            </div>
            <div class="col-md-1" style="margin-top: 8px; padding: 0px">
                <!--<button class="btn btn-success" id="load" style="font-size:14px; width: 85px">Load</button>-->
                <a href="<?= base_url() ?>index.php/plant_system/portal_production" ><button type="button" class="btn btn-default" style="font-size:14px; width: 85px">
                        Back
                    </button></a>
            </div>
        </form>
    </nav>    
</div>
<div class="col-md-12 col-xs-12" style="padding: 1px; margin-bottom: 5px">
    <div class="col-xs-10" style="font-size: 16px; padding-top: 5px" id="exampleConsole"><strong class="blink_me">Select month and year then click Load</strong></div>
    <div class="col-xs-2" style="float: right"><input type="checkbox" id="autosave" name="autosave" disabled autocomplete="off">&nbsp;Autosave</div>
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
        startRows: 31,
        startCols: 9,
        width: 1250,
        height: 400,
        rowHeaders: true,
        colHeaders: false,
        manualColumnResize: true,
        manualRowResize: true,
        columns: [
            {},
            {},
            {},
            {},
            {}
        ],
        minSpareCols: 0,
        minSpareRows: 1,
        contextMenu: true,
        cells: function (row, col, prop) {
            this.maxLength = 255;
            if (this.maxLength > 255) {
                alert("Maximum character is 255, please make shorter description! PIS Apss");
            }
            var cellProperties = {};

            cellProperties.className = "htCenter htMiddle";
            if (col === 1) {
                cellProperties.className = "htRight htMiddle";
            }
            if (col === 2) {
                cellProperties.className = "htRight htMiddle";
            }
            if (col > 3) {
                cellProperties.renderer = reason;
                cellProperties.className = "htLeft htMiddle";
            }
            return cellProperties;
        },
        data: ['Date Production', 'KILN Prod', 'KILN Ops. Hour', 'Stop Count', 'Stop Reason'],
        afterChange: function (change, source) {
            var data;
            if (source === 'loadData' || !$('input[name=autosave]').is(':checked')) {
                return;
            }
            data = change[0];

            data[0] = hot.sortIndex[data[0]] ? hot.sortIndex[data[0]][0] : data[0];

            clearTimeout(autosaveNotification);
            $.ajax({
                url: '<?= site_url() ?>/master_data/save_kiln_tlcc/<?php echo $bulan; ?>/<?php echo $tahun; ?>',
                                dataType: 'json',
                                type: 'POST',
                                data: {changes: change, tgl: hot.getDataAtCell(change[0][0], 0), bulan: <?php echo $bulan; ?>, year: <?php echo $tahun; ?>},
                                success: function () {
                                    $console.text('Autosaved (' + change.length + ' cell' + (change.length > 1 ? 's' : '') + ')');

                                    autosaveNotification = setTimeout(function () {
                                        $console.text('Changes will be autosaved');
                                    }, 1000);
                                }
                            });
                        }
                    });

                    function reason(instance, td, row, col, prop, value, cellProperties) {
                        Handsontable.renderers.TextRenderer.apply(this, arguments);

                        td.style.width = '700px';
                    }

                    $("#load").click(function () {
                        $.ajax({
                            url: 'master_data/get_kiln_tlcc/<?php echo $bulan; ?>/<?php echo $tahun; ?>/1',
                            type: 'GET',
                            success: function (res) {
                                var mine = JSON.parse(res);
                                var data = [], row;
                                data[0] = ['Date Production', 'KILN Prod', 'KILN Ops. Hour', 'Stop Count', 'Stop Reason'];

                                for (var i = 0, ilen = mine.mydata.length; i < ilen; i++) {
                                    row = [];
                                    row[0] = mine.mydata[i].DATE_PROD;
                                    row[1] = mine.mydata[i].KL_PROD;
                                    row[2] = mine.mydata[i].KL_JOP;
                                    row[3] = mine.mydata[i].STOP_COUNT;
                                    row[4] = mine.mydata[i].STOP_DESC;
                                    data[mine.mydata[i].ID] = row;
                                }
                                $console.html('Data loaded in <?php
echo '<b>' . date("F", mktime(0, 0, 0, $bulan, 10)) . '</b>';
echo '&nbsp;<b>' . $tahun . '</b>';
?>');
                                hot.loadData(data);
                            }
                        });
                    }).click();

                    $("#save").click(function () {
                        $.ajax({
                            url: '<?= site_url() ?>/master_data/save_kiln_tlcc/<?php echo $bulan; ?>/<?php echo $tahun; ?>',
                                        data: {data: hot.getData(), bulan: <?php echo $bulan; ?>, year: <?php echo $tahun; ?>}, // returns all cells' data
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
                                
    function Btn_periode(periode) {
        var url = "";
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
                            if (!empty($bln) and $bln > $my_bln) {
                                echo $bln;
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