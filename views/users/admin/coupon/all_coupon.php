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
					<div class="breadcrumb-title pe-3">All Coupon </div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Coupon</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
		<a href="/add/coupon" class="btn btn-primary">Add Coupon</a> 				 
						</div>
					</div>
				</div>
				<!--end breadcrumb-->

				<hr>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="example_length"><label>Show <select name="example_length" aria-controls="example" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="example_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example" class="table table-striped table-bordered dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
								<thead>
			<tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Sl: activate to sort column descending" style="width: 25px;">Sl</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Coupon Name : activate to sort column ascending" style="width: 126px;">Coupon Name </th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Coupon Discount  : activate to sort column ascending" style="width: 151px;">Coupon Discount  </th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Coupon Validity  : activate to sort column ascending" style="width: 140px;">Coupon Validity  </th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Coupon Status  : activate to sort column ascending" style="width: 131px;">Coupon Status  </th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 146px;">Action</th></tr>
		</thead>
		<tbody>
			
			
		<?php 
$sql = $conn->query("SELECT * FROM coupons");
if ($sql->num_rows <= 0):
?>
    <tr role="row" class="odd">
        <td>No row found</td>
    </tr>
<?php else:
$num = 1;
    while ($row = $sql->fetch_assoc()): ?>
        <tr role="row" class="odd">
            <td class="sorting_1"><?= $num ?></td>
            <td><?= $row['coupon_name'] ?></td>
            <td><?= $row['coupon_discount'] ?></td>
            <td><?= $row['coupon_validity'] ?></td>
            <td>
				<?php if($row['coupon_validity'] >= date('Y-m-d')):?>
                <span class="badge rounded-pill bg-success">Valid</span>
				<?php else:?>
					<span class="badge rounded-pill bg-success">Invalid</span>
					<?php endif?>
            </td>
            <td>
                <a href="/edit/coupon/<?= $row['id'] ?>" class="btn btn-info">Edit</a>
                <a href="/delete/coupon/<?= $row['id'] ?>" id="delete" class="btn btn-danger" >Delete</a>
            </td> 
        </tr>
    <?php $num++;
	 endwhile;
endif;
?>

		</tbody>
		<tfoot>
			<tr><th rowspan="1" colspan="1">Sl</th><th rowspan="1" colspan="1">Coupon Name </th><th rowspan="1" colspan="1">Coupon Discount  </th><th rowspan="1" colspan="1">Coupon Validity  </th><th rowspan="1" colspan="1">Coupon Status  </th><th rowspan="1" colspan="1">Action</th></tr>
		</tfoot>
	</table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing 1 to 1 of 1 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example_previous"><a href="#" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Prev</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next disabled" id="example_next"><a href="#" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
						</div>
					</div>
				</div>



			</div>



            <?php
include "views/users/admin/partials/footer.php";
?>
