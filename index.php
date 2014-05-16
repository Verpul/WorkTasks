<?php
	require_once 'lib/tasksFunctions.php';
	session_start();
	$values = array();
	if(!empty($_POST['sendForm'])){
		$values['username'] = $_POST['username'];
		$values['password'] = $_POST['password'];

		if(empty($values['username']) || empty($values['password'])){
			$err = "Не заполнен логин или пароль";
		} else {
			$accept = login($values['username'], $values['password']);
			if($accept){
				if(empty($_SESSION['url'])){
					header("Location: tasks.php");
				} else {
					header("Location: ".$_SESSION['url']);
					unset($_SESSION['url']);
				}	
				$_SESSION['authorized'] = true;
				die();
			} else {
				$err = "Неверный логин или пароль";
			}
		}
	}

	renderTemplate(array('loginForm.php'), array('h2'   => 'Вход',
									  			 'err'  => $err,
									  			 'username' => $values['username']));
?>
