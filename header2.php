<?php
session_start();

if(isset($_SESSION['fname1']))
{
	//code for Logged members

	//Identifying the user

	$user = $_SESSION['fname1'];

	// Information for the user.
}
if(isset($_SESSION['fname']))
{
	$user = $_SESSION['fname'];
}
?>
<html>
<head>
</head>
<body>

<div id="header">
	<div id="logo">
		<a href="products.php"><img src="images/logo.jpg" width="300" height="75" ></a>
	</div>
		<div id="nav">
		<ul>
			<?php echo "<li>" . 'Hello, ' . $user . "</li>"?>
			<br /><br />
			<li><a href="products.php">Products</a></li>
			<li><a href="account.php">Account</a></li>
			<li><a href="cart.php">Cart</a></li>
			<li><a href="logout.php">Log out</a></li>
		</ul>
	</div>
</div>

</body>
</html>