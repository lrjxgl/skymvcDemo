function skyUpload(upid,url,success,error,uploadProgress)
{
		 var vFD = new FormData();
		 var f= document.getElementById(upid).files;
		 $("#"+upid+"loading").show();
		 for(var i=0;i<f.length;i++){ 
			vFD.append('upimg', document.getElementById(upid).files[i]);
			var oXHR = new XMLHttpRequest();        
			oXHR.addEventListener('load', success, false);
			oXHR.addEventListener('error', error, false);
			if(uploadProgress!=undefined){
				oXHR.upload.addEventListener("progress", uploadProgress, false);
			}
			oXHR.open('POST',url);
			oXHR.send(vFD);
	
		 }
}

/*
function uploadFinish(e){
		var data=eval("("+e.target.responseText+")");
		$("#uploading").hide()
		if(data.error != '')
        {
           skyToast(data.msg);
        }else
        {
            $("#imgShow").html("<img src='/"+data.imgurl+".100x100.jpg' width='100'>");
			$("#imgurl").val(data.imgurl);
         }
}
	
function uploadError(e) { // upload error
		skyToast("上传出错了");
}
*/