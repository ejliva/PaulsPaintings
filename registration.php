<?php
//starting session
session_start(); 

//Connecting to database
include 'Lib_logon.php';
$link = mysql_connect($db_host, $db_user, $db_pass);
mysql_select_db('Paul') or die(mysql_error());


if(isset($_POST['Submit'])){
//if the fields are empty the user will not be able to register.
//If password do not match user will not be able to register.
//All fields must be filled to register.
//If username is already in the database it will not be able to add another.

if(empty($_POST['Account_firstname']) || empty($_POST['Account_lastname']) || empty($_POST['Account_email_address']) || empty($_POST['Login_username']) || empty($_POST['Login_password']) || empty($_POST['Confirm_password']))
	{
		echo "<FONT COLOR='red'>Please fill out all the fields.</FONT>";

	} elseif ($_POST['Login_password'] != $_POST['Confirm_password'])
		{
			echo "<FONT COLOR='red'>Password do not match.</FONT>";

		}else {
		//Set variables to enter into the database
		$fname = ($_POST['Account_firstname']);
		$lname = ($_POST['Account_lastname']);
		$email = ($_POST['Account_email_address']);
		$username = ($_POST['Login_username']);
		$password = (md5($_POST['Login_password']));
		$confirm = (md5($_POST['Confirm_password']));
				$dup = mysql_query("SELECT * FROM Paul.Login WHERE Login_username='$_POST[Login_username]'");
					if(mysql_num_rows($dup) > 0){
					
					echo "<FONT COLOR='red'>Username already exist</FONT>";

					}
					else {
						$account=("INSERT INTO Accounts (Account_firstname, Account_lastname, Account_email_address) VALUES('$fname','$lname', '$email')");
						$result = mysql_query($account) or die(mysql_error());
						$_SESSION['fname1'] = $fname;
						$id = mysql_insert_id();
						$login = ("INSERT INTO Paul.Login (Login_username, Login_password, Login_status, Login_account_id, Login_created_date, Login_created_by ) VALUES('$username','$password', 'Active', '$id', now(), '$fname $lname' )");
						$result = mysql_query($login) or die(mysql_error());
						
						echo "Thank you for registering!!." . "<br /><br />" . "<a href= index.php>Login</a>";
					}
					header("location: index.php");
		}

//echo "Thank you for registering! <br />";
//echo "<a href=index.php>Click here to Login!<a/>";
}
 
	

mysql_close($link);

?>
