<!DOCTYPE html>
<html>
	<?php echo $this->fetch('head.html'); ?>
	<body>
		<header class="mui-bar mui-bar-nav">
		     
		    <h1 class="mui-title">skymvc演示</h1>
		</header>
		 
		<div class="mui-content">
		    <div id="slider" class="mui-slider" >
		<div class="mui-slider-group mui-slider-loop" id="slides"> 
		 
		<?php $_from = $this->_var['flashlist']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('k', 'v');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['v']):
?>
		 <div class="mui-slider-item"><a href="<?php echo $this->_var['v']['link1']; ?>"><img class="img" src="<?php echo images_site($this->_var['v']['imgurl']); ?>"></a></div> 
	 	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
 		</div>
 		<div class="mui-slider-indicator">
 		<?php $_from = $this->_var['flashlist']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('k', 'v');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['v']):
?>
   		 <div class="mui-indicator <?php if ($this->_var['k'] == 0): ?>mui-active<?php endif; ?>"></div>
    	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    	</div>
	</div>
	 
	<div id="listview" class="listview">
		 
		<?php $_from = $this->_var['indexlist']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('k', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['c']):
?>
			<?php if ($this->_var['c']['type'] == 'video'): ?>
			<div class="vdlist-item" >
				<div class="top">
					<a href="/index.php?m=video&a=show&id=<?php echo $this->_var['c']['id']; ?>" class="title"><?php echo $this->_var['c']['title']; ?></a>
					<div class="num"><?php echo $this->_var['c']['view_num']; ?>次播放</div>
				</div>
				<div class="playbtn"><img src="<?php echo $this->_var['skins']; ?>img/play.png" ></div>
				<div class="time">00:01</div>
				<video id="vds<?php echo $this->_var['k']; ?>" preload="metadata" object-id="<?php echo $this->_var['c']['id']; ?>" class="vds" webkit-playsinline   playsinline  poster="<?php echo images_site($this->_var['c']['imgurl']); ?>" width="100%" src="<?php echo $this->_var['c']['videourl']; ?>"></video>
			</div>
			<?php else: ?>
			<a class="listview-item" href="/index.php?m=article&a=show&id=<?php echo $this->_var['c']['id']; ?>">
				<div class="img">
					<img src="<?php echo images_site($this->_var['c']['imgurl']); ?>.100x100.jpg">
				</div>
				<div class="box">
					<div class="title"><?php echo $this->_var['c']['title']; ?></div>
					<div class="desc"><?php echo $this->_var['c']['description']; ?></div>
				</div>
			</a>
			<?php endif; ?>
		
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	</div>
		</div>
		<?php $this->assign('mfooter','index'); ?>
		<?php echo $this->fetch('footer.html'); ?>
		<script src="<?php echo $this->_var['skins']; ?>index.js"></script>
	</body>
</html>
