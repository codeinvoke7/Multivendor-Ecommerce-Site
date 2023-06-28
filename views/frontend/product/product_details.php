<?php 
session_start();
require "./database.php";

if (isset($_SERVER['REQUEST_URI'])) {
    $uri = $_SERVER['REQUEST_URI'];
    $id = explode('/', $uri);
   $id = $id['3'];
    
} 
 // Fetch the product
        $stmt = $conn->prepare("SELECT products.*, categories.category, sub_categories.subcategory_name, brands.brand_name, COALESCE(users.shop_name, 'Owner') AS shop_name,
        users.phone, users.address, users.vendor_bio, users.photo  
                FROM products
                INNER JOIN categories ON products.category_id = categories.id
                INNER JOIN sub_categories ON products.subcategory_id = sub_categories.id
                INNER JOIN brands ON products.brand_id = brands.id
                LEFT JOIN users ON products.vendor_id = users.id
                WHERE products.id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();

          
                $product_id = $row['id'];
                $product_name = $row['product_name'];
                $product_slug = $row['product_slug']; 
                $selling_price = $row['selling_price'];
                $discount_price = $row['discount_price'];
                $short_descp = $row['short_descp'];
                $long_descp = $row['long_descp'];
                $category_name = $row['category'];
                $subcategory_name = $row['subcategory_name'];
                $brand_name = $row['brand_name'];
                $thumbnail = $row['product_thumbnail'];
                $thumbnail = explode('.', $thumbnail);
                $product_thumbnail = $thumbnail[1] . '.' . $thumbnail[2];
                $product_code = $row['product_code'];
                $product_tags = $row['product_tags'];
                $product_qty = $row['product_qty'];
                $category_id = $row['category_id'];

                $color = $row['product_color'];
                $product_color = explode(',', $color);
            
                $size = $row['product_size'];
                $product_size = explode(',', $size);

                $vendor_id = $row['vendor_id'];
                $vendor = $row['shop_name'];
                $vendor_phone = $row['phone'];
                $vendor_address = $row['address'];
                $vendor_bio = $row['vendor_bio'];
                $vendor_photo = $row['photo'];
                $photo =  explode('.', $vendor_photo);
        }

        $stmtImages = $conn->prepare("SELECT * FROM product_images WHERE product_id = ?");
        $stmtImages->bind_param('i', $id);
        $stmtImages->execute();
        $getImages = $stmtImages->get_result();
        
       

        $stmtRelatedProduct = $conn->prepare("SELECT * FROM products WHERE category_id = ? AND id <> ? ORDER BY id DESC  LIMIT 4");
        $stmtRelatedProduct->bind_param('ii', $category_id, $id);
        $stmtRelatedProduct->execute();
        $getRelatedProduct = $stmtRelatedProduct->get_result();
        

  

     
include "views/public/partials/header.php";


?>

<div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb mt-2">
                    <a href="/" rel="nofollow" class="me-2 text-success"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span class="bx bx-chevron-right me-2 mt-1"></span>
                     <a href="shop-grid-right.html" class="me-2 text-success"><?= $category_name ?> </a> 
                    <span class="bx bx-chevron-right me-2 mt-1"> </span> 
                    <?= $subcategory_name ?> 
                    <span class="bx bx-chevron-right mx-2 mt-1"></span>
                    <?= $product_slug ?>
                </div>
            </div>
        </div>
