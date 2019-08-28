<?php 
	require_once 'include/db.php';
	
	session_start();
	
	$bag_id = $_GET['bag_id'];
	$qty = $_GET['qty'];
	$data=array(
	'bag_id' => $bag_id,
	'qty' => $qty
);

	$_SESSION['checkout'][$bag_id]=$qty;

	$qty_query = "SELECT * FROM bags WHERE bag_id='$bag_id'";
	$qty_res = mysqli_query($con,$qty_query);
	while ($row = mysqli_fetch_assoc($qty_res)) {
		$item_qty = $row['item_qty'];

		$new_qty = $item_qty - $qty;

		$update_qty_query = "UPDATE bags SET item_qty=$new_qty WHERE bag_id='$bag_id'";
		$update_qty_res = mysqli_query($con,$update_qty_query);
	}
    
	echo true;

?>