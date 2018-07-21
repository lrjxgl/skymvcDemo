<?php
class userControl extends skymvc{
	public $userid;
	function __construct(){
		parent::__construct();	
	}
	
	public function onInit(){
	 	$this->userid=M("login")->userid;
		M("login")->checkLogin();
	}
	public function onDefault(){
		$user=M("user")->selectRow(array("where"=>" userid=".M("login")->userid));
		unset($user['password']);
		unset($user['salt']);
		$this->smarty->goAssign(array(
			"data"=>$user
		));
		$this->smarty->display("user/index.html");
		
	}
	
	public function onGetUser(){
		$data=M("user")->selectRow(array("where"=>" userid=".M("login")->userid));
		exit(json_encode($data));
	}
 	
	public function onWelcome(){
		$this->smarty->display("user/welcome.html");
	}
	
	public function oninfo(){
		$userid=$this->userid;
		$data=M("user")->selectRow(array("where"=>" userid=$userid"));
		unset($data['password']);
		unset($data['salt']);
		$this->smarty->goassign(array(
			"data"=>$data,
		));
		$this->smarty->display("user/info.html");
	}
	
	public function onsave(){
		$userid=$this->userid;
		if(post('nickname')){		 
			$data["nickname"]=post("nickname","h");
			$u=M("user")->selectRow(array("where"=>"nickname='".$data['nickname']."' "));
			if($u){
				if($u['userid']!=$userid){
					$this->goall("昵称已经存在了，请再取个吧",1);
				}
			}
		}
		if(post('user_head')){
			$data["user_head"]=get_post("user_head","h");
		}
		//gps信息
		if(post('latlng')){
			$latlng=explode(",",post('latlng'));
			$data['lat']=$latlng[0];
			$data['lng']=$latlng[1];
		}
		
	 
		if(isset($_POST['info'])){
			$data['info']=post('info','h');
		}
 
		if($userid){
			M("user")->update($data,array('userid'=>$userid));
		} 
		$this->goall("保存成功",0);
	}
	
	
	
	 
	public function onUser_Head(){
		$userid=$this->userid;
		$data=M("user")->selectRow(array("where"=>" userid=$userid"));
		unset($data['password']);
		unset($data['salt']); 
		$this->smarty->assign(array(
			"data"=>$data,
		));
		$this->smarty->display("user/user_head.html");
	}
	
	public function onUser_head_Save(){
		$userid=$this->userid;
		$user_head=get_post('user_head','h');
		M("user")->update(array("user_head"=>$user_head),"userid=".$userid);
		$this->goAll("上传成功");
	}
	
	public function onGetAddr(){
		$d=M("user")->selectRow("userid=".M("login")->userid);
		$province_list=M("district")->dist_list(array("where"=>"upid=0","start"=>0,"limit"=>1000000));
		if($d['reprovince']){
			$city_list=M("district")->dist_list(array("where"=>"upid=".$d['reprovince'],"start"=>0,"limit"=>1000000));
		}
		
		if($d['recity']){
			$town_list=M("district")->dist_list(array("where"=>"upid=".$d['recity'],"start"=>0,"limit"=>1000000));
		}
		 
		exit(json_encode(array(
			"user"=>$d,
			"province"=>$province_list,
			"city"=>$city_list,
			"town"=>$town_list
		)));
		
	}
	public function onAddr(){
		$userid=$this->userid;
		$data=M("user")->selectRow(array("where"=>" userid=$userid"));
		
		$this->smarty->goassign(array(
			"data"=>$data,
		));
		$this->smarty->display("user/addr.html");
	}
	public function onAddrSave(){
	 	
		$data['address']=post('address','h');
		$data['renickname']=post('renickname','h'); 
		$data['retelephone']=post('retelephone','h'); 
		foreach($data as $v){
			if(empty($v)){
				$this->goAll("请完善信息",1);
			}
		}
		M("user")->update($data,array('userid'=>M("login")->userid));
		$this->goall("保存成功",0); 
	}
	
	public function onAuth(){
		$userid=$this->userid;
		$data=M("user")->selectRow(array("where"=>" userid=$userid"));
		$this->loadConfig("user");
		$this->smarty->assign(array(
			"data"=>$data,
			"user_auth_list"=>$this->config_item('user_auth_list'),
		));
		$this->smarty->display("user/auth.html");
		
	}
	
	public function onAuthSave(){
		$user=M("login")->getUser();
		$userid=$this->userid;
		if($user['is_auth']!=1){
			$data["user_card"]=get_post("user_card","h");
			$data["truename"]=get_post("truename","h");		
			$data["true_user_head"]=get_post("true_user_head","h");
			$data['telephone']=post('telephone','h');
			$data['is_auth']=3;
			if($userid){
				M("user")->update($data,array('userid'=>$userid));
			}
		}
		$this->goall("保存成功，请等待审核"); 
	}
	
	public function onPassword(){
		$user=M("login")->getUser();
		if(empty($user)){
			$this->goall("请先绑定账号",1,0,"/index.php?m=register&a=openreg");
		}
		$this->smarty->display("user/password.html");
	}
	
	public function onPasswordSave(){
		$oldpassword=post('oldpassword','h');
		$user=M("user")->selectRow(array("where"=>"userid=".$this->userid));
		if($user['password']!=umd5($oldpassword.$user['salt'])){
			$this->goall("旧密码出错",1);
		}
		if(post('password')!=post('password2') or post('password')==''){
			$this->goall("两次输入的密码不一致",1);
		}
		$data['salt']=rand(1000,9999);
		$data['password']=umd5(post('password','h').$data['salt']);
		M("user")->update($data,"userid=".$user['userid']);
		$this->goall("密码修改成功",0);
	}
	
	public function onPayPwd(){
		$user=M("login")->getUser();
		if(empty($user)){
			$this->goall("请先绑定账号",1,0,"/index.php?m=register&a=openreg");
		}
		$this->smarty->assign(array(
			"user"=>$user
		));
		$this->smarty->display("user/paypwd.html");
	}
	
	public function onPayPwdSave(){
		$oldpassword=post('oldpassword','h');
		$user=M("user")->selectRow(array("where"=>"userid=".$this->userid));
		if($user['paypwd'] && $user['paypwd']!=umd5($oldpassword)){
			$this->goall("旧密码出错",1);
		}
		if(post('password')!=post('password2')){
			$this->goall("两次输入的密码不一致",1);
		}
		 
		$data['paypwd']=umd5(post('password','h'));
		M("user")->update($data,"userid=".$user['userid']);
		$this->goall("支付密码修改成功");
	}
	
	
	
	public function onSafe(){
		$this->smarty->display("user/safe.html");
	}
	
	public function onBindMobile(){
		switch(get_post('op')){
			case 'send':
				 
					if(M("email")->sendSms(post('telephone'),"而此时","xxasd")){
						$this->goall("请查收短信",0,0,R("/index.php?m=user&a=safe"));
					}else{
						$this->goall("短信发送失败",1);
					}
				break;
			case 'auth':
			
				break;
			default:
				
				$this->smarty->display("user/bindmobile.html");
				break;
		}
	}
	
	public function onBindEmail(){
		switch(get_post('op')){
			case 'send':
					 
					if(M("email")->sendEmail(post('email'),"而此时","xxasd")){
						$this->goall("请接收邮件",0,0,R("/index.php?m=user&a=safe"));
					}else{
						$this->goall("邮件发送失败",1);
					}
				break;
			case 'auth':
			
				break;
			default:
				
				$this->smarty->display("user/bindemail.html");
				break;
		}
		
	}
	

}

?>