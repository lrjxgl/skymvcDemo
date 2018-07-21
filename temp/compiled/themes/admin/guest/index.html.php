<!DOCTYPE html>
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
<?php echo $this->fetch('header.html'); ?>


 <div class="main-body w98">
 <div class="tabs-border">
	<a class="item active" href="<?php echo R("/admin.php?m=guest");?>">留言板</a>
  
 
</div>
 <table class='table table-bordered' width='100%'>
  <tr class="hd">
   <td>id</td>
   <td>主题</td>
   <td>状态</td>
   <td>类型</td>
   <td>邮箱</td>
   <td>QQ</td>
   <td>留言时间</td>
   <td>留言内容</td>
    
   <td>回复时间</td>
 <td>操作</td>
  </tr>
 <?php $_from = $this->_var['data']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
<tr>
   <td><?php echo $this->_var['c']['id']; ?></td>
   <td><?php echo $this->_var['c']['title']; ?></td>
   <td> <?php if ($this->_var['c']['bstatus'] == 2): ?>
   <img src='<?php echo $this->_var['skins']; ?>images/yes.gif' class="ajax_no" url='<?php echo $this->_var['appadmin']; ?>?m=guest&a=bstatus&id=<?php echo $this->_var['c']['id']; ?>&bstatus=10' rurl='<?php echo $this->_var['appadmin']; ?>?m=guest&a=bstatus&id=<?php echo $this->_var['c']['id']; ?>&bstatus=2'>
    <?php else: ?>
    <img src='<?php echo $this->_var['skins']; ?>images/no.gif' class="ajax_yes" url='<?php echo $this->_var['appadmin']; ?>?m=guest&a=bstatus&id=<?php echo $this->_var['c']['id']; ?>&bstatus=2' rurl='<?php echo $this->_var['appadmin']; ?>?m=guest&a=bstatus&id=<?php echo $this->_var['c']['id']; ?>&bstatus=10'>
    <?php endif; ?>
    </td>
   <td><?php echo $this->_var['catlist'][$this->_var['c']['catid']]; ?></td>
   <td><?php echo $this->_var['c']['email']; ?></td>
   <td><?php echo $this->_var['c']['qq']; ?></td>
   <td><?php echo date("Y-m-d H:m",$this->_var['c']['dateline']); ?></td>
   <td><?php echo $this->cutstr($this->_var['c']['content'],32,'...'); ?></td>
   
   <td><?php if ($this->_var['c']['reply_time']): ?><?php echo date("Y-m-d H:m",$this->_var['c']['reply_time']); ?><?php else: ?>暂无回复<?php endif; ?></td>
 <td><a href="<?php echo R("admin.php?m=guest&a=add&id=".$this->_var["c"]["id"]."");?>">编辑</a>  &nbsp;
 
 <a href="<?php echo R("admin.php?m=guest&a=delete&id=".$this->_var["c"]["id"]."");?>">删除</a></td>
  </tr>
   <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
 </table>
<div><?php echo $this->_var['pagelist']; ?></div>
</div> 
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>