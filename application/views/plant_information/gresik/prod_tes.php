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
			window.location.href = 'index.php/plant_system/dashboard_semen?tahun=2016';
		});
                $('#btn_prod_klin').click(function(){
			window.location.href = 'index.php/plant_system/dashboard_klin?tahun=2016';
		});
	});
        function selectThn(){
            var thn = $('#tahun').val();
            window.location.href = 'index.php/plant_system/prod_semen?tahun='+thn;
        }
</script>

<div class="row">
	<div class="col-md-2 col-xs-12">
		<h4>Clinker Production</h4>
	</div>
	<div class="col-md-6 col-xs-12">
		<div class="btn-group">
<!--			<button class="btn btn-default" aria-label="Left Align" id="btn_prod_lime" type="button">
				Lime Stone
			</button>-->
<!--			<button class="btn btn-default" aria-label="Left Align" id="btn_prod_rawmix"  type="button">
				Raw Mix
			</button>-->
			<button class="btn btn-info" aria-label="Left Align" id="btn_prod_klin" type="button">
				Clinker
			</button>
<!--			<button class="btn btn-default" aria-label="Left Align" id="btn_prod_silica" type="button">
				Silica Stone
			</button>-->
<!--			<button class="btn btn-default" aria-label="Left Align" id="btn_prod_fineCoal" type="button">
				Fine Coal
			</button>-->
			<button class="btn btn-default " aria-label="Left Align" id="btn_prod_semen" type="button">
				Cement 
			</button>
		</div>
	</div>
    <div class="col-md-4 col-xs-12">
        Year :
        <select name="tahun" id="tahun" onchange="selectThn()">
            <?php $thn = date("Y");
                for($i = $thn ; $i <= $thn ; $i++){
                    echo '<option>'.$i.'</option>';
                }
            ?>
        </select><p class="date">
        <?php 
        $postgresql = $this->load->database('psqlsatu', TRUE);
	$Query = $postgresql->query("SELECT date_prod from plg_st_plant ORDER BY date_prod DESC LIMIT 1");
        $data = $Query->result_array();
        $tanggal = date_create($data['0']['date_prod']);
        $last_date = date_format($tanggal,"d");
        echo 'Last Update on : '.date_format($tanggal,"d F Y").'';
                
        $bulan_data = date_format($tanggal,"m");
        $bulan_curret = date("m");
        $tgl_data = date_format($tanggal,"d");
                
        if((date("Y") % 4) == 0)
            {
            $feb = 29;
            } else {
                $feb = 28;
            }
        $jan = 31;$mar=31;$apr=30;$mei=31;$jun=30;$jul=31;$ags=31;$sep=30;$okt=31;$nov=30;$des=31;
        $my_day = array($jan, $feb, $mar, $apr, $mei, $jun, $jul, $ags, $sep, $okt, $nov, $des);
        ?></p>
    </div>
</div>

