<?php
$host = "localhost";
$username = "root";
$password = "";
$dbName = "fractour";

//connect
mysql_connect("$host", "$username", "$password") or die("cannot connect to localhost");
mysql_select_db("$dbName") or die("cannot find db");

$adminUsername = $_REQUEST['username'];
$adminPassword = $_REQUEST['password'];

$sqlquery = "select * from admin where username = '$adminUsername' and password = '$adminPassword'";

$result = mysql_query($sqlquery);

$count = mysql_num_rows($result);
if($count == 1){
	session_start();
	$_SESSION['username'] = $adminUsername;
	$_SESSION['password'] = $adminPassword;
	header("location:admin_home.php");
}
else{
	echo "<h3>Invalid Username and/or Password</h3>";
}
?>