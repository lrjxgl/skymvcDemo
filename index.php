<?php
error_reporting(E_ALL ^ E_NOTICE);
header("Content-type:text/html; charset=utf-8");
if(!file_exists("config/install.lock"))
{
	header("Location: install/");
	exit;
}
 
 
require("config/config.php");
require("config/setconfig.php");
require("config/const.php");
require("config/version.php");
define("ROOT_PATH",  str_replace("\\", "/", dirname(__FILE__))."/");
define("CONTROL_DIR","source/index");
define("MODEL_DIR","source/model");
define("HOOK_DIR","source/hook");
/*视图模版配置*/
$cache_dir="";//模版缓存文件夹
$template_dir="themes/".SKINS;//模版风格文件夹
$wap_template_dir="themes/".WAPSKINS;
if(!file_exists($wap_template_dir)){
	$wap_template_dir=$template_dir;	
}
 $template_dir="themes/layui";
$compiled_dir="";//模版编译文件夹
$html_dir="";//生成静态文件夹
$rewrite_on=REWRITE_ON;//是否开启伪静态 0不开 1开启
$smarty_caching=true;//是否开启缓存
$smarty_cache_lifetime=3600;//缓存时间
define("SMARTYPHP","smarty");
require("./skymvc/skymvc.php");
//用户自定义初始化函数
function userinit(&$base){
	 
	global $wap_template_dir,$template_dir;
	/*CORS 跨域*/
	if(isset($_GET['CORS'])){
		if(!defined("ALLOW_ORIGIN")){
			define("ALLOW_ORIGIN","*");
		}
		header("Access-Control-Allow-Origin: ".ALLOW_ORIGIN);
	}
	//loadSkinsData();
	$skins=ISWAP?$wap_template_dir:$template_dir;
	C()->loadConfig("table");
	$ssuser=C()->get_session('ssuser');
	C()->smarty->assign(array(
		"skins"=>$skins."/",
		"appindex"=>APPINDEX,
		"appadmin"=>APPADMIN,
		"ssuser"=>$ssuser,
		"site"=>M("sites")->selectRow(),
		"seo"=>M("seo")->get(get('m'),get('a'))
	));
}

?>