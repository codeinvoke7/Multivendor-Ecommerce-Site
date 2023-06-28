<?php 
require "controller/sessionController.php";
vendorSession();
require "./database.php";
include "views/users/vendors/partials/headertags.php";

// <!--start sidebar wrapper -->
include "views/users/vendors/partials/sidebar.php";
// <!--end sidebar wrapper -->

// <!--start sidebar wrapper -->
include "views/users/vendors/partials/header.php";
// <!--end sidebar wrapper -->
$errors =  $_SESSION['errors'] ?? array();

$stmt = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
$stmt->bind_param("s", $_SESSION['vendor_id']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$fullname = $row['fullname'];
$shopName = $row['shop_name'];
$email = $row['email'];
$phone = $row['phone'];
$address = $row['address'];
$phone = $row['phone'];
$vendor_bio = $row['vendor_bio'];
$joined_date = date('d/m/y', strtotime($row['date']));
$photo = explode('.', $row['photo']);
echo $_SESSION['phone'];
echo $_SESSION['email'];
?>











<div class="page-content"> 
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Vendor User Profile</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Vendor Profile</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">

					</div>
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<div class="d-flex flex-column align-items-center text-center">
 	<img src="<?= !empty($photo) ? $photo[1]. '.'. $photo[2] : '/views/public/uploads/no_image.jpg' ?>" alt="Vendor" class="rounded-circle p-1 bg-primary" width="110">
					<div class="mt-3">
						<h4>De bangz boutique</h4>
						<p class="text-secondary mb-1"><?= $email ?></p>
						<p class="text-muted font-size-sm"><?= $address ?></p>

					</div>
										</div>
										<hr class="my-4">
										<ul class="list-group list-group-flush">
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
												<span class="text-secondary">https://codervent.com</span>
											</li> 

											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
												<span class="text-secondary">codervent</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
<div class="col-lg-8">
	<div class="card">
		<div class="card-body">

		<form method="post" action="/vendor/profile/store" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="yHrdnT3ekj6SfcFdvDYBdTozEDmDW5zu3JifKcaP">
			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Fullname</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" class="form-control" name="fullname" value="<?= $fullname ?>" disabled="">
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0"> Shop Name</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" class="form-control" name="shopname" value="<?= $shopName ?>">
                    <?= isset($errors['shopname']) ? '<p style="color: red">'. $errors['shopname'] . '</p>' : '' ?>
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Vendor Email</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="email" name="email" class="form-control" value="<?= $email ?>">
                    <?= isset($errors['email']) ? '<p style="color: red">'. $errors['email'] . '</p>' : '' ?>
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Vendor Phone </h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" name="phone" class="form-control" value="<?= $phone ?>">
                    <?= isset($errors['phone']) ? '<p style="color: red">'. $errors['phone'] . '</p>' : '' ?>
				</div>
			</div>


			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Vendor Address</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" name="address" class="form-control" value="<?= $address ?>">
				</div>
			</div>

			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Vendor Join Date </h6>
				</div>
				<div class="col-sm-9 text-secondary">
                <input type="text" name="joined_date" class="form-control" disabled value="<?= $joined_date ?>">
				</div>
			</div>


			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Vendor Info</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<textarea name="vendor_short_info" class="form-control" id="inputAddress2" placeholder="Bio" rows="3"><?= $vendor_bio ?></textarea>
				</div>
			</div>



			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Photo</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="file" name="photo" class="form-control" id="image">
				</div>
			</div>



			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0"> </h6>
				</div>
				<div class="col-sm-9 text-secondary">
					 <img id="showImage" src="<?= !empty($photo) ? $photo[1]. '.'. $photo[2] : '/views/public/uploads/no_image.jpg' ?>" alt="Vendor" style="width:100px; height: 100px;">
				</div>
			</div>





			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 text-secondary">
					<input type="submit" class="btn btn-primary px-4" name="vendorProfileUpdate" value="Save Changes">
				</div>
			</div>
		</form>
    <?php
    unset($_SESSION['errors']);
    ?>
    </div>

		



	</div>




							</div>
						</div>
					</div>
				</div>
			</div>

            <script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>

            <?php
include "views/users/vendors/partials/footer.php";
?>