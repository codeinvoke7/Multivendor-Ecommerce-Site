function productView(id){
    // alert(id)
    $.ajax({
        type: 'GET',
        url: '/product/view/modal/'+id,
        dataType: 'json',
        success:function(data){
          //  console.log(data)
        $('#pname').text(data.product.product_name);
        $('#pprice').text(data.product.selling_price);
        $('#pcode').text(data.product.product_code);
        $('#pcategory').text(data.product.category_name);
        $('#pbrand').text(data.product.brand_name);
        $('#pimage').attr('src','/'+data.product.product_thumbnail);
        $('#pvendor_shopname').text(data.product.vendor_shopname)
        $('#pvendor_id').val(data.product.vendor_id)
   
        $('#product_id').val(id);
        $('#qty').val(1);
        
        // Product Price 
        if (data.product.discount_price == null) {
            $('#pprice').text('');
            $('#oldprice').text('');
            $('#pprice').text('₦' + data.product.selling_price);
        }else{
            $('#pprice').text('₦' + data.product.discount_price);
            $('#oldprice').text('₦' + data.product.selling_price); 
        } // end else
   
   
         /// Start Stock Option
         if (data.product.product_qty > 0) {
            $('#available').text('');
            $('#stockout').text('');
            $('#available').text('available');
        }else{
            $('#available').text('');
            $('#stockout').text('');
            $('#stockout').text('stockout');
        } 
        ///End Start Stock Option
         ///Size 
         $('select[name="size"]').empty();
         $.each(data.size,function(key,value){
            $('select[name="size"]').append('<option value="'+value+' ">'+value+'  </option')
            if (data.size == "") {
                $('#sizeArea').hide();
            }else{
                 $('#sizeArea').show();
            }
         }) // end size
                 ///Color 
           $('select[name="color"]').empty();
         $.each(data.color,function(key,value){
            $('select[name="color"]').append('<option value="'+value+' ">'+value+'  </option')
            if (data.color == "") {
                $('#colorArea').hide();
            }else{
                 $('#colorArea').show();
            }
         }) // end size
   
        }
    })
   }
   
   
   
   
   
   function addToCart(){
   var product_name = $('#pname').text();  
   var id = $('#product_id').val();
   var vendor = $('#pvendor_shopname').text();
   var vendor_id = $('#pvendor_id').val();
   var color = $('#color option:selected').text();
   var size = $('#size option:selected').text();
   var quantity = $('#qty').val(); 
   $.ajax({
    type: "POST",
    dataType : 'json',
    data:{
      product_name: product_name,
        quantity: quantity,
        color: color,
        size: size,
        vendor: vendor,
        vendor_id: vendor_id
    },
    url: "/cart/data/store/"+id,
    success:function(data){
        miniCart();
        $('#closeModal').click();
         // Start Message 
         const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              icon: 'success', 
              showConfirmButton: false,
              timer: 3000 
        })
        if ($.isEmptyObject(data.error)) {
                
                Toast.fire({
                icon: 'success',
                title: data.success, 
                })
        }else{
           
       Toast.fire({
                icon: 'error',
                title: data.error, 
                })
            }
            //End Message
    }
   
   })
   }
   
   {/* /// End Add To Cart Product  */}
   
   
   
   
   /// Start Details Page Add To Cart Product 
   function addToCartDetails(){
    var product_name = $('#dpname').text();  
    var id = $('#dproduct_id').val();
    var vendor = $('#vproduct_id').val();
    console.log(vendor);
    var color = $('#dcolor option:selected').text();
    var size = $('#dsize option:selected').text();
    var quantity = $('#dqty').val(); 
    $.ajax({
       type: "POST",
       dataType : 'json',
       data:{
           color:color, size:size, quantity:quantity,product_name:product_name,vendor:vendor
       },
       url: "/dcart/data/store/"+id,
       success:function(data){
           miniCart();
         
           // console.log(data)
           // Start Message 
           const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 icon: 'success', 
                 showConfirmButton: false,
                 timer: 3000 
           })
           if ($.isEmptyObject(data.error)) {
                   
                   Toast.fire({
                   icon: 'success',
                   title: data.success, 
                   })
           }else{
              
          Toast.fire({
                   icon: 'error',
                   title: data.error, 
                   })
               }
             // End Message  
       } 
    }) 
   } 
    /// Eend Details Page Add To Cart Product
   
   
    
   function miniCart() {
   $.ajax({
    type: 'GET',
    url: '/product/mini/cart',
    dataType: 'json',
    success: function(response) {
        $('span[id="cartSubTotal"]').text('₦' + response.cartTotal);
        $('.cartQty').text(response.cartQty);
   
        var miniCartHTML = ""; // Declare the variable here
   
        $.each(response.carts, function(key, value) {
            miniCartHTML += `
                <ul>
                    <li class="row pt-3 pe-3">
                        <div class="shopping-cart-img col">
                            <a href="shop-product-right.html"><img alt="Nest" src="/${value.options.image}" style="width:50px;height:50px;" /></a>
                        </div>
                        <div class="shopping-cart-title col">
                            <h4 class="fs-5"><a href="shop-product-right.html" class="text-decoration-none text-success fs-6">${value.name}</a></h4>
                            <h4 style="color: grey; font-size: 13px"<span style="color: grey; font-size: 13px">${value.qty} × </span >${value.price}</h4>
                        </div>
                        <div class="shopping-cart-delete col">
                            <a type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="bx bx-x text-dark"></i></a>
                        </div>
                    </li> 
                </ul>
            `;
        });
   
        // Update the HTML content of each element with the class "miniCart"
        $('.miniCart').html(miniCartHTML);
    }
   });
   }
  
   miniCart();

     /// Mini Cart Remove Start 
     function miniCartRemove(rowId){
        // console.log(rowId);
        $.ajax({
           type: 'GET',
           url: '/minicart/product/remove/'+rowId,
           dataType:'json',
           success:function(data){
            cart();
            miniCart();
            couponCalculation();
                // Start Message 
               const Toast = Swal.mixin({
                     toast: true,
                     position: 'top-end',
                     icon: 'success', 
                     showConfirmButton: false,
                     timer: 3000 
               })
               if ($.isEmptyObject(data.error)) {
                       
                       Toast.fire({
                       icon: 'success',
                       title: data.success, 
                       })
               }else{
                  
              Toast.fire({
                       icon: 'error',
                       title: data.error, 
                       })
                   }
                 // End Message  
           }
        })
      }
       /// Mini Cart Remove End 



    // Start Load MY Cart // -->

    function cart(){
   $.ajax({
       type: 'GET',
       url: '/get-cart-product',
       dataType: 'json',
       success:function(response){
       var rows = ""
       $.each(response.carts, function(key,value){
          rows += `
          <tr class="p-5">
              <td><img src="/${value.options.image}" width="50px" alt="">
              <span><a class="text-decoration-none text-dark fs-5 ms-3" style="font-family: 'poppins';" href=""> ${value.name} </a></span></td>
              <td><h5 class="text-secondary"> ₦${value.price}</h5></td>
              <td class="price" data-title="Price">
              ${value.options.color == null
                ? `<span>.... </span>`
                : `<h6 class="text-secondary">${value.options.color} </h6>`
              } 
            </td>
               <td class="price" data-title="Price">
              ${value.options.size == null
                ? `<span>.... </span>`
                : `<h6 class="text-secondary">${value.options.size} </h6>`
              } 
            </td>
              <td class="quantity">
              <div class="detail-extralink mb-30 d-flex">
              <div class="detail-qty border radius">
              <a type="submit" class="qty-down" id="${value.rowId}" onclick="cartDecrement(this.id)"><i class="bx bx-chevron-down"></i></a>
                
                <input type="text" name="quantity" class="qty-val" value="${value.qty}" min="1">
                <a  type="submit" class="qty-up" id="${value.rowId}" onclick="cartIncrement(this.id)"><i class="bx bx-chevron-up"></i></a>
             </div>
             </div>
              </td>
              <td><h4 class="text-brand custom-text-color">₦${value.subtotal} </h4></td>
              <td><button class="btn btn-danger btn-sm" id="${value.rowId}" onclick="cartRemove(this.id)">Remove</button></td>
              
            </tr>
          `  
         });
           $('#cartPage').html(rows);
       }
   })
}
 cart();


 // Cart Remove Start 
 function cartRemove(id){
    $.ajax({
        type: "GET",
        dataType: 'json',
        url: "/cart/remove/"+id,
        success:function(data){
            cart();
            miniCart();
            couponCalculation();
             // Start Message 
    const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          
          showConfirmButton: false,
          timer: 3000 
    })
    if ($.isEmptyObject(data.error)) {
            
            Toast.fire({
            icon: 'success', 
            title: data.success, 
            })
    }else{
       
   Toast.fire({
            icon: 'error', 
            title: data.error, 
            })
        }
      // End Message  
        }
    })
}
// Cart Remove End 

