<?php
require("class/connect.php");
include("class/config.php");
include("class/db_sql.php");
include("class/functions.php");
$loginin=getcvar('bakusername');
$rnd=getcvar('bakrnd');
islogin($loginin,$rnd);
$hand=@opendir($bakpath);
$form='ebakredata';
if($_GET['toform'])
{
	$form=$_GET['toform'];
}
require LoadAdminTemp('eChangePath.php');
?>