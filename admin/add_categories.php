<?php include_once 'include_admin/header.php' ?>
	<?php include_once 'include_admin/nav.php' ?>
		
	<?php include_once 'include_admin/side_bar.php' ?>

    <div class="row">
            <ol class="breadcrumb">
                <li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Category</li>
            </ol>
        </div><!--/.row-->
		
		
		<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add More Category
                        </h1>
                    </div>
                    <div class="col-xs-6">
                    <?php 
                        insert_category();
                        delete_category();
                    ?>
                        <form action="" method="post">
                               <div class="form-group">
                                <label for="" class="control-label">Main Category
                                </label>
                                <select class="selected_main_cat_option form form-control" name="main_id">
                                    <option value="1">Men's Bag</option>
                                    <option value="2">Women's Bag</option>
                                    <option value="3">Kid's Bag</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Add Sub Category
                                </label>
                                <input type="text" class="form form-control" name="sub_title">
                            </div>

                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
                            </div>
                        </form><br><br>
                        <?php 
                            if (isset($_GET['edit'])) {
                                $cat_id = $_GET['edit'];
                                include_once "include_admin/update_categories.php";
                            }
                        ?>

                    </div>
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Category Title</th>
                                    <th>Delete</th>
                                    <th>Update</th>
                                </tr>
                            </thead>
                            

                            <tbody class="cat_body">

                                <!-- selected                               -->
                            
                            </tbody>
                        </table>
                    </div>
        </div>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script type="text/javascript">
function categoryLoad(){
     $(".cat_body").empty();
            var id=$('.selected_main_cat_option').val();
            $.ajax({
                url : "ajax_category.php?main_id="+id,
                type : "get",
                dataType : "json"
            }).done(function(response){
                $.each(response,function(index,data){
                    $(".cat_body").append('<tr><td>'
                                                        +(index+1)+'</td>'
                                                        +'<td>'
                                                        + data.sub_title
                                                        +'</td>'
                                                        +'<td><a href="add_categories.php?delete='+data.sub_id+'">Delete'
                                                        +'</a></td>'
                                                        +'<td><a href="add_categories.php?edit='+data.sub_id+'">Update'
                                                        +'</a></td>'
                                                    +'</tr>');
                    // $(".selected_sub_cat_option").append("<li>"+data.sub_title+"</li>");
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
<?php include_once 'include_admin/footer.php' ?>