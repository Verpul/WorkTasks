<?php
include("session.php");
if($_POST['addmission'] || empty($_POST['addnew'])){
	echo "<html><head><link href='style.css' rel='stylesheet' type='text/css' /> </head><body>
		<h2>Добавить новую задачу</h2>
		<div id='middle_section'>
			<div id='center'>
				<form action='newTask.php' method='post'>	
				<textarea rows = '4' cols = '60' name='comment'></textarea>
				<br />
				<select size='1' name='priority'>
					<option disabled selected>Приоритет задачи</option>
					<option value='High'>Высокий</option>
					<option value='Medium'>Средний</option>
					<option value='Low'>Низкий</option>
				</select>
				<input type='submit' name='addnew' value='Добавить задачу'/>
				</form>
			</div>
		</div>
		</body>
		</html>";
} else if($_POST['addnew']){
	if(empty($_POST['comment']) || (!isset($_POST['priority']))){
		header("Location: newTask.php");
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
