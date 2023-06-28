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
?>






<div class="page-content"> 
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Add Coupon </div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add Coupon </li>
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

<div class="col-lg-10">
	<div class="card">
		<div class="card-body">

 <form id="couponForm" method="post" action="/store/coupon" >
            <div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Coupon Name</h6>
				</div>
				<div class="form-group col-sm-9 text-secondary">
					<input type="text" name="coupon_name" class="form-control">
				</div>
			</div>


           <div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Coupon_discount(%)</h6>
				</div>
				<div class="form-group col-sm-9 text-secondary">
					<input type="text" name="coupon_discount" class="form-control">
				</div>
			</div>

            <div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Coupon_validity Date</h6>
				</div>
				<div class="form-group col-sm-9 text-secondary">
					<input type="date" name="coupon_validity" class="form-control" min="<?= date('Y-m-d'); ?>">
				</div>
			</div>




			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 text-secondary">
					<input type="submit" class="btn btn-primary px-4" name="saveCoupon" value="Save Changes">
				</div>
			</div>
		</form></div>

		



	</div>




							</div>
						</div>
					</div>
				</div>
			</div>



<?php
include "views/users/admin/partials/footer.php";
?>
