<?php
require_once 'lib/tasksFunctions.php';
$selected = $_POST['id'];

if($_POST['changeTask']){
	$comment = showTask($selected);
	renderTemplate(array('updateTask.php'), array('h2'   => 'Редактировать задачу',
									  			  'comment' => $comment,
									  			  'selected' => $selected));
} else if ($_POST['updateTask']){
	$comment = $_POST['comment'];
	updateTask($selected, $comment);
	header('Location: tasks.php');
} else if ($_POST['deleteTask']){
	deleteTask($selected);
	header('Location: tasks.php');
} else{
	header('Location: tasks.php');
}


?>
