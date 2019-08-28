<?php 
	
	session_start();
	
	$bag_id = $_GET['bag_id'];
	$qty = $_GET['qty'];

	$_SESSION['cart'][$bag_id]=$qty;
    
	echo true;

?>