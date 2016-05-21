function id(e)
{
	return document.getElementById(e);
}

function tools()
{
	this.rng	= id("rng");
	this.rng_v 	= id("rng_v"); //random numner generator
	
	this.rpg 	= id("rpg");
	this.rpg_v	= id("rpg_v");
	
	this.rcg	= id("rcg");		//g = generator,
	this.rcg_v	= id("rcg_v");		//r = random,
	
	this.ssg	= id("ssg");		//_v = value 
	this.ssg_v	= id("ssg_v");
	
	this.gtg	= id("gtg");
	this.gtg_v	= id("gtg_v");

	this.randomNmber = function(min, max)
	{
		//var randomnumber = Math.floor(Math.random() * 1000);
		
		
		var randomnumber = Math.random() * (max + 1) + min;
			randomnumber = Math.floor(randomnumber / 10) ;
		
		
		this.rng_v.value = randomnumber;
		
	};
	
	this.randomPwrd = function(len)
	{
		this.rpg_v.value = Math.random().toString(36).substr(2, len);	
	};
	

	this.randomColr = function()
	{
		var a, b, c;
		
		a = Math.floor((Math.random() * 255) + 1);
		b = Math.floor((Math.random() * 255) + 1);
		c = Math.floor((Math.random() * 255) + 1);
		
		this.rcg_v.style.backgroundColor= 'rgb(' + a + ',' + b + ',' + c + ')';
		this.rcg_v.value = 'rgb(' + a + ',' + b + ',' + c + ')';
	};
	
	this.getScreenSize = function()
	{
		this.ssg_v.value = window.screen.width + " x " + window.screen.height + " (depth: " + window.screen.colorDepth + ")";
	};
	
	this.getDateTime = function()
	{
		var d = new Date();
		
		this.gtg_v.value = d;
	};
	
}

window.onload = function()
{
	var tool = new tools();
	
	tool.rng.onclick = function()
	{
		
		var min = id("min").value, max = id("max").value;
		
		if (min == "")
		{
			min = 1;
		}
		
		if (max == "" || max < min)
		{
			max = min * 2;
		}
		
		tool.randomNmber(min, max);
		return false;
	};
	
	tool.rpg.onclick = function()
	{
		var len = id("pwlen").value;
		
		tool.randomPwrd(len);
		return false;
	};
	
	tool.rcg.onclick = function()
	{
		tool.randomColr();
		return false;
	};
	
	tool.ssg.onclick = function()
	{
		tool.getScreenSize();
		return false;
	};
	
	tool.gtg.onclick = function()
	{
		tool.getDateTime();
		return false;
	};
	
};












