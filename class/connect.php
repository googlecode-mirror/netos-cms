<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

define('InEmpireBak',TRUE);

$editor=0;

function db_connect(){
	global $phome_db_server,$phome_db_username,$phome_db_password,$phome_db_dbname,$phome_db_port,$phome_db_char,$phome_db_ver,$editor,$fun_r;
	$dblocalhost=$phome_db_server;
	//端口
	if($phome_db_port)
	{
		$dblocalhost.=":".$phome_db_port;
    }
	$link=@mysql_connect($dblocalhost,$phome_db_username,$phome_db_password);
	//mysql_select_db($phome_db_dbname);
	if(empty($link))
	{
		if(empty($fun_r['ConntConnectDb']))
		{
			if($editor==1){$a="../";}
			elseif($editor==2){$a="../../";}
			elseif($editor==3){$a="../../../";}
			else{$a="";}
			@include_once $a.LoadLang('f.php');
		}
		echo $fun_r['ConntConnectDb'];
		exit();
	}
	//编码
	DoSetDbChar($phome_db_char);
	if($phome_db_ver>='5.0')
	{
		@mysql_query("SET sql_mode=''");
	}
	return $link;
}

//设置编码
function DoSetDbChar($dbchar){
	if($dbchar&&$dbchar!='auto')
	{
		@mysql_query("set names '".$dbchar."';");
	}
}

function db_close(){
	global $link;
	@mysql_close($link);
}

//设置COOKIE
function esetcookie($var,$val,$life=0){
	global $phome_cookiedomain,$phome_cookiepath,$phome_cookievarpre;
	return setcookie($phome_cookievarpre.$var,$val,$life,$phome_cookiepath,$phome_cookiedomain);
}

//返回cookie
function getcvar($var){
	global $phome_cookievarpre;
	$tvar=$phome_cookievarpre.$var;
	return $_COOKIE[$tvar];
}

//导入语言包
function LoadLang($file){
	global $ebaklang;
	return "lang/".$ebaklang."/pub/".$file;
}

//参数处理函数
function RepPostVar($val){
	$val=str_replace(" ","",$val);
	$val=str_replace("'","",$val);
	$val=str_replace("\"","",$val);
	$val=addslashes(stripSlashes($val));
	return $val;
}

//导入模板
function LoadAdminTemp($file){
	global $ebaklang;
	return "lang/".$ebaklang."/temp/".$file;
}

//使用编码
function HeaderIeChar(){
	global $ebaklangchar;
	@header('Content-Type: text/html; charset='.$ebaklangchar);
}

//返回语言
function ReturnUseEbakLang(){
	$r['lang']=getcvar('loginlang');
	$r['langchar']=getcvar('loginlangchar');
	if(!$r['lang']||!$r['langchar']||strstr($r['lang'],'..')||strstr($r['lang'],'/')||strstr($r['lang'],"\\"))
	{
		$r['lang']='gb';
		$r['langchar']='gbk';
	}
	return $r;
}
?>