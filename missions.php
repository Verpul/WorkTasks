<html>
<head>
	<script>
	<?php
	function closeMission(){
		header("Location: login.php");
	}
	?>
	</script>
</head>
<body>
	<h2>Мои задачи</h2>
<?php
/*
Добавить задачу
Дата
Приоритет(.jpg)/Описание/Закрыта или нет - если нет - кнопка закрыть/Редактировать(Удалить)
Номер страницы 
*/
if(!empty($_POST['close'])){
	$selected = key($_POST['close']);
	include("connect.php");
    $setquery = "UPDATE missions SET closed=1 WHERE id = $selected";
    mysql_query($setquery);
    mysql_close($connect);
}
echo "<form action='newMission.php' method='post'>
		<input type='submit' name = 'addmission' value='Добавить задачу' />
	 </form>";	

	include("connect.php");
	$query = ("SELECT * FROM missions");
	$result = mysql_query($query);
	echo "<table border = 1>
			<tr><td>Приоритет</td><td>Описание</td><td>Статус</td></tr>";
	while($row = mysql_fetch_assoc($result)){
		$i++;
		$status = $row['closed'] == 0 ? 'Не выполнена':'Выполнена';
		echo "<tr><td>{$row['priority']}</td>
				<td>{$row['comment']}</td>
				<td>{$status}</td>
				<form action='missions.php' method='post'>
				<td><input type='hidden' name = 'close[{$row['id']}]' value='Закрыть'></td>
				</form>	
				<form action='changeMission.php' method='post'>
				<td><input type='submit' name = 'change' value='Редактировать'></td></tr>
				</form>";
	}
	echo "</table>";
	mysql_close($connect);
?>
</body>
</html>.