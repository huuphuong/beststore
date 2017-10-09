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

// Slide 
$(window).load(function() {
	$('#visual').pignoseLayerSlider({
		play    : '.btn-play',
		pause   : '.btn-pause',
		next    : '.btn-next',
		prev    : '.btn-prev'
	});
});