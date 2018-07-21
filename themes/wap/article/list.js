var per_page=0,isfirst=true;;
var time=Date.parse( new Date())/1000;
var catid=0;
var wv;
var w = $("#tab-cat .js-cat").length * 96;
		$("#tab-cat .mui-scroll").width(w);
		mui("#tab-cat").scroll({
			deceleration: 0.0005,
			scrollX: true
		}); 
$(document).on("click",".js-cat",function(){
	catid=$(this).attr("v");
	$(this).siblings().removeClass("active");
	$(this).addClass("active");
	isfirst=true;
	per_page=0;
	listload.loadend=false;
	pullup();
})
 
listload.loadid="#pullup";
	listload.showload(function(){
		pullup();
	});
function getPage(){ 

	$.get("/index.php?m=article&type=article&ajax=1&a=list&catid="+catid+"&time="+time,function(data){
		time=Date.parse( new Date())/1000;
		isfirst=false;
		per_page=data.data.per_page;
	  	if(per_page==0){
	  		$("#pullup").hide();
	  	} 			 
		var html = template('page-tpl', data.data);
		$("#page").html(html);
		$("#mfooter-news").addClass("active");
		var w=$("#tab-cat .js-cat").length*96;
		$("#tab-cat .mui-scroll").width(w);
		mui("#tab-cat").scroll({
			deceleration: 0.0005,
			scrollX: true
		},"json");
	},"json")
	
}		
function pulldown() {				 			 
		console.log("刷新");  
		$.get("/index.php?m=article&ajax=1&type=article&a=list&catid="+catid+"&time="+time,function(data){
			time=Date.parse( new Date())/1000;			
		 	per_page=data.data.per_page;
		  	if(per_page==0){
		  		listload.loadend=true;
		  		$("#pullup").hide();
		  	}		 
			var html = template('listtpl', data.data);
			
			$("#list").html(html);
			 
		},"json")
	  
}	 
			 
			
/**
 * 上拉加载具体业务实现
 */
function pullup(){
	 //page=0;
	if(per_page==0 && !isfirst) 
	{
		$("#pullup").hide();
		listload.loadend=true;
		return false;					
	}
	$.get("/index.php?m=article&type=article&ajax=1&a=list&catid="+catid+"&per_page="+per_page,function(data){
		  	per_page=data.data.per_page;
		  	if(per_page==0){
		  		$("#pullup").hide();
		  		listload.loadend=true;
		  	}
		  	var html = template('listtpl', data.data);
			if(isfirst){				 
				$("#list").html(html);
				isfirst=false;
			}else{
				
				$("#list").append(html);
				
				
			}
			
	},"json");
}
 			 

