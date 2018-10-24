$(document).ready(function(){
	var base_url = "http://10.15.5.150/dev/DashboardBOD/";
	// var base_url = "http://eis.semenindonesia.com/";

    var data = [];
	var choose = 1;
	var bulan = $('#month').val();
	var tahun = $('#year').val();
    var opco = $('#opco').val();
    
	function numberFormat(x) {
	    return parseFloat(x).toFixed(0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
	}

	$('.find').click(function(){
		bulan = $('#month').val();
		tahun = $('#year').val();
		opco = $('#opco').val();
		sessionStorage.setItem("saveParam", JSON.stringify({bulan, tahun, opco}));
		loadData(bulan, tahun, opco);
	});

	function loadData(bulan, tahun, opco){
		$(".loading_overlay").removeClass("opacity-on");
		if(bulan<=9){
			bulan = '0'+bulan;
		}else{
			bulan = bulan;
		};
		$.getJSON(base_url+"procurement/get_data_monthly?comp="+opco+"&year="+tahun+"&month="+bulan, function(data){
            $(".loading_overlay").addClass("opacity-on");
            var nilai_po = data.total_po_value.TOTAL_POVAL/1000000;
            var po_barang = data.total_po_barang.TOTAL_POBAR/1000000;
            var po_jasa = data.total_po_jasa.TOTAL_POJAS/1000000;
            var po_bahan = data.total_po_bahan.TOTAL_POBAH/1000000;

            $('.valPO1').html(numberFormat(data.total_po.TOTAL_PO));
            $('.valPO2').html(numberFormat(nilai_po));
            $('.valPODetail1').html(numberFormat(po_barang));
            $('.valPODetail2').html(numberFormat(po_jasa));
            $('.valPODetail3').html(numberFormat(po_bahan));
            
            //

            var percenBarang = ((parseFloat(po_barang)/parseFloat(nilai_po))*100);
            var percenJasa = ((parseFloat(po_jasa)/parseFloat(nilai_po))*100);
            var percenBahan = ((parseFloat(po_bahan)/parseFloat(nilai_po))*100);

            var percenPR = ((parseFloat(data.total_invest_pr.TOTAL_INVEST_PR)/parseFloat(nilai_po))*100);
            var percenPO = ((parseFloat(data.total_invest_pr.TOTAL_INVEST_PO)/parseFloat(nilai_po))*100);
            
            Highcharts.chart('nilaiPO', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: ''
                },
                credits: {
                    enabled: false
                },
                exporting: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                            style: {
                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                        }
                    }
                },
                series: [{
                    colorByPoint: true,
                    data: [{
                        name: 'Barang',
                        y: percenBarang,
                        sliced: true,
                        selected: true
                    }, {
                        name: 'Bahan',
                        y: percenBahan
                    }, {
                        name: 'Jasa',
                        y: percenJasa
                    }]
                }]
            });

            Highcharts.chart('nilaiinvestasi', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: ''
                },
                credits: {
                    enabled: false
                },
                exporting: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                            style: {
                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                        }
                    }
                },
                series: [{
                    colorByPoint: true,
                    data: [{
                        name: 'PO',
                        y: percenPO,
                        
                    }, {
                        name: 'PR',
                        y: percenPR,
                        sliced: true,
                        selected: true
                    }]
                }]
            });
            //

            var invest1=[];
            var invest2=[];
            for(var i=0;i<12;i++){
                invest1.push(parseFloat(data.trend_invest[i].TOTAL_PR));
                invest2.push(parseFloat(data.trend_invest[i].TOTAL_PO));
            }
            var invest1_last=[];
            var invest2_last=[];
            for(var i=0;i<12;i++){
                invest1_last.push(parseFloat(data.trend_invest_prev[i].TOTAL_PR));
                invest2_last.push(parseFloat(data.trend_invest_prev[i].TOTAL_PO));
            }

            Highcharts.chart('trend1', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Tren Investasi '+(parseFloat(tahun-1))+' vs '+tahun,
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
                xAxis: {
                    categories: [
                        'Jan',
                        'Feb',
                        'Mar',
                        'Apr',
                        'May',
                        'Jun',
                        'Jul',
                        'Aug',
                        'Sep',
                        'Oct',
                        'Nov',
                        'Dec'
                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Count'
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
                    name: (parseFloat(tahun-1))+' PO',
                    data: invest2_last
                }, {
                    name: (parseFloat(tahun-1))+' PR',
                    data: invest1_last
                }, {
                    name: year+' PO',
                    data: invest2
                }, {
                    name: year+' PR',
                    data: invest1
                }],
            });
            //

            var po1=[];
            var po2=[];
            for(var i=0;i<12;i++){
                po1.push(parseFloat(data.trend_po[i].TOTAL_ITEM));
                po2.push(parseFloat(data.trend_po[i].TOTAL_PO));
            }
            var po1_last=[];
            var po2_last=[];
            for(var i=0;i<12;i++){
                po1_last.push(parseFloat(data.trend_po_prev[i].TOTAL_ITEM));
                po2_last.push(parseFloat(data.trend_po_prev[i].TOTAL_PO));
            }

            Highcharts.chart('trend2', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Tren Realisasi Pencapaian PO '+(parseFloat(tahun-1))+' vs '+tahun
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
                xAxis: {
                    categories: [
                        'Jan',
                        'Feb',
                        'Mar',
                        'Apr',
                        'May',
                        'Jun',
                        'Jul',
                        'Aug',
                        'Sep',
                        'Oct',
                        'Nov',
                        'Dec'
                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Count'
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
                    name: 'PO '+(parseFloat(tahun-1))+' PO',
                    data: po2_last
                }, {
                    name: 'PO '+(parseFloat(tahun-1))+' Item',
                    data: po1_last
                }, {
                    name: 'PO '+tahun+' PO',
                    data: po2
                }, {
                    name: 'PO '+tahun+' Item',
                    data: po1
                }],
            });
            //

            var time1=[];
            var time2=[];
            for(var i=0;i<12;i++){
                time1.push(parseFloat(data.trend_invest[i].TOTAL_PR));
                time2.push(parseFloat(data.trend_invest[i].TOTAL_PO));
            }
            var time1_last=[];
            var time2_last=[];
            for(var i=0;i<12;i++){
                time1_last.push(parseFloat(data.trend_invest_prev[i].TOTAL_PR));
                time2_last.push(parseFloat(data.trend_invest_prev[i].TOTAL_PO));
            }
            Highcharts.chart('trend3', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Lead Time Pengadaan '+(parseFloat(tahun-1))+' vs '+tahun
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
                xAxis: {
                    categories: [
                        'Jan',
                        'Feb',
                        'Mar',
                        'Apr',
                        'May',
                        'Jun',
                        'Jul',
                        'Aug',
                        'Sep',
                        'Oct',
                        'Nov',
                        'Dec'
                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Count'
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
                    name: (parseFloat(tahun-1))+' Barang',
                    data: time2_last
                }, {
                    name: (parseFloat(tahun-1))+' Jasa',
                    data: time1_last
                }, {
                    name: tahun+' Barang',
                    data: time2
                }, {
                    name: tahun+' Jasa',
                    data: time1
                }],

            });


		});

    };
    
	loadData(bulan, tahun, opco);
});