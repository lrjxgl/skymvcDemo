<div class="layui-breadcrumb">
  <a href="/index.php">首页</a>
  <a href="<?php echo R("/index.php?m=article&a=list&catid=".$this->_var["cat_top"]["catid"]."");?>"><?php echo $this->_var['cat_top']['cname']; ?></a>=list&catid=$cat_top.catid")}">国际新闻</a>
  <?php if ($this->_var['cat_2nd']): ?><a href="<?php echo R("/index.php?m=article&a=list&catid=".$this->_var["cat_2nd"]["catid"]."");?>"><?php echo $this->_var['cat_2nd']['cname']; ?></a><?php endif; ?>
  <?php if ($this->_var['cat_3nd']): ?><a href="<?php echo R("/index.php?m=article&a=list&catid=".$this->_var["cat_3nd"]["catid"]."");?>"><?php echo $this->_var['cat_3nd']['cname']; ?></a><?php endif; ?>
  <a><cite><?php echo $this->cutstr($this->_var['data']['title'],60,''); ?></cite></a>
</div>
