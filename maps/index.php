<html>
	<head>
	<title>Dashboard Piutang</title>
    <link rel="shortcut icon" href="si.ico" />
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<?php if($_GET['panel'] != 'stop'){echo '<meta http-equiv="refresh" content="600" />';} ?>
	<meta http-equiv="Cache-control" content="no-cache">
	<script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>
	<link rel="stylesheet" href="style/css/bootstrap.min.css">
	<link rel="stylesheet" href="style/css/bootstrap-theme.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="../bootstrap/plantView/bootstrap3.3.5/js/jquery-1.11.0.js"></script>
	
	<script src="../assets/js/sidenav.min.js"></script>
	<script src="../assets/js/slide.js"></script>
	<link rel="stylesheet" href="../assets/css/slide.css">
	<script src="style/js/bootstrap.min.js"></script>
	<style> 
			  html, body {
				   font-family: Verdana, Geneva, Arial, 	Helvetica, sans-serif;
				   font-size: medium;
				   margin-right: 0px;
				   margin-left: 0px;
				   margin-top: 0px;
				   margin-bottom: 0px;   
				   /*overflow: hidden;*/
				   }
			  .info_customer{
				  width: 570px;
				  max-height: 50vh;
				  margin:10px;
				  padding:0px;
				  position: fixed;
				  bottom:36vh;
				  right:0px;
				  z-index:1;
			  }
			  .outside {
				  position:relative;
				  background-color: white;
				}
			  .inside {
				position: absolute;
				left:0;
				right:0;
				bottom: 0px;
				background-color: white;
			  }
			  .inside img{
				position:relative;
				top:-2px;
			  }
			  .text-right
				{
					text-align: right !important;
				}
			  .panel-heading.contains-buttons {
					.clearfix;
					.panel-title {
						.pull-left;
						padding-top:5px;
					}
					.btn {
						.pull-right;
					}
				}
				@keyframes blink {  
		0% { color: red; }
		100% { color: black; }
	}
	@-webkit-keyframes blink {
		0% { color: red; }
		100% { color: black; }
	}
	.blink {
		-webkit-animation: blink 0.5s linear infinite;
		-moz-animation: blink 0.5s linear infinite;
		-ms-animation: blink 0.5s linear infinite;
		-o-animation: blink 0.5s linear infinite;
		animation: blink 0.5s linear infinite;
	} 

	</style>
	<?php
  	  error_reporting(0);
	  require_once("connekdb.php");
	  include_once ("rfc/sapclasses/sap.php");
	  $sap = new SAPConnection();
	  $sap->Connect('rfc/sapclasses/logon_data.conf'); //PROD
	  // $sap->Connect('rfc/sapclasses/logon_datadev.conf'); // Developer
	  if ($sap->GetStatus() == SAPRFC_OK)// SAP OPEN
		$sap->Open();
	  if ($sap->GetStatus() != SAPRFC_OK) {
		$sap->PrintStatus();
		exit;
	  }
	  $opco = isset($_GET['company']) ? $_GET['company'] : "1000";
	  $icon='smig.png';
	  $title='Indonesia Group';
	  if($opco=="4000"){
	  	$icon='tonasa.png';
	  	$title='Tonasa';
	  }elseif($opco=="3000"){
	  	$icon='padang.png';
	  	$title='Padang';
	  }elseif($opco=="5000"){
	  	$icon='gresik.png';
	  	$title='Gresik';
	  }elseif($opco=="7000"){
	  	$icon='si.png';
	  	$title='Indonesia';
	  }

	  $fce = $sap->NewFunction('ZCFI_PIUTANG');  
	  if ($fce == TRUE) {

	  	$fce->LR_BUKRS->row['SIGN'] = "I";
		if($opco=="1000"){
			$fce->LR_BUKRS->row['OPTION'] = "BT";
			$fce->LR_BUKRS->row['LOW'] = "2000";
			$fce->LR_BUKRS->row['HIGH'] = "7000";
		}else{
			$fce->LR_BUKRS->row['OPTION'] = "EQ";
			$fce->LR_BUKRS->row['LOW'] = $opco;
		}
		$fce->LR_BUKRS->append($fce->LR_BUKRS->row);

		$fce->Call();
		if ($fce->GetStatus() == SAPRFC_OK) {
		  $fce->T_BAYAR->Reset();
		   while ($fce->T_BAYAR->Next()) {
		   $sapPrint[] = ($fce->T_BAYAR->row);
				 if($fce->T_BAYAR->row['FLAG'] == 'X'){
					$PLAG [$fce->T_BAYAR->row['VKBUR']]= ($fce->T_BAYAR->row);
				  }
		  }
		  $fce->T_PIUTANG->Reset();
		  while ($fce->T_PIUTANG->Next()) {
		   $sapPrint_2[] = ($fce->T_PIUTANG->row);
		  }
		  $fce->T_PIUTANG_2->Reset();
		  while ($fce->T_PIUTANG_2->Next()) {
		   $sapPrint_3[] = ($fce->T_PIUTANG_2->row);
		  }
		  $fce->T_PIUTANG_3->Reset();
		  while ($fce->T_PIUTANG_3->Next()) {
		   $sapPrint_4[] = ($fce->T_PIUTANG_3->row);
		  }
		  
		}
		$fce->Close();
	  }
	  $fce2 = $sap->NewFunction('ZCFI_DISPLAY_AR_AGING');  
	  if ($fce2 == TRUE) {
	  	$fce2->LR_BUKRS->row['SIGN'] = "I";
		if($opco=="1000"){
			$fce2->LR_BUKRS->row['OPTION'] = "BT";
			$fce2->LR_BUKRS->row['LOW'] = "2000";
			$fce2->LR_BUKRS->row['HIGH'] = "7000";
		}else{
			$fce2->LR_BUKRS->row['OPTION'] = "EQ";
			$fce2->LR_BUKRS->row['LOW'] = $opco;
		}
		$fce2->LR_BUKRS->append($fce2->LR_BUKRS->row);

		$fce2->Call();

		if ($fce2->GetStatus() == 0) {

		  $fce2->T_DATA->Reset();
		   while ($fce2->T_DATA->Next()) {
		   $sapPrint_5[] = ($fce2->T_DATA->row);
		  }

		}
		$fce2->Close();
		$sap->Close();
	  }
	  if($sapPrint_3){
		  foreach($sapPrint_3 as $row){
			  $TOT_PIUTANG_JT['TOTALBESAR'] += $row['TOT_PIUTANG_JT'] ;
		  }
	  }
	  if($sapPrint_4){
		  foreach($sapPrint_4 as $row){
			  $TOT_PIUTANG_JT['TOTALALL'] += $row['TOT_PIUTANG_JT'] ;
		  }
	  }
	  $compid=array();
	  if($sapPrint_2){
		  foreach($sapPrint_2 as $row)
		  { 
			$LAST_TRANSACTION["DATE"] = $row['INSERT_DATE'] ;
			$LAST_TRANSACTION["TIME"] = $row['INSERT_TIME'] ;
		  	if(!in_array($row['VKBUR'], $compid)){
		  		$compid[] += $row['VKBUR'];
		  	}
			$perPT [$row['VKBUR']] []= $row; 
			$TOT_PIUTANG["TOTAL"] += $row['TOT_PIUTANG'] ;
			$TOT_PIUTANG_JT["TOTAL"] += $row['TOT_PIUTANG_JT'] ;
			$TOT_PIUTANG[$row['VKBUR']] += $row['TOT_PIUTANG'] ;
			$TOT_JAMINAN[$row['VKBUR']] += $row['TOT_JAMINAN'] ;
			$TOT_PIUTANG_JT[$row['VKBUR']] += $row['TOT_PIUTANG_JT'] ;
	                // $TOT_PIUTANG_JT['TOTALBESAR'] += $row['TOT_PIUTANG_JT'] ;
		  }
		  $time = strtotime($LAST_TRANSACTION["DATE"].$LAST_TRANSACTION["TIME"]);
		  $lastUpdate = date('d-m-Y H:i:s',$time);
	  }
	  $comp = "'".implode("','", $compid)."'";
	  $lokasi = oci_parse($conn,"SELECT LOKASI_NAMA,LATITUDE,LONGTITUDE,SAP_CODE FROM INF_LOKASI where LATITUDE is not null and SAP_CODE in ($comp) order by LOKASI_ID asc");
	  oci_execute($lokasi);
	  while($row=oci_fetch_array($lokasi))
	  { 
		  //if ($TOT_PIUTANG[$row['SAP_CODE']] != 0){
		$colect [] = array($row['LOKASI_NAMA'],$row['LATITUDE'],$row['LONGTITUDE'],$row['SAP_CODE'],$TOT_PIUTANG[$row['SAP_CODE']],$TOT_JAMINAN[$row['SAP_CODE']],$TOT_PIUTANG_JT[$row['SAP_CODE']],'B'.$PLAG[$row['SAP_CODE']]['FLAG'],$PLAG[$row['SAP_CODE']]['KUNNR']);}
		// print_r($colect);exit;
	 // }
	?>
	<script type="text/javascript">

        $(document).on('ready', function () {
			$('#opco').val("<?php echo $opco ?>");
		});
	var locations = [
	<?php 
		if($colect){
			foreach($colect as $rows){
		 	 echo "['".$rows[0]."',".$rows[1].",".$rows[2].",'".$rows[3]."','".$icon."','".number_format($rows[4])."','".number_format($rows[5])."','".number_format($rows[6])."','".$rows[7]."'],";
		}
	  
	}?>
	];
	$(document).on('ready', function () {
        $(".loading_overlay").addClass("opacity-on");
		var myOptions = {
		// center: new google.maps.LatLng(-6.44995647,71.73339754),
			zoom: 5,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			draggable: true,
			mapTypeControl: false,
			disableDefaultUI: true

		};
		var map = new google.maps.Map(document.getElementById("maps"),
			myOptions);

		setMarkers(map,locations)
		// Change the selector if needed
		var $table = $('table'),
		    $bodyCells = $table.find('tbody tr:first').children(),
		    colWidth;

		// Adjust the width of thead cells when window resizes
		$(window).resize(function() {
		    // Get the tbody columns width array
		    colWidth = $bodyCells.map(function() {
		        return $(this).width();
		    }).get();
		    
		    // Set the width of thead columns
		    $table.find('thead tr').children().each(function(i, v) {
		        $(v).width(colWidth[i]);
		    });    
		}).resize(); // Trigger resize handler
		    });



	  function setMarkers(map,locations){

		  var marker, i


	  for (i = 0; i < locations.length; i++)
		{  
		   var loan = locations[i][0]
		   var lat = locations[i][1]
		   var long = locations[i][2]
		   var add =  locations[i][3]
		   var icon = locations[i][4]
		   var piutang = locations[i][5]
		   var jaminan = locations[i][6]
		   var jt = locations[i][7]
			var bx = locations[i][8]
	if(bx =="BX"){
	  var anim = google.maps.Animation.BOUNCE
	}else{
	  var anim = google.maps.Animation.DROP
	}
	 latlngset = new google.maps.LatLng(lat, long);
	  var marker = new google.maps.Marker({  
			  map: map, 
			  title: loan,
			  position: latlngset ,
			  icon : icon,animation: anim
			});
			map.setCenter(marker.getPosition())


			var content = "<strong>" + loan +  '</strong><br/> Total Piutang : ' + piutang +"<br/>Total Jaminan : "+ jaminan +" <br/> Total Piutang JT : "+ jt +"<br/ >"// + add 
			var infowindow = new google.maps.InfoWindow()
			var openedInfoWindow = null
		google.maps.event.addListener(marker,'click', (function(loan,add){ 
			return function() {
			duplicate(loan,add);
		  }
		})(loan,add));  

		google.maps.event.addListener(marker,'mouseover', (function(marker,content,infowindow){ 
			return function() {
			   infowindow.setContent(content);
			   infowindow.open(map,marker);
			};
		})(marker,content,infowindow)); 
		  google.maps.event.addListener(marker, 'mouseout', (function(marker,content,infowindow){ 
			return function() {
			   infowindow.close();
			};
		})(marker,content,infowindow)); 
		} // end for loop
	google.maps.event.addListener(map, 'click', function() {
	  infowindow.close();}) ;
	  
	  }

	  function duplicate(loan,add) {
		$('.info_customer').hide();
		document.getElementById(add).style.display = 'block';
	  }
	  function close_c(){
		$('.info_customer').hide();
	  }
	  function refresh_manual(){
		$(".loading_overlay").removeClass("opacity-on");
		$(".loading_overlay").addClass("opacity-off");
		location.reload(); 
	  }

	  function change_opco(opco){
		$(".loading_overlay").removeClass("opacity-on");
		$(".loading_overlay").addClass("opacity-off");
    	<?php 
    	$spos = 0-(strlen($_SERVER['REQUEST_URI'])-strpos($_SERVER['REQUEST_URI'], '?'));
    	if(strpos($_SERVER['REQUEST_URI'],'?')<=0){
    		$spos = strlen($_SERVER['REQUEST_URI']);
    	}
    	$uri = substr($_SERVER['REQUEST_URI'], 0,$spos);
    	?>
		window.location.href= "http://<?php echo $_SERVER['HTTP_HOST'].$uri ?>?company="+opco;
		
	  }

		var url_redirect =[];
		var current_url = "";
		var title_page = [
			"Receivables"
		];
	  </script>

	 </head>
 <body role="document">
 	<button class="burger-menu burger-menu-x is-active" id="menu-toggle" style="z-index:999999999;">
		<span>toggle menu</span>
	</button>
	<div id="backdrop"></div>
	<header id="header">
		<div class="centering add_fix">
			<div class="page_title">
				<h1 id="page_title" style="display:none"></h1>
				<h1>Receivables</h1>
				<div class="logo">
					<img src="../assets/images/logo.png">
				</div>
			</div>
		</div>
		<div class="loading"></div>
	</header><!--/#header -->
	<div class="loading_overlay"><div class="loader"></div></div>
	<div id="sidenav" class="sidenav-prod sn-sidenav">
		<h1>Menu</h1>
		<ul>
			<li class="haschild">
			<a onclick="openInNewTab('../finance_dashboard/income', this)"><i class="medium material-icons">poll</i>&nbsp;Income Statement</a>
			</li>
			<li class="haschild">
                <a onclick="openInNewTab('material_management/procurement', this)"><i class="medium material-icons">dns</i>&nbsp;Material Management</a>
			</li>
			<li class="haschild">
				<a onclick="openInNewTab('../sales_dashboard/volume', this)"><i class="medium material-icons">receipt</i>&nbsp;Sales</a>
			</li>
			<li class="haschild">
				<a onclick="openInNewTab('../plant_system/dashboard_all', this)"><i class="medium material-icons">domain</i>&nbsp;Production</a>
			</li>
			<li class="haschild">
				<a onclick="openInNewTab('../pos_dashboard/index', this)"><i class="medium material-icons">description</i>&nbsp;Point Of Sales</a>
			</li>
			<li class="haschild">
				<a onclick="openInNewTab('../crm/index/40', this)"><i class="medium material-icons">widgets</i>&nbsp;CRM SMIG</a>
			</li>
			<li class="haschild">
                    <a><i class="medium material-icons">monetization_on</i>&nbsp;Treasury</a>
                    <ul>
                        <li> <a onclick="openInNewTab('../treasury/cashposition', this)">Cash Position</a></li>
					</ul>
					<ul>
                        <li> <a onclick="openInNewTab('../treasury/exchangerate', this)">Exchange Rate</a></li>
					</ul>
					<ul>
                        <li style="color: 008840; font-weight: normal; font-size: 14px">Account Receivable</li>
					</ul>
				</li>
			<li class="haschild">
				<a onclick="changepage('ldap_access/logout')"><i class="medium material-icons">exit_to_app</i>&nbsp;Logout</a>
			</li>
		</ul>
	</div>
    <div id="maps" style="width:auto;height:65vh;margin-top:63px;"></div>
               <?php 
               foreach($colect as $rowp){

                     echo '<div id="'.$rowp[3].'" class ="panel panel-primary info_customer" style="display:none;">';
                             echo '<div class="panel-heading contains-buttons">'.$rowp[0];
                             echo '<a class="btn btn-sm btn-danger pull-right" href="javascript:void(0)" onclick="close_c()"><i class="glyphicon glyphicon-remove" aria-hidden="true"></i></a>';
                             echo '</div>';
                     // echo '<div class="row">';
                     //      echo '<div class="col-lg-12">';
                     //      echo '<button type="button" class="btn btn-default" aria-label="Left Align" onclick="close_c()">';
                     //            echo '<span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>';
                     //          echo '</button>';
                     //          echo '<h3>'.$rowp[0].'</h3>';
                     //      echo '</div>';
                     //    echo '</div>';
                echo '<div class="panel-body">';
                echo '<div class="table-responsive" style="max-height:40vh;overflow-x: auto;">';
                echo '<table class="table table-striped table-hover table-condensed"  style="font-size:10px; overflow: auto;">';
                      echo '<thead>';
                        echo '<tr>';
                          echo '<th>Code</th>';
                          echo '<th>Nama</th>';
                          echo '<th>Total Piutang</th>';
                          echo '<th>Total Jaminan</th>';
                          echo '<th>Total Piutang JT</th>';
                        echo '</tr>';
                      echo '</thead>';
                      echo '<tbody>';
               if($rowp[7]=="BX"){$zzp = $rowp[7];}else{$zzp = "<td>";}
                      if (isset($perPT[$rowp[3]])){
                          
                        foreach ($perPT[$rowp[3]] as $rows){
                            if($rowp[8] == $rows['KUNNR']){$zzp = "<tr class='danger'>";}else{$zzp="<tr>";}
                          echo $zzp;
                          echo '<td>'.substr($rows['KUNNR'],-3).'</td>';
                          echo '<td>'.$rows['NAME1'].'</td>';
                          echo '<td class="text-right">'.number_format($rows['TOT_PIUTANG']).'</td>';
                          echo '<td class="text-right">'.number_format($rows['TOT_JAMINAN']).'</td>';
                          echo '<td class="text-right">'.number_format($rows['TOT_PIUTANG_JT']).'</td>';
                        echo '</tr>';
                        }
                      }
                      echo '</tbody>';
                    echo '</table>';
                echo '</div>';
                echo '</div>';

                   //  echo '<div class="row">';
                   //    echo '<div class="col-lg-12">';
                   //      echo '<div class="panel-group" id="accordion'.$rowp['VKBUR'].$rows['KUNNR'].'">';
                   //          echo '<div class="panel panel-primary">';
                   //              echo '<div class="panel-heading">';
                   //                  echo '<h4 class="panel-title">';
                   //                      echo '<a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$rowp['VKBUR'].$rows['KUNNR'].'">'.$rows['NAME1'].'</a>';
                   //                  echo '</h4>';
                   //              echo '</div>';
                   //              echo '<div id="collapse'.$rowp['VKBUR'].$rows['KUNNR'].'" class="panel-collapse collapse">';
                   //                  echo '<div class="panel-body">';
                   //                               echo "Total Piutang : ".number_format($rows['TOT_PIUTANG'])."<br/>";
                   //                               echo "Total Jaminan : ".number_format($rows['TOT_JAMINAN'])."<br/>";
                   //                               echo "Total Piutang JT : ".number_format($rows['TOT_PIUTANG_JT'])."<br/>";
                   //                 echo ' </div>';
                   //              echo '</div>';
                   //          echo '</div>';
                   //       echo '</div>';
                   //    echo '</div>';
                   // echo ' </div>';
                 echo '</div>';
               } 
               ?>


		
	<div id="content_wrap" style="height:0;"></div>
	<div class="loading_overlay"><div class="loader"></div></div>
  <div class="panel_bottom">
  		<div class="table1">
  		<table class="table">
  			<thead>
	  			<tr>
	  				<td>Kode</td>
	  				<td style='text-align:left'>Nama</td>
	  				<td>Total</td>
	  				<td>Due5</td>
	  				<td>Due10</td>
	  				<td>Due15</td>
	  				<td>Due20</td>
	  				<td>Due25</td>
	  				<td>Due30</td>
	  				<td>Due60</td>
	  				<td>Due180</td>
	  				<td>Due356</td>
	  				<td>DueXXX</td>
	  				<td>Aging Max</td>
	  			</tr>
  			</thead>
  			<tbody>
  				<?php 
			      	if($sapPrint_5){
				        foreach( $sapPrint_5 as $tabledata){
				            echo "<tr>
				            	 <td>".number_format($tabledata['KUNNR'])."</td>
				            	 <td>".$tabledata['NAME1']."</td>
				            	 <td>".number_format($tabledata['TOTAL'])."</td>
				            	 <td>".number_format($tabledata['DUE5'])."</td>
				            	 <td>".number_format($tabledata['DUE10'])."</td>
				            	 <td>".number_format($tabledata['DUE15'])."</td>
				            	 <td>".number_format($tabledata['DUE20'])."</td>
				            	 <td>".number_format($tabledata['DUE25'])."</td>
				            	 <td>".number_format($tabledata['DUE30'])."</td>
				            	 <td>".number_format($tabledata['DUE60'])."</td>
				            	 <td>".number_format($tabledata['DUE180'])."</td>
				            	 <td>".number_format($tabledata['DUE356'])."</td>
				            	 <td>".number_format($tabledata['DUEXXX'])."</td>
				            	 <td>".number_format($tabledata['AGING_MAX'])."</td>
				            	 </tr>";
				        }
			      	}
			    ?>
  			</tbody>
  		</table>
  	</div>
  	<div class="table2">
  		<table class="table">
  			<thead>
	  			<tr>
	  				<td>Kode</td>
	  				<td>Nama</td>
	  				<td>Total</td>
	  				<td>Due5</td>
	  				<td>Due10</td>
	  				<td>Due15</td>
	  				<td>Due20</td>
	  				<td>Due25</td>
	  				<td>Due30</td>
	  				<td>Due60</td>
	  				<td>Due180</td>
	  				<td>Due356</td>
	  				<td>DueXXX</td>
	  				<td>Aging Max</td>
	  			</tr>
  			</thead>
  			<tbody>
  				<?php 
			      	if($sapPrint_5){
				        foreach( $sapPrint_5 as $tabledata){
				            echo "<tr>
				            	 <td>".number_format($tabledata['KUNNR'])."</td>
				            	 <td style='text-align:left'>".$tabledata['NAME1']."</td>
				            	 <td>".number_format($tabledata['TOTAL'])."</td>
				            	 <td>".number_format($tabledata['DUE5'])."</td>
				            	 <td>".number_format($tabledata['DUE10'])."</td>
				            	 <td>".number_format($tabledata['DUE15'])."</td>
				            	 <td>".number_format($tabledata['DUE20'])."</td>
				            	 <td>".number_format($tabledata['DUE25'])."</td>
				            	 <td>".number_format($tabledata['DUE30'])."</td>
				            	 <td>".number_format($tabledata['DUE60'])."</td>
				            	 <td>".number_format($tabledata['DUE180'])."</td>
				            	 <td>".number_format($tabledata['DUE356'])."</td>
				            	 <td>".number_format($tabledata['DUEXXX'])."</td>
				            	 <td>".number_format($tabledata['AGING_MAX'])."</td>
				            	 </tr>";
				        }
			      	}
			    ?>
  			</tbody>
  		</table>
  	</div>
  	<div class="table3">
  		<table class="table" style="margin-top: -33px;">
  			<thead>
	  			<tr>
	  				<td>Kode</td>
	  				<td>Nama</td>
	  				<td>Total</td>
	  				<td>Due5</td>
	  				<td>Due10</td>
	  				<td>Due15</td>
	  				<td>Due20</td>
	  				<td>Due25</td>
	  				<td>Due30</td>
	  				<td>Due60</td>
	  				<td>Due180</td>
	  				<td>Due356</td>
	  				<td>DueXXX</td>
	  				<td>Aging</td>
	  			</tr>
  			</thead>
  			<thead>
	  			<tr>
	  				<?php 
			      	if($sapPrint_5){
				        foreach( $sapPrint_5 as $tabledata){
				        	$TOTAL += $tabledata['TOTAL'];
				        	$DUE5 += $tabledata['DUE5'];
				        	$DUE10 += $tabledata['DUE10'];
				        	$DUE15 += $tabledata['DUE15'];
				        	$DUE20 += $tabledata['DUE20'];
				        	$DUE25 += $tabledata['DUE25'];
				        	$DUE30 += $tabledata['DUE30'];
				        	$DUE60 += $tabledata['DUE60'];
				        	$DUE180 += $tabledata['DUE180'];
				        	$DUE356 += $tabledata['DUE356'];
				        	$DUEXXX += $tabledata['DUEXXX'];
				        	$AGING_MAX += $tabledata['AGING_MAX'];
				        }
				        echo "<tr>
				            	 <td></td>
				            	 <td style='text-align:left'>Total (in IDR mio)</td>
				            	 <td>".number_format($TOTAL/1000000)."</td>
				            	 <td>".number_format($DUE5/1000000)."</td>
				            	 <td>".number_format($DUE10/1000000)."</td>
				            	 <td>".number_format($DUE15/1000000)."</td>
				            	 <td>".number_format($DUE20/1000000)."</td>
				            	 <td>".number_format($DUE25/1000000)."</td>
				            	 <td>".number_format($DUE30/1000000)."</td>
				            	 <td>".number_format($DUE60/1000000)."</td>
				            	 <td>".number_format($DUE180/1000000)."</td>
				            	 <td>".number_format($DUE356/1000000)."</td>
				            	 <td>".number_format($DUEXXX/1000000)."</td>
				            	 <td>".number_format($AGING_MAX/1000000)."</td>
				            	 </tr>";
			      	}
			    ?>
	  			</tr>
  			</thead>
  			<tbody>
  				<?php 
			      	if($sapPrint_5){
				        foreach( $sapPrint_5 as $tabledata){
				            echo "<tr>
				            	 <td>".number_format($tabledata['KUNNR'])."</td>
				            	 <td>".$tabledata['NAME1']."</td>
				            	 <td>".number_format($tabledata['TOTAL'])."</td>
				            	 <td>".number_format($tabledata['DUE5'])."</td>
				            	 <td>".number_format($tabledata['DUE10'])."</td>
				            	 <td>".number_format($tabledata['DUE15'])."</td>
				            	 <td>".number_format($tabledata['DUE20'])."</td>
				            	 <td>".number_format($tabledata['DUE25'])."</td>
				            	 <td>".number_format($tabledata['DUE30'])."</td>
				            	 <td>".number_format($tabledata['DUE60'])."</td>
				            	 <td>".number_format($tabledata['DUE180'])."</td>
				            	 <td>".number_format($tabledata['DUE356'])."</td>
				            	 <td>".number_format($tabledata['DUEXXX'])."</td>
				            	 <td>".number_format($tabledata['AGING_MAX'])."</td>
				            	 </tr>";
				        }
			      	}
			    ?>
  			</tbody>
  		</table>
  	</div>
    <p class="date">Last Update <?= $lastUpdate ?></p>
    <marquee behavior="scroll" direction="left" onmouseover="this.stop()" onmouseout="this.start()" style="border-top:1px solid #aaa;font-size:18px;padding:5px 0 4px 0;">
	      <?php 
	      	if($sapPrint){

		        foreach( $sapPrint as $bottom){
		          if($bottom['TOT_PIUTANG'] != 0){
		            if($bottom['FLAG'] == "X"){
		              echo "<span class='blink'> <img src=$icon height='16' width='16'> ".substr($bottom['KUNNR'],-3)." <strong>".$bottom['NAME1']."</strong> : ".number_format($bottom['TOT_PIUTANG'])."</span>";
		            }else{
		              echo " <img src=$icon height='16' width='16'> ".substr($bottom['KUNNR'],-3)." <strong>".$bottom['NAME1']."</strong> : ".number_format($bottom['TOT_PIUTANG'])." ";
		            }
		         
		         $toba['bayar'] += $bottom['TOT_PIUTANG'];
		       }
		        }
	      	}
	    ?>
	    <strong>PT Semen <?php echo $title ?></strong>
	</marquee>
