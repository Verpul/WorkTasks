<?php
require 'sessionCode/session.php';
if($_POST['addmission'] || empty($_POST['addnew'])){
	$h2 = "Добавить новую задачу";
	$err = loginError();
	require 'header.php';
	require 'templates/newTask.html';		
	require 'footer.html';
} else if($_POST['addnew']){
	if(empty($_POST['comment']) || (!isset($_POST['priority']))){
		header("Location: newTask.php");
		$_SESSION['error'] = "Заполните все поля";
	}else{
		header('Location: tasks.php');
		require 'dbCode/connect.php';
		$time = date("Y:m:d H:i:s");
		$priority = $_POST['priority'];
		$comment = $_POST['comment'];
		insertTask($time, $priority, $comment);
		}
}
?>
