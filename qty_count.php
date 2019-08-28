<?php  
	require_once "include/db.php";
	$bag_id = $_GET['bag_id'];
	$query ="SELECT * FROM bags WHERE bag_id = $bag_id";
	$result = mysqli_query($con,$query);
	while($row = mysqli_fetch_assoc($result)){
		$qty = $row['item_qty'];
		echo json_encode($qty);
	}
 ?>