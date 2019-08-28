<?php include_once 'include_admin/header.php' ?>
	<?php include_once 'include_admin/nav.php' ?>
		
	<?php include_once 'include_admin/side_bar.php' ?>

        <div class="row">
        <ol class="breadcrumb">
            <li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Orders</li>
        </ol>
    </div><!--/.row-->

        <div class="col-xs-12">
            <table class="table table-bordered table-responsive table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Customer Email</th>
                        <th>Bag Image</th>
                        <th>Bag Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total Amount</th>
                        <th>Order Date</th> 
                        <th>Delete</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php 
                    
                    $no = 1;
                    $or_query = "SELECT * FROM orders";
                    $or_res = mysqli_query($con,$or_query);
                    if (!$or_res) {
                        die("Query Failed." . mysqli_error($or_res));
                    }

                    while ($row=mysqli_fetch_assoc($or_res)) {
                        $bag_image = $row['bag_image'];
                        $bag_name = $row['bag_name'];
                        $price = $row['price'];
                        $qty = $row['qty'];
                        $amount = $row['amount'];
                        $order_date = $row['order_date'];
                        $deli_id=$row['delivery_id'];

                        $cust_query = "SELECT * FROM deli_info WHERE deli_id='$deli_id'";
                        $cust_res=mysqli_query($con,$cust_query);
                        while ($cus_row=mysqli_fetch_assoc($cust_res)) {
                            $deli_email=$cus_row['deli_email'];
                        }

                        $cusSql="SELECT * FROM users WHERE user_email='$deli_email'";
                        $cusRes=mysqli_query($con,$cusSql);
                        while ($cusrow=mysqli_fetch_assoc($cusRes)) {
                            $cust_email=$cusrow['user_email'];
                        }

                        echo "<tr>";
                        echo "<td>$no</td>";
                        $no = $no +1;
                        echo "<td>{$cust_email}</td>";
                        echo "<td><img class='img-responsive' width='100px' src='../images/{$bag_image}' alt=''></td>";
                        echo "<td>$bag_name</td>";
                        echo "<td>$qty</td>";
                        echo "<td>$price</td>";
                        echo "<td>$amount</td>";
                        echo "<td>$order_date</td>";
                        echo "<td><a onclick=\"javascript: return confirm('Are You Sure You Want To Delete');\" href='delivery.php?delete=$deli_id'>Delete</a></td>";
                        echo "</tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>
       			
		
<?php include_once 'include_admin/footer.php' ?>