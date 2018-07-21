<!DOCTYPE html>
<html>
<?php echo $this->fetch('head.html'); ?>
<style>
	.uinfo .item{
		line-height: 40px;
		border-bottom: 1px solid #ddd;
	}
	.uinfo .item .label{
		margin-right: 10px;
		display: inline-block;
		width: 60px;
		text-align: right;
	}
</style>
<body>
 <?php echo $this->fetch('header.html'); ?>
 <div class="header-bottom"></div>
  <div class="layui-main">
<div class="layui-row">
<div class="layui-col-md3"><?php echo $this->fetch('inc/user_left.html'); ?></div>
<div class="layui-col-md9"> 
 
<div class="tabs-border">
	<div class="item active">个人中心</div>
</div>
 
<div class="  uinfo">
	<div class="item">
    	<div class="label">用户名</div>
    	<?php echo $this->_var['data']['username']; ?> 
	</div>
    <div class="item">
    	<div class="label">手机</div>  <?php echo $this->_var['data']['telephone']; ?>
    </div>
    
    <div class="item">
    	<label class="label">注册时间</label> <?php echo date("Y-m-d",$this->_var['data']['dateline']); ?>
   	</div>
        
    
</div>

 

 
 

 
 </div>
</div>
 </div>
<?php echo $this->fetch('footer.html'); ?>

</body>
</html>