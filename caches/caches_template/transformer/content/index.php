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
	<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.min.js"></script>
	<style type="text/css">
		.page-header{
			background: url(<?php echo IMG_PATH;?>xingwang/bg.png) center bottom;
			background-repeat: no-repeat;
		}

		.page-container .enter{
			background: url(<?php echo IMG_PATH;?>xingwang/logo.png) center top;
			background-repeat: no-repeat;
		}

		.page-footer{
			background:url(<?php echo IMG_PATH;?>xingwang/border_icon.png);
		}

		.page-footer .icon{
			background:url(<?php echo IMG_PATH;?>xingwang/message_icon.png);
			background-repeat: no-repeat;
		}
	</style>
</head>
<body>
	<div id="pageIndex" class="page-index">
		<div class="page-header"></div>
		<div class="page-container">
			<a href="<?php echo $CATEGORYS['2']['url'];?>" class="enter"></a>
		</div>

                <?php $news = ''; ?>
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"custom\" data=\"op=custom&tag_md5=41a2d1fe129f76d487374b083aebc366&action=lists&limit=10\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$custom_tag = pc_base::load_app_class("custom_tag", "custom");if (method_exists($custom_tag, 'lists')) {$data = $custom_tag->lists(array('limit'=>'20',));}?>
                <?php $n=1;if(is_array($data)) foreach($data AS $info) { ?>
                    <?php $news .= $info['content'] . "   "; ?>
                <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                        
                <?php if ($news != '') { ?>
		<div id="pageFooter" class="page-footer">

			<span class="icon"></span>
			<span class="tip">最新消息:</span>
			<span id="panel" class="panel">
				<span id="message" class="message"><?php echo $news; ?></span>
			</span>	
		</div>
                <?php } ?>
	</div>
	<script type="text/javascript">
		$(function(){
			var width = $(window).width() - 134,

				timer = 30000,

				$message = $('#message'),

				$panel = $('#panel'),

				messageWidth = $message.width(),

				messageAnimte = function(){
					$message.stop().css('left',width).animate({
						left:-messageWidth
					},timer,function(){
						messageAnimte();
					});
				};

			$panel.width(width);

                        <?php if ($news != '') { ?>
			messageAnimte();
                        <?php } ?>
		})
	</script>
</body>
</html>
