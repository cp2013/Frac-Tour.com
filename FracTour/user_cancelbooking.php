<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FracTour | Cancel Booking</title>
<link href="images/FracTour_Logo.png" rel="shortcut icon" />
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/signin_signout.js"></script>	
<script type="text/javascript" src="js/facebooklogin.js"></script>
<script type="text/javascript" src="js/managebooking.js"></script>
<style>
	.container .row .heading{
		text-transform:uppercase;
		font-family:Georgia, "Times New Roman", Times, serif;
		color:#999;
	}	
	#tablebooking{
		overflow:auto;
	}
</style>
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

	$error = "";
	
	// if user clicked Cancel button
	if (isset($_REQUEST['Cancel']))
	{
		if ( !isset($_REQUEST['bookid']) ) {
			$error = "<strong style='color:red'>Use radio button to select the booking that you want to cancel.</strong>";
		}
		else {
			$delete_query = "DELETE FROM booking WHERE book_id= '" . $_REQUEST['bookid'] . "'";
			$result = mysql_query($delete_query, $connection);
		}
	}
?>
</head>

<body>
<div class="container"  style="width:100%; margin:0; padding:0;"><!--Wrapping the whole elements in order to be responsive-->
    <div class="mainContent" style="position:relative; width:100%;">	<!-- Wrapping the navigation bar START -->
    
        <div class="navbar navbar-inverse navbar-static-top"><!-- Navigation Bar START -->
        
            <div class="container"><!-- Container START -->
                
                <a href="index.html"><img src="images/FracTour_Logo.png" width="50" height="40" class="lfloat"/></a>
                
                
                <!-- Displaying 3 icon bars for small screen dimensions -->
                <button class= "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Navbar for small screen dimensions -->
                <div class="collapse navbar-collapse navHeaderCollapse"><!-- collapse navbar START -->
                    
                    <ul class="nav navbar-nav">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="tour.html" >Tour</a></li>
                        <li><a href="about_us.html">About Us</a></li>
                        <li><a href="contact_us.html">Contact Us</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    	
                        <li id="statusbox"><a href="#" class="signin">Login</a></li>
                        <li><a href="user_registration.html" target="_blank">Register</a></li>
                        <li><a href="admin_login.html" target="_blank">Admin</a></li> 
                    
                    </ul>
                
                </div><!-- Collapse navbar END -->
                
            </div><!-- Container END -->
        
        </div><!-- Navigation Bar END -->
        
    <div class="mask">
        <div class="loginpopup">
            <a href="#" class="close"><img src="images/closeBtn.png" class="closeBtn" title="Close Window" alt="Close" /></a>
            <form name="userloginform" method="post" action="" class="signinform">
            <fieldset class="textbox">
                <label class="email">
                    <span>Email : </span>
                    <input type="text" id="email" name="email">
                </label>
                <label class="password">
                    <span>Password : </span>
                    <input type="password" id="password" name="password">
                </label>
                <span><label class="warningtxt" style="color:#F00; display:none;">Invalid Email/Password</label></span>
                <button type="button" style="margin-left:65px;" onclick="signin()">Sign In</button>			    
                <div class="separator">               
                    <p>------------- OR -------------</p>              
                </div>
				<a href="#" onClick="fb_login();"><img src="images/login-facebook.png" style="width:202px;"></a>
            </fieldset>
            </form>
        </div>
    </div>    
    
    </div><!--Wrapping the navigation bar END -->
</div>    		 
<!-- The first section in the homepage END-->

<!-- The second section in the homepage START-->        
	<div class="container">
    	<div class="row" style="padding:5px;">
            <h3 class="heading">Manage Your Booking</h3>
            <hr />
        </div>
        <div class="row" style="padding:5px;" id="managebooking">
            <form action="user_cancelbooking.php" method="get">
            <div id="tablebooking">
            <table class="table table-striped">
            	<tr>
                	<th></th>
                    <th>Tour Code</th>
                    <th>Service Provider</th>
                    <th>Tour Date</th>
                    <th>No. of Persons</th>
                    <th>Passport No.</th>
                    <th>Expiry Date</th>
                    <th>Title</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Date of Birth</th>
                    <th>Nationality</th>
                    <th>Mobile Phone</th>
                    <th>Status</th>
                </tr>
                
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
					
					$memberEmail = $_SESSION['email'];
						
                    $result = mysql_query("SELECT * FROM booking where email = '$memberEmail'", $connection);
                    
                    //loop through all table rows
                    while ($row = mysql_fetch_array($result)) {
                        echo "<tr>";
						echo "<td><input name='bookid' type='radio' value='" . $row['book_id'] . "' /></td>";
                        echo "<td>" . $row['tour'] . "</td>";
                        echo "<td>" . $row['provider'] . "</td>";
                        echo "<td>" . $row['date'] . "</td>";
                        echo "<td>" . $row['amount'] . "</td>";
                        echo "<td>" . $row['passport'] . "</td>";
                        echo "<td>" . $row['expired'] . "</td>";                            
                        echo "<td>" . $row['title'] . "</td>";
                        echo "<td>" . $row['firstname'] . "</td>";
                        echo "<td>" . $row['lastname'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['dob'] . "</td>";
                        echo "<td>" . $row['nationality'] . "</td>";
                        echo "<td>" . $row['phone'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";			
                        echo "</tr>";										
                    }
                    
                    // close the connection
                    mysql_close($connection);	
                ?>
        	</table>
            </div>
            <br>
            <?php echo $error; ?>
            <p align="center"><input type='submit' name='Cancel' value='Cancel Booking' class="btn btn-danger"/><br></p>
            </form>
            <p align="center"><a href="user_managebooking.php"><button class="btn btn-success">Back to View Your Booking</button></a></p>
            <hr/>
    	</div>        
    </div>
    <!-- Footer section -->
	
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <h6>Copyright &copy; 2014 Frac-Tour</h6>
                </div>
                <div class="col-sm-4">
                    <h6>About The Website</h6>
                    <p>This website is created with the purpose of completing Software Engineering project provided by James Cook University</p>
                
                </div>
                <div class="col-sm-2">
                    <h6>Navigation</h6>
                    <ul class="unstyled">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="tour.html">Tour</a></li>
                        <li><a href="about_us.html">About Us</a></li>
                        <li><a href="contact_us.html">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h6>Follow Us</h6>
						<a href="https://www.facebook.com/fractour2014" target="_blank"><img src="images/facebook_icon.png" style="width:30px; height:27px;"/></a>
                        <a href="https://twitter.com/fractour" target="_blank"><img src="images/twitter_icon.png" style="width:30px; height:27px;"/></a>
                        <a href="http://instagram.com/fractour" target="_blank"><img src="images/instagram_icon.png" style="width:30px; height:27px;"/></a>
                </div>
                
                <div class="col-sm-2">
                    <h6>Coded by &copy; IDETIVE</h6>
                </div>
            </div>
        </div>
    </div>
</div><!--End wrapping the whole elements-->


	<script type="text/javascript" src="js/jquery-1.8.2.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>	
    
</body>
</html>
