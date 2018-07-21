<?php
class categoryModel extends model{
	public $base;
	
	function __construct(&$base){
		parent::__construct($base);
		$this->table="category";
	}
	
	public function typelist(){
		return array(
			"article"=>"文章",
			"video"=>"视频",
			
		);
	}
	
	/**根据id选出分类**/
	public function getListByIds($ids,$fields="catid,logo,title"){
		if(empty($ids)) return false;
		$d=$this->select(array("where"=>" catid in("._implode($ids).")"));
		if($d){
			foreach($d as $v){
				$data[$v['catid']]=$v;
			}
			return $data;
		}
	}
	
	/**
	*获取模板
	*catid 分类id
	* type 1列表2分类
	*/
	public function getTpl($catid,$type=1){
		$catid=intval($catid);
		$data=$this->selectRow("catid=$catid");
		switch($type){
			case 1:
				if($data['list_tpl']){
					return $data['list_tpl'];
				}else{
					if($data['pid']){
						return self::getTpl($data['pid'],$type);
					}
				}
				break;
			case 2:
				if($data['show_tpl']){
					return $data['show_tpl'];
				}else{
					if($data['pid']){
						return self::getTpl($data['pid'],$type);
					}
				}
				break;
				
		
		}
	}
	/*增加主题数*/
	public function add_topic_num($catid,$num){
		$catid=intval($catid);
		$data=$this->selectRow("catid=$catid");
		$this->update(array("topic_num"=>$data['topic_num']+1),"catid=".$catid);
		if($data['pid']){
			return self::add_topic_num($data['pid'],$num);
		}
	}
	
	/*更新最后发表的主题*/
	public function update_new_topic($catid,$last_post){
		$catid=intval($catid);
		$data=$this->selectRow("catid=$catid");
		$this->update(array("topic_num"=>$data['topic_num']+1,"last_post"=>addslashes(json_encode($last_post))),"catid=".$catid);
		if($data['pid']){
			return self::update_new_topic($data['pid'],$last_post);
		}
	}
	
	/*更新最后发表的帖子*/
	public function update_comment_num($catid,$num){
		$catid=intval($catid);
		$num=intval($num);
		$data=$this->selectRow("catid=$catid");
		$this->update(array("comment_num"=>$data['comment_num']+$num),"catid=".$catid);
		if($data['pid']){
			return self::update_comment_num($data['pid'],$num);
		}
	}
	
	public function cat_list($where=""){

		$c=$this->select(array("where"=>$where,"fields"=>"cname,catid","limit"=>100));	
		if($c){
			foreach($c as $v){
				$data[$v['catid']]=$v['cname'];
			}
		}
		return $data;
	}
	
	public function children($pid,$bstatus=0){
		$pid=intval($pid);
		$bstatus=intval($bstatus);
		$cache_key="category_children_".$bstatus."_".$pid;
		if($bstatus){
			$where="   bstatus=$bstatus ";
		}else{
			$where="  bstatus<11 ";
		}
		$td=$this->select(array("where"=>$where." AND pid=".$pid,"order"=>"orderindex asc"));
		if(!empty($td)){
			foreach($td as $k=>$v){
				$child=$this->children($v['catid'],$bstatus);
				if($child){
					$v['child']=$child;
				}
				$v['last_post']=json_decode($v['last_post'],true);
				$v['logo']=IMAGES_SITE($v['logo']);
				$td[$k]=$v;
			}
			cache()->set($cache_key,$td,30); 
			return $td;
		}
		return false;
	}
	
	 
	
	public function getList($option,$child=true){
		$cat=$this->select($option);
		if(!$child) return $cat;
		if($cat){
			foreach($cat as $k=>$c){
				$cat[$k]['child']=$this->select(array("where"=>array("pid"=>$c['catid'],"bstatus<"=>99),"order"=>" orderindex asc"));
				if($cat[$k]['child']){
					foreach($cat[$k]['child'] as $kk=>$cc){
						$cat[$k]['child'][$kk]['child']=$this->select(array("where"=>array("pid"=>$cc['catid'],"bstatus<"=>99),"order"=>" orderindex asc"));
					}
				}
			}
		}
		return $cat;
	}
	
	public function cat_child($catid){
		return $this->select(array("where"=>array("pid"=>intval($catid)),"order"=>" orderindex asc"));
	}
	public function get($catid){
		return $this->selectRow(array("where"=>array("catid"=>$catid)));
	}
	
	public function cat_navlist($catid=0,$model_id=0){
		$where="  bstatus=1 ";
		if($catid){
			$where.=" AND catid=".$catid."";
		}else{
			$where .=" AND pid=0 ";
		}
		$data=$this->selectRow($where);
		if(empty($data)) return false;
		if($data['pid']){
			$parent=$this->selectRow(array("where"=>array("catid"=>$data['pid'])));
		}
		$child=$this->select(array("where"=>array("pid"=>$catid,"bstatus"=>1,"model_id"=>$model_id),"order"=>"orderindex asc"));
		//如果没有子类 选同级分类
		if(empty($child)){
			$child=$this->select(array("where"=>array("pid"=>$data['pid'],"bstatus"=>1,"model_id"=>$model_id),"order"=>"orderindex asc"));
		}
		return $child;
		
	}
	
	public function tag_nav($catid){
		$cache_key="category_tag_nav_$catid";
		if($d=cache()->get($cache_key)) return $d;
		$catid=intval($catid);
		$data=$this->selectRow(array("where"=>"catid=$catid"));
		if(empty($data)) return false;
		if($data['pid']) $data=$this->selectRow(array("where"=>"catid=".$data['pid']));
		$child=$this->select(array("where"=>array("pid"=>$data['catid'],"bstatus"=>1),"order"=>"orderindex asc"));
		if($child){
			foreach($child as $kk=>$vv){
				$vv['child']=$this->select(array("where"=>array("pid"=>$vv['catid'],"bstatus"=>1),"order"=>"orderindex asc"));
				$vv['tags']=explode("\n",str_replace("\r\n","\n",str_replace(" ","",trim($vv['tags']))));
				$child[$kk]=$vv;	
			}
		}
		$data['child']=$child;
		cache()->set($cache_key,$data,60);
		return $data;
		
	}
	
	public function id_byids($ids){
		if(empty($ids)) return false;
		$data=$this->select(array("where"=>" id in("._implode($ids).") " ));
		if($data){
			foreach($data as $k=>$v){
				$t_c[$v['id']]=$v;
			}
			return $t_c;
		}
	}
	
	public function id_family($id=0){
		$id=intval($id);
		$ids[]=$id;
		$ids1=$this->selectCols(array("where"=>" pid=".$id."  ","fields"=>"catid"));
		if($ids1){
			$ids=array_merge($ids,$ids1);
			$ids2=$this->selectCols(array("where"=>" pid in("._implode($ids1).") ","fields"=>"catid"));
			if($ids2){
				$ids=array_merge($ids,$ids2);
				$ids3=$this->selectCols(array("where"=>" pid in("._implode($ids2).") ","fields"=>"catid"));
				if($ids3){
					$ids=array_merge($ids,$ids3);
				}
			}
		}
		return $ids;
		
	}
	
 
	
	
}
?>