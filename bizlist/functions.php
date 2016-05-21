<?php
	//functions that are used throughout the website
	
	//start session [required on every page for site to work]
	session_start();
	
	//set the session ID used throughout to determine if logged in
	$_SESSION['id'] = isset($_SESSION['id']) ? $_SESSION['id'] : -1;
	
	
	if ($page != "register")
	{
		//on error in the register page, keep the form submission in memory while they resubmit
		//once they change page, remove the form data
		unset($_SESSION['from_info']);
	}
	
	function logout()
	{
		// remove all session variables
		session_unset(); 
	
		// destroy the session 
		session_destroy(); 
		
		//delay to make it seem like its doing something in the background
		sleep(3);
		header("location: index.php?logged_out");
	}
	
	function DB_CONNECT()
	{
		//credentials
		$servername	 = "lochnagar.abertay.ac.uk";
		$username	 = "sql0706008";
		$password	 = "qOJdFuXG";
		$dbname 	 = "sql0706008";

		//database connection with credentials
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
					
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		return $conn;
	}
	

	//some pages are green and some are white, to keep color consistent, need to fix
	//and keep pattern going, otherwise visual glitches
	
	function drawHR($c, $page)
	{
		
		if($page == "index")
		{
			echo  '<hr class="star-primary">';
		}
		else
		{
			//$c = colour :: light || primary
			if($c == "light")
			{
				echo  '<hr class="star-light">';
			}
			else
			{
				echo  '<hr class="star-primary">';
			}
		}
	}
	
	//draw the busienss buttons on multiple pages
	function drawBusiness()
	{
	?>
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2>List your Business with our Business Plan</h2>
					
					<?php
						drawHR($c = "primary", $page = "business");
					?>
					
				</div>
			</div>
			<div class="row"> 
				<div class="col-lg-4 col-lg-offset-2 text-left">
					<p>	Grow your business with a Business Plan. Business listings are guaranteed to 
						get your business out their. 
					</p>

					<p> For just £10 per month, we provide you with the highest quality business listings. </p>
				</div>
				<div class="col-lg-4 text-left">
					<ul class="check-list buffer-top">
						<li>100% trusted Suppliers</li>
						<li>Ethical and Fair trade</li>
						<li>110% Customer satisfaction</li>
						<li>Full Legal compliance</li>
					</ul>
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-4 col-lg-offset-4">
			<?php 
			
				if ($_SESSION["id"] > 0)
				{
					echo '<a href="buy.php?buy=business" class="btn btn-lg btn-outline" style="border: 1px solid #18bc9c !important; color: #18bc9c !important">';
				}
				else
				{
					echo '<a href="login.php?redirect" class="btn btn-lg btn-outline" style="border: 1px solid #18bc9c !important; color: #18bc9c !important">';
				}				
			?>
					<i class="fa fa-download"></i> Click here to buy now
					</a>
				</div>
			</div>
		</div>
	</section>
	<section class="success btn-only">
		<div class="container">
			

	<?php
	}
	
	//draw the premium buttons found on multiple pages
	function drawPremium()
	{
	?>
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2>Become a Trusted Trader with our Premium Plan</h2>
					<?php
						drawHR($c = "primary", $page = "premium");
					?>
				</div>
			</div>
			<div class="row"> 
				<div class="col-lg-4 col-lg-offset-2 text-left">
					<p>	Grow your business with a Premium Listing package. Premium listings are verified traders,
						that offer consistent, high quality work.
					</p>

					<p> In our Premium package, we offer the highest quality business listings. </p>
				</div>
				<div class="col-lg-4 text-left">
					<ul class="check-list buffer-top">
						<li>Everything in the Business Plan, and...</li>
						<li>100% trusted Suppliers</li>
						<li>Ethical and Fair trade</li>
						<li>110% Customer satisfaction</li>
						<li>Full Legal compliance</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-lg-offset-4">
			
			<?php 
			
				if ($_SESSION['id'] > 0)
				{
					echo '<a href="buy.php?buy=premium" class="btn btn-lg btn-outline" style="border: 1px solid #18bc9c !important; color: #18bc9c !important">';
				}
				else
				{
					echo '<a href="login.php?redirect" class="btn btn-lg btn-outline" style="border: 1px solid #18bc9c !important; color: #18bc9c !important"">';
				}				
			?>
						<i class="fa fa-download"></i> Click here to buy now
					</a>
				</div>
			</div>
		</div>
	</section>
	<section class="success btn-only">
		<div class="container">
			
<?php
	}
	
	function adminPanel($getBusiness)
	{
		try 
		{
			$conn = DB_CONNECT();

			//sql to collect data
			$sql = 	"select DISTINCT *
						from 
						(listings l
						LEFT JOIN userOwnsCompany u
						on l.user_owns_company_id = u.userOwns_id)

						LEFT JOIN company c on u.company_id = c.company_id
						LEFT JOIN users uz on u.user_id = uz.user_id
						LEFT JOIN payment p on p.payment_id = l.payment_id
							 WHERE authorised = 0
							 and uz.user_level <> 1
							 and p.product = '$getBusiness'
						ORDER BY uz.user_id
						ASC";
								
				$result = $conn->prepare($sql);
				
				$result->execute();			
			
			//table heading
			echo '<table class="table table-striped table-bordered table-hover">
					<thead>
						<td>User #</td>
						<td>Name</td>
						<td>Contact</td>
						<td>Description</td>
						<td>Website</td>
						<td>Merchant</td>
						<td>Member Since</td>
						<td>Image</td>
						<td>Approve</td>
						
					</thead>
					<tbody>';
			while($row = $result->fetch(PDO::FETCH_ASSOC))
			{
				echo '<tr>';
				//table date for the table
					echo '<td>' . $row['user_id'] . '</td>';
					echo '<td>' . $row['company_name'] . '</td>';
					echo '<td><a href="mailto:' . $row['email'] . '">' . $row['email'] . '</a></td>';
					echo '<td>' . $row['company_description'] . '</td>';
					echo '<td>' . $row['company_website'] . '</td>';
					echo '<td>' . $row['company_type'] . '</td>';
					echo '<td>' . $row['company_join_date'] . '</td>';
					echo '<td><a target="_blank" href="' . $row['image'] . '">Image</a></td>';
					
					//approve advert button
					echo '<td class="" align="center">
								<a style="text-decoration: none; color: #18bc9c !important;" href="admin.php?action=approve&lid=' . $row['listing_id'] .
									'"<i class="fa fa-thumbs-o-up"></i>
						</td>';
					/* 
						remove / delete button - not needed by spec
						
						echo '<td class="" align="center">
								<a style="text-decoration: none; color: #e74c3c !important;" href="admin.php?action=decline&id=' . $row['listing_id'] .
									'"<i class="fa fa-thumbs-o-down"></i>
						</td>';
					*/
				echo '</tr>';
			}
			
			echo '</tbody></table>';
		}
		//catch any errors
		catch(PDOException $e)
		{
			echo "Connection failed: " . $e->getMessage();
		}	
		$conn = null;
	}
	
	function drawPayments()
	{
		
		//admin panel payment system
		try 
		{
			$conn = DB_CONNECT();

			$sql = 	"select DISTINCT *
						from 
						(listings l
						LEFT JOIN userOwnsCompany u
						on l.user_owns_company_id = u.userOwns_id)

						LEFT JOIN company c on u.company_id = c.company_id
						LEFT JOIN users uz on u.user_id = uz.user_id
						LEFT JOIN payment p on p.payment_id = l.payment_id
							 WHERE authorised = 0 
							 and uz.user_level <> 1
							 and p.product <> ''
						ORDER BY product, p.payment_id
						asc";
								
				$result = $conn->prepare($sql);
				
				$result->execute();		
				
			//draw the table
			echo '<table class="table table-striped table-bordered table-hover">
					<thead>
						<td>Payment #</td>
						<td>Company</td>
						<td>Paid by</td>
						<td>Contact Email</td>
						<td>Card Number</td>
						<td>Billing Address</td>
						<td>SVC</td>
						<td>Expiry</td>
						<td>Purchase</td>
						<td>Date</td>
					</thead>
					<tbody>';
					
				//fill the table with data
			while($row = $result->fetch(PDO::FETCH_ASSOC))
			{
				echo '<tr>';
					echo '<td>' . $row['payment_id'] . '</td>';
					echo '<td>' . $row['company_name'] . '</td>';
					echo '<td>' . $row['name'] . '</td>';
					echo '<td><a href="mailto:' . $row['email'] . '">' . $row['email'] . '</a></td>';
					echo '<td>' . $row['card_number'] . '</td>';
					echo '<td>' . $row['billing_address'] . '</td>';
					echo '<td>' . $row['svc'] . '</td>';
					echo '<td>' . $row['expires_month'] . ' / '.$row['expires_year'] . '</td>';
					echo '<td>' . $row['product'] . '</td>';
					echo '<td>' . $row['date'] . '</td>';
				echo '</tr>';
			}
			
			echo '</tbody></table>';
		}
		//catch any errors
		catch(PDOException $e)
		{
			echo "Connection failed: " . $e->getMessage();
			return false;
		}	
		
		$conn = null;
	}
		
	function drawPremiumImageMap($sql)
	{	
		try 
		{
				//DB connections
				$conn = DB_CONNECT();
				
				$result = $conn->prepare($sql);
				$result->execute();		
				
			//get the premium listing 
			while($row = $result->fetch(PDO::FETCH_ASSOC))
			{
				$img = $row['image'];
				$lid = $row['listing_id'];
				
				echo '<div class="col-sm-3 portfolio-item">';
				echo    '<a href="business.php?view=' . $lid . '" class="portfolio-link" data-toggle="modal">';
				echo 		'<img src="' . $img . '" class="img-responsive" alt="">';
				echo 	'</a>';
				echo '</div>';
			}
		}
		//error catching
		catch (PDOException $e)
		{
			echo "Connection failed: " . $e->getMessage();
		}
	
		$conn = null;	
	}
	
	function paginate($pageNumber, $perPage)
	{
		try 
		{
			$conn = DB_CONNECT();
			
			//SQL to get data
			$sql = "select DISTINCT *
						from 
						(listings l
						LEFT JOIN userOwnsCompany u
						on l.user_owns_company_id = u.userOwns_id)
						LEFT JOIN payment p ON p.payment_id = l.payment_id
						LEFT JOIN company c on u.company_id = c.company_id
							 WHERE authorised = 1 
							 AND p.product = 'business'
						ORDER BY p.date
						ASC";
			
			$result = $conn->prepare($sql);
			$result->execute();		
			
			$page = $pageNumber;
			$per  = $perPage;
				//count rows to calulate max pages
				$DB_count = $result->rowCount();
			$max = ceil($DB_count / $per);
			
			//if unknown number, reset to a default, eg. page = -1
			if ($pageNumber < 1)
			{
				$pageNumber = 1;
			}
			//if unknown number, reset to a default, eg. page = 98345793
			if ($page > $max)
			{
				$page = $max;
			}
			
			//maths to work out button positions
			$prev = $page - 1;
			$next = $page + 1;
			$from = (($page * $per) - $per);
			$pagination = '<nav><ul class="pagination pagination-lg">';


			//previous button
			if(!($page > 1) || $page == 1)
			{
				$pagination .= '<li class="disabled"><a>&lt;&lt;Previous</a></li>';
			}
			else //if $page > 1, add a hyperlink to prev page
			{
				$pagination .= '<li class=""><a href="?page=' . $prev . '">&lt;&lt;Previous</a></li>';
			}

			//loop through the other pages pages 
			for($i = 1; $i <= $max; $i++)
			{
				if(($page) == $i)
				{
					$pagination .= '<li class="active"><a>' . $i . '</a></li>';
				}
				else
				{
					$pagination .= '<li class=""><a href="?page=' . $i . '">' . $i . '</a></li>';
				}
			}
			
			//next button
			if($page < $max)
			{
				$pagination .= '<li class=""><a href="?page=' . $next . '"> Next &gt;&gt;</a></li>';
			}
			else
			{
				$pagination .= '<li class="disabled"><a> Next &gt;&gt;</a></li>';
			}
			//close tags
			$pagination .= "</ul></nav>";
			
			//SQL to get data
			$sql = "select DISTINCT *
						from 
						(listings l
						LEFT JOIN userOwnsCompany u
						on l.user_owns_company_id = u.userOwns_id)
						LEFT JOIN payment p ON p.payment_id = l.payment_id
						LEFT JOIN company c on u.company_id = c.company_id
							 WHERE authorised = 1 
							 AND p.product = 'business'
						ORDER BY p.date
						ASC
						LIMIT $from, $per";
		
			$result = $conn->prepare($sql);
				$result->execute();
			
			//for each record, get the image and ID to link too
			while($row = $result->fetch(PDO::FETCH_ASSOC))
			{
				$img = $row['image'];
				$lid = $row['listing_id'];
				
					
			 echo '<div class="col-md-3 portfolio-item">';
				echo '<a href="business.php?view=' . $lid . '" class="portfolio-link" data-toggle="modal">';
					echo '<img src="' . $img . '" class="img-responsive" alt="">';
				echo '</a>';
			echo '</div>';
			}
			//close HTML tags
				echo '</div>
						</div>
					 <div class="row text-center">';
						echo $pagination;
 
		}
		//error catching
		catch (PDOException $e)
		{
			echo "Connection failed: " . $e->getMessage();
		}
		
		$conn = null;
	}
	
	function search()
	{	
		//set search variables -- searching is a hidden form used in the submission
		//find repressents the data to search
		if (isset($_POST['searching']) && isset($_POST['find']))
		{
			$searching = $_POST['searching'];
			$find      = $_POST['find']; 
		}
		else
		{
			$searching = "no";
		}
			
		//This is only displayed if they have submitted the form  
		if ($searching == "yes")  
		{  
			//If they did not enter a search term we give them an error  
			if ($find == "") 
			{  
				echo "<p>You forgot to enter a search term";  
				exit;  
			}
			
			try 
			{
				// Otherwise we connect to our Database  
				
				//input filtering  
				$find = strtoupper($find);  
				$find = strip_tags($find);
				$find = trim($find);
				
				//DB CONNECTION
				$conn = DB_CONNECT();
				
				//SQL used to obtain all information on a purchase
				$sql = "SELECT DISTINCT *
						from 
						(listings l
						LEFT JOIN userOwnsCompany u
						ON l.user_owns_company_id = u.userOwns_id)
						LEFT JOIN payment p ON p.payment_id = l.payment_id
						LEFT JOIN company c ON u.company_id = c.company_id
							 WHERE authorised = 1 
							 AND 
								(
										upper(c.company_name)        LIKE '%" . $find . "%'
									 OR upper(c.company_description) LIKE '%" . $find . "%'
									 OR upper(c.company_website)     LIKE '%" . $find . "%'
									 OR upper(c.company_type)        LIKE '%" . $find . "%'
								)";
				
				$result = $conn->prepare($sql);
				$result->execute();		

				echo "<h2>Results</h2><p>";  

				//display results
				
				//table headers
				echo '<table class="table table-striped table-bordered table-hover">
				<thead>
						<td>Company Name</td>
						<td>Description</td>
						<td>Website</td>
						<td>Merchant Type</td>
						<td>Link</td>
					</thead>
					<tbody>';
				
				//draw data from database, looping for each record found
				while($row = $result->fetch(PDO::FETCH_ASSOC))
				{
					echo '<tr>';
						echo '<td>' . $row['company_name'] . '</td>';
						echo '<td>' . $row['company_description'] . '</td>';
						echo '<td>' . $row['company_website'] . '</td>';
						echo '<td>' . $row['company_type'] . '</td>';
						echo '<td><a href="business.php?view=' . $row['listing_id'] . '">Link</a></td>';
					echo '</tr>';
				}  
				
				echo '</table>';

				//error message to show if no records found  
				if ($result->rowCount() == 0)
				{
					echo "Sorry, but we can not find an entry to match your query<br><br>";
				}
				
				//remind user what they searched for
				echo "<b>Searched For:</b> " . $find;
			}
			catch (PDOException $e)
			{
				echo "Connection failed: " . $e->getMessage();
			}
			
			$conn = null;
		}
	}
	
	function searchBar()
	{ //Search form used througout the website, static HTML that calls searchBar() function
	?>
	<div class="row">
		<div class="col-lg-12 text-center">
			<div class="col-lg-12">
				<form name="search" method="post" action="search.php">
					<div class="col-sm-5" style="margin: 0 auto; float: none;">
						<input type="text" placeholder="eg. ship, bob, cabin, game, many many more..." name="find" class="form-control"/>
						<input type="hidden" name="searching" value="yes" /> 
						<input type="submit" name="search" value="Search" class="btn btn-primary buffer-top"/> 
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php
	
	}
	
	
?>