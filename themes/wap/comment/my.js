 
var per_page=0,isfirst=false;
getPage();
listload.loadid="#pullup";
	listload.showload(function(){
		getList();
});
function getPage(){
	$.get(SITE+"index.php?m=comment&a=my&ajax=1",function(data){
		per_page=data.data.per_page;
		var html=template("list-tpl",data.data);		
		$("#list").append(html);

	},"json")
}
function getList(){
	if(!isfirst && per_page==0) return false;
	$.get(SITE+"index.php?m=comment&a=my&ajax=1&per_page="+per_page,function(data){
		per_page=data.data.per_page;
		var html=template("list-tpl",data.data);		
		$("#list").append(html);

	},"json")
}

$(document).on("click",".js-cm-del",function(){
	var obj=$(this);
	$.get(SITE+"/index.php?m=comment&a=delete&ajax=1&id="+$(this).attr("v"),function(data){
		if(data.error){
			mui.toast(data.message);
		}else{
			obj.parents(".item").remove();
		}
	},"json")
})
