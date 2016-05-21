

		//purpose: changes the slider
		
		
	var slide = document.getElementsByClassName("slide")[0];
	var count = 1;
	
	//change the slider every five seconds
	window.setInterval(function(){
	  slider.change();
	}, 5000);


	
	var slider = {};

		slider.change = function ()
		{
			//if the image is number one, change to number two
			if (count)
			{
				count = 0;
				slide.setAttribute("src", "img\\banner_two.jpg");
			}
			else // if the image is two, change to one
			{
				count = 1;
				slide.setAttribute("src", "img\\banner_one.jpg");
			}
		}