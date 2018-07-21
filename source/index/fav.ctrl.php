<?php
class favControl extends skymvc{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function onInit(){
		M("login")->checkLogin();
	}
	public function onDefault(){
		
	}
	
	public function onMy(){
		$userid=M("login")->userid;
		
		$where="userid=".$userid;
		$url="/index.php?m=fav&a=my";
		$limit=20;
		$start=get("per_page","i");
		$option=array(
			"start"=>$start,
			"limit"=>$limit,
			"order"=>" id DESC",
			"where"=>$where
		);
		$rscount=true;
		$data=M("fav")->select($option,$rscount);
		if($data){
			foreach($data as $v){
				$ids[]=$v['object_id'];
			}
			$arts=M("article")->id_list(array(
				"where"=>" id in("._implode($ids).")"
			));
			foreach($data as $k=>$v){
				$v=$arts[$v['object_id']];
				$data[$k]=$v;
			}
		}
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
				"per_page"=>$per_page
			)
		);
		
		$this->smarty->display("fav/my.html");
	}
	
	public function onSave(){
		$tablename=get_post('tablename','h');
		$userid=M("login")->userid;
		$object_id=get_post('object_id','i');
		$dateline=time();
		if(!$row=M("fav")->selectRow(" userid={$userid} AND tablename='".$tablename."' AND object_id=".$object_id."" )){
			M("fav")->insert(array(
				"tablename"=>$tablename,
				"userid"=>$userid,
				"object_id"=>$object_id,
				"dateline"=>time()
			));
			M("article")->changenum("fav_num",1,"id=".$object_id);
			$this->goAll("收藏成功",0,"add");
		}else{
			M("fav")->delete("id=".$row['id']);
			M("article")->changenum("fav_num",-1,"id=".$object_id);
			$this->goAll("取消收藏成功",0,"delete");
		}
		
		
	}
	
}
?>