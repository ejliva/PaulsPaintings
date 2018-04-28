<?php
// session start
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
					include "Lib_logon.php";
					$link = mysql_connect($db_host, $db_user, $db_pass);
					mysql_select_db("Paul") or die(mysql_error());

					include "format.php";
					
						
						//The payment table
						$payment = ("Select * from Payment_method Join Accounts ON Account_id = PM_account_id where PM_account_id=$antid");
						$result = mysql_query("$payment");
						echo "<form action='confirm.php' action'POST'>";
						echo "<table>";
						while($row = mysql_fetch_array($result)){
						// set variables
						$type = $row['PM_type'];
						$cardnum = $row['PM_number'];
						$code = $row['PM_card_security_code'];
						$exdate = $row['PM_exp_date'];
						$fname = $row['Account_firstname'];
						$lname = $row['Account_lastname'];
						$add1 = $row['Account_address1'];
						$add2 = $row['Account_address2'];
						$city = $row['Account_city'];
						$state = $row['Account_state_region'];
						$zip = $row['Account_postal_code'];
						$country = $row['Account_country'];
						}
						echo "<tr>" . "<td>"  . "<h3> 1) Shipping Address </h3>" . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . $fname . " " . $lname . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . $add1 . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . $add2 . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . $city . " " . $state . " " . $zip . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . $country . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . "<h3> 2) Payment Method </h3>" . "</td>" . "</tr>";
						
						//display the billing address and payment method
						echo "<tr>" . "<td>"  . $fname . " " . $lname . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . $add1 . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . $add2 . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . $city . " " . $state . " " . $zip . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . $country . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . "Payment Method: " . "</td>" . "</tr>";
						//echo "<tr>" . "<td>"  . "<input type='radio' name='PM_type'>" . "</td>" . "</tr>";
						echo "<tr>" . "<td>" . "Payment Type: " . $type . "</td>" . "</tr>";
						//echo "<tr>" . "<td>" . FormatCreditCard(MaskCreditCard(($cardnum))) . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . "Card number: " . "<input type='text' placeholder='$type' name="PM_type">" . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . "Card number: " . "<input type='text' placeholder='$cardnum' name='cardnum'>" . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . "Security Number: " . "<input type='text' placeholder='***' name='secnum'>" . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . "Expiration date: " . "<input type='text' placeholder='$exdate' name='expdate'>" . "</td>" . "</tr>";
						echo "<tr>" . "<td width='1000' height='100' align= 'right'>"  . "<input type='submit' name='confirm' value='Save'>" . "</td>" . "</tr>";
						echo "</table>";
						echo "</form>";
						
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
					//}	
					mysql_close($link);
				?>
		</div>
	</div>
				
<?php
include "includes/footer.php";
?>
</body>


</html>