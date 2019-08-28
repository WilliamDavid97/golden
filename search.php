
<?php include_once "include/db.php" ?>


<?php include_once "include/header.php" ?>

    <!-- Navigation -->
<?php include_once "include/navbar.php" ?>

<div class="banner-bootom-w3-agileits">
    <div class="container">
        <div class="clearfix"></div>    
            <div class="single-pro">
                <?php 
                    $search = $_GET['search'];
                    $query = "SELECT * FROM bags WHERE bag_name AND item_status='available' AND item_qty!=0 LIKE '%$search%' ";
                    $result = mysqli_query($con,$query);
                    if (!$result) {
                        die("Query Failed." . mysqli_error($result));
                    }
                    $count = mysqli_num_rows($result);
                    if ($count > 0) {      
                       
                    while ($row=mysqli_fetch_assoc($result)) {
                        $bag_id=$row['bag_id'];
                        $bag_name=$row['bag_name'];
                        $price=$row['price'];
                        $bag_image=$row['bag_image'];                           
                ?>
                
                    <!-- First Blog Post -->
                    <div class="col-md-3 product-men" >
                        <div class="men-pro-item simpleCart_shelfItem" >
                            <div class="men-thumb-item">
                                <a href="post.php?p_id=<?php echo $bag_id; ?>"><img src="images/<?php echo $bag_image ?>" class="pro-image-front img-responsive" style="width:255px;height: 250px;">
                                 <a href="post.php?p_id=<?php echo $bag_id; ?>"><img src="images/<?php echo $bag_image ?>" class="pro-image-back img-responsive" style="width:255px;height: 250px;">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="single.php?p_id=<?php  echo $bag_id; ?>" class="link-product-add-cart">Quick View</a>
                                        </div>
                                    </div>
                                    <span class="product-new-top">New</span>                
                            </div>
                            <div class="item-info-product ">
                                <h4><a href="post.php?p_id=<?php echo $bag_id; ?>"><?php echo $bag_name; ?></a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">MMK <?php echo $price; ?></span>
                                </div>                                      

                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <a href="add_to_cart.php?type=search&pro_id=<?php echo $bag_id; ?>">
                                    <input type="submit" name="submit" value="Add to cart" class="button" /></a>
                                </div>
                                                                    
                            </div>
                        </div>
                    </div>
                <?php
                        }
                    }else{
                ?>
            <div class="" style=" font-size: 1.5em; ">
            <span class="glyphicon glyphicon-eye-close"></span>
            Item  not  found !
        </div>

                <?php
                        }
                ?>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
<?php include_once "include/footer.php" ?>