<?php
if($_POST['addmission']){
	echo "<html><head></head><body>
		<h2>�������� ����� ������</h2>
		<form action='newTask.php' method='post'>
		<select size='1' name='priority'>
			<option disabled selected>��������� ������</option>
			<option value='High'>�������</option>
			<option value='Medium'>�������</option>
			<option value='Low'>������</option>
		</select>	
		<textarea rows = '4' cols = '60' name='comment'></textarea>
		<input type='submit' name='addnew' value='�������� ������' />
		</form>
		</body>
		</html>";
} elseif($_POST['addnew']){
	//JS �������� �� ������ ��������? 
	if(empty($_POST['comment'])  || $_POST['priority'] == "��������� ������"){
		echo "��������� ��� ����";
	}else{
		header('Location: tasks.php');
		include("connect.php");
		$time = date("Y:m:d H:i:s");
		$query = "INSERT INTO missions(priority, comment, closed, date) VALUES (\"{$_POST['priority']}\", \"{$_POST['comment']}\", 
																				'0', CAST('".$time."' AS datetime))";
		mysql_query($query);
		mysql_close($connect);
		}
}
?>
