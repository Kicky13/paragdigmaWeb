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
		$.getJSON(base_url+"procurement/get_data?comp="+opco+"&year="+tahun+"&month="+bulan, function(data){
            $(".loading_overlay").addClass("opacity-on");
            $(".count1").html(numberFormat(data.total_pr.TOTAL_PR));
            $(".tvalue1").html(numberFormat(data.total_pr.TOTAL_VALUE)); 
            $(".count2").html(numberFormat(data.total_pr_rel.TOTAL_PR_REL));
            $(".tvalue2").html(numberFormat(data.total_pr_rel.TOTAL_VALUE));
            $(".count3").html(numberFormat(data.total_rfq.TOTAL_RFQ));
            $(".tvalue3").html(0);
            $(".count4").html(numberFormat(data.total_po.TOTAL_PO));
            $(".tvalue4").html(numberFormat(data.total_po.TOTAL_VALUE));
            $(".count5").html(numberFormat(data.total_gr.TOTAL_GR));
            $(".tvalue5").html(numberFormat(data.total_pr.TOTAL_VALUE));
            sessionStorage.setItem('dataReceivable', JSON.stringify(data));
			viewDetail(data, choose);
		});

    };
    
	loadData(bulan, tahun, opco);

	function viewDetail(data, choose){
        var dataTrend = [];
        if(choose==1){
            $(".countRMF").html(numberFormat(data.total_pr_detail.TOTAL_PR_BAHAN));
            $(".valRMF").html(numberFormat(data.total_pr_detail.TOTAL_VALUE_BAHAN));
            $(".countSpareparts").html(numberFormat(data.total_pr_detail.TOTAL_PR_BARANG));
            $(".valSpareparts").html(numberFormat(data.total_pr_detail.TOTAL_VALUE_BARANG));
            $(".countServices").html(numberFormat(data.total_pr_detail.TOTAL_PR_JASA));
            $(".valServices").html(numberFormat(data.total_pr_detail.TOTAL_VALUE_JASA));
            dataTrend=[data.trend_pr.barang, data.trend_pr.jasa];
        }else if(choose==2){
            $(".countRMF").html(numberFormat(data.total_pr_rel_detail.TOTAL_PR_REL_BAHAN));
            $(".valRMF").html(numberFormat(data.total_pr_rel_detail.TOTAL_VALUE_BAHAN));
            $(".countSpareparts").html(numberFormat(data.total_pr_rel_detail.TOTAL_PR_REL_BARANG));
            $(".valSpareparts").html(numberFormat(data.total_pr_rel_detail.TOTAL_VALUE_BARANG));
            $(".countServices").html(numberFormat(data.total_pr_rel_detail.TOTAL_PR_REL_JASA));
            $(".valServices").html(numberFormat(data.total_pr_rel_detail.TOTAL_VALUE_JASA));
            dataTrend=[data.trend_pr_rel.barang, data.trend_pr_rel.jasa];
        }else if(choose==3){
            $(".countRMF").html(numberFormat(data.total_rfq_detail.TOTAL_RFQ_BAHAN));
            $(".valRMF").html(numberFormat(data.total_rfq_detail.TOTAL_VALUE_BAHAN));
            $(".countSpareparts").html(numberFormat(data.total_rfq_detail.TOTAL_RFQ_BARANG));
            $(".valSpareparts").html(numberFormat(data.total_rfq_detail.TOTAL_VALUE_BARANG));
            $(".countServices").html(numberFormat(data.total_rfq_detail.TOTAL_RFQ_JASA));
            $(".valServices").html(numberFormat(data.total_rfq_detail.TOTAL_VALUE_JASA));
            dataTrend=[data.trend_rfq.barang, data.trend_rfq.jasa, data.trend_rfq.bahan];
        }else if(choose==4){
            $(".countRMF").html(numberFormat(data.total_po_detail.TOTAL_PO_BAHAN));
            $(".valRMF").html(numberFormat(data.total_po_detail.TOTAL_VALUE_BAHAN));
            $(".countSpareparts").html(numberFormat(data.total_po_detail.TOTAL_PO_BARANG));
            $(".valSpareparts").html(numberFormat(data.total_po_detail.TOTAL_VALUE_BARANG));
            $(".countServices").html(numberFormat(data.total_po_detail.TOTAL_PO_JASA));
            $(".valServices").html(numberFormat(data.total_po_detail.TOTAL_VALUE_JASA));
            dataTrend=[data.trend_po.barang, data.trend_po.jasa, data.trend_po.bahan];
        }else if(choose==5){
            $(".countRMF").html(numberFormat(data.total_gr_detail.TOTAL_GR_BAHAN));
            $(".valRMF").html(numberFormat(data.total_gr_detail.TOTAL_VALUE_BAHAN));
            $(".countSpareparts").html(numberFormat(data.total_gr_detail.TOTAL_GR_BARANG));
            $(".valSpareparts").html(numberFormat(data.total_gr_detail.TOTAL_VALUE_BARANG));
            $(".countServices").html(numberFormat(data.total_gr_detail.TOTAL_GR_JASA));
            $(".valServices").html(numberFormat(data.total_gr_detail.TOTAL_VALUE_JASA));
            dataTrend=[data.trend_gr.barang, data.trend_gr.jasa, data.trend_gr.bahan];
        }

        var item1=[];
        var item2=[];
        var item3=[];
        for(var i=0;i<dataTrend[0].length;i++){
            item1.push(parseInt(dataTrend[0][i].TOTAL));
            item2.push(parseInt(dataTrend[1][i].TOTAL));
            if(dataTrend[2]){
                item3.push(parseInt(dataTrend[2][i].TOTAL));
            }
        }


        Highcharts.chart('tracking', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Performance Tracking'
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
                name: 'Spareparts',
                data: item1
            }, {
                name: 'Services',
                data: item2
            }, {
                name: 'Raw Material & Fuel',
                data: item3
            }]
        });

    }
    
	$(".block").click(function(){
		var choose = $(this).attr('rel');
		var title = $(this).data('name');
		$(".tittle_head").html(title);
		$(".block").removeClass('active');
        $(this).addClass('active');
        var data = JSON.parse(sessionStorage.getItem('dataReceivable'));
		viewDetail(data, choose)
	});

});