<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FracTour | Booking</title>
<link href="images/FracTour_Logo.png" rel="shortcut icon" />
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/signin_signout.js"></script>	
<script type="text/javascript" src="js/facebooklogin.js"></script>	
<script type="text/javascript" src="js/booking.js"></script>	
<style>
.container .row .heading{
	text-transform:uppercase;
	font-family:Georgia, "Times New Roman", Times, serif;
	color:#999;	
}
.container .row .heading-content{
	text-transform:uppercase;
	font-family:Verdana, Geneva, sans-serif;
}
.container .jumbotron p{
	font-size:15px;
	text-align:justify;
}
.container .jumbotron .row .col-md-7{
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;	
}
.nav-tabs > li > a{
	color:black;
	font-family:Verdana, Geneva, sans-serif;	
}
.tab-content {
	background-color:white;
	padding:10px;
	padding-left:15px;
	border:1px solid #ddd;
}
.required {     
	color:#F00;
	font-size:11px;
	vertical-align:super;
}
span.help-block {     
	color:#F00;
}
.form-inline .form-group{
	margin-left: 0;
	margin-right: 0;
}
}
/* Smartphones (landscape) ----------- */
@media only screen 
and (min-width : 321px) {
/* Styles */
	.tour {
		width: 100%;
	}

	.tour-label {
		width:auto;	
		left:15px;
		right:15px;
	}
}
</style>
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
<div class="container">
	<div class="row" style="padding:5px;">
    	<h3 class="heading">BOOK YOUR TOUR NOW</h3>
        <hr/>
    </div>    

    <div class="jumbotron">
        <h3 class="heading-content">Tour Destination : Wonderful Italy (9 Days 8 Nights)</h3>
        <p style="font-family:Arial, Helvetica, sans-serif; color:#F90; font-size:22px;"><strong>Price: $3000</strong></p>            
        <hr/>     
        
        <div class="tab-content">
            <div class="tab-pane active" id="booking">
            	<h4>Fill this form below to process your booking</h4><br>
                <form class="form-horizontal" role="form" id="bookform" name="bookform" method="post" action="booking.php">
                	<div class="form-group">
                        <label for="tourcode" class="col-sm-2 control-label" style="color:#000;"><span class="required">* </span>Tour Code</label>                       
                        <div class="col-md-3"><input name="tourcode" type="text" maxlength="10" class="form-control" value="IT98" readonly="readonly"></div>                            
                    </div>
                    
                    <div class="form-group">
                        <label for="provider" class="col-sm-2 control-label" style="color:#000;"><span class="required">* </span>Service Provider</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <select name="provider" class="form-control" required>
                                        <option value=""></option>
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
											
											$result = mysql_query('SELECT * FROM service_provider', $connection);	
											
											//loop through all table rows
											while ($row = mysql_fetch_array($result)) {
												echo "<option value='".$row['provider']."'>" . $row['provider']. "</option>";							
											}
											mysql_free_result($result);  // release result memory		
											
											// close the connection
											mysql_close($connection);										
										?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                	<div class="form-group">
                        <label for="tourdate" class="col-sm-2 control-label" style="color:#000;"><span class="required">* </span>Tour Date</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <select name="tourdate" class="form-control" required>
                                                <option value=""></option>
                                                <option value="01">1</option>
                                                <option value="02">2</option>
                                                <option value="03">3</option>
                                                <option value="04">4</option>
                                                <option value="05">5</option>
                                                <option value="06">6</option>
                                                <option value="07">7</option>
                                                <option value="08">8</option>
                                                <option value="09">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="tourmonth" class="form-control" required>               	
                                                <option value=""></option>
                                                <option value="Jan">January</option>
                                                <option value="Feb">February</option>
                                                <option value="Mar">March</option>
                                                <option value="Apr">April</option>
                                                <option value="May">May</option>
                                                <option value="Jun">June</option>
                                                <option value="Jul">July</option>
                                                <option value="Aug">August</option>
                                                <option value="Sep">September</option>
                                                <option value="Oct">October</option>
                                                <option value="Nov">November</option>
                                                <option value="Dec">December</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="touryear" class="form-control" required>
                                                <option value=""></option>                                                
                                                <option value="2014">2014</option>
                                                <option value="2015">2015</option>
                                            </select>
                                        </div>
                                    </div>                        
                                </div>
                            </div>
                            <p class="help-block">This tour is valid until 17 December 2015</p>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="amount" class="col-sm-2 control-label" style="color:#000;"><span class="required">* </span>No. of Persons</label>
                        <div class="col-sm-2">
                            <select name="amount" class="form-control" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>                                        
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="passport" class="col-sm-2 control-label" style="color:#000;"><span class="required">* </span>Passport No.</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-md-3"><input name="passport" type="text" maxlength="10" class="form-control" required></div>
                            </div>                         
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="expirydate" class="col-sm-2 control-label" style="color:#000;"><span class="required">* </span>Expiry Date</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <select name="expirydate" class="form-control" required>
                                                <option value=""></option>
                                                <option value="01">1</option>
                                                <option value="02">2</option>
                                                <option value="03">3</option>
                                                <option value="04">4</option>
                                                <option value="05">5</option>
                                                <option value="06">6</option>
                                                <option value="07">7</option>
                                                <option value="08">8</option>
                                                <option value="09">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="expirymonth" class="form-control" required>                                                <option value=""></option>
                                                <option value="Jan">January</option>
                                                <option value="Feb">February</option>
                                                <option value="Mar">March</option>
                                                <option value="Apr">April</option>
                                                <option value="May">May</option>
                                                <option value="Jun">June</option>
                                                <option value="Jul">July</option>
                                                <option value="Aug">August</option>
                                                <option value="Sep">September</option>
                                                <option value="Oct">October</option>
                                                <option value="Nov">November</option>
                                                <option value="Dec">December</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="expiryyear" class="form-control" required>                                                <option value=""></option>
                                                <option value="2014">2014</option>
                                                <option value="2015">2015</option>
                                                <option value="2016">2016</option>
                                                <option value="2017">2017</option>
                                                <option value="2018">2018</option>
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                            </select>
                                        </div>
                                    </div>                        
                                </div>

                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label" style="color:#000;"><span class="required">* </span>Title</label>
                        <div class="col-sm-2">
                            <select name="title" class="form-control">
                                <option value="Mr">Mr</option>
                                <option value="Ms">Ms</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Dr">Dr</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label" style="color:#000;"><span class="required">* </span>First Name</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-md-5"><input name="firstname" type="text" maxlength="50" class="form-control" onblur="validateFirstName(this);" required></div>
                                <div class="col-md-5"><span id="errorFirstName" class="help-block"></span></div>
                            </div>                         
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label" style="color:#000;"><span class="required">* </span>Last Name</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-md-5"><input name="lastname" type="text" maxlength="20" class="form-control" onblur="validateLastName(this);" required></div>
                                <div class="col-md-5"><span id="errorLastName" class="help-block"></span></div>
                            </div> 
                        </div>
                    </div> 
                    
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label" style="color:#000;"><span class="required">* </span>Email Address</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-md-6"><input name="email" type="text" maxlength="50" class="form-control" onblur="validateEmail(this);" required></div>
                                <div class="col-md-5"><span id="errorEmail" class="help-block"></span></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="dob" class="col-sm-2 control-label" style="color:#000;"><span class="required">* </span>Date of Birth</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <select name="birthdate" class="form-control" required>
                                                <option value=""></option>
                                                <option value="01">1</option>
                                                <option value="02">2</option>
                                                <option value="03">3</option>
                                                <option value="04">4</option>
                                                <option value="05">5</option>
                                                <option value="06">6</option>
                                                <option value="07">7</option>
                                                <option value="08">8</option>
                                                <option value="09">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="birthmonth" class="form-control" required>                                                <option value=""></option>
                                                <option value="Jan">January</option>
                                                <option value="Feb">February</option>
                                                <option value="Mar">March</option>
                                                <option value="Apr">April</option>
                                                <option value="May">May</option>
                                                <option value="Jun">June</option>
                                                <option value="Jul">July</option>
                                                <option value="Aug">August</option>
                                                <option value="Sep">September</option>
                                                <option value="Oct">October</option>
                                                <option value="Nov">November</option>
                                                <option value="Dec">December</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="birthyear" class="form-control" required>                                                <option value=""></option>
                                                <option value="2014">2014</option>
                                                <option value="2013">2013</option>
                                                <option value="2012">2012</option>
                                                <option value="2011">2011</option>
                                                <option value="2010">2010</option>
                                                <option value="2009">2009</option>
                                                <option value="2008">2008</option>
                                                <option value="2007">2007</option>
                                                <option value="2006">2006</option>
                                                <option value="2005">2005</option>
                                                <option value="2004">2004</option>
                                                <option value="2003">2003</option>
                                                <option value="2002">2002</option>
                                                <option value="2001">2001</option>
                                                <option value="2000">2000</option>
                                                <option value="1999">1999</option>
                                                <option value="1998">1998</option>
                                                <option value="1997">1997</option>
                                                <option value="1996">1996</option>
                                                <option value="1995">1995</option>
                                                <option value="1994">1994</option>
                                                <option value="1993">1993</option>
                                                <option value="1992">1992</option>
                                                <option value="1991">1991</option>
                                                <option value="1990">1990</option>
                                                <option value="1989">1989</option>
                                                <option value="1988">1988</option>
                                                <option value="1987">1987</option>
                                                <option value="1986">1986</option>
                                                <option value="1985">1985</option>
                                                <option value="1984">1984</option>
                                                <option value="1983">1983</option>
                                                <option value="1982">1982</option>
                                                <option value="1981">1981</option>
                                                <option value="1980">1980</option>
                                                <option value="1979">1979</option>
                                                <option value="1978">1978</option>
                                                <option value="1977">1977</option>
                                                <option value="1976">1976</option>
                                                <option value="1975">1975</option>
                                                <option value="1974">1974</option>
                                                <option value="1973">1973</option>
                                                <option value="1972">1972</option>
                                                <option value="1971">1971</option>
                                                <option value="1970">1970</option>
                                                <option value="1969">1969</option>
                                                <option value="1968">1968</option>
                                                <option value="1967">1967</option>
                                                <option value="1966">1966</option>
                                                <option value="1965">1965</option>
                                                <option value="1964">1964</option>
                                                <option value="1963">1963</option>
                                                <option value="1962">1962</option>
                                                <option value="1961">1961</option>
                                                <option value="1960">1960</option>
                                                <option value="1959">1959</option>
                                                <option value="1958">1958</option>
                                                <option value="1957">1957</option>
                                                <option value="1956">1956</option>
                                                <option value="1955">1955</option>
                                                <option value="1954">1954</option>
                                                <option value="1953">1953</option>
                                                <option value="1952">1952</option>
                                                <option value="1951">1951</option>
                                                <option value="1950">1950</option>
                                                <option value="1949">1949</option>
                                                <option value="1948">1948</option>
                                                <option value="1947">1947</option>
                                                <option value="1946">1946</option>
                                                <option value="1945">1945</option>
                                                <option value="1944">1944</option>
                                                <option value="1943">1943</option>
                                                <option value="1942">1942</option>
                                                <option value="1941">1941</option>
                                                <option value="1940">1940</option>
                                                <option value="1939">1939</option>
                                                <option value="1938">1938</option>
                                                <option value="1937">1937</option>
                                                <option value="1936">1936</option>
                                                <option value="1935">1935</option>
                                                <option value="1934">1934</option>
                                                <option value="1933">1933</option>
                                                <option value="1932">1932</option>
                                                <option value="1931">1931</option>
                                                <option value="1930">1930</option>
                                                <option value="1929">1929</option>
                                                <option value="1928">1928</option>
                                                <option value="1927">1927</option>
                                                <option value="1926">1926</option>
                                                <option value="1925">1925</option>
                                                <option value="1924">1924</option>
                                                <option value="1923">1923</option>
                                                <option value="1922">1922</option>
                                                <option value="1921">1921</option>
                                                <option value="1920">1920</option>
                                                <option value="1919">1919</option>
                                                <option value="1918">1918</option>
                                                <option value="1917">1917</option>
                                                <option value="1916">1916</option>
                                                <option value="1915">1915</option>
                                                <option value="1914">1914</option>
                                                <option value="1913">1913</option>
                                                <option value="1912">1912</option>
                                                <option value="1911">1911</option>
                                                <option value="1910">1910</option>
                                            </select>
                                        </div>
                                    </div>                        
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="nationality" class="col-sm-2 control-label" style="color:#000;"><span class="required">* </span>Nationality</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-md-5">
                                    <select name="nationality" class="form-control" required>
                                        <option value=""></option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antarctica">Antarctica</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo, Democratic Republic Of The">Congo, Democratic Republic Of The</option>
                                        <option value="Congo, Republic Of The">Congo, Republic Of The</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote D'Ivoire">Cote D&#39;Ivoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran">Iran</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Laos">Laos</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macau">Macau</option>
                                        <option value="Macedonia">Macedonia</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia">Micronesia</option>
                                        <option value="Moldova">Moldova</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montenegro">Montenegro</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="North Korea">North Korea</option>
                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Palestinian Territories">Palestinian Territories</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russian Federation">Russian Federation</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Barthelemy">Saint Barthelemy</option>
                                        <option value="Saint Kitts And Nevis">Saint Kitts And Nevis</option>
                                        <option value="Saint Lucia">Saint Lucia</option>
                                        <option value="Saint Martin">Saint Martin</option>
                                        <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Korea">South Korea</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="St. Helena">St. Helena</option>
                                        <option value="St. Pierre and Miquelon">St. Pierre and Miquelon</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syria</option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania, United Republic Of">Tanzania, United Republic Of</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Timor-Leste">Timor-Leste</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Vietnam</option>
                                        <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                        <option value="Virgin Islands (U.S)">Virgin Islands (U.S)</option>
                                        <option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone" class="col-sm-2 control-label" style="color:#000;"><span class="required">* </span>Mobile Phone</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <select name="phonecode" class="form-control" required>
                                                <option value=""></option>
                                                <option value="93">Afghanistan (93)</option>
                                                <option value="355">Albania (355)</option>
                                                <option value="213">Algeria (213)</option>
                                                <option value="1684">American Samoa (1684)</option>
                                                <option value="376">Andorra (376)</option>
                                                <option value="244">Angola (244)</option>
                                                <option value="1264">Anguilla (1264)</option>
                                                <option value="672">Antarctica (672)</option>
                                                <option value="1268">Antigua and Barbuda (1268)</option>
                                                <option value="54">Argentina (54)</option>
                                                <option value="374">Armenia (374)</option>
                                                <option value="297">Aruba (297)</option>
                                                <option value="61">Australia (61)</option>
                                                <option value="43">Austria (43)</option>
                                                <option value="994">Azerbaijan (994)</option>
                                                <option value="242">Bahamas (242)</option>
                                                <option value="973">Bahrain (973)</option>
                                                <option value="880">Bangladesh (880)</option>
                                                <option value="1246">Barbados (1246)</option>
                                                <option value="375">Belarus (375)</option>
                                                <option value="32">Belgium (32)</option>
                                                <option value="501">Belize (501)</option>
                                                <option value="229">Benin (229)</option>
                                                <option value="1441">Bermuda (1441)</option>
                                                <option value="975">Bhutan (975)</option>
                                                <option value="591">Bolivia (591)</option>
                                                <option value="387">Bosnia and Herzegovina (387)</option>
                                                <option value="267">Botswana (267)</option>
                                                <option value="55">Brazil (55)</option>
                                                <option value="673">Brunei Darussalam (673)</option>
                                                <option value="359">Bulgaria (359)</option>
                                                <option value="226">Burkina Faso (226)</option>
                                                <option value="257">Burundi (257)</option>
                                                <option value="855">Cambodia (855)</option>
                                                <option value="237">Cameroon (237)</option>
                                                <option value="1">Canada (1)</option>
                                                <option value="238">Cape Verde (238)</option>
                                                <option value="1345">Cayman Islands (1345)</option>
                                                <option value="236">Central African Republic (236)</option>
                                                <option value="235">Chad (235)</option>
                                                <option value="56">Chile (56)</option>
                                                <option value="86">China (86)</option>
                                                <option value="61">Christmas Island (61)</option>
                                                <option value="61">Cocos (Keeling) Islands (61)</option>
                                                <option value="57">Colombia (57)</option>
                                                <option value="269">Comoros (269)</option>
                                                <option value="243">Congo, Democratic Republic Of The (243)</option>
                                                <option value="242">Congo, Republic Of The (242)</option>
                                                <option value="682">Cook Islands (682)</option>
                                                <option value="506">Costa Rica (506)</option>
                                                <option value="225">Cote D&#39;Ivoire (225)</option>
                                                <option value="385">Croatia (385)</option>
                                                <option value="53">Cuba (53)</option>
                                                <option value="357">Cyprus (357)</option>
                                                <option value="420">Czech Republic (420)</option>
                                                <option value="45">Denmark (45)</option>
                                                <option value="253">Djibouti (253)</option>
                                                <option value="1767">Dominica (1767)</option>
                                                <option value="1809">Dominican Republic (1809)</option>
                                                <option value="593">Ecuador (593)</option>
                                                <option value="20">Egypt (20)</option>
                                                <option value="503">El Salvador (503)</option>
                                                <option value="240">Equatorial Guinea (240)</option>
                                                <option value="291">Eritrea (291)</option>
                                                <option value="372">Estonia (372)</option>
                                                <option value="251">Ethiopia (251)</option>
                                                <option value="500">Falkland Islands (Malvinas) (500)</option>
                                                <option value="298">Faroe Islands (298)</option>
                                                <option value="679">Fiji (679)</option>
                                                <option value="358">Finland (358)</option>
                                                <option value="33">France (33)</option>
                                                <option value="594">French Guiana (594)</option>
                                                <option value="689">French Polynesia (689)</option>
                                                <option value="241">Gabon (241)</option>
                                                <option value="220">Gambia (220)</option>
                                                <option value="995">Georgia (995)</option>
                                                <option value="49">Germany (49)</option>
                                                <option value="233">Ghana (233)</option>
                                                <option value="350">Gibraltar (350)</option>
                                                <option value="30">Greece (30)</option>
                                                <option value="299">Greenland (299)</option>
                                                <option value="1473">Grenada (1473)</option>
                                                <option value="590">Guadeloupe (590)</option>
                                                <option value="1671">Guam (1671)</option>
                                                <option value="502">Guatemala (502)</option>
                                                <option value="224">Guinea (224)</option>
                                                <option value="245">Guinea-Bissau (245)</option>
                                                <option value="592">Guyana (592)</option>
                                                <option value="509">Haiti (509)</option>
                                                <option value="504">Honduras (504)</option>
                                                <option value="852">Hong Kong (852)</option>
                                                <option value="36">Hungary (36)</option>
                                                <option value="354">Iceland (354)</option>
                                                <option value="91">India (91)</option>
                                                <option value="62">Indonesia (62)</option>
                                                <option value="98">Iran (98)</option>
                                                <option value="964">Iraq (964)</option>
                                                <option value="353">Ireland (353)</option>
                                                <option value="972">Israel (972)</option>
                                                <option value="39">Italy (39)</option>
                                                <option value="1876">Jamaica (1876)</option>
                                                <option value="81">Japan (81)</option>
                                                <option value="962">Jordan (962)</option>
                                                <option value="7">Kazakhstan (7)</option>
                                                <option value="254">Kenya (254)</option>
                                                <option value="686">Kiribati (686)</option>
                                                <option value="965">Kuwait (965)</option>
                                                <option value="996">Kyrgyzstan (996)</option>
                                                <option value="856">Laos (856)</option>
                                                <option value="371">Latvia (371)</option>
                                                <option value="961">Lebanon (961)</option>
                                                <option value="266">Lesotho (266)</option>
                                                <option value="231">Liberia (231)</option>
                                                <option value="218">Libyan Arab Jamahiriya (218)</option>
                                                <option value="423">Liechtenstein (423)</option>
                                                <option value="370">Lithuania (370)</option>
                                                <option value="352">Luxembourg (352)</option>
                                                <option value="853">Macau (853)</option>
                                                <option value="389">Macedonia (389)</option>
                                                <option value="261">Madagascar (261)</option>
                                                <option value="265">Malawi (265)</option>
                                                <option value="60">Malaysia (60)</option>
                                                <option value="960">Maldives (960)</option>
                                                <option value="223">Mali (223)</option>
                                                <option value="356">Malta (356)</option>
                                                <option value="692">Marshall Islands (692)</option>
                                                <option value="596">Martinique (596)</option>
                                                <option value="222">Mauritania (222)</option>
                                                <option value="230">Mauritius (230)</option>
                                                <option value="262">Mayotte (262)</option>
                                                <option value="52">Mexico (52)</option>
                                                <option value="691">Micronesia (691)</option>
                                                <option value="373">Moldova (373)</option>
                                                <option value="377">Monaco (377)</option>
                                                <option value="976">Mongolia (976)</option>
                                                <option value="382">Montenegro (382)</option>
                                                <option value="664">Montserrat (664)</option>
                                                <option value="212">Morocco (212)</option>
                                                <option value="258">Mozambique (258)</option>
                                                <option value="95">Myanmar (95)</option>
                                                <option value="264">Namibia (264)</option>
                                                <option value="674">Nauru (674)</option>
                                                <option value="977">Nepal (977)</option>
                                                <option value="31">Netherlands (31)</option>
                                                <option value="599">Netherlands Antilles (599)</option>
                                                <option value="687">New Caledonia (687)</option>
                                                <option value="64">New Zealand (64)</option>
                                                <option value="505">Nicaragua (505)</option>
                                                <option value="227">Niger (227)</option>
                                                <option value="234">Nigeria (234)</option>
                                                <option value="683">Niue (683)</option>
                                                <option value="672">Norfolk Island (672)</option>
                                                <option value="850">North Korea (850)</option>
                                                <option value="1670">Northern Mariana Islands (1670)</option>
                                                <option value="47">Norway (47)</option>
                                                <option value="968">Oman (968)</option>
                                                <option value="92">Pakistan (92)</option>
                                                <option value="680">Palau (680)</option>
                                                <option value="970">Palestinian Territories (970)</option>
                                                <option value="507">Panama (507)</option>
                                                <option value="675">Papua New Guinea (675)</option>
                                                <option value="595">Paraguay (595)</option>
                                                <option value="51">Peru (51)</option>
                                                <option value="63">Philippines (63)</option>
                                                <option value="48">Poland (48)</option>
                                                <option value="351">Portugal (351)</option>
                                                <option value="1">Puerto Rico (1)</option>
                                                <option value="974">Qatar (974)</option>
                                                <option value="262">Reunion (262)</option>
                                                <option value="40">Romania (40)</option>
                                                <option value="7">Russian Federation (7)</option>
                                                <option value="250">Rwanda (250)</option>
                                                <option value="590">Saint Barthelemy (590)</option>
                                                <option value="1869">Saint Kitts And Nevis (1869)</option>
                                                <option value="1758">Saint Lucia (1758)</option>
                                                <option value="1599">Saint Martin (1599)</option>
                                                <option value="1784">Saint Vincent and the Grenadines (1784)</option>
                                                <option value="685">Samoa (685)</option>
                                                <option value="378">San Marino (378)</option>
                                                <option value="239">Sao Tome and Principe (239)</option>
                                                <option value="966">Saudi Arabia (966)</option>
                                                <option value="221">Senegal (221)</option>
                                                <option value="381">Serbia (381)</option>
                                                <option value="248">Seychelles (248)</option>
                                                <option value="232">Sierra Leone (232)</option>
                                                <option value="65">Singapore (65)</option>
                                                <option value="421">Slovakia (421)</option>
                                                <option value="386">Slovenia (386)</option>
                                                <option value="677">Solomon Islands (677)</option>
                                                <option value="252">Somalia (252)</option>
                                                <option value="27">South Africa (27)</option>
                                                <option value="82">South Korea (82)</option>
                                                <option value="34">Spain (34)</option>
                                                <option value="94">Sri Lanka (94)</option>
                                                <option value="290">St. Helena (290)</option>
                                                <option value="508">St. Pierre and Miquelon (508)</option>
                                                <option value="249">Sudan (249)</option>
                                                <option value="597">Suriname (597)</option>
                                                <option value="47">Svalbard and Jan Mayen (47)</option>
                                                <option value="268">Swaziland (268)</option>
                                                <option value="46">Sweden (46)</option>
                                                <option value="41">Switzerland (41)</option>
                                                <option value="963">Syria (963)</option>
                                                <option value="886">Taiwan (886)</option>
                                                <option value="992">Tajikistan (992)</option>
                                                <option value="255">Tanzania, United Republic Of (255)</option>
                                                <option value="66">Thailand (66)</option>
                                                <option value="670">Timor-Leste (670)</option>
                                                <option value="228">Togo (228)</option>
                                                <option value="676">Tonga (676)</option>
                                                <option value="1868">Trinidad and Tobago (1868)</option>
                                                <option value="216">Tunisia (216)</option>
                                                <option value="90">Turkey (90)</option>
                                                <option value="993">Turkmenistan (993)</option>
                                                <option value="1649">Turks and Caicos Islands (1649)</option>
                                                <option value="688">Tuvalu (688)</option>
                                                <option value="256">Uganda (256)</option>
                                                <option value="380">Ukraine (380)</option>
                                                <option value="971">United Arab Emirates (971)</option>
                                                <option value="44">United Kingdom (44)</option>
                                                <option value="1">United States (1)</option>
                                                <option value="1">United States Minor Outlying Islands (1)</option>
                                                <option value="598">Uruguay (598)</option>
                                                <option value="998">Uzbekistan (998)</option>
                                                <option value="678">Vanuatu (678)</option>
                                                <option value="58">Venezuela (58)</option>
                                                <option value="84">Vietnam (84)</option>
                                                <option value="1284">Virgin Islands (British) (1284)</option>
                                                <option value="1340">Virgin Islands (U.S) (1340)</option>
                                                <option value="681">Wallis and Futuna Islands (681)</option>
                                                <option value="967">Yemen (967)</option>
                                                <option value="260">Zambia (260)</option>
                                                <option value="263">Zimbabwe (263)</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input name="phone" type="text" maxlength="20" class="form-control" onblur="validatePhone(this);" required>
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-md-5"><span id="errorPhone" class="help-block"></span></div> 
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button name="submit" type="submit" value="SUBMIT" onclick="validateForm(signupform)">SUBMIT</button>
                            <button name="reset" type="reset" value="RESET">RESET</button>
                        </div>
                    </div> 
                </form>                
            </div>
        </div>
        <!-- End Tabs -->
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

	
</body>

</html>