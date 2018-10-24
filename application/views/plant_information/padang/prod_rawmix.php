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
			window.location.href = 'index.php/plant_padang/prod_semenChart';
		});
                $('#btn_prod_klin').click(function(){
			window.location.href = 'index.php/plant_padang/prod_klinker';
		});
		$('#btn_prod_lime').click(function(){
			window.location.href = 'index.php/plant_padang/prod_limeChart';
		});
		$('#btn_prod_rawmix').click(function(){
			window.location.href = 'index.php/plant_padang/prod_rawmix';
		});
		$('#btn_prod_silica').click(function(){
			window.location.href = 'index.php/plant_padang/prod_silicaChart';
		});
		$('#btn_prod_fineCoal').click(function(){
			window.location.href = 'index.php/plant_padang/prod_fineCoalChart';
		});
		$('#btnTable').click(function(){
			window.location.href = 'index.php/plant_padang/prod_silica';
		});
	});
</script>
<div class="row">
	<div class="col-xs-3">
		<h4>Raw Mix Production</h4>
	</div>
	<div class="col-xs-9">
		<div class="btn-group">
			<button class="btn btn-primary" aria-label="Left Align" id="btn_prod_lime" type="button">
				Lime Stone
			</button>
			<button class="btn btn-success" aria-label="Left Align" id="btn_prod_rawmix"  type="button">
				Raw Mix
			</button>
			<button class="btn btn-info" aria-label="Left Align" id="btn_prod_klin" type="button">
				Clinker
			</button>
			<button class="btn btn-warning active" aria-label="Left Align" id="btn_prod_silica" type="button">
				Silica Stone
			</button>
			<button class="btn btn-danger" aria-label="Left Align"id="btn_prod_fineCoal"  type="button">
				Fine Coal
			</button>
			<button class="btn btn-default " aria-label="Left Align" id="btn_prod_semen" type="button">
				Cement 
			</button>
		</div>
	</div>
</div>

