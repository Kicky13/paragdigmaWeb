<html>
	<head>
		<title>Syncrone Data</title>
			<base href='<?php echo base_url(); ?>' />
				<link href="bootstrap/plantView/bootstrap3.3.5/css/bootstrap.min.css" rel="stylesheet">
				<link href="bootstrap/plantView/fontA/css/font-awesome.css" rel="stylesheet">
				<link href="bootstrap/plantView/bootstrap3.3.5/css/simple-sidebar.css" rel="stylesheet">
				<script src="bootstrap/plantView/bootstrap3.3.5/js/jquery-1.11.0.js"></script>
				<script src="bootstrap/plantView/bootstrap3.3.5/js/bootstrap.js"></script>
	</head>
	<body>
		<button type="button" class="btn btn-primary btn-lg btn-block" onclick="syncrone_all()">
			<span class="loading_x"  style="display:none;"><i  class="fa fa-spinner fa-spin fa-1x" ></i></span> 
				Syncrone All
			<span class="loading_x"  style="display:none;"><i  class="fa fa-spinner fa-spin fa-1x" ></i></span>
		</button>
	<div class="list-group">
		<div id="i_01" class="alert  list-group-item" role="alert" style="display:none;">
			<span  class="loading_a"  style="display:none;"><i  class="fa fa-spinner fa-spin fa-1x" ></i></span>
				Syncrone User Employee 
			<span class="loading_a"  style="display:none;"><i  class="fa fa-spinner fa-spin fa-1x" ></i></span>
			<span id="p_01"></span>
		</div>
		<div id="i_02" class="alert  list-group-item" role="alert" style="display:none;">
			<span class="loading_b"  style="display:none;"><i  class="fa fa-spinner fa-spin fa-1x" ></i></span>	
				Syncrone Unit Kerja
			<span class="loading_b"  style="display:none;"><i  class="fa fa-spinner fa-spin fa-1x" ></i></span>
			<span id="p_02"></span>
		</div>
		<div id="i_03" class="alert list-group-item" role="alert" style="display:none;">
			<span class="loading_c"  style="display:none;"><i  class="fa fa-spinner fa-spin fa-1x" ></i></span>	
				Syncrone Atasan
			<span class="loading_c"  style="display:none;"><i  class="fa fa-spinner fa-spin fa-1x" ></i></span>
			<span id="p_03"></span>
		</div>
		<div id="i_04" class="alert  list-group-item" role="alert" style="display:none;">
			<span class="loading_d"  style="display:none;"><i  class="fa fa-spinner fa-spin fa-1x" ></i></span>	
				Syncrone Jabatan
			<span class="loading_d"  style="display:none;"><i  class="fa fa-spinner fa-spin fa-1x" ></i></span>
			<span id="p_04"></span>
		</div>
	</div>
	<script>
		function syncrone_all(){
				$('span.loading_x').show();
				user_employee();
			}
		function user_employee(){
				$('#i_01').show();
				$('.loading_a').show();
					$.ajax({
						url: 'Sync/user_employee',
						type: 'POST',
						data: {val:1},
						async: false,
						success: function (data) {
							$("#p_01").html("<strong>Insert Data "+data+"</strong>");
							$('.loading_a').hide();
							$('#i_01').addClass("alert-success");
							//unit_kerja();
							$('span.loading_x').hide();
						}
					});
				
			}
		function unit_kerja(){
				$('#i_02').show();
				$('.loading_b').show();
					$.ajax({
						url: 'Sync/unit_kerja',
						type: 'POST',
						data: {val:1},
						async: false,
						success: function (data) {
						$("#p_02").html("<strong>Insert Data "+data+"</strong>");
							$('.loading_b').hide();
							$('#i_02').addClass("alert-success");
							atasan();
						}
					});
				
			}
		function atasan(){
				$('#i_03').show();
				$('.loading_c').show();
				$.ajax({
						url: 'Sync/atasan',
						type: 'POST',
						data: {val:1},
						async: false,
						success: function (data) {
						$("#p_03").html("<strong>Insert Data "+data+"</strong>");
							$('.loading_c').hide();
							$('#i_03').addClass("alert-success");
						//	jabatan();
						}
					});
			}
		function jabatan(){
				$('#i_04').show();
				$('.loading_d').show();
				$.ajax({
						url: 'Sync/jabatan',
						type: 'POST',
						data: {val:1},
						async: false,
						success: function (data) {
						$("#p_04").html("<strong>Insert Data "+data+"</strong>");
							$('.loading_d').hide();
							$('#i_04').addClass("alert-success");
						}
					});
				$('span.loading_x').hide();
			}
	</script>
	</body>
</html>