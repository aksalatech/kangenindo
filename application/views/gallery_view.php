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
		<section class="cta-location" style="background: none; margin-top: 150px;">
			<div class="fluid-container">
				<div class="row align-items-center justify-content-center">
					<img class="img-divider" src="<?php echo base_url(); ?>images/gallery/gallery-icon.png" alt="">
				</div>
			</div>
		</section>

		<section class="breakfast_menu pt_50 pb_50">
			<!-- <div class="container">
				<div class="row g-2">
					<?php foreach ($galleryList as $index => $img): ?>
					<div class="<?php echo ($index === 0 || $index === 3 || $index === 4) ? 'col-lg-6' : 'col-6 col-lg-3'; ?>">
						<div class="image-box">
						<img src="<?php echo base_url('images/gallery/' . $img->img_name); ?>" class="img-fluid img-cover" alt="Image <?php echo $index + 1; ?>">
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div> -->

			<div class="container">
				<div class="image-grid">
					<?php foreach ($galleryList as $index => $img): ?>
					<div class="image-item image-item-<?php echo $index + 1; ?>">
						<img src="<?php echo base_url('images/gallery/' . $img->img_name); ?>" alt="Image <?php echo $index + 1; ?>">
					</div>
					<?php endforeach; ?>
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