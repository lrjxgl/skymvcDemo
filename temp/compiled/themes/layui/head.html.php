<head>
		<meta charset="UTF-8">
		<?php $this->assign("site",M("sites")->selectRow()); ?>
<title><?php if ($this->_var['seo']['title']): ?><?php echo $this->_var['seo']['title']; ?><?php else: ?><?php echo $this->_var['site']['title']; ?> <?php endif; ?></title>
		<link href="/plugin/layui/css/layui.css" rel="stylesheet" />
		<link href="/plugin/layui_skyweb/skyweb.css" rel="stylesheet"  />
	</head>
	<style>
		.header{
			background-color: #393D49;
		}
		.header .logo{
			display: inline-block;
			margin-right: 30px;
		}
		.header-bottom{
			margin-bottom: 30px;
		}
		.footer {
		    padding: 30px 0;
		    line-height: 30px;
		    text-align: center;
		    color: #666;
		    font-weight: 300;
		}
		.layui-breadcrumb{
			padding: 30px;
			display: block;
		}
		.show-more{
			padding: 0px 30px;
		}
		.show-more .nextrs{
			margin-bottom: 10px;
		}
	</style>