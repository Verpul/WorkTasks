<?php
if(empty($_POST['username']) || empty($_POST['password'])){
	echo "�� �������� ����� ��� ������";
	include("login.php");
} else {
	include("connect.php");
	$query = sprintf("SELECT username, password FROM users WHERE username = '%s' AND password ='%s'", mysql_real_escape_string($_POST['username']),
																										mysql_real_escape_string($_POST['password']));
	$result = mysql_query($query);
	if(mysql_num_rows($result) > 0){
		header("Location: missions.php");
	} else {
		echo "�������� ����� ��� ������";
		include("login.php");	
}
	mysql_close($connect);
}

?>