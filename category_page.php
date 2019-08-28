<?php require_once "include/header.php"; ?>
<?php require_once "include/db.php"; ?>
<!-- banner -->
<?php require_once "include/navbar.php"; ?>
<!-- //banner-top -->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
	<div class="container">
		<?php 

			$arr=array();
					$new_query = "SELECT * FROM bags WHERE bag_date > date_sub(now(),interval 5 day) AND item_status='available'";
					$result = mysqli_query($con,$new_query);
					while($row=mysqli_fetch_assoc($result)){
					array_push($arr, $row['bag_id']);

				}


			if( isset($_GET['m_id']) && isset($_GET['s_id']) ){
			 	$ma_id=$_GET['m_id'];			 
			 	
				$query = "SELECT * FROM main_categories WHERE main_id='$ma_id'";
				$result = mysqli_query($con,$query);
					
				while ($row=mysqli_fetch_assoc($result)) {
				   $ma_id=$row['main_id'];
				   $ma_title=$row['main_title'];	 
				}			
			}			
		?>
			<h3><?php echo $ma_title; ?></h3>
			<!--/w3_short-->
				<div class="services-breadcrumb">
					<div class="agile_inner_breadcrumb">
						<?php 
							if( isset($_GET['m_id']) && isset($_GET['s_id']) ){						 	
							 	$su_id=$_GET['s_id'];
							 	
								$query = "SELECT * FROM sub_categories WHERE sub_id='$su_id'";
		 						$result = mysqli_query($con,$query);
		 						
		 						while ($row=mysqli_fetch_assoc($result)) {
		 						   $su_id=$row['sub_id'];
		 						   $su_title=$row['sub_title'];	 
		 						}			
	 						}			
					 	?>
						   <ul class="w3_short">
								<li><a href="index.php">Home</a><i>|</i></li>
								<li><?php echo $su_title?></li>
							</ul>
					</div>
				</div>

	   <!--//w3_short-->
	</div>
</div>

  <!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
	<div class="container">
		<div class="clearfix"></div>
		
		<div class="single-pro">
			<?php 
				if( isset($_GET['m_id']) && isset($_GET['s_id']) ){
				 	$main_cat=$_GET['m_id'];
				 	$sub_cat=$_GET['s_id'];
				 	
					$query = "SELECT * FROM bags WHERE main_category=$main_cat AND sub_category=$sub_cat AND item_status='available'";
					$result = mysqli_query($con,$query);

						
					while ($row=mysqli_fetch_assoc($result)) {
						$main_cat=$row['main_category'];
						$sub_cat=$row['sub_category'];
					  	$bag_id = $row['bag_id'];
					  	$bag_name = $row['bag_name'];
					  	$bag_image = $row['bag_image'];
					  	$price = $row['price'];						

			?>

			<div class="col-md-3 product-men" >
				<div class="men-pro-item simpleCart_shelfItem" >
					<div class="men-thumb-item">
						<a href="category_page.php"><img src="images/<?php echo $bag_image ?>" class="pro-image-front img-responsive" style="width:255px;height: 250px;">
						<a href="category_page.php"><img src="images/<?php echo $bag_image ?>" class="pro-image-back img-responsive" style="width:255px;height: 250px;">
							<div class="men-cart-pro">
								<div class="inner-men-cart-pro">
									<a href="single.php?p_id=<?php echo $bag_id ?>" class="link-product-add-cart">Quick View</a>
								</div>
							</div>
						<?php 
							if (in_array($bag_id,$arr)) {
							?>
								<span class="product-new-top">New</span>
							<?php 
								}
							?>
					</div>
					<div class="item-info-product ">
						<h4><a href="category_page.php"><?php echo $bag_name; ?></a></h4>
						<div class="info-product-price">
							<span class="item_price">MMK <?php echo $price; ?></span>
						</div>										

						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
							<a href="add_to_cart.php?type=cat_page&pro_id=<?php echo $bag_id; ?>"><input type="submit" name="submit" value="Add to cart" class="button" /></a>							
						</div>															
					</div>
				</div>
			</div>

			<?php
			 		}
			 	} 
			 ?>
				<div class="clearfix"></div>
		</div>
	</div>
</div>	

<?php require_once "include/footer.php"; ?>