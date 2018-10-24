<script src="<?php echo base_url(); ?>bootstrap/plantView/assets/js/jquery-1.11.3.min.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/plantView/highcharts/highcharts.js"></script>

<?php 
$my_bln = $last;

$bln_x = $this->input->get('bulan');

if (strlen($bln_x) < 2) {
    $bln = '0' . $bln_x;
} else {
    $bln = $bln_x;
}
$thn = $this->input->get('tahun');
$tahun = !empty($thn) ? $thn : date('Y');
$bulan = !empty($bln) ? $bln : date('m');

$counting = count($data);
?>

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
                        for ($i = 1; $i <= $my_bln; $i++) {
                            if (strlen($i) < 2) {
                                $x = '0' . $i;
                            } else {
                                $x = $i;
                            }
                            echo '<li>
                                    <button class="btn btn-default" type="button" id="bulan_' . $x . '" onclick="Btn_periode(\'' . $x . '\')" style="min-width:120px;border:none;border-radius: 0 !important;">' . date("F", mktime(0, 0, 0, $i, 10)) . '</button>
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
<div class="col-xs-1">&nbsp;</div>
<div class="col-xs-10">
    <div><?php if(empty($data)){
     echo '<center><h3 style="color: red">No Stock Data Available</h3></center>';
    }
?></div>
    <div id="stock"></div>
</div>
<div class="col-xs-1">&nbsp;</div>

<script>
    Highcharts.chart('stock', {
        chart: {
            type: 'spline'
        },
        credits: {
            enabled: false
        },
        title: {
            text: 'Stock Cement & Clinker'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [<?php
                    for ($i = 0; $i < $counting; $i++) {
                        echo "'" . $data[$i]['ID'] . "',";
                    }
                    ?>
            ],
            crosshair: true
        },
        yAxis: {
            title: {
                text: 'Ton'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">Tanggal : {point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.2f} Ton</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
                name: 'Cement',
                data: [<?php
                    for ($i = 0; $i < $counting; $i++) {
                        echo $data[$i]['CEMENT'] . ",";
                    }
                    ?>]

            },{
                name: 'Clinker',
                data: [<?php
                    for ($i = 0; $i < $counting; $i++) {
                        echo $data[$i]['CLINKER'] . ",";
                    }
                    ?>]
            }]
    });
    
    function Btn_periode(periode) {
        var url = "<?= base_url() ?>index.php/master_data/stock_tlcc";
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
                            if (!empty($bulan) and $bulan > $my_bln) {
                                echo $bulan;
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