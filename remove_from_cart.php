<?php
	session_start();

	$pro_id=$_GET['pro_id'];
	if($_SESSION['cart'][$pro_id]){
		unset($_SESSION['cart'][$pro_id]);
		if (isset($_SESSION['user_email'])) {
		header("location:cart2.php");
	}else{
		header("Location:cart1.php");
	}
}