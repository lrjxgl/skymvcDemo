<div class="header">
	
    <div class="navbar">
    	
    	<div class="tabs-border index">
        	<div class="box960">
        	<div class="logo"><img src="<?php echo images_site($this->_var['site']['logo']); ?>" style="height:40px;"></div>
            <?php $this->assign("nv",M("navbar")->navlist(3)); ?>
            <?php $_from = $this->_var['nv']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
            <a class="item <?php if (get ( 'm' ) == $this->_var['c']['m'] && get ( 'a' ) == $this->_var['c']['a']): ?><?php if ($this->_var['c']['aclabel']): ?><?php if (get ( $this->_var['c']['aclabel'] ) == $this->_var['c']['acvalue']): ?>active<?php endif; ?><?php else: ?>active<?php endif; ?><?php endif; ?>" href="<?php echo R("".$this->_var["c"]["link_url"]."");?>"><?php echo $this->_var['c']['title']; ?></a>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            
            
            <?php if ($this->_var['ssuser']): ?>
            
            <a class="item" href="<?php echo R("/index.php?m=login&a=logout");?>"> [<?php echo $this->_var['ssuser']['nickname']; ?>,注销]</a>
            <?php else: ?>
            	<a class="item" href="<?php echo R("/index.php?m=login");?>">登录</a>
                <a class="item" href="<?php echo R("/index.php?m=register");?>">注册</a>
            <?php endif; ?> 
        </div>
    </div>
    </div>
</div>