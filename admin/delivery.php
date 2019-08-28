<?php include_once 'include_admin/header.php' ?>
	<?php include_once 'include_admin/nav.php' ?>
		
	<?php include_once 'include_admin/side_bar.php' ?>

	<div class="row">
        <ol class="breadcrumb">
            <li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Delivery</li>
        </ol>
    </div><!--/.row-->

    <div class="col-xs-12">
            <table class="table table-bordered table-responsive table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <!-- <th>Customer Id</th> -->
                        <th>Customer Email</th>
                        <th>Customer Phone</th>
                        <th>Address No.</th>
                        <th>Street</th> 
                        <th>City</th>
                        <th>Township</th>
                        <th>Payment Method</th>
                        <th>Amount</th> 
                        <th>Delete</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php                       
                    $no = 1;
                    $query = "SELECT * FROM deli_info";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $deli_id = $row['deli_id'];
                        $deli_email = $row['deli_email'];
                        $deli_ph = $row['deli_ph'];
                        $payment = $row['payment'];
                        $total_price = $row['total_price'];
                        $address_no = $row['address_no'];
                        $street = $row['street'];
                        $township = $row['township'];
                        $city = $row['city'];

                        echo "<tr>";
                        echo "<td>$no</td>";
                        $no = $no +1;
                        //echo "<td>$deli_id</td>";
                        echo "<td>$deli_email</td>";
                        echo "<td>$deli_ph</td>";
                        echo "<td>$address_no</td>";
                        echo "<td>$street</td>";
                        echo "<td>$city</td>";
                        echo "<td>$township</td>";
                        echo "<td>$payment</td>";
                        echo "<td>$total_price</td>";
                        echo "<td><a onclick=\"javascript: return confirm('Are You Sure You Want To Delete');\" href='delivery.php?delete=$deli_id'>Delete</a></td>";
                        echo "</tr>";
                    }
                    
                ?>
                </tbody>
            </table>
        </div>
       			
		
<?php include_once 'include_admin/footer.php' ?>

<?php 
    if (isset($_GET['delete'])) {
        $delete_deli_id = mysqli_real_escape_string($con,$_GET['delete']);
        $query = "DELETE FROM deli_info WHERE deli_id=$delete_deli_id";
        $result = mysqli_query($con,$query);
        if (!$result) {
            die("Query Failed." . mysqli_error($result));
        }
        header('Location: delivery.php');
    }
?>