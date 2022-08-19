<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['valid'])) {
	header('Location: login.php?prev_url='.urlencode($_SERVER['REQUEST_URI']));
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Insert </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="assets/css/animate.min.css">
	<link rel="stylesheet" href="assets/css/fontawesome-all.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
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
	</style>
</head>

<body>
	<div class="wrapper">
		<div class="wizard-content-1 clearfix">
			<div class="steps d-inline-block clearfix">
				<span class="bg-shape"></span>
				<ul class="tablist multisteps-form__progress">
					<li class="multisteps-form__progress-btn js-active current">
						<div class="step-btn-icon-text">
							<div class="step-btn-icon float-left position-relative">
								<img src="assets/img/bt1.png" alt="">
							</div>
							<div class="step-btn-text">
								<h2 class="text-uppercase">Edit Application</h2>
								<span class="text-capitalize"></span>
							</div>
						</div>
					</li>
					<li class="multisteps-form__progress-btn">
						<div class="step-btn-icon-text">
							<div class="step-btn-icon float-left position-relative">
								<img src="assets/img/bt2.png" alt="">
							</div>
							<div class="step-btn-text">
								<h2 class="text-uppercase">User</h2>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="step-inner-content clearfix position-relative">
				<?php
				if(isset($_REQUEST['id'])){

					extract($obj->editValue($_REQUEST['id'],"job_application"));

				}
				if(isset($_REQUEST['submit'])){

					extract($_REQUEST);
					$upload 		= $_FILES['file_upload']['name'];
					$upload_tmp		= $_FILES['file_upload']['tmp_name'];
					$upload_size	= $_FILES['file_upload']['size'];

					if($obj->Update($hidden_id,$job_title,$first_name,$last_name,$email,$phone,$country_list,$city_list,$gender,$address,$position_list,$add_info,$upload,$upload_tmp,$upload_size, "job_application")){
						header('location:result.php');
					}
					else{
						echo "Cannot Updated!";	
					}
				}
				?>

				<form action="edit.php" method="post" enctype="multipart/form-data">
					<table width="600" border="0" class="table table-striped table-hover" cellspacing="0" cellpadding="5">
						<tr>
							<th width="90" scope="row" style="text-align:right" >선택 혜택</th>
							<td width="347"><?php echo $job_title; ?></td>
						</tr>
						<tr>
							<th width="90" scope="row" style="text-align:right" >선택이유</th>
							<td width="347"><?php echo $add_info; ?></td>
						</tr>
						<tr>
							<th scope="row" style="text-align:right">성함</th>
							<td><?php echo $first_name; ?></td>
						</tr>
						<tr>
							<th scope="row" style="text-align:right">연락처</th>
							<td><?php echo $phone; ?></td>
						</tr>

					</table>
				</form>
				<a class="btn btn-success text-white" href="view.php">Home</a>

				</div>
			</div>

		</div>

	</body>
	</html>