<form action='newTask.php' method='post'>	
	<textarea rows = '4' cols = '60' name='comment'><?= htmlspecialchars($values['comment']) ?></textarea>
	<br>
	<select size='1' name='priority'>
		<option disabled selected>Приоритет задачи</option>
		<option value='High'>Высокий</option>
		<option value='Medium'>Средний</option>
		<option value='Low'>Низкий</option>
	</select>
	<input type='submit' name='addnew' value='Добавить задачу'>
</form>