
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
					<div class="breadcrumb-title pe-3">All Active Vendor</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Active Vendor</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">

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
			<tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Sl: activate to sort column descending" style="width: 17px;">Sl</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Shop Name : activate to sort column ascending" style="width: 113px;">Shop Name </th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Vendor Username : activate to sort column ascending" style="width: 131px;">Vendor Name </th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Vendor Email : activate to sort column ascending" style="width: 166px;">Vendor Email </th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Join Date  : activate to sort column ascending" style="width: 72px;">Join Date  </th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status : activate to sort column ascending" style="width: 56px;">Status </th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 126px;">Action</th>
            </tr>
		</thead>
		<tbody>
        <?php
            
            $sql = $conn->query("SELECT * FROM `users` WHERE `role` = 'vendor' AND `status` = 1");
            $num = 1;
            if ($sql->num_rows <= 0):?>
                <tr role="row" class="odd">
				<td >No row found </td>
                </tr>
         <?php else: 
         while ($row = $sql->fetch_assoc()):?>
			<tr role="row" class="even">
				<td class="sorting_1"><?= $num ?></td>
				<td><?= $row['shop_name'] ?></td>
				<td><?= $row['fullname'] ?></td>
				<td><?= $row['email'] ?></td>
				<td><?= date('d M, Y', strtotime($row['date'])) ?></td>
				<td> <span class="btn btn-success">Active</span>   </td>

				<td>
					<a href="/active/vendor/details/<?= $row['id'] ?>" class="btn btn-info">Vendor Details</a>
				</td> 
			</tr>
            <?php 
            $num++;
        endwhile;
            endif;
        ?>
        </tbody>
		<tfoot>
			<tr><th rowspan="1" colspan="1">Sl</th>
            <th rowspan="1" colspan="1">Shop Name </th>
            <th rowspan="1" colspan="1">Vendor Name </th>
            <th rowspan="1" colspan="1">Vendor Email </th>
            <th rowspan="1" colspan="1">Join Date  </th>
            <th rowspan="1" colspan="1">Status </th>
            <th rowspan="1" colspan="1">Action</th></tr>
		</tfoot>
	</table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing 1 to 4 of 4 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example_previous"><a href="#" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Prev</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next disabled" id="example_next"><a href="#" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
						</div>
					</div>
				</div>



			</div>


<?php
include "views/users/admin/partials/footer.php";
?>
