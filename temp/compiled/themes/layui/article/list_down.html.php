<!DOCTYPE >
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
  <?php echo $this->fetch('header.html'); ?>
  <div class="layui-main">
     
      	 <?php echo $this->fetch('inc/list_breadcrumb.html'); ?>
      	 <div class="layui-row">
	         <div class="layui-col-md3">
	         	<?php echo $this->fetch('article/sidebar.html'); ?>
	         </div>
	         
	         <div class="layui-col-md9">
	            
	         	<ul class="data-list">
	            	 
	            	<?php $_from = $this->_var['list']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
	                <?php echo $this->fetch('inc/li_item.html'); ?>
	                <?php endforeach; else: ?>
	                <li>暂无内容</li>
	                <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
	            </ul>
	            <div><?php echo $this->_var['pagelist']; ?></div>
	            
	         </div>
	         
	         
	      
	    </div>
  </div>
  <?php echo $this->fetch('footer.html'); ?> </div>
</body>
</html>