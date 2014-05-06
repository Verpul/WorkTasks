<?php
require 'sessionCode/session.php';
require 'dbCode/connect.php';
$currentValue = current($_POST);
var_dump(headers_list());
switch ($currentValue){
	case "Редактировать":
		$selected = key($_POST);
		$query = ("SELECT comment FROM missions WHERE id=$selected");
		$result = mysql_fetch_array(mysql_query($query));
		$comment = $result['comment'];

		$h2 = 'Редактировать задачу';
		require 'header.php';
		require 'templates/updateTask.php';		
		require 'footer.html';
		break;

	case "Удалить задание":
		header('Location: tasks.php');
		$selected = key($_POST);
		$query = "DELETE FROM missions WHERE id=$selected";
		mysql_query($query);
		break;

	default:
		header('Location: tasks.php');
		$selected = array_search("Готово", $_POST);
		$comment = $_POST['comment'];
		$query = "UPDATE missions SET comment=\"$comment\" WHERE id=$selected";
		mysql_query($query);
		break;
		
}

mysql_close($connect);	
?>
