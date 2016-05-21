	
	/*
		Animated marathon countdown bar.
		
		../[requires nothing]
		
		Animates the bar with a countdown for each of the marathons set.
		
		This value is dynamic and can be added too, or removed, and will still 
		function to its full ability.
	*/
	
	$(document).ready(function()
	{
		//the number to remember which marathon is being shown
		var count 		 = 0; 
		var marathon     = [];
		
			/*
				Takes three values 
					1. It's location
					2. The countdown value - i.e the date to count too
					3. The image being used
			*/
			
			marathon[0] = 	{
				"location" 	: "London",
				"time"	  	: "04/26/2016 11:00 AM",
				"image"		: "/~0706008/ria/img/london.jpg"
			};
			marathon[1] = 	{
				"location" 	: "Edinburgh",
				"time"	  	: "05/31/2015 11:00 AM",
				"image"		: "/~0706008/ria/img/edinburgh.jpg"		
			};
			marathon[2] = {
				"location" : "Dundee",
				"time"	   : "06/12/2015 11:00 AM",
				"image"		: "/~0706008/ria/img/dundee.jpg"			
			};
		 
		// animate the change, every 4.5 seconds
		setInterval(changeMarathon, 4500);

		function changeMarathon()
		{
			//The container to display the countdown
			var container = $("#timer");
			
			//The value to be shown ::London will be in xx days.. etc.
			var loc = marathon[count].location;
			
			//The value as a string to the time specified in the marathon object
			//sent to the countdown_timer function, returning the string.
			var run = countdown_timer(marathon[count].time);
			
				//animate the container
					// swing out
				container.animate({
					width: [ "toggle", "swing" ],
					height: [ "toggle", "swing" ],
					opacity: "toggle"
				  }, 1000, "linear", function() {
					//update the information in the banner
					$(".location").html(loc);
					$(".c_down").html(run); //@param1: date
					
				//then swing back in again
				  }).animate({
					width: [ "toggle", "swing" ],
					height: [ "toggle", "swing" ],
					opacity: "toggle"
				  }, 1000, "linear", function() {
					//end of animations
				 });

			  
			//add to the count to display new marathon times
			count++; 
			
			if (count == marathon.length)
			{
				//reset marathon count if reached the last value
				count = 0; 
			}
		}
		
		//calculate the time remaining for the data set in Marathon
		function countdown_timer(d)
		{
			//date to count too
			var end 		= new Date(d), 
			timer,
			
			//calculate the time periods
			_second 	= 1000,
			_minute 	= _second * 60,
			_hour 		= _minute * 60,
			_day 		= _hour * 24;
		
			//the current date
			var now		 = new Date();
			
			//the time between now, and the date being counted too
			var distance = end - now;
			
			/*if (distance < 0) 
			{
				//clearInterval(timer);
				$("#timer").find("span")[1].text("This event has already started!");
				return;
			}*/

			//return d, as an object, more customisable, can display selected ones, or all
			var d = {};
				d.days 		= Math.floor(distance / _day) + " days ";
				d.hours 	= Math.floor((distance % _day) / _hour) + " hours ";
				d.minutes	= Math.floor((distance % _hour) / _minute) + " minutes ";
				d.seconds	= Math.floor((distance % _minute) / _second) + " seconds ";

			return update(d);
		}

		//takes the d object as a paramater, and can select specific countdown methods, or all, or none
		function update(timer)
		{
			//return it as a string
			return timer.days + timer.hours + timer.minutes + timer.seconds;
		}
	});