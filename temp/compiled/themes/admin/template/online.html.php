<!DOCTYPE >
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
<div class="tabs-border">
	<a class="item" href="<?php echo APPADMIN; ?>?m=template">本地模板</a>
    <a  class="item active" href="<?php echo APPADMIN; ?>?m=template&a=online">在线模板</a>
</div>
<iframe src="http://www.deitui.com/index.php?m=moban&product=skyCom" style="width:100%; height:600px; border:0px;"></iframe>
 
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>