<?php ob_start(); ?>
<?php require_once "include/db.php"; ?>
<?php require_once "include/header.php"; ?>
<?php require_once "include/navbar.php"; ?>
<?php //session_start(); ?>
<?php
     if (isset($_SESSION['username'])) {
        $db_username = $_SESSION['username'];

        $query = "SELECT * FROM users WHERE username='$db_username'";
        $result = mysqli_query($con,$query);
        if (!$result) {
            die("Query Failed." . mysqli_error($result));
        }
        while ($row=mysqli_fetch_assoc($result)) {
            $username = $row['username'];
            $user_email = $row['user_email'];
            $user_password = $row['user_password'];
            $ph_no = $row['ph_no'];
            $user_address = $row['user_address'];
        }
     } 
     ?>
<?php   
    if (isset($_POST['reset'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        $ph_no = $_POST['ph_no'];
        $user_address = $_POST['user_address'];


        if($password==$c_password){
            $password=password_hash($password,PASSWORD_BCRYPT,array('cost'=>10));

            $query = "UPDATE users SET username='$username',user_password='$password',user_email='$email',ph_no='$ph_no',user_address='$user_address' WHERE username='$db_username'";
            $result = mysqli_query($con,$query);
            if (!$result) {
                die("Query Failed." . mysqli_error($result));
            }else{
                header('Location:customer.php');
            }
         }else{
             echo "Password and Comfirm Password Not Match";
         }
    }
?>
<!-- banner -->
<?php require_once "include/navbar.php"; ?>

<div class="signin">
    <div class="container">
        <div class="signin-main">
<!--             <h1>Register</h1>
 -->            <h2>User Profile</h2>
            <form method="post">
                <input type="text" name="username" id="username" placeholder="Username" value="<?php echo $username?>">
                <input type="text" name="email" id="email" class="no-margin" placeholder="E-mail" required="" value="<?php echo $user_email;?>">
                
                 <input type="password" name="password" id="password" placeholder=" Password" required="" value="">
                 <input type="password" name="c_password" id="c_password" class="no-margin" placeholder="Confirm Password" required="" value="">
                <input type="text" name="ph_no" id="phno" placeholder="Phone Number" value="<?php echo $ph_no;?>">
                <input type="text" name="user_address" id="address"  placeholder="Address" required="" class="no-margin" value="<?php echo $user_address?>">
                <br>
                <input type="checkbox" name="" required="">  I agree all statements in Terms of service
                <input type="submit" name="reset" value="Reset" >
            </form>
        </div>
    </div>
</div>

<?php require_once "include/footer.php"; ?>