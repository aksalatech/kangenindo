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
		<section class="breakfast_menu mt_120 xs_mt_100">
			<div class="container">
				<div class="row wow fadeInUp">
					<div class="col-xl-12 m-auto">
						<div class="text-center mb_25">
							<h1 class="title-h1-franchise">View Gallery</h1>
							<p class="subtitle-franchise" style="text-align: center">Thank you for spending time at Little Indo Town! Capture the moment and don’t forget to tag us on Instagram @littleindotown.au. <br><br>
								You deserve to have fun with friends and family at Little Indo Town!
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="breakfast_menu mt_40 pt_170" style="background-image: url(<?php echo base_url();?>images/gallery/bg-gallery1.png); background-size: cover; background-repeat: no-repeat;">
			<div class="container">
				<div class="row row-gallery-1">
					<?php foreach($galleryBintangbroList as $bintangbro) : ?>
						<div class="<?php echo $bintangbro->img_size; ?>">
							<img src="<?php echo base_url(); ?>images/gallery/<?php echo $bintangbro->img_name; ?>" class="img-wid-auto">
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</section>

		<section class="breakfast_menu pt_170" style="background-image: url(<?php echo base_url();?>images/gallery/bg-gallery2.png); background-size: cover; background-repeat: no-repeat;">
			<div class="container">
				<div class="row row-gallery-1">
					<?php foreach($galleryUrbandurianList as $urbandurian) : ?>
						<div class="<?php echo $urbandurian->img_size; ?>">
							<img src="<?php echo base_url(); ?>images/gallery/<?php echo $urbandurian->img_name; ?>" style="max-width: 100%;" class="img-wid-auto">
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</section>

		<section class="breakfast_menu pt_170" style="background-image: url(<?php echo base_url();?>images/gallery/bg-gallery3.png); background-size: cover; background-repeat: no-repeat;">
			<div class="container">
				<div class="row row-gallery-1">
					<?php foreach($galleryTegukList as $teguk) : ?>
						<div class="<?php echo $teguk->img_size; ?>">
							<img src="<?php echo base_url(); ?>images/gallery/<?php echo $teguk->img_name; ?>" class="img-wid-auto">
						</div>
					<?php endforeach ?>
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