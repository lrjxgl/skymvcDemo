<?php
	/**
	*Author 雷日锦 362606856@qq.com 
	*控制器自动生成
	*/
	if(!defined("ROOT_PATH")) exit("die Access ");
	class guestControl extends skymvc{
		
		public function __construct(){
			parent::__construct();
	 
			
		}
		
		public function onInit(){
		}
		
		public function onDefault(){
			$where=" bstatus<11 ";
			$url="/admin.php?m=guest&a=default";
			$limit=20;
			$start=get("per_page","i");
			$option=array(
				"start"=>intval(get_post('per_page')),
				"limit"=>$limit,
				"order"=>" id DESC",
				"where"=>$where
			);
			$rscount=true;
			$data=M("guest")->select($option,$rscount);
			//分页
			$pagelist=$this->pagelist($rscount,$limit,$url);
			//end分页
			$per_page=$start+$limit;
			$per_page=$per_page>=$rscount?0:$per_page;
			$this->smarty->goassign(
				array(
					"data"=>$data,
					"pagelist"=>$pagelist,
					"rscount"=>$rscount,
					"url"=>$url,
					"per_page"=>$per_page,
					"catlist"=>M("guest")->catlist()
				)
			);
			$this->smarty->display("guest/index.html");
		}
		
		 
		
		public function onAdd(){
			$id=get_post("id","i");
			 
			if($id){
				$data=M("guest")->selectRow(array("where"=>"id={$id}"));
			}
			$this->smarty->goassign(array(
				"data"=>$data,
				"catlist"=>M("guest")->catlist()
			));
			$this->smarty->display("guest/add.html");
		}
		
		public function onSave(){
			
			$id=get_post("id","i");
			$data=M("guest")->postdata();
			$data['userid']=intval($this->get_session('ssuser','userid'));
			if(empty($data['title']) ){
				$this->goAll("主题不能为空",1);
			}
			if(empty($data['content']) ){
				$this->goAll("内容不能为空",1);
			}
			if(!is_email($data['email'])){
				$this->goAll("邮箱格式不正确",1);
			}
			$data["dateline"]=time();
			if($id){
				$data["reply_time"]=time();
				M("guest")->update($data,"id='$id'");
			}else{
				M("guest")->insert($data);
			}
			$this->goall("保存成功");
		}
		
		public function onbstatus(){
			$id=get_post('id',"i");
			$bstatus=get_post("bstatus","i");
			M("guest")->update(array("bstatus"=>$bstatus),"id=$id");
			$this->goall("状态修改成功",0);
		}
		public function onDelete(){
			$id=get_post('id',"i");
			M("guest")->update(array("bstatus"=>11),"id=".$id);
			$this->goall("删除成功");
		}
		
		
	}

?>