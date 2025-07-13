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
		<div class="d_none" id="data-map"><?php echo json_encode($storeList) ?></div>
		<!-- hidden end-->

		<!--==========================
			BREADCRUMB AREA START
		===========================-->
		<section class="breadcrumb_area" style="background: url(<?php echo base_url(); ?>images/banner/<?php echo $banner->imageBanner; ?>);">
			<div class="container">
				<div class="row wow fadeInUp">
					<div class="col-12">
						<div class="breadcrumb_text">
							<h1>&nbsp;</h1>
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
		<section class="breakfast_menu mt_120 xs_mt_100 location-page franchise-page" style="position: relative">
			<div class="container">
				<div class="row wow fadeInUp">
					<div class="col-xl-8 m-auto">
						<div class="section_heading mb_25">
							<!-- <h5>Menu Book</h5> -->
							<h2>FIND YOUR LITTLE INDO TOWN ORDER</h2>
							<h4>Check out your order and its status before pick up your food.</h4>
						</div>
					</div>
				</div>
				<div class="row location-row">
					<div class="col-md-12 text-center">
						<div class="col-md-8 pull-left text-center contact_form">
							<input type="text" id="order_no" class="form-search-loc" placeholder="YOUR ORDER NUMBER">
						</div>
						<div class="col-md-4 pull-left text-left contact_form">
							<a class="common_btn" href="javascript:void(0)" id="btCheckout">
	                           CHECK OUT NOW &nbsp;<span class="fa fa-search white"></span>
	                        </a>
	                    </div>
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
<script type="text/javascript" src="<?php echo base_url(); ?>js2/find_order.js"></script>