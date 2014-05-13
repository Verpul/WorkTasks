<?php if($secondDate == NULL ||$firstDate < $secondDate): ?>
	<tr><td colspan='3' id='center' class='tableBorder'><?= $firstDate ?></tr></td>
<?php endif; ?>
<tr>
	<td id='center' class='tableBorder'><?= $priority ?></td>
	<td id='comment' class='tableBorder'><?= $comm ?></td>
	<td id='center' class='tableBorder'><?= $status ?></td>
<form action='tasks.php' method='post'>
	<td>
		<input type='submit' name = 'close' value='Закрыть' <?= $disable ?> />
		<input type='hidden' name='id' value= <?= $id ?> />
	</td>
</form>	
<form action='updateTask.php' method='post'>
	<td>
		<input type='submit' name = 'changeTask' value='Редактировать' <?= $disable ?> />
		<input type='hidden' name = 'id' value = <?= $id ?> />
	</td></tr>
</form>