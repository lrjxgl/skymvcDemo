<?php
class navbarModel extends model{
	public $base=NULL;
	public function __construct(&$base){
		parent::__construct($base);
		$this->base=$base;
		$this->table="navbar";	
	}
	public function navlist($gid,$pid=0){
		return $this->select(array("where"=>array("group_id"=>$gid,"pid"=>$pid,"bstatus"=>1),"order"=>"orderindex asc"));
	}
	
	public function getTarget(){
		return array(
			"_blank"=>"新窗口",
			"main-frame"=>"右窗口",
			"menu-frame"=>"做窗口",
			"_self"=>"当前窗口",
		);
		
	}
	
	/*导航条分组*/
	public function getGroup(){
		return array(
			1=>"后台顶部",
			2=>"后台左边",
			3=>"PC-主导航",			
			4=>"PC-底部导航",
			5=>"wap-主导航",
			6=>"wap-底部导航",
			7=>"APP-主导航",
		);
	}
}
?>