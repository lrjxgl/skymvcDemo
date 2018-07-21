<?php

class loginControl extends skymvc{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function onDefault(){
		$data=M("admin")->selectRow();
		if(empty($data)){
			M("admin")->insert(array(
				"username"=>"admin",
				"password"=>umd5("admin1234"),
				"salt"=>"1234",
			));
		}	
		$this->smarty->display("login/index.html");
	}
	
	public function onSave(){
		$username=post('username','h');
		$password=post('password','h');
		$checkcode=post('checkcode','h');
		if($checkcode!=$this->get_session('checkcode')){
			$this->goall("验证码出错",1);
		}
		$data=M("admin")->selectRow(array("where"=>array("username"=>$username)));
		if(umd5($password.$data['salt'])==$data['password']){
			unset($data['password']);
			 
			$this->set_session("ssadmin",$data);
			 
			$this->goall("登录成功",0,0,APPADMIN."?m=iframe");
		}else{
			$this->goall("登录失败",1);
		}
	}
	
	public function onLogout(){
		$this->del_session("ssadmin");
		$this->goAll("注销成功");
	}
	
}

?>