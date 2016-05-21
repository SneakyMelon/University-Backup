<?php
/*
	Plugin Name: Calendar_0706008
	Plugin URI: https://mayar.abertay.ac.uk/~0706008/social/
	Version: 1.0.05
	Author: Allan
	Description: Provides a basic calendar with events for the current month.
 */
class Calendar
{
	public function __construct()
	{	
		$this->outputCells();
	}
		
	public function outputCells()
	{
		global $wpdb;
		//https://davidwalsh.name/php-calendar
		
	
		/*
		 *	STLYE WENT HERE 
		 */
				
		
		
		/* draw table */
		$calendar = '<div class="calendar">';

		/* table headings */
		$headings = array('M','T','W','T','F','S','S');
		$calendar.= '<div class="calendar-row"><div class="calendar-day-head">'.implode('</div><div class="calendar-day-head">',$headings).'</div></div>';

		/* days and weeks vars now ... */
		$running_day = date('N'); //days in a week
		$days_in_month = date('t');
		$days_in_this_week = 1;
		$day_counter = 0;
		
		/* row for week one */
		$calendar.= '<div class="calendar-row">';

		/* print "blank" days until the first of the current week */
		

		for($x = 1; $x < $running_day; $x++)
		{
			$calendar.= '<div class="calendar-day-np"> </div>';
			$days_in_this_week++;
		}

		/* keep going with days.... 
		
		//WRITES THE NUMBERS IN THE CELLS*/
		for($list_day = 1; $list_day <= $days_in_month; $list_day++)
		{
			$query = "SELECT * FROM wp_2_widget_calendar WHERE event_date='" 
						. $this->convertToSQLDateFormat($list_day, date('m'), date('Y')) 
						. "'";
						
			$results = $wpdb->get_row($query, ARRAY_N);

			if ($results != null)
			{
				$calendar.= '<div class="calendar-day event" title="' . $results[2] . '">';	//print_r($results);exit;
			}
			else
			{
				$calendar.= '<div class="calendar-day" title="No events scheduled today">';
			}
			
			//$calendar.= '<div class="calendar-day" title="' . $results[0] . '">';
				/* add in the day number */
				$calendar.= '<div class="day-number">'.$list_day.'</div>';

				/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
				//$calendar.= str_repeat('<p> </p>',2);
				
			$calendar.= '</div>';
			if($running_day == 7)
			{
				$calendar.= '</div>';
				if(($day_counter+1) != $days_in_month)
				{
					$calendar.= '<div class="calendar-row">';
				}
				$running_day = 0;
				$days_in_this_week = 0;
			}
			$days_in_this_week++; $running_day++; $day_counter++;
		}

		/* finish the rest of the days in the week */
		if($days_in_this_week < 8)
		{
			for($x = 1; $x <= (8 - $days_in_this_week); $x++)
			{
				$calendar.= '<div class="calendar-day-np"> </div>';
			}
		}

		/* final row */
		$calendar.= '</div>';

		/* end the table */
		$calendar.= '</div>';
		
		echo $calendar;
	}

	public function register_plugin_styles() 
	{
		wp_register_style('Calendar', plugins_url('calendar/css/plugin.css'));
		wp_enqueue_style('Calendar');
	}

	public function convertToSQLDateFormat($d, $m, $y)
	{
		
		//create string
		$nonSQLDateFormatString;
		
		//add month first, because 'Murica
		$nonSQLDateFormatString = date('m') . '/';
		
		//If less than ten, add 0:: 5 ==> 05
		//Add day
		if ($d < 10)
		{
			$nonSQLDateFormatString .= '0' . $d . "/";
		}
		else
		{
			$nonSQLDateFormatString .= $d . "/";
		}
		
		//Add year
		$nonSQLDateFormatString .= date('Y');
				
		//reverse date, return value
		return date('Y-m-d', strtotime($nonSQLDateFormatString));
	}

	public function __destruct()
	{
		//echo $this->outputCells();
	}

}