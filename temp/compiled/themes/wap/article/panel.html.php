<!--Panel-->

<div class="panel-box" id="panel-box" style="display:none; position:fixed;">
		<a class="panel-close" href="javascript:;" style="position:absolute; color:white; z-index:100; text-decoration:none; right:10px; top:10px;"><i class="fa fa-times"></i></a>
		 
        <ul class="nav-list">
            <li><a href="/index.php" class="aurl">首页</a></li>
            
            <?php if (( get ( 'catid' ) )): ?> 
<?php if (get ( 'catid' ) != $this->_var['cat_top']['catid']): ?>
<li><a href="<?php echo R("/index.php?m=article&a=list&catid=".$this->_var["cat_top"]["catid"]."");?>"><?php echo $this->_var['cat_top']['cname']; ?></a></li>
<?php endif; ?>
<li><a href="<?php echo R("/index.php?m=article&a=list&catid=".$this->_var["cat"]["catid"]."");?>"><?php echo $this->_var['cat']['cname']; ?></a></li>
<?php $this->assign("c_data",M("category")->children(get('catid'),MODEL_ARTICLE_ID,1)); ?>
<?php else: ?>
 <?php $this->assign("c_data",M("category")->children(0,MODEL_ARTICLE_ID,1)); ?>
<?php endif; ?>

            <?php $_from = $this->_var['c_data']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
            <li><a href="<?php echo R("/index.php?m=article&a=list&catid=".$this->_var["c"]["catid"]."");?>"><?php echo $this->_var['c']['cname']; ?></a></li>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
            
        </ul>
        
    </div>
 
<!--End Panel-->
 