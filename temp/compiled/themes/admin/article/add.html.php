<!DOCTYPE >
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
<div> <?php echo $this->fetch('article/nav.html'); ?>
	<div class="main-body w98">
  <form method="post" id="data-form" action="admin.php?m=article&a=save">
    <input type="hidden" name="id" style="display:none;" value="<?php echo $this->_var['data']['id']; ?>" >
    <div class="tabs-box">
    	<div class="js-tabs tabs-border">
        	<a class="item active" href="#base">基本信息</a>
            <a class="item" href="#t-content">内容详情</a>
            <a class="item" href="#other">扩展</a>
        </div>
        <div class="tabs-item active" id="base">
        	<table class="table table-bordered" >
      <tr>
        <td class="w90">标题：</td>
        <td><input type="text" name="title" class="w98" id="title" value="<?php echo $this->_var['data']['title']; ?>" ></td>
      </tr>
        <tr>
    <td >分类：</td>
    <td>
    <select name="catid" id="catid" class="w150">
    <option value="0">请选择</option>
    <?php $_from = $this->_var['cat_list']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
                <option value="<?php echo $this->_var['c']['catid']; ?>" <?php if ($this->_var['data']['catid'] == $this->_var['c']['catid']): ?> selected="selected"<?php endif; ?>><?php echo $this->_var['c']['cname']; ?></option>
                <?php $_from = $this->_var['c']['child']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c_2');if (count($_from)):
    foreach ($_from AS $this->_var['c_2']):
?>
                	<option value="<?php echo $this->_var['c_2']['catid']; ?>" <?php if ($this->_var['data']['catid'] == $this->_var['c_2']['catid']): ?> selected="selected"<?php endif; ?> class="o_c_2">|__<?php echo $this->_var['c_2']['cname']; ?></option>
                    <?php $_from = $this->_var['c_2']['child']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c_3');if (count($_from)):
    foreach ($_from AS $this->_var['c_3']):
