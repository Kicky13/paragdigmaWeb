// Value   => Revenue = 1, Cost of Revenue = 2+3, Operation Expanse = 4, EBITDA = 5, Net Profit = 6
// Per Ton => Revenue = 7, Cost of Revenue = 8+9, Operation Expanse = 10, EBITDA = 11, Net Profit = 12

$(document).ready(function(){
	var base_url = "http://10.15.5.150/dev/DashboardBOD/";
	// var base_url = "http://eis.semenindonesia.com/";

	var datas = [];
	var type = false;
	var choose = 3;
	var todate = false;
	var bulan = $('#month').val();
	var tahun = $('#year').val();
	var opco = $('#opco').val();
	var etype="";
	if(opco==7000){
		etype=false;
	};

	function numberFormat(x) {
	    return parseFloat(x).toFixed(0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
	}

	$('.find').click(function(){
		$(".loading_overlay").removeClass("opacity-on");
		bulan = $('#month').val();
		tahun = $('#year').val();
		opco = $('#opco').val();
		sessionStorage.setItem("saveParam", JSON.stringify({bulan, tahun, opco}));
		loadData(bulan, tahun, opco);
	});

	function loadData(bulan, tahun, opco){
		if(bulan<=9){
			bulan = '0'+bulan;
		}else{
			bulan = bulan;
		};
		console.log(opco);
		$.getJSON(base_url+"Finance_report/show/tampil?time="+tahun+"."+bulan+"&comp="+opco+"&etipe="+etype, function(data){
			datas = data.result;
			view(datas, type, choose);
		});

	};
	loadData(bulan, tahun, opco);


	// $(".noncement").hide();
	// $('.chooseType').change(function() {
	// 	con
	// 	if($(this).val()==1){
	// 		$(".cement").show();
	// 		$(".noncement").hide();
	// 	}else{
	// 		$(".cement").hide();
	// 		$(".noncement").show();
	// 	}
	// });

	var satuan = 'Actual <font size="1" weight="normal" color="#083d7c">(in IDR Mio)</font>';
	$(".actual_title").html(satuan);
	$('.total').change(function() {
		var r = $(this).attr('rel');
		if(r==1){
			type=$(this).prop('checked');
			if(type==false){
				if(choose==10){
					choose=3;
				}else if(choose==11){
					choose=4;
				}else if(choose==12){
					choose=5;
				}else if(choose==13){
					choose=6;
				}else if(choose==14){
					choose=7;
				}
				satuan = 'Actual <font size="1" weight="normal" color="#083d7c">(in IDR Mio)</font>';
			}else{
				if(choose==3){
					choose=10;
				}else if(choose==4){
					choose=11;
				}else if(choose==5){
					choose=12;
				}else if(choose==6){
					choose=13;
				}else if(choose==7){
					choose=14;
				}
				satuan = 'Actual <font size="1" weight="normal" color="#083d7c">(in Kilo Ton)</font>';
			}
			$(".actual_title").html(satuan);
		}else if(r==3){
			todate=$(this).prop('checked');
		};
		view(datas, type, choose);
	}) 
	$(".totals").click(function(e){
		e.preventDefault();
		var r = $(this).attr('rel');
		if(r!=3){
			$(".total").removeClass('active');
			$(this).addClass('active');
		}
		if(r==1){
			type = true;
			if(choose==10){
				choose=3;
			}else if(choose==11){
				choose=4;
			}else if(choose==12){
				choose=5;
			}else if(choose==13){
				choose=6;
			}else if(choose==14){
				choose=7;
			}
			satuan = 'Actual <font size="1" weight="normal" color="#083d7c">(in IDR Mio)</font>';
		}else if(r==2){
			type = false;
			if(choose==3){
				choose=10;
			}else if(choose==4){
				choose=11;
			}else if(choose==5){
				choose=12;
			}else if(choose==6){
				choose=13;
			}else if(choose==7){
				choose=14;
			}
			satuan = 'Actual <font size="1" weight="normal" color="#083d7c">(in Kilo Ton)</font>';
		}else if(r==3){
			if($(this).hasClass('choosed')){
				todate = false;
				$(this).removeClass('choosed');
				$(this).html('Month to date');
			}else{
				todate = true;
				$(this).addClass('choosed');
				$(this).html('Year to date');
			}
		};
		$(".actual_title").html(satuan);
		view(datas, type, choose);
	});

	$(".block").click(function(){
		var r = $(this).attr('rel');
		var title = $(this).data('name');
		$(".tittle_head").html(title);
		$(".block").removeClass('active');
		$(this).addClass('active');
		if(type==false){
			if(r==1){
				choose = 3;
			}else if(r==2){
				choose = 4;
			}else if(r==3){
				choose = 5;
			}else if(r==4){
				choose = 6;
			}else{
				choose = 7;
			};
		}else{
			if(r==1){
				choose = 10;
			}else if(r==2){
				choose = 11;
			}else if(r==3){
				choose = 12;
			}else if(r==4){
				choose = 13;
			}else{
				choose = 14;
			};
		}
		view(datas, type, choose)
	});

	function view(data, type, choose){
		var rkap = act = actbl = actyl = rkap1 = rkap2 = rkap3 = rkap4 = rkap5 = act1 = act2 = act3 = act4 = act5 = 0;
		var actmomval = actyoyval = actmom = actyoy = persen1 = persen2 = persen3 = persen4 = persen5 = '0%';
		var pembagi=1000000;
		if(todate){
			if(type==false){
				rkap1 = data[3].val6/1000000;
				rkap2 = data[4].val6/1000000;
				rkap3 = data[5].val6/1000000;
				rkap4 = data[6].val6/1000000;
				rkap5 = data[7].val6/1000000;

				act1 = data[3].val7/1000000;
				act2 = data[4].val7/1000000;
				act3 = data[5].val7/1000000;
				act4 = data[6].val7/1000000;
				act5 = data[7].val7/1000000;

				persen1 = data[3].val9;
				persen2 = data[4].val9;
				persen3 = data[5].val9;
				persen4 = data[6].val9;
				persen5 = data[7].val9;

				pembagi = 1000000;
			}else{
				rkap1 = data[10].val6/1000;
				rkap2 = data[11].val6/1000;
				rkap3 = data[12].val6/1000;
				rkap4 = data[13].val6/1000;
				rkap5 = data[14].val6/1000;

				act1 = data[10].val7/1000;
				act2 = data[11].val7/1000;
				act3 = data[12].val7/1000;
				act4 = data[13].val7/1000;
				act5 = data[14].val7/1000;

				persen1 = data[10].val9;
				persen2 = data[11].val9;
				persen3 = data[12].val9;
				persen4 = data[13].val9;
				persen5 = data[14].val9;

				pembagi = 1000;
			}

			if(choose==2||choose==8){
				act = act2;
			}else{
				act = data[choose].val7/pembagi;
			}

			actmom = data[choose].val12;
			actyoy = data[choose].val10;

			actmomval = data[choose].val11/pembagi;
			actyoyval = data[choose].val3/pembagi;

		}else{
			if(type==false){
				rkap1 = data[3].val1/1000000;
				rkap2 = data[4].val1/1000000;
				rkap3 = data[5].val1/1000000;
				rkap4 = data[6].val1/1000000;
				rkap5 = data[7].val1/1000000;

				act1 = data[3].val2/1000000;
				act2 = data[4].val2/1000000;
				act3 = data[5].val2/1000000;
				act4 = data[6].val2/1000000;
				act5 = data[7].val2/1000000;

				persen1 = data[3].val4;
				persen2 = data[4].val4;
				persen3 = data[5].val4;
				persen4 = data[6].val4;
				persen5 = data[7].val4;

				pembagi = 1000000;
			}else{
				rkap1 = data[10].val1/1000;
				rkap2 = data[11].val1/1000;
				rkap3 = data[12].val1/1000;
				rkap4 = data[13].val1/1000;
				rkap5 = data[14].val1/1000;

				act1 = data[10].val2/1000;
				act2 = data[11].val2/1000;
				act3 = data[12].val2/1000;
				act4 = data[13].val2/1000;
				act5 = data[14].val2/1000;

				persen1 = data[10].val4;
				persen2 = data[11].val4;
				persen3 = data[12].val4;
				persen4 = data[13].val4;
				persen5 = data[14].val4;
				
				pembagi = 1000;
			}
			
			if(choose==2||choose==8){
				act = act2;
			}else{
				act = data[choose].val2/pembagi;
			}

			actmom = data[choose].val12;
			actyoy = data[choose].val5;

			actmomval = data[choose].val11/pembagi;
			actyoyval = data[choose].val3/pembagi;

		}

		$(".aktualisasi").html(numberFormat(act));

		$(".MoM").html(actmom);
		$(".YoY").html(actyoy);

		$(".valMoM").html(numberFormat(actmomval));
		$(".valYoY").html(numberFormat(actyoyval));

		$(".rkap1").html(numberFormat(rkap1));
		$(".rkap2").html(numberFormat(rkap2));
		$(".rkap3").html(numberFormat(rkap3));
		$(".rkap4").html(numberFormat(rkap4));
		$(".rkap5").html(numberFormat(rkap5));

		$(".actual1").html(numberFormat(act1));
		$(".actual2").html(numberFormat(act2));
		$(".actual3").html(numberFormat(act3));
		$(".actual4").html(numberFormat(act4));
		$(".actual5").html(numberFormat(act5));

		$(".persen1").html(persen1);
		$(".persen2").html(persen2);
		$(".persen3").html(persen3);
		$(".persen4").html(persen4);
		$(".persen5").html(persen5);

		chart(rkap1, rkap2, rkap3, rkap4, rkap5, act1, act2, act3, act4, act5);
		$(".loading_overlay").addClass("opacity-on");

		highlight_chart(type, choose);
	}

	function chartShow(act, rkap, act_last){
		var selmonth = bulan-1;
		var month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
		var viewMonth = [];
		for(var i=selmonth+1;i<12;i++){
			viewMonth.push(month[i]+' '+(tahun-1));
		}
		for(var i=0;i<=selmonth;i++){
			viewMonth.push(month[i]+' '+tahun);
		};

		var chart = new Highcharts.Chart({
			chart: {
	            renderTo: 'income11',
	            backgroundColor: 'rgba(0, 255, 0, 0)'
	        },
		    xAxis: {
		        categories: viewMonth
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
		    	shared:true,
		        formatter: function(e){
		            var n = this.points[2].y;
		            var s = this.points[0].y;
		            var l = this.points[1].y;
		            return '<b>RKAP:</b> '+numberFormat(n)+'<br><b>Actual:</b> '+numberFormat(s)+'<br><b>Last year Actual:</b> '+numberFormat(l);
	            }
		    },
		    plotOptions: {
	            column: {
	                dataLabels: {
	                    enabled: true,
	                    formatter: function () {
					        return numberFormat(this.y,0);
					    },
					    style:{
	                        fontSize: 8
	                    }
	                }
	            }
	        },
		    legend: {
		        enabled: true
		    },
	        series: [{
	        	type:'column',
		        name: 'Actual',
		        color: '#0db7fb',
		        data: act,
		        pointPadding: 0.4,
		        pointPlacement: 0,
		        pointWidth: 30
		    },{
	        	type:'column',
		        name: 'last year Actual',
		        color: '#b7b7b7',
		        data: act_last,
		        pointPadding: 0.3,
		        pointPlacement: 0,
		        pointWidth: 26
		    },{
	        	type:'spline',
		        name: 'RKAP',
		        color: '#083d7c',
		        data: rkap,
		        pointPadding: 0.3,
		        pointPlacement: 0,
		        pointWidth: 26
		    }]
	    });
	}

	function highlight_chart(type, choose){
		var sel ="perton";
		var pembagi =1000;
		if(type==false){
			sel ="total";
			pembagi =1000000;
		}

		var rkap=[];
		var act=[];
		var act_last=[];

		var choosed;
		if(choose==3 || choose==10){
			choosed = 1;
        }else if(choose==4 || choose==11){
			choosed = 2;
        }else if(choose==5 || choose==12){
			choosed = 3;
        }else if(choose==6 || choose==13){
			choosed = 4;
        }else if(choose==7 || choose==14){
			choosed = 5	;
        }

		var chartdata = sessionStorage.getItem(choosed+tahun+bulan+opco);
		if(chartdata){
			var data = JSON.parse(chartdata);
			for(var i=0;i<12;i++){
				if(todate){
					rkap.push(data[sel][i][0].val6/pembagi);
					act.push(data[sel][i][0].val7/pembagi);
					act_last.push(data[sel][i][0].val8/pembagi);
				}else{
					rkap.push(data[sel][i][0].val1/pembagi);
					act.push(data[sel][i][0].val2/pembagi);
					act_last.push(data[sel][i][0].val3/pembagi);
				}
			}
			chartShow(act, rkap, act_last);
		}else{
			$("#income11").html('<div class="loader" style="margin:5% auto;"></div');
			$.getJSON(base_url+"Finance_report/monthly/tampil?cat="+choose+"&year="+tahun+"&month="+bulan+"&comp="+opco+"&etipe="+etype, function(data){
				sessionStorage.setItem(choosed+tahun+bulan+opco, JSON.stringify(data));
				for(var i=0;i<12;i++){
					if(todate){
						rkap.push(data[sel][i][0].val6/pembagi);
						act.push(data[sel][i][0].val7/pembagi);
						act_last.push(data[sel][i][0].val8/pembagi);
					}else{
						rkap.push(data[sel][i][0].val1/pembagi);
						act.push(data[sel][i][0].val2/pembagi);
						act_last.push(data[sel][i][0].val3/pembagi);
					}
				}
				chartShow(act, rkap, act_last)
			});
		}
	}

	function chart(rkap1, rkap2, rkap3, rkap4, rkap5, act1, act2, act3, act4, act5){
		Highcharts.setOptions({
		    chart: {
		      	backgroundColor: 'rgba(0, 255, 0, 0)'
			},
		    title: {
		        text: ''
		    },
		    xAxis: {
		        categories: [],
		    },
		    yAxis: [{
		        title: {
		            text: null
		        }
		    }],
		    legend: {
		        shadow: false
		    },
		    credits: {
		        enabled: false
		    },
				exporting: {
		        enabled: false
		    },
		    tooltip: {
		    	shared:true,
		        formatter: function(e){
		            var n = this.points[0].y;
		            var s = this.points[1].y;
		            return '<b>RKAP:</b> '+numberFormat(n)+'<br><b>Actual:</b> '+numberFormat(s);
	            }
		    },
		    legend: {
		        enabled: false
		    },
		    credits: {
		        enabled: false
		    }
		    
		});

		var chart1 = new Highcharts.Chart({
			chart: {
	            renderTo: 'income1',
	            type: 'bar'
	        },
	        plotOptions: {
		        bar: {
		            grouping: false,
		            shadow: false,
		            borderWidth: 0
		        }
		    },
	        series: [{
		        name: 'RKAP',
		        color: '#083d7c',
		        data: [rkap1],
		        pointPadding: 0.3,
		        pointPlacement: 0,
		        pointWidth: 26
		    }, {
		        name: 'Actual',
		        color: '#0db7fb',
		        data: [act1],
		        pointPadding: 0.4,
		        pointPlacement: 0,
		        pointWidth: 16
		    }]
	    });
		var chart2 = new Highcharts.Chart({
			chart: {
	            renderTo: 'income2',
	            type: 'bar'
	        },
	        plotOptions: {
		        bar: {
		            grouping: false,
		            shadow: false,
		            borderWidth: 0
		        }
		    },
	        series: [{
		        name: 'RKAP',
		        color: '#083d7c',
		        data: [rkap2],
		        pointPadding: 0.3,
		        pointPlacement: 0,
		        pointWidth: 26
		    }, {
		        name: 'Actual',
		        color: '#0db7fb',
		        data: [act2],
		        pointPadding: 0.4,
		        pointPlacement: 0,
		        pointWidth: 16
		    }]
	    });
		var chart3 = new Highcharts.Chart({
			chart: {
	            renderTo: 'income3',
	            type: 'bar'
	        },
	        plotOptions: {
		        bar: {
		            grouping: false,
		            shadow: false,
		            borderWidth: 0
		        }
		    },
	        series: [{
		        name: 'RKAP',
		        color: '#083d7c',
		        data: [rkap3],
		        pointPadding: 0.3,
		        pointPlacement: 0,
		        pointWidth: 26
		    }, {
		        name: 'Actual',
		        color: '#0db7fb',
		        data: [act3],
		        pointPadding: 0.4,
		        pointPlacement: 0,
		        pointWidth: 16
		    }]
	    });
		var chart4 = new Highcharts.Chart({
			chart: {
	            renderTo: 'income4',
	            type: 'bar'
	        },
	        plotOptions: {
		        bar: {
		            grouping: false,
		            shadow: false,
		            borderWidth: 0
		        }
		    },
	        series: [{
		        name: 'RKAP',
		        color: '#083d7c',
		        data: [rkap4],
		        pointPadding: 0.3,
		        pointPlacement: 0,
		        pointWidth: 26
		    }, {
		        name: 'Actual',
		        color: '#0db7fb',
		        data: [act4],
		        pointPadding: 0.4,
		        pointPlacement: 0,
		        pointWidth: 16
		    }]
	    });
		var chart5 = new Highcharts.Chart({
			chart: {
	            renderTo: 'income5',
	            type: 'bar'
	        },
	        plotOptions: {
		        bar: {
		            grouping: false,
		            shadow: false,
		            borderWidth: 0
		        }
		    },
	        series: [{
		        name: 'RKAP',
		        color: '#083d7c',
		        data: [rkap5],
		        pointPadding: 0.3,
		        pointPlacement: 0,
		        pointWidth: 26
		    }, {
		        name: 'Actual',
		        color: '#0db7fb',
		        data: [act5],
		        pointPadding: 0.4,
		        pointPlacement: 0,
		        pointWidth: 16
		    }]
	    });
	}
});

