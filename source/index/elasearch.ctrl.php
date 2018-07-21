<?php
class elasearchControl extends skymvc{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function onDefault(){
		$this->loadClass("elasticsearch",false,false);
		$ela=new elasticsearch("127.0.0.1:9200/skymvc");
		$arts=M("article")->select(array(
			"where"=>"bstatus=2"
		));
		foreach($arts as $v){
		//	$ela->post("article/".$v['id'],$v);
		}
		$row=M("article")->selectRow(" bstatus=2 ");
		 
		$op='{
			  "query" : { "match" : { "title" : "大家" }}
		}';
		//$ela->create("article/1",$row); 
		////$res=$ela->delete("article/1");
		//$res=$ela->deleteByQuery("article",$op);
		$res=$ela->search("article",$op);
		print_r($res);
		 
	}
}
?>