<!DOCTYPE html>
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
<?php echo $this->fetch('header.html'); ?>

 <div class="layui-main">
     <div class="tabs-border">
        <a class="item " href="<?php echo R("/index.php?m=guest");?>">留言板</a>
        <a class="item active" href="<?php echo R("/index.php?m=guest&a=add");?>">添加留言</a>
        <a class="item"  href="<?php echo R("/index.php?m=guest&a=my");?>"> 我的留言</a>
    </div>
      <form class="layui-form" method='post' action='index.php?m=guest&a=save'>
        <input type='hidden' name='id' style='display:none;' value='<?php echo $this->_var['data']['id']; ?>' >
        <div class="layui-form-item">
		    <label class="layui-form-label">主题</label>
		    <div class="layui-input-block">
		      <input type="text" name="title" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
		    </div>
		</div>
		
		<div class="layui-form-item">
		    <label class="layui-form-label">类型</label>
		    <div class="layui-input-block">
		      <select name="catid">
            	<?php $_from = $this->_var['catlist']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('k', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['c']):
?>
            	<option value="<?php echo $this->_var['k']; ?>" <?php if ($this->_var['data']['catid'] == $this->_var['k']): ?> selected="selected"<?php endif; ?>><?php echo $this->_var['c']; ?></option>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
		    </div>
		</div>
		
		
		
		<div class="layui-form-item">
			<label class="layui-form-label">邮箱</label>
			<div class="layui-input-block">
				<input class="layui-input" type='text' name='email' id='email' value='<?php echo $this->_var['data']['email']; ?>' >
			</div>
		</div>
		
		<div class="layui-form-item">
			<label class="layui-form-label">QQ</label>
			<div class="layui-input-block">
				<input class="layui-input" type='text' name='qq' id='qq' value='<?php echo $this->_var['data']['qq']; ?>' >
			</div>
		</div>
		
		
		<div class="layui-form-item">
			<label class="layui-form-label">内容</label>
			<div class="layui-input-block">
				<textarea name='content' id='content' class="layui-textarea"><?php echo $this->_var['data']['content']; ?></textarea>
			</div>
		</div>
		
		<div class="layui-form-item">
			<label class="layui-form-label">时间</label>
			<div class="layui-input-block">
				<div class="layui-input"><?php echo date("Y-m-d H:m",$this->_var['data']['dateline']); ?></div> 
			</div>
		</div>
		<div class="layui-form-item">
			<div class="layui-input-block">
				<input type='submit' value='保存' class='layui-btn'>
			</div>
		</div>
         
      </form>
</div>  
<?php echo $this->fetch('footer.html'); ?>
<script>
//Demo
layui.use('form', function(){
  var form = layui.form;
  
  //监听提交
  form.on('submit(formDemo)', function(data){
    layer.msg(JSON.stringify(data.field));
    return false;
  });
});
</script>
</body>
</html>