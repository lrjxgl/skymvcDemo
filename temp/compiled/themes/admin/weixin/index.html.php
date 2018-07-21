<!DOCTYPE >
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
<?php echo $this->fetch('weixin/nav.html'); ?>
 <table class='table table-bordered' width='100%'>
  <tr>
   <td>id</td>
   <td>logo</td>
   <td>微信token</td>
   <td>微信名</td>
   <td>状态</td>
   <td>添加时间</td>
   <td>接口地址</td>
<td>操作</td>
  </tr>
 <?php $_from = $this->_var['data']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
<tr>
   <td><?php echo $this->_var['c']['id']; ?></td>
   <td><?php if ($this->_var['c']['logo']): ?><img src="<?php echo IMAGES_SITE($this->_var['c']['logo']); ?>" style="width:50px; height:50px;" /><?php endif; ?></td>
   <td><?php echo $this->_var['c']['token']; ?></td>
   <td><?php echo $this->_var['c']['title']; ?></td>
   <td><?php if ($this->_var['c']['status'] == 0): ?>验证<?php else: ?>运营<?php endif; ?></td>
   <td><?php echo date("Y-m-d",$this->_var['c']['dateline']); ?></td>
   <td><a href="/index.php?m=weixin_openapi&wid=<?php echo $this->_var['c']['id']; ?>">http://<?php echo $_SERVER['HTTP_HOST']; ?>/index.php?m=weixin_openapi&wid=<?php echo $this->_var['c']['id']; ?></a></td>
<td><a href="admin.php?m=weixin&a=add&id=<?php echo $this->_var['c']['id']; ?>">编辑</a>
 
 <a href="admin.php?m=weixin&a=left&id=<?php echo $this->_var['c']['id']; ?>" target="menu-frame">进入管理</a> <a href="javascript:;" class="delete" url="admin.php?m=weixin&a=delete&id=<?php echo $this->_var['c']['id']; ?>">删除</a></td>
  </tr>
   <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
 </table>
<div><?php echo $this->_var['pagelist']; ?></div>
</div>
</div>
<?php echo $this->fetch('footer.html'); ?>