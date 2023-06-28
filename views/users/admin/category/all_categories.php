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


<!--breadcrumb-->
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">All Category</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Category</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="/add/category" class="btn btn-primary">Add Category</a> 			

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
<tr role="row"><th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Sl: activate to sort column ascending" style="width: 55px;" aria-sort="descending">Sl</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Category Name : activate to sort column ascending" style="width: 287px;">Category Name </th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Category Image : activate to sort column ascending" style="width: 222px;">Category Image </th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 231px;">Action</th></tr>
</thead>
<tbody>

<?php
$num = 1;
$sql = $conn->query("SELECT * FROM `categories`");
if ($sql->num_rows <= 0) {
	?>
	<tr role="row" class="odd">
	<td>No row found</td>
	<?php
}else {
	while ($row = $sql->fetch_assoc()) {
		?>
		<tr role="row" class="odd">
    <td class="sorting_1"><?= $num ?></td>
    <td><?= $row['category'] ?></td>
    <td> <img src="/views/public/uploads/category/<?= $row['image'] ?>" style="width: 70px; height:40px;">  </td>
	<td><?= $row['status'] === '1' ? '<div class="text-center"><p class="badge bg-primary">'. 'Active'. '</p></div>' :
	 '<div class="text-center"><p class="badge bg-primary">'. 'Inactive'. '</p></div>' ?></td>
	
	<td>
		<?php 
		if($row['status'] === '0'){
		?>
		<a href="/status/category/<?= $row['id'] ?>" title="active" class="btn btn-info text-white"><i class="bx bx-like  "></i></a>
        <?php
		}else{
			?>
					<a href="/status/category/<?= $row['id'] ?>" title="inactive" class="btn btn-info text-white"><i class="bx bx-dislike  "></i></a>
			<?php
		}
		?>
		<a href="/edit/category/<?= $row['id'] ?>" class="btn btn-info">Edit</a>
        <a href="/delete/category/<?= $row['id'] ?>" 
		onclick="event.preventDefault(); showConfirmationDialog('<?= $row['id'] ?>')" class="btn btn-danger" id="delete">Delete</a>
    </td> 
</tr>
<?php
$num++;
	}
}
?>

<tfoot>
<tr>
	<th rowspan="1" colspan="1">Sl</th>
	<th rowspan="1" colspan="1">Category Name </th>
	<th rowspan="1" colspan="1">Category Image </th>
	<th rowspan="1" colspan="1">Status </th>
	<th rowspan="1" colspan="1">Action</th>
</tr>
</tfoot>
</table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing 1 to 10 of 10 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example_previous"><a href="#" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Prev</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next disabled" id="example_next"><a href="#" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
            </div>
        </div>
    </div>



</div>

   <?php
include "views/users/admin/partials/footer.php";
?>
