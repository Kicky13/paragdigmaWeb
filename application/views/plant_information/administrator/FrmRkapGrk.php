	<script>
			var bulanGrk = $("#bulanGrk").val();
			var tahunGrk = $("#tahunGrk").val();
		$(function (){
			$('#RowGresik').load("<?php echo site_url('plant_administrator/GetRkap'); ?>?bulan=" + bulanGrk +"&tahun="+ tahunGrk +"&company=7000"); 
			$('form#frmRkapGresik').submit(function(){
			$('#loadingGrk00').show();
					var formData = new FormData($(this)[0]);
						$.ajax({
							url: 'plant_administrator/FrmRkapPost',
							type: 'POST',
							data: formData,
							async: false,
							success: function (data) {
								 $('#loadingGrk00').hide();	
								 $('#RowGresik').load("<?php echo site_url('plant_administrator/GetRkap'); ?>?bulan=" + bulanGrk +"&tahun="+ tahunGrk +"&company=7000"); 								 
							},
							cache: false,
							contentType: false,
							processData: false
						});
				return false;
			});
		});
		
		function fcGetDataGrk(){
			$('#loadingGrk01').show();
			var bulanGrk = $("#bulanGrk").val();
			var tahunGrk = $("#tahunGrk").val();
			$('#loadingGrk01').hide();
			$('#RowGresik').load("<?php echo site_url('plant_administrator/GetRkap'); ?>?bulan=" + bulanGrk +"&tahun="+ tahunGrk +"&company=7000"); 
			
		}
	</script>
	<div class="row">
      <div class="col-xs-12 col-sm-6">
        				<form class="form-horizontal" id="frmRkapGresik" method="post">
						  <input type="hidden" class="form-control" name="post[company]" value="7000">
							  <div class="form-group">
								<label for="BlnGrk" class="col-sm-4 control-label">Bulan / Tahun</label>
								<div class="col-sm-4">
								  <select name="post[bulan]" class="form-control" id="bulanGrk" onchange="fcGetDataGrk()">
								  <?php	
									for($i=1;$i <= 12 ; $i++){
										echo "<option value='$i'>".date("F", mktime(0, 0, 0, $i, 10))."</option>";
									}
								  ?>
									</select>
								</div>
								<div class="col-sm-4">
								  <select name="post[tahun]" class="form-control" id="tahunGrk" onchange="fcGetDataGrk()">
								  <?php	
									for($i=2015;$i <= date('Y') ; $i++){
										echo "<option value='$i'>$i</option>";
									}
								  ?>
									</select>
								</div>
							  </div>
							<div class="form-group">
								<label for="lime7000" class="col-sm-4 control-label">Lime Stone</label>
								<div class="col-sm-8">
								  <input type="text" class="form-control" name="post[limestone]" id="lime7000" >
								</div>
							  </div>
							  <div class="form-group">
								<label for="rawmix7000" class="col-sm-4 control-label">Raw Mix</label>
								<div class="col-sm-8">
								  <input type="text" class="form-control" name="post[rawmix]" id="rawmix7000">
								</div>
							  </div>
							  <div class="form-group">
								<label for="clinker7000" class="col-sm-4 control-label">Clinker</label>
								<div class="col-sm-8"> 
								  <input type="text" class="form-control" name="post[clinker]" id="clinker7000">
								</div>
							  </div>
							  <div class="form-group">
								<label for="silica7000" class="col-sm-4 control-label">Silica Stone</label>
								<div class="col-sm-8">
								  <input type="text" class="form-control" name="post[silica]" id="silica7000" >
								</div>
							  </div>
							  <div class="form-group">
								<label for="finecoal7000" class="col-sm-4 control-label">Fine Coal</label>
								<div class="col-sm-8">
								  <input type="text" class="form-control" name="post[finecoal]" id="finecoal7000">
								</div>
							  </div>
							  <div class="form-group">
								<label for="cement7000" class="col-sm-4 control-label">Cement</label>
								<div class="col-sm-8">
								  <input type="text" class="form-control" name="post[cement]" id="cement7000">
								</div>
							  </div>
							  <div class="form-group">
								<div class="col-sm-offset-2 col-sm-8">
								  <button type="submit" class="btn btn-default">Send <span id="loadingGrk00" style="display:none;"><i  class="fa fa-refresh fa-spin" ></i> Loading.. </span></button>
								  
								</div>
							  </div>
						</form>
      </div>
      <div class="col-xs-12 col-sm-6">
			<span id="loadingGrk01" style="display:none;"><i  class="fa fa-refresh fa-spin" ></i> Loading.. </span>
			<div id="RowGresik"></div>

      </div>
    </div>							
