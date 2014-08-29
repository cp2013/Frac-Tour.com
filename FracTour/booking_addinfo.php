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
	
	$memberEmail = $_POST['memberEmail'];
	
	$result = mysql_query("SELECT * FROM registration where email = '$memberEmail'", $connection);	
	
	$row = mysql_fetch_array($result);
	
	$title = $row['title'];
	$firstname = $row['firstname'];
	$lastname = $row['lastname'];
	$email = $row['email'];
	$nationality = $row['nationality'];
	$dob = $row['dob'];
	$phone = $row['phone'];
	
	echo json_encode(array_values(array($title, $firstname, $lastname, $email, $nationality, $dob, $phone)));
	
	// close the connection
	mysql_close($connection);										
?>