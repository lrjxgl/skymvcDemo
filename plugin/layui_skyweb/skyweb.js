function goBack(goindex){
	if(typeof(goindex)=="undefined") goindex="-1";
	if (document.referrer != null && document.referrer != "") {
          window.history.go(goindex);
     } else{
			window.location="/";
	}
}
/*图片缩放*/
function thumb(ImgD,FitWidth,FitHeight){
     var image=new Image();
     image.src=ImgD.src;
     if(image.width>0 && image.height>0){
         if(image.width/image.height>= FitWidth/FitHeight){
             if(image.width>FitWidth){
                 ImgD.width=FitWidth;
                 ImgD.height=(image.height*FitWidth)/image.width;
             }else{
                 ImgD.width=image.width; 
                ImgD.height=image.height;
             }
         } else{
             if(image.height>FitHeight){
                 ImgD.height=FitHeight;
                 ImgD.width=(image.width*FitHeight)/image.height;
             }else{
                 ImgD.width=image.width; 
                ImgD.height=image.height;
             } 
        }
     }
 }

function imgError(obj,w,h,color,text,type){
	if(typeof(color)=="undefined"){
		color="";
	}
	if(typeof(text)=="undefined"){
		text="得推";
	}
	if(typeof(type)=="undefined"){
		type=1;
	}
	if($(obj).hasClass("js-errload")){
		return false;
	}
	$(obj).addClass("js-errload")
	$(obj).attr("src","http://img.deitui.com/?w="+w+"&h="+h+"&color="+encodeURI(color)+"&text="+text+"&type="+type);
}
