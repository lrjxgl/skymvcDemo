<!doctype html>
<html>
<?php echo $this->fetch('head.html'); ?>

<body>
 	<?php echo $this->fetch('header.html'); ?>
	<div class="loginbox">
    	<form method="post" id="login-form" action="/index.php?m=login&a=save">
        <input type="hidden" name="backurl" value="<?php echo $this->_var['backurl']; ?>">
        <div class="hd">登录</div>
    	<table class="tb">
       
        <tr>
        	<td width="60" align="right">用户名</td>
            <td> <input class="t" type="text" name="username"></td>
        </tr>
        <tr>
        	<td width="60" align="right">密码</td>
            <td> <input class="t" type="text" name="password"></td>
        </tr>
        <tr>
        	<td></td>
            <td style="height:60px; text-align:center;">
            <a class="btn" id="login-submit">登录</a>
            <a href="/index.php?m=register" class="btn btn-link">无账号，去注册</a>
            </td>
        </tr>
        </table>
       </div> 
        
        </form>
    </div>
  <?php echo $this->fetch('footer.html'); ?>  
 <script type="text/javascript" class="jsa-text">
$(function(){
	$(document).on("click","#login-submit",function(){		
		$.post("/index.php?m=login&a=loginSave&ajax=1",$("#login-form").serialize(),function(data){
			if(data.error==1){
				skyToast(data.message);
			}else{
				skyToast("登陆成功");
				setTimeout(function(){
					window.location='/index.php';
				},700);
			}
		},"json");
	});
});
</script>   
</body>
</html>
