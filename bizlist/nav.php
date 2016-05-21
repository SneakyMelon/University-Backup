  <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				<?php
					//page name text / index link
					
					//if its not the index page, take you to the index page
					//else, allow the user to keep the scrolling effect on the 
					//main page.
				
					
					if (isset($page))
					{					
						//if its the index page, keep the nice scrolling effect that bootstrap has, else, take them directly to the section
						if ($page === "index")
						{
							echo '<a class="navbar-brand" href="#page-top">Bob\'s Merchants</a>';
						}
						else
						{
							echo '<a class="navbar-brand" href="index.php">Bob\'s Merchants</a>';
						}
					}
					else
					{
						echo '<a class="navbar-brand" href="index.php">Bob\'s Merchants</a>';
					}
				?>
               
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
					<?php
						if (isset($page) && $page === "index")
						{					

					?>
							<li class="hidden">
								<a href="#page-top"></a>
							</li>
							<li class="page-scroll">
								<a href="#about">About</a>
							</li>
							<li class="page-scroll">
								<a href="#listings">Buy</a>
							</li>
					<?php
						}
						else
						{
					?>
							<li class="hidden">
								<a href="index.php#page-top"></a>
							</li>
							<li class="page-scroll">
								<a href="index.php#about">About</a>
							</li>
							<li class="page-scroll">
								<a href="index.php#listings">Buy</a>
							</li>
					<?php
						}
					?>	
					<li class="">
						<a href="tutor.php">TUTOR</a>
					</li>					
					<li class="">
						<a href="view.php?page=1">Visit Traders</a>
					</li>
					<li class="">
						<a href="register.php">Register</a>
					</li>
					<li class="">
					<?php
						//login v logout
						if(isset($_SESSION['name']))
						{
							echo '<a href="logout.php">logout</a>';
						}
						else
						{
							echo '<a href="login.php">Login</a>';
						}
					?>
					</li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>