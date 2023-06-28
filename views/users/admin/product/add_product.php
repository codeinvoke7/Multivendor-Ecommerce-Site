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
					<div class="breadcrumb-title pe-3">Add New Product</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add New Product</li>
							</ol>
						</nav>
					</div>

				</div>
				<!--end breadcrumb-->

<div class="card">
  <div class="card-body p-4">
	  <h5 class="card-title">Add New Product</h5>
	  <hr/>

      <form id="myForm" method="post" action="/product/store" enctype="multipart/form-data" >
    
       <div class="form-body mt-4">
	    <div class="row">
		   <div class="col-lg-8">
           <div class="border border-3 p-4 rounded">


			<div class="form-group mb-3">
				<label for="inputProductTitle" class="form-label">Product Name</label>
				<input type="text" name="product_name" class="form-control" id="inputProductTitle" placeholder="Enter product title">
			  </div>

            <div class="mb-3">
				<label for="inputProductTag" class="form-label">Product Tags</label>
				<input type="text" name="product_tags" class="form-control visually-hidden" id="inputProductTag" data-role="tagsinput" value="new product,top product">
			  </div>

			  <div class="mb-3">
				<label for="inputProductSize" class="form-label">Product Size</label>
				<input type="text" name="product_size" class="form-control visually-hidden" id="inputProductSize" data-role="tagsinput" value="Small,Medium,Large ">
			  </div>

			  <div class="mb-3">
				<label for="inputProductColor" class="form-label">Product Color</label>
				<input type="text" name="product_color" class="form-control visually-hidden" id="inputProductColor" data-role="tagsinput" value="Red,Blue,Black">
			  </div>



			  <div class="mb-3">
				<label for="short_descp" class="form-label">Short Description</label>
				<textarea name="short_descp" class="form-control" id="inputProductDescription" rows="3"></textarea>
			  </div>

			   <div class="mb-3">
				<label for="mytextarea" class="form-label">Long Description</label>
				<textarea id="mytextarea" name="long_descp">Hello, World!</textarea>
			  </div>



              <div class="form-group mb-3">
				<label for="inputProductThumbnail" class="form-label">Main Thumbnail</label>
				<input name="product_thumbnail" class="form-control" type="file" id="inputProductThumbnail" onchange="mainThumUrl(this)" />

				<img src="" id="mainThmb" />
			  </div>



  <div class="mb-3">
				<label for="inputMultiImages" class="form-label">Multiple Image</label>
				<input class="form-control" name="multi_img[]" type="file" id="inputMultiImages" multiple="">

			<div class="row" id="preview_img"></div>
			  </div>



            </div>
		   </div>
		   <div class="col-lg-4">
			<div class="border border-3 p-4 rounded">
              <div class="row g-3">
				<div class="form-group col-md-6">
					<label for="inputPrice" class="form-label">Product Price</label>
					<input type="text" name="selling_price" class="form-control" id="inputPrice" placeholder="00.00">
				  </div>
				  <div class="col-md-6">
					<label for="inputDiscountPrice" class="form-label">Discount Price </label>
					<input type="text" name="discount_price" class="form-control" id="inputDiscountPrice" placeholder="00.00">
				  </div>
				  <div class="form-group col-md-6">
					<label for="inputProductCode" class="form-label">Product Code</label>
					<input type="text" name="product_code" class="form-control" id="inputProductCode" placeholder="00.00">
				  </div>
                  <div class="form-group col-md-6">
					<label for="inputQty" class="form-label">Product Quantity</label>
					<input type="text" name="product_qty" class="form-control" id="inputQty" placeholder="00.00">
				  </div>

				  <div class="col-12">
					<label for="inputProductBrand" class="form-label">Product Brand</label>
					<select name="brand_id" class="form-select" id="inputProductBrand">
						<option></option>
                        <?php
                        $sql = $conn->query("SELECT * FROM `brands`");
                                        while ($row = $sql->fetch_assoc()) {
                                           ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['brand_name'] ?></option>
                                        <?php
                                        }
                                    ?>
					  </select>
				  </div>

				  <div class="form-group col-12">
					<label for="inputCategory" class="form-label">Product Category</label>
					<select name="category_id" class="form-select" id="inputCategory">
						<option></option>
						<?php
                        $sql = $conn->query("SELECT * FROM `categories`");
                                        while ($row = $sql->fetch_assoc()) {
                                           ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['category'] ?></option>
                                        <?php
                                        }
                                    ?>
					  </select>
				  </div>

				  <div class="col-12">
					<label for="InputSubcategory" class="form-label">Product SubCategory</label>
					<select name="subcategory_id" class="form-select" id="InputSubcategory">
						<option></option>
					  </select>
				  </div>
				  <div class="col-12">
					<label for="inputVendor" class="form-label">Select Vendor</label>
					<select name="vendor_id" class="form-select" id="inputVendor">
					<option value="">Select a vendor</option>
						<?php
                        $sql = $conn->query("SELECT * FROM `users` WHERE `role`= 'vendor'");
                                        while ($row = $sql->fetch_assoc()) {
                                           ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['shop_name'] ?></option>
                                        <?php
                                        }
                                    ?>
					  </select>
				  </div>


				  <div class="col-12">

	 <div class="row g-3">

	 <div class="col-md-6">	
    <div class="form-check">
        <input class="form-check-input" name="hot_deals" type="checkbox" value="1" id="flexCheckDefault">
			<label class="form-check-label" for="flexCheckDefault"> Hot Deals</label>
		</div>
	</div>

	<div class="col-md-6">	
    <div class="form-check">
			<input class="form-check-input" name="featured" type="checkbox" value="1" id="flexCheckDefault">
			<label class="form-check-label" for="flexCheckDefault">Featured</label>
		</div>
	</div>




<div class="col-md-6">	
    <div class="form-check">
			<input class="form-check-input" name="special_offer" type="checkbox" value="1" id="flexCheckDefault">
			<label class="form-check-label" for="flexCheckDefault">Special Offer</label>
		</div>
	</div>


	<div class="col-md-6">	
    <div class="form-check">
			<input class="form-check-input" name="special_deals" type="checkbox" value="1" id="flexCheckDefault">
			<label class="form-check-label" for="flexCheckDefault">Special Deals</label>
		</div>
	</div>



		</div> <!-- // end row  -->

				  </div>

<hr>
				  <div class="col-12">
					  <div class="d-grid">
                        <input type="submit" class="btn btn-primary px-4" name="save" value="Save Changes" />

					  </div>
				  </div>
			  </div> 
		  </div>
		  </div>
	   </div><!--end row-->
	</div>

</form>

  </div>
</div>

			</div>


            
   <?php
include "views/users/admin/partials/footer.php";
?>
