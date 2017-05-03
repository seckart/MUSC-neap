/**
 *	Stuff pertaining to scrolling, such as the entire page
 */
;(function($) {

$(function() {
	"use strict";

	// Bind all event listeners
	$('.js-scroll-top').click(ScrollToTop);


	/**
	 *	ScrollToTop
	 *	When called, the page will scroll to the top.
	 *	You'd likely attach this function to a click event
	 *	listener, and when that thing is clicked, the page would
	 *	scroll to the top.
	 */
	function ScrollToTop() {
		$('html, body').animate({scrollTop: 0});
	}

});

})(jQuery);