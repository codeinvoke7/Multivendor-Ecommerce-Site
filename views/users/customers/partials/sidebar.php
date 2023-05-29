
<?php 

?>


     
    </div>

    <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Dashboard</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
       <div class="container">
        <div class="d-flex border p-2 rounded ">
            <span class="material-icons-outlined mt-1 me-2"> dashboard </span>
            <h4><a href="/user/dashboard" class="text-dark">Dashboard</a></h4>
        </div>

        <div class="d-flex border p-2 rounded mt-3">
            <span class="material-icons-outlined mt-1 me-2"> list_alt </span>
            <h4><a href="/user/order" class="text-dark">Orders</a></h4>
        </div>

        <div class="d-flex border p-2 rounded mt-3">
            <span class="material-icons-outlined mt-1 me-2"> reviews </span>
            <h4><a href="/user/review" class="text-dark">Reviews</a></h4>
        </div>

        <div class="d-flex border p-2 rounded mt-3">
            <span class="material-icons-outlined mt-1 me-2"> import_contacts </span>
            <h4><a href="/user/address" class="text-dark">Address Book</a></h4>
        </div>

        <div class="d-flex border p-2 rounded mt-3">
            <span class="material-icons-outlined mt-1 me-2"> manage_accounts </span>
            <h4><a href="/user/setting" class="text-dark">Settings</a></h4>
        </div>

        <div class="d-flex p-2 rounded mt-5">
            <span class="material-icons-outlined mt-1 me-2"> logout </span>
            <h4><a href="/user/logout" class="text-dark">Logout</a></h4>
        </div>
       </div>
      </div>
    </div>


<script>
    window.addEventListener('scroll', function() {
      var navbar = document.getElementById('navbar');
  
      if (window.pageYOffset > 190) {
          navbar.classList.remove('container');
          navbar.classList.add('container-fluid');
          navbar.classList.remove('rounded');
    } else {
        navbar.classList.remove('container-fluid');
        navbar.classList.add('container');
        navbar.classList.add('rounded');
      }
    });
  </script>