<div class="row">
<div class="col-xs-12  col-md-3 ">
    
    
<div class="row">
    <div class="col-xs-12 col-sm-4 col-md-12 noPadding" >
        <div class=" headside cubesRun" > 
                                    <div class="col-xs-2 noPadding"  style="font-weight: bold; ">SMIG</div>
                                    <div class="col-xs-10 noPadding" align="right">RKAP : 
                                        <?php
                                        $total_upto_sg = ($datacl_sg["$thn-01"]['sg']) + ($datacl_sg["$thn-02"]['sg']) + 
                                            ($datacl_sg["$thn-03"]['sg']) + ($datacl_sg["$thn-04"]['sg']) + 
                                            ($datacl_sg["$thn-05"]['sg']) + ($datacl_sg["$thn-06"]['sg']) +
                                            ($datacl_sg["$thn-07"]['sg']) + ($datacl_sg["$thn-08"]['sg']) + ($datacl_sg["$thn-09"]['sg']);// +  ($datacl_sg["$thn-10"]['sg']) + ($datacl_sg["$thn-11"]['sg']) + ($datacl_sg["$thn-12"]['sg']);
                                        $total_upto_sp = ($datacl_sp["$thn-01"]['sp']) + ($datacl_sp["$thn-02"]['sp']) +
                                            ($datacl_sp["$thn-03"]['sp']) + ($datacl_sp["$thn-04"]['sp']) +
                                            ($datacl_sp["$thn-05"]['sp']) + ($datacl_sp["$thn-06"]['sp']) + 
                                             ($datacl_sp["$thn-07"]['sp']) + ($datacl_sp["$thn-08"]['sp']) + ($datacl_sp["$thn-09"]['sp']);// + ($datacl_sp["$thn-10"]['sp']) + ($datacl_sp["$thn-11"]['sp']) + ($datacl_sp["$thn-12"]['sp']);
                                        $total_upto_st = ($datacl_st["$thn-01"]['st']) + ($datacl_st["$thn-02"]['st']) +
                                            ($datacl_st["$thn-03"]['st']) + ($datacl_st["$thn-04"]['st']) +
                                            ($datacl_st["$thn-05"]['st']) + ($datacl_st["$thn-06"]['st']) +
                                            ($datacl_st["$thn-07"]['st']) + ($datacl_st["$thn-08"]['st']) + ($datacl_st["$thn-09"]['st']);// + ($datacl_st["$thn-10"]['st']) + ($datacl_st["$thn-11"]['st']) + ($datacl_st["$thn-12"]['st']);
                                        $total_upto_tlcc = ($datacl_tlcc["$thn-01"]['tlcc']) + ($datacl_tlcc["$thn-02"]['tlcc'])+
                                            ($datacl_tlcc["$thn-03"]['tlcc']) + ($datacl_tlcc["$thn-04"]['tlcc']) +
                                            ($datacl_tlcc["$thn-05"]['tlcc']) + ($datacl_tlcc["$thn-06"]['tlcc']) +
                                            ($datacl_tlcc["$thn-07"]['tlcc']) + ($datacl_tlcc["$thn-08"]['tlcc']) + ($datacl_tlcc["$thn-09"]['tlcc']);// + ($datacl_tlcc["$thn-10"]['tlcc']) + ($datacl_tlcc["$thn-11"]['tlcc']) + ($datacl_tlcc["$thn-12"]['tlcc']);
                                            
                                        $total_upto_smig = $total_upto_sg + $total_upto_sp + $total_upto_st + $total_upto_tlcc;
                                            
                                        $total_rkap_smig = ($rkap_cl[1]['clinker']) + ($rkap_cl[2]['clinker']) +
                                            ($rkap_cl[3]['clinker']) + ($rkap_cl[4]['clinker']) +
                                            ($rkap_cl[5]['clinker']) + ($rkap_cl[6]['clinker']) +
                                            ($rkap_cl[7]['clinker']) + ($rkap_cl[8]['clinker']) +
                                            ($rkap_cl[9]['clinker']) + ($rkap_cl[10]['clinker']) +
                                            ($rkap_cl[11]['clinker']) + ($rkap_cl[12]['clinker']);
                                            
                                        echo number_format($total_rkap_smig,0,",",".").' T</div>';
                                        $hasil_year_smig = ($total_upto_smig / $total_rkap_smig) * 100;
                                        if ($hasil_year_smig < 100) {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>'.number_format($hasil_year_smig,2,",",".").'%</h4></div>';
                                        } else {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>'.number_format($hasil_year_smig,2,",",".").'%</h4></div>';
                                        } ?> 
                                        Real : 
                                    <span class="row-xs-2 noPadding" align="left"  style="font-weight: bold;"><?php echo number_format($total_upto_smig,0,",",".") ?> T</span>
                                </div>
        
    </div>
    <div class="col-xs-6 col-sm-4 col-md-12 noPadding" >
        <div class="headside cubesRun" > 
                                    <div class="col-xs-2 noPadding"  style="font-weight: bold;">SP</div>
                                    <div class="col-xs-10 noPadding" align="right">RKAP :
                                        <?php
                                        $total_upto_sp = ($datacl_sp["$thn-01"]['sp']) + ($datacl_sp["$thn-02"]['sp']) +
                                            ($datacl_sp["$thn-03"]['sp']) + ($datacl_sp["$thn-04"]['sp']) +
                                            ($datacl_sp["$thn-05"]['sp']) + ($datacl_sp["$thn-06"]['sp']) + 
                                            ($datacl_sp["$thn-07"]['sp']) + ($datacl_sp["$thn-08"]['sp']) + ($datacl_sp["$thn-09"]['sp']);// + ($datacl_sp["$thn-10"]['sp']) + ($datacl_sp["$thn-11"]['sp']) + ($datacl_sp["$thn-12"]['sp']);
                                        $total_rkap_sp = $rkap_sp['0']['semen'];
                                        echo number_format($total_rkap_sp,0,",",".").' T</div>';
                                        $hasil_year_sp = ($total_upto_sp / $total_rkap_sp) * 100;
                                        if ($hasil_year_sp < 100) { 
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>'.number_format($hasil_year_sp,2,",",".").'%</h4></div>';
                                        } else {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>'.number_format($hasil_year_sp,2,",",".").'%</h4></div>';
                                        }
                                        ?>
                                    Real : 
                                    <span class="row-xs-2 noPadding" align="left"  style="font-weight: bold;"><?php echo number_format($total_upto_sp,0,",",".") ?> T</span>
                                </div>
        
    </div>
    
    <div class="col-xs-6 col-sm-4 col-md-12 noPadding" >
        <div class="headside cubesRun" > 
                                    <div class="col-xs-2 noPadding"  style="font-weight: bold;">SG</div>
                                    <div class="col-xs-10 noPadding" align="right">RKAP : 
                                        <?php 
                                        $total_upto_sg = ($datacl_sg["$thn-01"]['sg']) + ($datacl_sg["$thn-02"]['sg']) + 
                                            ($datacl_sg["$thn-03"]['sg']) + ($datacl_sg["$thn-04"]['sg']) + 
                                            ($datacl_sg["$thn-05"]['sg']) + ($datacl_sg["$thn-06"]['sg']) +
                                            ($datacl_sg["$thn-07"]['sg']) + ($datacl_sg["$thn-08"]['sg']) + ($datacl_sg["$thn-09"]['sg']);// + ($datacl_sg["$thn-10"]['sg']) + ($datacl_sg["$thn-11"]['sg']) + ($datacl_sg["$thn-12"]['sg']);
                                        $total_rkap_sg = $rkap['0']['semen'];
                                        echo number_format($total_rkap_sg,0,",",".").' T</div>';
                                        $hasil_year_sg = ($total_upto_sg / $total_rkap_sg) * 100;
                                        if ($hasil_year_sg < 100) {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>'.number_format($hasil_year_sg,2,",",".").'%</h4></div>';
                                        } else {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>'.number_format($hasil_year_sg,2,",",".").'%</h4></div>';
                                         }?>
                                    Real : 
                                    <span class="row-xs-2 noPadding" align="left"  style="font-weight: bold;"><?php echo number_format($total_upto_sg,0,",",".") ?> T</span>
                                </div>
    </div>
    <div class="col-xs-6 col-sm-4 col-md-12 noPadding" >
        <div class="headside cubesRun" > 
                                    <div class="col-xs-2 noPadding"  style="font-weight: bold;">ST</div>
                                    <div class="col-xs-10 noPadding" align="right">RKAP : 
                                        <?php 
                                        $total_upto_st = ($datacl_st["$thn-01"]['st']) + ($datacl_st["$thn-02"]['st']) +
                                            ($datacl_st["$thn-03"]['st']) + ($datacl_st["$thn-04"]['st']) +
                                            ($datacl_st["$thn-05"]['st']) + ($datacl_st["$thn-06"]['st']) +
                                            ($datacl_st["$thn-07"]['st']) + ($datacl_st["$thn-08"]['st']) + ($datacl_st["$thn-09"]['st']);// + ($datacl_st["$thn-10"]['st']) + ($datacl_st["$thn-11"]['st']) + ($datacl_st["$thn-12"]['st']);
                                        $total_rkap_st = $rkap_st['0']['semen'];
                                        echo number_format($total_rkap_st,0,",",".").' T</div>';
                                        $hasil_year_st = ($total_upto_st / $total_rkap_st) * 100;
                                        if ($hasil_year_st < 100) {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_year_st, 2, ",", ".") . '%</h4></div>';
                                        } else {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_year_st, 2, ",", ".") . '%</h4></div>';
                                        }
                                        ?>
                                    Real : 
                                    <span class="row-xs-2 noPadding" align="left"  style="font-weight: bold;"><?php echo number_format($total_upto_st,0,",",".") ?> T</span>
                                </div>
    </div>
    <div class="col-xs-6 col-sm-4 col-md-12 noPadding" >
        <div class="headside cubesRun" > 
                                    <div class="col-xs-2 noPadding"  style="font-weight: bold;">TLCC</div>
                                    <div class="col-xs-10 noPadding" align="right">RKAP : 
                                        <?php
                                        $total_upto_tlcc = ($datacl_tlcc["$thn-01"]['tlcc']) + ($datacl_tlcc["$thn-02"]['tlcc'])+
                                            ($datacl_tlcc["$thn-03"]['tlcc']) + ($datacl_tlcc["$thn-04"]['tlcc']) +
                                            ($datacl_tlcc["$thn-05"]['tlcc']) + ($datacl_tlcc["$thn-06"]['tlcc']) +
                                            ($datacl_tlcc["$thn-07"]['tlcc']) + ($datacl_tlcc["$thn-08"]['tlcc']) + ($datacl_tlcc["$thn-09"]['tlcc']);// + ($datacl_tlcc["$thn-10"]['tlcc']) + ($datacl_tlcc["$thn-11"]['tlcc']) + ($datacl_tlcc["$thn-12"]['tlcc']);
                                        $total_rkap_tlcc = $rkap_tl['0']['semen'];
                                        echo number_format($total_rkap_tlcc,0,",",".").' T</div>';
                                        $hasil_year_tlcc = ($total_upto_tlcc / $total_rkap_tlcc) * 100;
                                        if ($hasil_year_tlcc < 100) {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_year_tlcc, 2, ",", ".") . '%</h4></div>';
                                        } else {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_year_tlcc, 2, ",", ".") . '%</h4></div>';
                                        }
                                        ?>
                                    Real : 
                                    <span class="row-xs-2 noPadding" align="left"  style="font-weight: bold;"><?php echo number_format($total_upto_tlcc,0,",",".") ?> T</span>
                                </div>
    </div>
