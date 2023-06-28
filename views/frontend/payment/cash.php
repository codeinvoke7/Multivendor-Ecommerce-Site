<?php 
require "./database.php";

include "views/public/partials/header.php";


?>





<div class="page-header breadcrumb-wrap">
    <div class="container">
      <div class="breadcrumb mt-2">
        <a href="/" rel="nofollow" class="me-2 text-success"><i class="fi-rs-home mr-5"></i>Home</a>
        <span class="bx bx-chevron-right me-2 mt-1"></span>
        <a href="shop-grid-right.html" class="me-2 text-secondary">Cash on Delivery </a>
      </div>
    </div>
  </div>
  <hr>
  <div class="container">
      <h3>Cash On Delivery Payment</h3>
      <div class="row mt-5 mb-5  text-center">
<h5 >Your Order Details</h5>
  <?php   
if(isset($_SESSION['coupon'])):?>
 <div class="col-6  m-auto border p-3 rounded mt-2">
    <div class="d-flex justify-content-between">
        <div class="cart_total_label">
            <h6 class="text-muted">Subtotal</h6>
        </div>
        <div class="cart_total_amount">
            <h4 class="text-brand text-end custom-text-color">₦<?= $cartTotal ?></h4>
        </div>
    </div>

    <div  class="d-flex justify-content-between">
        <div class="cart_total_label">
            <h6 class="text-muted fw-bold">Coupon Name</h6>
        </div>
        <div class="cart_total_amount">
            <h6 class="text-brand text-end custom-text-color"><?= $_SESSION['coupon']['coupon_name'] .'('. $_SESSION['coupon']['coupon_discount'] .'% )' ?></h6>
        </div>
    </div>

      <div class="d-flex justify-content-between">
        <div class="cart_total_label">
            <h6 class="text-muted">Coupon Discount</h6>
        </div>
        <div class="cart_total_amount">
            <h4 class="text-brand text-end custom-text-color">₦<?= $_SESSION['coupon']['discount_amount'] ?></h4>
        </div>
    </div>

      <div class="d-flex justify-content-between">
        <div class="cart_total_label">
            <h6 class="text-muted">Grand Total</h6>
        </div>
        <div class="cart_total_amount">
            <h4 class="text-brand text-end custom-text-color">₦<?= $_SESSION['coupon']['total_amount'] ?></h4>
        </div>
    </div></div>

    <?php else: ?>

    <div class="col-6 m-auto  border p-3 rounded mt-2">
    <div class="d-flex justify-content-between">
             <div class="cart_total_label">
                 <h6 class="text-muted">Grand Total </h6>
             </div>
             <div class="cart_total_amount">
                 <h4 class="text-brand text-end">₦<?= $cartTotal ?></h4>
             </div>
         </div>
         </div>
    <?php endif ?>
    <div class="mt-5">
    <form action="/cash/order" method="post">
  <div class="form-group">
    <input type="hidden" id="amount" name="amount"
      value="<?= isset($_SESSION['coupon']) ? $_SESSION['coupon']['total_amount'] : $cartTotal ?>"/>
        <input type="hidden" name="name" id="name" value="<?= $data['name'] ?>">
        <input type="hidden" name="email" id="email" id="email" value="<?=  $data['email'] ?>">
        <input type="hidden" name="phone" id="phone" value="<?=  $data['phone'] ?>">
        <input type="hidden" name="country" id="country" value="<?=  $data['country'] ?>">
        <input type="hidden" name="state" id="state" value="<?=  $data['state'] ?>">
        <input type="hidden" name="city" id="city" value="<?=  $data['city'] ?>">
        <input type="hidden" name="address" id="address" value="<?=  $data['address'] ?>">
        <input type="hidden" name="notes" id="notes" value="<?= $data['notes'] ?>">
  <div class="form-submit">
    <button type="submit" class="btn fillBtn" name="cashPayment">Submit Payment </button>
  </div>
</form>
    </div>
</div>

    </div></div></div>


        <!-- footer -->
        <?php require "views/public/partials/footer.php" ?>
	<!-- footer end -->
