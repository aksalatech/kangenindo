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
				<section class="promo promo--front-3">
					<div class="promo-slider promo-slider--style-2">
						<?php foreach($sliderList as $slider) : ?>
						<div class="promo-slider__item promo-slider__item--style-2">
							<picture>
								<source srcset="<?php echo base_url(); ?>images/slider/<?php echo $slider->imagepath; ?>" media="(min-width: 992px)"/><img class="img--bg" src="<?php echo base_url(); ?>images/slider/<?php echo $slider->imagepath; ?>" alt="img"/>
							</picture>
							<div class="container">
								<div class="row">
									<div class="col-lg-8 col-xl-7">
										<div class="align-container">
											<div class="align-container__item">
												<div class="promo-slider__wrapper-1">
													<h2 class="promo-slider__title"><?php echo $slider->imagetitle; ?></h2>
												</div>
												<div class="promo-slider__wrapper-2">
													<p class="promo-slider__subtitle"><?php echo $slider->content; ?></p>
												</div>
												<div class="promo-slider__wrapper-3"><a class="button promo-slider__button button--primary button--green" href="<?php echo $slider->url_link; ?>">Discover</a></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach ?>
					</div>
					<div class="container">
						<div class="row">
							<div class="col-12">
								<!-- promo pannel start-->
								<div class="promo-pannel">
									<div class="promo-pannel__details">
										<div class="promo-slider__nav dots--style-2"></div>
										<div class="promo-slider__count"></div>
									</div>
								</div>
								<!-- promo pannel end-->
							</div>
						</div>
					</div>
				</section>
				<!-- promo end-->
				<!-- section start-->
				<section class="section about-terrarium"><img class="img--aside t50 l0 w-33" src="<?php echo base_url(); ?>images/forest-animal.png" alt="img"/>
					<div class="container">
						<div class="row">
							<div class="col-xl-8 offset-xl-4">
								<div class="heading heading--style-2 heading--green"><span class="heading__pre-title">Profil</span>
									<h2 class="heading__title"><?php echo $about->quote_text; ?></h2>
								</div>
								<p><strong><?php echo $about->simple_quote; ?></strong></p>
								<p class="bottom-40 text-justify">
									<?php echo $about->content; ?>
								</p>
								<div class="row offset-30">
									<div class="col-sm-4">
										<div class="counter-item counter-item--front">
											<div class="counter-item__top">
												<h6 class="counter-item__title">Angkatan</h6>
											</div>
											<div class="counter-item__lower"><span class="js-counter color--green"><?php echo $about->box1; ?></span></div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="counter-item counter-item--front">
											<div class="counter-item__top">
												<h6 class="counter-item__title">Komda</h6>
											</div>
											<div class="counter-item__lower"><span class="js-counter color--green"><?php echo $about->box2; ?></span></div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="counter-item counter-item--front">
											<div class="counter-item__top">
												<h6 class="counter-item__title">Alumni</h6>
											</div>
											<div class="counter-item__lower"><span class="js-counter color--green"><?php echo number_format($total_alumni); ?></span></div>
										</div>
									</div>
								</div><a class="button button--green top-40" href="<?php echo base_url(); ?>about">Lihat Selengkapnya</a>
							</div>
						</div>
					</div>
				</section>
				<!-- section end-->
				<!-- section start-->
				<section class="section no-padding-bottom">
					<div class="container">
						<div class="row align-items-end bottom-50">
							<div class="col-md-6">
								<div class="heading heading--style-2 heading--green"><span class="heading__pre-title">Berita</span>
									<h2 class="heading__title no-margin-bottom"><span>Berita terbaru</span><br/> <span> dari HA-E</span></h2>
								</div>
							</div>
							<div class="col-md-6 text-md-right">
								<a class="button button--green button-less-pad" href="<?php echo base_url(); ?>blog">Lihat Selengkapnya</a>
								<div class="fishes-slider__dots dots--style-2"></div>
							</div>
						</div>
					</div>
					<div class="slider-holder slider-holder--style-2">
						<div class="slider-holder__wrapper">
							<div class="fishes-slider">
								<?php foreach($blogHomeList as $blog) : ?>
									<div class="fishes-slider__item">
										<a href="<?php echo base_url(); ?>blog/detail/<?php echo $blog->idblog; ?>/<?php echo str_replace(array("%20"), "-", strtolower(rawurlencode($blog->title))); ?>">
											<div class="text-box"><img class="img--bg" src="<?php echo base_url(); ?>images/blog/<?php echo $blog->thumbnail; ?>" alt="img"/>
												<div class="text-box__details">
													<span class="text-box__count"><?php echo $blog->blogcategory_name; ?></span>
													<h6 class="text-box__title"><?php echo $blog->title; ?></h6>
													<div class="text-box__text"><?php echo $blog->subtitle; ?></div>
												</div>
											</div>
										</a>
									</div>
								<?php endforeach ?>
							</div>
						</div>
					</div>
				</section>
				<!-- section end-->
				<!-- gallery start-->
				<section class="section gallery no-padding-bottom">
					<div class="container">
						<div class="row bottom-50 align-items-end">
							<div class="col-lg-6">
								<div class="heading heading--style-2 heading--green"><span class="heading__pre-title">galleri</span>
									<h2 class="heading__title no-margin-bottom"><span>Galleri</span> <span>HA-E</span></h2>
								</div>
								<a class="button button--green button-less-pad" href="<?php echo base_url(); ?>/gallery">Lihat Selengkapnya</a>
							</div>
							<div class="col-lg-6 text-right d-none d-lg-block">
								<!-- filter panel start-->
								<ul class="filter-panel filter-panel--style-2 justify-content-end">
									<li class="filter-panel__item filter-panel__item--active" data-filter="*"><span>All</span></li>
									<?php foreach($categoryList as $category) : ?>
										<li class="filter-panel__item" data-filter=".<?php echo $category->category_code; ?>"><span><?php echo $category->category_name; ?></span></li>
									<?php endforeach ?>
								</ul>
								<!-- filter panel end-->
							</div>
						</div>
					</div>
					<div class="row no-gutters gallery-masonry">
						<?php foreach($galleryList as $gallery) : ?>
							<div class="<?php echo $gallery->category_code; ?> col-sm-6 <?php echo ($gallery->imagesize == "small") ? "col-md-3" : "col-md-6"; ?> gallery-masonry__item gallery-masonry__item--green">
								<a class="gallery-masonry__img gallery-masonry__item--height" href="<?php echo base_url(); ?>images/gallery/<?php echo $gallery->imagepath; ?>" data-fancybox="gallery">
									<img class="img--bg" src="<?php echo base_url(); ?>images/gallery/<?php echo $gallery->imagepath; ?>" alt="img"/>
									<div class="gallery-masonry__description">
										<span><?php echo $gallery->category_name; ?></span>
										<span><?php echo $gallery->imagetitle; ?></span>
									</div>
								</a>
							</div>
						<?php endforeach ?>
					</div>
				</section>
				<!-- gallery end-->

				<!-- section start-->
				<section class="section donation donation--style-2 no-padding-bottom">
					<div class="container bottom-50">
						<div class="row align-items-end">
							<div class="col-lg-8">
								<div class="heading heading--style-2 heading--green"><span class="heading__pre-title">Events</span>
									<h2 class="heading__title no-margin-bottom"><span>Jangan Lewatkan</span> <span>Event HAE</span></h2>
								</div>
							</div>
							<div class="col-lg-4 text-lg-right">
								<div class="donation-slider__dots dots--style-2"></div>
							</div>
						</div>
					</div>
					<div class="slider-holder bottom-50">
						<div class="slider-holder__wrapper">
							<div class="donation-slider">
								<?php foreach($eventList as $event) : ?>
									<div class="donation-slider__item">
										<div class="donate-box"><img class="img--bg" src="<?php echo base_url() ;?>images/event/<?php echo $event->events_img; ?>" alt="img"/>
											<div class="donate-box__inner">
												<div class="heading"><span class="heading__pre-title"><?php echo $event->events_date; ?></span>
													<h2 class="heading__title no-margin-bottom"><span><?php echo $event->events_name; ?></span></h2>
												</div>
												<p>
													<?php echo $event->events_desc; ?>
												</p>
											</div>
										</div>
									</div>
								<?php endforeach ?>
							</div>
						</div>
					</div>
				</section>
				<!-- section end-->
				<!-- section start-->
				<section class="section section-partner" style="background: url('<?php echo base_url(); ?>images/bg-partner.png')">
					<div class="container">
						<div class="row bottom-50">
							<div class="col-12">
								<div class="heading heading--primary heading--center"><span class="heading__pre-title">Mitra</span>
									<h2 class="heading__title no-margin-bottom"><span>Mitra</span> <span>HA-E</span></h2>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<div class="logos-slider">
									<?php foreach($customerList as $customer) : ?>
									<div class="logos-slider__item">
										<a href="<?php echo $customer->link; ?>">
											<img src="<?php echo base_url(); ?>images/partner/<?php echo $customer->brand_path; ?>" style=" width:100% !important; max-width:none !important" alt="logo"/>
										</a>
									</div>
									<?php endforeach ?>
								</div>
								<div class="logos-slider__dots dots--style-2"></div>
							</div>
						</div>
					</div>
				</section>
				<!-- section end-->
				<!-- section start-->
				<section class="section section-instagram">
					<div class="container">
						<div class="row align-items-center bottom-50">
							<div class="col-12">
								<div class="heading heading--style-2 heading--green"><span class="heading__pre-title">Instagram</span>
									<h2 class="heading__title no-margin-bottom"><span>#dpphaeipb,</span> <span>Ikuti Kami di instagram</span></h2>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 col-md-8 my-auto">
							<h6 class="footer__title"><span>Instagram Reels </span> <i class="fa fa-instagram" aria-hidden="true"></i></h6>
								<div class='sk-ww-instagram-reels' data-embed-id='187804' style="width:100% !important"></div>
									<script src='https://widgets.sociablekit.com/instagram-reels/widget.js' async defer></script>
								<div class="instagram-slider instagram-slider--style-2 instagram-slider--green">

								</div>
							</div>
							<div class="col-sm-12 col-md-4">
								<div class='sk-instagram-feed' data-embed-id='189205'></div><script src='https://widgets.sociablekit.com/instagram-feed/widget.js' async defer></script>
							</div>
						</div>
					</div>
					
				</section>
				<!-- section end-->
			</main>
			<?php include("include/footer.php"); ?>
		</div>
		<!-- libs-->
		<?php include("include/include_js.php"); ?>
    </body>
</html>