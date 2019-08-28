<?php include_once "include/header.php" ?>
<?php include_once "include/db.php" ?>


<?php 
	if(isset($_POST['order'])){
		
	$_SESSION['origin']='order_login';
	echo "<script>window.location='signin.php';</script>";
		
	}

?>

<style>
	.mt_btn_40{
		margin-top: 35px;
	}
	.mt_40{
		margin-top: 40px;
		font-size: 15px;
	}
	.text-white{
		color: #fff!important;
	}
	table{
		box-shadow: 0px -2px 5px #333;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive cart_info">
				<table class="table table-hover table-bordered">
					<thead style="background-color: #2fdab8;">

						<?php 
						if(isset($_SESSION['checkout'])){
							print_r($_SESSION['checkout']);
							print_r($_SESSION['cart']);
						}
							
						 ?>
						<tr class="cart_menu">
							<td class="text-white" style="width: 140px; ">Bag Image</td>
							<td class="text-white" style="width: 10px;">Bag Name </td>
							<td class="text-white" style="width: 100px;">Price</td>
							<td class="text-white" style="width: 10px;">Quantity</td>
							<td class="text-white" style="width: 10px;">Amount</td>	
							<td style="width: 20px;"><span class="text-white">Cancel</span></td>
						</tr>
					</thead>
					<tbody>	
			
				<?php 
					$sub_total=0;
					$final_total=0;

					if(isset($_SESSION['cart'])){
						foreach($_SESSION['cart'] as $index=>$data) {
							$qty=$data;
							$query="SELECT * FROM bags WHERE bag_id='$index'";
							$res=mysqli_query($con,$query);
							while ($row=mysqli_fetch_assoc($res)) {
								$bag_id = $row['bag_id'];
								$bag_image = $row['bag_image'];
								$bag_name = $row['bag_name'];
								$price = $row['price'];
								$sub_total+=$price;
								$final_total=$sub_total+5000;
					

				?>
						<tr>

							<td><img src="images/<?php echo $bag_image ?>" class="img-responsive" style="width:100px;height: 100px;display: block;border: 1px solid #fa0;margin-right: -150px;"></td>
							<td><p class="mt_40"><?php echo $bag_name; ?></p></td>
							<td><p style="margin-top: 40px;" class="cart_price_<?php echo $bag_id;?>" data-price="<?php echo $price;?>"><?php echo $price; ?></p></td>
							<td class="cart_quantity"><p class="mt_40">
								<div> 
									<button class="btn plus-btn btn-success" data-id="<?php echo $bag_id;?>" type="button" name="button">+
										<img src="plus.svg" alt="" /> 
									</button> 
									<input type="text" id="input_qty_<?php echo $bag_id; ?>" readonly value="<?php echo $qty; ?>" size="2">
									<button class="btn minus-btn btn-danger" data-id="<?php echo $bag_id;?>" type="button" name="button">-
										<img src="minus.svg" alt="" /> 
									</button> 
					            </div></p>
							</td>
							<!-- <td><p class="mt_40"><?php echo $data; ?></p></td> -->
							<td><p style="margin-top: 40px;" class="one_total_<?php echo $bag_id;?>"><?php echo $price * $qty; ?>MMK</p></td>
							<td><a href="remove_from_cart.php?pro_id=<?php echo $index;?>" class="btn btn-danger mt_btn_40"><i class="fa fa-trash"></i></a></td>
						</tr>
				<?php 

							}	
						}
					}
				?>
					</tbody>

				</table>
				<form action="#" method="post">
					<button type="submit" class="btn btn-primary pull-right" id="submit-order" name="order">Order</button>
				</form>	
			 
			</div>
		</div>
	</div>
</div>
<br><br><br>
<!-- <?php print_r($_SESSION['cart']); ?> -->


<?php include_once "include/footer.php"; ?>

<script type="text/javascript">

		$(document).on('click','.minus-btn', function(e) { 		
			e.preventDefault(); 	
			var id=$(this).data('id');			
			var qty=$("#input_qty_"+id).val();

			if(qty > 0){
				$("#input_qty_"+id).val(qty-1);	
				var price=$(".cart_price_"+id).data('price');
				var one_total=price * (parseInt(qty)-1);
				var sub_total=$("#sub_total").val();
				var subtract_price=sub_total - price;

				$("#sub_total").val(subtract_price);
				$(".sub_total").text(subtract_price+"MMK");

				var final_total=subtract_price+5000;
				$(".final_total").text(final_total+"MMK");
				$("#final_total").val(final_total);
				$(".one_total_"+id).text(one_total+"MMK");

	// ----------------------- cart session qty decrease----------------

				$.ajax({
					url : "cart_session.php",
					type : "get",
					data : {"qty" : parseInt(qty)-1,"bag_id" : id}
				}).done(function(response){
					if(response){
						location.reload();
					}
				}).fail(function(error){
					console.log(error);
				});				
		}

	});

	$(document).on('click','.plus-btn', function(e) { 		
			e.preventDefault(); 	
			var id=$(this).data('id');			
			$.ajax({
					url : 'qty_count.php?bag_id='+id,
					type : 'get',
					dataType : 'json'
				}).done(function(response){
					let qty=$("#input_qty_"+id).val();
					if(qty < response){
						$("#input_qty_"+id).val(parseInt(qty)+1);
						var price=$(".cart_price_"+id).data('price');
						var one_total=price * (parseInt(qty)+1);
						$(".one_total_"+id).text(one_total+"MMK");

						var sub_total=$("#sub_total").val();
						var add_price=parseInt(sub_total) + price;
						$("#sub_total").val(add_price);
						$(".sub_total").text(add_price+"MMK");

						var final_total=add_price+5000;
						$(".final_total").text(final_total+"MMK");
						$("#final_total").val(final_total);
						// ----------------------- cart session qty increase---------------
							$.ajax({
								url : "cart_session.php",
								type : "get",
								data : {"qty" : parseInt(qty)+1,"bag_id" : id}
							}).done(function(response){
								if(response){
									location.reload();
								}
							}).fail(function(error){
								console.log(error);
							});
				}
				}).fail(function(error){
					console.log(error);
				});
		}); 
</script>