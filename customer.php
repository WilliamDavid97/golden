<?php ob_start(); ?>
<?php session_start(); ?>
<?php 
	if(!isset($_SESSION['user_role'])){
		header('Location:../index.php');
	}
 ?>
 <?php include_once "include/function.php"; ?>

<!DOCTYPE html>
<html>
<head>
  <title>Golden Dragon</title>
  <!--/tags -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
  Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
  		function hideURLbar(){ window.scrollTo(0,1); } </script>
  <!--//tags -->
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

  <link rel="stylesheet" href="css/style.css">
  <link href="css/font-awesome.css" rel="stylesheet"> 
  <link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
  <!-- //for bootstrap working -->
  <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
  <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
</head>
<style>
  #PPMiniCart form ul li{
    padding-right: 50px!important;
	}
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
  }
</style>
<body>
	<!-- header -->
		<div class="header" id="home">
			<div class="container">
				<ul>
				    <li> <a href="include/logout.php"><i class="fa fa-unlock-alt" ></i> Log out </a></li>
					<li> <a href="reset_password.php"><i class="fa fa-pencil-square-o"></i> Reset Password </a></li>
					<li><i class="fa fa-phone" aria-hidden="true"></i> Call : 01234567898</li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@example.com">goldendragon@gmail.com</a></li>
				</ul>
			</div>
		</div>
	<!-- //header -->
	<!-- header-bot -->
<div class="header-bot">
  <div class="header-bot_inner_wthreeinfo_header_mid">

    <!-- header-bot -->
      <div class="col-md-12 logo_agile">
        <h1><a href="include/logout.php"><img src="images/logo.png" width="150px" height="112px">Golden Dragon</a></h1>
      </div>
        <!-- header-bot -->
    <div class="clearfix"></div>
  </div>
</div>
<!-- //header-bot -->
<?php require_once "include/db.php"; ?>
<!-- banner -->


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="voucher1.css">
</head>

	<div>
		
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="form-group table table-bordered">
					<div class="c"><h3><span class="text-primary"><?php echo $_SESSION['username']; ?>'s</span> Information</h3></div>
					<thead>						
						<th>Email</th>
						<th>Phone</th>
						<th>Payment</th>
						<th>amount Price</th>
						<th>Address No</th>
						<th>Street</th>
						<th>Township</th>
						<th>City</th>
					</thead>
					<tr>
				<?php 
					// print_r($_SESSION['checkout']);
					if(isset($_SESSION['user_email'])){
						$email=$_SESSION['user_email'];

						$query="SELECT * FROM deli_info";
						$result=mysqli_query($con,$query);
						confirm_query($result);

						$all_deliver=mysqli_num_rows($result);
						if(!empty($all_deliver)){
							$email_query="SELECT * FROM deli_info WHERE deli_email='$email'";
							$email_result=mysqli_query($con,$email_query);
							confirm_query($email_result);

							while($row=mysqli_fetch_assoc($email_result)){
							$deli_id=$row['deli_id'];
							$deli_email=$row['deli_email'];
							$deli_ph=$row['deli_ph'];
							$payment=$row['payment'];
							$total_price=$row['total_price'];
							$address_no=$row['address_no'];
							$street=$row['street'];
							$township=$row['township'];
							$city=$row['city'];
						}
					?>
						
						<td><?php echo $deli_email; ?></td>
						<td><?php echo $deli_ph; ?></td>
						<td><?php echo $payment; ?></td>
						<td><?php echo $total_price; ?></td>
						<td><?php echo $address_no; ?></td>
						<td><?php echo $street; ?></td>
						<td><?php echo $township; ?></td>
						<td><?php echo $city; ?></td>
					<?php
						 	}
						} 
					?>
					</tr>
				</table>
				</div>
			</div>		
		</div>
	</div>
   <br><br>

