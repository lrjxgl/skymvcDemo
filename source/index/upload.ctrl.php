<?php
class uploadControl extends skymvc{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function onDefault(){
		
		$this->smarty->display("upload/default.html");
	}
	
	public function onInit(){
		if(!$this->get_session("ssuser") && !$this->get_session('ssadmin')){
			exit(json_encode(array("err"=>"请先登录",1))); 
		}
	}
	
	public function onUpload(){
		
		$this->loadClass("upload");
		//是否上传图片
		$this->upload->maxsize=838860800;
		$this->upload->upimg=false;
		//设置允许上传的文件类型
		$this->upload->allowtype=$this->upload->sysallowtype;
		//根据Id存储
		$this->upload->iddir=1;
		$data=$this->upload->uploadfile("upimg");
		if($data['err']==''){
			$data['truefilename']=IMAGES_SITE($data['filename']);
			$this->goAll("success",0,$data);
		}
		$this->goAll($data['err'],1);
		
	}
	
	public function onImg(){
		$_GET['ajax']=1;
		
		$this->loadClass("upload");
		$this->upload->uploaddir="attach/";
		$this->upload->upimg=true;
		$data=$this->upload->uploadfile("upimg");
		if($data['err']==''){
			$this->loadConfig("image");
			$this->loadClass("image");
			$data['imgurl']=$data['filename'];
			$data['trueimgurl']=$data['truefilename']=IMAGES_SITE($data['filename']);
			$cfs=$this->config_item("thumb");
			foreach($cfs as $k=>$v){
				$this->image->makeThumb($data['filename'].$v['name'],$data['filename'],$v['w'],$v['h'],$v['all']);
			}
			$this->goAll("success",0,$data);
		}
		$this->goAll($data['err'],0);
		
	}
	
	public function onBase64_user_head(){
		$dir=isset($_GET['dir'])?get('dir','h')."/":"";
		$dir=str_replace(".","_",$dir);
		if(get('id','i')){
			$dir="attach/".$dir.$this->dirId(get('id','i'));
		}else{
			$dir="attach/".$dir.date("Y/m/d/").$this->dirId(get('id','i'));
		}
		umkdir($dir);
		$maxid=M("maxid")->insert(array("t"=>0));
		$file=$dir.$maxid.".jpg";
 		$content=substr(strstr( $_POST['content'] ,','),1);
		$content=base64_decode( $content);
		file_put_contents($file,$content);
		$im=getimagesize($file);
		if($im[0]){
			if($im[0]<5 || $im[1]<5){
				unlink($file);
				exit(json_encode(array("error"=>1,"imgurl"=>$file,"msg"=>"图片出错了")));
			}
		}else{
			unlink($file);
			exit(json_encode(array("error"=>1,"imgurl"=>$file,"msg"=>"图片出错了")));
		}
		$this->loadClass("image",false,false);
		$img=new image();
		$imgurl=$file;
		$img->makethumb($imgurl.".100x100.jpg",$imgurl,"100","100",1);
		$img->makethumb($imgurl.".small.jpg",$imgurl,"240","240",1);
		$img->makethumb($imgurl.".middle.jpg",$imgurl,"440","440",1);
		 
		$data=array("error"=>0,"imgurl"=>$file,"trueimgurl"=>images_site($file),"file"=>$file,"msg"=>"");
		echo json_encode($data);
	}
	
	/*根据id来存储*/
	public function dirId($id){
		if(!$id) return false;
		return (($id/1000000)%100)."/".(($id/10000)%100)."/".(($id/100)%100)."/".($id%100)."/".$id."/";
	}
	
}

?>