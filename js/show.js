/**
 *	Stuff pertaining to showing and hiding elements goes here.
 */
;(function($) {

$(function() {
	"use strict";

	// Bind All Event Listeners
	$('.js-toggle-sibling').click(ShowHideSibling);
	$('[data-slide-target]').click(ShowOrHideSidebar);

	// Go ahead and open and close stuff based on the existence
	// of the 'open' class
	$('.js-toggle-sibling.open').css('display', 'block');


	/**
	 *	Expanding and Collapsing Elements (Siblings)
	 *
	 *	Put the class '.js-toggle-sibling' on the thing to click.
	 *	Put the class '.js-toggle-me' on a SIBLING of the thing to click.
	 *
	 *	Clicking .js-toggle-sibling will slide up or down to show
	 *		or hide the thing with .js-toggle-me
	 *
	 */
	function ShowHideSibling(e) {
		var toggle_target = $(this).siblings('.js-toggle-me');
		if (toggle_target.length > 0) {
			toggle_target = $(toggle_target);
			if (toggle_target.hasClass('open')) {
				// Close it
				toggle_target.slideUp(function() {
					toggle_target.removeClass('open');
				});
			} else {
				// Open it
				toggle_target.slideDown(function() {
					toggle_target.addClass('open');
				});
			}

		}
	}


	/**
	 *	Hiding and Showing the Left Sidebar When Something Is Clicked
	 *
	 *	Put the data attribute "data-slide-target" on the thing to click
	 *		Set that data attribute to the #ID of the sidebar
	 *
	 *	Clicking 'data-slide-target' will Toggle the sidebar
	 *		The Sidebar is hidden by moving it's 'left' off the screen
	 *		The content is accomodated by reducing the 'width' of the 
	 *		sidebar, so that the .content_wrapper fills the new gap.
	 *
	 *		The Sidebar is shown by reversing what I just said above.
	 */
	function ShowOrHideSidebar(e) {
		var sidebarId = $(this).data('slide-target');
		if (sidebarId && sidebarId != "") {
			var sidebar = $('#' + sidebarId);
			if (sidebar.length > 0) {
				var sb_op = {}, sb_cb = {};
				var content_op = function() {};
				var content_cb = function() {};
				var speed = 350; /* milliseconds */
				var width = '300px';
				var sidebarIsHidden = $(sidebar).hasClass('away');
				if (sidebarIsHidden) {
					// Bring The Sidebar Back On Screen
					sb_op = {'left':'0px', 'width': width};
					sb_cb = function() { $(sidebar).removeClass('away'); };
					// Add back the padding-left on content
					content_op = {'padding-left':width};
				} else {
					// Send The Sidebar Away
					sb_op = {'left':'-340px', 'width': '0px'};
					sb_cb = function() { $(sidebar).addClass('away'); };
					// Remove Padding on content to fill the gap
					content_op = {'padding-left':'0px'};
				}
				// Animate Sidebar Imitator
				$('.sidebar_imitator').animate( sb_op, speed, sb_cb );
				// Animate Sidebar
				$(sidebar).animate( sb_op, speed, sb_cb );
				// Animate Content
				$('.content_wrapper').animate( content_op, speed, content_cb );
			} else {
				console.log("Error: No element with the id: " + sidebarId);
			}
		} else {
			console.log("Error: No sidebar id set for data-slide-target.");
		}
	}

});

})(jQuery);