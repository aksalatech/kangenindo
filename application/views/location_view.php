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

		<!-- hidden start-->
		<!-- <div class="d_none" id="data-map"><?php echo json_encode($storeList) ?></div> -->
		<!-- hidden end-->

		<!--==========================
			BREADCRUMB AREA START
		===========================-->
		<!-- <section class="breadcrumb_area" style="background: url(<?php echo base_url(); ?>images/banner/<?php echo $banner->imageBanner; ?>);">
			<div class="container">
				<div class="row wow fadeInUp">
					<div class="col-12">
						<div class="breadcrumb_text">
							<h1><?php //echo $banner->title; ?></h1>
						</div>
					</div>
				</div>
			</div>
		</section> -->
		<!--==========================
			BREADCRUMB AREA END
		===========================-->

		<!--==========================
			MENU STYLE 02 START
		===========================-->
		<section class="breakfast_menu mt_150 xs_mt_120 location-page franchise-page" style="position: relative">
			<div class="container-fluid">
				<div class="row wow fadeInUp">
					<div class="col-md-6">
						<div class="section_heading mb_25 text-left">
							<!-- <h5>Menu Book</h5> -->
							<h2>SELECT A <?php echo $config->title ?> RESTAURANT <span class="icon-on-location"><img src="<?php echo base_url(); ?>images/icon-on-location.png"></span></h2>
							<h4 class="subtitle-location">Find all restaurant opening hours PLUS you can place your order for restaurant pick up or delivery.</h4>
						</div>
						<div class="row">
							<div class="col-md-7 text-center">
							</div>
							<div class="col-md-5 text-center">
								<a class="common_btn" href="<?php echo base_url() ?>location">
								OTHER LOCATIONS
									<span class="icon">
										<img src="<?php echo base_url();?>images/location-icon.png"class="img-fluid w-100">
									</span>
								</a>
							</div>
							
							<!-- <div class="col-md-6 text-center contact_form">
								<input type="text" id="autocomplete" class="form-search-loc" placeholder="POST CODE OR SUBURB/TOWN">
							</div> -->
						</div>

						<div class="box-store">
							<div class="storeDiv">
								<div class="row mb_50">
									<div class="col-md-6">
										<div class="d-flex gap-3">
											<img class="pin-store" src="<?php echo base_url(); ?>images/location.png">
											<div class="title-store">
												<h5 class=""><?php echo $store->store_name; ?></h5>
												<div class="clear"></div>
												<p>
													<?php echo $store->store_address; ?>
												</p>
											</div>
										</div>
										<div class="d-flex gap-3">
											<img class="pin-store" src="<?php echo base_url(); ?>images/phone.png">
											<div class="title-store">
												<h5 class=""><?php echo $store->store_phone; ?></h5>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="d-flex gap-3">
											<img class="pin-store" src="<?php echo base_url(); ?>images/hours.png">
											<div class="title-store">
												<h5 class="">Open Hours</h5>
												<div class="clear"></div>
												<p>
													DINE IN
												</p>
												<table class="table-hours">
													<tr>
														<td>Mon - Wed</td>
														<td><?php echo $store->open_hours; ?></td>
													</tr>
													<tr>
														<td>Thu - Sat</td>
														<td><?php echo $store->open_hours2; ?></td>
													</tr>
													<tr>
														<td>Sun</td>
														<td><?php echo $store->open_hours2; ?></td>
													</tr>
												</table>
											</div>
										</div>
									</div>
								</div>
								<a href="#" class="btn common_btn">DIRECTION</a>
							</div>
							
						</div>
					</div>
					<div class="col-md-6">
					<iframe style="border-radius: 25px" src="<?php echo $store->embedMaps; ?>" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				</div>
			</div>
		</section>

		<section class="product-highlight pt_40 pb_40 location-page mb_100">
			<div class="container-fluid">
				<div class="row gallery_slider">
					<?php foreach($bannerList as $menu) : ?>
						<div class="col-xl-4 col-sm-6 col-lg-4 fadeInUp menuitem">
							<div class="single_menu">
								<div class="single_menu_img">
									<img src="<?php echo base_url(); ?>images/banner/<?php echo $menu->img_banner; ?>" alt="<?php echo $menu->title; ?>" class="img-fluid w-100">
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-sm-6 col-lg-4 fadeInUp menuitem">
							<div class="single_menu">
								<div class="single_menu_img">
									<img src="<?php echo base_url(); ?>images/banner/<?php echo $menu->img_banner; ?>" alt="<?php echo $menu->title; ?>" class="img-fluid w-100">
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-sm-6 col-lg-4 fadeInUp menuitem">
							<div class="single_menu">
								<div class="single_menu_img">
									<img src="<?php echo base_url(); ?>images/banner/<?php echo $menu->img_banner; ?>" alt="<?php echo $menu->title; ?>" class="img-fluid w-100">
								</div>
							</div>
						</div>
					<?php endforeach ?>
				</div>
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
<script type="text/javascript">
	$(document).ready(function(e) {
		$("body").on("click",".btGetDirection", function(e) {
			var lat = $(this).attr("data-lat");
			var lng = $(this).attr("data-lang");
			window.open("https://maps.google.com/maps?saddr=%28" + tempLat + "%2C%20" + tempLng + "%29&daddr=" + lat + "%2C%20" + lng);
		});
	});

	$('.gallery_slider').on('init', function(event, slick){
		$('.gallery_slider .slick-dots li').each(function(index){
			const number = (index + 1).toString().padStart(2, '0'); // tambahkan nol di depan
			$(this).find('button').html(`<span class="dot-number">${number}</span>`);
		});
	});
</script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4lhzQw0y2D8qM-5axyxmBa6XTq6ce9XM&callback=initMap&libraries=places" defer></script> -->
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>js2/map.js"></script> -->