<?php
if(!defined('InEmpireBak'))
{
	exit();
}

//Database
$phome_db_ver="5.0";
$phome_db_server="localhost";
$phome_db_port="";
$phome_db_username="2015fenxiao88";
$phome_db_password="2015fenxiao8852099";
$phome_db_dbname="";
$baktbpre="";
$phome_db_char="";

//USER
$set_username="admin";
$set_password="1f174567f23f5d7ff708175df6424326";
$set_loginauth="";
$set_loginrnd="YFfd33mV2MrKwDenkecYWZETWgUwMV";
$set_outtime="60";
$set_loginkey="0";

//COOKIE
$phome_cookiedomain="";
$phome_cookiepath="/";
$phome_cookievarpre="ebak_";

//LANGUAGE
$langr=ReturnUseEbakLang();
$ebaklang=$langr['lang'];
$ebaklangchar=$langr['langchar'];

//BAK
$bakpath="bdata";
$bakzippath="zip";
$filechmod="1";
$phpsafemod="";
$php_outtime="1000";
$limittype="";
$canlistdb="";

//------------ SYSTEM ------------
HeaderIeChar();
?>