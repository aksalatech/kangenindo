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
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 wow fadeInLeft box_details_img_events">
						<div class="blog_details_img">
							<img src="<?php echo base_url(); ?>images/blog/<?php echo $blog->image; ?>" class="img-fluid w-100">
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12 wow fadeInLeft">
						<!-- <div class="blog_details_header">
							<ul class="left_info">
								<li><span>blog</span></li>
								<li><i class="far fa-user-circle"></i> <?php echo $blog->creator; ?></li>
								<li><i class="far fa-calendar-alt"></i><?php echo date("D, d M Y", strtotime($blog->created_date)) ; ?></li>
							</ul>
						</div> -->
						<div class="blog_details_text mb_50">
							<h2><?php echo $blog->title; ?></h2>
							<p><?php echo $blog->subtitle; ?></p>
							<?php echo $blog->blog_text; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--==========================
			BLOG DETAILS END
		===========================-->

		<section class="mt_80 xs_mt_100">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6">
						<img src="<?php echo base_url(); ?>images/recent_events.png" class="img-fluid w-100" style="height: auto !important;">
					</div>
					<div class="col-lg-12 mt_50 mb_70">
						<div class="recent_events">
							<div class="row testimonial_2_slider events_detail_slider">
								<?php foreach($eventList as $events) : ?>
								<div class="col-12">
									<div class="recent_events_item">
										<div class="recent_events_item_img">
											<img src="<?php echo base_url(); ?>images/blog/<?php echo $events->image; ?>" class="img-fluid w-100">
										</div>
										<div class="recent_events_item_text">
											<h5><?php echo $events->title; ?></h5>
											<p class="limit-4-lines"><?php echo $events->blog_text; ?></p>
											<a class="common_btn" href="<?php echo base_url(); ?>events/detail/<?php echo $blog->idblog; ?>">Read More</a>
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
	$('.testimonial_2_slider').on('init', function(event, slick){
		$('.testimonial_2_slider .slick-dots li').each(function(index){
			const number = (index + 1).toString().padStart(2, '0'); // tambahkan nol di depan
			$(this).find('button').html(`<span class="dot-number">${number}</span>`);
		});
	});
</script>