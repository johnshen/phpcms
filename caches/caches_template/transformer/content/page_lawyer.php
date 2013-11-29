<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<link href="<?php echo CSS_PATH;?>xingwang/lawyer.css" rel="stylesheet" type="text/css" />
<style type="text/css">
	.page-panel .title.active,
	.page-panel .title:hover{
		background: url('<?php echo IMG_PATH;?>xingwang/circle_max.png');
		background-repeat: no-repeat;
	}

	.page-panel .point-icon{
		background: url('<?php echo IMG_PATH;?>xingwang/point_.png');
		background-repeat: no-repeat;
	}

	.page-panel .title.active .point-icon,
	.page-panel .title:hover .point-icon{
		background: url('<?php echo IMG_PATH;?>xingwang/point.png');
		background-repeat: no-repeat;
	}

	.page-panel .line{
		background: url('<?php echo IMG_PATH;?>xingwang/panel_line.png') center center;
		background-repeat: no-repeat;
	}
</style>
		<div id="pagePanel" class="page-panel">
			<div class="table">
				<?php 
					if ($child == 1) {
							$parentCategoryId = $catid;
							$aryChildren = explode(',', $CAT['arrchildid']);
							$activeMenu = $aryChildren[1];
						}else {
							$parentCategoryId = $CAT['parentid'];
							$activeMenu = $catid;
						}
						$cats = subcat($parentCategoryId);
						foreach($cats as $cur) {
					?>
				<span class="title <?php if($activeMenu == $cur['catid']) { ?>active<?php } ?>">
					<span class="point-icon"></span>
					<span class="name"><a href="<?php echo $cur['url'];?>" title="<?php echo $cur['catname'];?>"><?php echo $cur['catname'];?></a></span>
				</span>
				<?php } ?>
			</div>
			<div class="line">
				<span class="label first">葉光洲律師</span>
				<span class="label">Joseph&nbsp;&nbsp;K.&nbsp;C.&nbsp;Yeh</span>
			</div>
			<div class="content">
				<div class="left">
					<div class="panel">
						<span class="type">學業</span>
						<ul>
							<li>(1)放到雙方的首發第三方的手</li>
							<li>(2)放到雙方的首發第三方的手</li>
							<li>(3)放到雙方的首發第三方的手</li>
						</ul>
					</div>
					<div class="panel">
						<span class="type">傳張</span>
						<ul>
							<li>放到雙方的首發第三方的手</li>
						</ul>
					</div>
					<div class="panel">
						<span class="type">登錄法院</span>
						<ul>
							<li>放到雙方的首發第三方的手</li>
						</ul>
					</div>
					<div class="panel">
						<span class="type">電子郵件</span>
						<ul>
							<li>放到雙方的首發第三方的手</li>
						</ul>
					</div>
				</div>
				<span class="content-line"></span>
				<div class="right">
					<div class="panel">
						<span class="type">敬業</span>
						<ul>
							<li>放到雙方的首發第三方的手放到雙方的首發第三方的手放到雙方的首發第三方的手放到雙方的首發第三方的手放到雙方的首發第三方的手放到雙方的首發第三方的手</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
<?php include template("content","footer"); ?>