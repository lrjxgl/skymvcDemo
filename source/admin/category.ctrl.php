<?php
class categoryControl extends skymvc{
	
	function __construct(){
		parent::__construct();
		 
	}
	
	public function onDefault(){
		$pid=get('pid','i');
		$where= " bstatus<11 AND pid=$pid  ";		 
		$url=APPADMIN."?m=category";
		 
		$start=get('per_page','i');
		$option=array(
			"where"=>$where,
			"order"=>" orderindex ASC",
			"start"=>$start,
			"limit"=>100,
		);
		$rscount=true;
		$nextpid=0;
		$catlist=M("category")->getlist($option,$rscount);
		if($pid){
			$parent=M("category")->selectRow(array("where"=>array("catid"=>$pid)));
			$nextpid=$parent['pid'];
		}
		$pagelist=$this->pagelist($rscount,100,$url);
		$typelist=M("category")->typelist();
		$this->smarty->assign(
			array(
				"catlist"=>$catlist,
				"nextpid"=>$nextpid,
				"pagelist"=>$pagelist,
				"typelist"=>$typelist
			)
		);
		$this->smarty->display("category/index.html");
	}
	
	public function onAdd(){
		$pid=get('pid','i');
		$catlist=$parent=array();
		if($pid){
			$parent=M("category")->selectRow(array("where"=>array("catid"=>$pid)));
			$this->smarty->assign(
				"parent",$parent
			);
		}
		$catid=get('catid','i');
		if($catid){
			$data=M("category")->selectRow(array("where"=>array("catid"=>$catid)));
			$this->smarty->assign("data",$data);
			if($data){
				$catlist=M("category")->children(0);
			}
		}
		$typelist=M("category")->typelist();
		$this->smarty->assign(
			array(
				"typelist"=>$typelist,
				"catlist"=>$catlist,
			)
		);
		$this->smarty->display("category/add.html");
	}
	
	
	public function onSave(){
		$catid=get_post('catid','i');
	 	
		$data['bstatus']=post('bstatus','i');
		$data['pid']=post('pid','i');
		 
		$data['cname']=post('cname','h');
		$data['orderindex']=post('orderindex','i');
		 
		$data['list_tpl']=post('list_tpl','h');
		$data['show_tpl']=post('show_tpl','h');
		$data['title']=post('title','h');
		$data['keywords']=post('keywords','h');
		$data['description']=post('description','h');
		$data['logo']=post('logo','h');
		$data['type']=post('type','h');
		if(empty($data['description'])){			
			$data['description']=cutstr(strip_tags($_POST['content']),240);
		}
		
		if($data['pid']){
			$parent=M("category")->selectRow(array("where"=>array("catid"=>$data['pid'])));
			 
			$data['level']=$parent['level']+1;
			 
		}else{
			 
			
			if(!$catid){
				$data['level']=1;
			}
			
		}
		
		
		if($catid){
			unset($data['model_id']);
			unset($data['parent_id']);
			
			unset($data['level']);
			M("category")->update($data,array("catid"=>$catid));
		}else{
				 				
			M("category")->insert($data);
		}
		$this->onLevel(1);
		$this->goAll("保存成功");
	}
	
	/*批量子分类添加*/
	public function onAddmore(){
		$catid=get('catid','i');
		$model_id=max(1,get_post('model_id','i'));
		$data=M("category")->selectRow(array("where"=>"catid=".$catid));
		if(empty($data)) $this->goall("数据出错",1);
		$typelist=M("category")->typelist();
		$this->smarty->assign(array(
			"data"=>$data,
			"model_id"=>$model_id,
			"typelist"=>$typelist
		));
		$this->smarty->display("category/addmore.html");
	}
	
	public function onSaveMore(){
		$catid=get_post('catid','i');
		$data=M("category")->selectRow(array("where"=>"catid=".$catid));
		if(empty($data)) $this->goall("数据出错",1);
		$content=post('content');
		$arr=explode("\r\n",$content);
		if($arr){
			foreach($arr as $v){
				$v=trim($v);
				if(!empty($v)){
					$t_d=array(
						"cname"=>$v,
						"title"=>$v,
						"keywords"=>$v,
						"description"=>$v,
						"pid"=>$data['catid'],
						 
						"level"=>$data['level']+1, 
						 
						"type"=>$data['type']
						 
					);
					M("category")->insert($t_d);
				}
			}
		}
		$this->goall("添加成功");
	}
	
	public function OnChangebstatus(){
		$bstatus=get('bstatus','i');
		$catid=get('catid','i');
		M("category")->update(array("bstatus"=>$bstatus),array("catid"=>$catid));
	}
	public function onOrderindex(){
		$catid=get('catid','i');
		$orderindex=get('data','i');
		M("category")->update(array("orderindex"=>$orderindex),array("catid"=>$catid));
	}
	
	
	public function onDelete(){
		$catid=get('catid','i');
		M("category")->update(array("bstatus"=>11),array("catid"=>$catid));
		echo json_encode(array("error"=>0,"message"=>$this->lang['delete_success']));	
	}
	
	public function onAjax_getchild(){
		$pid=get('pid','i');
		
		$data=M("category")->select(array("where"=>array("pid"=>$pid),"order"=>" orderindex asc"));
		
		echo "<option value=0>{$this->lang['please_select']}</option>";
		if($data){
			foreach($data as $k=>$v){
				echo "<option value='{$v['catid']}'>{$v['cname']}</option>";
			}
		}
		exit;
	}
	
	public function onLevel($res=false){
		M("category")->update(array("level"=>99),"1");
		M("category")->update(array("level"=>1),"pid=0");
		$this->level(1);
		$this->level(2);
		$this->level(3);
		$this->level(4);
		$this->level(5);
		$this->level(6);
		$this->level(7);
		$this->level(8);
		$this->level(9);
		if($res) return true;
		$this->goall("分类修复成功");
	}
	
	public function level($level=1){
		$ids=M("category")->selectCols(array(
			"where"=>"level=".$level,
			"fields"=>"catid",
			"limit"=>100000
		));
		$ids && M("category")->update(array("level"=>$level+1),"pid in("._implode($ids).")");
	}
	
}
?>