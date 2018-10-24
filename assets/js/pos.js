function format_number(nominal){
	if((typeof nominal)=="string"){
		nominal = nominal.split(',').join('');
		nominal = parseFloat(nominal);
	}
	return nominal;
}
function numberFormat(x) {
    var nominal = parseFloat(x).toFixed(0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return nominal.replace(".","|").split(",").join('.').replace('|',',');
}

var color1 = ["","#007f01","#db3af9","#f04736","#1d8bc3","#98289f","#fd2892","#AD847A","#54323a","#653daf"];
var color2 = ["","#007f01","#db3af9","#f04736","#1d8bc3","#98289f","#fd2892","#AD847A","#54323a","#653daf"];
function salesArea(data){

	var label=[];
	var semen= [];
	var semenx= [];
	var tota_sales_prod=[];
	// semen = [
				// {"name":"SEMEN PPC ZAK 40KG","color": "#f04736","data":[], "total":[]}, 
				// {"name":"SEMEN PUTIH ZAK 40 KG","color": "#db3af9","data":[], "total":[]}, 
				// {"name":"SEMEN PPC ZAK 50KG","color": "#007f01","data":[], "total":[]}, 
				// {"name":"SEMEN PCC ZAK 40KG","color": "#1d8bc3","data":[], "total":[]}, 
			// ];
	
	// var itemsemen = ["SEMEN PPC ZAK 40KG","SEMEN PUTIH ZAK 40 KG","SEMEN PPC ZAK 50KG","SEMEN PCC ZAK 40KG"];
	for(var a=0; a<data.NAMA_PRODUK.length;a++){
		if(data.NAMA_PRODUK[a]){
			var item = {"name":data.NAMA_PRODUK[a],"color": color1[a],"data":[], "total":[]};
			semen.push(item);
		}
	}
	for(var a=0; a<semen.length;a++){
		semenx.push(semen[a]);
	}
	for(var i=0; i<data.DATA.length;i++){
		label.push("AREA "+data.DATA[i].AREA);
		for(var a=0; a<semenx.length;a++){
			var item = 0;
			for(b=0;b<data.DATA[i].DATA_PER_AREA.length;b++){
				if(semenx[a].name==data.DATA[i].DATA_PER_AREA[b].NAMA_PRODUK){
					item = data.DATA[i].DATA_PER_AREA[b].TOTAL_PENJUALAN;
				}
			}
			semenx[a].data.push(item);
		}
	}
	for(var j=0; j<semenx.length;j++){
		var total = 0;
		for(var y=0; y<semenx[j].data.length;y++){
			total += semenx[j].data[y];
		}
		semenx[j].total.push(total);
	}

	$('#salesArea').highcharts({
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
			categories: label
		},
		yAxis: {
			title: {
				text: ''
			}
		},
        credits: {
			enabled: false
		},
		exporting: {
			enabled: false
		},
		legend: {
			enabled: true,
			labelFormatter: function () {
	            return this.name+' ('+numberFormat(this.userOptions.total[0])+' Zak)';
	        }
		},
		tooltip: {
			headerFormat: '<b>{point.x}</b><br/>',
			pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal} Zak'
		},
		plotOptions: {
			column: {
				stacking: 'normal',
				dataLabels: {
					enabled: true,
					color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
				}
			}
		},
		series: semenx
	});
	
}
function salesDistributor(data){
	var label=[];
	var semen= [];
	var semenx= [];
	// semen = [
		// {"name":"SEMEN PPC ZAK 40KG","color": "#f04736","data":[], "total":[]}, 
		// {"name":"SEMEN PUTIH ZAK 40 KG","color": "#db3af9","data":[], "total":[]}, 
		// {"name":"SEMEN PPC ZAK 50KG","color": "#007f01","data":[], "total":[]}, 
		// {"name":"SEMEN PCC ZAK 40KG","color": "#1d8bc3","data":[], "total":[]}, 
	// ];
	// var itemsemen = ["SEMEN PPC ZAK 40KG","SEMEN PUTIH ZAK 40 KG","SEMEN PPC ZAK 50KG","SEMEN PCC ZAK 40KG"];
	for(var a=0; a<data.material.length;a++){
		if(data.material[a]){
			var item = {"name":data.material[a],"color": color2[a],"data":[], "total":[]};
			semen.push(item);
		}
	}
	for(var a=0; a<semen.length;a++){
		semenx.push(semen[a]);
	}
	for(i in data.distributor){
		label.push(i);
		
		for(var a=0; a<semenx.length;a++){
			var item = 0;
			
			for(b=0;b<data.distributor[i].length;b++){
				if(semenx[a].name==data.distributor[i][b].NAMA_PRODUK){
					item = data.distributor[i][b].JUMLAH_JUAL;
				}
			}
			semenx[a].data.push(item);
		}
	}
	for(var j=0; j<semenx.length;j++){
		var total = 0;
		for(var y=0; y<semenx[j].data.length;y++){
			total += semenx[j].data[y];
		}
		semenx[j].total.push(total);
	}
	$('#salesDistributor').highcharts({
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
			categories: label
		},
		yAxis: {
			title: {
				text: ''
			}
		},
        credits: {
			enabled: false
		},
		exporting: {
			enabled: false
		},
		legend: {
			enabled: true,
			labelFormatter: function () {
	            return this.name+' ('+numberFormat(this.userOptions.total[0])+' Zak)';
	        }
		},
		tooltip: {
			headerFormat: '<b>{point.x}</b><br/>',
			pointFormat: '{series.name}: {point.y} Zak<br/>Total: {point.stackTotal} Zak'
		},
		plotOptions: {
			column: {
				stacking: 'normal',
				dataLabels: {
					enabled: true,
					color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
				}
			}
		},
		series: semenx
	});
}

