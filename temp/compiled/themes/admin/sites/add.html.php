<!DOCTYPE >
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
 
<div class="tabs-border">
	<a class="active item" href="<?php echo $this->_var['appadmin']; ?>?m=sites">网站信息</a>
</div>

<form method="post" action="<?php echo $this->_var['appadmin']; ?>?m=sites&a=save">
<input type="hidden" name="siteid" value="<?php echo $this->_var['data']['siteid']; ?>" />
<table width="100%" border="0" class="table table-bordered">
  <tr>
    <td class="w90" align="right">名称：</td>
    <td  ><input name="sitename" type="text" id="sitename" value="<?php echo $this->_var['data']['sitename']; ?>" /></td>
  </tr>
  <tr>
    <td align="right">域名：</td>
    <td><input name="domain" type="text" id="domain" value="<?php echo $this->_var['data']['domain']; ?>" /></td>
  </tr>
  
  <tr>
  	<td>logo：</td>
    <td><div class="upload-row">
    	<div class="btn-upload">
        	上传图片 
          <input type="file" name="upimg" id="up1"  class="btn-upload-file" onChange="uploadImg('up1')">
         </div>
 
          <input type="hidden" name="logo" class="upload-field" value="<?php echo $this->_var['data']['logo']; ?>">
          <span class="imgShow upload-show">
          <?php if ($this->_var['data']['logo']): ?>
          <img src="<?php echo images_site($this->_var['data']['logo']); ?>.100x100.jpg">
          <?php endif; ?>
          </span>
      </div></td>
  </tr>
  
  <tr>
  	<td>微站背景图：</td>
    <td><div class="upload-row">
    	<div class="btn-upload">
        上传图片 
          <input type="file" name="upimg" id="up2"  class="btn-upload-file" onChange="uploadImg('up2')">
         </div>
 
          <input type="hidden" name="wapbg" class="upload-field" value="<?php echo $this->_var['data']['imgurl']; ?>">
          <span class="imgShow upload-show">
          <?php if ($this->_var['data']['wapbg']): ?>
          <img src="<?php echo images_site($this->_var['data']['wapbg']); ?>.100x100.jpg">
          <?php endif; ?>
          </span>
      </div></td>
  </tr>
  
  
  <tr>
    <td align="right">关闭：</td>
    <td><input type="radio" name="is_open" id="radio" value="1" <?php if ($this->_var['data']['is_open'] == 1): ?> checked="checked"<?php endif; ?> />
      开启
        <input type="radio" name="is_open" id="radio2" value="2" <?php if ($this->_var['data']['is_open'] == 2): ?> checked="checked"<?php endif; ?> />
      关闭</td>
  </tr>
  <tr>
    <td align="right">关闭原因：</td>
    <td><textarea name="close_why" id="close_why" cols="45" rows="5"><?php echo $this->_var['data']['close_why']; ?></textarea></td>
  </tr>
  <tr>
    <td align="right">标题：</td>
    <td><input name="title" type="text" id="title" value="<?php echo $this->_var['data']['title']; ?>" class="w600" /></td>
  </tr>
  <tr>
    <td align="right">关键词：</td>
    <td><input name="keywords" type="text" id="keywords" value="<?php echo $this->_var['data']['keywords']; ?>" class="w600" /></td>
  </tr>
  <tr>
    <td align="right">描述：</td>
    <td><textarea name="description" id="description" cols="45" rows="5"><?php echo $this->_var['data']['description']; ?></textarea></td>
  </tr>
  <tr>
    <td align="right">备案信息：</td>
    <td><input name="icp" type="text" id="icp" value="<?php echo $this->_var['data']['icp']; ?>" /></td>
  </tr>
  <tr>
    <td align="right">首页模板：</td>
    <td><input name="index_template" type="text" id="template" value="<?php echo $this->_var['data']['index_template']; ?>" size="40" /></td>
  </tr>
  <tr>
    <td align="right">统计代码：</td>
    <td><textarea name="statjs" cols="45" rows="5" id="statjs"><?php echo $this->_var['data']['statjs']; ?></textarea></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="提交" class="btn" /></td>
  </tr>
</table>

</form>
 
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>