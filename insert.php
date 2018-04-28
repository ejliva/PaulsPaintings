<html>
<title>Paul</title>

<body><center>Paul</center>

<p>

<?PHP

/* The connection to mysql Database */

include 'Lib_logon.php';
$link = mysql_connect($db_host, $db_user, $db_pass);
mysql_select_db('Paul') or die(mysql_error());

if (!$link)

{
 die('Could not connect: ' . mysql_error()."-".mysql_error()."<BR>");
}

else

{
 echo 'Connected successfully <BR>';
}

$db_query=("truncate table Order_details");

//$db_query =("drop table Order_details");

/* $db_query =("Create table Order_details(
Order_details_id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(Order_details_id),
Order_details_header_id INT,
Order_details_line_number INT,
Order_details_date DATETIME,
Order_details_inventory_id INT,
Order_details_ordered_quantity INT,
Order_details_cancelled_quantity INT,
Order_details_unit_price DOUBLE,
Order_details_discount_percentage DOUBLE,
Order_details_discount_amount DOUBLE,
Order_details_created_date DATETIME,
Order_details_created_by VARCHAR(100),
Order_details_last_updated_date DATETIME,
Order_details_last_updated_by VARCHAR(100))"); */


/* $db_query =("Create table Order_headers(
Order_header_id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(Order_header_id),
Order_header_number INT,
Order_header_orderdate DATETIME,
Order_header_salesperson_id INT,
Order_header_account_id INT,
Order_header_status_id INT,
Order_header_discount_percentage DOUBLE,
Order_header_discount_amount DOUBLE,
Order_header_pm_id INT,
Order_header_created_date DATETIME,
Order_header_created_by VARCHAR(100),
Order_header_last_updated_date DATETIME,
Order_header_last_updated_by VARCHAR(100))"); */


//$db_query ="truncate table General_lookup";

//$db_query =("insert into General_lookup values('1','Credit Card','VISA',now(),NULL,now(),'Autoloaded',NULL,NULL)");

//$db_query =("insert into General_lookup values('2','Credit Card','MASTERCARD',now(),'NULL',now(),'Autoloaded',NULL,'NULL');");

//$db_query =("insert into General_lookup values('3','Credit Card','DISCOVERER',now(),'NULL',now(),'Autoloaded',NULL,'NULL');");

//$db_query =("insert into General_lookup values('4','Credit Card','AMERICAN EXPRESS',now(),NULL,now(),'Autoloaded',NULL,NULL);");

//$db_query =("insert into General_lookup values('5','Credit Card','DEBIT',now(),NULL,now(),'Autoloaded',NULL,'NULL');");

//$db_query =("insert into General_lookup values('6','Non Credit Card','CASH',now(),now(),now(),'Autoloaded',NULL,NULL);");

//$db_query =("insert into General_lookup values('7','Non Credit Card','CHECK',now(),now(),now(),'Autoloaded',NULL,NULL);");

//$db_query =("insert into General_lookup values('8','Order Number','000001',now(),now(),now(),'Autoloaded',NULL,NULL);");

//$db_query =("insert into General_lookup values('9','Shipping Method','USPS',now(),now(),now(),'Autoloaded',NULL,NULL);");

//$db_query =("insert into General_lookup values('10','Shipping Method','Delivery Truck',now(),now(),now(),'Autoloaded',NULL,NULL);");

//$db_query =("insert into General_lookup values('11','Shipping Method','FED EX',now(),now(),now(),'Autoloaded',NULL,NULL);");

//$db_query =("insert into General_lookup values('12','Shipping Method','UPS',now(),now(),now(),'Autoloaded',NULL,NULL);");

//$db_query =("insert into General_lookup values('13','Shipping Method','Customer Pickup',now(),now(),now(),'Autoloaded',NULL,NULL);");


if (!$result = @mysql_query($db_query, $link))


{
 $result = 0;

 die('Error executing query:'.mysql_error()."-".mysql_error()."<BR>");
}

else

{
  // $fields = @mysql_num_fields($result);

  //retrieve and print first row of data only

  $array = mysql_fetch_array($result);

  $out_status = $array[0];

  echo $array[0]." ";

  echo $array[1]." ";

  echo $array[3]." ";

  echo mysql_result($result, 3,1); // outputs fourth record, second field

  print("<BR><BR>");

  // retrieve and print entire table

  $result = @mysql_query($db_query,$link); // force requery to start again.

  while ($array = mysql_fetch_array($result))

  {
    print ("<FONT COLOR ='red'>$array[0] $array[1] $array[2]</FONT><BR>");
  }

}


mysql_close($link);

?>

</p>

</body>

</html>