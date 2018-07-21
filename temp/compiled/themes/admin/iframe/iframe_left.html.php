<!DOCTYPE >
<html>
<?php echo $this->fetch('head.html'); ?>

<body id="menu-body">
<?php if (! $this->_var['data']): ?>
<div class="mtitle"><a href="<?php echo $this->_var['appadmin']; ?>?m=iframe&a=main" target="main-frame"><?php echo $this->_var['lang']['admin_main']; ?></a></div>
<?php endif; ?>
<?php $_from = $this->_var['data']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
<div class="mtitle"><?php echo $this->_var['c']['title']; ?></div>
<div class="menu" <?php if ($_GET['id'] == $this->_var['c']['id']): ?> style="display:block"<?php endif; ?>>
<ul>
<?php $_from = $this->_var['c']['child']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'cc');if (count($_from)):
    foreach ($_from AS $this->_var['cc']):
?>
<li><a href="<?php echo $this->_var['appadmin']; ?><?php echo $this->_var['cc']['link_url']; ?>"  target="main-frame"><?php echo $this->_var['cc']['title']; ?></a></li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
</div>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<div class="mtitle"><a href="<?php echo $this->_var['appadmin']; ?>?m=ifram&a=main"></a></div>
<div >
<div class="ztitle">版权声明</div>
<div class="zbox" style="">

版权归<a href="http://www.deitui.com" target="_blank">得推网络</a>所有<br>
</div>
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
	if($("a:eq(0)").attr("href")!='/admin.php?m=iframe&a=main'){
		parent['main-frame'].location.href=$("a:eq(0)").attr("href");
	}
	$("ul li a:eq(0)").addClass('on'); 
	$('ul li a').click(function(){
		$('ul li a').removeClass('on');
		$(this).addClass('on');
	});
});
</script>
</body>
</html>