<?php
	require_once 'lib/tasksFunctions.php';
	if(!empty($_POST['close'])){
		$selected = $_POST['id'];
	    updateTask($selected, "", true);
	    header('Location: tasks.php');
	    die();
	}

	$table = showTasks();

	renderTemplate(array('tasksHead.html', 'renderTasksTable.php', 'tasksFooter.html'), array('h2'     => 'Мои задачи',
									  													      'tasks' => $table));
?>