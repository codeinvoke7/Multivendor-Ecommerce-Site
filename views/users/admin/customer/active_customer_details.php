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
    $activeCustomer_id = explode('/', $uri);
    $activeCustomer_id = $activeCustomer_id['4'];

    $sql = $conn->query("SELECT * FROM `users` WHERE id = $activeCustomer_id"); 
    $row = $sql->fetch_assoc();
    $fullname = $row['fullname'];
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
					<div class="breadcrumb-title pe-3">Active Customer Details</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Active Customer Details</li>
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
					<h6 class="mb-0">Customer Email</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="email" name="email" class="form-control" value="<?= $email ?>" />
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Customer Phone </h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" name="phone" class="form-control" value="<?= $phone ?>" />
				</div>
			</div>


			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Customer Address</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" name="address" class="form-control" value="<?= $address ?>" />
				</div>
			</div>

			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Customer Join</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" name="vendor_join" class="form-control" value="<?= $joined_date ?>" />
				</div>
			</div>

			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Customer Photo</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					 <img id="showImage" src="<?= !empty($photo) ? '/views/public/uploads/user_images/'.$photo : '/views/public/uploads/no_image.jpg' ?>" alt="Customer" style="width:100px; height: 100px;"  >
				</div>
			</div>
		</div>

		</form>
        <div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 text-secondary">
					<a href="/status/customer/inactive/<?= $activeCustomer_id ?>"><button class="btn btn-danger mb-2">Inactive Customer</button></a>
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
