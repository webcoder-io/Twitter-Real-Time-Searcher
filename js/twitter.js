/** 
* Written by Andy@PCinvent.com
* http://www.PCinvent.com
* Andy@PCinvent.com
*/

$( document ).ready(function() {
	// run in specific interval to refresh automatically


	window.setInterval(function(){
		if($($input).val()){ // if keyword is typed
			doneTyping();
		}
	}, 5000); // new version should use https://dev.twitter.com/rest/public/rate-limiting to avoid getting banned

	//setup before functions
	var typingTimer;                // timer identifier
	var doneTypingInterval = 800;  // time in ms, 5 second for example
	var $input = $('#searcher input.form-control'); // input selector

	// on keyup, start the countdown
	$input.on('keyup', function() {
	  clearTimeout(typingTimer);
	  typingTimer = setTimeout(doneTyping, doneTypingInterval);
	});

	// on keydown, clear the countdown 
	$input.on('keydown', function () {
	  clearTimeout(typingTimer);
	});

	// user is "finished typing," do something
	function doneTyping() {
		$.ajax({
			url: "../ajax/twitter/search/"+$input.val(), 
			dataType: 'json',
			success: function(response){
			
			// loop through json obj
			$.each(response.statuses, function(key,obj) {
				// remove error message if there is any
				if($( ".response_error" ).length ){
					$( ".response_error" ).remove();
				}
				
				// prepend new input
				$("#results").prepend( "<hr />" );
				$("#results").prepend( "<p class='response_text'>"+obj.text+"</p>" );
				$("#results").prepend( "<p class='response_created_at_unix'>Unix Timestamp: "+convertTimestamp(obj.created_at)+"</p>" ); // format date tiemstamp
				$("#results").prepend( "<p class='response_created_at'>Time: "+removeStringTail(obj.created_at,10)+"</p>" ); //  // remove last few human unreable time text 
			}); 
			
			},
            error: function (textStatus, errorThrown) {
				$("#results").prepend( "<p class='response_error'>ERROR: Please check your keywords and try again!</p>" ); // show error for 400 bad request
            }
		});
	}
	
	function convertTimestamp(timeString) {
		var unixtime = Date.parse(timeString)/1000 // using date.js
		return unixtime;
	}
	
	function removeStringTail(string_text, $length){
		var string_text = string_text.substring(0, string_text.length - $length);
		return string_text;
	}
	
	// clear responsec text when reset button is clicked
	$(":reset").click(function() {
		$("#results").empty();
	});
});