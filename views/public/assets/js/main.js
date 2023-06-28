
const mobileMenu = document.getElementById('mobile-menu-icon');
const catMobileMenu = document.getElementById('cat-mobile-menu');
const closeCatMenu = document.getElementById('close-menu');
const overlay = document.getElementById('overlay');


 if(catMobileMenu.className === 'category-mobile'){
    mobileMenu.addEventListener('click', ()=>{
        catMobileMenu.classList.remove('category-mobile');
        overlay.classList.add('overlay');
        catMobileMenu.style.transition = '5s'
     })
 }

 if(catMobileMenu.className === 'category-mobile'){
    closeCatMenu.addEventListener('click', ()=>{;
        catMobileMenu.classList.add('category-mobile');
        catMobileMenu.style.transition = '5s'
        overlay.classList.remove('overlay');
    })
 }


 var cartText = document.querySelectorAll(".cart-text");
var minicartWrapper = document.querySelectorAll(".minicart-wrapper");

// document.getElementById('miniCart').textContent = '<p class="text-primary">' + 'fhjfhj' + '</p>'

 $(document).ready(function() {



 $('.detail-qty').each(function () {
    var qtyval = parseInt($(this).find(".qty-val").val(), 10);

    $('.qty-up').on('click', function (event) {
        event.preventDefault();
        qtyval = qtyval + 1;   
        $(this).prev().val(qtyval);
    });

     $(".qty-down").on("click", function (event) {
         event.preventDefault(); 
         qtyval = qtyval - 1;
         if (qtyval > 1) {
             $(this).next().val(qtyval);
         } else {
             qtyval = 1;
             $(this).next().val(qtyval);
         }
     });

 }) 


 $('#ex1 a').click(function(e) {
    e.preventDefault();
    $('#ex1 a').removeClass('active');

    var targetTab = $(this).attr('href');

    $('#ex1 a').removeClass('active');
    $('.tab-pane').removeClass('active show');
    $(this).addClass('current');
    $('#ex1 a').not(this).removeClass('current');
    $(targetTab).addClass('active show');
  });



  });
  

  jQuery(document).ready(function ($) {
    //Buy button effects
    $(".buy").on("click", function() {
        var $this = $(this);
      
        // Toggle classes with fade effect
        $this.fadeOut(100, function() {
          if ($this.hasClass("bx-cart")) {
              $this.attr('class', "bx bx-check fs-5 text-white").fadeIn(150);
              $("#buy").addClass("bg-primary rounded-circle");
          } else {
              $this.attr('class', "bx bx-cart fs-5 text-white").fadeIn(150);
              $("#buy").removeClass("bg-primary rounded-circle");
          }
        });
      
        // Reset classes after 5 seconds
        setTimeout(function() {
          $this.fadeOut(100, function() {
            $this.attr('class', "bx bx-cart fs-5 text-white").fadeIn(150);
            $("#buy").removeClass("bg-primary rounded-circle");
          });
        }, 5000);
      });
      
  
    //Like button effects
  
    $(".like").on("click", function () {
      
        var $this = $(this);
      
        // Toggle classes with fade effect
        $this.fadeOut(100, function() {
          if ($this.hasClass("bx-heart")) {
            $this.attr('class', "bx bx-heart-circle fs-5 text-white").fadeIn(150);
          } else {
            $this.attr('class', "bx bx-heart fs-5 text-white").fadeIn(150);
          }
        });
      
        // Reset classes after 5 seconds
        setTimeout(function() {
          $this.fadeOut(100, function() {
            $this.attr('class', "bx bx-heart fs-5 text-white").fadeIn(150);
          });
        }, 5000);
    });

  });
  