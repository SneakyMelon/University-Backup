	
	var slide = document.getElementsByClassName("slide")[0];
	var count = 1;
	
	window.setInterval(function(){
	  slider.change();
	}, 5000);


	
	var slider = {};

		slider.change = function ()
		{
			if (count)
			{
				count = 0;
				slide.setAttribute("src", "img\\banner_two.jpg");
			}
			else
			{
				count = 1;
				slide.setAttribute("src", "img\\banner_one.jpg");
			}
		}