<!DOCTYPE html>
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
	<header class="mui-bar mui-bar-nav">
	    <a href="/index.php" class="mui-icon mui-icon-left-nav mui-pull-left"></a>
	    <h1 class="mui-title">登录</h1>
	</header>
 
<div class="mui-content">
    
 
  <form style="padding: 20px 0px;" method="post" autocomplete="off" id="login-form" action="/index.php?m=login&a=loginSave"  class="form-horizontal " autocomplete="off">
    <input type="hidden" name="backurl" value="<?php echo $this->_var['backurl']; ?>" />
    
      <div class="input-flex">
      	<label class="label">手机</label>
        <input type="text" class="text" name="telephone" placeholder="请输入手机号码"  >
      </div>
      <div class="input-flex">
      	<label class="label">密码</label>
        <input type="password"  class="text"   name="password" placeholder="请输入密码">
      </div>
      <div id="login-submit" class="btn-row-submit">登陆</div>
       
      
     <a href="/index.php?m=register" style="background-color:#eee; width:98%; margin:0 auto; height:40px; text-align:center; line-height:40px; margin-top:20px; display:block">还不是会员？立即注册</a>
    </div>
  </form>
  <?php echo $this->fetch('footer.html'); ?> 
</div>
 
<script type="text/javascript" class="jsa-text">
$(function(){
	$(document).on("click","#login-submit",function(){		
		$.post("/index.php?m=login&a=loginSave&ajax=1",$("#login-form").serialize(),function(data){
			if(data.error==1){
				mui.toast(data.message);
			}else{
				mui.toast("登陆成功");
				setTimeout(function(){
					window.location=data.data.backurl;
				},700);
			}
		},"json");
	});
});
</script>
</body>
</html>
