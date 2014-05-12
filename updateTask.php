<?php
require 'sessionCode/session.php';
require 'dbCode/connect.php';
$selected = $_POST['id'];

if($_POST['changeTask']){
	$comment = showTask($selected);
	$h2 = 'Редактировать задачу';
	require 'header.php';
	require 'templates/updateTask.php';		
	require 'footer.html';
} else if ($_POST['updateTask']){
	header('Location: tasks.php');
	$comment = $_POST['comment'];
	updateTask($selected, $comment);
} else if ($_POST['deleteTask']){
	header('Location: tasks.php');
	deleteTask($selected);
} else{
	header('Location: tasks.php');
}
?>
