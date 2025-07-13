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
				<!-- promo start-->
				<section class="promo-primary">
					<picture>
						<source srcset="<?php echo base_url(); ?>images/banner-dashboard.png" media="(min-width: 992px)"/><img class="img--bg" src="<?php echo base_url(); ?>images/banner-dashboard.png" alt="img"/>
					</picture>
					<div class="container">
						<div class="row">
							<div class="col-auto">
								<div class="align-container">
									<div class="align-container__item"><span class="promo-primary__pre-title">Data dan Informasi</span>
										<h1 class="promo-primary__title"><span>Statistik</span> <span>Alumni</span></h1>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<div class="fluid-container">
					<iframe src="https://haeipb.or.id/hae/backend/dashboard" style="width:100%; border:0px; height: 2500px"></iframe>
				</div>
			</main>
			<?php include("include/footer.php"); ?>
		</div>
		<?php include("include/include_js.php"); ?>
    </body>
</html>