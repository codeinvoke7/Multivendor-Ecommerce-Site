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
</head>
<body>
<div class="container-fluid  d-none d-md-flex d-lg-flex justify-content-around" id="top-bar" style="background: #f1f1f2">
        <div class="d-flex mt-2">
        <i class="bx bx-headphone me-1"></i>
            <p class="me-2 fw-lighter">+234141283176 </p>
            <i class="bx bx-envelope me-1"></i>
            <p class="me-2 fw-lighter"> admin@multivendor.com</p>
        </div>
        <div class="mt-2 d-flex">
            <p><a class="text-dark text-decoration-none me-2" href="/vendor/sign-up">Become a Seller</a></p>
            <span class="text-dark me-2"> | </span>
            <p><a  class="text-dark text-decoration-none" href="/login">Login</a></p>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-expand-md nav text-white">
        <div class="container-lg">
        <i class="bx bx-menu fs-2 d-sm-block d-lg-none d-sm-none" id="mobile-menu-icon"></i>
            <!-- <span class="material-icons-outlined d-sm-block d-lg-none d-sm-none" id="mobile-menu-icon">menu</span> -->
         <h1> <a class="navbar-brand navbar-title text-white" href="/">M-Vendor</a></h1>
          
        <div class="d-md-none d-flex text-white nav-item dropdown">
        <i class="bx bx-user  fs-2" role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
            <!-- <span class="material-icons-outlined"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                account_circle
                </span> -->
            <ul class="dropdown-menu drop-menu shadow me-5" aria-labelledby="accountDropdown">
              <li><a class="dropdown-item" href="#">Login</a></li>
              <li><a class="dropdown-item" href="#">Register</a></li>
              <li><a class="dropdown-item" href="#">My Account</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Logout</a></li>
            </ul>
          </li>
                
                    
  </div>

  <div class="d-md-none d-block text-white me-4">
  <i class="bx bx-cart fs-2"></i>
</div>

          <div class=" collapse navbar-collapse" id="navbarTogglerDemo02">
            <div class="d-sm-none d-md-flex disp w-100 justify-content-center">
            <form class=" w-100" role="search">
                <div class="input-group">
                    <span class="material-icons-outlined input-group-text" id="basic-addon1">
                        search
                        </span>
                  <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
                </div>
              </form>
            </div>
              <div class="d-sm-none d-md-flex disp container justify-content-end text-center">
                
                <div class="mx-3 mt-2">
                <i class="bx bx-heart  fs-3"></i>
                    <p>Wishlist</p>
                </div>
                <div class="mx-3 mt-2">
                <i class="bx bx-cart  fs-3"></i>
                        <p>Your Cart</p>
                </div>
                <div class="d-md-block d-sm-none dropdown mt-1">
                <i class="bx bx-user  fs-3 d-lg-block"></i>
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
      <i class="bx bx-chevron-left fs-1 text-white d-md-none d-sm-block" id="close-menu"></i>
        <!-- <span class="material-icons-outlined d-md-none d-sm-block" id="close-menu">close </span> -->
        <div class="cat-mobile-title">
          <h1><a href="/" class="text-decoration-none text-white">M-Vendor</a></h1>
        </div>
        <div></div>
        <p class="ps-4 text-white d-md-none"><a href="/register" class="text-white fs-6">Register</a> | 
        <a href="/login" class="text-white fs-6">Login</a></p>
       
      <div class="category-list shadow">
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
    <div class="m-3 d-md-none d-flex "> 
    <i class="bx bx-chevron-left-circle mb-2 mx-2 text-white"></i>
      <p> <a href="/logout"  class="text-white mt-2 pt-3">Logout</a></p>
    </div>
    </div>
