$(function(){
	// Check the initial Poistion of the Sticky Header
	var stickyHeaderTop = $('.ban-top').offset().top;

	$(window).scroll(function(){
		if( $(window).scrollTop() > stickyHeaderTop ) {
			$('.ban-top').css({position: 'sticky', top: '0px', 'z-index': '99999'});
			$('#stickyalias').css('display', 'block');
		} else {
			$('.ban-top').css({position: 'static', top: '0px'});
		}
	});
});

// Menu horizontal
$(document).ready(function () {
	$('#horizontalTab').easyResponsiveTabs({
        type: 'default', //Types: default, vertical, accordion
        width: 'auto', //auto or any width like 600px
        fit: true // 100% fit in a container
    });
});


function showToast (myText, myHeading='Thông báo', myType='success')
{
	return $.toast({
	    text: myText, // Text that is to be shown in the toast
	    heading: myHeading, // Optional heading to be shown on the toast
	    icon: myType, // Type of toast icon
	    showHideTransition: 'slide', // fade, slide or plain
	    allowToastClose: true, // Boolean value true or false
	    hideAfter: 5000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
	    stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
	    position: 'bottom-left', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values



	    textAlign: 'left',  // Text alignment i.e. left, right or center
	    loader: true,  // Whether to show loader or not. True by default
	    loaderBg: '#9EC600',  // Background color of the toast loader
	    beforeShow: function () {}, // will be triggered before the toast is shown
	    afterShown: function () {}, // will be triggered after the toat has been shown
	    beforeHide: function () {}, // will be triggered before the toast gets hidden
	    afterHidden: function () {}  // will be triggered after the toast has been hidden
	});
}
