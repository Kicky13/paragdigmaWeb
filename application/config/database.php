<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
  | -------------------------------------------------------------------
  | DATABASE CONNECTIVITY SETTINGS
  | -------------------------------------------------------------------
  | This file will contain the settings needed to access your database.
  |
  | For complete instructions please consult the 'Database Connection'
  | page of the User Guide.
  |
  | -------------------------------------------------------------------
  | EXPLANATION OF VARIABLES
  | -------------------------------------------------------------------
  |
  |	['hostname'] The hostname of your database server.
  |	['username'] The username used to connect to the database
  |	['password'] The password used to connect to the database
  |	['database'] The name of the database you want to connect to
  |	['dbdriver'] The database type. ie: mysql.  Currently supported:
  mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
  |	['dbprefix'] You can add an optional prefix, which will be added
  |				 to the table name when using the  Active Record class
  |	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
  |	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
  |	['cache_on'] TRUE/FALSE - Enables/disables query caching
  |	['cachedir'] The path to the folder where cache files should be stored
  |	['char_set'] The character set used in communicating with the database
  |	['dbcollat'] The character collation used in communicating with the database
  |				 NOTE: For MySQL and MySQLi databases, this setting is only used
  | 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
  |				 (and in table creation queries made with DB Forge).
  | 				 There is an incompatibility in PHP with mysql_real_escape_string() which
  | 				 can make your site vulnerable to SQL injection if you are using a
  | 				 multi-byte character set and are running versions lower than these.
  | 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
  |	['swap_pre'] A default table prefix that should be swapped with the dbprefix
  |	['autoinit'] Whether or not to automatically initialize the database.
  |	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
  |							- good for ensuring strict SQL while developing
  |
  | The $active_group variable lets you choose which connection group to
  | make active.  By default there is only one group (the 'default' group).
  |
  | The $active_record variables lets you determine whether or not to load
  | the active record class
 */

 

 
$active_group = 'oramso';
$active_record = TRUE;

$tnsbpcdatabase = '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=10.15.3.144)(PORT=1521))(CONNECT_DATA=(SERVICE_NAME=pdbsi)))';


/*$db['forca_pos']['hostname'] = '10.15.3.187';// OLD
$db['forca_pos']['username'] = 'readpos';
$db['forca_pos']['password'] = 'readpos';
$db['forca_pos']['database'] = 'pos';*/

$db['forca_pos']['hostname'] = '10.15.3.124'; // new migrasi
$db['forca_pos']['username'] = 'eis';
$db['forca_pos']['password'] = 'eis@2017*';
$db['forca_pos']['database'] = 'pos';

/*  
$db['forca_pos']['hostname'] = '10.15.2.33';
$db['forca_pos']['username'] = 'pos';
$db['forca_pos']['password'] = 'SIsi@2017#!';
$db['forca_pos']['database'] = 'pos';*/

$db['forca_pos']['dbdriver'] = 'mysql';
$db['forca_pos']['dbprefix'] = '';
$db['forca_pos']['pconnect'] = TRUE;
$db['forca_pos']['db_debug'] = TRUE;
$db['forca_pos']['cache_on'] = FALSE;
$db['forca_pos']['cachedir'] = '';
$db['forca_pos']['char_set'] = 'utf8';
$db['forca_pos']['dbcollat'] = 'utf8_general_ci';
$db['forca_pos']['swap_pre'] = '';
$db['forca_pos']['autoinit'] = TRUE;
$db['forca_pos']['stricton'] = FALSE;


$db['default']['hostname'] = 'localhost';
$db['default']['username'] = '';
$db['default']['password'] = '';
$db['default']['database'] = '';
$db['default']['dbdriver'] = 'mysql';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;

$db['psqlsatu']['hostname'] = '10.15.3.63';
$db['psqlsatu']['username'] = 'pis';
$db['psqlsatu']['password'] = 'semengresik';
$db['psqlsatu']['database'] = 'pisdb';
$db['psqlsatu']['dbdriver'] = 'postgre';
$db['psqlsatu']['dbprefix'] = '';
$db['psqlsatu']['pconnect'] = TRUE;
$db['psqlsatu']['db_debug'] = TRUE;
$db['psqlsatu']['cache_on'] = FALSE;
$db['psqlsatu']['cachedir'] = '';
$db['psqlsatu']['char_set'] = 'utf8';
$db['psqlsatu']['dbcollat'] = 'utf8_general_ci';
$db['psqlsatu']['swap_pre'] = '';
$db['psqlsatu']['autoinit'] = TRUE;
$db['psqlsatu']['stricton'] = FALSE;
$db['psqlsatu']['port'] = 5432;

