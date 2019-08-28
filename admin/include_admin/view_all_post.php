                <div class="col-lg-12">
                    <h1 class="page-header">
                        All Bag Posts
                    </h1>
                </div>
<?php 
    if (isset($_POST['checkboxArray'])) {
        foreach ($_POST['checkboxArray'] as $checkBoxValue) {
            $bulk_option = $_POST['bulk_option'];
            switch ($bulk_option) {
                case 'available':
                    $query = "UPDATE bags SET item_status='$bulk_option' WHERE bag_id=$checkBoxValue";
                    $result = mysqli_query($con,$query);
                    if (!$result) {
                        die("Query Failed" . mysqli_error($result));
                    }
                    break;
                
                case 'unavailable':
                    $query = "UPDATE bags SET item_status='$bulk_option' WHERE bag_id=$checkBoxValue";
                    $result = mysqli_query($con,$query);
                    if (!$result) {
                        die("Query Failed" . mysqli_error($result));
                    }

                    break;

                 case 'delete':
                    $query = "DELETE FROM bags WHERE bag_id=$checkBoxValue";
                    $result = mysqli_query($con,$query);
                    if (!$result) {
                        die("Query Failed" . mysqli_error($result));
                    }
                    break;  
            }
        }
    }
?>
                    <div class="col-xs-12">
                        <form action="" method="post">
                            <div class="col-xs-4 form-group">
                                <select name="bulk_option" id="" class="form-control">
                                    <option value="">------Select Option------</option>
                                    <option value="available">Available</option>
                                    <option value="unavailable">Unavailable</option>
                                    <option value="delete">Delete</option>
                                </select>
                            </div>
                            <div class="col-xs-2 form-group">
                                <input type="submit" name="apply" value="Apply" class="btn btn-primary">
                            </div>
                            <table class="table table-bordered table-responsive table-hover" id="usetTable">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="selectAllBoxes"></th>
                                        <th>No.</th>
                                        <th>Bag Name</th>
                                        <th>Main Category</th>
                                        <th>Sub Category</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                        <th>Qty</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $no = 1; 
                                    $query = "SELECT * FROM bags ORDER BY bag_id DESC";
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

                                        echo "<tr>";
                                ?>

                                <td><input type='checkbox' class="checkBoxes" name="checkboxArray[]" value="<?php echo $bag_id; ?>"></td>

                                <?php
                                        
                                        echo "<td>$no</td>";
                                        echo "<td>$bag_name</td>";

                                        $main_query = "SELECT * FROM main_categories WHERE main_id=$main_category";
                                        $main_category = mysqli_query($con,$main_query);
                                        
                                        while ($row=mysqli_fetch_assoc($main_category)) {
                                            $main_category_id = $row['main_id'];
                                            $main_category_name = $row['main_title'];
                                            echo "<td>$main_category_name</td>";
                       
                                        }                                        
                                         
                                        $sub_query = "SELECT * FROM sub_categories WHERE sub_id=$sub_category";
                                        $sub_category = mysqli_query($con,$sub_query);
                                        
                                        while ($row=mysqli_fetch_assoc($sub_category)) {
                                            $sub_category_id = $row['sub_id'];
                                            $sub_category_name = $row['sub_title'];
                                            echo "<td>$sub_category_name</td>"; 
                                            if (!$main_category_name) {
                                                die("Query Failed" . mysqli_error($main_category_name));
                                            }
                                        }

                                        echo "<td>$price</td>";
                                        echo "<td>$item_status</td>";
                                        echo "<td><img class='img-responsive' width='100px' src='../images/{$bag_image}' alt=''></td>";
                                        echo "<td>$item_qty</td>";
                                         echo "<td>$description</td>";
                                        echo "<td>$bag_date</td>";
                                        echo "<td><a href='post.php?source=edit_post&p_id=$bag_id'>Update</a></td>";
                                        echo "<td><a onclick=\"javascript: return confirm('Are You Sure You Want To Delete');\" href='post.php?delete=$bag_id'>Delete</a></td>";
                                        echo "</tr>";
                                        $no = $no +1;
                                    }
                                ?>
                                </tbody>
                            </table>
                        </form>
                    </div>

<?php 
    if (isset($_GET['delete'])) {
        $delete_bag_id = mysqli_real_escape_string($con,$_GET['delete']);
        $query = "DELETE FROM bags WHERE bag_id=$delete_bag_id";
        $result = mysqli_query($con,$query);
        if (!$result) {
            die("Query Failed." . mysqli_error($result));
        }
        header('Location: post.php');
    }
?>