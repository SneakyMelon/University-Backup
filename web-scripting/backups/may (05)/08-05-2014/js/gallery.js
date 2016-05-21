
	//global variables
	var page;
	var per;
	
	//get page number
	page = location.search.split('page=')[1] ? location.search.split('page=')[1] : '1';
	
	//get per number
	per = location.search.split('per=')[1] ? location.search.split('per=')[1] : '4';
	
	if (page.indexOf('&') > -1)
	{
		//fix bug that sets page variable that includes
		//the per variable too.
		page = page.split('&')[0];
	}
	
	//get last "per" value variable in location.search
	//per  = location.search.split('per=')[location.search.split('per').length -1];

	window.onload = function()
	{
		document.forms["per_page"].per.value = location.search.split('per=')[1] ? location.search.split('per=')[1] : '4';
	}
	
	document.forms["per_page"].per.onchange = function()
	{
		var per = document.forms["per_page"].per.value
		//window.location =  "?page=" + page + "&per=" + per;
		window.location = "?page=" + page + "&per=" + per;
	}