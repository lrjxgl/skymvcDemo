<!DOCTYPE html >
<html>
<?php echo $this->fetch('head.html'); ?>

<body id="menu-body">
 
 
 
<?php if ($this->_var['weixin']): ?> 
<div class="mtitle"><?php echo $this->_var['weixin']['title']; ?></div>
<?php else: ?>
<div class="mtitle">微信管理</div>
<?php endif; ?>
<div class="menu"  style="display:block" >
<ul>
<?php if (! $this->_var['weixin']): ?> 
<li><a href="<?php echo $this->_var['appadmin']; ?>?m=weixin"  target="main-frame">微信管理</a></li>
<?php endif; ?>
<li><a href="<?php echo $this->_var['appadmin']; ?>?m=weixin_command&wid=<?php echo $this->_var['weixin']['id']; ?>"  target="main-frame">微信命令</a></li>
<li><a href="<?php echo $this->_var['appadmin']; ?>?m=weixin_sucai&wid=<?php echo $this->_var['weixin']['id']; ?>"  target="main-frame">微信素材</a></li>
<li><a href="<?php echo $this->_var['appadmin']; ?>?m=weixin_menu&wid=<?php echo $this->_var['weixin']['id']; ?>"  target="main-frame">微信菜单</a></li>
<li><a href="<?php echo $this->_var['appadmin']; ?>?m=weixin_reply&wid=<?php echo $this->_var['weixin']['id']; ?>"  target="main-frame">微信消息</a></li>
<li><a href="<?php echo $this->_var['appadmin']; ?>?m=weixin_user&wid=<?php echo $this->_var['weixin']['id']; ?>"  target="main-frame">微信用户</a></li>
 
 
</ul>
</div>
 

<div class="ztitle">版权声明</div>
<div class="zbox" style="">
<a href="<?php echo $this->_var['appadmin']; ?>?m=ifram&a=main"></a>
版权归<a href="http://www.deitui.com" target="_blank">得推网络</a>所有<br>
</div>

<script language="javascript">
$(document).ready(function()
{
	$(".mtitle").click(function()
	{
		if($(this).next(".menu").css("display")=="block")
		{
			$(".menu").css("display","none")
		 
		}else
		{
			$(".menu").css("display","none")
			$(this).next(".menu").css({display:"block"});
		}
	});
	parent['main-frame'].location.href=$("a:eq(0)").attr("href");
	$("ul li a:eq(0)").addClass('on'); 
	$('ul li a').click(function(){
		$('ul li a').removeClass('on');
		$(this).addClass('on');
	});
});
</script>
</body>
</html>