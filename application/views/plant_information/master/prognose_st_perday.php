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
?>
<div class="row" style="margin-bottom: 2px;">
    <nav class="navbar navbar-inverse my_margin">
        <div class="col-md-6 container-fluid">
            <div class="navbar-header">
                <h3 style="text-align: left; padding-left: 12px; margin-top: 10px; color: white"><?php echo $a; ?></h3>
            </div>
        </div>
        <div class="col-md-6">
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
            <form name="load" id="load" style="width: 100%;">
                <div class="col-md-4" style="margin-top: 8px; padding: 0px">
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
        startRows: 12,
        startCols: 8,
        width: 1024,
        height: 400,
        rowHeaders: true,
        colHeaders: false,
        manualColumnResize: true,
        manualRowResize: true,
        columns: [
            {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {}
        ],
        minSpareCols: 0,
        minSpareRows: 1,
        minRows: 12,
        contextMenu: true,
        cells: function (row, col, prop) {
            var cellProperties = {};

            cellProperties.className = "htCenter htMiddle";

            return cellProperties;
        },
        data: ['DATE_PROD', 'KL2_PROD', 'KL3_PROD', 'KL4_PROD', 'KL5_PROD', 'FM2_PROD', 'FM3_PROD', 'FM41_PROD', 'FM42_PROD', 'FM51_PROD', 'FM52_PROD'],
        afterChange: function (change, source) {
            var data;
            if (source === 'loadData' || !$('input[name=autosave]').is(':checked')) {
                return;
            }
            data = change[0];

            data[0] = hot.sortIndex[data[0]] ? hot.sortIndex[data[0]][0] : data[0];

            clearTimeout(autosaveNotification);
            $.ajax({
                url: '<?= site_url() ?>/master_data/save_prognose_day_st/<?php echo $bulan; ?>/<?php echo $tahun; ?>',
                dataType: 'json',
                type: 'POST',
                data: {changes: change, tgl: hot.getDataAtCell(change[0][0], 0), bulan: <?php echo $bulan; ?>, year: <?php echo $tahun; ?>},
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
            url: 'master_data/get_prognose_day_st/<?php echo $bulan; ?>/<?php echo $tahun; ?>',
            type: 'GET',
            success: function (res) {
                var mine = JSON.parse(res);
                var data = [], row;
                data[0] = ['DATE_PROD', 'KL2_PROD', 'KL3_PROD', 'KL4_PROD', 'KL5_PROD', 'FM2_PROD', 'FM3_PROD', 'FM41_PROD', 'FM42_PROD', 'FM51_PROD', 'FM52_PROD'];

                for (var i = 0, ilen = mine.mydata.length; i < ilen; i++) {
                    row = [];
                    row[0] = mine.mydata[i].DATE_PROD;
                    row[1] = mine.mydata[i].KL2_PROD;
                    row[2] = mine.mydata[i].KL3_PROD;
                    row[3] = mine.mydata[i].KL4_PROD;
                    row[4] = mine.mydata[i].KL5_PROD;
                    row[5] = mine.mydata[i].FM2_PROD;
                    row[6] = mine.mydata[i].FM3_PROD;
                    row[7] = mine.mydata[i].FM41_PROD;
                    row[8] = mine.mydata[i].FM42_PROD;
                    row[9] = mine.mydata[i].FM51_PROD;
                    row[10] = mine.mydata[i].FM52_PROD;
                    data[parseInt(mine.mydata[i].ID)] = row;
                }
                $console.html('Data loaded in <?php
                echo '<b>' . date("F", mktime(0, 0, 0, $bulan + 1, 0, $tahun)) . '</b>';
                echo ' ';
                echo '<b>' . $tahun . '</b>';
                ?>');
                hot.loadData(data);
            }
        });
    }).click();

    $("#save").click(function () {
        $.ajax({
            url: '<?= site_url() ?>/master_data/save_prognose_day_st/<?php echo $bulan; ?>/<?php echo $tahun; ?>',
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
        var url = "<?= base_url() ?>index.php/master_data/prognose_opco/4";
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