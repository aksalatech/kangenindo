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

		<!--==================================
			HOME 2 ADD BANNER AREA START
		===================================-->
		<section class="home_2_add_banner_area mt_120 xs_mt_100 food_drinks">
			<div class="fluid-container">
				<div class="banner_slider">
					<?php foreach($sliderList as $slider) : ?>
					<div class="row">
						<img src="<?php echo base_url(); ?>images/banner/<?php echo $slider->imagepath; ?>">
					</div>
					<?php endforeach ?>
				</div>
			</div>
		</section>

		<section class="home_2_add_banner_area food_drinks bintangbro popular_food_item">
			<div class="fluid-container">
				<?php 
					$index=1;
					foreach($bannerList as $banner) : 
					$index++;
					?>

					<?php if($index % 2 == 0){ ?>
						<div class="row banner-home-row">
							<div class="col-lg-6 block_banner_home_img" style="background-image: url(<?php echo base_url(); ?>images/banner/<?php echo $banner->img_banner; ?>); background-size: cover;">

							</div>
							<div class="col-lg-6 block_banner_home">
								<img src="<?php echo base_url(); ?>images/banner/<?php echo $banner->img_small; ?>" class="img_on_banner"><br>
								<h2 class="color-title-banner"><?php echo $banner->title; ?></h2>
								<p>
									<?php echo nl2br($banner->content); ?>
								</p>
								<a class="see_btn" href="<?php echo $banner->link ?>">
									MENU
								</a>
							</div>
						</div>
					<?php } else { ?>
					
						<div class="row banner-home-row">
							<div class="col-lg-6 block_banner_home">
								<img src="<?php echo base_url(); ?>images/banner/<?php echo $banner->img_small; ?>" class="img_on_banner"><br>
								<h2 class="color-title-banner"><?php echo $banner->title; ?></h2>
								<p>
									<?php echo nl2br($banner->content); ?>
								</p>
								<a class="see_btn" href="<?php echo $banner->link ?>">
									MENU
								</a>
							</div>
							<div class="col-lg-6 block_banner_home_img" style="background-image: url(<?php echo base_url(); ?>images/banner/<?php echo $banner->img_banner; ?>); background-size: cover;">

							</div>
						</div>
					<?php } ?>
				<?php endforeach ?>
			</div>
		</section>

		<section class="home_2_add_banner_area mt_120 xs_mt_100 food_drinks">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 mx-auto">
						<div class="section_heading mb_40">
							<h1><?php echo $about->quote_text; ?></h1>
						</div>
						<div class="subtitle text-center">
							<p><?php echo nl2br($about->simple_quote); ?>
							</p>
							<a class="menu_order common_btn" href="#">
								Order Now
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="home_2_add_banner_area mt_120 xs_mt_100 testimonial_2">
			<div class="container">
				<div class="row mb_40">
					<div class="col-lg-5 mx-auto">
						<div class="section_heading">
							<h2>What our happy customers says</h2>
						</div>
					</div>
					<div class="col-lg-7">
						<img src="<?php echo base_url(); ?>images/img-star-testimonial.png" class="img_on_banner">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 wow fadeInRight">
						<div class="testimonial_2_area">
							<div class="row testimonial_2_slider">
								<?php foreach($testimoniList as $testimoni) : ?>
								<div class="col-12">
									<div class="single_testimonial_2 row">
										<div class="col-lg-3">
											<div class="box-testimoni">
												<?php echo substr($testimoni->name, 0, 1); ?>
											</div>
										</div>
										<div class="col-lg-9">
											<h4><?php echo $testimoni->name; ?></h4>
											<span class="rating">
												<?php 
													for($i =0; $i < $testimoni->rating; $i++) {
												?>
													<i class="fas fa-star"></i>
												<?php } ?>
											</span>
										</div>
										<div class="col-lg-12">
											<p><?php echo $testimoni->desc_testimoni; ?></p>
										</div>
									</div>
								</div>
								<?php endforeach ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="mt_100 xs_pb_100 mb_40">
			<div class="container">
				<div class="row">
					<?php foreach($bannerPromoList as $bannerPromo) : ?>
						<div class="col-xl-4 col-sm-6 col-lg-4 wow fadeInUp">
							<div class="single_chef_2">
								<div class="single_chef_2_img">
									<img src="<?php echo base_url(); ?>images/banner/<?php echo $bannerPromo->image; ?>" class="img-fluid w-100">
								</div>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</section>
		<!--==================================
			HOME 2 ADD BANNER AREA END
		===================================-->

		<?php include("include/footer.php"); ?>
		<?php include("include/menu_modal.php"); ?>
		<!-- libs-->
		<?php include("include/include_js.php"); ?>
    </body>
</html>