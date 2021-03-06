function DailyChart(data){
	  Highcharts.chart('dailyChart', {
        chart: {
          backgroundColor: 'rgba(0, 255, 0, 0)',
          type: 'column'
        },
        title: {
            text: ''
        },
        xAxis: {
            categories: ['Clinker','Bulk','Bag'],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: '',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
			formatter: function () {
				var n = this.y;
				var s = this.series.name;
				return s + ':<br>' + numberFormat(n)+' Billion';
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
	                format: '{point.y:.0f}B',
	                style: {
		                fontSize: '7px',
		                fontFamily: 'Verdana, sans-serif'
		            }
	            }
	        }
	    },
        legend: {
         
        },
        credits: {
            enabled: false
        },
        series: data
    });
}
function MonthUpToChart(data){
      Highcharts.chart('monthUpToChart', {
        chart: {
          backgroundColor: 'rgba(0, 255, 0, 0)',
          type: 'column'
        },
        title: {
            text: ''
        },
        xAxis: {
            categories: ['Clinker','Bulk','Bag'],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: '',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
			formatter: function () {
				var n = this.y;
				var s = this.series.name;
				return s + ':<br>' + numberFormat(n)+' Billion';
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
	                format: '{point.y:.0f}B',
	                style: {
		                fontSize: '7px',
		                fontFamily: 'Verdana, sans-serif'
		            }
	            }
	        }
	    },
        legend: {
         
        },
        credits: {
            enabled: false
        },
        series: data
    });
}
function YearUpToChart(data){
      Highcharts.chart('yearUpToChart', {
        chart: {
          backgroundColor: 'rgba(0, 255, 0, 0)',
          type: 'column'
        },
        title: {
            text: ''
        },
        xAxis: {
            categories: ['Clinker','Bulk','Bag'],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: '',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
			formatter: function () {
				var n = this.y;
				var s = this.series.name;
				return s + ':<br>' + numberFormat(n)+' Billion';
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
	                format: '{point.y:.0f}B',
	                style: {
		                fontSize: '7px',
		                fontFamily: 'Verdana, sans-serif'
		            }
	            }
	        }
	    },
        legend: {
         
        },
        credits: {
            enabled: false
        },
        series: data
    });
}
function format_number(nominal){
	if((typeof nominal)=="string"){
		nominal = nominal.split(',').join('');
		nominal = parseFloat(nominal);
	}
	return nominal;
}
function numberFormat(x) {
    var nominal = parseFloat(x).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return nominal.replace(".","-").split(",").join('.').replace('-',',');
}
function view(bulan, tahun, opco){
	var bln=bulan;
	if(bulan<=9){
		bulan = '0'+bulan;
	}else{
		bulan = bulan;
	};
	
	var date = new Date();
	if(tahun<date.getFullYear()||bln<date.getMonth()+1){
		$('.persen-group .persen-today').css({"display":"none"});
		$('.persen-group .persen-monthtoday').removeClass("col-md-4");
		$('.persen-group .persen-monthtoday').addClass("col-md-6");
		$('.persen-group .persen-yeartoday').removeClass("col-md-4");
		$('.persen-group .persen-yeartoday').addClass("col-md-6");
	}else{
		$('.persen-group .persen-today').css({"display":"block"});
		$('.persen-group .persen-monthtoday').removeClass("col-md-6");
		$('.persen-group .persen-monthtoday').addClass("col-md-4");
		$('.persen-group .persen-yeartoday').removeClass("col-md-6");
		$('.persen-group .persen-yeartoday').addClass("col-md-4");
	}
    $.getJSON(base_url+'Sales_revenue_bpc/VolumeRevenue_PER_OPCO/'+opco+'/'+tahun+'.'+bulan, function(data){
		/* Today */
		var volume_to_day = data.DATA[0].to_day.DATAREVENUE[0].REVENUE;
		var target_to_day = data.DATA[0].to_day.DATAREVENUE[0].TARGETREVENUE;
		var variant_to_day = data.DATA[0].to_day.DATAREVENUE[0].VARIANREVENUE;
		var persen_to_day = data.DATA[0].to_day.DATAREVENUE[0].PERSENREVENUE;
		
		$('.target-today .number').html(numberFormat(target_to_day));
		$('.actual-today .number').html(numberFormat(volume_to_day));
		$('.variant-today .number').html(numberFormat(variant_to_day));
		
		// volume_to_day = parseFloat(volume_to_day.split(',').join(''));
		// target_to_day = parseFloat(target_to_day.split(',').join(''));
		// variant_to_day = parseFloat(variant_to_day.split(',').join(''));
		
		persen_to_day = persen_to_day.toFixed(2);
		
		var font_today = $('.persen-group .persen-today .highlight .percent span font');
		if(persen_to_day>=100){
			font_today.attr('color','green');
			font_today.siblings('i').removeClass('fa-thumbs-down');
			font_today.siblings('i').addClass('fa-thumbs-up').css('color','green');
		}
		font_today.html(numberFormat(persen_to_day)+'%');
		
		/* Month Today */
		var volume_month_to_day = data.DATA[1].month_to_day.DATAREVENUE.REVENUE;
		var target_month_to_day = data.DATA[1].month_to_day.DATAREVENUE.TARGETREVENUE;
		var variant_month_to_day = data.DATA[1].month_to_day.DATAREVENUE.VARIANREVENUE;
		var persen_month_to_day = data.DATA[1].month_to_day.DATAREVENUE.PERSENREVENUE;
		
		$('.target-monthtoday .number').html(numberFormat(target_month_to_day));
		$('.actual-monthtoday .number').html(numberFormat(volume_month_to_day));
		$('.variant-monthtoday .number').html(numberFormat(variant_month_to_day));
		
		// volume_month_to_day = parseFloat(volume_month_to_day.split(',').join(''));
		// target_month_to_day = parseFloat(target_month_to_day.split(',').join(''));
		// variant_month_to_day = parseFloat(variant_month_to_day.split(',').join(''));
		
		persen_month_to_day = persen_month_to_day.toFixed(2);
		
		var font_month_to_day = $('.persen-group .persen-monthtoday .highlight .percent span font');
		if(persen_month_to_day>=100){
			font_month_to_day.attr('color','green');
			font_month_to_day.siblings('i').removeClass('fa-thumbs-down');
			font_month_to_day.siblings('i').addClass('fa-thumbs-up').css('color','green');
		}
		font_month_to_day.html(numberFormat(persen_month_to_day)+'%');
		
		/* Year Today */
		var volume_year_to_day = data.DATA[2].year_to_day.DATAREVENUE.REVENUE;
		var target_year_to_day = data.DATA[2].year_to_day.DATAREVENUE.TARGETREVENUE;
		var variant_year_to_day = data.DATA[2].year_to_day.DATAREVENUE.VARIANREVENUE;
		var persen_year_to_day = data.DATA[2].year_to_day.DATAREVENUE.PERSENREVENUE;
		
		$('.target-yeartoday .number').html(numberFormat(target_year_to_day));
		$('.actual-yeartoday .number').html(numberFormat(volume_year_to_day));
		$('.variant-yeartoday .number').html(numberFormat(variant_year_to_day));		
		
		// volume_year_to_day = parseFloat(volume_year_to_day.split(',').join(''));
		// target_year_to_day = parseFloat(target_year_to_day.split(',').join(''));
		// variant_year_to_day = parseFloat(variant_year_to_day.split(',').join(''));
		
		persen_year_to_day = persen_year_to_day.toFixed(2);
		
		var font_year_to_day = $('.persen-group .persen-yeartoday .highlight .percent span font');
		if(persen_year_to_day>=100){
			font_year_to_day.attr('color','green');
			font_year_to_day.siblings('i').removeClass('fa-thumbs-down');
			font_year_to_day.siblings('i').addClass('fa-thumbs-up').css('color','green');
		}
		font_year_to_day.html(numberFormat(persen_year_to_day)+'%');
    });
    $.getJSON(base_url+'Sales_revenue_bpc/VolumeRevenue_BBC_PER_OPCO/'+opco+'/'+tahun+'.'+bulan, function(data){
		/* Today */
		dataToday = [{
					name: 'Act '+data.BAG.DATA.PREVYEAR.MONTH+' '+data.BAG.DATA.PREVYEAR.YEAR,
					color: '#2ED573',
					data: [
						// parseFloat(data.data_prevyear.Clinker[0].to_day.DATAREVENUE[0].REVENUE.split(',').join('')),
						// parseFloat(data.data_prevyear.BULK[0].to_day.DATAREVENUE[0].REVENUE.split(',').join('')),
						// parseFloat(data.data_prevyear.BAG[0].to_day.DATAREVENUE[0].REVENUE.split(',').join(''))
						data.CLINKER.DATA.PREVYEAR.DATA[0].to_day.DATAREVENUE[0].REVENUE,
						data.BULK.DATA.PREVYEAR.DATA[0].to_day.DATAREVENUE[0].REVENUE,
						data.BAG.DATA.PREVYEAR.DATA[0].to_day.DATAREVENUE[0].REVENUE
					]
				}, {
					name: 'Act '+data.BAG.DATA.THISYEAR.MONTH+' '+data.BAG.DATA.THISYEAR.YEAR,
					color: '#1E90FF',
					data: [
						// parseFloat(data.data_thisyear.Clinker[0].to_day.DATAREVENUE[0].REVENUE.split(',').join('')),
						// parseFloat(data.data_thisyear.BULK[0].to_day.DATAREVENUE[0].REVENUE.split(',').join('')),
						// parseFloat(data.data_thisyear.BAG[0].to_day.DATAREVENUE[0].REVENUE.split(',').join(''))
						data.CLINKER.DATA.THISYEAR.DATA[0].to_day.DATAREVENUE[0].REVENUE,
						data.BULK.DATA.THISYEAR.DATA[0].to_day.DATAREVENUE[0].REVENUE,
						data.BAG.DATA.THISYEAR.DATA[0].to_day.DATAREVENUE[0].REVENUE
					]
				}, {
					name: 'Target',
					color: '#F91b5e',
					data: [
						// parseFloat(data.data_thisyear.Clinker[0].to_day.DATAREVENUE[0].TARGETREVENUE.split(',').join('')),
						// parseFloat(data.data_thisyear.BULK[0].to_day.DATAREVENUE[0].TARGETREVENUE.split(',').join('')),
						// parseFloat(data.data_thisyear.BAG[0].to_day.DATAREVENUE[0].TARGETREVENUE.split(',').join(''))
						data.CLINKER.DATA.THISYEAR.DATA[0].to_day.DATAREVENUE[0].TARGETREVENUE,
						data.BULK.DATA.THISYEAR.DATA[0].to_day.DATAREVENUE[0].TARGETREVENUE,
						data.BAG.DATA.THISYEAR.DATA[0].to_day.DATAREVENUE[0].TARGETREVENUE
					]
				}];
		DailyChart(dataToday);
		/* Month Today */
		dataMonthToday = [{
					name: 'Act '+data.BAG.DATA.PREVYEAR.MONTH+' '+data.BAG.DATA.PREVYEAR.YEAR,
					color: '#2ED573',
					data: [
						// parseFloat(data.data_prevyear.Clinker[1].month_to_day.DATAREVENUE.REVENUE.split(',').join('')),
						// parseFloat(data.data_prevyear.BULK[1].month_to_day.DATAREVENUE.REVENUE.split(',').join('')),
						// parseFloat(data.data_prevyear.BAG[1].month_to_day.DATAREVENUE.REVENUE.split(',').join(''))
						data.CLINKER.DATA.PREVYEAR.DATA[1].month_to_day.DATAREVENUE.REVENUE,
						data.BULK.DATA.PREVYEAR.DATA[1].month_to_day.DATAREVENUE.REVENUE,
						data.BAG.DATA.PREVYEAR.DATA[1].month_to_day.DATAREVENUE.REVENUE
					]
				}, {
					name: 'Act '+data.BAG.DATA.THISYEAR.MONTH+' '+data.BAG.DATA.THISYEAR.YEAR,
					color: '#1E90FF',
					data: [
						// parseFloat(data.data_thisyear.Clinker[1].month_to_day.DATAREVENUE.REVENUE.split(',').join('')),
						// parseFloat(data.data_thisyear.BULK[1].month_to_day.DATAREVENUE.REVENUE.split(',').join('')),
						// parseFloat(data.data_thisyear.BAG[1].month_to_day.DATAREVENUE.REVENUE.split(',').join(''))
						data.CLINKER.DATA.THISYEAR.DATA[1].month_to_day.DATAREVENUE.REVENUE,
						data.BULK.DATA.THISYEAR.DATA[1].month_to_day.DATAREVENUE.REVENUE,
						data.BAG.DATA.THISYEAR.DATA[1].month_to_day.DATAREVENUE.REVENUE
					]
				}, {
					name: 'Target',
					color: '#F91b5e',
					data: [
						// parseFloat(data.data_thisyear.Clinker[1].month_to_day.DATAREVENUE.TARGETREVENUE.split(',').join('')),
						// parseFloat(data.data_thisyear.BULK[1].month_to_day.DATAREVENUE.TARGETREVENUE.split(',').join('')),
						// parseFloat(data.data_thisyear.BAG[1].month_to_day.DATAREVENUE.TARGETREVENUE.split(',').join(''))
						data.CLINKER.DATA.THISYEAR.DATA[1].month_to_day.DATAREVENUE.TARGETREVENUE,
						data.BULK.DATA.THISYEAR.DATA[1].month_to_day.DATAREVENUE.TARGETREVENUE,
						data.BAG.DATA.THISYEAR.DATA[1].month_to_day.DATAREVENUE.TARGETREVENUE
					]
				}];
		MonthUpToChart(dataMonthToday);
		/* Year Today */
		dataYearToday = [{
					name: 'Act '+data.BAG.DATA.PREVYEAR.MONTH+' '+data.BAG.DATA.PREVYEAR.YEAR,
					color: '#2ED573',
					data: [
						// parseFloat(data.data_prevyear.Clinker[2].year_to_day.DATAREVENUE.REVENUE.split(',').join('')),
						// parseFloat(data.data_prevyear.BULK[2].year_to_day.DATAREVENUE.REVENUE.split(',').join('')),
						// parseFloat(data.data_prevyear.BAG[2].year_to_day.DATAREVENUE.REVENUE.split(',').join(''))
						data.CLINKER.DATA.PREVYEAR.DATA[2].year_to_day.DATAREVENUE.REVENUE,
						data.BULK.DATA.PREVYEAR.DATA[2].year_to_day.DATAREVENUE.REVENUE,
						data.BAG.DATA.PREVYEAR.DATA[2].year_to_day.DATAREVENUE.REVENUE
					]
				}, {
					name: 'Act '+data.BAG.DATA.THISYEAR.MONTH+' '+data.BAG.DATA.THISYEAR.YEAR,
					color: '#1E90FF',
					data: [
						// parseFloat(data.data_thisyear.Clinker[2].year_to_day.DATAREVENUE.REVENUE.split(',').join('')),
						// parseFloat(data.data_thisyear.BULK[2].year_to_day.DATAREVENUE.REVENUE.split(',').join('')),
						// parseFloat(data.data_thisyear.BAG[2].year_to_day.DATAREVENUE.REVENUE.split(',').join(''))
						data.CLINKER.DATA.THISYEAR.DATA[2].year_to_day.DATAREVENUE.REVENUE,
						data.BULK.DATA.THISYEAR.DATA[2].year_to_day.DATAREVENUE.REVENUE,
						data.BAG.DATA.THISYEAR.DATA[2].year_to_day.DATAREVENUE.REVENUE
					]
				}, {
					name: 'Target',
					color: '#F91b5e',
					data: [
						// parseFloat(data.data_thisyear.Clinker[2].year_to_day.DATAREVENUE.TARGETREVENUE.split(',').join('')),
						// parseFloat(data.data_thisyear.BULK[2].year_to_day.DATAREVENUE.TARGETREVENUE.split(',').join('')),
						// parseFloat(data.data_thisyear.BAG[2].year_to_day.DATAREVENUE.TARGETREVENUE.split(',').join(''))
						data.CLINKER.DATA.THISYEAR.DATA[2].year_to_day.DATAREVENUE.TARGETREVENUE,
						data.BULK.DATA.THISYEAR.DATA[2].year_to_day.DATAREVENUE.TARGETREVENUE,
						data.BAG.DATA.THISYEAR.DATA[2].year_to_day.DATAREVENUE.TARGETREVENUE
					]
				}];
		YearUpToChart(dataYearToday);
    });
	tableProv(bulan, tahun, opco, 1);
	$.getJSON(base_url+'Sales_revenue/global_wilayah?org='+opco+'/'+tahun+'.'+bulan, function(data){
		var table = "";
		var jumlah_hari = new Date().getDate();
		if (data.data_wilayah.BAG.length == 1) {
			table += ' Data Not Available';
		}else{
			for(var i=0;i<data.data_wilayah.BAG.length;i++){
				if(data.data_wilayah.BAG[i].ID_REGION.trim()!=""){
					target_today = format_number(data.data_wilayah.BAG[i].TARGET_REVENUE_MONTH)/jumlah_hari;
					
					persen_today = (target_today)? ((format_number(data.data_wilayah.BAG[i].REVENUE_DAY)/target_today)*100) : 0;
					persen_monthtoday = (format_number(data.data_wilayah.BAG[i].TARGET_REVENUE_MONTH))? ((format_number(data.data_wilayah.BAG[i].REVENUE_MONTH)/format_number(data.data_wilayah.BAG[i].TARGET_REVENUE_MONTH))*100) : 0;
					persen_yeartoday = (format_number(data.data_wilayah.BAG[i].TARGET_REVENUE_YEAR))? ((format_number(data.data_wilayah.BAG[i].REVENUE_YEAR)/format_number(data.data_wilayah.BAG[i].TARGET_REVENUE_YEAR))*100) : 0;
					
					color_today = (persen_today>=100)? "green" : "#F91b5e"; 
					color_monthtoday = (persen_monthtoday>=100)? "green" : "#F91b5e"; 
					color_yeartoday = (persen_yeartoday>=100)? "green" : "#F91b5e";
					
					panah_today = (persen_today>=100)? "up" : "down"; 
					panah_monthtoday = (persen_monthtoday>=100)? "up" : "down"; 
					panah_yeartoday = (persen_yeartoday>=100)? "up" : "down"; 
					
					table += '	<div class="col-xs-12 highlight rev_opco">';
					table += '		<div class="col-xs-12 opco-title">';
					table += '        <h1><span style="padding-left:0;"> Wilayah - '+data.data_wilayah.BAG[i].ID_REGION.trim()+'</span></h1>';
					table += '		</div>';
					table += '		<div class="col-xs-4 padding-left persen-today">';
					table += '			<div class="col-xs-12 peropco">';
					table += '				<div class="col-xs-12 nopadding side_title" align="center">';
					table += '					To date';
					table += '				</div>';
					table += '				<div class="percent" align="center">';
					table += '					<span class="rev_sidepersen"><font color="'+color_today+'">'+numberFormat(persen_today.toFixed(2))+'%</font><i class="fa fa-thumbs-'+panah_today+'" aria-hidden="true" style="color: '+color_today+';"></i></span>';
					table += '				</div>';
					table += '			</div>';
					table += '		</div>';
					table += '		<div class="col-xs-4 padding-left persen-monthtoday">';
					table += '			<div class="col-xs-12 peropco">';
					table += '            	<div class="col-xs-12 nopadding side_title" align="center">';
					table += '                	Month to date';
					table += '            	</div>';
					table += '            	<div class="percent" align="center">';
					table += '                	<span class="rev_sidepersen"><font color="'+color_monthtoday+'">'+numberFormat(persen_monthtoday.toFixed(2))+'%</font><i class="fa fa-thumbs-'+panah_monthtoday+'" aria-hidden="true" style="color: '+color_monthtoday+';"></i></span>';
					table += '            	</div>';
					table += '			</div>';
					table += '		</div>';
					table += '		<div class="col-xs-4 padding-left persen-yeartoday">';
					table += '			<div class="col-xs-12 peropco">';
					table += '				<div class="col-xs-12 nopadding side_title" align="center">';
					table += '                	Year to date';
					table += '            	</div>';
					table += '            	<div class="percent" align="center">';
					table += '                	<span class="rev_sidepersen"><font color="'+color_yeartoday+'">'+numberFormat(persen_yeartoday.toFixed(2))+'%</font><i class="fa fa-thumbs-'+panah_yeartoday+'" aria-hidden="true" style="color: '+color_yeartoday+';"></i></span>';
					table += '            	</div>';
					table += '			</div>';
					table += '		</div>';
					table += '	</div>';
				}
			}
			if(data.data_Curah && data.data_Curah.BULK[1]){
				target_today = format_number(data.data_Curah.BULK[1].month_to_day.DATAREVENUE.TARGETREVENUE)/jumlah_hari;
				persen_today = (target_today)? ((format_number(data.data_Curah.BULK[0].to_day.DATAREVENUE[0].REVENUE)/target_today)*100) : 0;
				persen_monthtoday = (format_number(data.data_Curah.BULK[1].month_to_day.DATAREVENUE.TARGETREVENUE))? ((format_number(data.data_Curah.BULK[1].month_to_day.DATAREVENUE.REVENUE)/format_number(data.data_Curah.BULK[1].month_to_day.DATAREVENUE.TARGETREVENUE))*100) : 0;
				persen_yeartoday = (format_number(data.data_Curah.BULK[2].year_to_day.DATAREVENUE.TARGETREVENUE))? ((format_number(data.data_Curah.BULK[2].year_to_day.DATAREVENUE.REVENUE)/format_number(data.data_Curah.BULK[2].year_to_day.DATAREVENUE.TARGETREVENUE))*100) : 0;
				
				color_today = (persen_today>=100)? "green" : "#F91b5e"; 
				color_monthtoday = (persen_monthtoday>=100)? "green" : "#F91b5e"; 
				color_yeartoday = (persen_yeartoday>=100)? "green" : "#F91b5e";
				
				panah_today = (persen_today>=100)? "up" : "down"; 
				panah_monthtoday = (persen_monthtoday>=100)? "up" : "down"; 
				panah_yeartoday = (persen_yeartoday>=100)? "up" : "down"; 
				
					table += '	<div class="col-xs-12 highlight rev_opco">';
					table += '		<div class="col-xs-12 opco-title">';
					table += '        <h1><span style="padding-left:0;"> Curah</span></h1>';
					table += '		</div>';
					table += '		<div class="col-xs-4 padding-left persen-today">';
					table += '			<div class="col-xs-12 peropco">';
					table += '				<div class="col-xs-12 nopadding side_title" align="center">';
					table += '					To date';
					table += '				</div>';
					table += '				<div class="percent" align="center">';
					table += '					<span class="rev_sidepersen"><font color="'+color_today+'">'+numberFormat(persen_today.toFixed(2))+'%</font><i class="fa fa-thumbs-'+panah_today+'" aria-hidden="true" style="color: '+color_today+';"></i></span>';
					table += '				</div>';
					table += '			</div>';
					table += '		</div>';
					table += '		<div class="col-xs-4 padding-left persen-monthtoday">';
					table += '			<div class="col-xs-12 peropco">';
					table += '            	<div class="col-xs-12 nopadding side_title" align="center">';
					table += '                	Month to date';
					table += '            	</div>';
					table += '            	<div class="percent" align="center">';
					table += '                	<span class="rev_sidepersen"><font color="'+color_monthtoday+'">'+numberFormat(persen_monthtoday.toFixed(2))+'%</font><i class="fa fa-thumbs-'+panah_monthtoday+'" aria-hidden="true" style="color: '+color_monthtoday+';"></i></span>';
					table += '            	</div>';
					table += '			</div>';
					table += '		</div>';
					table += '		<div class="col-xs-4 padding-left persen-yeartoday">';
					table += '			<div class="col-xs-12 peropco">';
					table += '				<div class="col-xs-12 nopadding side_title" align="center">';
					table += '                	Year to date';
					table += '            	</div>';
					table += '            	<div class="percent" align="center">';
					table += '                	<span class="rev_sidepersen"><font color="'+color_yeartoday+'">'+numberFormat(persen_yeartoday.toFixed(2))+'%</font><i class="fa fa-thumbs-'+panah_yeartoday+'" aria-hidden="true" style="color: '+color_yeartoday+';"></i></span>';
					table += '            	</div>';
					table += '			</div>';
					table += '		</div>';
					table += '	</div>';
			}
		}
		$('.persen-wilayah').html(table);
    });     
}	

