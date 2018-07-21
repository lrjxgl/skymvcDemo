<!--start 导航-->
 
<div class="row">
 
<ul class="breadcrumb">
  <li><a href="/index.php">首页</a><span class="divider">/</span></li>
  <li><a href="<?php echo R("/index.php?m=list&catid=".$this->_var["cat_top"]["catid"]."");?>"><?php echo $this->_var['cat_top']['cname']; ?></a><span class="divider">/</span></li>
  <?php if ($this->_var['cat_2nd']): ?>
  <li><a href="<?php echo R("/index.php?m=list&catid=".$this->_var["cat_2nd"]["catid"]."");?>"><?php echo $this->_var['cat_2nd']['cname']; ?></a><span class="divider">/</span></li>
  <?php endif; ?>
  <?php if ($this->_var['cat_3nd']): ?>
   <li><a href="<?php echo R("/index.php?m=list&catid=".$this->_var["cat_3nd"]["catid"]."");?>"><?php echo $this->_var['cat_3nd']['cname']; ?></a><span class="divider">/</span></li>
  <?php endif; ?>
  <li class="active"><?php echo $this->cutstr($this->_var['data']['title'],60,''); ?></li>
      
</ul>
</div>
 
<!--END 导航-->