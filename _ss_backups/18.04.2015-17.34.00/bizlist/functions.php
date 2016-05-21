<?php
	//functions that are used throughout the website
	
	session_start();
	
	$_SESSION['id'] = isset($_SESSION['id']) ? $_SESSION['id'] : -1;
	
	
	//$page     = isset($_GET['page']) ? $_GET['page'] : '1';
	
	if ($page != "register")
	{
		unset($_SESSION['from_info']);
	}
	
	function logout()
	{
		// remove all session variables
		session_unset(); 
	
		// destroy the session 
		session_destroy(); 
		
		sleep(3);
		header("location: index.php?logged_out");
	}
	
	function DB_connect($u, $p)
	{
		
		/*
			run anything here now that connection is made to DB
			
			example usage:: add new values to DB
			 $sql = "	INSERT INTO MyGuests (firstname, lastname, email)
						VALUES ('John', 'Doe', 'john@example.com')";
			
			use exec() because no results are returned
			$conn->exec($sql);
				
						**************************
						
				//$row = $result->fetchAll(PDO::FETCH_ASSOC);
					
					//$row = $result->fetchAll();
							
							
					//$row = $result->fetch(PDO::FETCH_ASSOC);
					//var_dump($row);
					
				
							******************
								
			Insert Multiple Records Into MySQL Using PDO
			
			try 
			{
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				
				// set the PDO error mode to exception
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				// begin the transaction
				$conn->beginTransaction();
				
				// our SQL statememtns
				$conn->exec("INSERT INTO MyGuests (firstname, lastname, email) 
				VALUES ('John', 'Doe', 'john@example.com')");
				
				$conn->exec("INSERT INTO MyGuests (firstname, lastname, email) 
				VALUES ('Mary', 'Moe', 'mary@example.com')");
				
				$conn->exec("INSERT INTO MyGuests (firstname, lastname, email) 
				VALUES ('Julie', 'Dooley', 'julie@example.com')");

				// commit the transaction
				$conn->commit();
			
				echo "New records created successfully";
			}
			catch(PDOException $e)
			{
				// roll back the transaction if something failed
				$conn->rollback();
				
				echo "Error: " . $e->getMessage();
			}
			
						******************
						
			Prepared Statements in PDO	
						
						
			// prepare sql and bind parameters
			$stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) 
									VALUES (:firstname, :lastname, :email)");
			
			$stmt->bindParam(':firstname', $firstname);
			$stmt->bindParam(':lastname', $lastname);
			$stmt->bindParam(':email', $email);

			// insert a row
			$firstname = "John";
			$lastname = "Doe";
			$email = "john@example.com";
			
			$stmt->execute();

			// insert another row
			$firstname = "Mary";
			$lastname = "Moe";
			$email = "mary@example.com";
			
			$stmt->execute();

			// insert another row
			$firstname = "Julie";
			$lastname = "Dooley";
			$email = "julie@example.com";
			
			$stmt->execute();

			echo "New records created successfully";	

				
				******************
				
				
			Select Data With PDO (+ Prepared Statements)
			The following example uses prepared statements.

			It selects the id, firstname and lastname columns from the MyGuests table and displays it in an HTML table:

			Example (PDO)

			<?php
			echo "<table style='border: solid 1px black;'>";
			echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";

			class TableRows extends RecursiveIteratorIterator { 
				function __construct($it) { 
					parent::__construct($it, self::LEAVES_ONLY); 
				}

				function current() {
					return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
				}

				function beginChildren() { 
					echo "<tr>"; 
				} 

				function endChildren() { 
					echo "</tr>" . "\n";
				} 
			} 

			$servername = "localhost";
			$username = "username";
			$password = "password";
			$dbname = "myDBPDO";

			try {
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $conn->prepare("SELECT id, firstname, lastname FROM MyGuests"); 
				$stmt->execute();

				// set the resulting array to associative
				$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
				foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
					echo $v;
				}
			}
			catch(PDOException $e) {
				echo "Error: " . $e->getMessage();
			}
			$conn = null;
			echo "</table>";
			?>	
			
				************************************
					
				// query
				$result = $conn->prepare("SELECT * FROM users WHERE username= :hjhjhjh AND password= :asas");
				$result->bindParam(':hjhjhjh', $user);
				$result->bindParam(':asas', $password);
				$result->execute();
				$rows = $result->fetch(PDO::FETCH_NUM);
				if($rows > 0) {
				header("location: home.php");
				}
								
								
				************************************
				//print database table by column name
				
				while ($row = $result->fetch(PDO::FETCH_ASSOC))
				{
					$title = $row['title'];
					$body = $row['body'];
				}
			
		*/
		
		//close connection
		
	}
	
	//use conn.exec(sql) when you dont want to return anything (like VOID function)
	
	/*
		CONN.exec () = connection . execute SQL
	

		set the PDO error mode to exception
		$CONN->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	*/

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

					<p> For just £10 per week, we provide you with the highest quality business listings. </p>
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
?>