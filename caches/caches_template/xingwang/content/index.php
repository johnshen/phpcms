<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=7" />
	<title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
	<meta name="keywords" content="<?php echo $SEO['keyword'];?>">
	<meta name="description" content="<?php echo $SEO['description'];?>">
	<link href="<?php echo CSS_PATH;?>reset.css" rel="stylesheet" type="text/css" />
	
	<link href="<?php echo CSS_PATH;?>xingwang/common.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo CSS_PATH;?>xingwang/index.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="pageIndex" class="page-index">
		<div class="page-header" style="background: url(<?php echo IMG_PATH;?>xingwang/bg.png) center bottom;background-repeat: no-repeat;"></div>
		<div class="page-container">
			<a href="<?php echo $CATEGORYS['2']['url'];?>" class="enter" style="background: url(<?php echo IMG_PATH;?>xingwang/logo.png) center top;background-repeat: no-repeat;"></a>
		</div>
		<div id="pageFooter" class="page-footer" style="background:url(<?php echo IMG_PATH;?>xingwang/border_icon.png);">
			<span class="icon" style="background:url(<?php echo IMG_PATH;?>xingwang/message_icon.png);"></span>			
			<span class="tip">最新消息:</span>			
			<span class="message">免費法律諮詢-本所每月二、四、五周周一上午9時到12時.免費法律諮詢.每位諮詢時間原則上以30分鐘為</span>
		</div>
	</div>
</body>
</html>
