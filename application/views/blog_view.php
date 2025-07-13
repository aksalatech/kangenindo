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
        BLOGS START
    ===========================-->
    <section class="blog_page mt_95 xs_mt_70 mb_70">
        <div class="container">
            <div class="row">
				<?php foreach($blogList as $blog) : ?>
					<div class="col-xl-4 col-md-6 wow fadeInUp">
						<div class="single_blog_2">
							<a href="<?php echo base_url(); ?>events/detail/<?php echo $blog->idblog; ?>" class="single_blog_2_img">
								<img src="<?php echo base_url(); ?>images/blog/<?php echo $blog->image; ?>" alt="blog" class="img-fluid w-100">
							</a>
							<div class="single_blog_2_text">
								<ul>
									<li>
										<a href="#">Burger</a>
									</li>
									<li>
										<span>
											<img src="<?php echo base_url(); ?>images/calendar_2.svg" alt="calendar" class="img-fluid w-100">
										</span>
										<?php echo $blog->created_date; ?>
									</li>
								</ul>
								<a class="title" href="<?php echo base_url(); ?>events/detail/<?php echo $blog->idblog; ?>"><?php echo $blog->title; ?></a>
								<a class="read_btn" href="<?php echo base_url(); ?>events/detail/<?php echo $blog->idblog; ?>">Read More <i
										class="far fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
				<?php endforeach ?>
            </div>
        </div>
    </section>
    <!--==========================
        BLOGS END
    ===========================-->

		<!--==================================
			HOME 2 ADD BANNER AREA END
		===================================-->

		<?php include("include/footer.php"); ?>
		<?php include("include/menu_modal.php"); ?>
		<!-- libs-->
		<?php include("include/include_js.php"); ?>
    </body>
</html>