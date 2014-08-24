$(document).ready(function () {	
    var loggedin = CheckUserLoggedIn();
	if(loggedin != false){
		document.getElementById('statusbox').innerHTML = 'Welcome, ' + loggedin + ' | <div class="row"><div class="col-md-7"><a href="user_managebooking.php">MANAGE BOOKING</a></div>' + ' <div class="col-md-2"><a href="#" onclick="signout()">LOGOUT</a></div></div>';
	}
	else{
		document.getElementById('managebooking').innerHTML = '<h5><strong>Please login to manage your booking</strong></h5>';
	}
});

function CheckUserLoggedIn(){
	var loggedin;
	$.ajax({
		type:"POST",
		url:"check_login.php",
		async:false,
		success: function(response){
			if(response != "empty"){
				loggedin = response;
			}
			else{
				loggedin = false;
			}
		}
	});
	return loggedin;
}