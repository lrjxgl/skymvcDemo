var SITE="";
$(function(){
	
	$(document).on("click",".js-fav",function(){
		var that=$(this);
		var oid=$(this).attr("oid");
		var tablename=$(this).attr("tablename");
		var num=$(this).find(".num").html();
		$.post("/index.php?m=fav&a=save&ajax=1",{
			object_id:oid,
			tablename:tablename
		},function(data){
			if(data.data=='add'){
				that.find(".num").html(parseInt(num)+1);
				that.addClass("active");
			}else{
				that.find(".num").html(parseInt(num)-1);
				that.removeClass("active");
			}
			mui.toast(data.message);
		},"json")
		
	})
})