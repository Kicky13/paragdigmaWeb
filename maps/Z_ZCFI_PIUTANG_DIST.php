<?php
 include_once ("rfc/sapclasses/sap.php");
  $sap = new SAPConnection();
  //$sap->Connect('rfc/sapclasses/logon_data.conf'); // Prod
  $sap->Connect('rfc/sapclasses/logon_datadev.conf'); // Developer
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
              
            }
            $fce->Close();
            $sap->Close();
          }
 // foreach($sapPrint_3 as $row){     $TOT_PIUTANG_JT['TOTALBESAR'] += $row['TOT_PIUTANG_JT'] ;  }
  foreach($sapPrint_2 as $row)
  { 
    $perPT [$row['VKBUR']] []= $row; 
    $TOT_PIUTANG[$row['VKBUR']] += $row['TOT_PIUTANG'] ;
    $TOT_JAMINAN[$row['VKBUR']] += $row['TOT_JAMINAN'] ;
    $TOT_PIUTANG_JT[$row['VKBUR']] += $row['TOT_PIUTANG_JT'] ;
   
  }

print_r( $sapPrint_3);
?>