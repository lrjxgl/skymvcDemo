<!DOCTYPE >
<html>
<?php echo $this->fetch('head.html'); ?>
<body>

<?php echo $this->fetch('weixin_sucai/nav.html'); ?>
<div class="nav_title">素材管理</div>
<div class="tb1">
<table class='table table-bordered' width='100%'>
  <tr>
   <td>id</td>
   <td>标题</td>
   <td>logo</td>
   <td>状态</td>
   <td>添加时间</td>
<td>操作</td>
  </tr>
 <?php $_from = $this->_var['data']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
<tr>
   <td><?php echo $this->_var['c']['id']; ?></td>
   <td><?php echo $this->_var['c']['title']; ?></td>
   <td><?php if ($this->_var['c']['imgurl']): ?><img src="<?php echo images_site($this->_var['c']['imgurl']); ?>.100x100.jpg" style="width:50px; height:50px;" /><?php endif; ?></td>
   
   <td><?php if ($this->_var['c']['status'] == 0): ?>未审核<?php else: ?>运营<?php endif; ?></td>
   <td><?php echo date("Y-m-d",$this->_var['c']['dateline']); ?></td>
<td><a href="admin.php?m=weixin_sucai&a=add&id=<?php echo $this->_var['c']['id']; ?>&wid=<?php echo $this->_var['c']['wid']; ?>">编辑</a>  
<a href="javascript:;" class="delete" url="admin.php?m=weixin_sucai&a=delete&id=<?php echo $this->_var['c']['id']; ?>&wid=<?php echo $this->_var['c']['wid']; ?>">删除</a></td>
  </tr>
   <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
 </table>
<div><?php echo $this->_var['pagelist']; ?></div>
</div>
<?php echo $this->fetch('footer.html'); ?>