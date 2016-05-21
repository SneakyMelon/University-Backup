<?php

	define('CHILD_TEMPLATE_DIRECTORY', get_stylesheet_directory());
	define('WP_DEBUG', true);

	/*
		@Error reporting on
	*/
	ini_set("display_errors", 1);
	error_reporting(E_ALL);	
	
	//Prevents direct access to the file
	defined('ABSPATH') or die('No script kiddies please!');
	
	/*
		Create a function that imports class files with fall back in case file does not exist
			
			@parameters $class - String - Name of class to import into system
	*/
	function import($class)
	{
		//Seems to direct to parent template, using stylesheet however, gets child
		$file =  CHILD_TEMPLATE_DIRECTORY . '/class.' . $class . '.php';
					
		//Checks if file exists and includes class if not already included by require_once
		if (file_exists($file))
		{
			require_once($file);
		}
		else
		{
			/*	
				 * File not found
				 *       /
				 * Error handling
			*/
		}
	}

	/*
		Function used for the short code extension of Word Press
		
		@parameters $options - Array - Provides the movieDB criteria to search the API
									 - @required Title		- Default	: ""
									 - @required Year		- Default	: ""
									 - @optional Plot		- Default	: "short"
									 - @optional Tomatoes 	- Default	: "false"

		@return $output - String - Returns string of HTML that displays Movie Data
	*/
	function getMovieData($options)
	{
		/*
		*	Provides default values for the short code, overrides via parameters
		*	Title and year are blank defaults - no search provided, throw error
		*/
		$opts = shortcode_atts(array(
			"title" 	=> "",
			"year" 		=> "",
			"plot"  	=> "short",
			"tomatoes" 	=> "false"
		), $options);

		//imports the movieDB class 
		import("movieDB");
		
		//instantiate the class and get output
		$api = new movieDB($opts);
		return $api->finalise();
	}
	
	/*
		Allows short codes to be used in comment sections of Word Press
	
		@parameters 	'comment_text' 	- Add a new Word Press filter to the comment sections
						'do_shortcode'	- Add short code to the comments text filer

	*/
	add_filter('comment_text', 'do_shortcode');
	
	/*
		Registers the short code to Word Press hook system 
	
		@parameters 	movieDB 	- Code to use within posts to execute short code
						function	- the function executed when movieDB is used as a short code

	*/
	add_shortcode("movieDB", "getMovieData");
	
	/*
		Registers the Calendar plugin as a widget. This allows it to be allocated a slot within the page.
		
		@parameters 	widgets_init	- Adds the registration to the WP widget initiation class
						register_widget	- WP registration function that calls Calendar Class
	*/

	add_action('widgets_init', create_function('', 'return register_widget("Calendar");'));
	
	
	
	