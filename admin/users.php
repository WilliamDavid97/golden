<?php include_once 'include_admin/header.php' ?>
	<?php include_once 'include_admin/nav.php' ?>
		
	<?php include_once 'include_admin/side_bar.php' ?>
    <div class="row">
            <ol class="breadcrumb">
                <li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Customers</li>
            </ol>
        </div><!--/.row-->
		
    <div class="row">
                    
<?php 
    if (isset($_GET['admin'])) {
        $user_id = mysqli_real_escape_string($con,$_GET['admin']);
        $query = "UPDATE users SET user_role='admin' WHERE user_id=$user_id";
        $result = mysqli_query($con,$query);
        // header('Location:users.php');
    }
?>

<?php 
    if (isset($_GET['customer'])) {
        $user_id = mysqli_real_escape_string($con,$_GET['customer']);
        $query = "UPDATE users SET user_role='customer' WHERE user_id=$user_id";
        $result = mysqli_query($con,$query);
        // header('Location:users.php');
    }
?>

<?php 
if (isset($_GET['delete'])) {
    $delete_id=$_GET['delete'];
        $query = "DELETE FROM users WHERE user_id=$delete_id";
        $result = mysqli_query($con,$query);
        if (!$result) {
            die("Query Failed." . mysqli_error($result));
        }
//                 header('Location: users.php');  
    }
 ?>
                <?php 
                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    }else{
                        $source = '';
                    }

                    switch ($source) { 
                        case 'edit_user':
                            include_once "include_admin/edit_user.php";                  
                            break; 

                        default;
                        include_once "include_admin/view_all_users.php";               
                    }
                ?>
    </div>							
		
<?php include_once 'include_admin/footer.php' ?>