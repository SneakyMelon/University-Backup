<?php
	include "functions.php";
?>

<!DOCTYPE html>
	<html lang="en">

	<head>
		<?php
			$title = "Bob's Merchant Listings";
			include_once "header.php";
		?>
		
	</head>

	<body id="page-top" class="index">

		<?php 

			$page = "view";
			include_once "nav.php";
		?>
		
		<?php
			$bg = "success";
			$buffer = true;
			
			include_once "listings.php";
		?>	
		
	<section class="" id="view">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2>View a list of Premium Trusted Traders</h2>
					
					<?php
						drawHR($c = "primary", $page);
					?>
					
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row buffer-top">
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                        
                           
                        <i class="fa fa-search-plus fa-3x"></i>
                        
                        <img src="img/portfolio/cabin.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/cake.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/circus.png" class="img-responsive" alt="">
                    </a>
                </div>
			</div>

			<div class="row buffer-top">
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/game.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                        
                           
                        <i class="fa fa-search-plus fa-3x"></i>
                        
                        <img src="img/portfolio/cabin.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/cake.png" class="img-responsive" alt="">
                    </a>
                </div>
			</div>

			<div class="row buffer-top">
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/circus.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/game.png" class="img-responsive" alt="">
                    </a>
                </div>
		        <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/game.png" class="img-responsive" alt="">
                    </a>
                </div>
            </div>
		</div>
	</section>
	
					
					
		<!-- PREMIUM full-page include data (included in footer) -->
		<?php
			include_once "footer.php";
		?>

	</body>
</html>