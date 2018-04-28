<html>
<title>Paul</title>

<body><center>Paul</center>

<p>

<?PHP>

/* The connection to mysql Database */

include 'Lib_logon.php';

$link = mysql_connect($db_host, $db_user, $db_pass);

if (!$link)

{
 die('Could not connect: ' . mysql_error()."-".mysql_error()."<BR>");
}

else

{
 echo 'Connected successfully <BR>';
}

$db_query = ("INSERT INTO Paul.Login(Login_username,Login_password) VALUES
            ('carl','111')");

//execute query

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