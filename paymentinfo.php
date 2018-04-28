<?php
session_start();
if(isset($_SESSION['antid']));
{
	$antid = $_SESSION['antid'];
}

?>
<html>
<head>
	<title>Account</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
<body>
	<?php
	include "includes/header2.php";
	?>
	<div id="container">
		<div id="content">
			<h3>Account Information</h3>
				<?php
					include "Lib_logon.php";
					$link = mysql_connect($db_host, $db_user, $db_pass);
					mysql_select_db("Paul") or die(mysql_error());

					$query=("SELECT * from Accounts where Account_id = $antid");
					$result = mysql_query($query);
					echo "<table border='1' align='center' colspan='2'>" ;
						while($row = mysql_fetch_array($result)){
							echo "<form action='update.php' action'POST'>";
							echo "<p>" . $row['Account_firstname'] . "</p>";
							echo "<p>" . $row['Account_lastname'] . "</p>";
							echo "<p>" . $row['Account_address1'] . "</p>";
							echo "<p>" . $row['Account_city'] . "</p>";
							echo "</form>";
						}
							echo "</table>";
							mysql_close($link);
				?>
		</div>
	</div>
				
<?php
include "includes/footer.php";
?>
</body>


</html>