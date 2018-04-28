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
//connection to the database
include 'Lib_logon.php';
$link = mysql_connect($db_host, $db_user, $db_pass);
mysql_select_db('Paul') or die(mysql_error());

//input data
if(isset($_POST['submit'])){

//set variables
	$quant = $_POST['quantity'];
	$price1 = $_POST['price'];
	$invid1 = $_POST['invid'];
	$scid1 = $_POST['scid'];
	
//loop through shopping cart

$query = ("SELECT * from Shopping_cart Where SC_id = $scid1 AND SC_account_id = $antid");
$result = mysql_query($query);
	while($row = mysql_fetch_array($result)){
	$price = $row['SC_unit_price'];
	$quantity =  $row['SC_order_quantity'];
	$invid = $row['SC_inventory_id'];
	}
	$query = ("INSERT into Order_details(Order_details_header_id, Order_details_line_number, Order_details_date, Order_details_inventory_id, Order_details_ordered_quantity, Order_details_cancelled_quantity, Order_details_unit_price, Order_details_discount_percentage, Order_details_discount_amount, Order_details_created_date, Order_details_created_by, Order_details_last_updated_date, Order_details_last_updated_by)VALUES('$ordnum', '$scid1', now(), '$invid1', '$quant', '0', '$price1', '0', '0', now(), '$fname $lname','now()', '$fname $lname')");
	$result = mysql_query($query);
}
mysql_close($link);
?>