<?php

// starting the session

$user = 'Not Logged In';

session_start();

echo 'Sessions Page One <br />';

$SID = session_id();

$_SESSION['user'] = 'Authorized User';

if(isset($_SESSION['user']))

{
	//code for Logged members

	//Identifying the user

	$user = $_SESSION['user'];

	// Information for the user.
}

else

{
	// Code to show Guests

	$user = 'Guest';
}

echo $user;

echo '<br/>'.$SID;

echo ' <BR /><BR /><BR />';

echo '<a href ="Sessions2.php">Sessions Page Two</a>';

?>