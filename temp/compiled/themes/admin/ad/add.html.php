<!DOCTYPE >
<html>
<?php echo $this->fetch('head.html'); ?>
<body>

 <?php echo $this->fetch('ad/nav.html'); ?>
    <form method="post" action="admin.php?m=ad&a=save">
    <input type="hidden" name="id" style="display:none;" value="<?php echo $this->_var['data']['id']; ?>" >
      <table class="table table-bordered" width="100%">
        
        <tr>
          <td width="100">所属分类：</td>
          <td>
          <select name="tag_id" id="ajax_tag_id">
          <option value="0">请选择</option>
          <?php $_from = $this->_var['tag_list']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('k', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['c']):
?>
          <option value="<?php echo $this->_var['k']; ?>" <?php if ($this->_var['k'] == $this->_var['data']['tag_id'] || $this->_var['k'] == get_post ( "tag_id" )): ?> selected="selected"<?php endif; ?>><?php echo $this->_var['c']['title']; ?>(<?php echo $this->_var['c']['width']; ?>*<?php echo $this->_var['c']['height']; ?>)</option>
           <?php if ($this->_var['c']['child']): ?>
            	<?php $_from = $this->_var['c']['child']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'cc');if (count($_from)):
    foreach ($_from AS $this->_var['cc']):
?>
                	<option value="<?php echo $this->_var['cc']['tag_id']; ?>" <?php if ($this->_var['cc']['tag_id'] == $this->_var['data']['tag_id']): ?> selected="selected"<?php endif; ?>>|--<?php echo $this->_var['cc']['title']; ?>(<?php echo $this->_var['cc']['width']; ?>*<?php echo $this->_var['cc']['height']; ?>)</option>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            <?php endif; ?>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </select>
        	
            
        
        </td> 
        </tr>
        <tr>
          <td>标题：</td>
          <td><input type="text" name="title" id="title" class="w600" value="<?php echo $this->_var['data']['title']; ?>" ></td>
        </tr>
        <tr>
          <td>描述：</td>
          <td><textarea name="info" id="info"  class="w600" ><?php echo $this->_var['data']['info']; ?></textarea></td>
        </tr>
        <tr>
          <td>链接1：</td>
          <td><input type="text" name="link1" id="link1"  class="w600"  value="<?php echo $this->_var['data']['link1']; ?>" ></td>
        </tr>
        <tr>
          <td>链接2：</td>
          <td><input type="text" name="link2" id="link2"  class="w600"  value="<?php echo $this->_var['data']['link2']; ?>" ></td>
        </tr>
        <tr>
          <td>开始时间：</td>
          <td><input type="text" name="starttime" id="starttime" value="<?php if ($this->_var['data']): ?><?php echo date("Y-m-d H:m:s",$this->_var['data']['starttime']); ?><?php endif; ?>" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" ></td>
        </tr>
        <tr>
          <td>结束时间：</td>
          <td><input type="text" name="endtime" id="endtime" value="<?php if ($this->_var['data']): ?><?php echo date("Y-m-d H:m:s",$this->_var['data']['endtime']); ?><?php endif; ?>" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" ></td>
        </tr>
        <tr>
          <td>图片地址：</td>
          <td>
          <div  class="upload-row">
    	<div class="btn-upload">
        	上传图片
          <input type="file" name="upimg" id="up1"  class="btn-upload-file " onChange="uploadImg('up1')">
         </div>
 
          <input type="hidden" name="imgurl" class="imgurl upload-field" value="<?php echo $this->_var['data']['imgurl']; ?>">
          <span class="imgShow upload-show">
          <?php if ($this->_var['data']['imgurl']): ?>
          <img src="<?php echo images_site($this->_var['data']['imgurl']); ?>.100x100.jpg">
          <?php endif; ?>
          </span>
      </div></td>
        </tr>
        
        <tr>
          <td>图片地址2：</td>
          <td><div id="upload-row" >
    	<div class="btn-upload">
        	上传图片
          <input type="file" name="upimg" id="up2"  class="btn-upload-file" onChange="uploadImg('up2')">
         </div>
 
          <input type="hidden" name="imgurl2" class="upload-field" value="<?php echo $this->_var['data']['imgurl2']; ?>">
          <span class="imgShow upload-show">
          <?php if ($this->_var['data']['imgurl2']): ?>
          <img src="<?php echo images_site($this->_var['data']['imgurl2']); ?>.100x100.jpg">
          <?php endif; ?>
          </span>
      </div></td>
        </tr>
        
        <tr>
          <td>排序：</td>
          <td><input type="text" name="orderindex" id="orderindex" value="<?php echo $this->_var['data']['orderindex']; ?>" ></td>
        </tr>
        <tr>
          <td>状态：</td>
          <td><input type="radio" name="status" value="1" <?php if ($this->_var['data']['status'] == 1): ?> checked="checked"<?php endif; ?> />隐藏 &nbsp; 
          <input type="radio" name="status" value="2" <?php if ($this->_var['data']['status'] == 2): ?> checked="checked"<?php endif; ?> />显示</td>
        </tr>
        <?php if ($this->_var['data']): ?>
        <tr>
          <td>添加时间：</td>
          <td><?php echo date("Y-m-d",$this->_var['data']['dateline']); ?></td>
        </tr>
        <?php endif; ?>
         
        
        
        <tr>
          <td></td>
          <td><input type="submit" value="保存" class="btn btn-success"></td>
        </tr>
      </table>
    </form>
 

<script language="javascript" src="/plugin/My97DatePicker/WdatePicker.js"></script>

<?php echo $this->fetch('footer.html'); ?>
</body>
</html>