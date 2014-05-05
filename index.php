<?php
	session_start();
	if(!empty($_SESSION['error'])){
		$err = '<h5>' . $_SESSION['error'] . '</h5>';
	}
?>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css" /> 
</head>
<body>
<h2>Вход</h2>
<h5><?php echo $err; ?></h5>
<div id='middle_section'>
	<div align="center">
		<form action='tryLogin.php' method='post'>
			<table border="0">
				<tr>
					<td><label for="username">Пользователь:</label></td>
					<td><input type='text' name='username' id="username" /><br/></td>
				</tr>
				<tr>
					<td><label for="password">Пароль:</label></td>
					<td><input type='password' name='password'id="password" /><br /></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type='submit' name='submit' value='Login' /></td>
				</tr>
 			</table>
		 </form>
	 </div>
</div>

</body>
</html>
