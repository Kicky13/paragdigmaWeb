	<script>

		$(function (){
					var bulanPdg = $("#bulanPdg").val();
			var tahunPdg = $("#tahunPdg").val();
			$('#RowPadang').load("<?php echo site_url('plant_administrator/GetRkap'); ?>?bulan=" + bulanPdg +"&tahun="+ tahunPdg +"&company=3000"); 
			$('form#frmRkapPadang').submit(function(){
			$('#loadingPdg00').show();
					var formData = new FormData($(this)[0]);
						$.ajax({
							url: 'plant_administrator/FrmRkapPost',
							type: 'POST',
							data: formData,
							async: false,
							success: function (data) {
								 $('#loadingPdg00').hide();	
								 $('#RowPadang').load("<?php echo site_url('plant_administrator/GetRkap'); ?>?bulan=" + bulanPdg +"&tahun="+ tahunPdg +"&company=3000"); 								 
							},
							cache: false,
							contentType: false,
							processData: false
						});
				return false;
			});
		});
		
		function fcGetDataPdg(){
			$('#loadingPdg01').show();
			var bulanPdg = $("#bulanPdg").val();
			var tahunPdg = $("#tahunPdg").val();
			$('#loadingPdg01').hide();
			$('#RowPadang').load("<?php echo site_url('plant_administrator/GetRkap'); ?>?bulan=" + bulanPdg +"&tahun="+ tahunPdg +"&company=3000"); 
		}
	</script>
	<div class="row">
      <div class="col-xs-12 col-sm-6">
        				<form class="form-horizontal" id="frmRkapPadang" method="post">
						  <input type="hidden" class="form-control" name="post[company]" value="3000">
							  <div class="form-group">
								<label for="BlnPdg" class="col-sm-4 control-label">Bulan / Tahun</label>
								<div class="col-sm-4">
								  <select name="post[bulan]" class="form-control" id="bulanPdg" onchange="fcGetDataPdg()">
								  <?php	
									for($i=1;$i <= 12 ; $i++){
										echo "<option value='$i'>".date("F", mktime(0, 0, 0, $i, 10))."</option>";
									}
								  ?>
									</select>
								</div>
								<div class="col-sm-4">
								  <select name="post[tahun]" class="form-control" id="tahunPdg" onchange="fcGetDataPdg()">
								  <?php	
									for($i=2015;$i <= date('Y') ; $i++){
										echo "<option value='$i'>$i</option>";
									}
								  ?>
									</select>
								</div>
							  </div>
							  <div class="form-group">
								<label for="lime3000" class="col-sm-4 control-label">Lime Stone</label>
								<div class="col-sm-8">
								  <input type="text" class="form-control" name="post[limestone]" id="lime3000" >
								</div>
							  </div>
							  <div class="form-group">
								<label for="rawmix3000" class="col-sm-4 control-label">Raw Mix</label>
								<div class="col-sm-8">
								  <input type="text" class="form-control" name="post[rawmix]" id="rawmix3000">
								</div>
							  </div>
							  <div class="form-group">
								<label for="clinker3000" class="col-sm-4 control-label">Clinker</label>
								<div class="col-sm-8"> 
								  <input type="text" class="form-control" name="post[clinker]" id="clinker3000">
								</div>
							  </div>
							  <div class="form-group">
								<label for="silica3000" class="col-sm-4 control-label">Silica Stone</label>
								<div class="col-sm-8">
								  <input type="text" class="form-control" name="post[silica]" id="silica3000" >
								</div>
							  </div>
							  <div class="form-group">
								<label for="finecoal3000" class="col-sm-4 control-label">Fine Coal</label>
								<div class="col-sm-8">
								  <input type="text" class="form-control" name="post[finecoal]" id="finecoal3000">
								</div>
							  </div>
							  <div class="form-group">
								<label for="cement3000" class="col-sm-4 control-label">Cement</label>
								<div class="col-sm-8">
								  <input type="text" class="form-control" name="post[cement]" id="cement3000">
								</div>
							  </div>
							  <div class="form-group">
								<div class="col-sm-offset-2 col-sm-8">
								  <button type="submit" class="btn btn-default">Send <span id="loadingPdg00" style="display:none;"><i  class="fa fa-refresh fa-spin" ></i> Loading.. </span></button>
								  
								</div>
							  </div>
						</form>
      </div>
      <div class="col-xs-12 col-sm-6">
			<span id="loadingPdg01" style="display:none;"><i  class="fa fa-refresh fa-spin" ></i> Loading.. </span>
			<div id="RowPadang"></div>
      </div>
    </div>							
