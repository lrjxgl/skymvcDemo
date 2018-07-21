// JavaScript Document
sky.appTitle("视频详情");
sky.addjs(SITEJS+"js/share.js");
function pageReady(){
	sky.skyReady(getPage);
	setTimeout(function(){
		sky.get(SITE+"/index.php?m=article&a=addclick&id="+para['id'],function(data){
			
		})
	},6000);
	sky.pullRefresh(function(){
		getPage();
	}); 
};
function getPage(){
	sky.get(SITE+"/index.php?m=article&a=show&id="+para['id'],function(data){
		if(data.error==0){
			var html=template("page-tpl",data.data);
			$("#page").html(html);
		}
	})
}
