<!DOCTYPE html>
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
<?php echo $this->fetch('category/nav.html'); ?>
<div class="rbox">
<form method="post" action="<?php echo $this->_var['appadmin']; ?>?m=category&a=save">
<input type="hidden" name="catid" value="<?php echo $this->_var['data']['catid']; ?>">
<?php if ($this->_var['parent']): ?>
<input type="hidden" name="pid" value="<?php echo $this->_var['parent']['catid']; ?>" />
<?php endif; ?>
<table width="100%" class="table table-bordered">
   <tr>
    <td>名称：</td>
    <td><label for="cname"></label>
      <input name="cname" type="text" id="cname" value="<?php echo $this->_var['data']['cname']; ?>"></td>
  </tr>
   
  <?php if ($this->_var['catlist']): ?> 
  <tr>
      <td>上级分类：</td>
      <td><select name="pid" >
      <option value="0">请选择</option>
      	<?php $_from = $this->_var['catlist']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
                <option value="<?php echo $this->_var['c']['catid']; ?>" <?php if ($this->_var['data']['pid'] == $this->_var['c']['catid']): ?> selected="selected"<?php endif; ?>><?php echo $this->_var['c']['cname']; ?></option>
                <?php $_from = $this->_var['c']['child']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c_2');if (count($_from)):
    foreach ($_from AS $this->_var['c_2']):
?>
                	<option value="<?php echo $this->_var['c_2']['catid']; ?>" <?php if ($this->_var['data']['pid'] == $this->_var['c_2']['catid']): ?> selected="selected"<?php endif; ?> class="o_c_2">|__<?php echo $this->_var['c_2']['cname']; ?></option>
                    <?php $_from = $this->_var['c_2']['child']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c_3');if (count($_from)):
    foreach ($_from AS $this->_var['c_3']):
?>
                    <option value="<?php echo $this->_var['c_3']['catid']; ?>" <?php if ($this->_var['data']['pid'] == $this->_var['c_3']['catid']): ?> selected="selected"<?php endif; ?> class="o_c_3"> |____<?php echo $this->_var['c_3']['cname']; ?></option>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </select></td>
  </tr>
  
  <?php endif; ?>
   
 
  
  <tr>
    <td>状态：</td>
    <td><input name="bstatus" type="radio" id="radio2" value="1" <?php if ($this->_var['data']['bstatus'] != 2): ?> checked="checked" <?php endif; ?> />
      显示
        <input type="radio" name="bstatus" id="radio3" value="2" <?php if ($this->_var['data']['bstatus'] == 2): ?> checked="checked" <?php endif; ?> />
        隐藏</td>
  </tr>
  
  <tr>
    <td>排序：</td>
    <td><input name="orderindex" type="text" id="orderindex" value="<?php if ($this->_var['data']): ?><?php echo $this->_var['data']['orderindex']; ?><?php else: ?>9999<?php endif; ?>"></td>
  </tr>
   
  
  <tr>
    <td>seo标题：</td>
    <td><textarea name="title" id="title"  class="w600 h100"><?php echo $this->_var['data']['title']; ?></textarea></td>
  </tr>
  <tr>
    <td>seo关键词：</td>
    <td><textarea name="keywords" id="keywords"  class="w600 h100"><?php echo $this->_var['data']['keywords']; ?></textarea></td>
  </tr>
  <tr>
    <td>seo描述：</td>
    <td><textarea name="description" id="description"  class="w600 h100"><?php echo $this->_var['data']['description']; ?></textarea></td>
  </tr>
  
   
    <tr>
    <td align="right">图标：</td>
    <td>
    <div class="upload-row">
        <div class="btn-upload">
        上传图片
          <input type="file" name="upimg" class="btn-upload-file" id="upimg" onChange="uploadImg('upimg')">
          </div>
          <label  id="loading" style="color:red; display:none;">正在上传中...</label>
          <input type="hidden" name="logo" class="upload-field" id="imgurl" value="<?php echo $this->_var['data']['logo']; ?>">
          <span   class="upload-show">
          <?php if ($this->_var['data']['logo']): ?>
          <img src="<?php echo IMAGES_SITE($this->_var['data']['logo']); ?>.100x100.jpg">
          <?php endif; ?>
          </span>
      </div>
      </td>
  </tr>
  <tr>
    <td>列表模板：</td>
    <td><input name="list_tpl" type="text" id="list_tpl" class="w600" value="<?php echo $this->_var['data']['list_tpl']; ?>" /></td>
  </tr>
  <tr>
    <td>详情模板：</td>
    <td><input name="show_tpl" type="text" id="show_tpl" class="w600" value="<?php echo $this->_var['data']['show_tpl']; ?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="保存" class="btn" /></td>
  </tr>
  
</table>
</form>
</div>
 
 
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>