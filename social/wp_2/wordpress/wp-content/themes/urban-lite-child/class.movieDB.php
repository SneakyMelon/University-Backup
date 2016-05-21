<?php
	
	/*
		Class: 			movieDB
		Description: 	Calls a movie database API to retrieve information on movies, displayed via wordpress short codes.
		Version:     	1.0.1
		Author:      	Allan Davidson
	 */
	
	 
	//Prevents direct access to the file
	defined('ABSPATH') or die('No script kiddies please!');

	/*
		 *  @Class movieDB
		 * 	@parameters 	- $options 	- Array 	- List of customisable options
		 * 	@return 		- $result	- String 	- Outputs information of movie in a structured manner 
		 * 
		 * 	@description 	- Sends an API request to a movie database and outputs formatted data 
		 * 						Called when using Word Press shortcode [movieDB title="" year="" plot="" tomatoes=""]
		 * 
		 * @limitations		- API call is limited to something like 40 calls per second
	*/
	class movieDB
	{
		public 		$url_base;
		
		protected 	$imdb_url_base;
		protected	$rt_url_base;
		protected 	$url;
		
		protected 	$err_count;
		protected 	$err_list;
		protected 	$opts;
		
		private $result;

		//Requires $user_options 
		public function __construct ($user_options)
		{
			//Provides base URLs for links (including API call)
			$this->url_base			= 	"http://www.omdbapi.com/?";
			$this->imdb_url_base 	= 	"http://www.imdb.com/title/";
			$this->rt_url_base  	= 	"http://www.rottentomatoes.com/m/";
			
			//used for output
			$this->err_count		= 	0;
			$this->err_list 		= 	null;
			$this->opts				= 	array();
			
			//Split the options into individual usable variables
			$title        			= 	$user_options['title'];
			$year        			= 	$user_options['year']; 
			$plot       			= 	$user_options['plot']; 
			$tomatoes   			= 	$user_options['tomatoes'];
			
			//Once class is initialised, validate the options
			$this->validateOptions($title, $year, $plot, $tomatoes);
		}

		/*
			 * @function 		- validateOptions
			 * 
			 * @parameters		- $title 	- String - Title of Movie to request from API
			 * 					- $year		- String - Year of movie to reeques from API
			 * 					- $plot		- String - Determines length of description 
			 * 					- $tomatoes	- String -	Determines if Rotten Tomatoes data in called within API request
			 * 
			 * @return 			- void
			 * 
			 * @description		- Validates the data sent when movieDB is called
			 * 
		*/
		
		protected function validateOptions($title, $year, $plot, $tomatoes)
		{
			//variables from parameters
			
			//?Convert to lower case and replace spaces with {%20} to makr URLb friendly
			$title		=   str_replace(" ", "%20", strtolower($title));
			$plot		=	strtolower($plot);
			$tomatoes	=	strtolower($tomatoes);
			
			//Checks that $title is not null, empty and actually contains text
			if (strlen($title) != 0)
			{
				//Add to $ops array if its valid
				array_push($this->opts, "t=$title");
			}
			else 
			{
				//Add to error list
				$this->buildErrorMessage("A movie title is required. Check spelling and try again.");
			}

			//Checks that a sensible year is input
			if (strlen($year) != 0 and $year > 1930 and $year < (date("Y") + 3))
			{
				//Add to $opts array if its valid
				array_push($this->opts, "y=$year");
			}
			else
			{
				//Add to error list
				$this->buildErrorMessage('Year only supports values between 1930 and ' . (date("Y") + 3));
			}
			
			//Checks that $plot is not null, empty and actually contains text
			//	and that it is a valid option
			if (strlen($plot) != 0 and ($plot == "full" or $plot == "short"))
			{
				//Add to $opts array if its valid
				array_push($this->opts, "plot=$plot");
			}
			else
			{
				//Add to error list
				$this->buildErrorMessage("Plot only supports values SHORT or FULL");
			}
			
			//Checks that $Tomatoes is not null, empty and actually contains text
			//	and that it is a valid option
			if ($tomatoes == "true" or $tomatoes == "false")
			{
				//Add to $opts if its valid
				array_push($this->opts, "tomatoes=$tomatoes");
			}
			else
			{
				//Add to error list
				$this->buildErrorMessage("Tomatoes must be equal to true or false.");
			}
		}
		
		/*
		 * @function 		- buildRequestUrl
		 * @parameters		- None
		 * @return 			- void
		 * 
		 * @description		- Using the $opts array; for each value, build the API URL
		 * 						and sends the request to @function sendRequest
		 */
		 
		protected function buildRequestUrl()
		{
			//Using the API base URL
			$url = $this->url_base;	
			
			//For each value in array, build URL with options
			for ($i = 0; $i < count($this->opts); $i++)
			{
				$url .= $this->opts[$i] . "&";
			}
			
			//Add essential values that are needed on every request
			$url .= "r=JSON&type=movie";
			
			//Send Request
			$this->sendRequest($url);
		}

		/*
		 * @function 		- buildErrorMessage
		 * @parameters		- $e 	- String - Adds error message to a list
		 * @return 			- void
		 * 
		 * @description		- Each call of @buildErrorMessage adds an error to the $err_list
		 * 						and counts the number of errors via $err_count
		 */
		 
		protected function buildErrorMessage($e)
		{
			//Keep a running total of errors
			$this->err_count++;
			
			//Create a list
			$this->err_list .= "<li>" . $e . "</li>";
		}

		/*
		 * @function 		- sendRequest
		 * @parameters		- $URL 	- String - URL needed to send API call
		 * @return 			- JSON encoded string
		 * 
		 * @description		- Attempts to call the API using the $URL provided
		 * 						and on success, passes the JSON string to @outputResponse
		*/
		
		protected function sendRequest($url)
		{
			//Try to send request - provides a detailed report on error
			try
			{			
				//Using Word Press' in-built function to send cURL or other fall back GET methods
				$get_movie_data = wp_remote_get($url); 
				
				//Response if received in two parts - Head and Body
				//Only need the body at this time, so using WP built in function to store this
				$body = wp_remote_retrieve_body($get_movie_data); //format = JSON (hard coded)
				
				//Store the response and decode JSON value into an notation(???) object.
						//									as in 	$obj->value instead of 
						//											$obj['value']
				$JSON_response = json_decode($body);
	
				//@@viewer http://jsonviewer.stack.hu/
				
				//Output the JSON response
				$this->outputResponse($JSON_response);
			}
			catch (Exception $e)
			{
				//Should the API request fail, provide the error why so
				$this->buildErrorMessage($e);
			}
		}
		
		/*
		 * @function 		- outputResponse
		 * @parameters		- $JSON_response 	- Object - A converted JSON string accessible via $JSON_response->key
		 * @return 			- String 			- Returns the formatted and structure of the WP short code
		 *	 										so that the results can be shown on the web page.
		 * 
		 * @description		- Builds a structured HTML string that will be output to the WP handlers when
		 * 						the movieDB short code is used, or shows server response to API query.
		 */
		
		protected function outputResponse($JSON_response)
		{
			//Create a local version of the JSON response
			$data = $JSON_response;
			
			//If there is a server error or values provided to API do not return a match
			if ($data->Response == "False")
			{
				//Build an error log and finalise
				$this->buildErrorMessage($data->Error . ': Check your spelling, and year matches the release.');
				$this->finalise();
			}
			else
			{	
				//Start structuring the HTML output
				
				/*
				 * 	Outputs HTML for displaying movie data from the short code.
				 * 
				 * 	Strict:
				 * 	Start and end needs to be non-tabbed
				 * 	END tag needs to be on its own line and no other characters, including 
				 * 			spaces, tabs
				 * 	Only character allows is a \n (newline character)
				 * 
				 * 
						 * 		---- CAUTION ----
						 * 	Also appears that everything 
						 * inside of this is literal..... 
						 * every \n is converted into <br />
						 *		---- ---- ----
				*/
$html = <<<HTML
<div id="movieDB-api" class=""> <!-- holds the whole output-->
	<div id="" class="movieDB-api-container">  <!-- start of display :: padding: 20px -->
		<div id="" class="movieDB-api-powered-by">
			Powered by movieDB
		</div>

		<h1>
			<span>{$data->Title}</span> <span>({$data->Year})</span>
		</h1>

		<div id="" class="movieDB-api-movie-information"><!-- information bar -->							
			Rating: <span>{$data->Rated}</span> | Runtime: <span>{$data->Runtime}</span> | Genre(s): <span>{$data->Genre}</span> | Release Date: <span>{$data->Released}</span>
		</div>

	<div>
		<!-- movie rating if if time permits -->
	</div>

	<div id="" class="movieDB-api-movie-about-plot">
		<p>
			{$data->Plot} 
		</p><!-- #movie Plot-->
	</div>
	<div id="" class="movieDB-api-movie-about-people">
		<p>
			Director: {$data->Director}  <!-- #movie Director-->
		</p>
		<p>
			Writers:  {$data->Writer}  <!-- #movie Writer-->
		</p>
		<p>
			Starring: {$data->Actors}<!-- #movie Actors-->
		</p>
	</div>
	<div id="" class="movieDB-api-external-links">
		<p>
			View more information on 
HTML;
					//Provide external links
	
					//if imdb link exists, provide a link to external site.
					if (isset($data->imdbID))
					{
						$html .= '<a href="' . $this->imdb_url_base . $data->imdbID . '" target="_blank">imdb</a> ';
					}
					//if rotten tomatoes link exists, provide a link to external site.
					else if (isset($data->tomatoRating))
					{	
						//Sets up formatting of Rotten Tomatoes URL link (uses underscores in place of spaces)
						$rt_movie = $this->rt_url_base . str_replace(" ", "_", $data->Title);
						$html .= ' or <a href="' . $rt_movie . '" target="_blank">Rotten Tomatoes</a>'; 
					}
					//if official link exists, provide a link to external site.
					else if (isset($data->Website))
					{
						$html .= ' or <a href="' . $data->Website . '" target="_blank">Official Website</a>'; 
					}
				$html .= '</p></div></div></div>';

				//Return HTML
				$this->result = $html;
			}
		}

		/*
		 * @function 		- displayErrorLog
		 * @parameters		- None
		 * @return 			- Void
		 * 
		 * @description		- Called when $err_count is more than 0
		 * 					- Outputs error for each error found to make clear to user what went wrong
		 */
		 
		protected function displayErrorLog()
		{				
			$errs = "<p>WARNING:</p><ul>{$this->err_list}</ul>";
			$this->result = $errs;
		}

		/*
		 * @function 		- finalise
		 * @parameters		- None
		 * @return 			- String 	- returns $result - $err_list if errors, or $HTML with successful short code use
		 * 
		 * @description		- Determines if there is any errors, and calls the display function to show the result of the API call.
		 * 					- Returns $result to short code handler in WP
		 */
		 
		public function finalise()
		{
			//on error, $result = $error_log
			if ($this->err_count)
			{
				$this->displayErrorLog();
			}
			//on success, $result = $HTML
			else
			{
				$this->buildRequestUrl();
			}
			//return result of API call
			return $this->result;
		}

		public function __destruct()
		{
			//No need for this for just now, but in case needed later...
		}
	}