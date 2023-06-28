<div>
            <h3 class="text-center fs-6 fw-bold mt-5">TOP CATEGORIES OF THE MONTH</h3>

            <div class="container-fluid mt-3 mb-3">
                <div class="top-cat d-flex overflow-x-scroll ">
                  <?php 
                  $sql = $conn->query("SELECT * FROM `categories` LIMIT 7");
                  while($row = $sql->fetch_assoc()):?>
                  
                    <div class="column me-4">
                        <div class="card p-3 mb-2">
                           
                            <div class="text-center">
                                <img src="views/public/uploads/category/<?= $row['image'] ?>" width="100px" class="m-auto mb-1" alt="">
                                <h5 class="heading text-center"><?= $row['category'] ?></h5>
                            </div>
                        </div>
                    </div>
                    <?php endwhile ?>

                </div>
            </div>
        </div>