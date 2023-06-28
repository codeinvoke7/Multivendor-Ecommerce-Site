<?php 
session_start();
$errors = $_SESSION['errors'] ?? array();
$form_data = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : array();




// header start //
require "views/public/partials/header.php" 
//  header end //
?>
<section class="bg-image"
  style="background-image: url('views/public/assets/images/authbanner.webp');">
  <div class=" m-auto gradient-custom-3">
    <div class="container d-flex justify-content-center m-auto">
     
          <div class="bg-whit rounded my-4">
            <div class="card-body p-5">
              <h3 class="text-uppercase text-center mb-4">Create an account</h3>
				<p class="text-danger"></p>
				<?php if(!empty($errors['form-error'])) echo "<p class='text-danger'>" . $errors['form-error'] . "</p> "  ?>
              <form action="/auth" method="post">
				<input type="hidden" name="role" value="user">

                <div class="form-outline mb-2">
					<label class="form-label" for="form3Example1cg">Full Name</label>
                  <input type="text"
				   id="form3Example1cg" 
				   name="fullname"
				   class="form-control form-control-lg" 
				   placeholder="Enter FullName"
				  value="<?= isset($form_data['fullname']) ? $form_data['fullname'] : '' ?>" />
                </div>

                <div class="form-outline mb-2">
					<label class="form-label" for="form3Example3cg">Email</label>
                  <input type="email" 
				  id="form3Example3cg" 
				  name="email" 
				  class="form-control form-control-lg" 
				  placeholder="Enter Email Address"
				  value="<?= isset($form_data['email']) ? $form_data['email'] : '' ?>"/>
				  <?php if(!empty($errors['email'])) echo "<p class='text-danger'>" . $errors['email'] . "</p>"?>
                </div>

                <div class="form-outline mb-2">
					<label class="form-label" for="form3Example4cg">Password</label>
                  <input type="password" 
				  id="form3Example4cg" 
				  name="password" 
				  class="form-control form-control-lg"
				  placeholder="Enter Password"
				  value="<?= isset($form_data['password']) ? $form_data['password'] : '' ?>" />
				  <?php if(!empty($errors['password'])) echo "<p class='text-danger'>" . $errors['password'] . "</p>"?>
				</div>

                <div class="form-outline mb-2">
					<label class="form-label" for="form3Example4cdg">Repeat your password</label>
                  <input type="password"
				   id="form3Example4cdg" 
				   name="confirmpassword" 
				   class="form-control form-control-lg" 
				   placeholder="Re-enter Password"
				  value="<?= isset($form_data['confirmpassword']) ? $form_data['confirmpassword'] : '' ?>"/>
				  <?php if(!empty($errors['confirmpass'])) echo "<p class='text-danger'>" . $errors['confirmpass'] . "</p>"?>
                </div>

                <div class="form-check d-flex justify-content-center mb-3">
                  <input class="form-check-input me-2" 
				  type="checkbox" value="" 
				  name="terms" 
				  id="form2Example3cg" />
                  <label class="form-check-label" for="form2Example3g">
                    I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                  </label>
                </div>
				<?php if(!empty($errors['terms'])) echo "<p class='text-danger'>" . $errors['terms'] . "</p>"?>

                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="register">Register</button>
                </div>

                <p class="text-center text-muted mt-2">Have already an account? <a href="login"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

			  <?php unset($_SESSION['errors']);
			 	unset($_SESSION['form_data']); 
			  ?>
            </div>
          </div>
        
    </div>
  </div>
</section>



	<!-- footer -->
	<?php require "views/public/partials/footer.php" ?>
	<!-- footer end -->
