<?php
// Start the session
session_start();

?>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
<?php
include "includes/header2.php";
?>

<h1> Credit Card Information </h1>

<form action="cardinfo.php" method="POST">
	Payment Type:<br>
		<input type="radio" value="Visa" name="PM_type"> Visa<br><br>
		<input type="radio" value="Mastercard" name="PM_type"> Mastercard <br><br>
		<input type="radio" value="Discover" name="PM_type"> Discover <br><br>
		<input type="radio" value="Discover" name="PM_type"> Cash <br><br>
		<input type="radio" value="Discover" name="PM_type"> Check <br><br>
	Card Number:
		<input type="text" placeholder="Last name" name="PM_number"> <br><br>
	Security Number:
		<input type="text" placeholder="Last name" name="PM_card_security_code"> <br><br>
	Expiration Date:
		<input type="text" placeholder="Last name" name="PM_exp_date"> <br><br>
		<br>
		<input type="submit" class="regButton" value="Save" name="submit">

</form>


<?php
include "includes/footer.php";
?>
</body>



</html>