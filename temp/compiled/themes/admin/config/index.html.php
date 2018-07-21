<!doctype html>
<html>
<?php echo $this->fetch('head.html'); ?>

<body>
<div class="tabs-border">
	<a class="item active" href="<?php echo $this->_var['appadmin']; ?>?m=config">网站配置</a>
</div>
<form method="post"  action="<?php echo $this->_var['appadmin']; ?>?m=config&a=save">
	<table class="table">
    	<tr>
        	<td class="w90">留言登录</td>
            <td>
            	<input type="radio" name="guestlogin" <?php if ($this->_var['data']['guestlogin'] == 1): ?> checked<?php endif; ?> value="1">是 &nbsp; <input type="radio" name="guestlogin" <?php if ($this->_var['data']['guestlogin'] != 1): ?> checked<?php endif; ?> value="2"> 否
            </td>
        </tr>
        
        <tr>
        	<td class="w90">验证码</td>
            <td>
            	<input type="radio" name="guestcheckcode" <?php if ($this->_var['data']['guestcheckcode'] == 1): ?> checked<?php endif; ?> value="1">开启 &nbsp; <input type="radio" name="guestcheckcode" <?php if ($this->_var['data']['guestcheckcode'] != 1): ?> checked<?php endif; ?> value="2"> 关闭
            </td>
        </tr>
        
        <tr>
        	<td></td>
            <td>
            	<button class="btn ">保存配置</button>
            </td>
        </tr>
    </table>

</form>
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>
