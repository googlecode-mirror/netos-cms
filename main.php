<?php
require("class/connect.php");
include("class/config.php");
include("class/functions.php");
$loginin=getcvar('bakusername');
$rnd=getcvar('bakrnd');
islogin($loginin,$rnd);
//��һ��ʹ��
if(empty($phome_db_ver))
{
	printerror("FirstUseMsg","SetDb.php");
}
require LoadAdminTemp('emain.php');
?>