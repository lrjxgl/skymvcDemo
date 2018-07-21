<!doctype html>
<html>
<?php echo $this->fetch('head.html'); ?>
 
 
<body>
 
<?php echo $this->fetch('header.html'); ?>
<div class="layui-main">
	<?php echo $this->fetch('inc/show_breadcrumb.html'); ?>
 
    <div class="layui-row">
      
      
       
           
          		<div class="layui-col-md7">
                	<?php $this->assign("imgsdata",M("imgs")->get("article","".$this->_var["data"]["id"]."")); ?>
<?php if ($this->_var['imgsdata']): ?>
<?php echo $this->fetch('imgs/inc_common.html'); ?>
<?php else: ?>
  
 <div><a href="<?php echo images_site($this->_var['data']['imgurl']); ?>" target="_blank"><img src="<?php echo images_site($this->_var['data']['imgurl']); ?>.middle.jpg" width="100%"></a></div>
<?php endif; ?>	                	 
                
                </div>
                <div class="layui-col-md5">
                	<div style="width:90%; float:right;">
                    	
                		<h3 class="hd"><?php echo $this->_var['data']['title']; ?></h3>
                        <div style="color:#aaa; padding:10px;"><?php echo $this->_var['data']['description']; ?></div>
                        <ul class="pl">   
                            <li class="price"><tt >价格：</tt><em>￥<?php echo $this->_var['data']['price']; ?></em></li> 
                            <li class="market-price"><tt >市场价：<i >￥<?php echo $this->_var['data']['market_price']; ?></i></tt></li>   
                            <li><tt >库存：<i ><?php echo $this->_var['data']['total_num']; ?></i></tt></li>
                            <li><tt>销量：<i ><?php echo $this->_var['data']['sold_num']; ?></i></tt></li>
                        </ul>
                          
                        <style>
                        	.pl li{
                        		line-height: 40px;
                        		color: #333;
                        	}
                        	.pl li tt{
                        		color: #444;
                        	}
                        	.pl i{
                        		color: #666;
                        		font-size: 16px;
                        	}
                        	.pl .price tt{
                        		color: #444;
                        	}
                        	.pl .price em{
                        		color: #f60;
                        		font-size: 18px;
                        	}
                        	.pl .market-price  i{
                        		text-decoration:line-through; color:#ccc
                        	}
                        </style>
                        
                       
                        
                         
                    </div>
                </div>
          </div>
          
          <div style="width:100%; height:30px;"></div>
          <div class="d-content"><?php echo $this->_var['data']['content']; ?></div>
  </div>
  </div>
  </div>
 
  <?php echo $this->fetch('footer.html'); ?> 
    <script>
 	$(function(){
 		 layui.carousel.render({
			 		elem:".carousel",
			 		width:"100%",
			 		height:"400px" 
			 });
 	})
			
		</script>
</body>
</html>
