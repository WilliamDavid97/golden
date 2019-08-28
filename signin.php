<?php require_once "include/db.php"; ?>
<?php require_once "include/header.php"; ?>
<?php require_once "include/navbar.php"; ?>

<!-- banner -->

 <div class="login">
    <div class="container">
        <div class="login-main">
              <h1>Login</h1>
          <div class="col-md-6 login-left">
            <!-- <h2>Existing User</h2> -->
            <form action="include/login.php" method="post">
                <input type="text" name="email" placeholder="Email"  required>
                <input type="password" name="password" placeholder="Password" required><!-- 
                <input type="checkbox" value="" name=""> Remember me -->
                  <br>
                <input type="submit" name="login" value="Login">                
            </form>

            <a href="register.php" class="signup-image-link">Create an account</a>
             
          </div>

          <div class="col-md-6 login-right">
             <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
          </div>
          <div class="clearfix"> </div>
        </div>
    </div>
</div>

<?php require_once "include/footer.php"; ?>