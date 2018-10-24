<style>
	.fnt10{
		font-size:10px;
		font-weight:bold;
		text-align: center;
	}
		.noPadding{
			padding-top:1px;
			padding-left:1px;
			padding-right:1px;
			padding-bottom:1px;
			
	}
	.fnt14{
		font-size:24px;
		font-weight:bold;
		text-align: center;
	}
</style>
<script>
	$(function(){
	  $('#load_view').load("<?php echo site_url('plant_padang/emission_rev');?>");
	});
	setInterval(refreshQuote, 3000); //every 1 seconds

	function refreshQuote() {
	  $('#load_view').load("<?php echo site_url('plant_padang/emission_rev');?>");
	}
</script>
<div id="load_view" ></div>