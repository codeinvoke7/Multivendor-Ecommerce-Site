
<?php 
$carts = $response['carts'];
$cartQty = $response['cartQty'];
$cartTotal = $response['cartTotal'];
// print_r($carts);
include "views/public/partials/header.php";

              if (isset($_SESSION['user_id'])):
                $id = $_SESSION['user_id'];
                $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
                $stmt->bind_param('i', $id);
                $stmt->execute();
                $result = $stmt->get_result()->fetch_assoc();
             
?>
<div class="page-header breadcrumb-wrap">
    <div class="container">
      <div class="breadcrumb mt-2">
        <a href="/" rel="nofollow" class="me-2 text-success"><i class="bx bx-home me-2"></i>Home</a>
        <span class="bx bx-chevron-right me-2 mt-1"></span>
        <a href="shop-grid-right.html" class="me-2 text-secondary">Checkout</a>
      </div>
    </div>
    <hr>
    <div class="container mb-3">
        <h2 class="fs-3">Checkout</h2>
    </div>
  </div>

  <div class="container">
    <div class="d-flex justify-content-center flex-md-row flex-column">
      <div class="form-container w-100 me-5">
       
        <h4>Billing Details</h4>
        <form method="post" action="/checkout/store" id="checkoutForm">
            <div class="row mt-3">
             
          <div class=" col-md-6 mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="<?= $result['fullname'] ?>">
          </div>
          <div class="col-md-6 mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"  value="<?= $result['email'] ?>">
          </div>
        </div>

        <div class="row mb-3">
        <div class="col-md-6 mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter your phone"  value="<?= $result['phone'] ?>">
          </div>
        <div class="col-md-6">
          <label for="country" class="form-label">Country</label>
          <select class="form-select" id="country" name="country" required>
            <option selected disabled>Select your country</option>
          </select>
        </div>
        
        
      </div>
        <div class="row">
        <div class="col-md-6">
          <label for="state" class="form-label">State</label>
          <select  class="form-select" id="state" name="state" required disabled>
            <option selected disabled>Select your state</option>
          </select>
        </div>
        <div class="col-md-6">
          <label for="city" class="form-label">City</label>
          <select  class="form-select" id="city" name="city" required disabled>
            <option selected disabled>Select your city</option>
          </select>
        </div>
          
        </div>
        <div class=" mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea required="" class="form-control" id="address" placeholder="Enter your address" name="address" ><?= $result['address'] ?></textarea>
          </div>
          <div class="mb-3">
            <label for="info" class="form-label">Additional Info</label>
           <textarea class="form-control" id="info" rows="3" placeholder="Additional Info" name="notes"></textarea>
          </div>
         <?php endif?>
     
      </div>
      <div class="order-summary-container w-100 ms-md-4 ms-0">
        <h4>Order Summary</h4>

<?php
foreach($carts as $item):
  $image =  explode('.', $item['options']['image']);
  $photo = $image[1] . '.' . $image[2];
  ?>
        <div class="d-flex justify-content-between mb-3 mt-4">
            <div class="image product-thumbnail"><img src="<?= $photo ?>" alt="#" style="width:40px; height: 40px;" ></div>
            <div>
                <h6 class="w-100"><a href="javascript:;" class="text-heading"><?= $item['name'] ?></a></h6></span>
                <!-- <div class="product-rate-cover"> -->

                    <span class="text-secondary fw-bold" style="font-size: 13px">Color: <?= $item['options']['color'] ?></span>
                    <span class="text-secondary fw-bold" style="font-size: 13px">Size : <?= $item['options']['size'] ?></span>

            </div>
            <div>
                <h6 class="text-muted pl-20 pr-20">x <?= $item['qty'] ?></h6>
            </div>
            <div>
                <h4 class="text-brand custom-text-color">₦<?= $item['price'] ?></h4>
            </div>
        </div>
        <?php endforeach;?>
        <hr>

<?php   
if(isset($_SESSION['coupon'])):?>

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
    </div>
    <?php else: ?>


    <div class="d-flex justify-content-between">
             <div class="cart_total_label">
                 <h6 class="text-muted">Grand Total </h6>
             </div>
             <div class="cart_total_amount">
                 <h4 class="text-brand text-end">₦<?= $cartTotal ?></h4>
             </div>
         </div>
         
    <?php endif ?>

   
        <div class="payment-options">
      <h4>Payment Method:</h4>
      <div class="form-check mb-3">
        <input class="form-check-input" type="radio" name="payment_method" id="paystackPayment" value="paystack" checked>
        <label class="form-check-label ms-3" for="paystackPayment">
          Paystack
        </label>
      </div>
      <div class="form-check mb-3">
        <input class="form-check-input" type="radio" name="payment_method" id="creditCardPayment" value="card" >
        <label class="form-check-label ms-3" for="creditCardPayment">
          Credit Card
        </label>
      </div>
      <div class="form-check mb-3">
        <input class="form-check-input" type="radio" name="payment_method" id="cashPayment" value="cash">
        <label class="form-check-label ms-3" for="cashPayment">
         Cash on Deivery
        </label>
      </div>
      <button type="submit" class="btn fillBtn w-100 mb-4">Place Order</button>
    </form>
    </div>
      </div>
    </div>
   
  </div>

      <!-- footer -->
      <?php require "views/public/partials/footer.php" ?>
	<!-- footer end -->