</div>

<div class="panel_top">
    <div class="choose_opco col-lg-2">
    	<div class="dropdown">
		  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		    <?
		      $opco = isset($_GET['company']) ? $_GET['company'] : "1000";
			  $title ="Semen Indonesia Group";
			  if($opco=="4000"){
			  	$title ="Semen Tonasa";
			  }elseif($opco=="3000"){
			  	$title ="Semen Padang";
			  }elseif($opco=="5000"){
			  	$title ="Semen Gresik";
			  }elseif($opco=="7000"){
			  	$title ="Semen Indonesia";
			  }
			  echo $title;
		    ?>
		  </button>
		  <div class="dropdown-menu" id="choose_opco" aria-labelledby="dropdownMenuButton">
		    <a class="dropdown-item" onclick="change_opco(1000)">Semen Indonesia Group</a>
		    <a class="dropdown-item" onclick="change_opco(7000)">Semen Indonesia</a>
		    <a class="dropdown-item" onclick="change_opco(5000)">Semen Gresik</a>
		    <a class="dropdown-item" onclick="change_opco(3000)">Semen Padang</a>
		    <a class="dropdown-item" onclick="change_opco(4000)">Semen Tonasa</a>
		  </div>
		</div>
  		<!-- <select id="opco">
  			<option value="1000">Semen Indonesia Group</option>
  			<option value="7000">Semen Indonesia</option>
  			<option value="5000">Semen Gresik</option>
  			<option value="3000">Semen Padang</option>
  			<option value="4000">Semen Tonasa</option>
  		</select> -->
    </div>
    <div class="col-lg-9 col-md-9 piutang" style="padding:0px;">
    	<div class="col-lg-3 col-md-3">
  			<h1 class="title-top">Total Piutang</h1>
  			<span style="color:#3191e8;">Rp. <?= number_format($TOT_PIUTANG['TOTAL']) ?></span>
  		</div>
  		<div class="col-lg-3 col-md-3">
  			<h1 class="title-top">Total Piutang JT All</h1>
  			<span style="color:#b92b3c;">Rp. <?= number_format($TOT_PIUTANG_JT['TOTALALL']) ?></span>
  		</div>
  		<div class="col-lg-3 col-md-3">
  			<h1 class="title-top">Total Piutang JT </h1>
  			<span style="color:#FF596D;">Rp. <?= number_format($TOT_PIUTANG_JT['TOTALBESAR']) ?></span>
  		</div>
  		<div class="col-lg-3 col-md-3">
  			<h1 class="title-top">Total Bayar </h1>
  			<span style="color:#175b98;">Rp. <?= number_format($toba['bayar']) ?></span>
  		</div>
    </div>
  	<div class="col-lg-1 reload_indonesia" align="right">
    	<button type="button" class="btn btn-primary" aria-label="Left Align" onclick="refresh_manual()">
        	<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
    	</button>
      	<?php
	    if($_GET['panel'] == 'stop'){
	        echo '<a href="?panel=play" class="btn btn-success" role="button">';
	           echo '<span class="glyphicon glyphicon-play" aria-hidden="true"></span>';
	        echo '</a>';
	    }else{
            echo '<a href="?panel=stop" class="btn btn-danger" role="button">';
              echo '<span class="glyphicon glyphicon-stop" aria-hidden="true"></span>';
            echo '</a>';
	    }?>
  	</div>
  </div>
  <!-- TAMBAHAN -->
  <style type="text/css">
  	.panel_top{
  		top:77px;
  		margin:0 auto;
  		right:10px;
  		left:10px;
  		width: auto;
  		position: fixed;
  		background: rgba(255,255,255,1);
  		-webkit-box-shadow: 1px 1px 1px #c5c5c5;
		-moz-box-shadow: 1px 1px 1px #c5c5c5;
		box-shadow: 1px 1px 1px #c5c5c5;
  	}
  	.piutang{
  		font-size: 12px;
  	}
  	.piutang div{
  		padding: 10px 10px 10px 20px;
  		border-right: 1px solid #f1f1f1;
  	}
  	.title-top{
  		font-size: 12px;
  		margin: 0px;
  		color: #aaa;
  	}
  	.title-top+span{
  		font-size: 16px;
  		font-weight: bold;
  	}
  	.panel_bottom{
  		height:30vh;
  		left:0px;
  		right:0px;
  		width: auto;
  		background: rgba(255,255,255,1);
  		padding:10px;
  		box-sizing: border-box;
  	}
  	.panel_bottom thead{
  		color: #ea4e4e;
  		font-weight: bold;
  	}
  	table, table td{
  		border:none;
  		font-size: 10px;
  		text-align: center;
  	}
	.table1, .table3{
		height:30px;
		overflow: hidden;
		background: #fff;
		width: 100%;
		z-index: 9;
		position: relative;
		border-bottom: 1px solid #eb4d4e;
	}
	.table3{
		height:30px;
		overflow: hidden;
		background: #eb4d4e;
		color:#fff !important;
		width: 100%;
		z-index: 9;
		position: relative;
		border-bottom: none;
		border-top: 1px solid #eb4d4e;
	}
	.table3 td{
		color:#fff !important;
	}
	.table2{
		margin-top: -30px;
		height:25vh;
		overflow: scroll;
	}

  	.reload_indonesia{
  		background: #f3f3f3;
  		padding: 13px 0;
  		text-align:center;
  	}
  	.date{
  		font-size: 8px;
  		float: right;
  		margin-top:10px;
  		color:#31708f;
  	}
  	.total_indonesia{
  		width: 100%;
  	}
	.total_indonesia p{
  		margin-bottom:0;
  	}

	.total_indonesia span{
  		float: right;
  	}
  	.choose_opco{
  		background: #ea4e4e;
  		padding:10px 0px 11px 0px;
  	}
  	#dropdownMenuButton{
  		background: transparent;
  		color:#fff;
  		width: 100%;
  		text-align: left;
  	}
  	.dropdown-menu{
  		margin-top: 10px;
  		border-radius: 0;
  		background: #ea4e4e;
  		width: 100%;
  		padding:0;
  	}
  	.dropdown-menu a{
  		display: block;
  		color:#fff;
  		padding:8px 12px;
  		border-bottom: 1px solid #de4849;
  		font-weight: normal;
  		cursor: pointer;
  	}
  	.dropdown-menu a:hover{
  		background:#de4849;
  		text-decoration: none;
  	}
  	.dropdown-menu a:last-child{
  		border-bottom: none;
  	}
  	#opco{
  		background: transparent;
  		border:1px solid #aaa;
  		border-radius: 0;
  		width:100%;
  		font-size:12px;
  		padding:5px;
  	}

	.loading_overlay {
	    position: absolute;
	    top: 0px;
	    bottom: 0;
	    right: 0;
	    left: 0;
	    background: rgba(
	    	0, 0, 0, .7);
	    z-index: 99999;
	}
	.loading_overlay.opacity-off {
	    opacity: 1;
	    -webkit-transition: all 1s ease;
	    -moz-transition: all 1s ease;
	    -ms-transition: all 1s ease;
	    -o-transition: all 1s ease;
	    transition: all 1s ease;
	}
	.loading_overlay {
	    opacity: 1;
	}
	.loading_overlay.opacity-on {
	    opacity: 0;
	    z-index: -1;
	    -webkit-transition: all 2s ease;
	    -moz-transition: all 2s ease;
	    -ms-transition: all 2s ease;
	    -o-transition: all 2s ease;
	    transition: all 2s ease;
	}
	.loader,
	.loader:before,
	.loader:after {
	    border-radius: 50%;
	    width: 2.5em;
	    height: 2.5em;
	    -webkit-animation-fill-mode: both;
	    animation-fill-mode: both;
	    -webkit-animation: load7 1.8s infinite ease-in-out;
	    animation: load7 1.8s infinite ease-in-out;
	}
	.loader {
	    color: #fff;
	    font-size: 10px;
	    margin: 23% auto;
	    position: relative;
	    text-indent: -9999em;
	    -webkit-transform: translateZ(0);
	    -ms-transform: translateZ(0);
	    transform: translateZ(0);
	    -webkit-animation-delay: -0.16s;
	    animation-delay: -0.16s;
	}
	.loader:before,
	.loader:after {
	    content: '';
	    position: absolute;
	    top: 0;
	}
	.loader:before {
	    left: -3.5em;
	    -webkit-animation-delay: -0.32s;
	    animation-delay: -0.32s;
	}
	.loader:after {
	    left: 3.5em;
	}
	.dropdown-toggle::after {
	    display: inline-block;
	    width: 0;
	    height: 0;
	    margin-left: 1.255em;
    	vertical-align: 0.180em;
	    content: "";
	    border-top: .3em solid;
	    border-right: .3em solid transparent;
	    border-bottom: 0;
	    border-left: .3em solid transparent;
	    position: absolute;
	    right: 15px;
	    top: 15px;
	}
	#header{
		top:0;
	}
	@-webkit-keyframes load7 {
	    0%, 80%, 100% {
	        box-shadow: 0 2.5em 0 -1.3em;
	    }
	    40% {
	        box-shadow: 0 2.5em 0 0;
	    }
	}
	@keyframes load7 {
	    0%, 80%, 100% {
	        box-shadow: 0 2.5em 0 -1.3em;
	    }
	    40% {
	        box-shadow: 0 2.5em 0 0;
	    }
	}

  </style>
  <!-- End TAMBAHAN -->
  
  </body>
  </html>
  