<!DOCTYPE >
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
<div class="tabs-border">
<a class="active item" href="<?php echo $this->_var['appadmin']; ?>?m=navbar&group_id=1">导航管理</a>
<a class="item" href="<?php echo $this->_var['appadmin']; ?>?m=navbar&a=add">导航添加</a>
</div>
<div class="tabs-border mgb-10"> 
<?php $_from = $this->_var['group_list']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('k', 'g');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['g']):
?>
<a class="item <?php if ($this->_var['k'] == get ( 'group_id' )): ?>active<?php endif; ?>" href="<?php echo $this->_var['appadmin']; ?>?m=navbar&group_id=<?php echo $this->_var['k']; ?>"><?php echo $this->_var['g']; ?></a>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</p>
</div>
<div class="rbox">
<form action="<?php echo $this->_var['appadmin']; ?>?m=navbar&a=order" method="post">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF" class="table table-bordered">
  <tr>
    <td width="5%" align="center">ID</td>
    <td width="10%" align="center">名称</td>
    <td width="5%">状态</td>
    <td width="4%" align="center">m</td>
    <td width="4%" align="center">a</td>
    <td width="10%" height="30" align="center">位置</td>
    <td width="7%" align="center">打开方式</td>
    
    <td width="7%" height="30" align="center">排序</td>
    <td width="16%" height="30" align="center">操作</td>
  </tr>
  <?php $_from = $this->_var['navlist']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 't');if (count($_from)):
    foreach ($_from AS $this->_var['t']):
?>
  <tr>
    <td align="center"><?php echo $this->_var['t']['id']; ?></td>
  <td align="left"><a href="<?php echo $this->_var['t']['link_url']; ?>" target="_blank" style="color:red"><?php echo $this->_var['t']['title']; ?></a></td>
  <td><?php if ($this->_var['t']['bstatus'] == 1): ?>
   <img src='/static/images/yes.gif' class="ajax_no" url='<?php echo $this->_var['appadmin']; ?>?m=navbar&a=bstatus&id=<?php echo $this->_var['t']['id']; ?>&bstatus=0' rurl='<?php echo $this->_var['appadmin']; ?>?m=navbar&a=bstatus&id=<?php echo $this->_var['t']['id']; ?>&bstatus=1'>
    <?php else: ?>
    <img src='/static/images/yes.gif' class="ajax_yes" url='<?php echo $this->_var['appadmin']; ?>?m=navbar&a=bstatus&id=<?php echo $this->_var['t']['id']; ?>&bstatus=1' rurl='<?php echo $this->_var['appadmin']; ?>?m=navbar&a=bstatus&id=<?php echo $this->_var['t']['id']; ?>&bstatus=0'>
    <?php endif; ?></td>
  <td align="center"><?php echo $this->_var['t']['m']; ?></td>
  <td align="center"><?php echo $this->_var['t']['a']; ?></td>
    <td height="25" align="center"><?php echo $this->_var['group_list'][$this->_var['t']['group_id']]; ?></td>
    <td align="center"><?php if ($this->_var['t']['target'] == '_blank'): ?>新窗口<?php else: ?>当前窗口<?php endif; ?></td>
    <input type="hidden" name="id[]" value="<?php echo $this->_var['t']['id']; ?>" />
    <td height="25" align="center"><input name="orderindex[]" type="text" value="<?php echo $this->_var['t']['orderindex']; ?>" style="width:50px;" /></td>
    <td height="25" align="center">
    <a href="<?php echo $this->_var['appadmin']; ?>?m=navbar&a=add&pid=<?php echo $this->_var['t']['id']; ?>" style="color:red;">添加下级导航</a>
    <a href="<?php echo $this->_var['appadmin']; ?>?m=navbar&a=add&id=<?php echo $this->_var['t']['id']; ?>">编辑</a> 
    <a href="javascript:;"  url="<?php echo $this->_var['appadmin']; ?>?m=navbar&a=delete&id=<?php echo $this->_var['t']['id']; ?>" class="delete" >删除</a></td>
  </tr>
  <?php if ($this->_var['t']['child']): ?>
  <?php $_from = $this->_var['t']['child']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
    <tr>
      <td align="center"><?php echo $this->_var['c']['id']; ?></td>
  <td align="left">|__<a href="<?php echo $this->_var['c']['link_url']; ?>" target="_blank"><?php echo $this->_var['c']['title']; ?></a> </td>
  <td><?php if ($this->_var['c']['bstatus'] == 1): ?>
   <img src='<?php echo $this->_var['skins']; ?>images/yes.gif' class="ajax_no" url='<?php echo $this->_var['appadmin']; ?>?m=navbar&a=bstatus&id=<?php echo $this->_var['c']['id']; ?>&bstatus=0' rurl='<?php echo $this->_var['appadmin']; ?>?m=navbar&a=bstatus&id=<?php echo $this->_var['c']['id']; ?>&bstatus=1'>
    <?php else: ?>
    <img src='<?php echo $this->_var['skins']; ?>images/no.gif' class="ajax_yes" url='<?php echo $this->_var['appadmin']; ?>?m=navbar&a=bstatus&id=<?php echo $this->_var['c']['id']; ?>&bstatus=1' rurl='<?php echo $this->_var['appadmin']; ?>?m=navbar&a=bstatus&id=<?php echo $this->_var['c']['id']; ?>&bstatus=0'>
    <?php endif; ?></td>
  <td align="center"><?php echo $this->_var['c']['m']; ?></td>
  <td align="center"><?php echo $this->_var['c']['a']; ?></td>
    <td height="25" align="center"><?php echo $this->_var['group_list'][$this->_var['c']['group_id']]; ?></td>
    <td align="center"><?php if ($this->_var['c']['target'] == '_blank'): ?><?php echo $this->_var['lang']['_blank']; ?><?php else: ?><?php echo $this->_var['lang']['_self']; ?><?php endif; ?></td>
    <input type="hidden" name="id[]" value="<?php echo $this->_var['c']['id']; ?>" />
    
    <td height="25" align="center"><input name="orderindex[]" type="text" value="<?php echo $this->_var['c']['orderindex']; ?>"  style="width:50px;" /></td>
    <td height="25" align="center">
    <a href="<?php echo $this->_var['appadmin']; ?>?m=navbar&a=add&id=<?php echo $this->_var['c']['id']; ?>">编辑</a> 
    <a href="javascript:;"  url="<?php echo $this->_var['appadmin']; ?>?m=navbar&a=delete&id=<?php echo $this->_var['c']['id']; ?>" class="delete" >删除</a>
    </td>
  </tr>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  <?php endif; ?>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  <tr>
    <td colspan="9" align="right"><input type="submit" name="button" id="button" value="更改排序" class="btn" /></td>
    </tr>
    <?php if ($this->_var['pagelist']): ?>
    <tr>
    <td colspan="9" align="right"><?php echo $this->_var['pagelist']; ?></td>
    </tr>
    <?php endif; ?>
</table>

</form>
</div>

<?php echo $this->fetch('footer.html'); ?>
</body>
</html>
 