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
	<body class="home_2 page-about">
		<!-- header start-->
		<?php include("include/header.php"); ?>
		<!-- header end-->

		<!--==========================
        BREADCRUMB AREA START
		===========================-->
		<section class="breadcrumb_area mt_120" style="background: url(<?php echo base_url();?>images/banner/<?php echo $banner->imageBanner; ?>);">
			<div class="container">
				<div class="row wow fadeInUp">
					<div class="col-12">
						<div class="breadcrumb_text">
							<h1><?php echo $banner->title; ?></h1>
							<h5><?php echo $banner->subtitle; ?></h5>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--==========================
			BREADCRUMB AREA END
		===========================-->

		<section class="cta-location">
			<div class="fluid-container">
				<div class="row align-items-center justify-content-center">
					<img class="img-divider" src="<?php echo base_url(); ?>images/about.png" alt="">
				</div>
			</div>
		</section>

		<!--==========================
			MENU STYLE 02 START
		===========================-->
		<section class="breakfast_menu mt_120 xs_mt_150 mb_100">
			<div class="container">
				<div class="row wow fadeInUp">
					<div class="col-xl-12 m-auto">
						<div class="text-center mb_25">
							<h1 class="title taste-logo mb_100"><span class="highlight"><?php echo $about->quote_text; ?></span> <?php echo $about->quote_text2; ?></h1>
						</div>
					</div>
					<div class="col-xl-6 m-auto">
						<p class="description-about"><?php echo nl2br($about->simple_quote); ?></p>
					</div>
					<div class="col-xl-6 m-auto">
						<p class="description-about"><?php echo nl2br($about->simple_quote2); ?></p>
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