<?php if ($this->_var['imgsdata']): ?>
  <link href="/plugin/flexslider/flexslider.css" rel="stylesheet">
<section class="slider" >
        <div class="flexslider ">
          <ul class="slides">
       
               <?php $_from = $this->_var['imgsdata']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');$this->_foreach['t1'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['t1']['total'] > 0):
    foreach ($_from AS $this->_var['c']):
        $this->_foreach['t1']['iteration']++;
?>
              <li><a   ><img src="<?php echo IMAGES_SITE($this->_var['c']['imgurl']); ?>" alt="<?php echo $this->_var['c']['title']; ?>" /></a></li>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </ul>
        </div>
      </section>
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
<?php endif; ?> 