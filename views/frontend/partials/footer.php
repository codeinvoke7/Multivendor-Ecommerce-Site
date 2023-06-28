<script src="views/public/assets/js/delete.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<?php
if (isset($_SESSION['message'])): ?>
	<script>
		// Make an AJAX request to display the toastr notification
		var type = "<?php echo $_SESSION['alert-type']; ?>";
		var message = "<?php echo $_SESSION['message']; ?>";

		switch (type) {
			case 'info':
				toastr.info(message);
				break;
			case 'success':
				toastr.success(message);
				break;
			case 'warning':
				toastr.warning(message);
				break;
			case 'error':
				toastr.error(message);
				break;
		}
	</script>
	<?php
	// Remove the message and alert type from session after displaying
	unset($_SESSION['message']);
	unset($_SESSION['alert-type']);
	?>
<?php endif; 
?>


<footer class="footer-02 bg-dark mt-5">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-10 col-lg-6">
						<div class="subscribe mb-5">
							<form action="#" class="subscribe-form mt-4">
                                <div class="input-group mb-3 d-flex ">
                                    <input type="text" class="form-control p-3" placeholder="Enter email address" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-primary text-white btn-outline-secondary" type="button" id="button-addon2">Subscribe</button>
                                  </div>
              </form>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-lg-5">
						<div class="row">
							<div class="col-md-12 col-lg-8 mb-md-0 mb-4">
								<h2 class="footer-heading"><a href="#" class="logo text-white fs-2">M-Vendor</a></h2>
								<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
								<a href="#">read more <span class="ion-ios-arrow-round-forward"></span></a>
							</div>
						</div>
					</div>
					<div class="col-md-8 col-lg-7">
						<div class="row">
							<div class="col-md-3 mb-md-0 mb-4 border-left">
								<h2 class="footer-heading">Discover</h2>
								<ul class="list-unstyled">
		              <li><a href="#" class="py-1 d-block">Buy &amp; Sell</a></li>
		              <li><a href="#" class="py-1 d-block">Merchant</a></li>
		              <li><a href="#" class="py-1 d-block">Giving back</a></li>
		              <li><a href="#" class="py-1 d-block">Help &amp; Support</a></li>
		            </ul>
							</div>
							<div class="col-md-3 mb-md-0 mb-4 border-left">
								<h2 class="footer-heading">About</h2>
								<ul class="list-unstyled">
		              <li><a href="#" class="py-1 d-block">Staff</a></li>
		              <li><a href="#" class="py-1 d-block">Team</a></li>
		              <li><a href="#" class="py-1 d-block">Careers</a></li>
		              <li><a href="#" class="py-1 d-block">Blog</a></li>
		            </ul>
							</div>
							<div class="col-md-3 mb-md-0 mb-4 border-left">
								<h2 class="footer-heading">Resources</h2>
								<ul class="list-unstyled">
		              <li><a href="#" class="py-1 d-block">Security</a></li>
		              <li><a href="#" class="py-1 d-block">Global</a></li>
		              <li><a href="#" class="py-1 d-block">Charts</a></li>
		              <li><a href="#" class="py-1 d-block">Privacy</a></li>
		            </ul>
							</div>
							<div class="col-md-3 mb-md-0 mb-4 border-left">
								<h2 class="footer-heading">Social</h2>
								<ul class="list-unstyled">
		              <li><a href="#" class="py-1 d-block">Facebook</a></li>
		              <li><a href="#" class="py-1 d-block">Twitter</a></li>
		              <li><a href="#" class="py-1 d-block">Instagram</a></li>
		              <li><a href="#" class="py-1 d-block">Googleplus</a></li>
		            </ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row partner-wrap mt-5">
					<div class="col-md-12">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="mb-0 fs-6">Our Partner:</h3>
							</div>
							<div class="col-md-9">
								<p class="partner-name mb-0">
									<a href="#"><span class="ion-logo-ionic mr-2"></span>Company 01</a>
									<a href="#"><span class="ion-logo-ionic mr-2"></span>Company 02</a>
									<a href="#"><span class="ion-logo-ionic mr-2"></span>Company 03</a>
									<a href="#"><span class="ion-logo-ionic mr-2"></span>Company 04</a>
									<a href="#"><span class="ion-logo-ionic mr-2"></span>Company 05</a>
									<a href="#"><span class="ion-logo-ionic mr-2"></span>Company 06</a>
								</p>
							</div>
							<div class="col text-md-right">
								<p class="mb-0"><a href="#" class="btn-custom">See All <span class="ion-ios-arrow-round-forward"></span></a></p>
							</div>
						</div>
					</div>
				</div>
				<div class="row mt-5">
          <div class="col-md-6 col-lg-8">

            <p class="copyright">
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</p>
          </div>
          <div class="col-md-6 col-lg-4 text-md-right">
          	<p class="mb-0 list-unstyled">
          		<a class="mr-md-3" href="#">Terms</a>
          		<a class="mr-md-3" href="#">Privacy</a>
          		<a class="mr-md-3" href="#">Compliances</a>
          	</p>
          </div>
        </div>
			</div>
		</footer>