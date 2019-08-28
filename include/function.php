<?php 
include_once 'db.php';
	function confirm_query($result){
		global $con;
		if (!$result) {
    		die("Query Failed".mysqli_error($con));
    	}
	}
?>