<?php
// starting session
session_start();

// set account session
if(isset($_SESSION['antid']));
{
	$antid = $_SESSION['antid'];
}
if(isset($_SESSION['fname1']));
{
	$fname = $_SESSION['fname1'];
}
if(isset($_SESSION['lname']));
{
	$lname = $_SESSION['lname'];
}

//connection
include 'Lib_logon.php';
$link = mysql_connect($db_host, $db_user, $db_pass);
mysql_select_db('Paul') or die(mysql_error());

//input data
if(isset($_POST['submit'])){

//set variables
	$quant = $_POST['stock'];
	$invid = $_POST['Inventory_id'];
	$price = $_POST['Products_unit_price'];
	
	
	if(!empty($quant)){
		if($quant == 1){
			$query = mysql_query("SELECT * FROM Shopping_cart WHERE SC_inventory_id = '$invid' AND SC_account_id = '$antid'");
			$rows = mysql_num_rows($query);
				if ($rows == 1) {
					echo"Painting is already in the cart." . "<br /><br />" . "<a href= products.php>Return to Paintings</a>";
				}
				else
					$query =("INSERT into Paul.Shopping_cart(SC_account_id, SC_inventory_id, SC_order_quantity, SC_unit_price, SC_discount_percentage, SC_discount_amount, SC_created_date, SC_created_by)Values('$antid','$invid','$quant','$price', '0', '0', now(),'$fname $lname')");
					$result = mysql_query($query,$link) or die(mysql_error());
			}else
					echo "Only 1 painting available." . "<br /><br />" . "<a href= products.php>Return to Paintings</a>";
		}else
			echo "Please enter quantity." . "<br /><br />" . "<a href= products.php>Return to Paintings</a>";
	}
	
	//next page
	header("location: cart.php");

mysql_close($link);
?>