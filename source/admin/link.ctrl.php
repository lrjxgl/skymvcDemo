<?php
class linkControl extends skymvc{
	
	function __construct(){
		parent::__construct();
		 
		
	}
	
	public function onDefault(){
		$rscount=true;
		$where=" 1 ";
		$option=array(
			"where"=>$where,
		);
		$data=M("link")->select($option,$rscount);
		
		$this->smarty->assign(
			array(
				"data"=>$data,
				"rscount"=>$rscount,
			)
		);
		$this->smarty->display("link/index.html");
	}
	
	public function onAdd(){
		$id=get_post('id','i');
		if($id){
			$this->smarty->assign("data",M("link")->selectRow(array("where"=>array("id"=>$id))));
		}
		$this->smarty->display("link/add.html");
		
	}
	
	public function onSave(){
		$id=get_post('id','i');
		$data['title']=post('title','h');
		$data['link_url']=post('link_url','h');
		$data['link_img']=post('link_img','h');
		$data['type_id']=post('type_id','i');
		$data['orderindex']=post('orderindex','i');
		$data['is_img']=$data['link_img']?1:0;
		if($id){
			M("link")->update($data,array("id"=>$id));
		}else{
			M("link")->insert($data);
		}
		$this->goall("保存成功");
	}
	
	public function onDelete(){
		$id=get_post('id','i');
		M("link")->delete(array("id"=>$id)); 
		echo json_encode(array("error"=>0,"message"=>$this->lang['delete_success']));
	}
	
}

?>