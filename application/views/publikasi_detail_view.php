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
		<!-- web-font loader-->
		<script>
			WebFontConfig = {

				google: {

					families: ['Nunito+Sans:300,400,500,700,900', 'Quicksand:300,400,500,700'],

				}

			}

			function font() {

				var wf = document.createElement('script')

				wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js'
				wf.type = 'text/javascript'
				wf.async = 'true'

				var s = document.getElementsByTagName('script')[0]

				s.parentNode.insertBefore(wf, s)

			}

			font()
		</script>
	</head>
	<body>
		<div class="page-wrapper">
			<!-- header start-->
			<?php include("include/header.php"); ?>
			<!-- header end-->
			<main class="main">
				<!-- section start-->
				
				<section class="section animals">
					<div class="container">
						<div class="row align-items-center bottom-30">
							<div class="col-8">
								<div class="heading heading--style-2 heading--green">
									<a href="<?php echo base_url(); ?>publikasi">Publikasi</a>
									<!-- <h2 class="heading__title no-margin-bottom"><span>MEDIA PUBLIKASI</span></h2> -->
									/

									<?php echo $publikasi->title; ?>
								</div>
							</div>
						</div>
						<div class="row no-gutters left-3 right-3">
							<div class="col-sm-6 col-lg-6">
								<img class="" src="<?php echo base_url(); ?>images/publikasi/<?php echo $publikasi->picture; ?>" alt="img"/>
							</div>
							<div class="col-sm-6 col-lg-6">
								<div class="shop-product__top">
									<h4 class="shop-product__name" style="color: #2eb872"><?php echo $publikasi->title; ?></h4>
								</div>
								<div class="shop-product__description">
									<p><?php echo $publikasi->synopsys; ?></p>
									<div class="shop-product__rating product-form">
										<a class="shop-item__add" href="#" style="border-radius: 15px">
											<i class="fa fa-file-pdf-o" style="margin-right: 10px;"></i>
											<span> UNDUH</span>
										</a>
									</div>
								</div>
								<ul class="pagination shop__pagination pagination-books" style="justify-content: space-between;">
									<?php if ($prev != "") : ?>
										<li class="pagination__item pagination__item--prev"><a href="<?php echo base_url(); ?>publikasi/detail/<?php echo $prev; ?>"><i class="fa fa-angle-left" aria-hidden="true"></i><span>Sebelumnya</span></a></li>
									<?php endif; ?>
									<?php if ($next != "") : ?>
										<li class="pagination__item pagination__item--next" style="margin: 0"><a href="<?php echo base_url(); ?>publikasi/detail/<?php echo $next; ?>"><span>Selanjutnya</span><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
									<?php endif; ?>
								</ul>
							</div>
						</div>
					</div>
				</section>
				<!-- section end-->
			</main>
			<?php include("include/footer.php"); ?>
		</div>
		<?php include("include/include_js.php"); ?>
    </body>
</html>