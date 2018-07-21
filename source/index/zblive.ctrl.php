<?php
class zbliveControl extends skymvc{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function onDefault(){
		$this->smarty->display("zblive/index.html");
	}
	
	public function onShow(){
		$this->smarty->display("zblive/show.html");
	}
}
?>