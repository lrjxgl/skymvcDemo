<!DOCTYPE html>
<html>
	<?php echo $this->fetch('head.html'); ?>
	<body>
		<header class="mui-bar mui-bar-nav">
		    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
		    <h1 class="mui-title">直播</h1>
		</header>
		<div class="mui-content">
	<div id="page"></div>
					 
</div>
<?php $this->assign('mfooter','zhibo'); ?>
<?php echo $this->fetch('footer.html'); ?>
<script id="page-tpl" type="text/html">
	<div class="tabs-border i4" style="margin-bottom: 5px;">
		<div class="item active js-type" v="all">全部</div>
		<div class="item js-type" v="doing">直播中</div>
		<div class="item js-type" v="start">即将开始</div>
		<div class="item js-type" v="end">可回放</div>
	</div>
	<div id="zblist" class="zblist">
		<%include("list-tpl")%>			 
	</div>
				 
	<div id="pullup" class="pullup">加载更多..</div>
	 	
</script>
<script id="list-tpl" type="text/html">
	
		 
		<%for(var i=0;i<data.length;i++){%>
			<% var $c=data[i];%>
		<a class="item" href="/index.php?m=zblive&a=show&id=<%=$c.id%>">
			<%if($c.zbstatus==1){%>
			<div class="status inzb">直播中</div>
			<%}else if($c.zbstatus==2){%>
			<div class="status zbback">回放</div>
			<%}else{%>
			<div class="status zbback">即将直播</div>
			<%}%>
			<div class="img">
				<img src="<%=$c.imgurl%>.middle.jpg">
			</div>
			 
		</a>
		<%}%>
			
</script>
      <script src="/plugin/skyweb/listload.js"></script>
	<script src="/plugin/jquery/template-native.js"></script>
	<script src="<?php echo $this->_var['skins']; ?>zblive/index.js"></script>
	</body>
</html>
