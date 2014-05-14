<form action='index.php' name = 'sendForm' method='post'>
	<table border="0">
		<tr>
			<td><label for="username">Пользователь:</label></td>
			<td><input type='text' name='username' id="username" value= <?=  htmlspecialchars($values['username']); ?>><br/></td>
		</tr>
		<tr>
			<td><label for="password">Пароль:</label></td>
			<td><input type='password' name='password' id="password"><br></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type='submit' name='sendForm' value='Login'></td>
		</tr>
	</table>
</form>
