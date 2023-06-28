<?php
session_start();
$errors = $_SESSION['error'] ?? array();
$form_data = isset($_SESSION['login_data']) ? $_SESSION['login_data'] : array();
?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="/views/users/vendors/assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="/views/users/vendors/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="/views/users/vendors/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="/views/users/vendors/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="/views/users/vendors/assets/css/pace.min.css" rel="stylesheet" />
	<script src="/views/users/vendors/assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="/views/users/vendors/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="/views/users/vendors/assets/css/app.css" rel="stylesheet">
	<link href="/views/users/vendors/assets/css/icons.css" rel="stylesheet">
	<title>Admin Login</title>
</head>

<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="mb-4 text-center">
							<h1>Admin</h1>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">Sign in</h3>
									<div class="form-body">
									<?php if(!empty($errors['invalid-field'])) echo "<p class='text-danger'>" . $errors['invalid-field'] . "</p>"?>
										<form action="/admin/auth" method="post" class="row g-3">
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email Address</label>
												<input type="email" class="form-control" name="email" id="inputEmailAddress" placeholder="Email Address"
												value="<?= isset($form_data['email']) ? $form_data['email'] : '' ?>"/>
				  						<?php if(!empty($errors['email'])) echo "<p class='text-danger'>" . $errors['email'] . "</p>"?>
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Enter Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0" name="password" id="inputChoosePassword" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
													<?php if(!empty($errors['password'])) echo "<p class='text-danger'>" . $errors['password'] . "</p>"?>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
													<label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
												</div>
											</div>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary" name="admin_login"><i class="bx bxs-lock-open"></i>Sign in</button>
												</div>
											</div>
										</form>
										<?php unset($_SESSION['error']);
											  unset($_SESSION['login_data']); 
											?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="/views/users/vendors/assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="/views/users/vendors/assets/js/jquery.min.js"></script>
	<script src="/views/users/vendors/assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="/views/users/vendors/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="/views/users/vendors/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="/views/users/vendors/assets/js/app.js"></script>
</body>

</html>