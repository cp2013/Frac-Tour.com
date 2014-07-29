$(document).ready(function () {	
$('.signin').click(function(event){
		event.preventDefault(); // disable normal link function so that it doesn't refresh the page			
		$('.mask').show();
		$('.loginpopup').show(); //display your popup and set height to the page height
	});
 
	// hide popup when user clicks on close button or outside popup box
	$('.close, .mask').click(function(){
		$('.mask, .loginpopup').hide(); // hide the overlay
		//document.getElementsByClassName('warningtxt')[0].style.display = 'none';
		return false;
	});
	
	// prevents the overlay from closing if user clicks inside the popup box
	$('.loginpopup').click(function(){
		return false;
	}); 
});

function signin(){
	$('.mask, .loginpopup').hide();
}