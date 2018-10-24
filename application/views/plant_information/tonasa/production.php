<style>
.noPadding{
		padding-top:1px;
		padding-left:1px;
		padding-right:1px;
		padding-bottom:1px;
		
}
.cubesRun{
	min-height:250px;
}
</style>
<script>
	$(function (){
		$('#btn_prod_semen').click(function(){
			window.location.href = 'index.php/plant_tonasa/prod_semen?tahun=2016';
		});
	});
</script>
<div class="row">
	<div class="col-xs-3">
		<h4>Production Report</h4>
	</div>
	<div class="col-xs-9">
		<div class="btn-group">
			<button class="btn btn-primary" aria-label="Left Align" type="button">
				Lime Stone
			</button>
			<button class="btn btn-success" aria-label="Left Align" type="button">
				Raw Mix
			</button>
			<button class="btn btn-info" aria-label="Left Align" type="button">
				Clinker
			</button>
			<button class="btn btn-warning" aria-label="Left Align" type="button">
				Silica Stone
			</button>
			<button class="btn btn-danger" aria-label="Left Align" type="button">
				Fine Coal
			</button>
			<button class="btn btn-default" aria-label="Left Align" id="btn_prod_semen" type="button">
				Cement 
			</button>
		</div>
	</div>
</div>

	<div class="row">
		<div class="col-xs-4 img-thumbnail cubesRun">
			<center><strong>Lime Stone</strong></center>
			<div class="row">
				<div class="col-xs-12">
					<table class="table table-bordered" style="margin-bottom:5px;">
						<tr style="background:#777;color:#eee;font-size:12px;">
							<td align="center">Yesterday</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Target (Ton)
									</div>									
									<div class="col-xs-4" style="font-size:12px;">
										<?php $SumDate = date('t', mktime(0, 0, 0, date('m'), 1, date('Y')));
											 echo number_format($DProduction[date('n')]['lime'] / $SumDate); 
										?>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Realization (Ton)
									</div>
								</div>
							</td>
						</tr>
					</table>
					<table class="table table-bordered" style="margin-bottom:5px;">
						<tr style="background:#777;color:#eee;font-size:12px;">
							<td align="center">This Month</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Target (Ton)
									</div>									
									<div class="col-xs-4" style="font-size:12px;">
										<?php echo number_format($DProduction[date('n')]['lime']); ?>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Realization (Ton)
									</div>
								</div>
							</td>
						</tr>
					</table>
					<table class="table table-bordered" style="margin-bottom:5px;">
						<tr style="background:#777;color:#eee;font-size:12px;">
							<td align="center">This Year</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Target (Ton)
									</div>
									<div class="col-xs-4" style="font-size:12px;">
										<?php 
											for($i=1;$i <= 12 ; $i++){
												$SumLime[] = $DProduction[$i]['lime'];
											}
											echo number_format(array_sum($SumLime));
										?>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Realization (Ton)
									</div>
								</div>
							</td>
						</tr>
					</table>
				</div>
			</div> 
		</div> <!--Lime Stone -->
		<div class="col-xs-4 img-thumbnail cubesRun">
			<center><strong>Raw Mix</strong></center>
			<div class="row">
				<div class="col-xs-12">
					<table class="table table-bordered" style="margin-bottom:5px;">
						<tr style="background:#777;color:#eee;font-size:12px;">
							<td align="center">Yesterday</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Target (Ton)
									</div>
									<div class="col-xs-4" style="font-size:12px;">
										<?php  echo number_format($DProduction[date('n')]['rawmix'] / $SumDate); ?>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Realization (Ton)
									</div>
								</div>
							</td>
						</tr>
					</table>
					<table class="table table-bordered" style="margin-bottom:5px;">
						<tr style="background:#777;color:#eee;font-size:12px;">
							<td align="center">This Month</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Target (Ton)
									</div>
									<div class="col-xs-4" style="font-size:12px;">
										<?php echo number_format($DProduction[date('n')]['rawmix']); ?>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Realization (Ton)
									</div>
								</div>
							</td>
						</tr>
					</table>
					<table class="table table-bordered" style="margin-bottom:5px;">
						<tr style="background:#777;color:#eee;font-size:12px;">
							<td align="center">This Year</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Target (Ton)
									</div>
									<div class="col-xs-4" style="font-size:12px;">
										<?php 
											for($i=1;$i <= 12 ; $i++){
												$SumRawMix[] = $DProduction[$i]['rawmix'];
											}
											echo number_format(array_sum($SumRawMix));
										?>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Realization (Ton)
									</div>
								</div> 
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div><!--Raw Mix -->
		<div class="col-xs-4 img-thumbnail cubesRun">
			<center><strong>Clinker</strong></center>
			<div class="row">
				<div class="col-xs-12">
					<table class="table table-bordered" style="margin-bottom:5px;">
						<tr style="background:#777;color:#eee;font-size:12px;">
							<td align="center">Yesterday</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Target (Ton)
									</div>
									<div class="col-xs-4" style="font-size:12px;">
										<?php  echo number_format($DProduction[date('n')]['clinker'] / $SumDate); ?>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Realization (Ton)
									</div>
								</div>
							</td>
						</tr>
					</table>
					<table class="table table-bordered" style="margin-bottom:5px;">
						<tr style="background:#777;color:#eee;font-size:12px;">
							<td align="center">This Month</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Target (Ton)
									</div>
									<div class="col-xs-4" style="font-size:12px;">
										<?php echo number_format($DProduction[date('n')]['clinker']); ?>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Realization (Ton)
									</div>
								</div>
							</td>
						</tr>
					</table>
					<table class="table table-bordered" style="margin-bottom:5px;">
						<tr style="background:#777;color:#eee;font-size:12px;">
							<td align="center">This Year</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Target (Ton)
									</div>
									<div class="col-xs-4" style="font-size:12px;">
										<?php 
											for($i=1;$i <= 12 ; $i++){
												$SumClinker[] = $DProduction[$i]['clinker'];
											}
											echo number_format(array_sum($SumClinker));
										?>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Realization (Ton)
									</div>
								</div> 
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div><!--Clinker-->
	</div>
	<div class="row">
		<div class="col-xs-4 img-thumbnail cubesRun">
			<center><strong>Silica Stone</strong></center>
			<div class="row">
				<div class="col-xs-12">
					<table class="table table-bordered" style="margin-bottom:5px;">
						<tr style="background:#777;color:#eee;font-size:12px;">
							<td align="center">Yesterday</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Target (Ton)
									</div>
									<div class="col-xs-4" style="font-size:12px;">
										<?php  echo number_format($DProduction[date('n')]['silica'] / $SumDate); ?>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Realization (Ton)
									</div>
								</div>
							</td>
						</tr>
					</table>
					<table class="table table-bordered" style="margin-bottom:5px;">
						<tr style="background:#777;color:#eee;font-size:12px;">
							<td align="center">This Month</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Target (Ton)
									</div>
									<div class="col-xs-4" style="font-size:12px;">
										<?php echo number_format($DProduction[date('n')]['silica']); ?>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Realization (Ton)
									</div>
								</div>
							</td>
						</tr>
					</table>
					<table class="table table-bordered" style="margin-bottom:5px;">
						<tr style="background:#777;color:#eee;font-size:12px;">
							<td align="center">This Year</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Target (Ton)
									</div>
									<div class="col-xs-4" style="font-size:12px;">
										<?php 
											for($i=1;$i <= 12 ; $i++){
												$SumSilica[] = $DProduction[$i]['silica'];
											}
											echo number_format(array_sum($SumSilica));
										?>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Realization (Ton)
									</div>
								</div> 
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div><!--Silica Stone-->
		<div class="col-xs-4 img-thumbnail cubesRun">
			<center><strong>Fine Coal</strong></center>
			<div class="row">
				<div class="col-xs-12">
					<table class="table table-bordered" style="margin-bottom:5px;">
						<tr style="background:#777;color:#eee;font-size:12px;">
							<td align="center">Yesterday</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Target (Ton)
									</div>
									<div class="col-xs-4" style="font-size:12px;">
										<?php  echo number_format($DProduction[date('n')]['finecoal'] / $SumDate); ?>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Realization (Ton)
									</div>
								</div>
							</td>
						</tr>
					</table>
					<table class="table table-bordered" style="margin-bottom:5px;">
						<tr style="background:#777;color:#eee;font-size:12px;">
							<td align="center">This Month</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Target (Ton)
									</div>
									<div class="col-xs-4" style="font-size:12px;">
										<?php echo number_format($DProduction[date('n')]['finecoal']); ?>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Realization (Ton)
									</div>
								</div>
							</td>
						</tr>
					</table>
					<table class="table table-bordered" style="margin-bottom:5px;">
						<tr style="background:#777;color:#eee;font-size:12px;">
							<td align="center">This Year</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Target (Ton)
									</div>
									<div class="col-xs-4" style="font-size:12px;">
										<?php 
											for($i=1;$i <= 12 ; $i++){
												$SumFinecoal[] = $DProduction[$i]['finecoal'];
											}
											echo number_format(array_sum($SumFinecoal));
										?>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Realization (Ton)
									</div>
								</div> 
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div><!--Fine Coal -->
		<div class="col-xs-4 img-thumbnail cubesRun">
			<center><strong>Cement</strong></center>	
			<div class="row">
				<div class="col-xs-12">
					<table class="table table-bordered" style="margin-bottom:5px;">
						<tr style="background:#777;color:#eee;font-size:12px;">
							<td align="center">Yesterday</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Target (Ton)
									</div>
									<div class="col-xs-4" style="font-size:12px;">
										<?php  echo number_format($DProduction[date('n')]['cement'] / $SumDate); ?>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Realization (Ton)
									</div>
								</div>
							</td>
						</tr>
					</table>
					<table class="table table-bordered" style="margin-bottom:5px;">
						<tr style="background:#777;color:#eee;font-size:12px;">
							<td align="center">This Month</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Target (Ton)
									</div>
									<div class="col-xs-4" style="font-size:12px;">
										<?php echo number_format($DProduction[date('n')]['cement']); ?>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Realization (Ton)
									</div>
								</div>
							</td>
						</tr>
					</table>
					<table class="table table-bordered" style="margin-bottom:5px;">
						<tr style="background:#777;color:#eee;font-size:12px;">
							<td align="center">This Year</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Target (Ton)
									</div>
									<div class="col-xs-4" style="font-size:12px;">
										<?php 
											for($i=1;$i <= 12 ; $i++){
												$SumCement[] = $DProduction[$i]['cement'];
											}
											echo number_format(array_sum($SumCement));
										?>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-xs-4" style="font-size:8px;">
									Realization (Ton)
									</div>
								</div> 
							</td>
						</tr> 
					</table>
				</div>
			</div>
		</div><!--Cement-->
	</div>