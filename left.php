<?php
require("class/connect.php");
include("class/config.php");
include("class/functions.php");
$loginin=getcvar('bakusername');
$rnd=getcvar('bakrnd');
islogin($loginin,$rnd);
require LoadAdminTemp('eleft.php');
?>