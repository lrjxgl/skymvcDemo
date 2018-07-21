<?php
class guestModel extends model
{
	public $base;
	public $table="guest";
	function __construct(&$base)
	{
		parent::__construct($base);
		$this->base=$base;
	}

	public function catlist(){
		return $catlist=array(
			1=>"咨询",
			2=>"建议"
		);
	}
	
}

?>