

<?php 
require "./controller/sessionController.php";
adminSession();
include "views/users/admin/partials/headertags.php";

// <!--start sidebar wrapper -->
include "views/users/admin/partials/sidebar.php";
// <!--end sidebar wrapper -->

// <!--start sidebar wrapper -->
include "views/users/admin/partials/header.php";
// <!--end sidebar wrapper -->
?>

<div class="page-content">
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add Category</li>
							</ol>
						</nav>
					</div>
				</div>
<div class="card container">
							<div class="card-body">
								<form action="/category/store" method="post" id="catForm" enctype="multipart/form-data">
									<div class="mb-3 form-group">
										<label class="form-label">Category Name</label>
										<input type="text" name="name" id="name" class="form-control" placeholder="Category name">
                                  
									</div>
									<div class="mb-3">
										<label class="form-label">Input File:</label>
										<input type="file" id="cat-img" class="form-control" name="file" onchange="prevCatImage(this)">
                                 
									</div>
                                    <div >
                                        <img id="showImage" src="/views/public/uploads/no_image.jpg" alt="vv" width="200">
                                        </div>
                                    <div class="text-center">
                                    <button id="btn" type="submit" class="btn btn-primary text-center" name="save">Save Changes</button>
                                </div>
								</form>
							</div>
						</div>
                                        </div>


 <?php
include "views/users/admin/partials/footer.php";
?>