<?php
class commentControl extends skymvc{
	public $userid;
	function __construct(){
		parent::__construct();
		 
		
	}
	
	public function onInit(){
		$this->userid=M("login")->userid;
	}
	
	public function onDefault(){
		$tablename=get('tablename','h');
		$object_id=get('object_id','i');
	   $rscount=M('comment')->getCount(array("tablename"=>$tablename,object_id=>$object_id));
		$this->smarty->goassign(array(
			"comment_tablename"=>$tablename,
			"comment_object_id"=>$object_id,
			"comment_num"=>$rscount
		));
		$this->smarty->display("comment/index.html"); 
	}
	
	public function onList(){
		
		$rscount=true;
		$limit=20;
		$page=get('page','i');
		$start=get('per_page','i');
		$tablename=get_post('tablename','h');
		$where=" status < 99 AND tablename ='".$tablename."'";
		$url="/index.php?m=comment&a=list&tablename=".urlencode($tablename);
		$object_id=get('object_id','i');
		if($object_id){
			$where.=" AND object_id=".$object_id;
		}
		$option=array(
			"where"=>$where,
			"start"=>$start,
			"limit"=>$limit,
			"order"=>"id ASC"
		);
		$data=M("comment")->select($option,$rscount);
		if($data){
			foreach($data as $k=>$v){
				$u=M("user")->selectRow(array("where"=>array("userid"=>$v['userid'])));
				$v['nickname']=$u['nickname'];
				$v['user_head']=$u['user_head'];
				$v['author']=$u;
				$data[$k]=$v;
			}
		}
		$pagelist=$this->pagelist($rscount,$limit,$url);
		$per_page=$start+$limit;
		$per_page=$per_page>=$rscount?0:$per_page;
		$this->smarty->goassign(array(
			"data"=>$data,
			"per_page"=>$per_page,
			"rscount"=>$rscount,
			"pagelist"=>$pagelist
		));
		$this->smarty->display("comment/list.html");
	}
	
	
	/*我的评论*/
	public function onMy(){
		M("login")->checklogin(1);
		$limit=24;
		$start=get('per_page','i');
		$rscount=true;
		$userid=$this->userid;
		$where['userid']=$userid;
		$option=array(
			"where"=>$where,
			"start"=>$start,
			"limit"=>$limit,
			"order"=>"id DESC"
		);
		$data=M("comment")->select($option,$rscount);
		$pagelist=$this->pagelist($rscount,$pagesize,"/index.php?m=comment&a=my");
		$per_page=$start+$limit;
		$per_page=$per_page>=$rscount?0:$per_page;
		$this->smarty->goassign(
			array(
				"comment_list"=>$data,
				"rscount"=>$rscount,
				"pagelist"=>$pagelist,
				"per_page"=>$per_page
			)
		);
		
		$this->smarty->display("comment/my.html");
		 
	}
	
	
	 
	/**
	*评论添加组件
	*/
	public function oninsert(){
		 
		M("login")->checkLogin(1);
		$this->checkBadWord();
		$data['object_id']=get_post('object_id','i');
		$tablename=$data['tablename']=post('tablename','h');
		if(empty($data['tablename'])) exit(json_encode(array("error"=>1,"message"=>"参数错误")));
	 
		$data['userid']=M("login")->userid;
		 
		$data['dateline']=time();
		
		
		$data['title']=post('title','h');
		$data['content']=get_post('content','x');
		$data['status']=1;
		//评论跳转的地址
		$data['pid']=post('pid','i');
		$data['ip']=$_SERVER['REMOTE_ADDR'];
		$ipcity=ipcity($_SERVER['REMOTE_ADDR']);
		if($ipcity){
			$data['ip_city']=$ipcity['region'].$ipcity['city'].$ipcity['county'];
		}else{
			$data['ip_city']="外星球";
		}
	 
		if(strlen(get_post('content','h'))<2){
			exit(json_encode(array("error"=>1,"message"=>$this->lang['comment_error_1'])));
		}
		$id=M("comment")->insert($data);
		if(!$id){
			exit(json_encode(array("error"=>2,"message"=>$this->lang['comment_error_2'])));  
		}
		$data['id']=$id;	
		 		
		 
		//更新主题评论数
		$row=M($tablename)->selectRow("id=".$data['object_id']);
		M($tablename)->update(
			array(
				"comment_num"=>$row['comment_num']+1,
			),"id=".$data['object_id']
		);
		//更新用户评论数
		$user=M("user")->selectRow("userid=".$this->userid);
		M("user")->update(array(
			"comment_num"=>$user['comment_num']+1,
			"grade"=>$user['grade']+1
		),"userid=".$this->userid);
 
		$data['content']=nRemoveXSS(stripslashes($_POST['content']));
		
		exit(json_encode(array("error"=>0,"message"=>$data)));
		
	}
	/**
	*评论删除组件
	*/
	public function ondelete(){
		M("login")->checklogin(1);
		$id=get_post('id','i');
		$data=M("comment")->selectRow(array("where"=>array("id"=>$id)));
		 
		if($data['userid']!=M("login")->userid){
			exit(json_encode(array("error"=>1,"message"=>$this->lang['die_access'])));
		}
		M("comment")->delete(array("id"=>$id));
		exit(json_encode(array("error"=>0,"message"=>$this->lang['comment_delete_success'])));
	}
	 
	
}

?>