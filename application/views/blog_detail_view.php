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

		<!--==========================
        BLOG DETAILS START
		===========================-->
		<section class="blog_details mt_120 xs_mt_100">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 wow fadeInLeft">
						<div class="blog_details_img">
							<img src="<?php echo base_url(); ?>images/blog/<?php echo $blog->image; ?>" class="img-fluid w-100">
						</div>
						<div class="blog_details_header">
							<ul class="left_info">
								<li><span>blog</span></li>
								<li><i class="far fa-user-circle"></i> <?php echo $blog->creator; ?></li>
								<li><i class="far fa-calendar-alt"></i><?php echo date("D, d M Y", strtotime($blog->created_date)) ; ?></li>
							</ul>
						</div>
						<div class="blog_details_text">
							<h2><?php echo $blog->title; ?></h2>
							<p><?php echo $blog->subtitle; ?></p>
							<br><br>
							<?php echo $blog->blog_text; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--==========================
			BLOG DETAILS END
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