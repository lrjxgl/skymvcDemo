<!DOCTYPE html>
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
  <?php echo $this->fetch('header.html'); ?>
  <div class="header-bottom"></div>
  <div class="layui-main">
<div class="layui-row">
<div class="layui-col-md3"><?php echo $this->fetch('inc/user_left.html'); ?></div>
<div class="layui-col-md9">
	<div class="tabs-border">
		<div class="item active">修改昵称</div>
	</div>
	<form method="post" class="layui-form" action="/index.php?m=user&a=save">
 		<div class="layui-form-item">
 			<div class="layui-form-label">昵称</div>
 			<div class="layui-input-block">
 				<input class="layui-input" type="text" name="nickname" value="<?php echo $this->_var['data']['nickname']; ?>">
 			</div>
 		</div>
 


		<div class="layui-form-item"> 
			<div class="layui-input-block">
				<input type="submit" name="button" id="button" class="layui-btn" value="保存">
			</div>
		</div>
</form>
 </div>
</div> 
<?php echo $this->fetch('footer.html'); ?>
 

</body>
</html>