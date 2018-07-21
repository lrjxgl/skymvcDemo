<?php
	function mgdb(){
		require_once "skymvc/library/cls_mgdb.php";
		$mgdb=new mgdb('mongodb://localhost:27017');
		return $mgdb;
	}
?>