</div>
      <div class="" id="overlay"></div>
        <!-- Category navbar end -->

        <!-- carousel start -->
        <div id="carouselExampleFade" class="carousel slide carousel-fade carouse" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="views/public/assets/images/carousel1.webp" class="d-block w-100 rounded" alt="...">
              </div>
              <div class="carousel-item">
                <img src="views/public/assets/images/carousel2.webp" class="d-block w-100 rounded" alt="...">
              </div>
              <div class="carousel-item">
                <img src="views/public/assets/images/carousel4.avif" class="d-block w-100 rounded" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          
        <!-- carousel end -->

        <div>
            <h3 class="text-center fs-6 fw-bold mt-5">TOP CATEGORIES OF THE MONTH</h3>

            <div class="container-fluid mt-3 mb-3">
                <div class="top-cat d-flex overflow-x-scroll ">
                    <div class="column me-4">
                        <div class="card p-3 mb-2">
                           
                            <div class="text-center">
                                <img src="views/public/assets/images/icons/cat-icon.png" width="50px" class="m-auto mb-1" alt="">
                                <h5 class="heading text-center">Electronics</h5>
                            </div>
                        </div>
                    </div>
                    <div class="column me-4">
                        <div class="card p-3 mb-2">
                          
                            <div class="text-center">
                                <img src="views/public/assets/images/icons/cat-icon.png" width="50px" class="m-auto mb-1" alt="">
                                <h5 class="heading text-center">Fashion</h5>
                             
                            </div>
                        </div>
                    </div>
                    <div class="column me-4">
                        <div class="card p-3 mb-2">
                            <div class="text-center">
                                <img src="views/public/assets/images/icons/cat-icon.png" width="50px" class="m-auto mb-1" alt="">
                                <h5 class="text-center">Automobile</h5>
                               
                            </div>
                        </div>
                    </div>
                    <div class="column me-4">
                        <div class="card p-3 mb-2">
                            <div class="text-center">
                                <img src="views/public/assets/images/icons/cat-icon.png" width="50px" class="m-auto mb-1" alt="">
                                <h5 class="text-center">Automobile</h5>
                               
                            </div>
                        </div>
                    </div>
                    <div class="column me-4">
                        <div class="card p-3 mb-2">
                            <div class="text-center">
                                <img src="views/public/assets/images/icons/cat-icon.png" width="50px" class="m-auto mb-1" alt="">
                                <h5 class="text-center">Automobile</h5>
                               
                            </div>
                        </div>
                    </div>
                    <div class="column me-4">
                        <div class="card p-3 mb-2">
                            <div class="text-center">
                                <img src="views/public/assets/images/icons/cat-icon.png" width="50px" class="m-auto mb-1" alt="">
                                <h5 class="text-center">Automobile</h5>
                               
                            </div>
                        </div>
                    </div>

                    <div class="column me-4">
                        <div class="card p-3 mb-2">
                            <div class="text-center">
                                <img src="views/public/assets/images/icons/cat-icon.png" width="50px" class="m-auto mb-1" alt="">
                                <h5 class="text-center">Automobile</h5>
                               
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container-fluid container-lg">
            <h3 class="text-center fs-5 fw-bold mt-4">BEST DEALS OF THE WEEK</h3>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                    <img src="views/public/assets/images/side-banner1.png" width="100%" height="100%" alt="">
                </div>
                <div class="col-md-8 col-sm-12">
                <div class="row row-cols-lg-4 row-cols-md-3 row-cols-2">
                    <div class="col mt-4 ">
                        <div class="card crd">
                          <img src="views/public/assets/images/product1.png" class="card-img-to h-100" alt="...">
                          <div class="cart-hover position-absolute top-0 end-0 mt-3 me-2">
                          <i class="bx bx-cart rounded-circle fs-4"></i>
                             <br>
                             <i class="bx bx-heart rounded-circle fs-4"></i>
                          </div>
                          <div class="quickview text-center  bg-primary position-absolute bottom-0 w-100">
                              <a href="#" class="m-2 text-decoration-none text-white">Quick view</a>
                          </div>
                      
                      <div class="card-body text-center">
                        <span class="fw-bold text-center">Chair</span><br>
                        <i class="bx bx-star-filled"></i>
                        <i class="bx bx-star-filled"></i>
                        <i class="bx bx-star"></i>
                        <i style="font-size: 12px;"> (2 reviews)</i>
                          <s class="card-text">₦400,000</s>
                        <span class="card-text fw-bold">₦200,000</span>
                      </div></div>
                      </div>
                      <div class="col mt-4 position-relative">
                        <div class="card crd">
                          <img src="views/public/assets/images/product1.png" class="card-img-to h-100" alt="...">
                          <div class="cart-hover position-absolute top-0 end-0 mt-3 me-2">
                              <p class="material-icons-outlined rounded-circle border fs-5 fw-lighter">
                                  shopping_cart
                              </p><br>
                                  <p class="material-icons-outlined rounded-circle border fs-5 fw-lighter">
                                      favorite_border
                                      </p>
                          </div>
                          <div class="quickview text-center  bg-primary position-absolute bottom-0 w-100">
                              <a href="#" class="m-2 text-decoration-none text-white">Quick view</a>
                          </div>
                      
                      <div class="card-body text-center">
                        <span class="fw-bold text-center">Chair</span><br>
                        <span class="material-icons-outlined text-primary" style="font-size: 12px; margin-top: -20px;">
                          star star star star_border
                          </span><i style="font-size: 12px;"> (2 reviews)</i>
                          <s class="card-text">₦400,000</s>
                        <span class="card-text fw-bold">₦200,000</span>
                      </div></div>
                      </div>
                      <div class="col mt-4 position-relative">
                        <div class="card crd">
                          <img src="views/public/assets/images/product1.png" class="card-img-to h-100" alt="...">
                          <div class="cart-hover position-absolute top-0 end-0 mt-3 me-2">
                              <p class="material-icons-outlined rounded-circle border fs-5 fw-lighter">
                                  shopping_cart
                              </p><br>
                                  <p class="material-icons-outlined rounded-circle border fs-5 fw-lighter">
                                      favorite_border
                                      </p>
                          </div>
                          <div class="quickview text-center  bg-primary position-absolute bottom-0 w-100">
                              <a href="#" class="m-2 text-decoration-none text-white">Quick view</a>
                          </div>
                      
                      <div class="card-body text-center">
                        <span class="fw-bold text-center">Chair</span><br>
                        <span class="material-icons-outlined text-primary" style="font-size: 12px; margin-top: -20px;">
                          star star star star_border
                          </span><i style="font-size: 12px;"> (2 reviews)</i>
                          <s class="card-text">₦400,000</s>
                        <span class="card-text fw-bold">₦200,000</span>
                      </div></div>
                      </div>
                    <div class="col mt-4 position-relative">
                      <div class="card crd">
                        <img src="views/public/assets/images/product2.webp" class="card-img-to h-100" alt="...">
                        <div class="cart-hover position-absolute top-0 end-0 mt-3 me-2">
                            <a href="#" class="material-icons-outlined rounded-circle border fs-5 fw-lighter text-decoration-none">
                                shopping_cart
                            </a><br>
                                <a href="#" class="material-icons-outlined rounded-circle border fs-5 fw-lighter text-decoration-none">
                                    favorite_border
                                </a>
                        </div>
                        <div class="quickview text-center  bg-primary position-absolute bottom-0 w-100">
                            <a href="#" class="m-2 text-decoration-none text-white">Quick view</a>
                        </div>
                    
                    <div class="card-body text-center">
                      <span class="fw-bold text-center">Chair</span><br>
                      <span class="material-icons-outlined text-primary" style="font-size: 12px; margin-top: -20px;">
                        star star star star_border
                        </span><i style="font-size: 12px;"> (2 reviews)</i>
                        <s class="card-text">₦400,000</s>
                      <span class="card-text fw-bold">₦200,000</span>
                    </div></div>
                    </div>

                    <div class="col mt-4 position-relative">
                        <div class="card crd">
                          <img src="views/public/assets/images/product2.webp" class="card-img-to h-100" alt="...">
                          <div class="cart-hover position-absolute top-0 end-0 mt-3 me-2">
                              <p class="material-icons-outlined rounded-circle border fs-5 fw-lighter">
                                  shopping_cart
                              </p><br>
                                  <p class="material-icons-outlined rounded-circle border fs-5 fw-lighter">
                                      favorite_border
                                      </p>
                          </div>
                          <div class="quickview text-center  bg-primary position-absolute bottom-0 w-100">
                              <a href="#" class="m-2 text-decoration-none text-white">Quick view</a>
                          </div>
                      
                      <div class="card-body text-center">
                        <span class="fw-bold text-center">Chair</span><br>
                        <span class="material-icons-outlined text-primary" style="font-size: 12px; margin-top: -20px;">
                          star star star star_border
                          </span><i style="font-size: 12px;"> (2 reviews)</i>
                          <s class="card-text">₦400,000</s>
                        <span class="card-text fw-bold">₦200,000</span>
                      </div></div>
                      </div>
                      <div class="col mt-4 position-relative">
                        <div class="card crd">
                          <img src="views/public/assets/images/product1.png" class="card-img-to h-100" alt="...">
                          <div class="cart-hover position-absolute top-0 end-0 mt-3 me-2">
                              <p class="material-icons-outlined rounded-circle border fs-5 fw-lighter">
                                  shopping_cart
                              </p><br>
                                  <p class="material-icons-outlined rounded-circle border fs-5 fw-lighter">
                                      favorite_border
                                      </p>
                          </div>
                          <div class="quickview text-center  bg-primary position-absolute bottom-0 w-100">
                              <a href="#" class="m-2 text-decoration-none text-white">Quick view</a>
                          </div>
                      
                      <div class="card-body text-center">
                        <span class="fw-bold text-center">Chair</span><br>
                        <span class="material-icons-outlined text-primary" style="font-size: 12px; margin-top: -20px;">
                          star star star star_border
                          </span><i style="font-size: 12px;"> (2 reviews)</i>
                          <s class="card-text">₦400,000</s>
                        <span class="card-text fw-bold">₦200,000</span>
                      </div></div>
                      </div>
                      <div class="col mt-4 position-relative">
                        <div class="card crd">
                          <img src="views/public/assets/images/product1.png" class="card-img-to h-100" alt="...">
                          <div class="cart-hover position-absolute top-0 end-0 mt-3 me-2">
                              <p class="material-icons-outlined rounded-circle border fs-5 fw-lighter">
                                  shopping_cart
                              </p><br>
                                  <p class="material-icons-outlined rounded-circle border fs-5 fw-lighter">
                                      favorite_border
                                      </p>
                          </div>
                          <div class="quickview text-center  bg-primary position-absolute bottom-0 w-100">
                              <a href="#" class="m-2 text-decoration-none text-white">Quick view</a>
                          </div>
                      
                      <div class="card-body text-center">
                        <span class="fw-bold text-center">Chair</span><br>
                        <span class="material-icons-outlined text-primary" style="font-size: 12px; margin-top: -20px;">
                          star star star star_border
                          </span><i style="font-size: 12px;"> (2 reviews)</i>
                          <s class="card-text">₦400,000</s>
                        <span class="card-text fw-bold">₦200,000</span>
                      </div></div>
                      </div>
                      <div class="col mt-4 position-relative">
                        <div class="card crd">
                          <img src="views/public/assets/images/product2.webp" class="card-img-to h-100" alt="...">
                          <div class="cart-hover position-absolute top-0 end-0 mt-3 me-2">
                              <p class="material-icons-outlined rounded-circle border fs-5 fw-lighter">
                                  shopping_cart
                              </p><br>
                                  <p class="material-icons-outlined rounded-circle border fs-5 fw-lighter">
                                      favorite_border
                                      </p>
                          </div>
                          <div class="quickview text-center  bg-primary position-absolute bottom-0 w-100">
                              <a href="#" class="m-2 text-decoration-none text-white">Quick view</a>
                          </div>
                      
                      <div class="card-body text-center">
                        <span class="fw-bold text-center">Chair</span><br>
                        <span class="material-icons-outlined text-primary" style="font-size: 12px; margin-top: -20px;">
                          star star star star_border
                          </span><i style="font-size: 12px;"> (2 reviews)</i>
                          <s class="card-text">₦400,000</s>
                        <span class="card-text fw-bold">₦200,000</span>
                      </div></div>
                      </div>
                  </div>

                </div>
            </div>
        </div>

        <div class="container my-4 position-relative ">
            <div>
            <img src="views/public/assets/images/banner2.png" width="100%" alt="">
            <div class="position-absolute top-50 left-50 mx-5 fs-1">
            <h2>Add Styles to <br> <strong> Your Feet</strong></h2></div></div>
        </div>


        <!-- electronics cat -->
        <div class="container-fluid container-lg">
            <div class="d-flex justify-content-between">
            <h3 class="fs-5 fw-bold mt-4">ELECTRONICS</h3>
            <a class="icon-link text-decoration-none text-secondary" href="#">
                See more
                <span class="material-icons-outlined text-primary text-secondary">arrow_right_alt</span>
              </a>
