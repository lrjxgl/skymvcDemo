<!DOCTYPE html>
<html>
	<?php echo $this->fetch('head.html'); ?>
	<style>
	body,.mui-content{
		background-color: #fff;
	}
	video{
		width: 100%;
		margin-bottom: 10px;
	}
	
	
</style>
	<body>
		<header class="mui-bar mui-bar-nav">
		    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
		    <h1 class="mui-title">文章详情</h1>
		</header>
		<div class="mui-content">
			<div class="mui-content-padded">
		    <div class="pdetail-title"><?php echo $this->_var['data']['title']; ?></div>
	<div class="pdetail-tools">
		<span class="author">来源：<?php echo $this->_var['data']['author']; ?> </span>
		<span class="time"><?php echo date("Y-m-d",$this->_var['data']['dateline']); ?></span>
		<span class="view-num"><?php echo $this->_var['data']['view_num']; ?>人已阅</span>
		 
	</div>
	<?php if ($this->_var['data']['videourl']): ?>
	<video id="zbvideo" src="<?php echo $this->_var['data']['videourl']; ?>"  width="325" height="182.5"   controls   poster="http://img.deitui.com/?w=325&h=182.5&text=即将播放"   webkit-playsinline="true" ></video> 
    <?php endif; ?>
    <div class="pdetail-content" style="display:block"><?php echo $this->_var['data']['content']; ?></div>
    
     <div class="fav-btn <?php if (isfav): ?>active<?php endif; ?> js-fav" tablename="article" oid="<?php echo $this->_var['data']['id']; ?>"> <i class="iconfont icon-fav"></i> <span class="num"><?php echo $this->_var['data']['fav_num']; ?></span>人喜欢</div>
		</div>
		</div>
	</body>
</html>
