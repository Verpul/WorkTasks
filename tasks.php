<?php
include("session.php");
?>
<html>
<head>
	<script type="text/javascript">
		function disabled(){

		}
	</script>
</head>
<body>
	<h2>��� ������</h2>

	<form action='newTask.php' method='post'>
		<input type='submit' name = 'addmission' value='�������� ������' />
	 </form>
<?php
/*
����� �������� 
*/
	if(!empty($_POST['close'])){
		$selected = key($_POST['close']);
		include("connect.php");
	    $setquery = "UPDATE missions SET closed=1 WHERE id = $selected";
	    mysql_query($setquery);
	    mysql_close($connect);
	}

	include("connect.php");
	$query = ("SELECT * FROM missions ORDER BY date DESC");
	$result = mysql_query($query);
	echo "<table border='1'>
			<tr><td>���������</td><td>��������</td><td>������</td></tr>";	
	while($row = mysql_fetch_assoc($result)){
		$disable = $row['closed'] == 0 ? '':'disabled';
		$status = $row['closed'] == 0 ? '�� ���������':'���������';
		
		$firstDate = substr($row['date'], 0, 10);

		if($firstDate < $secondDate || $secondDate == NULL){
			echo "<tr><td>{$firstDate}</tr></td>";	
		}
		$secondDate = $firstDate;

		echo "<tr><td>{$row['priority']}</td>
				<td>{$row['comment']}</td>
				<td>{$status}</td>
				<form action='tasks.php' method='post'>
				<td><input type='submit' name = 'close[{$row['id']}]' value='�������' $disable /></td>
				</form>	
				<form action='updateTask.php' method='post'>
				<td><input type='submit' name = 'update[{$row['id']}]' value='�������������' $disable /></td></tr>
				</form>";
	}
	echo "</table>";
	mysql_close($connect);
?>
</body>
</html>.