<?php
#$conn = oci_connect("MSADMIN", "nGUmBEsiwal4N", "10.15.5.96/PMT");
#if (!$conn) {
#   $m = oci_error();
#   echo $m['message'], "\n";
#   exit;
#}

/* User SD Dev Oracle */
	$ora_user_sd_dev = "MSADMIN";
	$ora_pasw_sd_dev = "nGUmBEsiwal4N";
	$ora_db_sd_dev ='(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = 10.15.5.96)(PORT = 1521))) (CONNECT_DATA = (SID = PMT)(SERVER = DEDICATED)))';

	function getConnOraDB($username,$password,$database){
		$conn = @oci_connect($username, $password, $database );
		if (!$conn)
			return false;
		else
		 return $conn;
			}

$conn = getConnOraDB($ora_user_sd_dev, $ora_pasw_sd_dev, $ora_db_sd_dev);
?>