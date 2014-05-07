<?php
    require 'sessionCode/session.php';
    $h2 = "Мои задачи";
	require 'header.php';

	if(!empty($_POST)){
		$selected = key($_POST);
		require("dbCode/connect.php");
	    $setquery = "UPDATE missions SET closed=1 WHERE id = $selected";
	    mysql_query($setquery);
	    mysql_close($connect);
	}
	require 'templates/tasksHead.html';
	require 'dbCode/connect.php';
	showTasks();	
?>
</table>
<?php
	require 'footer.html';
?>