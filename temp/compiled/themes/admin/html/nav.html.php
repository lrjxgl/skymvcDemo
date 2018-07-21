<div class="tabs-border">
	<a href="<?php echo $this->_var['appadmin']; ?>?m=html" class="item <?php if (get ( 'a' ) == '' || get ( 'a' ) == 'default'): ?>active<?php endif; ?>">数据调用管理</a>
    <a href="<?php echo $this->_var['appadmin']; ?>?m=html&a=add" class="item <?php if (get ( 'a' ) == 'add'): ?> active<?php endif; ?>">数据调用添加</a>
</div>