// Cart INCREMENT 

function cartIncrement(rowId){
    $.ajax({
        type: 'GET',
        url: "/cart/increment/"+rowId,
        dataType: 'json',
        success:function(data){
            cart();
            miniCart();
            couponCalculation();
        }
    });
 }

// Cart INCREMENT End 
// Cart Decrement Start
function cartDecrement(rowId){
    $.ajax({
        type: 'GET',
        url: "/cart/decrement/"+rowId,
        dataType: 'json',
        success:function(data){
            cart();
            miniCart();
            couponCalculation();
        }
    });
 }
// Cart Decrement End 
  // End Load MY Cart // -->

   ////////////// Start Apply Coupon ////////////// -->

    function applyCoupon(){
      var coupon_name = $('#coupon_name').val();
              $.ajax({
                  type: "POST",
                  dataType: 'json',
                  data: {coupon_name:coupon_name},
                  url: "/coupon-apply",
                  success:function(data){
                    couponCalculation();
                    if (data.validity == true) {
                        $('#couponField').hide();
                        
                    }
                     
                       // Start Message 
              const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    
                    showConfirmButton: false,
                    timer: 3000 
              })
              if ($.isEmptyObject(data.error)) {
                      
                      Toast.fire({
                      icon: 'success', 
                      title: data.success, 
                      })
              }else{
                 
             Toast.fire({
                      icon: 'error', 
                      title: data.error, 
                      })
                  }
                // End Message  
                  }
              })
          }


          // Start CouponCalculation Method   
     function couponCalculation(){
        $.ajax({
            type: 'GET',
            url: "/coupon-calculation",
            dataType: 'json',
            success:function(data){
                // console.log(data);
                if (!data.coupon_name) {
                $('#couponCalField').html(
                    ` <div class="d-flex justify-content-between">
                    <div class="cart_total_label">
                        <h6 class="text-muted">Subtotal: </h6>
                    </div>
                    <div class="cart_total_amount text-end">
                        <h4 class="text-brand custom-text-color">₦${data.total}</h4>
                    </div>
                </div>
                 
                <div class="d-flex justify-content-between">
                    <div class="cart_total_label">
                        <h6 class="text-muted">Grand Total: </h6>
                    </div>
                    <div class="cart_total_amount text-end">
                        <h4 class="text-brand custom-text-color">₦${data.total}</h4>
                    </div>
                </div>
                ` ) 
            }else{
                $('#couponCalField').html(
                    `
                    <div class="d-flex justify-content-between">
                    <div class="cart_total_label">
                        <h6 class="text-muted">Subtotal: </h6>
                    </div>
                    <div class="cart_total_amount text-end">
                        <h4 class="text-brand custom-text-color">₦${data.subtotal}</h4>
                    </div>
                </div>
                 
                <div class="d-flex justify-content-between">
                    <div class="cart_total_label">
                        <h6 class="text-muted">Coupon: </h6>
                    </div>
                    <div class="cart_total_amount text-end">
                        <h4 class="text-brand custom-text-color">${data.coupon_name} <a type="submit" onclick="couponRemove()"><i class="bx bx-trash fs-5"></i> </a></h4>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="cart_total_label">
                        <h6 class="text-muted">Discount Amount </h6>
                    </div>
                    <div class="cart_total_amount text-end">
                        <h4 class="text-brand custom-text-color">₦${data.discount_amount}</h4>
                    </div>
                </div>
                 
                <div class="d-flex justify-content-between">
                    <div class="cart_total_label">
                        <h6 class="text-muted">Grand Total: </h6>
                    </div>
                    <div class="cart_total_amount text-end">
                        <h4 class="text-brand custom-text-color">₦${data.total_amount}</h4>
                    </div>
                </div> `
                    ) 
            } 
            }
        })
     } 

     couponCalculation();
     
    //  End CouponCalculation Method   

  
 ////////////// End Apply Coupon ////////////// -->
  

 
        // Coupon Remove Start 
      function couponRemove(){
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/coupon-remove",
                    success:function(data){
                        cart();
            miniCart();
                       couponCalculation();
                       $('#couponField').show();
                         // Start Message 
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      
                      showConfirmButton: false,
                      timer: 3000 
                })
                if ($.isEmptyObject(data.error)) {
                        
                        Toast.fire({
                        icon: 'success', 
                        title: data.success, 
                        })
                }else{
                   
               Toast.fire({
                        icon: 'error', 
                        title: data.error, 
                        })
                    }
                  // End Message  
                    }
                })
            }
    // Coupon Remove End 