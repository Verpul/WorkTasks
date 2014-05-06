<?php
	@ session_start();

	function isLogged(){
		if(!$_SESSION['logged']){
		header("Location: index.php");
		}
	}
	
	function loginError(){
		if(!empty($_SESSION['error'])){
			return $_SESSION['error'];
		}
	}
?>