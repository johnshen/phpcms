<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>xingwang/house.css" />
<style type="text/css">
	.page-panel .title.active,
	.page-panel .title:hover{
		background: url('<?php echo IMG_PATH;?>xingwang/circle_min.png');
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

	.page-panel .pre-page{
		background: url('<?php echo IMG_PATH;?>xingwang/pre_page.png');
		background-repeat: no-repeat;
	}

	.page-panel .next-page{
		background: url('<?php echo IMG_PATH;?>xingwang/next_page.png');
		background-repeat: no-repeat;
	}

	.page-panel .pre-page-max{
		background: url('<?php echo IMG_PATH;?>xingwang/pre_page_.png');
		background-repeat: no-repeat;
	}

	.page-panel .next-page-max{
		background: url('<?php echo IMG_PATH;?>xingwang/next_page_.png');
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
			<span class="label first"><?php echo $CAT['description'];?></span>
		</div>
		<div class="content">
			<div class="header">
				<span class="left">編號</span>
				<span class="middle">標題</span>
				<span class="right">日期</span>
			</div>
			<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=11e982198282a77f17ebf8d7a1dede5e&action=lists&catid=%24catid&num=10&order=id+DESC&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 10;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
        	<ul class="list lh24 f14">
			<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
				<div class="item">
					<span class="left"><?php echo $r['id'];?></span>
					<span class="middle"><a href="<?php echo $r['url'];?>"><?php echo $r['title'];?></a></span>
					<span class="right"><?php echo date('Y-m-d H:i:s',$r[inputtime]);?></span>
				</div>
			<?php $n++;}unset($n); ?>
        	</ul>
        	<div id="pages" class="text-c"><?php echo $pages;?></div>
			<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
		</div>
	</div>
<?php include template("content","footer"); ?>