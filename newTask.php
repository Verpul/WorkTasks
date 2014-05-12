<?php
require 'sessionCode/session.php';
$values = array();
$h2 = "Добавить новую задачу";

if($_POST['addnew']){
	$values['priority'] = $_POST['priority'];
	$values['comment'] = $_POST['comment'];

	if(empty($values['comment']) || (!isset($values['priority']))){
		$err = "Заполните все поля";
	}else{
		header('Location: tasks.php');
		require 'dbCode/connect.php';
		$time = date("Y:m:d H:i:s");
		$priority = $_POST['priority'];
		$comment = $_POST['comment'];
		insertTask($time, $priority, $comment);
		die();
		}
}
require 'header.php';
require 'templates/taskForm.php';		
require 'footer.html';
?>
