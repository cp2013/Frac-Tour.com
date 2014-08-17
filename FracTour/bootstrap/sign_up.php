<?php
	$connection = mysql_connect("localhost", "root", "");
	if ( !$connection ) {
		die('Could not connect to localhost.');	
	}
	
	$db = mysql_select_db("fractour", $connection);
	if (!$db) {
		die ('Could not find database fractour.');	
	}
	
	$insert_query = "INSERT INTO registration (email, password, title, firstname, lastname, dob, nationality, address, country, postalcode, phone) VALUES ('" . $_REQUEST['email'] ."','" . $_REQUEST['password'] ."','" . $_REQUEST['title'] ."','" . $_REQUEST['firstname'] ."','" . $_REQUEST['lastname'] ."','" . $_REQUEST['date']. ' '. $_REQUEST['month']. ' '. $_REQUEST['year'] ."','" . $_REQUEST['nationality'] ."','" . $_REQUEST['address'] ."','". $_REQUEST['country'] . "','". $_REQUEST['zipcode'] . "','". $_REQUEST['phonecode'].' '. $_REQUEST['phone'] ."')";
	
	$result = mysql_query($insert_query, $connection);	
	if ($result == TRUE)
		echo "<h3>Congratulation! Your registration has successfully added. <br>Please login to book the tour</h3>";
	else
		echo "<h2>Fail to add new record</h2>";
		
	mysql_close($connection);
?>