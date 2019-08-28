        <div class="col-lg-12">
            <h1 class="page-header">
                All Customers
            </h1>
        </div>
                    <div class="col-xs-12">
                        <table class="table table-bordered table-responsive table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Ph No</th>
                                    <th>Address</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $no = 1;
                                $query = "SELECT * FROM users ORDER BY user_id DESC";
                                $result = mysqli_query($con,$query);
                                while ($row=mysqli_fetch_assoc($result)) {
                                    $user_id = $row['user_id'];
                                    $username = $row['username'];
                                    $user_password = $row['user_password'];
                                    $user_email = $row['user_email'];
                                    $user_role = $row['user_role'];
                                    $ph_no = $row['ph_no'];
                                    $user_address = $row['user_address'];
                                    echo "<tr>";
                                    echo "<td>$no</td>";
                                    $no = $no +1;
                                    echo "<td>$username</td>";
                                    echo "<td>$user_email</td>";
                                    echo "<td>$user_role</td>";
                                    echo "<td>$ph_no</td>";
                                    echo "<td>$user_address</td>";
                                    echo "<td><a href='users.php?admin=$user_id'>Admin</a></td>";
                                    echo "<td><a href='users.php?customer=$user_id'>Customer</a></td>";
                                    echo "<td><a onclick=\"javascript: return confirm('Are You Sure You Want To Delete');\" href='users.php?delete=$user_id'>Delete</a></td>";
                                    echo "</tr>";
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>