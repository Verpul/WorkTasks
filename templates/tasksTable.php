<?php if($secondDate == NULL ||$firstDate < $secondDate): ?>
	<tr><td colspan='3' class='center tableBorder'><?= $firstDate ?></tr></td>
<?php endif; ?>
<tr>
	<td class='center tableBorder'><?= $priority ?></td>
	<td class='comment tableBorder' id='comment'><?= $comm ?></td>
	<td class='center tableBorder'><?= $status ?></td>
	<td class='center'>
		<form action='tasks.php' method='post'>
			<input type='submit' name = 'close' value='Закрыть' <?= $disable ?> >
			<input type='hidden' name = 'id' value = <?= $id ?> >
		</form>	
	</td>
	<td class='center'>
		<form action='updateTask.php' method='post'>
			<input type='submit' name = 'changeTask' value='Редактировать' <?= $disable ?> >
			<input type='hidden' name = 'id' value = <?= $id ?> >
		</form>
	</td></tr>
