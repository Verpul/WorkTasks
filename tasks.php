<?php
include("session.php");
?>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css" /> 
</head>
<body>
	<h2>Мои задачи</h2>
<div  align ="center" id="middle_section">
	<form action='newTask.php' method='post'>
		<input type='submit' name = 'addmission' value='Добавить задачу' />
	 </form>
<?php
/*
Номер страницы 
LIMIT 0, 30;
LIMIT 30, 30;
*/
	if(!empty($_POST['close'])){
		$selected = key($_POST['close']);
		include("connect.php");
	    $setquery = "UPDATE missions SET closed=1 WHERE id = $selected";
	    mysql_query($setquery);
	    mysql_close($connect);
	}

	include("connect.php");
	$query = ("SELECT * FROM missions ORDER BY date DESC");
	$result = mysql_query($query);
	echo "<table id='tasksTable'>
			<tr><td id='center' class='tableBorder'>Приоритет</td><td id='center' class='tableBorder'>Описание</td><td id='center' class='tableBorder'>Статус</td></tr>";	
	while($row = mysql_fetch_assoc($result)){
		$disable = $row['closed'] == 0 ? '':'disabled';
		$status = $row['closed'] == 0 ? 'Не выполнена':'Выполнена';
		
		$firstDate = substr($row['date'], 0, 10);

		if($firstDate < $secondDate || $secondDate == NULL){
			echo "<tr><td colspan='3' id='center' class='tableBorder'>{$firstDate}</tr></td>";	
		}
		$secondDate = $firstDate;
		$comm  = $row['comment'];
		echo "<tr><td id='center' class='tableBorder'>{$row['priority']}</td>
				<td id='comment' class='tableBorder'>{$comm}</td>
				<td id='center' class='tableBorder'>{$status}</td>
				<form action='tasks.php' method='post'>
				<td ><input type='submit' name = 'close[{$row['id']}]' value='Закрыть' $disable /></td>
				</form>	
				<form action='updateTask.php' method='post'>
				<td><input type='submit' name = 'update[{$row['id']}]' value='Редактировать' $disable /></td></tr>
				</form>";
	}
	echo "</table>";
	mysql_close($connect);
?>
</div>
</body>
</html>.