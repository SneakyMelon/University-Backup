<?php

	$out = '<section id="premium" ';
	$outBG = null;
	$outBuffer = null;

	if(isset($bg))
	{
		$outBG = $bg;
	}
	
	if(isset($buffer) && $buffer == true)
	{
		$outBuffer = " buffer-top";
	}
	
	if ($outBG || $outBuffer) //at least one is true, create a class attribute, otherwise, don't bother
	{
		$out .= 'class = "' . $outBG . $outBuffer . '"';
	}
	
	$out .= '>';
	echo $out;
?>
	<!-- <section id="premium"> -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Top Verified Traders</h2>
					<?php
						drawHR($c="light", $page);
					?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 portfolio-item">
                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                        <i class="fa fa-search-plus fa-3x"></i>
                        <img src="img/portfolio/cabin.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-3 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/cake.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-3 portfolio-item">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/circus.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-3 portfolio-item">
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