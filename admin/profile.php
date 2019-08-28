<?php include_once 'include_admin/header.php' ?>
	<?php include_once 'include_admin/nav.php' ?>
		
	<?php include_once 'include_admin/side_bar.php' ?>

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Profile</li>
        </ol>
    </div><!--/.row-->
		
        <?php 
            if (isset($_SESSION['user_email'])) {
                $email = $_SESSION['user_email'];
                $query = "SELECT * FROM users WHERE user_email='$email'";
                $result = mysqli_query($con,$query);
                if (!$result) {
                    die("Query Failed." . mysqli_error($result));
                }
                while ($row=mysqli_fetch_assoc($result)) {
                    
                    $username = $row['username'];
                    $user_email = $row['user_email'];
                    $user_password = $row['user_password'];
                    $user_role = $row['user_role'];
                    $ph_no = $row['ph_no'];
                    $user_address = $row['user_address'];
                }
            }
        ?>

        <?php 
            if (isset($_POST['edit_user'])) {
                
                $username = $_POST['username'];
                $user_email = $_POST['user_email'];
                $user_password = $_POST['user_password'];
                $user_role = $_POST['user_role'];
                $ph_no = $_POST['ph_no'];
                $user_address = $_POST['user_address'];
                $user_password = password_hash($user_password,PASSWORD_BCRYPT,array('cost'=>10));

                $query = "UPDATE users SET username='$username',user_password='$user_password',user_email='$user_email',user_role='$user_role',ph_no='$ph_no',user_address='$user_address' WHERE user_email='$email'";
                $result = mysqli_query($con,$query);
                if (!$result) {
                    die("Query Failed." . mysqli_error($result));
                }
                
                $_SESSION['username'] = null;
                $_SESSION['user_password'] = null;
                $_SESSION['user_role'] = null;
                header('Location: ../index.php');
            }
        ?>

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        My Profile
                    </h1>
                </div>
                <div class="col-lg-12">
                    <form action="" method="post" enctype="multipart/form-data">                         
                        <div class="form-group">
                            <label for="" class="control-label">User Role</label>
                            <select name="user_role" id="" class="form-control">
                                <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
                                <?php 
                                    if ($user_role == 'admin') {
                                        echo '<option value="customer">Customer</option>';                  
                                    }else{
                                        echo '<option value="admin">Admin</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">User Name</label>
                            <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">User Email</label>
                            <input type="text" class="form-control" name="user_email" value="<?php echo $user_email; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Password</label>
                            <input type="password" class="form-control" name="user_password" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Phone Number</label>
                            <input type="phone" class="form-control" name="ph_no" value="<?php echo $ph_no; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Address</label>
                            <input type="text" class="form-control" name="user_address" value="<?php echo $user_address; ?>" required>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="edit_user" value="Update Profile" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>								
		
<?php include_once 'include_admin/footer.php' ?>