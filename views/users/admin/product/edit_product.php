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
    $product_id = explode('/', $uri);
   $product_id = $product_id['3'];
   
   

   $sql = $conn->query("SELECT * FROM `products` WHERE id = $product_id");
        $row = $sql->fetch_assoc();
        $product_name = $row['product_name'];
    $product_tags = $row['product_tags'];
    $product_size = $row['product_size'];
    $product_color = $row['product_color'];
    $short_descp = $row['short_descp'];
    $long_descp = $row['long_descp'];
    $thumbnail =$row['product_thumbnail'];
    $selling_price = $row['selling_price'];
    $discount_price = $row['discount_price'];
    $product_code = $row['product_code'];
    $product_qty = $row['product_qty'];
    $brand_id = $row['brand_id'];
    $category_id = $row['category_id'];
    $subcategory_id = $row['subcategory_id'];
    $vendor_id = $row['vendor_id'];
    $hot_deals = $row['hot_deals'];
    $featured = $row['featured'];
    $special_offer = $row['special_offer'];
    $special_deals = $row['special_deals'];
}
?>

<div class="page-content">

				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Update Product</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Update Product</li>
							</ol>
						</nav>
					</div>

				</div>
				<!--end breadcrumb-->

<div class="card">
  <div class="card-body p-4">
	  <h5 class="card-title">Update Product</h5>
	  <hr/>

      <form id="myForm" method="post" action="/update/product/<?= $product_id ?>" enctype="multipart/form-data" >
    
       <div class="form-body mt-4">
	    <div class="row">
		   <div class="col-lg-8">
           <div class="border border-3 p-4 rounded">


			<div class="form-group mb-3">
				<label for="inputProductTitle" class="form-label">Product Name</label>
				<input type="text" name="product_name" class="form-control" id="inputProductTitle" placeholder="Enter product title" value="<?=$product_name?>">
			  </div>

            <div class="mb-3">
				<label for="inputProductTag" class="form-label">Product Tags</label>
				<input type="text" name="product_tags" class="form-control visually-hidden" id="inputProductTag" data-role="tagsinput" value="<?=$product_tags?>">
			  </div>

			  <div class="mb-3">
				<label for="inputProductSize" class="form-label">Product Size</label>
				<input type="text" name="product_size" class="form-control visually-hidden" id="inputProductSize" data-role="tagsinput" value="<?=$product_size?>">
			  </div>

			  <div class="mb-3">
				<label for="inputProductColor" class="form-label">Product Color</label>
				<input type="text" name="product_color" class="form-control visually-hidden" id="inputProductColor" data-role="tagsinput" value="<?=$product_color?>">
			  </div>



			  <div class="mb-3">
				<label for="inputProductDescription" class="form-label">Short Description</label>
				<textarea name="short_descp" class="form-control" id="inputProductDescription" rows="3"><?=$short_descp?></textarea>
			  </div>

			   <div class="mb-3">
				<label for="inputProductDescription" class="form-label">Long Description</label>
				<textarea id="mytextarea" name="long_descp"><?=$long_descp?></textarea>
			  </div>



             



            </div>
		   </div>
		   <div class="col-lg-4">
			<div class="border border-3 p-4 rounded">
              <div class="row g-3">
				<div class="form-group col-md-6">
					<label for="inputPrice" class="form-label">Product Price</label>
					<input type="text" name="selling_price" class="form-control" id="inputPrice" placeholder="00.00" value="<?=$selling_price?>">
				  </div>
				  <div class="col-md-6">
					<label for="inputCompareatprice" class="form-label">Discount Price </label>
					<input type="text" name="discount_price" class="form-control" id="inputCompareatprice" placeholder="00.00" value="<?=$discount_price?>">
				  </div>
				  <div class="form-group col-md-6">
					<label for="inputCostPerPrice" class="form-label">Product Code</label>
					<input type="text" name="product_code" class="form-control" id="inputCostPerPrice" placeholder="00.00" value="<?=$product_code?>">
				  </div>
                  <div class="form-group col-md-6">
					<label for="inputStarPoints" class="form-label">Product Quantity</label>
					<input type="text" name="product_qty" class="form-control" id="inputStarPoints" placeholder="00.00" value="<?=$product_qty?>">
				  </div>

				  <div class="col-12">
					<label for="inputProductType" class="form-label">Product Brand</label>
					<select name="brand_id" class="form-select" id="inputProductType">
						<option></option>
                        <?php
                        $sql = $conn->query("SELECT * FROM `brands`");
                                        while ($row = $sql->fetch_assoc()) {
                                           ?>
                                        <option value="<?= $row['id'] ?>" <?= $row['id'] == $brand_id ? 'selected' : ''  ?>><?= $row['brand_name'] ?></option>
                                        <?php
                                        }
                                    ?>
					  </select>
				  </div>

				  <div class="form-group col-12">
					<label for="inputVendor" class="form-label">Product Category</label>
					<select name="category_id" class="form-select" id="inputVendor">
						<option></option>
						<?php
                        $sql = $conn->query("SELECT * FROM `categories`");
                                        while ($row = $sql->fetch_assoc()) {
                                           ?>
                                        <option value="<?= $row['id'] ?>" <?= $row['id'] == $category_id ? 'selected' : ''  ?>><?= $row['category'] ?></option>
                                        <?php
                                        }
                                    ?>
					  </select>
				  </div>

				  <div class="col-12">
					<label for="inputCollection" class="form-label">Product SubCategory</label>
					<select name="subcategory_id" class="form-select" id="inputCollection">
						<option></option>
					  </select>
				  </div>
				  <div class="col-12">
					<label for="inputCollection" class="form-label">Select Vendor</label>
					<select name="vendor_id" class="form-select" id="inputCollection">
					<option value="">Select a vendor</option>
						<?php
                        $sql = $conn->query("SELECT * FROM `users` WHERE `role`= 'vendor'");
                                        while ($row = $sql->fetch_assoc()) {
                                           ?>
                                        <option value="<?= $row['id'] ?>" <?= $row['id'] == $vendor_id ? 'selected' : '' ?>><?= $row['shop_name'] ?></option>
                                        <?php
                                        }
                                    ?>
					  </select>
				  </div>


				  <div class="col-12">

	 <div class="row g-3">

	 <div class="col-md-6">	
    <div class="form-check">
        <input class="form-check-input" name="hot_deals" type="checkbox" value="1" id="flexCheckDefault" <?= $hot_deals == 1 ? 'checked' : '' ?>>
			<label class="form-check-label" for="flexCheckDefault"> Hot Deals</label>
		</div>
	</div>

	<div class="col-md-6">	
    <div class="form-check">
			<input class="form-check-input" name="featured" type="checkbox" value="1" id="flexCheckDefault" <?= $featured == 1 ? 'checked' : '' ?>>
			<label class="form-check-label" for="flexCheckDefault">Featured</label>
		</div>
	</div>




