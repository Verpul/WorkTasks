<?php
require 'sessionCode/session.php';
require 'dbCode/connect.php';
$currentValue = current($_POST);
switch ($currentValue){
	case "Редактировать":
		$selected = key($_POST);
		$comment = showTask($selected);

		$h2 = 'Редактировать задачу';
		require 'header.php';
		require 'templates/updateTask.php';		
		require 'footer.html';
		break;

	case "Удалить задание":
		header('Location: tasks.php');
		$selected = key($_POST);
		deleteTask($selected);
		break;

	default:
		header('Location: tasks.php');
		$selected = array_search("Готово", $_POST);
		$comment = $_POST['comment'];
		updateTask($selected, $comment);
		break;		
}
?>
