
<div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content ">
    <div class="d-flex justify-content-end p-3">
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeModal"></button>
      </div>
      <div class="modal-body">
<div class="row g-5">
                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                        <div class="detail-gallery">
                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                            <!-- MAIN SLIDES -->
                            <img src=" " alt="product image" id="pimage" width="100%"/>
                        </div>
                        <!-- End Gallery -->
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-info pr-30 pl-30">
                            <h5 class="text-heading"><a href=" " class="text-heading" id="pname"> </a></h5>
                               <br>

  <div class="attr-detail attr-size mb-3" id="sizeArea">
          <strong class="me-1" style="width:60px;">Size : </strong>
         <select class="form-control unicase-form-control p-2" id="size" name="size"></select>
     </div>


     <div class="attr-detail attr-color mb-3" id="colorArea">
        <strong class="me-1" style="width:60px;">Color : </strong>
        <select class="form-control unicase-form-control p-2" id="color" name="color"></select>
     </div>




        <div class="clearfix product-price-cover">
            <div class="product-price primary-color float-left">
                <span class="current-price text-brand" id="pprice"></span>
                <span> 
                    <span class="old-price font-md ml-15" id="oldprice"></span>
                </span>
            </div>
        </div>
        <div class="detail-extralink mb-30 d-flex">
            <div class="detail-qty border radius">
                <a href="#" class="qty-down"><i class="bx bx-chevron-down"></i></a>
                <input type="text" name="quantity" id="qty" class="qty-val" value="1" min="1">
                <a href="#" class="qty-up"><i class="bx bx-chevron-up"></i></a>
            </div>
            <div class="product-extra-link2">
                <input type="hidden" id="product_id">
                <input type="hidden" id="pvendor_id">
                <button type="submit" class="button button-add-to-cart fillBtn" onclick="addToCart()"><i class="bx bx-cart"></i>Add to cart</button>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">

                <div class="fs-6">
            <ul class="list-unstyled modal-list">
                <li class="mb-2">Brand: <span class="text-brand" id="pbrand"> </span></li>
                <li class="mb-2">Category: <span class="text-brand" id="pcategory"> </span></li>
                <li class="mb-5">Vendor: <span class="text-brand" id="pvendor_shopname"> </span></li>
            </ul>
        </div>

            </div> <!-- // End col  -->


              <div class="col-md-6">

                <div class="">
            <ul class="list-unstyled modal-list">
                <li class="mb-2">Product Code : <span class="text-brand" id="pcode"> </span></li>
                <li class="mb-5">Stock: <span class="badge badge-pill badge-success text-white" id="available" style="background:green; color: white;"> </span>
                    <span class="badge badge-pill badge-danger text-white" id="stockout" style="background:red; color: white;"> </span></li>
            </ul>
        </div>

            </div> <!-- // End col  -->



        </div> <!-- // end row -->



    </div>
                        <!-- Detail Info -->
                    </div>
                </div>
      </div>
    </div>
  </div>
</div>