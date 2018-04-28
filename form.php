<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>	
	<?php 
		include "includes/header2.php";
	?>
	<div id="center">
		<form action="login.php" method="POST">
			Username:
			<input type="text" placeholder="Username" name="Login_username"><br />
			Password:
			<input type="password" placeholder="*********" name="Login_password"><br />
			<input type= "submit" value="Log in" name="submit">
		</form>
	</div>
	
	<?php 
		include "includes/footer.php";
	?>
</body>
</html>