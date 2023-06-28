
<?php 
session_start();
require "./database.php";



     
include "views/public/partials/header.php";


?>

  <div class="page-header breadcrumb-wrap">
    <div class="container">
      <div class="breadcrumb mt-2">
        <a href="/" rel="nofollow" class="me-2 text-success"><i class="fi-rs-home mr-5"></i>Home</a>
        <span class="bx bx-chevron-right me-2 mt-1"></span>
        <a href="shop-grid-right.html" class="me-2 text-secondary">Cart </a>
      </div>
    </div>
  </div>
  <hr>
  <div class="container">

    <h3>Your Cart</h3>

    
      <div class=" table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Item</th>
              <th>Price</th>
              <th>Color</th>
              <th>Size</th>
              <th>Quantity</th>
              <th>Total</th>
              <th></th>
            </tr>
          </thead>
          <tbody id="cartPage">

            <!-- Add more products here -->
          </tbody>
        </table>
      </div>
      <div class="d-flex flex-md-row flex-column justify-content-between">
      <div class="w-100">
        <?php
        if (!empty($_SESSION['coupon'])) : else : ?>
      <div class="coupon" id="couponField">
            <h4 >Apply Coupon</h4>
    <form class="row g-3">
  <div class="col-auto">
    <input type="text" class="form-control"id="coupon_name" name="coupon_name" placeholder="Enter Coupon code">
  </div>
  <div class="col-auto">
  <a type="submit" class="btn mb-3 text-white fillBtn" onclick="applyCoupon()">Apply Coupon</a>
  </div>
</form>
          </div>
        </div>
        <?php endif ?>
        <div class="w-100">
          <h4 class="py-2">Order Summary</h4>
          <div id="couponCalField"> </div>

          <a href="/checkout" class="btn my-3 w-100 text-white fillBtn">Proceed To Checkout<i class="bx bx-sign-out ml-15"></i></a>
         
        </div>

    </div>
  </div>


      <!-- footer -->
	<?php require "views/public/partials/footer.php" ?>
	<!-- footer end -->

