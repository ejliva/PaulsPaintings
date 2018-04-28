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
				
				function MaskCreditCard($cc){
				// Get the cc Length
				$cc_length = strlen($cc);
				// Replace all characters of credit card except the last four and dashes
				for($i=0; $i<$cc_length-4; $i++){
				if($cc[$i] == '-'){continue;}
				$cc[$i] = 'X';
				}
	
				// Return the masked Credit Card #
				return $cc;

				}
				function FormatCreditCard($cc){
				// Clean out extra data that might be in the cc
				$cc = str_replace(array('-',' '),'',$cc);
				// Get the CC Length
				$cc_length = strlen($cc);
				// Initialize the new credit card to contian the last four digits
				$newCreditCard = substr($cc,-4);
				// Walk backwards through the credit card number and add a dash after every fourth digit
				for($i=$cc_length-5;$i>=0;$i--){
				// If on the fourth character add a dash
				if((($i+1)-$cc_length)%4 == 0){
				$newCreditCard = '-'.$newCreditCard;
				}
				// Add the current character to the new credit card
				$newCreditCard = $cc[$i].$newCreditCard;
				}
				// Return the formatted credit card number
	
				return $newCreditCard;
}
				
						
						//The payment table
						$payment = ("Select * from Payment_method Join Accounts ON Account_id = PM_account_id where PM_account_id=$antid");
						$result = mysql_query("$payment");
						echo "<form action='confirm.php' action'POST'>";
						echo "<table>";
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
						echo "<input type='hidden' name='pmid' value='" . $row['PM_id'] . "' >";
						echo "<tr>" . "<td>"  . "<h3> 1) Shipping Address </h3>" . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . $fname . " " . $lname . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . $add1 . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . $add2 . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . $city . " " . $state . " " . $zip . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . $country . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . "<h3> 2) Payment Method </h3>" . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . $fname . " " . $lname . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . $add1 . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . $add2 . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . $city . " " . $state . " " . $zip . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . $country . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . "Choose Payment: " . "</td>" . "</tr>";
						//echo "<tr>" . "<td>"  . "<input type='radio' name='PM_type'>" . "</td>" . "</tr>";
						//echo "<tr>" . "<td>" . "<input type='radio' name='pmtype' value='$type'>" . $type . "</td>" . "</tr>";
						//echo "<tr>" . "<td>" . FormatCreditCard(MaskCreditCard(($cardnum))) . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . "Card number: " . "<input type='text' placeholder='XXXX XXXX XXXX XXXX' name='cardnum'>" . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . "Security Number: " . "<input type='text' placeholder='***' name='secnum'>" . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . "Expiration date: " . "<input type='text' placeholder='(MM/YY)' name='expdate'>" . "</td>" . "</tr>";
						echo "<tr>" . "<td width='1000' height='100' align= 'right'>"  . "<input type='submit' name='confirm' value='Confirm'>" . "</td>" . "</tr>";
						echo "</table>";
						}
						echo "</form>";
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
						echo "<table>";
						echo "<h3> 1) Shipping Address </h3>";
						//echo "<form action='edit.php' action'POST'>";
						echo "<tr>" . "<td>"  . $fname . " " . $lname . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . $add1 . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . $add2 . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . $city . " " . $state . " " . $zip . "</td>" . "</tr>";
						echo "<tr>" . "<td>"  . $country . "</td>" . "</tr>";
						//echo "<tr>" . "<td>" . "<a href='edit.php'>Edit</a>" . "</td>" . "</tr>";
						//echo "</form>";
						echo "</table>";
						
?>