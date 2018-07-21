<!DOCTYPE html>
<html>
	<?php echo $this->fetch('head.html'); ?>
	<body>
		<header class="mui-bar mui-bar-nav">
		    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
		    <h1 class="mui-title">视频</h1>
		</header>
		<div class="mui-content">
		    <div style="position: relative; height: 50px;">
		<div class="mui-scroll-wrapper" id="tab-cat">
		   	 <div class="mui-scroll" style="min-width: 100%;" >
				<div class="tabs-border">
					<a class="item active js-cat" v="0">全部</a>
					<?php $_from = $this->_var['catlist']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
					<a class="item js-cat" v="<?php echo $this->_var['c']['catid']; ?>"><?php echo $this->_var['c']['cname']; ?></a>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
				</div>
			  </div>
		</div>
	</div>
	<div class="vdlist" id="list">
		 
		<?php $_from = $this->_var['list']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('k', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['c']):
?>
		<div class="vdlist-item" >
			<div class="top">
				<a href="/index.php?m=article&a=show&id=<?php echo $this->_var['c']['id']; ?>" class="title"><?php echo $this->_var['c']['title']; ?></a>
				<div class="num"><?php echo $this->_var['c']['view_num']; ?>次播放</div>
			</div>
			<div class="playbtn"><img src="<?php echo $this->_var['skins']; ?>img/play.png" ></div>
			<div class="time">00:01</div>
			<video id="vds<?php echo $this->_var['k']; ?>" preload="metadata" object-id="<?php echo $this->_var['c']['id']; ?>" class="vds" webkit-playsinline   playsinline  poster="<?php echo images_site($this->_var['c']['imgurl']); ?>" width="100%" src="<?php echo $this->_var['c']['videourl']; ?>"></video>
		</div>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>		 
	</div>
		</div>
	<?php $this->assign('mfooter','video'); ?>	
	<?php echo $this->fetch('footer.html'); ?>	
	<script id="listtpl" type="text/html">
	
		 
		<%for(var $k in list){%>
		<% var $c=list[$k]%>
		<div class="vdlist-item" >
			<div class="top">
				<a href="/index.php?m=article&a=show&id=<%=$c.id%>" class="title"><%=$c.title%></a>
				<div class="num"><%=$c.view_num%>次播放</div>
			</div>
			<div class="playbtn"><img src="<?php echo $this->_var['skins']; ?>img/play.png" ></div>
			<div class="time">00:01</div>
			<video id="vds<%=$k%>" preload="metadata" object-id="<%=$c.id%>" class="vds" webkit-playsinline   playsinline  poster="<%=$c.imgurl%>" width="100%" src="<%=$c.videourl%>"></video>
		</div>
		<%}%>
	
	 
</script>	
	<script src="/plugin/skyweb/listload.js"></script>
	<script src="/plugin/jquery/template-native.js"></script>
	<script>
		var per_page = "<?php echo $this->_var['per_page']; ?>";
	</script>
	<script src="<?php echo $this->_var['skins']; ?>video/list.js"></script>
	</body>
</html>
