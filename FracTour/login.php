<?php
$host = "localhost";
$username = "root";
$password = "";
$dbName = "fractour";

//connect
mysql_connect("$host", "$username", "$password") or die("cannot connect to localhost");
mysql_select_db("$dbName") or die("cannot find db");

$memberEmail = $_POST['memberEmail'];
$memberPassword = $_POST['memberPassword'];

//mysql injection protection
$memberEmail = stripslashes($memberEmail);
$memberPassword = stripslashes($memberPassword);
$memberEmail = mysql_real_escape_string($memberEmail);
$memberPassword = mysql_real_escape_string($memberPassword);
//$md5pass = md5($memberPassword);

//$sqlquery = "select * from registration where email = '$memberEmail' and password = '$md5pass'";
$sqlquery = "select * from registration where email = '$memberEmail' and password = '$memberPassword'";

$result = mysql_query($sqlquery);

$count = mysql_num_rows($result);
if($count == 1){
	session_start();
	$_SESSION['email'] = $memberEmail;
	//$_SESSION['password'] = $md5pass;
	$_SESSION['password'] = $memberPassword;
	//echo json_encode(array_values(array($memberEmail, $md5pass)));
	echo json_encode(array_values(array($memberEmail, $memberPassword)));
}
else{
	echo json_encode("empty");
}
?>