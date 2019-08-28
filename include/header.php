<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php ob_start(); ?>
<?php session_start(); ?>
<?php //session_destroy(); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Golden Dragon</title>
  <!--/tags -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
  Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
      function hideURLbar(){ window.scrollTo(0,1); } </script>
  <!--//tags -->
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
  <link rel="stylesheet" href="css/style.css">
  <link href="css/font-awesome.css" rel="stylesheet"> 
  <link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
  <!-- //for bootstrap working -->
  <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
  <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
</head>
<style>
  #PPMiniCart form ul li{
    padding-right: 50px!important;
  }
</style>
<body>
  <!-- header -->
    <div class="header" id="home">
      <div class="container">
        <ul>
          <li><i class="fa fa-phone" aria-hidden="true"></i> Call : +959 967159875</li>
          <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@example.com">goldendragon@gmail.com</a></li>
            
            <?php 

              if (isset($_SESSION['username'])) {
                  $username=$_SESSION['username'];
                  echo "<li> <a href='cart1.php'><i class='fa fa-female'></i>{$username}</a></li>";
                  echo "<li> <a href='include/logout.php'><i class='fa fa-pencil-square-o'></i> Log Out </a></li>";
              }else{
                echo "<li> <a href='signin.php'><i class='fa fa-unlock-alt' ></i> Log in </a></li>";
                echo "<li> <a href='register.php'><i class='fa fa-pencil-square-o'></i> Register </a></li>";
              }

            ?>
          
        </ul>
      </div>
    </div>
  <!-- //header -->
  <!-- header-bot -->
<div class="header-bot">
  <div class="header-bot_inner_wthreeinfo_header_mid">
    
    <!-- header-bot -->
      <div class="col-md-8 logo_agile">
        <h1><a href="index.php"><img src="images/logo.png" width="150px" height="112px">Golden Dragon</a></h1>
      </div>

      <div class="col-md-3 col-md-offset-1 header-middle">
      <form action="search.php" method="get">
        <input type="search" name="search" placeholder="Search here..." required>
        <input type="submit" value=" ">
        <div class="clearfix"></div>
      </form>
    </div>
        <!-- header-bot -->
    <div class="clearfix"></div>
  </div>

  
</div>
<!-- //header-bot -->