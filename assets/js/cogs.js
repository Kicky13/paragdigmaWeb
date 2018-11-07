var hiddenTitle = 'COGS';
$(document).ready(function () {
    console.log('Start Page');
    $(".loading_overlay").removeClass("opacity-on");
    loadChartAll();
    setHeaderData();

    [].forEach.call(document.querySelectorAll('.chartCogs'), function (el) {
        el.setAttribute('hidden', true);
    });
    document.getElementById('chartCogs1').removeAttribute('hidden');
    [].forEach.call(document.querySelectorAll('.itemHeader'), function (el) {
        el.setAttribute('hidden', true);
    });
    document.getElementById('itemHeader1').removeAttribute('hidden');
    loadChartPerData();

    $('#find').click(function () {
        $(".loading_overlay").removeClass("opacity-on");
        find();
    });
});

function loadChartPerData() {
    $.ajax({
        url: $('#baseUrl').val() + 'cogs/loadAllTrend/',
        type: 'POST',
        data: {
            opco: $('#opco').val(),
            month: $('#month').val(),
            year: $('#year').val()
        },
        dataType: 'JSON'
    }).always(function (data) {
        console.log(data.length);
        $(".loading_overlay").addClass("opacity-on");
        if (typeof data.data == 'undefined' || data.data.length == 0){
            for (k = 1; k < 23; k++){
                Highcharts.chart('chartCogs' + k, {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Trend'
                    },
                    subtitle: {
                        text: ''
                    },
                    xAxis: {
                        categories: [
                            data.months[0],
                            data.months[1],
                            data.months[2],
                            data.months[3],
                            data.months[4],
                            data.months[5],
                            data.months[6],
                            data.months[7],
                            data.months[8],
                            data.months[9],
                            data.months[10],
                            data.months[11]
                        ],
                        crosshair: true
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Value (in Mio)'
                        }
                    },
                    exporting: {
                        enabled: false
                    },
                    credits: {
                        enabled: false
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
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
                        name: 'Actual',
                        data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]

                    }, {
                        name: 'Last Year Actual',
                        data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]

                    }, {
                        name: 'RKAP',
                        data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
                    }]
                });
            }
        } else {
            indeks = 1;
            for (i = 0; i < data.data.length; i++) {
                Highcharts.chart('chartCogs' + indeks, {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Trend COGS'
                    },
                    subtitle: {
                        text: ''
                    },
                    xAxis: {
                        categories: [
                            data.months[0],
                            data.months[1],
                            data.months[2],
                            data.months[3],
                            data.months[4],
                            data.months[5],
                            data.months[6],
                            data.months[7],
                            data.months[8],
                            data.months[9],
                            data.months[10],
                            data.months[11]
                        ],
                        crosshair: true
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Value (in Mio)'
                        }
                    },
                    exporting: {
                        enabled: false
                    },
                    credits: {
                        enabled: false
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
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
                        name: 'Actual',
                        data: [parseFloat(data.data[i][0].REALISASI), parseFloat(data.data[i][1].REALISASI), parseFloat(data.data[i][2].REALISASI), parseFloat(data.data[i][3].REALISASI), parseFloat(data.data[i][4].REALISASI), parseFloat(data.data[i][5].REALISASI), parseFloat(data.data[i][6].REALISASI), parseFloat(data.data[i][7].REALISASI), parseFloat(data.data[i][8].REALISASI), parseFloat(data.data[i][9].REALISASI), parseFloat(data.data[i][10].REALISASI), parseFloat(data.data[i][11].REALISASI)]

                    }, {
                        name: 'Last Year Actual',
                        data: [parseFloat(data.data[i][0].REALISASI_TAHUN_LALU), parseFloat(data.data[i][1].REALISASI_TAHUN_LALU), parseFloat(data.data[i][2].REALISASI_TAHUN_LALU), parseFloat(data.data[i][3].REALISASI_TAHUN_LALU), parseFloat(data.data[i][4].REALISASI_TAHUN_LALU), parseFloat(data.data[i][5].REALISASI_TAHUN_LALU), parseFloat(data.data[i][6].REALISASI_TAHUN_LALU), parseFloat(data.data[i][7].REALISASI_TAHUN_LALU), parseFloat(data.data[i][8].REALISASI_TAHUN_LALU), parseFloat(data.data[i][9].REALISASI_TAHUN_LALU), parseFloat(data.data[i][10].REALISASI_TAHUN_LALU), parseFloat(data.data[i][11].REALISASI_TAHUN_LALU)]

                    }, {
                        name: 'RKAP',
                        data: [parseFloat(data.data[i][0].RKAP), parseFloat(data.data[i][1].RKAP), parseFloat(data.data[i][2].RKAP), parseFloat(data.data[i][3].RKAP), parseFloat(data.data[i][4].RKAP), parseFloat(data.data[i][5].RKAP), parseFloat(data.data[i][6].RKAP), parseFloat(data.data[i][7].RKAP), parseFloat(data.data[i][8].RKAP), parseFloat(data.data[i][9].RKAP), parseFloat(data.data[i][10].RKAP), parseFloat(data.data[i][11].RKAP)]
                    }]
                });
                [].forEach.call(document.querySelectorAll('.chartCogs'), function (el) {
                    el.setAttribute('hidden', true);
                });
                document.getElementById('chartCogs1').removeAttribute('hidden');
                [].forEach.call(document.querySelectorAll('.itemHeader'), function (el) {
                    el.setAttribute('hidden', true);
                });
                document.getElementById('itemHeader1').removeAttribute('hidden');
                indeks++;
            }
        }

    });
}

