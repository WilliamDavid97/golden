<?php
	if (isset($_GET['edit'])) {
	 	$the_user_id = mysqli_real_escape_string($con,$_GET['edit']);
	 	$query = "SELECT * FROM users WHERE user_id=$the_user_id";
	 	$result = mysqli_query($con,$query);
	 	if (!$result) {
	 		die("Query Failed." . mysqli_error($result));
	 	}
	 	while ($row=mysqli_fetch_assoc($result)) {
			$username = $row['username'];
			$user_password = $row['user_password'];
			$user_email = $row['user_email'];
			$user_role = $row['user_role'];
			$ph_no = $row['ph_no'];
			$user_address = $row['user_address'];
	 	}
	 } 
	 ?>
<?php	if (isset($_POST['edit_user'])) {
		$username = $_POST['username'];
		$user_email = $_POST['user_email'];
		$user_password = $_POST['user_password'];
		$user_role = $_POST['user_role'];
		$ph_no = $_POST['ph_no'];
		$user_address = $_POST['user_address'];

		$query = "UPDATE users SET username='$username',user_password='$user_password',user_email='$user_email',user_role='$user_role',ph_no='$ph_no',user_address='$user_address' WHERE user_id=$the_user_id";
		$result = mysqli_query($con,$query);
		if (!$result) {
			die("Query Failed." . mysqli_error($result));
		}
		echo "Created User Successfully." . "<a href='users.php'>View All Users</a>";
	}
?>

<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="" class="control-label">User Role</label>
		<select name="user_role" id="" class="form-control">
			<option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
			<?php 
				if ($user_role == 'admin') {
					echo '<option value="customer">Customer</option>';					
				}else{
					echo '<option value="admin">Admin</option>';
				}
			?>
		</select>
	<div class="form-group">
		<label for="" class="control-label">User Name</label>
		<input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">User Email</label>
		<input type="text" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Password</label>
		<input type="text" class="form-control" name="user_password" value="<?php echo $user_password; ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Phone Number</label>
		<input type="phone" class="form-control" name="ph_no" value="<?php echo $ph_no; ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Address</label>
		<input type="text" class="form-control" name="user_address" value="<?php echo $user_address; ?>">
	</div>

	<div class="form-group">
		<input type="submit" name="edit_user" value="Update User" class="btn btn-primary">
	</div>
</form>