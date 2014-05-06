<tr>
	<td id='center' class='tableBorder'><?= $priority ?></td>
	<td id='comment' class='tableBorder'><?= $comm ?></td>
	<td id='center' class='tableBorder'><?= $status ?></td>
<form action='tasks.php' method='post'>
	<td ><input type='submit' name = <?= $id ?> value='Закрыть' <?= $disable ?> /></td>
</form>	
<form action='updateTask.php' method='post'>
	<td><input type='submit' name = <?= $id ?> value='Редактировать' <?= $disable ?> /></td></tr>
</form>