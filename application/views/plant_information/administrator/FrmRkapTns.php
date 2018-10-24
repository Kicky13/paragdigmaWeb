	<script>
			var bulanTns = $("#bulanTns").val();
			var tahunTns = $("#tahunTns").val();
		$(function (){
			$('#RowTonasa').load("<?php echo site_url('plant_administrator/GetRkap'); ?>?bulan=" + bulanTns +"&tahun="+ tahunTns +"&company=4000"); 
			$('form#frmRkapTonasa').submit(function(){
			$('#loadingTns00').show();
					var formData = new FormData($(this)[0]);
						$.ajax({
							url: 'plant_administrator/FrmRkapPost',
							type: 'POST',
							data: formData,
							async: false,
							success: function (data) {
								 $('#loadingTns00').hide();	
								 $('#RowTonasa').load("<?php echo site_url('plant_administrator/GetRkap'); ?>?bulan=" + bulanTns +"&tahun="+ tahunTns +"&company=4000"); 								 
							},
							cache: false,
							contentType: false,
							processData: false
						});
				return false;
			});
		});
		
		function fcGetDataTns(){
			$('#loadingTns01').show();
			var bulanTns = $("#bulanTns").val();
			var tahunTns = $("#tahunTns").val();
			$('#loadingTns01').hide();
			$('#RowTonasa').load("<?php echo site_url('plant_administrator/GetRkap'); ?>?bulan=" + bulanTns +"&tahun="+ tahunTns +"&company=4000"); 
			
		}
	</script>
	<div class="row">
      <div class="col-xs-12 col-sm-6">
        				<form class="form-horizontal" id="frmRkapTonasa" method="post">
						  <input type="hidden" class="form-control" name="post[company]" value="4000">
							  <div class="form-group">
								<label for="BlnTns" class="col-sm-4 control-label">Bulan / Tahun</label>
								<div class="col-sm-4">
								  <select name="post[bulan]" class="form-control" id="bulanTns" onchange="fcGetDataTns()">
								  <?php	
									for($i=1;$i <= 12 ; $i++){
										echo "<option value='$i'>".date("F", mktime(0, 0, 0, $i, 10))."</option>";
									}
								  ?>
									</select>
								</div>
								<div class="col-sm-4">
								  <select name="post[tahun]" class="form-control" id="tahunTns" onchange="fcGetDataTns()">
								  <?php	
									for($i=2015;$i <= date('Y') ; $i++){
										echo "<option value='$i'>$i</option>";
									}
								  ?>
									</select>
								</div>
							  </div>
							 <div class="form-group">
								<label for="lime4000" class="col-sm-4 control-label">Lime Stone</label>
								<div class="col-sm-8">
								  <input type="text" class="form-control" name="post[limestone]" id="lime4000" >
								</div>
							  </div>
							  <div class="form-group">
								<label for="rawmix4000" class="col-sm-4 control-label">Raw Mix</label>
								<div class="col-sm-8">
								  <input type="text" class="form-control" name="post[rawmix]" id="rawmix4000">
								</div>
							  </div>
							  <div class="form-group">
								<label for="clinker4000" class="col-sm-4 control-label">Clinker</label>
								<div class="col-sm-8"> 
								  <input type="text" class="form-control" name="post[clinker]" id="clinker4000">
								</div>
							  </div>
							  <div class="form-group">
								<label for="silica4000" class="col-sm-4 control-label">Silica Stone</label>
								<div class="col-sm-8">
								  <input type="text" class="form-control" name="post[silica]" id="silica4000" >
								</div>
							  </div>
							  <div class="form-group">
								<label for="finecoal4000" class="col-sm-4 control-label">Fine Coal</label>
								<div class="col-sm-8">
								  <input type="text" class="form-control" name="post[finecoal]" id="finecoal4000">
								</div>
							  </div>
							  <div class="form-group">
								<label for="cement4000" class="col-sm-4 control-label">Cement</label>
								<div class="col-sm-8">
								  <input type="text" class="form-control" name="post[cement]" id="cement4000">
								</div>
							  </div>
							  <div class="form-group">
								<div class="col-sm-offset-2 col-sm-8">
								  <button type="submit" class="btn btn-default">Send <span id="loadingTns00" style="display:none;"><i  class="fa fa-refresh fa-spin" ></i> Loading.. </span></button>
								  
								</div>
							  </div>
						</form>
      </div>
      <div class="col-xs-12 col-sm-6">
			<span id="loadingTns01" style="display:none;"><i  class="fa fa-refresh fa-spin" ></i> Loading.. </span>
			<div id="RowTonasa"></div>

      </div>
    </div>							
