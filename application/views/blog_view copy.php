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
				<!-- blog start-->
				<section class="section blog">
					<div class="container">
						<div class="row">
							<div class="col-lg-8 col-xl-9">
								<div class="row">
                                    <?php foreach($blogList as $blog) : ?>
                                        <div class="col-12">
                                            <div class="blog-item">
                                                <div class="blog-item__img"><img class="img--bg" src="<?php echo base_url(); ?>images/blog/large/<?php echo $blog->image; ?>" alt="blog"/>
                                                    <div class="blog-item__date"><span><?php echo $blog->blogcategory_name; ?></span> 
                                                    </div>
                                                    
                                                </div>
                                                
                                                <h4 class="blog-item__title"><a href="<?php echo base_url(); ?>blog/detail/<?php echo $blog->idblog; ?>/<?php echo str_replace(array("%20"), "-", strtolower(rawurlencode($blog->title))); ?>"><?php echo $blog->title; ?></a></h4>
                                                
                                                <p><?php echo $blog->subtitle; ?></p> 
                                                
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
								</div>
							</div>
							<div class="col-md-8 offset-md-2 col-lg-4 offset-lg-0 col-xl-3">
								<div class="blog__inner-block bottom-50">
                                    <form class="search-form" action="<?php echo base_url() ;?>blog">
                                        <input type="search" class="search-form__input" name="key" value="<?php echo $keywords ?>" id="txtsearch" placeholder="Search...">
                                        <button class="search-form__submit" type="submit" fdprocessedid="cmtbbj">
                                            <svg class="icon">
                                                <use xlink:href="#search"></use>
                                            </svg>
                                        </button>
								    </form>
								</div>
								<div class="blog__inner-block bottom-50">
									<h5 class="blog__title">Kategori</h5>
									<ul class="categories-list">
                                        <?php foreach($categoryList as $category) : ?>
										    <li class="categories-list__item categories-list__item--active">
                                                <span class="categories-list__name"><?php echo $category->blogcategory_name; ?></span>
                                                <span class="categories-list__count"><?php echo $category->total_blog_count; ?></span>
                                            </li>
										<?php endforeach ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- blog end-->
			</main>
			<?php include("include/footer.php"); ?>
		</div>
		<?php include("include/include_js.php"); ?>
    </body>
</html>