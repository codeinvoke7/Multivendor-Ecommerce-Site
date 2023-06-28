
    function prevCatImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('showImage').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).ready(function (){

        $('#catForm').validate({
            rules: {
                name: {
                    required : true,
                }, 
            },
            messages :{
                name: {
                    required : 'Please Enter Field',
                },
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });


   

        $('#myForm').validate({
            rules: {
                product_name: {
                    required : true,
                }, 
                 short_descp: {
                    required : true,
                }, 
                 product_thumbnail: {
                    required : true,
                }, 
                 multi_img: {
                    required : true,
                }, 
                 selling_price: {
                    required : true,
                },                   
                 product_code: {
                    required : true,
                }, 
                 product_qty: {
                    required : true,
                }, 
                 brand_id: {
                    required : true,
                }, 
                 category_id: {
                    required : true,
                }, 
                 subcategory_id: {
                    required : true,
                }, 
            },
            messages :{
                product_name: {
                    required : 'Please Enter Product Name',
                },
                short_descp: {
                    required : 'Please Enter Short Description',
                },
                product_thumbnail: {
                    required : 'Please Select Product Thumbnail Image',
                },
                multi_img: {
                    required : 'Please Select Product Multi Image',
                },
                selling_price: {
                    required : 'Please Enter Selling Price',
                }, 
                product_code: {
                    required : 'Please Enter Product Code',
                },
                 product_qty: {
                    required : 'Please Enter Product Quantity',
                },
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
 
    
        $('#checkoutForm').validate({
            rules: {
                name: {
                    required : true,
                }, 
                 email: {
                    required : true,
                }, 
                 phone: {
                    required : true,
                }, 
                 country: {
                    required : true,
                }, 
                 state: {
                    required : true,
                },                   
                 city: {
                    required : true,
                }, 
                 address: {
                    required : true,
                },
            },
            messages :{
                product_name: {
                    required : 'Please Enter Name',
                },
                email: {
                    required : 'Please Enter Email Address',
                },
                phone: {
                    required : 'Please Enter Phone',
                },
                country: {
                    required : 'Please Select Country',
                },
                state: {
                    required : 'Please Select State',
                }, 
                city: {
                    required : 'Please Select City',
                },
                 address: {
                    required : 'Please Enter Address',
                },
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });



    function mainThumUrl(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
                $('#mainThmb').attr('src',e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }



 
 

   $('#inputMultiImages').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });

   
  


$('select[name="category_id"]').on('change', function(){
var category_id = $(this).val();
if (category_id) {
    $.ajax({
        url: '/subcategory/ajax/' + category_id,
        type: "GET",
        dataType:"json",
        success:function(data){
            $('select[name="subcategory_id"]').html('');
            var d =$('select[name="subcategory_id"]').empty();
            $.each(data, function(key, value){
                $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');
         
            });
        },
    });
} else {
    alert('danger');
}
});



    $('#couponForm').validate({
        rules: {
            coupon_name: {
                required : true,
            }, 

            coupon_discount: {
                required : true,
            }, 
        },
        messages :{
            coupon_name: {
                required : 'Please Enter Coupon Name',
            },

            coupon_discount: {
                required : 'Please Enter Coupon Discount',
            },
        },
        errorElement : 'span', 
        errorPlacement: function (error,element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight : function(element, errorClass, validClass){
            $(element).addClass('is-invalid');
        },
        unhighlight : function(element, errorClass, validClass){
            $(element).removeClass('is-invalid');
        },
    });
});
