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
				<!-- gallery start-->
				<section class="section gallery" style="margin-top: 70px">
					<div class="container" >
						<div class="row">
							<?php foreach($videoList as $video) : ?>
							<div class="col-md-4 col-sm-12 col-xs-12 box-iframe-video">
								<iframe width="100%" height="225" src="<?php echo $video->videopath; ?>" title="<?php echo $video->videotitle; ?>" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
								<h6><?php echo $video->videotitle; ?></h6>
							</div>
							<?php endforeach ?>
						</div>
					</div>
					<!-- <div class="container top-70">
						<div class="row">
							<div class="col-12 text-center"><a class="button button--primary" href="#">More Animals</a></div>
						</div>
					</div> -->
				</section>
				<!-- gallery end-->
			</main>
			<?php include("include/footer.php"); ?>
		</div>
		<?php include("include/include_js.php"); ?>

    </body>
</html>

<script src="<?php echo base_url(); ?>js/jquery.lazy.min.js"></script>

<script>
	$('.lazy').Lazy({
        scrollDirection: 'vertical',
        effect: 'fadeIn',
        visibleOnly: true,
        onError: function(element) {
            console.log('error loading ' + element.data('src'));
        }
    });
</script>
