<?php
//start session
session_start();
// setting variable for account id
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
	//header
	include "includes/header2.php";
?>
	<div id="container">
		<div id="content">

<?php
//connecting to database

	include 'Lib_logon.php';
	$link = mysql_connect($db_host, $db_user, $db_pass);
	mysql_select_db('Paul') or die(mysql_error());

//Joined images, products, inventory, and shopping_cart to get all the information that I need to display shopping cart.
	$query = ("SELECT * from Images JOIN Products ON Image_id = Products_image_id JOIN Inventory ON Products_id = Inventory_id JOIN Shopping_cart ON Inventory_id = SC_Inventory_id JOIN Accounts ON Account_id = SC_account_id where Account_id = $antid");
	$result = mysql_query($query);
	echo "<h3>Shopping Cart</h3>";
	echo "<table border='1' align='center' colspan='2'>" ;
	while($row = mysql_fetch_array($result)){
		echo "<form action='update.php' method='POST'>";
		echo "<tr>";
		echo "<td width='200' height='300'>" . "<img src= " . $row['Image_url'] . " width='300' height='300' />" . "</td>";
		echo "<input type='hidden' name='SC_id' value='" . $row['SC_id'] . "' >";
		echo "<td width='500' height='300'>" . "Product name: " . "<b>" . $row['Products_display_name'] . "</b>" . "<br /><br />" . "QTY: " . $row['SC_order_quantity'] . "<br /><br />" . "<input type='submit' value='Delete' name='delete'>" . "</td>";
		echo "<td width='200' height='300' align='center'>" . "Price: " . "<b>" . "$" . $row['SC_unit_price'] . "</td>";
		echo "</tr>";
		echo "</form>";
	}
	echo "</table>";
	
	// adding the prices when added to the cart.
		$query =("SELECT SC_unit_price * SC_order_quantity  as price FROM Shopping_cart WHERE SC_account_id = '$antid'");
				$result = mysql_query($query);
				while($row = mysql_fetch_array($result)){
				$item = $row[0];
				$price += $item;
				}
				// display table of price
				echo "<form action='update.php' method='POST'>";
				echo "<table>";
				echo "<tr>";
				echo "<td width='1000' height='100' align='left'>" . "<a href='products.php'>Continue Shopping!</a>" . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td width='auto' height='auto' align= 'right'>" . "Subtotal: " . "$" . number_format($price,2) . "<br /><br />" . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<input type='hidden' name='scid' value='" . $row['SC_id'] . "' >";
				echo "<input type='hidden' name='invid' value='" . $row['SC_inventory_id'] . "' >";
				echo "<input type='hidden' name='price' value='" . $row['SC_unit_price'] . "' >";
				echo "<input type='hidden' name='quantity' value='" . $row['SC_order_quantity'] . "' >";
				echo "<td width='1000' height='auto' align='right'>" . "<input type='submit' value='Checkout' name='submit'>" . "</td>";
				echo "</tr>";
				echo "</table>";
				echo "</form>";
				
		
	mysql_close($link);

?>
		</div>
	</div>

<?php
//footer
include "includes/footer.php";
?>
</body>


</html>