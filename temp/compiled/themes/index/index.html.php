<!DOCTYPE >
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
 
<?php echo $this->fetch('header.html'); ?>
<link href="/plugin/flexslider/flexslider.css" rel="stylesheet">
<div class="main-body">
	<div class="box960">
    	<div class="row">
        	 
            	 <section class="slider" style="width:100%;">
        <div class="flexslider ">
          <ul class="slides">
          <?php $this->assign("t_c",M("ad")->listbyno("index_flash",4)); ?>
         
               <?php $_from = $this->_var['t_c']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('k', 'c');$this->_foreach['t1'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['t1']['total'] > 0):
    foreach ($_from AS $this->_var['k'] => $this->_var['c']):
        $this->_foreach['t1']['iteration']++;
?>
              <li><a href="<?php echo $this->_var['c']['link1']; ?>"  ><img src="<?php echo IMAGES_SITE($this->_var['c']['imgurl']); ?>" alt="<?php echo $this->_var['c']['title']; ?>" /></a></li>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </ul>
        </div>
        <?php $this->assign('col','imgurl'); ?>
         <?php echo $this->_var['t_c'][$this->_var['k']][$this->_var['col']]; ?>
      </section>

        </div>
    </div>

</div>

 <?php echo $this->fetch('footer.html'); ?>

<script src="/plugin/flexslider/jquery.flexslider-min.js"></script>
 <script>
 $('.flexslider').flexslider({
        animation: "slide",
        animationLoop: false,
        itemWidth: "100%",
        itemMargin: 5,
        pausePlay: true,
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
 
 </script>


</body>

</html>