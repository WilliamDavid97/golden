<?php include_once "include/header.php" ?>
<?php include_once "include/db.php" ?>
<?php //session_destroy(); ?>

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
						<tr class="cart_menu">
							<td class="text-white" style="width: 140px;">Bag Image</td>
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
								$amount = $price*$qty; 
								$sub_total+=$amount;								
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
									<input type="text" id="input_qty_<?php echo $bag_id; ?>" readonly value="<?php echo $qty;?>" size="1">
									<button class="btn minus-btn btn-danger" data-id="<?php echo $bag_id;?>" type="button" name="button">-
										<img src="minus.svg" alt="" /> 
									</button> 
					            </div></p>
							</td>
							<!-- <td><p class="mt_40"><?php echo $data; ?></p></td> -->
							<td><p style="margin-top: 40px;" class="one_total_<?php echo $bag_id;?>"><?php echo $amount; ?>MMK</p></td>
							<td><a href="remove_from_cart.php?pro_id=<?php echo $index;?>" class="btn btn-danger mt_btn_40"><i class="fa fa-trash"></i></a></td>
						</tr>
				<?php 

							}
							$final_total=$sub_total+3000;	
						}
					}
				?>
					</tbody>

				</table>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group " style="border: 1px solid gray;padding: 5px;background-color: #ffd600;color: #000; border-radius: 5px;">
							<label for="">Cart Sub Total</label>
							<input type="hidden" readonly value="<?php echo $sub_total;?>" id="sub_total">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
							<span class="sub_total"><?php echo $sub_total;?>MMK</span>
						</div>	
					</div>
					
					<div class="col-md-4">
						<div class="form-group " style="border: 1px solid gray;padding: 5px;background-color: #ffd600;color: #000; border-radius: 5px;">
							<label for="">Delivery Cost</label><input class="total-price" type="hidden" readonly value="4511670">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span class="show-total-price">3000MMK</span>	
						</div>
					</div>
						
					<div class="col-md-4">
						<div class="form-group " style="border: 1px solid gray;padding: 5px;background-color: #ffd600;color: #000; border-radius: 5px;">
							<label for="">Total</label><input id="final_total" name="final_total" type="hidden" readonly value="4511670">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span class="final_total" value="<?php echo $final_total;?>"><?php echo $final_total; ?>MMK</span>
						</div>
					</div>
				</div>
					<br><br>	
			
			</div>
		</div>
	</div>
</div>
<br><br><br>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form id="order_form" method="post">
					<div class="" style="border:1px solid gray;padding: 20px;">
					<h2 style="background-color: #fff; position: relative; top:-40px;right: -10px; display: inline;">Fill the following order form to order!</h2><br>
					
					<div class="form-group col-md-6">
				      <label for="name">Your Email</label>
				      <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['user_email']; ?>" readonly>
				    </div>

				    <div class="form-group col-md-6">
				      <label for="street">City</label>
				      <input type="text" class="form-control" name="city" placeholder="Yangon" required>
				    </div>

				    <div class="form-group col-md-6">
				      <label for="phone">Phone</label>
				      <input type="tel" class="form-control" name="phone" placeholder="+959 267159875" required>
				    </div>

				     <div class="form-group col-md-6">
				      <label for="street">Township</label>
				      <input type="text" class="form-control" name="township" placeholder="Latha Township" required>
				    </div>

				    <div class="form-group col-md-6">
				      <label for="email">Address No</label>
				      <input type="text" class="form-control" name="address_no" placeholder="No-167" required>
				    </div>

				    <div class="form-group col-md-6">
				      <label for="address">Street</label>
				      <input type="text" class="form-control" name="street" placeholder="Shwe Taung Tan Street" required>
				    </div>

				    <div class="form-group col-md-6">
				    	<input name ="payment" value="WaveMoneyTransfer" type="radio">
						<label>Wave Money Transfer (Phone : 09454456144)</label>
				    </div>

				    <div class="form-group col-md-6">
				    	<input name="payment" value="CashPayAfterProductReceived" type="radio">
						<label>Cash Pay After Product Received</label>
				    </div>
					
				   
					<div class="row">
						<div class="col-md-12">
							
						</div>
					</div>
					<br>
					
					<button type="submit" class="btn btn-primary" id="submit-order"  name="order">Order Confirm</button>
				    
				</div>
				</form>
			</div>
		</div>
	</div>
<br><br>

<?php 
	if(isset($_POST['order'])){
		$email=$_POST['email'];
		$city=$_POST['city'];
		$phone=$_POST['phone'];
		$township=$_POST['township'];
		$address_no=$_POST['address_no'];
		$street=$_POST['street'];
		$last_total=$final_total;
		if(isset($_POST['payment'])){
			$method=$_POST['payment'];
		}else{
			$method="";
		}
		  

		$query="INSERT INTO deli_info(deli_email,deli_ph,payment,total_price,address_no,street,township,city) VALUES('$email','$phone','$method','$last_total','$address_no','$street','$township','$city')";
		$result=mysqli_query($con,$query);
		if (!$result) {
			die("Query Failed." . mysqli_error($result));
			echo "Query Failed";
		}
		echo "<script>window.location.href='customer.php';</script>";
}				

?>

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

				var final_total=subtract_price+3000;
				$(".final_total").text(final_total+"MMK");
				$("#final_total").val(final_total);
				$(".one_total_"+id).text(one_total+"MMK");
				
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

						var final_total=add_price+3000;
						$(".final_total").text(final_total+"MMK");
						$("#final_total").val(final_total);
				}
				}).fail(function(error){
					console.log(error);
				});
		}); 

			$(document).on('submit','#order_form',function(){

				let session_data ='<?php echo json_encode($_SESSION['cart']); ?>'; 
				console.log(session_data);
				$.each(JSON.parse(session_data),function(index,data){
					let bag_id=index;
					let qty=$("#input_qty_"+bag_id).val();
					$.ajax({
						url : "checkout_session.php",
						type : "get",
						data : {"qty" : qty,"bag_id" : bag_id}
					}).fail(function(error){
						console.log(error);
					});
				});
			
			});	

</script>
