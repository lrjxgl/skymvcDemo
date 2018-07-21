<div class="header">
			<div class="layui-main">
				
			<ul class="layui-nav">
			<li class="logo"><img src="<?php echo images_site($this->_var['site']['logo']); ?>" style="height:40px;"></li>	
            <?php $this->assign("nv",M("navbar")->navlist(3)); ?>
            <?php $_from = $this->_var['nv']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
            <li class="layui-nav-item  <?php if (get ( 'm' ) == $this->_var['c']['m'] && get ( 'a' ) == $this->_var['c']['a']): ?><?php if ($this->_var['c']['aclabel']): ?><?php if (get ( $this->_var['c']['aclabel'] ) == $this->_var['c']['acvalue']): ?>layui-this<?php endif; ?><?php else: ?>layui-this<?php endif; ?><?php endif; ?>"><a href="<?php echo R("".$this->_var["c"]["link_url"]."");?>"><?php echo $this->_var['c']['title']; ?></a></li>
 
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			
			<div style="float: right;">
					 
			<?php if ($this->_var['ssuser']): ?>
            
            
	            <li class="layui-nav-item">
					    <a href="<?php echo R("/index.php?m=user");?>"><img onerror="imgError(this,100,100)" src="<?php echo images_site($this->_var['ssuser']['user_head']); ?>.100x100.jpg" class="layui-nav-img"><?php echo $this->_var['ssuser']['nickname']; ?></a>
					    <dl class="layui-nav-child">
					      <dd><a href="<?php echo R("/index.php?m=user&a=info");?>">修改信息</a></dd>
					      <dd><a href="<?php echo R("/index.php?m=guest&a=my");?>">我的留言</a></dd>
					      <dd><a href="<?php echo R("/index.php?m=login&a=logout");?>">退了</a></dd>
					    </dl>
					  </li>
	        <?php else: ?>
	            	<li class="layui-nav-item">
					    <a href="<?php echo R("/index.php?m=login");?>">登录</a>
					  </li>
					  <li class="layui-nav-item">
					    <a href="<?php echo R("/index.php?m=register");?>">注册</a>
					  </li>
	        <?php endif; ?> 
				  
			  </div>
			</ul>
			</div>
		</div>