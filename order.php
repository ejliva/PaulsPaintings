<?php
//start session
session_start();
// setting variable for account id
if(isset($_SESSION['antid']));
{
	$antid = $_SESSION['antid'];
}


//connection
include 'Lib_logon.php';
$link = mysql_connect($db_host, $db_user, $db_pass);
mysql_select_db('Paul') or die(mysql_error());
$scid = $_POST['scid']; 
$quant = $_POST['quantity'];
$invid = $_POST['invid'];
$price = $_POST['price'];

if(isset($_POST['submit'])){
$query=("select * from Shopping_cart Join Accounts ON SC_account_id = Account_id JOIN Payment_method ON PM_account_id = Account_id where SC_account_id = $antid");
$result=mysql_query($query);
while($row = mysql_fetch_array($result)){
for($num = 0; $num <= $_POST['submit']; $num++;

}
$query=("INSERT into Order_headers(Order_header_id, Order_header_number, Order_header_orderdate, Order_header_salesperson_id, Order_header_account_id, Order_header_status_id, Order_header_discount_percentage, Order_header_discount_amount, Order_header_pm_id, Order_header_created_date, Order_header_created_by, Order_header_last_updated_date, Order_header_last_updated_by)VALUES('', '$num', now(), '', '$antid', '$x', '0', '0', '$pmid', now(), 'Earl John Liva', now(), 'Earl John Liva')");
$result = mysql_query($query);
header("location: checkout.php");
}
mysql_close($link);


?>