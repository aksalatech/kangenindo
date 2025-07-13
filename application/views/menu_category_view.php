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
			BREADCRUMB AREA START
		===========================-->
		<section class="breadcrumb_area" style="background: url(<?php echo base_url(); ?>images/banner/<?php echo $banner->imageBanner; ?>);">
			<div class="container">
				<div class="row wow fadeInUp">
					<div class="col-12">
						<div class="breadcrumb_text">
							<h1><?php echo $banner->title; ?></h1>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--==========================
			BREADCRUMB AREA END
		===========================-->

		<!--==========================
			MENU STYLE 02 START
		===========================-->
		<section class="breakfast_menu mt_120 xs_mt_100">
			<div class="container">
				<div class="row wow fadeInUp">
					<div class="col-xl-8 m-auto">
						<div class="section_heading mb_25">
							<!-- <h5>Menu Book</h5> -->
							<h2><?php echo $category->category_name; ?></h2>
						</div>
					</div>
				</div>
				<div class="row">
					<?php foreach($imageList as $menu) : ?>
						<div class="col-xl-3 col-sm-6 col-lg-4 wow fadeInUp">
							<div class="single_menu">
								<div class="single_menu_img">
									<img src="<?php echo base_url(); ?>/images/catering/<?php echo $menu->imagepath; ?>" alt="<?php echo $menu->imagetitle; ?>" class="img-fluid w-100">
								</div>
								<div class="single_menu_text text-center">
									<a class="title" href="javascript:void(0)"><?php echo $menu->imagetitle; ?><br>
										<span><?php echo $menu->imagetitle2; ?></span>
									</a>
									<p class="descrption"><?php echo $menu->imagedesc; ?></p>
									<div class="d-flex flex-wrap align-items-center">
										<div class="price">
											<p>BURGER</p>
											<h3>$40</h3>
										</div>
										<div class="price">
											<p>EXTRA CHEESE</p>
											<h3>$40</h3>
										</div>	
										
										<img class="img-flavor-spicy" src="<?php echo base_url();?>images/spicy.png">
									</div>
									<a class="add_to_cart" href="javascript:void(0)" onclick="ordermenu(<?php echo $menu->imageid; ?>)">Order</a>
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
		<?php include("include/menu_modal.php"); ?>
		<!-- libs-->
		<?php include("include/include_js.php"); ?>
    </body>
</html>