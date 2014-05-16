<?php
require_once 'lib/tasksFunctions.php';
$values = array();

if(!empty($_POST['addnew'])){
	$values['priority'] = $_POST['priority'];
	$values['comment'] = $_POST['comment'];

	if(empty($values['comment']) || (!isset($values['priority']))){
		$err = "Заполните все поля";
	}else{		
		$time = date("Y:m:d H:i:s");
		$priority = $_POST['priority'];
		$comment = $_POST['comment'];
		insertTask($time, $priority, $comment);
		header('Location: tasks.php');
		die();
	}
}

renderTemplate(array('taskForm.php'), array('h2'   => 'Добавить новую задачу',
								  			'err'  => $err,
								  			'comment' => $values['comment']));
?>
