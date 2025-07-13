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

		<section class="breakfast_menu mt_170 xs_mt_150 mb_120">
			<div class="container">
				<!-- <div class="row wow fadeInUp"> -->
					<div class="col-xl-9 mx-auto">
						<div class="text-left mb_25">
							<h3 class="promo-title-regis">Register Now</h3>
						</div>
						<form onsubmit="return submitRegister()" class="form-promo">
							<div class="row">
								<div class="col-xl-5">
									<p>Name</p>
									<input type="text" required name="name" id="name" placeholder="Your full name.." class="form-control">
									<red id="error-name"></red>
								</div>
								<div class="col-xl-5">
									<p>Email</p>
									<input type="email" required name="email" id="email" placeholder="Your email.." class="form-control">
									<red id="error-email"></red>
								</div>
								<div class="col-xl-5">
									<p>Phone Number</p>
									<input type="number" required name="phone" id="phone" placeholder="Your phone.." class="form-control">
									<red id="error-phone"></red>
								</div>
								<div class="col-xl-5">
								</div>
							</div>
							<button type="submit" id="btSubmitRegis" class="menu_order common_btn mt_30 submit-regis">
								Submit
							</a>
						</form>
					</div>
				<!-- </div> -->
			</div>
		</section>


		<!--==========================
			MENU STYLE 02 END
		===========================-->

		<?php include("include/footer.php"); ?>
		<!-- libs-->
		<?php include("include/include_js.php"); ?>
    </body>
</html>
<script type="text/javascript" src="<?php echo base_url() ?>js2/register.js"></script>