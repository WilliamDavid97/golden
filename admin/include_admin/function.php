<?php 
	function insert_category(){
		global $con;
	    if (isset($_POST['submit'])) {
			$sub_title = $_POST['sub_title'];
			$main_id=$_POST['main_id'];

			if ($sub_title == '' || empty($sub_title)) {
	    	echo "Please Insert Category Name.";
			}else{
	    	$query = "INSERT INTO sub_categories(main_id,sub_title) VALUES ('$main_id','$sub_title')";
	    	$result = mysqli_query($con,$query);
	    	if (!$result) {
	        	die("Query Failed." . mysqli_error($result));
	    		}
			}                            
		}
	}

// delete Category function
	function delete_category(){
		global $con;
		if (isset($_GET['delete'])) {
	        $sub_id =$_GET['delete'];
	        $query = "DELETE FROM sub_categories WHERE sub_id=$sub_id";
	        $result = mysqli_query($con,$query);
	        if (!$result) {
	            die("Query Failed." . mysqli_error($result));
	        }
	    }
	}
?>