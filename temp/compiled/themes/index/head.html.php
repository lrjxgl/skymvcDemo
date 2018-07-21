<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<?php $this->assign("site",M("sites")->selectRow()); ?>
<title><?php if ($this->_var['seo']['title']): ?><?php echo $this->_var['seo']['title']; ?><?php else: ?><?php echo $this->_var['site']['title']; ?> <?php endif; ?></title>

<meta name="keywords" content="<?php if ($this->_var['seo']['keywords']): ?><?php echo $this->_var['seo']['keywords']; ?><?php else: ?><?php echo $this->_var['site']['keywords']; ?><?php endif; ?>" />
<meta name="description" content="<?php if ($this->_var['seo']['description']): ?><?php echo $this->_var['seo']['description']; ?><?php else: ?><?php echo $this->_var['site']['description']; ?><?php endif; ?>" />
 
<link href="/plugin/iconfont/iconfont.css" rel="stylesheet">
<link href="/plugin/skyweb/skyweb.css" rel="stylesheet">

<link href="/static/css/common.css" rel="stylesheet">
<script src="/plugin/skyweb/jquery.js"></script>
<script src="/plugin/skyweb/skyweb.js"></script>
<script src="/static/js/common.js"></script>
</head>

