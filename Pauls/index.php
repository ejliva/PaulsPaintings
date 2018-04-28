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
					
					<br /><br />
						<form action="registration.php" method="POST">
							
								First Name:
									 <input type="text" placeholder="First name" name="Account_firstname"> <br><br>
								
								Last Name:
									<input type="text" placeholder="Last name" name="Account_lastname"> <br><br>
								
								Address 1:
									<td><input type="text" placeholder="Address 1" name="Account_address1"> <br><br>
								
								Address 2:
									<input type="text" placeholder="Address 2" name="Account_address2"> <br><br>
								
								City:
									<input type="text" placeholder="City" name="Account_city"> <br><br>
								
								State:
									<input type="text" placeholder="State (2 Letters)" name="Account_state_region"> <br><br>
								
								Postal Code:
									<input type="text" placeholder="Postal Code (5 numbers)" name="Account_postal_code"> <br><br>
								
								Country:
									<input type="text" placeholder="Country" name="Account_country"> <br><br>
								
								Phone Number:
									<input type="text" placeholder="Phone Number" name="Account_phone_number"> <br><br>
								
								Email Address:
									<td><input type="text" placeholder="Email" name="Account_email_address"> <br><br>
								
								Username:
									<td><input type="text" placeholder="username" name="Login_username"> <br><br>
								
								Password:
									<input type="password" placeholder="********"  name="Login_password"> <br><br>
								
								Confirm password:
									<input type="password" placeholder="********" name="confirm_password"> <br><br>
								Payment Type:
									<input type="text" placeholder="Visa, Mastercard, Discover" name="PM_type"><br><br>
								Card Number:
									<input type="text" placeholder="Card number" name="PM_number"> <br><br>
								Security Number:
									<input type="text" placeholder="Security number" name="PM_card_security_code"> <br><br>
								Expiration Date:
									<input type="text" placeholder="Expiration Data (MM/YY)" name="PM_exp_date"> <br><br>
									<br>
								<input type="submit" class="regButton" value="Register" name="Submit">
							
						</form>
						
				</div>
		</div>
</div>
<?php
include "includes/footer.php"; 
?>


</body>
</html>