<?php
class mgcmsControl extends skymvc{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function onDefault(){
		$where=array(
			"model"=>"article"
		);
		$url="/index.php?m=mgcms";
		$start=get("per_page","i");
		$limit=6;
		$option=array(
			"where"=>$where,
			"order"=>array(
				"_id"=>-1
			),
			"start"=>$start,
			"limit"=>$limit
		);
		$rscount=true;
		$data=mgdb()->select("mgcms",$option,$rscount);
		$pagelist=$this->pagelist($rscount,$limit,$url);
		$this->smarty->goAssign(array(
			"data"=>$data,
			"pagelist"=>$pagelist
		));
		$this->smarty->display("mgcms/index.html");
	}
	public function onList(){
		$where=array(
			"model"=>"article"
		);
		$url="/index.php?m=mgcms&a=list";
		$start=get("per_page","i");
		$limit=6;
		$option=array(
			"where"=>$where,
			"order"=>array(
				"_id"=>-1
			),
			"start"=>$start,
			"limit"=>$limit
		);
		$rscount=true;
		$data=mgdb()->select("mgcms",$option,$rscount);
		$pagelist=$this->pagelist($rscount,$limit,$url);
		$this->smarty->goAssign(array(
			"data"=>$data,
			"pagelist"=>$pagelist
		));
		$this->smarty->display("mgcms/list.html");
	}
	
	public function onShow(){
		$_id=get("_id","h");
		$data=mgdb()->selectRow("mgcms",array(
			"where"=>array(
				"_id"=>$_id
			),
			
		));
		$this->smarty->goAssign(array(
			"data"=>$data
		));
		$this->smarty->display("mgcms/show.html");
	}
	
	public function onAdd(){
		
		$_id=get("_id","h");
		if($_id){
			$data=mgdb()->selectRow("mgcms",array(
				"where"=>array(
					"_id"=>$_id
				),
				
			));
			$this->smarty->goAssign(array(
				"data"=>$data
			));
		}
		$this->smarty->display("mgcms/add.html");
	}
	
	public function onSave(){
		$_id=get_post("_id","h");
		$data=$_POST;
		$data=stripslashes_deep($data);
		if(!empty($_id)){
			$row=mgdb()->selectRow("mgcms",array(
				"where"=>array(
					"_id"=>$_id
				)
			));
			unset($data['_id']);		
			mgdb()->update("mgcms",$data,array("_id"=>$_id));
		}else{
			unset($data['_id']);
			$data['createtime']=date("Y-m-d H:i:s");
			$_id=mgdb()->insert("mgcms",$data);
		}
		$this->goAll("保存成功,_id:{$_id}");
	}
	
	public function onDelete(){
		$_id=get("_id","h");
		mgdb("mgcms")->delete("mgcms",array(
			"_id"=>$_id
		));
		$this->goAll("删除成功");
	}
}
?>