<?php
require 'sessionCode/session.php';
$_SESSION['error'] = "";
if(empty($_POST['username']) || empty($_POST['password'])){
	$_SESSION['error'] = "Не заполнен логин или пароль";
	header("Location: index.php");
} else {
	require 'dbCode/connect.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$accept = login($username, $password);
	if($accept){
		header("Location: tasks.php");
	 	$_SESSION['logged'] = true;
	} else {
		$_SESSION['error'] = "Неверный логин или пароль";
		header("Location: index.php");
	}																								
}
?>