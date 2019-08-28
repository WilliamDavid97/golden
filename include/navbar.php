<!-- banner -->
<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">
					<li class="active menu__item "><a class="menu__link" href="index.php">Home <span class="sr-only">(current)</span></a></li>
					<li class=" menu__item"><a class="menu__link" href="about.php">About</a></li>

					<li class="dropdown menu__item  ">
						<a href="category_page.php?m_id=1" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Men's Bag<span class="caret"></span></a>
							<ul class="dropdown-menu single-column columns-1 multi-gd-text">
								<ul class="multi-column-dropdown">	
									<li><a href="mens.php">All Bags</a></li>
										<?php 
											$query = "SELECT * FROM sub_categories WHERE main_id='1'";
											$res = mysqli_query($con,$query);
											while($row=mysqli_fetch_assoc($res)){
												$sub_id=$row['sub_id'];
												$sub_title=$row['sub_title'];
										?>
											<li><a href="category_page.php?m_id=1&s_id=<?php echo $sub_id ?>"><?php echo $sub_title; ?></a></li>
										<?php 
											}
										?>			

								</ul>									
							</ul>
					</li>

					<li class="dropdown menu__item ">
						<a href="category_page.php?m_id=2" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Women's Bag <span class="caret"></span></a>
							<ul class="dropdown-menu single-column columns-1 multi-gd-text">
								<ul class="multi-column-dropdown">
									<li><a href="womens.php">All Bags</a></li>
										<?php 
											$query = "SELECT * FROM sub_categories  WHERE main_id='2'";
											$res = mysqli_query($con,$query);
											while($row=mysqli_fetch_assoc($res)){
												$sub_id=$row['sub_id'];
												$sub_title=$row['sub_title'];
										?>
											<li><a href="category_page.php?m_id=2&s_id=<?php echo $sub_id ?> "><?php echo $sub_title; ?></a></li>
										<?php 
											}
										?>
								</ul>									
							</ul>
					</li>

					<li class="dropdown menu__item ">
						<a href="category_page.php?m_id=3" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kid's Bag <span class="caret"></span></a>
							<ul class="dropdown-menu single-column columns-1 multi-gd-text">
								<ul class="multi-column-dropdown">
									<li><a href="kids.php">All Bags</a></li>
										<?php 
											$query = "SELECT * FROM sub_categories  WHERE main_id='3'";
											$res = mysqli_query($con,$query);
											while($row=mysqli_fetch_assoc($res)){
												$sub_id=$row['sub_id'];
												$sub_title=$row['sub_title'];
										?>
											<li><a href="category_page.php?m_id=3&s_id=<?php echo $sub_id ?> "><?php echo $sub_title; ?></a></li>
										<?php 
											}
										?>
								</ul>									
							</ul>
					</li>

					<li class=" menu__item"><a class="menu__link" href="contact.php">Contact</a></li>
				  </ul>
				</div>
			  </div>
			</nav>	
		</div>

 		<?php 
 			if(isset($_SESSION['cart'])){
 				$num_pro=count($_SESSION['cart']);
 			}else{
 				$num_pro=0;
 			}

 			
 		 ?>

		<div class="top_nav_right">
		<div class="wthreecartaits wthreecartaits2 cart cart box_1">
			<?php 
				if(!isset($_SESSION['user_email'])){
					echo "<a href='cart1.php' class='btn btn-lg'><i class='fa fa-cart-arrow-down' aria-hidden='true'></i>&nbsp;{$num_pro}</a>";
				}else{

					echo "<a href='cart2.php' class='btn btn-lg'><i class='fa fa-cart-arrow-down' aria-hidden='true'></i>&nbsp;{$num_pro}</a>";
				}
			 ?>
		</div>
			
		</div>
		
		<div class="clearfix"></div>
	</div>
</div>
