
		/*
			Primarily sourced from eBay Developers Section of their website.
			Several edits and adaptations are adapted into this site.
			
			../[requires nothing]
		*/

		var r = null, 			//debug the response into a JSON console.log()
			q = "",				//query string
			urlfilter = "",		//string that is sent to eBay to limit the search results, such as catagories, prices, GB_en vs USA_en
			filterarray = [],	//array of objects - used to restrict search query
			url = "",			//URL generated from the paramaters
			limit = 3;			//paginated results default value -- range:: 2-5
		
		
		//When you submit the shop form
		$("#frmShop").submit(function(event)
		{
			//prevent default send
			event.preventDefault();
			
			//get the query value
			var query = $("#frmShop input:text").val();
			
			//compare it and check to see if its undefined or null or en empty string
			
			//if its valid, send the query (almost like _SELF on many servide side languages,
			//but I'm using the browser search properties
				//References to: window.location.search
				
			if (query != "" && query != undefined && query != null)
			{
				window.location = "shop.html?q=" + query + ";" + $("#nmrPaginate").val() ;
			}
			else
			{
				//Else: don't submit
				//console.log("ERROR: " + query);
			}
		});
		
		//the number box that controls how many search results can be viewed at a time
		
		//bind the click, keyup, and blur events to the number feild
		$("#nmrPaginate").bind("click keyup blur", function()
		{
			//get the number, max, and minumum values
			var $this = $(this),
				max = $this.attr("max"),
				min = $this.attr("min");
			
			//if max value is more than max allowed, set it to max allowed
			if ($this.val() > max)
			{
				$this.val(max);
			}
			//if min value is less than min allowed, set it to min allowed
			else if ($this.val() < min)
			{
				$this.val(min);
			}
		});

		//code that calls the EBAY-GB shop
		
		//is equal to 'q=shoes;3'
		if (window.location.search)
		{
			//search query (q) is set by getting the window.location.search value
			//and then splitting it by ?q= as we dont need these values, then selecting
			//the second half of the split to get the values
			var temp = window.location.search.split("?q=")[1];	
			
			//the search string is the first half of the value
			q = temp.split(";")[0];
			//and the limit is seperated via a semi-colon
			//so get the second value of the split to get the shop limit value
			limit = temp.split(";")[1];
			
			//browser hacks
			//if someone enters more than 5 or less than 2,
			//set a default value of 3 as your not allowed to have 
			//these values otherwise
			if (limit > 5 || limit < 2)
			{
				limit = 3; //restore defaults
			}
			
			//fill the HTML elements with the values from the search query
			//to aid the user in shopping again, UX and stuff
			$("#frmShop").find("input:text").val(q);
			$("#nmrPaginate").val(limit);
			
			//start building shop components
			buildFilter();
			buildURLArray(filterarray);	
			buildURL();
			send();
		}
	
		function buildFilter()
		{
			filterarray = 
				[ //filter that is sent to the EBAY API to limit results
					//values are self explanatory
					{
						"name":"MinPrice",
						"value":"50",
						"paramName":"Currency",
						"paramValue":"GBP"
					},
					{
						"name":"FreeShippingOnly",
						"value":"false",
						"paramName":"",
						"paramValue":""
					},
					{
						"name":"ListingType",
						"value":["AuctionWithBIN", "FixedPrice"],
						"paramName":"",
						"paramValue":""
					},
					{
						"name":"condition",
						"value":["new","4000"]
					},
					{
						"name":"HideDuplicateItems",
						"value":"true",
					},
					{
						"name":"listingType",
						"value":"StoreInventory",
						"value":"",
						"paramName":"",
						"paramValue":""
					}		   
				];
		}

	
		
		// Execute the function to build the URL filter
		buildURLArray(filterarray);	
		
		// Generates an indexed URL snippet from the array of item filters
		function  buildURLArray() 
		{
			// Iterate through each filter in the array
			for(var i=0; i<filterarray.length; i++) 
			{
				//Index each item filter in filterarray
				var itemfilter = filterarray[i];
				
				// Iterate through each parameter in each item filter
				for(var index in itemfilter) 
				{
					// Check to see if the paramter has a value (some don't)
					if (itemfilter[index] !== "") 
					{
						if (itemfilter[index] instanceof Array) 
							{
								for(var r=0; r<itemfilter[index].length; r++) 
								{
									var value = itemfilter[index][r];
										urlfilter += "&itemFilter\(" + i + "\)." + index + "\(" + r + "\)=" + value ;
								}
							}
						else
						{
							urlfilter += "&itemFilter\(" + i + "\)." + index + "=" + itemfilter[index];
						}
					}
				}
			}
		}  // End buildURLArray() function
		
		function buildURL()
		{
			// Replace MyAppID with your Production AppID
			url = "http://svcs.ebay.co.uk/services/search/FindingService/v1";
				url += "?OPERATION-NAME=findItemsByKeywords";
				url += "&SERVICE-VERSION=1.0.0";
				url += "&SECURITY-APPNAME=Student7b-13b6-4715-be53-aab90a43612";
				url += "&GLOBAL-ID=EBAY-GB";
				url += "&RESPONSE-DATA-FORMAT=JSON";
				url += "&callback=_cb_findItemsByKeywords";
				url += "&REST-PAYLOAD";
				//url += "&keywords=mens%20marathon%20clothes";
				url += "&keywords=" + q;
				//url += "&paginationInput.entriesPerPage=3";
				url += "&paginationInput.entriesPerPage=" + limit;
				url += urlfilter;
		}
		
		function send()
		{
			// Create a JavaScript array of the item filters you want to use in your request
			// Submit the request
			s=document.createElement('script'); // create script element
			s.src= url;
			document.body.appendChild(s);
		}
	/*
		access currency::
		
			r.findItemsByKeywordsResponse[0].searchResult[0].item[0].sellingStatus[0].currentPrice[0]["@currencyId"]
		
		access price::
			r.findItemsByKeywordsResponse[0].searchResult[0].item[0].sellingStatus[0].currentPrice[0]["__value__"]
	*/
	
	//Has to be outside of jQuery scope so that eBay callback function can access and call it
	
	// Parse the response and build an HTML table to display search results
		function _cb_findItemsByKeywords(root)
		{
			if (root.findItemsByKeywordsResponse[0].searchResult[0]["@count"] == 0)
			{
				//if no values, dont build a table, instead show a paragraph that tells the user nothing was found
				$('div.left.column').append("<p>Sorry, there was nothing found for " + q + "</p>");
			}
			else
			{
				//build a results table
				var items = root.findItemsByKeywordsResponse[0].searchResult[0].item || [];
				var html = [];
		
				html.push('<table width="100%" border="0" cellspacing="0" cellpadding="3"><tbody>');
				html.push('<tr><td>Image</td><td>Name of Item</td><td>Price</td><td>eBay</td></tr>')
		
				for (var i = 0; i < items.length; ++i) 
				{
					var item  = items[i];
						var title    	= item.title;
						var pic      	= item.galleryURL;
						var viewitem 	= item.viewItemURL;
						var price 	= item["sellingStatus"][0]["currentPrice"][0];
						//var currency 	= price["@currencyId"];
					
					if (null != title && null != viewitem) 
					{
					  html.push(
						'<tr>' 
							+ '<td>' + '<img src="' + pic + '" border="0">' + '</td>' 
							+ '<td>' + title + '</td>' 
							+ '<td>' /*+ currency + " " */+ price["__value__"] + '</td>'
							+ '<td><a class="blue" href="' + viewitem + '" target="_blank"> View </a></td>'
					  + '</tr>');
					}
				}
				
				html.push('</tbody></table>');
				$('div.left.column').append(html.join(""));
			}
		}  // End _cb_findItemsByKeywords() function