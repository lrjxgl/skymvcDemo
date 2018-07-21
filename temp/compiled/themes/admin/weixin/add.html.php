<!DOCTYPE >
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
<?php echo $this->fetch('weixin/nav.html'); ?>
    <form method='post' action='admin.php?m=weixin&a=save'>
      <input type='hidden' name='id' style='display:none;' value='<?php echo $this->_var['data']['id']; ?>' >
      <table class='table table-bordered' width='100%'>
        <tr>
          <td>微信token：</td>
          <td><input type='text' name='token' id='token' value='<?php echo $this->_var['data']['token']; ?>' ></td>
        </tr>
        <tr>
          <td>微信名：</td>
          <td><input type='text' name='title' id='title' value='<?php echo $this->_var['data']['title']; ?>' ></td>
        </tr>
        <tr>
        	<td>微信用户：</td>
            <td><input type="text" name="wx_username" value="<?php echo $this->_var['data']['wx_username']; ?>" /></td>
        </tr>
        
        <tr>
        	<td>微信密码：</td>
            <td><input type="text" name="wx_pwd" value="<?php echo $this->_var['data']['wx_pwd']; ?>" /></td>
        </tr>
        
        <tr>
          <td>状态：</td>
          <td> 验证
            <input type="radio" name="status" value="0" <?php if ($this->_var['data']['status'] != 1): ?> checked="checked"<?php endif; ?> />
            运营
            <input type="radio" name="status" value="1"  <?php if ($this->_var['data']['status'] == 1): ?> checked="checked"<?php endif; ?> /></td>
        </tr>
        
        <tr>
        	<td>appId</td>
        	<td><input type="text" name="appid" value="<?php echo $this->_var['data']['appid']; ?>" /></td>
        </tr>
        
        <tr>
        	<td>appKey</td>
            <td><input type="text" name="appkey" value="<?php echo $this->_var['data']['appkey']; ?>" /></td>
        </tr>
        
         <tr>
        	<td>enKey</td>
            <td><input type="text" name="enkey" value="<?php echo $this->_var['data']['enkey']; ?>" /></td>
        </tr>
        
        
       <tr>
        	<td>原始id</td>
            <td><input type="text" name="ysid" value="<?php echo $this->_var['data']['ysid']; ?>" /> (例：gh_962d3a8a3cf3)</td>
        </tr>
        
        <?php if ($this->_var['data']['dateline']): ?>
        <tr>
          <td>添加时间：</td>
          <td><?php echo date("Y-m-d H:i:s",$this->_var['data']['dateline']); ?></td>
        </tr>
        <?php endif; ?>
        <tr>
          <td align="right">分类：</td>
          <td><select name="catid" class="w150">
              <option value="0">请选择</option>
              
    <?php $_from = $this->_var['cat_list']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
                
              <option value="<?php echo $this->_var['c']['catid']; ?>" <?php if ($this->_var['data']['catid'] == $this->_var['c']['catid'] || get ( 'catid' ) == $this->_var['c']['catid']): ?> selected="selected"<?php endif; ?>>
              <?php echo $this->_var['c']['cname']; ?>
              </option>
              
                <?php $_from = $this->_var['c']['child']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c_2');if (count($_from)):
    foreach ($_from AS $this->_var['c_2']):
?>
                	
              <option value="<?php echo $this->_var['c_2']['catid']; ?>" <?php if ($this->_var['data']['catid'] == $this->_var['c_2']['catid'] || get ( 'catid' ) == $this->_var['c_2']['catid']): ?> selected="selected"<?php endif; ?> class="o_c_2">
              |__<?php echo $this->_var['c_2']['cname']; ?>
              </option>
              
                    <?php $_from = $this->_var['c_2']['child']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c_3');if (count($_from)):
    foreach ($_from AS $this->_var['c_3']):
