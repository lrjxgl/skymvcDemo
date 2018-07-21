<?php
	/**
	*Author 雷日锦 362606856@qq.com 
	*控制器自动生成
	*/
	if(!defined("ROOT_PATH")) exit("die Access ");
	class articleControl extends skymvc{
		
		public function __construct(){
			parent::__construct();
		}
		
		public function onDefault(){
			$url=APPADMIN."?m=article&a=default";
			$status=get_post('bstatus','i');
			if($status){
				$url.="&bstatus=".$status;
				$where=" bstatus=$status ";
			}else{
				$where=" bstatus<11 ";
			}
			 
			$id=intval(get('id','i'));
			if($id){
				$where.=" AND id=$id";
			}
			$s_is_img=get('s_is_img','i');
			if($s_is_img){
				$where.=" AND is_img=".($s_is_img==1?1:0);
				$url.="&is_img=".$s_is_img;
			}
			$title=get_post('title','h');
			if($title){
				$where.=" AND title like '%{$title}%' ";
				$url.="&title=".urlencode($title);
			}
			$catid=get_post('catid','i');
			if($catid){
				$cids=M("category")->id_family($catid);
				$url.="&catid=$catid";
				if($cids){
					$where.=" AND catid in("._implode($cids).")";
				}else{
					$where.=" AND 1=2 ";
				}
				
			}
			$s_type=get_post('s_type','h');
			if($s_type){
				$url.="&s_type=".$s_type;
				$where.=" AND type='".$s_type."' ";
			}
			$s_index=get_post('s_index','i');
			if($s_index){
				$url.="&s_index=".$s_index;
				$where.=" AND isindex=".($s_index==1?1:0);
			}
			$s_recommend=get_post('s_recommend','i');
			if($s_recommend){
				$url.="&s_recommend=".$s_recommend;
				$where.=" AND is_recommend=".($s_recommend==1?1:0);
			}
			
			$s_new=get_post('s_new','i');
			if($s_new){
				$url.="&s_new=".$s_new;
				$where.=" AND isnew=".($s_new==1?1:0);
			}
			
			$s_hot=get_post('s_hot','i');
			if($s_hot){
				$url.="&s_hot=".$s_hot;
				$where.=" AND ishot=".($s_hot==1?1:0);
			}
			
			$limit=20;
			$start=get("per_page","i");
			$option=array(
				"start"=>intval(get_post('per_page')),
				"limit"=>$limit,
				"order"=>" id DESC",
				"where"=>$where
			);
			$rscount=true;
			$data=M("article")->select($option,$rscount);
			if($data){
				foreach($data as $k=>$v){
					$catids[]=$v['catid'];
				}
				$cats=M("category")->getListByIds($catids);
				foreach($data as $k=>$v){
					$v['catid'] && $v['cname']=$cats[$v['catid']]['cname'];
					$data[$k]=$v;
				}
			}
			$pagelist=$this->pagelist($rscount,$limit,$url);
			$this->smarty->goassign(
				array(
					"data"=>$data,
					"pagelist"=>$pagelist,
					"rscount"=>$rscount,
					"typelist"=>M("article")->typelist(),
					"url"=>$url,
					"cat_list"=>M("category")->children(0)
				)
			);
			$this->smarty->display("article/index.html");
		}
		
		 
		 
		public function onAdd(){
			$id=get_post("id","i");
			if($id){
				$data=M("article")->selectRow(array("where"=>"id={$id}"));
				$con=M("article_data")->selectRow(array("where"=>"id={$id}"));
				$data['content']=$con['content'];				
			}else{
				$data=M("article")->selectRow(array("where"=>"is_temp=1"));
				if(empty($data)){
					$id=M("article")->insert(array("is_temp"=>1,"bstatus"=>12,"dateline"=>time(),"last_time"=>time()));
					M("article_data")->insert(array(
						"id"=>$id
					));
				}
				$data=M("article")->selectRow(array("where"=>"is_temp=1"));
					
			}
			$this->smarty->goassign(array(
				"data"=>$data,
				"typelist"=>M("article")->typelist(),
				"cat_list"=>M("category")->children(0)
			));
			$this->smarty->display("article/add.html");
		}
		
		public function onSave(){
			$id=get_post("id","i");
			$content=post('content','x');
			$data=M("article")->postData();
			$sdata['content']=$content;
			if($data['imgurl']){
				$data['is_img']=1;
				
			}
			if($data['title']){
				$data['is_temp']=0;
			}
			if($id){
				$data['bstatus']=2;
				M("article")->update($data,"id='$id'");
				$sdata['id']=$id;
				if(!M("article_data")->selectRow("id=".$id)){
					
					M("article_data")->insert($sdata);
				}else{
					M("article_data")->update($sdata,"id=".$id);
				}
				
			}else{
				$id=M("article")->insert($data);
				$sdata['id']=$id;
				M("article_data")->insert($sdata);
			}
			$this->goall("保存成功");
		}
		
		public function onbstatus(){
			$id=get_post('id',"i");
			$bstatus=get_post("bstatus","i");
			M("article")->update(array("bstatus"=>$bstatus),"id=$id");
			$this->goall("状态修改成功",0);
		}
		public function onRecommend(){
			$id=get('id','i');
			$is_recommend=get('is_recommend','i');
			M("article")->update(array("is_recommend"=>$is_recommend),array("id"=>$id));	
			echo json_encode(array("error"=>0,"message"=>$this->lang['save_success']));	 
		}
		 
		public function onnew(){
			$id=get('id','i');
			$isnew=get('isnew','i');
			M("article")->update(array("isnew"=>$isnew),array("id"=>$id));	
			echo json_encode(array("error"=>0,"message"=>$this->lang['save_success']));	 
		}
		public function onisIndex(){
			$id=get('id','i');
			$isindex=get('isindex','i');
			M("article")->update(array("isindex"=>$isindex),array("id"=>$id));	
			echo json_encode(array("error"=>0,"message"=>$this->lang['save_success']));	 
		}
		public function onhot(){
			$id=get('id','i');
			$ishot=get('ishot','i');
			M("article")->update(array("ishot"=>$ishot),array("id"=>$id));	
			echo json_encode(array("error"=>0,"message"=>$this->lang['save_success']));	 
		}
		public function onDelete(){
			$id=get_post('id',"i");
			M("article")->update(array("bstatus"=>11),"id=$id");
			$this->goall("删除成功",0);
		}
		
		
	}

?>