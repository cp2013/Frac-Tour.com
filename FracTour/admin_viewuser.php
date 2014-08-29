<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="images/FracTour_Logo.png" rel="shortcut icon" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<style type="text/css">
	body{
		margin:4px 70px auto 70px;
	}
	img{
		margin-right:10px;
		margin-top:-20px;
		float:left;
		width:90px;
		height:80px;
	}
	h1{
		color:#900;
	}
	h2{
		padding-bottom:15px;
	}
	.container{
		margin:0;
	}
	.col-md-3{
		border-right:1px solid #BFBAB0;
	}
	.col-md-9{
		padding-left:30px;
		overflow:auto;
	}
	.footer{
		clear:both;
		padding-top:20px;
		font-size:17px;
	}
</style>
<title>FracTour | User Account</title>
</head>

<body>
	<div class="page-header">  
    	<img src="images/FracTour_Logo.png"/>      
        <h1>Welcome to Admin!</h1> 
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h3><a href="admin_home.php">Home</a></h3>
                <h3>Manage User Account</h3>
                    <ul>
                        <li style="padding-bottom:5px;"><a href="admin_viewuser.php">View User Details</a></li>
                        <li><a href="admin_deleteuser.php">Delete User Account</a></li>
                    </ul>
                <h3>Manage User Booking</h3>
                    <ul>
                        <li style="padding-bottom:5px;"><a href="admin_viewbooking.php">View User Booking</a></li>
                        <li><a href="admin_editbooking.php">Edit Booking</a></li>
                    </ul>
                <h3>Manage Provider</h3>
                    <ul>
                        <li style="padding-bottom:5px;"><a href="admin_addprovider.php">Add Service Provider</a></li>
                        <li><a href="admin_deleteprovider.php">Delete Service Provider</a></li>
                    </ul>
                <h3>Admin Setting</h3>
                    <ul>
                        <li style="padding-bottom:5px;"><a href="admin_changeusername.php">Change Username</a></li>
                        <li><a href="admin_changepassword.php">Change Password</a></li>
                    </ul>
                <h3><a href="adminlogout.php">Logout</a></h3>                    
            </div>
            <div class="col-md-9">
                <h2>User Account Details</h2>
                <table class="table table-striped">
                    <tr>
                        <th>Email</th>
                        <th>Title</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date of Birth</th>
                        <th>Nationality</th>
                        <th>Address</th>
                        <th>Country</th>
                        <th>Postal/ZIP Code</th>
                        <th>Mobile Phone</th>
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
                        
                        // send SQl statement to 
                        // for SELECT statement mysql_query() function returns a result set in array form
                        // for statements DELETE, INSERT or UPDATE mysql_query() function returns TRUE on success or FALSE on error
                        $result = mysql_query('SELECT * FROM registration', $connection);	
                        
                        //loop through all table rows
                        while ($row = mysql_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['title'] . "</td>";
                            echo "<td>" . $row['firstname'] . "</td>";
                            echo "<td>" . $row['lastname'] . "</td>";
							echo "<td>" . $row['dob'] . "</td>";
							echo "<td>" . $row['nationality'] . "</td>";
							echo "<td>" . $row['address'] . "</td>";
							echo "<td>" . $row['country'] . "</td>";
							echo "<td>" . $row['postalcode'] . "</td>";
							echo "<td>" . $row['phone'] . "</td>";			
                            echo "</tr>";										
                        }
                        mysql_free_result($result);  // release result memory		
                        
                        // step 4: close the connection
                        mysql_close($connection);										
                    ?>
                </table>
            </div>
        </div>
    </div>
    
    <div class="footer">
        <p>&copy; All Rights Reserved</p>
    </div>
</body>
</html>