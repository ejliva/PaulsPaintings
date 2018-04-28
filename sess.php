<?php
include 'Lib_logon.php';
$link = mysql_connect($db_host, $db_user, $db_pass);
mysql_select_db('Paul') or die(mysql_error());
session_start();// Starting Session
// Storing Session
$user_check = $_SESSION['user'];
$fname_check = $_SESSION['firstname'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select Login_username from Paul.Login where Login_username = '$user_check'");
$row = mysql_fetch_assoc($ses_sql);
$id = mysql_insert_id();
$ses_sql=mysql_query("select Account_firstname from Paul.Accounts where Account_firstname = '$fname_check'");
$user = $row['user'];
if(!isset($login_session)){
mysql_close($connection); // Closing Connection
header('Location: products.php'); // Redirecting To Home Page
}
?>