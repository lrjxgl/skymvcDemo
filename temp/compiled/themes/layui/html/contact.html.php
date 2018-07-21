<!DOCTYPE html>
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
<?php echo $this->fetch('header.html'); ?>
<?php $this->assign("data",M("html")->getWord("联系我们")); ?>
<div class="layui-main">
 <div class="layui-breadcrumb">
 	<a href="/index.php">首页</a>
 	<a><cite><?php echo $this->_var['data']['title']; ?></cite></a>
 </div>	
<div class="layui-row">
<div class="layui-col-md2"> 
<?php echo $this->fetch('html/sidebar.html'); ?>
</div>
<div class="layui-col-md10">
 

 

<h1 style="padding:20px 0px; text-align:center;"><?php echo $this->_var['data']['title']; ?></h1>
 
<div class="d-content"><?php echo $this->_var['data']['content']; ?></div>
 
</div>
</div>
</div>
</div>
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>