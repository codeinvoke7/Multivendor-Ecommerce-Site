<!-- electronics cat -->
<div class="container-fluid container-lg">
    <div class="d-flex justify-content-between">
        <h3 class="fs-5 fw-bold mt-4">ELECTRONICS</h3>
        <a class="icon-link text-decoration-none text-secondary" href="#">
            See more
            <i class="bx bx-right-arrow-alt"></i>
        </a>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="row row-cols-lg-12 row-cols-md-6">
                <?php 
                $sql = $conn->query("SELECT products.*, categories.category FROM `products` 
                INNER JOIN categories ON products.category_id = categories.id WHERE categories.category = 'electronics' LIMIT 20");
                while($row = $sql->fetch_assoc()):
                ?>
                <div class="col mt-4">
                    <div class="card crd shadow">
                    <div class="h-100">
                        <a href="/product/details/<?= $row['id'] ?>/<?= $row['product_slug'] ?>" class="d-block text-center">
                            <img src="<?= $row['product_thumbnail'] ?>" class="w-50 m-auto mt-2" alt="">
                            </a>
                        </div>
                        <a aria-label="Quick view" data-bs-toggle="modal" data-bs-target="#quickViewModal"
                            class="quickview text-center bg-primary position-absolute bottom-0 w-100 text-decoration-none text-white"
                            id="<?= $row['id'] ?>" onclick="productView(this.id)">Quick view</a>
                        <?php if($row['discount_price'] === null || $row['discount_price'] === ''): ?>
                        <div>
                            <span class="badge position-absolute top-0" style="border-radius: 6px 0 10px 0; background-color: #3BB77E">New</span>
                        </div>
                        <?php else: 
                        $amount = $row['selling_price'] - $row['discount_price'];
                        $discount_price = ($amount/$row['selling_price']) * 100;
                        ?>
                        <span class="badge bg-danger position-absolute top-0" style="border-radius: 6px 0 10px 0;"><?= $discount_price ?>%</span>
                        <?php endif ?>
                        <div class="card-body text-center">
                            <a href="/product/details/<?= $row['id'] ?>/<?= $row['product_slug'] ?>" class="fw-bold text-center text-decoration-none text-dark"><?= $row['product_name'] ?></a><br>
                            <i class="bx bx-star-filled"></i>
                            <i class="bx bx-star-filled"></i>
                            <i class="bx bx-star"></i>
                            <i style="font-size: 12px;"> (2 reviews)</i>
                            <?php if($row['discount_price'] === null || $row['discount_price'] === ''): ?>
                            <p class="card-text fw-bold" style="color: #3BB77E;">&#x20A6;<?= $row['selling_price'] ?></p>
                            <?php else: ?>
                            <s class="card-text text-secondary" >&#x20A6;<?= $row['selling_price'] ?></s>
                            <span class="card-text fw-bold" style="color: #3BB77E;">&#x20A6;<?= $row['discount_price'] ?></span>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <?php endwhile ?>
            </div>
        </div>
       
    </div>
</div>

<!-- fashion cat -->
<div class="container-fluid container-lg">
    <div class="d-flex justify-content-between">
        <h3 class="fs-5 fw-bold mt-4">FASHION</h3>
        <a class="icon-link text-decoration-none text-secondary" href="#">
            See more
            <i class="bx bx-right-arrow-alt"></i>
        </a>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 text-center">
            <img src="views/public/assets/images/side-banner1.png" width="100%" alt="">
        </div>
        <div class="col-md-8 col-sm-12">
            <div class="row row-cols-lg-4 row-cols-md-3 row-cols-2">
                <?php 
                $sql = $conn->query("SELECT products.*, categories.category FROM `products` 
                INNER JOIN categories ON products.category_id = categories.id WHERE categories.category = 'fashion' LIMIT 12");
                while($row = $sql->fetch_assoc()):
                ?>
                <div class="col mt-4">
                    <div class="card crd shadow">
                    <div class="h-100">
                        <a href="/product/details/<?= $row['id'] ?>/<?= $row['product_slug'] ?>" class="d-block text-center">
                            <img src="<?= $row['product_thumbnail'] ?>" class="w-50 m-auto mt-2 card-img-top" alt="...">
                        </a>
                        </div>
                        <a aria-label="Quick view" data-bs-toggle="modal" data-bs-target="#quickViewModal"
                            class="quickview text-center bg-primary position-absolute bottom-0 w-100 text-decoration-none text-white"
                            id="<?= $row['id'] ?>" onclick="productView(this.id)">Quick view</a>
                        <?php if($row['discount_price'] === null || $row['discount_price'] === ''): ?>
                        <div>
                            <span class="badge position-absolute top-0" style="border-radius: 6px 0 10px 0; background-color: #3BB77E">New</span>
                        </div>
                        <?php else: 
                        $amount = $row['selling_price'] - $row['discount_price'];
                        $discount_price = ($amount/$row['selling_price']) * 100;
                        ?>
                        <span class="badge bg-danger position-absolute top-0" style="border-radius: 6px 0 10px 0;"><?= $discount_price ?>%</span>
                        <?php endif ?>
                        <div class="card-body text-center">
                            <a href="/product/details/<?= $row['id'] ?>/<?= $row['product_slug'] ?>" class="fw-bold text-center text-decoration-none text-dark"><?= $row['product_name'] ?></a><br>
                            <i class="bx bx-star-filled"></i>
                            <i class="bx bx-star-filled"></i>
                            <i class="bx bx-star"></i>
                            <i style="font-size: 12px;"> (2 reviews)</i>
                            <?php if($row['discount_price'] === null || $row['discount_price'] === ''): ?>
                            <p class="card-text fw-bold" style="color: #3BB77E;">&#x20A6;<?= $row['selling_price'] ?></p>
                            <?php else: ?>
                            <s class="card-text text-secondary">&#x20A6;<?= $row['selling_price'] ?></s>
                            <span class="card-text fw-bold" style="color: #3BB77E;">&#x20A6;<?= $row['discount_price'] ?></span>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <?php endwhile ?>
            </div>
        </div>
    </div>
</div>
