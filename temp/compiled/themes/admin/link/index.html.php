<!DOCTYPE >
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
<?php echo $this->fetch('link/nav.html'); ?>


<div class="rbox">
<table width="100%" border="0" class="table table-bordered">
  <tr>
    <td width="6%" align="center">ID</td>
    <td width="23%" align="center">名称</td>
    <td width="13%" align="center">图片</td>
    <td width="19%" align="center">链接</td>
    <td width="22%" align="center">类型</td>
    <td width="17%" align="center">操作</td>
  </tr>
  <?php $_from = $this->_var['data']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'd');if (count($_from)):
    foreach ($_from AS $this->_var['d']):
?>
  <tr>
    <td align="center"><?php echo $this->_var['d']['id']; ?></td>
    <td align="center"><?php echo $this->_var['d']['title']; ?></td>
    <td align="center"><?php if ($this->_var['d']['link_img']): ?><img src="<?php echo $this->_var['d']['link_img']; ?>" width="100" height="100"><?php endif; ?></td>
    <td align="center"><?php echo $this->_var['d']['link_url']; ?></td>
    <td align="center"><?php if ($this->_var['d']['type_id'] == 2): ?>普通<?php else: ?>首页<?php endif; ?></td>
    <td align="center"> 
    	<a href="<?php echo $this->_var['appadmin']; ?>?m=link&a=add&id=<?php echo $this->_var['d']['id']; ?>">编辑</a> &nbsp;
        <a href="javascript:;" class="delete" url="<?php echo $this->_var['appadmin']; ?>?m=link&a=delete&id=<?php echo $this->_var['d']['id']; ?>">删除</a> 
        </td>
  </tr>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

</table>
<?php echo $this->_var['pagelist']; ?>

</div>
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>