<!DOCTYPE >
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
    <div class="tabs-border">
    	<a href="<?php echo $this->_var['appadmin']; ?>?m=user" class="item active">用户管理</a>
        <a href="<?php echo $this->_var['appadmin']; ?>?m=user&a=add" class="item">用户添加</a>
    </div>
    <div class="main-body w98">
    <h3><small>共<?php echo $this->_var['rscount']; ?>条记录</small></h3>
    <div>
    <form method="get" action="<?php echo $this->_var['appadmin']; ?>" class="form form-inline">
    <input type="hidden" name="m" value="user" />
    userid:<input type="text" name="userid" value="<?php echo intval($_GET['userid']); ?>" style="width:50px" />
    昵称：<input type="text" name="nickname" value="<?php echo $_GET['nickname']; ?>" />
    
    <input type="submit" value="搜索" class="btn btn-success" />
    </form>
    </div>
    <table class="table table-bordered" width="100%">
    	<tr>
        <td width="50">ID</td>
        <td width="60">账号</td>
        <td width="60">昵称</td>
        <td width="70">电话</td>
        
        <td width="30">状态</td>
        <td width="100">注册时间</td>
         
        <td >操作</td>
        </tr>
       <?php $_from = $this->_var['data']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
       <tr>
        <td><?php echo $this->_var['c']['userid']; ?></td>
        <td><?php echo $this->_var['c']['username']; ?></td>
        <td><?php echo $this->_var['c']['nickname']; ?></td>
        <td><?php echo $this->_var['c']['telephone']; ?></td>
         
        <td><?php if ($this->_var['c']['bstatus'] == 1): ?>已通过<?php elseif ($this->_var['c']['bstatus'] == 0): ?>未审核<?php else: ?>已禁止<?php endif; ?></td>
        <td><?php echo $this->_var['c']['reg_time']; ?></td>
        
        <td> <a href="<?php echo $this->_var['appadmin']; ?>?m=user&a=add&userid=<?php echo $this->_var['c']['userid']; ?>">编辑</a>  
         
        </td>
        </tr>
       <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
    
    </table>
    <?php echo $this->_var['pagelist']; ?>
    </div>
 

 
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>