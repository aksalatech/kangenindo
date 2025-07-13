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
        FAQ'S START
		===========================-->
		<section class="faq_area pt_95 xs_pt_70">
			<div class="container">
				<div class="row wow fadeInUp">
					<div class="col-xl-12 m-auto">
						<div class="section_heading mb_25 text-left">
							<h2>FAQ's</h2>
						</div>
					</div>
				</div>
				<div class="row justify-content-between">
					<div class="col-xl-12 wow fadeInLeft">
						<div class="accordion faq_accordion" id="accordionPanelsStayOpenExample">
							<?php foreach($faqList as $faq) : ?>
							<div class="accordion-item">
								<h2 class="accordion-header" id="panelsStayOpen-headingOne">
									<button class="accordion-button" type="button" data-bs-toggle="collapse"
										data-bs-target="#panelsStayOpen-collapseOne<?php echo $faq->id_faq; ?>" aria-expanded="false"
										aria-controls="panelsStayOpen-collapseOne<?php echo $faq->id_faq; ?>">
										<?php echo $faq->faq_title; ?>
									</button>
								</h2>
								<div id="panelsStayOpen-collapseOne<?php echo $faq->id_faq; ?>" class="accordion-collapse collapse"
									aria-labelledby="panelsStayOpen-headingOne">
									<div class="accordion-body">
										<p><?php echo $faq->faq_desc; ?></p>
									</div>
								</div>
							</div>
							<?php endforeach ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--==========================
			FAQ'S END
		===========================-->

		<?php include("include/footer.php"); ?>
		<?php include("include/cart_modal.php"); ?>
		<!-- libs-->
		<?php include("include/include_js.php"); ?>
    </body>
</html>