<?php 
session_start();
$errors = $_SESSION['errors'] ?? array();
$form_data = isset($_SESSION['login_data']) ? $_SESSION['login_data'] : array();

require "views/public/partials/header.php"
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php

if (isset($_SESSION['reg-success']) && $_SESSION['reg-success']) {
	unset($_SESSION['reg-success'])
	?>
	<script>
		swal.fire({
				title: "Good job!",
				text: "Your registration was successfull. A verification email has been sent to you",
				icon: "success",
				showConfirmButton: false,
				toast: true,
				timer: 4000,
			});
	</script>
<?php
}

if (isset($_SESSION['email_verified']) && $_SESSION['email_verified']) {
	unset($_SESSION['email_verified'])
	?>
	<script>
		swal.fire({
				position: "top-end",
				title: "Email Verification",
				text: "Email Verified. Proceed to login to dashboard",
				icon: "success",
				showConfirmButton: false,
				toast: true,
				timer: 4000,

			});
	</script>
<?php
}

if (isset($_SESSION['email_not-verified']) && $_SESSION['email_not-verified']) {
	unset($_SESSION['email_not-verified'])
	?>
	<script>
		swal.fire({
				position: "top-end",
				title: "Email Verification",
				text: "You have not verified your email. kindly check your mailbox for a verification link.",
				icon: "error",
				showConfirmButton: false,
				toast: true,
				timer: 4000,

			});
	</script>
	<?php
}

if (isset($_SESSION['pass_reset']) && $_SESSION['pass_reset']) {
	unset($_SESSION['pass_reset'])
	?>
	<script>
		swal.fire({
				position: "top-end",
				title: "Password Rest",
				text: "You successfully changed your password. Proceed to login",
				icon: "success",
				showConfirmButton: false,
				toast: true,
				timer: 4000,

			});
	</script>
	<?php
}
?>
<!-- header end -->

<section class="h-100 gradient-custom-3" 
 style="background-image: url('views/public/assets/images/authbanner.webp');">
 <div class="gradient-custom-3">
  <div class="container-lg py-5 h-100 ">
    <div class="d-flex flex-md-row flex-column justify-content-center w-75 m-auto shadow bg-whit rounded" id="login">
     
		  <div class="d-flex align-items-center">
              <div class="w-100 pe-5">
			  <img src="views/public/assets/images/login-bg2.jpg"  class="img-fluid rounded-start w-100 h-100" alt="...">
              </div>
            </div>
            <div class="w-100 me-4 px-2">
             

                <div class="text-center">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                    style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">Sign in</h4>
                </div>
				<?php if(!empty($errors['invalid-fields'])) echo "<p class='text-danger'>" . $errors['invalid-fields'] . "</p>"?>
                <form action="/controller/authController.php" method="post" class="signin-form">
			      		<div class="form-group mb-3">
			      			<label class="label" for="email-address">Email</label>
			      			<input type="email"
							 class="form-control"
							 id="email-address" 
							 placeholder="Email" 
							 name="email" required
							value="<?= isset($form_data['email']) ? $form_data['email'] : '' ?>"/>
				  <?php if(!empty($errors['email'])) echo "<p class='text-danger'>" . $errors['email'] . "</p>"?>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="pass">Password</label>
		              <input type="password" 
					  class="form-control" 
					  id="pass" 
					  placeholder="Password" 
					  name="password" required>
					  <?php if(!empty($errors['password'])) echo "<p class='text-danger'>" . $errors['password'] . "</p>"?>
					</div>
		            <div class="form-group">
		            	<button type="submit" name="login" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">
								<input type="checkbox" checked> Remember Me
									  
									  <span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="/reset_password">Forgot Password</a>
									</div>
		            </div>
		          </form>
		          <p class="text-center">Not a member? <a data-toggle="tab" href="/registration">Sign Up</a></p>
       
            </div>
			<?php unset($_SESSION['errors']);
			 	unset($_SESSION['login_data']); 
			  ?>


         
    </div>
  </div>
</div>
</section>

	

	<!-- footer -->
	<?php require "views/public/partials/footer.php" ?>
	<!-- footer end -->

