<!DOCTYPE HTML>
<html>
    <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://code.highcharts.com/highcharts.src.js"></script>
    </head>
    <body>
        <div id="container" style="width: 1000px"></div>
    </body>
    <script>
        Highcharts.chart('container', {
            title: {
                text: 'Tes InfluxDB'
            },
            subtitle: {
                text: ''
            },
            credits: {
                enabled: false                
            },
            exporting: {
                enabled: false                
            },
            yAxis: {
                title: {
                    text: 'Axis'
                }
            },
            series: [{
                    name: 'Tes',
                    data: [<?php
        require '/vendor/autoload.php';

        $client = new InfluxDB\Client('10.15.3.146', '8086');
        $database = $client->selectDB('opc_data_historian');
//    $result = $database->getQueryBuilder()
//    ->select('*')
//    ->from('BTG_A')
//    ->limit(10)
//    ->getResultSet()
//    ->getSeries();

        $result = $database->query("select value from TBN34_A where \"tag\" = 'Tuban3New.FM5.Feed' AND (time > '2017-07-01 00:00:00' and time < '2017-07-31 23:59:00')");
        $points = $result->getSeries();

        $count = count($points[0]["values"]);

        for ($i = 0; $i < $count; $i++) {
            echo ($points[0]["values"][$i][1]).",";
        }
        ?>]
                }]

        });
    </script>
</html>