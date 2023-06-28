

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
?>



<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">All Pending Order</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Pending Order</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">

						</div>
					</div>
				</div>
				<!--end breadcrumb-->

				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
			<tr>
				<th>Sl</th>
				<th>Invoice no </th>
				<th>Amount </th>
				<th>Payment </th>
				<th>Date </th>
				<th>Status </th>
				<th>Action</th> 
			</tr>
		</thead>
		<tbody>
	<?php
	$sql = $conn->query("SELECT * FROM orders WHERE `status` = 'pending'");
	if ($sql->num_rows <= 0):?>
		<span> No Row Found </span>
<?php else:
$num = 1;
	while($row = $sql->fetch_assoc()): ?>	
			<tr>
				<td><?= $num ?> </td>
				<td><?= $row['invoice_no'] ?></td>
				<td>₦<?= $row['amount'] ?></td>
				<td><?= $row['payment_method'] ?></td>
				<td><?= $row['order_date'] ?></td>
                <td> <span class="badge rounded-pill bg-success"><?= $row['status'] ?></span></td> 

				<td>
<a href=" " class="btn btn-info" title="Details"><i class="bx bx-show"></i> </a>


				</td> 
			</tr>
			<?php $num++; 
		endwhile; 
		endif ?>


		</tbody>
		<tfoot>
			<tr>
				<th>Sl</th>
				<th>Invoice no </th>
				<th>Amount </th>
				<th>Payment </th>
				<th>Status </th>
				<th>Date </th>
				<th>Action</th> 
			</tr>
		</tfoot>
	</table>
						</div>
					</div>
				</div>



			</div>



			<?php
include "views/users/admin/partials/footer.php";
?>