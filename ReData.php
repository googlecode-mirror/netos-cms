<?php
require("class/connect.php");
include("class/config.php");
include("class/db_sql.php");
include("class/functions.php");
$loginin=getcvar('bakusername');
$rnd=getcvar('bakrnd');
islogin($loginin,$rnd);
$link=db_connect();
$empire=new mysqlquery();
$mypath=$_GET['mypath'];
$mydbname=$_GET['mydbname'];
$selectdbname=$phome_db_dbname;
if($mydbname)
{
	$selectdbname=$mydbname;
}
$db='';
if($canlistdb)
{
	$db.="<option value='".$selectdbname."' selected>".$selectdbname."</option>";
}
else
{
	$sql=$empire->query("SHOW DATABASES");
	while($r=$empire->fetch($sql))
	{
		if($r[0]==$selectdbname)
		{$select=" selected";}
		else
		{$select="";}
		$db.="<option value='".$r[0]."'".$select.">".$r[0]."</option>";
	}
}
require LoadAdminTemp('eReData.php');
db_close();
$empire=null;
?>