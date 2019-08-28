<?php require_once "include/header.php"; ?>
<?php require_once "include/db.php"; ?>
<!-- banner -->
<?php require_once "include/navbar.php"; ?>
<!-- //banner-top -->
<!-- banner -->



<style type="text/css">
	.img{
		width: 255px;
		height: 277px;
	}
</style>
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
			<!-- <li data-target="#myCarousel" data-slide-to="3" class=""></li>
			<li data-target="#myCarousel" data-slide-to="4" class=""></li> --> 
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active"> 
				<div class="container">
					<div class="carousel-caption">
						<h3>The Biggest <span>Sale</span></h3>
						<p>Special for today</p>
						<a class="hvr-outline-out button2" href="#new_arrivals">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item2"> 
				<div class="container-fluid">
					<div class="carousel-caption">
						<h3>Summer <span>Collection</span></h3>
						<p>New Arrivals On Sale</p>
						<a class="hvr-outline-out button2" href="#new_arrivals">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item3"> 
				<div class="container-fluid">
					<div class="carousel-caption">
						<h3>The Biggest <span>Sale</span></h3>
						<p>Special for today</p>
						<a class="hvr-outline-out button2" href="#new_arrivals">Shop Now </a>
					</div>
				</div>
			</div> 
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		<!-- The Modal -->
	</div>
	<!-- //banner -->
<div class="banner_bottom_agile_info">
	<div class="container">
	    	<h3 class="wthree_text_info">What's <span>Trending</span></h3>
            <div class="banner_bottom_agile_info_inner_w3ls">
    	           <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
						<figure class="effect-roxy">
							<img src="images/down1.jpg" alt=" " class="img-responsive" />
							<figcaption>
								<h3><span>H</span>ot Sale</h3>
								<p>Special for today</p>
							</figcaption>			
						</figure>
					</div>
					 <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
						<figure class="effect-roxy">
							<img src="images/down2.jpg" alt=" " class="img-responsive" />
							<figcaption>
								<h3><span>H</span>ot sale</h3>
								<p>Special for today</p>
							</figcaption>			
						</figure>
					</div>
					<div class="clearfix"></div>
		    </div> 


<!-- /new_arrivals --> 
	<div class="new_arrivals_agile_w3ls_info" id="new_arrivals"> 
		<div class="container">
		    <h3 class="wthree_text_info">New <span>Arrivals</span></h3>		
			<div class="single-pro">
				<?php 
					$query = "SELECT * FROM bags WHERE bag_date > date_sub(now(),interval 5 day) AND item_status='available' AND item_qty!=0";
					$result = mysqli_query($con,$query);

					while ($row=mysqli_fetch_assoc($result)) {
						$bag_id = $row['bag_id'];
						$bag_name=$row['bag_name'];
						$price=$row['price'];
						$bag_image = $row['bag_image'];
				?>
							<div class="col-md-3 product-men">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item" >
										
										<a href="index.php?p_id=<?php echo $bag_id; ?>"><img src="images/<?php echo $bag_image ?>" class="pro-image-front img-responsive" style="width:255px;height: 250px;">
										<a href="index.php?p_id=<?php echo $bag_id; ?>"><img src="images/<?php echo $bag_image ?>" class="pro-image-back img-responsive" style="width:255px;height: 250px;">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="single.php?p_id=<?php echo $bag_id ?>" class="link-product-add-cart">Quick View</a>
												</div>
											</div>
											<span class="product-new-top">New</span>				
									</div>
									<div class="item-info-product ">
										<h4><a href="index.php?p_id=<?php echo $bag_id; ?>"><?php echo $bag_name; ?></a></h4>
										<div class="info-product-price">
											<span class="item_price">MMK <?php echo $price; ?></span>
										</div>										
										
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
											<a href="add_to_cart.php?type=index&pro_id=<?php echo $bag_id; ?>">
											<input type="submit" name="submit" value="Add to cart" class="button" /></a>
										</div>
																			
									</div>
								</div>
							</div>
							<?php
        						}
    						?>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
		</div>
</div>
<!-- //footer -->
<?php require_once "include/footer.php";?>
