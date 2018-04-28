<?php
// Start the session
session_start();

?>
<html>
<head>
	<title>Paul's Paintings Shop</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
</head>

<body>
<?php
include "includes/header.php";
?>
<div id="container">
	<div id="content">
			<div id="main">
				<h2> Welcome to Paul's Paintings Shop </h2> <br />
			</div>
				<div id ="registration">
					<h2 class="member"> Are you a member? </h2>
					<h3 class="reg"> Register now. </h3>
						<form action="registration.php" method="POST">
							<table>
								<tr>
									<td>First Name:</td>
								</tr>
								<tr>
									 <td><input type="text" placeholder="First name" name="Account_firstname"></td>
								</tr>
								<tr>
									<td>Last Name:</td>
								</tr>
								<tr>
									 <td><input type="text" placeholder="Last name" name="Account_lastname"></td>
								</tr>
								<tr>
								<tr>
									<td>Email</td>
								</tr>
								<tr>
									 <td><input type="text" placeholder="Email" name="Account_email_address"></td>
								</tr>
								<tr>
									<td>Username:</td>
								</tr>
								<tr>
									 <td><input type="text" placeholder="Username" name="Login_username"></td>
								</tr>
								<tr>
									<td>Password:</td>
								</tr>
								<tr>
									 <td><input type="password" placeholder="Password" name="Login_password"></td>
								</tr>
								<tr>
									<td>Confirm Password:</td>
								</tr>
								<tr>
									 <td><input type="password" placeholder="Confirm Password" name="Confirm_password" ></td>
								</tr>
								<tr>
									 <td><input type="submit"  name="Submit" value="Register"></td>
								</tr>
							</table>
						</form>
				</div>
		</div>
</div>
<?php
include "includes/footer.php"; 
?>


</body>
</html>