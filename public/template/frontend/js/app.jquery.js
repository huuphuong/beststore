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