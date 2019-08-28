<?php require_once "include/db.php"; ?>
<?php include_once 'include/header.php'; ?>
<!-- banner -->
<?php include_once 'include/navbar.php'; ?>

<!-- //banner-top -->
<!--/single_page-->
<div class="page-head_agile_info_w3l">
	<div class="container">
		<h3>Single <span>Page </span></h3>
		<!--/w3_short-->
			 <div class="services-breadcrumb">
					<div class="agile_inner_breadcrumb">

					   <ul class="w3_short">
							<li><a href="index.php">Home</a><i>|</i></li>
							<li>Single Page</li>
						</ul>
					 </div>
			</div>
   <!--//w3_short-->
	</div>
</div>

  <!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
	<div class="container">
	     <div class="col-md-4 single-right-left ">
			<div class="grid images_3_of_2">
				<div class="flexslider">
					<?php 
						 if(isset($_GET['p_id'])){
						 	$p_id=$_GET['p_id'];
							$query = "SELECT * FROM bags WHERE bag_id=$p_id";
	 						$result = mysqli_query($con,$query);
	 					
	 						while ($row=mysqli_fetch_assoc($result)) {
								$bag_id = $row['bag_id'];
								$bag_name = $row['bag_name'];
								$bag_image = $row['bag_image'];
								$price = $row['price'];
								$description = $row['description'];
	 						}
						
					 ?>

						<ul data-thumb="images/<?php echo $bag_image; ?>">
							<div class="thumb-image">
								<img src="images/<?php echo $bag_image; ?>"  class="img-responsive"> 
							</div>
						</ul>
							
					<div class="clearfix"></div>
				</div>	
			</div>
		</div>
		<div class="col-md-8 single-right-left simpleCart_shelfItem">
					<h3><?php echo $bag_name; ?></h3>
					<p><span class="item_price">MMK <?php echo $price; ?></span> <del></del></p>
					
					<div class="description">
						<h4>Description : </h4>
						<p><?php echo $description; ?></p>
					</div>
					
					<?php 
						
					}
					 ?>

						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2"  style="width: 30%;">
							<a href="add_to_cart.php?type=single&pro_id=<?php echo $bag_id; ?>">
							<input type="submit" name="submit" value="Add to cart" class="button" /></a>
						</div>
					<!-- <div class="occasion-cart" style="width: 30%;">												
					</div> -->

		      </div>
	 			<div class="clearfix"> </div>

	</div>
</div>	
		</div>
		</div>
    </div>
 </div>
<!--//single_page-->

<?php require_once "include/footer.php"; ?>
