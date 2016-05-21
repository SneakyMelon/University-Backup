<?php
	ini_set("error_reporting" , 1);
	error_reporting(E_ALL);
	
	

		 $id = isset($_GET['UID']) ? $_GET['UID'] : -1;
		$cid = isset($_GET['CID']) ? $_GET['CID'] : -1;
	$product = isset($_GET['product']) ? $_GET['product'] : "premium";
	
	$UoC = null; 
	$company_id = null;
	
	$valid = "";

	//echo $id . $cid . $product;
	
	//admin cant use (id = 0), company can not either (cid = 0) ,

	//product does not need to be defined as it can have a default value set 
	//such as premium to encourage the user to buy the more profitable product.
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && $id > 0 && $cid > 0)
	{
		//$name = $card_number = $billing_address = $svc = $expires_month = $expires_year;
		
		$name 				= $_POST['name'];
		$card_number		= $_POST['card_number'];
		$billing_address 	= $_POST['billing_address'];
		$svc  				= $_POST['svc']; //security number
		$expires_month 		= $_POST['expires_month'];
		$expires_year 		= $_POST['expires_year'];
		
		
		//card number validation
		//$regEx = "\d[99]\d{10}";
		
		//http://stackoverflow.com/questions/834303/startswith-and-endswith-functions-in-php
		function startsWith($haystack, $needle)
		{
			// search backwards starting from haystack length characters from the end
			return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
		}
		
		if(!startsWith($card_number, "99"))
		{
			$valid = "false";
		}
		else
		{
			$valid = "true";		
		
			$servername	 = "lochnagar.abertay.ac.uk";
			$username	 = "sql0706008";
			$password	 = "qOJdFuXG";
			$dbname 	 = "sql0706008";
		
			try 
			{
				//database connection with credentials
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
					
				// set the PDO error mode to exception
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$conn->beginTransaction();
	
				$sql = "INSERT INTO payment
						  (name,
						  card_number,
						  billing_address,
						  svc,
						  expires_month,
						  expires_year,
						  product,
						  date)
					VALUES (?,?,?,?,?,?,?,?)";
					
				$statement = $conn->prepare($sql);
					
					$statement->bindParam(1, $name, PDO::PARAM_STR);
					$statement->bindParam(2, $card_number, PDO::PARAM_INT);
					$statement->bindParam(3, $billing_address, PDO::PARAM_STR);
					$statement->bindParam(4, $svc, PDO::PARAM_INT);
					
					$statement->bindParam(5, $expires_month, PDO::PARAM_INT);
					$statement->bindParam(6, $expires_year, PDO::PARAM_INT);
					$statement->bindParam(7, $product, PDO::PARAM_STR);
					$statement->bindParam(8, date('Y-m-d'), PDO::PARAM_STR);
								
					//phpmyadmin has them set as ZEROFILL attributes
					//    :: 123 int (size = 4) == 0123
					//used for expires_month, expires_year, SVC, card_number
				
					$statement->execute();
				
					$payment_id = $conn->lastInsertId();
				
				/*
					get the userOwnsCompany_id to relate to user and company
				*/
				
				$sql = "SELECT userOwns_id FROM userOwnsCompany
								WHERE user_id=?
								AND company_id=?";

				$result = $conn->prepare($sql);
					$result->bindParam(1, $id);
					$result->bindParam(2, $cid);
				
				$result->execute();
				
				if($result->rowCount() > 0) //logged in
				{
					$row = $result->fetch(PDO::FETCH_ASSOC);
					$UoC = $row['userOwns_id'];
				}
				
				/*
					insert into __listings
					
					listing_id, payment_id, user_owns_company_id, authorised
				*/
				
				$sql = "INSERT INTO listings (payment_id,user_owns_company_id) VALUES(?,?)";		
					$statement = $conn->prepare($sql);
					
					$statement->bindParam(1, $payment_id, PDO::PARAM_INT);
					$statement->bindParam(2, $UoC, PDO::PARAM_INT);
						$statement->execute();
					
				$conn->commit();
			}
			catch(PDOException $e)
			{
				echo "Connection failed: " . $e->getMessage();
				$conn->rollback();
			}	
			
			$conn = null;	
		}

		sleep(2); //pretend its working on something to delay the reload of page.
		header("location: http://mayar.abertay.ac.uk/~0706008/bizlist/pay.php?SUCCESS=" . $valid);
	}
	else
	{
		echo "<p>
				Error:: Incorrect Information - No data received, you need to return to 
					<a href='http://mayar.abertay.ac.uk/~0706008/bizlist/'>
						here
					</a>
			</p>";
	}
?>

