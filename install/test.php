<?php
define("TABLE_PRE","sky_");
require("function.php");
function insert_data($table,$das){
	global $link;
	if(empty($das)) return false;
	foreach($das[0] as $field=>$v){
		$fields[]=$field;
	}
	$sq=$sql="INSERT INTO ".$table."(".implode(",",$fields).") values";
	$i=0; 
	foreach($das as $k=>$data){
		  
		 $fieldsval=array();
		foreach($data as $v){
			$fieldsval[]=$v;		 
		}
		
		if($k>0){
			$sql.=",";
		}	
	 
		$sql.=" ("._implode($fieldsval).") ";
		if($i>1000){
			$i=0;
			mysqli_query($link,$sql);
			$sql=$sq;
		}
	}
	
}

$dbfile="data.json";
	if(file_exists($dbfile)){
		$content=file_get_contents($dbfile);
		$iarr=json_decode($content,true);
		
		if(!empty($iarr)){
			foreach($iarr as $key=>$v){
				$table=str_replace("sky_",TABLE_PRE,$key);
				insert_data(str_replace("sky_",TABLE_PRE,$key),$v);
				 
				 
			}
		}
	}

?>