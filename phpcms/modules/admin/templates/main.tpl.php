<?php
defined('IN_ADMIN') or exit('No permission resources.');
include PC_PATH.'modules'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'header.tpl.php';
?>
<div id="main_frameid" class="pad-10 display" style="_margin-right:-12px;_width:98.9%;">
<script type="text/javascript">
$(function(){if ($.browser.msie && parseInt($.browser.version) < 7) $('#browserVersionAlert').show();}); 
</script>
<div class="explain-col mb10" style="display:none" id="browserVersionAlert">
<?php echo L('ie8_tip')?></div>
<div class="col-2 lf mr10" style="width:48%">
	<h6><?php echo L('personal_information')?></h6>
	<div class="content">
	<?php echo L('main_hello')?><?php echo $admin_username?><br />
	<?php echo L('main_role')?><?php echo $rolename?> <br />
	<div class="bk20 hr"><hr /></div>
	<?php echo L('main_last_logintime')?><?php echo date('Y-m-d H:i:s',$logintime)?><br />
	<?php echo L('main_last_loginip')?><?php echo $loginip?> <br />
	</div>
</div>
<div class="col-2 col-auto">
	<h6><?php echo L('main_safety_tips')?></h6>
	<div class="content" style="color:#ff0000;">
<?php if($pc_writeable) {?>	
<?php echo L('main_safety_permissions')?><br />
<?php } ?>
<?php if(pc_base::load_config('system','debug')) {?>
<?php echo L('main_safety_debug')?><br />
<?php } ?>
<?php if(!pc_base::load_config('system','errorlog')) {?>
<?php echo L('main_safety_errlog')?><br />
<?php } ?>
	<div class="bk20 hr"><hr /></div>	
<?php if(pc_base::load_config('system','execution_sql')) {?>	
<?php echo L('main_safety_sql')?> <br />
<?php } ?>
<?php if($logsize_warning) {?>	
<?php echo L('main_safety_log',array('size'=>$common_cache['errorlog_size'].'MB'))?>
 <br />
<?php } ?>
<?php 
$tpl_edit = pc_base::load_config('system','tpl_edit');
if($tpl_edit=='1') {?>
<?php echo L('main_safety_tpledit')?><br />
<?php } ?>
	</div>
</div>
<div class="bk10"></div>
<div class="col-2 lf mr10" style="width: 48%">
	<h6><?php echo L('main_sysinfo')?></h6>
	<div class="content">
	<?php echo L('main_os')?><?php echo $sysinfo['os']?> <br />
	<?php echo L('main_web_server')?><?php echo $sysinfo['web_server']?> <br />
	<?php echo L('main_sql_version')?><?php echo $sysinfo['mysqlv']?><br />
	<?php echo L('main_upload_limit')?><?php echo $sysinfo['fileupload']?><br />	
	</div>
</div>
<div class="bk10"></div>
</div>
</body></html>
