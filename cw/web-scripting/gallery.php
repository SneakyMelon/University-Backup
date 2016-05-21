
<!doctype html>

<head>
	<title>0706008 - Web Scripting Coursework [2014]</title>
	
	<meta name="description" content="Coursework for the module Web Scripting">
	<meta charset="utf-8">
	
	<link rel="stylesheet" href="css/style.css">
    
    <script defer src="js/search.js"  type="text/javascript"></script>
	<script defer src="js/gallery.js" type="text/javascript"></script>
</head>
<body>
			
		<?php
			//calls on header template so I can edit the nav bar,
			//and have it applied to every page without the need
			//to edit each one individually
			require_once "scripts/nav_bar.php";
		?>	

		<section id="content">
				<?php
					//Default aside that is standard throughout
					//this two columb design
				
					include_once "scripts/contents_aside.php";
				?>
			
			<section id="contents">

				<h2>Welcome to the Balmoral Gallery</h2>

				<?php

					require_once "scripts/db_login.php";
				
					//condition ? valueIfTrue : valueIfFalse
					//       page = get_page          //if not, page = 1
					$page     = isset($_GET['page']) ? $_GET['page'] : '1';
					$per_page = isset($_GET['per'])  ? $_GET['per']  : '4';
					
					
					$sql = "SELECT * FROM imageGallery";
					$result = mysqli_query($con,  $sql);
					
					$number_of_images = mysqli_num_rows($result);
					$max_pages = ceil($number_of_images / $per_page);
					
					if ($page < 0) //gallery.php with no page declaration
					{
						$page = 1;
					}
					
					if ($page > $max_pages)
					{
						$page = $max_pages;
					}
					
					$prev = ($page - 1);
					$next = ($page + 1);
					$from = (($page * $per_page) - $per_page);
					$pagination = '';
					
					//previous button
					if(!($page > 1) || $page == 1)
					{
						$pagination .= '<span class="page prev disabled">&lt;&lt;Previous</span>';
					}
					else //if $page > 1, add a hyperlink to prev page
					{
						$pagination .= '<span class="page prev"><a href="?page=' . $prev . '&amp;per=' . $per_page . '">&lt;&lt;Previous</a></span>';
					}
					
					/* Loop through the other pages pages */
					for($i = 1; $i <= $max_pages; $i++)
					{
						if(($page) == $i)
						{
							$pagination .= '<span class="page this-page">' . $i. '</span>';
						}
						else
						{
							$pagination .= '<span class="page"><a href="?page=' . $i . '&amp;per=' . $per_page . '">' . $i . '</a></span>';
						}
					}
					
					if($page < $max_pages)
					{
						$pagination .= '<span class="page next"><a href="?page=' . $next . '&amp;per=' . $per_page . '"> Next >></a></span>';
					}
					else
					{
						$pagination .= '<span class="page next disabled">Next >></span>';
					}
					
					$sql = "select * from imageGallery LIMIT " . $from . "," . $per_page;
					$result = mysqli_query($con, $sql);
					
				echo "<div id='gallery'>";	
					while ($row = mysqli_fetch_array($result))
					{
						//echo $i['title'].'<br />';
						printf ("<img class='gallery pic-%d' src='%s' alt='%s' />", $row['id'], $row['image'], $row['description']);
					}
				
			echo '<div id="page">';
					echo '<div id="pagination">';
						echo $pagination;
					echo '</div>';
?>	

					<div id="results-per-page">
						<p>Results per page...</p>
						
						<form id="per_page">
							<select name="per">
								<option value="2">2</option>
								<option value="3">3</option>
								<option selected value="4">4</option>
							</select>
						</form>
					</div>
				</div>
			</div>
			</section>
		</section>

		<?php
			require_once "scripts/footer.php";
		?>

</body>