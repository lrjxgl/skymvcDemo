<?php if ($this->_var['imgsdata']): ?>
   <div class="layui-carousel carousel"   style="margin-top: 10px;">
         	<div carousel-item>
           <?php $_from = $this->_var['imgsdata']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');$this->_foreach['t1'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['t1']['total'] > 0):
    foreach ($_from AS $this->_var['c']):
        $this->_foreach['t1']['iteration']++;
?>
        <a href="<?php echo $this->_var['c']['link1']; ?>"  ><img src="<?php echo IMAGES_SITE($this->_var['c']['imgurl']); ?>" style="width: 100%;" alt="<?php echo $this->_var['c']['title']; ?>" /></a>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
         </div>
        </div>
 
<?php endif; ?> 