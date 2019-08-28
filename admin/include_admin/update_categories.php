<?php 
    if (isset($_POST['update'])) {
        $sub_id = mysqli_real_escape_string($con,$_GET['edit']);
        $sub_title = $_POST['sub_title'];
        $query = "UPDATE sub_categories SET sub_title='$sub_title' WHERE sub_id=$sub_id";
        $result = mysqli_query($con,$query);
        if (!$result) {
            die("Query Failed." . mysqli_error($result));
        }
        header('Location: add_categories.php');
    }
?>
<form action="" method="post">
    <div class="form-group">
        <label for="" class="control-label">Update Category Name</label>
        <?php 
            if (isset($_GET['edit'])) {
                $sub_id = mysqli_real_escape_string($con,$_GET['edit']);
                $query = "SELECT * FROM sub_categories WHERE sub_id=$sub_id";
                $result = mysqli_query($con,$query);
                if (!$result) {
                    die("Query Failed." . mysqli_error($result));
                }
                while ($row=mysqli_fetch_assoc($result)) {
                    $sub_id = $row['sub_id'];
                    $sub_title = $row['sub_title'];      
            ?>

        <input type="text" class="form-control" name="sub_title" value="<?php echo $sub_title; ?>">
        <?php
                }
            }
        ?>
    </div>
    <div class="form-group">

        <input type="submit" name="update" class="btn btn-primary" value="Update Category">

    </div>
</form>