function loadChartAll() {
    opc = $('#opco').val();
    mon = $('#month').val();
    yea = $('#year').val();
    console.log(mon + ':' + yea + ':' + opc);
    $.ajax({
        url: $('#baseUrl').val() + 'cogs/loadActualByMonthYear/',
        data: {
            opco: opc,
            month: mon,
            year: yea
        },
        type: 'POST',
        dataType: 'JSON'
    }).always(function (data) {
        var cogs = [];
        if (typeof(data.data[0]) == 'undefined'){
            console.log('Ini Kosong');
            for (h = 1; h < 23; h++){
                cogs[h] = 0;
            } 
        } else {
            ind = 1;
            for (i = 0; i < data.data.length; i++){
                if (parseFloat(data.data[i].REALISASI) === null) {
                    cogs[ind] = 0;
                } else {
                    cogs[ind] = parseFloat(data.data[i].REALISASI);
                }
                ind++;
            }
            console.log(cogs);
            console.log(data.data);
        }
        Highcharts.chart('cogs_all', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Actual COGS'
            },
            subtitle: {
                text: ''
            },
            exporting: {
                enabled: false
            },
            credits: {
                enabled: false
            },
            xAxis: {
                categories: [
                    'COGS',
                    'BAHAN BAKU',
                    'BATUBARA',
                    'INDEKS BATUBARA',
                    'IDO',
                    'BAHAN BAKU',
                    'BATU KAPUR',
                    'INDEKS BATU KAPUR',
                    'GYPSUM',
                    'INDEKS GYPSUM',
                    'TANAH LIAT',
                    'INDEKS TANAH LIAT',
                    'LISTRIK',
                    'INDEKS LISTRIK',
                    'LISTRIK PLN',
                    'BTG',
                    'PEMELIHARAAN',
                    'KEMASAN',
                    'KRAFT',
                    'WOVEN',
                    'PENIAGAAN VIA LAUT',
                    'PENIAGAAN VIA DARAT',
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Value'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
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
                name: 'Nilai Actual',
                data: [cogs[1], cogs[2], cogs[3], cogs[4], cogs[5], cogs[6], cogs[7], cogs[8], cogs[9], cogs[10], cogs[11], cogs[12], cogs[13], cogs[14], cogs[15], cogs[16], cogs[17], cogs[18], cogs[19], cogs[20], cogs[21], cogs[22]]
            }]
        });
    });
}

function setHeaderData() {
    $.ajax({
        url: $('#baseUrl').val() + 'cogs/getHeaderData',
        type: 'POST',
        dataType: 'JSON',
        data: {
            opco: $('#opco').val(),
            month: $('#month').val(),
            year: $('#year').val()
        }
    }).always(function (data) {
        console.log(data.MoM);
        if (typeof data.MoM == 'undefined' || data.MoM.length == 0){
            for (n = 1; n < document.querySelectorAll('.itemActual').length; n++){
                document.getElementById('itemYoY' + n).innerHTML = '?';
                document.getElementById('itemMoM' + n).innerHTML = '?';
                document.getElementById('itemActual' + n).innerHTML = '?';
                document.getElementById('itemRKAP' + n).innerHTML = '?';
            }
        } else {
            indeks = 1;
            for (i = 0; i < data.MoM.length; i++){
                document.getElementById('itemYoY' + indeks).innerHTML = data.YoY[i];
                document.getElementById('itemMoM' + indeks).innerHTML = data.MoM[i];
                document.getElementById('itemActual' + indeks).innerHTML = data.actualRKAP[i].Actual;
                document.getElementById('itemRKAP' + indeks).innerHTML = data.actualRKAP[i].RKAP;
                indeks++;
            }
        }
    });
}

function changeItem(item, title) {
    itemID = 'chartCogs' + item;
    headerID = 'itemHeader' + item;
    [].forEach.call(document.querySelectorAll('.chartCogs'), function (el) {
        el.setAttribute('hidden', true);
    });
    document.getElementById(itemID).removeAttribute('hidden');
    document.getElementById('cogs_title').innerHTML = title;
    $('#cogs_hidden_title').val(title);
    hiddenTitle = title;
    [].forEach.call(document.querySelectorAll('.itemHeader'), function (ex) {
        ex.setAttribute('hidden', true);
    });
    document.getElementById(headerID).removeAttribute('hidden');
}

function find() {
    console.log('Find');
    loadChartPerData();
    loadChartAll();
    setHeaderData();
}