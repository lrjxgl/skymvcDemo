<!DOCTYPE >
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
<?php echo $this->fetch('link/nav.html'); ?>

<div class="rbox">
<form method="post" action="<?php echo $this->_var['appadmin']; ?>?m=link&a=save">
<input type="hidden" name="id" value="<?php echo $this->_var['data']['id']; ?>" />
<table width="100%" border="0" class="table table-bordered">
  <tr>
    <td width="21%" align="right">名称：</td>
    <td width="79%"><input name="title" type="text" id="title" value="<?php echo $this->_var['data']['title']; ?>"></td>
  </tr>
  <tr>
    <td align="right">链接：</td>
    <td><input name="link_url" type="text" id="link_url"  class="w400" value="<?php echo $this->_var['data']['link_url']; ?>"></td>
  </tr>
  <tr>
    <td align="right">图片：</td>
    <td>
    	<div class="upload-row">
        	
        	<div class="btn-upload">
            上传图片
            	<input type="file" class="btn-upload-file" id="up1" onChange="uploadImg('up1')">
            </div>
            <input name="link_img" type="hidden" id="link_img" class="w400 upload-field" value="<?php echo $this->_var['data']['link_img']; ?>">
            <div class="upload-show">
            	<?php if ($this->_var['data']['link_img']): ?><img src="<?php echo images_site($this->_var['data']['link_img']); ?>.100x100.jpg" width="100"><?php endif; ?>
            </div>
        </div>
    </td>
  </tr>
  <tr>
    <td align="right">类型：</td>
    <td>
    <select name="type_id" id="type_id">
        <option value="2" <?php if ($this->_var['data']['type_id'] == 2): ?> selected <?php endif; ?>>普通</option>
        <option value="1" <?php if ($this->_var['data']['type_id'] == 1): ?> selected <?php endif; ?>>首页</option>
    </select></td>
  </tr>
  <tr>
    <td align="right">排序：</td>
    <td><input name="orderindex" type="text" id="orderindex" value="<?php echo $this->_var['data']['orderindex']; ?>"></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td><input type="submit" name="button" class="btn" id="button" value="保存"></td>
  </tr>
</table>


</form>
</div>
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>