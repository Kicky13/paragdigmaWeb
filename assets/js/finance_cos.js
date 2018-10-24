
	var base_url = "http://10.15.5.150/dev/DashboardBOD/";
	// var base_url = "http://eis.semenindonesia.com/";

	var datas = [];
	var plant;
	var type = false;
	var choose = 3;
	var todate = false;
	var bulan = $('#month').val();
	var tahun = $('#year').val();
	var opco = $('#opco').val();
	var material;

	$(document).ready(function(){
		bulan = $('#month').val();
		tahun = $('#year').val();
		opco = $('#opco').val();
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
		material = $('#material').val()
		loadData(bulan, tahun, opco);
	});

	$.getJSON(base_url+"cost_sheet/get_material?company="+opco, function(data){
       	var opt_material;
        for(var i=0;i<data.length;i++){
        	opt_material += '<option value="' + data[i].MATERIAL + '" "' + ((i==0)?"selected='selected'":"") + '">' + data[i].DESCRIPTION + '</option>';
        }
        $('#material').html(opt_material);
        material = $('#material').val();
        loadData(bulan, tahun, opco, material);
	});

	function loadData(){
		if(bulan<=9){
			bulan = '0'+bulan;
		}else{
			bulan = bulan;
		};

		$.getJSON(base_url+"cost_sheet/get_data?ecat=BUD&ecomp="+opco+"&emat="+material+"&eyear="+tahun+"."+bulan, function(data_detail){
			view(data_detail);
			$(".loading_overlay").addClass("opacity-on");
		});
		$.getJSON(base_url+"cost_sheet/get_column?company="+opco+"&material="+material, function(data_plant){
	        plant=data_plant;
		});
	};

	function view(data){
		chartShow('1', '2', '3');
		// if(type==false){

		// }else{

		// }
		

	    console.log(data);
		var table="";
		for(var i=0;i<plant.length;i++){
			table+="<tr>"
				table+="<td>"+plant[i].DESCRIPTION+"</td>"
				table+="<td>0</td>"
				table+="<td>0</td>"
				table+="<td>0</td>"
				table+="<td>0</td>"
			table+="</tr>"
		}

		console.log(table);
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
		var datacv=[];
		var datacf=[];
		plants=[];
		for(var i=0;i<plant.length;i++){
			plants.push(plant[i].DESCRIPTION);
			datacv.push(i);
			datacf.push(i);
		}
		console.log(datacv);
		var chart = new Highcharts.Chart({
			chart: {
	            renderTo: 'corchart',
	            backgroundColor: 'rgba(0, 255, 0, 0)'
	        },
		    xAxis: {
		        categories:plants
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
		            var s = this.points[0].y;
		            var l = this.points[1].y;
		            return '<b>Cost Variable:</b> '+s+'<br><b>Cost Fixed:</b> '+l
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
		        name: 'Cost Variable',
		        color: '#0db7fb',
		        data: datacv
		    },{
	        	type:'column',
		        name: 'Cost Fixed',
		        color: '#b7b7b7',
		        data: datacf
		    }]
	    });
	}
