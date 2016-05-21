

	//JavaScript file with random pieces of code that adds functionality through
	// out the site, that is general and does not need its own specific JS File.
	$(document).ready(function()
	{

		/*
			Cookie Manager:
			
			//..[require jquery.cookie.min.js]
		*/
		
		//If no cookie has been set, 
		if (!$.cookie("accept-cookie-policy")) 
		{
			//Animate the cookie bar, alerting the user of the site that 
			//we may use cookies, directing them to Abertay's Privacy page
			$("#cookie").slideDown("slow", function(){});
		}
		
		//When the user has read the message, and click the close link
		$( ".close-message" ).click(function(){
			
			//animate the box to hide the message and then set the cookie for
			//the website -- other pages will read this, and know they have
			//accepted this already.
			$( "#runEffect" ).slideUp("slow", function()
			{	
				//onComplete of sliding, set the cookie, with an expiration of one week
				//this is ample time, and also reminds the users of the website in the future
				//that their privacy is being respected, by reminding them how its being handled.
				$.cookie("accept-cookie-policy", "1", {expires: 7});
			});
		});
		
		/*
			Website UI elements -- primarily the external links popup
		
			../[require jquery-ui.min.js]
			../[require https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css]
		
			Used to give a nice alert / popup giving the user the option to stay on the website
			or move the one being linked. 
			
			It wills show the link, and present the options to choose "This is OK", or "No"
			
			
		*/
		$(".external-link").click( function(e)
		{
			//Prevent the website from loading a new page on clicking an A-HREF
			e.preventDefault();
			
			//Get the link that was clicked on
			var link = $(this).attr("href");
			
			//Populate the Popup box with some dynamic text
			$("#dialog-confirm").find("p").html("<span class=\"ui-icon ui-icon-alert\"></span>You are about to be re-directed to: <br><span style=\"color: blue;\">" + link + "</span><br><br>Are you sure you want to do this?");
			$( "#dialog-confirm" ).dialog(
			{
				//Plugin settings
				resizable	: false,	//Stop the user from resizing the alert
				draggable	: false,	//Prevent the user from dragging it around the screen
				height		: 250,		//Give the box a custom size
				width		: 300,		//AS ABOVE
				modal		: true, 	//	    true ::  you can NOT interact with the page, and only the popup is useable
				buttons		: 			//		false::  you can still select text, drag images, etc..., but the popup remains
				{
					//Text for the button
					"This is OK": function() 
					{
						//If the link clicked is meant to open a new page
						if ($(this).attr("target") === "_blank")
						{
							//Open a new window, if TRUE
							window.open(link, "_blank");
							return false;
						}
						else				
						{
							//Else, the current window will be redirected
							window.location = link;
						}
					},
					Cancel: function() 
					{
						//Close the alert, if the user declined to open the link
						$(this).dialog( "close" );
					}
				}
			});
		});
		
		
		/*
			Create the drop down navigation effect, using jQuery
		
			Use bind to try something new.
		*/
		
		//All li child elements of the .main-nav class will have the 
		//function bound to the mouse over / out
		$('.main-nav > li').bind('mouseover', openSubMenu);
		$('.main-nav > li').bind('mouseout', closeSubMenu);
		
		function openSubMenu() 
		{
			//show the menu on mouse over
			$(this).find('ul').css('visibility', 'visible');	
		};
			
		function closeSubMenu() 
		{
			//hide the menu on mouse out
			$(this).find('ul').css('visibility', 'hidden');	
		};
		
		
		/*
			AJAX requests - Used on the events page, as well as individual event pages.
			
			For each of the requests:
				- prevent default to prevent the link refreshing the page
				  when the new data is received.
				- Load the AJAX specific task, and insert into the appropriate
				  allocated slot
		*/
		
		$("#ajax-dundee-read-more").on("click", function(e)
		{
			e.preventDefault();
			
			$("div.left.column").load("event/dundee.html div.left.column");
			return false;
		});
		
		$("#ajax-edinburgh-read-more").on("click", function(e)
		{
			e.preventDefault();
			
			$("div.left.column").load("event/edinburgh.html div.left.column");
			return false;
		});
		
		$("#ajax-london-read-more").on("click", function(e)
		{
			e.preventDefault();
			
			$("div.left.column").load("event/london.html div.left.column");
			return false;
		});

		
		/*
			http://stackoverflow.com/questions/2907367/have-a-div-cling-to-top-of-screen-if-scrolled-down-past-it
			
			Fancy navigation: Keep the navigation on top of the page when the user scrolls past it
			This means its always accessible and gives a more RIA effect.
		*/
		
			 
		var $window = $(window);					//Select the browser window properties
		var $e = $('.top-nav');						//Select the element to stick to the top of the page
		
		var eTop = $e.offset().top + 71;			/*offset gets the current position on the page as an object
														such as Object {top: 1328, left: 191.5}
														
													  .top will then get the top parameter from the object
													  
													  The +71 gives a smoother animation when scrolling the page some
													  the navigation doesn't jump (as much)
													*/
		//When the user scrolls the window
		$window.on("scroll", function() 
		{
			//Give the Element the sticky CSS class on the condition that scrollTop is more than elTop (true / false)
			$e.toggleClass('sticky', $window.scrollTop() > eTop);
		});
	});
	  