<?php
require_once("connekdb.php");

$array = oci_parse($conn, "SELECT BUKRS,VKBUR,BEZEI,BZIRK,BZTXT,KUNNR,NAME1,WAERS,TOT_PIUTANG,TOT_JAMINAN,TOT_PIUTANG_JT,T_TABLE FROM FI_PIUTANG_DIST  WHERE T_TABLE='P'");
oci_execute($array);

while($row=oci_fetch_array($array))
{   $perPT [$row['VKBUR']] []= $row; 
	$provinsi[$row['VKBUR']] += $row['TOT_PIUTANG'] ;}

$lokasi = oci_parse($conn,"SELECT LOKASI_NAMA,LATITUDE,LONGTITUDE,SAP_CODE FROM INF_LOKASI where LATITUDE is not null order by LOKASI_ID asc");
oci_execute($lokasi);

while($row=oci_fetch_array($lokasi))
{ $colect [] = array($row['LOKASI_NAMA'],$row['LATITUDE'],$row['LONGTITUDE'],$row['SAP_CODE'],$provinsi[$row['SAP_CODE']]);}

echo "<pre>";
print_r($perPT);
echo "</pre>";