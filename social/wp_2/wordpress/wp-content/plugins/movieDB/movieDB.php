<?php

  /*
    Plugin Name: movieDB-api
    Description: This should hopefully allow an API call to retrieve information on selected movies.
    Version:     0.0.1
    Author:      Allan Davidson
    License:     GPL2
    License URI: https://www.gnu.org/licenses/gpl-2.0.html
    Domain Path: /
    Text Domain: movieDB-api
  */

	defined('ABSPATH') or die('No script kiddies please!');

	class movieDB_API
	{
		public function __construct ()
		{
			$title        	 = 	"titanic";
			$year        	 = 	1997; 
			$plot       	 = 	"FULL"; 
			$tomatoes   	 = 	TRUE;

			$url_base   	 = "http://www.omdbapi.com/?";
			
			$options    	 = array(
								array("t", $title),
								array("y", $year),
								array("plot", $plot),
								array("tomatoes", $tomatoes),
								array("r", "JSON")
								);
		}

		protected function validateOptions($options)
		{

		}

		protected function buildRequestUrl($options)
		{
			$url = $this->url_base;

			for ($i = 0; $i < count($options); $i++)
			{
				$url .= $options[$i][0] . "=" .$options[$i][1] . "&";
			}
		}

		protected function SendRequest($url)
		{

		$body = wp_remote_retrieve_body(wp_remote_get($url));
		$j_response = json_decode($body);

		return $j_response;//$title = $j_response->Title;
		}

		protected function outputResponse($JSON_response)
		{

		}

		/*protected function __destruct()
		{

		}*/
	}
  
  		/*$options     = array(
		array("t", $title),
		array("y", $year),
		array("plot", $plot),
		array("tomatoes", $tomatoes),
		array("r", "JSON")
		);*/
  
    $getMovie = new movieDB_API();
  

	/*
		::USEFUL WEBSITES TO CONSIDER::
		
		http://codex.wordpress.org/HTTP_API
		https://developer.wordpress.org/plugins/http-api/#get
		http://codex.wordpress.org/Function_Reference/wp_remote_retrieve_body
		
		https://codex.wordpress.org/Writing_a_Plugin
		
		
		  //http://www.omdbapi.com/?t=titanic&y=1997&tomatoes=true&r=JSON&plot=full
		  //t=titanic&y=1997&tomatoes=true&r=JSON&plot=full
	*/

	/* USEFUL FUNCTIONS AND COMMENTS THAT MAY NEED LATER

	  //Get the data from the movie database API using the URL built above
	  //$response = wp_remote_get($url);
	  
	  //Get the response code from the response (200 = OK)
	  //$http_code = wp_remote_retrieve_response_code($response);
	  
	  //Body variable will strip all other data and leaves only the data needed
	  //    to process the purpose (movie and its data is returned)
	  //$body = wp_remote_retrieve_body($json_response);

	*/
?>