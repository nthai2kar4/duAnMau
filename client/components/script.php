	<script src="client/asset/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="client/asset/js/vendor/bootstrap.min.js"></script>
	<script src="client/asset/js/jquery.ajaxchimp.min.js"></script>
	<script src="client/asset/js/jquery.nice-select.min.js"></script>
	<script src="client/asset/js/jquery.sticky.js"></script>
	<script src="client/asset/js/nouislider.min.js"></script>
	<script src="client/asset/js/countdown.js"></script>
	<script src="client/asset/js/jquery.magnific-popup.min.js"></script>
	<script src="client/asset/js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="client/asset/js/gmaps.min.js"></script>
	<script src="client/asset/js/main.js"></script>
	<script src="client/asset/js/jquery.magnific-popup.min.js"></script>
	<!--gmaps Js-->
	<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<?php
	if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
	?>
		<script>
			Swal.fire({
				icon: 'success',
				title: '<?= $_SESSION['success'] ?>',
				showConfirmButton: false,
				  timer:2000,
			});
		</script>
		<style>
			.swal2-select {
				display: none !important;
			}
		</style>
	<?php
		unset($_SESSION['success']);
	}
	?>