<!DOCTYPE html>
<html>
<?php echo $this->fetch('head.html'); ?>

<body>
<div class="page ">
 
<div class="header" style="display:block; height:50px;">
<div  class="left-btn goback"><span class="iconfont icon-back"></span></div>
<div class="title"><?php echo $this->_var['data']['title']; ?></div>
 
</div>
<div class="main-body proShow">
<style>
	.proShow .title{line-height:30px; font-size:1.4em;}
	.proShow .row-price{margin-bottom:10px; border-bottom:1px solid #eee;  font-size:14px; line-height:30px;}
	.proShow .row-price p{line-height:30px;}
	.proShow .row-price .price{color:#f90; font-size:1.2em; margin-right:10px;}
	.proShow .row-price .market_price{text-decoration:line-through; font-size:0.8em;}
	.proShow .kslist{border-bottom:1px solid #eee; padding-bottom:10px;}
	.proShow .row-comment{display:block; color:#333;border-bottom:1px solid #eee; height:40px; line-height:40px; position:relative;}
	.proShow .you{position:absolute; right:5px; top:50%; margin-top:-16px;}
	.fcart{padding:10px 0px;    position:fixed; bottom:0px; background-color:#fafafa; border-top:1px solid #eee; left:0px; right:0px;}
	.fcart .flink .iconfont{font-size: 2em; color: #83c44e; margin-left:5px;}
	 
	.fcart .fbtn{}
</style>

<?php $this->assign("imgsdata",M("imgs")->get("article","".$this->_var["data"]["id"]."")); ?>
<?php if ($this->_var['imgsdata']): ?>
<?php echo $this->fetch('imgs/inc_common.html'); ?>
<?php else: ?>
  
 <div><a href="<?php echo images_site($this->_var['data']['imgurl']); ?>" target="_blank"><img src="<?php echo images_site($this->_var['data']['imgurl']); ?>.middle.jpg" width="100%"></a></div>
<?php endif; ?>
<div class="row-box">
<div class="title"><?php echo $this->_var['data']['title']; ?></div>
<div class="row row-price">
	<div class="col-2-1"><span id="goods_price" class="price">￥<?php echo $this->_var['data']['price']; ?></span><span class="market_price">￥<?php echo $this->_var['data']['market_price']; ?></span></div>
</div>
 </div>
 <div class="d-content" style="background-color:#fff;"><?php echo $this->_var['data']['content']; ?></div>
 </div>
 
 
 
   
  </div>
 
</body>
</html>
