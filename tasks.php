<?php
	require 'sessionCode/session.php';
	require 'dbCode/connect.php';
	if(!empty($_POST['close'])){
		$selected = $_POST['id'];
	    updateTask($selected, "", true);
	    header('Location: tasks.php');
	}

	$table = showTasks();

	require 'templates/renderTemplate.php';
	renderTemplate(array('tasksHead.html', 'renderTasksTable.php', 'tasksFooter.html'), array('h2'     => 'Мои задачи',
									  													      'tasks' => $table));
?>