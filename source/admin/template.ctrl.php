<?php
class templateControl extends skymvc{
	
	public function __construct(){
		parent::__construct();
		$this->loadModel("sites");
	}
	
	public function onDefault(){
		$site=$this->sites->selectRow("");
		$dir=ROOT_PATH."themes/";
		$hd=opendir($dir);
		$arr=array();
		$i=0;
		$cfs=$this->getAllConfig();
		while(($f=readdir($hd))!=false)
		{
			if($f!="." && $f!=".."  && $f!='admin' && !is_file($dir.$f)  )
			{
				$arr[$i]['skins']=$f;
				if(file_exists($dir.$f."/index/config.php")){
					require_once("{$dir}{$f}/index/config.php");
					$arr[$i]['skinsimg']="themes/".$f."/index/skins.jpg";
					$arr[$i]['skinsdir']=$f;
					$arr[$i]['skinsname']=$skinsname;
					$arr[$i]['skinsauthor']=$skinsauthor;
					$arr[$i]['skinsversion']=$skinsversion;
					$arr[$i]['skinsauthorsite']=$skinsauthorsite;
					$arr[$i]['skinstype']=$skinstype;
					$arr[$i]['skinsprice']=$skinsprice;
					$arr[$i]['skinsdata']=$skinsdata;
					if(isset($cfs[$skinsdir])){
						$arr[$i]['myskinsdata']=$cfs[$skinsdir];
					}
					$arr[$i]['skinsinfo']=$skinsinfo;
					$arr[$i]['skinsdir']=$skinsdir;
					unset($skinsprice);
					if(SKINS==$f or WAPSKINS==$f )
					{
						$arr[$i]['using']="<font color='red'>正在使用</a>";					
					}else
					{	
						if($skinstype=='wap'){
							$arr[$i]['using']="<a href='".APPADMIN."?m=template&a=using&wapskins=1&skins={$f}'>使用</a>";
						}else{
							$arr[$i]['using']="<a href='".APPADMIN."?m=template&a=using&skins={$f}'>使用</a>";
						}
					}
					$i++;
				}
				
				if(file_exists($dir.$f."/wap/config.php")){
					require_once("{$dir}{$f}/wap/config.php");
					$arr[$i]['skinsimg']="themes/".$f."/wap/skins.jpg";
					$arr[$i]['skinsdir']=$f;
					$arr[$i]['skinsname']=$skinsname;
					$arr[$i]['skinsauthor']=$skinsauthor;
					$arr[$i]['skinsversion']=$skinsversion;
					$arr[$i]['skinsauthorsite']=$skinsauthorsite;
					$arr[$i]['skinstype']=$skinstype;
					$arr[$i]['skinsprice']=$skinsprice;
					$arr[$i]['skinsdata']=$skinsdata;
					if(isset($cfs[$skinsdir])){
						$arr[$i]['myskinsdata']=$cfs[$skinsdir];
					}
					$arr[$i]['skinsinfo']=$skinsinfo;
					$arr[$i]['skinsdir']=$skinsdir;
					unset($skinsprice);
					if(SKINS==$f or WAPSKINS==$f )
					{
						$arr[$i]['using']="<font color='red'>正在使用</a>";					
					}else
					{	
						if($skinstype=='wap'){
							$arr[$i]['using']="<a href='".APPADMIN."?m=template&a=using&wapskins=1&skins={$f}'>使用</a>";
						}else{
							$arr[$i]['using']="<a href='".APPADMIN."?m=template&a=using&skins={$f}'>使用</a>";
						}
					}
					$i++;
				}
				
				if(file_exists($dir.$f."/"."config.php"))
				{
					require_once("{$dir}{$f}/config.php");
					$arr[$i]['skinsimg']="themes/".$f."/skins.jpg";
					$arr[$i]['skinsdir']=$f;
					$arr[$i]['skinsname']=$skinsname;
					$arr[$i]['skinsauthor']=$skinsauthor;
					$arr[$i]['skinsversion']=$skinsversion;
					$arr[$i]['skinsauthorsite']=$skinsauthorsite;
					$arr[$i]['skinstype']=$skinstype;
					$arr[$i]['skinsprice']=$skinsprice;
					$arr[$i]['skinsdata']=$skinsdata;
					if(isset($cfs[$skinsdir])){
						$arr[$i]['myskinsdata']=$cfs[$skinsdir];
					}
					$arr[$i]['skinsinfo']=$skinsinfo;
					$arr[$i]['skinsdir']=$skinsdir;
					unset($skinsprice);
					if(SKINS==$f or WAPSKINS==$f )
					{
						$arr[$i]['using']="<font color='red'>正在使用</a>";					
					}else
					{	
						if($skinstype=='wap'){
							$arr[$i]['using']="<a href='".APPADMIN."?m=template&a=using&wapskins=1&skins={$f}'>使用</a>";
						}else{
							$arr[$i]['using']="<a href='".APPADMIN."?m=template&a=using&skins={$f}'>使用</a>";
						}
					}
					$i++;
				}
			}
			
		}
		 
		$this->smarty->assign("skinslist",$arr);
		$this->smarty->display("template/index.html");
	}
	
