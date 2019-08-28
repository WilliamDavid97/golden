<?php
require_once '../include/db.php';

if(isset($_GET['main_id'])){
	$main_id=$_GET['main_id'];
	$query="SELECT * FROM sub_categories WHERE main_id='$main_id'";
	$res=mysqli_query($con,$query);
	$data=array();
	while ($row=mysqli_fetch_assoc($res)) {
		array_push($data,$row);
	}
	echo json_encode($data);
}