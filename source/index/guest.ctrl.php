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
			if(defined("GUESTLOGIN") && GUESTLOGIN==1){
				$arr=array("add","save","my","delete");
			}else{
				$arr=array("my","delete");		
			}
			if(in_array(get('a'),$arr)){
				if(!$this->get_session("ssuser")){
					$this->goAll("请先登录",0,0,"/index.php?m=login");
				}
			}
		}
		
		public function onDefault(){
			$where=" bstatus=2";
			$url="/index.php?m=guest&a=default";
			$limit=10;
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
		
		public function onShow(){
			$id=get_post("id","i");
			$data=M("guest")->selectRow(array("where"=>"id={$id}"));
			$this->smarty->goassign(array(
				"data"=>$data,
				"catlist"=>M("guest")->catlist()
			));
			$this->smarty->display("guest/show.html");
		}
		
		public function onAdd(){
			$id=get_post("id","i");
			 
			if($id){
				$data=M("guest")->selectRow(array("where"=>"id={$id}"));
				 
				if($data['userid']!=$this->get_session('ssuser','userid')){
					$this->goAll("您无权限",1);
				}
			}
			$this->smarty->goassign(array(
				"data"=>$data,
				"catlist"=>M("guest")->catlist()
			));
			$this->smarty->display("guest/add.html");
		}
		
		public function onMy(){
			$userid=$this->get_session("ssuser",'userid');
			$where=" userid=".$userid;
			$url="/index.php?m=guest&a=my";
			$limit=5;
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
			$this->smarty->display("guest/my.html");
		}
		
		public function onSave(){
			
			$id=get_post("id","i");
			$data=M("guest")->postdata();
			if(GUESTCHECKCODE==1){
				if(post('yzm')!=$this->get_session("checkcode")){
					$this->goAll("验证码出错了",1);
				}
			}
			unset($data['bstatus']);
			$data['userid']=intval($this->get_session('ssuser','userid'));
			if(isset($data['title']) && empty($data['title']) ){
				$this->goAll("主题不能为空",1);
			}
			if(isset($data['telephone']) && empty($data['telephone']) ){
				$this->goAll("手机不能为空",1);
			}
			
			if(empty($data['content']) ){
				$this->goAll("内容不能为空",1);
			}
			if(isset($data['email']) && !is_email($data['email'])){
				$this->goAll("邮箱格式不正确",1);
			}
			$data["dateline"]=time();
			if($id){
				$row=M("guest")->selectRow("id=".$id);
				if($row['userid']!=$this->get_session('ssuser','userid')){
					$this->goAll("您无权限",1);
				}
				 
				M("guest")->update($data,"id='$id'");
			}else{
				M("guest")->insert($data);
			}
			$this->goall("保存成功");
		}
		
		public function onDelete(){
			$id=get_post('id',"i");
			$row=M("guest")->selectRow("id=".$id);
				if($row['userid']!=$this->get_session('ssuser','userid')){
					$this->goAll("您无权限",1);
				}
			M("guest")->delete("id=".$id);
			$this->goall("删除成功");
		}
		
		
	}

?>