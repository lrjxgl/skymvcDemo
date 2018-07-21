<?php
class adminControl extends skymvc{
	 
	public function __construct(){
		parent::__construct();
		 
	}
	
	public function onDefault(){
		$where=" 1 ";
		$data=M("admin")->select(array("where"=>$where));
		$this->smarty->assign(
			array(
				"adminlist"=>$data,
				 
			)
		);
		$this->smarty->display("admin/index.html");
	}
	
	public function onAdd(){
		$id=get_post('id','i');
		 
		if($id){
			$data=M("admin")->selectRow(array("where"=>array("id"=>$id)));				
			$this->smarty->assign("data",$data);
		}
		$this->smarty->assign(
			array(
				"data"=>$data
			)
		);
		$this->smarty->display("admin/add.html");
	}
	
	
	
	public function onSave(){
		$username=post('username','h');
		$password=post('password','h');
		$password2=post('password2','h');
		if(empty($password) or empty($username)){
			$this->goAll("请输入完整信息",1);
		}
		if($password!=$password2){
			$this->goall($this->lang['password_neq'],1);
		}
		$id=post("id","i");
		if($id){
			$row1=M("admin")->selectRow("id=".$id);
		}
		$row=M("admin")->selectRow("username='".$username."'");
		if($row){
			if(!$row1 || $row1['username']!=$username){
				$this->goall("账户已经存在",1);
			}
		}
		$data['username']=$username;
	 
		$data['salt']=$salt=rand(1000,9999);
		$data['password']=umd5($password.$salt);
	 
		if($id){
			M("admin")->update($data,"id=".$id);
		}else{
			M("admin")->insert($data);
		}
		$this->goall("保存成功");
	}
	
	
	
	 
	
	public function onDelete(){
		$id=get('id','i');
		M("admin")->delete(array("id"=>$id));
		$this->goAll("删除成功");
	}
	
	 
	
}

?>