/* PENJUALAN AREA */
var thn_saletokoarea=$(".p_thn_saletokoarea").val();
var bln_saletokoarea=$(".p_bln_saletokoarea").val();
console.log(bln_saletokoarea);
$(".p_thn_saletokoarea").change(function(){
	thn_saletokoarea = $(this).val();
	$('#salesArea').html('<div class="loader"></div>');
	$.getJSON(base_url+'Pos_api/getdata_penjualantokoarea?bln='+bln_saletokoarea+'&thn='+thn_saletokoarea, function(dataArea){
		salesArea(dataArea);
	});
});
$(".p_bln_saletokoarea").change(function(){
	bln_saletokoarea = $(this).val();
	$('#salesArea').html('<div class="loader"></div>');
	$.getJSON(base_url+'Pos_api/getdata_penjualantokoarea?bln='+bln_saletokoarea+'&thn='+thn_saletokoarea, function(dataArea){
		salesArea(dataArea);
	});
});
$.getJSON(base_url+'Pos_api/getdata_penjualantokoarea?bln='+bln_saletokoarea+'&thn='+thn_saletokoarea, function(dataArea){
	salesArea(dataArea);
});

/* PENJUALAN DISTRIBUTOR */
var thn_saletokodist=$(".p_thn_saletokodist").val();
var bln_saletokodist=$(".p_bln_saletokodist").val();

$(".p_thn_saletokodist").change(function(){
	thn_saletokodist = $(this).val();
	$('#salesDistributor').html('<div class="loader"></div>');
	$.getJSON(base_url+'Pos/get_data_penjualan_LT_Distributor?bulan='+bln_saletokodist+'&tahun='+thn_saletokodist, function(dataDist){
		salesDistributor(dataDist);
	});
});
$(".p_bln_saletokodist").change(function(){
	bln_saletokodist = $(this).val();
	$('#salesDistributor').html('<div class="loader"></div>');
	$.getJSON(base_url+'Pos/get_data_penjualan_LT_Distributor?bulan='+bln_saletokodist+'&tahun='+thn_saletokodist, function(dataDist){
		salesDistributor(dataDist);
	});
});
$.getJSON(base_url+'Pos/get_data_penjualan_LT_Distributor?bulan='+bln_saletokoarea+'&tahun='+thn_saletokoarea, function(dataDist){
	salesDistributor(dataDist);
});

