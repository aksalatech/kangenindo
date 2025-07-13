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
			<?php if (!$readonly) { ?>
			<div style="background: #DA402E; padding: 12px">
				<div class="container text-center white" style="font-size: 18pt">
					<a href="javascript:void(0)" id="btnChangeStore">
						<b class="white">
							<span class="fa fa-map-marker white"></span>
							&nbsp;
							<font class="store_name"><?php echo $store->store_name ?></font>
							&nbsp; <span class="fa fa-chevron-down white"></span>
							<input type="hidden" id="store_id" name="store_id" value="<?php echo $store->id_store ?>" />
						</b>
					</a>
				</div>
			</div>
			<?php } ?>
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
					<div class="col-xl-12 m-auto">
						<div class="section_heading mb_25">
							<!-- <h5>Menu Book</h5> -->
							<h2>Our <?php echo $brands->brandNm ?> Menu</h2>
						</div>
					</div>
				</div>
				<div class="row" style="margin-bottom: 40px">
					<div class="col-lg-2">
						<div class="menu_sidebar sticky_sidebar">
							<div class="sidebar_wizard sidebar_category">
								<p class="head_category">List Brand</p>
								<ul>
									<?php foreach ($brandList as $b) { ?>
										<li>
											<a href="<?php echo base_url(); ?>Order/menu/<?php echo $storeLocation; ?>?brand=<?php echo $b->brandID; ?>"><?php echo $b->brandNm ?></a>
										</li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-10">
						<div class="row mb_15 wow fadeInUp">
							<div class="col-xxl-12 col-lg-12 m-auto">
								<ul class="filter_btn_area">
									<?php 
										$i = 0;
										foreach($categoryList as $category) : ?>
										<li class="limenu <?php echo ($i == 0) ? 'active' : '' ?>"><a href="#cate_<?php echo $category->id_category ?>" data-id="<?php echo $category->id_category ?>" class="linkmenu"><?php echo $category->category_name; ?></a></li>
									<?php
											$i++; 
										endforeach; ?>
								</ul>
							</div>
						</div>
						<div class="row">
	                    	<div class="col-12" style="min-height: 450px">
	                    	<?php 
                    		$i = 0;
                    		foreach($categoryList as $category) : 
                    			$CI =& get_instance(); // Get CodeIgniter instance
				                $CI->load->model('Image_model'); // Load the model
				                $menuList = $CI->Image_model->get_image_by_category($category->id_category); 
                    			?>
		                        
		                            <div class="colorful-tab-content <?php echo ($i == 0) ? 'active' : 'd_none' ?>" id="cate_<?php echo $category->id_category ?>">
		                                <div class="row">
		                                    <?php 
		                                    if (sizeof($menuList) > 0) {
		                                    	foreach($menuList as $menu) : ?>
												<div class="col-xl-4 col-sm-6 col-lg-4">
													<div class="single_menu popular_food_item">
														<div class="img text-center">
															<img src="<?php echo base_url(); ?>/images/catering/<?php echo $menu->imagepath; ?>" alt="<?php echo $menu->imagetitle; ?>" class="img-fluid w-100 img_wid_auto">
														</div>
														<div class="single_menu_text text-center">
															<a class="title" href="javascript:void(0)"><?php echo $menu->imagetitle; ?>
															</a>
															<p class="descrption"><?php echo $menu->imagedesc; ?></p>
															<?php if (!$readonly) { ?>
																<div class="d-flex flex-wrap align-items-center">
																	<div class="price details">
																		<p>PRICE</p>
																		<h3>$<?php echo $menu->price ?></h3>
																	</div>
																	<!-- <div class="price">
																		<p>EXTRA CHEESE</p>
																		<h3>$40</h3>
																	</div>	 -->
																	<?php if ($menu->hasSpicy == 1) { ?>
																		<img class="img-flavor-spicy" src="<?php echo base_url();?>images/spicy.png">
																	<?php } ?>
																</div>
																<a class="see_btn" href="javascript:void(0)" onclick="ordermenu(<?php echo $menu->imageid; ?>)">Order</a>
															<?php } ?>
														</div>
													</div>
												</div>
											<?php endforeach;
											} else { ?>
												<div class="col-xl-12" style="padding: 100px 0px">
													<center><h1><b style="color:#DA402E">No menu found..</b></h1></center>
												</div>
											<?php } ?>
		                                </div>
		                            </div>
		                        
	                        <?php
                        		$i++; 
                    		endforeach ?>
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
		<?php include("include/menu_modal.php"); ?>
		<?php include("include/location_modal.php"); ?>
		<?php include("include/promo_modal.php"); ?>
		<!-- libs-->
		<?php include("include/include_js.php"); ?>
    </body>
</html>
<?php if (!$readonly) { ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4lhzQw0y2D8qM-5axyxmBa6XTq6ce9XM&callback=initMap&libraries=places" defer></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js2/map.js"></script>
<?php } ?>
<script type="text/javascript">
	$(document).ready(function(e) {
		$(".linkmenu").click(function(e) {
			var href = $(this).attr("href");
			$(".colorful-tab-content").hide();
			window.setTimeout(function() {
				$(href).fadeIn("fast");
			}, 200);
			
		});
	});
</script>