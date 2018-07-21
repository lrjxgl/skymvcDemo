<!DOCTYPE html>
<html>
<?php echo $this->fetch('head.html'); ?>

<body>
<div class="page">
 
<div class="header" style="">
<div  class="left-btn goback"><span class="iconfont icon-back"></span></div>
<div class="title">产品中心</div>
<div class="right-btn" id="cl-search"><span class="iconfont icon-search"></span></div>
</div>

  <div class="search-box" id="search-box">
    	<div class="l">
        	<div class="mn">
        	<input type="text" name="keyword" id="keyword" placeholder="请输入商名称">
            </div>
        </div>
        <div class="r"><button class="btn" type="button" id="search-submit">搜索</button></div>
    </div>
    
    <script>
    
	
	$(document).on("click","#cl-search",function(){
		$("#search-box").toggle();
		 
	});
	 
	$(document).on("click","#search-submit",function(){
		window.location='/index.php?m=article&a=list&catid=<?php echo $this->_var['cat_top']['catid']; ?>&keyword='+encodeURI($("#keyword").val());
	});
    </script>

<div class="main-body">
	 
	
     <?php $this->_var['orderbys']=array('default'=>"智能排序",'buy_num'=>'销量最高','price'=>'价格');;?>
    
    <div class="tab-select-section">
    <div class="tab-select i2">
    		<div class="item" id="tab-category"><span class="t"><?php if ($this->_var['cat']): ?><?php echo $this->_var['cat']['cname']; ?><?php else: ?>全部分类<?php endif; ?></span> <i class="t3down "></i><b></b></div>
            
            
            	
    		<div class="item" id="tab-order"><span class="t"><?php if (get ( 'orderby' )): ?><?php echo $this->_var['orderbys'][get('orderby')]; ?><?php else: ?>智能排序<?php endif; ?></span> <i class="t3down"></i><b></b></div>
    		 
    </div>
     
    <div id="category-box" class="category-box tab-select-box">
    	<div class="box1">
        	<div to="c<?php echo $this->_var['cat']['catid']; ?>" class="box1item item  c<?php echo $this->_var['cat']['catid']; ?>"><?php echo $this->_var['cat']['cname']; ?></div>
        	<?php $_from = $this->_var['catlist']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
        	<div   to="c<?php echo $this->_var['c']['catid']; ?>" class="box1item item <?php if ($this->_var['c']['catid'] == get ( 'catid' ) || $this->_var['cat']['pid'] == $this->_var['c']['catid']): ?>active<?php endif; ?>"><?php echo $this->_var['c']['cname']; ?></div>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
        </div>
        <div class="box2">
         	<div v="<?php echo $this->_var['cat']['catid']; ?>" class="box2item item  c<?php echo $this->_var['cat']['catid']; ?>"><?php echo $this->_var['cat']['cname']; ?></div>
        	<?php $_from = $this->_var['catlist']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
            <div   v="<?php echo $this->_var['c']['catid']; ?>" class="box2item item c<?php echo $this->_var['c']['catid']; ?> <?php if ($this->_var['c']['catid'] == $this->_var['c']['catid']): ?>show<?php endif; ?> "><?php echo $this->_var['c']['cname']; ?></div>
            <?php $_from = $this->_var['c']['child']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'cc');if (count($_from)):
    foreach ($_from AS $this->_var['cc']):
?>
        	<div   v="<?php echo $this->_var['cc']['catid']; ?>" class="box2item item c<?php echo $this->_var['c']['catid']; ?> <?php if ($this->_var['cat']['catid'] == $this->_var['c']['catid']): ?>show<?php endif; ?> "><?php echo $this->_var['cc']['cname']; ?></div>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
             
        </div>
    </div>
    <div id="order-box" class="order-box tab-select-box">
    	 
         <?php $_from = $this->_var['orderbys']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('k', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['c']):
?>
        <a class="item" v="<?php echo $this->_var['k']; ?>"><?php echo $this->_var['c']; ?></a>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
        
    
    </div>
    
     
    
     
 </div>
     <div class="row-box">
 	<div class="prolist" id="prolist">
    	<?php $_from = $this->_var['list']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('k', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['c']):
