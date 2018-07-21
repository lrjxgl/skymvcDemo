<!DOCTYPE >
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
<?php echo $this->fetch('weixin/nav.html'); ?>
 <table class='table table-bordered' width='100%'>
  <tr>
    
   <td>用户</td>
   <td>第一次</td>
   <td>关注时间</td>
   <td>更新时间</td>
   <td>取消关注</td>
   <td>状态</td>
  
    
   <td>回复次数</td>
<td>操作</td>
  </tr>
 <?php $_from = $this->_var['data']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
<tr>
   
   <td><?php echo $this->_var['c']['openid']; ?></td>
   <td><?php echo date("Y-m-d H:m",$this->_var['c']['dateline']); ?></td>
   <td><?php echo date("m-d H:m",$this->_var['c']['add_time']); ?></td>
   <td><?php echo date("m-d H:m",$this->_var['c']['last_time']); ?></td>
   <td><?php echo date("m-d H:m",$this->_var['c']['del_time']); ?></td>
   <td><?php if ($this->_var['c']['status']): ?>已关注<?php else: ?>未关注<?php endif; ?></td>
 
   <td><?php echo $this->_var['c']['reply_num']; ?></td>
<td><a href="javascript:;" class="delete" url="admin.php?m=weixin_user&a=delete&id=<?php echo $this->_var['c']['id']; ?>">删除</a></td>
  </tr>
   <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
 </table>
<div><?php echo $this->_var['pagelist']; ?></div>
</div>
</div>
<?php echo $this->fetch('footer.html'); ?>