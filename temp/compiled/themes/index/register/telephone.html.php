<!doctype html>
<html>
<?php echo $this->fetch('head.html'); ?>

<body>
 	<?php echo $this->fetch('header.html'); ?>
	 
	<div class="loginbox">
    	<form method="post" id="reg-form" action="/index.php?m=login&a=save">
        <div class="hd">注册</div>
    	<table class="tb">
       
        <tr>
        	<td width="60" align="right">用户名</td>
            <td> <input class="t" type="text" name="username"></td>
        </tr>
        
        <tr>
        	<td width="60" align="right">昵称</td>
            <td> <input class="t" type="text" name="nickname"></td>
        </tr>
         <tr>
        	<td width="60" align="right">手机</td>
            <td> <input class="t" type="text" name="telephone"></td>
        </tr>
        
        <tr>
        	<td width="60" align="right">密码</td>
            <td> <input class="t" type="password" name="password"></td>
        </tr>
         <tr>
        	<td width="60" align="right">重复密码</td>
            <td> <input class="t" type="password" name="password2"></td>
        </tr>
        <tr>
        	<td></td>
            <td   style="height:60px;" align="center">
            <a id="reg-submit" class="btn">注册</a>
            <a href="/index.php?m=login" class="btn btn-link">有账号,去登录</a>
            </td>
        </tr>
        </table>
       </div> 
        
        </form>
    </div>
 <?php echo $this->fetch('footer.html'); ?>     
    <script type="text/javascript" class="jsa-text">
$(function(){
	var ispost=false;
	$("#reg-submit").on("click",function(){
		if(ispost==true) return false;
		ispost=true;
		setTimeout(function(){
			ispost=false;
		},1000);
		$.post("/index.php?m=register&a=regSave&ajax=1",$("#reg-form").serialize(),function(data){
			if(data.error==1){
				skyToast(data.message);
			}else{
				skyToast("注册成功");
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
