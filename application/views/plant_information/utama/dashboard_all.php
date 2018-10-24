<style>
.noPadding{
		padding-top:1px;
		padding-left:1px;
		padding-right:1px;
		padding-bottom:1px;
}
.cubesRun{
	min-height:98px;
	width: 100%;
	font-size:11px;
}
.cubesRun2{
    margin: auto;
    /*min-height:100px;*/
    width: 100%;
    font-size:11px;
    padding: 19px;
}
.PlantColor{
background: #C0C0C0;
}
</style>
<script>
	$(function (){
		$('#btn_prod_semen').click(function(){
			window.location.href = 'index.php/plant_tonasa/prod_semen?tahun=2016';
		});
                $('#btn_prod_klin').click(function(){
			window.location.href = 'index.php/plant_tonasa/klin_semen?tahun=2016';
		});
		$('#btn_prod_lime').click(function(){
			window.location.href = 'index.php/plant_tonasa/prod_limeChart';
		});
		$('#btn_prod_rawmix').click(function(){
			window.location.href = 'index.php/plant_tonasa/prod_rawmix';
		});
		$('#btn_prod_silica').click(function(){
			window.location.href = 'index.php/plant_tonasa/prod_silicaChart';
		});
		$('#btn_prod_fineCoal').click(function(){
			window.location.href = 'index.php/plant_tonasa/prod_fineCoalChart';
		});
		$('#btnTable').click(function(){
			window.location.href = 'index.php/plant_padang/prod_silica';
		});
	});
        function selectThn(){
            var thn = $('#tahun').val();
            window.location.href = 'index.php/plant_tonasa/prod_semen?tahun='+thn;
        }
</script>
<div class="row">
	<div class="col-xs-2">
		<h4>Cement Production</h4>
	</div>
	<div class="col-xs-6">
		<div class="btn-group">
<!--			<button class="btn btn-primary" aria-label="Left Align" id="btn_prod_lime" type="button">
				Lime Stone
			</button>
			<button class="btn btn-success" aria-label="Left Align" id="btn_prod_rawmix"  type="button">
				Raw Mix
			</button>-->
			<button class="btn btn-default" aria-label="Left Align" id="btn_prod_klin" type="button">
				Clinker
			</button>
<!--			<button class="btn btn-warning" aria-label="Left Align" id="btn_prod_silica" type="button">
				Silica Stone
			</button>
			<button class="btn btn-danger" aria-label="Left Align" id="btn_prod_fineCoal" type="button">
				Fine Coal
			</button>-->
			<button class="btn btn-info " aria-label="Left Align" id="btn_prod_semen" type="button">
				Cement 
			</button>
		</div>
	</div>
<!--	<div class="col-xs-3">
		 <button type="button" class="btn btn-default" id="btnChart"><i class="fa fa-area-chart" aria-hidden="true"></i></button>
	</div>
        <div class="col-xs-3">-->
            Year :
            <select name="tahun" id="tahun" onchange="selectThn()">
                <?php $thn = date("Y");
                    for($i = $thn ; $i <= $thn ; $i++){
                        echo '<option>'.$i.'</option>';
                    }
                ?>

            </select>
            <div  class="col-xs-3">
<?php $postgresql = $this->load->database('psqlsatu', TRUE);
		$Query = $postgresql->query("SELECT date_prod from plg_st_plant ORDER BY date_prod DESC LIMIT 1");
        ?>
</div>
</div>