<div class="col-md-6">	
    <div class="form-check">
			<input class="form-check-input" name="special_offer" type="checkbox" value="1" id="flexCheckDefault" <?= $special_offer == 1 ? 'checked' : '' ?>>
			<label class="form-check-label" for="flexCheckDefault">Special Offer</label>
		</div>
	</div>


	<div class="col-md-6">	
    <div class="form-check">
			<input class="form-check-input" name="special_deals" type="checkbox" value="1" id="flexCheckDefault" <?= $special_deals == 1 ? 'checked' : '' ?>>
			<label class="form-check-label" for="flexCheckDefault">Special Deals</label>
		</div>
	</div>



		</div> <!-- // end row  -->

				  </div>

<hr>
				  <div class="col-12">
					  <div class="d-grid">
                        <input type="submit" class="btn btn-primary px-4" name="update_product" value="Save Changes" />

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


    <!-- /thumbnail update -->
    <div class="page-content">
                <h6 class="mb-0 text-uppercase">Update Main Thumbnail</h6>
                <hr>
            <div class="card">
                <form  method="post" action="/update/product/thumbnail/<?= $product_id ?>" enctype="multipart/form-data" >
          
                <div class="card-body">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Choose Thumbnail Image</label>
                        <input name="product_thumbnail" class="form-control" type="file" id="formFile">
                    </div>
                    <?php $img = explode('.', $thumbnail);?>                  
                    <div class="mb-3">
                        <img src="<?= $img[1]. '.'. $img[2] ?>" style="width: 100px; height: 100px">
                    </div>
                    <input type="submit" class="btn btn-primary px-4" name="update_thumbnail" value="Save Changes" />
                </div>
            </form>
            </div>
        </div>


        <!-- multi image update -->

        <div class="page-content">
	<h6 class="mb-0 text-uppercase">Update Multi Image </h6>
	<hr>
<div class="card">
<div class="card-body">
	<table class="table mb-0 table-striped">
		<thead>
			<tr>
				<th scope="col">#Sl</th>
				<th scope="col">Image</th>
				<th scope="col">Change Image </th>
				<th scope="col">Delete </th>
			</tr>
		</thead>
		<tbody>

            <form method="post" action="/update/product/images/<?= $product_id ?>" enctype="multipart/form-data" >

      <?php $sql = $conn->query("SELECT * FROM `product_images` WHERE product_id = $product_id");
   
   $num = 1;
    while ($product_images = $sql->fetch_assoc()):
        $img = explode('.', $product_images['image_path']);
    
    ?>
	<tr>
		<th scope="row"><?= $num ?></th>
		<td> <img src="<?= $img[1]. '.'. $img[2] ?>" style="width:70; height: 40px;"> </td>
		<td> <input type="file" class="form-group" name="multi_img[<?= $product_images['id'] ?>]"> </td>
		<td> 
	<input type="submit" class="btn btn-primary px-4" name="update_images" value="Update Image " />		
	<a href="{{ route('product.multiimg.delete',$img->id) }}" class="btn btn-danger" id="delete" > Delete </a>	
		</td>
	</tr>
   
<?php $num++; endwhile ?>	 

		</form>	 
		</tbody>
	</table>
</div>
</div>
</div>


            
   <?php
include "views/users/admin/partials/footer.php";
?>
