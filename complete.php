<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>대명아임레디</title>
	<meta property="og:image" content="https://www.daemyungimready.com/common/images/logo.gif">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="assets/css/animate.min.css">
	<link rel="stylesheet" href="assets/css/fontawesome-all.css">
	<link rel="stylesheet" href="assets/css/style.css">

	<!-- dashboard -->
	<link rel="stylesheet" href="dashboard/assets/css/jquery.dataTables.min.css">

	<style type="text/css">
		table {
			zoom: 0.9;
		}
		thead {
			background: #724dd8;
			color: #fff;
			font-weight: bold;
		}
		.step-inner-content {
			padding: 40px 40px 28px;
		}
		.step-no.step-no, .apply-now.apply-now {
			margin-bottom: 30px;
			display: block;
			right: 0;
			background: #724dd8;
			float: left;
			padding: 7px 15px;
			color: #fff;
			cursor: pointer;
		}
	</style>
	<body>
		<div class="wrapper">
				<div class="table-responsive step-inner-content clearfix position-relative" style="float:unset;margin:0 auto;">

				<img src="./assets/img/comple_survey.png">
					
				</div>
		</div>
	</div>

	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="dashboard/assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script>
		$(document).ready( function () {
			$('#applicant-table').DataTable();
		} );
	</script>

</body>

</html>
