<?php
session_start();
if(isset($_SESSION['antid']));
{
	$antid = $_SESSION['antid'];
}

?>
<html>
<head>
	<title>checkout</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
<body>
	<?php
	include "includes/header2.php";
	?>
	<div id="container">
		<div id="content">
			<h3>Checkout</h3>
				<?php
					// Paintings, price, and shipping
						$paint=("SELECT * from Images JOIN Products ON Image_id = Products_image_id JOIN Inventory ON Products_id = Inventory_id JOIN Shopping_cart ON Inventory_id = SC_Inventory_id JOIN Accounts ON Account_id = SC_account_id where SC_account_id = $antid");
						echo "<tr>" . "<td>"  . "<h3> 3) Paintings + Shipping </h3>" . "</td>" . "</tr>";
						echo "<table>";
						echo "<form action='payment.php' action'POST'>";
						$result=mysql_query($paint);
							while($row = mysql_fetch_array($result)){
							//set variables for the rows
								$name = $row['Products_display_name'];
								$price = $row['SC_unit_price'];
								$invId = $row['SC_inventory_id'];
								$quant = $row['SC_order_quantity'];
								echo "<form action='edit.php' action'POST'>";
								echo "<tr>" . "<td width='330'>" . "<b>" . $name . "</b>" . "</td>"  . " " . "<td width='330'>" . "QTY: " . $quant . "</td>" . "<td width='330'>" . "Price: $" . $price . "</td>" . "</tr>";
							}
								$query =("SELECT SC_unit_price * SC_order_quantity  as price FROM Shopping_cart WHERE SC_account_id = '$antid'");
								$result = mysql_query($query);
									echo "<table>";
										while($row = mysql_fetch_array($result)){
											$item = $row[0];
											$sub += $item;
											//hidden input types
											echo "<input type='hidden' name='scid' value='" . $row['SC_id'] . "' >";
											echo "<input type='hidden' name='invid' value='" . $row['SC_inventory_id'] . "' >";
											echo "<input type='hidden' name='price' value='" . $row['SC_unit_price'] . "' >";
											echo "<input type='hidden' name='quantity' value='" . $row['SC_order_quantity'] . "' >";
										}
										// total price calculation
										$shipping = 3.00;
										$tax = 0.075;
										$taxtot = $tax * $sub;
										$addtax = $taxtot + $sub;
										$total = $addtax + $shipping;
											//display item name, quantity, and name
											echo "<tr>" . "<td width='1000' height='100' align= 'right'>" . "Shipping: $" . number_format($shipping,2) . "<br /><br />" . "Tax: $" . number_format($taxtot,2) . "<br /><br />" . "Total: $" . number_format($total,2) . "</td>" . "</tr>";
											
											//place order button, form action='payment.php' method='POST'
											echo "<tr>" . "<td width='1000' height='100' align= 'right'>"  . "<input type='submit' name='order' value='Place your order'>" . "</td>" . "</tr>";
											echo "</form>";
						echo "</table>";
						?>
		</div>
	</div>
				
<?php
include "includes/footer.php";
?>
</body>


</html>