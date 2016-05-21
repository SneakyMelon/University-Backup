<?php
	ini_set("error_reporting" , 1);
	error_reporting(E_ALL);
	
	
		 $id = isset($_GET['UID']) ? $_GET['UID'] : -1;
		$cid = isset($_GET['CID']) ? $_GET['CID'] : -1;
	$product = isset($_GET['product']) ? $_GET['product'] : "premium";
	
	$valid = true;

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
		$regEx = "\d[99]\d{10}";
		
		if(preg_match($regEex, $card_number))
		{
			$valid = false;
		}
		else
		{
			/*only runs if the card details match the 99** **** ****
			if ($_POST['product'] == "premium")
			{
				$product = "premium";
			}
			else
			{
				$product = "business";
			}*/
		
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
						  product)
					VALUES (?,?,?,?,?,?,?)";
					
				$statement = $conn->prepare($sql);
					
				$statement->bindParam(1, $name, PDO::PARAM_STR);
				$statement->bindParam(2, $card_number, PDO::PARAM_INT);
				$statement->bindParam(3, $billing_address, PDO::PARAM_STR);
				$statement->bindParam(4, $svc, PDO::PARAM_INT);
				
				$statement->bindParam(5, $expires_month, PDO::PARAM_INT);
				$statement->bindParam(6, $expires_month, PDO::PARAM_INT);
				$statement->bindParam(7, $product, PDO::PARAM_STR);
				
					//phpmyadmin has them set as ZEROFILL attributes
					//    :: 123 int (size = 4) == 0123
					//used for expires_month, expires_year, SVC, card_number
				
				$statement->execute();
				
				/*
					$last_id = $conn->lastInsertId();
				*/
				
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
		header("location: http://mayar.abertay.ac.uk/~0706008/bizlist/pay.php?SUCESS=" . $valid);
	}
	else
	{
		echo "<p>
				To view this page, you need to return to 
					<a href='http://mayar.abertay.ac.uk/~0706008/bizlist/'>
						here
					</a>
			</p>";
	}
?>

