<?php 
require "./controller/sessionController.php";
adminSession();
require "./database.php";
include "views/users/admin/partials/headertags.php";

// <!--start sidebar wrapper -->
include "views/users/admin/partials/sidebar.php";
// <!--end sidebar wrapper -->

// <!--start sidebar wrapper -->
include "views/users/admin/partials/header.php";
// <!--end sidebar wrapper -->
if (isset($_SERVER['REQUEST_URI'])) {
    $uri = $_SERVER['REQUEST_URI'];
    $inactiveVendor_id = explode('/', $uri);
    $inactiveVendor_id = $inactiveVendor_id['4'];

    $sql = $conn->query("SELECT * FROM `users` WHERE id = $inactiveVendor_id"); 
    $row = $sql->fetch_assoc();
    $fullname = $row['fullname'];
    $shopName = $row['shop_name'];
    $email = $row['email'];
    $phone = $row['phone'];
    $address = $row['address'];
    $phone = $row['phone'];
    $vendor_bio = $row['vendor_bio'];
    $photo = $row['photo'];
    $joined_date = date('d M, Y', strtotime($row['date']));
     
}
?>

<div class="page-content"> 
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Active Vendor Details</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Active Vendor Details</li>
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

<div class="col-lg-12">
	<div class="card">
		<div class="card-body">

		<form method="post" action="" enctype="multipart/form-data" >

			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Full Name</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" class="form-control" name="username" value="<?= $fullname ?>"   />
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0"> Shop Name</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" name="name" class="form-control" value="<?= $shopName ?>" />
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Vendor Email</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="email" name="email" class="form-control" value="<?= $email ?>" />
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Vendor Phone </h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" name="phone" class="form-control" value="<?= $phone ?>" />
				</div>
			</div>


			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Vendor Address</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" name="address" class="form-control" value="<?= $address ?>" />
				</div>
			</div>

			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Vendor Join</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" name="vendor_join" class="form-control" value="<?= $joined_date ?>" />
				</div>
			</div>




			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Vendor Info</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<textarea name="vendor_short_info" class="form-control" id="inputAddress2" placeholder="Vendor Info " rows="3">
					<?= $vendor_bio ?>
				</textarea>
				</div>
			</div>



			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Vendor Photo</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					 <img id="showImage" src="<?= !empty($photo) ? '/views/public/uploads/vendor_images/'.$photo : '/views/public/uploads/no_image.jpg' ?>" alt="Vendor" style="width:100px; height: 100px;"  >
				</div>
			</div>


		</div>

		</form>
        <div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 text-secondary">
					<a href="/status/vendor/active/<?= $inactiveVendor_id ?>"><button class="btn btn-danger mb-2">Active Vendor</button></a>
				</div>
			</div>


	</div>




							</div>
						</div>
					</div>
				</div>
			</div>

 <?php
include "views/users/admin/partials/footer.php";
?>
