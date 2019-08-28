<?php require_once "db.php"; ?>
<?php session_start(); ?>

<?php 
	if(isset($_POST['login'])){
		$email = $_POST['email'];
	 	$password = $_POST['password'];

		$email = mysqli_real_escape_string($con,$email);
		$password = mysqli_real_escape_string($con,$password);
		if ($email=='kyawkyaw@gmail.com' && $password==123) {
			$_SESSION['user_role']='admin';
			header('Location: ../admin/index.php');
		}else{
			$query = "SELECT * FROM users WHERE user_email='$email'";
			$result = mysqli_query($con,$query);

			if(!$result){
			die("Query Failed" . mysqli_error($result));
			}
			while($row = mysqli_fetch_assoc($result)){
				$db_id = $row['user_id'];
				$db_username = $row['username'];
				$db_password = $row['user_password'];
				$db_email = $row['user_email'];
				
			}
			if($db_email==$email && password_verify($password, $db_password)){
			 	$_SESSION['username']=$db_username;
			 	$_SESSION['user_password']=$db_password;
			 	$_SESSION['user_email']=$db_email;
			 	header('Location: entry.php');
			}else{
				echo "Incorrect password";
				//header('Location:../signin.php');
				

			}
		}

		
				
	}

 ?>