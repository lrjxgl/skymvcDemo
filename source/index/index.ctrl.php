<?php
class indexControl extends skymvc
{
	function __construct()
	{
		parent::__construct();
	}
	
	

	public function onDefault()
	{
		 
		$indexlist=M("article")->select(array(
			"where"=>" bstatus=2 AND isindex=1 ",
			"order"=>"id DESC",
			"limit"=>24,
		)); 
		$flashlist=M("ad")->listByNo("app-index-flash",3);
 		
    	$articlelist=M("article")->recommendList(0,3);
    	$hotlist=M("article")->hotlist(0,3);
    	$navlist=M("navbar")->navlist(9,0);
    	 
    	
    	$this->smarty->goAssign(array(
    		"flashlist"=>$flashlist,
    		"navlist"=>$navlist,
    		"articlelist"=>$articlelist,
    		"hotlist"=>$hotlist,
    		 
    		"indexlist"=>$indexlist
    		
    	));
	 	$this->smarty->html("index.html");
		$this->smarty->display("index.html");
	}
	
	 
}

?>