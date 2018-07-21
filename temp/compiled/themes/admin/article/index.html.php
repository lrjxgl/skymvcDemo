<!DOCTYPE >
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
<?php echo $this->fetch('article/nav.html'); ?>

<div class="main-body w98">

<div class="search-form">
<form method="get" action="<?php echo $this->_var['appadmin']; ?>">
<input type="hidden" name="m" value="article" />

ID:<input type="text" name="id" value="<?php echo intval($_GET['id']); ?>" class="w50" />
状态：<select name="bstatus" class="w100">
	<option value="0">选择</option>
	<option value="1" <?php if (get ( 'bstatus' ) == 1): ?>selected="selected"<?php endif; ?>>未审核</option>
    <option value="2" <?php if (get ( 'bstatus' ) == 2): ?>selected="selected"<?php endif; ?>>已审核</option>
    <option value="10" <?php if (get ( 'bstatus' ) == 10): ?>selected="selected"<?php endif; ?>>已禁止</option>
</select>
分类：    <select name="catid" class="w100">
    <option value="0">请选择</option>
    <?php $_from = $this->_var['cat_list']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
                <option value="<?php echo $this->_var['c']['catid']; ?>" <?php if (get ( 'catid' ) == $this->_var['c']['catid']): ?> selected="selected"<?php endif; ?>><?php echo $this->_var['c']['cname']; ?></option>
                <?php $_from = $this->_var['c']['child']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c_2');if (count($_from)):
    foreach ($_from AS $this->_var['c_2']):
?>
                	<option value="<?php echo $this->_var['c_2']['catid']; ?>" <?php if (get ( 'catid' ) == $this->_var['c_2']['catid']): ?> selected="selected"<?php endif; ?> class="o_c_2">|__<?php echo $this->_var['c_2']['cname']; ?></option>
                    <?php $_from = $this->_var['c_2']['child']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c_3');if (count($_from)):
    foreach ($_from AS $this->_var['c_3']):
?>
                    <option value="<?php echo $this->_var['c_3']['catid']; ?>" <?php if (get ( 'catid' ) == $this->_var['c_3']['catid']): ?> selected="selected"<?php endif; ?> class="o_c_3"> |____<?php echo $this->_var['c_3']['cname']; ?></option>
                    	<?php $_from = $this->_var['c_3']['child']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c4');if (count($_from)):
    foreach ($_from AS $this->_var['c4']):
?>
                        	<option value="<?php echo $this->_var['c4']['catid']; ?>" <?php if (get ( 'catid' ) == $this->_var['c4']['catid']): ?> selected="selected"<?php endif; ?> class="o_c_3"> |_____<?php echo $this->_var['c4']['cname']; ?></option>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </select>
主题：<input type="text" name="title" value="<?php echo $_GET['title']; ?>" class="w200" />
推荐：<select name="s_recommend" class="w100">
<option value="0">请选择</option>
<option value="1" <?php if (get ( 's_recommend' ) == 1): ?> selected="selected"<?php endif; ?>>是</option>
<option value="2" <?php if (get ( 's_recommend' ) == 2): ?> selected="selected"<?php endif; ?>>否</option>
</select>
<br>
最新：<select name="s_new" class="w100">
<option value="0">请选择</option>
<option value="1" <?php if (get ( 's_new' ) == 1): ?> selected="selected"<?php endif; ?>>是</option>
<option value="2" <?php if (get ( 's_new' ) == 2): ?> selected="selected"<?php endif; ?>>否</option>
</select>

热门：<select name="s_hot" class="w100">
<option value="0">请选择</option>
<option value="1" <?php if (get ( 's_hot' ) == 1): ?> selected="selected"<?php endif; ?>>是</option>
<option value="2" <?php if (get ( 's_hot' ) == 2): ?> selected="selected"<?php endif; ?>>否</option>
</select>
图片：<select name="s_is_img" class="w100">
<option value="0">请选择</option>
<option value="1" <?php if (get ( 's_is_img' ) == 1): ?> selected="selected"<?php endif; ?>>有</option>
<option value="2" <?php if (get ( 's_is_img' ) == 2): ?> selected="selected"<?php endif; ?>>无</option>
</select>
<input type="submit" value="搜索" class="btn" />
</form>
</div>
 <table class="table table-bordered" width="100%">
  <tr>
   <td>id</td>
   <td>标题</td>
   <td>分类</td>
   
 
   <td>发布时间</td>
  
   <td>封面</td>
     <td>状态</td>
   
   <td>推荐</td>
   <td>最新</td>
   <td>最热</td>
   <td>访问数</td>
   <td>产品价格</td>
   <td>市场价格</td>
   <td>库存数</td>
   <td>销售数</td>
   
<td>操作</td>
  </tr>
 <?php $_from = $this->_var['data']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
