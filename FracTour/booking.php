<?php
	// connect to database server 
	$connection = mysql_connect("localhost", "root", "");
	if ( !$connection ) {
		die('Could not connect to host.');	
	}
	
	// select a database
	$db = mysql_select_db("fractour", $connection);
	if ( !$db) {
		die ('Could not find database.');	
	}
	
	$insert_query = "INSERT INTO booking (tour, provider, date, amount, passport, expired, title, firstname, lastname, email, dob, nationality, phone) VALUES ('" . $_REQUEST['tourcode'] ."','" . $_REQUEST['provider'] ."','" . $_REQUEST['tourdate']. ' '. $_REQUEST['tourmonth']. ' '. $_REQUEST['touryear'] ."','" . $_REQUEST['amount'] ."','" . $_REQUEST['passport'] ."','" . $_REQUEST['expirydate']. ' '. $_REQUEST['expirymonth']. ' '. $_REQUEST['expiryyear'] ."','" . $_REQUEST['title'] ."','" . $_REQUEST['firstname'] ."','" . $_REQUEST['lastname'] ."','" . $_REQUEST['email'] ."','". $_REQUEST['birthdate']. ' '. $_REQUEST['birthmonth']. ' '. $_REQUEST['birthyear'] ."','" . $_REQUEST['nationality'] ."','" . $_REQUEST['phonecode'].' '. $_REQUEST['phone'] ."')";
	
	$result = mysql_query($insert_query, $connection);	
	if ($result == TRUE)
		echo "<h3>Congratulation! Your booking has successfully added.</h3>";
	else
		echo "<h2>Fail to add your booking</h2>";
	
	// close the connection
	mysql_close($connection);										
?>