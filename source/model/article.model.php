<?php
class articleModel extends model{
	public $base;
	public function __construct(&$base){
		parent::__construct($base);
		$this->table="article";
	}
	public function typelist(){
		return array(
			"article"=>"资讯",
			"picture"=>"图片",
			"product"=>"产品",
			"video"=>"视频",
			"download"=>"下载"
		);
	}
	
	public function id_list($option){
		$data=$this->select($option);
		if($data){
			foreach($data as $k=>$v){
				$t[$v['id']]=$v;
			}
			return $t;
		}
		return false;
	}
	
	public function onSelect($option=array(),&$rscount=false){
		$data=$this->select($option,$rscount);
		if($data){
			foreach($data as $k=>$v){
				$t_ids[]=$v['catid'];
			}
			
			$t_ids && $t_c=M("category")->cat_list(" catid in("._implode($t_ids).")");
			foreach($data as $k=>$v){
				$v['cname']=$t_c[$v['catid']];
				$data[$k]=$v;
			}
		}
		return $data;
	}
	
	public function onList($catid=0,$limit=10,$isimg=0,$orderby=" id DESC"){
		$w=" bstatus=2  ";
 
		if($catid){
			$cids=M("category")->id_family($catid);
			if($cids){
				$w.=" AND catid in(".implode(",",$cids).") ";
			}else{
				$w.=" AND 1=2 ";
			}
		}
		if($isimg){
			$w.=" AND is_img=1";
		}
		$rscount=false;
		$list=$this->onSelect(array(
			"where"=>$w,
			"start"=>$start,
			"limit"=>$limit,
			"order"=>$orderby
			
		),$rscount);
		
		return $list;
	}
	
 
	
	
	
	public function hotList($catid=0,$limit=10){
		$where=" bstatus=2  AND ishot=1 ";
		if($catid){
			$ids=M("category")->id_family($catid);
			if($ids){
				$where.=" AND catid in("._implode($ids).")";
			}else{
				$where .=" AND 1=2 ";
			}
		}
		$option=array(
			"where"=>$where,
			"limit"=>$limit,
			"order"=>" grade DESC,id DESC"
		);
		$data=$this->onSelect($option);
		return $data;
	}
	
	public function recommendList($catid=0,$limit=10){
		$where=" bstatus=2  AND is_recommend=1 ";
		if($catid){
			$ids=M("category")->id_family($catid);
			if($ids){
				$where.=" AND catid in("._implode($ids).")";
			}else{
				$where .=" AND 1=2 ";
			}
		}
		$option=array(
			"where"=>$where,
			"limit"=>$limit,
			"order"=>" id DESC"
		);
		$data=$this->onSelect($option);
		 
		return $data;
	}
	
	public function newlist($catid=0,$limit=10){
		$where=" bstatus=2   AND isnew=1 ".$this->sw;
		if($catid){
			$ids=M("category")->id_family($catid);
			if($ids){
				$where.=" AND catid in("._implode($ids).")";
			}else{
				$where .=" AND 1=2 ";
			}
		}
		$option=array(
			"where"=>$where,
			"limit"=>$limit,
			"order"=>" grade DESC"
		);
		$data=$this->onSelect($option);
		return $data;
	}
	
	
}

?>