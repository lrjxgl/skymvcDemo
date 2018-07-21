<!DOCTYPE >
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
<div id="playmsg" ></div>
<div class="top">
<div class="logo"><img src="<?php echo $this->_var['skins']; ?>images/logo.png"   /></div>

<div class="topnav" id="topnav">
<?php if ($this->_var['data']): ?>
<?php $_from = $this->_var['data']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('k', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['c']):
?>
<a href="<?php echo $this->_var['c']['link_url']; ?>" class="<?php if ($this->_var['k'] == 0): ?>on<?php endif; ?>" target="menu-frame"><?php echo $this->_var['c']['title']; ?></a>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<?php endif; ?>
</div>


<div class="header">
<?php if (ADMINGID > 2): ?>
<?php echo $this->_var['site']['sitename']; ?>
<?php else: ?>
<a href="<?php echo $this->_var['appadmin']; ?>?m=sites" target="main-frame">网站管理</a>
<?php endif; ?>

<?php echo $this->_var['ssadmin']['username']; ?> 
<a href="<?php echo $this->_var['appadmin']; ?>?m=login&a=logout" target="_parent">退出管理</a>
 
<a href="<?php echo $this->_var['appadmin']; ?>?m=iframe&a=main" target="main-frame">管理首页</a>
<a href="/index.php" target="_blank">网站首页</a> 


</div>


</div>
<script language="javascript">
$(document).ready(function()
{
	$("#topnav a:nth-child(1)").addClass('on'); 
	$('#topnav a').click(function(){
		$('#topnav a').removeClass('on');
		$(this).addClass('on');
	});
	
	$("#refresh_permission").click(function(){
		 $.get($(this).attr("url"),function(data){
			alert('刷新成功'); 
		})
	})
 
});


 
</script>

</body>
</html>