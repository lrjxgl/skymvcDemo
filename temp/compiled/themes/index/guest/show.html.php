<!DOCTYPE html>
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
<?php echo $this->fetch('header.html'); ?>
 <div class="main-body box960">
     <div class="tabs-border">
        <a class="item " href="<?php echo R("/index.php?m=guest");?>">留言板</a>
        <a class="item " href="<?php echo R("/index.php?m=guest&a=add");?>">添加留言</a>
        <a class="item " href="<?php echo R("/index.php?m=guest&a=my");?>">我的留言</a>
        <a class="item active" href="javascript:;">留言详情</a>
    </div>
 <table class='table ' width='100%'>
  <tr><td width="100">id：</td><td><?php echo $this->_var['data']['id']; ?></td></tr>
  <tr><td>主题：</td><td><?php echo $this->_var['data']['title']; ?></td></tr>
  <tr><td>类型：</td><td><?php echo $this->_var['catlist'][$this->_var['data']['catid']]; ?></td></tr>
  <tr><td>邮箱：</td><td><?php echo $this->_var['data']['email']; ?></td></tr>
  <tr><td>QQ：</td><td><?php echo $this->_var['data']['qq']; ?></td></tr>
  <tr><td>留言时间：</td><td><?php echo date("Y-m-d H:m",$this->_var['data']['dateline']); ?></td></tr>
  <tr><td>留言内容：</td><td><?php echo $this->_var['data']['content']; ?></td></tr>
  <?php if ($this->_var['data']['reply_time']): ?>
  <tr><td>回复内容：</td><td><?php echo $this->_var['data']['reply_content']; ?></td></tr>
  <tr><td>回复时间：</td><td><?php echo date("Y-m-d H:m",$this->_var['data']['reply_time']); ?></td></tr>
  <?php endif; ?>
 </table>
 </div>
 <?php echo $this->fetch('footer.html'); ?>
</body>
</html>