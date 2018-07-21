<!DOCTYPE >
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
<link href="/plugin/skyweb/prolist.css" rel="stylesheet">
<div class="page"> <?php echo $this->fetch('header.html'); ?>
  <div class="main-body">
    <div class="  box960">
      	 <?php echo $this->fetch('inc/list_breadcrumb.html'); ?>
          
         <div class="search-filter-box">
<input type="hidden" id="filter_catid" value="<?php echo $_GET['catid']; ?>">
<input type="hidden" id="filter_order" value="<?php if ($_GET['orderby']): ?><?php echo $_GET['orderby']; ?><?php else: ?>all<?php endif; ?>">

 
  <script>
    $(function(){
		var catid=$("#filter_catid").val();
		var orderby=$("#filter_order").val();
	 
		var url;
		$(".search-option").bind("click",function(e){
			e.preventDefault();
			$(this).parents(".search-filter").find(".search-option").removeClass("active");
			$(this).addClass("active");
			var v=$(this).attr("v");
			var obj=$(this).parents(".search-filter").attr("o");
			eval(obj+"='"+v+"'");		
			url="/index.php?m=article&a=list&catid="+catid+"&orderby="+orderby+"#select_box";
			window.location.href=url; 
		});

	})
</script>
    <div class="search-filter" o="catid">
        <div class="hd">类别</div>
        <div class="search-option-box">
        <div class="pd">
        <div class="search-option <?php if (get ( 'catid' ) == $this->_var['cat_top']['catid']): ?>active<?php endif; ?>" v="<?php echo $this->_var['cat_top']['catid']; ?>">全部</div>
        		<?php $_from = $this->_var['catlist']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
                <div class="search-option <?php if (get ( 'catid' ) == $this->_var['c']['catid']): ?>active<?php endif; ?>" v="<?php echo $this->_var['c']['catid']; ?>"><?php echo $this->_var['c']['cname']; ?></div>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                 
                </div>
        </div>
        
    </div>
    
    
     
    
    <div class="search-filter" o="orderby">
        <div class="hd">排序</div>
        <div class="search-option-box">
        <div class="pd">
                <div class="search-option <?php if (get ( 'orderby' ) == 'all'): ?>active<?php endif; ?>" v="all">综合排序</div>
                <div class="search-option <?php if (get ( 'orderby' ) == 'price'): ?>active<?php endif; ?>" v="price">价格</div>
                <div class="search-option <?php if (get ( 'orderby' ) == 'id'): ?>active<?php endif; ?> " v="id">发布时间</div>
                </div>
        </div>
    </div>
    
</div>

<div class="prolist">
              <?php $_from = $this->_var['list']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('k', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['c']):
?>
              <div class="item btc-<?php echo $this->_var['k']; ?> ">
                <div class="pd">
                  <div class="img"><a href="<?php echo R("/index.php?m=article&a=show&id=".$this->_var["c"]["id"]."");?>"><img src="<?php echo images_site($this->_var['c']['imgurl']); ?>.middle.jpg"></a></div>
                  <div class="title"><a href="<?php echo R("/index.php?m=article&a=show&id=".$this->_var["c"]["id"]."");?>"><?php echo $this->_var['c']['title']; ?></a></div>
                  <div class="desc"><?php echo $this->_var['c']['description']; ?></div>
                  <div class="price">￥<?php echo $this->_var['c']['price']; ?></div>
                </div>
              </div>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
               
              <div class="clearfix"></div>
            </div>
      
    </div>
  </div>
  <?php echo $this->fetch('footer.html'); ?> </div>
</body>
</html>