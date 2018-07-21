<!DOCTYPE html>
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
<?php echo $this->fetch('header.html'); ?>
<div class="main-body">
<div class="box960">
<div class="row">
<div class="col-12-2"> 
<?php echo $this->fetch('html/sidebar.html'); ?>
</div>
<div class="col-12-10">
<div class="w98 right">
<?php $this->assign("data",M("html")->getWord("关于我们")); ?>
<div class="daohang">
<div class="l"><?php echo $this->_var['data']['title']; ?></div>
<div class="r">首页 &gt; 关于我们</div>
<div class="clearfix"></div>
</div>

<h1 style="padding:20px 0px; text-align:center;"><?php echo $this->_var['data']['title']; ?></h1>
 
<div class="d-content"><?php echo $this->_var['data']['content']; ?></div>
</div>
</div>
</div>
</div>
</div>
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>