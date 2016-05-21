
	/* plugin.ria.data.js  -- Data file
		
		Holds all the data for the plugin to neaten up the code
		and seperates them from each other to help
		with the readability with both scripts.
		
		..Requires before [js/plugin/plugin.ria.latest.js]
	
	*/
	
	$(document).ready(function()
	{

		//OVERRIDE OPTIONS - custom options that the plug in will / can work with
		var opts = {
			
			//custom function run that happens when the plug in has finished
			onComplete	: function()
				{
					//log("Plugin has Completed a Cycle...");
					//log("");
				},
				
				//Graph Options (configured for this application, can be edited through settings argument)
				//These options are transferred over into the Chart function to construct the graphs.
				//They are taken from the website, and customised to suit the needs of the website.
				
				//Boolean - Whether we should show a stroke on each segment
				segmentShowStroke : true,

				//String - The colour of each segment stroke
				segmentStrokeColor : "#fff",

				//Number - The width of each segment stroke
				segmentStrokeWidth : 2,

				//Number - The percentage of the chart that we cut out of the middle
				percentageInnerCutout : 25, 

				//Number - Amount of animation steps
				animationSteps : 100,

				//String - Animation easing effect
				animationEasing : "easeOutBounce",

				//Boolean - Whether we animate the rotation of the Doughnut
				animateRotate : true,

				//Boolean - Whether we animate scaling the Doughnut from the centre
				animateScale : true,
					
				//String - Can be re-found at the chartjs website
				legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\">"
									 + "<% for (var i=0; i<segments.length; i++){%>"
									 +   "<li>"
									 + 		"<span style=\"background-color:<%=segments[i].fillColor%>\"></span>"
									 + 		"<%if(segments[i].label){%>"
									 +			"<%=segments[i].label%><%}%>"
									 +   "</li><%}%>"
									 + "</ul>",
			};
			
		//Array of Objects - Needed - Used to populate the graph with information such as values, colours, highlights and values
		
		//Values below are also used to populate the legend.	
		
		//Values are completely made up but the process remains untouched and the visuals are shown to the full extent.
		//The values below all add up to 100, as this will allow the visual to show a percentage based visual, eg 45% will be
		//shown as 45% of the chart, and the other half will be shown as 55% of the chart for a better visual aid.
		
		//Although, this is a JavaScript module, these have been hand written, it is possible that these can be drawn from a database
		//but time permitting, I could not do this, but I would have liked too. I would have used a function call that used AJAX to 
		//dynamically written data for the graph.
		
		var factData = 
		[
			{
				fact : "London Marathon is comprised of approx. 52% female runners, and 48% male.",
				data :
				[
					{
						value: 52,
						color:"#F7464A",
						highlight: "#FF5A5E",
						label: "Female"
					},
					{
						value: 48,
						color: "#46BFBD",
						highlight: "#5AD3D1",
						label: "Male"
					}
				],
				headingMessage : "London Male V Female"
			},
			{
				fact : "Edinburgh Marathon is comprised of approx. 45% female runners, and 55% male.",
				data :
				[
					{
						value: 45,
						color:"#F7464A",
						highlight: "#FF5A5E",
						label: "Female"
					},
					{
						value: 55,
						color: "#46BFBD",
						highlight: "#5AD3D1",
						label: "Male"
					}
				],
				headingMessage : "Edinburgh Male v Female"
			},
			{
				fact : "Dundee Marathon is comprised of approx. 49% female runners, and 51% male.",
				data :
				[
					{
						value: 49,
						color:"#F7464A",
						highlight: "#FF5A5E",
						label: "Female"
					},
					{
						value: 51,
						color: "#46BFBD",
						highlight: "#5AD3D1",
						label: "Male"
					}
				],
				headingMessage : "Dundee Male V Female"
			},
			{
				fact : "London Marathon is made up of 32% aged 50+, 30% 25-49, and 38% 18-24 years old.",
				data :
				[
					{
						value: 32,
						color:"#F7464A",
						highlight: "#FF5A5E",
						label: "50 and over"
					},
					{
						value: 30,
						color: "#46BFBD",
						highlight: "#5AD3D1",
						label: "25 - 49"
					},
					{
						value: 38,
						color: "#000077",
						highlight: "#000088",
						label: "18-24"
					}
				],
				headingMessage : "In the London Marathon..."
			},	
			{
				fact : "Edinburgh Marathon is made up of 40% aged 50+, 40% 25-49, and 20% 18-24 years old.",
				data :
				[
					{
						value: 40,
						color:"#F7464A",
						highlight: "#FF5A5E",
						label: "50 and over"
					},
					{
						value: 40,
						color: "#46BFBD",
						highlight: "#5AD3D1",
						label: "25-49"
					},
					{
						value: 20,
						color: "#000077",
						highlight: "#000000",
						label: "18-24"
					}
				],
				headingMessage : "In the Edinburgh Marathon..."
			},
			{
				fact : "Dundee Marathon is made up of 36% aged 50+, 26% 25-49, and 38% 18-24 years old.",
				data :
				[
					{
						value: 36,
						color:"#F7464A",
						highlight: "#FF5A5E",
						label: "50 and over"
					},
					{
						value: 26,
						color: "#46BFBD",
						highlight: "#5AD3D1",
						label: "25 - 59"
					},
					{
						value: 38,
						color: "#000077",
						highlight: "#000000",
						label: "18 - 24"
					}
				],
				headingMessage : "In the Dundee Marathon..."
			},
			
		{
			fact : "Meals to eat before going for a Marathon, recommended by previous runners",
			data :
			[
				{
					value: 28,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Pasta "
				},
				{
					value: 21,
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "Chocolate "
				},
				{
					value: 21,
					color: "#FB723B",
					highlight: "#FF8655",
					label: "Energy Bar"
				},
				{
					value: 16,
					color: "#F8F65F",
					highlight: "#FFFD7B",
					label: "Eggs"
				},
				{
					value: 14,
					color: "#F89193",
					highlight: "#FFAFB0",
					label: "Protein Bars"
				}
			],
			headingMessage : null, //-- use default message example
		},
	];
	
	/*- - - - Declare the plugin 
					Do this after the options and data are declared,
					so the plugin has data to use. Other wise won't work
	
		factGen will run on each div that has been added to the jQuery selector.
	
		It has been build in such as way, that it only needs a div, and it will
		make its own containers that it needs to display itself.
	
	*/
	$("#one, #two, #three, #four").factGen(opts, factData);
		
});	// END OF READY.DOCUMENT	