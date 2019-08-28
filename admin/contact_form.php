<?php include_once '../include/db.php'; ?>
<?php include_once 'include_admin/header.php' ?>
	<?php include_once 'include_admin/nav.php' ?>		
		<?php include_once 'include_admin/side_bar.php' ?>	

		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Feedback</li>
			</ol>
		</div><!--/.row-->		

			<div class="col-xs-12">
			    <table class="table table-bordered table-responsive table-hover">
			    	<thead>
			    		<tr>
				    		<th>No.</th>
				    		<th>Name</th>
				    		<th>Email</th>
				    		<th>Phone</th>
				    		<th>Message</th>
                            <th>Delete</th>
				    	</tr>
			    	</thead>
			    	<tbody>
			    		<?php 
			    			$no = 1;
			    			$query = "SELECT * FROM feedback ORDER BY id DESC";
			    			$res = mysqli_query($con,$query);
			    			while($row=mysqli_fetch_assoc($res)) {
			    				$id = $row['id'];
			    				$name = $row['name'];
			    				$email = $row['email'];
			    				$phone = $row['phone'];
			    				$message = $row['message'];

			    				echo "<tr>";
			    				echo "<td>$no</td>";
                                echo "<td>$name</td>";
                                echo "<td>$email</td>";
                                echo "<td>$phone</td>";
                                echo "<td>$message</td>";
                                echo "<td><a onclick=\"javascript: return confirm('Are You Sure You Want To Delete');\" href='contact_form.php?delete=$id'>Delete</a></td>";
                                echo "</tr>";
			    				$no = $no + 1;
			    			}
			    		?>
			    	</tbody>
			    </table>
			</div>

<?php include_once 'include_admin/footer.php' ?>

<?php 
    if (isset($_GET['delete'])) {
        $delete_contact_id = mysqli_real_escape_string($con,$_GET['delete']);
        $query = "DELETE FROM feedback WHERE id=$delete_contact_id";
        $result = mysqli_query($con,$query);
        if (!$result) {
            die("Query Failed." . mysqli_error($result));
        }
        header('Location: contact_form.php');
    }
?>