var datatablesales1 = $('.table-sales1').DataTable({
			"language": {
			  "emptyTable": "No data available"
			},
			"columnDefs": [
				{ "width": "8%", "targets": 0 },
				{ "width": "20%", "targets": 1 },
				{ "width": "50%", "targets": 2 },
				{ "width": "10%", "targets": 3 },
				{ "width": "10%", "targets": 4 },
			],
			"fixedColumns": true,
			"scrollY": "290px",
			"scrollCollapse": true,
			"searching":false,
			"bLengthChange": false,
			"info": false,
			"paging":false
		});
		
var datatablesales2 = $('.table-sales2').DataTable({
	"language": {
	  "emptyTable": "No data available"
	},
	"columnDefs": [
		{ "width": "8%", "targets": 0 },
		{ "width": "20%", "targets": 1 },
		{ "width": "50%", "targets": 2 },
		{ "width": "10%", "targets": 3 },
	],
	"fixedColumns": true,
	"scrollY": "290px",
	"scrollCollapse": true,
	"searching":false,
	"bLengthChange": false,
	"info": false,
	"paging":false
});


/* TOP TEN DISTRIBUTOR */

var thn_toptokoarea=$(".p_thn_toptokoarea").val();
var bln_toptokoarea=$(".p_bln_toptokoarea").val();
var area_topten = $(".p_topten").val();

$(".p_topten").change(function(){
	area_topten = $(this).val();
	getTopTen(area_topten,thn_toptokoarea,bln_toptokoarea);
});
$(".p_thn_toptokoarea").change(function(){
	thn_toptokoarea = $(this).val();
	getTopTen(area_topten,thn_toptokoarea,bln_toptokoarea);
});
$(".p_bln_toptokoarea").change(function(){
	bln_toptokoarea = $(this).val();
	getTopTen(area_topten,thn_toptokoarea,bln_toptokoarea);
});

getTopTen(1,thn_toptokoarea,bln_toptokoarea);
function getTopTen(area,thn,bln){
	$('.table-sales1 tbody').html('<tr style="background:transparent;"><td colspan="5"><div class="loader"></div></td></tr>');
	$.getJSON(base_url+'Pos_api/get_toppenjualantokoperarea?area='+area+'&bln='+bln+'&thn='+thn, function(data){
		datatablesales1.clear();
		for(var i=0;i<data.length;i++){
			datatablesales1.row.add([(i+1), data[i].NAMA_LT, data[i].ADDRESS, numberFormat(data[i].QTY_JUAL), numberFormat(format_number(data[i].REVENUE)/format_number(data[i].QTY_JUAL))]).draw();
		}
		datatablesales1.columns.adjust().draw();
	});
}

/* STOCK DISTRIBUTOR */
var area_stock = 1;
var product_stock = "";
var isi_mat = false;
$(".p_stock").change(function(){
	area_stock = $(this).val();
	getStock(area_stock,product_stock);
});
$(".p_product_stock").change(function(){
	product_stock = $(this).val();
	getStock(area_stock,product_stock);
});
getStock(1,product_stock);
function getStock(area_stok,product_stock){
	$('.table-sales2 tbody').html('<tr style="background:transparent;"><td colspan="4"><div class="loader"></div></td></tr>');
	$.getJSON(base_url+'Pos/get_stok_LT?area='+area_stok+'&material='+product_stock, function(data){
		if(!isi_mat){
			var material = data.material;
			var mat = "";
			for(var i=0;i<material.length;i++){
				mat +='<option value="'+material[i].KODE+'">'+material[i].NAMA+'</option>';
			}
			$('.p_product_stock').html(mat);
			isi_mat=true;
		}
		var data = data.data
		var table = "";
		datatablesales2.clear();
		for(var i=0;i<data.length;i++){
			// table +='<tr>';
			// table +='	<td>'+(i+1)+'</td>';
			// table +='	<td>'+data[i].NAMA_LT+'</td>';
			// table +='	<td>'+data[i].ALAMAT+'</td>';
			// table +='	<td>'+numberFormat(data[i].QTY)+'</td>';
			// table +='</tr>';
			datatablesales2.row.add([(i+1), data[i].NAMA_LT, data[i].ALAMAT, numberFormat(data[i].QTY)]).draw();
		}
		datatablesales2.columns.adjust().draw();
		// $('.table-sales2 tbody').html(table);
	});
}

