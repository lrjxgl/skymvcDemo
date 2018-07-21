<!DOCTYPE html>
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
<?php echo $this->fetch('header.html'); ?>


 <div class="layui-main">
 <div class="tabs-border">
	<a class="item active" href="<?php echo R("/index.php?m=guest");?>">留言板</a>
    <a class="item" href="<?php echo R("/index.php?m=guest&a=add");?>">添加留言</a>
    <a class="item " href="<?php echo R("/index.php?m=guest&a=my");?>">我的留言</a>
</div>
 <table class='layui-table' width='100%'>
 	<thead>
  <tr class="hd">
   <td>id</td>
   <td>主题</td>
   <td>类型</td>
  
   <td>留言时间</td>
   <td>留言内容</td>
   <td>回复内容</td>
   <td>回复时间</td>
 
  </tr>
  </thead>
 <?php $_from = $this->_var['data']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
<tr>
   <td><?php echo $this->_var['c']['id']; ?></td>
   <td><a href="<?php echo R("/index.php?m=guest&a=show&id=".$this->_var["c"]["id"]."");?>"><?php echo $this->_var['c']['title']; ?></a></td>
   <td><?php echo $this->_var['catlist'][$this->_var['c']['catid']]; ?></td>
   
   <td><?php echo date("Y-m-d H:m",$this->_var['c']['dateline']); ?></td>
   <td><?php echo $this->cutstr($this->_var['c']['content'],32,'...'); ?></td>
   <td><?php echo $this->cutstr($this->_var['c']['reply_content'],32,'..'); ?></td>
   <td><?php if ($this->_var['c']['reply_time']): ?><?php echo date("Y-m-d H:m",$this->_var['c']['reply_time']); ?><?php else: ?>暂无回复<?php endif; ?></td>
 
  </tr>
   <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
 </table>
<div><?php echo $this->_var['pagelist']; ?></div>
</div> 
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>