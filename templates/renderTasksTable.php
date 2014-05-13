<?php
foreach ($values['tasks'] as $row) {
	$id = $row['id'];
	$priority = $row['priority'];
	$comm  = $row['comment'];

	$disable = $row['closed'] == 0 ? '':'disabled';
	$status = $row['closed'] == 0 ? 'Не выполнена':'Выполнена';
	
	$firstDate = substr($row['date'], 0, 10);

	require 'templates/tasksTable.php';
	$secondDate = $firstDate;		
}
?>