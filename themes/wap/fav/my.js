var per_page=0,isfirst=true;;
var time=Date.parse( new Date())/1000;
var catid=0;
var wv;
var lastvideo;
$(document).on("click", ".playbtn", function() {
	var p = $(this).parents(".vdlist-item");
	var id = p.find("video").attr("id");
	var v = document.getElementById(id);
	$(v).attr("controls", "controls");
	v.play();
	$(this).hide();
	var skey = "article-" + p.find("video").attr("object-id");
	if(!sessionStorage.getItem(skey)) {
		sessionStorage.setItem(skey, 1);
		$.get(SITE + "/index.php?m=article&a=addclick&id=" + p.find("video").attr("object-id"), function(data) {

		})
	}
	if(lastvideo != null && lastvideo != v) {
		lastvideo = v;
		vdstop(v);
	} else {
		lastvideo = v;
	}
})

$(document).on("click", ".vds", function() {
	var p = $(this).parents(".vdlist-item");
	var id = $(this).attr("id");
	var v = document.getElementById(id);
	if(v.paused) {
		v.play();
		p.find(".playbtn").hide();
		//统计访问次数

	} else {
		v.pause();
		//$(v).removeAttr("controls");
		p.find(".playbtn").show();
	}
	if(lastvideo != null && lastvideo != v) {
		lastvideo = v;
		vdstop(v);
	} else {
		lastvideo = v;
	}

})
$(document).on("click","a",function(){
	vdstop("body");
	$(".playbtn").show();
})
function vdstop(vv) {
	var vds = $(".vds");

	for(var i = 0; i < vds.length; i++) {
		var v = document.getElementById(vds.eq(i).attr("id"));
		if($(v).attr("id") == $(vv).attr("id")) continue;
		//console.log(v);
		if(!v.paused) {
			$(v).parents(".item").find(".playbtn").show();
			$(v).removeAttr("controls");
			stopvideo(v)
		}

	}
}

function stopvideo(v) {
	var v = v;
	setTimeout(function() {
		v.pause();
	}, 100);
}

function vds_time() {
	//视频处理
	var vds = $(".vds");

	for(var i = 0; i < vds.length; i++) {
		var v = document.getElementById(vds.eq(i).attr("id"));
		v.onloadedmetadata = function(e) {
			var p = $(this).parents(".vdlist-item");
			var vv = document.getElementById($(this).attr("id"));
			var dur = vv.duration;

			if(dur > 60) {
				var fen = parseInt(dur / 60);

				var miao = parseInt(dur - fen * 60);
				var time = fen + ":" + miao;

			} else {
				var time = dur;
			}

			p.find(".time").html(time);
		}

	}
} 
 

getPage();
listload.loadid="#pullup";
	listload.showload(function(){
		pullup();
	});
function getPage(){ 

	$.get(SITE+"index.php?m=fav&a=my&ajax=1",function(data){
		time=Date.parse( new Date())/1000;
		isfirst=false;
		per_page=data.data.per_page;
	  	if(per_page==0){
	  		$("#pullup").hide();
	  	} 			 
		var html = template('page-tpl', data.data);
		$("#page").html(html);
		$("#mfooter-user").addClass("active");
		vds_time();
	},"json")
	listload.loadid="#pullup";
	listload.showload(function(){
		pullup();
	});
}		
function pulldown() {				 			 
		console.log("刷新");  
		$.get(SITE+"index.php?m=fav&a=my&ajax=1",function(data){
			time=Date.parse( new Date())/1000;			
		 	per_page=data.data.per_page;
		  	if(per_page==0){
		  		listload.loadend=true;
		  		$("#pullup").hide();
		  	}		 
			var html = template('list-tpl', data.data);
			
			$("#list").html(html);
			 vds_time();
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
	$.get(SITE+"index.php?m=fav&a=my&ajax=1&per_page="+per_page,function(data){
		  	
		  	per_page=data.data.per_page;
		  	if(per_page==0){
		  		$("#pullup").hide();
		  		listload.loadend=true;
		  	}
		  	var html = template('list-tpl', data.data);
			if(isfirst){				 
				$("#list").html(html);
				isfirst=false;
			}else{
				
				$("#list").append(html);
				
				
			}
			vds_time();
	},"json");
}
 			 