	public function onOnline(){
		
		$this->smarty->display("template/online.html");
	}
	
	public function onUsing(){
		$skins=get('skins','h');
		$f=file_get_contents(ROOT_PATH."config/const.php");
		if(get('wapskins')){
			$f=preg_replace("/define\(\"WAPSKINS\".*\);/iUs","define(\"WAPSKINS\",'".$skins."');",$f,1);
		}else{
			$f=preg_replace("/define\(\"SKINS\".*\);/iUs","define(\"SKINS\",'".$skins."');",$f,1);
		}
		//$f=preg_replace("/skins=\'.*\';/iUs","skins='".$skins."';",$f);
		file_put_contents(ROOT_PATH."config/const.php",$f);
		$this->goall("模板切换成功");
	}
	
	public function onSetTpl(){
		$skinsdir=get_post('skinsdir','h');
		$skinsdir=str_replace(ROOT_PATH,"",$skinsdir);
		require_once($skinsdir."/config.php");
		$row=M("shoptpl_config")->selectRow("skinsdir='".$skinsdir."' AND shopid=".SHOPID);
		if($row){
			$skinsdata=json_decode(base64_decode($row['skinsdata']),true);
		} 
		$this->smarty->assign(array(
			"skinsdir"=>$skinsdir,
			"skinsdata"=>$skinsdata
		));
		$this->smarty->display("shoptpl/settpl.html");
	}
	
	public function onSetTplSave(){
		$skinsdir=get_post('skinsdir','h');
		$skinsdir=str_replace(ROOT_PATH,"",$skinsdir);
		require_once($skinsdir."/config.php");
		if(!empty($_POST)){
			foreach($_POST as $k=>$v){
				if(isset($skinsdata[$k])){
					$skinsdata[$k]['value']=post($k,"x");
				}
			}
		}
		$json=base64_encode(json_encode($skinsdata));
		$row=M("shoptpl_config")->selectRow("skinsdir='".$skinsdir."' AND shopid=".SHOPID);
		if($row){
			M("shoptpl_config")->update(array("skinsdata"=>$json),"id='".$row['id']."'");
		}else{
			M("shoptpl_config")->insert(array("skinsdata"=>$json,"skinsdir"=>$skinsdir,"shopid"=>SHOPID));
		}
		
		$this->goAll("保存成功"); 
	}
	
	public function onSkinsData(){
		$skinsdata=post('skinsdata','a');
		$skinsdata=str_replace("\r","",$skinsdata);
		$skinsdir=post('skinsdir','h');
		$arr=explode("\n",$skinsdata);
	 
		$str="<?php\r\n";
		foreach($arr as $k=>$v){
			if(!empty($v)){
				$a=explode("=>",$v);
				$str.='define("'.strtoupper(trim($a[0])).'","'.trim($a[1]).'");'."\r\n";
			}
		}
		$row=M("template_config")->selectRow("skinsdir='".$skinsdir."'");
		if($row){
			M("template_config")->update(array("skinsdata"=>$skinsdata),"skinsdir='".$skinsdir."'");
		}else{
			M("template_config")->insert(array("skinsdata"=>$skinsdata,"skinsdir"=>$skinsdir));
		}
		file_put_contents("temp/skinsdata/".($skinsdir."skinsdata.php"),$str);
		$this->goAll("保存成功");
		
	}
	
	public function onSave(){
		
	}
	
	
	public function getAllConfig(){
		$data=M("template_config")->select();
		if($data){
			foreach($data as $v){
				$sdata[$v['skinsdir']]=$v['skinsdata'];
			}
			return $sdata;
		}
		return array("skyCom是一个最简单的企业网站建站系统");
	}
	
	
	
}
?>