<tr>
   <td><?php echo $this->_var['c']['id']; ?></td>
   <td><?php echo $this->_var['c']['title']; ?></td>
   <td><?php echo $this->_var['c']['cname']; ?> </td>
   
  
   <td><?php echo date("Y-m-d",$this->_var['c']['dateline']); ?></td>
    
   <td><?php if ($this->_var['c']['is_img']): ?><img src="<?php echo images_site($this->_var['c']['imgurl']); ?>.100x100.jpg" width="50"><?php endif; ?></td>
 
   <td align="center"> 
    <?php if ($this->_var['c']['bstatus'] == 2): ?>
   <img src='<?php echo $this->_var['skins']; ?>images/yes.gif' class="ajax_no" url='<?php echo $this->_var['appadmin']; ?>?m=article&a=bstatus&id=<?php echo $this->_var['c']['id']; ?>&bstatus=10' rurl='<?php echo $this->_var['appadmin']; ?>?m=article&a=bstatus&id=<?php echo $this->_var['c']['id']; ?>&bstatus=2'>
    <?php else: ?>
    <img src='<?php echo $this->_var['skins']; ?>images/no.gif' class="ajax_yes" url='<?php echo $this->_var['appadmin']; ?>?m=article&a=bstatus&id=<?php echo $this->_var['c']['id']; ?>&bstatus=2' rurl='<?php echo $this->_var['appadmin']; ?>?m=article&a=bstatus&id=<?php echo $this->_var['c']['id']; ?>&bstatus=10'>
    <?php endif; ?></td>
    <td><?php if ($this->_var['c']['is_recommend'] == 1): ?>
   <img src='<?php echo $this->_var['skins']; ?>images/yes.gif' class="ajax_no" url='<?php echo $this->_var['appadmin']; ?>?m=article&a=recommend&id=<?php echo $this->_var['c']['id']; ?>&is_recommend=0' rurl='<?php echo $this->_var['appadmin']; ?>?m=article&a=recommend&id=<?php echo $this->_var['c']['id']; ?>&is_recommend=2'>
    <?php else: ?>
    <img src='<?php echo $this->_var['skins']; ?>images/no.gif' class="ajax_yes" url='<?php echo $this->_var['appadmin']; ?>?m=article&a=recommend&id=<?php echo $this->_var['c']['id']; ?>&is_recommend=1' rurl='<?php echo $this->_var['appadmin']; ?>?m=article&a=recommend&id=<?php echo $this->_var['c']['id']; ?>&is_recommend=0'>
    <?php endif; ?></td>
    
    <td><?php if ($this->_var['c']['isnew'] == 1): ?>
   <img src='<?php echo $this->_var['skins']; ?>images/yes.gif' class="ajax_no" url='<?php echo $this->_var['appadmin']; ?>?m=article&a=new&id=<?php echo $this->_var['c']['id']; ?>&isnew=0' rurl='<?php echo $this->_var['appadmin']; ?>?m=article&a=new&id=<?php echo $this->_var['c']['id']; ?>&isnew=1'>
    <?php else: ?>
    <img src='<?php echo $this->_var['skins']; ?>images/no.gif' class="ajax_yes" url='<?php echo $this->_var['appadmin']; ?>?m=article&a=new&id=<?php echo $this->_var['c']['id']; ?>&isnew=1' rurl='<?php echo $this->_var['appadmin']; ?>?m=article&a=new&id=<?php echo $this->_var['c']['id']; ?>&isnew=0'>
    <?php endif; ?></td>
    <td><?php if ($this->_var['c']['ishot'] == 1): ?>
   <img src='<?php echo $this->_var['skins']; ?>images/yes.gif' class="ajax_no" url='<?php echo $this->_var['appadmin']; ?>?m=article&a=hot&id=<?php echo $this->_var['c']['id']; ?>&ishot=0' rurl='<?php echo $this->_var['appadmin']; ?>?m=article&a=hot&id=<?php echo $this->_var['c']['id']; ?>&ishot=1'>
    <?php else: ?>
    <img src='<?php echo $this->_var['skins']; ?>images/no.gif' class="ajax_yes" url='<?php echo $this->_var['appadmin']; ?>?m=article&a=hot&id=<?php echo $this->_var['c']['id']; ?>&ishot=1' rurl='<?php echo $this->_var['appadmin']; ?>?m=article&a=hot&id=<?php echo $this->_var['c']['id']; ?>&ishot=0'>
    <?php endif; ?></td>
   <td><?php echo $this->_var['c']['view_num']; ?></td>
   <td><?php echo $this->_var['c']['price']; ?></td>
   <td><?php echo $this->_var['c']['market_price']; ?></td>
   <td><?php echo $this->_var['c']['total_num']; ?></td>
   <td><?php echo $this->_var['c']['sold_num']; ?></td>
  
<td><a href="<?php echo $this->_var['appadmin']; ?>?m=article&a=add&id=<?php echo $this->_var['c']['id']; ?>">编辑</a>  &nbsp;
<a href="/index.php?m=article&a=show&id=<?php echo $this->_var['c']['id']; ?>" target="_blank">查看</a>  &nbsp;
<a href="javascript:;" class="delete" url="<?php echo $this->_var['appadmin']; ?>?m=article&a=delete&id=<?php echo $this->_var['c']['id']; ?>">删除</a> &nbsp;
</td>
  </tr>
   <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
 </table>
<div><?php echo $this->_var['pagelist']; ?></div>
</div> 
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>