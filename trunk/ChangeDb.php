<?php
require("class/connect.php");
include("class/config.php");
include("class/db_sql.php");
include("class/functions.php");
include LoadLang('f.php');
$loginin=getcvar('bakusername');
$rnd=getcvar('bakrnd');
islogin($loginin,$rnd);
$link=db_connect();
$empire=new mysqlquery();
//Ĭ�����ݿ�
if(!empty($phome_db_dbname))
{
	echo $fun_r['GotoDefaultDb']."<script>self.location.href='ChangeTable.php?mydbname=".$phome_db_dbname."'</script>";
	exit();
}
$sql=$empire->query("SHOW DATABASES");
include("lang/dbchar.php");
require LoadAdminTemp('eChangeDb.php');
db_close();
$empire=null;
?>