<?php
class loginModel extends model{
	public $userid;
	public $base;
	function __construct(&$base){
		parent::__construct($base);
		$this->base=$base;
		$this->table="user";
		$this->userid=$this->getUserId();
	}
	
	public function set($k,$v){
		C()->set_session($k,$v);
	}
	
	public function get($k){
		return C()->get_session($k);
	}
	
	public function getUser($userid=0){
		$ssuser=C()->get_session('ssuser');
		$userid=$userid?$userid:(isset($ssuser['userid'])?intval($ssuser['userid']):0);
		if(!$userid) return false;
		$user=parent::selectRow(array("where"=>"userid=$userid"));
		unset($user['salt']);
		unset($user['password']);
		return $user;
	}
	
	public function getUserId(){
		$ssuser=C()->get_session('ssuser');
		return (isset($ssuser['userid'])?intval($ssuser['userid']):0);
	}
	
	public function checklogin($ajax=0){
		$ssuser=C()->get_session('ssuser');
		if(empty($ssuser)){
			C()->goAll("请先登录",1000,0,"/index.php?m=login&a=login");
		}
		
	}
	
	 
	
	public function CodeLogin(){
		if(get_post('authcode')){
			$authcode=get_post('authcode');			
		}else{
			$authcode=$_COOKIE['authcode'];
		}
		 
		if($authcode=='' or $authcode=='null') return false;
		$authcode=jiemi($authcode);
		 
		$arr=explode("|",$authcode);
	 
		$userid=intval($arr[0]);
		$key="login_codelogin_".$userid;
		$user=parent::setTable('user')->selectRow(array("where"=>"userid='".$userid."' "));	
		 
		if($c=cache()->get($key)){
			if($authcode==jiemi($c)){
				$this->userid=$user['userid'];
				$this->set("ssuser",$user);
			}else{
				cache()->set($key,"");
			}
		}else{
			 
			if(empty($user) or $arr[1]!=umd5(substr($user['password'],0,12))){
				c()->set_cookie("authcode","",-1);				
			}else{
				$authcode=jiami($user['userid']."|".umd5(substr($user['password'],0,12)));
				$this->userid=$user['userid']; 
				$this->set("ssuser",$user);
				cache()->set($key,$authcode,3600);
				c()->set_cookie("authcode",$authcode,36000);
				
			}		
		}
	}
 
	
	
	
}
 