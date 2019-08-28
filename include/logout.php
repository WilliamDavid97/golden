<?php 
 session_start();
 if(isset($_SESSION['user_role'])){
 	unset($_SESSION['user_role']);
 	header('Location: ../index.php');
 }else{
 	unset($_SESSION['username']);
	unset($_SESSION['user_email']);
	unset($_SESSION['user_password']);
	unset($_SESSION['cart']);
	unset($_SESSION['checkout']);
	unset($_SESSION['origin']);
	header('Location: ../index.php');
 }

?>