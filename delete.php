<?php
// starting session
session_start();

// set account session
if(isset($_SESSION['antid']));
{
	$antid = $_SESSION['antid'];
}
//connection
include 'Lib_logon.php';
$link = mysql_connect($db_host, $db_user, $db_pass);
mysql_select_db('Paul') or die(mysql_error());


if(isset($_POST['delete'])){
$scid = $_POST['SC_id'];
$q= ("SELECT * from Shopping_cart Where SC_id = '$scid'");
$result = mysql_query($q,$link);
$row = mysql_fetch_array($result);
$quan = $row['SC_order_quantity'];
$price = $row['SC_unit_price'];
$total -= ($price * $quan);
$query=("delete from Shopping_cart WHERE SC_id = '$scid'");
$result = mysql_query($query);

header("location: cart.php");
}

$scid = $_POST['scid']; 
$quant = $_POST['quantity'];
$invid = $_POST['invid'];
$price = $_POST['price'];

if(isset($_POST['submit'])){
$query=("select * from Shopping_cart Join Accounts ON SC_account_id = Account_id JOIN Payment_method ON PM_account_id = Account_id where SC_account_id = $antid");
$result=mysql_query($query);
while($row = mysql_fetch_array($result)){
$x = 0;

}
$query=("SELECT * from Order_status where OS_id ='1'");
$result=mysql_query($query);
$row = mysql_fetch_array($result);
$osid = $row['OS_id'];
$query=("INSERT into Order_headers(Order_header_id, Order_header_number, Order_header_orderdate, Order_header_salesperson_id, Order_header_account_id, Order_header_status_id, Order_header_discount_percentage, Order_header_discount_amount, Order_header_pm_id, Order_header_created_date, Order_header_created_by, Order_header_last_updated_date, Order_header_last_updated_by)VALUES('', '$num', now(), '', '$antid', '$x', '0', '0', '$pmid', now(), 'Earl John Liva', now(), 'Earl John Liva')");
$result = mysql_query($query);
}
header("location: checkout.php");
mysql_close($link);
?>