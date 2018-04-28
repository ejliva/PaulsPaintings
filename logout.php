<?php
session_start();
if(isset($_SESSION['antid']));
{
	$antid = $_SESSION['antid'];
}
session_unset($antid);
if(session_destroy()) // Destroying All Sessions
{
header("Location: index.php"); // Redirecting To Home Page
}
?>