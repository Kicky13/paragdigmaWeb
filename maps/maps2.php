<html>
<head>
  <title>Dhasboard Piutang PT. Semen Tonasa</title>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<?php if($_GET['panel'] != 'stop'){echo '<meta http-equiv="refresh" content="600" />';} ?>
<meta http-equiv="Cache-control" content="no-cache">
<script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>
<link rel="stylesheet" href="style/css/bootstrap.min.css">
<link rel="stylesheet" href="style/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="style/js/bootstrap.min.js"></script>
<style>
          html, body {
               font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
               font-size: medium;
               margin-right: 0px;
               margin-left: 0px;
               margin-top: 0px;
               margin-bottom: 0px;
               overflow: hidden;
               }
          .info_customer{
              width: 570px;
              max-height: 610px;
              margin:10px;
              padding:0px;
              position: fixed;
              bottom:25px;
              right:0px;
              z-index:1;
          }
          .total_indonesia{
             width: 380px;
             height: 200px;
              margin:0px;
              padding:0px;
              position: absolute;
              bottom:-90px;
              z-index:1;

          } 
           .reload_indonesia{
             width: 50px;
             height: 200px;
              margin:0px;
              padding:0px;
              position: absolute;
              bottom:-110px;
              left:380px;
              z-index:1;

          }
          .outside {
              position:relative;
              background-color: white;
            }
          .inside {
            position: absolute;
            bottom: 0px;
            background-color: white;
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
  require_once("connekdb.php");
  $lokasi = oci_parse($conn,"SELECT LOKASI_NAMA,LATITUDE,LONGTITUDE,SAP_CODE FROM INF_LOKASI where LATITUDE is not null order by LOKASI_ID asc");
  oci_execute($lokasi);

  while($row=oci_fetch_array($lokasi))
  { 
 
    $colect [] = array($row['LOKASI_NAMA'],$row['LATITUDE'],$row['LONGTITUDE'],$row['SAP_CODE'],$TOT_PIUTANG[$row['SAP_CODE']],$TOT_JAMINAN[$row['SAP_CODE']],$TOT_PIUTANG_JT[$row['SAP_CODE']],'B'.$PLAG[$row['SAP_CODE']]['FLAG'],$PLAG[$row['SAP_CODE']]['KUNNR']);}
  
?>
<script type="text/javascript">


var locations = [
<?php 
  foreach($colect as $rows){
  echo "['".$rows[0]."',".$rows[1].",".$rows[2].",'".$rows[3]."','tonasa.png','".number_format($rows[4])."','".number_format($rows[5])."','".number_format($rows[6])."','".$rows[7]."'],";
}?>
];

  function initialize() {

    var myOptions = {
    // center: new google.maps.LatLng(-6.44995647,71.73339754),
        zoom: 5,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        draggable: true,
        mapTypeControl: false,
        disableDefaultUI: true

    };
    var map = new google.maps.Map(document.getElementById("default"),
        myOptions);

    setMarkers(map,locations)

  }



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
    location.reload(); 
  }

  </script>
 </head>
 <body onload="initialize()" role="document">

    <div id="default" style="width:auto;height:100%;"></div>
               <?php 
              foreach($colect as $rowp){

                  echo '<div id="'.$rowp[3].'" class ="panel panel-primary info_customer" style="display:none;">';
                         echo '<div class="panel-heading contains-buttons">'.$rowp[0];
                      echo '<a class="btn btn-sm btn-danger pull-right" href="javascript:void(0)" onclick="close_c()"><i class="glyphicon glyphicon-remove" aria-hidden="true"></i></a>';
                       echo '</div>';
                      echo '<div class="row">';
                           echo '<div class="col-lg-12">';
                           echo '<button type="button" class="btn btn-default" aria-label="Left Align" onclick="close_c()">';
                                 echo '<span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>';
                               echo '</button>';
                               echo '<h3>'.$rowp[0].'</h3>';
                           echo '</div>';
                         echo '</div>';
       echo '<div class="panel-body">';
    echo '<div class="table-responsive" style="max-height:530px;overflow-x: auto;">';
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
               // if($rowp[7]=="BX"){$zzp = $rowp[7];}else{$zzp = "<td>";}
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
                      echo '</tbody>';
                    echo '</table>';
                echo '</div>';
                echo '</div>';

                  //   echo '<div class="row">';
                  //     echo '<div class="col-lg-12">';
                  //       echo '<div class="panel-group" id="accordion'.$rowp['VKBUR'].$rows['KUNNR'].'">';
                  //           echo '<div class="panel panel-primary">';
                  //               echo '<div class="panel-heading">';
                  //                   echo '<h4 class="panel-title">';
                  //                       echo '<a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$rowp['VKBUR'].$rows['KUNNR'].'">'.$rows['NAME1'].'</a>';
                  //                   echo '</h4>';
                  //               echo '</div>';
                  //               echo '<div id="collapse'.$rowp['VKBUR'].$rows['KUNNR'].'" class="panel-collapse collapse">';
                  //                   echo '<div class="panel-body">';
                  //                                echo "Total Piutang : ".number_format($rows['TOT_PIUTANG'])."<br/>";
                  //                                echo "Total Jaminan : ".number_format($rows['TOT_JAMINAN'])."<br/>";
                  //                                echo "Total Piutang JT : ".number_format($rows['TOT_PIUTANG_JT'])."<br/>";
                  //                  echo ' </div>';
                  //               echo '</div>';
                  //           echo '</div>';
                  //        echo '</div>';
                  //     echo '</div>';
                  //  echo ' </div>';
 //                echo '</div>';
             } 
               ?>

<div class="outside"> 
    <div class="inside">
 <marquee behavior="scroll" direction="left" onmouseover="this.stop()" onmouseout="this.start()" style="font-size:22px;">
      <?php 
/*        foreach( $sapPrint as $bottom){
          if($bottom['TOT_PIUTANG'] != 0){
            if($bottom['FLAG'] == "X"){
              echo "<span class='blink'> <img src='tonasa.png' height='16' width='16'> ".substr($bottom['KUNNR'],-3)." <strong>".$bottom['NAME1']."</strong> : ".number_format($bottom['TOT_PIUTANG'])."</span>";
            }else{
              echo " <img src='tonasa.png' height='16' width='16'> ".substr($bottom['KUNNR'],-3)." <strong>".$bottom['NAME1']."</strong> : ".number_format($bottom['TOT_PIUTANG'])." ";
            }
         
         $toba['bayar'] += $bottom['TOT_PIUTANG'];
       }
        }*/
    ?>
    <strong>Divisi Piutang PT Semen Tonasa</strong>
</marquee>
  </div>
</div>
<?php print_r($colect)?>
  <div class="total_indonesia">
    <div class="alert alert-info" role="alert">
      <span style="color:#FF596D;"><strong>Total Piutang JT <span style="position: absolute;right: 10px;">Rp. <?= number_format($TOT_PIUTANG_JT['TOTALBESAR']) ?></span></strong></span><br/>
      <strong>Total Bayar <span style="position: absolute;right: 10px;">Rp. <?= number_format($toba['bayar']) ?></span></strong> <br/> <span style="position: absolute;right: 10px;font-size:8px;">Date <?= date('d-m-Y H:i:s') ?></span>
    </div>
  </div>
  <div class="reload_indonesia">
  
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
  </body>
  </html>
  