?>
                    
              <option value="<?php echo $this->_var['c_3']['catid']; ?>" <?php if ($this->_var['data']['catid'] == $this->_var['c_3']['catid'] || get ( 'catid' ) == $this->_var['c_3']['catid']): ?> selected="selected"<?php endif; ?> class="o_c_3">
               |____<?php echo $this->_var['c_3']['cname']; ?>
              </option>
              
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    
            </select></td>
        </tr>
        
        <tr>
    <td align="right">Logo：</td>
    <td>
    <div class="btn-upload">
      <input type="file" name="upimg" class="btn-upload-file" id="uplogo" onChange="uploadLogo()">
      </div>
      <label  id="logo-loading" style="color:red; display:none;">正在上传中...</label>
      <input type="hidden" name="logo" id="logo" value="<?php echo $this->_var['data']['logo']; ?>">
      <span id="logoShow">
      <?php if ($this->_var['data']['logo']): ?>
      <img src="/<?php echo $this->_var['data']['logo']; ?>">
      <?php endif; ?>
      </span>
      </td>
  </tr>
  
  <tr>
    <td align="right">二维码：</td>
    <td>
    <div class="btn-upload">
      <input type="file" name="upimg" class="btn-upload-file" id="upimg" onChange="uploadgoodsimg()">
      </div>
      <label  id="loading" style="color:red; display:none;">正在上传中...</label>
      <input type="hidden" name="imgurl" id="imgurl" value="<?php echo $this->_var['data']['imgurl']; ?>">
      <span id="imgShow">
      <?php if ($this->_var['data']['imgurl']): ?>
      <img src="/<?php echo $this->_var['data']['imgurl']; ?>">
      <?php endif; ?>
      </span>
      </td>
  </tr>
        
        <tr><td>截图</td><td>
		 
		<script id="imgsdata" name="imgsdata"><?php echo $this->_var['data']['imgsdata']; ?></script></td></tr>
        <tr>
          <td></td>
          <td><input type='submit' value='保存' class='btn btn-success'></td>
        </tr>
      </table>
    </form>
  </div>
</div>

<script type="text/javascript" src="/plugin/ueditor/ueditor.config.js"></script>
<script language="javascript" src="/plugin/ueditor/ueditor.all.min.js"></script>

<script language="javascript">
options={
		initialFrameWidth:"100%",
		imageUrl:"/index.php?m=upload&a=UeImg&dir=product&siteid=<?php echo SITEID; ?>&id=<?php echo $this->_var['data']['id']; ?>" ,
		fileUrl:"/index.php?m=upload&a=UeFile&dir=product&siteid=<?php echo SITEID; ?>&id=<?php echo $this->_var['data']['id']; ?>",
		catcherUrl:"/index.php?m=upload&a=UeRemote&dir=product&siteid=<?php echo SITEID; ?>&id=<?php echo $this->_var['data']['id']; ?>",
		toolbars:[['insertimage']]
		 
};
var editor=UE.getEditor('imgsdata',options)
</script>
<script language="javascript" src="/plugin/jquery/ajaxfileupload.js"></script>
<script language="javascript">
   function uploadgoodsimg()
    {
        //starting setting some animation when the ajax starts and completes
        $("#loading")
        .ajaxStart(function(){
            $(this).show();
        })
        .ajaxComplete(function(){
            $(this).hide();
        });

        $.ajaxFileUpload
        (
            {
                url:'/index.php?m=upload&a=upload&dir=product&siteid=<?php echo SITEID; ?>&id=<?php echo $this->_var['data']['id']; ?>&t='+Math.random(), 
                secureuri:false,
                fileElementId:'upimg',
                dataType: 'json',
                success: function (data, status)
                {
                    if(typeof(data.error) != 'undefined')
                    {
                        if(data.error != '')
                        {
                           alert(data.msg);
                        }else
                        {
                             $("#imgShow").html("<img src='/"+data.imgurl+"' width='100'>");
							 $("#imgurl").val(data.imgurl);
                        }
                    }
                },
                error: function (data, status, e)
                {
					alert(data.msg)
  
                }
            }
        )
        
        return false;

    }
	
	
	function uploadLogo()
    {
        //starting setting some animation when the ajax starts and completes
        $("#logo-loading")
        .ajaxStart(function(){
            $(this).show();
        })
        .ajaxComplete(function(){
            $(this).hide();
        });

        $.ajaxFileUpload
        (
            {
                url:'/index.php?m=upload&a=upload&dir=product&siteid=<?php echo SITEID; ?>&id=<?php echo $this->_var['data']['id']; ?>&t='+Math.random(), 
                secureuri:false,
                fileElementId:'uplogo',
                dataType: 'json',
                success: function (data, status)
                {
                    if(typeof(data.error) != 'undefined')
                    {
                        if(data.error != '')
                        {
                           alert(data.msg);
                        }else
                        {
                             $("#logoShow").html("<img src='/"+data.imgurl+"' width='100'>");
							 $("#logo").val(data.imgurl);
                        }
                    }
                },
                error: function (data, status, e)
                {
					alert(data.msg)
  
                }
            }
        )
        
        return false;

    }
</script>
<?php echo $this->fetch('footer.html'); ?>