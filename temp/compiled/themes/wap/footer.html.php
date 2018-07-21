<div style="height:50px;"></div>
 
<div class="mfooter i4">
	<a href="/index.php" class="item <?php if ($this->_var['mfooter'] == 'index'): ?>active<?php endif; ?>" id="mfooter-index">
		<i class="iconfont icon-home"></i><br> 首页
	</a>
	<a href="/index.php?m=article&type=article&a=list" class="item <?php if ($this->_var['mfooter'] == 'article'): ?>active<?php endif; ?>" id="mfooter-news">
		<i class="iconfont icon-news"></i><br> 要闻
	</a>
	 
	<a href="/index.php?m=article&type=video&a=list" class="item <?php if ($this->_var['mfooter'] == 'video'): ?>active<?php endif; ?>" id="mfooter-video">
		 
		<i class="iconfont icon-video"></i><br> 视频
	</a>
	<a href="/index.php?m=user" class="item <?php if ($this->_var['mfooter'] == 'user'): ?>active<?php endif; ?>" id="mfooter-user">
		<i class="iconfont icon-people"></i><br> 我
	</a>
</div>
 