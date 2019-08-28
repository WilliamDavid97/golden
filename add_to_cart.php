<?php
	session_start();
	$pro_id=$_GET['pro_id'];
	$type=$_GET['type'];
	$qty=1;

	if(isset($_SESSION['cart'][$pro_id])){
		foreach ($_SESSION['cart'] as $index => $data) {
			echo $index;
			echo $pro_id;
			if($index == $pro_id){
				// unset($_SESSION['cart'][$index]);
				// echo "it work";
				$_SESSION['cart'][$index]=$data+1;
			}
		}
	}else{
		$_SESSION['cart'][$pro_id]=$qty;
	}

if($type == 'index'){
	header("Location:index.php");
}else if($type == 'mens'){
	header("Location:mens.php");
}else if($type == 'womens'){
	header("Location:womens.php");	
}else if($type == 'kids'){
	header("Location:kids.php");
}else if($type == 'single'){
	$_SESSION['pro_id']=$pro_id;
	header("Location:single.php?p_id=$pro_id");	
}else if($type == 'search'){
	header('Location:'. $_SERVER['HTTP_REFERER']);
}else if($type == 'cat_page'){
	header('Location:'. $_SERVER['HTTP_REFERER']);
}

// unset($_SESSION['cart']);
// print_r($_SESSION['cart']);
