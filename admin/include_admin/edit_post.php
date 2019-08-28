<?php 
	if (isset($_GET['p_id'])) {
		$p_id = mysqli_real_escape_string($con,$_GET['p_id']);
		$query = "SELECT * FROM bags WHERE bag_id=$p_id";
		$result = mysqli_query($con,$query);
		while ($row=mysqli_fetch_assoc($result)) {
			$bag_id = $row['bag_id'];
            $bag_name = $row['bag_name'];
            $main_category = $row['main_category'];
            $sub_category = $row['sub_category'];
            $price = $row['price'];
            $item_status = $row['item_status'];
            $bag_image = $row['bag_image'];
            $item_qty = $row['item_qty'];
            $description = $row['description'];		
            $bag_date = $row['bag_date'];		
        }
	}
?>

<?php 
	if (isset($_POST['update'])) {
		$bag_name = $_POST['bag_name'];
		$sub_category = $_POST['sub_category'];
		$main_category = $_POST['main_category'];
		$price = $_POST['price'];
		$item_status = $_POST['item_status'];

// -----------------------For Image Change--------------------------------------

		$bag_image = $_FILES['bag_image']['name'];
		$bag_image_temp = $_FILES['bag_image']['tmp_name'];
		move_uploaded_file($bag_image_temp, "../images/$bag_image");

// -------------------------------VIP----------------------------------------------
		if (empty($bag_image)) {
			$query = "SELECT * FROM bags WHERE bag_id=$p_id";
			$select_image = mysqli_query($con,$query);
			while ($row=mysqli_fetch_assoc($select_image)) {
				$bag_image = $row['bag_image'];
			}
		}

		$item_qty = $_POST['item_qty'];
		$description = $_POST['description'];
		$post_date = date('d-m-y');

		$query = "UPDATE bags SET bag_name='$bag_name',main_category='$main_category',sub_category='$sub_category',price=$price,item_status='$item_status',bag_image='$bag_image',item_qty='$item_qty',description='$description',bag_date=now() WHERE bag_id='$p_id'";
		$result = mysqli_query($con,$query);
		if (!$result) {
				die("Query Failed." . mysqli_error($result));
		}
		echo "Updated item successfully." . "<a href='post.php'>View All Bags</a>";
	}
?>

<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="" class="control-label">Bag Name</label>
		<input type="text" class="form-control" name="bag_name" value="<?php echo $bag_name; ?>">
	</div>

	<div class="form-group">
		<label for="" class="control-label">Main Category</label>
		<select name="main_category" class="form-control selected_main_cat_option">
		<?php 
			$main_query = "SELECT * FROM main_categories";
			$main_result = mysqli_query($con,$main_query);
			while ($row=mysqli_fetch_assoc($main_result)) {
				$main_id = $row['main_id'];
				$main_title = $row['main_title'];
		?>
			<option value="<?php echo $main_id; ?>" <?php echo $main_id== $main_category? "selected" : ""; ?> ><?php echo $main_title; ?></option>
		<?php
			}
		?>
		</select>	
	</div>

	<div class="form-group">
		<label for="" class="control-label">Sub Category</label>
		<select name="sub_category" class="form-control sub_category">
			<!-- sub category -->
		</select>	
	</div>
	
	<div class="form-group">
		<label for="" class="control-label">Price</label>
		<input type="text" class="form-control" name="price" value="<?php echo $price; ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Item Status</label>
		<select name="item_status" id="" class="form-control">
			<option value='<?php echo $item_status; ?>'><?php echo $item_status; ?></option>
		<?php 
			if ($item_status == 'available') {
				echo "<option value='unavailable'>unavailable</option>";
			}else{
				echo "<option value='available'>available</option>";
			}
		?>		
		</select>
	</div>
	<div class="form-group">
		<label for="" class="control-label">Bag Image</label>
		<input type="file"  name="bag_image" >
		<img src="../images/<?php echo $bag_image; ?>" width='100px' class="img-responsive" alt="">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Item Qty</label>
		<input type="text" class="form-control" name="item_qty" value="<?php echo $item_qty; ?>">
	</div>
	<div class="form-group">
			<label for="" class="control-label">Description</label>
			<textarea name="description" class="form-control">
				<?php echo $description; ?>
			</textarea>	
		</div>

	<div class="form-group">
		<input type="submit" name="update" value="Upload Item" class="btn btn-primary">
	</div>
</form>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script type="text/javascript">
function categoryLoad(){
     $(".sub_category").empty();
            let sub_id="<?php echo $sub_category; ?>";
            var id=$('.selected_main_cat_option').val();
            $.ajax({
                url : "../admin/ajax_category.php?main_id="+id,
                type : "get",
                dataType : "json"
            }).done(function(response){
               $.each(response,function(index,data){
               	    let selected=sub_id == data.sub_id ? "selected" : "";
               		$(".sub_category").append("<option "+selected+" value='"+data.sub_id+"'>"+data.sub_title+"</option>");
               });
            }).fail(function(error){
                console.log(error);
    });
}
    $(function(){
        categoryLoad(); // first main cat load
        $(document).on('change','.selected_main_cat_option',function(){ // selected main cat load
           categoryLoad();
        });
    });
</script>