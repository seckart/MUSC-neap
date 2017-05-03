/**
 *	Stuff pertaining to this NEAP'S submission dates
 */
;(function($) {

$(function() {
	"use strict";

	var MONTHS = [ 
		"January", "February", "March", "April", "May", "June", "July", 
		"August", "September", "October", "November", "December"
	];

	// This NEAP's submission date (Month/Day/Year Ti:me AMorPM)
	// Example: new Date('4/19/2017 8:00 AM'); is April 19th
	var NSI_date = new Date('2/16/2017 8:00 AM');
	var past_survey_date = new Date('2/1/2016 8:00 AM');
	var future_survey_date = new Date('2/1/2017 8:00 AM');
	var presentation_date = new Date('5/21/2017 8:00 AM');
	var submission_date = new Date('4/01/2018 8:00 AM');

	// Break out the components of the NSI date
	var NSI_date_month = MONTHS[NSI_date.getMonth()];
	var NSI_date_day = NSI_date.getDate() ;
	var NSI_date_year = NSI_date.getFullYear();
	
	// Break out the components of the submission date
	var sub_month = MONTHS[submission_date.getMonth()];
	var sub_day = submission_date.getDate() ;
	var sub_year = submission_date.getFullYear();
	var sub_time = TimeUntil(submission_date);

	// Break out the components of the presentation date
	var pres_month = MONTHS[presentation_date.getMonth()];
	var pres_day = presentation_date.getDate() ;
	var pres_year = presentation_date.getFullYear();
	
	// Break out the components of the past survey date
	var past_survey_month = MONTHS[past_survey_date.getMonth()];
	var past_survey_day = past_survey_date.getDate() ;
	var past_survey_year = past_survey_date.getFullYear();
	
	// Break out the components of the future survey date
	var future_survey_month = MONTHS[future_survey_date.getMonth()];
	var future_survey_day = future_survey_date.getDate() ;
	var future_survey_year = future_survey_date.getFullYear();
	
	// Set the various dates on the page in the Sidebar's Date Box
	SetDaysToSubmission(sub_time["days"]);
	SetFullDate('sub_date', sub_month, sub_day, sub_year);
	SetFullDate('pres_date', pres_month, pres_day, pres_year);
	SetFullDate('NSI_date', NSI_date_month, NSI_date_day, NSI_date_year);
	SetFullDate('past_survey_date', past_survey_month, past_survey_day, past_survey_year);
	SetFullDate('future_survey_date', future_survey_month, future_survey_day, future_survey_year);
	
	
	
	// Run the countdown timer, if this page happens to have one
	StartCountdowns(submission_date);




	/**
	 *	TimeUntil	
	 *	Will calculate the remaining time until a future date, starting with current time.
	 *	It will return an object with the hours, days, seconds and minutes broken out.
	 *	It is deductive. So, 2 days, 3 hours, 4 minutes, 13 seconds left until such time
	 *	
	 *	Example:
	 *	---------
	 *	You'd want to call it like this:
	 *		var someDate = new Date('4/19/2017 8:00 AM');
	 *		var components = TimeUntil(someDate);
	 *	Then use it like:
	 *		components["days"] or components["minutes"]
	 *	
	 * @param futureDate - Date - A javascript date object for a point in time, in the future
	 * @return Object - An object containing the components of time for the difference between
	 *		the current time and future date. These components are deductive, starting with
	 *		the number of days, then hours, then minutes, finally seconds.
	 */
	function TimeUntil( futureDate ) {
		// Known Metrics (In Milliseconds)
		var SECOND = 1000;
		var MINUTE = SECOND * 60;
		var HOUR = MINUTE * 60;
		var DAY = HOUR * 24;

		// Today
		var now = new Date();

		// Milliseconds between now and then
		var delta = futureDate - now;
		
		// Is futureDate actually in the future?
		if ( delta > 0 ) {
			// Time until then is days + hours + minutes + seconds
			var days = Math.floor(delta / DAY);
			var hours = Math.floor((delta % DAY) / HOUR);
			var minutes = Math.floor((delta % HOUR) / MINUTE);
			var seconds = Math.floor((delta % MINUTE) / SECOND);
			return {
				"days" : days, "hours" : hours, "minutes" : minutes, "seconds" : seconds
			};
		}

		// Default return value if not in the future
		return {
			"days" : 0, "hours" : 0, "minutes" : 0, "seconds" : 0
		};

	}

	/**
	 *	SetDaysToSubmission
	 *	When called, this function will find an element with the 
	 *	id of "days_to_sub". If found, it's contents will be replaced
	 *	with a string.
	 *	The string will look like:
	 *		265 Days
	 *	The number portion (265), is pulled from teh DaysLeft variable
	 *
	 * @param DaysLeft - String A number of days
	 * @return undefined
	 */
	function SetDaysToSubmission(DaysLeft) {
		var text = DaysLeft + " Days";
		var days_left_box = $('#days_to_sub');
		if ( days_left_box.length > 0 ) {
			days_left_box.text(text);
		}
	}

	/**
	 *	SetFullDate
	 *	Given an element's "id" (can be a classname too), 
	 *	and some date parameters, this function will form a nice looking string.
	 *	The string will look something like:
	 * 		October 21, 2017
	 *		[themonth thedate, theyear] << It's based on that structure
	 *	Then, the string will be set as the contents of some element.
	 *	Specifically, the element that has the given "id"
	 *
	 * @param id - String an elements "id" or "class"
	 * @param themonth - String Name of a month, like "October"
	 * @param thedate - String A numerical date, like "17"
	 * @param theyear - String A numerical year, like "2016"
	 * @return undefined
	 */
	function SetFullDate(id, themonth, thedate, theyear) {
		// Build a string containing some date
		var text = themonth + " " + thedate + ", " + theyear;
		// Check both "id" and "class" ('#id, .id')
		var el = $('#' + id + ', .' + id);
		if ( el.length > 0 ) {
			el.text(text);
		}
	}

	/**
	 *	StartCountdowns
	 *		When called, this function will look throughout the page for
	 *		any elements with the designated "id", indicating that the
	 *		element should be a countdown timer.
	 *	If the element is found, an interval will be created, which will
	 *	re-set the text of the element, with the remaining time, until
	 *	the futureDate, which is what the parameter "futureDate" is.
	 *
	 * @param futureDate - Javascript Date Object
	 * @return undefined
	 */
	function StartCountdowns(futureDate) {
		// Check if there are any countdown elements on the page
		var el = $('#js-countdown');
		if (el.length > 0) {
			// Go ahead and set the time, once, right now
			SetCountdownTimerText( el, futureDate );
			// Then, run it again every 1 second
			setInterval(SetCountdownTimerText, 1000, el, futureDate);
		}
	}

	/**
	 *	SetCountdownTimerText
	 *		When called, this function will obtain the remaining time
	 *		between now and the future date. It will then form a string
	 *		describing the remaining time. Finally, it will replace the
	 *		contents of "el" with that string.	
	 *	The string is likely to look like:
	 *		212 days, 5 hours, 33 minutes, 54 seconds
	 *
	 *	This function is likely to be called in an interval (setInterval)
	 *	However, it's probably going to be called one time in the beginning
	 *
	 * @param el - jQuery Dom Element on which to set the date
	 * @param futureDate - Javascript Date Object
	 * @return undefined
	 */
	function SetCountdownTimerText( el, futureDate ) {
		// How much time is left between now and then
		var time = TimeUntil( futureDate );
		// Build the string
		var timestr = time["days"] + " days, " + 
					time["hours"] + " hours, " + 
					time["minutes"] + " minutes, " + 
					time["seconds"] + " seconds";
		// Set the content of the element with the string
		el.text(timestr);
	}


});

})(jQuery);