</div>
<div class="container">
	<div class="row">
		<div class="col md-12">
			<div class="table-responsive">
				<table class="table table-hover" >
				<thead style="background-color: #2fdab8;">
					<tr>
						<td class="text-white" style="width: 10px;">No</td>
						<td class="text-white" style="width: 140px; ">Image</td>
						<td class="text-white" style="width: 10px; ">Name</td>
						<td class="text-white" style="width: 100px; ">Price</td>
						<td class="text-white" style="width: 10px; ">Quantity</td>
						<td class="text-white" style="width: 10px; ">Amount</td>
					</tr>
				</thead>
				<tbody>
			
					<?php 
						$sub_amount=0;
						$final_amount=0;
						$no = 1;

						if(isset($_SESSION['user_email'])){
							$email = $_SESSION['user_email'];
							$query = "SELECT * FROM deli_info WHERE deli_email='$email'";
							$result = mysqli_query($con,$query);
							confirm_query($result);
							while($row = mysqli_fetch_assoc($result)){
								$deli_id = $row['deli_id'];
							}
						}

						if(isset($_SESSION['checkout'])){
							foreach ($_SESSION['checkout'] as $key => $value) {
								$bag_id=$key;
								$qty=$value;
								$query = "SELECT * FROM bags WHERE bag_id='$bag_id'";
								$res = mysqli_query($con,$query);
								confirm_query($res);
								while ($row=mysqli_fetch_assoc($res)) {
									$bag_id = $row['bag_id'];
									$bag_image = $row['bag_image'];
									$price = $row['price'];
									$bag_name= $row['bag_name'];
									$amount = $price*$qty;
									$sub_amount += $amount;
									$final_amount = $sub_amount+3000;

									$query = "INSERT INTO orders(delivery_id,bag_image,bag_name,price,qty, amount,order_date) VALUES ('$deli_id','$bag_image','$bag_name','$price','$qty','$amount',now())";
									$result=mysqli_query($con,$query);
									confirm_query($result);		

									$or_query = "SELECT * FROM orders";
									$or_res = mysqli_query($con,$or_query);
									confirm_query($or_res);

									while ($row=mysqli_fetch_assoc($or_res)) {
										$image = $row['bag_image'];
										$name = $row['bag_name'];
										$price = $row['price'];
										$qty = $row['qty'];
										$amount = $row['amount'];
									}
									

					?>
							<tr>

								<td><p class="mt_40"><?php echo $no;
									$no = $no+1; ?></p></td>

								<td><img src="images/<?php echo $image ?>" class="img-responsive" style="width:100px;height: 100px;display: block;border: 1px solid #fa0;margin-right: -150px;"></td>

								<td class="cart_description">
									<h4><p class="mt_40"><?php echo $name; ?></p></h4>
								</td>
								<td class="cart_price">
									<p class="mt_40"><?php echo $price; ?>MMK</p>
								</td>
								<td class="cart_quantity">
									<div class="cart_quantity_button">
										<p class="mt_40"><?php echo $qty; ?></p>
									</div>
								</td>
								<td class="cart_amount">
									<p class="cart_total_price mt_40"><?php echo $amount; ?>MMK</p>
								</td>						
							</tr>
					<?php 

								}	
							}
						}

					?>
							<tr>
								<td colspan="4">&nbsp;</td>
								<td colspan="2">
									<table border="1" class="table table-condensed" >
										<tr>
											<td style="background-color: #2fdab8; font-weight: bold;">Cart Sub amount</td>
											<td>MMK <?php echo $sub_amount; ?></td>
										</tr>
										<tr>
											<td style="background-color: #2fdab8; font-weight: bold;">Delivery Cost</td>
											<td>MMK&emsp;3000</td>										
										</tr>
										<tr>
											<td style="background-color: #2fdab8; font-weight: bold;">amount</td>
											<td><span>MMK <?php echo $final_amount; ?></span></td>
										</tr>
									</table>
								</td>
							</tr>
					</tbody>

				</table>
			</table>
			</div>
		</div>
	</div>
</div>
	    <div class="b">
			<span class="glyphicon glyphicon-heart"></span>
	    	THANK YOU FOR YOUR BUSINESS
	    </div>
	    <br>
</div>

</html>
<?php require_once "include/footer.php"; ?>