<?php
session_start();
require "./database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multivendor Ecommerce</title>
    <link rel="stylesheet" href="views/public/assets/css/style.css">
    <!-- <link rel="stylesheet" href="views/public/assets/bootstrap/css/bootstrap.min.css">
    <script src="views/public/assets/bootstrap/js/bootstrap.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"  rel="stylesheet">
    <link href="/views/users/vendors/assets/css/icons.css" rel="stylesheet">

    	<!-- jqury/toastr -->
	<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
 <!-- sweet alert -->
 <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
</head>
<body>
<!-- quickview start -->
<?php include "views/frontend/partials/quickview.php" ?>
<!-- quickview end -->

<!-- header navbar start -->
<?php include "views/frontend/partials/header.php" ?>
        <!-- header navbar end -->

        <!-- carousel start -->
        <?php include "views/frontend/home/home_carousel.php" ?>
          
        <!-- carousel end -->

<!-- top category start -->
        <?php include "views/frontend/home/home_topcategory.php" ?>
<!-- top category end -->

        <?php include "views/frontend/home/home_bestdealsproduct.php" ?>

        <div class="container my-4 position-relative ">
            <div>
            <img src="views/public/assets/images/banner2.png" width="100%" alt="">
            <div class="position-absolute top-50 left-50 mx-5 fs-1">
            <h2>Add Styles to <br> <strong> Your Feet</strong></h2></div></div>
        </div>

    <!-- product by category -->
       <?php include "views/frontend/home/home_productcategory.php" ?>
  <!-- product by category end -->
        <!-- footer start -->
        <?php include "views/frontend/partials/footer.php" ?>
        <!-- footer end -->

        <!-- main js -->
        <script src="views/public/assets/js/main.js"></script>
        <script src="views/public/assets/js/cart.js"></script>

  <!-- /// Start product view with Modal  -->
    
     
    </body>
</html>