/* TREN HARGA SEMEN 40 */
var isi_mat_tren1 = false;
function trenHarga1(datatren){
	if(!isi_mat_tren1){
		var material = datatren.Product;
		var mat = "";
		for(var i=0;i<material.length;i++){
			mat +='<option value="'+material[i].KODE+'">'+material[i].NAMA+'</option>';
		}
		$('.p_prod_tren40').html(mat);
		isi_mat_tren1=true;
	}
	var minData= [];
	var maxData= [];
	var avgData= [];
	for(var a=0; a<datatren.DATA.length;a++){
		minData.push(parseFloat(datatren.DATA[a].MIN));
		maxData.push(parseFloat(datatren.DATA[a].MAX));
		avgData.push(parseFloat(datatren.DATA[a].AVG));
	}
	$('#trenHarga1').highcharts({
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
			categories: datatren.LIST_TANGGAL,
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
				return s + ':<br>' + numberFormat(n);
			}

		},
        credits: {
			enabled: false
		},
		exporting: {
			enabled: false
		},
        plotOptions: {
	        series: {
	            borderWidth: 0,
	            dataLabels: {
	                enabled: true,
	                format: '{point.y:,.0f}',
	                style: {
		                fontSize: '12px',
		                fontFamily: 'Verdana, sans-serif'
		            }
	            }
	        }
	    },
		series: [{
			type:'spline',
			name: 'Harga Rata-Rata',
        	dashStyle: 'shortdot',
			color: '#e9d560',
			data: avgData
		},{
			type:'spline',
			name:'Harga Maximum',
			color: '#a5d075', 
			data: maxData
		},{
			type:'spline',
			name:'Harga Minimum',
			color: '#ed2d34',
			data: minData
		}
		]
	});
}
var thn_tren40=$(".p_thn_tren40").val();
var bln_tren40=$(".p_bln_tren40").val();
var prod_tren40='121-301-0110';
var area_tren40=$(".p_area_tren40").val();

$(".p_thn_tren40").change(function(){
	thn_tren40 = $(this).val();
	$('#trenHarga1').html('<div class="loader"></div>');
	$.getJSON(base_url+'Pos_api/get_trend_harga?tipe=harian&kodeproduk='+prod_tren40+'&thn='+thn_tren40+'&bln='+bln_tren40+'&area='+area_tren40, function(datatren){
		trenHarga1(datatren);
	});
});
$(".p_bln_tren40").change(function(){
	bln_tren40 = $(this).val();
	$('#trenHarga1').html('<div class="loader"></div>');
	$.getJSON(base_url+'Pos_api/get_trend_harga?tipe=harian&kodeproduk='+prod_tren40+'&thn='+thn_tren40+'&bln='+bln_tren40+'&area='+area_tren40, function(datatren){
		trenHarga1(datatren);
	});
});
$(".p_prod_tren40").change(function(){
	prod_tren40 = $(this).val();
	$('#trenHarga1').html('<div class="loader"></div>');
	$.getJSON(base_url+'Pos_api/get_trend_harga?tipe=harian&kodeproduk='+prod_tren40+'&thn='+thn_tren40+'&bln='+bln_tren40+'&area='+area_tren40, function(datatren){
		trenHarga1(datatren);
	});
});
$(".p_area_tren40").change(function(){
	area_tren40 = $(this).val();
	$('#trenHarga1').html('<div class="loader"></div>');
	$.getJSON(base_url+'Pos_api/get_trend_harga?tipe=harian&kodeproduk='+prod_tren40+'&thn='+thn_tren40+'&bln='+bln_tren40+'&area='+area_tren40, function(datatren){
		trenHarga1(datatren);
	});
});
$.getJSON(base_url+'Pos_api/get_trend_harga?tipe=harian&kodeproduk='+prod_tren40+'&thn='+thn_tren40+'&bln='+bln_tren40+'&area='+area_tren40, function(datatren){
	trenHarga1(datatren);
});

