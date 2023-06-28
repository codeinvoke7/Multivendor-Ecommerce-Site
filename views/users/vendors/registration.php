

<?php 
session_start();
$errors = $_SESSION['errors'] ?? array();
$form_data = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : array();




// header start //
require "views/public/partials/header.php" 
//  header end //
?>

  <div class="container mt-5 mb-5 w-75 border p-3 rounded shadow" id="vendor_form">
    <h2 class="text-center">Vendor Registration Form</h2>
    <p class="text-center">Note: Please make sure to fill in the form with your actual information or else your account may become banned or suspended.</p>
    <?php if(!empty($errors['form-error'])) echo "<p class='text-danger'>" . $errors['form-error'] . "</p> "  ?>
    <form action="/vendor/1auth" method="post">
      <input type="hidden" name="role" value="vendor">
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name"
          value="<?= isset($form_data['name']) ? $form_data['name'] : '' ?>">
        </div>
        <div class="col-md-6">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"
          value="<?= isset($form_data['email']) ? $form_data['email'] : '' ?>">
          <?php if(!empty($errors['email'])) echo "<p class='text-danger'>" . $errors['email'] . "</p>"?>
        </div>
        </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="phone" class="form-label">Phone number</label>
          <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number"
          value="<?= isset($form_data['phone']) ? $form_data['phone'] : '' ?>">
          <?php if(!empty($errors['phone'])) echo "<p class='text-danger'>" . $errors['phone'] . "</p>"?>
        </div>
      
        <div class="col-md-6">
                <label for="company" class="form-label">Shop Name</label>
                <input type="text" class="form-control" id="company" name="shopname" placeholder="Enter your company name"
                value="<?= isset($form_data['shopname']) ? $form_data['shopname'] : '' ?>">
                <?php if(!empty($errors['shopname'])) echo "<p class='text-danger'>" . $errors['shopname'] . "</p>"?>
                </div>
            </div>
      <div class="row mb-3">
        <div class="col-md-4">
          <label for="country" class="form-label">Country</label>
          <select class="form-select" id="country" name="country">
            <option selected disabled>Select your country</option>
          </select>
        </div>
        <div class="col-md-4">
          <label for="state" class="form-label">State</label>
          <select class="form-select" id="state" name="state" disabled>
            <option selected disabled>Select your state</option>
          </select>
        </div>
        <div class="col-md-4">
          <label for="city" class="form-label">City</label>
          <select class="form-select" id="city" name="city" disabled>
            <option selected disabled>Select your city</option>
          </select>
        </div>
      </div>

      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <textarea class="form-control" id="address" rows="3" placeholder="Enter your address" name="address">
        <?= isset($form_data['address']) ? $form_data['address'] : '' ?>
        </textarea>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="name" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
          <?php if(!empty($errors['password'])) echo "<p class='text-danger'>" . $errors['password'] . "</p>"?>
        </div>
        <div class="col-md-6">
          <label for="email" class="form-label">Confirm Password</label>
          <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Re-enter password">
          <?php if(!empty($errors['confirmpass'])) echo "<p class='text-danger'>" . $errors['confirmpass'] . "</p>"?>
        </div>
        </div>
      <button type="submit" class="btn w-100 mt-2 text-white" name="vendor_signup" style="background-color: #e0416e;">Register</button>
    </form>

    <?php unset($_SESSION['errors']);
			 	unset($_SESSION['form_data']); 
			  ?>
  </div>

	<!-- footer -->
	<?php require "views/public/partials/footer.php" ?>
	<!-- footer end -->
