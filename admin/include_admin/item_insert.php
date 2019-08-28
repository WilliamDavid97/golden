<!-- <?php include_once "../include/db.php"; ?>  -->

<?php 
	if (isset($_POST['item_insert'])) {
		$bag_name = $_POST['bag_name'];
		$main_category = $_POST['main_cat_id'];
		$sub_category = $_POST['sub_cat_id'];
		$price = $_POST['price'];
		$item_status = $_POST['item_status'];

		$bag_image = $_FILES['image']['name'];
		$bag_image_temp = $_FILES['image']['tmp_name'];
		move_uploaded_file($bag_image_temp, "../images/$bag_image");

		$item_qty = $_POST['item_qty'];
		$description = $_POST['description'];
		//$bag_date = $_POST['bag_date'];
		
		$bag_query="INSERT INTO bags(bag_name, main_category, sub_category, price, item_status, bag_image, item_qty,description, bag_date) VALUES ('$bag_name','$main_category','$sub_category',$price,'$item_status','$bag_image','$item_qty','$description',now())";
		$bag_result=mysqli_query($con,$bag_query);
		if(!$bag_result){
			die("Query Failed".mysqli_error($bag_result));
		}

		echo "Created Post Successfully." . "<a href='post.php'>View All Posts</a>";
	}
?>

	<div class="col-lg-12">
        <h1 class="page-header">
            Add New Bag
        </h1>
    </div>
<div class="col-lg-12">
	<form action="" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="" class="control-label">Bag Name</label>
			<input type="text" class="form-control" name="bag_name">
		</div>
		 <div class="form-group">
            <label for="" class="control-label">Main Category
            </label>
            <select class="selected_main_cat_option form form-control" name="main_cat_id">
                <option value="1">Men's Bag</option>
                <option value="2">Women's Bag</option>
                <option value="3">Kid's Bag</option>
            </select>
        </div>
		 <div class="form-group">
            <label for="" class="control-label">Sub Category
            </label>
            <select class="selected_sub_cat_option form form-control" name="sub_cat_id">
                <!-- related sub category -->
            </select>
        </div>
		<div class="form-group">
			<label for="" class="control-label">Price</label>
			<input type="text" class="form-control" name="price">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Item Status</label>
			<select name="item_status" id="" class="form-control">
				<option value="available">Available</option>
				<option value="unavailable">Unavailable</option>
			</select>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Bag Image</label>
			<input type="file" name="image">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Item Qty</label>
			<input type="text" class="form-control" name="item_qty">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Description</label>
			<textarea name="description" class="form-control"></textarea>
		</div>

		<div class="form-group">
			<input type="submit" name="item_insert" value="Upload Item" class="btn btn-primary">
		</div>
	</form>
</div>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script type="text/javascript">
function categoryLoad(){
     $(".selected_sub_cat_option").empty();
            var id=$('.selected_main_cat_option').val();
            $.ajax({
                url : "ajax_category.php?main_id="+id,
                type : "get",
                dataType : "json"
            }).done(function(response){
                $.each(response,function(index,data){
                    $(".selected_sub_cat_option").append("<option value='"+data.sub_id+"'>"+data.sub_title+"</option>");
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