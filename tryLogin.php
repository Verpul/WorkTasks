<?php
session_start();
$_SESSION['error'] = "";
if(empty($_POST['username']) || empty($_POST['password'])){
	$_SESSION['error'] = "Не заполнен логин или пароль";
	header("Location: index.php");
} else {
	include("connect.php");
	$query = sprintf("SELECT username, password FROM users WHERE username = '%s' AND password ='%s'", mysql_real_escape_string($_POST['username']),
																										mysql_real_escape_string($_POST['password']));
	$result = mysql_query($query);
	if(mysql_num_rows($result) > 0){
		header("Location: tasks.php");
	} else {
		$_SESSION['error'] = "Неверный логин или пароль";
		header("Location: index.php");
}
	mysql_close($connect);
}

?>