<?php
//start session
session_start();
// setting variable for account id
if(isset($_SESSION['antid']));
{
	$antid = $_SESSION['antid'];
}

// connection
include "Lib_logon.php";
$link = mysql_connect($db_host, $db_user, $db_pass);
mysql_select_db("Paul") or die(mysql_error());

$pid = $_POST['pmid'];
if(isset($_POST['confirm'])){
$query=("select * from Payment_method where PM_account_id = $antid");
$result= mysql_query($result);
if($pid == $antid){
	

}
$query=("DROP  table Shoping_cart");
$result=mysql_query($query);
header("location: receipt.php");

mysql_close($link);   
?>

