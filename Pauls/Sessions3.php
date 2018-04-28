<?php

// Sessions logout

session_start();

echo'<B>Sessions Logout Page Before Logout <B/><br /><br />';

echo'User: '.$_SESSION['user'];

echo '<br />ID: '.session_id();

if(isset($_SESSION['user']))

	{echo'<br />Session is still active <br />';}

	else

	{echo'<br />Session is not active <br />';}

echo 'Session Status Variable: '. session_status();

session_unset();

session_destroy();

echo' <BR /><BR /><br /><B>Sessions Logout Page After Logout </B><br /><br />';

echo 'User: '.$_SESSION['user'];

echo'<br/>ID: '.session_id();

if(isset($_SESSION['user']))

	{echo '<br />Session is still active<BR />';}

else

	{echo ' <br/>Session is not active<BR />';}

echo 'Session Status Variable:'.session_status();

echo ' <BR /><BR />';

echo '<a href= "main.html">Home Page </a>';



?>