?>
        	<div class="row item">
            	<div class="g-sd1">
                <a href="<?php echo R("/index.php?m=article&a=show&id=".$this->_var["c"]["id"]."");?>" ><img class="img" src="<?php echo IMAGES_SITE; ?><?php echo $this->_var['c']['imgurl']; ?>.100x100.jpg"  ></a>
                </div>
                <div class="g-mn1">
                	<div class="g-mn1c">
                    	<div class="title"><a href="<?php echo R("/index.php?m=article&a=show&id=".$this->_var["c"]["id"]."");?>"  ><?php echo $this->cutstr($this->_var['c']['title'],36,''); ?></a></div>
                        <div class="row-price"><span class="price">￥<?php echo $this->_var['c']['price']; ?></span></div>
                        <div class="row-sold"> <span class="right">已售<?php echo $this->_var['c']['sold_num']; ?>件</span></div>
                    </div>
                </div>
            </div>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </div>
    
    
      
    <div class="pullup" id="loadmore">加载更多</div>
    </div>
</div>


</div>
<?php echo $this->fetch('footer.html'); ?>
<script id="prolist-tpl" type="text/html">
	
 
	<%for(var i=0;i<list.length;i++){%>
        	<div class="row item">
            	<div class="g-sd1">
                <a href="/index.php?m=article&a=show&id=<%=list[i].id%>" ><img class="img" src="<%=list[i].imgurl%>.100x100.jpg"  ></a>
                </div>
                <div class="g-mn1">
                	<div class="g-mn1c">
                    	<div class="title"><a href="/index.php?m=article&a=show&id=<%=list[i].id%>" ><%=list[i].title%></a></div>
                        <div class="row-price"><span class="price">￥<%=list[i].price%></span></div>
                        <div class="row-sold">
							 
							<span class="right">已售<%=list[i].sold_num%>件</span>
						</div>
                    </div>
                </div>
            </div>
      <%}%>

</script>
<script  src="/plugin/jquery/template-native.js"></script>
 <script src="/plugin/skyweb/listload.js"></script>
<script>
	 var orderby='price',filter='',ind="desc";
	 var per_page="<?php echo $this->_var['per_page']; ?>";
	 var catid="<?php echo intval($_GET['catid']); ?>";
	 var first=false;
	 function prolist(){
		 if(per_page==0 && !first){
			 
			return false; 
		 }
		$.get("/index.php?m=article&a=list&ajax=1&catid="+catid+"&orderby="+orderby+"&filter="+filter+"&index="+ind+"&per_page="+per_page,function(data){
			per_page=data.data.per_page;
			if(per_page==0){
				//skyToast('没有数据了');
				$("#loadmore").hide();
			}else{
				$("#loadmore").show();
			}
			var html=template("prolist-tpl",data.data);
			if(first){
				$("#prolist").html(html);
				first=false;
			}else{
				$("#prolist").append(html);
			}
			 
		},"json")
	 }

	   $(function(){
			 listload.loadid="#loadmore";
			 listload.showload(function(){
				prolist();
			 });
			 $(document).on("click","#tab-category",function(){
 
				$("#category-box").toggle().siblings(".tab-select-box").hide();
				
			});
			
			$(document).on("click",".box1item",function(e){
				e.preventDefault();
				
				$(".box1item").removeClass("active");
				$(this).addClass("active");
				$(".box2item").hide();
				$(".box2item."+$(this).attr("to")).css({display:"block"});
			});
			
			$(document).on("click",".box2item",function(){
				catid=$(this).attr("v");
				per_page=0;
				first=true;
				$(".box2item").removeClass("active");
				$(this).addClass("active");
				$("#tab-category .t").text($(this).text());
				prolist();
				$("#category-box").hide();
			});
			
			 
			
			$(document).on("click","#tab-order",function(){
			 
			 
				$("#order-box").toggle().siblings(".tab-select-box").hide();
				 
			});
			
			
			
			
			$(document).on("click","#order-box .item",function(){
				orderby=$(this).attr("v");
				$("#order-box").hide();
				per_page=0;
				first=true;
				$("#order-box .item").removeClass("active");
				$(this).addClass("active");
				$("#tab-order .t").text($(this).text());
				prolist();
			});
			
			$(document).on("click","#tab-choice",function(){
				$("#choice-box").toggle().siblings(".tab-select-box").hide();
			});
			
			$(document).on("click","#choice-box .item",function(){
				filter=$(this).attr("v");
				$("#choice-box").hide();
				$("#tab-choice .t").text($(this).text());
				$("#choice-box .item").removeClass("active");
				$(this).addClass("active");
				per_page=0;
				first=true;
				prolist();
			});

		 

	   });
</script>
</body>
</html>
