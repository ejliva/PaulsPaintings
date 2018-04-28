<?php
session_start(); // starting session


include 'Lib_logon.php';
$link = mysql_connect($db_host, $db_user, $db_pass);
mysql_select_db('Paul') or die(mysql_error());



function NewUser()
{
$fname = ($_POST['Account_firstname']);
$lname = ($_POST['Account_lastname']);
$add1 = ($_POST['Account_address1']);
$add2 = ($_POST['Account_address2']);
$city = ($_POST['Account_city']);
$state = ($_POST['Account_state_region']);
$pcode = ($_POST['Account_postal_code']);
$country = ($_POST['Account_country']);
$phone = ($_POST['Account_phone_number']);
$email = ($_POST['Account_email_address']);
$username = ($_POST['Login_username']);
$password = (md5($_POST['Login_password']));
$paytype = ($_POST['PM_type']);
$cardnum = ($_POST['PM_number']);
$secnum = ($_POST['PM_card_security_code']);
$exDate = ($_POST['PM_exp_date']);
$query = "INSERT INTO Paul.Accounts (Account_firstname, Account_lastname, Account_address1, Account_address2, Account_city, Account_state_region, Account_postal_code, Account_country, Account_phone_number,  Account_email_address) VALUES('$fname','$lname', '$add1', '$add2', '$city', '$state', '$pcode', '$country', '$phone', '$email')";
$result = mysql_query($query) or die(mysql_error());
$id = mysql_insert_id();
$query = "INSERT INTO Paul.Login (Login_username, Login_password, Login_status, Login_account_id, Login_created_date, Login_created_by ) VALUES('$username','$password', 'Active', '$id', now(), '$fname $lname' )";
$result = mysql_query($query) or die(mysql_error());
$query = "INSERT INTO Paul.Payment_method (PM_type, PM_number, PM_card_security_code, PM_exp_date, PM_Account_id, PM_start_date, PM_created_date, PM_created_by, PM_last_updated_date) VALUES('$paytype','$cardnum', '$secnum', '$exDate', $id, now(), now(), '$fname $lname', now())";
$result = mysql_query($query) or die(mysql_error());
}


function Register()
{
	if (empty($_POST['Login_username']) || empty($_POST['Login_password']) || empty($_POST['confirm_password']) || empty($_POST['Account_firstname']) || empty($_POST['Account_lastname']) || empty($_POST['Account_address1']) || empty($_POST['Account_city']) || empty($_POST['Account_state_region']) || empty($_POST['Account_postal_code']) || empty($_POST['Account_country']) || empty($_POST['Account_phone_number']) || empty($_POST['Account_email_address']) || empty($_POST['PM_type']) || empty($_POST['PM_number']) || empty($_POST['PM_card_security_code']) || empty($_POST['PM_exp_date']))
	{
		echo "<FONT COLOR='red'>Please fill out all the fields.</FONT>";

	} elseif ($_POST['Login_password'] != $_POST['confirm_password'])
		{
			echo "<FONT COLOR='red'>Password do not match.</FONT>";

		}else {
				$dup = mysql_query("SELECT * FROM Paul.Login WHERE Login_username='$_POST[Login_username]'");
					if(mysql_num_rows($dup) > 0){


					echo "<FONT COLOR='red'>Username already exist</FONT>";

					}
					else {
						NewUser();
					}
		}

}
if (isset($_POST['Submit']))
{
	Register(); 
	echo "Thank you for registering! <br />";
	echo "<a href=index.php>Click here to Login!<a/>";
}

mysql_close($link);

?>
