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
			include "Lib_logon.php";
			$link = mysql_connect($db_host, $db_user, $db_pass);
			mysql_select_db("Paul") or die(mysql_error());
			//if(isset($_POST['submit'])){
				
			include 'format.php';
			
			$query=("SELECT * from Accounts where Account_id = $antid");
			$result = mysql_query($query);
			while($row = mysql_fetch_array($result)){
			$fname = $row['Account_firstname'];
			$lname = $row['Account_lastname'];
			$add1 = $row['Account_address1'];
			$add2 = $row['Account_address2'];
			$city = $row['Account_city'];
			$state = $row['Account_state_region'];
			$zip = $row['Account_postal_code'];
			$country = $row['Account_country'];
			}
			echo "<table width= 'auto' height='150>";
			echo "<h3> 1) Shipping Address </h3>";
			//echo "<form action='edit.php' action'POST'>";
			echo "<tr width='200'>";
			echo "<td width='200'>"  . $fname . " " . $lname . "</td>";
			echo "<td width='200'>"  . $add1 . " " . "</td>";
			echo "<td width='200'>"  . $add2 . " " . "</td>";
			echo "<td width='200'>"  . $city . ", " . $state . ", " . $zip . " " . "</td>";
			echo "<td width='200'>"  . $country . " " . "</td>";
			//echo "<td width='200'align='right'>" . "<input type='submit' name='shipping' Value='Change'>" . "</td>";
			echo "</tr>";
			//echo "</form>";
			echo "</table>";
						
						
			//The payment table
			$payment = ("Select * from Payment_method Join Accounts ON Account_id = PM_account_id where PM_account_id=$antid");
			$result = mysql_query("$payment");
			echo "<tr>" . "<td>"  . "<h3> 2) Payment Method </h3>" . "</td>" . "</tr>";
			while($row = mysql_fetch_array($result)){
			// set variables
			$type = $row['PM_type'];
			$cardnum = $row['PM_number'];
			$fname = $row['Account_firstname'];
			$lname = $row['Account_lastname'];
			$add1 = $row['Account_address1'];
			$add2 = $row['Account_address2'];
			$city = $row['Account_city'];
			$state = $row['Account_state_region'];
			$zip = $row['Account_postal_code'];
			$country = $row['Account_country'];
			}
			
			//display table of payment method
			//echo "<form action='edit.php' action'POST'>";
			echo "<table width= 'auto' height='150>";
			echo "<tr>";
			echo "<td width='200'>" . "Billing address: ". "</td>";
			echo "<td width='150'>"  . $fname . " " . $lname . ", " . "</td>";
			echo "<td width='250'>"  . $add1 . "" . "</td>";
			echo "<td width='200'>"  . $add2 . "" . "</td>";
			echo "<td width='200'>"  . $city . ", " . $state . ", " . $zip . " " . "</td>";
			echo "<td width='200'>"  . $country . " " . "</td>";
			//echo "<td width='200'align='right'>" . "<input type='submit' name='billing' Value='Change'>" . "</td>";
			echo "</tr>";
			//echo "</form>";
			echo "</table>";
			echo "<form action='edit.php' action'POST'>";
			echo "<table width= 'auto' height='150'>";
			echo "<tr>";
			echo "<td width='200;'>"  . "Choose Payment: " . "</td>";
			echo "<td width='200;'>" . $type . "</td>";
			echo "<td width='600;'>" . FormatCreditCard(MaskCreditCard(($cardnum))) . "</td>";
			/* echo "<input type='hidden' name='pmid' value='" . $row['PM_id'] . "' >"; */
			//echo "<tr>" . "<td>"  . "Card number: " . "<input type='text' placeholder='XXXX XXXX XXXX XXXX' name='cardnum'>" . "</td>" . "</tr>";
			//echo "<tr>" . "<td>"  . "Security Number: " . "<input type='text' placeholder='***' name='secnum'>" . "</td>" . "</tr>";
			//echo "<tr>" . "<td>"  . "Expiration date: " . "<input type='text' placeholder='(MM/YY)' name='expdate'>" . "</td>" . "</tr>";
			//echo "<td width='1000' height='100' align= 'right'>"  . "<input type='submit' name='confirm' value='Proceed to checkout'>" . "</td>";
			echo "</tr>";
			echo "</table>";
			//echo "</form>";
						
			// Paintings, price, and shipping
			$paint=("SELECT * from Images JOIN Products ON Image_id = Products_image_id JOIN Inventory ON Products_id = Inventory_id JOIN Shopping_cart ON Inventory_id = SC_Inventory_id JOIN Accounts ON Account_id = SC_account_id where SC_account_id = $antid");
			echo "<tr>" . "<td>"  . "<h3> 3) Paintings + Shipping </h3>" . "</td>" . "</tr>";
			echo "<table>";
			
			$result=mysql_query($paint);
			while($row = mysql_fetch_array($result)){
			//set variables for the rows
			$name = $row['Products_display_name'];
			$price = $row['SC_unit_price'];
			$invId = $row['SC_inventory_id'];
			$quant = $row['SC_order_quantity'];
			
			echo "<tr>" . "<td width='330'>" . "<b>" . $name . "</b>" . "</td>"  . " " . "<td width='330'>" . "QTY: " . $quant . "</td>" . "<td width='330'>" . "Price: $" . $price . "</td>" . "</tr>";
			}
			$query =("SELECT SC_unit_price * SC_order_quantity  as price FROM Shopping_cart WHERE SC_account_id = '$antid'");
			$result = mysql_query($query);
			
			while($row = mysql_fetch_array($result)){
			$item = $row[0];
			$sub += $item;
			}
			echo "<form action='confirm.php' action'POST'>";
			// total price calculation
			echo "<table>";
			$shipping = 3.00;
			$tax = 0.075;
			$taxtot = $tax * $sub;
			$addtax = $taxtot + $sub;
			$total = $addtax + $shipping;
			//display item name, quantity, and name
			echo "<tr>";
			//hidden input types
			echo "<input type='hidden' name='scid' value='" . $row['SC_id'] . "' >";
			echo "<input type='hidden' name='invid' value='" . $row['SC_inventory_id'] . "' >";
			echo "<input type='hidden' name='price' value='" . $row['SC_unit_price'] . "' >";
			echo "<input type='hidden' name='quantity' value='" . $row['SC_order_quantity'] . "' >";
			echo "<td width='1000' height='100' align= 'right'>" . "Shipping: $" . number_format($shipping,2) . "<br /><br />" . "Tax: $" . number_format($taxtot,2) . "<br /><br />" . "Total: $" . number_format($total,2) . "</td>";				
			//place order button, form action='payment.php' method='POST'
			echo"<td width='1000' height='100' align= 'right'>"  . "<input type='submit' name='order' value='Place your order'>" . "</td>";
			echo "</tr>";				
			echo "</table>";
			echo "</form>";	
			mysql_close($link);
			?>
		</div>
	</div>
				
<?php
include "includes/footer.php";
?>
</body>


</html>