function tableProv(bulan, tahun, opco, type){
	var urlType, titleType;
	if(type==1){
		urlType = "VolumeRevenue_PROV_PER_OPCO";
		titleType = "Bag";
	}else if(type==2){
		urlType = "VolumeRevenue_PROV_PER_OPCO_bulk";
		titleType = "Bulk";
	}else{
		urlType = "VolumeRevenue_PROV_PER_OPCO_clinker";
		titleType = "Clinker";
	}
	$('.choosedTitle b').html(titleType);
	$('.table-volume tfoot').css({"display":"none"});
	$('.table-volume market').css({"display":"none"});
		if ( $.fn.DataTable.isDataTable('.table-volume') ) {
		  $('.table-volume').DataTable().destroy();
		}
		$('.table-volume tbody').html('<tr style="background:transparent;"><td colspan="6"><div class="loader" style="margin:10% auto;"></div></td></tr>');
		
	$.getJSON(base_url+'Sales_revenue_bpc/'+urlType+'/'+opco+'/'+tahun+'.'+bulan, function(data){
		var table = "";
		var total_target = 0;
		var total_act = 0;
		for(var i=0;i<data.length;i++){
			if(data[i].PROV && data[i].PROV!=" - "){
				var color = (data[i].data[1].month_to_day.DATAREVENUE.PERSENREVENUE>=100)? "green" : "red";
				total_target += format_number(data[i].data[1].month_to_day.DATAREVENUE.TARGETREVENUE);
				total_act += format_number(data[i].data[1].month_to_day.DATAREVENUE.REVENUE);
				table += '<tr>';
				table += '	<td style="width:25%">'+data[i].PROV+'</td>';
				table += '	<td style="width:25%" align="center">'+numberFormat(data[i].data[1].month_to_day.DATAREVENUE.TARGETREVENUE)+'</td>';
				table += '	<td style="width:25%" align="center">'+numberFormat(data[i].data[1].month_to_day.DATAREVENUE.REVENUE)+'</td>';
				table += '	<td style="width:25%" align="center" style="color:'+color+';">'+data[i].data[1].month_to_day.DATAREVENUE.PERSENREVENUE.toFixed(2)+'%</td>';
				table += '</tr>';
			}
		}
		$('.table-volume tfoot .target').html(numberFormat(total_target));
		$('.table-volume tfoot .actual').html(numberFormat(total_act));
		$('.table-volume tfoot .persen').html("");
		$('.table-volume tbody').html(table);
		$('.table-volume').dataTable({
			"language": {
			  "emptyTable": "No data available"
			},
			"columnDefs": [
				{ "width": "25%", "targets": 0 },
				{ "width": "25%", "targets": 1 },
				{ "width": "25%", "targets": 2 },
				{ "width": "25%", "targets": 3 },
			],
			"scrollY": "290px",
			"scrollCollapse": true,
			"searching":false,
			"bLengthChange": false,
			"info": false,
			"paging":false
		});
    });
}
var curOpco;
var bulan;
var tahun;
var opco; 

