<style>
.noPadding{
		padding-top:1px;
		padding-left:1px;
		padding-right:1px;
		padding-bottom:1px;
		
}
.cubesRun{
	height:110px;
	width:100%;
}
  
</style>
<script>
$(function(){
  $('#load_view').load("<?php echo site_url('plant_padang/overview_rev');?>");
});
setInterval(refreshQuote, 3000); //every 1 seconds

function refreshQuote() {
  $('#load_view').load("<?php echo site_url('plant_padang/overview_rev');?>");
}
</script>

<div id="load_view" ></div>