<hr>
<!-- content -->
<section class="py-5">
  <div class="container">
    <div class="row gx-4">
      <aside class="col-lg-6">
        <div class="border rounded-4 mb-3 d-flex justify-content-center p-3">
          <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="<?= $product_thumbnail ?>">
            <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="<?= $product_thumbnail ?>" />
          </a>
        </div>
        <div class="d-flex justify-content-center img-thumbnails mb-3">
            <?php 
            while($images = $getImages->fetch_assoc()): 
                $img = explode('.', $images['image_path']);
               $multiImage = $img[1] . '.' . $img[2];
               ?>
            
          <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="<?= $multiImage ?>" class="item-thumb">
            <img width="60" height="60" class="rounded-2" src="<?= $multiImage ?>" />
          </a>
          <?php endwhile ?>
        </div>
        <!-- thumbs-wrap.// -->
        <!-- gallery-wrap .end// -->
      </aside>
      <main class="col-lg-6">
        <div class="ps-lg-3">
          <h4 class="title text-dark" id="dpname">
          <?= $product_name ?>
          </h4>
          <div class="d-flex flex-row my-3">
            <div class="text-warning mb-1 me-2">
              <i class="bx bx-star  text-warning"></i>
              <i class="bx bx-star  text-warning"></i>
              <i class="bx bx-star  text-warning"></i>
              <i class="bx bx-star  text-warning"></i>
              <i class="fbx bx-star-half-alt  text-warning"></i>
              <span class="ms-1">
                4.5
              </span>
            </div>
            <span class="text-muted"><i class="bx bx-cart fa-sm mx-1"></i>154 orders</span>
            <?php 
            if ($product_qty > 0): ?>
            <span class="text-success ms-2">In stock</span>
            <?php else:?>
                <span class="text-success ms-2">Out of stock</span>
                <?php endif ?>
          </div>

          <?php if($discount_price === NULL):?>
          <div class="mb-3">
            <span class="h5 custom-text-color"><?= $selling_price ?></span>
            <span class="text-muted">/per box</span>
          </div>
          <?php else:?>
            <div class="mb-3">
            <span class="h2 custom-text-color fw-bold">₦<?= $discount_price ?></span>
            <span class="h5 text-secondary"><s>₦<?= $selling_price ?></s></span>
        </div>
        <?php endif?>
          <p>
          <?= $short_descp ?>
          </p>

          

          <div class="row mb-4">
            <?php if($product_size === NULL): else:?>

            <div class="col-md-3 col-12">
              <label class="mb-2">Size</label>
              <select class="form-select border border-secondary" id="dsize" style="height: 35px;">
              <?php foreach($product_size as $size):?>
                <option  value="<?= $size ?>"><?= $size ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <?php endif?>

            <?php if($product_color === NULL): else:?>

            <div class="col-md-3 col-12">
              <label class="mb-2">Color</label>
              <select class="form-select border border-secondary" id="dcolor" style="height: 35px;">
               <?php foreach($product_color as $color):?>
                <option value="<?= $color ?>"><?= $color ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <?php endif?>
            <!-- col.// -->
            <div class="col-md-6 col-12 mb-3">
              <label class="mb-2">Quantity</label>
              <div class="detail-extralink mb-30 d-flex">
              <div class="detail-qty border radius">
              <a type="submit" class="qty-down"><i class="bx bx-chevron-down"></i></a>
                
                <input id="dqty" type="text" name="quantity" class="qty-val" value="1" min="1">
                <a  type="submit" class="qty-up" ><i class="bx bx-chevron-up"></i></a>
             </div>
             </div>
            </div>
          </div>
          <input type="hidden" id="dproduct_id" value="<?= $product_id ?>">
        <input type="hidden" id="vproduct_id" value="<?= $vendor_id ?>">
          <a href="/mycart" class="btn btn-warning shadow-0" onclick="addToCartDetails()"> Buy now </a>
          <button type="submit" class="btn fillBtn shadow-0" onclick="addToCartDetails()"> <i class="me-1 bx bx-cart"></i> Add to cart </button>
          <a href="#" class="btn btn-light border border-secondary py-2 icon-hover px-3"> <i class="me-1 fa fa-heart fa-lg"></i> Save </a>
         
          
        </div>
        <h6 class="mt-3">Sold By: <span class=""><?= $vendor?></span></h6>
        <hr>
        <div class="row">
            <dt class="col-3">Brand:</dt>
            <dd class="col-9"><?= $brand_name ?></dd>

            <dt class="col-3">Category:</dt>
            <dd class="col-9"><?= $category_name ?></dd>

            <dt class="col-3">Subcategory:</dt>
            <dd class="col-9"><?= $subcategory_name ?></dd>

            <dt class="col-3">Product_Code:</dt>
            <dd class="col-9"><?= $product_code ?></dd>

            <dt class="col-3">Tags:</dt>
            <dd class="col-9"><?= $product_tags ?></dd>
          </div>

         
      </main>
    </div>
  </div>
</section>
<!-- content -->

