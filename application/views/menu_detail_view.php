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
        BANNER 2 START
		===========================-->
		<?php foreach($sliderList as $slider) : ?>
		<section class="banner banner_2" style="background: url(images/slider/<?php echo $slider->imagepath; ?>);">
			<div class="container">
				<div class="row justify-content-between align-items-center">
					<div class="col-lg-6 col-xl-7 col-md-9 wow fadeInUp">
						<div class="banner_text intro animate-loading-bar">
							<?php echo $slider->content; ?>
						</div>
					</div>
					<div class="col-lg-6 col-xl-5">
					</div>
				</div>
			</div>
		</section>
		<?php endforeach; ?>
		<!--==========================
			BANNER 2 END
		===========================-->

		<!--==========================
        POPULAR FOOD START
		===========================-->
		<section class="popular_food pt_110 xs_pt_90 pb_90">
			<div class="container">
				<div class="row wow fadeInUp">
					<div class="col-xl-8 m-auto">
						<div class="section_heading mb_40">
							<h2>Our Popular food item </h2>
						</div>
					</div>
				</div>
				<div class="row popular_food_slider">
					<?php foreach($galleryList as $gallery) : ?>
						<div class="col-xl-3 wow fadeInUp">
							<div class="popular_food_item">
								<a href="menu_details.html" class="img">
									<img src="<?php echo base_url(); ?>/images/catering/<?php echo $gallery->imagepath; ?>" alt="<?php echo $gallery->imagetitle; ?>" class="img-fluid w-100">
								</a>
								<a class="title" href="menu_details.html"><?php echo $gallery->imagetitle; ?> <br>
								<span><?php echo $gallery->imagetitle2; ?></span>
								</a>
								<a class="see_btn" href="menu_details.html">VIEW DETAIL <i class="far fa-chevron-right"></i></a>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
		<!--==========================
			POPULAR FOOD END
		===========================-->

		<!--==================================
			HOME 2 ADD BANNER AREA START
		===================================-->
		<section class="home_2_add_banner_area mt_140 xs_mt_100 hot-deals">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="row">
							<?php foreach($promoList as $promo) : ?>
								<div class="col-6 wow fadeInUp">
									<div class="add_banner_large_2"
										style="background: url(<?php echo base_url();?>images/promo/<?php echo $promo->image; ?>);">
										<div class="text">
											<h2 class="subtitle-hot-deals"><?php echo $promo->subtitle; ?></h2>
											<h2 class="title-hot-deals"><?php echo $promo->title; ?></h2>
											<a href="<?php echo $promo->link; ?>" class="see_btn">
												VIEW DETAIL
												<i class="far fa-arrow-right"></i>
											</a>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--==================================
			HOME 2 ADD BANNER AREA END
		===================================-->

		<?php include("include/footer.php"); ?>
		<!-- libs-->
		<?php include("include/include_js.php"); ?>
    </body>
</html>