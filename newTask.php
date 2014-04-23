<?php
if($_POST['addmission']){
	echo "<html><head></head><body>
		<h2>Добавить новую задачу</h2>
		<form action='newTask.php' method='post'>
		<select size='1' name='priority'>
			<option disabled selected>Приоритет задачи</option>
			<option value='High'>Высокий</option>
			<option value='Medium'>Средний</option>
			<option value='Low'>Низкий</option>
		</select>	
		<textarea rows = '4' cols = '60' name='comment'></textarea>
		<input type='submit' name='addnew' value='Добавить задачу' />
		</form>
		</body>
		</html>";
} elseif($_POST['addnew']){
	//JS проверка на пустое значение? 
	if(empty($_POST['comment'])  || $_POST['priority'] == "Приоритет задачи"){
		echo "Заполните все поля";
	}else{
		header('Location: tasks.php');
		include("connect.php");
		$time = date("Y:m:d H:i:s");
		$query = "INSERT INTO missions(priority, comment, closed, date) VALUES (\"{$_POST['priority']}\", \"{$_POST['comment']}\", 
																				'0', CAST('".$time."' AS datetime))";
		mysql_query($query);
		mysql_close($connect);
		}
}
?>
