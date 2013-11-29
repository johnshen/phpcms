<?php
defined('IN_ADMIN') or exit('No permission resources.');
$show_dialog = 1;
include $this->admin_tpl('header', 'admin');
?>
<div class="pad-lr-10">
<form name="myform" id="myform" action="?m=link&c=link&a=listorder" method="post" >
<div class="table-list">
<table width="100%" cellspacing="0">
	<thead>
		<tr>
			<!-- th width="35" align="center"><input type="checkbox" value="" id="check_box" onclick="selectall('linkid[]');"></th -->
			<th>姓名</th>
			<th>性別</th>
			<th align="center">聯絡電話</th>
			<th align="center">電子信箱</th>
			<th align="center">預約時間</th>
			<th align="center">諮詢時段</th>
			<th align="center">主旨</th>
			<th align="center">諮詢內容</th>
			<th align="center"><?php echo L('operations_manage')?></th>
		</tr>
	</thead>
<tbody>
<?php foreach($advices as $advice) { ?>
	<tr>
		<!-- td align="center" width="35"><input type="checkbox" name="linkid[]" value="<?php echo $info['linkid']?>"></td -->
		<td><?php echo $advice['id']?></td>
		<td><?php echo $advice['name']?></td>
		<td align="center"><?php echo $advice['sex'] == '1' ? '先生' : '小姐'; ?></td>
		<td align="center"><?php echo $advice['phone'];?></td>
		<td align="center"><?php echo $advice['email'];?></td>
		<td align="center"><?php echo $advice['appointment'];?></td>
		<td align="center"><?php echo $advice['duration'];?></td>
		<td align="center"><?php echo str_cut($advice['topic'], 50);?></td>
		<td align="center"><?php echo str_cut($advice['content'], 200);?></td>
		<td align="center"><a href="###" onclick="edit(<?php echo $advice['id']; ?>')"
			title="<?php echo L('edit')?>"><?php echo L('edit')?></a> |  <a
			href='?m=custom&c=legalAdvice&a=delete&id=<?php echo $advice['id']; ?>'
			onClick="return confirm('<?php echo L('confirm', array('message' => '諮詢: ' . str_cut($advice['topic'], 50))); ?>')"><?php echo L('delete')?></a> 
		</td>
	</tr>
	<?php
	}
?>
</tbody>
</table>
</div>
<div id="pages"><?php echo $pages?></div>
</form>
</div>
<script type="text/javascript">

function edit(id) {
	window.top.art.dialog({id:'edit'}).close();
	window.top.art.dialog({title:'<?php echo L('edit')?>', id:'edit', iframe:'?m=link&c=link&a=edit&linkid='+id,width:'700',height:'450'}, function(){var d = window.top.art.dialog({id:'edit'}).data.iframe;var form = d.document.getElementById('dosubmit');form.click();return false;}, function(){window.top.art.dialog({id:'edit'}).close()});
}
</script>
</body>
</html>
