
//function to get elements by ID
function id(e)
{
	return document.getElementById(e);
}

//create a tools object
function tools()
{
	this.rng	= id("rng");
	this.rng_v 	= id("rng_v"); //random numner generator
	
	this.rpg 	= id("rpg");
	this.rpg_v	= id("rpg_v");	//random password generator
	
	this.rcg	= id("rcg");		
	this.rcg_v	= id("rcg_v");	//random colour generator
	
	this.ssg	= id("ssg");		 
	this.ssg_v	= id("ssg_v");	//screen size generator
	
	this.gtg	= id("gtg"); 	
	this.gtg_v	= id("gtg_v");	//generate time and date

	this.randomNmber = function(min, max) //give min and max values
	{
	
		//create a random number in between
		
		var randomnumber = Math.random() * (max + 1) + min;
			randomnumber = Math.floor(randomnumber / 10) ; //round it down with floor
		
		//give the attribute the return value
		this.rng_v.value = randomnumber;
		
	};
	
	this.randomPwrd = function(len)
	{
						//create a random generated string / number and pic part of it
		this.rpg_v.value = Math.random().toString(36).substr(2, len);	
	};
	

	this.randomColr = function()
	{
		var a, b, c; // red, green, blue values
		
		a = Math.floor((Math.random() * 255) + 1);
		b = Math.floor((Math.random() * 255) + 1); // create random numbers for each of the RGB
		c = Math.floor((Math.random() * 255) + 1);
		
		this.rcg_v.style.backgroundColor= 'rgb(' + a + ',' + b + ',' + c + ')'; //apply the colour
		this.rcg_v.value = 'rgb(' + a + ',' + b + ',' + c + ')';
	};
	
	this.getScreenSize = function()
	{
					//display the screen width x height x depth
		this.ssg_v.value = window.screen.width + " x " + window.screen.height + " (depth: " + window.screen.colorDepth + ")";
	};
	
	this.getDateTime = function()
	{
		//create a new data object
		var d = new Date();
			//and return it
		this.gtg_v.value = d;
	};
	
}

//window onload 
window.onload = function()
{
	//create a new tool 
	var tool = new tools();
	
	tool.rng.onclick = function()
	{
		//provide a min, max where it is not blank  
		var min = id("min").value, max = id("max").value;
		
		if (min == "")
		{
			min = 1;
		}
		
		//and min is not more than max
		if (max == "" || max < min)
		{
			max = min * 2;
		}
		
		tool.randomNmber(min, max);
		return false;
	};
	
	//
	tool.rpg.onclick = function()
	{
		//create a random password on click
		var len = id("pwlen").value;
		
		tool.randomPwrd(len);
		return false;
	};
	
	tool.rcg.onclick = function()
	{
		//create a random colour
		tool.randomColr();
		return false;
	};
	
	
	tool.ssg.onclick = function()
	{
		//get screen size and depth
		tool.getScreenSize();
		return false;
	};
	
	tool.gtg.onclick = function()
	{
		//get time
		tool.getDateTime();
		return false;
	};
};
