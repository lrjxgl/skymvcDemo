
 <?php $this->assign("c_data",M("category")->children(0,MODEL_ARTICLE_ID)); ?> 
 <div class="cat-list"> 
           <div class="hd" style=""><span>栏目推荐</span></div>
           <?php $_from = $this->_var['c_data']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('k', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['c']):
?>
              <div  class="item <?php if (get ( 'catid' ) == $this->_var['c']['catid']): ?>active<?php endif; ?>"><a href="<?php echo R("/index.php?m=article&a=list&catid=".$this->_var["c"]["catid"]."");?>" ><?php echo $this->_var['c']['cname']; ?></a></div>
                <?php if ($this->_var['c']['child']): ?>
                <div class="cat-list-2nd">
                  <?php $_from = $this->_var['c']['child']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'cc');if (count($_from)):
    foreach ($_from AS $this->_var['cc']):
?>
                  <div  class="item <?php if (get ( 'catid' ) == $this->_var['cc']['catid']): ?>active<?php endif; ?>"><a href="<?php echo R("/index.php?m=article&a=list&catid=".$this->_var["cc"]["catid"]."");?>"><?php echo $this->_var['cc']['cname']; ?></a></div>
                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </div>
                <?php endif; ?> 
                 
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </div>  
 <div style="height:10px;"></div>
<?php $this->assign("t_c",M("article")->recommendList("".$this->_var["cat"]["catid"]."",10)); ?>
<div class="cat-list"> 
           <div class="hd" style=""><span>文章推荐</span></div>
  <?php $_from = $this->_var['t_c']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
  <div class="item"><a href="/index.php?m=show&id=<?php echo $this->_var['c']['id']; ?>"><?php echo $this->cutstr($this->_var['c']['title'],36,'..'); ?></a></div>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
