<?php
require("class/connect.php");
include("class/config.php");
include("class/functions.php");
include("lang/dbchar.php");
$loginin=getcvar('bakusername');
$rnd=getcvar('bakrnd');
islogin($loginin,$rnd);
require LoadAdminTemp('eadmin.php');
?>