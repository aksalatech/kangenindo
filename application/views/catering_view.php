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
	<body class="home_2 catering">
		<!-- header start-->
		<?php include("include/header.php"); ?>
		<!-- header end-->

		<!--==================================
			HOME 2 ADD BANNER AREA START
		===================================-->
		<!--==========================
        BREADCRUMB AREA START
    ===========================-->
    <section class="breadcrumb_area" style="background: url(<?php echo base_url();?>images/banner/banner-catering.png);">
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
        MENU STYLE 03 START
    ===========================-->
    <section class="menu_grid_view mt_120 xs_mt_100 mb_70">
        <div class="container">
            <div class="row">
				<div class="col-xs-12 mb_70">
					<!-- <h2>CATERING</h2> -->
					<img src="<?php echo base_url(); ?>images/catering-title.png" alt="catering" class="img-fluid w-100">
					
				</div>
                <div class="col-xl-3 col-lg-4 col-md-6 order-2 wow fadeInLeft">
                    <div class="menu_sidebar sticky_sidebar">
                        <div class="sidebar_wizard sidebar_category">
                            <p class="head_category">CATERING</p>
							<ul>
								<?php foreach($categoryList as $category) : ?>
									<li><a href="<?php echo base_url(); ?>catering/detail/<?php echo $category->id_category; ?>"><?php echo $category->category_name; ?></a></li>
								<?php endforeach ?>
                            </ul>
							<a class="head_category" href="#">DESSERT</a><br>
							<a class="head_category" href="#">DRINKS</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 order-lg-2">
                    <div class="row">
						<?php foreach($imageList as $image) : ?>
							<div class="col-xl-4 col-sm-6 wow fadeInUp">
								<div class="single_menu">
									<div class="single_menu_img detail">
										<img src="<?php echo base_url(); ?>images/catering/<?php echo $image->imagepath; ?>" alt="menu" class="img-fluid w-100">
									</div>
									<div class="cart_popup_text">
										<a href="javascript:void(0)"  onclick="ordermenu(<?php echo $image->imageid; ?>)" class="title"><?php echo $image->imagetitle; ?></a>
										<p class="menu_description"><?php echo $image->imagedesc; ?></p>
										<h4 class="price">$<?php echo $image->price; ?> <?php echo $image->imagetitle2; ?></h4>
									</div>
								</div>
							</div>
						<?php endforeach ?>
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