<?php

class downControl extends skymvc{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function onDefault(){
		$table=get_post('table','h');
		$id=get('id','i');
		if(in_array($table,array("article"))){
			$row=M($table)->selectRow("id=".$id);
			if($row){
				download($row['downurl'],basename($row['downurl']));
			}else{
				$this->goAll("资料不存在",1);
			}
		}
	}
	
}