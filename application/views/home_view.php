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
		<section class="home_2_add_banner_area xs_mt_100 food_drinks">
			<div class="fluid-container">
				<div class="banner_slider">
					<?php foreach($sliderList as $slider) : ?>
						<img src="<?php echo base_url(); ?>images/slider/<?php echo $slider->imagepath; ?>">
					<?php endforeach ?>
				</div>
			</div>
		</section>

		<section class="cta-location">
			<div class="fluid-container">
				<div class="row align-items-center justify-content-center">
					<div class="col-md-3 col-sm-12 col-xs-12">
						<div class="d-flex align-items-center justify-content-center">
							<img class="cta-location-icon" src="<?php echo base_url(); ?>images/cta-location.png" alt="">
							<img class="logo-on-cta" src="<?php echo base_url(); ?>images/logo/logo_kangen_indo_white.png" alt="">
						</div>
					</div>
					<div class="col-md-6 col-sm-12col-xs-12 cta-location-content">
						<h5>LOCATION</h5>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
					</div>
					<div class="col-md-3 col-sm-12 col-xs-12 text-right">
						<a href="#" class="btn cta-location-button">Find Us</a>
					</div>
				</div>
			</div>
		</section>

		<section class="home_2_add_banner_area food_drinks bintangbro popular_food_item">
			<div class="fluid-container">
				<div class="row banner-home-row">
					<?php foreach($bannerPromoList as $banner) : ?>
					<div class="col-lg-6 " style="padding: 0; background-image: url(<?php echo base_url(); ?>images/promo/<?php echo $banner->image; ?>); background-size: cover;">
						<a href="#" class="block_banner_home">

						</a>
					</div>
					<?php endforeach ?>
				</div>
			</div>
		</section>

		<section class="cta-location">
			<div class="fluid-container">
				<div class="row align-items-center justify-content-center">
					<img class="img-divider" src="<?php echo base_url(); ?>images/divider.png" alt="">
				</div>
			</div>
		</section>

		<section class="product-highlight pt_40 pb_40" style="background-image: url('<?php echo base_url(); ?>images/product_highlight.png')">
			<div class="container">
				<div class="row gallery_slider">
					<?php foreach($recentProduct as $menu) : ?>
						<div class="col-xl-4 col-sm-6 col-lg-4 fadeInUp menuitem" data-cate="<?php echo $menu->id_category ?>">
							<div class="single_menu">
								<div class="single_menu_img">
									<img src="<?php echo base_url(); ?>/images/catering/<?php echo $menu->imagepath; ?>" alt="<?php echo $menu->imagetitle; ?>" class="img-fluid w-100">
								</div>
								<div class="single_menu_text text-center">
									<a class="title" href="javascript:void(0)"><?php echo $menu->imagetitle; ?><br>
										<span><?php echo $menu->imagetitle2; ?></span>
									</a>
									<p class="descrption"><?php echo $menu->imagedesc; ?></p>
									<a class="menu_order common_btn" href="<?php echo base_url(); ?>order?store=buy">
										ORDER NOW
									</a>
								</div>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</section>

		<section class="home_2_add_banner_area pt_100 xs_pt_100 testimonial_2">
			<div class="container">
				<div class="row mb_40">
					<div class="col-lg-12 mx-auto">
						<div class="section_heading">
							<h4>What our happy customers says</h4>
						</div>
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

		<!--==================================
			HOME 2 ADD BANNER AREA END
		===================================-->

		<?php include("include/footer.php"); ?>
		<?php include("include/menu_modal.php"); ?>
		<!-- libs-->
		<?php include("include/include_js.php"); ?>
    </body>
</html>

<script>
	$('.banner_slider').on('init', function(event, slick){
		$('.banner_slider .slick-dots li').each(function(index){
			const number = (index + 1).toString().padStart(2, '0'); // tambahkan nol di depan
			$(this).find('button').html(`<span class="dot-number">${number}</span>`);
		});
	});

	$('.testimonial_2_slider').on('init', function(event, slick){
		$('.testimonial_2_slider .slick-dots li').each(function(index){
			const number = (index + 1).toString().padStart(2, '0'); // tambahkan nol di depan
			$(this).find('button').html(`<span class="dot-number">${number}</span>`);
		});
	});
</script>