<?php
class registerControl extends skymvc{
	
	public function __construct(){
		parent::__construct();
		 
	}
	
	public function onInit(){
		if(M("login")->userid){
			$this->goAll("账号已经登录，请先退出",1,0,"/index.php");
		}
	}
	public function onDefault(){
		 
  
		$this->smarty->display("register/index.html");
	}
	
	public function onSendSms(){
		$telephone=get_post('telephone','h');
		if(!is_tel($telephone)){
			$this->goall("请输入正确手机号码",1);
		}
		if(M("user")->select(array("where"=>"telephone='".$telephone."' "))){
			$this->goall("手机已经存在了",1);
		}
		$t=cache()->get("reg_".$telephone);
		if($t){
			$this->goall("请过".(60-(time()-$t))."秒再发送",1);
		}
		$yzm=rand(111111,999999);
		$site=M("sites")->selectRow(array("order"=>"siteid ASC","limit"=>1));
		$res=M("email")->sendSms($telephone,"【".$site['sitename']."】验证码：".$yzm."，请您5分钟内完成注册");
		$key="reg_sms".$telephone.$yzm;
		
		if($res){
			cache()->set($key,1,300);
			cache()->set("reg_".$telephone,time(),60);
			$this->goAll("短信已发送，请在5分钟内验证注册");
		}else{
			$this->goAll("短信发送失败",1);
		}
	}
	
	public function onYzSms(){
		$yzm=get_post('yzm','h');
		$telephone=get_post('telephone','h');
		$key="reg_sms".$telephone.$yzm;
		if(cache()->get($key)){
			$key="regyz_".$telephone.$yzm;
			cache()->set($key,1,300);
			$this->goAll("success");
		}
		$this->goAll("短信验证码错误",1);
	}
	
	public function onRegPhone(){
		$yzm=get_post('yzm','h');
		$telephone=get_post('telephone','h');
		$key="reg_sms".$telephone.$yzm;
		if(cache()->get($key)){
			$this->onRegSave(false);
		}
		$this->goAll("短信验证码出错",1);
	}
	public function onRegSave($ischeckcode=false){
		if(PHONE_REG){
			$yzm=get_post('yzm','h');
			$telephone=get_post('telephone','h');
			$key="reg_sms".$telephone.$yzm;
			if(!cache()->get($key)){
				$this->goAll("短信验证码出错",1);
			}
			$ischeckcode=false;
		}
		$checkcode=post('checkcode','j');
			if($ischeckcode && $checkcode!=$_SESSION['checkcode']){
				$this->goall($this->lang['checkcode_error'],2);
			}
		 
		$telephone=post('telephone','h');
 
			$password=post('password','h');
			$password2=post('password2','h');
			
			if($password!=$password2 or empty($password)){
				$this->goall("两次输入的密码不一致",1);		
			}
			 
			$data['username']=$data['nickname']=post('username','h')?post('username','h'):post('nickname','h');
			
			if(empty($data['nickname'])){
				if(post('telephone')){
					$data['username']=$data['nickname']=post('telephone','h');
				}else{
					$this->goall("请输入昵称",1);
				}
			}
			if(empty($data['username']) && empty($telephone)){
				$this->goAll("用户名不能为空");
			}
			if(post('telephone')){
				if(M("user")->select(array("where"=>"telephone='".$telephone."' "))){
					$this->goall("手机已经存在了",1);
				}
			}
				
			if(M("user")->select(array("where"=>"nickname='".$data['nickname']."' "))){
				$this->goall("昵称已经存在",1);
			}
			$data['gender']=min(1,get('gender'));
			$data['salt']=rand(1000,9999);
			$data['password']=umd5($password.$data['salt']);
			
			$data['telephone']=post('telephone','i');
			 
			$data['reg_time']=time();
		
			 
			$data['userid']=$userid=M("user")->insert($data);
			 
			
			$_SESSION['ssuser']=$user=M("user")->selectRow("userid=".$userid);
			$authcode=jiami($user['userid']."|".umd5(substr($user['password'],0,12)));
			setcookie("authcode",$authcode,time()+3600000,"/",DOMAIN);
			$this->goall("注册成功",0,0,R("/index.php"));
		 
	}
	
	public function onOpenReg(){
		M("login")->checkLogin();	
		$user=M("login")->getuser();
		if($user['email']){
			 $this->goall("你已经绑定过了",1,0,"/index.php");
		}
		$this->smarty->display("register/openreg.html");
	}
	
	public function onOpenRegSave(){
		M("login")->checkLogin();
		$user=M("login")->getuser();
		if($user['email']){
			 $this->goall("你已经绑定过了",1,0,"/index.php");
		}
		$data['email']=$email=post('email','h');
		$password=post('password','h');
		$password2=post('password2','h');
		if($password!=$password2){
			$this->goall("两次输入的密码不一致",1);		
		}
		if(M("user")->select(array("where"=>"email='".$email."' "))){
			$this->goall("邮箱已经存在了",1);
		}
		$data['gender']=min(1,get('gender'));
		$data['salt']=rand(1000,9999);
		$data['password']=umd5($password.$data['salt']);
		M("user")->update($data,"userid=".$user['userid']);
		$this->goall("账号绑定成功",0,0,"/index.php");
	}
	
	public function onCheck(){
		if(get_post('nickname')){
			$nickname=get('nickname');
			if(M("user")->select(array("where"=>"nickname='".get_post('nickname')."' "))){
				exit(json_encode(array("error"=>1,"status"=>"failed","message"=>"昵称已经存在")));
			}
		}
		
		if(get_post('email')){
			if(M("user")->select(array("where"=>"email='".get_post('email')."' "))){
				exit(json_encode(array("error"=>1,"status"=>"failed","message"=>"邮箱已经存在")));
			}
		}
		
		exit(json_encode(array("error"=>0,"status"=>"success","msg"=>"OK")));
	}
	
	public function oncheckNickName(){
	 		$nickname=get_post("param",'h');
			if(M("user")->select(array("where"=>"nickname='".$nickname."' "))){
				exit(json_encode(array("status"=>"n", "info"=>"昵称已经存在")));
			}else{
				exit(json_encode(array("status"=>"y", "info"=>"昵称可以使用")));
			}
		 
	}
	
	public function oncheckEmail(){
	 		$email=get_post("param",'h');
			if(M("user")->select(array("where"=>"email='".$email."' "))){
				exit(json_encode(array("status"=>"n", "info"=>"邮箱已经存在")));
			}else{
				exit(json_encode(array("status"=>"y", "info"=>"邮箱可以使用")));
			}
		 
	}
	
	 
	
}

?>