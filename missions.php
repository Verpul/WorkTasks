<html>
<head>
	<script>
	<?php
	function closeMission(){
		header("Location: login.php");
	}
	?>
	</script>
</head>
<body>
	<h2>��� ������</h2>
<?php
/*
�������� ������
����
���������(.jpg)/��������/������� ��� ��� - ���� ��� - ������ �������/�������������(�������)
����� �������� 
*/
if(!empty($_POST['close'])){
	$selected = key($_POST['close']);
	include("connect.php");
    $setquery = "UPDATE missions SET closed=1 WHERE id = $selected";
    mysql_query($setquery);
    mysql_close($connect);
}
echo "<form action='newMission.php' method='post'>
		<input type='submit' name = 'addmission' value='�������� ������' />
	 </form>";	

	include("connect.php");
	$query = ("SELECT * FROM missions");
	$result = mysql_query($query);
	echo "<table border = 1>
			<tr><td>���������</td><td>��������</td><td>������</td></tr>";
	while($row = mysql_fetch_assoc($result)){
		$i++;
		$status = $row['closed'] == 0 ? '�� ���������':'���������';
		echo "<tr><td>{$row['priority']}</td>
				<td>{$row['comment']}</td>
				<td>{$status}</td>
				<form action='missions.php' method='post'>
				<td><input type='hidden' name = 'close[{$row['id']}]' value='�������'></td>
				</form>	
				<form action='changeMission.php' method='post'>
				<td><input type='submit' name = 'change' value='�������������'></td></tr>
				</form>";
	}
	echo "</table>";
	mysql_close($connect);
?>
</body>
</html>.