<div class="tabs-border">
	<a href="<?php echo $this->_var['appadmin']; ?>?m=weixin" class="item <?php if (get ( 'm' ) == 'weixin' && get ( 'a' ) == 'default'): ?> active <?php endif; ?>">微信管理</a>
    
    <a href="<?php echo $this->_var['appadmin']; ?>?m=weixin&a=add" class="item <?php if (get ( 'm' ) == 'weixin' && get ( 'a' ) == 'add'): ?> active <?php endif; ?>">微信添加</a>
    
    <a href="<?php echo $this->_var['appadmin']; ?>?m=weixin_command" class="item <?php if (get ( 'm' ) == 'weixin_command' && get ( 'a' ) == 'default'): ?> active <?php endif; ?>">微信命令管理</a>
    
    <a href="<?php echo $this->_var['appadmin']; ?>?m=weixin_command&a=add" class="item <?php if (get ( 'm' ) == 'weixin_command' && get ( 'a' ) == 'add'): ?> active <?php endif; ?>">微信命令添加</a>
    
    <a href="<?php echo $this->_var['appadmin']; ?>?m=weixin_user" class="item <?php if (get ( 'm' ) == 'weixin_user'): ?> active <?php endif; ?>">微信用户</a>
    
    <a href="<?php echo $this->_var['appadmin']; ?>?m=weixin_reply" class="item <?php if (get ( 'm' ) == 'weixin_reply'): ?> active <?php endif; ?>">微信回复</a>
</div>
 