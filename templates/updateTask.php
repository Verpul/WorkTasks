<form action='updateTask.php' method='post'>
	<textarea rows='4' cols='60' name='comment'><?= $comment ?></textarea><br />
	<input type='submit' name = <?= $selected ?> value='Готово' />	
</form>
<form action='updateTask.php' method='post'>
	<input type='submit' name=<?= $selected ?> value='Удалить задание' />
</form>