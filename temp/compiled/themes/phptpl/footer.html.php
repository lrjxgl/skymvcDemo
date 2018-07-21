
<div class="footer">
	<div class="row">
   	 <div class="friendlink">友情链接：
     	 
     	<?php $links=M("link")->select(array("limit"=>3,"order"=>"orderindex asc")); ?>
     	<?php 
     		if($links):
     			foreach($links as $c):
     	?>         
        	<a href="<?=$c['link_url']?>" target="_blank"><?=$c['title']?></a>
        <?php
        	endforeach;
        	endif;
        ?>
     </div>
	</div>
    <div class="skyline"></div>
 
    	<div class="row box960">
        	<div class="col-3-1">
            	<div class="footer-border">
                	<div class="footer-hd">关于我们</div>
                    <p>厦门得推网络科技有限公司</p>
                </div>
            </div>
            <div class="col-3-1">
            	<div class="footer-border">
                	<div class="footer-hd">联系我们</div>
                    <p>QQ:362606856</p>
                </div>
            </div>
            <div class="col-3-1">
            	<div>
                	<div class="footer-hd">加入我们</div>
                    <p>欢迎您的加入</p>
                </div>
            </div>
            
    
    
  
</div>