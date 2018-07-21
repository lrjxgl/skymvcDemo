<?php
 
define("MYSQL_CHARSET","utf8");
define("TABLE_PRE","sky_");
$dbclass="mysqli";
$dbconfig["master"]=array(
	"host"=>"127.0.0.1:3306","user"=>"root","pwd"=>"123","database"=>"skymvc"
);

/**其他分表库**/
 
$dbconfig["mod_article"]=array(
	"host"=>"192.168.128.130:3306","user"=>"root","pwd"=>"123","database"=>"sqlTest"
);
 
$dbconfig["art"]=array(
	"host"=>"localhost","user"=>"root","pwd"=>"123","database"=>"fd175"
);
 

/*分库配置*/
  
$VMDBS=array(
	"mod_pintuan"=>"art", 
	"forum"=>"art",
	"mod_article"=>"sqlTest"
);
 
 
/*缓存配置*/
$cacheconfig=array(
	"redis"=>false,
	"memcache"=>false,
	"mysql"=>false,
	"file"=>true,
	"php"=>true
	
	
);
/*用户自定义函数文件*/
$user_extends=array(
	"ex_fun.php",
	"cache/ex_cache_redis.php",
	"mgdb/mgdb.php",
	//"cache/ex_cache_memcache.php",
	//"cache/ex_cache_mysql.php",
	//"session/ex_sess_redis.php",
	//"session/ex_sess_mysql.php",
	//"session/ex_sess_memcache.php"
 
);
/*Session配置 1为自定义 0为系统默认*/
define("SESSION_USER",1);
define("REWRITE_ON",0); 
//rewrite pathinfo
define("REWRITE_TYPE","pathinfo");
define("TESTMODEL",1);//开发测试模式
define("SQL_SLOW_LOG",1);//记录慢查询
  
?>