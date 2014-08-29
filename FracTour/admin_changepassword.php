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
<title>FracTour | Change Password</title>

<?php 
	$connection = mysql_connect("localhost", "root", "");
	if ( !$connection ) {
		die('Could not connect to host.');	
	}
	
	$db = mysql_select_db("fractour", $connection);
	if ( !$db) {
		die ('Could not find database.');	
	}
	
	$info="";
	
	if (isset($_REQUEST['submit'])  )
	{
		$oldPassword = $_REQUEST['oldPassword'];
		$newPassword = $_REQUEST['newPassword'];
		$confPassword = $_REQUEST['confPassword'];
		$select = mysql_query("select * from admin"); 
		$fetch = mysql_fetch_array($select);
		$data = $fetch['password'];
		$username = $fetch['username'];
		
		if($newPassword==$confPassword && $data == $oldPassword)
		{
			$insert=mysql_query("UPDATE admin SET password='$newPassword' where username='$username'"); 
			$info="<strong style='color:blue'>Admin password has been changed</strong>";
		}
		else if($data != $oldPassword)
		{
			$info="<strong style='color:red'>Old password might be wrong</strong>";
		}
		else if($newPassword != $confPassword)
		{
			$info="<strong style='color:red'>Password not match, please try again</strong>";
		}
	}
?>
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
                <h2>Change Admin Password</h2>
                <form>                    
                    <table class="table table-striped">
                        <tr>
                        <td><label>Old Password</label></td>
                        <td>:</td>
                        <td><input name="oldPassword" id="oldPassword" type="password" required/></td>
                        </tr>
                        
                        <tr>
                        <td><label>New Password</label></td>
                        <td>:</td>
                        <td><input name="newPassword" id="newPassword" type="password" required/></td>
                        </tr>
                        
                        <tr>
                        <td><label>Confirm New Password</label></td>
                        <td>:</td>
                        <td><input name="confPassword" id="confPassword" type="password" required/></td>
                        </tr>
                        
                        <tr>
                        <td colspan="3" align="center"><input name="submit" type="submit" value="SAVE" style="margin-top:10px;"/></td>
                      	</tr>
                    </table>
                    <?php echo $info; ?>
                </form>
            </div>
        </div>
    </div>
    
    <div class="footer">
        <p>&copy; All Rights Reserved</p>
    </div>
</body>
</html>