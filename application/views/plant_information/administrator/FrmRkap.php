	<style>
			.textmenu{
				font-size:10px;
			}
			.btnmenu {
				min-width: 80px;
				max-width: 80px;
			}
	</style>	
	<script>
		$(function(){
		$('#LoadCPdg').load("<?php echo site_url('plant_administrator/LoadRkapPdg'); ?>");
		$('#btnPdg').removeClass('btn btn-default btnmenu');
		$('#btnPdg').addClass('btn btn-info btnmenu active');
			$('#btnPdg').click(function(){
				$('#btnPdg').removeClass('btn btn-default btnmenu');
				$('#btnPdg').addClass('btn btn-info btnmenu active');
				$('#btnGrk').removeClass('btn btn-info btnmenu active');
				$('#btnGrk').addClass('btn btn-default btnmenu');
				$('#btnTns').removeClass('btn btn-info btnmenu active');
				$('#btnTns').addClass('btn btn-default btnmenu');
				$('#btnTlcc').removeClass('btn btn-info btnmenu active');
				$('#btnTlcc').addClass('btn btn-default btnmenu');
				$('#LoadCPdg').load("<?php echo site_url('plant_administrator/LoadRkapPdg'); ?>");
			});
			$('#btnGrk').click(function(){
				$('#btnGrk').removeClass('btn btn-default btnmenu');
				$('#btnGrk').addClass('btn btn-info btnmenu active');
				$('#btnPdg').removeClass('btn btn-info btnmenu active');
				$('#btnPdg').addClass('btn btn-default btnmenu');
				$('#btnTns').removeClass('btn btn-info btnmenu active');
				$('#btnTns').addClass('btn btn-default btnmenu');
				$('#btnTlcc').removeClass('btn btn-info btnmenu active');
				$('#btnTlcc').addClass('btn btn-default btnmenu');
				$('#LoadCGrk').load("<?php echo site_url('plant_administrator/LoadRkapGrk'); ?>");
				
			});
			$('#btnTns').click(function(){
				$('#btnTns').removeClass('btn btn-default btnmenu');
				$('#btnTns').addClass('btn btn-info btnmenu active');
				$('#btnPdg').removeClass('btn btn-info btnmenu active');
				$('#btnPdg').addClass('btn btn-default btnmenu');
				$('#btnGrk').removeClass('btn btn-info btnmenu active');
				$('#btnGrk').addClass('btn btn-default btnmenu');
				$('#btnTlcc').removeClass('btn btn-info btnmenu active');
				$('#btnTlcc').addClass('btn btn-default btnmenu');
				$('#LoadCTns').load("<?php echo site_url('plant_administrator/LoadRkapTns'); ?>");
			});
			$('#btnTlcc').click(function(){
				$('#btnTlcc').removeClass('btn btn-default btnmenu');
				$('#btnTlcc').addClass('btn btn-info btnmenu active');
				$('#btnPdg').removeClass('btn btn-info btnmenu active');
				$('#btnPdg').addClass('btn btn-default btnmenu');
				$('#btnGrk').removeClass('btn btn-info btnmenu active');
				$('#btnGrk').addClass('btn btn-default btnmenu');
				$('#btnTns').removeClass('btn btn-info btnmenu active');
				$('#btnTns').addClass('btn btn-default btnmenu');
				
			});
			
			
			
		});
	</script>
	<div class="row" style="padding-left:10px;padding-right:10px;">
			<div class="col-xs-12 col-md-12">
				<ul class="nav nav-tabs">
					<li class="active">
						<button id="btnPdg" data-toggle="tab" href="#pdg" type="button" class="btn btn-default btnmenu ">
							<span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span><br> <span class="textmenu">Padang</span>
						</button>
					</li>
					<li>
						<button id="btnGrk" data-toggle="tab" href="#grk" type="button" class="btn btn-default btnmenu">
							<span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span><br> <span class="textmenu">Gresik</span>
						</button>
					</li>
					<li>
						<button id="btnTns" data-toggle="tab" href="#tns" type="button" class="btn btn-default btnmenu">
							<span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span><br> <span class="textmenu">Tonasa</span>
						</button>
					</li>
					<li>
						<button id="btnTlcc" data-toggle="tab" href="#tlcc" type="button" class="btn btn-default btnmenu">
							<span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span><br> <span class="textmenu">Tonasa</span>
						</button>
					</li>
				</ul>
				<div class="tab-content">
					<div id="pdg" class="tab-pane fade in active">
					  <h3>RKAP Padang</h3>
						<div id="LoadCPdg"></div>
					</div>
					<div id="grk" class="tab-pane fade">
					  <h3>RKAP Gresik</h3>
						<div id="LoadCGrk"></div>
					</div>
					<div id="tns" class="tab-pane fade">
					  <h3>RKAP Tonasa</h3>
						 <div id="LoadCTns"></div>
					</div>
					<div id="tlcc" class="tab-pane fade">
					  <h3>RKAP Tlcc</h3>
						 <div id="LoadCTlcc"></div>
					</div>
				  </div>
			</div>	
		</div>