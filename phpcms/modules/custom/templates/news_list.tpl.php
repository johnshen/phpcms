<?php 
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header', 'admin');
?>
<div class="pad-lr-10">
<form name="myform" action="?m=custom&c=admin_news&a=listorder" method="post">
<div class="table-list">
    <table width="100%" cellspacing="0">
        <thead>
            <tr>
            <th width="35" align="center"><input type="checkbox" value="" id="check_box" onclick="selectall('id[]');"></th>
			<th align="center"><?php echo L('content'); ?></th>
			<th width="68" align="center"><?php echo L('startdate')?></th>
			<th width='68' align="center"><?php echo L('enddate')?></th>
			<th width="120" align="center"><?php echo L('username')?></th>
			<th width="120" align="center"><?php echo L('inputtime')?></th>
			<th width="69" align="center"><?php echo L('operations_manage')?></th>
            </tr>
        </thead>
    <tbody>
 <?php 
if(is_array($data)){
	foreach($data as $news){
?>   
	<tr>
        <td align="center">
            <input type="checkbox" name="id[]" value="<?php echo $news['id']?>">
        </td>
        <td align="center" title="<?php echo $news['content']; ?>"><?php echo str_cut($news['content'], 40); ?></td>
        <td align="center"><?php echo $news['starttime']?></td>
        <td align="center"><?php echo $news['endtime']?></td>
        <td align="center"><?php echo $news['username']?></td>
        <td align="center"><?php echo date('Y-m-d H:i:s', $news ['createtime'])?></td>
        <td align="center">
            <a href="javascript:edit('<?php echo $news['id']?>', '<?php echo safe_replace(str_cut($news['content'], 20))?>');void(0);"><?php echo L('edit')?></a>
        </td>
	</tr>
<?php 
	}
}
?>
</tbody>
    </table>
  
    <div class="btn">
        <label for="check_box"><?php echo L('selected_all')?>/<?php echo L('cancel')?></label>
		<input name="submit" type="submit" class="button" value="<?php echo L('remove_all_selected')?>" onClick="document.myform.action='?m=custom&c=admin_news&a=delete';return confirm('<?php echo L('affirm_delete')?>')">&nbsp;&nbsp;
    </div>  
    </div>
    <div id="pages"><?php echo $this->db->pages;?></div>
</form>
</div>
</body>
</html>
<script type="text/javascript">
function edit(id, title) {
	window.top.art.dialog({id:'edit'}).close();
	window.top.art.dialog({title:'<?php echo L('edit_news')?>--'+title, id:'edit', iframe:'?m=custom&c=admin_news&a=edit&id='+id ,width:'600px',height:'400px'}, function(){var d = window.top.art.dialog({id:'edit'}).data.iframe;
	var form = d.document.getElementById('dosubmit');form.click();return false;}, function(){window.top.art.dialog({id:'edit'}).close()});
}
</script>
