    
    //  specifies the method to run onload
    window.onload = addImages ;
	
	//  add the onclick event to the DOM
    function addImages() 
	{
    	var item = document.getElementById("thumbs").getElementsByTagName("img");
    	
		for (var i=0 ; i<item.length ; i++) 
		{
			item[i].onmouseover = function()
			{
				showPic(this);
			};
    	}
    }
	
	
    // changes source on image to that provided within the thumbnail image tag
	function showPic(i_element) 
	{
		var source = i_element.getAttribute("src") ;
		var alt = i_element.getAttribute("alt") ;

		var i = document.createElement("img") ;
		i.setAttribute("src",source) ;
		i.setAttribute("alt",alt) ;
      
		var placeholder = document.getElementById("holder") ;
		
		//alert(placeholder.childNodes.length) ;
		placeholder.childNodes[1].src = i_element.src
		//placeholder.childNodes[1].setAttribute("src",source) ;
		//placeholder.childNodes[1].setAttribute("alt",alt) ;
    }
    


