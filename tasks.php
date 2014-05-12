<?php
	require 'sessionCode/session.php';
    $h2 = "Мои задачи";
	require 'header.php';
	require 'dbCode/connect.php';

	if(!empty($_POST['close'])){
		$selected = $_POST['id'];
	    updateTask($selected, "", true);
	}

	require 'templates/tasksHead.html';
	showTasks();	
?>
</table>
<?php
	require 'footer.html';
?>