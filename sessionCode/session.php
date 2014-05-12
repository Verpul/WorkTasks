<?php
session_start();

if(!$_SESSION['authorized']){
	header('Location: index.php');
	$_SESSION['url'] = $_SERVER['PHP_SELF'];
} else {
	unset($_SESSION['url']);
}
?>