<html>
<head>
<title>Paintings Shop</title>
<link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
<?php 
include "includes/header.php";
?>
<div id="container">
	<div id="content">
<?php
/* The connection to mysql Database */
include "Lib_logon.php";
$link = mysql_connect($db_host, $db_user, $db_pass);
mysql_select_db("Paul") or die(mysql_error());

$result = mysql_query("SELECT Images.Image_url, Products.Products_display_name, Products.Products_description, Products.Products_unit_price FROM Images INNER JOIN Products ON Images.Image_id = Products.Products_image_id") or die(mysql_error());
	echo "<table border='1' align='center' colspan='2'>" ;
while($row = mysql_fetch_array($result))
{

	
	echo "<tr >";
	echo "<td width='300' height='100'>" . "<img src=" . $row['Image_url'] . "/>" . "</td>";
	echo "<td width='300' height='100' align='left'>" . "<b>" . $row['Products_display_name'] . "</b>" . "<br />" . $row['Products_description'] . "</td>";
	echo "<td width='300' height='100' align='center'>" . $row['Products_unit_price'] . "</td>";
	echo "</tr>";
	
}
	echo "</table>";
?>

	</div>
</div>
<?php
include "includes/footer.php";
?>
</body>
</html>