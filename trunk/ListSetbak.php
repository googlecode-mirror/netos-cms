<?php
require("class/connect.php");
include("class/config.php");
include("class/db_sql.php");
include("class/functions.php");
$loginin=getcvar('bakusername');
$rnd=getcvar('bakrnd');
islogin($loginin,$rnd);
$hand=@opendir('setsave');
$mydbname=$_GET['mydbname'];
require LoadAdminTemp('eListSetbak.php');
?>