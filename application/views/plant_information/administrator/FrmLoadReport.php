	<style>
		.table thead>tr>th.vert-align{
				vertical-align: middle;
				text-align: center;
		}
			.table tbody>tr>td.vert-align
			{
				vertical-align: middle;
			}	
		.table tbody>tr.font12 , table thead>tr.font12{
			font-size:12px;
		}
		.table-responsive
			{
				overflow-x: auto;
			}
	</style>
<?php 
$input = $this->input->get('input'); 
if(!empty($input['tahun'])) {$input['tahun']= $input['tahun'];}else{ $input['tahun'] = date('Y');}
if(!empty($input['periode'])) {$input['periode']= $input['periode'];}else{ $input['periode'] = date('n');}
if($input['company'] == "Pdg"){
	$input['companyText'] = "<strong>Report Eksekutif Padang</strong>";
}elseif($input['company'] == "Grk"){
	$input['companyText'] = "<strong>Report Eksekutif Gresik</strong>";
}elseif($input['company'] == "Tns"){
	$input['companyText'] = "<strong>Report Eksekutif Tonasa</strong>";
}elseif($input['company'] == "Tlcc"){
	$input['companyText'] = "<strong>Report Eksekutif TLCC</strong>";
}
?>
	<ul class="nav nav-pills" style="padding-left:10px;padding-right:10px;">
		  <li role="presentation" ><a href="javascript:void(0);" class="active"><i class="fa fa-road fa-lg" style="margin-right:10px;"></i> Kiln Operation</a></li>
		  <li role="presentation" ><a href="javascript:void(0);"><i class="fa fa-shopping-basket fa-lg" style="margin-right:10px;"></i> Cement Operation</a></li>
		  <li role="presentation" ><a href="javascript:void(0);" ><i class="fa fa-wrench fa-lg" style="margin-right:10px;"></i> Kiln Efficiency</a></li>
		  <li role="presentation" ><a href="javascript:void(0);" ><i class="fa fa-fire fa-lg" style="margin-right:10px;"></i> Batu Bara</a></li>
		  <li class="pull-right" role="presentation" ><i class="fa fa-user-secret fa-lg" style="margin-right:10px;"></i> <?php echo $input['companyText'] ;?></li>
	</ul>
<div class="row">
  <div class="col-md-2">
		<?php
			if(!empty($MasterPlant)){
					foreach($MasterPlant as $rows){
						echo '<button type="button" class="btn btn-info" onclick="plantLink'.$input['company'].'('."'".$rows['value']."'".')" style="min-width:120px;">'.$rows['nama'].'</button>';
					}
			}
			echo '<button type="button" class="btn btn-success" style="min-width:150px; margin-top:15px;text-align: left;"><i class="fa fa-download" aria-hidden="true"></i>  Download Data</button>';
			echo '<button type="button" class="btn btn-primary" style="min-width:150px; margin-top:5px;text-align: left;"><i class="fa fa-upload" aria-hidden="true"></i> Upload Data</button>';
		?>
  </div>
  <div class="col-md-8" >
	<div class="table-responsive" style="height:450px;">
		<table border="1" style="width:100%" class="table table-hover table-bordered table-striped">
			<thead>
				<tr class="font12">
					<th class="vert-align">Tgl</th>
					<th class="vert-align">Ton Real</th>
					<th class="vert-align">Ton Design</th>
					<th class="vert-align">Ton Prognosa</th>
					<th class="vert-align">Ton Budget</th>
					<th class="vert-align">Accum Real</th>
					<th class="vert-align">Avg Real</th>
					<th class="vert-align">Accum Prognosa</th>
					<th class="vert-align">Accum Budget</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if(empty($input['periode'])){$input['periode'] = date('m');}
				if(empty($input['tahun'])){$input['tahun'] = date('Y');}
					for($i=1;$i <= 31 ;$i++ ){
						if(!empty($DataTerak[$i])){
						echo '<tr class="font12">';
							echo '<td class="vert-align">'.$i.'/'.$input['periode'].'/'.$input['tahun'].' </td>';
							echo '<td class="vert-align">'.$DataTerak[$i]['ton_real'].'</td>';
							echo '<td class="vert-align">'.$DataTerak[$i]['ton_design'].'</td>';
							echo '<td class="vert-align">'.$DataTerak[$i]['ton_prognosa'].'</td>';
							echo '<td class="vert-align">'.$DataTerak[$i]['ton_budget'].'</td>';
							echo '<td class="vert-align">'.$DataTerak[$i]['accum_real'].'</td>';
							echo '<td class="vert-align">'.$DataTerak[$i]['avg_real'].'</td>';
							echo '<td class="vert-align">'.$DataTerak[$i]['accum_prognosa'].'</td>';
							echo '<td class="vert-align">'.$DataTerak[$i]['accum_budget'].'</td>';
						echo '</tr>';}
					}
				?>
			</tbody>
		</table>
	</div>
  </div>
  <div class="col-md-2">
	<?php
		for($i=1;$i <= 12 ; $i++){
			echo '<button class="btn btn-default" type="button" id="'.$input['company'].'bulan_'.$i.'" onclick="Btn_periode'.$input['company'].'('.$i.')" style="min-width:120px;border:none;border-radius: 0 !important;">'.date("F", mktime(0, 0, 0, $i, 10)).'</button>';
		}
	?>
	<div class="btn-group" aria-label="First group" role="group">
		<?php
			for($i=	2016;$i <= date('Y') ; $i++){
				echo '<button class="btn btn-default" type="button" id="'.$input['company'].'Tahun_'.$i.'" onclick="Btn_Tahun'.$input['company'].'('.$i.')" style="min-width:120px;">'.$i.'</button>';
			}
		?>
	</div>
  </div>
</div>
<script>
	$(function(){
		$('#<?php echo $input['company']; ?>bulan_<?php if(!empty($input['periode'])) { echo $input['periode'];}else{echo date('n');} ?>').addClass('active btn-danger');
		$('#<?php echo $input['company']; ?>Tahun_<?php if(!empty($input['tahun'])) {echo $input['tahun'];}else{echo date('Y');} ?>').addClass('active btn-danger');
	});
	function Btn_periode<?php echo $input['company']; ?>(periode){
		$('#LoadC<?php echo $input['company']; ?>').load("<?php echo site_url('plant_administrator/LinkReport?input[company]='.$input['company'].'&input[tahun]='.$input['tahun'].'&input[periode]='); ?>"+periode);
		}
	function Btn_Tahun<?php echo $input['company']; ?>(tahun){
		$('#LoadC<?php echo $input['company']; ?>').load("<?php echo site_url('plant_administrator/LinkReport?input[company]='.$input['company'].'&input[periode]='.$input['periode'].'&input[tahun]='); ?>"+tahun);
	}
	function plantLink<?php echo $input['company']; ?>(plant){
		$('#LoadC<?php echo $input['company']; ?>').load("<?php echo site_url('plant_administrator/LinkReport?input[company]='.$input['company'].'&input[periode]='.$input['periode'].'&input[tahun]='.$input['tahun'].'&input[plant]='); ?>"+plant);
	}
</script>