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
		<div class="item active">修改密码</div>
	</div>	
 <form method="post" action="/index.php?m=user&a=passwordsave">
 	 
    	<div class="layui-form-item">
        	<label class="layui-form-label">旧密码</label>
            <div class="layui-input-block">
            	<input type="password" id="oldpassword"  class="layui-input" name="oldpassword" placeholder="请输入原来的密码"  >
            </div>
        </div>
        
        <div class="layui-form-item">
        	<label class="layui-form-label">新密码</label>
            <div class="layui-input-block">
            	<input type="password" id="inputPassword"  class="layui-input" name="password" placeholder="请输入密码">
            </div>	
        </div>
        
        <div class="layui-form-item">
        	<label class="layui-form-label">重复密码</label>
            <div class="layui-input-block">
            	<input type="password" id="inputPassword2"  class="layui-input" name="password2" placeholder="请再次输入密码">
            </div>	
        </div>
        
        <div class="layui-form-item">
        	 
            	<div class="layui-input-block">
                	 <button type="submit" class="layui-btn">修改密码</button>
                </div>
              
        </div>
        
        
 
    </form>
    </div>
 </div>
</div>
</div>
<?php echo $this->fetch('footer.html'); ?>
 
</body>
</html>