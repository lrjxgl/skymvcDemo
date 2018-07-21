<!DOCTYPE >
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
 <?php echo $this->fetch('header.html'); ?>
  <div class="layui-main">
    
      	 <?php echo $this->fetch('inc/show_breadcrumb.html'); ?>
    <div class="layui-row">     
         <div class="layui-col-md3">
         	<?php echo $this->fetch('article/sidebar.html'); ?>
         </div>
         
         <div class="layui-col-md9">
         	<div class="w98 right bgf pd-5">
            	<h3 class="d-title"><?php echo $this->_var['data']['title']; ?></h3>
                <div  class="d-tool">发布时间：<?php echo date("Y-m-d",$this->_var['data']['dateline']); ?> 
                
                <?php if ($this->_var['data']['userid']): ?>作者：<a href="<?php echo R("/index.php?m=member&userid=".$this->_var["data"]["userid"]."");?>" ajax-href="<?php echo R("/index.php?m=member&a=userinfo&userid=".$this->_var["data"]["author"]["userid"]."");?>" class="user_card"><?php echo $this->_var['data']['author']['nickname']; ?></a>
    <?php endif; ?>
    
    查看(<?php echo $this->_var['data']['view_num']; ?>)
    	
                </div>
                 
                  <div class="d-content"><?php echo $this->_var['data']['content']; ?></div>
                 <div class="show-more">
                 <?php if ($this->_var['last_rs']): ?><div class="nextrs">上一篇：<a href="<?php echo R("/index.php?m=article&a=show&id=".$this->_var["last_rs"]["id"]."");?>"><?php echo $this->_var['last_rs']['title']; ?></a></div><?php endif; ?>
<?php if ($this->_var['next_rs']): ?><div class="nextrs">下一篇：<a href="<?php echo R("/index.php?m=article&a=show&id=".$this->_var["next_rs"]["id"]."");?>"><?php echo $this->_var['next_rs']['title']; ?></a></div><?php endif; ?>
</div>
                 
            </div>
         </div>
         
         
      
    </div>
  </div>
  <script>
  addClick("/index.php?m=article&a=addclick&id=<?php echo $this->_var['data']['id']; ?>");
  
  </script>
  <?php echo $this->fetch('footer.html'); ?> </div>
</body>
</html>