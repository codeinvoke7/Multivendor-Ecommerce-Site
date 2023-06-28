<?php 
require "controller/sessionController.php";
userSession();

require "views/public/partials/header.php";
require "views/users/customers/partials/dash_header.php";
require "views/users/customers/partials/sidebar.php";
?>



<div class="container">
  <h1 class="my-3">Welcome, Peter Gregory</h1>
  <div class="row row-cols-md-2 row-cols-2 g-4">
  <div class="col h-100 mb-sm-0">
    <div class="card bg-primary-subtle">
      <div class="card-body">
        <p class="card-text fs-6 fw-lighter">Total Order</p>
		<h2 class="card-title fs-1">11</h2>
      </div>
    </div>
  </div>
  <div class="col h-100">
    <div class="card bg-success-subtle">
      <div class="card-body">
        <p class="card-text fs-6 fw-lighter">Your Wishlist</p>
		<h5 class="card-title fs-1">2</h5>
      </div>
    </div>
  </div>

  <div class="col h-100">
    <div class="card bg-danger-subtle" >
      <div class="card-body">
        <p class="card-text fs-6 fw-lighter">Your Reviews</p>
		<h5 class="card-title fs-1">8</h5>
      </div>
    </div>
  </div>

  <div class="col h-100 mb-3">
    <div class="card bg-warning-subtle bg-gradient">
      <div class="card-body">
        <p class="card-text fs-6 fw-lighter">Product in Cart</p>
		<h5 class="card-title fs-1">12</h5>
      </div>
    </div>
  </div>
</div>
</div>







<!-- footer -->
<?php require "views/public/partials/footer.php" ?>
	<!-- footer end -->
