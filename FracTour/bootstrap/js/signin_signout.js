$(document).ready(function () {	
	$('.signin').click(function(event){
		event.preventDefault(); // disable normal link function so that it doesn't refresh the page			
		$('.mask').show();
		$('.loginpopup').show(); //display your popup form
	});
 
	// hide popup when user clicks on close button or outside popup box
	$('.close, .mask').click(function(){
		$('.mask, .loginpopup').hide(); // hide the overlay
		document.getElementsByClassName('warningtxt')[0].style.display = 'none';
		return false;
	});
	
	// prevents the overlay from closing if user clicks inside the popup box
	$('.loginpopup').click(function(){
		return false;
	});

        var loggedin = CheckUserLoggedIn();
	if(loggedin != false){
		document.getElementById('statusbox').innerHTML = 'Welcome, ' + loggedin + ' | <div class="row"><div class="col-md-7"><a href="user_managebooking.html">MANAGE BOOKING</a></div>' + ' <div class="col-md-2"><a href="#" onclick="signout()">LOGOUT</a></div></div>';
	}

});
			
function signin(){
	var memberemail = document.getElementById('email').value;
	var memberpassword = document.getElementById('password').value;
	
	$.ajax({
		type:"POST",
		url:"login.php",
		data:{"memberEmail":memberemail, "memberPassword":memberpassword},
		dataType: "json",
		success: function(response){
			if(response == "empty"){
				document.getElementsByClassName('warningtxt')[0].style.display = "block";
				document.getElementById('email').value = "";
				document.getElementById('password').value = "";
			}
			else{
				//close the login popup box
				$('.mask, .loginpopup').hide();
                document.getElementById('statusbox').innerHTML = 'Welcome, ' + response[0] + ' | <div class="row"><div class="col-md-7"><a href="user_managebooking.html">MANAGE BOOKING</a></div>' + ' <div class="col-md-2"><a href="#" onclick="signout()">LOGOUT</a></div></div>';
			}
		}
	});
}

function signout(){
	$.ajax({
		url:"logout.php",
		type:"post",
		success:function(){
			location.reload();
		}
	});
}

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
			