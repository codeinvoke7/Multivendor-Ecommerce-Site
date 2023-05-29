

<?php 
require "controller/sessionController.php";
adminSession();
include "partials/headertags.php";

// <!--start sidebar wrapper -->
include "partials/sidebar.php";
// <!--end sidebar wrapper -->

// <!--start sidebar wrapper -->
include "partials/header.php";
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
								<form action="/controller/categoryController.php" method="post" id="catForm" enctype="multipart/form-data">
									<div class="mb-3">
										<label class="form-label">Category Name</label>
										<input type="text" name="name" id="name" class="form-control" placeholder="Category name">
                                        <p class="text-danger" id="nameError"></p>
									</div>
									<div class="mb-3">
										<label class="form-label">Slug</label>
										<input type="text" name="slug" id="slug" class="form-control" placeholder="slug">
                                        <p class="text-danger" id="slugError"></p>
									</div>
									<div class="mb-3">
										<label class="form-label">Input File:</label>
										<input type="file" id="cat-img" class="form-control" name="file" onchange="prevCatImage(this)">
                                        <p class="text-danger" id="fileError"></p>
									</div>
                                    <div id="prev-cat-img">

                                    </div>
                                    <div class="text-center">
                                    <button id="btn" type="submit" class="btn btn-primary text-center" name="add-cat">Add</button>
                                </div>
								</form>
							</div>
						</div>
                                        </div>

<script>
    function prevCatImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var img = document.createElement('img');
                img.src= e.target.result;
                img.width = 200;
                document.getElementById('prev-cat-img').appendChild(img);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function validateInput(e) {
        e.preventDefault();
        const input =document.getElementsByTagName('input');
        const nameError = document.getElementById('nameError');
        const slugError = document.getElementById('slugError');
        const fileError = document.getElementById('fileError');

        const isValid = true;
        if (input[1].value.trim() == '') {
                nameError.innerHTML = 'Category name should not be empty';
                isValid = false;
       }
        
        if (input[2].value.trim() == '') {
            slugError.innerHTML = 'Slug should not be empty';
            isValid = false;
    }

    if (input[3].value == '') {
            
            fileError.innerHTML = 'Upload file';
       isValid = false;
    }

    if (isValid) {
        document.getElementById('catForm').submit();
    }
}

document.getElementById('catForm').addEventListener('submit', validateInput);
   
</script>
 <?php
include "partials/footer.php";
?>