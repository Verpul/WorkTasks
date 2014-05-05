<?php
include("session.php");
include("connect.php");
if(!empty($_POST['update'])){
	$selected = key($_POST['update']);
	$query = ("SELECT comment FROM missions WHERE id=$selected");
	$result = mysql_fetch_array(mysql_query($query));
	$comment = $result['comment'];
}

if($_POST['updateTask']){
	header('Location: tasks.php');
	$selected = key($_POST['updateTask']);
	$comment = $_POST['comment'];
	$query = "UPDATE missions SET comment=\"$comment\" WHERE id=$selected";
	mysql_query($query);
}

if($_POST['deleteTask']){
	header('Location: tasks.php');
	$selected = key($_POST['deleteTask']);
	$query = "DELETE FROM missions WHERE id=$selected";
	mysql_query($query);
}
mysql_close($connect);
?>

<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css" /> 
	<title>Изменить задачу</title>
</head>
<body>
<h2>Редактировать задачу</h2>
<div id='middle_section'>
	<div id='center'>
		<?php
			echo "<form action='updateTask.php' method='post'>
			<textarea rows='4' cols='60' name='comment'>$comment </textarea><br />
			<input type='submit' name = 'updateTask[{$selected}]' value='Готово' />	
			</form>
			<form action='updateTask.php' method='post'>
			<input type='submit' name='deleteTask[{$selected}]' value='Удалить задание' />
			</form>";
		?>
	</div>
</div>
</body>
</html>