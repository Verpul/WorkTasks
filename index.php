<?php
	$h2 = 'Вход';
	$values = array();

	if($_POST['sendForm']){
		$values['username'] = $_POST['username'];
		$values['password'] = $_POST['password'];

		if(empty($values['username']) || empty($values['password'])){
			$err = "Не заполнен логин или пароль";
		} else {
			require 'dbCode/connect.php';
			$accept = login($values['username'], $values['password']);
			if($accept){
				header("Location: tasks.php");
				die();
			} else {
				$err = "Неверный логин или пароль";
			}
		}
	}
	require 'header.php';
	require 'templates/loginForm.php';
	require 'footer.html'
?>
