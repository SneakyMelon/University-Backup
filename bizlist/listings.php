<?php

	//page variables to prevent glitchy visuals
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
				<?php
					$sql = "select DISTINCT *
								from 
								(listings l
								LEFT JOIN userOwnsCompany u
								on l.user_owns_company_id = u.userOwns_id)
								LEFT JOIN payment p ON p.payment_id = l.payment_id
								LEFT JOIN company c on u.company_id = c.company_id
									 WHERE authorised = 1 
									 AND p.product = 'premium'
								ORDER BY p.date
								ASC
								limit 4";
								
				//draw premium map, limited to 4
				drawPremiumImageMap($sql);
				?>
            </div>
        </div>
    </section>