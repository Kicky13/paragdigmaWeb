
var tmp = '';
function numberFormat(x) {
    return parseFloat(x).toFixed(0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}
function highlight(data){
	$('#cashonhand').html('');
	$('#cash').html('');
	$('#cashin').html('');
	$('#cashout').html('');

	$('#cashonhand').html(numberFormat(data.cashonhand/1000000));
	$('#cash').html(numberFormat(data.detail[0].value/1000000));
	$('#cashin').html(numberFormat(data.detail[1].value/1000000));
	$('#cashout').html(numberFormat(data.detail[2].value/1000000));
	// $('#last_update').html('Last Update : '+data[0].LAST_UPDATE);
	
}
var labelArrayDay = [];
function daysInMonth(month,year) {
    return new Date(year, month, 0).getDate();
}
function graphic_saldo(data){
	// var dataJson = JSON.parse(data);
	var saldo = [];
	
	for (var x=data.length-1;x>=0;x--) {
		saldo.push(parseFloat(data[x].cashonhand/1000000));
	}
	$('#trend1').highcharts({
		chart: {
			type: 'column',
			spacingBottom: 8,
			spacingTop: 8,
			spacingLeft: 5,
			spacingRight: 5,
			animation: Highcharts.svg
		},
		title: {
			text: ''
		},
		xAxis: {
			categories: labelArrayDay,
			tickInterval: 1,
			gridLineWidth: 1
		},
		yAxis: {
			title: {
				text: ''
			}
		},
		tooltip: {
			formatter: function () {
				var n = this.y;
				var s = this.series.name;
				var t = this.point.x + 1;
				return s + ' Tgl ' + t + ' :<br>' + setFormat(n, 0);
			}

		},
		exporting: {
			enabled: false
		},
		legend: {
			enabled: false,
			align: 'center',
		},
		credits: {
			enabled: false
		},
		plotOptions: {
			column: {
				grouping: false,
				shadow: false,
				borderWidth: 0
			}
		},
		series: [{
			type: 'spline',
			name: 'Saldo',
			color: '#337ab7',
			data : saldo,
		}]
	});
}

function graphic_in(data){
	var saldo = [];
	
	for (var x=data.length-1;x>=0;x--) {
		saldo.push(parseFloat(data[x].detail[2].value/1000000));
	}
	$('#trend2').highcharts({
		chart: {
			type: 'column',
			spacingBottom: 8,
			spacingTop: 8,
			spacingLeft: 5,
			spacingRight: 5,
			animation: Highcharts.svg
		},
		title: {
			text: ''
		},
		xAxis: {
			categories: labelArrayDay,
			tickInterval: 1,
			gridLineWidth: 1
		},
		yAxis: {
			title: {
				text: ''
			}
		},
		tooltip: {
			formatter: function () {
				var n = this.y;
				var s = this.series.name;
				var t = this.point.x + 1;
				return s + ' Tgl ' + t + ' :<br>' + setFormat(n, 0);
			}

		},
		exporting: {
			enabled: false
		},
		legend: {
			enabled: false,
			align: 'center',
		},
		credits: {
			enabled: false
		},
		plotOptions: {
			column: {
				grouping: false,
				shadow: false,
				borderWidth: 0
			}
		},
		series: [{
			type: 'spline',
			name: 'CASH OUT',
			color: '#D91E18',
			data : saldo,
		}]
	});
}

function graphic_out(data){
	var saldo = [];
	
	for (var x=data.length-1;x>=0;x--) {
		saldo.push(parseFloat(data[x].detail[1].value/1000000));
	}
	$('#trend3').highcharts({
		chart: {
			type: 'column',
			spacingBottom: 8,
			spacingTop: 8,
			spacingLeft: 5,
			spacingRight: 5,
			animation: Highcharts.svg
		},
		title: {
			text: ''
		},
		xAxis: {
			categories: labelArrayDay,
			tickInterval: 1,
			gridLineWidth: 1
		},
		yAxis: {
			title: {
				text: ''
			}
		},
		tooltip: {
			formatter: function () {
				var n = this.y;
				var s = this.series.name;
				var t = this.point.x + 1;
				return s + ' Tgl ' + t + ' :<br>' + setFormat(n, 0);
			}

		},
		exporting: {
			enabled: false
		},
		legend: {
			enabled: false,
			align: 'center',
		},
		credits: {
			enabled: false
		},
		plotOptions: {
			column: {
				grouping: false,
				shadow: false,
				borderWidth: 0
			}
		},
		series: [{
			type: 'spline',
			name: 'RECEIPT',
			color: '#92c758',
			data : saldo,
		}]
	});
}

function opcoGroup(selmonth, selyear, selcur, selopco){
    $(".loading_overlay").removeClass("opacity-on");
	var days = daysInMonth(selmonth,selyear);
	for (var x = 1; x <= days; x++) {
		if (x < 10) {
			var tgl = '0' + x;
		} else {
			var tgl = x;
		}
		labelArrayDay.push(tgl);
	}
	
    if(selmonth<=9){
        selmonth = '0'+selmonth;
    }else{
        selmonth = selmonth;
    };
	var base_url = "http://10.15.5.150/dev/DashboardBOD/";
	// var base_url = "http://eis.semenindonesia.com/";
	$.getJSON(base_url+'cash_position/get_data?comp='+selopco+'&cur='+selcur+'&month='+selmonth+'&year='+selyear,function (data) {
        $(".loading_overlay").addClass("opacity-on");
		highlight(data[0]);
		graphic_saldo(data);
		graphic_in(data);
		graphic_out(data);
	});
}

$('.find').click(function(){
    bulan = $('#month').val();
    tahun = $('#year').val();
    opco = $('#opco').val();
    sessionStorage.setItem("saveParam", JSON.stringify({bulan, tahun, opco}));
    opcoGroup(bulan, tahun, 'idr', opco);
});

$(document).ready(function(){
    var bulan = $('#month').val();
    var tahun = $('#year').val();
    var opco = $('#opco').val();
    opcoGroup(bulan, tahun, 'IDR', opco);
})
