	
		//create variables to set up event listeners for the button presses
		//and the text identification values.
		var btn = document.getElementById("btnFirst");
		var txt = document.getElementById("searchTextFirst");
		var btn2 = document.getElementById("btnLast");
		var txt2 = document.getElementById("searchTextLast");
	
			//main object
		function Search (value)
		{
			//parameter value is from user input
			var searchName  = value;

			var i; //for inside the loops
			
			//create some test people - can come from predetermined or from DB's
			var people = [];
				people[0] = {name: "Allan", surname: "Davidson", age: 24};
				people[1] = {name: "John", surname: "Smith", age: 22};
				people[2] = {name: "Zoe", surname: "Doe", age: 27};

			// add a first function to the object that searches for first name matches
			this.first = function()
			{
				//for each name in object.Array
				for (i = 0; i <= people.length -1; i= i + 1)
				{
					//check for a match
					if (people[i].name === searchName)
					{
						this.output(people[i]);
					}
				}
			};
			
			// add a surname function to the object that searches for last name matches
			this.surname = function()
			{
				//for each last name in object.Array
				for (i = 0; i <= people.length -1; i= i + 1)
				{
					//check for a match
					if (people[i].surname === searchName)
					{
						this.output(people[i]);
					}
				}
			};
		}
		
		//add a prototype of createTag to the search object.
		Search.prototype.createTag = function(id, tag_to_create, value)
		{
			//function creates a tag and adds it to the page
			
			//create a tag, depending on what you chose in the parameter
			var tag = document.createElement(tag_to_create);

				//if the text value parameter is blank, then skip adding the
				//text node as its useless adding it
			if (value !=="")
			{
				var txt    = document.createTextNode(value);
				tag.appendChild(txt);
			}
			
			//if  the element exists, overwrite it
			if (document.getElementById(id))
			{
				var where = document.getElementById(id);
				document.getElementById(where).appendChild(tag);
			}
			//otherwise, add it to the end of the DOM
			else
			{
				document.getElementsByTagName("body")[0].appendChild(tag);
			}
		};
	
		//add the output to the search object
		Search.prototype.output = function(value)
		{
			//gets the search results
			var outputValue = "Name: " + value.name + " | Surname: " + value.surname + " | Age: " + value.age;
			//then creates a tag to display them in
			this.createTag("output", "p", outputValue);
		};

		//on window load, do...
		window.onload = function()
		{
			//add an event listener to the buttons
			btn.addEventListener("click", function(){
				var s = new Search(txt.value);
				//and search for first names, using the search object
				s.first();
			});
			
			//add an event listener to the buttons
			btn2.addEventListener("click", function(){
				var s = new Search(txt2.value);
				//and search for last names, using the search object
				s.surname();
			});
		};
