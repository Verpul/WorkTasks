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
<h2>����</h2>
	<?php echo $err; ?>
<div>
	<form action='tryLogin.php' method='post'>
		������������: <input type='text' name='username'/><br/>
		������: <input type='password' name='password'/><br/>
		<input type='submit' name='submit' value='Login' />
	 </form>
</div>
</body>
</html>