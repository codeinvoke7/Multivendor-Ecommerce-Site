

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
    $subcategory_id = explode('/', $uri);
   $subcategory_id = $subcategory_id['3'];
   
   $sql = $conn->query("SELECT * FROM `sub_categories` WHERE id = $subcategory_id");
        $row = $sql->fetch_assoc();
        $cat_id = $row['category_id'];
        $subcat_name = $row['subcategory_name'];
}
?>

<div class="page-content">
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add Sub-Category</li>
							</ol>
						</nav>
					</div>
				</div>
                    <div class="card container">
							<div class="card-body">
								<form action="/update/subcategory/<?= $subcategory_id ?>" method="post" id="catForm" enctype="multipart/form-data">
									
                                <div class="mb-3">
                                <label class="form-label">Parent Category</label>
								<select class="form-select mb-3" id="category" name="category_id" aria-label="Default select example">
									<option selected="" value="">Select Parent Category</option>
                                    <?php
                                    $sql = $conn->query("SELECT * FROM `categories`");
                                    if ($sql->num_rows < 1) {
                                        ?>
                                        <option value="no-cat">No Categories</option>
                                        <?php
                                    }else {
                                        while ($row = $sql->fetch_assoc()) {
                                           ?>
                                        <option value="<?= $row['id'] ?>" <?= $row['id'] == $cat_id ? 'selected' : '' ?>><?= $row['category'] ?></option>
                                        <?php
                                        }
                                    }
                                    ?>
								</select>
                                </div>
                                <div class="mb-3 form-group">
										<label class="form-label">Sub-category Name</label>
										<input type="text" name="name" id="name" class="form-control" placeholder="Subcategory name" value="<?= $subcat_name ?>">
                      
									</div>
                                    <div class="text-center">
                                    <button id="btn" type="submit" class="btn btn-primary text-center" name="save_changes">Save Changes</button>
                                </div>
								</form>
							</div>
						</div>
                                        </div>


 <?php
include "views/users/admin/partials/footer.php";
?>