/* TREN HARGA SEMEN 50 */
var isi_mat_tren2 = false;
function trenHarga2(datatren){
	if(!isi_mat_tren2){
		var material = datatren.Product;
		var mat = "";
		for(var i=0;i<material.length;i++){
			mat +='<option value="'+material[i].KODE+'">'+material[i].NAMA+'</option>';
		}
		$('.p_prod_tren50').html(mat);
		isi_mat_tren2=true;
	}
	var minData= [];
	var maxData= [];
	var avgData= [];
	for(var a=0; a<datatren.DATA.length;a++){
		minData.push(parseFloat(datatren.DATA[a].MIN));
		maxData.push(parseFloat(datatren.DATA[a].MAX));
		avgData.push(parseFloat(datatren.DATA[a].AVG));
	}
	$('#trenHarga2').highcharts({
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
			categories: datatren.LIST_TANGGAL,
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
				return s + ':<br>' + numberFormat(n);
			}

		},
        credits: {
			enabled: false
		},
		exporting: {
			enabled: false
		},
        plotOptions: {
	        series: {
	            borderWidth: 0,
	            dataLabels: {
	                enabled: true,
	                format: '{point.y:.0f}',
	                style: {
		                fontSize: '12px',
		                fontFamily: 'Verdana, sans-serif'
		            }
	            }
	        }
	    },
		legend: {
			enabled: true
		},
		series: [{
			type:'spline',
			name: 'Harga Rata-Rata',
        	dashStyle: 'shortdot',
			color: '#e9d560',
			data: avgData
		},{
			type:'spline',
			name:'Harga Maximum',
			color: '#a5d075', 
			data: maxData
		},{
			type:'spline',
			name:'Harga Minimum',
			color: '#ed2d34',
			data: minData
		}
		]
	});
}

var thn_tren50=$(".p_thn_tren50").val();
var bln_tren50=$(".p_bln_tren50").val();
var prod_tren50='121-301-0056';
var area_tren50=$(".p_area_tren50").val();
$(".p_thn_tren50").change(function(){
	thn_tren50 = $(this).val();
	$('#trenHarga2').html('<div class="loader"></div>');
	$.getJSON(base_url+'Pos_api/get_trend_harga?tipe=harian&zaktipe=50&kodeproduk='+prod_tren50+'&thn='+thn_tren50+'&bln='+bln_tren50+'&area='+area_tren50, function(datatren){
		trenHarga2(datatren);
	});
});
$(".p_bln_tren50").change(function(){
	bln_tren50 = $(this).val();
	$('#trenHarga2').html('<div class="loader"></div>');
	$.getJSON(base_url+'Pos_api/get_trend_harga?tipe=harian&zaktipe=50&kodeproduk='+prod_tren50+'&thn='+thn_tren50+'&bln='+bln_tren50+'&area='+area_tren50, function(datatren){
		trenHarga2(datatren);
	});
});
$(".p_prod_tren50").change(function(){
	prod_tren50 = $(this).val();
	$('#trenHarga2').html('<div class="loader"></div>');
	$.getJSON(base_url+'Pos_api/get_trend_harga?tipe=harian&zaktipe=50&kodeproduk='+prod_tren50+'&thn='+thn_tren50+'&bln='+bln_tren50+'&area='+area_tren50, function(datatren){
		trenHarga2(datatren);
	});
});
$(".p_area_tren50").change(function(){
	area_tren50 = $(this).val();
	$('#trenHarga2').html('<div class="loader"></div>');
	$.getJSON(base_url+'Pos_api/get_trend_harga?tipe=harian&zaktipe=50&kodeproduk='+prod_tren50+'&thn='+thn_tren50+'&bln='+bln_tren50+'&area='+area_tren50, function(datatren){
		trenHarga2(datatren);
	});
});
$.getJSON(base_url+'Pos_api/get_trend_harga?tipe=harian&zaktipe=50&kodeproduk='+prod_tren50+'&thn='+thn_tren50+'&bln='+bln_tren50+'&area='+area_tren50, function(datatren){
	trenHarga2(datatren);
});