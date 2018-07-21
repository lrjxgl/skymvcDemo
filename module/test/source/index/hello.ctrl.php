<?php
	/**
	*Author 雷日锦 362606856@qq.com 
	*控制器自动生成
	*/
	if(!defined("ROOT_PATH")) exit("die Access ");
	class helloControl extends skymvc{
		
		public function __construct(){
			parent::__construct();
			$this->loadmodel(array("hello"));
		}
		
		public function onDefault(){
			$where="";
			$url="/module.php?m=hello&a=default";
			$limit=20;
			$start=get("per_page","i");
			$option=array(
				"start"=>intval(get_post('per_page')),
				"limit"=>$limit,
				"order"=>" id DESC",
				"where"=>$where
			);
			$rscount=true;
			$data=$this->hello->select($option,$rscount);
			$pagelist=$this->pagelist($rscount,$limit,$url);
			$this->smarty->assign(
				array(
					"data"=>$data,
					"pagelist"=>$pagelist,
					"rscount"=>$rscount,
					"url"=>$url
				)
			);
			$this->smarty->display("hello/index.html");
		}
		
		public function onList(){
			$where="";
			$url="/module.php?m=hello&a=default";
			$limit=20;
			$start=get("per_page","i");
			$option=array(
				"start"=>intval(get_post('per_page')),
				"limit"=>$limit,
				"order"=>" id DESC",
				"where"=>$where
			);
			$rscount=true;
			$data=$this->hello->select($option,$rscount);
			$pagelist=$this->pagelist($rscount,$limit,$url);
			$this->smarty->assign(
				array(
					"data"=>$data,
					"pagelist"=>$pagelist,
					"rscount"=>$rscount,
					"url"=>$url
				)
			);
			$this->smarty->display("hello/index.html");
		}
		
		public function onShow(){
			$id=get_post("id","i");
			if($id){
				$data=$this->hello->selectRow(array("where"=>"id={$id}"));
				
			}
			$this->smarty->assign(array(
				"data"=>$data
			));
			$this->smarty->display("hello/show.html");
		}
		public function onAdd(){
			$id=get_post("id","i");
			if($id){
				$data=$this->hello->selectRow(array("where"=>"id={$id}"));
				
			}
			$this->smarty->assign(array(
				"data"=>$data
			));
			$this->smarty->display("hello/add.html");
		}
		
		public function onSave(){
			
			$id=get_post("id","i");
			$data["title"]=post("title","h");
			$data["content"]=post("content","h");
			$data["dateline"]=time();
			$data["bstatus"]=post("bstatus","i");

			if($id){
				$this->hello->update($data,"id='$id'");
			}else{
				$this->hello->insert($data);
			}
			$this->gomsg("保存成功");
		}
		
		public function onStatus(){
			$id=get_post('id',"i");
			$status=get_post("status","i");
			$this->hello->update(array("status"=>$status),"id=$id");
			$this->sexit(json_encode(array("error"=>0,"message"=>"状态修改成功")));
		}
		
		public function onDelete(){
			$id=get_post('id',"i");
			$this->hello->delete("id=".$id);
			$this->sexit(json_encode(array("error"=>0,"message"=>"删除成功")));
		}
		
		
	}

?>