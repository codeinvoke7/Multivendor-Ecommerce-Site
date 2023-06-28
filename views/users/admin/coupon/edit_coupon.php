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
    $id = explode('/', $uri);
    $coupon_id =array_pop($id);

    if ($uri === '/edit/coupon/'. $coupon_id) {
        $stmt = $conn->prepare("SELECT * FROM coupons WHERE id = ?");
        $stmt->bind_param('i', $coupon_id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        $coupon_id =  $result['id'];
        $coupon_name =  $result['coupon_name'];
        $coupon_discount =  $result['coupon_discount'];
        $coupon_validity =  $result['coupon_validity'];
    }
}
?>






<div class="page-content"> 
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Edit Coupon </div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Edit Coupon </li>
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

 <form id="couponForm" method="post" action="/update/coupon/<?= $coupon_id ?>">

			   <div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Coupon Name</h6>
				</div>
				<div class="form-group col-sm-9 text-secondary">
	 <input type="text" name="coupon_name" class="form-control" value="<?= $coupon_name ?>">
				</div>
			</div>

           <div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Coupon Discount(%)</h6>
				</div>
				<div class="form-group col-sm-9 text-secondary">
					<input type="text" name="coupon_discount" class="form-control" value="<?= $coupon_discount ?>">
				</div>
			</div>

	<div class="row mb-3">
		<div class="col-sm-3">
			<h6 class="mb-0">Coupon Validity Date</h6>
		</div>
		<div class="form-group col-sm-9 text-secondary">
			<input type="date" name="coupon_validity" class="form-control" min="2023-06-13" value="2<?= $coupon_validity ?>">
		</div>
	</div>




			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 text-secondary">
					<input type="submit" class="btn btn-primary px-4" name="editCoupon" value="Save Changes">
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
