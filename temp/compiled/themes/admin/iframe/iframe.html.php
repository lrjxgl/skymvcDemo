<!DOCTYPE >
<html>
<?php echo $this->fetch('head.html'); ?>

<frameset rows="70,*" framespacing="0" border="0">
  <frame src="admin.php?m=iframe&a=top" id="header-frame" name="header-frame" frameborder="no" scrolling="no">
  <frameset cols="200, *" framespacing="0" border="0" id="frame-body">
    <frame src="/admin.php?m=iframe&a=left&id=2" id="menu-frame" name="menu-frame" frameborder="no" scrolling="yes">
   
    <frame src="admin.php?m=iframe&a=main" id="main-frame" name="main-frame" frameborder="no" scrolling="yes" >
  </frameset>
 
</frameset>

<noframes></noframes>
<body></body>
</html>