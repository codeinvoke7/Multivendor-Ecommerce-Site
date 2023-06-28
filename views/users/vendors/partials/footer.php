
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

<!-- <script>
toastr.success("Test notification");
</script> -->


<!--start overlay-->
</div>
<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->

<footer class="page-footer">
			<p class="mb-0">Copyright © 2021. All right reserved.</p>
		</footer>
		<script src="/views/public/assets/js/delete.js"></script>
<script src="/views/users/vendors/assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="/views/users/vendors/assets/js/jquery.min.js"></script>
	<script src="/views/users/vendors/assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="/views/users/vendors/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="/views/users/vendors/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="/views/users/vendors/assets/plugins/chartjs/js/Chart.min.js"></script>
	<script src="/views/users/vendors/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="/views/users/vendors/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="/views/users/vendors/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="/views/users/vendors/assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
	<script src="/views/users/vendors/assets/plugins/jquery-knob/excanvas.js"></script>
	<script src="/views/users/vendors/assets/plugins/jquery-knob/jquery.knob.js"></script>
	<script src="/views/users/admin/assets/plugins/input-tags/js/tagsinput.js"></script>
	  <script>
		  $(function() {
			  $(".knob").knob();
		  });
	  </script>
	  <script src="/views/users/admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>

	  <script src="/views/users/vendors/assets/js/index.js"></script>
	<!--app JS-->
	<script src="/views/users/vendors/assets/js/app.js"></script>
	<script src="/views/users/admin/assets/js/validate.min.js"></script>
	<script src="/views/users/admin/assets/js/validate.js"></script>
	<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin">
	</script>

	<script>
		tinymce.init({
		  selector: '#mytextarea'
		});
	</script>
</body>

</html>