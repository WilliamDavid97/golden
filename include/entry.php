<?php
	require_once 'db.php';
	session_start();

	if(!isset($_SESSION['origin'])){
		$_SESSION['origin']='home_login';
	}
 ?>

<?php  
	if($_SESSION['origin']=='home_login'){
		header('Location:../index.php');
		
	}elseif($_SESSION['origin']=='order_login'){
		header('Location:../cart2.php');
	}
?>

