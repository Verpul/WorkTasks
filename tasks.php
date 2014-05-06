<?php
    require 'sessionCode/session.php';
    $h2 = "Мои задачи";
	require 'header.php';

	if(!empty($_POST)){
		$selected = key($_POST);
		require("dbCode/connect.php");
	    $setquery = "UPDATE missions SET closed=1 WHERE id = $selected";
	    mysql_query($setquery);
	    mysql_close($connect);
	}
?>

<form action='newTask.php' method='post'>
		<input type='submit' name = 'addmission' value='Добавить задачу' />
</form>
<table id='tasksTable'>
<tr>
	<td id='center' class='tableBorder'>Приоритет</td>
	<td id='center' class='tableBorder'>Описание</td>
	<td id='center' class='tableBorder'>Статус</td>
</tr>
<?php
	require("dbCode/connect.php");
	$query = ("SELECT * FROM missions ORDER BY date DESC");
	$result = mysql_query($query);		

	while($row = mysql_fetch_assoc($result)){
		$id = $row['id'];
		$priority = $row['priority'];
		$comm  = $row['comment'];

		$disable = $row['closed'] == 0 ? '':'disabled';
		$status = $row['closed'] == 0 ? 'Не выполнена':'Выполнена';
		
		$firstDate = substr($row['date'], 0, 10);

		if($firstDate < $secondDate || $secondDate == NULL){
			echo  "<tr><td colspan='3' id='center' class='tableBorder'>".$firstDate."</tr></td>";	
		}
		$secondDate = $firstDate;
		require 'templates/tasksTable.php';		
	}
?>
</table>
<?php
	mysql_close($connect);
	require 'footer.html';
?>