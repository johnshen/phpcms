<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header', 'admin');
?>

<div style="padding: 200px 0px 0px 100px;"><?php echo L('click_copy_code')?>：<textarea ondblclick="copy_text(this)" style="width: 400px;height:30px" /><?php echo new_html_special_chars($tag)?></textarea><div>

<script type="text/javascript">
<!--
function copy_text(matter){

	//alert(matter);
	//window.top.art.dialog({id:'edit_file'}).call(matter);
	//parent.add.call(matter);
	matter.select();

	js1=matter.createTextRange();

	js1.execCommand("Copy");

	alert('<?php echo L('copy_code');?>');
}
//-->
</script>