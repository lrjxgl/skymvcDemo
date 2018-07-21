<!DOCTYPE html>
<html>
<?php echo $this->fetch('head.html'); ?>
<style>
	.btn-yzm{width:80px; border:0px; float:right; cursor:pointer; border-radius:5px; display:block; font-size:.8em; text-align:center; height:30px; background-color:#248211; line-height:30px; color:#fff;}	
</style>
<body>
	<header class="mui-bar mui-bar-nav">
	    <a href="/" class="mui-icon mui-icon-left-nav mui-pull-left"></a>
	    <h1 class="mui-title">会员注册</h1>
	</header>
<div class="mui-content">
 
   
      <form id="reg-form" style="padding: 10px 0px;">
     	<div class="input-flex">
     		<label class="label">手机</label>
     		<input class="text" name="telephone" id="ctelephone" type="text" style="" placeholder="请填手机号码">
     	</div>	
        
        <div class="row-sendSms">
        	<label class="label">验证码</label>
        	<input type="text" class="text" />
        	<div class="send" id="getYzm">获取验证码</div>
        </div>
        
        <div class="input-flex">
     		<label class="label">用户名</label>
     		 <input class="text" name="username" type="text" placeholder="请填写用户名（2-15位）">
     	</div>
     	
     	<div class="input-flex">
     		<label class="label">用户名</label>
     		 <input class="text" name="username" type="text" placeholder="请填写用户名（2-15位）">
     	</div>
     	
     	<div class="input-flex">
     		<label class="label">密码</label>
     		<input class="text" name="password" type="password" placeholder="请填写密码（至少6位）">
     	</div>
     	
     	<div class="input-flex">
     		<label class="label">重复密码</label>
     		<input class="text" name="password2" type="password" placeholder="重复密码">
     	</div>
     	
     	<div   id="reg-submit" class="btn-row-submit" >立即注册</div>
       
        </form>
   
    
    
   
  </div>
  

<script type="text/javascript" class="jsa-text">
$(function(){
	$(document).on("click","#getYzm",function(){
		$.get("/index.php?m=register&a=SendSms&ajax=1",{telephone:$("#ctelephone").val()},function(data){
			mui.toast(data.message);
		},"json");
		
	});
	var ispost=false;
	$(document).on("click","#reg-submit",function(){
		if(ispost==true) return false;
		ispost=true;
		setTimeout(function(){
			ispost=false;
		},1000);
		$.post("/index.php?m=register&a=regPhone&ajax=1",$("#reg-form").serialize(),function(data){
			if(data.error){
				mui.toast(data.message);
			}else{
				mui.toast("注册成功");
				setTimeout(function(){
					window.location="/index.php";
				},700);
			}
		},"json");
	});
});
</script>
</body>
</html>
