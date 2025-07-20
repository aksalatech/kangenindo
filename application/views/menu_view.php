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
	<body class="home_2 page-menu">
		<!-- header start-->
		<?php include("include/header.php"); ?>
		<!-- header end-->

		<!--==========================
			BREADCRUMB AREA START
		===========================-->
		<section class="breadcrumb_area mt_120" style="background: url(<?php echo base_url(); ?>images/banner/<?php echo $banner->imageBanner; ?>);">
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
				<div class="row" style="margin-bottom: 40px">
					<div class="row mb_15 wow fadeInUp">
                        <div class="col-xxl-12 col-lg-12 m-auto">
                            <ul class="filter_btn_area menu_4_slider">
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
						<?php foreach($imageList as $menu) : ?>
							<div class="col-xl-4 col-sm-6 col-lg-4 fadeInUp menuitem" data-cate="<?php echo $menu->id_category ?>">
								<div class="single_menu">
									<div class="single_menu_img">
										<img src="<?php echo base_url(); ?>images/catering/<?php echo $menu->imagepath; ?>" alt="<?php echo $menu->imagetitle; ?>" class="img-fluid w-100">
									</div>
									<div class="single_menu_text text-center">
										<a class="title mt_20" href="javascript:void(0)"><?php echo $menu->imagetitle; ?><br>
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

						<div id="row-empty" class="col-xl-12" style="padding: 100px 0px">
							<center><h1><b style="color:#DA402E">No menu found..</b></h1></center>
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
		<!-- libs-->
		<?php include("include/include_js.php"); ?>
    </body>
</html>
<script type="text/javascript">
	$(document).ready(function(e) {
		$(".linkmenu").click(function(e) {
			var id = $(this).attr("data-id");
			$(".menuitem").hide();
			$(".menuitem[data-cate='" + id + "']").fadeIn(1000);
			var items = $(".menuitem[data-cate='" + id + "']");
			if (items.length > 0)
				$("#row-empty").hide();
			else
				$("#row-empty").show();
			$(".limenu").removeClass("active");
			$(this).parent().addClass("active");
		});

		$(".linkmenu:first").click();
	});
</script>