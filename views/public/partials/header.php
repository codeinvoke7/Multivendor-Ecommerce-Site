<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multivendor Ecommerce</title>
    <link rel="stylesheet" href="/views/public/assets/css/pagesheader.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"  rel="stylesheet">
</head>
<body>
    <div class="container-fluid  d-none d-md-flex d-lg-flex justify-content-around" id="top-bar" style="background: #f1f1f2">
        <div class="d-flex mt-2">
            <span class="material-icons-outlined me-2"> call</span>
            <p class="me-2 fw-lighter">+234141283176 </p>
            <span class="material-icons-outlined me-2"> mail</span>
            <p class="me-2 fw-lighter"> admin@multivendor.com</p>
        </div>
        <div class="mt-2 d-flex">
            <p><a class="text-dark text-decoration-none me-2" href="/vendor/sign-up">Become a Seller</a></p>
            <span class="text-dark me-2"> | </span>
            <p><a  class="text-dark text-decoration-none" href="/login">Login</a></p>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-expand-md nav shadow text-white">
        <div class="container-lg">
            <span class="material-icons-outlined d-sm-block d-lg-none d-sm-none" id="mobile-menu-icon">menu</span>
            
        <div>
          <h1>  <a class="navbar-brand navbar-title" href="/">M-Vendor</a></h1>
        </div><div class="nav-item d-flex category ">
          <div class=""> 
           <span class="material-icons-outlined me-2 fs-3 mt-2 cat-menu nav-link text-white">menu</span>
      </div>
<div class=" category-list shadow d-none">
        <a href="#">Electronics</a>
        <a href="#">Electronics</a>
        <a href="#">Electronics</a>
        <a href="#">Electronics</a>
        <a href="#">Electronics</a>
        <a href="#">Electronics</a>
        <a href="#">Electronics</a>
        <a href="#">Electronics</a>
        <a href="#">Electronics</a>
        <a href="#">Electronics</a>
        <a href="#">Electronics</a>
        <a href="#">Electronics</a>
        <a href="#">Electronics</a>
    </div>

      </div>
          
        <div class="d-lg-none d-sm-flex text-white dropdown">
            <span class="material-icons-outlined"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                account_circle
                </span>
            <ul class="dropdown-menu drop-menu shadow" aria-labelledby="accountDropdown">
              <li><a class="dropdown-item" href="#">Login</a></li>
              <li><a class="dropdown-item" href="#">Register</a></li>
              <li><a class="dropdown-item" href="#">My Account</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Logout</a></li>
            </ul>
                
  </div>

  <div class="d-lg-none d-sm-block text-white me-4">
    <span class="material-icons-outlined">
        shopping_cart
        </span>
</div>

          <div class=" collapse navbar-collapse" id="navbarTogglerDemo02">
            <div class="d-sm-none d-md-flex disp mx-5 container-fluid justify-content-center">
            <form class="container-fluid w-100" role="search">
                <div class="input-group">
                    <span class="material-icons-outlined input-group-text" id="basic-addon1">
                        search
                        </span>
                  <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
                </div>
              </form>
            </div>
              <div class="d-sm-none d-md-flex disp container justify-content-end text-center">
                
                <div class="mx-3">
                    <span class="material-icons-outlined">
                        favorite_border
                        </span>
                    <p>Wishlist</p>
                </div>
                <div class=" mx-3">
                    <span class="material-icons-outlined">
                        shopping_cart
                        </span>
                        <p>Your Cart</p>
                </div>
                <div class="d-md-block d-sm-none dropdown">
                    <span class="material-icons-outlined d-lg-block ">
                        account_circle
                        </span>
                        <a style="font-size: 13px" class="nav-link text-decoration-none text-dark  text-white" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Account
                          </a>
            <ul class="dropdown-menu drop-menu shadow" aria-labelledby="accountDropdown">
              <li><a class="dropdown-item" href="#">Login</a></li>
              <li><a class="dropdown-item" href="#">Register</a></li>
              <li><a class="dropdown-item" href="#">My Account</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Logout</a></li>
            </ul>
                           
          </div>
        </div>
        </div>
      
      </div>
      </nav>

      <div class="d-md-none d-sm-block m-3 justify-content-center">
        <form class="w-100 " role="search">
            <div class="input-group">
                <span class="material-icons-outlined input-group-text" id="basic-addon1">
                    search
                    </span>
              <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
            </div>
          </form>
          
        </div>
      <!-- Category navbar start -->

      <div class="category-mobile" id="cat-mobile-menu">
        <span class="material-icons-outlined d-md-none d-sm-block" id="close-menu">close </span>
        <div class="cat-mobile-title"><h1><a href="/" class="text-decoration-none text-white">M-Vendor</a> </h1></div>
        <p class="ps-4 text-white mb-5 d-md-none d-block"><a href="/registration" class="text-white fs-6">Register</a> | 
        <a href="/login" class="text-white fs-6">Login</a></p>
        <div class="nav-item d-flex category">
<div class="w-100 category-list shadow">
        <a href="#">Electronics</a>
        <a href="#">Electronics</a>
        <a href="#">Electronics</a>
        <a href="#">Electronics</a>
        <a href="#">Electronics</a>
        <a href="#">Electronics</a>
        <a href="#">Electronics</a>
        <a href="#">Electronics</a>
        <a href="#">Electronics</a>
        <a href="#">Electronics</a>
        <a href="#">Electronics</a>
        <a href="#">Electronics</a>
        <a href="#">Electronics</a>

        <div class="m-3 d-md-none d-flex "> 
      <span class="material-icons-outlined text-white mt-1 me-1" style="font-size: 16px">
                    logout
                    </span>
      <p><a href="/logout"  class="text-white">Logout</a></p>
    </div>
    </div>

      </div>
      </div>
      <div class="" id="overlay"></div>
        <!-- Category navbar end -->

        