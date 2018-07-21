<!DOCTYPE html>
<html>
<?php echo $this->fetch('head.html'); ?>
<script language="javascript">
function movenew()
{
	document.location='<?php echo $this->_var['url']; ?>';
}
setTimeout(movenew,600);

</script>
<body>
	<header class="mui-bar mui-bar-nav">
	    <a href="/shop.php" class="goBack mui-icon mui-icon-left-nav mui-pull-left"></a>
	    <h1 class="mui-title">跳转中</h1>
	</header>
 	<div class="mui-content">
 	    <div id="content"><div style="border:5px solid #ccc; border-radius:5px; padding:10px; position:absolute; top:50px; left:0px; right:0px;"><?php echo $this->_var['message']; ?>，如果没有自动跳转请点击 <a href="<?php echo $this->_var['url']; ?>">跳转</a></div></div>
 	</div>
    
    <?php echo $this->fetch('footer.html'); ?>
</div>
</body>
</html>