</div>
</div>
        
  <div class="col-xs-12 col-md-9" >
      
      <div class="row">
          <div class="col-xs-12 col-md-3 noPadding" >
              <div class="img-thumbnail cubesRun2">
                                    <div class="col-xs-6 noPadding" >
                                        <div class="col-xs-2 noPadding" align="center">Jan</div>
                                        <?php if (!empty($rkap_cl[1]['clinker'])) {
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rkap_cl[1]['clinker'],0,",",".") . ' T</div>';
                                        } else {
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0,2,",",".") . ' T</div>';
                                        }
                                        ?>
                                        <div class="row-xs-2 noPadding" align="center" >
                                        <?php if(!empty($datacl_sg["$thn-01"]['sg']) || !empty($datacl_sg["$thn-01"]['sp']) || !empty($datacl_sg["$thn-01"]['st']) || !empty($datacl_sg["$thn-01"]['tlcc'])) {
                                        $jml_jan = ($datacl_sg["$thn-01"]['sg']) + ($datacl_sp["$thn-01"]['sp']) + ($datacl_st["$thn-01"]['st']) + ($datacl_tlcc["$thn-01"]['tlcc']);
                                        $hasil_jan = $jml_jan / ($rkap_cl[1]['clinker']) * 100;
                                        if ($hasil_jan < 100) {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_jan, 2, ",", ".") . '%</h4></div>';
                                        } else {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_jan, 2, ",", ".") . '%</h4></div>';
                                        }
                                        echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format($jml_jan,0,",",".") . ' T</div>';
                                        } else {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format(0, 0, ",", ".") . '%</h4></div>';
                                            echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(0, 0, ",", ".") . ' T</div>';
                                        }
                                        ?>
                                        </div>
                                        </div>
                  <div class="col-xs-6 noPadding" align="right">
                                        <?php
                                            if (!empty($datacl_sp["$thn-01"]['sp']) || !empty($datacl_sp["$thn-01"]['sg']) || !empty($datacl_sp["$thn-01"]['st']) || !empty($datacl_sp["$thn-01"]['tlcc'])) {
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SP</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_sp["$thn-01"]['sp'], 0, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SG</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_sg["$thn-01"]['sg'], 0, ",", "."). ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">ST</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_st["$thn-01"]['st'], 0, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">TL</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_tlcc["$thn-01"]['tlcc'], 0, ",", ".") . ' T</div>';
                                        } else {
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SP</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SG</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">ST</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">TL</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                        }
                                        ?>
                                    </div>
                                    </div>
              
          </div>
           <div class="col-xs-12 col-md-3 noPadding" >
               <div class="img-thumbnail cubesRun2">
                                    <div class="col-xs-6 noPadding" >
                                        <div class="col-xs-2 noPadding" align="center">Feb</div>
                                        <?php if (!empty($rkap_cl[2]['clinker'])) {
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rkap_cl[2]['clinker'],0,",",".") . ' T</div>';
                                        } else {
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0,2,",",".") . ' T</div>';
                                        }
                                        ?>
                                        <div class="row-xs-2 noPadding" align="center" >
                                        <?php if(!empty($datacl_sg["$thn-02"]['sg']) || !empty($datacl_sg["$thn-02"]['sp']) || !empty($datacl_sg["$thn-02"]['st']) || !empty($datacl_sg["$thn-02"]['tlcc'])) {
                                        $jml_feb = ($datacl_sg["$thn-02"]['sg']) + ($datacl_sp["$thn-02"]['sp']) + ($datacl_st["$thn-02"]['st']) + ($datacl_tlcc["$thn-02"]['tlcc']);
                                        $hasil_feb = $jml_feb / ($rkap_cl[2]['clinker']) * 100;
                                        if ($hasil_feb < 100) {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_feb, 2, ",", ".") . '%</h4></div>';
                                        } else {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_feb, 2, ",", ".") . '%</h4></div>';
                                        }
                                        echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format($jml_feb,0,",",".") . ' T</div>';
                                        } else {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format(0, 0, ",", ".") . '%</h4></div>';
                                            echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(0, 0, ",", ".") . ' T</div>';
                                        }
                                        ?>
                                        </div>
                                        </div>
                  <div class="col-xs-6 noPadding" align="right">
                                        <?php
                                            if (!empty($datacl_sp["$thn-02"]['sp']) || !empty($datacl_sp["$thn-02"]['sg']) || !empty($datacl_sp["$thn-02"]['st']) || !empty($datacl_sp["$thn-02"]['tlcc'])) {
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SP</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_sp["$thn-02"]['sp'], 0, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SG</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_sg["$thn-02"]['sg'], 0, ",", "."). ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">ST</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_st["$thn-02"]['st'], 0, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">TL</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_tlcc["$thn-02"]['tlcc'], 0, ",", ".") . ' T</div>';
                                        } else {
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SP</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SG</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">ST</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">TL</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                        }
                                        ?>
                                    </div> 
                                </div>
           </div>
          <div class="col-xs-12 col-md-3 noPadding" >
              <div class="img-thumbnail cubesRun2">
                                    <div class="col-xs-6 noPadding" >
                                        <div class="col-xs-2 noPadding" align="center">Mar</div>
                                        <?php if (!empty($rkap_cl[3]['clinker'])) {
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rkap_cl[3]['clinker'],0,",",".") . ' T</div>';
                                        } else {
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0,2,",",".") . ' T</div>';
                                        }
                                        ?>
                                        <div class="row-xs-2 noPadding" align="center" >
                                        <?php if(!empty($datacl_sg["$thn-03"]['sg']) || !empty($datacl_sg["$thn-03"]['sp']) || !empty($datacl_sg["$thn-03"]['st']) || !empty($datacl_sg["$thn-03"]['tlcc'])) {
                                        $jml_mar = ($datacl_sg["$thn-03"]['sg']) + ($datacl_sp["$thn-03"]['sp']) + ($datacl_st["$thn-03"]['st']) + ($datacl_tlcc["$thn-03"]['tlcc']);
                                        $hasil_mar = $jml_mar / ($rkap_cl[3]['clinker']) * 100;
                                        if ($hasil_mar < 100) {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_mar, 2, ",", ".") . '%</h4></div>';
                                        } else {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_mar, 2, ",", ".") . '%</h4></div>';
                                        }
                                        echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format($jml_mar,0,",",".") . ' T</div>';
                                        } else {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format(0, 0, ",", ".") . '%</h4></div>';
                                            echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(0, 0, ",", ".") . ' T</div>';
                                        }
                                        ?>
                                        </div>
                                        </div>
                  <div class="col-xs-6 noPadding" align="right">
                                        <?php
                                            if (!empty($datacl_sp["$thn-03"]['sp']) || !empty($datacl_sp["$thn-03"]['sg']) || !empty($datacl_sp["$thn-03"]['st']) || !empty($datacl_sp["$thn-03"]['tlcc'])) {
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SP</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_sp["$thn-03"]['sp'], 0, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SG</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_sg["$thn-03"]['sg'], 0, ",", "."). ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">ST</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_st["$thn-03"]['st'], 0, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">TL</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_tlcc["$thn-03"]['tlcc'], 0, ",", ".") . ' T</div>';
                                        } else {
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SP</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SG</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">ST</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">TL</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                        }
                                        ?>
                                    </div> 
                                </div>
          </div>
          <div class="col-xs-12 col-md-3 noPadding" >
              <div class="headmenu cubesRun2">
                                    <div class="col-xs-6 noPadding" >
                                        <div class="col-xs-2 noPadding" align="center">Q1</div>
                                        <?php
                                        $jml_jan = ($datacl_sg["$thn-01"]['sg']) + ($datacl_sp["$thn-01"]['sp']) + ($datacl_st["$thn-01"]['st']) + ($datacl_tlcc["$thn-01"]['tlcc']);
                                        $jml_feb = ($datacl_sg["$thn-02"]['sg']) + ($datacl_sp["$thn-02"]['sp']) + ($datacl_st["$thn-02"]['st']) + ($datacl_tlcc["$thn-02"]['tlcc']);
                                        $jml_mar = ($datacl_sg["$thn-03"]['sg']) + ($datacl_sp["$thn-03"]['sp']) + ($datacl_st["$thn-03"]['st']) + ($datacl_tlcc["$thn-03"]['tlcc']);

                                        $total_upto_q1 = $jml_jan + $jml_feb + $jml_mar;

                                        $total_rkap_q1 = ($rkap_cl[1]['clinker']) + ($rkap_cl[2]['clinker']) + ($rkap_cl[3]['clinker']);
                                        echo '<div align="right">' . number_format($total_rkap_q1, 0, ",", ".") . 'T</div>';

                                        $hasil_q1 = ($total_upto_q1 / $total_rkap_q1) * 100;
                                        if ($hasil_q1 < 100) {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_q1, 2, ",", ".") . '%</h4></div>';
                                        } else {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_q1, 2, ",", ".") . '%</h4></div>';
                                        }
                                        echo '<div align="center" style="font-size:12px; font-weight:bold;">' . number_format($total_upto_q1, 0, ",", ".") . ' T</div>';
                                        ?>
                                    </div>
                                    <div class="col-xs-6 noPadding" align="right">
                                        <?php
                                        $tot_sg_q1 = (($datacl_sg["$thn-01"]['sg']) + ($datacl_sg["$thn-02"]['sg']) + ($datacl_sg["$thn-03"]['sg']));
                                        $tot_sp_q1 = (($datacl_sp["$thn-01"]['sp']) + ($datacl_sp["$thn-02"]['sp']) + ($datacl_sp["$thn-03"]['sp']));
                                        $tot_st_q1 = (($datacl_st["$thn-01"]['st']) + ($datacl_st["$thn-02"]['st']) + ($datacl_st["$thn-03"]['st']));
                                        $tot_tlcc_q1 = (($datacl_tlcc["$thn-01"]['tlcc']) + ($datacl_tlcc["$thn-02"]['tlcc']) + ($datacl_tlcc["$thn-03"]['tlcc']));

                                        if (!empty($thn)) {                                            
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SP</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_sp_q1, 0, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SG</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_sg_q1, 0, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SP</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_st_q1, 0, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">TL</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_tlcc_q1, 0, ",", ".") . ' T</div>';
                                        } else {
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SG</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . '</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SP</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . '</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">ST</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . '</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">TL</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . '</div>';
                                        }
                                        ?>
                                    </div> 
                                </div>
          </div>
      </div>
  <div class="row">
          <div class="col-xs-12 col-md-3 noPadding" >
              <div class="img-thumbnail cubesRun2">
                                    <div class="col-xs-6 noPadding" >
                                        <div class="col-xs-2 noPadding" align="center">Apr</div>
                                        <?php if (!empty($rkap_cl[4]['clinker'])) {
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rkap_cl[4]['clinker'],0,",",".") . ' T</div>';
                                        } else {
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0,2,",",".") . ' T</div>';
                                        }
                                        ?>
                                        <div class="row-xs-2 noPadding" align="center" >
                                        <?php if(!empty($datacl_sg["$thn-04"]['sg']) || !empty($datacl_sg["$thn-04"]['sp']) || !empty($datacl_sg["$thn-04"]['st']) || !empty($datacl_sg["$thn-04"]['tlcc'])) {
                                        $jml_apr = ($datacl_sg["$thn-04"]['sg']) + ($datacl_sp["$thn-04"]['sp']) + ($datacl_st["$thn-04"]['st']) + ($datacl_tlcc["$thn-04"]['tlcc']);
                                        $hasil_apr = $jml_apr / ($rkap_cl[4]['clinker']) * 100;
                                        if ($hasil_apr < 100) {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_apr, 2, ",", ".") . '%</h4></div>';
                                        } else {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_apr, 2, ",", ".") . '%</h4></div>';
                                        }
                                        echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format($jml_apr,0,",",".") . ' T</div>';
                                        } else {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format(0, 0, ",", ".") . '%</h4></div>';
                                            echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(0, 0, ",", ".") . ' T</div>';
                                        }
                                        ?>
                                        </div>
                                        </div>
                  <div class="col-xs-6 noPadding" align="right">
                                        <?php
                                            if (!empty($datacl_sp["$thn-04"]['sp']) || !empty($datacl_sp["$thn-04"]['sg']) || !empty($datacl_sp["$thn-04"]['st']) || !empty($datacl_sp["$thn-04"]['tlcc'])) {
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SP</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_sp["$thn-04"]['sp'], 0, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SG</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_sg["$thn-04"]['sg'], 0, ",", "."). ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">ST</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_st["$thn-04"]['st'], 0, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">TL</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_tlcc["$thn-04"]['tlcc'], 0, ",", ".") . ' T</div>';
                                        } else {
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SP</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SG</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">ST</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">TL</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                        }
                                        ?>
                                    </div> 
                                </div>
              
          </div>
           <div class="col-xs-12 col-md-3 noPadding" >
               <div class="img-thumbnail cubesRun2">
                                    <div class="col-xs-6 noPadding" >
                                        <div class="col-xs-2 noPadding" align="center">May</div>
                                        <?php if (!empty($rkap_cl[5]['clinker'])) {
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rkap_cl[5]['clinker'],0,",",".") . ' T</div>';
                                        } else {
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0,2,",",".") . ' T</div>';
                                        }
                                        ?>
                                        <div class="row-xs-2 noPadding" align="center" >
                                        <?php if(!empty($datacl_sg["$thn-05"]['sg']) || !empty($datacl_sg["$thn-05"]['sp']) || !empty($datacl_sg["$thn-05"]['st']) || !empty($datacl_sg["$thn-05"]['tlcc'])) {
                                        $jml_may = ($datacl_sg["$thn-05"]['sg']) + ($datacl_sp["$thn-05"]['sp']) + ($datacl_st["$thn-05"]['st']) + ($datacl_tlcc["$thn-05"]['tlcc']);
                                        $hasil_may = $jml_may / ($rkap_cl[5]['clinker']) * 100;
                                        if ($hasil_may < 100) {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_may, 2, ",", ".") . '%</h4></div>';
                                        } else {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_may, 2, ",", ".") . '%</h4></div>';
                                        }
                                        echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format($jml_may,0,",",".") . ' T</div>';
                                        } else {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format(0, 0, ",", ".") . '%</h4></div>';
                                            echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(0, 0, ",", ".") . ' T</div>';
                                        }
                                        ?>
                                        </div>
                                        </div>
                  <div class="col-xs-6 noPadding" align="right">
                                        <?php
                                            if (!empty($datacl_sp["$thn-05"]['sp']) || !empty($datacl_sp["$thn-05"]['sg']) || !empty($datacl_sp["$thn-05"]['st']) || !empty($datacl_sp["$thn-05"]['tlcc'])) {
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SP</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_sp["$thn-05"]['sp'], 0, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SG</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_sg["$thn-05"]['sg'], 0, ",", "."). ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">ST</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_st["$thn-05"]['st'], 0, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">TL</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_tlcc["$thn-05"]['tlcc'], 0, ",", ".") . ' T</div>';
                                        } else {
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SP</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SG</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">ST</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">TL</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                        }
                                        ?>
                                    </div> 
                                </div>
           </div>
          <div class="col-xs-12 col-md-3 noPadding" >
              <div class="img-thumbnail cubesRun2">
                                    <div class="col-xs-6 noPadding" >
                                        <div class="col-xs-2 noPadding" align="center">Jun</div>
                                        <?php if (!empty($rkap_cl[6]['clinker'])) {
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rkap_cl[6]['clinker'],0,",",".") . ' T</div>';
                                        } else {
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0,2,",",".") . ' T</div>';
                                        }
                                        ?>
                                        <div class="row-xs-2 noPadding" align="center" >
                                        <?php if(!empty($datacl_sg["$thn-06"]['sg']) || !empty($datacl_sg["$thn-06"]['sp']) || !empty($datacl_sg["$thn-06"]['st']) || !empty($datacl_sg["$thn-06"]['tlcc'])) {
                                        $jml_jun = ($datacl_sg["$thn-06"]['sg']) + ($datacl_sp["$thn-06"]['sp']) + ($datacl_st["$thn-06"]['st']) + ($datacl_tlcc["$thn-06"]['tlcc']);
                                        $hasil_jun = $jml_jun / ($rkap_cl[6]['clinker']) * 100;
                                        if ($hasil_jun < 100) {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_jun, 2, ",", ".") . '%</h4></div>';
                                        } else {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_jun, 2, ",", ".") . '%</h4></div>';
                                        }
                                        echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format($jml_jun,0,",",".") . ' T</div>';
                                        } else {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format(0, 0, ",", ".") . '%</h4></div>';
                                            echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(0, 0, ",", ".") . ' T</div>';
                                        }
                                        ?>
                                        </div>
                                        </div>
                  <div class="col-xs-6 noPadding" align="right">
                                        <?php
                                            if (!empty($datacl_sp["$thn-06"]['sp']) || !empty($datacl_sp["$thn-06"]['sg']) || !empty($datacl_sp["$thn-06"]['st']) || !empty($datacl_sp["$thn-06"]['tlcc'])) {
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SP</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_sp["$thn-06"]['sp'], 0, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SG</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_sg["$thn-06"]['sg'], 0, ",", "."). ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">ST</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_st["$thn-06"]['st'], 0, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">TL</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_tlcc["$thn-06"]['tlcc'], 0, ",", ".") . ' T</div>';
                                        } else {
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SP</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SG</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">ST</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">TL</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                        }
                                        ?>
                                    </div> 
                                </div>
          </div>
          <div class="col-xs-12 col-md-3 noPadding" >
              <div class="headmenu cubesRun2">
                                    <div class="col-xs-6 noPadding" >
                                        <div class="col-xs-2 noPadding" align="center">Q2</div>
                                        <?php
                                        $jml_apr = ($datacl_sg["$thn-04"]['sg']) + ($datacl_sp["$thn-04"]['sp']) + ($datacl_st["$thn-04"]['st']) + ($datacl_tlcc["$thn-04"]['tlcc']);
                                        $jml_may = ($datacl_sg["$thn-05"]['sg']) + ($datacl_sp["$thn-05"]['sp']) + ($datacl_st["$thn-05"]['st']) + ($datacl_tlcc["$thn-05"]['tlcc']);
                                        $jml_jun = ($datacl_sg["$thn-06"]['sg']) + ($datacl_sp["$thn-06"]['sp']) + ($datacl_st["$thn-06"]['st']) + ($datacl_tlcc["$thn-06"]['tlcc']);

                                        $total_upto_q2 = $jml_apr + $jml_may + $jml_jun;

                                        $total_rkap_q2 = ($rkap_cl[4]['clinker']) + ($rkap_cl[5]['clinker']) + ($rkap_cl[6]['clinker']);
                                        echo '<div align="right">' . number_format($total_rkap_q2, 0, ",", ".") . 'T</div>';

                                        $hasil_q2 = ($total_upto_q2 / $total_rkap_q2) * 100;
                                        if ($hasil_q2 < 100) {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_q2, 2, ",", ".") . '%</h4></div>';
                                        } else {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_q2, 2, ",", ".") . '%</h4></div>';
                                        }
                                        echo '<div align="center" style="font-size:12px; font-weight:bold;">' . number_format($total_upto_q2, 0, ",", ".") . ' T</div>';
                                        ?>
                                    </div>
                                    <div class="col-xs-6 noPadding" align="right">
                                        <?php
                                        $tot_sg_q2 = (($datacl_sg["$thn-04"]['sg']) + ($datacl_sg["$thn-05"]['sg']) + ($datacl_sg["$thn-06"]['sg']));
                                        $tot_sp_q2 = (($datacl_sp["$thn-04"]['sp']) + ($datacl_sp["$thn-05"]['sp']) + ($datacl_sp["$thn-06"]['sp']));
                                        $tot_st_q2 = (($datacl_st["$thn-04"]['st']) + ($datacl_st["$thn-05"]['st']) + ($datacl_st["$thn-06"]['st']));
                                        $tot_tlcc_q2 = (($datacl_tlcc["$thn-04"]['tlcc']) + ($datacl_tlcc["$thn-05"]['tlcc']) + ($datacl_tlcc["$thn-06"]['tlcc']));

                                        if (!empty($thn)) {                                            
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SP</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_sp_q2, 0, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SG</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_sg_q2, 0, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SP</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_st_q2, 0, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">TL</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_tlcc_q2, 0, ",", ".") . ' T</div>';
                                        } else {
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SG</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . '</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SP</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . '</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">ST</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . '</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">TL</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . '</div>';
                                        }
                                        ?>
                                    </div> 
                                </div>
          </div>
      </div>
      <div class="row">
          <div class="col-xs-12 col-md-3 noPadding" >
              <div class="img-thumbnail cubesRun2">
                                    <div class="col-xs-6 noPadding" >
                                        <div class="col-xs-2 noPadding" align="center">Jul</div>
                                        <?php if (!empty($rkap_cl[7]['clinker'])) {
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rkap_cl[7]['clinker'],0,",",".") . ' T</div>';
                                        } else {
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0,2,",",".") . ' T</div>';
                                        }
                                        ?>
                                        <div class="row-xs-2 noPadding" align="center" >
                                        <?php if(!empty($datacl_sg["$thn-07"]['sg']) || !empty($datacl_sg["$thn-07"]['sp']) || !empty($datacl_sg["$thn-07"]['st']) || !empty($datacl_sg["$thn-07"]['tlcc'])) {
                                        $jml_jul = ($datacl_sg["$thn-07"]['sg']) + ($datacl_sp["$thn-07"]['sp']) + ($datacl_st["$thn-07"]['st']) + ($datacl_tlcc["$thn-07"]['tlcc']);
                                        $hasil_jul = $jml_jul / ($rkap_cl[7]['clinker']) * 100;
                                        if ($hasil_jul < 100) {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_jul, 2, ",", ".") . '%</h4></div>';
                                        } else {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_jul, 2, ",", ".") . '%</h4></div>';
                                        }
                                        echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format($jml_jul,0,",",".") . ' T</div>';
                                        } else {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format(0, 0, ",", ".") . '%</h4></div>';
                                            echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(0, 0, ",", ".") . ' T</div>';
                                        }
                                        ?>
                                        </div>
                                        </div>
                  <div class="col-xs-6 noPadding" align="right">
                                        <?php
                                            if (!empty($datacl_sp["$thn-07"]['sp']) || !empty($datacl_sp["$thn-07"]['sg']) || !empty($datacl_sp["$thn-07"]['st']) || !empty($datacl_sp["$thn-07"]['tlcc'])) {
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SP</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_sp["$thn-07"]['sp'], 0, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SG</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_sg["$thn-07"]['sg'], 0, ",", "."). ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">ST</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_st["$thn-07"]['st'], 0, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">TL</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_tlcc["$thn-07"]['tlcc'], 0, ",", ".") . ' T</div>';
                                        } else {
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SP</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SG</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">ST</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">TL</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                        }
                                        ?>
                                    </div> 
                                </div>
              
          </div>
           <div class="col-xs-12 col-md-3 noPadding" >
               <div class="img-thumbnail cubesRun2">
                                    <div class="col-xs-6 noPadding" >
                                        <div class="col-xs-2 noPadding" align="center">Aug</div>
                                        <?php if (!empty($rkap_cl[8]['clinker'])) {
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rkap_cl[8]['clinker'],0,",",".") . ' T</div>';
                                        } else {
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0,2,",",".") . ' T</div>';
                                        }
                                        ?>
                                        <div class="row-xs-2 noPadding" align="center" >
                                        <?php if(!empty($datacl_sg["$thn-08"]['sg']) || !empty($datacl_sg["$thn-08"]['sp']) || !empty($datacl_sg["$thn-08"]['st']) || !empty($datacl_sg["$thn-08"]['tlcc'])) {
                                        $jml_aug = ($datacl_sg["$thn-08"]['sg']) + ($datacl_sp["$thn-08"]['sp']) + ($datacl_st["$thn-08"]['st']) + ($datacl_tlcc["$thn-08"]['tlcc']);
                                        $hasil_aug = $jml_aug / ($rkap_cl[8]['clinker']) * 100;
                                        if ($hasil_aug < 100) {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_aug, 2, ",", ".") . '%</h4></div>';
                                        } else {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_aug, 2, ",", ".") . '%</h4></div>';
                                        }
                                        echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format($jml_aug,0,",",".") . ' T</div>';
                                        } else {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format(0, 0, ",", ".") . '%</h4></div>';
                                            echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(0, 0, ",", ".") . ' T</div>';
                                        }
                                        ?>
                                        </div>
                                        </div>
                  <div class="col-xs-6 noPadding" align="right">
                                        <?php
                                            if (!empty($datacl_sp["$thn-08"]['sp']) || !empty($datacl_sp["$thn-08"]['sg']) || !empty($datacl_sp["$thn-08"]['st']) || !empty($datacl_sp["$thn-08"]['tlcc'])) {
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SP</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_sp["$thn-08"]['sp'], 0, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SG</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_sg["$thn-08"]['sg'], 0, ",", "."). ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">ST</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_st["$thn-08"]['st'], 0, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">TL</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_tlcc["$thn-08"]['tlcc'], 0, ",", ".") . ' T</div>';
                                        } else {
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SP</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SG</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">ST</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">TL</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                        }
                                        ?>
                                    </div> 
                                </div>
           </div>
          <div class="col-xs-12 col-md-3 noPadding" >
              <div class="img-thumbnail cubesRun2">
                                    <div class="col-xs-6 noPadding" >
                                        <div class="col-xs-2 noPadding" align="center">Sep</div>
                                        <?php if (!empty($rkap_cl[9]['clinker'])) {
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($rkap_cl[9]['clinker'],0,",",".") . ' T</div>';
                                        } else {
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0,2,",",".") . ' T</div>';
                                        }
                                        ?>
                                        <div class="row-xs-2 noPadding" align="center" >
                                        <?php if(!empty($datacl_sg["$thn-09"]['sg']) || !empty($datacl_sg["$thn-09"]['sp']) || !empty($datacl_sg["$thn-09"]['st']) || !empty($datacl_sg["$thn-09"]['tlcc'])) {
                                        $jml_sep = ($datacl_sg["$thn-09"]['sg']) + ($datacl_sp["$thn-09"]['sp']) + ($datacl_st["$thn-09"]['st']) + ($datacl_tlcc["$thn-09"]['tlcc']);
                                        $hasil_sep = $jml_sep / ($rkap_cl[9]['clinker']) * 100;
                                        if ($hasil_sep < 100) {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_sep, 2, ",", ".") . '%</h4></div>';
                                        } else {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_sep, 2, ",", ".") . '%</h4></div>';
                                        }
                                        echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format($jml_sep,0,",",".") . ' T</div>';
                                        } else {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format(0, 0, ",", ".") . '%</h4></div>';
                                            echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >' . number_format(0, 0, ",", ".") . ' T</div>';
                                        }
                                        ?>
                                        </div>
                                        </div>
                  <div class="col-xs-6 noPadding" align="right">
                                        <?php
                                            if (!empty($datacl_sp["$thn-09"]['sp']) || !empty($datacl_sp["$thn-09"]['sg']) || !empty($datacl_sp["$thn-09"]['st']) || !empty($datacl_sp["$thn-09"]['tlcc'])) {
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SP</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_sp["$thn-09"]['sp'], 0, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SG</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_sg["$thn-09"]['sg'], 0, ",", "."). ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">ST</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_st["$thn-09"]['st'], 0, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">TL</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($datacl_tlcc["$thn-09"]['tlcc'], 0, ",", ".") . ' T</div>';
                                        } else {
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SP</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SG</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">ST</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">TL</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                        }
                                        ?>
                                    </div> 
                                </div>
          </div>
          <div class="col-xs-12 col-md-3 noPadding" >
              <div class="headmenu cubesRun2">
                                    <div class="col-xs-6 noPadding" >
                                        <div class="col-xs-2 noPadding" align="center">Q3</div>
                                        <?php
                                        $jml_jul = ($datacl_sg["$thn-07"]['sg']) + ($datacl_sp["$thn-07"]['sp']) + ($datacl_st["$thn-07"]['st']) + ($datacl_tlcc["$thn-07"]['tlcc']);
                                        $jml_aug = ($datacl_sg["$thn-08"]['sg']) + ($datacl_sp["$thn-08"]['sp']) + ($datacl_st["$thn-08"]['st']) + ($datacl_tlcc["$thn-08"]['tlcc']);
                                        $jml_sep = ($datacl_sg["$thn-09"]['sg']) + ($datacl_sp["$thn-09"]['sp']) + ($datacl_st["$thn-09"]['st']) + ($datacl_tlcc["$thn-09"]['tlcc']);

                                        $total_upto_q3 = $jml_jul + $jml_aug + $jml_sep;

                                        $total_rkap_q3 = ($rkap_cl[7]['clinker']) + ($rkap_cl[8]['clinker']) + ($rkap_cl[9]['clinker']);
                                        echo '<div align="right">' . number_format($total_rkap_q3, 0, ",", ".") . 'T</div>';

                                        $hasil_q3 = ($total_upto_q3 / $total_rkap_q3) * 100;
                                        if ($hasil_q3 < 100) {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_q3, 2, ",", ".") . '%</h4></div>';
                                        } else {
                                            echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_q3, 2, ",", ".") . '%</h4></div>';
                                        }
                                        echo '<div align="center" style="font-size:12px; font-weight:bold;">' . number_format($total_upto_q3, 0, ",", ".") . ' T</div>';
                                        ?>
                                    </div>
                                    <div class="col-xs-6 noPadding" align="right">
                                        <?php
                                        $tot_sg_q3 = (($datacl_sg["$thn-07"]['sg']) + ($datacl_sg["$thn-08"]['sg']) + ($datacl_sg["$thn-09"]['sg']));
                                        $tot_sp_q3 = (($datacl_sp["$thn-07"]['sp']) + ($datacl_sp["$thn-08"]['sp']) + ($datacl_sp["$thn-09"]['sp']));
                                        $tot_st_q3 = (($datacl_st["$thn-07"]['st']) + ($datacl_st["$thn-08"]['st']) + ($datacl_st["$thn-09"]['st']));
                                        $tot_tlcc_q3 = (($datacl_tlcc["$thn-07"]['tlcc']) + ($datacl_tlcc["$thn-08"]['tlcc']) + ($datacl_tlcc["$thn-09"]['tlcc']));

                                        if (!empty($thn)) {                                            
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SP</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_sp_q3, 0, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SG</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_sg_q3, 0, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SP</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_st_q3, 0, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">TL</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_tlcc_q3, 0, ",", ".") . ' T</div>';
                                        } else {
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SG</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . '</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SP</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . '</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">ST</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . '</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">TL</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . '</div>';
                                        }
                                        ?>
                                    </div> 
                                </div>
          </div>
      </div>
      <div class="row">
          <div class="col-xs-12 col-md-3 noPadding" >
              <div class="img-thumbnail cubesRun2">
                                    <div class="col-xs-7 noPadding" >
                                        <div class="col-xs-2 noPadding" align="center">Oct</div>
                                        <?php if (!empty($DProduction[10]['clinker']))
                                        {
                                            echo '<div class="col-xs-10 noPadding" align="right">'.number_format($DProduction[10]['clinker'],0,",",".").' T</div>';
                                        } else {
                                            echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").' T</div>';
                                        }
                                        ?>
                                        <div class="row-xs-2 noPadding" align="center" >
                                        <?php if (!empty($myData["$thn-10"]) && !empty($DProduction[10]['clinker'])){
                                            $bulan_view = 10;
                                            $pembagi_tetap = $my_day[$bulan_view - 1];

                                            if ($bulan_view == $bulan_curret) {
                                                if ($bulan_curret == $bulan_data) {
                                                    $last_date = $tgl_data;
                                                } elseif ($bulan_curret > $bulan_data) {
                                                    $last_date = $tgl_data;
                                                }
                                            } elseif ($bulan_view < $bulan_curret) {
                                                $last_date = $my_day[$bulan_view - 1];
                                            }
                                            $hasil_oct = (array_sum($myData["$thn-10"])) / ($DProduction[10]['clinker']) * 100;

                                            $pembagi = $last_date;
                                            $rkap_today_oct = ($DProduction[10]['clinker']) / $pembagi_tetap;
                                            $hasil_today_oct = ((array_sum($myData["$thn-10"])) / ($rkap_today_oct * $pembagi)) * 100;
                                            
                                            if ($hasil_today_oct < 100) {
                                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_oct, 2, ",", ".") . '%</h4></div>';
                                            } else {
                                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_oct, 2, ",", ".") . '%</h4></div>';
                                            }
                                            echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >'.number_format (array_sum($myData["$thn-10"]),0,",",".").' T</div>';
                                            
                                            } else {
                                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>'.number_format(0,2,",",".").'%</h4></div>';
                                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >'.number_format(0,2,",",".").' T</div>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-xs-5 noPadding" align="right">
                                        <?php $no=1;
                                            if(!empty($myData["$thn-10"])){
                                                foreach($myData["$thn-10"] as $rows){
                                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">';
                                                if($no==1){echo'II';}elseif($no==2){echo'III';}elseif($no==3){echo'IV';}elseif($no==4){echo'V';}
                                                echo '</div>';
                                                echo '<div class="col-xs-10 noPadding" align="right">'.number_format($rows,0,",",".").' T</div>';
                                                $no++;
                                            }
                                            } else {
                                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SP</div>';
                                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SG</div>';
                                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">ST</div>';
                                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">TL</div>';
                                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            }

                                        ?>
                                    </div> 
                                </div>
              
          </div>
           <div class="col-xs-12 col-md-3 noPadding" >
               <div class="img-thumbnail cubesRun2">
                                    <div class="col-xs-7 noPadding" >
                                        <div class="col-xs-2 noPadding" align="center">Nov</div>
                                        <?php if (!empty($DProduction[11]['clinker']))
                                        {
                                            echo '<div class="col-xs-10 noPadding" align="right">'.number_format($DProduction[11]['clinker'],0,",",".").' T</div>';
                                        } else {
                                            echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").' T</div>';
                                        }
                                        ?>
                                        <div class="row-xs-2 noPadding" align="center" >
                                        <?php if (!empty($myData["$thn-11"]) && !empty($DProduction[11]['clinker'])){
                                            $bulan_view = 11;
                                            $pembagi_tetap = $my_day[$bulan_view - 1];

                                            if ($bulan_view == $bulan_curret) {
                                                if ($bulan_curret == $bulan_data) {
                                                    $last_date = $tgl_data;
                                                } elseif ($bulan_curret > $bulan_data) {
                                                    $last_date = $tgl_data;
                                                }
                                            } elseif ($bulan_view < $bulan_curret) {
                                                $last_date = $my_day[$bulan_view - 1];
                                            }
                                            $hasil_nov = (array_sum($myData["$thn-11"])) / ($DProduction[11]['clinker']) * 100;

                                            $pembagi = $last_date;
                                            $rkap_today_nov = ($DProduction[11]['clinker']) / $pembagi_tetap;
                                            $hasil_today_nov = ((array_sum($myData["$thn-11"])) / ($rkap_today_nov * $pembagi)) * 100;
                                            
                                            if ($hasil_today_nov < 100) {
                                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_nov, 2, ",", ".") . '%</h4></div>';
                                            } else {
                                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_nov, 2, ",", ".") . '%</h4></div>';
                                            }
                                            echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >'.number_format (array_sum($myData["$thn-11"]),0,",",".").' T</div>';
                                            
                                            } else {
                                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>'.number_format(0,2,",",".").'%</h4></div>';
                                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >'.number_format(0,2,",",".").' T</div>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-xs-5 noPadding" align="right">
                                        <?php $no=1;
                                            if(!empty($myData["$thn-11"])){
                                                foreach($myData["$thn-11"] as $rows){
                                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">';
                                                if($no==1){echo'II';}elseif($no==2){echo'III';}elseif($no==3){echo'IV';}elseif($no==4){echo'V';}
                                                echo '</div>';
                                                echo '<div class="col-xs-10 noPadding" align="right">'.number_format($rows,0,",",".").' T</div>';
                                                $no++;
                                            }
                                            } else {
                                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SP</div>';
                                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SG</div>';
                                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">ST</div>';
                                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">TL</div>';
                                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            }

                                        ?>
                                    </div> 
                                </div>
           </div>
          <div class="col-xs-12 col-md-3 noPadding" >
              <div class="img-thumbnail cubesRun2">
                                    <div class="col-xs-7 noPadding" >
                                        <div class="col-xs-2 noPadding" align="center">Dec</div>
                                        <?php if (!empty($DProduction[12]['clinker']))
                                        {
                                            echo '<div class="col-xs-10 noPadding" align="right">'.number_format($DProduction[12]['clinker'],0,",",".").' T</div>';
                                        } else {
                                            echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").' T</div>';
                                        }
                                        ?>
                                        <div class="row-xs-2 noPadding" align="center" >
                                        <?php if (!empty($myData["$thn-12"]) && !empty($DProduction[12]['clinker'])){
                                            $bulan_view = 12;
                                            $pembagi_tetap = $my_day[$bulan_view - 1];

                                            if ($bulan_view == $bulan_curret) {
                                                if ($bulan_curret == $bulan_data) {
                                                    $last_date = $tgl_data;
                                                } elseif ($bulan_curret > $bulan_data) {
                                                    $last_date = $tgl_data;
                                                }
                                            } elseif ($bulan_view < $bulan_curret) {
                                                $last_date = $my_day[$bulan_view - 1];
                                            }
                                            $hasil_dec = (array_sum($myData["$thn-12"])) / ($DProduction[12]['clinker']) * 100;

                                            $pembagi = $last_date;
                                            $rkap_today_dec = ($DProduction[12]['clinker']) / $pembagi_tetap;
                                            $hasil_today_dec = ((array_sum($myData["$thn-12"])) / ($rkap_today_dec * $pembagi)) * 100;
                                            
                                            if ($hasil_today_dec < 100) {
                                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>' . number_format($hasil_dec, 2, ",", ".") . '%</h4></div>';
                                            } else {
                                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>' . number_format($hasil_dec, 2, ",", ".") . '%</h4></div>';
                                            }
                                            echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >'.number_format (array_sum($myData["$thn-12"]),0,",",".").' T</div>';
                                            
                                            } else {
                                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>'.number_format(0,2,",",".").'%</h4></div>';
                                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >'.number_format(0,2,",",".").' T</div>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-xs-5 noPadding" align="right">
                                        <?php $no=1;
                                            if(!empty($myData["$thn-12"])){
                                                foreach($myData["$thn-12"] as $rows){
                                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">';
                                                if($no==1){echo'II';}elseif($no==2){echo'III';}elseif($no==3){echo'IV';}elseif($no==4){echo'V';}
                                                echo '</div>';
                                                echo '<div class="col-xs-10 noPadding" align="right">'.number_format($rows,0,",",".").' T</div>';
                                                $no++;
                                            }
                                            } else {
                                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SP</div>';
                                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SG</div>';
                                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">ST</div>';
                                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                                echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">TL</div>';
                                                echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            }

                                        ?>
                                    </div> 
                                </div>
          </div>
          <div class="col-xs-12 col-md-3 noPadding" >
              <div class="headmenu cubesRun2">
                                    <div class="col-xs-7 noPadding" >
                                        <div class="col-xs-2 noPadding" align="center">Q4</div>
                                        <?php if(!empty($DProduction[10]['clinker']) || !empty($DProduction[11]['clinker']) || !empty($DProduction[12]['clinker'])){
                                                $total_rkap_q4 = ($DProduction[10]['clinker']) + ($DProduction[11]['clinker']) + ($DProduction[12]['clinker']);
                                                echo '<div class="col-xs-10 noPadding" align="right">'.number_format($total_rkap_q4,0,",",".").' T</div>';
                                            } else {
                                                echo '<div class="col-xs-10 noPadding" align="right">'.number_format(0,2,",",".").' T</div>';
                                            }?>
                                        <div class="row-xs-2 noPadding" align="center" >
                                            <?php if(!empty($myData["$thn-10"]) || !empty($myData["$thn-11"]) || !empty($myData["$thn-12"])){
                                                $total_upto_q4 = (array_sum(($myData["$thn-10"]))) + (array_sum(($myData["$thn-11"]))) + (array_sum(($myData["$thn-12"])));
                                                $hasil_q4 = ($total_upto_q4 / $total_rkap_q4) * 100;
                                                if ($hasil_q4 < 100) {
                                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #d9534f"><h4>'.number_format($hasil_q4,2,",",".").'%</h4></div>';
                                                } else {
                                                    echo '<div class="col-xs-12 noPadding" align="center" style="color: #09ff00"><h4>'.number_format($hasil_q4,2,",",".").'%</h4></div>';
                                                }
                                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >'.number_format ($total_upto_q4,0,",",".").' T</div>';
                                            } else {
                                                echo '<div class="col-xs-12 noPadding" align="center" style="color: #f00"><h4>'.number_format(0,2,",",".").'%</h4></div>';
                                                echo '<div class="row-xs-2 noPadding" align="left" style="font-size:12px; font-weight:bold;" >'.number_format(0,2,",",".").' T</div>';
                                            } ?>
                                        </div>
                                    </div>
                                    <div class="col-xs-5 noPadding" align="right">
                                        <?php
                                        if(!empty($myData["$thn-10"]) || !empty($myData["$thn-11"]) || !empty($myData["$thn-12"]))
                                        {
                                            $tot_tns2 = (($myData["$thn-10"]['tonasa2']) + ($myData["$thn-11"]['tonasa2']) + ($myData["$thn-12"]['tonasa2']));
                                            $tot_tns3 = (($myData["$thn-10"]['tonasa3']) + ($myData["$thn-11"]['tonasa3']) + ($myData["$thn-12"]['tonasa3']));
                                            $tot_tns4 = (($myData["$thn-10"]['tonasa4']) + ($myData["$thn-11"]['tonasa4']) + ($myData["$thn-12"]['tonasa4']));
                                            $tot_tns5 = (($myData["$thn-10"]['tonasa5']) + ($myData["$thn-11"]['tonasa5']) + ($myData["$thn-12"]['tonasa5']));
                                            
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">I</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_tns2, 0, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">II</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_tns3, 0, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">III</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_tns4, 0, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">IV</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format($tot_tns5, 0, ",", ".") . ' T</div>';
                                        } else {
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SP</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">SG</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">ST</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                            echo '<div class="col-xs-2 noPadding" align="center" style="font-weight: bold; font-style: italic;">TL</div>';
                                            echo '<div class="col-xs-10 noPadding" align="right">' . number_format(0, 2, ",", ".") . ' T</div>';
                                        }
                                        ?>
                                    </div> 
                                </div>
          </div>
      </div>
  </div>
</div>