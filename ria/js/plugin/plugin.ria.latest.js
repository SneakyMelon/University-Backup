

	//MUST RUN THIS SCRIPT AFTER THE chart.js within the HTML Document
		//..[require chart.js]
	
	
	//DEBUG - Variable - set echo at any point during script to allow console to debug / break down objects
	var echo = null;
	
	//Integer - Needed - Used to record the previous random number to prevent duplicate displays of information
	var prev = null;
	

	/*	Plugin - Needed - 
	
		Used to generate random facts with visual aids. Has been built with a dynamic approach that allows for
		information to be entered and changed without effecting the main plugin. It also supports a fallback setting
		that provides a default. The subject is not limited to marathons and the data can be altered to any applicable subject.
	*/
	
	//Extends the jQuery functions without own plugin
	(function($)
	{
		//@parameter options  	- takes in options  as an object that is used to customise the plugin.
		//@parameter factData 	- takes in factData as an array of objects to build data and use the chartJS to provide a visual on the data provided.
		$.fn.factGen = function(options, factData)
		{
			// $that keeps the original copy of $(this)
			//which keeps a copy of the container that called the plugin
			var $that = this;

			function init($that)
			{
				//SET GLOBAL CHART VARIABLES - Needed - causes display errors otherwise - I found a fix while debugging	
				Chart.defaults.global.responsive = true;
				Chart.defaults.global.maintainAspectRatio = true;

				var settings = $.extend({ //settings [object object]
					
					//String - Optional - Loading message to be shown
					loadingMessage : null,
					
					defaultHeadingMessage : "Did you know...",
							
					//Object of Arrays - Default value if none are sent with options argument 
					defaultFact	: [ //settings[0] 
									{
										fact: "London Marathon is made of 30% male, and 70% female runners",
										data: [
												{
													value: 30,
													color:"#F7464A",
													highlight: "#FF5A5E",
													label: "Male"
												},
												{
													value: 70,
													color:"#F7464A",
													highlight: "#FF5A5E",
													label: "Female"
												}
											]
									}
									],
					//Object of Arrays - Sent through arguments :: Default null - optional argument
					facts		: factData, //settings[1] (access point via debug)
					
					//Function - optional - a function that is executed after the chart has been drawn (often used for debugging data)
					onComplete	: null,
				
				//Extends settings with options
				}, options);
						
				/*	 Main plug in - - - - - - - - -
				
					"...each() is already chainable, it returns this, which we then return.
					This is a better way to maintain chainability ..." - jQuery.com
					this in this case, refers to the HTML tag being references, 
					eg:: $("div#one").factGen(options, factData)
				*/
					
				 $that.each(function() 
				{
					//each value sent on call:: Example $("#one, #two"):: plug in runs twice		
					
					//Integer - Needed - Global integer that stores random number to get the fact
					var factRanNum = 0;				//usage:: settings.fact[factRanNum].fact
													//return: String - "Did you know... blah blah blah"
					
					if ($.isArray(settings.facts)) // if its an array, create a fact randomly generated
					{
						//random fact gen::
						var len = settings.facts.length;	//Get maximum number
					
						//Gets the number of facts::
							//if there is only one fact, no need
							//to calculate a random fact, as there can only be one.
						if (len === 1)
						{
							//don't create a random number as only one fact stored
						}
						else
						{
							//Create a random number to get a fact
							do{
								factRanNum = Math.floor(Math.random() * len); //range(0,4) based on 5 entries
							}
							while (factRanNum == prev); //do this while current random equals the previous number
														//this will prevent duplicates being shown
							
							prev = factRanNum; //prevent same number showing again
						}	
					}
					//FALLBACK:: Sets the default value
					else 
					{
						//Array - optional - Stores a default fact
						settings.facts = settings.defaultFact;
					}
					
					//String - Needed - Used to identify the display message and prevent duplicated code
					var message = "";
					
					if (settings.facts[factRanNum].headingMessage !== null) 
					{
						//use heading message
						message = settings.facts[factRanNum].headingMessage;
					}
					else //settings.facts[factRanNum].headingMessage === null)
					{
						//use default
						message = settings.defaultHeadingMessage;
					}
					
					//HTMLobject - Needed - Store this as a variable to make easy reference to the current DIV
					//						being manipulated
					var $this = $(this);
					
					//Check if its been created by reading the set class
					if ($this.hasClass("fact-list"))
					{					
						//if it has the class, then it will replace the content rather than creating new ones
						
						//Give it a heading message
						$this.find("h2").html(message);
					
						//replace the fact
						$this.find("p").html(settings.facts[factRanNum].fact);
					
					}
					else // if the class is undefined, create the elements :: __FIRST_RUN
					{
						
					/*
						layout hierarchy:: creating the environment...
							
							--- div#id.fact-list ____________ALIAS_::____$this === $(this)"
							--- h2
							----- headingMessage
							---- /h2
							---- div.fact 
							----- p
							------ loadingMessage
							----- /p
							----- div
							------ canvas.chart 
							------ /canvas
							----- /div
							---- /div
							--- /div
					*/
						
						//adds a set class to the DIV for future rotations
						$this.addClass("fact-list");
						
						//Ensure the DIV is empty - user might add unneeded content
						$this.html("");
						
						//Start creating the enviroment ** SEE HIERARCHY ABOVE **
						$this.append("<h2>"
									+ message
									+ "</h2>")
											.append("<div class=\"fact\"></div>");
											  
						$this.find(".fact")
											.append("<p>"
													+ settings.facts[factRanNum].fact
													+ "</p>")
															.append("<div class=\"canvas\"></div>");
						
						$this.find(".canvas")
											.append("<canvas class=\"chart\"></canvas>");
					}
						
					//Get the Canvas and ready it for drawing with
					var ctx = $(this).find("canvas.chart").get(0).getContext("2d");
						
						//in line CSS that fixes a scalability / display bug
						ctx.canvas.width = 200;
						ctx.canvas.height = 200;

					//Draw the graph (call the chartJS)
					var donut = new Chart(ctx).Doughnut(settings.facts[factRanNum].data,options);
				
					//::DEBUG -- prints to the console available information
					
					/*	
						log("CTX: " + ctx);												//canvas property
						log("RAN: " + factRanNum);										//random number generated
						log("OBJ: " + settings.facts);									//facts object
						log("FCT::" + settings.facts[0]);								//show first fact object
						log("FACT.RAN: " + settings.facts[factRanNum]);					//show fact object at random generated number
						log("RND.DAT: " + settings.facts[factRanNum].data);				//show data object at random generated number
						log("RND.VAL: " + settings.facts[factRanNum].data[0].value);	//show value of first data object from random generated number
						log("SETT.ALL: " + settings);									//displayed full settings object
					*/
			
					//HTML based String - Optional - Create a new Legend using the generateLegend from settings.legendTemplate, if a template exists
					if (typeof settings.legendTemplate == 'string')
					{
						var legend = donut.generateLegend();
										
						//remove the legend as a new one is drawn (prevents duplicated legends also)
						$(this).find(".doughnut-legend").remove();
						
						//Check to see if there is a legend / duplicate
						var hasLegend = $(this).has("ul").length ? 1 : 0;
						
						//Prevents creating a new legend below the previous one
						if (!hasLegend)
						{
							$(this).find(".chart").after(legend);
						}
					}
					
					//Function - optional - Runs after the plugin has done everything else
					if ($.isFunction(settings.onComplete)) 
					{
						settings.onComplete.call(this);
					} 	
				}); 
			}
		
			/*
				Function - Needed - Loops the plugin and generates new information and graphs. 
									
									:: The core of the Plugin.
									
									Creates Anonymous function, that creates a timer,
									which will call the plugins init function, passing in 
									the jQuery location of the DIV being used, then self
									call itself	and will continue doing so infinitely.
			*/
			(function loop()
			{
				setTimeout(function()
				{
					init($that);
					loop();
				}, 10000);  //or randomly using
							// var rand = Math.round(Math.random() * (15000 - 5000)) + 10000;
			}())
		};	

	}(jQuery)); //Apply jQuery as a argument to the plugin
