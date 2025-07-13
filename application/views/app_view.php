<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		<meta name="description" content="description"/>
		<meta name="keywords" content="keywords"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
		<?php include("include/meta.php"); ?>
		
		<title><?php echo $config->title; ?></title>
		<!-- styles-->

		<?php include("include/include_css.php"); ?>

	</head>
	<body class="home_2">
		<!-- header start-->
		<?php include("include/header.php"); ?>
		<!-- header end-->

		<!--==========================
			MENU STYLE 02 START
		===========================-->
		<section class="breakfast_menu mt_120 xs_mt_100 location-page">
			<div class="fluid-container mt_120">
				<div class="row wow fadeInUp">
					<div class="col-xl-12 m-auto">
						<div class="text-center box-franchise-link">
							<a href="#"><h4>FRANCHISE OPPURTUNITIES </h4></a><span>|</span>
							<a href="#"><h4>INFORMATION PACK </h4></a><span>|</span>
							<a href="#"><h4>FAQ'S</h4></a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="breakfast_menu mt_120 xs_mt_100 form-franchise">
			<div class="container">
				<div class="row wow fadeInUp">
					<div class="col-xl-12 m-auto">
						<div class="text-center mb_25">
							<img class="img-ready" src="<?php echo base_url(); ?>images/ready.png">
							<h1>TO BE YOUR OWN BOSS</h1>
						</div>
					</div>
				</div>
				<form action="">
					<div class="row wow fadeInUp mt_80">
						<div class="col-xl-6 m-auto">
							<p>First Name <span class="mandatory-color">*</span></p>
							<input type="text" class="form-control">
						</div>
						<div class="col-xl-6 m-auto">
							<p>Last Name <span class="mandatory-color">*</span></p>
							<input type="text" class="form-control">
						</div>
						<div class="col-xl-6 m-auto">
							<p>Email <span class="mandatory-color">*</span></p>
							<input type="email" class="form-control">
						</div>
						<div class="col-xl-6 m-auto">
							<p>Phone Number <span class="mandatory-color">*</span></p>
							<input type="text" class="form-control">
						</div>
						<div class="col-xl-6 m-auto">
							<p>State <span class="mandatory-color">*</span></p>
							<input type="email" class="form-control">
						</div>
						<div class="col-xl-6 m-auto">
							<p>Post Code <span class="mandatory-color">*</span></p>
							<input type="text" class="form-control">
						</div>
						<div class="col-xl-12 m-auto">
							<p>How far are you willing to travel to your Bintang Bro store? <span class="mandatory-color">*</span></p>
							<select class="form-control">
								<option value="">Please Select</option>
							</select>
						</div>
						<div class="col-xl-12 m-auto">
							<p>Will you be the full time operator? <span class="mandatory-color">*</span></p>
							<select class="form-control">
								<option value="">Please Select</option>
							</select>
						</div>
						<div class="col-xl-12">
							<p>How would you find the investment? <span class="mandatory-color">*</span></p>
							<input class="checkbox-form" type="checkbox" name="" id="saving" value="saving">
							<label for="saving">Saving</label><br>
							<input class="checkbox-form" type="checkbox" name="" id="Liquid Assets" value="Liquid Assets">
							<label for="Liquid Assets">Liquid Assets</label><br>
							<input class="checkbox-form" type="checkbox" name="" id="Bank Loan" value="Bank Loan">
							<label for="Bank Loan">Bank Loan</label><br>
							<input class="checkbox-form" type="checkbox" name="" id="Partnership" value="Partnership">
							<label for="Partnership">Partnership</label><br>
						</div>
						<div class="col-xl-12 m-auto">
							<p>How much liquid assets do you currently have? <span class="mandatory-color">*</span></p>
							<select class="form-control">
								<option value="">Please Select</option>
							</select>
						</div>
						<div class="col-xl-12 m-auto">
							<p>How did you find us? <span class="mandatory-color">*</span></p>
							<select class="form-control">
								<option value="">Please Select</option>
							</select>
						</div>
						<div class="col-xl-12 m-auto">
							<p>Message</p>
							<textarea name="" id="" cols="30" rows="5"></textarea>
						</div>
						<a class="btn-submit" href="#">SUBMIT</a>
					</div>
				</form>
			</div>
		</section>

		<!--==========================
			MENU STYLE 02 END
		===========================-->

		<?php include("include/footer.php"); ?>
		<?php include("include/cart_modal.php"); ?>
		<!-- libs-->
		<?php include("include/include_js.php"); ?>
    </body>
</html>