<style>
.noPadding{
		padding-top:1px;
		padding-left:1px;
		padding-right:1px;
		padding-bottom:1px;
}
.cubesRun{
	min-height:95px;
	width:100%;
	font-size:10px;
}
.PlantColor{
background: #C0C0C0;
}
</style>
<script>
	$(function (){
		$('#btn_prod_semen').click(function(){
			window.location.href = 'index.php/plant_gresik/prod_semen?tahun=2016';
		});	
		$('#btn_prod_lime').click(function(){
			window.location.href = 'index.php/plant_gresik/prod_lime';
		});
                $('#btn_prod_klin').click(function(){
			window.location.href = 'index.php/plant_gresik/klin_semen?tahun=2016';
		});
		$('#btn_prod_rawmix').click(function(){
			window.location.href = 'index.php/plant_gresik/prod_rawmix';
		});
		$('#btn_prod_silica').click(function(){
			window.location.href = 'index.php/plant_gresik/prod_silica';
		});
		$('#btn_prod_fineCoal').click(function(){
			window.location.href = 'index.php/plant_gresik/prod_fineCoal';
		});
		$('#btnChart').click(function(){
			window.location.href = 'index.php/plant_gresik/prod_fineCoal';
		});
		
	});
</script>
<div class="row">
	<div class="col-xs-3">
		<h4>Lime Stone Production</h4>
	</div>
	<div class="col-xs-6">
		<div class="btn-group">
<!--			<button class="btn btn-primary" aria-label="Left Align" id="btn_prod_lime" type="button">
				Lime Stone
			</button>
			<button class="btn btn-success" aria-label="Left Align" id="btn_prod_rawmix"  type="button">
				Raw Mix
			</button>-->
			<button class="btn btn-info" aria-label="Left Align" id="btn_prod_klin" type="button">
				Clinker
			</button>
<!--			<button class="btn btn-warning" aria-label="Left Align" id="btn_prod_silica" type="button">
				Silica Stone
			</button>
			<button class="btn btn-danger active" aria-label="Left Align" id="btn_prod_fineCoal" type="button">
				Fine Coal
			</button>-->
			<button class="btn btn-default " aria-label="Left Align" id="btn_prod_semen" type="button">
				Cement 
			</button>
		</div>
	</div>
	<div class="col-xs-3">
		 <button type="button" class="btn btn-default" id="btnChart"><i class="fa fa-area-chart" aria-hidden="true"></i></button>
	</div>
</div>

