<!DOCTYPE html>
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
<?php echo $this->fetch('category/nav.html'); ?>
<div class="tabs-border"> 
<?php $_from = $this->_var['modellist']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('k', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['c']):
?>
<a href="<?php echo $this->_var['appadmin']; ?>?m=category&model_id=<?php echo $this->_var['k']; ?>" class="item <?php if ($_GET['model_id'] == $this->_var['k']): ?> active <?php endif; ?>" ><?php echo $this->_var['c']; ?></a>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<a class="item" href="<?php echo $this->_var['appadmin']; ?>?m=category&pid=<?php echo $this->_var['nextpid']; ?>">&lt;&lt; 返回上级</a>  
</div>
<div class="rbox">
 
<table width="100%" class="table table-bordered">
<tr>
<td width="82" align="center">分类ID</td>
<td width="120" align="center">名称</td>
<td width="97" align="center">分类级数</td>
 
 
<td width="49" align="center">排序</td>
<td width="71" align="center">显示</td>
<td width="203" align="center">操作</td>
</tr>
<?php $_from = $this->_var['catlist']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
<tr>
  <td align="center"><?php echo $this->_var['c']['catid']; ?></td>
  <td align="left"><a href="<?php echo $this->_var['appadmin']; ?>?m=category&pid=<?php echo $this->_var['c']['catid']; ?>"><?php echo $this->_var['c']['cname']; ?></a>  </td>
  <td align="center"><?php echo $this->_var['c']['level']; ?></td>
  
   
  <td align="center"><input type="text" class="w50 blur_update" value="<?php echo $this->_var['c']['orderindex']; ?>" size="6"   url="<?php echo $this->_var['appadmin']; ?>?m=category&a=orderindex&catid=<?php echo $this->_var['c']['catid']; ?>" /></td>
  <td align="center"><?php if ($this->_var['c']['bstatus'] == 1): ?><img class="ajax_no" src="static/images/yes.gif" url="<?php echo $this->_var['appadmin']; ?>?m=category&a=changebstatus&catid=<?php echo $this->_var['c']['catid']; ?>&bstatus=2" rurl="<?php echo $this->_var['appadmin']; ?>?m=category&a=changebstatus&catid=<?php echo $this->_var['c']['catid']; ?>&bstatus=1" /><?php else: ?><img class="ajax_yes" src="static/images/no.gif" url="<?php echo $this->_var['appadmin']; ?>?m=category&a=changebstatus&catid=<?php echo $this->_var['c']['catid']; ?>&bstatus=1" rurl="<?php echo $this->_var['appadmin']; ?>?m=category&a=changebstatus&catid=<?php echo $this->_var['c']['catid']; ?>&bstatus=2" /><?php endif; ?></td>
  <td align="center"> 
  <a href="<?php echo $this->_var['appadmin']; ?>?m=category&a=add&pid=<?php echo $this->_var['c']['catid']; ?>" style="color:red;">添加</a> &nbsp;
  <a href="<?php echo $this->_var['appadmin']; ?>?m=category&a=addmore&catid=<?php echo $this->_var['c']['catid']; ?>" style="color:red;">批量添加</a>&nbsp;  
  <a href="index.php?m=list&catid=<?php echo $this->_var['c']['catid']; ?>" target="_blank">查看</a> &nbsp;
  <a href="<?php echo $this->_var['appadmin']; ?>?m=category&a=add&catid=<?php echo $this->_var['c']['catid']; ?>">编辑</a> &nbsp;
  <a href="javascript:;" class="delete" url="<?php echo $this->_var['appadmin']; ?>?m=category&a=delete&catid=<?php echo $this->_var['c']['catid']; ?>">删除</a></td>
</tr>
<?php if ($this->_var['c']['child']): ?>
<?php $_from = $this->_var['c']['child']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'cc');if (count($_from)):
    foreach ($_from AS $this->_var['cc']):
?>
<tr>
  <td align="center"><?php echo $this->_var['cc']['catid']; ?></td>
  <td align="left">|__<a href="<?php echo $this->_var['appadmin']; ?>?m=category&pid=<?php echo $this->_var['cc']['catid']; ?>"><?php echo $this->_var['cc']['cname']; ?></a></td>
  <td align="center"><?php echo $this->_var['cc']['level']; ?></td>
 
 
  <td align="center"><input type="text" class="w50 blur_update" value="<?php echo $this->_var['cc']['orderindex']; ?>" size="6"   url="<?php echo $this->_var['appadmin']; ?>?m=category&a=orderindex&catid=<?php echo $this->_var['cc']['catid']; ?>" /></td>
  <td align="center"><?php if ($this->_var['cc']['bstatus'] == 1): ?><img class="ajax_no" src="static/images/yes.gif" url="<?php echo $this->_var['appadmin']; ?>?m=category&a=changebstatus&catid=<?php echo $this->_var['cc']['catid']; ?>&bstatus=2" rurl="<?php echo $this->_var['appadmin']; ?>?m=category&a=changebstatus&catid=<?php echo $this->_var['cc']['catid']; ?>&bstatus=1" /><?php else: ?><img class="ajax_yes" src="static/images/no.gif" url="<?php echo $this->_var['appadmin']; ?>?m=category&a=changebstatus&catid=<?php echo $this->_var['cc']['catid']; ?>&bstatus=1" rurl="<?php echo $this->_var['appadmin']; ?>?m=category&a=changebstatus&catid=<?php echo $this->_var['cc']['catid']; ?>&bstatus=2" /><?php endif; ?></td>
  <td align="center">
   <a href="<?php echo $this->_var['appadmin']; ?>?m=category&a=add&pid=<?php echo $this->_var['cc']['catid']; ?>" style="color:red;">添加</a> &nbsp;
   <a href="<?php echo $this->_var['appadmin']; ?>?m=category&a=addmore&catid=<?php echo $this->_var['cc']['catid']; ?>" style="color:red;">批量添加</a>   &nbsp;
  <a href="index.php?m=list&catid=<?php echo $this->_var['cc']['catid']; ?>" target="_blank">查看</a>  &nbsp;
  <a href="<?php echo $this->_var['appadmin']; ?>?m=category&a=add&catid=<?php echo $this->_var['cc']['catid']; ?>">编辑</a> &nbsp;
  <a href="javascript:;" class="delete" url="<?php echo $this->_var['appadmin']; ?>?m=category&a=delete&catid=<?php echo $this->_var['cc']['catid']; ?>">删除</a> &nbsp;
  </td>
</tr>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 

<?php endif; ?>

<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
</table>

</div>

<?php echo $this->fetch('footer.html'); ?>
</body>
</html>