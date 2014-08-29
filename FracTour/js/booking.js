$(document).ready(function () {	
    var loggedin = CheckUserLoggedIn();
	if(loggedin != false){
		document.getElementById('statusbox').innerHTML = 'Welcome, ' + loggedin + ' | <div class="row"><div class="col-md-7"><a href="user_managebooking.html">MANAGE BOOKING</a></div>' + ' <div class="col-md-2"><a href="#" onclick="signout()">LOGOUT</a></div></div>';
		setdata(loggedin);
	}
	else{
		document.getElementById('booking').innerHTML = '<h5><strong>Please login to book the tour</strong></h5>';
	}
});

function setdata(loggedin){
	var memberemail = loggedin;
	
	$.ajax({
		type:"POST",
		url:"booking_addinfo.php",
		data:{"memberEmail":memberemail},
		dataType: "json",
		success: function(response){
			if(response == "empty"){
				bookform.firstname.value = "";
				bookform.lastname.value = "";
				bookform.email.value = "";
				bookform.nationality.value = "";
				bookform.birthdate.value = "";
				bookform.birthmonth.value = "";
				bookform.birthyear.value = "";
				bookform.phonecode.value = "";
				bookform.phone.value = "";
			}
			else{
				bookform.title.value = response[0];
				bookform.firstname.value = response[1];
				bookform.lastname.value = response[2];
				bookform.email.value = response[3];
				bookform.nationality.value = response[4];
				bookform.birthdate.value = response[5].split(' ')[0];
				bookform.birthmonth.value = response[5].split(' ')[1];
				bookform.birthyear.value = response[5].split(' ')[2];
				bookform.phonecode.value = response[6].split(' ')[0];
				bookform.phone.value = response[6].split(' ')[1];
			}
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

function validateEmail(field){
	var atPos = field.value.indexOf("@");
	var dotPos = field.value.lastIndexOf(".");
	var valid = (atPos > 0) && (dotPos > atPos + 1) && (field.value.length > dotPos + 2);
	var illegalChars = /[\(\)\<\>\,\;\:\\\"\[\]]/ ;
	
	if (!valid) {
		field.style.background = 'Yellow';
		document.getElementById("errorEmail").innerHTML = "Please enter a valid email address";
		return false;
	} else if (field.value.match(illegalChars)) {
		field.style.background = 'Yellow';
		document.getElementById("errorEmail").innerHTML = "The email address contains illegal characters";
		return false;
	} else {
		field.style.background = 'White';
		document.getElementById("errorEmail").innerHTML = "";
		return true;
	}
}

function validatePhone(field){
	var regex = /^([0-9\b]+)$/;
	
	if (!regex.test(field.value)) {
		document.getElementById("errorPhone").innerHTML = "The phone number contains illegal characters";
		field.style.background = 'Yellow';
		return false;
	} else{
		field.style.background = 'White';
		document.getElementById("errorPhone").innerHTML = "";
		return true;
	}
}

function validateFirstName(field){
	var regex = /^([\sA-Za-z]+)$/;
	
	if (!regex.test(field.value)) {
		document.getElementById("errorFirstName").innerHTML = "The name contains illegal characters";
		field.style.background = 'Yellow';
		return false;
	} else {
		field.style.background = 'White';
		document.getElementById("errorFirstName").innerHTML = "";
		return true;
	}
}

function validateLastName(field){
	var regex = /^([\sA-Za-z]+)$/;
					  
	if (!regex.test(field.value)) {
		document.getElementById("errorLastName").innerHTML = "The name contains illegal characters";
		field.style.background = 'Yellow';
		return false;
	} else {
		field.style.background = 'White';
		document.getElementById("errorLastName").innerHTML = "";
		return true;
	}
}