$db['orasatu']['hostname'] = '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=10.15.5.96)(PORT=1521))(CONNECT_DATA=(SID=PMT)))';
$db['orasatu']['username'] = 'MSADMIN';
$db['orasatu']['password'] = 'nGUmBEsiwal4N';
$db['orasatu']['database'] = '';
$db['orasatu']['dbdriver'] = 'oci8';
$db['orasatu']['dbprefix'] = '';
$db['orasatu']['pconnect'] = FALSE;
$db['orasatu']['db_debug'] = TRUE;
$db['orasatu']['cache_on'] = FALSE;
$db['orasatu']['cachedir'] = '';
$db['orasatu']['char_set'] = 'utf8';
$db['orasatu']['dbcollat'] = 'utf8_general_ci';
$db['orasatu']['swap_pre'] = '';
$db['orasatu']['autoinit'] = TRUE;
$db['orasatu']['stricton'] = FALSE;

$db['oramso']['hostname'] = '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=10.15.5.122)(PORT=1521))(CONNECT_DATA=(SID=pmdb)))';
//$db['default']['hostname'] = '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=10.15.5.76)(PORT=1521))(CONNECT_DATA=(SID=CMSDB)))';
$db['oramso']['username'] = 'mso';
$db['oramso']['password'] = 's3mengres1k';
$db['oramso']['database'] = '';
$db['oramso']['dbdriver'] = 'oci8';
$db['oramso']['dbprefix'] = '';
$db['oramso']['pconnect'] = TRUE;
$db['oramso']['db_debug'] = TRUE;
$db['oramso']['cache_on'] = FALSE;
$db['oramso']['cachedir'] = '';
$db['oramso']['char_set'] = 'utf8';
$db['oramso']['dbcollat'] = 'utf8_general_ci';
$db['oramso']['swap_pre'] = '';
$db['oramso']['autoinit'] = TRUE;
$db['oramso']['stricton'] = FALSE;

$db['msodev']['hostname'] = '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=10.15.5.101)(PORT=1521))(CONNECT_DATA=(SID=devsgg)))';
//$db['default']['hostname'] = '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=10.15.5.76)(PORT=1521))(CONNECT_DATA=(SID=CMSDB)))';
$db['msodev']['username'] = 'hmr';
$db['msodev']['password'] = 'hmrsemen';
$db['msodev']['database'] = '';
$db['msodev']['dbdriver'] = 'oci8';
$db['msodev']['dbprefix'] = '';
$db['msodev']['pconnect'] = TRUE;
$db['msodev']['db_debug'] = TRUE;
$db['msodev']['cache_on'] = FALSE;
$db['msodev']['cachedir'] = '';
$db['msodev']['char_set'] = 'utf8';
$db['msodev']['dbcollat'] = 'utf8_general_ci';
$db['msodev']['swap_pre'] = '';
$db['msodev']['autoinit'] = TRUE;
$db['msodev']['stricton'] = FALSE;

$tnsname = '(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = sggdata3.semenindonesia.com)(PORT = 1521))
        (CONNECT_DATA = (SERVER = DEDICATED) (SID = sgg)))';
$db['paradigma']['hostname'] = $tnsname;
$db['paradigma']['username'] = 'par4digma';
$db['paradigma']['password'] = 'S3m3n6resik';
$db['paradigma']['database'] = '';
$db['paradigma']['dbdriver'] = 'oci8';
$db['paradigma']['dbprefix'] = '';
$db['paradigma']['pconnect'] = FALSE;
$db['paradigma']['db_debug'] = TRUE;
$db['paradigma']['cache_on'] = FALSE;
$db['paradigma']['cachedir'] = '';
$db['paradigma']['char_set'] = 'utf8';
$db['paradigma']['dbcollat'] = 'utf8_general_ci';
$db['paradigma']['swap_pre'] = '';
$db['paradigma']['autoinit'] = TRUE;
$db['paradigma']['stricton'] = FALSE;

$dbhost = '10.15.5.150';    //IP or server name of my host database
$dbport = '1521';    //Oracle port 
$dbname = 'XE';    //TNS Name
$dbConnString = "
  (DESCRIPTION =(ADDRESS_LIST =   (ADDRESS = (PROTOCOL = TCP)(HOST = " . $dbhost . ")(PORT = " . $dbport . ")))
  (CONNECT_DATA =(SERVICE_NAME = " . $dbname . ") ))";

$db['developer'] = array(
    'dsn' => '',
    'hostname' => $dbConnString,
    'username' => 'devpm',
    'password' => 'adaapadenganmu',
    'database' => '',
    'dbdriver' => 'oci8',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => TRUE,
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);

