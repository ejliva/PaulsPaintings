<?php
// Start the session
session_start();
?>
<html>
<head>
</head>
<body>

<div id="header">
	<div id="logo">
		<img src="images/logo.jpg" width="300" height="75" >
	</div>
	<div id="loginBox">
	<form action="login.php" method="POST">
		<table>
			<tr>
				<td class="login">
				Username:
				</td>
				<td class="login">
				Password:
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" class="box1" placeholder="Username" name="Login_username">
				</td>
				<td>
					<input type="password" class="box1" placeholder="********" name="Login_password">
				</td>
				<td>
					<input type="submit" class="logButton" value="Log in" name="submit">
				</td>
			</tr>
		</table>
		</form>
	</div>
</div>

</body>
</html>