<table border="0" width="100%">
    <tr>
        <td width="26%">
            <table width="100%">
                <tr>                    
                    <td style="padding:5px; border:1px;">
                        <div class="row">
                            <div class="col-xs-11 noPadding" >
                                <div class="img-thumbnail cubesRun" > 
                                    <div class="col-xs-3 noPadding" >SMIG</div>
                                    <div class="col-xs-9 noPadding" align="right">
                                             
                                        <div class="row-xs-2 noPadding" align="center" >
                                            
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-11 noPadding" >
                                <div class="img-thumbnail cubesRun" >                                    
							<div class="col-xs-3 noPadding">SG</div>
							<div class="col-xs-9 noPadding" align="right">
                                                            
                                                            <div class="row-xs-2 noPadding" align="center" >
                                                                
                                                            </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                    <div class="col-xs-11 noPadding" ><div class="img-thumbnail cubesRun" >
                                            
							<div class="col-xs-3 noPadding" >SP</div>
							<div class="col-xs-9 noPadding" align="right">
                                                            
                                                        <div class="row-xs-2 noPadding" align="center" >
                                                        
                                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-xs-11 noPadding" ><div class="img-thumbnail cubesRun" >
                                        
							<div class="col-xs-3 noPadding" >ST</div>
							<div class="col-xs-9 noPadding" align="right">
                                                        
                                                        <div class="row-xs-2 noPadding" align="center" >
                                                        
                                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-11 noPadding" >
                                <div class="img-thumbnail cubesRun" >
							<div class="col-xs-3 noPadding">TLCC</div>
							<div class="col-xs-9 noPadding" align="right">
                                                            
                                                            <div class="row-xs-2 noPadding" align="center" >
                                                                
                                                            </div>
                            </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
        <td width="*">
            <table width="100%">
                <tr>                    
                    <td style="padding:0px; border:1px;">
                        <div class="row">
                            <div class="col-xs-3 noPadding" >
                                <div class="img-thumbnail cubesRun2">
                                            <div class="col-xs-7 noPadding" >
                                                    <div class="col-xs-2 noPadding" align="center">Jan</div>
                                                    
                                                </div>
                                            <div class="col-xs-5 noPadding" align="right">
							<?php
                                                        $thn = $this->input->get('tahun');
                                                        $no=1;
                                                                if(!empty($myData["$thn-01"])){
                                                                    
                                                                    foreach(($myData["$thn-01"]) as $rows){
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">';
                                                                    if($no==1){echo'II';}elseif($no==2){echo'III';}elseif($no==3){echo'IV';}elseif($no==4){echo'V';}elseif($no==5){echo'DM';}
                                                                    echo '</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format($rows,0,",",".").' T</div>';
                                                                    $no++;
								}
                                                                } else {
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">II</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">III</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">IV</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">V</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                }
							?>
                                            </div> 
                                    </div>
                            </div>
				<div class="col-xs-3 noPadding" >
					<div class="img-thumbnail cubesRun2" >
						<div class="col-xs-7 noPadding" >
							<div class="col-xs-2 noPadding" align="center">Feb</div>
							
                                                </div>
                                            <div class="col-xs-5 noPadding" align="right">
							<?php
                                                        $thn = $this->input->get('tahun');
                                                        $no=1;
                                                                if(!empty($myData["$thn-02"])){
                                                                    
                                                                    foreach(($myData["$thn-02"]) as $rows){
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">';
                                                                    if($no==1){echo'II';}elseif($no==2){echo'III';}elseif($no==3){echo'IV';}elseif($no==4){echo'V';}elseif($no==5){echo'DM';}
                                                                    echo '</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format($rows,0,",",".").' T</div>';
                                                                    $no++;
								}
                                                                } else {
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">II</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">III</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">IV</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">V</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                }
							?>
						</div>
					</div>
				</div>
				<div class="col-xs-3 noPadding" >
					<div class="img-thumbnail cubesRun2" >
						<div class="col-xs-7 noPadding" >
							<div class="col-xs-2 noPadding" align="center">Mar</div>
							
                                                </div>
                                            <div class="col-xs-5 noPadding" align="right">
							<?php
                                                        $thn = $this->input->get('tahun');
                                                        $no=1;
                                                                if(!empty($myData["$thn-03"])){
                                                                    
                                                                    foreach(($myData["$thn-03"]) as $rows){
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">';
                                                                    if($no==1){echo'II';}elseif($no==2){echo'III';}elseif($no==3){echo'IV';}elseif($no==4){echo'V';}elseif($no==5){echo'DM';}
                                                                    echo '</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format($rows,0,",",".").' T</div>';
                                                                    $no++;
								}
                                                                } else {
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">II</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">III</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">IV</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">V</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                }
							?>
						</div> 
					</div>
				</div>
				<div class="col-xs-3 noPadding" >
					<div class="img-thumbnail cubesRun2" >
						<div class="col-xs-7 noPadding" >
							<div class="col-xs-2 noPadding" align="center">Q-1</div>
							<div class="col-xs-10 noPadding" align="right">
							<div class="row-xs-2 noPadding" align="center" style="font-size:12px; font-weight:bold;" >
                                                        
                                                        </div>
						</div>
						<div class="col-xs-5 noPadding" align="right">
                                                    <?php
                                                                $thn = $this->input->get('tahun');
                                                                $tot_tns2 = (($myData["$thn-01"]['tonasa2']) + ($myData["$thn-02"]['tonasa2']) + ($myData["$thn-03"]['tonasa2']));
                                                                $tot_tns3 = (($myData["$thn-01"]['tonasa3']) + ($myData["$thn-02"]['tonasa3']) + ($myData["$thn-03"]['tonasa3']));
                                                                $tot_tns4 = (($myData["$thn-01"]['tonasa4']) + ($myData["$thn-02"]['tonasa4']) + ($myData["$thn-03"]['tonasa4']));
                                                                $tot_tns5 = (($myData["$thn-01"]['tonasa5']) + ($myData["$thn-02"]['tonasa5']) + ($myData["$thn-03"]['tonasa5']));
                                                                
                                                                $no=1;
                                                                if(!empty($myData)){
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">II</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format($tot_tns2,0,",",".").' T</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">III</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format($tot_tns3,0,",",".").' T</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">IV</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format($tot_tns4,0,",",".").' T</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">V</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format($tot_tns5,0,",",".").' T</div>';
								} else {
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">II</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">III</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">IV</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">V</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                }
							?>
						</div> 
					</div>
				</div>
                        </div>
                        <div class="row">
                            <div class="col-xs-3 noPadding" >
                                <div class="img-thumbnail cubesRun2" >
                                        <div class="col-xs-7 noPadding" >
                                                <div class="col-xs-2 noPadding" align="center">Apr</div>
                                                <?php $thn = $this->input->get('tahun');
                                                        if (!empty($DProduction[4]['cement']))
                                                        {
                                                            echo '<div class="col-xs-10 noPadding" align="right">'.number_format($DProduction[4]['cement']).' T</div>';
                                                        } else {
                                                            echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0).' T</div>';
                                                        }
                                                        ?>
                                                        <?php 
                                                        if (!empty($myData["$thn-04"]) && !empty($DProduction[4]['cement'])){
                                                            $hasil_apr = (array_sum($myData["$thn-04"]))/ ($DProduction[4]['cement']) * 100;
                                                                if ($hasil_apr < 100) {
                                                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>'.number_format($hasil_apr,2,",",".").'%</h4></div>';
                                                            } else {
                                                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>'.number_format($hasil_apr,2,",",".").'%</h4></div>';
                                                            }
                                                            echo '<div class="row-xs-2 noPadding" align="center" style="font-size:12px; font-weight:bold;" >'.number_format (array_sum($myData["$thn-04"])).'</div>';
                                                        } else {
                                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>'.number_format(0,2,",",".").'%</h4></div>';
                                                            echo '<div class="row-xs-2 noPadding" align="center" style="font-size:12px; font-weight:bold;" >'.number_format(0,2,",",".").'</div>';
                                                        }
                                                        ?>
                                                </div>
                                            <div class="col-xs-5 noPadding" align="right">
							<?php
                                                        $thn = $this->input->get('tahun');
                                                        $no=1;
                                                                if(!empty($myData["$thn-04"])){
                                                                    
                                                                    foreach(($myData["$thn-04"]) as $rows){
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">';
                                                                    if($no==1){echo'II';}elseif($no==2){echo'III';}elseif($no==3){echo'IV';}elseif($no==4){echo'V';}elseif($no==5){echo'DM';}
                                                                    echo '</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format($rows,0,",",".").' T</div>';
                                                                    $no++;
								}
                                                                } else {
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">II</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">III</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">IV</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">V</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                }
							?>
                                        </div> 
                                </div> 
                            </div>
				<div class="col-xs-3 noPadding" >
					<div class="img-thumbnail cubesRun2" >
						<div class="col-xs-7 noPadding" >
							<div class="col-xs-2 noPadding" align="center">May</div>
							<?php $thn = $this->input->get('tahun');
                                                        if (!empty($DProduction[5]['cement']))
                                                        {
                                                            echo '<div class="col-xs-10 noPadding" align="right">'.number_format($DProduction[5]['cement']).' T</div>';
                                                        } else {
                                                            echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0).' T</div>';
                                                        }
                                                        ?>
                                                        <?php 
                                                        if (!empty($myData["$thn-05"]) && !empty($DProduction[5]['cement'])){
                                                            $hasil_may = (array_sum($myData["$thn-05"]))/ ($DProduction[5]['cement']) * 100;
                                                                if ($hasil_may < 100) {
                                                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>'.number_format($hasil_may,2,",",".").'%</h4></div>';
                                                            } else {
                                                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>'.number_format($hasil_may,2,",",".").'%</h4></div>';
                                                            }
                                                            echo '<div class="row-xs-2 noPadding" align="center" style="font-size:12px; font-weight:bold;" >'.number_format (array_sum($myData["$thn-05"])).'</div>';
                                                        } else {
                                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>'.number_format(0,2,",",".").'%</h4></div>';
                                                            echo '<div class="row-xs-2 noPadding" align="center" style="font-size:12px; font-weight:bold;" >'.number_format(0,2,",",".").'</div>';
                                                        }
                                                        ?>
                                                </div>
                                            <div class="col-xs-5 noPadding" align="right">
							<?php
                                                        $thn = $this->input->get('tahun');
                                                        $no=1;
                                                                if(!empty($myData["$thn-05"])){
                                                                    
                                                                    foreach(($myData["$thn-05"]) as $rows){
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">';
                                                                    if($no==1){echo'II';}elseif($no==2){echo'III';}elseif($no==3){echo'IV';}elseif($no==4){echo'V';}elseif($no==5){echo'DM';}
                                                                    echo '</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format($rows,0,",",".").' T</div>';
                                                                    $no++;
								}
                                                                } else {
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">II</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">III</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">IV</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">V</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                }
							?>
						</div> 
					</div>
				</div>
				<div class="col-xs-3 noPadding" >
					<div class="img-thumbnail cubesRun2" >
						<div class="col-xs-7 noPadding" >
							<div class="col-xs-2 noPadding" align="center">Jun</div>
							<?php $thn = $this->input->get('tahun');
                                                        if (!empty($DProduction[6]['cement']))
                                                        {
                                                            echo '<div class="col-xs-10 noPadding" align="right">'.number_format($DProduction[6]['cement']).' T</div>';
                                                        } else {
                                                            echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0).' T</div>';
                                                        }
                                                        ?>
                                                        <?php 
                                                        if (!empty($myData["$thn-06"]) && !empty($DProduction[6]['cement'])){
                                                            $hasil_jun = (array_sum($myData["$thn-06"]))/ ($DProduction[6]['cement']) * 100;
                                                                if ($hasil_jun < 100) {
                                                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>'.number_format($hasil_jun,2,",",".").'%</h4></div>';
                                                            } else {
                                                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>'.number_format($hasil_jun,2,",",".").'%</h4></div>';
                                                            }
                                                            echo '<div class="row-xs-2 noPadding" align="center" style="font-size:12px; font-weight:bold;" >'.number_format (array_sum($myData["$thn-06"])).'</div>';
                                                        } else {
                                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>'.number_format(0,2,",",".").'%</h4></div>';
                                                            echo '<div class="row-xs-2 noPadding" align="center" style="font-size:12px; font-weight:bold;" >'.number_format(0,2,",",".").'</div>';
                                                        }
                                                        ?>
                                                </div>
                                            <div class="col-xs-5 noPadding" align="right">
							<?php
                                                        $thn = $this->input->get('tahun');
                                                        $no=1;
                                                                if(!empty($myData["$thn-06"])){
                                                                    
                                                                    foreach(($myData["$thn-06"]) as $rows){
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">';
                                                                    if($no==1){echo'II';}elseif($no==2){echo'III';}elseif($no==3){echo'IV';}elseif($no==4){echo'V';}elseif($no==5){echo'DM';}
                                                                    echo '</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format($rows,0,",",".").' T</div>';
                                                                    $no++;
								}
                                                                } else {
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">II</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">III</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">IV</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">V</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                }
							?>
						</div> 
					</div>
				</div>
				<div class="col-xs-3 noPadding" >
					<div class="img-thumbnail cubesRun2" >
						<div class="col-xs-7 noPadding" >
							<div class="col-xs-2 noPadding" align="center">Q-2</div>
							<div class="col-xs-10 noPadding" align="right"><?php 
                                                        $total_upto_q2 = (array_sum(($myData["$thn-04"]))) + (array_sum(($myData["$thn-05"]))) + (array_sum(($myData["$thn-06"])));
                                                        $total_rkap_q2 = ($DProduction[4]['cement']) + ($DProduction[5]['cement']) + ($DProduction[6]['cement']); 
                                                        echo number_format($total_rkap_q2)?> T</div>
                                                        <?php $hasil_q2 = ($total_upto_q2 / $total_rkap_q2) * 100;
                                                        if ($hasil_q2 < 100) {
                                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>'.number_format($hasil_q2,2,",",".").'%</h4></div>';
                                                        } else {
                                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>'.number_format($hasil_q2,2,",",".").'%</h4></div>';
                                                        }
                                                        ?>
							<div class="row-xs-2 noPadding" align="center" style="font-size:12px; font-weight:bold;" ><?php echo number_format($total_upto_q2) ?></div>
						</div>
						<div class="col-xs-5 noPadding" align="right">
                                                    <?php
                                                                $thn = $this->input->get('tahun');
                                                                $tot_tns2 = (($myData["$thn-04"]['tonasa2']) + ($myData["$thn-05"]['tonasa2']) + ($myData["$thn-06"]['tonasa2']));
                                                                $tot_tns3 = (($myData["$thn-04"]['tonasa3']) + ($myData["$thn-05"]['tonasa3']) + ($myData["$thn-06"]['tonasa3']));
                                                                $tot_tns4 = (($myData["$thn-04"]['tonasa4']) + ($myData["$thn-05"]['tonasa4']) + ($myData["$thn-06"]['tonasa4']));
                                                                $tot_tns5 = (($myData["$thn-04"]['tonasa5']) + ($myData["$thn-05"]['tonasa5']) + ($myData["$thn-06"]['tonasa5']));
                                                                
                                                                $no=1;
                                                                if(!empty($myData)){
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">II</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format($tot_tns2,0,",",".").' T</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">III</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format($tot_tns3,0,",",".").' T</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">IV</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format($tot_tns4,0,",",".").' T</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">V</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format($tot_tns5,0,",",".").' T</div>';
								} else {
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">II</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">III</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">IV</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">V</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                }
							?>
						</div> 
					</div>
				</div>
                        </div>
                        <div class="row"> 
                            <div class="col-xs-3 noPadding" >
				<div class="img-thumbnail cubesRun2" >
						<div class="col-xs-7 noPadding" >
							<div class="col-xs-2 noPadding" align="center">Jul</div>
							<?php $thn = $this->input->get('tahun');
                                                        if (!empty($DProduction[7]['cement']))
                                                        {
                                                            echo '<div class="col-xs-10 noPadding" align="right">'.number_format($DProduction[7]['cement']).' T</div>';
                                                        } else {
                                                            echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0).' T</div>';
                                                        }
                                                        ?>
                                                        <?php 
                                                        if (!empty($myData["$thn-07"]) && !empty($DProduction[7]['cement'])){
                                                            $hasil_jul = (array_sum($myData["$thn-07"]))/ ($DProduction[7]['cement']) * 100;
                                                                if ($hasil_jul < 100) {
                                                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>'.number_format($hasil_jul,2,",",".").'%</h4></div>';
                                                            } else {
                                                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>'.number_format($hasil_jul,2,",",".").'%</h4></div>';
                                                            }
                                                            echo '<div class="row-xs-2 noPadding" align="center" style="font-size:12px; font-weight:bold;" >'.number_format (array_sum($myData["$thn-07"])).'</div>';
                                                        } else {
                                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>'.number_format(0,2,",",".").'%</h4></div>';
                                                            echo '<div class="row-xs-2 noPadding" align="center" style="font-size:12px; font-weight:bold;" >'.number_format(0,2,",",".").'</div>';
                                                        }
                                                        ?>
                                                </div>
                                            <div class="col-xs-5 noPadding" align="right">
							<?php
                                                        $thn = $this->input->get('tahun');
                                                        $no=1;
                                                                if(!empty($myData["$thn-07"])){
                                                                    
                                                                    foreach(($myData["$thn-07"]) as $rows){
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">';
                                                                    if($no==1){echo'II';}elseif($no==2){echo'III';}elseif($no==3){echo'IV';}elseif($no==4){echo'V';}elseif($no==5){echo'DM';}
                                                                    echo '</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format($rows,0,",",".").' T</div>';
                                                                    $no++;
								}
                                                                } else {
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">II</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">III</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">IV</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">V</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                }
							?>
						</div> 
					</div>
				</div>
				<div class="col-xs-3 noPadding" >
					<div class="img-thumbnail cubesRun2" >
						<div class="col-xs-7 noPadding" >
							<div class="col-xs-2 noPadding" align="center">Aug</div>
							<?php $thn = $this->input->get('tahun');
                                                        if (!empty($DProduction[8]['cement']))
                                                        {
                                                            echo '<div class="col-xs-10 noPadding" align="right">'.number_format($DProduction[8]['cement']).' T</div>';
                                                        } else {
                                                            echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0).' T</div>';
                                                        }
                                                        ?>
                                                        <?php 
                                                        if (!empty($myData["$thn-08"]) && !empty($DProduction[8]['cement'])){
                                                            $hasil_aug = (array_sum($myData["$thn-08"]))/ ($DProduction[8]['cement']) * 100;
                                                                if ($hasil_aug < 100) {
                                                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>'.number_format($hasil_aug,2,",",".").'%</h4></div>';
                                                            } else {
                                                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>'.number_format($hasil_aug,2,",",".").'%</h4></div>';
                                                            }
                                                            echo '<div class="row-xs-2 noPadding" align="center" style="font-size:12px; font-weight:bold;" >'.number_format (array_sum($myData["$thn-08"])).'</div>';
                                                        } else {
                                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>'.number_format(0,2,",",".").'%</h4></div>';
                                                            echo '<div class="row-xs-2 noPadding" align="center" style="font-size:12px; font-weight:bold;" >'.number_format(0,2,",",".").'</div>';
                                                        }
                                                        ?>
                                                </div>
                                            <div class="col-xs-5 noPadding" align="right">
							<?php
                                                        $thn = $this->input->get('tahun');
                                                        $no=1;
                                                                if(!empty($myData["$thn-08"])){
                                                                    
                                                                    foreach(($myData["$thn-08"]) as $rows){
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">';
                                                                    if($no==1){echo'II';}elseif($no==2){echo'III';}elseif($no==3){echo'IV';}elseif($no==4){echo'V';}elseif($no==5){echo'DM';}
                                                                    echo '</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format($rows,0,",",".").' T</div>';
                                                                    $no++;
								}
                                                                } else {
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">II</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">III</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">IV</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">V</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                }
							?>
						</div> 
					</div>
				</div>
				<div class="col-xs-3 noPadding" >
					<div class="img-thumbnail cubesRun2" >
						<div class="col-xs-7 noPadding" >
							<div class="col-xs-2 noPadding" align="center">Sep</div>
							<?php $thn = $this->input->get('tahun');
                                                        if (!empty($DProduction[9]['cement']))
                                                        {
                                                            echo '<div class="col-xs-10 noPadding" align="right">'.number_format($DProduction[9]['cement']).' T</div>';
                                                        } else {
                                                            echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0).' T</div>';
                                                        }
                                                        ?>
                                                        <?php 
                                                        if (!empty($myData["$thn-09"]) && !empty($DProduction[9]['cement'])){
                                                            $hasil_sep = (array_sum($myData["$thn-09"]))/ ($DProduction[9]['cement']) * 100;
                                                                if ($hasil_sep < 100) {
                                                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>'.number_format($hasil_sep,2,",",".").'%</h4></div>';
                                                            } else {
                                                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>'.number_format($hasil_sep,2,",",".").'%</h4></div>';
                                                            }
                                                            echo '<div class="row-xs-2 noPadding" align="center" style="font-size:12px; font-weight:bold;" >'.number_format (array_sum($myData["$thn-09"])).'</div>';
                                                        } else {
                                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>'.number_format(0,2,",",".").'%</h4></div>';
                                                            echo '<div class="row-xs-2 noPadding" align="center" style="font-size:12px; font-weight:bold;" >'.number_format(0,2,",",".").'</div>';
                                                        }
                                                        ?>
                                                </div>
                                            <div class="col-xs-5 noPadding" align="right">
							<?php
                                                        $thn = $this->input->get('tahun');
                                                        $no=1;
                                                                if(!empty($myData["$thn-09"])){
                                                                    
                                                                    foreach(($myData["$thn-09"]) as $rows){
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">';
                                                                    if($no==1){echo'II';}elseif($no==2){echo'III';}elseif($no==3){echo'IV';}elseif($no==4){echo'V';}elseif($no==5){echo'DM';}
                                                                    echo '</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format($rows,0,",",".").' T</div>';
                                                                    $no++;
								}
                                                                } else {
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">II</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">III</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">IV</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">V</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                }
							?>
						</div> 
					</div>
				</div>
				<div class="col-xs-3 noPadding" >
					<div class="img-thumbnail cubesRun2" >
						<div class="col-xs-7 noPadding" >
							<div class="col-xs-2 noPadding" align="center">Q-3</div>
							<div class="col-xs-10 noPadding" align="right"><?php 
                                                        $total_upto_q3 = (array_sum(($myData["$thn-07"]))) + (array_sum(($myData["$thn-08"])));// + (array_sum(($myData["$thn-09"])));
                                                        $total_rkap_q3 = ($DProduction[7]['cement']) + ($DProduction[8]['cement']);// + ($DProduction[9]['cement']); 
                                                        echo number_format($total_rkap_q3)?> T</div>
                                                        <?php $hasil_q3 = ($total_upto_q3 / $total_rkap_q3) * 100;
                                                        if ($hasil_q3 < 100) {
                                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>'.number_format($hasil_q3,2,",",".").'%</h4></div>';
                                                        } else {
                                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>'.number_format($hasil_q3,2,",",".").'%</h4></div>';
                                                        }
                                                        ?>
							<div class="row-xs-2 noPadding" align="center" style="font-size:12px; font-weight:bold;" ><?php echo number_format($total_upto_q3) ?></div>
						</div>
						<div class="col-xs-5 noPadding" align="right">
                                                    <?php
                                                                $thn = $this->input->get('tahun');
                                                                $tot_tns2 = (($myData["$thn-07"]['tonasa2']) + ($myData["$thn-08"]['tonasa2']));// + ($myData["$thn-09"]['tonasa2']));
                                                                $tot_tns3 = (($myData["$thn-07"]['tonasa3']) + ($myData["$thn-08"]['tonasa3']));// + ($myData["$thn-09"]['tonasa3']));
                                                                $tot_tns4 = (($myData["$thn-07"]['tonasa4']) + ($myData["$thn-08"]['tonasa4']));// + ($myData["$thn-09"]['tonasa4']));
                                                                $tot_tns5 = (($myData["$thn-07"]['tonasa5']) + ($myData["$thn-08"]['tonasa5']));// + ($myData["$thn-09"]['tonasa5']));
                                                                
                                                                $no=1;
                                                                if(!empty($myData)){
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">II</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format($tot_tns2,0,",",".").' T</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">III</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format($tot_tns3,0,",",".").' T</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">IV</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format($tot_tns4,0,",",".").' T</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">V</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format($tot_tns5,0,",",".").' T</div>';
								} else {
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">II</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">III</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">IV</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">V</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                }
							?>
						</div> 
					</div>
				</div>                           
                        </div>
                        <div class="row">  
				<div class="col-xs-3 noPadding" >
					<div class="img-thumbnail cubesRun2" >
						<div class="col-xs-7 noPadding" >
							<div class="col-xs-2 noPadding" align="center">Oct</div>
							<?php $thn = $this->input->get('tahun');
                                                        if (!empty($DProduction[10]['cement']))
                                                        {
                                                            echo '<div class="col-xs-10 noPadding" align="right">'.number_format($DProduction[10]['cement']).' T</div>';
                                                        } else {
                                                            echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0).' T</div>';
                                                        }
                                                        ?>
                                                        <?php 
                                                        if (!empty($myData["$thn-10"]) && !empty($DProduction[10]['cement'])){
                                                            $hasil_oct = (array_sum($myData["$thn-10"]))/ ($DProduction[10]['cement']) * 100;
                                                                if ($hasil_oct < 100) {
                                                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>'.number_format($hasil_oct,2,",",".").'%</h4></div>';
                                                            } else {
                                                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>'.number_format($hasil_oct,2,",",".").'%</h4></div>';
                                                            }
                                                            echo '<div class="row-xs-2 noPadding" align="center" style="font-size:12px; font-weight:bold;" >'.number_format (array_sum($myData["$thn-10"])).'</div>';
                                                        } else {
                                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>'.number_format(0,2,",",".").'%</h4></div>';
                                                            echo '<div class="row-xs-2 noPadding" align="center" style="font-size:12px; font-weight:bold;" >'.number_format(0,2,",",".").'</div>';
                                                        }
                                                        ?>
                                                </div>
                                            <div class="col-xs-5 noPadding" align="right">
							<?php
                                                        $thn = $this->input->get('tahun');
                                                        $no=1;
                                                                if(!empty($myData["$thn-10"])){
                                                                    
                                                                    foreach(($myData["$thn-10"]) as $rows){
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">';
                                                                    if($no==1){echo'II';}elseif($no==2){echo'III';}elseif($no==3){echo'IV';}elseif($no==4){echo'V';}elseif($no==5){echo'DM';}
                                                                    echo '</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format($rows,0,",",".").' T</div>';
                                                                    $no++;
								}
                                                                } else {
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">II</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">III</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">IV</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">V</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                }
							?>
						</div> 
					</div>
				</div>
				<div class="col-xs-3 noPadding" >
					<div class="img-thumbnail cubesRun2" >
						<div class="col-xs-7 noPadding" >
							<div class="col-xs-2 noPadding" align="center">Nov</div>
							<?php $thn = $this->input->get('tahun');
                                                        if (!empty($DProduction[11]['cement']))
                                                        {
                                                            echo '<div class="col-xs-10 noPadding" align="right">'.number_format($DProduction[11]['cement']).' T</div>';
                                                        } else {
                                                            echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0).' T</div>';
                                                        }
                                                        ?>
                                                        <?php 
                                                        if (!empty($myData["$thn-11"]) && !empty($DProduction[11]['cement'])){
                                                            $hasil_nov = (array_sum($myData["$thn-11"]))/ ($DProduction[11]['cement']) * 100;
                                                                if ($hasil_nov < 100) {
                                                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>'.number_format($hasil_nov,2,",",".").'%</h4></div>';
                                                            } else {
                                                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>'.number_format($hasil_nov,2,",",".").'%</h4></div>';
                                                            }
                                                            echo '<div class="row-xs-2 noPadding" align="center" style="font-size:12px; font-weight:bold;" >'.number_format (array_sum($myData["$thn-11"])).'</div>';
                                                        } else {
                                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>'.number_format(0,2,",",".").'%</h4></div>';
                                                            echo '<div class="row-xs-2 noPadding" align="center" style="font-size:12px; font-weight:bold;" >'.number_format(0,2,",",".").'</div>';
                                                        }
                                                        ?>
                                                </div>
                                            <div class="col-xs-5 noPadding" align="right">
							<?php
                                                        $thn = $this->input->get('tahun');
                                                        $no=1;
                                                                if(!empty($myData["$thn-11"])){
                                                                    
                                                                    foreach(($myData["$thn-11"]) as $rows){
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">';
                                                                    if($no==1){echo'II';}elseif($no==2){echo'III';}elseif($no==3){echo'IV';}elseif($no==4){echo'V';}elseif($no==5){echo'DM';}
                                                                    echo '</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format($rows,0,",",".").' T</div>';
                                                                    $no++;
								}
                                                                } else {
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">II</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">III</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">IV</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">V</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                }
							?>
						</div> 
					</div>
				</div>
				<div class="col-xs-3 noPadding" >
					<div class="img-thumbnail cubesRun2" >
						<div class="col-xs-7 noPadding" >
							<div class="col-xs-2 noPadding" align="center">Des</div>
							<?php $thn = $this->input->get('tahun');
                                                        if (!empty($DProduction[12]['cement']))
                                                        {
                                                            echo '<div class="col-xs-10 noPadding" align="right">'.number_format($DProduction[12]['cement']).' T</div>';
                                                        } else {
                                                            echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0).' T</div>';
                                                        }
                                                        ?>
                                                        <?php 
                                                        if (!empty($myData["$thn-12"]) && !empty($DProduction[12]['cement'])){
                                                            $hasil_dec = (array_sum($myData["$thn-12"]))/ ($DProduction[12]['cement']) * 100;
                                                                if ($hasil_dec < 100) {
                                                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>'.number_format($hasil_dec,2,",",".").'%</h4></div>';
                                                            } else {
                                                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>'.number_format($hasil_dec,2,",",".").'%</h4></div>';
                                                            }
                                                            echo '<div class="row-xs-2 noPadding" align="center" style="font-size:12px; font-weight:bold;" >'.number_format (array_sum($myData["$thn-12"])).'</div>';
                                                        } else {
                                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>'.number_format(0,2,",",".").'%</h4></div>';
                                                            echo '<div class="row-xs-2 noPadding" align="center" style="font-size:12px; font-weight:bold;" >'.number_format(0,2,",",".").'</div>';
                                                        }
                                                        ?>
                                                </div>
                                            <div class="col-xs-5 noPadding" align="right">
							<?php
                                                        $thn = $this->input->get('tahun');
                                                        $no=1;
                                                                if(!empty($myData["$thn-12"])){
                                                                    
                                                                    foreach(($myData["$thn-12"]) as $rows){
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">';
                                                                    if($no==1){echo'II';}elseif($no==2){echo'III';}elseif($no==3){echo'IV';}elseif($no==4){echo'V';}elseif($no==5){echo'DM';}
                                                                    echo '</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format($rows,0,",",".").' T</div>';
                                                                    $no++;
								}
                                                                } else {
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">II</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">III</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">IV</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">V</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                }
							?>
						</div> 
					</div>
				</div>
                            <div class="col-xs-3 noPadding" >
                                <div class="img-thumbnail cubesRun2" >
						<div class="col-xs-7 noPadding" >
							<div class="col-xs-2 noPadding" align="center">Q-4</div>
							<div class="col-xs-10 noPadding" align="right"><?php 
                                                        $total_upto_q4 = 0;//(array_sum(($myData["$thn-10"]))) + (array_sum(($myData["$thn-11"]))) + (array_sum(($myData["$thn-12"])));
                                                        $total_rkap_q4 = ($DProduction[10]['cement']) + ($DProduction[11]['cement']);// + ($DProduction[12]['cement']); 
                                                        echo number_format($total_rkap_q4)?> T</div>
                                                        <?php $hasil_q4 = ($total_upto_q4 / $total_rkap_q4) * 100;
                                                        if ($hasil_q4 < 100) {
                                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>'.number_format($hasil_q4,2,",",".").'%</h4></div>';
                                                        } else {
                                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>'.number_format($hasil_q4,2,",",".").'%</h4></div>';
                                                        }
                                                        ?>
							<div class="row-xs-2 noPadding" align="center" style="font-size:12px; font-weight:bold;" ><?php echo number_format($total_upto_q4) ?></div>
						</div>
						<div class="col-xs-5 noPadding" align="right">
                                                    <?php
                                                                $thn = $this->input->get('tahun');
                                                                $tot_tns2 = 0;//(($myData["$thn-10"]['tonasa2']) + ($myData["$thn-11"]['tonasa2']));// + ($myData["$thn-12"]['tonasa2']));
                                                                $tot_tns3 = 0;//(($myData["$thn-10"]['tonasa3']) + ($myData["$thn-11"]['tonasa3']));// + ($myData["$thn-12"]['tonasa3']));
                                                                $tot_tns4 = 0;//(($myData["$thn-10"]['tonasa4']) + ($myData["$thn-11"]['tonasa4']));// + ($myData["$thn-12"]['tonasa4']));
                                                                $tot_tns5 = 0;//(($myData["$thn-10"]['tonasa5']) + ($myData["$thn-11"]['tonasa5']));// + ($myData["$thn-12"]['tonasa5']));
                                                                
                                                                $no=1;
                                                                if(!empty($myData)){
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">II</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format($tot_tns2,0,",",".").' T</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">IIi</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format($tot_tns3,0,",",".").' T</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">IV</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format($tot_tns4,0,",",".").' T</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">V</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format($tot_tns5,0,",",".").' T</div>';
								} else {
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">II</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">III</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">IV</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                    echo '<div class="col-xs-2 noPadding PlantColor" align="center">V</div>';
                                                                    echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").'</div>';
                                                                }
							?>
						</div> 
                                </div>
                            </div>                          
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table> <!--Qulub 250816-->