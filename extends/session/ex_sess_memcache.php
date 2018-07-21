<?php
function sess_open(){
	return true;
}

function sess_read($id){
	$val= cache_mem_get("sess_".$id);
	if(!$val) return '';
	return $val;
}
function sess_write($id,$val){
	 
	cache_mem_set("sess_".$id,$val,36000);
}

function sess_close(){
	
}
function sess_destrory($id){
	cache_mem_delete($id);
}

function sess_gc(){
	
}
?>