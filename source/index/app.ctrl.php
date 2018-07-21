<?php
	class appControl extends skymvc{
		
		public function __construct(){
			parent::__construct();
		}
		
		public function onDefault(){
			 
			$this->smarty->display("app/index.html");
		}
		
		public function onGo(){
			if(get('type')){
				$type=get('type');
			}else{
				$type=$this->get_device_type();
			}
			switch($type){
				case "android":
					$url="attach/android.apk";
					break;
				case "ios":
					$url="attach/ios.ipa";
					break;
				default:
					exit("地址出错");
					break;
			}
			header("Location: $url ");
			exit;
		}
		
		public function get_device_type(){
			
			$agent = strtolower($_SERVER['HTTP_USER_AGENT']);
			$type = 'android';
			 //分别进行判断
			if(strpos($agent, 'iphone') || strpos($agent, 'ipad')){
				$type = 'ios';
			} 
			  
			 if(strpos($agent, 'android')){
			 	$type = 'android';
			 }
			 return $type;
		}
	}
?>