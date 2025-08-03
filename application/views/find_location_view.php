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
		<!-- <section class="breadcrumb_area" style="background: url(<?php echo base_url(); ?>images/banner/<?php echo $banner->imageBanner; ?>);">
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
		<img src="<?php echo base_url(); ?>images/line-yellow-large.png"> -->
		<!--==========================
			BREADCRUMB AREA END
		===========================-->

		<!--==========================
			MENU STYLE 02 START
		===========================-->
		<section class="breakfast_menu mt_180 mb_70 xs_mt_100 location-page franchise-page" style="padding-top:54px;position: relative"><!-- 
			<img class="img_flow_line right" src="<?php echo base_url(); ?>images/flow-line.png">
			<img class="img_flow_line left" src="<?php echo base_url(); ?>images/flow-line.png"> -->
			<div class="container">
				<div class="row wow fadeInUp">
					<div class="col-xl-9 m-auto">
						<div class="section_heading mb_25">
							<!-- <h5>Menu Book</h5> -->
							<h2>SELECT A <?php echo strtoupper($config->title) ?> RESTAURANT</h2>
							<h4 style="margin-top: 12px">Find all restaurant opening hours PLUS you can place your order for restaurant pick up or delivery.</h4>
						</div>
					</div>
				</div>
				<div class="row location-row">
					<div class="col-md-5 text-center">
						<a class="common_btn" href="javascript:void(0)" id="btCurrentLocation">
                           USE CURRENT LOCATION
						   <span class="icon">
                                <img src="<?php echo base_url();?>images/location-icon.png"class="img-fluid w-100">
                            </span>
                        </a>
					</div>
					<div class="col-md-1 text-center">
						<label class="label-loc">OR</label>
					</div>
					<div class="col-md-6 text-center contact_form autocomplete-container">
						<input type="text" id="search" class="form-search-loc" onkeyup="searchPlaces(event)" placeholder="POST CODE OR SUBURB/TOWN">
						<div id="autocomplete-results" class="autocomplete-results"></div>
					</div>
				</div>
				<div class="box-location-store d_none location-row">
					
						<div class="row" style="margin-top: 20px;">
							
							<div class="col-xl-6 scrollable-content">
								<?php foreach($storeList as $store) : ?>
								<div class="storeDiv">
									<div class="title-store">
										<h5 class="pull-left"><?php echo $store->store_name; ?>
											<?php if ($store->coming_soon == 1) { ?>
												&nbsp;&nbsp;<span class="label label-danger">Coming Soon</span>
											<?php } ?>
										</h5>
										<h5 class="pull-right"><span><img class="pin-store" style="width:12px !important" src="<?php echo base_url(); ?>images/pin-location.png"></span> <span class="distance" data-id="<?php echo $store->id_store ?>">0.4KM</span></h5>
										<div class="clear"></div>
									</div>
									<p>
										<?php echo $store->store_address; ?>
									</p>
									<p>
										Phone: <?php echo $store->store_phone; ?>
									</p>
									<div class="box-directions">
										<a href="javascript:void(0)" data-id="<?php echo $store->id_store ?>" class="btOpenHours">Open Hours</a>
										<a href="javascript:void(0)" data-lat="<?php echo $store->latitude ?>" data-lang="<?php echo $store->longitude ?>" class="btGetDirection">Get Directions</a>
										<hr>
									</div>
									<ul class="scheduleDiv d_none" data-id="<?php echo $store->id_store ?>">
										<li><a href="javascript:void(0)" class='marklink'>Sun - Thu</a><?php echo $store->open_hours ?></li>
										<li><a href="javascript:void(0)" class='marklink'>Fri&nbsp; - &nbsp;Sat&nbsp;</a><?php echo $store->open_hours2 ?></li>
									</ul>
									<div id="marketDiv">
										<?php if ($store->order_link != "") { ?>
											<a href="<?php echo $store->order_link ?>"><img class="pin-store" style="width: 25px !important" src="<?php echo base_url(); ?>images/icon-cart.png"></span> &nbsp;Pickup</a>
										<?php } ?>
										<!-- <a href="<?php echo base_url() ?>Order/menu/<?php echo $store->id_store ?>"><img class="pin-store" style="width: 25px !important" src="<?php echo base_url(); ?>images/icon-cart.png"></span> &nbsp;Pickup</a> -->

										<!-- <a href="https://ubereats.com"><img style="height: 18px !important" src="<?php echo base_url(); ?>images/ubereats.png"></span></a> -->
									</div>
									<p style="margin-top: 30px">
										Our current opening hours may change from 
										day to day as a reflection of the current 
										trading environment.
									</p>

									<hr style="margin: 40px 0px" />
								</div>
								
								<?php endforeach ?>
							</div>
							<div class="col-xl-6">
								<div id="maps" style="width: 100%;height: 500px">
			                      <!-- Maps Here... -->
			                    </div>
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRue8nV1tDiW-YsT6lWFPKfiBLjOQoxMs&callback=initMap" defer></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js2/map.js"></script>