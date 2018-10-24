<html>
<head>
  <title>Peta</title>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
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
              width: 500px;
              height: 630px;
              margin:10px;
              padding:0px;
              position: fixed;
              top:0px;
              right:0px;
              z-index:1;

          }
          .total_indonesia{
             width: 400px;
             height: 50px;
              margin:0px;
              padding:0px;
              position: absolute;
              bottom:-1px;
              z-index:1;

          }
          .outside {
              position:relative;
              background-color: white;
            }
          .inside {
            position: absolute;
            bottom: 5px;
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
</style>
<script type="text/javascript">
<?php
  require_once("connekdb.php");
  include_once ("rfc/sapclasses/sap.php");
  $sap = new SAPConnection();
  $sap->Connect('rfc/sapclasses/logon_data.conf');
  if ($sap->GetStatus() == SAPRFC_OK)// SAP OPEN
    $sap->Open();
  if ($sap->GetStatus() != SAPRFC_OK) {
    $sap->PrintStatus();
    exit;
  }
  $fce = $sap->NewFunction('Z_ZCFI_PIUTANG_DIST');  

          if ($fce == TRUE) {
               $fce->I_BUKRS  = "4000"; //Company Code            

            $fce->Call();
            if ($fce->GetStatus() == SAPRFC_OK) {
              $fce->T_BAYAR->Reset();
               while ($fce->T_BAYAR->Next()) {
               $sapPrint[] = ($fce->T_BAYAR->row);
              }
              $fce->T_PIUTANG->Reset();
               while ($fce->T_PIUTANG->Next()) {
               $sapPrint_2[] = ($fce->T_PIUTANG->row);
              }
              
            }
            $fce->Close();
            $sap->Close();
          }

  foreach($sapPrint_2 as $row)
  { 
    $perPT [$row['VKBUR']] []= $row; 
    $TOT_PIUTANG[$row['VKBUR']] += $row['TOT_PIUTANG'] ;
    $TOT_JAMINAN[$row['VKBUR']] += $row['TOT_JAMINAN'] ;
    $TOT_PIUTANG_JT[$row['VKBUR']] += $row['TOT_PIUTANG_JT'] ;
  }

  $lokasi = oci_parse($conn,"SELECT LOKASI_NAMA,LATITUDE,LONGTITUDE,SAP_CODE FROM INF_LOKASI where LATITUDE is not null order by LOKASI_ID asc");
  oci_execute($lokasi);

  while($row=oci_fetch_array($lokasi))
  { $colect [] = array($row['LOKASI_NAMA'],$row['LATITUDE'],$row['LONGTITUDE'],$row['SAP_CODE'],$TOT_PIUTANG[$row['SAP_CODE']],$TOT_JAMINAN[$row['SAP_CODE']],$TOT_PIUTANG_JT[$row['SAP_CODE']]);}
?>

var locations = [
<?php 
  foreach($colect as $rows){
  echo "['".$rows[0]."',".$rows[1].",".$rows[2].",'".$rows[3]."','tonasa.png','".number_format($rows[4])."','".number_format($rows[5])."','".number_format($rows[6])."'],";
}?>
];

  function initialize() {

    var myOptions = {
    // center: new google.maps.LatLng(-6.44995647,71.73339754),
      zoom: 5,
       mapTypeId: google.maps.MapTypeId.ROADMAP

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

 latlngset = new google.maps.LatLng(lat, long);

  var marker = new google.maps.Marker({  
          map: map, 
          title: loan ,
          position: latlngset ,
          icon : icon
        });
        map.setCenter(marker.getPosition())


        var content = "<strong>" + loan +  '</strong><br/> Total Piutang : ' + piutang +"<br/>Total Jaminan : "+ jaminan +" <br/> Total Piutang JT : "+ jt +"<br/ ><a href='#' onclick='duplicate("+ '"' + loan + '","'+add+'"'+")'>Detail...</a> "// + add 
        var infowindow = new google.maps.InfoWindow()
    google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
      return function() {
          infowindow.setContent(content);
          infowindow.open(map,marker);
      };
    })(marker,content,infowindow));  

    } // end for loop
  }

function duplicate(loan,add) {
    $('.info_customer').hide();
    document.getElementById(add).style.display = 'block';
}
function close_c(){
$('.info_customer').hide();

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
                     // echo '<div class="row">';
                     //      echo '<div class="col-lg-12">';
                     //      echo '<button type="button" class="btn btn-default" aria-label="Left Align" onclick="close_c()">';
                     //            echo '<span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>';
                     //          echo '</button>';
                     //          echo '<h3>'.$rowp[0].'</h3>';
                     //      echo '</div>';
                     //    echo '</div>';
                echo '<div class="panel-body">';
                echo '<div class="table-responsive" style="height:550px;overflow-x: auto;">';
                echo '<table class="table table-striped table-hover table-condensed"  style="font-size:10px; overflow: auto;">';
                      echo '<thead>';
                        echo '<tr>';
                          echo '<th>Nama</th>';
                          echo '<th>Total Piutang</th>';
                          echo '<th>Total Jaminan</th>';
                          echo '<th>Total Piutang JT</th>';
                        echo '</tr>';
                      echo '</thead>';
                      echo '<tbody>';
                        foreach ($perPT[$rowp[3]] as $rows){
                        echo '<tr>';
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
                 echo '</div>';
               } 
               ?>

<div class="outside"> 
    <div class="inside">
 <marquee behavior="scroll" direction="left">
      <?php 
        foreach( $sapPrint as $bottom){
         echo "<strong>".$bottom['NAME1']."</strong> : ".number_format($bottom['TOT_PIUTANG'])." , ";
         $toba['bayar'] += $bottom['TOT_PIUTANG'];

        }
    ?>
</marquee>
  </div>
</div>
  <div class="total_indonesia">
    <div class="alert alert-info" role="alert"><strong>Total Bayar Rp. <?= number_format($toba['bayar']) ?></strong></div>
  </div>
  </body>
  </html>