$db['hris']['hostname'] = '10.15.3.67';
$db['hris']['username'] = 'user_hmr';
$db['hris']['password'] = '_R34+ch.Th:ePe4k';
$db['hris']['database'] = 'hris';
$db['hris']['dbdriver'] = 'mysqli';
$db['hris']['dbprefix'] = '';
$db['hris']['pconnect'] = FALSE;
$db['hris']['db_debug'] = FALSE;
$db['hris']['cache_on'] = FALSE;
$db['hris']['cachedir'] = '';
$db['hris']['char_set'] = 'utf8';
$db['hris']['dbcollat'] = 'utf8_general_ci';
$db['hris']['swap_pre'] = '';
$db['hris']['autoinit'] = TRUE;
$db['hris']['stricton'] = FALSE;
$db['hris']['port'] = "3306";

$db['orapdo']['hostname'] = 'oci:dbname=10.15.5.122/pmdb';
$db['orapdo']['username'] = 'mso';
$db['orapdo']['password'] = 's3mengres1k';
$db['orapdo']['database'] = '';
$db['orapdo']['dbdriver'] = 'pdo';
$db['orapdo']['dbprefix'] = '';
$db['orapdo']['pconnect'] = FALSE;
$db['orapdo']['db_debug'] = TRUE;
$db['orapdo']['cache_on'] = FALSE;
$db['orapdo']['cachedir'] = '';
$db['orapdo']['char_set'] = 'utf8';
$db['orapdo']['dbcollat'] = 'utf8_general_ci';
$db['orapdo']['swap_pre'] = '';
$db['orapdo']['autoinit'] = TRUE;
$db['orapdo']['stricton'] = FALSE;

/**
 * OLD SUDAH GAK DI PAKAI
 */

// $tnssapdatabase = '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=dev-sggdata3.semenindonesia.com)(PORT=1521))(CONNECT_DATA=(SID=devsgg)))';
// $db['devsd'] = array(
// 	'dsn' =>'',
// 	'hostname' => $tnssapdatabase,
// 	'username' => 'DEVSD',
// 	'password' => 'gresik45',	
// 	'database' => '',
// 	'dbdriver' => 'oci8',
// 	'dbprefix' => '',
// 	'pconnect' => FALSE,
// 	'db_debug' => TRUE,
// 	//'db_debug' => FALSE,
// 	'cache_on' => FALSE,
// 	'cachedir' => '',
// 	'char_set' => 'utf8',
// 	'dbcollat' => 'utf8_general_ci',	
// 	'swap_pre' => '',
// 	'encrypt' => FALSE,
// 	'compress' => FALSE,
// 	'stricton' => FALSE,
// 	'failover' => array(),
// 	'save_queries' => TRUE
// );

/**
 * NEW DEVSD
 */
$active_group = 'devsi';
$db['devsi'] = array(
    'dsn' => '',
    'hostname' => '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=10.15.3.144)(PORT=1521))(CONNECT_DATA=(SERVICE_NAME=pdbsi)))',
    'username' => 'smigapp',
    //'password' => 'smigapp123',
    'password' => 'L0ntONgKuP4#ng',
    'database' => '',
    'dbdriver' => 'oci8',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => TRUE, //(ENVIRONMENT == 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);

$active_group = 'devsd';
$query_builder = TRUE;
$db['devsd'] = array(
    'dsn' => '',
    'hostname' => '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=10.15.3.144)(PORT=1521))(CONNECT_DATA=(SERVICE_NAME=pdbsi)))',
    'username' => 'APPBISD',
    'password' => 'gresik45smigone1',
    'database' => '',
    'dbdriver' => 'oci8',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => TRUE, //(ENVIRONMENT == 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);


$db['bpc'] = array(
	'dsn' =>'',
	'hostname' => $tnsbpcdatabase,
	'username' => 'smigapp',
	'password' => 'L0ntONgKuP4#ng',	
	'database' => '',
	'dbdriver' => 'oci8',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => TRUE,
	//'db_debug' => FALSE,
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',	
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

$db['sggbi']['hostname'] = '10.15.5.122/sggbi';
$db['sggbi']['username'] = 'qviewadmin';
$db['sggbi']['password'] = 'gadjahmada2011';
$db['sggbi']['database'] = '';
$db['sggbi']['dbdriver'] = 'oci8';
$db['sggbi']['dbprefix'] = '';
$db['sggbi']['pconnect'] = FALSE;
$db['sggbi']['db_debug'] = TRUE;
$db['sggbi']['cache_on'] = FALSE;
$db['sggbi']['cachedir'] = '';
$db['sggbi']['char_set'] = 'utf8';
$db['sggbi']['dbcollat'] = 'utf8_general_ci';
$db['sggbi']['swap_pre'] = '';
$db['sggbi']['autoinit'] = TRUE;
$db['sggbi']['stricton'] = FALSE;



/* End of file database.php */
/* Location: ./application/config/database.php */