<form action='updateTask.php' method='post'>
	<textarea rows='4' cols='60' name='comment'><?= $comment ?></textarea><br />
	<input type='submit' name = 'updateTask' value='Готово' />	
	<input type='hidden' name = 'id' value = <?= $selected ?> />
</form>
<form action='updateTask.php' method='post'>
	<input type='submit' name='deleteTask' value='Удалить задание' />
	<input type='hidden' name = 'id' value = <?= $selected ?> />
</form>