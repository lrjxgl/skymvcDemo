
	isfirst = false;;
var time = Date.parse(new Date()) / 1000;
var catid = 0;
var wv;
var lastvideo = null;
var w = $("#tab-cat .js-cat").length * 96;
		$("#tab-cat .mui-scroll").width(w);
		mui("#tab-cat").scroll({
			deceleration: 0.0005,
			scrollX: true
		});
listload.loadid = "#pullup";
	listload.showload(function() {
		pullup();
	});		
$(document).on("click", ".js-cat", function() {
	catid = $(this).attr("v");
	$(this).siblings().removeClass("active");
	$(this).addClass("active");
	isfirst = true;
	per_page = 0;
	listload.loadend = false;
	pullup();
})

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

 

function getPage() {

	$.get( "/index.php?m=article&type=video&a=list&ajax=1&catid=" + catid + "&time=" + time, function(data) {
		isfirst = false;
		time = Date.parse(new Date()) / 1000;

		var html = template('page-tpl', data.data);
		$("#page").html(html);
		var w = $("#tab-cat .js-cat").length * 96;
		$("#tab-cat .mui-scroll").width(w);
		mui("#tab-cat").scroll({
			deceleration: 0.0005,
			scrollX: true
		});
		$("#mfooter-video").addClass("active");
		vds_time();

	},"json")

	listload.loadid = "#pullup";
	listload.showload(function() {
		pullup();
	});
}

 
/**
 * 上拉加载具体业务实现
 */
function pullup() {
	//page=0;
	if(per_page == 0 && !isfirst) {
		$("#pullup").hide();
		listload.loadend = true;
		return false;
	}
	$.get("/index.php?m=article&type=video&a=list&ajax=1&catid=" + catid + "&per_page=" + per_page, function(data) {
		per_page = data.data.per_page;

		if(per_page == 0) {
			listload.loadend = true;
			$("#pullup").hide();
		}
		var html = template('listtpl', data.data);
		if(isfirst) {
			$("#list").html(html);
			isfirst = false;
		} else {
			$("#list").append(html);
		}
		vds_time();

	},"json");
}

function catlist() {
	$.get("/index.php?m=category&a=list&catid=0&model_id=1&ajax=1", function(data) {
		data = {
			data: data,
			site: SITE
		};
		var html = template("cat-list-tpl", data);
		$("#cat-list").html(html);
	})
}