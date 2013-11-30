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
		<td><?php echo $advice['username']?></td>
		<td align="center"><?php echo $advice['sex'] == '1' ? '先生' : '小姐'; ?></td>
		<td align="center"><?php echo $advice['phone'];?></td>
		<td align="center"><?php echo $advice['email'];?></td>
		<td align="center"><?php echo $advice['appointment_day'];?></td>
		<td align="center"><?php echo $advice['appointment_time'];?></td>
		<td align="center"><?php echo str_cut($advice['topic'], 50);?></td>
		<td align="center"><?php echo str_cut($advice['content'], 200);?></td>
		<td align="center"><a href='?m=custom&c=admin_consult&a=delete&id=<?php echo $advice['id']; ?>'
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
</body>
</html>
