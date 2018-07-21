<?php
class htmlControl extends skymvc{
	
	public function __construct(){
		parent::__construct();
		
	}
	
	public function onDefault(){
		$this->smarty->display("html/".str_replace(ROOT_PATH,"",get('a','h')).".html");		
	}
}
?>