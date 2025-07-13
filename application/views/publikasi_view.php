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
								<div class="heading heading--style-2 heading--green"><span class="heading__pre-title">Publikasi</span>
									<h2 class="heading__title no-margin-bottom"><span>MEDIA PUBLIKASI</span></h2>
								</div>
							</div>
							<div class="col-4">
								<!-- filter panel start-->
								<form class="search-form" action="<?php echo base_url() ;?>publikasi">
									<input type="search" class="search-form__input" name="key" value="<?php echo $keywords ?>" id="txtsearch" placeholder="Search...">
									<button class="search-form__submit" type="submit" fdprocessedid="cmtbbj">
										<svg class="icon">
											<use xlink:href="#search"></use>
										</svg>
									</button>
								</form>
								<!-- filter panel end-->
							</div>
						</div>
						<div class="row no-gutters left-3 right-3">
							<?php foreach($publikasiList as $publikasi) : ?>
								<div class="col-sm-6 col-md-4 col-xl-3">
									<div class="animal-block"><img class="img--bg" src="<?php echo base_url(); ?>images/publikasi/<?php echo $publikasi->picture; ?>" alt="img"/>
										<div class="animal-block__details">
											<h6 class="animal-block__title"><?php echo $publikasi->title; ?></h6><a class="animal-block__link" href="<?php echo base_url(); ?>publikasi/detail/<?php echo $publikasi->id_books; ?>">Learn more</a>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
						<div class="row">
							<div class="col-12">
								<div>
									<?php echo $pagination; ?>
								</div>
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