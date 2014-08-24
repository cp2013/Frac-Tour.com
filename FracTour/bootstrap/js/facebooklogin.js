window.fbAsyncInit = function() {
	FB.init({
		appId      : '498520840278937', // Facebook App ID
		cookie     : true,  // enable cookies to allow the server to access the session
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
	console.log('Welcome!  Fetching your information.... ');
	FB.api('/me', function(response) {
		console.log('Successful login for: ' + response.name);
		document.getElementById('statusbox').innerHTML =
		'Welcome, ' + response.name + ' | <div class="row"><div class="col-md-7"><a href="user_managebooking.php">MANAGE BOOKING</a></div>' + ' <div class="col-md-2"><a href="#" onclick="fb_logout()">LOGOUT</a></div></div>';
	});
	$('.mask, .loginpopup').hide();
}
  
function fb_login(){
	FB.login(function(response) {
		if (response.status === 'connected') {
		  // Logged into your app and Facebook.
		  testAPI();
		} else if (response.status === 'not_authorized') {
		  // The person is logged into Facebook, but not your app.
		  document.getElementById('statusbox').innerHTML = 'Please log into this app.';
		} 
	});
}

function fb_logout(){
	FB.logout(function(){document.location.reload();});
}