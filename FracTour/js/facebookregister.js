window.fbAsyncInit = function() {
	FB.init({
		appId      : '498520840278937', // Facebook App ID
		cookie     : true,  // enable cookies to allow the server to access the session
		status	   : true,
		oauth      : true,
		xfbml      : true,  // parse social plugins on this page
		version    : 'v2.1' // use version 2.1		
	});
};

// Load the SDK asynchronously
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function testAPI() {
	FB.api('/me', function(response) {
		signupform.email.value = response.email;
		signupform.firstname.value = response.first_name;
		signupform.lastname.value = response.last_name;
	});
}
  
function fb_login(){	
	FB.login(function(response) {
		if (response.status === 'connected') {
		  // Logged into your app and Facebook.
		  testAPI();
		} else if (response.status === 'not_authorized') {
		  // The person is logged into Facebook, but not your app.
		  alert("Please log into this app.");
		} 
	});
}