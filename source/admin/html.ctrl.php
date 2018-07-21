<?php
	if(!defined("ROOT_PATH")) exit("die Access ");
	class htmlControl extends skymvc{
		
		public function __construct(){
			parent::__construct();
			 
			
		}
		
		public function onInit(){
			$this->smarty->assign("type_list",M("html")->type_list());
		}
		public function onDefault(){
			$where=" bstatus<11 ";
			$url=APPADMIN."?m=html&a=default";
			$limit=20;
			$start=get("per_page","i");
			$option=array(
				"start"=>intval(get_post('per_page')),
				"limit"=>$limit,
				"order"=>" id DESC",
				"where"=>$where
			);
			$rscount=true;
			$data=M("html")->select($option,$rscount);
			$pagelist=$this->pagelist($rscount,$limit,$url);
			$this->smarty->assign(
				array(
					"data"=>$data,
					"pagelist"=>$pagelist,
					"rscount"=>$rscount,
					"url"=>$url
				)
			);
			$this->smarty->display("html/index.html");
		}
		

		
		public function onShow(){
			$id=get_post("id","i");
			if($id){
				$data=M("html")->selectRow(array("where"=>"id={$id}"));
				
			}
			$this->smarty->assign(array(
				"data"=>$data
			));
			$this->smarty->display("html/show.html");
		}
		public function onAdd(){
			$id=get_post("id","i");
			if($id){
				$data=M("html")->selectRow(array("where"=>"id={$id}"));
				
			}
			$this->smarty->assign(array(
				"data"=>$data
			));
			$this->smarty->display("html/add.html");
		}
		
		public function onSave(){
			
			$id=get_post("id","i");
			$data["title"]=post("title","h");
			$data["word"]=post("word","h");
			$data["dateline"]=time();
			 
			$data["info"]=post("info","x");
			$data["content"]=post("content","x");
			$data["bstatus"]=post("bstatus","i");

			if($id){
				M("html")->update($data,"id='$id'");
			}else{
				;
				M("html")->insert($data);
			}
			$this->goall("保存成功");
		}
		
		public function onbstatus(){
			$id=get_post('id',"i");
			$bstatus=get_post("bstatus","i");
			M("html")->update(array("bstatus"=>$bstatus),"id=$id");
			exit(json_encode(array("error"=>0,"message"=>"状态修改成功")));
		}
		
		public function onDelete(){
			$id=get_post('id',"i");
			M("html")->update(array("bbstatus"=>11),"id={$id}");
			exit(json_encode(array("error"=>0,"message"=>"删除成功")));
		}
		
		
		
	}

?>