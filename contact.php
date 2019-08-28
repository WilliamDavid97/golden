<?php require_once "include/header.php"; ?>
<?php require_once "include/db.php"; ?>
<!-- banner -->
<?php require_once "include/navbar.php"; ?>
<!-- //banner-top -->

<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3>C<span>ontact Us </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.php">Home</a><i>|</i></li>
								<li>Contact</li>
							</ul>
						 </div>

				</div>
	   <!--//w3_short-->
	</div>
</div>
<br><br><br>
<div class="container">

	   <div class="contact-w3-agile1 map" data-aos="flip-right">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3825.634299027577!2d97.61602256450963!3d16.4940449822948!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c2af53bd56861d%3A0xa514f312a4c7ae!2sZeigyi+(Central+Market)%2C+Mawlamyine!5e0!3m2!1sen!2smm!4v1562845554649!5m2!1sen!2smm" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		   	   </div>
	</div>
   <div class="banner_bottom_agile_info">
	<div class="container">
	   <div class="agile-contact-grids">
				<div class="agile-contact-left">
					<div class="col-md-6 address-grid">
						<h4>For More <span>Information</span></h4>
							<div class="mail-agileits-w3layouts">
								<i class="fa fa-volume-control-phone" aria-hidden="true"></i>
								<div class="contact-right">
									<p>Telephone </p><span>+95 9967159875</span>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="mail-agileits-w3layouts">
								<i class="fa fa-envelope-o" aria-hidden="true"></i>
								<div class="contact-right">
									<p>Mail </p><a href="mailto:info@example.com">goldendragon@gmail.com </a>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="mail-agileits-w3layouts">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
								<div class="contact-right">
									<p>Location</p><span>7784 Diamonds street,Mawlamyaing</span>
								</div>
								<div class="clearfix"> </div>
							</div>
							
					</div>
					<div class="col-md-6 contact-form">
						<h4 class="white-w3ls">Feedback </h4>

						<?php 
							if (isset($_POST['send'])) {
								  $name = $_POST['name'];
								  $email = $_POST['email'];
								  $phone = $_POST['phone'];
								  $message = $_POST['message'];

								  $query = "INSERT INTO feedback(name, email, phone, message) VALUES ('$name','$email','$phone','$message')";
								  $res = mysqli_query($con,$query);
							}
						?>
						<form action="#" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="name" required>
								<label>Name</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="email" name="email" required> 
								<label>Email</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="text" name="phone" required>
								<label>Phone</label>
								<span></span>
							</div>
							<div class="styled-input">
								<textarea name="message" required></textarea>
								<label>Message</label>
								<span></span>
							</div>	 
							<input type="submit" value="SEND" name="send">
						</form>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
       </div>
	</div>
 <!--//contact-->

<!-- //footer -->
<?php require_once "include/footer.php";?>