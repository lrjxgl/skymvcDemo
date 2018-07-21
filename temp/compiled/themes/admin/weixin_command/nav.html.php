<div class="tabs-border">
	<a href="<?php echo $this->_var['appadmin']; ?>?m=weixin_command&wid=<?php echo $this->_var['weixin']['id']; ?>" class="item <?php if (get ( 'a' ) == 'default'): ?>active<?php endif; ?>">命令管理</a>
    <a href="<?php echo $this->_var['appadmin']; ?>?m=weixin_command&a=add&wid=<?php echo $this->_var['weixin']['id']; ?>" class="item <?php if (get ( 'a' ) == 'default'): ?>add<?php endif; ?>">命令添加</a>
</div>
 