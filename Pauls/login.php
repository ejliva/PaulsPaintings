<?php
session_start(); // starting session


include 'Lib_logon.php';
$link = mysql_connect($db_host, $db_user, $db_pass);
mysql_select_db('Paul') or die(mysql_error());


if (isset($_POST['submit'])) {
if (empty($_POST['Login_username']) || empty($_POST['Login_password']))
{
echo "<FONT COLOR='red'>Please enter username and password</FONT>";
}
else
{

$username = $_POST['Login_username'];
$pass = (md5($_POST['Login_password']));

$query = mysql_query("SELECT * FROM Login JOIN Accounts ON Login_account_id = Account_id WHERE Login_username = '$username' AND Login_password='$pass'", $link);
$rows = mysql_num_rows($query);
if ($rows == 1) {
$data = mysql_fetch_assoc($query);
$accountid = $data['Account_id'];
$_SESSION['antid'] = $accountid;
$fname1 = $data['Account_firstname'];
$_SESSION['fname1'] = $fname1;
$query = mysql_query("INSERT into Paul.LoginLog (LoginLog_login_username, LoginLog_login_password, LoginLog_login_id, LoginLog_login_date, LoginLog_logout_date) VALUES('$username', '$pass','1', NOW(), NOW())");
$_SESSION['user'] = $username;
header("location: products.php");
}
else
{
$query = mysql_query("INSERT into Paul.LoginLog (LoginLog_login_username, LoginLog_login_password, LoginLog_login_id, LoginLog_login_date, LoginLog_logout_date) VALUES('$username', '$pass','0', NOW(), NOW())");
echo "<FONT COLOR='red'>Username or Password is invalid</FONT> <br />";
echo "<a href= index.php>Please try again</a>";
}

}
mysql_close($link);
}

?>
</body>
</html>