$(document).ready(function(){
	bulan = $('#month').val();
	tahun = $('#year').val();
	opco = $('#opco').val();
	curOpco=opco;
	var cmpny = window.location.href,
	parts = cmpny.split("/"),
    last_part = parts[parts.length-1];
    var comp="SMIG";
    if(last_part=="7000"){
    	comp="Semen Indonesia";
    }else if(last_part=="6000"){
    	comp="TLCC";
    }else if(last_part=="5000"){
    	comp="Semen Gresik | Rembang";
    }else if(last_part=="4000"){
    	comp="Semen Tonasa";
    }else if(last_part=="3000"){
    	comp="Semen Padang";
    }else if(last_part=="2000"||last_part=="revenue"){
    	last_part="2000";
    }
	view(bulan, tahun, last_part);
	$("#tittle_head").html(comp);
	$("#opco").val(last_part);
	// var link = '<div class="dropdown show"><a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i id="icon_achievement_rev" class="fa fa-3x fa-sort-desc" aria-hidden="true" align="left"></i></a><div class="dropdown-menu" aria-labelledby="dropdownMenuLink"><a class="dropdown-item"><span onclick="changepage(&#39;sales_dashboard/revenue&#39;)">SMIG</span><span class="ic_chart" onclick="changepage(&#39;sales_dashboard/trend/revenue&#39;)" align="right"><i class="fa fa-bar-chart" aria-hidden="true"></i></span></a><a class="dropdown-item"><span onclick="changepage(&#39;sales_dashboard/revenue_detail/7000&#39;)">Semen Indonesia</span><span class="ic_chart" onclick="changepage(&#39;sales_dashboard/trend/revenue/7000&#39;)" align="right"><i class="fa fa-bar-chart" aria-hidden="true"></i></span></a><a class="dropdown-item"><span onclick="changepage(&#39;sales_dashboard/revenue_detail/3000&#39;)">Semen Padang</span><span class="ic_chart" onclick="changepage(&#39;sales_dashboard/trend/revenue/3000&#39;)" align="right"><i class="fa fa-bar-chart" aria-hidden="true"></i></span></a><a class="dropdown-item"><span onclick="changepage(&#39;sales_dashboard/revenue_detail/5000&#39;)">Semen Gresik</span><span class="ic_chart" onclick="changepage(&#39;sales_dashboard/trend/revenue/5000&#39;)" align="right"><i class="fa fa-bar-chart" aria-hidden="true"></i></span></a><a class="dropdown-item"><span onclick="changepage(&#39;sales_dashboard/revenue_detail/4000&#39;)">Semen Tonasa</span><span class="ic_chart" onclick="changepage(&#39;sales_dashboard/trend/revenue/4000&#39;)" align="right"><i class="fa fa-bar-chart" aria-hidden="true"></i></span></a><a class="dropdown-item"><span onclick="changepage(&#39;sales_dashboard/revenue_detail/6000&#39;)">Thang Long</span><span class="ic_chart" onclick="changepage(&#39;sales_dashboard/trend/revenue/6000&#39;)" align="right"><i class="fa fa-bar-chart" aria-hidden="true"></i></span></a></div></div>';
	$('#page_title').html("Sales Revenue");
	$('.find').click(function(){
		bulan = $('#month').val();
		tahun = $('#year').val();
		opco = $('#opco').val();
		var type="revenue_detail/";
		if(opco=="2000"){
			type="revenue/";
		}
		if(last_part!=opco){
			document.location.href = base_url+"sales_dashboard/"+type+opco;
		}else{
			view(bulan, tahun, opco);
		}
	});
	$(".typeProduct").click(function(){
		var type = $(this).attr("rel");
		if(bulan<=9){
			sbulan = '0'+bulan;
		}else{
			sbulan = bulan;
		};
		tableProv(sbulan, tahun, opco, type);
	});
	
	var cmpny = window.location.href,
	parts = cmpny.split("/"),
    last_part = parts[parts.length-1];
    if(last_part==2000){
    	last_part="";
    }
	$(".findchart").click(function(){
		document.location.href = base_url+"sales_dashboard/trend/revenue/"+last_part;
	});
});
