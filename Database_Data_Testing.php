<?php

//warning: Remember that the database and php is case sensitive. This is going to work on my
//site, but you may have entered a different case sensitivity so check that and the spelling.

error_reporting(E_ERROR | E_PARSE);
include 'Lib_logon.php';
$link = mysql_connect($db_host, $db_user, $db_pass) or die("Couldn't make connection.");
//$db = mysql_select_db($db_dbname, $link) or die("Couldn't select database");
$db = mysql_select_db($db_dbname, $link) or
    $db = mysql_select_db($db_dbname1, $link)
    or die("Couldn't select database");

    echo '<a id="top"></a>';

    print "<h3 style='text-align:center'>If data has been inserted correctly you will see results under the heading name</h1>";


    echo 'Tables:<br /> <a href="#Products">Products</a> | <a href="#Login">Login</a> | <a href="#Accounts">Accounts</a> | <a href="#Loginlog">Loginlog</a> | <a href="#Inventory">Inventory</a> | <a href="#Employee">Employee</a> | <a href="#Order_headers">Order headers</a> | ';
    echo '        <a href="#Order_details">Order details</a> | <a href="#Shipping">Shipping</a> | <a href="#Invoice">Invoice</a> | <a href="#Privileges">Privileges</a> | <a href="#Vendor">Vendor</a> | <a href="#Images">Images</a> | <a href="#Accounts_type">Accounts Type</a> | ';
    echo '        <a href="#Order_status">Order status</a> | <a href="#General_lookup">General Lookup</a> | <a href="#Payment_method">Payment_method</a> | <a href="#Shopping_cart">Shopping Cart</a> ';



    echo '<a id="Products"></a>';
    print "<hr color='#000000' style='margin-top:20px;'>";

	$query = "select * from Products";
	$result = mysql_query($query);
	$row_count = mysql_num_rows($result);
			print "<h2 style='margin:0;'>Products</h2>";
			print "<span>Table Name (Products)</span>";
	while($row = mysql_fetch_assoc($result))
	{
		echo "<table cellpadding=10 border=1>";
		print "<tr>";
			print "<td width='50px' height='50px'>" . $row['Products_id'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Products_name'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Products_item_number'] . "</td>";
			print "<td width='100px' height='50px'>" . $row['Products_display_name'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Products_unit_price'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Products_discounted_unit_price'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Products_quantity_per_unit'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Products_image_id'] . "</td>";
			print "<td width='1000px' height='50px'>" . $row['Products_description'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Products_status'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Products_start_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Products_end_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Products_notes'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Products_created_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Products_created_by'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Products_last_updated_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Products_last_updated_by'] . "</td>";
		echo "</tr>";
		echo "</table>";
	}
    echo ' <BR /><BR />';
    echo '<a href="main.html">Home page</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#top">Go to Top</a> ';


        echo '<a id="Login"></a>';
	print "<hr color='#000000' style='margin-top:20px;'>";


	$query = "select * from Login";
	$result = mysql_query($query);
	$row_count = mysql_num_rows($result);
		print "<h2 style='margin:0;'>Login</h2>";
		print "<span>Table Name (Login)</span>";
	while($row = mysql_fetch_assoc($result))
	{
		echo "<table cellpadding=10 border=1>";
		print "<tr>";
		print "<td width='50px' height='50px'>" . $row['Login_id'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['Login_username'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['Login_password'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['Login_end_date'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['Login_status'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['Login_employee_id'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['Login_account_id'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['Login_last_login_date'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['Login_created_date'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['Login_created_by'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['Login_last_update_date'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['Login_last_update_by'] . "</td>";
		echo "</tr>";
		echo "</table>";
	}

    echo ' <BR /><BR />';
    echo '<a href="main.html">Home page</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#top">Go to Top</a> ';


        echo '<a id="Accounts"></a>';
	print "<hr color='#000000' style='margin-top:20px;'>";

	$query = "select * from Accounts";
	$result = mysql_query($query);
	$row_count = mysql_num_rows($result);
			print "<h2 style='margin:0;'>Accounts</h2>";
			print "<span>Table Name (Accounts)</span>";
	while($row = mysql_fetch_assoc($result))
	{
		echo "<table cellpadding=10 border=1>";
		print "<tr>";
		print "<td width='50px' height='50px'>" . $row['Account_id'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['Account_lastname']  . "</td>";
		print "<td width='50px' height='50px'>" . $row['Account_firstname']  . "</td>";
		print "<td width='50px' height='50px'>" . $row['Account_middlename'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['Account_name_suffix'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['Account_altname'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['Account_address1'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['Account_address2'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['Account_city'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['Account_state_region'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['Account_postal_code'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['Account_country'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['Account_type_id'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['Account_status'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['Account_email_address'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['Account_send_email_yn'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['Account_salutation (Mr., Mrs, Ms, Miss, Dr., etc)'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['Account_phone_number'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['Account_fax_number'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['Account_text_number'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['Account_send_text_yn'] . "</td>";
		echo "</tr>";
		echo "</table>";
	}

    echo ' <BR /><BR />';
    echo '<a href="main.html">Home page</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#top">Go to Top</a> ';

        echo '<a id="Loginlog"></a>';
	print "<hr color='#000000' style='margin-top:20px;'>";
	$query = "select * from LoginLog";
	$result = mysql_query($query);
	$row_count = mysql_num_rows($result);
		print "<h2 style='margin:0;'>LoginLog</h2>";
		print "<span>Table Name (Loginlog)</span>";
	while($row = mysql_fetch_assoc($result))
	{
		echo "<table cellpadding=10 border=1>";
		print "<tr>";
		print "<td width='50px' height='50px'>" . $row['LoginLog_id'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['LoginLog_login_username'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['LoginLog_login_password'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['LoginLog_login_id'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['LoginLog_login_date'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['LoginLog_logout_date'] . "</td>";
		echo "</tr>";
		echo "</table>";
	}

    echo ' <BR /><BR />';
    echo '<a href="main.html">Home page</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#top">Go to Top</a>';

        echo '<a id="Inventory"></a>';
	print "<hr color='#000000' style='margin-top:20px;'>";

	$query = "select * from Inventory";
	$result = mysql_query($query);
	$row_count = mysql_num_rows($result);
		print "<h2 style='margin:0;'>Inventory</h2>";
		print "<span>Table Name (Inventory)</span>";
	while($row = mysql_fetch_assoc($result))
	{
		echo "<table cellpadding=10 border=1>";
		print "<tr>";
			print "<td width='50px' height='50px'>" . $row['Inventory_id'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Inventory_product_id'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Inventory_units_in_stock'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Inventory_units_on_order'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Inventory_Vendor_id'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Inventory_Vendor_item_number'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Inventory_unit_cost'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Inventory_weight'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Inventory_size'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Inventory_color'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Inventory_unit_of_measure'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Inventory_safety_stock_level'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Inventory_reorder_quantity'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Inventory_locator'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Inventory_created_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Inventory_created_by'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Inventory_last_updated_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Inventory_last_updated_by'] . "</td>";
		echo "</tr>";
		echo "</table>";
	}

    echo ' <BR /><BR />';
    echo '<a href="main.html">Home page</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#top">Go to Top</a> ';

        echo '<a id="Employee"></a>';
	print "<hr color='#000000' style='margin-top:20px;'>";

	$query = "select * from Employee";
	$result = mysql_query($query);
	$row_count = mysql_num_rows($result);
		print "<h2 style='margin:0;'>Employee</h2>";
		print "<span>Table Name (Employee)</span>";
	while($row = mysql_fetch_assoc($result))
	{
		echo "<table cellpadding=10 border=1>";
		print "<tr>";
			print "<td width='50px' height='50px'>" . $row['Employee_id'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Employee_number]'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Employee_account_id'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Employee_manager_id'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Employee_status'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Employee_start_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Employee_end_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Employee_privledge_id'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Employee_photo_url'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Employee_position_title'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Employee_created_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Employee_created_by'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Employee_last_updated_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Employee_last_updated_by'] . "</td>";
		echo "</tr>";
		echo "</table>";
	}

    echo ' <BR /><BR />';
    echo '<a href="main.html">Home page</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#top">Go to Top</a> ';

        echo '<a id="Order_headers"></a>';
	print "<hr color='#000000' style='margin-top:20px;'>";

	$query = "select * from Order_headers";
	$result = mysql_query($query);
	$row_count = mysql_num_rows($result);
		print "<h2 style='margin:0;'>Order headers</h2>";
		print "<span>Table Name (Order_headers)</span>";
	while($row = mysql_fetch_assoc($result))
	{
		echo "<table cellpadding=10 border=1>";
		print "<tr>";
			print "<td width='50px' height='50px'>" . $row['Order_header_id'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Order_header_number'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Order_header_orderdate'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Order_header_salesperson_id'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Order_header_account_id'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Order_header_status_id'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Order_header_discount_percentage'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Order_header_discount_amount'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Order_header_pm_id'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Order_header_created_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Order_header_created_by'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Order_header_last_updated_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Order_header_last_updated_by'] . "</td>";
		echo "</tr>";
		echo "</table>";
	}

    echo ' <BR /><BR />';
    echo '<a href="main.html">Home page</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#top">Go to Top</a> ';

        echo '<a id="Order_details"></a>';
	print "<hr color='#000000' style='margin-top:20px;'>";

	$query = "select * from Order_details";
	$result = mysql_query($query);
	$row_count = mysql_num_rows($result);
		print "<h2 style='margin:0;'>Order_details</h2>";
		print "<span>Table Name (Order_details)</span>";
	while($row = mysql_fetch_assoc($result))
	{
		echo "<table cellpadding=10 border=1>";
		print "<tr>";
			print "<td width='50px' height='50px'>" . $row['Order_details_id'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Order_details_header_id'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Order_details_line_number'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Order_details_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Order_details_inventory_id'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Order_details_ordered_quantity'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Order_details_cancelled_quantity'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Order_details_unit_price'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Order_details_discount_percentage'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Order_details_discount_amount'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Order_details_created_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Order_details_created_by'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Order_details_last_updated_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Order_details_last_updated_by'] . "</td>";
		echo "</tr>";
		echo "</table>";
	}

    echo ' <BR /><BR />';
    echo '<a href="main.html">Home page</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#top">Go to Top</a> ';

        echo '<a id="Shipping"></a>';
	print "<hr color='#000000' style='margin-top:20px;'>";

		$query = "select * from Shipping";
	$result = mysql_query($query);
	$row_count = mysql_num_rows($result);
		print "<h2 style='margin:0;'>Shipping</h2>";
		print "<span>Table Name (Shipping)</span>";
	while($row = mysql_fetch_assoc($result))
	{
		echo "<table cellpadding=10 border=1>";
		print "<tr>";
			print "<td width='50px' height='50px'>" . $row['Shipping_id'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Shipping_order_details_id'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Shipping_shipped_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Shipping_tracking_number'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Shipping_shipped_quantity'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Shipping_method'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Shipping_freight_costs'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Shipping_handling_costs'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Shipping_created_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Shipping_created_by'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Shipping_last_updated_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Shipping_last_updated_by'] . "</td>";
		echo "</tr>";
		echo "</table>";
	}

    echo ' <BR /><BR />';
    echo '<a href="main.html">Home page</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#top">Go to Top</a> ';

        echo '<a id="Invoice"></a>';
	print "<hr color='#000000' style='margin-top:20px;'>";

	$query = "select * from Invoice";
	$result = mysql_query($query);
	$row_count = mysql_num_rows($result);
		print "<h2 style='margin:0;'>Invoice</h2>";
		print "<span>Table Name (Invoice)</span>";
	while($row = mysql_fetch_assoc($result))
	{
		echo "<table cellpadding=10 border=1>";
		print "<tr>";
			print "<td width='50px' height='50px'>" . $row['Invoice_id'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Invoice_number'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Invoice_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Invoice_shipped_id'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Invoice_created_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Invoice_created_by'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Invoice_last_updated_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Invoice_last_updated_by'] . "</td>";
		echo "</tr>";
		echo "</table>";
	}

    echo ' <BR /><BR />';
    echo '<a href="main.html">Home page</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#top">Go to Top</a> ';

        echo '<a id="Privileges"></a>';
	print "<hr color='#000000' style='margin-top:20px;'>";

	$query = "select * from Privileges";
	$result = mysql_query($query);
	$row_count = mysql_num_rows($result);
		print "<h2 style='margin:0;'>Privileges</h2>";
		print "<span>Table Name (Privileges)</span>";
	while($row = mysql_fetch_assoc($result))
	{
		echo "<table cellpadding=10 border=1>";
		print "<tr>";
			print "<td width='50px' height='50px'>" . $row['Privileges_id'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Privileges_name'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Privileges_start_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Privileges_end_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Privileges_status'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Privileges_created_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Privileges_created_by'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Privileges_last_updated_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Privileges_last_updated_by'] . "</td>";
		echo "</tr>";
		echo "</table>";
	}

    echo ' <BR /><BR />';
    echo '<a href="main.html">Home page</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#top">Go to Top</a> ';

        echo '<a id="Vendor"></a>';
	print "<hr color='#000000' style='margin-top:20px;'>";

	$query = "select * from Vendor";
	$result = mysql_query($query);
	$row_count = mysql_num_rows($result);
		print "<h2 style='margin:0;'>Vendor</h2>";
		print "<span>Table Name (Vendor)</span>";
	while($row = mysql_fetch_assoc($result))
	{
		echo "<table cellpadding=10 border=1>";
		print "<tr>";
			print "<td width='50px' height='50px'>" . $row['Vendor_id'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Vendor_company_name'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Vendor_contact_name'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Vendor_contact_title'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Vendor_account_id'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Vendor_credit_rating'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Vendor_created_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Vendor_created_by'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Vendor_last_updated_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Vendor_last_updated_by'] . "</td>";
		echo "</tr>";
		echo "</table>";
	}

    echo ' <BR /><BR />';
    echo '<a href="main.html">Home page</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#top">Go to Top</a> ';

        echo '<a id="Images"></a>';
	print "<hr color='#000000' style='margin-top:20px;'>";

		$query = "select * from Images";
	$result = mysql_query($query);
	$row_count = mysql_num_rows($result);
		print "<h2 style='margin:0;'>Images</h2>";
		print "<span>Table Name (Images)</span>";
	while($row = mysql_fetch_assoc($result))
	{
		echo "<table cellpadding=10 border=1>";
		print "<tr>";
			print "<td width='50px' height='50px'>" . $row['Image_id'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Image_url'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Image_created_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Image_created_by'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Image_last_updated_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['Image_last_updated_by'] . "</td>";
		echo "</tr>";
		echo "</table>";
	}

    echo ' <BR /><BR />';
    echo '<a href="main.html">Home page</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#top">Go to Top</a> ';

        echo '<a id="Accounts_type"></a>';
	print "<hr color='#000000' style='margin-top:20px;'>";

	$query = "select * from Accounts_type ";
	$result = mysql_query($query);
	$row_count = mysql_num_rows($result);
		print "<h2 style='margin:0;'>Accounts Type</h2>";
		print "<span>Table Name (Accounts_type)</span>";
	while($row = mysql_fetch_assoc($result))
	{
		echo "<table cellpadding=10 border=1>";
		print "<tr>";
			print "<td width='50px' height='50px'>" . $row['AT_id'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['AT_type'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['AT_description'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['AT_start_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['AT_end_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['AT_created_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['AT_created_by'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['AT_last_updated_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['AT_last_updated_by'] . "</td>";
		echo "</tr>";
		echo "</table>";
	}

    echo ' <BR /><BR />';
    echo '<a href="main.html">Home page</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#top">Go to Top</a> ';

        echo '<a id="Order_status"></a>';
	print "<hr color='#000000' style='margin-top:20px;'>";

	$query = "select * from Order_status ";
	$result = mysql_query($query);
	$row_count = mysql_num_rows($result);
		print "<h2 style='margin:0;'>Order Status</h2>";
		print "<span>Table Name (Order_status)</span>";
	while($row = mysql_fetch_assoc($result))
	{
		echo "<table cellpadding=10 border=1>";
		print "<tr>";
		print "<td width='50px' height='50px'>" . $row['OS_id'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['OS_name'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['OS_description'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['OS_start_date'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['OS_end_date'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['OS_created_date'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['OS_created_by'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['OS_last_updated_date'] . "</td>";
		print "<td width='50px' height='50px'>" . $row['OS_last_updated_by'] . "</td>";
		echo "</tr>";
		echo "</table>";
	}

    echo ' <BR /><BR />';
    echo '<a href="main.html">Home page</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#top">Go to Top</a> ';

        echo '<a id="General_lookup"></a>';
	print "<hr color='#000000' style='margin-top:20px;'>";

	$query = "select * from General_lookup ";
	$result = mysql_query($query);
	$row_count = mysql_num_rows($result);
		print "<h2 style='margin:0;'>General Lookup</h2>";
		print "<span>Table Name (General_lookup)</span>";
	while($row = mysql_fetch_assoc($result))
	{
		echo "<table cellpadding=10 border=1>";
		print "<tr>";
			print "<td width='50px' height='50px'>" . $row['GL_id'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['GL_type'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['GL_name'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['GL_start_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['GL_end_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['GL_created_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['GL_created_by'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['GL_last_updated_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['GL_last_updated_by'] . "</td>";
		echo "</tr>";
		echo "</table>";
	}

    echo ' <BR /><BR />';
    echo '<a href="main.html">Home page</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#top">Go to Top</a> ';

        echo '<a id="Payment_method"></a>';
	print "<hr color='#000000' style='margin-top:20px;'>";

	$query = "select * from Payment_method ";
	$result = mysql_query($query);
	$row_count = mysql_num_rows($result);
		print "<h2 style='margin:0;'>Payment Method</h2>";
		print "<span>Table Name (Payment_method)</span>";
	while($row = mysql_fetch_assoc($result))
	{
		echo "<table cellpadding=10 border=1>";
		print "<tr>";
			print "<td width='50px' height='50px'>" . $row['PM_id'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['PM_type'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['PM_number'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['PM_card_security_code'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['PM_exp_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['PM_account_id'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['PM_start_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['PM_end_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['PM_created_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['PM_created_by'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['PM_last_updated_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['PM_last_updated_by'] . "</td>";
		echo "</tr>";
		echo "</table>";
	}

    echo ' <BR /><BR />';
    echo '<a href="main.html">Home page</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#top">Go to Top</a> ';

        echo '<a id="Shopping_cart"></a>';
	print "<hr color='#000000' style='margin-top:20px;'>";

	$query = "select * from Shopping_cart ";
	$result = mysql_query($query);
	$row_count = mysql_num_rows($result);
		print "<h2 style='margin:0;'>Shopping Cart</h2>";
		print "<span>Table Name (Shopping_cart)</span>";
	while($row = mysql_fetch_assoc($result))
	{
		echo "<table cellpadding=10 border=1>";
		print "<tr>";
			print "<td width='50px' height='50px'>" . $row['SC_id'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['SC_account_id'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['SC_inventory_id'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['SC_order_quantity'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['SC_unit_price'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['SC_discount_percentage'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['SC_discount_amount'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['SC_created_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['SC_created_by'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['SC_last_updated_date'] . "</td>";
			print "<td width='50px' height='50px'>" . $row['SC_last_updated_by'] . "</td>";
		echo "</tr>";
		echo "</table>";
	}

    echo ' <BR /><BR />';
    echo '<a href="main.html">Home page</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#top">Go to Top</a> ';
?>