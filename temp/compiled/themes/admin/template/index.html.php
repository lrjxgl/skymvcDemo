<!DOCTYPE >
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
 <style>
 .saveConfig{float:right; color:red; cursor:pointer;}
 .showdefault{color:red; cursor:pointer;}
 .skinsinfo{height:60px; width:98%; overflow:auto;}
 .none{display:none;}
 </style>
<div class="tabs-border">
	<a class="item active" href="<?php echo APPADMIN; ?>?m=template">本地模板</a>
    <a  class="item" href="<?php echo APPADMIN; ?>?m=template&a=online">在线模板</a>
</div>
<div class="main-body">
<div class="row">
<?php $_from = $this->_var['skinslist']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 't');if (count($_from)):
    foreach ($_from AS $this->_var['t']):
?>
<div class="col-12-3"> 
<table  class="table table-bordered">
  <tr>
    <td height="166"><a href="<?php echo $this->_var['t']['skinsimg']; ?>" target="_blank"><img src="<?php echo $this->_var['t']['skinsimg']; ?>" style="width:200px; height:160px;"  /></a></td>
    </tr>
  <tr>
    <td height="20">&nbsp;&nbsp;风格名称：<?php echo $this->_var['t']['skinsname']; ?></td>
    </tr>
  <tr>
  <tr>
  	<td height="20">&nbsp;&nbsp;价格：<?php if ($this->_var['t']['skinsprice']): ?><?php echo $this->_var['t']['skinsprice']; ?><?php else: ?>免费<?php endif; ?></td>
  </tr>
    <td height="20">&nbsp;&nbsp;风格作者：<a href="<?php echo $this->_var['t']['skinsauthorsite']; ?>" target="_blank"><?php echo $this->_var['t']['skinsauthor']; ?></a></td>
  </tr>
  <tr>
    <td height="20">&nbsp;&nbsp;适合版本：<?php echo $this->_var['t']['skinsversion']; ?> <?php if ($this->_var['t']['skinstype'] == 'wap'): ?>手机版<?php endif; ?></td>
  </tr>
  <tr>
  <td>
  	使用说明<br>
    <div class="skinsinfo"><?php echo $this->_var['t']['skinsinfo']; ?></div>
  </td>
  </tr>
  <tr>
  <td>
  <div class="save-row">
  		<div class="pd-10">参数配置  <span class="showdefault">显示默认</span> <span class="saveConfig" skinsdir="<?php echo $this->_var['t']['skinsdir']; ?>">保存配置</span> </div>
<?php if ($this->_var['t']['myskinsdata']): ?>
    <textarea class="w98 h60 skinsdata">
    <?php echo $this->_var['t']['myskinsdata']; ?>
    </textarea>
    
    <textarea class="w98 h60 oldskinsdata none">
    <?php $_from = $this->_var['t']['skinsdata']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('k', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['c']):
?>
    <?php echo $this->_var['k']; ?>=><?php echo $this->_var['c']; ?> 
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </textarea>
<?php else: ?>
    <textarea class="w98 h60 skinsdata ">
    <?php $_from = $this->_var['t']['skinsdata']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('k', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['c']):
?>
    <?php echo $this->_var['k']; ?>=><?php echo $this->_var['c']; ?> 
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </textarea>
    <textarea class="w98 h60 oldskinsdata none">
    <?php $_from = $this->_var['t']['skinsdata']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('k', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['c']):
?>
    <?php echo $this->_var['k']; ?>=><?php echo $this->_var['c']; ?> 
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </textarea>
<?php endif; ?>
</div>
  </td>
  </tr>
  
  <tr>
    <td height="20">&nbsp;&nbsp;<?php echo $this->_var['t']['using']; ?>  </td>
  </tr>
</table>

</div>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
 </div>
<?php echo $this->fetch('footer.html'); ?>
<script>
	$(document).on("click",".saveConfig",function(){
		$.post("<?php echo $this->_var['appadmin']; ?>?m=template&a=skinsdata&ajax=1",{
			"skinsdir":$(this).attr("skinsdir"),
			"skinsdata":$(this).parents(".save-row").find(".skinsdata").val()	
		},function(data){
			skyToast(data.message);
		},"json");
	});
	
	$(document).on("click",".showdefault",function(){
		$(this).parents(".save-row").find(".oldskinsdata").toggle();
	});
	
	
</script>
</body>
</html>