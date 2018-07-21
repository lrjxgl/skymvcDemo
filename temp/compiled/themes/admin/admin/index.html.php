<!DOCTYPE >
<html>
<?php echo $this->fetch('head.html'); ?>
<body>

<?php echo $this->fetch('admin/nav.html'); ?>

<div class="rbox">
 

<table width="100%"  class="table table-bordered">
  <tr>
    <td width="92" height="30" align="center">ID</td>
    <td width="231" align="center">用户名</td>
   
    <td width="204" align="center">操作</td>
  </tr>
  <?php $_from = $this->_var['adminlist']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 't');if (count($_from)):
    foreach ($_from AS $this->_var['t']):
?>
  <tr>
    <td height="25" align="center"><?php echo $this->_var['t']['id']; ?></td>
    <td align="center"><?php echo $this->_var['t']['username']; ?></td>
   
    <td align="center">
    [<a href="admin.php?m=admin&a=add&id=<?php echo $this->_var['t']['id']; ?>">编辑</a>] &nbsp;&nbsp;
    <?php if (! $this->_var['t']['isfounder']): ?>[<a href="javascript:;" class="delete" url="admin.php?m=admin&a=delete&id=<?php echo $this->_var['t']['id']; ?>">删除</a>]<?php endif; ?></td>
  </tr><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  <?php if ($this->_var['pagelist']): ?>
  <tr>
    <td height="25" colspan="8" align="center"><?php echo $this->_var['pagelist']; ?></td>
    </tr>
<?php endif; ?>
  
</table>


</div> 
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>