</div>
            <div class="row">
                
                <div class="col-md-8 col-sm-12">
                <div class="row row-cols-lg-4 row-cols-md-3 row-cols-2">
                    <div class="col mt-4 position-relative">
                        <div class="card crd">
                          <img src="views/public/assets/images/product1.png" class="card-img-to h-100" alt="...">
                          <div class="cart-hover position-absolute top-0 end-0 mt-3 me-2">
                              <p class="material-icons-outlined rounded-circle border fs-5 fw-lighter">
                                  shopping_cart
                              </p><br>
                                  <p class="material-icons-outlined rounded-circle border fs-5 fw-lighter">
                                      favorite_border
                                      </p>
                          </div>
                          <div class="quickview text-center  bg-primary position-absolute bottom-0 w-100">
                              <a href="#" class="m-2 text-decoration-none text-white">Quick view</a>
                          </div>
                      
                      <div class="card-body text-center">
                        <span class="fw-bold text-center">Chair</span><br>
                        <span class="material-icons-outlined text-primary" style="font-size: 12px; margin-top: -20px;">
                          star star star star_border
                          </span><i style="font-size: 12px;"> (2 reviews)</i>
                          <s class="card-text">₦400,000</s>
                        <span class="card-text fw-bold">₦200,000</span>
                      </div></div>
                      </div>
                      <div class="col mt-4 position-relative">
                        <div class="card crd">
                          <img src="views/public/assets/images/product1.png" class="card-img-to h-100" alt="...">
                          <div class="cart-hover position-absolute top-0 end-0 mt-3 me-2">
                              <p class="material-icons-outlined rounded-circle border fs-5 fw-lighter">
                                  shopping_cart
                              </p><br>
                                  <p class="material-icons-outlined rounded-circle border fs-5 fw-lighter">
                                      favorite_border
                                      </p>
                          </div>
                          <div class="quickview text-center  bg-primary position-absolute bottom-0 w-100">
                              <a href="#" class="m-2 text-decoration-none text-white">Quick view</a>
                          </div>
                      
                      <div class="card-body text-center">
                        <span class="fw-bold text-center">Chair</span><br>
                        <span class="material-icons-outlined text-primary" style="font-size: 12px; margin-top: -20px;">
                          star star star star_border
                          </span><i style="font-size: 12px;"> (2 reviews)</i>
                          <s class="card-text">₦400,000</s>
                        <span class="card-text fw-bold">₦200,000</span>
                      </div></div>
                      </div>
                      <div class="col mt-4 position-relative">
                        <div class="card crd">
                          <img src="views/public/assets/images/product1.png" class="card-img-to h-100" alt="...">
                          <div class="cart-hover position-absolute top-0 end-0 mt-3 me-2">
                              <p class="material-icons-outlined rounded-circle border fs-5 fw-lighter">
                                  shopping_cart
                              </p><br>
                                  <p class="material-icons-outlined rounded-circle border fs-5 fw-lighter">
                                      favorite_border
                                      </p>
                          </div>
                          <div class="quickview text-center  bg-primary position-absolute bottom-0 w-100">
                              <a href="#" class="m-2 text-decoration-none text-white">Quick view</a>
                          </div>
                      
                      <div class="card-body text-center">
                        <span class="fw-bold text-center">Chair</span><br>
                        <span class="material-icons-outlined text-primary" style="font-size: 12px; margin-top: -20px;">
                          star star star star_border
                          </span><i style="font-size: 12px;"> (2 reviews)</i>
                          <s class="card-text">₦400,000</s>
                        <span class="card-text fw-bold">₦200,000</span>
                      </div></div>
                      </div>
                    <div class="col mt-4 position-relative">
                      <div class="card crd">
                        <img src="views/public/assets/images/product2.webp" class="card-img-to h-100" alt="...">
                        <div class="cart-hover position-absolute top-0 end-0 mt-3 me-2">
                            <a href="#" class="material-icons-outlined rounded-circle border fs-5 fw-lighter text-decoration-none">
                                shopping_cart
                            </a><br>
                                <a href="#" class="material-icons-outlined rounded-circle border fs-5 fw-lighter text-decoration-none">
                                    favorite_border
                                </a>
                        </div>
                        <div class="quickview text-center  bg-primary position-absolute bottom-0 w-100">
                            <a href="#" class="m-2 text-decoration-none text-white">Quick view</a>
                        </div>
                    
                    <div class="card-body text-center">
                      <span class="fw-bold text-center">Chair</span><br>
                      <span class="material-icons-outlined text-primary" style="font-size: 12px; margin-top: -20px;">
                        star star star star_border
                        </span><i style="font-size: 12px;"> (2 reviews)</i>
                        <s class="card-text">₦400,000</s>
                      <span class="card-text fw-bold">₦200,000</span>
                    </div></div>
                    </div>

                    <div class="col mt-4 position-relative">
                        <div class="card crd">
                          <img src="views/public/assets/images/product2.webp" class="card-img-to h-100" alt="...">
                          <div class="cart-hover position-absolute top-0 end-0 mt-3 me-2">
                              <p class="material-icons-outlined rounded-circle border fs-5 fw-lighter">
                                  shopping_cart
                              </p><br>
                                  <p class="material-icons-outlined rounded-circle border fs-5 fw-lighter">
                                      favorite_border
                                      </p>
                          </div>
                          <div class="quickview text-center  bg-primary position-absolute bottom-0 w-100">
                              <a href="#" class="m-2 text-decoration-none text-white">Quick view</a>
                          </div>
                      
                      <div class="card-body text-center">
                        <span class="fw-bold text-center">Chair</span><br>
                        <span class="material-icons-outlined text-primary" style="font-size: 12px; margin-top: -20px;">
                          star star star star_border
                          </span><i style="font-size: 12px;"> (2 reviews)</i>
                          <s class="card-text">₦400,000</s>
                        <span class="card-text fw-bold">₦200,000</span>
                      </div></div>
                      </div>
                      <div class="col mt-4 position-relative">
                        <div class="card crd">
                          <img src="views/public/assets/images/product1.png" class="card-img-to h-100" alt="...">
                          <div class="cart-hover position-absolute top-0 end-0 mt-3 me-2">
                              <p class="material-icons-outlined rounded-circle border fs-5 fw-lighter">
                                  shopping_cart
                              </p><br>
                                  <p class="material-icons-outlined rounded-circle border fs-5 fw-lighter">
                                      favorite_border
                                      </p>
                          </div>
                          <div class="quickview text-center  bg-primary position-absolute bottom-0 w-100">
                              <a href="#" class="m-2 text-decoration-none text-white">Quick view</a>
                          </div>
                      
                      <div class="card-body text-center">
                        <span class="fw-bold text-center">Chair</span><br>
                        <span class="material-icons-outlined text-primary" style="font-size: 12px; margin-top: -20px;">
                          star star star star_border
                          </span><i style="font-size: 12px;"> (2 reviews)</i>
                          <s class="card-text">₦400,000</s>
                        <span class="card-text fw-bold">₦200,000</span>
                      </div></div>
                      </div>
                      <div class="col mt-4 position-relative">
                        <div class="card crd">
                          <img src="views/public/assets/images/product1.png" class="card-img-to h-100" alt="...">
                          <div class="cart-hover position-absolute top-0 end-0 mt-3 me-2">
                              <p class="material-icons-outlined rounded-circle border fs-5 fw-lighter">
                                  shopping_cart
                              </p><br>
                                  <p class="material-icons-outlined rounded-circle border fs-5 fw-lighter">
                                      favorite_border
                                      </p>
                          </div>
                          <div class="quickview text-center  bg-primary position-absolute bottom-0 w-100">
                              <a href="#" class="m-2 text-decoration-none text-white">Quick view</a>
                          </div>
                      
                      <div class="card-body text-center">
                        <span class="fw-bold text-center">Chair</span><br>
                        <span class="material-icons-outlined text-primary" style="font-size: 12px; margin-top: -20px;">
                          star star star star_border
                          </span><i style="font-size: 12px;"> (2 reviews)</i>
                          <s class="card-text">₦400,000</s>
                        <span class="card-text fw-bold">₦200,000</span>
                      </div></div>
                      </div>
                      <div class="col mt-4 position-relative">
                        <div class="card crd">
                          <img src="views/public/assets/images/product2.webp" class="card-img-to h-100" alt="...">
                          <div class="cart-hover position-absolute top-0 end-0 mt-3 me-2">
                              <p class="material-icons-outlined rounded-circle border fs-5 fw-lighter">
                                  shopping_cart
                              </p><br>
                                  <p class="material-icons-outlined rounded-circle border fs-5 fw-lighter">
                                      favorite_border
                                      </p>
                          </div>
                          <div class="quickview text-center  bg-primary position-absolute bottom-0 w-100">
                              <a href="#" class="m-2 text-decoration-none text-white">Quick view</a>
                          </div>
                      
                      <div class="card-body text-center">
                        <span class="fw-bold text-center">Chair</span><br>
                        <span class="material-icons-outlined text-primary" style="font-size: 12px; margin-top: -20px;">
                          star star star star_border
                          </span><i style="font-size: 12px;"> (2 reviews)</i>
                          <s class="card-text">₦400,000</s>
                        <span class="card-text fw-bold">₦200,000</span>
                      </div></div>
                      </div>
                  </div>

                </div>
                <div class="col-lg-4 col-md-4  col-sm-12 text-center">
                    <img src="views/public/assets/images/side-banner1.png" width="100%" height="100%" alt="">
                </div>
            </div>
        </div>

        <!-- footer start -->
        <footer class="footer-02 bg-dark mt-5">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-10 col-lg-6">
						<div class="subscribe mb-5">
							<form action="#" class="subscribe-form mt-4">
                                <div class="input-group mb-3 d-flex ">
                                    <input type="text" class="form-control p-3" placeholder="Enter email address" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-primary text-white btn-outline-secondary" type="button" id="button-addon2">Subscribe</button>
                                  </div>
              </form>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-lg-5">
						<div class="row">
							<div class="col-md-12 col-lg-8 mb-md-0 mb-4">
								<h2 class="footer-heading"><a href="#" class="logo text-white fs-2">M-Vendor</a></h2>
								<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
								<a href="#">read more <span class="ion-ios-arrow-round-forward"></span></a>
							</div>
						</div>
					</div>
					<div class="col-md-8 col-lg-7">
						<div class="row">
							<div class="col-md-3 mb-md-0 mb-4 border-left">
								<h2 class="footer-heading">Discover</h2>
								<ul class="list-unstyled">
		              <li><a href="#" class="py-1 d-block">Buy &amp; Sell</a></li>
		              <li><a href="#" class="py-1 d-block">Merchant</a></li>
		              <li><a href="#" class="py-1 d-block">Giving back</a></li>
		              <li><a href="#" class="py-1 d-block">Help &amp; Support</a></li>
		            </ul>
							</div>
							<div class="col-md-3 mb-md-0 mb-4 border-left">
								<h2 class="footer-heading">About</h2>
								<ul class="list-unstyled">
		              <li><a href="#" class="py-1 d-block">Staff</a></li>
		              <li><a href="#" class="py-1 d-block">Team</a></li>
		              <li><a href="#" class="py-1 d-block">Careers</a></li>
		              <li><a href="#" class="py-1 d-block">Blog</a></li>
		            </ul>
							</div>
							<div class="col-md-3 mb-md-0 mb-4 border-left">
								<h2 class="footer-heading">Resources</h2>
								<ul class="list-unstyled">
		              <li><a href="#" class="py-1 d-block">Security</a></li>
		              <li><a href="#" class="py-1 d-block">Global</a></li>
		              <li><a href="#" class="py-1 d-block">Charts</a></li>
		              <li><a href="#" class="py-1 d-block">Privacy</a></li>
		            </ul>
							</div>
							<div class="col-md-3 mb-md-0 mb-4 border-left">
								<h2 class="footer-heading">Social</h2>
								<ul class="list-unstyled">
		              <li><a href="#" class="py-1 d-block">Facebook</a></li>
		              <li><a href="#" class="py-1 d-block">Twitter</a></li>
		              <li><a href="#" class="py-1 d-block">Instagram</a></li>
		              <li><a href="#" class="py-1 d-block">Googleplus</a></li>
		            </ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row partner-wrap mt-5">
					<div class="col-md-12">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="mb-0 fs-6">Our Partner:</h3>
							</div>
							<div class="col-md-9">
								<p class="partner-name mb-0">
									<a href="#"><span class="ion-logo-ionic mr-2"></span>Company 01</a>
									<a href="#"><span class="ion-logo-ionic mr-2"></span>Company 02</a>
									<a href="#"><span class="ion-logo-ionic mr-2"></span>Company 03</a>
									<a href="#"><span class="ion-logo-ionic mr-2"></span>Company 04</a>
									<a href="#"><span class="ion-logo-ionic mr-2"></span>Company 05</a>
									<a href="#"><span class="ion-logo-ionic mr-2"></span>Company 06</a>
								</p>
							</div>
							<div class="col text-md-right">
								<p class="mb-0"><a href="#" class="btn-custom">See All <span class="ion-ios-arrow-round-forward"></span></a></p>
							</div>
						</div>
					</div>
				</div>
				<div class="row mt-5">
          <div class="col-md-6 col-lg-8">

            <p class="copyright">
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</p>
          </div>
          <div class="col-md-6 col-lg-4 text-md-right">
          	<p class="mb-0 list-unstyled">
          		<a class="mr-md-3" href="#">Terms</a>
          		<a class="mr-md-3" href="#">Privacy</a>
          		<a class="mr-md-3" href="#">Compliances</a>
          	</p>
          </div>
        </div>
			</div>
		</footer>
        <!-- footer end -->

        <!-- main js -->
        <script src="views/public/assets/js/main.js"></script>
    </body>
</html>