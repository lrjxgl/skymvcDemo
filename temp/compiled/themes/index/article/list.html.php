<!DOCTYPE >
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
<div class="page"> <?php echo $this->fetch('header.html'); ?>
  <div class="main-body">
    <div class="row box960">
      	 <?php echo $this->fetch('inc/list_breadcrumb.html'); ?>
         <div class="col-12-3">
         	<?php echo $this->fetch('article/sidebar.html'); ?>
         </div>
         
         <div class="col-12-9">
           <div class="w98 right bgf pd-5">
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
  </div>
  <?php echo $this->fetch('footer.html'); ?> </div>
</body>
</html>