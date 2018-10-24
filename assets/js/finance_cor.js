
	var base_url = "http://10.15.5.150/dev/DashboardBOD/";
	// var base_url = "http://eis.semenindonesia.com/";

	var datas = [];
	var type = false;
	var choose = 3;
	var todate = false;
	var bulan = $('#month').val();
	var tahun = $('#year').val();
	var opco = $('#opco').val();

	$(document).ready(function(){
		bulan = $('#month').val();
		tahun = $('#year').val();
		opco = $('#opco').val();
		loadData(bulan, tahun, opco);
	}); 
	
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

	$('.find').click(function(){
		$(".loading_overlay").removeClass("opacity-on");
		bulan = $('#month').val();
		tahun = $('#year').val();
		opco = $('#opco').val();
		loadData(bulan, tahun, opco);
	});

	function loadData(bulan, tahun, opco){
		if(bulan<=9){
			bulan = '0'+bulan;
		}else{
			bulan = bulan;
		};

		$.getJSON(base_url+"Cost_of_revenue/get_data?year="+tahun+"&month="+bulan+"&comp="+opco, function(data){
			datas = data.rows;
			view(datas, type, choose);
			$(".loading_overlay").addClass("opacity-on");
		});

	};

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

		var index_=1;

		var rkap = act = actbl = actyl = rkap1 = rkap2 = rkap3 = rkap4 = rkap5 = act1 = act2 = act3 = act4 = act5 = 0;
		var actmom = actyoy = persen1 = persen2 = persen3 = persen4 = persen5 = persenyoy1 = persenyoy2 = persenyoy3 = '0%';
		var pembagi=1000000;
		var table = table_title = side_head1 = side_head2 = side_head3 = "";

		var awal = 6;
		var akhir = 19;
		var hide = 15;

		if(todate){
			if(type==false){
				rkap = data[20].BUD2;
				rkap1 = data[1].BUD2;
				rkap2 = data[2].BUD2;
				rkap3 = data[3].BUD2;

				act = data[20].ACT2;
				act1 = data[1].ACT2;
				act2 = data[2].ACT2;
				act3 = data[3].ACT2;

				persen = data[20].PERSEN2;
				persen_yoy = data[20].PERSEN12;
				persen1 = data[1].PERSEN2;
				persen2 = data[2].PERSEN2;
				persen3 = data[3].PERSEN2;

				persenyoy1 = data[1].PERSEN22;
				persenyoy2 = data[2].PERSEN22;
				persenyoy3 = data[3].PERSEN22;

				pembagi = 1000000;
			}else{
				awal = 47;
				akhir = 60;
				hide = 56;

				rkap = data[61].BUD2;
				rkap1 = data[1].BUD2;
				rkap2 = data[2].BUD2;
				rkap3 = data[3].BUD2;

				act = data[61].ACT2;
				act1 = data[1].ACT2;
				act2 = data[2].ACT2;
				act3 = data[3].ACT2;

				persen = data[61].PERSEN2;
				persen_yoy = data[61].PERSEN12;
				persen1 = data[1].PERSEN2;
				persen2 = data[2].PERSEN2;
				persen3 = data[3].PERSEN2;
	 
				persenyoy1 = data[1].PERSEN22;
				persenyoy2 = data[2].PERSEN22;
				persenyoy3 = data[3].PERSEN22;
				
				pembagi = 1000;
			}
			
			actmom = 0;
			actyoy = persen_yoy;

			table_title = "UNTIL THIS MONTH";
			chooseItem = [];
			chooseItem2 = [];
			for(var i=awal;i<=akhir;i++){
				if(i!=hide){ 
					table+="<tr><td><a data-toggle='modal' data-target='#detailModal' onclick='showdetail("+index_+", "+idx+")'>"+data[i].GL_ACCOUNT+"</a></td><td align='right'>"+numberFormat(numberToString(data[i].BUD2))+"</td><td align='right'>"+numberFormat(numberToString(data[i].ACT2))+"</td><td align='right'>"+numberFormat(numberToString(data[i].ACT22))+"</td><td align='center'>"+data[i].PERSEN2+"</td><td align='center'><i data-toggle='modal' data-target='#detailModalChart' onclick='showChartDetail("+index_+", "+idx+")' class='fa fa-bar-chart' aria-hidden='true'></i></td></tr>";
					chooseItem.push("<a class='dropdown-item' onclick='showdetail("+index_+", "+idx+")'>"+data[i].GL_ACCOUNT+"</a>");
					chooseItem2.push("<a class='dropdown-item' onclick='showChartDetail("+index_+", "+idx+")'>"+data[i].GL_ACCOUNT+"</a>");
				}
				index_++;
			};

		}else{
			if(type==false){
				rkap = data[20].BUD1;
				rkap1 = data[1].BUD1;
				rkap2 = data[2].BUD1;
				rkap3 = data[3].BUD1;

				act = data[20].ACT1;
				act1 = data[1].ACT1;
				act2 = data[2].ACT1;
				act3 = data[3].ACT1;

				persen = data[20].PERSEN1;
				persen_yoy = data[20].PERSEN11;
				persen1 = data[1].PERSEN1;
				persen2 = data[2].PERSEN1;
				persen3 = data[3].PERSEN1;
				persenyoy1 = data[1].PERSEN11;
				persenyoy2 = data[2].PERSEN11;
				persenyoy3 = data[3].PERSEN11;

				pembagi = 1000000;
			}else{
				awal = 47;
				akhir = 60;
				hide = 56;

				rkap = data[61].BUD1;
				rkap1 = data[1].BUD1;
				rkap2 = data[2].BUD1;
				rkap3 = data[3].BUD1;

				act = data[61].ACT1;
				act1 = data[1].ACT1;
				act2 = data[2].ACT1;
				act3 = data[3].ACT1;

				persen = data[61].PERSEN1;
				persen_yoy = data[61].PERSEN11;
				persen1 = data[1].PERSEN1;
				persen2 = data[2].PERSEN1;
				persen3 = data[3].PERSEN1;

				persenyoy1 = data[1].PERSEN11;
				persenyoy2 = data[2].PERSEN11;
				persenyoy3 = data[3].PERSEN11;
				
				pembagi = 1000;
			}
			
			actmom = 0;
			actyoy = persen_yoy;

			table_title = "THIS MONTH";

			var idx=0;
			for(var i=awal;i<=akhir;i++){
				if(i!=hide){
					table+="<tr><td><a data-toggle='modal' data-target='#detailModal' onclick='showdetail("+index_+", "+idx+")''>"+data[i].GL_ACCOUNT+"</a></td><td align='right'>"+numberFormat(numberToString(data[i].BUD1))+"</td><td align='right'>"+numberFormat(numberToString(data[i].ACT1))+"</td><td align='right'>"+numberFormat(numberToString(data[i].ACT2))+"</td><td align='center'>"+data[i].PERSEN1+"</td><td align='center'><i data-toggle='modal' data-target='#detailModalChart' onclick='showChartDetail("+index_+", "+idx+")' class='fa fa-bar-chart' aria-hidden='true'></i></td></tr>";
					chooseItem.push("<a class='dropdown-item' onclick='showdetail("+index_+", "+idx+")'>"+data[i].GL_ACCOUNT+"</a>");
					chooseItem2.push("<a class='dropdown-item' onclick='showChartDetail("+index_+", "+idx+")'>"+data[i].GL_ACCOUNT+"</a>");
				}
				index_++;
				idx++;
			};
		}


		$(".aktualisasi").html(numberFormat(numberToString(act)/pembagi));
		$(".MoM").html(actmom);
		$(".YoY").html(actyoy);

		$(".bottom_clinker .bottom_actual").html(numberFormat(numberToString(act1)));
		$(".bottom_cement .bottom_actual").html(numberFormat(numberToString(act2)));
		$(".bottom_sales .bottom_actual").html(numberFormat(numberToString(act3)));

		$(".bottom_clinker .bottom_rkap").html(numberFormat(numberToString(rkap1)));
		$(".bottom_cement .bottom_rkap").html(numberFormat(numberToString(rkap2)));
		$(".bottom_sales .bottom_rkap").html(numberFormat(numberToString(rkap3)));

		$(".bottom_clinker .side_persen").html(persen1);
		$(".bottom_cement .side_persen").html(persen2);
		$(".bottom_sales .side_persen").html(persen3);

		$(".bottom_clinker .bottom_yoy").html(persenyoy1);
		$(".bottom_cement .bottom_yoy").html(persenyoy2);
		$(".bottom_sales .bottom_yoy").html(persenyoy3);
		
		$('.side_month').html(table_title);
		$('.side_head1').html("RKAP "+tahun);
		$('.side_head2').html("REAL "+tahun);
		$('.side_head3').html("REAL "+(tahun-1));
		$('.side_desc tbody').html(table);

		highlight_chart(type, choose);
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
		    credits: {
		        enabled: false
		    },
				exporting: {
		        enabled: false
		    },
		    legend: {
		        enabled: true
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
		        name: 'last year Actual',
		        color: '#b7b7b7',
		        data: act_last,
		        pointPadding: 0.3,
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

		var idx_title=idx;
		if(idx>8){
			idx_title=idx-1;
		}
		$('.selgl').html(selopt);
		$('#dropdownMenuButton2').html(chooseItem2[idx_title]);
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

		if(idx<=8){
			idx=idx+1;
		}else if(idx>=10){
			idx=idx+1;
		}
		var chartdata = sessionStorage.getItem("detailcor"+tahun+bulan+opco);
		if(chartdata){
			var data = JSON.parse(chartdata);
			console.log(data);
			for(var i=0;i<12;i++){
				if(todate){
					rkap.push(parseFloat(numberToString(data[i][idx].BUD1)/1000000));
					act.push(parseFloat(numberToString(data[i][idx].ACT1)/1000000));
					act_last.push(parseFloat(numberToString(data[i][idx].ACT11)/1000000));
				}else{
					rkap.push(parseFloat(numberToString(data[i][idx].BUD1)/1000000));
					act.push(parseFloat(numberToString(data[i][idx].ACT1)/1000000));
					act_last.push(parseFloat(numberToString(data[i][idx].ACT11)/1000000));
				}
			}
			chartShowDetail(act, rkap, act_last);
		}else{
			$("#corchartdetail").html('<div class="loader" style="margin:8% auto;"></div');
			$.getJSON(base_url+"Cost_of_revenue/data_trend?year="+tahun+"&month="+bulan+"&comp="+opco, function(data){
				sessionStorage.setItem("detailcor"+tahun+bulan+opco, JSON.stringify(data));
				for(var i=0;i<12;i++){
					if(todate){
						rkap.push(parseFloat(numberToString(data[i][idx].BUD1)/1000000));
						act.push(parseFloat(numberToString(data[i][idx].ACT1))/1000000);
						act_last.push(parseFloat(numberToString(data[i][idx].ACT11)/1000000));
					}else{
						rkap.push(parseFloat(numberToString(data[i][idx].BUD1)/1000000));
						act.push(parseFloat(numberToString(data[i][idx].ACT1)/1000000));
						act_last.push(parseFloat(numberToString(data[i][idx].ACT11)/1000000));
					}
				}
				chartShowDetail(act, rkap, act_last);
			});
		}
	}

	function showdetail(index, idx){

		if(idx>8){
			idx=idx-1;
		}
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
		$.getJSON(base_url+"Cost_of_revenue/get_detail?time="+tahun+"."+bulan+"&cat=ACT&comp="+opco+"&index="+index+"&group=3&account=COGS_SM&cek=GCEMENT", function(data){
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

	function chartShow(act, rkap, act_last){
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
	            renderTo: 'corchart',
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
		        pointWidth: 15
		    },{
	        	type:'column',
		        name: 'last year Actual',
		        color: '#b7b7b7',
		        data: act_last,
		        pointPadding: 0.3,
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

		var chartdata = sessionStorage.getItem("cor"+tahun+bulan+opco);
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
			chartShow(act, rkap);
		}else{
			$("#corchart").html('<div class="loader" style="margin:8% auto;"></div');
			$.getJSON(base_url+"Finance_report/monthly/tampil?cat=4&year="+tahun+"&month="+bulan+"&comp="+opco+"&etipe="+etype, function(data){
				sessionStorage.setItem("cor"+tahun+bulan+opco, JSON.stringify(data));
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
				chartShow(act, rkap)
			});
		}
	}
