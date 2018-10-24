<section id="content" class="income_statement">	
	<div class="centering add_fix">
		<div class="col-md-12 nopadding" style="background:#F8F8F8;padding-top: 6px">
			
			<div class="col-md-12 nopadding col-xs-12" style="padding: 0 20px 10px 20px;">
				<div class="col-md-2 nopadding col-xs-12">
					<!-- <span class="tittle_head" id="tittle_head">PR</span> -->
				</div>
				<div class="col-md-7 nopadding col-xs-12 finddata" align="center">
					<!-- Type
						<select id="opco" class="opco highlight_option chooseType">
							<option value="1" selected>Cement</option>
							<option value="2">Non Cement</option>
						</select>
						&nbsp;&nbsp; -->
					Month
						<select id="month" class="month highlight_option">
							<option value="1">January</option>
							<option value="2">February</option>
							<option value="3">March</option>
							<option value="4">April</option>
							<option value="5">May</option>
							<option value="6">June</option>
							<option value="7">July</option>
							<option value="8">August</option>
							<option value="9">September</option>
							<option value="10">Oktober</option>
							<option value="11">November</option>
							<option value="12">Desember</option>
						</select>&nbsp;&nbsp;
					Year
						<select id="year" class="year highlight_option">
							<option value="2014">2014</option>
							<option value="2015">2015</option>
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
						</select>&nbsp;&nbsp;&nbsp;
					<a class="highlight_option find" style="display: inline-block; margin-top: 8px; width: 60px;">
						<span>Find</span>
					</a>
				</div>
				<div class="col-md-3 nopadding col-xs-12 choosedata" align="right" style="padding-top: 10px">					
					
				</div>
			</div>
			<div class="col-md-12 nopadding scroll-block" style="padding: 10px 15px 12px 10px;height: 200px">
				<div class="col-md-6 nopadding col-xs-12" style="padding: 0 20px 12px 20px;">
					<div class="chart" id="trend1" style="min-height: 150px; width: 100%"></div>
				</div>
				<div class="col-md-6 nopadding col-xs-12" style="padding: 0 20px 12px 20px;">
					<div class="chart" id="trend2" style="min-height: 150px; width: 100%"></div>
				</div>
			</div>
			<div class="col-md-12 nopadding scroll-block" style="padding: 10px 15px 12px 10px;height: 200px">
				<div class="col-md-6 nopadding col-xs-12" style="padding: 0 20px 12px 20px;">
					<div class="chart" id="trend3" style="min-height: 150px; width: 100%"></div>
				</div>
				<div class="col-md-6 nopadding col-xs-12" style="padding: 0 20px 12px 20px;">
					<div class="chart" id="trend4" style="min-height: 150px; width: 100%"></div>
				</div>
			</div>
			<div class="col-md-12 nopadding scroll-block" style="padding: 10px 15px 12px 10px;height: 200px">
				<div class="col-md-6 nopadding col-xs-12" style="padding: 0 20px 12px 20px;">
					<div class="chart" id="trend5" style="min-height: 150px; width: 100%"></div>
				</div>
				<div class="col-md-6 nopadding col-xs-12" style="padding: 0 20px 12px 20px;">
					<div class="chart" id="trend6" style="min-height: 150px; width: 100%"></div>
				</div>
			</div>		
		</div>
	</div>

</section><!--/#content -->
<style type="text/css">
	.inc div b{font-size:20px;}
</style>
<script type="text/javascript" src="assets/js/modernizr-2.7.1.custom.js"></script>
<script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript" src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/bullet.js"></script>
<script src="assets/js/procurement_monthly.js"></script>
<script type="text/javascript">
	Highcharts.chart('trend1', {

    title: {
        text: 'Kurs Tengah BI (VND 1-)'
    },
    credits: {
      enabled: false
  	},
  	exporting: { 
  		enabled: false
  	},
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 2010
        }
    },

    series: [{
        name: 'Balance',
        data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
</script>
<script type="text/javascript">
	Highcharts.chart('trend2', {

    title: {
        text: 'Kurs Tengah BI (JPY 1-)'
    },
    credits: {
      enabled: false
  	},
  	exporting: { 
  		enabled: false
  	},
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 2010
        }
    },

    series: [{
        name: 'Balance',
        data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
</script>
<script type="text/javascript">
	Highcharts.chart('trend3', {

    title: {
        text: 'Kurs Tengah BI (DKK 1-)'
    },
    credits: {
      enabled: false
  	},
  	exporting: { 
  		enabled: false
  	},
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 2010
        }
    },

    series: [{
        name: 'Balance',
        data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
</script>
<script type="text/javascript">
	Highcharts.chart('trend4', {

    title: {
        text: 'Kurs Tengah BI (AUD 1-)'
    },
    credits: {
      enabled: false
  	},
  	exporting: { 
  		enabled: false
  	},
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 2010
        }
    },

    series: [{
        name: 'Balance',
        data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
</script>
<script type="text/javascript">
	Highcharts.chart('trend5', {

    title: {
        text: 'Kurs Tengah BI (SEK 1-)'
    },
    credits: {
      enabled: false
  	},
  	exporting: { 
  		enabled: false
  	},
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 2010
        }
    },

    series: [{
        name: 'Balance',
        data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
</script>
<script type="text/javascript">
	Highcharts.chart('trend6', {

    title: {
        text: 'Kurs Tengah BI (SGD 1-)'
    },
    credits: {
      enabled: false
  	},
  	exporting: { 
  		enabled: false
  	},
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 2010
        }
    },

    series: [{
        name: 'Balance',
        data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
</script>