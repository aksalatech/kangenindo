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
			MENU STYLE 02 START
		===========================-->
		<section class="breakfast_menu mt_120 xs_mt_150">
			<div class="container">
				<div class="row wow fadeInUp">
					<div class="col-xl-12 m-auto">
						<div class="text-center mb_25">
							<h2 class="title-h2-franchise">ABOUT</h2>
							<h1 class="title-h1-franchise"><?php echo $about->quote_text; ?></h1>
							<div class="row row-img-about">
								<div class="col-lg-4">
									<img src="<?php echo base_url(); ?>images/about/<?php echo $about->picture; ?>">
								</div>
								<div class="col-lg-4">
									<img src="<?php echo base_url(); ?>images/about/<?php echo $about->picture2; ?>">
								</div>
								<div class="col-lg-4">
									<img src="<?php echo base_url(); ?>images/about/<?php echo $about->picture3; ?>">
								</div>
							</div>
							<p class="subtitle-franchise"><?php echo nl2br($about->simple_quote2); ?></p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="breakfast_menu mt_120 xs_mt_100">
			<div class="container">
				<div class="img_about_team">
					<?php 
						$index = 1;
						foreach($imageList as $image) : 
						$index++;

							if ($image->active == 1) : 
					?>
						
						<!-- <div class="col-lg-6"> -->
							<img src="<?php echo base_url(); ?>images/about/<?php echo $image->image_name; ?>" class="img-wid-auto">
						<!-- </div> -->
					<?php 
							endif;
						endforeach ?>

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