<div class="header">
	 
    <div class="navbar">
    	
    	<div class="tabs-border index">
        	<div class="box960">
        	<div class="logo"><img src="<?php echo $this->_var['site']['logo']; ?>" style="height:40px;"></div>
          
            <?php $nv=M("navbar")->navlist(3);?>
           
            <?php if($nv):?>
            <?php foreach($nv as $c):?>
            <a class="item " href="<?=R($c['link_url']);?>"><?=$c['title']?></a>
            <?php endforeach?>
            <?php endif;?>
            
            <?php if($ssuser):?>
            
            <a class="item" href="<?=R('/index.php?m=login&a=logout'); ?>"> [<?php echo $this->_var['ssuser']['nickname']; ?>,注销]</a>
            <?php else:?>
            	<a class="item" href="<?=R('/index.php?m=login');?>">登录</a>
                <a class="item" href="<?=R('/index.php?m=register')?>">注册</a>
            <?php endif;?> 
        </div>
    </div>
    </div>
</div>