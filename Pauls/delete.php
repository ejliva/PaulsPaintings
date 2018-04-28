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
$_SESSION['subtotal'] -= ($price * $quan);
$query=("delete from Shopping_cart WHERE SC_id = '$scid'");
$result = mysql_query($query);

header("location: cart.php");
}
mysql_close($link);
?>