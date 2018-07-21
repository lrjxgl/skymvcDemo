/****上传图片*****/
function uploadImg(upid){
		var p=$("#"+upid).parents(".upload-row");
         skyUpload(upid,"/index.php?m=upload&a=img&ajax=1",function(e){
			 var data=eval("("+e.target.responseText+")");
			if(data.error)
			{
				skyToast(data.message);
			 }else
			 {
				 p.find(".upload-show").html("<img src='"+data.data.truefilename+".100x100.jpg' width='50'>");
				 p.find(".upload-field").val(data.data.filename);
			}
		 });
}
	
$(document).ready(function(){
	//删除
	$(".delete").click(function(){
		var obj=$(this);
		if(confirm("删除后不可恢复，确认删除吗?")){
			$.get($(this).attr("url")+"&ajax=1",function(data){
				if(data.error=='0'){
					obj.parents("tr").remove();
				}else{
					alert(data.message);
				}
			},"json");
			
		}
	});
	
	$(document).on("click",".ajax_yes",function()
	{
		
		$.get($(this).attr("url")+"&ajax=1");
		$(this).attr("src","static/images/yes.gif");
		var url=$(this).attr("url");
		$(this).attr("url",$(this).attr("rurl"));
		$(this).attr("rurl",url);
		$(this).removeClass("ajax_yes").addClass("ajax_no");
	});
	
	$(document).on("click",".ajax_no",function()
	{
		$.get($(this).attr("url")+"&ajax=1");
		$(this).attr("src","static/images/no.gif");
		var url=$(this).attr("url");
		$(this).attr("url",$(this).attr("rurl"));
		$(this).attr("rurl",url);
		$(this).removeClass("ajax_no").addClass("ajax_yes");
	});
	
	//表单失去焦点更新数据
	$(".blur_update").blur(function(){
		var data=$(this).val();
		var obj=$(this);
		$.get($(this).attr("url")+"&ajax=1",{data:data},function(data){
			obj.after("<img id='blur_update_tip' src='/static/images/yes.gif'>");
			setTimeout(function(){$("#blur_update_tip").remove()},"1000");
		});
	});
	$(document).on("change","#ajax_catid",function(){
		var pid=$(this).val();
		if(pid!="0"){
			$.get($(this).attr("url")+"&ajax=1",{pid:$(this).val()},function(data){
				$("#ajax_catid_2nd").empty().append(data).show();					 
			});
		}else{
			$("#ajax_catid_2nd").empty().hide();
			if($("#ajax_catid_3nd")){$("#ajax_catid_3nd").hide().empty();}
		}
	})
	
	$(document).on("change","#ajax_catid_2nd",function(){
		var pid=$(this).val();
		if(pid!="0"){
			$.get($(this).attr("url")+"&ajax=1",{pid:pid},function(data){
				$("#ajax_catid_3nd").empty().append(data).show();
			});
		}else{
			$("#ajax_catid_3nd").hide().empty();
		}
	})
	
	//$("tr:nth-child(1)").addClass('first'); 
	//$('tr').addClass('success'); 
	$('tr:odd').addClass('info'); //奇偶变色，添加样式 
	
	
});