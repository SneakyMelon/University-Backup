
$(document).ready(function(){
	/*
	$('a:not(#sBank-login a)').on("click", function(e){
		$(function() {
		    $( "#dialog-message" ).dialog({

		    	modal                  : true,
		    	draggable              : false,
		    	resizable			   : false,
		    	dialogClass			   : "link-clicked-dialog",
				buttons                : {
											Ok: function() {
												$( this ).dialog( "close" );
											}
										},
				position			   :{
											my: "center",
											at: "center",
											of: window
										},
				classes				   : {
											 "ui-dialog-titlebar": "ui-corner-all-none",
										},
				height                 : "auto",
				width                  : getWindowSize(),
				title                  : "Clicking links"
			});
			
			// prevent link being followed in href attribute
			e.stopPropagation();
			e.preventDefault();
			
			// flash red to get users attention on specific area
			var border = $("#sBank-login").children().children(); //lazyness - fix later
			// flash counter
			var counter = 5;
			
			// change border to red to contrast the blue - red also a good colour to
			// 		get users attention on anything.
			border.css("border", "3px solid red");
			
			// always useful creative names
			var flasher = setInterval(function(){
				
				// jQuery animation to reduce alpha from 1.0 ==> 0.0
				$({alpha:1}).animate({alpha:0},{
						duration: 1000,
						step	: function(){
									border.css("border-color", "rgba(255,0,0," + this.alpha + ")");
								}
				});
				
				//	loop until counter reaches false (0 - Zero)
				if (!counter--){
					// remove interval 
					clearInterval(flasher);
				}
			// repeat each step every 1000ms
			}, 1000);
			
			// prevent link actions following the href attribute value
			return false;
		});
	});
	
	function getWindowSize(){
		var w = document.body.clientWidth;
		
		console.log("Checking Browser width..");
		
		if (w > 900){
			return "40%";
		}else{
			return "96%";
		}
	}
	
	*/
	
	jQuery("a:not(a.btn-login)")
		.each(function(){
			$(this).attr("href", "#")
			}).on("click", function(){
				// prevent link being followed in href attribute
				e.stopPropagation();
				e.preventDefault();
				
				return false;
			});
	});