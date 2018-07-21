<?php
class mgdbControl extends skymvc{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function onDefault(){
		 
		$mgdb=mgdb();
		for($i=1;$i<10;$i++){
			$data[]=array(
				"id"=>$i,
				"title"=>"这是第{$i}条数据",
				"content"=>"这是内容哦",
				"createtime"=>date("Y-m-d H:i:s")
			);
		}
		//$mgdb->insert("article",$data,1);
		$fields=array();
		$order=array(
			"_id"=>-1
		);
		$option=array(
			"where"=>array(),
			"start"=>0,
			"limit"=>3,
			"order"=>$order,
			"fields"=>$fields
		);
		$rscount=true;
		$res=$mgdb->select("article",$option,$rscount);
		 
		print_r($res); 
		echo "success";
	}
	
}
?>