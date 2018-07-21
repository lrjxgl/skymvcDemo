<!DOCTYPE >
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
 
<?php echo $this->fetch('ad/nav.html'); ?>
<div class="search-form">
<form method="get" action="<?php echo $this->_var['appadmin']; ?>">
<input type="hidden" name="m" value="ad" />
<input type="hidden" name="a" value="default" />
<select name="tag_id" id="tag_id">
<?php $this->assign("t_c",M("ad_tags")->tagList(0,0)); ?>
<option  value="0">请选择</option>
<?php $_from = $this->_var['t_c']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('k', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['c']):
?>
<option value="<?php echo $this->_var['k']; ?>" <?php if (get ( 'tag_id' ) == $this->_var['k']): ?> selected="selected"<?php endif; ?>><?php echo $this->_var['c']['title']; ?>(<?php echo $this->_var['c']['width']; ?>*<?php echo $this->_var['c']['height']; ?>)</option>
<?php if ($this->_var['c']['child']): ?>
            	<?php $_from = $this->_var['c']['child']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'cc');if (count($_from)):
    foreach ($_from AS $this->_var['cc']):
?>
                	<option value="<?php echo $this->_var['cc']['tag_id']; ?>" <?php if ($this->_var['cc']['tag_id'] == get ( 'tag_id' )): ?> selected="selected"<?php endif; ?>>|--<?php echo $this->_var['cc']['title']; ?>(<?php echo $this->_var['cc']['width']; ?>*<?php echo $this->_var['cc']['height']; ?>)</option>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            <?php endif; ?>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</select>
 
<button type="submit" class="btn">搜索</button>
</form>
</div>
 <table class='table table-bordered' width='100%'>
  <tr>
   <td>id</td>
   <td>分类</td>
   <td>标题</td>
   
    
   <td>开始时间</td>
   <td>结束时间</td>
   <td>图片地址</td>
   <td>排序</td>
   <td>状态</td>
   <td>添加时间</td>
    
<td>操作</td>
  </tr>
 <?php $_from = $this->_var['data']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
<tr>
   <td><?php echo $this->_var['c']['id']; ?></td>
   <td><?php echo $this->_var['tag_list'][$this->_var['c'][tag_id]][title]; ?><br /><?php echo $this->_var['tag_list'][$this->_var['c'][tag_id_2nd]][title]; ?></td>
   <td><?php echo $this->_var['c']['title']; ?></td>
 
   
   <td><?php echo date("Y-m-d H:m",$this->_var['c']['starttime']); ?></td>
   <td><?php echo date("Y-m-d H:m",$this->_var['c']['endtime']); ?></td>
   <td><?php if ($this->_var['c']['imgurl']): ?><img src="<?php echo images_site($this->_var['c']['imgurl']); ?>.100x100.jpg" style="width:50px;height:50px;" /><?php else: ?>无图<?php endif; ?></td>
   <td><?php echo $this->_var['c']['orderindex']; ?></td>
   <td> 
   			 
           
          <?php if ($this->_var['c']['status'] == 2): ?>
           <img src="/static/images/yes.gif" class="ajax_no"  rurl="<?php echo $this->_var['appadmin']; ?>?m=ad&a=status&id=<?php echo $this->_var['c']['id']; ?>&status=2" url="<?php echo $this->_var['appadmin']; ?>?m=ad&a=status&id=<?php echo $this->_var['c']['id']; ?>&status=1" />
           <?php else: ?>
           <img src="/static/images/no.gif"  class="ajax_yes" url="<?php echo $this->_var['appadmin']; ?>?m=ad&a=status&id=<?php echo $this->_var['c']['id']; ?>&status=2" rurl="<?php echo $this->_var['appadmin']; ?>?m=ad&a=status&id=<?php echo $this->_var['c']['id']; ?>&status=1" />  
          <?php endif; ?>
   </td>
   <td><?php echo date("Y-m-d",$this->_var['c']['dateline']); ?></td>
    
<td>
<a href="<?php echo $this->_var['c']['link1']; ?>" target="_blank">查看</a> &nbsp;
<a href="admin.php?m=ad&a=add&id=<?php echo $this->_var['c']['id']; ?>">编辑</a>  &nbsp;
<a href="javascript:;" class="delete" url="admin.php?m=ad&a=delete&id=<?php echo $this->_var['c']['id']; ?>">删除</a>&nbsp;
</td>
  </tr>
   <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
 </table>
<div><?php echo $this->_var['pagelist']; ?></div>
</div>
</div>
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>