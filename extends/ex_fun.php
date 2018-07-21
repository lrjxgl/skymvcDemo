<?php
function myDiy($str){
	echo myDiy();
}
 function loadEditor(){
	if(ISWAP){
		echo '<link href="/plugin/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
		<style>.edui-editor-body img{max-width:95% !important;}</style>
		<script type="text/javascript" src="/plugin/umeditor/umeditor.config.js?v2"></script>';
echo '<script>options={
			initialFrameWidth:"100%",
			toolbar:[],
			elementPathEnabled : false,
			wordCount:false
		}</script>';
echo '<script language="javascript" src="/plugin/umeditor/umeditor.min.js?v2"></script>
<script>var UE=UM;</script>
';
	}else{
		echo '
		<script type="text/javascript" src="/plugin/ueditor/ueditor.config.js?v2"></script>

<script type="text/javascript" src="/plugin/ueditor/ueditor_simple.js"></script>
<script language="javascript" src="/plugin/ueditor/ueditor.all.min.js?v2"></script>';
	}
}
?>