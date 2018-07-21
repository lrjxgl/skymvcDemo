<!doctype html>
<html>
<?php echo $this->fetch('head.html'); ?>
 
 
<body>
<div class="page">
<?php echo $this->fetch('header.html'); ?>
<div class="main-body">
  <div class="box960"> <?php echo $this->fetch('inc/show_breadcrumb.html'); ?>
    <div class="row">
      
      
       
          <div class="row">
          		<div class="col-12-7">
                	<?php $this->assign("imgsdata",M("imgs")->get("article","".$this->_var["data"]["id"]."")); ?>
<?php if ($this->_var['imgsdata']): ?>
<?php echo $this->fetch('imgs/inc_common.html'); ?>
<?php else: ?>
  
 <div><a href="<?php echo images_site($this->_var['data']['imgurl']); ?>" target="_blank"><img src="<?php echo images_site($this->_var['data']['imgurl']); ?>.middle.jpg" width="100%"></a></div>
<?php endif; ?>	                	 
                
                </div>
                <div class="col-12-5">
                	<div style="width:90%; float:right;">
                    	
                		<h3 class="hd"><?php echo $this->_var['data']['title']; ?></h3>
                        <div style="color:#aaa; padding:10px;"><?php echo $this->_var['data']['description']; ?></div>
                        <ul class="nav-list">   
                            <li><tt>价格：</tt><em><?php echo $this->_var['data']['price']; ?></em></li> 
                            <li><tt style="color:#aaa;">市场价：<i style="text-decoration:line-through; color:#ccc">￥<?php echo $this->_var['data']['market_price']; ?></i></tt></li>   
                            <li><tt style="color:#aaa;">库存：<i ><?php echo $this->_var['data']['total_num']; ?></i></tt></li>
                            <li><tt style="color:#aaa;">销量：<i ><?php echo $this->_var['data']['sold_num']; ?></i></tt></li>
                        </ul>
                          
                        
                        
                       
                        
                         
                    </div>
                </div>
          </div>
          
          <div style="width:100%; height:30px;"></div>
          <div class="d-content"><?php echo $this->_var['data']['content']; ?></div>
  </div>
  </div>
  </div>
 
  <?php echo $this->fetch('footer.html'); ?> </div>
</body>
</html>
