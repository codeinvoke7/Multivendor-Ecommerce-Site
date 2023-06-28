<div class="container-fluid  d-none d-md-flex d-lg-flex justify-content-around" id="top-bar" style="background: #f1f1f2">
        <div class="d-flex mt-2">
        <i class="bx bx-headphone me-1 fs-4 text-success"></i>
            <p class="me-2 fw-lighter top-bar-text">+234141283176 </p>
            <i class="bx bx-envelope me-1 fs-4 text-success"></i>
            <p class="me-2 fw-lighter top-bar-text"> admin@multivendor.com</p>
        </div>
        <div class="mt-2 d-flex">
            <p><a class="text-dark text-decoration-none me-2 top-bar-text" href="/vendor/sign-up">Become a Seller</a></p>
            
            <?php
            if (isset($_SESSION['user_id'])):?> 
        <?php else:?>
          <span class="text-dark me-2"> | </span>
          <p><a  class="text-dark text-decoration-none" href="/login">Login</a></p>
              <?php endif?>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-expand-md nav text-white ">
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
            <?php 
        if (isset($_SESSION['user_id'])):?>
        <li><a class="dropdown-item" href="/user/dashboard">My Account</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/logout">Logout</a></li>
              <?php else: ?>
              <li><a class="dropdown-item" href="/login">Login</a></li>
              <li><a class="dropdown-item" href="/registration">Register</a></li>
              <?php endif?>
            </ul>
          </li>
                
                    
  </div>
<!-- mobile mini cart -->
  <div class="d-md-none d-block text-white me-4 cart-text">
  <i class="bx bx-cart fs-2 fw-bold position-relative"> 
     <span class="cartQty position-absolute start-100 translate-middle badge bg-white text-success"
          style="font-size: 12px; border-radius: 50%; top: 10px"></span>
         </i>
  <div class="bg-white border rounded minicart-wrapper">
        <!-- Start mini cart start with ajax -->
        <div class="miniCart"></div>

        <!-- End mini cart start with ajax -->
        <div class="shopping-cart-footer">
            <div class="shopping-cart-total px-3 pt-3 hr row">
                <h4 class="text-secondary fs-6 fw-bold me-5 col">Total </h4>
                <span id="cartSubTotal" class="text-success col"></span>
            </div>
            <div class="shopping-cart-button p-3">
                <a href="/mycart" class="outline btn borderBtn me-5">View cart</a>
                <a href="/checkout" class="btn fillBtn">Checkout</a>
            </div>
        </div>
    </div>
</div>
<!-- mobile minicart end -->

          <div class=" collapse navbar-collapse" id="navbarTogglerDemo02">
            <div class="d-sm-none d-md-flex disp w-100 justify-content-center">
         <form class="w-100" role="search">
                <div class="input-group">
                        <i class="bx bx-search input-group-text" id="basic-addon1"></i>
                  <input type="search" name="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
                </div>
              </form>
            </div>
              <div class="d-sm-none d-md-flex disp container justify-content-end text-center">
                
                <div class="">
                <i class="bx bx-heart fs-4 mb-0"></i>
                    <a style="font-size: 13px"  class="nav-link text-decoration-none text-dark text-white" href="javascript:void(0)">
                      Wishlist
                </a>
                </div>
                
                <!-- mini cart start -->
  <div class="cart-text">
    <div>
        <i class="bx bx-cart fs-4 mb-0 position-relative">
          <span class="cartQty position-absolute start-100 translate-middle badge bg-white text-success "
          style="font-size: 12px; border-radius: 50%; top: 10px"></span></i>
        <a style="font-size: 13px"  class="mt-0 nav-link text-decoration-none text-dark text-white" href="javascript:void(0)">
            Your Cart
            
        </a>
    </div>

    <div class="bg-white border rounded minicart-wrapper">
        <!-- Start mini cart start with ajax -->
        <div class="miniCart"></div>

        <!-- End mini cart start with ajax -->
        <div class="shopping-cart-footer">
            <div class="shopping-cart-total px-3 pt-3 hr row">
                <span class="text-secondary fs-6 fw-bold me-5 col">Total </span>
                <span id="cartSubTotal" class="text-success col"></span>
            </div>
            <div class="shopping-cart-button p-3">
                <a href="/mycart" class="outline btn borderBtn me-5">View cart</a>
                <a href="/checkout" class="btn fillBtn">Checkout</a>
            </div>
        </div>
    </div>
</div>
<!-- mini cart end -->

                <div class="d-md-block d-sm-none dropdown">
                <i class="bx bx-user fs-4 d-lg-block"></i>
                        <a style="font-size: 13px" class="nav-link text-decoration-none text-dark text-white" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Account
                          </a>
               <ul class="dropdown-menu drop-menu shadow" aria-labelledby="accountDropdown">
               <?php 
        if (isset($_SESSION['user_id'])):?>
        <li><a class="dropdown-item" href="/user/dashboard">My Account</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/logout">Logout</a></li>
              <?php else: ?>
              <li><a class="dropdown-item" href="/login">Login</a></li>
              <li><a class="dropdown-item" href="/registration">Register</a></li>
              <?php endif?>
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
      
        <!-- category list -->
      <div class="category-list shadow">
        <?php
        $icons = [
          'Electronics' => 'bx bx-tv',
          'Fashion' => 'bx bx-closet',
          'Home & Furniture' => 'bx bx-chair',
          'Health & Wellness' => 'bx bx-atom',
          'Automotive' => 'bx bx-car',
          'Sports & Outdoors' => 'bx bx-football',
          'Books & Media' => 'bx bx-book',
          'Baby & Kids' => 'bx bx-wink-tongue',
          'Groceries & Food' => 'bx bx-restaurant',
          'Office Supplies' => 'bx bx-pen',
          'Pet Supplies' => 'bx bx-bone',
          'Digital Products' => 'bx bx-film',

        ];
         $sql = $conn->query("SELECT * FROM `categories`");
         while($row = $sql->fetch_assoc()):
         $icon = isset($icons[$row['category']]) ? $icons[$row['category']] : 'bx bx-star';
         ?>
        <a href="/product/category/<?= $row['id'] . '/' . $row['slug'] ?>">
         <i class="<?= $icon ?>"></i>
        <?= $row['category'] ?></a>
        <?php endwhile ?>
    </div>
     <!-- category list end -->
    <div class="m-3 d-md-none d-flex "> 
    <i class="bx bx-chevron-left-circle mb-2 mx-2 text-white"></i>
      <p> <a href="/logout"  class="text-white mt-2 pt-3">Logout</a></p>
    </div>
    </div>
</div>
      <div class="" id="overlay"></div>