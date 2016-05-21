<?php
	/*
		Plugin Name: MonthlyEventsForMovies
		Plugin URI: https://mayar.abertay.ac.uk/~0706008/social/
		Version: 1.0.05
		Author: Allan
		Description: Provides a basic calendar with events for the current month.
	*/
	class Calendar extends WP_Widget
	{
		public function __construct()
		{	
			parent::__construct(
			// Base ID of your widget
			'Calendar', 
			
			// Widget name will appear in UI
			__('(0706008) Upcoming Events', 'wpb_widget_domain'), 
			
			// Widget description
			array( 'description' => __( 'A  widget calender with upcoming events.', 'wpb_widget_domain' ), ) 
			);
			
			add_action( 'wp_enqueue_scripts', array( $this, 'register_plugin_styles' ) );
		}
		
		//Creates the widget form within wp-admin
		public function form( $instance )
		{
			if ( isset( $instance[ 'title' ] ) ) 
			{
				$title = $instance[ 'title' ];
			}
			else 
			{
				$title = __( 'Upcoming events', 'wpb_widget_domain' );
			}
			// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
		}
		
		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) 
		{
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			return $instance;
		}
		
		// Creating widget front-end
		// This is where the action happens
		public function widget( $args, $instance ) 
		{
			$title = apply_filters( 'widget_title', $instance['title'] );
			//Before and after widget arguments are defined by themes
			echo $args['before_widget'];
			if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
			
			echo "<h4>" . date('F') . "</h4>"; 		//Month as full (July, January)
			echo $this->outputCells();				//Output calcander cells
			echo $args['after_widget'];
		}
		
		public function outputCells()
		{
			//Imports word press database control
			global $wpdb;
			
			//Start building calendar
			$calendar = '<div class="calendar">';
			
			//Calendar days array
			$headings = array('M','T','W','T','F','S','S');
			
			//Adds a heading cell for each day
			$calendar.= '<div class="calendar-row"><div class="calendar-day-head">'.implode('</div><div class="calendar-day-head">',$headings).'</div></div>';
			
			$day_number_in_week 	= date('N'); //N
			$days_in_month 			= date('t');
			
			$days_in_this_week 		= 1;
			$day_counter 			= 0;
			
			//row for week one
			$calendar.= "<div class='calendar-row'>";
			
			//Creates blank cells for days already passed			
			for($i = 1; $i < $day_number_in_week ; $i++)
			{
				$calendar.= '<div class="calendar-day-np"> </div>';
				$days_in_this_week++;
			}

			//Write day of month number in the cell and checks if there is an event stored in the database
			for($day = 1; $day <= $days_in_month; $day++)
			{
				$query = "SELECT * FROM wp_2_widget_calendar WHERE event_date='" 
					. $this->convertToSQLDateFormat($day, date('m'), date('Y')) 
					. "'";
				
				$results = $wpdb->get_row($query, ARRAY_N);
				
				//Output event details
				if ($results != null)
				{
					$calendar.= '<div class="calendar-day event" title="' . $results[2] . '">';	
				}
				else
				{
					$calendar.= '<div class="calendar-day" title="No events scheduled today">';
				}
				
				//Add in the day number 
				$calendar.= '<div class="day-number">'.$day.'</div>';			
				$calendar.= '</div>';
				if($day_number_in_week == 7)
				{
					$calendar.= '</div>';
					if(($day_counter+1) != $days_in_month)
					{
						$calendar.= '<div class="calendar-row">';
					}
					$day_number_in_week = 0;
					$days_in_this_week = 0;
				}
				//reset for new row
				$days_in_this_week++; 
				$day_number_in_week++;
				$day_counter++;
			}
					
			//Finish the rest of the days
			if($days_in_this_week < 8 and $days_in_this_week != 1)
			{
				for($x = 1; $x <= (8 - $days_in_this_week); $x++)
				{
					$calendar.= '<div class="calendar-day-np"> </div>';
				}
			}
			
			//Close final row
			$calendar.= '</div>';
			
			//Close calander
			$calendar.= '</div>';
			
			return $calendar;
		}
		
		//add style sheet for calendar plug in
		public function register_plugin_styles() 
		{
			wp_register_style('Calendar', plugins_url('monthlyevents/css/plugin.css'));
			wp_enqueue_style('Calendar');
		}
		
		
		//reverses the date so that it can be read / written to database in proper format
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
	}