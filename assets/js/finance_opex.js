// $(document).ready(function(){
	// var base_url = "http://eis.semenindonesia.com/";
	var base_url = "http://10.15.5.150/dev/DashboardBOD/";

	var datas_act = [];
	var datas_act_last = [];
	var datas_bud = [];

	var chartdata_act;
	var chartdata_bud;
	var chartdata_act_last;

	var choose = true;

	var bulan = $('#month').val();
	var tahun = $('#year').val();
	var opco = $('#opco').val();
	var etype="";
	if(opco==7000){
		etype=false;
	};

	var chooseItem = [];
	var chooseItem2 = [];

	function numberFormat(x) {
	    return parseFloat(x).toFixed(0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
	}

	function numberToString(x) {
		var mystring = ""+x;
	    return mystring.replace(/,/g , "");
	}

	$(document).ready(function(){
		bulan = $('#month').val();
		tahun = $('#year').val();
		opco = $('#opco').val();
		loadData(bulan, tahun, opco);
	}); 
	
	$('.find').click(function(){
		$(".loading_overlay").removeClass("opacity-on");
		bulan = $('#month').val();
		tahun = $('#year').val();
		opco = $('#opco').val();
		loadData(bulan, tahun, opco);
	});

	function loadData(bulan, tahun, opco){
		$("#opexchart").html('<div class="loader" style="margin:40% auto;"></div>');
		if(bulan<=9){
			bulan = '0'+bulan;
		}else{
			bulan = bulan;
		};

		var tahunlalu=tahun-1;
		$.getJSON(base_url+"Opex/get_data?time="+tahun+"."+bulan+"&comp="+opco+"&cat=ACT", function(data_act){
			$.getJSON(base_url+"Opex/get_data?time="+tahun+"."+bulan+"&comp="+opco+"&cat=BUD", function(data_bud){
				$.getJSON(base_url+"Opex/get_data?time="+tahunlalu+"."+bulan+"&comp="+opco+"&cat=ACT", function(data_act_last){
					datas_act=data_act;
					datas_act_last=data_act_last;
					datas_bud=data_bud;
					view(datas_act, datas_bud, datas_act_last, choose);
					$(".loading_overlay").addClass("opacity-on");
				});
			});
		});
		
		$.getJSON(base_url+"Opex/get_data_monthly?cat=ACT&time="+tahun+"."+bulan+"&comp="+opco, function(data_act){
			sessionStorage.setItem("opexact"+tahun+bulan+opco, JSON.stringify(data_act));
			$.getJSON(base_url+"Opex/get_data_monthly?cat=BUD&time="+tahun+"."+bulan+"&comp="+opco, function(data_bud){
				sessionStorage.setItem("opexbud"+tahun+bulan+opco, JSON.stringify(data_bud));
				$.getJSON(base_url+"Opex/get_data_monthly?cat=ACT&time="+tahunlalu+"."+bulan+"&comp="+opco, function(data_act_last){
					sessionStorage.setItem("opexactlast"+tahun+bulan+opco, JSON.stringify(data_act_last));
					chartdata_act = sessionStorage.getItem("opexact"+tahun+bulan+opco);
					chartdata_bud = sessionStorage.getItem("opexbud"+tahun+bulan+opco);
					chartdata_act_last = sessionStorage.getItem("opexactlast"+tahun+bulan+opco);
					chartShow(25);
				});
			});
		});

	};

	var satuan = 'Actual <font size="1" weight="normal" color="#083d7c">(in IDR Mio)</font>';
	$(".actual_title").html(satuan);

	$(".block").click(function(){
		var r = $(this).attr('rel');
		var title = $(this).data('name');
		$(".tittle_head").html(title);
		$(".block").removeClass('active');
		$(this).addClass('active');
		if(r==1){
			choose=true;
			chartShow(25);
		}else{
			choose=false;
			chartShow(36);
		}
		view(datas_act, datas_bud, datas_act_last, choose);
	});

	function view(data_act, data_bud, data_act_last, choose){
		var table = table_title = side_head1 = side_head2 = side_head3 = "";

		var act1 = numberToString(data_act[26].JUMLAH);
		var act2 = numberToString(data_act[37].JUMLAH);
		var rkap1 = numberToString(data_bud[26].JUMLAH);
		var rkap2 = numberToString(data_bud[37].JUMLAH);

		var persen1 = parseFloat((rkap1/act1)*100).toFixed(2);
		var persen2 = parseFloat((rkap2/act2)*100).toFixed(2);

		$(".bottom_actual[rel=1]").html(numberFormat(act1/1000000));
		$(".bottom_actual[rel=2]").html(numberFormat(act2/1000000));

		$(".bottom_rkap[rel=1]").html(numberFormat(rkap1/1000000));
		$(".bottom_rkap[rel=2]").html(numberFormat(rkap2/1000000));

		$(".side_persen[rel=1]").html(persen1+"%");
		$(".side_persen[rel=2]").html(persen2+"%");
		
		$('.side_head1').html("RKAP "+tahun);
		$('.side_head2').html("REAL "+tahun);
		$('.side_head3').html("REAL "+(tahun-1));

		var awal = 29;
		var akhir = 36;
		if(choose){
			awal = 18;
			akhir = 25;
		}

		var idx=0;
		chooseItem = []
		chooseItem2 = []
		for(var i=awal;i<=akhir;i++){
			var bud_side = numberToString(data_bud[i].JUMLAH);
			var act_side = numberToString(data_act[i].JUMLAH);
			var act_last_side = numberToString(data_act_last[i].JUMLAH);
			var persen_side = (bud_side/act_side)*100;
			table+="<tr><td><a data-toggle='modal' data-target='#detailModal' onclick='showdetail("+i+", "+idx+")''>"+data_bud[i].DESCRIPTION+"</a></td><td align='right'>"+numberFormat(bud_side)+"</td><td align='right'>"+numberFormat(act_side)+"</td><td align='right'>"+numberFormat(act_last_side)+"</td><td align='center'>"+persen_side+"</td><td align='center'><i data-toggle='modal' data-target='#detailModalChart' onclick='showChartDetail("+i+", "+idx+")' class='fa fa-bar-chart' aria-hidden='true'></i></td></tr>";
			chooseItem.push("<a class='dropdown-item' onclick='showdetail("+i+", "+idx+")'>"+data_bud[i].DESCRIPTION+"</a>");
			chooseItem2.push("<a class='dropdown-item' onclick='showChartDetail("+i+", "+idx+")'>"+data_bud[i].DESCRIPTION+"</a>");
			idx++;
		};

		$('.side_desc tbody').html(table);
	}


	$('.swicth-cs button').click(function(){
		var r=$(this).attr('rel');
		$('.modal-body > div').css({'display':'none'});
		$('.modal-body .table'+r).css({'display':'block'});
		$('.swicth-cs button').removeClass('active');
		$(this).addClass('active');
	});

	var datatable1 = $('.detailCor1').DataTable({
		"language": {
		  "emptyTable": "No data available"
		},
		"columnDefs": [
			{ "width": "5%", "targets": 0 },
			{ "width": "15%", "targets": 1 },
			{ "width": "25%", "targets": 2 },
			{ "width": "15%", "targets": 3 },
			{ "width": "25%", "targets": 4 },
			{ "width": "15%", "targets": 5 },
		],
		"fixedColumns": false,
		"scrollY": "350px", 
		"scrollCollapse": true,
		"searching":true,
		"bLengthChange": false,
		"info": false,
		"paging":false
	});

	var datatable2 = $('.detailCor2').DataTable({
		"language": {
		  "emptyTable": "No data available"
		},
		"columnDefs": [
			{ "width": "5%", "targets": 0 },
			{ "width": "15%", "targets": 1 },
			{ "width": "25%", "targets": 2 },
			{ "width": "15%", "targets": 3 },
			{ "width": "25%", "targets": 4 },
			{ "width": "15%", "targets": 5 },
		],
		"fixedColumns": false,
		"scrollY": "350px", 
		"scrollCollapse": true,
		"searching":true,
		"bLengthChange": false,
		"info": false,
		"paging":false
	});

	function chartShowDetail(act, rkap, act_last){
		
		var selmonth = bulan-1;
		var month = ['Jan', 'Feb', 'March', 'Apr', 'Mey', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
		var viewMonth = [];
		for(var i=selmonth+1;i<12;i++){
			viewMonth.push(month[i]+' '+(tahun-1));
		}
		for(var i=0;i<=selmonth;i++){
			viewMonth.push(month[i]+' '+tahun);
		};

		var chart = new Highcharts.Chart({
			chart: {
	            renderTo: 'corchartdetail',
	            backgroundColor: 'rgba(0, 255, 0, 0)'
	        },
		    xAxis: {
		        categories: viewMonth
		    },
		    title: {
		        text: ''
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
		    credits: {
		        enabled: false
		    },
				exporting: {
		        enabled: false
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
		        pointWidth: 15
		    },{
	        	type:'column',
		        name: 'Last year Actual',
		        color: '#b7b7b7',
		        data: act_last,
		        pointPadding: 0.4,
		        pointPlacement: 0,
		        pointWidth: 15
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

	function showChartDetail(index, idx){
		var selopt='';
		for(var i=0;i<chooseItem2.length;i++){
			selopt+=chooseItem2[i];
		}

		$('.selgl').html(selopt);
		$('#dropdownMenuButton2').html(chooseItem2[idx]);
		$('#dropdownMenuButton2 .dropdown-item').removeAttr('onclick');

		if(bulan<=9){
			bulan = '0'+bulan;
		}else{
			bulan = bulan;
		};

		$('.swicth-cs button').removeClass('active');
		$('.swicth-cs button:first-child').addClass('active');
		$('.modal-body > div').css({'display':'block'});

		var rkap =[];
		var act =[];
		var act_last =[];
		$("#corchartdetail").html('<div class="loader" style="margin:8% auto;"></div');
		if(chartdata_act && chartdata_bud && chartdata_act_last){
			var data_act_last = JSON.parse(chartdata_act_last);
			var data_act = JSON.parse(chartdata_act);
			var data_bud = JSON.parse(chartdata_bud);
			for(var i=0;i<12;i++){
				rkap.push(numberToString(data_bud[i][index].JUMLAH)/1000000);
				act.push(numberToString(data_act[i][index].JUMLAH)/1000000);
				act_last.push(numberToString(data_act_last[i][index].JUMLAH)/1000000);
			}
			chartShowDetail(act, rkap, act_last);
		}
	}

	function showdetail(index, idx){
		datatable1.clear();
		datatable2.clear();
		$('.modal-body .table2').css({'height':'0', 'overflow':'hidden'});
		$('.detailCor1 tbody').html('<tr style="background:transparent;"><td colspan="6"><div class="loader" style="margin:10% auto;"></div></td></tr>');
		$('.detailCor2 tbody').html('<tr style="background:transparent;"><td colspan="6"><div class="loader" style="margin:10% auto;"></div></td></tr>');

		var selopt='';
		for(var i=0;i<chooseItem.length;i++){
			selopt+=chooseItem[i];
		}

		$('.selgl').html(selopt);
		$('#dropdownMenuButton').html(chooseItem[idx]);
		$('#dropdownMenuButton .dropdown-item').removeAttr('onclick');

		if(bulan<=9){
			bulan = '0'+bulan;
		}else{
			bulan = bulan;
		};

		$('.swicth-cs button').removeClass('active');
		$('.swicth-cs button:first-child').addClass('active');
		$('.modal-body > div').css({'display':'block'});
		$.getJSON(base_url+"Cost_of_revenue/get_detail?time="+tahun+"."+bulan+"&cat=ACT&comp="+opco+"&index="+index+"&group=1&account=COGS_SM&cek=GCEMENT", function(data){
			var datarows = data.rows;
			for(var i=0;i<datarows.length;i++){
				datatable1.row.add([(i+1), datarows[i].COSTCENTER, datarows[i].DESCRIPTION1, datarows[i].GL_ACCOUNT, datarows[i].DESCRIPTION2, datarows[i].NILAI]).draw();
			}
			datatable1.columns.adjust().draw();
		});
		$.getJSON(base_url+"Cost_of_revenue/get_detail_nc?time="+tahun+"."+bulan+"&cat=ACT&comp="+opco+"&index="+index+"", function(data){
			var datarows = data.rows;
			for(var i=0;i<datarows.length;i++){
				datatable2.row.add([(i+1), datarows[i].COSTCENTER, datarows[i].DESCRIPTION1, datarows[i].GL_ACCOUNT, datarows[i].DESCRIPTION2, datarows[i].NILAI]).draw();
			}
			datatable2.columns.adjust().draw();
			$('.modal-body .table2').css({'display':'none'});
			$('.modal-body .table2').css({'height':'auto', 'overflow':'auto'});
		});
	}

	function chartShow(akhir){
		var rkap =[];
		var act =[];
		var act_last =[];
		if(chartdata_act && chartdata_bud && chartdata_act_last){
			var data_act_last = JSON.parse(chartdata_act_last);
			var data_act = JSON.parse(chartdata_act);
			var data_bud = JSON.parse(chartdata_bud);
			for(var i=0;i<12;i++){
				rkap.push(numberToString(data_bud[i][akhir+1].JUMLAH)/1000000);
				act.push(numberToString(data_act[i][akhir+1].JUMLAH)/1000000);
				act_last.push(numberToString(data_act_last[i][akhir+1].JUMLAH)/1000000);
			}
			var selmonth = bulan-1;
			var month = ['Jan', 'Feb', 'March', 'Apr', 'Mey', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
			var viewMonth = [];
			for(var i=selmonth+1;i<12;i++){
				viewMonth.push(month[i]+' '+(tahun-1));
			}
			for(var i=0;i<=selmonth;i++){
				viewMonth.push(month[i]+' '+tahun);
			};

			var chart = new Highcharts.Chart({
				chart: {
		            renderTo: 'opexchartz',
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
			    plotOptions: {
		            bar: {
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
		        tooltip: {
			    	shared:true,
			        formatter: function(e){
			            var n = this.points[2].y;
			            var s = this.points[0].y;
			            var l = this.points[1].y;
			            return '<b>RKAP:</b> '+numberFormat(n)+'<br><b>Actual:</b> '+numberFormat(s)+'<br><b>Last year Actual:</b> '+numberFormat(l);
		            }
			    },
			    legend: {
			        enabled: true
			    },
		        series: [{
		        	type:'bar',
			        name: 'Actual',
			        color: '#0db7fb',
			        data: act,
			        pointWidth: 8
			    },{
		        	type:'bar',
			        name: 'last year Actual',
			        color: '#b7b7b7',
			        data: act_last,
			        pointWidth: 8
			    },{
		        	type:'bar',
			        name: 'RKAP',
			        color: '#083d7c',
			        data: rkap,
			        pointWidth: 8
			    }]
		    });
		}
	}
// });
