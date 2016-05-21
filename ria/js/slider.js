	 
	 /*
		Create a simple slide show with jQuery selectors and animations.
		
		../[requires nothing]
	 */
	 
	var bg = {}; //background
	 
	bg = { //background settings
		"count" 	: -1,
		"holder" 	: $("div.slide_show"),
		"imageList" : 
						//Dynamic list of images. Will work regardless of how many images are added
						[
							"/~0706008/ria/img/london.jpg",
							"/~0706008/ria/img/edinburgh.jpg",
							"/~0706008/ria/img/dundee.jpg"
						],
				
		"change" 	: 	function() 
						{
							//easier to type b than bg.holder, also seperates to make more readable for which ones
							//are being used for animation purposes.
							var b = bg.holder;

							/*
								delay the animation (so that it matches, roughly,
								with the marathon countdown timer), then 
								animate the opacity in 0.5s
							*/
							
							b.delay(320).animate({ opacity: 1 }, 500,function()
							{
								//animate it in 0.1s to give the "blink" effect
								b.animate({ opacity: 0.7 }, 100,function()
								{
									//update the position of image list
									bg.count++; 

									if (bg.count > bg.imageList.length -1)
									{
										//reset if reached the end of the list
										bg.count = 0;	
									}
									
									//get the new image path from the bg object using the count positioning
									var newimage = bg.imageList[bg.count];
									
									//Change the background image to the new one
									b.css("background-image", "url("+newimage+")"); 

									//animate fully back in
									b.animate({ opacity: 1 }, 400);
								});
							});
						}
		};
	
	//Slide show changes every 3.5s using a timer 
	//event that calls bg.change()
	setInterval(bg.change, 4500);
	
	//Used for debugging throughout the site. 
	//Easier to write log("xxxx") than console.log("xxxx")
	function log(message)
	{
		console.log(message);
	}