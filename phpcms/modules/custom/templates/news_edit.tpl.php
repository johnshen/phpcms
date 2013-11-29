<?php 
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header', 'admin');
?>
<div class="pad-10">
<form method="post" action="?m=custom&c=admin_news&a=edit&id=<?php echo $_GET['id']?>" name="myform" id="myform">
<table class="table_form" width="100%">
<tbody>
	<tr>
		<th><?php echo L('startdate')?>：</th>
		<td><?php echo form::date('news[starttime]', $an_info['starttime'], 1)?></td>
	</tr>
	<tr>
		<th><?php echo L('enddate')?>：</th>
		<td><?php $an_info['endtime'] = $an_info['endtime']=='0000-00-00' ? '' : $an_info['endtime']; echo form::date('news[endtime]', $an_info['endtime'], 1);?></td>
	</tr>
	<tr>
		<th><?php echo L('news_content')?></th>
		<td >
		<textarea name="news[content]" id="content"><?php echo $an_info['content']?></textarea>
		<?php echo form::editor('content','basic');?>
		</td>
	</tr>
    </tbody>
</table>
<input type="submit" name="dosubmit" id="dosubmit" value=" <?php echo L('ok')?> " class="dialog">&nbsp;<input type="reset" class="dialog" value=" <?php echo L('clear')?> ">
</form>
</div>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
	$.formValidator.initConfig({formid:"myform",autotip:true,onerror:function(msg,obj){window.top.art.dialog({content:msg,lock:true,width:'220',height:'70'}, function(){this.close();$(obj).focus();})}});
	$('#starttime').formValidator({onshow:"<?php echo L('select_stardate')?>",onfocus:"<?php echo L('select_stardate')?>",oncorrect:"<?php echo L('right_all')?>"}).defaultPassed();
	$('#endtime').formValidator({onshow:"<?php echo L('select_downdate')?>",onfocus:"<?php echo L('select_downdate')?>",oncorrect:"<?php echo L('right_all')?>"}).functionValidator({
        fun: function(val, elem) {
            var startTime = $('#starttime').val();
            if (val != '' && val < startTime) {
                return "<?php echo L('endtime_lessthan_starttime')?>";
            }else {
                return true;
            }
        }
    }).defaultPassed();
	$("#content").formValidator({autotip:true,onshow:"",onfocus:"<?php echo L('news_cannot_be_empty')?>"}).functionValidator({
	    fun:function(val,elem){
	    //获取编辑器中的内容
		var oEditor = CKEDITOR.instances.content;
		var data = oEditor.getData();
        if(data==''){
		    return "<?php echo L('news_cannot_be_empty')?>"
	    } else {
			return true;
		}
	}
	}).defaultPassed();
});
</script>
