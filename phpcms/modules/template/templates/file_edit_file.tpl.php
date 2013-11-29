<?php
defined('IN_ADMIN') or exit('No permission resources.'); 
include $this->admin_tpl('header', 'admin');
?>
<style type="text/css">
	html{_overflow:hidden}
	.frmaa{float:left;width:80%; min-width: 870px; _width:870px;}
	.rraa{float: right; width:230px;}
	.pt{margin-top: 4px;}
	
</style>
<body style="overflow:hidden">
<div class="pad-10" style="padding-bottom:0px">
<div class="col-right">
<h3 class="f14"><?php echo L('common_variables')?></h3>
<input type="button" class="button pt" onClick="javascript:insertText('{CSS_PATH}')" value="{CSS_PATH}" title="<?php echo L('click_into')?>"/><br />
<input type="button" class="button pt" onClick="javascript:insertText('{JS_PATH}')" value="{JS_PATH}" title="<?php echo L('click_into')?>"/><br />
<input type="button" class="button pt" onClick="javascript:insertText('{IMG_PATH}')" value="{IMG_PATH}" title="<?php echo L('click_into')?>"/><br />
<input type="button" class="button pt" onClick="javascript:insertText('{APP_PATH}')" value="{APP_PATH}" title="<?php echo L('click_into')?>"/><br />
<input type="button" class="button pt" onClick="javascript:insertText('{get_siteid()}')" value="{get_siteid()}" title="获取站点ID"/><br />
<input type="button" class="button pt" onClick="javascript:insertText('{loop $data $n $r}')" value="{loop $data $n $r}" title="<?php echo L('click_into')?>"/><br />
<input type="button" class="button pt" onClick="javascript:insertText('{$r[\'url\']}')" value="{$r['url']}" title="<?php echo L('click_into')?>"/><br />
<input type="button" class="button pt" onClick="javascript:insertText('{$r[\'title\']}')" value="{$r['title']}" title="<?php echo L('click_into')?>"/><br />
<input type="button" class="button pt" onClick="javascript:insertText('{$r[\'thumb\']}')" value="{$r['thumb']}" title="<?php echo L('click_into')?>"/><br />
<input type="button" class="button pt" onClick="javascript:insertText('{strip_tags($r[description])}')" value="{strip_tags($r[description])}" title="<?php echo L('click_into')?>"/><br />
<?php if (is_array($file_t_v[$file_t])) { foreach($file_t_v[$file_t] as $k => $v) {?>
 <input type="button" class="button pt" onClick="javascript:insertText('<?php echo $k?>')" value="<?php echo $k?>" title="<?php echo $v ? $v :L('click_into')?>"/><br />
 <?php } }?>
</div>
<div class="col-auto">
<form action="?m=template&c=file&a=edit_file&style=<?php echo $this->style?>&dir=<?php echo $dir?>&file=<?php echo $file?>" method="post" name="myform" id="myform">
<textarea name="code" id="code" style="height: 280px;width:96%; visibility:inherit"><?php echo $data?></textarea>
<div class="bk10"></div>
<input type="text" id="text" value="" /><input type="button" class="button" onClick="fnSearch()" value="<?php echo L('find_code')?>" /> <?php if ($is_write==0){echo '<font color="red">'.L("file_does_not_writable").'</font>';}?> <?php if (module_exists('tag')) {?><input type="button" class="button" onClick="create_tag()" value="<?php echo L('create_tag')?>" /> <input type="button" class="button" onClick="select_tag()" value="<?php echo L('select_tag')?>" /> <?php }?>
<BR><input type="submit" id="dosubmit" class="button pt" name="dosubmit" value="<?php echo L('submit')?>" />
</form>
</div>
</div>
<script type="text/javascript">
var oRange; 
var intCount = 0;  
var intTotalCount = 100;

function fnSearch() { 
	var strBeReplaced; 
	var strReplace; 
	strBeReplaced = $('#text').val(); 
	fnNext(); 
	$('#code').focus(); 
	oRange = document.getElementById('code').createTextRange(); 
	for (i=1; oRange.findText(strBeReplaced)!=false; i++) { 
		if(i==intCount){ 
			oRange.select(); 
			oRange.scrollIntoView(); 
			break; 
		} 
		oRange.collapse(false); 
	} 
} 

function create_tag() {
	window.top.art.dialog({id:'add',iframe:'?m=tag&c=tag&a=add&ac=js', title:"<?php echo L('create_tag')?>", width:'700', height:'500', lock:true}, function(){var d = window.top.art.dialog({id:'add'}).data.iframe;var form = d.document.getElementById('dosubmit');form.click();return false;}, function(){window.top.art.dialog({id:'add'}).close()});
}

function insertText(text)
{
	$('#code').focus();
    var str = document.selection.createRange();
	str.text = text;
}

function call(text) {
	$('#code').focus();
    var str = document.selection.createRange();
	var text_lenght = parseInt($('#text_lenght').val());
	str.moveStart("character", text_lenght);
	str.select();
	str.text = text;
}

function GetPoint() {
	if ($.browser.msie) {
		rng = event.srcElement.createTextRange();
		rng.moveToPoint(event.x,event.y);
		rng.moveStart("character",-event.srcElement.value.length);
		var text_lenght = rng.text.length;
	} else {
		//alert($('#code').selectionStart);
	}
	$('#text_lenght').val(text_lenght);
}

function select_tag() {
	window.top.art.dialog({id:'list',iframe:'?m=tag&c=tag&a=lists', title:"<?php echo L('tag_list')?>", width:'700', height:'500', lock:true}, function(){var d = window.top.art.dialog({id:'add'}).data.iframe;var form = d.document.getElementById('dosubmit');form.click();return false;}, function(){window.top.art.dialog({id:'list'}).close()});
}

function fnNext(){ 
	if (intCount > 0 && intCount < intTotalCount){ 
		intCount = intCount + 1; 
	} else { 
		intCount = 1 ; 
	} 
} 
//--> 
</SCRIPT> 
</script>
</body>
</html>