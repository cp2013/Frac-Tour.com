function validateForm(theForm){	
	var valEmail = validateEmail(theForm.email);
	var valPassword = validatePassword(theForm.password);
	var valConfirmPassword = validateSamePassword(theForm.password, theForm.confpass);
	var valFName = validateFirstName(theForm.firstname);
	var valLName = validateLastName(theForm.lastname);
	var valDate = validateDate(theForm.date);
	var valMonth = validateMonth(theForm.month);
	var valYear = validateYear(theForm.year);
	var valNationality = validateNationality(theForm.nationality);
	var valCountry = validateCountry(theForm.country);
	var valZipCode = validateZipCode(theForm.zipcode);
	var valPhoneCode = validatePhoneCode(theForm.phonecode);
	var valPhone = validatePhone(theForm.phone);
	var valCheckBox = validateCheckBox(theForm.checkbox);
	
	/*if(valUsername && valPassword && valConfirmPassword && valFName && valLName && valAge && valPhone && valEmail){ 
			$.ajax({
				type:"POST",
				url:"sign_up.php",
				data:{"username":theForm.username.value, "password":theForm.password.value, "firstname":theForm.firstname.value, "lastname":theForm.lastname.value, "age":theForm.age.value, "phone":theForm.phone.value, "email":theForm.email.value},
				dataType: "json",
				success: function(response){
					alert(response);
				}
			});
	}*/
}

function validateEmail(field){
	var atPos = field.value.indexOf("@");
	var dotPos = field.value.lastIndexOf(".");
	var valid = (atPos > 0) && (dotPos > atPos + 1) && (field.value.length > dotPos + 2);
	var illegalChars = /[\(\)\<\>\,\;\:\\\"\[\]]/ ;
	
	if (field.value == "") {
		field.style.background = 'Yellow';
		document.getElementById("errorEmail").innerHTML = "Please enter an email address";
		return false;
	} else if (!valid) {
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

function validatePassword(field) {					
	var illegalChars = /[\W_]/; // allow only letters and numbers 
 
	if (field.value == "") {
		field.style.background = 'Yellow';
		document.getElementById("errorPassword").innerHTML = "Please enter a password";
		return false;
	} else if (field.value.length < 7) {
		document.getElementById("errorPassword").innerHTML = "The length for password is too short";
		field.style.background = 'Yellow';
		return false;
	} else if (field.value.length > 20) {
		document.getElementById("errorPassword").innerHTML = "The length for password is too long";
		field.style.background = 'Yellow';
		return false;
	} else if (illegalChars.test(field.value)) {
		document.getElementById("errorPassword").innerHTML = "The password contains illegal characters";
		field.style.background = 'Yellow';
		return false;
	} else {
		field.style.background = 'White';
		document.getElementById("errorPassword").innerHTML = "";
		return true;
	}
}

function validateSamePassword(pass,conf) {
	if (conf.value == "") {
		conf.style.background = 'Yellow';
		document.getElementById("errorConfirmPassword").innerHTML = "Please enter password confirmation";
		return false;
	} 
	else if (pass.value != conf.value) {
		document.getElementById("errorConfirmPassword").innerHTML = "The confirm password must be same with the password";
		conf.style.background = 'Yellow';
		return false;
	}
	else { 
		conf.style.background = 'White';
		document.getElementById("errorConfirmPassword").innerHTML = "";
		return true;
	}
}

function validateFirstName(field){
	var regex = /^([\sA-Za-z]+)$/;
	  
	if (field.value == "") {
		field.style.background = 'Yellow'; 
		document.getElementById("errorFirstName").innerHTML = "Please enter your first name"
		return false;
	} else if (!regex.test(field.value)) {
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
					  
	if (field.value == "") {
		field.style.background = 'Yellow'; 
		document.getElementById("errorLastName").innerHTML = "Please enter your last name"
		return false;
	} else if (!regex.test(field.value)) {
		document.getElementById("errorLastName").innerHTML = "The name contains illegal characters";
		field.style.background = 'Yellow';
		return false;
	} else {
		field.style.background = 'White';
		document.getElementById("errorLastName").innerHTML = "";
		return true;
	}
}

function validateDate(field){
	if(field.value == ""){
		field.style.background = 'Yellow';
		document.getElementById("errorDOB").innerHTML = "Please enter your date of birth";
		return false;
	} else{
		field.style.background = 'White';
		document.getElementById("errorDOB").innerHTML = "";
		return true;
	}
}

function validateMonth(field){
	if(field.value == ""){
		field.style.background = 'Yellow';
		document.getElementById("errorDOB").innerHTML = "Please enter your date of birth";
		return false;
	} else{
		field.style.background = 'White';
		document.getElementById("errorDOB").innerHTML = "";
		return true;
	}
}

function validateYear(field){
	if(field.value == ""){
		field.style.background = 'Yellow';
		document.getElementById("errorDOB").innerHTML = "Please enter your date of birth";
		return false;
	} else{
		field.style.background = 'White';
		document.getElementById("errorDOB").innerHTML = "";
		return true;
	}
}

function validateNationality(field){
	if(field.value == ""){
		field.style.background = 'Yellow';
		document.getElementById("errorNationality").innerHTML = "Please select your nationality";
		return false;
	} else{
		field.style.background = 'White';
		document.getElementById("errorNationality").innerHTML = "";
		return true;
	}
}

function validateCountry(field){
	if(field.value == ""){
		field.style.background = 'Yellow';
		document.getElementById("errorCountry").innerHTML = "Please select your country";
		return false;
	} else{
		field.style.background = 'White';
		document.getElementById("errorCountry").innerHTML = "";
		return true;
	}
}

function validateZipCode(field){
	var regex = /^([0-9\b]+)$/;
	
	if (field.value == "") {
		field.style.background = 'White';
		document.getElementById("errorZipCode").innerHTML = "";
		return true;
	} else if (!regex.test(field.value)) {
		document.getElementById("errorZipCode").innerHTML = "The postal/ZIP code contains illegal characters";
		field.style.background = 'Yellow';
		return false;
	} else{
		field.style.background = 'White';
		document.getElementById("errorZipCode").innerHTML = "";
		return true;
	}
}

function validatePhoneCode(field){	
	if (field.value == "") {
		document.getElementById("errorPhone").innerHTML = "Please select country code";
		field.style.background = 'Yellow';
		return false;
	} else{
		field.style.background = 'White';
		document.getElementById("errorPhone").innerHTML = "";
		return true;
	}
}

function validatePhone(field){
	var regex = /^([0-9\b]+)$/;
	
	if (field.value == "") {
		document.getElementById("errorPhone").innerHTML = "Please enter a phone number";
		field.style.background = 'Yellow';
		return false;
	} else if (!regex.test(field.value)) {
		document.getElementById("errorPhone").innerHTML = "The phone number contains illegal characters";
		field.style.background = 'Yellow';
		return false;
	} else{
		field.style.background = 'White';
		document.getElementById("errorPhone").innerHTML = "";
		return true;
	}
}

function validateCheckBox(field){
	if(!field.checked){
		document.getElementById("errorCheckBox").innerHTML = "Please tick the checkbox";
		return false;
	} else{
		document.getElementById("errorCheckBox").innerHTML = "";
		return true;
	}
}