<section class="bg-light border-top py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mb-4">
        <div class="border rounded px-3 py-2 bg-white">
          <!-- Pills navs -->
          <ul class="nav nav-pills nav-justified mb-3 bg-white" id="ex1" role="tablist">
            <li class="nav-item d-flex" role="presentation">
              <a class="nav-link d-flex align-items-center justify-content-center text-decoration-none text-secondary active current" id="ex1-tab-1" data-mdb-toggle="pill" href="#ex1-pills-1" role="tab" aria-controls="ex1-pills-1" aria-selected="true">Specification</a>
            </li>
            <li class="nav-item d-flex" role="presentation">
              <a class="nav-link d-flex align-items-center justify-content-center text-decoration-none text-secondary" id="ex1-tab-2" data-mdb-toggle="pill" href="#ex1-pills-2" role="tab" aria-controls="ex1-pills-2" aria-selected="false">Warranty info</a>
            </li>
            <li class="nav-item d-flex" role="presentation">
              <a class="nav-link d-flex align-items-center justify-content-center text-decoration-none text-secondary" id="ex1-tab-3" data-mdb-toggle="pill" href="#ex1-pills-3" role="tab" aria-controls="ex1-pills-3" aria-selected="false">Shipping info</a>
            </li>
            <li class="nav-item d-flex" role="presentation">
              <a class="nav-link d-flex align-items-center justify-content-center text-decoration-none text-secondary" id="ex1-tab-4" data-mdb-toggle="pill" href="#ex1-pills-4" role="tab" aria-controls="ex1-pills-4" aria-selected="false">Seller profile</a>
            </li>
          </ul>
          <!-- Pills navs -->

          <!-- Pills content -->
          <div class="tab-content" id="ex1-content">
            <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel" aria-labelledby="ex1-tab-1">
              <p>
                <?= $long_descp ?>
              </p>
              <table class="table border mt-3 mb-2">
                <tr>
                  <th class="py-2">Display:</th>
                  <td class="py-2">13.3-inch LED-backlit display with IPS</td>
                </tr>
                <tr>
                  <th class="py-2">Processor capacity:</th>
                  <td class="py-2">2.3GHz dual-core Intel Core i5</td>
                </tr>
                <tr>
                  <th class="py-2">Camera quality:</th>
                  <td class="py-2">720p FaceTime HD camera</td>
                </tr>
                <tr>
                  <th class="py-2">Memory</th>
                  <td class="py-2">8 GB RAM or 16 GB RAM</td>
                </tr>
                <tr>
                  <th class="py-2">Graphics</th>
                  <td class="py-2">Intel Iris Plus Graphics 640</td>
                </tr>
              </table>
            </div>
            <div class="tab-pane fade mb-2" id="ex1-pills-2" role="tabpanel" aria-labelledby="ex1-tab-2">
              Tab content or sample information now <br />
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
              aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
              officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
              nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            </div>
            <div class="tab-pane fade mb-2" id="ex1-pills-3" role="tabpanel" aria-labelledby="ex1-tab-3">
              Another tab content or sample information now <br />
              Dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
              commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
              mollit anim id est laborum.
            </div>
            <div class="tab-pane fade mb-2" id="ex1-pills-4" role="tabpanel" aria-labelledby="ex1-tab-4">
    <div class="vendor-logo d-flex mb-30">
        <img src="<?= !empty($vendor_photo) ? $photo[1] . '.' . $photo[2] : '/views/public/uploads/no_image.jpg' ?>" alt="xx" width="100px"/>
        <div class="vendor-name ms-4">
        	<h6>
                <a href="vendor-details-2.html " class="text-decoration-none text-success"><?= $vendor ?></a>
            </h6>
            <div class="product-rate-cover text-end">
                <div class="product-rate d-inline-block">
                    <div class="product-rating" style="width: 90%"></div>
                </div>
                <span class="font-small ml-5 text-muted">
                    <i class="bx bx-star text-warning"></i>
                <i class="bx bx-star text-warning"></i>
                <i class="bx bx-star text-warning"></i>
                <i class="bx bx-star text-warning"></i>
                 (32 reviews)</span>
            </div>
        </div>
    </div>
    <?php if($vendor_id == NULL): ?>
<ul class="contact-infor mb-50 mt-3 list-unstyled">
        <li><i class="bx bx-location-plus  text-success"></i><strong>Address: </strong> <span>Owner</span></li>
        <li><i class="bx bx-phone-call me-2  text-success"></i><strong>Contact Seller:</strong><span>Owner</span></li>
    </ul>
    <?php else :?>
    <ul class="contact-infor mb-50 mt-3 list-unstyled">
   <li><i class="bx bx-location-plus  text-success"></i><strong>Address: </strong> <span><?= $vendor_address ?></span></li>
   <li><i class="bx bx-phone-call me-2  text-success"></i><strong>Contact Seller: </strong><span><?= $vendor_phone ?></span></li>
</ul>

   <?php endif ?>

   <?php if($vendor_id == NULL): ?>
 <p>Owner Information</p>
 <?php else :?>
 <p><?= $vendor_bio ?></p>
<?php endif ?>

</div>
            </div>
          </div>
          <!-- Pills content -->
        
      </div>
      <div class="col-lg-4">
        <div class="px-0 border rounded-2 shadow-0">
          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Similar items</h5>
                <?php while ($relatedProducts = $getRelatedProduct->fetch_assoc()): 
                   $thmb =  $relatedProducts['product_thumbnail'];
                   $thmbImage = explode('.', $thmb);
                   $thumbnail = $thmbImage[1] . '.' . $thmbImage[2];
                    ?>
                 
              <div class="d-flex mb-3">
                <a href="/product/details/<?= $relatedProducts['id'] ?>/<?= $relatedProducts['product_slug'] ?>" class="me-3">
                  <img src="<?= $thumbnail ?>" style="max-width: 100%; width:60px; height: 60px;" class="img-md img-thumbnail" />
                </a>
                <div class="info">
                  <a href="/product/details/<?= $relatedProducts['id'] ?>/<?= $relatedProducts['product_slug'] ?>" class="nav-link mb-1">
                  <?= $relatedProducts['product_name'] ?>
                  </a>
                  <?php if($relatedProducts['discount_price'] === NULL):?>
                    <strong class="text-success">₦<?= $relatedProducts['selling_price'] ?></strong>
          <?php else:?>
            <strong class="text-success">₦<?= $relatedProducts['discount_price'] ?></strong>
            <?php endif?>
                </div>
              </div>
                    <?php endwhile?>
            </div>
          </div>
        </div>
      </div>
 </div>
    </div>
  </div>
</section>
<!-- Footer -->




        <!-- footer -->
	<?php require "views/public/partials/footer.php" ?>
	<!-- footer end -->

