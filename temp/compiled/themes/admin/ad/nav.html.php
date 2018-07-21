<div class="tabs-border">
<a href="<?php echo $this->_var['appadmin']; ?>?m=ad&tag_id=<?php echo get_post('tag_id');?>"  class="<?php if (get ( 'm' ) == 'ad' && get ( 'a' ) == 'default'): ?>active<?php endif; ?> item">广告管理</a>

<a class="item <?php if (get ( 'm' ) == 'ad' && get ( 'a' ) == 'add'): ?>active<?php endif; ?>" href="<?php echo $this->_var['appadmin']; ?>?m=ad&a=add&tag_id=<?php echo get_post('tag_id');?>">广告添加</a>
<a class="item <?php if (get ( 'm' ) == 'ad_tags' && get ( 'a' ) == 'default'): ?>active<?php endif; ?>" href="<?php echo $this->_var['appadmin']; ?>?m=ad_tags">广告分类管理</a>
<a class="item <?php if (get ( 'm' ) == 'ad_tags' && get ( 'a' ) == 'ad'): ?>active<?php endif; ?>" href="<?php echo $this->_var['appadmin']; ?>?m=ad_tags&a=add">广告分类添加</a>


</div>