<table class="table">
	<tr>
		<td style="padding:0px; border:none;">
			<div class="row">
				<div class="col-xs-3 noPadding" >
					<div class="img-thumbnail cubesRun" > 
						<div class="col-xs-3 noPadding" >SP</div>
						<div class="col-xs-9 noPadding" align="right">
							<?php 
								for($i=1;$i <= 12 ; $i++){
										$Sumlime[] = $DProduction[$i]['rawmix'];
									} 
								echo number_format(array_sum($Sumlime))." T";
							?>
						</div>
						&nbsp
					</div>
				</div>
			</div>
			
		</td>
	</tr>
	<tr>
		<td class="noline" style="padding:0px; border:none;">
			<div class="row">
				<div class="col-xs-3 noPadding" ><div class="img-thumbnail cubesRun" >IND I</div></div>
				<div class="col-xs-2 noPadding" >
					<div class="img-thumbnail cubesRun" >
						<div class="col-xs-7 noPadding" >
							<div class="col-xs-2 noPadding" align="center">Jan</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[1]['rawmix']); ?> T</div>
							<div class="col-xs-12 noPadding" align="center"><h4>000,00%</h4></div>
							<div class="col-xs-2 noPadding" align="center">Real</div>
						</div>
						<div class="col-xs-5 noPadding" align="right">
							<div class="col-xs-2 noPadding PlantColor" align="center">II</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[1]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">III</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[1]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">IV</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[1]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">V</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[1]['rawmix']); ?></div>
						</div> &nbsp
					</div>
				</div>
				<div class="col-xs-2 noPadding" >
					<div class="img-thumbnail cubesRun" >
						<div class="col-xs-7 noPadding" >
							<div class="col-xs-2 noPadding" align="center">Feb</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[2]['rawmix']); ?> T</div>
							<div class="col-xs-12 noPadding" align="center"><h4>000,00%</h4></div>
							<div class="col-xs-2 noPadding" align="center">Real</div>
						</div>
						<div class="col-xs-5 noPadding" align="right">
							<div class="col-xs-2 noPadding PlantColor" align="center">II</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[2]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">III</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[2]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">IV</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[2]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">V</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[2]['rawmix']); ?></div>
						</div> &nbsp
					</div>
				</div>
				<div class="col-xs-2 noPadding" >
					<div class="img-thumbnail cubesRun" >
						<div class="col-xs-7 noPadding" >
							<div class="col-xs-2 noPadding" align="center">Mar</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[3]['rawmix']); ?> T</div>
							<div class="col-xs-12 noPadding" align="center"><h4>000,00%</h4></div>
							<div class="col-xs-2 noPadding" align="center">Real</div>
						</div>
						<div class="col-xs-5 noPadding" align="right">
							<div class="col-xs-2 noPadding PlantColor" align="center">II</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[3]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">III</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[3]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">IV</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[3]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">V</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[3]['rawmix']); ?></div>
						</div> &nbsp
					</div>
				</div>
				<div class="col-xs-3 noPadding" ><div class="img-thumbnail cubesRun" >Q-1</div></div>
			</div>
		</td>
	</tr>
	<tr>
		<td style="padding:0px; border:none;">
			<div class="row">
				<div class="col-xs-3 noPadding" ><div class="img-thumbnail cubesRun" >IND III</div></div>
				<div class="col-xs-2 noPadding" >
					<div class="img-thumbnail cubesRun" >
						<div class="col-xs-7 noPadding" >
							<div class="col-xs-2 noPadding" align="center">Apr</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[4]['rawmix']); ?> T</div>
							<div class="col-xs-12 noPadding" align="center"><h4>000,00%</h4></div>
							<div class="col-xs-2 noPadding" align="center">Real</div>
						</div>
						<div class="col-xs-5 noPadding" align="right">
							<div class="col-xs-2 noPadding PlantColor" align="center">II</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[4]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">III</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[4]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">IV</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[4]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">V</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[4]['rawmix']); ?></div>
						</div> &nbsp
					</div>
				</div>
				<div class="col-xs-2 noPadding" >
					<div class="img-thumbnail cubesRun" >
						<div class="col-xs-7 noPadding" >
							<div class="col-xs-2 noPadding" align="center">May</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[5]['rawmix']); ?> T</div>
							<div class="col-xs-12 noPadding" align="center"><h4>000,00%</h4></div>
							<div class="col-xs-2 noPadding" align="center">Real</div>
						</div>
						<div class="col-xs-5 noPadding" align="right">
							<div class="col-xs-2 noPadding PlantColor" align="center">II</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[5]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">III</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[5]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">IV</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[5]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">V</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[5]['rawmix']); ?></div>
						</div> &nbsp
					</div>
				</div>
				<div class="col-xs-2 noPadding" >
					<div class="img-thumbnail cubesRun" >
						<div class="col-xs-7 noPadding" >
							<div class="col-xs-2 noPadding" align="center">Jun</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[6]['rawmix']); ?> T</div>
							<div class="col-xs-12 noPadding" align="center"><h4>000,00%</h4></div>
							<div class="col-xs-2 noPadding" align="center">Real</div>
						</div>
						<div class="col-xs-5 noPadding" align="right">
							<div class="col-xs-2 noPadding PlantColor" align="center">II</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[6]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">III</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[6]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">IV</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[6]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">V</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[6]['rawmix']); ?></div>
						</div> &nbsp
					</div>
				</div>
				<div class="col-xs-3 noPadding" ><div class="img-thumbnail cubesRun" >Q-2</div></div>
			</div>
		</td>
	</tr>
	<tr>
	<td class="noline" style="padding:0px; border:none;">
			<div class="row">
				<div class="col-xs-3 noPadding" ><div class="img-thumbnail cubesRun" >IND IV</div></div>
				<div class="col-xs-2 noPadding" >
				<div class="img-thumbnail cubesRun" >
						<div class="col-xs-7 noPadding" >
							<div class="col-xs-2 noPadding" align="center">Jul</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[7]['rawmix']); ?> T</div>
							<div class="col-xs-12 noPadding" align="center"><h4>000,00%</h4></div>
							<div class="col-xs-2 noPadding" align="center">Real</div>
						</div>
						<div class="col-xs-5 noPadding" align="right">
							<div class="col-xs-2 noPadding PlantColor" align="center">II</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[7]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">III</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[7]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">IV</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[7]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">V</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[7]['rawmix']); ?></div>
						</div> &nbsp
					</div>
				</div>
				<div class="col-xs-2 noPadding" >
					<div class="img-thumbnail cubesRun" >
						<div class="col-xs-7 noPadding" >
							<div class="col-xs-2 noPadding" align="center">Aug</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[8]['rawmix']); ?> T</div>
							<div class="col-xs-12 noPadding" align="center"><h4>000,00%</h4></div>
							<div class="col-xs-2 noPadding" align="center">Real</div>
						</div>
						<div class="col-xs-5 noPadding" align="right">
							<div class="col-xs-2 noPadding PlantColor" align="center">II</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[8]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">III</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[8]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">IV</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[8]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">V</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[8]['rawmix']); ?></div>
						</div> &nbsp
					</div>
				</div>
				<div class="col-xs-2 noPadding" >
					<div class="img-thumbnail cubesRun" >
						<div class="col-xs-7 noPadding" >
							<div class="col-xs-2 noPadding" align="center">Sep</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[9]['rawmix']); ?> T</div>
							<div class="col-xs-12 noPadding" align="center"><h4>000,00%</h4></div>
							<div class="col-xs-2 noPadding" align="center">Real</div>
						</div>
						<div class="col-xs-5 noPadding" align="right">
							<div class="col-xs-2 noPadding PlantColor" align="center">II</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[9]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">III</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[9]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">IV</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[9]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">V</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[9]['rawmix']); ?></div>
						</div> &nbsp
					</div>
				</div>
				<div class="col-xs-3 noPadding" ><div class="img-thumbnail cubesRun" >Q-3</div></div>
			</div>
		</td>
	</tr>
	<tr>
		<td style="padding:0px; border:none;">
			<div class="row">
				<div class="col-xs-3 noPadding" ><div class="img-thumbnail cubesRun" >IND V</div></div>
				<div class="col-xs-2 noPadding" >
					<div class="img-thumbnail cubesRun" >
						<div class="col-xs-7 noPadding" >
							<div class="col-xs-2 noPadding" align="center">Okt</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[10]['rawmix']); ?> T</div>
							<div class="col-xs-12 noPadding" align="center"><h4>000,00%</h4></div>
							<div class="col-xs-2 noPadding" align="center">Real</div>
						</div>
						<div class="col-xs-5 noPadding" align="right">
							<div class="col-xs-2 noPadding PlantColor" align="center">II</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[10]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">III</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[10]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">IV</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[10]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">V</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[10]['rawmix']); ?></div>
						</div> &nbsp
					</div>
				</div>
				<div class="col-xs-2 noPadding" >
					<div class="img-thumbnail cubesRun" >
						<div class="col-xs-7 noPadding" >
							<div class="col-xs-2 noPadding" align="center">Nov</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[11]['rawmix']); ?> T</div>
							<div class="col-xs-12 noPadding" align="center"><h4>000,00%</h4></div>
							<div class="col-xs-2 noPadding" align="center">Real</div>
						</div>
						<div class="col-xs-5 noPadding" align="right">
							<div class="col-xs-2 noPadding PlantColor" align="center">II</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[11]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">III</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[11]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">IV</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[11]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">V</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[11]['rawmix']); ?></div>
						</div> &nbsp
					</div>
				</div>
				<div class="col-xs-2 noPadding" >
					<div class="img-thumbnail cubesRun" >
						<div class="col-xs-7 noPadding" >
							<div class="col-xs-2 noPadding" align="center">Des</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[12]['rawmix']); ?> T</div>
							<div class="col-xs-12 noPadding" align="center"><h4>000,00%</h4></div>
							<div class="col-xs-2 noPadding" align="center">Real</div>
						</div>
						<div class="col-xs-5 noPadding" align="right">
							<div class="col-xs-2 noPadding PlantColor" align="center">II</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[12]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">III</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[12]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">IV</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[12]['rawmix']); ?></div>
							<div class="col-xs-2 noPadding PlantColor" align="center">V</div>
							<div class="col-xs-10 noPadding" align="right"><?php echo number_format($DProduction[12]['rawmix']); ?></div>
						</div> &nbsp
					</div>
				</div>
				<div class="col-xs-3 noPadding" ><div class="img-thumbnail cubesRun" >Q-4</div></div>
			</div>
		</td>
	</tr>
</table>	

