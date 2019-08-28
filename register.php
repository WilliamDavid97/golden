<?php require_once "include/db.php"; ?>
<?php require_once "include/header.php"; ?>
<?php require_once "include/navbar.php"; ?>

<?php
    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        $email = $_POST['email'];
        $ph_no = $_POST['ph_no'];
        $user_address = $_POST['user_address'];

        $username = mysqli_real_escape_string($con,$username);
        $password = mysqli_real_escape_string($con,$password);
        $c_password = mysqli_real_escape_string($con,$c_password);
        $email = mysqli_real_escape_string($con,$email);
        $ph_no = mysqli_real_escape_string($con,$ph_no);
        $user_address = mysqli_real_escape_string($con,$user_address);

        $query = "SELECT * FROM users WHERE user_email = '$email'";
        $eresult = mysqli_query($con,$query);
        $erow=mysqli_fetch_assoc($eresult);
        if (count($erow)==0) {
            if($password==$c_password){
                $password=password_hash($password,PASSWORD_BCRYPT,array('cost'=>10));
                $query = "INSERT INTO users(username, user_password, user_email, user_role, ph_no, user_address) VALUES ('$username','$password','$email','customer', '$ph_no', '$user_address')";
                $result = mysqli_query($con,$query);
                echo "Register Successful";
                if(!$result){
                    die("Query failed".mysqli_error($con));
                }else{
                    header("Location:signin.php");
                }         
            }else{
                echo "Password and Comfirm Password Not Match";
            }
        }else{
            echo "<center><i><h1>Exist Email!!!!</h1></i></center>";
        }       

    }  

?>
<!-- banner -->
<?php require_once "include/navbar.php"; ?>

<div class="signin">
    <div class="container">
        <div class="signin-main">
            <h1>Register</h1>
            <h2>Informations</h2>
            <form method="post">
                <input type="text" name="username" id="username" placeholder="Username">
                <input type="text" name="email" id="email" class="no-margin" placeholder="E-mail" required="">
                <input type="password" name="password" id="password" placeholder="Password" required="" >
                <input type="password" name="c_password" id="c_password" class="no-margin" placeholder="Confirm Password" required="">
                <input type="text" name="ph_no" id="phno" placeholder="Phone Number">
                <input type="text" name="user_address" id="address" class="no-margin" placeholder="Address" required="">
                <input type="checkbox" name="" required="">  I agree all statements in Terms of service
                <input type="submit" name="submit" value="Register">
            </form>
        </div>
    </div>
</div>
<?php require_once "include/footer.php"; ?>