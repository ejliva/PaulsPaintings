<?php
//start session
session_start();
if(isset($_SESSION['antid']));
{
	$antid = $_SESSION['antid'];
}
?>
<html>
<head>
<title>Cart</title>
<link rel="stylesheet" type="text/css" href="styles/style.css">
<body>
<?php
	include "includes/header2.php";
?>
	<div id="container">
		<div id="content">

<?php
	include 'Lib_logon.php';
	$link = mysql_connect($db_host, $db_user, $db_pass);
	mysql_select_db('Paul') or die(mysql_error());

	$query = ("SELECT * from Images JOIN Products ON Image_id = Products_image_id JOIN Inventory ON Products_id = Inventory_id JOIN Shopping_cart ON Inventory_id = SC_Inventory_id JOIN Accounts ON Account_id = SC_account_id where Account_id = $antid");
	$result = mysql_query($query);
	echo "<h3>Shopping Cart</h3>";
	echo "<table border='1' align='center' colspan='2'>" ;
	while($row = mysql_fetch_array($result)){
		echo "<form action='delete.php' method='POST'>";
		echo "<tr>";
		echo "<td width='200' height='300'>" . "<img src= " . $row['Image_url'] . " width='300' height='300' />" . "</td>";
		echo "<input type='hidden' name='SC_id' value='" . $row['SC_id'] . "' >";
		echo "<td width='500' height='300'>" . "Product name: " . "<b>" . $row['Products_display_name'] . "</b>" . "<br /><br />" . "Quantity: " . "<b>" . $row['SC_order_quantity'] . "</b>" . "<br /><br />" . "<input type= 'submit' value='Delete' name='delete'>" . "</td>";
		echo "<td width='200' height='300' align='center'>" . "Price: " . "<b>" . "$" . $row['SC_unit_price'] . "</td>";
		echo "</tr>";
		echo "</form>";
	}
	echo "</table>";
	echo "$" . number_format($_SESSION['subtotal'],2);



?>
		</div>
	</div>
<?php
include "includes/footer.php";
?>
</body>


</html>