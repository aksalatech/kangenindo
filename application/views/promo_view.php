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
				<div class="row wow fadeInUp">
					<div class="col-xl-6">
						<div class="text-left mb_25">
							<h1 class="title-h1-contact promo-title"><?php echo $promo->title; ?></h1>
							<p class="subtitle-promo"><?php echo $promo->subtitle; ?></p>
						</div>
					</div>
					<div class="col-xl-12">
						<?php $user_agent = $_SERVER['HTTP_USER_AGENT']; ?>
						
						<img src="<?php echo base_url(); ?>images/promo/<?php echo (strpos($user_agent, 'Mobile') !== false || strpos($user_agent, 'Android') !== false || strpos($user_agent, 'iPhone') !== false) ? 'mobile/' . $promo->image_banner_mobile : $promo->image_banner; ?>" class="img_wid_100">
						<a class="menu_order common_btn mt_30" href="<?php echo base_url(); ?>promo/regis">
								Claim
							</a>
					</div>
				</div>
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