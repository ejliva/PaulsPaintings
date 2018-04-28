<?php

// Sessions validation between pages

session_start();

$SID = session_id();

echo 'Sessions Page Two <br />';

echo $_SESSION['user'];

echo '<br />'.$SID;

echo ' <BR /><BR /><BR />';

echo '<a href="Sessions.php"> Sessions Page One </a>';

echo ' <BR /><BR /><BR />';

echo ' <a href="Sessions3.php"> Sessions Logout Page</a>';


?>