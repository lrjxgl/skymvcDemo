<!DOCTYPE html>
<html>
	<?php echo $this->fetch('head.html'); ?>
	<body>
		<header class="mui-bar mui-bar-nav">
		    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
		    <h1 class="mui-title">要闻</h1>
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
	<ul id="list" class="mui-table-view mui-table-view-chevron">
		 
	 	<?php $_from = $this->_var['list']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['value']):
?>
			  	
        		<li class="mui-table-view-cell">
        			<a href="/index.php?m=article&a=show&id=<?php echo $this->_var['value']['id']; ?>" class="mui-navigate-right">
        			<?php if ($this->_var['value']['imgurl']): ?>
        			<img class="mui-media-object mui-pull-left" src="<?php echo images_site($this->_var['value']['imgurl']); ?>.100x100.jpg">
                    <div class="mui-media-body">
                        <?php echo $this->_var['value']['title']; ?>
                        <p class='mui-ellipsis'><?php echo $this->_var['value']['description']; ?></p>
                    </div>
                    <?php else: ?>
        				<?php echo $this->_var['value']['title']; ?>
        			<?php endif; ?>
        			</a>
        		</li>
 
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>		 
	</ul>
		</div>
	<?php $this->assign('mfooter','article'); ?>	
	<?php echo $this->fetch('footer.html'); ?>	
	</body>
</html>
