<!DOCTYPE html>
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
<div class="page"> <?php echo $this->fetch('header.html'); ?>
  <div class="main-body">
    <div class="row box960">
      	 <div class="col-5-1">
         	<?php echo $this->fetch('article/sidebar.html'); ?>
         </div> 
         <div class="col-5-4">
         	<div class="w98 right">
         	<ul class="data-list" >
            	<?php $this->assign("data",M("")->onList()); ?>
            	<?php $_from = $this->_var['data']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
                <?php echo $this->fetch('inc/li_item.html'); ?>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </ul>
            </div>
         </div>
         
         
      
    </div>
  </div>
  <?php echo $this->fetch('footer.html'); ?> </div>
</body>
</html>