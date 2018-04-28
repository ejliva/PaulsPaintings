<?php
session_start();// Start the session

?>
<html>
<head>
<title>Paintings Shop</title>
<link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
<?php
include "includes/header2.php";
?>
<div id="container">
	<div id="content">
<?php
/* The connection to mysql Database */
include "Lib_logon.php";
$link = mysql_connect($db_host, $db_user, $db_pass);
mysql_select_db("Paul") or die(mysql_error());

$query = ("SELECT * FROM Products Join Images ON Products_image_id = Image_id JOIN Inventory ON Inventory_product_id = Products_id ") or die(mysql_error());
$result = mysql_query($query) or die(mysql_error());
echo "<h3>Paintings</h3>";
echo "<table border='1' align='center' colspan='2'>" ;
while($row = mysql_fetch_array($result))
{

	echo "<form action='addtocart.php' method='POST'>";
	echo "<tr >";
	echo "<td width='300' height='300'>" . "<img src= " . $row['Image_url'] . " width='300' height='300' />" . "</td>";
	echo "<td width='500' height='300' align='left'>" . "<b>" . $row['Products_display_name'] . "</b>" . "<br />" . $row['Products_description'] . "<br /> <br />" . "<b>" . "<font color ='red'>" . "Only " . $row['Inventory_units_in_stock'] . " left in stock" . "</font>" . "</b>" . "<br /> <br />" . "QTY: " . "<input type='text' name='stock' size='4'>" . "</td>";
	echo "<input type='hidden' name='Inventory_id' value='" . $row['Inventory_id'] . "' >";
	echo "<input type='hidden' name='Products_unit_price' value='" . $row['Products_unit_price'] . "'>";
	echo "<td width='300' height='300' align='center'>" . "$" . $row['Products_unit_price'] . "<br /> <br />" . "<input type= 'submit' value='Add to cart' name='submit'>" . "</td>";
	echo "</tr>";
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