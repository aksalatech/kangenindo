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

		<section class="breakfast_menu mt_170 xs_mt_100 mb_120">
			<div class="container">
				<div class="row wow fadeInUp align-items-center">
					<div class="col-xl-8" style="margin-top: 20px">
						<div class="text-left mb_25">
							<h1 class="title-h1-contact promo-title"><?php echo $promo->title; ?></h1>
							<p class="subtitle-promo">
								<?php echo $promo->description; ?>
							</p>
						</div>
					</div>
					<div class="col-xl-4 p_50 text-center">
						<img src="<?php echo base_url(); ?>images/promo/<?php echo $promo->image_barcode; ?>" class="img_wid_100">
						<?php if($promo->promo_code != null) { ?>
							<h1><?php echo $promo->promo_code; ?></h1>
						<?php } ?>
						<a class="menu_order common_btn mt_30 btn_scan_now" href="<?php echo base_url(); ?>promo/regis">
							Scan Now !
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