?>
                    <option value="<?php echo $this->_var['c_3']['catid']; ?>" <?php if ($this->_var['data']['catid'] == $this->_var['c_3']['catid']): ?> selected="selected"<?php endif; ?> class="o_c_3"> |____<?php echo $this->_var['c_3']['cname']; ?></option>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </select>
    
    
    
    </td>
  </tr>
    
      <tr>
        <td>关键字：</td>
        <td><input type="text" name="keywords" class="w98" id="keywords" value="<?php echo $this->_var['data']['keywords']; ?>" ></td>
      </tr>
      <tr>
        <td>描述：</td>
        <td><textarea class="w98 h60"  name="description" id="description"   ><?php echo $this->_var['data']['description']; ?></textarea></td>
      </tr>
      <?php if ($this->_var['data']): ?>
      <tr>
        <td>发布时间：</td>
        <td><?php echo date("Y-m-d H:i:s",$this->_var['data']['dateline']); ?></td>
      </tr>
      <?php endif; ?>
       
     
      <tr>
        <td>封面图片：</td>
        <td>
        	<div class="upload-row">
            	<div class="btn-upload">
                	上传图片
                	<input type="file" class="btn-upload-file" id="up1" onChange="uploadImg('up1')">
                </div>
                 <input type="hidden" name="imgurl"  class="upload-field" value="<?php echo $this->_var['data']['imgurl']; ?>" >
                 <div class="upload-show">
                 	<?php if ($this->_var['data']['imgurl']): ?><img src="<?php echo images_site($this->_var['data']['imgurl']); ?>.100x100.jpg" width="50"><?php endif; ?>
                 </div>
            </div>
       </td>
      </tr>
      
      <tr>
        <td>最后修改：</td>
        <td><?php echo date("Y-m-d H:i:s",$this->_var['data']['last_time']); ?></td>
      </tr>
       
      <tr>
        <td>访问数：</td>
        <td><input type="text" name="view_num" id="view_num" value="<?php echo $this->_var['data']['view_num']; ?>" ></td>
      </tr>
     
      
      
      <tr>
        <td>详情模板：</td>
        <td><input type="text" name="tpl" id="tpl" value="<?php echo $this->_var['data']['tpl']; ?>" >(如果需要可以指定模板)</td>
      </tr>
      
      
    </table>
        </div>
        <div class="tabs-item active" id="t-content">
        	 <table class="table table-bordered">
             		<tr>
        <td class="w90">内容：</td>
        <td><script type="text/plain"  id="content" name="content" ><?php echo $this->_var['data']['content']; ?></script></td>
      </tr>
             </table>
        </div>
        <div class="tabs-item active" id="other">
        	<table class="table table-bordered">
            	 <tr>
        <td class="w90">产品价格：</td>
        <td><input type="text" name="price" id="price" value="<?php echo $this->_var['data']['price']; ?>" ></td>
      </tr>
      <tr>
        <td>市场价格：</td>
        <td><input type="text" name="market_price" id="market_price" value="<?php echo $this->_var['data']['market_price']; ?>" ></td>
      </tr>
      <tr>
        <td>库存数：</td>
        <td><input type="text" name="total_num" id="total_num" value="<?php echo $this->_var['data']['total_num']; ?>" ></td>
      </tr>
      <tr>
        <td>销售数：</td>
        <td><input type="text" name="sold_num" id="sold_num" value="<?php echo $this->_var['data']['sold_num']; ?>" ></td>
      </tr>
      <tr>
        <td>积分：</td>
        <td><input type="text" name="grade" id="sold_num" value="<?php echo $this->_var['data']['grade']; ?>" ></td>
      </tr>
      <tr>
      	<td>图集</td>
        <td>
        	<?php $this->assign('tablename','article'); ?>
     	 <?php echo $this->fetch('picsup.html'); ?> 
        </td>
      </tr>
      
      <tr>
      		<td>资料下载</td>
            <td>
            	<div>下载地址： <input type="text" name="downurl"   id="downurl" value="<?php echo $this->_var['data']['downurl']; ?>">
                文件大小：<input type="text" name="downsize" id="downsize" value="<?php echo $this->_var['data']['downsize']; ?>"> M
                </div>
                <br>
                <div id="updownloading" style="display:none; line-height:30px;">上传中</div>
                <div class="btn-upload">
                 上传资料
               	 <input type="file" class="btn-upload-file" id="updown" onChange="upDown()" >
                </div>
                
            </td>
      </tr>
      
            </table>
        </div>
    </div>
    <table class="table table-bordered">
    <tr>
        <td class="w90">&nbsp;</td>
        <td><input type="button" onClick="dataSubmit()" value="保存" class="btn btn-success"></td>
      </tr>
    </table>
  </form>
</div>
</div>
<?php echo $this->fetch('footer.html'); ?>
<?php loadEditor();;?>
 <script>
 	var editor=UE.getEditor('content',options);
</script>
<script>
function dataSubmit(){
	if($("#title").val()==""){
		$("#title").focus();
		skyToast('标题不能为空');
		return false;
	}
	if($("#catid").val()==0){
		$("#catid").focus();
		skyToast('请选择分类');
		return false;
	}
	 
	$.post($("#data-form").attr("action")+"&ajax=1",$("#data-form").serialize(),function(data){
			skyToast('保存成功');
	},"json");
	
}
function auto_post(){
	 
	if($("#title").val().length>0 && $("#catid").val()>0){
		$.post($("#data-form").attr("action")+"&ajax=1",$("#data-form").serialize(),function(data){
			skyToast('自动保存成功');
		});
	}
	setTimeout(function(){
		auto_post();
	},20000)
}
function upDown(){
		skyUpload("updown","/index.php?m=upload&a=upload&ajax=1",function(e){
			$("#updownloading").hide();
			var data=eval("("+e.target.responseText+")");
			if(data.error){
				skyToast(data.mesage);
			}else{
				$("#downurl").val(data.data.filename);
				$("#downsize").val(data.data.size);
			}
		},function(){
			$("#updownloading").hide();
		});
	}
$(function(){
	
});
</script>
</body>
</html>